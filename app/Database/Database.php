<?php

declare(strict_types=1);

namespace FoodForestERP\Database;

use wpdb;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Database Manager.
 *
 * Provides database operations for FFME.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Database
{
    /**
     * Database instance.
     *
     * @var self|null
     */
    private static ?self $instance = null;

    /**
     * WordPress database connection.
     *
     * @var wpdb
     */
    private wpdb $wpdb;

    /**
     * Private constructor.
     */
    private function __construct()
    {
        $this->wpdb = Connection::instance()->wpdb();
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
     * Execute raw query.
     *
     * @param string $query
     *
     * @return int|false
     */
    public function query(string $query): int|false
    {
        return $this->wpdb->query($query);
    }

    /**
     * Insert data into table.
     *
     * @param string $table
     * @param array  $data
     *
     * @return int|false
     */
    public function insert(string $table, array $data): int|false
    {
        return $this->wpdb->insert(
            $table,
            $data
        );
    }

    /**
     * Update data in table.
     *
     * @param string $table
     * @param array  $data
     * @param array  $where
     *
     * @return int|false
     */
    public function update(
        string $table,
        array $data,
        array $where
    ): int|false {
        return $this->wpdb->update(
            $table,
            $data,
            $where
        );
    }

    /**
     * Delete data from table.
     *
     * @param string $table
     * @param array  $where
     *
     * @return int|false
     */
    public function delete(
        string $table,
        array $where
    ): int|false {
        return $this->wpdb->delete(
            $table,
            $where
        );
    }

    /**
     * Get last inserted ID.
     *
     * @return int
     */
    public function lastInsertId(): int
    {
        return (int) $this->wpdb->insert_id;
    }

    /**
     * Get last database error.
     *
     * @return string
     */
    public function lastError(): string
    {
        return (string) $this->wpdb->last_error;
    }
}