SESSION CSE HELPERS
=======

The helpers allows you to easily manage session data. START, SET, GET DELETE, HAS method session - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-session

***


## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. SESSION CSE HELPERS allows you to easy START, SET, GET DELETE session.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)

Below you will find some information on how to init library and perform common commands.


## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-session).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-session
```

Or file composer.json should include the following contents:
```
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

**SESSION start**

Example:
```php
Session::start();
// true
```


## License

See the [LICENSE.md](https://github.com/cs-session/helpers-session/blob/master/LICENSE.md) file for licensing details.
