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
