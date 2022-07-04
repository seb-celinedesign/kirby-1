<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

/**
 * @covers \Kirby\Blueprint\Blueprint
 */
class BlueprintTest extends TestCase
{

    public function page()
    {
        return new Page(['slug' => 'test']);
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $blueprint = new Blueprint(
            model: $page = $this->page(),
            id: 'test',
            title: 'Test'
        );

        $this->assertSame('test', $blueprint->id);
        $this->assertSame('Test', $blueprint->title->value);
        $this->assertSame($page, $blueprint->model);
    }

    /**
     * @covers ::setTabs
     */
    public function testTabs()
    {
        $blueprint = new Blueprint(
            model: $this->page(),
            id: 'test',
            title: 'Test',
            tabs: [
                'test' => []
            ]
        );

        $this->assertSame('test', $blueprint->tabs['test']->id);
        $this->assertSame('Test', $blueprint->tabs['test']->label->value);
        $this->assertNull($blueprint->tabs['test']->icon);

    }

}
