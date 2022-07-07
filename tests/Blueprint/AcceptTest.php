<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Accept
 */
class AcceptTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$accept = new Accept();

		$this->assertSame([], $accept->extension);
		$this->assertSame([], $accept->mime);
		$this->assertNull($accept->maxheight);
		$this->assertNull($accept->maxsize);
		$this->assertNull($accept->maxwidth);
		$this->assertNull($accept->minheight);
		$this->assertNull($accept->minsize);
		$this->assertNull($accept->minwidth);
		$this->assertNull($accept->orientation);
		$this->assertSame([], $accept->type);
	}

	public function testExtension()
	{
		// string: single
		$accept = new Accept(extension: 'jpg');
		$this->assertSame(['jpg'], $accept->extension);

		// string: multiple
		$accept = new Accept(extension: 'jpg, gif');
		$this->assertSame(['jpg', 'gif'], $accept->extension);

		// array
		$accept = new Accept(extension: ['jpg', 'gif']);
		$this->assertSame(['jpg', 'gif'], $accept->extension);
	}

	public function testFactory()
	{
		$accept = Accept::factory('image/*');
		$this->assertSame(['image/*'], $accept->mime);
	}

	public function testMime()
	{
		// string: single
		$accept = new Accept(mime: 'image/*');
		$this->assertSame(['image/*'], $accept->mime);

		// string: multiple
		$accept = new Accept(mime: 'image/*, application/*');
		$this->assertSame(['image/*', 'application/*'], $accept->mime);

		// array
		$accept = new Accept(mime: ['image/*', 'application/*']);
		$this->assertSame(['image/*', 'application/*'], $accept->mime);
	}

	public function testToArray()
	{
		$accept = new Accept(
			extension: 'jpg',
			maxheight: 23,
			maxsize: 11,
			maxwidth: 15,
			mime: 'image/*',
			minheight: 50,
			minsize: 100,
			minwidth: 10,
			orientation: 'sqaure',
			type: 'image'
		);

		$expected = [
			'extension'   => ['jpg'],
			'maxheight'   => 23,
			'maxsize'     => 11,
			'maxwidth'    => 15,
			'mime'        => ['image/*'],
			'minheight'   => 50,
			'minsize'     => 100,
			'minwidth'    => 10,
			'orientation' => 'sqaure',
			'type'        => ['image']
		];

		$this->assertSame($expected, $accept->toArray());
	}

	public function testType()
	{
		// string: single
		$accept = new Accept(type: 'image');
		$this->assertSame(['image'], $accept->type);

		// string: multiple
		$accept = new Accept(type: 'image, document');
		$this->assertSame(['image', 'document'], $accept->type);

		// array
		$accept = new Accept(type: ['image', 'document']);
		$this->assertSame(['image', 'document'], $accept->type);
	}

}
