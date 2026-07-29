<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Table Component.
 *
 * Reusable admin table renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Table
{
    /**
     * Render table start.
     *
     * @param array<int,string> $headers
     *
     * @return void
     */
    public static function open(
        array $headers
    ): void {

        ?>

        <table class="widefat striped ffme-table">

            <thead>

                <tr>

                    <?php foreach ($headers as $header) : ?>

                        <th>
                            <?php echo esc_html($header); ?>
                        </th>

                    <?php endforeach; ?>

                </tr>

            </thead>


            <tbody>

        <?php
    }


    /**
     * Render table row.
     *
     * @param array<int,mixed> $columns
     *
     * @return void
     */
    public static function row(
        array $columns
    ): void {

        ?>

        <tr>

            <?php foreach ($columns as $column) : ?>

                <td>
                    <?php echo wp_kses_post($column); ?>
                </td>

            <?php endforeach; ?>

        </tr>

        <?php
    }


    /**
     * Render empty row.
     *
     * @param string $message
     * @param int $columns
     *
     * @return void
     */
    public static function empty(
        string $message,
        int $columns = 1
    ): void {

        ?>

        <tr>

            <td colspan="<?php echo esc_attr($columns); ?>">

                <?php echo esc_html($message); ?>

            </td>

        </tr>

        <?php
    }


    /**
     * Render table end.
     *
     * @return void
     */
    public static function close(): void
    {
        ?>

            </tbody>

        </table>

        <?php
    }
}