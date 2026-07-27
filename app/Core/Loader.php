<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

use InvalidArgumentException;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Module Loader.
 *
 * Registers and boots FFME modules.
 *
 * @package FoodForestERP
 * @since 0.2.0
 */
final class Loader
{
    /**
     * Registered modules.
     *
     * @var array<string, object>
     */
    private array $modules = [];

    /**
     * Indicates whether the loader has already booted.
     *
     * @var bool
     */
    private bool $booted = false;

    /**
     * Register a module.
     *
     * @param string $name
     * @param object $module
     *
     * @return void
     */
    public function register(string $name, object $module): void
    {
        if (isset($this->modules[$name])) {
            throw new InvalidArgumentException(
                sprintf('Module "%s" is already registered.', $name)
            );
        }

        $this->modules[$name] = $module;
    }

    /**
     * Boot all registered modules.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->booted) {
            return;
        }

        foreach ($this->modules as $module) {
            if (method_exists($module, 'boot')) {
                $module->boot();
            }
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
     * Get all registered modules.
     *
     * @return array<string, object>
     */
    public function modules(): array
    {
        return $this->modules;
    }

    /**
     * Count registered modules.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->modules);
    }
}