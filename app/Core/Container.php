<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Simple Service Container.
 *
 * @package FoodForestERP
 * @since 0.2.0
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
     * @param string $key
     * @param mixed  $service
     *
     * @return void
     */
    public function set(string $key, mixed $service): void
    {
        $this->services[$key] = $service;
    }

    /**
     * Get a registered service.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->services[$key] ?? null;
    }

    /**
     * Check whether a service exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->services);
    }

    /**
     * Remove a service.
     *
     * @param string $key
     *
     * @return void
     */
    public function remove(string $key): void
    {
        unset($this->services[$key]);
    }

    /**
     * Get all registered services.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->services;
    }
}