<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Badge Component.
 *
 * Reusable status badge renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Badge
{
    /**
     * Render badge.
     *
     * @param string $text
     * @param string $type
     *
     * @return void
     */
    public static function render(
        string $text,
        string $type = 'default'
    ): void {

        $allowed = [
            'success',
            'danger',
            'warning',
            'info',
            'default',
        ];


        if (! in_array($type, $allowed, true)) {
            $type = 'default';
        }

        ?>

        <span class="<?php echo esc_attr(
            'ffme-badge ffme-badge-' . $type
        ); ?>">

            <?php echo esc_html($text); ?>

        </span>

        <?php
    }


    /**
     * Convert status to badge type.
     *
     * @param string $status
     *
     * @return string
     */
    public static function statusType(
        string $status
    ): string {

        return match ($status) {

            'active',
            'approved',
            'completed'
                => 'success',

            'inactive',
            'cancelled',
            'rejected'
                => 'danger',

            'pending',
            'draft'
                => 'warning',

            default
                => 'default',
        };
    }
}