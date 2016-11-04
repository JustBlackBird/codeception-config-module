# Codeception Config Module

[![Build Status](https://travis-ci.org/JustBlackBird/codeception-config-module.svg)](https://travis-ci.org/JustBlackBird/codeception-config-module)

## Usage

```php
<?php

$I = new AcceptanceTester($scenarion);
$I->fillField('Login', $I->grabFromConfig('login'));
$I->fillField('Password', $I->grabFromConfig('password'));
$I->click('Log in');
$I->see('You\'ve just logged in!');

```

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - Config:
            login: 'Foo'
            password 'Bar'
        - PhpBrowser:
            url: https://example.com/
        - \Helper\Acceptance
```

## License

[MIT](http://opensource.org/licenses/MIT) (c) Dmitriy Simushev

