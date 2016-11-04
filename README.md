# Codeception Config Module

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

