<?php

declare(strict_types=1);

namespace FoodForestERP\Modules\Company\Models;

use wpdb;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Company Model.
 *
 * Handles database operations for companies.
 *
 * @package FoodForestERP
 * @since 0.6.0
 */
final class CompanyModel
{
    /**
     * WordPress database instance.
     *
     * @var wpdb
     */
    private wpdb $db;

    /**
     * Database table name.
     *
     * @var string
     */
    private string $table;


    /**
     * Constructor.
     */
    public function __construct()
    {
        global $wpdb;

        $this->db = $wpdb;

        $this->table = $wpdb->prefix . 'ffme_companies';
    }


    /**
     * Get all companies.
     *
     * @return array<int, object>
     */
    public function all(): array
    {
        return $this->db->get_results(
            "SELECT * FROM {$this->table} ORDER BY id DESC"
        );
    }


    /**
     * Find company by ID.
     *
     * @param int $id
     *
     * @return object|null
     */
    public function find(int $id): ?object
    {
        $company = $this->db->get_row(
            $this->db->prepare(
                "SELECT * FROM {$this->table} WHERE id = %d",
                $id
            )
        );

        return $company ?: null;
    }


    /**
     * Create company.
     *
     * @param array<string, mixed> $data
     *
     * @return int
     */
    public function create(array $data): int
    {
        $this->db->insert(
            $this->table,
            [
                'name'       => $data['name'],
                'code'       => $data['code'],
                'email'      => $data['email'] ?? null,
                'phone'      => $data['phone'] ?? null,
                'address'    => $data['address'] ?? null,
                'status'     => $data['status'] ?? 'active',
                'created_at' => current_time('mysql'),
                'updated_at' => current_time('mysql'),
            ]
        );

        return (int) $this->db->insert_id;
    }


    /**
     * Update company.
     *
     * @param int $id
     * @param array<string, mixed> $data
     *
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $result = $this->db->update(
            $this->table,
            [
                'name'       => $data['name'],
                'email'      => $data['email'] ?? null,
                'phone'      => $data['phone'] ?? null,
                'address'    => $data['address'] ?? null,
                'status'     => $data['status'] ?? 'active',
                'updated_at' => current_time('mysql'),
            ],
            [
                'id' => $id,
            ]
        );

        return $result !== false;
    }


    /**
     * Delete company.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $result = $this->db->delete(
            $this->table,
            [
                'id' => $id,
            ]
        );

        return $result !== false;
    }
}