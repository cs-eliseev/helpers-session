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
}