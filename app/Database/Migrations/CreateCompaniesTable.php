<?php

declare(strict_types=1);

namespace FoodForestERP\Database\Migrations;

use FoodForestERP\Database\Migration;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Create Companies Table Migration.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class CreateCompaniesTable extends Migration
{
    /**
     * Run migration.
     *
     * @return void
     */
    public function up(): void
    {
        $this->schema->create(
            'ffme_companies',
            "
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            code varchar(50) NOT NULL,
            email varchar(255) NULL,
            phone varchar(50) NULL,
            address text NULL,
            status varchar(20) NOT NULL DEFAULT 'active',
            created_at datetime NOT NULL,
            updated_at datetime NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY code (code)
            "
        );
    }

    /**
     * Reverse migration.
     *
     * @return void
     */
    public function down(): void
    {
        $this->schema->drop(
            'ffme_companies'
        );
    }
}