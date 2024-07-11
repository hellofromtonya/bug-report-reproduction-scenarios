<?php

namespace Jrf\PHPUnit\Scenario\Tests;

use Jrf\PHPUnit\Scenario\Foo;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase {

	private $classUnderTest;

	/**
	 * Initializes the test mock.
	 */
	protected function setUp(): void
	{
		parent::setUp();
		$this->classUnderTest = new Foo();
	}

    public function testDeprecation()
    {
		$this->assertTrue($this->classUnderTest->throwDeprecation());
		$this->assertTrue($this->classUnderTest->throwDeprecation());
		$this->assertTrue($this->classUnderTest->throwDeprecation());
    }

    public function testNotice()
    {
		$this->assertTrue($this->classUnderTest->throwNotice());
		$this->assertFalse($this->classUnderTest->throwNotice());
    }

    public function testWarning()
    {
		$this->assertTrue($this->classUnderTest->throwWarning());
    }
}
