<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Alert Component.
 *
 * Reusable notification message renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Alert
{
    /**
     * Render alert message.
     *
     * @param string $message
     * @param string $type
     *
     * @return void
     */
    public static function render(
        string $message,
        string $type = 'info'
    ): void {

        $allowed = [
            'success',
            'error',
            'warning',
            'info',
        ];


        if (! in_array($type, $allowed, true)) {
            $type = 'info';
        }

        ?>

        <div class="<?php echo esc_attr(
            'ffme-alert ffme-alert-' . $type
        ); ?>">

            <?php echo esc_html($message); ?>

        </div>

        <?php
    }


    /**
     * Success alert.
     *
     * @param string $message
     *
     * @return void
     */
    public static function success(
        string $message
    ): void {

        self::render(
            $message,
            'success'
        );
    }


    /**
     * Error alert.
     *
     * @param string $message
     *
     * @return void
     */
    public static function error(
        string $message
    ): void {

        self::render(
            $message,
            'error'
        );
    }


    /**
     * Warning alert.
     *
     * @param string $message
     *
     * @return void
     */
    public static function warning(
        string $message
    ): void {

        self::render(
            $message,
            'warning'
        );
    }


    /**
     * Info alert.
     *
     * @param string $message
     *
     * @return void
     */
    public static function info(
        string $message
    ): void {

        self::render(
            $message,
            'info'
        );
    }
}