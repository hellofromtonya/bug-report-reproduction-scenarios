<?php

namespace Jrf\PHPUnit10\Scenario\Tests;

use Exception;
use Jrf\PHPUnit10\Scenario\Foo;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{

    public function testMethodA() {
        $fileName = tempnam(sys_get_temp_dir(), 'RLT') . '/missing/directory';

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to open stream');

        (new Foo)->methodA($fileName);
    }

    public function testMethodB() {
        $this->assertSame('Triggering', (new Foo)->methodB()['message']);
    }
}
