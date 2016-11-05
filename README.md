# Codeception Config Module

[![Build Status](https://travis-ci.org/JustBlackBird/codeception-config-module.svg)](https://travis-ci.org/JustBlackBird/codeception-config-module)

> Loads params from Codeception config and pass them to test scenarios.


## Installation

Add the package into your composer.json:

```json
    {
        "require-dev": {
            "codeception/codeception": "^2.2",
            "justblackbird/codeception-config-module": "^1.0"
        }
    }
```

Update the dependencies to download the package:

    php composer.phar update

Then enable module in your `acceptance.suite.yml` configuration and any configs
you want to pass to test scenarios:

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - Config:
            # You can use any configs in the list. There no limitations on
            # the parameters names.
            foo: 'Foo value'
            bar: 'Bar value'
            cookies_price: '$3.50'
        - PhpBrowser:
            url: 'https://example.com/'
        - \Helper\Acceptance
```

Also you need to rebuild your actor class:

    php codecept.phar build


## Usage

First you need to specify parameters you want to pass to test scenario in
Codeception config. Assume we need to use `username` and `password` to test login
process. The `acceptance.suite.yml` file might look like:

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - Config:
            username: 'john_doe'
            password: 'foobarbaz123'
        - PhpBrowser:
            url: 'https://example.com/'
        - \Helper\Acceptance
```

After you've set params in the config file you can use them in an acceptance
scenarios. Here is an example:

```php
<?php

$I = new AcceptanceTester($scenarion);
$I->fillField('Username', $I->grabFromConfig('username'));
$I->fillField('Password', $I->grabFromConfig('password'));
$I->click('Log in');
$I->see('You\'ve just logged in!');

```


## API

### grabFromConfig($parameter)

Retrieves the specified parameter from module configs. If the parameter was not
specified an exception is thrown.


## License

[MIT](http://opensource.org/licenses/MIT) (c) Dmitriy Simushev

