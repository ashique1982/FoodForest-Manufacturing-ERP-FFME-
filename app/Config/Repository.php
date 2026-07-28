<?php

declare(strict_types=1);

namespace FoodForestERP\Config;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Configuration repository.
 *
 * @package FoodForestERP
 * @since 0.4.1
 */
final class Repository
{
    /**
     * Configuration items.
     *
     * @var array<string, mixed>
     */
    private array $items = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->items = Defaults::all();
    }

    /**
     * Get config value.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->items[$key] ?? $default;
    }

    /**
     * Set config value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function set(string $key, mixed $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * Get all config values.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->items;
    }
}