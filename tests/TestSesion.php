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
}