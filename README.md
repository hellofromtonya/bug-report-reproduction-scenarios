# Bug Report Reproduction Scenarios

## Mockery PHP 8.2 "Use of "parent" in callables is deprecated" error

### Description

PHP 8.2 is slated to [deprecate partially supported callables](https://wiki.php.net/rfc/deprecate_partially_supported_callables).

From the [RFC](https://wiki.php.net/rfc/deprecate_partially_supported_callables#backward_incompatible_changes):
> Most of the callables deprecated here have a straightforward replacement: "self" should be replaced with self::class, and so on:
> ```
> "self::method"       -> self::class . "::method"
> "parent::method"     -> parent::class . "::method"
> "static::method"     -> static::class . "::method"
> ["self", "method"]   -> [self::class, "method"]
> ["parent", "method"] -> [parent::class, "method"]
> ["static", "method"] -> [static::class, "method"]
> ```
> The new form of these callables is no longer context-dependent. It will refer to the self/parent/static scope of where the callable has been created, rather than where is will be called.

During a preliminary test run for a project against PHP 8.2, I noticed that Mockery is heavily affected by this issue, with over half of the tests in the project I did the test run on erroring out on a `Use of "parent" in callables is deprecated` error.

Ref: https://wiki.php.net/rfc/deprecate_partially_supported_callables


### How to reproduce

* Check out this branch
* Run `composer install`
* Run `vendor/bin/phpunit` on PHP 8.2

Or examine the results of the workflows runs for this branch on the [Actions](https://github.com/jrfnl/bug-report-reproduction-scenarios/actions) page.
