<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Tabs Component.
 *
 * Reusable tab navigation renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Tabs
{
    /**
     * Render tab navigation.
     *
     * @param array<string,string> $tabs
     * @param string $active
     *
     * @return void
     */
    public static function render(
        array $tabs,
        string $active = ''
    ): void {

        ?>

        <nav class="ffme-tabs">

            <?php foreach ($tabs as $key => $label) : ?>

                <a href="<?php echo esc_url(
                    add_query_arg(
                        'tab',
                        $key
                    )
                ); ?>"
                class="<?php echo esc_attr(
                    $key === $active
                        ? 'active'
                        : ''
                ); ?>">

                    <?php echo esc_html($label); ?>

                </a>

            <?php endforeach; ?>

        </nav>

        <?php
    }


    /**
     * Check active tab.
     *
     * @param string $tab
     *
     * @return bool
     */
    public static function isActive(
        string $tab
    ): bool {

        return (
            isset($_GET['tab']) &&
            sanitize_key($_GET['tab']) === $tab
        );
    }
}