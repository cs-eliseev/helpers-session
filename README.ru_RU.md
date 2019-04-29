[English](https://github.com/cs-eliseev/helpers-session/blob/master/README.md) | Русский

SESSION CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-session.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-session)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-session.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-session)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-session.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-session/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-session.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-session)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-session)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-session.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-session/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-session.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-session/archive/master.zip)

Данная библиотек позволяет вам удобно работать с сессиями. Доступны методы для запуска, установки, получении, удалении сессий. 

Репозиторий проекта: https://github.com/cs-eliseev/helpers-session

**DEMO**
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


## Описание проекта

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. SESSION CSE HELPERS, позволит вам довольно просто использовать методы START, SET, GET DELETE и другие, для работы  с сессиями.

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
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

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-session).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-session
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-session": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-session.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-session/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-session.php](https://github.com/cs-eliseev/helpers-session/blob/master/examples/examples-session.php).


**Запуск сессии**

Пример:
```php
Session::start();
// true
```

**Установка ключа сессии**

Пример:
```php
Session::set('example_key', 'example_value');
// ['example_key' => 'example_value']
```

Приме использование мульти ключа:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
// ['cse' => ['example_key_2' => 'example_value_2']]
```

**Проверка существования ключа сессии**

Пример:
```php
Session::set('example_key', 'example_value');
Session::has('example_key');
// true
```

Приме использование мульти ключа:
```php
Session::setMultiKey('cse');
Session::has('example_key');
// false
```

**Получение значения сессии по ключу**

Пример:
```php
Session::set('example_key', 'example_value');
Session::get('example_key');
// example_value
```

Приме использование мульти ключа:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::get('example_key_2');
// example_value_2
```

Пример установки значения по умолчанию, когда ключа сессии не сущуствует:
```php
Cookie::get('example_key_3', 'example_default_value_3');
// example_default_value_3
```

**Получение не пустых значений для ключа сессии**

Пример:
```php
Session::set('example_key', 'example_value');
Session::getNotEmpty('example_key', 'example_default_value');
// example_value
```

Приме использование мульти ключа:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::getNotEmpty('example_key_2');
// example_value_2
```

Пример установки значения по умолчанию, когда ключа сессии не сущуствует:
```php
Cookie::getNotEmpty('example_key_3', 'example_default_value_3');
// example_default_value_3
```

Пример установки значения по умолчанию, для пустого значения ключа сессии:
```php
Session::set('example_key_4', '');
Cookie::getNotEmpty('example_key_4', 'example_default_value_4');
// example_default_value_4
```

**Удаление ключа сессии**

Пример:
```php
Session::set('example_key', 'example_value');
Session::remove('example_key');
Session::has('example_key');
// false
```

Приме использование мульти ключа:
```php
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::remove('example_key_2');
Session::has('example_key_2');
// false
```

**Установка мульти ключа сессии**

Пример:
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

Пример использования в глобальной области видимости:
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

**Получени всех данных сессии**

Пример:
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

Приме использование мульти ключа:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::all();
// ['example_key_2' => 'example_value_2']
```

**Очистить сессию**

Пример:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::setMultiKey();
Session::claer();
// []
```

Приме использование мульти ключа:
```php
Session::set('example_key', 'example_value');
Session::setMultiKey('cse');
Session::set('example_key_2', 'example_value_2');
Session::claer();
// ['example_key' => 'example_value']
```

**Уничтожить сессию**

Пример:
```php
Session::start();
// session_status() === PHP_SESSION_ACTIVE => true
Session::destroy();
// session_status() === PHP_SESSION_ACTIVE => false
```

**Проверить запуск сессии**

Пример:
```php
Session::start();
Session::isStart();
// true
Session::destroy();
Session::isStart();
// false
```


## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

SESSION CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-session/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)