<?php

namespace Kirby\Cms;

use Kirby\Cache\Cache;
use Kirby\Cache\FileCache;
use Kirby\Cache\MemoryCache;
use Kirby\Filesystem\Dir;
use Kirby\Toolkit\Str;

/**
 * @coversDefaultClass \Kirby\Cms\Uuid
 */
class UuidTest extends TestCase
{
	protected $tmp = __DIR__ . '/tmp';

	public function setUp(): void
	{
		$this->app = new App([
			'roots' => [
				'index' => $this->tmp,
			]
		]);

		Dir::make($this->tmp);
	}

	public function tearDown(): void
	{
		Dir::remove($this->tmp);
		Uuid::cache()->flush();
	}


	public function constructProvider()
	{
		return [
			['page://test-a', 'page', 'test-a', 'page://test-a'],
			[$page = new Page(['slug' => 'a', 'content' => ['uuid' => 'test-a']]), 'page', 'test-a', 'page://test-a'],
			['site://', 'site', '', 'site://'],
			[new Site(), 'site', '', 'site://'],
			['file://test-a-b-c', 'file', 'test-a-b-c', 'file://test-a-b-c'],
			[new File(['filename' => 'a.jpg', 'parent' => $page, 'content' => ['uuid' => 'test-a']]), 'file', 'test-a', 'file://test-a'],
			['user://0A4yldHp', 'user', '0A4yldHp', 'user://0A4yldHp'],
			[new User(['id' => 'test']), 'user', 'test', 'user://test'],
		];
	}

