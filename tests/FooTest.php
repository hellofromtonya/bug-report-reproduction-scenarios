<?php

namespace Jrf\CodeCoverage\Scenario\Tests;

use Jrf\CodeCoverage\Scenario\Foo;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{

    /**
     * @covers \Jrf\CodeCoverage\Scenario\Foo::methodDoesNotExist
     */
    public function testMethodAB() {
        $this->assertTrue((new Foo)->methodA());
    }
}
