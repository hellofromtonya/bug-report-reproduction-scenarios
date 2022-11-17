# Bug Report Reproduction Scenarios

## Mockery overload implementation question

### Description

[The Mockery docs about overloading](https://docs.mockery.io/en/latest/reference/creating_test_doubles.html#overloading) mention:
> Using alias/instance mocks across more than one test will generate a fatal error since we can’t have two classes of
the same name. To avoid this, run each test of this kind in a separate PHP process (which is supported out of the box by
both PHPUnit and PHPT).

This branch contains some test cases that show this may not always be the case.
Instead of a fatal error, we see odd behaviour that could either use a bugfix or better documentation.

In this example, we have four test cases:
- `test_overload`
  - This is a "normal" use. A class that isn't available during testing is overloaded.
- `test_second_overload_in_separate_test_works`
  - This overloads the same class. Because the tests are ran in the same process as the first test, we would expect this to fail with a fatal error. Instead, the overload behaves as if no overload was present before.
- `test_second_overload_expectations_are_ignored`
  - This overloads the same class twice in the same test. What stands out here, is that the expectations of the second overload are completely ignored. We would expect a fatal instad.
- `test_second_overload_mocked_methods_are_ignored`
  - This overloads the same class twice in the same test with different expextations on each overload. This test fails because the expectations of the second overload are ignored. Again, we would have expected a fatal according to the docs. 

### How to reproduce

* Check out this branch
* Run `composer install`
* Run `vendor/bin/phpunit`

Or examine the results of the workflows runs for this branch on the [Actions](https://github.com/jrfnl/bug-report-reproduction-scenarios/actions) page.
