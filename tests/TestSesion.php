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

    /**
     * @return array
     */
    public function providerSet(): array
    {
        return [
            [
                'test_key',
                'test_value'
            ],
        ];
    }

    /**
     * @param string $name
     * @param $set
     * @param bool $expected
     *
     * @dataProvider providerHas
     *
     * @runInSeparateProcess
     */
    public function testHas(string $name, $set, bool $expected): void
    {
        if ($set) {
            Session::set($name, $name);
        } else {
            Session::remove($name);
        }

        $this->assertEquals($expected, Session::has($name));
    }

    /**
     * @return array
     */
    public function providerHas(): array
    {
        return [
            [
                'test_key',
                true,
                true,
            ],
            [
                'test_key',
                false,
                false,
            ],
        ];
    }

    /**
     * @param string $name
     * @param $default
     * @param bool $set
     *
     * @dataProvider providerGetNotEmpty
     *
     * @runInSeparateProcess
     */
    public function testGetNotEmpty(string $name, $default, bool $set): void
    {
        if ($set) {
            Session::set($name, $name);
        } else {
            Session::remove($name);
        }
        $this->assertEquals($name, Session::getNotEmpty($name, $default));
    }

    /**
     * @return array
     */
    public function providerGetNotEmpty(): array
    {
        return [
            [
                'test_get_not_empty',
                null,
                true,
            ],
            [
                'test_default',
                'test_default',
                false,
            ],
        ];
    }

    /**
     * @param string $name
     * @param bool $set
     *
     * @dataProvider providerRemove
     *
     * @runInSeparateProcess
     */
    public function testRemove(string $name, bool $set): void
    {
        if ($set) {
            Session::set($name, $name);
        }
        Session::remove($name);
        $this->assertFalse(Session::has($name));
    }

    /**
     * @return array
     */
    public function providerRemove(): array
    {
        $key1 = uniqid('key1_');
        $key2 = uniqid('key2_');

        return [
            [
                $key1,
                true,
            ],
            [
                $key2,
                false,
            ],
        ];
    }
}