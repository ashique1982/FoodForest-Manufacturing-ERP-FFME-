<?php

declare(strict_types=1);

namespace FoodForestERP\Admin;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Admin Assets.
 *
 * Loads CSS and JavaScript for FFME admin pages.
 *
 * @package FoodForestERP
 * @since   0.3.0
 */
final class Assets
{
    /**
     * Register hooks.
     *
     * @return void
     */
    public function boot(): void
    {
        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue']
        );
    }

    /**
     * Enqueue admin assets.
     *
     * @param string $hook_suffix Current admin page hook.
     *
     * @return void
     */
    public function enqueue(string $hook_suffix): void
    {
        // Assets will be loaded here in future versions.
    }
}