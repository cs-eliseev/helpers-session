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
     * @var null|string
     */
    protected static $multiKey = null;

    /**
     * Start session
     *
     * @param array $option
     *
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

        if (is_null(self::$multiKey)) {
            $_SESSION[$name] = $value;
        } else {
            $_SESSION[self::$multiKey][$name] = $value;
        }
    }

    /**
     * Has session key name
     *
     * @param string $name
     *
     * @return bool
     */
    public static function has(string $name): bool
    {
        self::start();

        return array_key_exists($name, self::all());
    }

    /**
     * Get session value by key name
     *
     * @param string $name
     * @param null $default
     *
     * @return null|mixed
     */
    public static function get(string $name, $default = null)
    {
        self::start();

        return self::has($name) ? self::all()[$name] : $default;
    }

    /**
     * Get session not empty value by key name
     *
     * @param string $name
     * @param null $default
     *
     * @return mixed|null
     */
    public static function getNotEmpty(string $name, $default = null)
    {
        $value = self::get($name);

        return !empty($value) ? $value : $default;
    }

    /**
     * Remove session by key name
     *
     * @param string $name
     */
    public static function remove(string $name): void
    {
        self::start();

        if (self::has($name)) {
            if (is_null(self::$multiKey)) {
                unset($_SESSION[$name]);
            } else {
                unset($_SESSION[self::$multiKey][$name]);
            }
        }
    }

    /**
     * Set multi key
     *
     * @example $_SESSION[$multiKey][$key]
     *
     * @param null|string $multiKey
     */
    public static function setMultiKey(?string $multiKey): void
    {
        self::$multiKey = empty($multiKey) ? null : $multiKey;
    }

    /**
     * Get all session data
     *
     * @return null|array
     */
    public static function all(): ?array
    {
        return is_null(self::$multiKey) ? $_SESSION : $_SESSION[self::$multiKey];
    }
}