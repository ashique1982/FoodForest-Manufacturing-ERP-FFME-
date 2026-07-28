<?php

declare(strict_types=1);

namespace FoodForestERP\Contracts;

/**
 * Base repository contract.
 *
 * @package FoodForestERP
 * @since 0.4.2
 */
interface RepositoryInterface
{
    /**
     * Get all records.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Find a record by ID.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id): mixed;
}