<?php

declare(strict_types=1);

namespace FoodForestERP\Database;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Base Migration Class.
 *
 * Provides a standard structure for database migrations.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
abstract class Migration
{
    /**
     * Schema instance.
     *
     * @var Schema
     */
    protected Schema $schema;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->schema = new Schema();
    }

    /**
     * Run the migration.
     *
     * Creates or modifies database structures.
     *
     * @return void
     */
    abstract public function up(): void;

    /**
     * Reverse the migration.
     *
     * Removes or reverts database changes.
     *
     * @return void
     */
    abstract public function down(): void;
}