<?php

namespace Html\Dsl\Tests;

use PHPUnit\Framework\TestCase;
use function Html\Dsl\runner\run;

class RunnerTest extends TestCase
{
    public function testRunner()
    {
        $this->assertEquals(5, run(2, 3));
        $this->assertEquals(12, run(6, 6));
    }
}
