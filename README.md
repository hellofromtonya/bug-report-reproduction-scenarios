# Bug Report Reproduction Scenarios

## PHP Code Coverage "coverage is recorded for test with invalid covers tag"

### Description

See issue https://github.com/sebastianbergmann/php-code-coverage/issues/997


### How to reproduce

* Check out this branch
* Run `composer install`
* Run `vendor/bin/phpunit` with code coverage on against the various commits in the branch

Or just examine the committed coverage HTML reports/CLI output in the commit messages for each step.
