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
 * @since 0.8.0
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
        /**
         * Load only FFME pages.
         */
        if (
            strpos(
                $hook_suffix,
                'ffme'
            ) === false
        ) {
            return;
        }


        /**
         * Company Profile CSS.
         */
        if (
            isset($_GET['page']) &&
            $_GET['page'] === 'ffme-company-profile'
        ) {

            wp_enqueue_style(
                'ffme-company-profile',
                FFME_PLUGIN_URL .
                'assets/css/company-profile.css',
                [],
                FFME_VERSION
            );

        }


        /**
         * Future FFME Admin CSS.
         */
        wp_enqueue_style(
            'ffme-admin',
            FFME_PLUGIN_URL .
            'assets/css/admin.css',
            [],
            FFME_VERSION
        );


        /**
         * Future FFME Admin JS.
         */
        wp_enqueue_script(
            'ffme-admin',
            FFME_PLUGIN_URL .
            'assets/js/admin.js',
            [
                'jquery'
            ],
            FFME_VERSION,
            true
        );
    }
}