	/**
	 * @covers ::__construct
	 * @covers ::for
	 * @covers ::type
	 * @covers ::toString
	 *
	 * @dataProvider constructProvider
	 */
	public function testConstruct($seed, string $type, string $host, string $result)
	{
		$uuid = Uuid::for($seed);
		$this->assertSame($type, $uuid->type());
		$this->assertSame($result, $uuid->toString());
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructInvalidType()
	{
		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('Invalid URL scheme: foo');
		Uuid::for('foo://bar');
	}

	/**
	 * @covers ::cache
	 */
	public function testCache()
	{
		$this->assertInstanceOf(Cache::class, Uuid::cache());

		$this->app->clone([
			'options' => [
				'cache' => [
					'uuid' => ['type' => 'memory']
				]
			]
		]);

		$this->assertInstanceOf(MemoryCache::class, Uuid::cache());

		$this->app->clone([
			'options' => [
				'cache' => [
					'uuid' => ['type' => 'file']
				]
			]
		]);

		$this->assertInstanceOf(FileCache::class, Uuid::cache());
	}

	/**
	 * @covers ::clear
	 * @covers ::findFromCache
	 * @covers ::key
	 * @covers ::populate
	 * @covers ::value
	 */
	public function testCacheForPage()
	{
		$app = $this->app->clone([
			'options' => [
				'cache' => [
					'uuid' => true
				]
			],
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['uuid' => 'test-a'],
						'children' => [
							[
								'slug' => 'b',
								'content' => ['uuid' => 'test-b']
							],
						]
					],
				]
			]
		]);

		$page = $app->page('a/b');
		$uuid = Uuid::for($page);

		$this->assertSame('page/te/st-b', $key = $uuid->key());
		$this->assertSame('a/b', $value = $uuid->value());
		$this->assertTrue($uuid->populate());
		$this->assertTrue(Uuid::cache()->exists($key));
		$this->assertSame($value, Uuid::cache()->get($key));
		$this->assertSame($page, Uuid::for('page://test-b')->toModel());

		// add second page and see if clearing recursively works
		$p2 = Uuid::for($app->page('a'));
		$this->assertTrue($p2->populate());
		$this->assertTrue(Uuid::cache()->exists('page/te/st-a'));
		$this->assertTrue(Uuid::cache()->exists('page/te/st-b'));

		$this->assertTrue($p2->clear(true));
		$this->assertFalse(Uuid::cache()->exists('page/te/st-a'));
		$this->assertFalse(Uuid::cache()->exists('page/te/st-b'));
	}

	/**
	 * @covers ::clear
	 * @covers ::findFromCache
	 * @covers ::key
	 * @covers ::populate
	 * @covers ::value
	 */
	public function testCacheForFileFromUser()
	{
		$app = $this->app->clone([
			'options' => [
				'cache' => [
					'uuid' => true
				]
			],
			'users' => [
				[
					'id'    => 'test',
					'email' => 'test@getkirby.com',
					'files' => [
						[
							'filename' => 'test.jpg',
							'content' => ['uuid' => 'file-a'],
						]
					]
				]
			]
		]);

		$file = $app->user('test')->file('test.jpg');
		$uuid = Uuid::for($file);

		$this->assertSame('file/fi/le-a', $key = $uuid->key());
		$this->assertSame('user://test/test.jpg', $value = $uuid->value());
		$this->assertTrue($uuid->populate());
		$this->assertTrue(Uuid::cache()->exists($key));
		$this->assertSame($value, Uuid::cache()->get($key));
		$this->assertSame($file, Uuid::for('file://file-a')->toModel());
	}

	/**
	 * @covers ::create
	 */
	public function testCreate()
	{
		$this->app->impersonate('kirby');

		$page = new Page(['slug' => 'a']);
		$this->assertTrue($page->content()->get('uuid')->isEmpty());
		$page = Uuid::for($page)->toModel();
		$this->assertFalse($page->content()->get('uuid')->isEmpty());
	}

	/**
	 * @covers ::findFromCache
	 * @covers ::model
	 */
	public function testFindFromCache()
	{
		$app = $this->app->clone([
			'options' => [
				'cache' => [
					'uuid' => true
				]
			],
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['uuid' => 'test']
					]
				]
			]
		]);

		$page = $app->page('a');
		$uuid = Uuid::for($page);

		$class = new \ReflectionClass($uuid);
		$method = $class->getMethod('findFromCache');
		$method->setAccessible(true);

		$model = $method->invokeArgs($uuid, []);
		$this->assertNull($model);

		$uuid->populate();

		$model = $method->invokeArgs($uuid, []);
		$this->assertSame($page, $model);

		$model = $uuid->toModel();
		$this->assertSame($page, $model);
	}

	/**
	 * @covers ::index
	 */
	public function testIndex()
	{
		$app = $this->app->clone([
			'options' => [
				'cache' => [
					'uuid' => true
				]
			],
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['uuid' => 'page-a'],
						'files' => [
							[
								'filename' => 'test.jpg',
								'content' => ['uuid' => 'file-a'],
							]
						]
					]
				],
				'files' => [
					[
						'filename' => 'test.jpg',
						'content' => ['uuid' => 'file-site-a'],
					]
				]
			],
			'users' => [
				[
					'id'    => 'test',
					'email' => 'test@getkirby.com',
					'files' => [
						[
							'filename' => 'test.jpg',
							'content' => ['uuid' => 'file-user-a'],
						]
					]
				]
			]
		]);

		$cache = Uuid::cache();

		$this->assertFalse($cache->exists('page/pa/ge-a'));
		$this->assertFalse($cache->exists('file/fi/le-a'));
		$this->assertFalse($cache->exists('file/fi/le-site-a'));
		$this->assertFalse($cache->exists('file/fi/le-user-a'));

		Uuid::index();

		$this->assertTrue($cache->exists('page/pa/ge-a'));
		$this->assertTrue($cache->exists('file/fi/le-a'));
		$this->assertTrue($cache->exists('file/fi/le-site-a'));
		$this->assertTrue($cache->exists('file/fi/le-user-a'));
	}

	public function keyProvider()
	{
		$page = new Page(['slug' => 'b', 'content' => ['uuid' => 'test']]);
		$file = new File(['filename' => 'test.jpg', 'parent' => $page, 'content' => ['uuid' => 'fox-in-box']]);

		return [
			[$page, 'page/te/st'],
			[$file, 'file/fo/x-in-box']
		];
	}

	/**
	 * @covers ::key
	 *
	 * @dataProvider keyProvider
	 */
	public function testKey($seed, string $key)
	{
		$this->assertSame($key, Uuid::for($seed)->key());
	}

	/**
	 * @covers ::findFromIndex
	 * @covers ::toModel
	 */
	public function testToModelForFileFromPage()
	{
		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['uuid' => 'page-a'],
						'files' => [
							[
								'filename' => 'test.jpg',
								'content' => ['uuid' => 'file-a'],
							]
						]
					]
				]
			]
		]);

		$file = $app->page('a')->file('test.jpg');

		// with UUID string
		$model = Uuid::for('file://file-a')->toModel();
		$this->assertSame($file, $model);

		// with file instance
		$model = Uuid::for($file)->toModel();
		$this->assertSame($file, $model);
	}

	/**
	 * @covers ::findFromIndex
	 * @covers ::toModel
	 */
	public function testToModelForFileFromSite()
	{
		$app = $this->app->clone([
			'site' => [
				'files' => [
					[
						'filename' => 'test.jpg',
						'content' => ['uuid' => 'file-a'],
					]
				]
			]
		]);

		$file = $app->file('test.jpg');

		// with UUID string
		$model = Uuid::for('file://file-a')->toModel();
		$this->assertSame($file, $model);

		// with file instance
		$model = Uuid::for($file)->toModel();
		$this->assertSame($file, $model);
	}

	/**
	 * @covers ::collection
	 * @covers ::findFromIndex
	 * @covers ::toModel
	 */
	public function testToModelForFileFromUser()
	{
		$app = $this->app->clone([
			'users' => [
				[
					'id'    => 'test',
					'email' => 'test@getkirby.com',
					'files' => [
						[
							'filename' => 'test.jpg',
							'content' => ['uuid' => 'file-a'],
						]
					]
				]
			]
		]);

		$file = $app->user('test')->file('test.jpg');

		// with UUID string
		$model = Uuid::for('file://file-a')->toModel();
		$this->assertSame($file, $model);

		// with file instance
		$model = Uuid::for($file)->toModel();
		$this->assertSame($file, $model);
	}

	/**
	 * @covers ::collection
	 * @covers ::findFromIndex
	 * @covers ::toModel
	 */
	public function testToModelForPage()
	{
		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['uuid' => 'test-a']
					],
					[
						'slug' => 'b',
						'content' => ['uuid' => 'test-b']
					]
				]
			]
		]);

		$page1 = $app->page('a');
		$page2 = $app->page('b');

		// with UUID string
		$model = Uuid::for('page://test-a')->toModel();
		$this->assertSame($page1, $model);
		$model = Uuid::for('page://test-b')->toModel();
		$this->assertSame($page2, $model);

		// with site instance
		$model = Uuid::for($page1)->toModel();
		$this->assertSame($page1, $model);
		$model = Uuid::for($page2)->toModel();
		$this->assertSame($page2, $model);
	}

	/**
	 * @covers ::collection
	 * @covers ::findFromIndex
	 * @covers ::toModel
	 */
	public function testToModelForPageWithNewUuid()
	{
		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['other' => 'stuff']
					]
				]
			]
		]);

		$app->impersonate('kirby');
		$page = $app->page('a');

		// with UUID string
		$uuid = Uuid::for($page)->toString();
		$model = Uuid::for($uuid)->toModel();
		$this->assertTrue($model->is($page));
		$this->assertSame('stuff', (string)$model->other());
	}

	/**
	 * @covers ::toModel
	 */
	public function testToModelForSite()
	{
		// with UUID string
		$site = site();
		$model = Uuid::for('site://')->toModel();
		$this->assertSame($site, $model);

		// with site instance
		$model = Uuid::for($site)->toModel();
		$this->assertSame($site, $model);
	}

	/**
	 * @covers ::toModel
	 */
	public function testToModelForUser()
	{
		$app = $this->app->clone([
			'users' => [
				[
					'id'    => 'test',
					'email' => 'test@getkirby.com'
				],
				[
					'id'    => 'homer',
					'email' => 'homer@simpson.com'
				]
			]
		]);

		$user1 = $app->user('test');
		$user2 = $app->user('homer');

		// with UUID string
		$model = Uuid::for('user://test')->toModel();
		$this->assertSame($user1, $model);
		$model = Uuid::for('user://homer')->toModel();
		$this->assertSame($user2, $model);

		// with user instance
		$model = Uuid::for($user1)->toModel();
		$this->assertSame($user1, $model);
		$model = Uuid::for($user2)->toModel();
		$this->assertSame($user2, $model);
	}

	/**
	 * @covers ::toModel
	 */
	public function testToModelInvalidUuid()
	{
		$this->assertNull(Uuid::for('file://homer-simpson')->toModel());
	}

	/**
	 * @covers ::id
	 * @covers ::toString
	 */
	public function testToStringForPageWithNewUuid()
	{
		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a'
					]
				]
			]
		]);

		$app->impersonate('kirby');

		$page = $app->page('a');
		$uuid = Uuid::for($page)->toString();
		$this->assertTrue(Str::startsWith($uuid, 'page://'));
	}

	/**
	 * @covers ::value
	 */
	public function testValue()
	{
		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'children' => [
							[
								'slug' => 'b',
								'content' => [
									'uuid' => 'test-page-uuid'
								],
								'files' => [
									['filename' => 'homer.jpg']
								]
							]
						]
					]
				]
			]
		]);

		// with page instance
		$page  = $app->page('a/b');
		$value = Uuid::for($page)->value();
		$this->assertSame('a/b', $value);

		// with file instance
		$file  = $page->file('homer.jpg');
		$value = Uuid::for($file)->value();
		$this->assertSame('page://test-page-uuid/homer.jpg', $value);
	}
}
