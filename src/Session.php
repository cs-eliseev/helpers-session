<?php

declare(strict_types = 1);

namespace cse\helpers;

/**
 * Class Session
 *
 * @package cse\helpers
 */
class Session
{
    /**
     * Start session
     *
     * @param array $option
     * @return bool
     */
    public static function start(array $option = []): bool
    {
        if (session_status() === PHP_SESSION_ACTIVE) return true;

        return session_start($option);
    }

    /**
     * Set session by key name
     *
     * @param string $name
     * @param $value
     */
    public static function set(string $name, $value): void
    {
        self::start();
        $_SESSION[$name] = $value;
    }

    /**
     * Has session key name
     *
     * @param string $name
     * @return bool
     */
    public static function has(string $name): bool
    {
        self::start();

        return array_key_exists($name, $_SESSION);
    }

    /**
     * Get session value by key name
     *
     * @param string $name
     * @param null $default
     * @return null|mixed
     */
    public static function get(string $name, $default = null)
    {
        self::start();

        return self::has($name) ? $_SESSION[$name] : $default;
    }

    /**
     * Get session not empty value by key name
     *
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public static function getNotEmpty(string $name, $default = null)
    {
        $value = self::get($name);
        return !empty($value) ? $value : $default;
    }

    /**
     * Remove session by key name
     * @param string $name
     */
    public static function remove(string $name): void
    {
        self::start();

        if (self::has($name)) {
            unset($_SESSION[$name]);
        }
    }
}