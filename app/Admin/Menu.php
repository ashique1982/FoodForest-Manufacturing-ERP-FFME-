<?php

declare(strict_types=1);

namespace FoodForestERP\Admin;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Admin Menu.
 *
 * Registers the FFME admin menu.
 *
 * @package FoodForestERP
 * @since   0.3.0
 */
final class Menu
{
    /**
     * Register hooks.
     *
     * @return void
     */
    public function boot(): void
    {
        add_action(
            'admin_menu',
            [$this, 'register']
        );
    }

    /**
     * Register admin menu.
     *
     * @return void
     */
    public function register(): void
    {
        add_menu_page(
            __('FoodForest ERP', 'ffme'),
            __('FoodForest ERP', 'ffme'),
            'manage_options',
            'ffme',
            [Dashboard::class, 'render'],
            'dashicons-database',
            26
        );
    }
}