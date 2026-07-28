<?php

declare(strict_types=1);

namespace FoodForestERP\Config;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Configuration manager.
 *
 * @package FoodForestERP
 * @since 0.4.1
 */
final class Config
{
    /**
     * Repository instance.
     *
     * @var Repository|null
     */
    private static ?Repository $repository = null;

    /**
     * Get repository instance.
     *
     * @return Repository
     */
    private static function repository(): Repository
    {
        if (self::$repository === null) {
            self::$repository = new Repository();
        }

        return self::$repository;
    }

    /**
     * Get configuration value.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return self::repository()->get($key, $default);
    }

    /**
     * Set configuration value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public static function set(string $key, mixed $value): void
    {
        self::repository()->set($key, $value);
    }

    /**
     * Get all configuration.
     *
     * @return array<string, mixed>
     */
    public static function all(): array
    {
        return self::repository()->all();
    }
}