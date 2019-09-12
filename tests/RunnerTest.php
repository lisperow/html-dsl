<?php

namespace Html\Dsl\Tests;

use PHPUnit\Framework\TestCase;
use function Html\Dsl\Runner\run;

class RunnerTest extends TestCase
{
    public function testRunner1()
    {
        $tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];
        $html = run($tag);
        $expected = '<hr class="px-3" id="myid">';
        $this->assertEquals($expected, $html);
    }

    public function testRunner2()
    {
        $tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow'];
        $html = run($tag);
        $expected = '<div id="wow">text2</div>';
        $this->assertEquals($expected, $html);
    }
}
