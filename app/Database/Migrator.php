<?php

declare(strict_types=1);

namespace FoodForestERP\Database;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Migration Runner.
 *
 * Handles FFME database migrations.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Migrator
{
    /**
     * Registered migrations.
     *
     * @var array<int, Migration>
     */
    private array $migrations = [];

    /**
     * Database version manager.
     *
     * @var Version
     */
    private Version $version;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->version = new Version();
    }

    /**
     * Register migration.
     *
     * @param Migration $migration
     *
     * @return void
     */
    public function register(Migration $migration): void
    {
        $this->migrations[] = $migration;
    }

    /**
     * Run pending migrations.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->migrations as $migration) {
            $migration->up();
        }

        $this->version->set(
            FFME_VERSION
        );
    }

    /**
     * Rollback migration.
     *
     * @return void
     */
    public function rollback(): void
    {
        foreach (array_reverse($this->migrations) as $migration) {
            $migration->down();
        }

        $this->version->set('0.0.0');
    }

    /**
     * Get current database version.
     *
     * @return string
     */
    public function version(): string
    {
        return $this->version->get();
    }

    /**
     * Get registered migrations.
     *
     * @return array<int, Migration>
     */
    public function migrations(): array
    {
        return $this->migrations;
    }
}