<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Session;

// Example: start
// true
Session::start();

// Example: set
// ['test_key' => 'test_value']
Session::set('test_key', 'test_value');