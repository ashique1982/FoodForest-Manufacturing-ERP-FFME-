<?php

declare(strict_types=1);

namespace FoodForestERP\Admin;

use FoodForestERP\Contracts\Bootable;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Admin Assets.
 *
 * Loads CSS and JavaScript for FFME admin pages.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Assets implements Bootable
{
    /**
     * Boot admin assets.
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
        // Only load assets on FFME pages.
        if (strpos($hook_suffix, 'ffme') === false) {
            return;
        }

        // CSS and JS will be registered here in future versions.
    }
}