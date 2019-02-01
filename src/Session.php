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
}