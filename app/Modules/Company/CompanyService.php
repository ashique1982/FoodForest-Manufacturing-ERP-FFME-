<?php

declare(strict_types=1);

namespace FoodForestERP\Modules\Company;

use FoodForestERP\Modules\Company\Models\CompanyModel;
use InvalidArgumentException;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Company Service.
 *
 * Handles company business logic.
 *
 * @package FoodForestERP
 * @since 0.6.0
 */
final class CompanyService
{
    /**
     * Company model.
     *
     * @var CompanyModel
     */
    private CompanyModel $model;


    /**
     * Constructor.
     *
     * @param CompanyModel $model
     */
    public function __construct(CompanyModel $model)
    {
        $this->model = $model;
    }


    /**
     * Get all companies.
     *
     * @return array<int, object>
     */
    public function getAll(): array
    {
        return $this->model->all();
    }


    /**
     * Get company by ID.
     *
     * @param int $id
     *
     * @return object|null
     */
    public function get(int $id): ?object
    {
        return $this->find($id);
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
        return $this->model->find($id);
    }


    /**
     * Create new company.
     *
     * @param array<string, mixed> $data
     *
     * @return int
     */
    public function create(array $data): int
    {
        $this->validate($data);

        return $this->model->create($data);
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
        $this->validate($data);

        return $this->model->update(
            $id,
            $data
        );
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
        return $this->model->delete($id);
    }


    /**
     * Validate company data.
     *
     * @param array<string, mixed> $data
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    private function validate(array $data): void
    {
        if (empty($data['name'])) {
            throw new InvalidArgumentException(
                'Company name is required.'
            );
        }


        if (empty($data['code'])) {
            throw new InvalidArgumentException(
                'Company code is required.'
            );
        }
    }
}