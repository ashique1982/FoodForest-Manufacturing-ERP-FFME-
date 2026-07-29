<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

use InvalidArgumentException;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Service Container.
 *
 * Registers and resolves application services.
 *
 * @package FoodForestERP
 * @since 0.4.2
 */
final class Container
{
    /**
     * Registered services.
     *
     * @var array<string, mixed>
     */
    private array $services = [];

    /**
     * Register a service.
     *
     * @param string $id
     * @param mixed  $service
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function set(string $id, mixed $service): void
    {
        if ($this->has($id)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Service "%s" is already registered.',
                    $id
                )
            );
        }

        $this->services[$id] = $service;
    }

    /**
     * Get a registered service.
     *
     * @param string $id
     *
     * @throws InvalidArgumentException
     *
     * @return mixed
     */
    public function get(string $id): mixed
    {
        if (! $this->has($id)) {
            throw new InvalidArgumentException(
                sprintf(
                    'Service "%s" is not registered.',
                    $id
                )
            );
        }

        return $this->services[$id];
    }

    /**
     * Determine whether a service exists.
     *
     * @param string $id
     *
     * @return bool
     */
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }

    /**
     * Remove a registered service.
     *
     * @param string $id
     *
     * @return void
     */
    public function remove(string $id): void
    {
        unset($this->services[$id]);
    }

    /**
     * Remove all registered services.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->services = [];
    }

    /**
     * Get all registered services.
     *
     * @return array<string, mixed>
     */
    public function services(): array
    {
        return $this->services;
    }

    /**
     * Count registered services.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->services);
    }
}