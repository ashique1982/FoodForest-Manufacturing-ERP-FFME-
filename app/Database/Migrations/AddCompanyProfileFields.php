<?php

declare(strict_types=1);

namespace FoodForestERP\Database\Migrations;

use FoodForestERP\Database\Migration;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Add Company Profile Fields Migration.
 *
 * @package FoodForestERP
 */
final class AddCompanyProfileFields extends Migration
{
    /**
     * Run migration.
     *
     * @return void
     */
    public function up(): void
    {
        global $wpdb;


        $table = $wpdb->prefix . 'ffme_companies';


        $columns = [
            "ADD COLUMN short_name varchar(100) NULL",
            "ADD COLUMN company_type varchar(100) NULL",
            "ADD COLUMN industry varchar(150) NULL",

            "ADD COLUMN registration_no varchar(100) NULL",
            "ADD COLUMN trade_license varchar(100) NULL",
            "ADD COLUMN tin varchar(100) NULL",
            "ADD COLUMN bin varchar(100) NULL",

            "ADD COLUMN logo varchar(255) NULL",
            "ADD COLUMN banner varchar(255) NULL",

            "ADD COLUMN country varchar(100) DEFAULT 'Bangladesh'",
            "ADD COLUMN currency varchar(50) DEFAULT 'BDT'",
            "ADD COLUMN fiscal_year varchar(50) NULL",
            "ADD COLUMN timezone varchar(100) DEFAULT 'Asia/Dhaka'",

            "ADD COLUMN description text NULL",

            "ADD COLUMN founder_name varchar(150) NULL",
            "ADD COLUMN managing_director varchar(150) NULL",
            "ADD COLUMN ceo varchar(150) NULL",

            "ADD COLUMN created_by bigint(20) NULL",
            "ADD COLUMN updated_at datetime NULL",
        ];


        foreach ($columns as $column) {

            $exists = $wpdb->get_results(
                "SHOW COLUMNS FROM {$table} LIKE '" .
                explode(' ', $column)[2] .
                "'"
            );


            if (empty($exists)) {

                $wpdb->query(
                    "ALTER TABLE {$table} {$column}"
                );

            }
        }
    }


    /**
     * Rollback migration.
     *
     * @return void
     */
    public function down(): void
    {
        // Future rollback support.
    }
}