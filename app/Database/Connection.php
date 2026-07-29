<?php

declare(strict_types=1);

namespace FoodForestERP\Database;

use wpdb;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Database Connection Manager.
 *
 * Provides access to the WordPress database connection.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Connection
{
    /**
     * Singleton instance.
     *
     * @var self|null
     */
    private static ?self $instance = null;

    /**
     * WordPress database instance.
     *
     * @var wpdb
     */
    private wpdb $wpdb;

    /**
     * Private constructor.
     */
    private function __construct()
    {
        global $wpdb;

        $this->wpdb = $wpdb;
    }

    /**
     * Get singleton instance.
     *
     * @return self
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get WordPress database object.
     *
     * @return wpdb
     */
    public function wpdb(): wpdb
    {
        return $this->wpdb;
    }

    /**
     * Get WordPress table prefix.
     *
     * @return string
     */
    public function prefix(): string
    {
        return $this->wpdb->prefix;
    }

    /**
     * Get full table name.
     *
     * @param string $table
     *
     * @return string
     */
    public function table(string $table): string
    {
        return $this->prefix() . $table;
    }
}