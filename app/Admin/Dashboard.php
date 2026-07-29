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
 * @since   0.5.0
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

            <h1>
                <?php esc_html_e('FoodForest Manufacturing ERP', 'ffme'); ?>
            </h1>

            <p>
                <?php esc_html_e(
                    'Welcome to FoodForest Manufacturing ERP.',
                    'ffme'
                ); ?>
            </p>

            <hr>

            <h2>
                <?php esc_html_e('System Information', 'ffme'); ?>
            </h2>

            <table class="widefat striped">

                <tbody>

                    <tr>
                        <th>
                            <?php esc_html_e('Plugin Version', 'ffme'); ?>
                        </th>

                        <td>
                            <?php echo esc_html(
                                defined('FFME_VERSION')
                                    ? FFME_VERSION
                                    : 'Unknown'
                            ); ?>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            <?php esc_html_e('PHP Version', 'ffme'); ?>
                        </th>

                        <td>
                            <?php echo esc_html(PHP_VERSION); ?>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            <?php esc_html_e('WordPress Version', 'ffme'); ?>
                        </th>

                        <td>
                            <?php echo esc_html(
                                get_bloginfo('version')
                            ); ?>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            <?php esc_html_e('Database Prefix', 'ffme'); ?>
                        </th>

                        <td>
                            <?php echo esc_html(
                                $GLOBALS['wpdb']->prefix
                            ); ?>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            <?php esc_html_e('Site URL', 'ffme'); ?>
                        </th>

                        <td>
                            <?php echo esc_html(
                                site_url()
                            ); ?>
                        </td>
                    </tr>

                </tbody>

            </table>


            <hr>


            <h2>
                <?php esc_html_e('FFME Modules', 'ffme'); ?>
            </h2>


            <table class="widefat striped">

                <tbody>

                    <tr>
                        <th>
                            <?php esc_html_e('Core System', 'ffme'); ?>
                        </th>

                        <td>
                            ✅ <?php esc_html_e('Active', 'ffme'); ?>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            <?php esc_html_e('Database Framework', 'ffme'); ?>
                        </th>

                        <td>
                            ✅ <?php esc_html_e('Ready', 'ffme'); ?>
                        </td>
                    </tr>


                    <tr>
                        <th>
                            <?php esc_html_e('Admin Panel', 'ffme'); ?>
                        </th>

                        <td>
                            ✅ <?php esc_html_e('Active', 'ffme'); ?>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>
        <?php
    }
}