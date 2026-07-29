<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

use FoodForestERP\Contracts\Bootable;
use InvalidArgumentException;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Module Loader.
 *
 * Registers and boots all bootable components.
 *
 * @package FoodForestERP
 * @since 0.4.2
 */
final class Loader
{
    /**
     * Registered bootable components.
     *
     * @var array<string, Bootable>
     */
    private array $modules = [];

    /**
     * Indicates whether the loader has already booted.
     *
     * @var bool
     */
    private bool $booted = false;

    /**
     * Register a bootable component.
     *
     * @param string   $name
     * @param Bootable $module
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function register(string $name, Bootable $module): void
    {
        if (isset($this->modules[$name])) {
            throw new InvalidArgumentException(
                sprintf(
                    'Module "%s" is already registered.',
                    $name
                )
            );
        }

        $this->modules[$name] = $module;
    }

    /**
     * Boot all registered components.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->booted) {
            return;
        }

        foreach ($this->modules as $module) {
            $module->boot();
        }

        $this->booted = true;
    }

    /**
     * Determine whether the loader has booted.
     *
     * @return bool
     */
    public function isBooted(): bool
    {
        return $this->booted;
    }

    /**
     * Get all registered components.
     *
     * @return array<string, Bootable>
     */
    public function modules(): array
    {
        return $this->modules;
    }

    /**
     * Get a registered component.
     *
     * @param string $name
     *
     * @return Bootable|null
     */
    public function get(string $name): ?Bootable
    {
        return $this->modules[$name] ?? null;
    }

    /**
     * Determine whether a component exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($this->modules[$name]);
    }

    /**
     * Count registered components.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->modules);
    }
}