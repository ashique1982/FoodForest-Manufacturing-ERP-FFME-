<?php

declare(strict_types=1);

namespace FoodForestERP\Modules\Company;

use FoodForestERP\Contracts\Bootable;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Company Module.
 *
 * Handles company management module lifecycle.
 *
 * @package FoodForestERP
 * @since 0.6.0
 */
final class Company implements Bootable
{
    /**
     * Boot company module.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerHooks();
    }

    /**
     * Register module hooks.
     *
     * @return void
     */
    private function registerHooks(): void
    {
        add_action(
            'init',
            [$this, 'init']
        );
    }

    /**
     * Initialize company module.
     *
     * @return void
     */
    public function init(): void
    {
        // Company module initialization.
        // Future:
        // - Controllers
        // - Admin pages
        // - Services
        // - Permissions
    }
}