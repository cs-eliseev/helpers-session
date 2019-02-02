<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Session;

// Example: start
// true
var_dump(Session::start());
echo PHP_EOL;

// Example: set
// ['example_key' => 'example_value']
var_dump(Session::set('example_key', 'example_value'));
echo PHP_EOL;

// Example: has
// true
var_dump(Session::has('example_key'));
echo PHP_EOL;

// Example: get
// example_value
var_dump(Session::get('example_key'));
echo PHP_EOL;

// Example: get not empty
// default_value
Session::set('example_default', '');
var_dump(Session::get('example_default', 'default_value'));
echo PHP_EOL;

// Example: remove
// false
Session::remove('example_key');
var_dump(Session::has('example_key'));
echo PHP_EOL;