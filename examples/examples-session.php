<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Session;

// Example: start
$label = 'Start: ';
// true
echo $label . PHP_EOL;
var_dump(Session::start());
echo PHP_EOL;

// Example: set
$label = 'Set: ';
// ['example_key' => 'example_value']
Session::set('example_key', 'example_value');
echo $label . PHP_EOL;
var_dump($_SESSION);
echo PHP_EOL;

// Example: has
$label = 'Has: ';
// true
echo $label . PHP_EOL;
var_dump(Session::has('example_key'));
echo PHP_EOL;

// Example: get
$label = 'Get: ';
// example_value
var_dump($label . Session::get('example_key'));
echo PHP_EOL;

// Example: get not empty
$label = 'Get not empty: ';
// default_value
Session::set('example_default', '');
var_dump($label . Session::getNotEmpty('example_default', 'default_value'));
echo PHP_EOL;

// Example: get all data
$label = 'Get all data: ';
// ['example_key' => 'example_value', 'example_default' => '']
echo $label . PHP_EOL;
var_dump(Session::all());
echo PHP_EOL;

// Example: remove
$label = 'Remove: ';
// false
Session::remove('example_key');
echo $label . PHP_EOL;
var_dump(Session::has('example_key'));
echo PHP_EOL;

// Example: clear
$label = 'Clear: ';
// []
Session::clear();
echo $label . PHP_EOL;
var_dump(Session::all());
echo PHP_EOL;


// Example: multiKey
Session::setMultiKey('cse');

// Example: set
$label = 'MultiKey Set: ';
// ['cse' => ['example_key' => 'example_value']]
echo $label . PHP_EOL;
Session::set('example_key', 'example_value');
echo PHP_EOL;

// Example: has
$label = 'MultiKey Has: ';
// true
echo $label . PHP_EOL;
var_dump(Session::has('example_key'));
echo PHP_EOL;

// Example: get
$label = 'MultiKey Get: ';
// example_value
var_dump($label . Session::get('example_key'));
echo PHP_EOL;

// Example: get not empty
$label = 'MultiKey Get not empty: ';
// default_value
Session::set('example_default', '');
var_dump($label . Session::getNotEmpty('example_default', 'default_value'));
echo PHP_EOL;

// Example: get all data
$label = 'MultiKey Get all data: ';
// ['example_key' => 'example_value', 'example_default' => '']
echo $label . PHP_EOL;
var_dump(Session::all());
echo PHP_EOL;

// Example all session data
$label = 'MultiKey All session data: ';
// ['cse' => ['example_key' => 'example_value', 'example_default' = '']]
echo $label . PHP_EOL;
var_dump($_SESSION);

// Example: remove
$label = 'MultiKey Remove: ';
// false
Session::remove('example_key');
echo $label . PHP_EOL;
var_dump(Session::has('example_key'));
echo PHP_EOL;

// Example: clear
$label = 'MultiKey Clear: ';
// ['example' = 1]
$_SESSION['example'] = 1;
Session::clear();
echo $label . PHP_EOL;
var_dump($_SESSION);
echo PHP_EOL;

// Example: destroy
$label = 'MultiKey Destroy: ';
// false
Session::destroy();
echo $label . PHP_EOL;
var_dump(session_status() === PHP_SESSION_ACTIVE);
echo PHP_EOL;

// Example: is start
$label = 'MultiKey Is start: ';
// false
echo $label . PHP_EOL;
var_dump(Session::isStart());
echo PHP_EOL;