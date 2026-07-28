<?php

declare(strict_types=1);

namespace FoodForestERP\Admin;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Admin Dashboard.
 *
 * Renders the main FFME dashboard page.
 *
 * @package FoodForestERP
 * @since   0.3.0
 */
final class Dashboard
{
    /**
     * Render dashboard page.
     *
     * @return void
     */
    public static function render(): void
    {
        ?>
        <div class="wrap">

            <h1><?php esc_html_e('FoodForest Manufacturing ERP', 'ffme'); ?></h1>

            <p>
                <?php esc_html_e(
                    'Welcome to FoodForest Manufacturing ERP.',
                    'ffme'
                ); ?>
            </p>

            <hr>

            <h2><?php esc_html_e('System Information', 'ffme'); ?></h2>

            <table class="widefat striped">
                <tbody>

                    <tr>
                        <th><?php esc_html_e('Plugin Version', 'ffme'); ?></th>
                        <td><?php echo esc_html(FFME_VERSION); ?></td>
                    </tr>

                    <tr>
                        <th><?php esc_html_e('PHP Version', 'ffme'); ?></th>
                        <td><?php echo esc_html(PHP_VERSION); ?></td>
                    </tr>

                    <tr>
                        <th><?php esc_html_e('WordPress Version', 'ffme'); ?></th>
                        <td><?php echo esc_html(get_bloginfo('version')); ?></td>
                    </tr>

                </tbody>
            </table>

        </div>
        <?php
    }
}