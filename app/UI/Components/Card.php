<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Card Component.
 *
 * Reusable content container.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Card
{
    /**
     * Render card start.
     *
     * @param string $title
     *
     * @return void
     */
    public static function open(string $title = ''): void
    {
        ?>

        <div class="ffme-card">

            <?php if (! empty($title)) : ?>

                <div class="ffme-card-header">

                    <h2>
                        <?php echo esc_html($title); ?>
                    </h2>

                </div>

            <?php endif; ?>


            <div class="ffme-card-body">

        <?php
    }


    /**
     * Render card end.
     *
     * @return void
     */
    public static function close(): void
    {
        ?>

            </div>

        </div>

        <?php
    }
}