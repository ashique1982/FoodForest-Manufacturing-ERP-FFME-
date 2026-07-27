<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Module Loader.
 *
 * Loads and boots FFME modules.
 *
 * @package FoodForestERP
 * @since 0.2.0
 */
final class Loader
{
    /**
     * Loaded modules.
     *
     * @var array<int, object>
     */
    private array $modules = [];

    /**
     * Register a module.
     *
     * @param object $module
     *
     * @return void
     */
    public function register(object $module): void
    {
        $this->modules[] = $module;
    }

    /**
     * Boot all registered modules.
     *
     * @return void
     */
    public function boot(): void
    {
        foreach ($this->modules as $module) {

            if (method_exists($module, 'boot')) {
                $module->boot();
            }

        }
    }

    /**
     * Get all registered modules.
     *
     * @return array<int, object>
     */
    public function modules(): array
    {
        return $this->modules;
    }
}