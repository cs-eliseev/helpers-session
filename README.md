SESSION CSE HELPERS
=======

The helpers allows you to easily manage session data. START, SET, GET DELETE, HAS method session - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-session

```php
Session::set(
    'example_key',
    Session::getNotEmpty('example_key', 'default_value')
);

if (is_int(Session::get('example_key'))) {
    Session::remove('example_key');
}

$is_not_int = Session::has('example_key');
```

***


## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. SESSION CSE HELPERS allows you to easy START, SET, GET DELETE session.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers project:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.


## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-session).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-session
```

Or file composer.json should include the following contents:
```json
{
    "require": {
        "cse/helpers-session": "*"
    }
}
```

### Git

Clone this repository locally:
```shell
git clone https://github.com/cs-eliseev/helpers-session.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-session/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-session.php](https://github.com/cs-eliseev/helpers-session/blob/master/examples/examples-session.php).

**START session**

Example:
```php
Session::start();
// true
```

**SET session**

Example:
```php
Session::set('example_key', 'example_value');
// ['example_key' => 'example_value']
```

Use multi key:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
// ['cse' => ['example_key_2' => 'example_value_2']]
```

**HAS session**

Example:
```php
Session::set('example_key', 'example_value');
Session::has('example_key');
// true
```

Use multi key:
```php
Session::setMultiKey('cse');
Session::has('example_key');
// false
```

**GET session**

Example:
```php
Session::set('example_key', 'example_value');
Session::get('example_key');
// example_value
```

Use multi key:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::get('example_key_2');
// example_value_2
```

Set default value is not exist session:
```php
Cookie::get('example_key_3', 'example_default_value_3');
// example_default_value_3
```

**GET NOT EMPTY session**

Example:
```php
Session::set('example_key', 'example_value');
Session::getNotEmpty('example_key', 'example_default_value');
// example_value
```

Use multi key:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::getNotEmpty('example_key_2');
// example_value_2
```

Set default value is not exist session:
```php
Cookie::getNotEmpty('example_key_3', 'example_default_value_3');
// example_default_value_3
```

Set default value empty session data:
```php
Session::set('example_key_4', '');
Cookie::getNotEmpty('example_key_4', 'example_default_value_4');
// example_default_value_4
```

**REMOVE session**

Example:
```php
Session::set('example_key', 'example_value');
Session::remove('example_key');
Session::has('example_key');
// false
```

Use multi key:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::remove('example_key_2');
Session::has('example_key_2');
// false
```

**SET MULTI KEY session**

Example:
```php
Session::set('example_key', 'example_value');
// ['example_key' => 'example_value']
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
/**
* [
*     'example_key' => 'example_value',
*     'cse' => [
*         'example_key_2' => 'example_value_2'
*     ]
* ]
*/
Session::set('example_key_3', 'example_value_3');
/**
* [
*     'example_key' => 'example_value',
*     'cse' => [
*         'example_key_2' => 'example_value_2',
*         'example_key_3' => 'example_value_3'
*     ]
* ]
*/
Session::setMultiKey();
Session::set('example_key_4', 'example_value_4');
/**
* [
*     'example_key' => 'example_value',
*     'cse' => [
*         'example_key_2' => 'example_value_2',
*         'example_key_3' => 'example_value_3'
*     ],
*     'example_key_4' => 'example_value_4',
*     'example' => [
*         'example_key_5' => 'example_value_5'
*     ],
* ]
*/
Session::setMultiKey('example');
Session::set('example_key_5', 'example_value_5');
```

Global use:
```php
class DefaultSessionData
{
    public function setSessionData(): void
    {
        Session::setMultiKey();
        Session::set('example_key_2', 'example_value_2');
    }
}

class CseSessionData
{
    public function setSessionData(): void
    {
        Session::setMultiKey('cse');
        Session::set('example_key_1', 'example_value_1');
    }
}

class ExtendSessionData
{
    public function setSessionData(string $key, string $value): void
    {
        Session::set($key, $value);
    }
}

$default = new DefaultSessionData();
$cse = new CseSessionData();
$extend = new ExtendSessionData();

$extend->setSessionData('example_key_0', 'example_value_0');
// ['example_key_0' => 'example_value_0']
$cse->setSessionData();
/**
* [
*     'example_key_0' => 'example_value_0',
*     'cse' => [
*         'example_key_1' => 'example_value_1'
*     ]
* ]
*/
$extend->setSessionData('example_key_1_1', 'example_value_1_1');
/**
* [
*     'example_key_0' => 'example_value_0',
*     'cse' => [
*         'example_key_1' => 'example_value_1',
*         'example_key_1_1' => 'example_value_1_1'
*     ]
* ]
*/
$default->setSessionData();
/**
* [
*     'example_key_0' => 'example_value_0',
*     'cse' => [
*         'example_key_1' => 'example_value_1',
*         'example_key_1_1' => 'example_value_1_1'
*     ],
*     'example_key_2' => 'example_value_2'
* ]
*/
$extend->setSessionData('example_key_2_1', 'example_value_2_1');
/**
* [
*     'example_key_0' => 'example_value_0',
*     'cse' => [
*         'example_key_1' => 'example_value_1',
*         'example_key_1_1' => 'example_value_1_1'
*     ],
*     'example_key_2' => 'example_value_2',
*     'example_key_2_1' => 'example_value_2_1'
* ]
*/
```

**Get ALL session data**

Example:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::setMultiKey();
Session::all();
/**
* [
*     'example_key' => 'example_key',
*     'cse' => [
*         'example_key_2' => 'example_value_2'
*     ]
* ]
*/
```

Use multi key:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::all();
// ['example_key_2' => 'example_value_2']
```

**CLEAR session data**

Example:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::setMultiKey();
Session::claer();
// []
```

Use multi key:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::claer();
// ['example_key' => 'example_value']
```

**DESTROY session**

Example:
```php
Session::start();
// session_status() === PHP_SESSION_ACTIVE => true
Session::destroy();
// session_status() === PHP_SESSION_ACTIVE => false
```

**IS START session**

Example:
```php
Session::start();
Session::isStart();
// true
Session::destroy();
Session::isStart();
// false
```


## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```shell
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```shell
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```shell
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## License

See the [LICENSE.md](https://github.com/cs-session/helpers-session/blob/master/LICENSE.md) file for licensing details.
