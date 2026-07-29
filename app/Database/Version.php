<?php

declare(strict_types=1);

namespace FoodForestERP\Database;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Database Version Manager.
 *
 * Handles FFME database schema version tracking.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Version
{
    /**
     * Option key name.
     *
     * @var string
     */
    private const OPTION_KEY = 'ffme_database_version';

    /**
     * Get current database version.
     *
     * @return string
     */
    public function get(): string
    {
        return (string) get_option(
            self::OPTION_KEY,
            '0.0.0'
        );
    }

    /**
     * Update database version.
     *
     * @param string $version
     *
     * @return bool
     */
    public function set(string $version): bool
    {
        return update_option(
            self::OPTION_KEY,
            $version
        );
    }

    /**
     * Determine whether version exists.
     *
     * @return bool
     */
    public function exists(): bool
    {
        return get_option(
            self::OPTION_KEY
        ) !== false;
    }

    /**
     * Remove database version.
     *
     * @return bool
     */
    public function delete(): bool
    {
        return delete_option(
            self::OPTION_KEY
        );
    }
}