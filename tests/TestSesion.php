<?php

use cse\helpers\Session;
use PHPUnit\Framework\TestCase;

class TestSesion extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testStart(): void
    {
        $this->assertTrue(Session::start());
    }

    /**
     * @param string $name
     * @param $value
     *
     * @dataProvider providerSet
     *
     * @runInSeparateProcess
     */
    public function testSet(string $name, $value): void
    {
        Session::set($name, $value);
        $this->assertTrue(!empty($_SESSION[$name]));
    }
}