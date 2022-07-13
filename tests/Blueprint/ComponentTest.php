<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

class TestComponent extends Component
{
	public function __construct(
		public string $id,
		public ?Label $label = null,
		public ?Tab $tab = null
	) {
		$this->label ??= new Label();
		$this->tab  ??= new Tab('content');
	}

	public static function polyfill(array $props): array
	{
		$props['label'] ??= $props['headline'] ?? null;

		unset($props['headline']);

		return $props;
	}
}

/**
 * @covers \Kirby\Blueprint\Component
 */
class ComponentTest extends TestCase
{
	/**
	 * @covers ::__call
	 */
	public function testCall()
	{
		$c = new TestComponent('test');
		$this->assertSame('test', $c->id());
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$c = new TestComponent('test');
		$this->assertSame('test', $c->id);
		$this->assertInstanceOf(Label::class, $c->label);
		$this->assertInstanceOf(Tab::class, $c->tab);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactory()
	{
		$c = TestComponent::factory([
			'id'    => 'test',
			'label' => 'Nice Label',
			'tab'   => [
				'id'    => 'test',
				'label' => 'Nice Tab'
			]
		]);

		$this->assertSame('test', $c->id);
		$this->assertSame('Nice Label', $c->label->value);
		$this->assertSame('Nice Tab', $c->tab->label->value);
	}

	/**
	 * @covers ::factoryForProperty
	 */
	public function testFactoryForPropertyWithString()
	{
		$input = 'test';
		$value = TestComponent::factoryForProperty('id', $input);
		$this->assertSame($input, $value);
	}

	/**
	 * @covers ::factoryForProperty
	 */
	public function testFactoryForPropertyWithObject()
	{
		$input = new Label('test');
		$value = TestComponent::factoryForProperty('label', $input);
		$this->assertSame($input, $value);
	}

	/**
	 * @covers ::factoryForProperty
	 */
	public function testFactoryForPropertyWithComponent()
	{
		$input = ['id' => 'seo'];
		$tab   = TestComponent::factoryForProperty('tab', $input);

		$this->assertInstanceOf(Tab::class, $tab);
		$this->assertSame('seo', $tab->id);
	}

	/**
	 * @covers ::set
	 */
	public function testSet()
	{
		$c = new TestComponent(id: 'test');

		$c->set('tab', [
			'id' => 'seo'
		]);

		$this->assertSame('seo', $c->tab->id);
	}

	/**
	 * @covers ::polyfill
	 */
	public function testPolyfill()
	{
		$c = TestComponent::factory([
			'id'       => 'test',
			'headline' => 'Test headline'
		]);

		$this->assertSame('Test headline', $c->label->value);
	}

	/**
	 * @covers ::render
	 */
	public function testRender()
	{
		$page = new Page([
			'slug' => 'test',
			'content' => [
				'title' => 'Test Page'
			]
		]);

		$c = new TestComponent(id: 'test');
		$c->set('label', '{{ page.title }}');

		$expected = [
			'id' => 'test',
			'label' => 'Test Page',
			'tab' => [
				'columns' => [],
				'icon'    => null,
				'id'      => 'content',
				'label'   => 'Content'
			]
		];

		$this->assertSame($expected, $c->render($page));
	}
}
