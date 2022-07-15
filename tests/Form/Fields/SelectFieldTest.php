<?php

namespace Kirby\Form\Fields;

use Kirby\Cms\Page;
use Kirby\Form\Field;

class SelectFieldTest extends TestCase
{
	public function testDefaultProps()
	{
		$field = $this->field('select');

		$this->assertSame('select', $field->type());
		$this->assertSame('select', $field->name());
		$this->assertSame('', $field->value());
		$this->assertSame(null, $field->icon());
		$this->assertSame([], $field->options());
		$this->assertTrue($field->save());
	}

	public function valueInputProvider()
	{
		return [
			['a', 'a'],
			['b', 'b'],
			['c', 'c'],
			['d', '']
		];
	}

	/**
	 * @dataProvider valueInputProvider
	 */
	public function testValue($input, $expected)
	{
		$field = $this->field('select', [
			'options' => [
				'a',
				'b',
				'c'
			],
			'value' => $input
		]);

		$this->assertTrue($expected === $field->value());
	}

	public function testOptionsUuid()
	{
		$page  = new Page([
			'slug' => 'test',
			'content' => ['uuid' => 'page-test'],
			'files' => [
				[
					'filename' => 'a.jpg',
					'content' => ['uuid' => 'file-a'],
				],
				[
					'filename' => 'b.jpg',
					'content' => ['uuid' => 'file-b'],
				]
			]
		]);
		$field = Field::factory('select', [
			'model'   => $page,
			'options' => 'query',
			'query'   => [
				'fetch' => 'page.files',
				'text'  => '{{ file.filename }}',
				'value' => '{{ file.uuid }}'
			]
		]);

		$this->assertSame([
			['text' => 'a.jpg', 'value' => 'file://file-a'],
			['text' => 'b.jpg', 'value' => 'file://file-b']
		], $field->options());
	}
}
