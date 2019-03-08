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
     * @param null|string $multiKey
     *
     * @dataProvider providerSet
     *
     * @runInSeparateProcess
     */
    public function testSet(string $name, $value, ?string $multiKey): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

        Session::set($name, $value);

        $this->assertTrue(!empty(Session::get($name)));
    }

    /**
     * @return array
     */
    public function providerSet(): array
    {
        return [
            [
                'test_key',
                'test_value',
                null
            ],
            [
                'test_key',
                'test_value',
                'cse'
            ],
        ];
    }

    /**
     * @param string $name
     * @param null|string $multiKey
     * @param $set
     * @param bool $expected
     *
     * @dataProvider providerHas
     *
     * @runInSeparateProcess
     */
    public function testHas(string $name, ?string $multiKey, $set, bool $expected): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

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
                null,
                true,
                true,
            ],
            [
                'test_key',
                null,
                false,
                false,
            ],
            [
                'test_key',
                'cse',
                true,
                true,
            ],
            [
                'test_key',
                'cse',
                false,
                false,
            ],
        ];
    }

    /**
     * @param string $name
     * @param $value
     * @param null|string $default
     * @param null|string $multiKey
     * @param bool $set
     *
     * @dataProvider providerGet
     *
     * @runInSeparateProcess
     */
    public function testGet(string $name, $value, ?string $default, ?string $multiKey, bool $set): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

        if ($set) {
            Session::set($name, $value);
        } else {
            Session::remove($name);
        }

        $this->assertEquals($value, Session::get($name, $default));
    }

    /**
     * @return array
     */
    public function providerGet(): array
    {
        return [
            [
                'test_key',
                'test_value',
                null,
                null,
                true,
            ],
            [
                'test_default_key',
                'default_value',
                'default_value',
                null,
                false,
            ],
            [
                'test_key',
                'test_value',
                null,
                'cse',
                true,
            ],
            [
                'test_default_key',
                'default_value',
                'default_value',
                'cse',
                false,
            ],
        ];
    }

    /**
     * @param string $name
     * @param $default
     * @param null|string $multiKey
     * @param bool $set
     *
     * @dataProvider providerGetNotEmpty
     *
     * @runInSeparateProcess
     */
    public function testGetNotEmpty(string $name, $default, ?string $multiKey, bool $set): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

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
                null,
                true,
            ],
            [
                'test_default',
                'test_default',
                null,
                false,
            ],
            [
                'test_get_not_empty',
                null,
                'cse',
                true,
            ],
            [
                'test_default',
                'test_default',
                'cse',
                false,
            ],
        ];
    }

    /**
     * @param string $name
     * @param null|string $multiKey
     * @param bool $set
     *
     * @dataProvider providerRemove
     *
     * @runInSeparateProcess
     */
    public function testRemove(string $name, ?string $multiKey, bool $set): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

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
        return [
            [
                uniqid('key1_'),
                null,
                true,
            ],
            [
                uniqid('key2_'),
                null,
                false,
            ],
            [
                uniqid('key3_'),
                'cse',
                true,
            ],
            [
                uniqid('key4_'),
                'cse',
                false,
            ],
        ];
    }

    /**
     * @param array $names
     * @param null|string $multiKey
     * @param array $expected
     *
     * @dataProvider providerAll
     *
     * @runInSeparateProcess
     */
    public function testAll(array $names, ?string $multiKey, array $expected): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

        if (!empty($names)) {
            foreach ($names as $name) {
                Session::set($name, $name);
            }
        } else {
            Session::start();
        }

        $this->assertEquals($expected, Session::all());
    }

    /**
     * @return array
     */
    public function providerAll(): array
    {
        return [
            [
                ['test_name_1', 'test_name_2'],
                null,
                ['test_name_1' => 'test_name_1', 'test_name_2' => 'test_name_2'],
            ],
            [
                [],
                null,
                [],
            ],
            [
                ['test_name_1', 'test_name_2'],
                'cse',
                ['test_name_1' => 'test_name_1', 'test_name_2' => 'test_name_2'],
            ],
            [
                [],
                'cse',
                [],
            ],
        ];
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetMultiKey(): void
    {
        Session::set('test_1', 'test_1');
        Session::setMultiKey('cse');
        Session::set('test_2', 'test_2');
        Session::setMultiKey('');

        $this->assertEquals(['test_1' => 'test_1', 'cse' => ['test_2' => 'test_2']], Session::all());
    }

    /**
     * @param string $name
     * @param null|string $multiKey
     *
     * @dataProvider providerClear
     *
     * @runInSeparateProcess
     */
    public function testClear(string $name, ?string $multiKey): void
    {
        if (!is_null($multiKey)) Session::setMultiKey($multiKey);

        if (empty($name)) {
            Session::start();
        } else {
            Session::set($name, $name);
        }

        Session::clear();

        $this->assertTrue(empty(Session::all()));
    }

    /**
     * @return array
     */
    public function providerClear(): array
    {
        return [
            [
                'test_name',
                null
            ],
            [
                '',
                null
            ],
            [
                'test_name',
                'cse'
            ],
            [
                '',
                'cse'
            ],
        ];
    }

    /**
     * @runInSeparateProcess
     */
    public function testDestroy(): void
    {
        $this->assertTrue(Session::start());
        Session::destroy();
        $this->assertFalse(session_status() === PHP_SESSION_ACTIVE);
    }

    /**
     * @runInSeparateProcess
     */
    public function testIsStart(): void
    {
        $this->assertFalse(Session::isStart());
        $this->assertTrue(Session::start());
        $this->assertTrue(Session::isStart());
        Session::destroy();
        $this->assertFalse(Session::isStart());
    }
}