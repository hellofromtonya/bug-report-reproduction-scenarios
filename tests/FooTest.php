<?php

namespace Jrf\Mockery\Scenario\Tests;

use Jrf\Mockery\Scenario\Foo;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase {
    use MockeryPHPUnitIntegration;

    private $classUnderTest;

    /**
     * Initializes the test mock.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->classUnderTest = Mockery::mock( Foo::class )->makePartial();
    }

    /**
     * @dataProvider dataSplitString
     */
    public function testSplitString($input, $expected)
    {
        $this->classUnderTest->expects('clean')
            ->once()
            ->andReturn($input);

        $this->assertSame($expected, $this->classUnderTest->splitString($input));
    }

    public function dataSplitString(): array
    {
        return [
            'simple test case' => [
                'input'    => 'test,string',
                'expected' => ['test', 'string'],
            ],
        ];
    }
}
