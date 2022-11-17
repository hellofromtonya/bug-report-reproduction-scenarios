<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase {
	public function test_overload() {
		$overload = Mockery::mock( "overload:SomeClass" );
		$overload->expects( 'doThing' )->once();

		$instance = new SomeClass();
		$instance->doThing();
	}

	public function test_second_overload_in_separate_test_works() {
		$overload = Mockery::mock( 'overload:SomeClass' ); // I would expect a fatal here as per the documentation.
		$overload->expects( 'doOtherThing' )->once();

		$instance = new SomeClass();
		$instance->doOtherThing();
	}

	public function test_second_overload_expectations_are_ignored() {
		$overload = Mockery::mock( 'overload:SomeClass' ); // I would expect a fatal here as per the documentation
		$overload->expects( 'doThing' )->once();

		$overload2 = Mockery::mock( 'overload:SomeClass' ); // I would expect a fatal here as per the documentation.
		$overload2->expects( 'doThing' )->twice();

		$instance = new SomeClass();
		$instance->doThing();
	}

	public function test_second_overload_mocked_methods_are_ignored() {
		$overload = Mockery::mock( 'overload:SomeClass' ); // I would expect a fatal here as per the documentation
		$overload->expects( 'doThing' )->once();

		$instance = new SomeClass();
		$instance->doThing();


		$overload2 = Mockery::mock( 'overload:SomeClass' ); // I would expect a fatal here as per the documentation
		$overload2->expects( 'doOtherThing' )->once();

		$instance2 = new SomeClass();
		$instance2->doOtherThing(); // Mockery\Exception\BadMethodCallException: Method SomeClass::doOtherThing() does not exist on this mock object.
	}
}
