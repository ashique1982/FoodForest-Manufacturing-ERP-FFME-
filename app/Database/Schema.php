<?php

declare(strict_types=1);

namespace FoodForestERP\Database;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Database Schema Builder.
 *
 * Handles database table creation and modification.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Schema
{
    /**
     * Database connection.
     *
     * @var Database
     */
    private Database $database;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->database = Database::instance();
    }

    /**
     * Create database table.
     *
     * @param string $table
     * @param string $columns
     *
     * @return void
     */
    public function create(
        string $table,
        string $columns
    ): void {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $charset = $this->charset();

        $sql = sprintf(
            "CREATE TABLE %s (
                %s
            ) %s;",
            $this->database
                ->wpdb()
                ->prefix . $table,
            $columns,
            $charset
        );

        dbDelta($sql);
    }

    /**
     * Drop database table.
     *
     * @param string $table
     *
     * @return void
     */
    public function drop(string $table): void
    {
        $wpdb = $this->database->wpdb();

        $wpdb->query(
            sprintf(
                'DROP TABLE IF EXISTS %s',
                $wpdb->prefix . $table
            )
        );
    }

    /**
     * Get database charset.
     *
     * @return string
     */
    private function charset(): string
    {
        return $this->database
            ->wpdb()
            ->get_charset_collate();
    }
}