<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Session;

// Example: start
// true
var_dump(Session::start());
echo PHP_EOL;

// Example: set
// ['test_key' => 'test_value']
var_dump(Session::set('test_key', 'test_value'));
echo PHP_EOL;
