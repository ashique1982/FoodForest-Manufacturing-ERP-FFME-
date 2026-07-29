<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Button Component.
 *
 * Reusable button renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Button
{
    /**
     * Render button.
     *
     * @param string $text
     * @param string $type
     * @param string $url
     * @param array<string,string> $attributes
     *
     * @return void
     */
    public static function render(
        string $text,
        string $type = 'primary',
        string $url = '',
        array $attributes = []
    ): void {

        $allowed = [
            'primary',
            'secondary',
            'success',
            'danger',
            'warning',
            'default',
        ];


        if (! in_array($type, $allowed, true)) {
            $type = 'default';
        }


        $class = sprintf(
            'ffme-button ffme-button-%s',
            $type
        );


        if (! empty($url)) {

            ?>

            <a href="<?php echo esc_url($url); ?>"
               class="<?php echo esc_attr($class); ?>">

                <?php echo esc_html($text); ?>

            </a>

            <?php

            return;
        }

        ?>

        <button
            type="<?php echo esc_attr(
                $attributes['type'] ?? 'button'
            ); ?>"
            class="<?php echo esc_attr($class); ?>"
        >

            <?php echo esc_html($text); ?>

        </button>

        <?php
    }


    /**
     * Render submit button.
     *
     * @param string $text
     *
     * @return void
     */
    public static function submit(
        string $text = 'Save'
    ): void {

        self::render(
            $text,
            'primary',
            '',
            [
                'type' => 'submit',
            ]
        );
    }


    /**
     * Render delete button.
     *
     * @param string $url
     *
     * @return void
     */
    public static function delete(
        string $url
    ): void {

        self::render(
            'Delete',
            'danger',
            $url
        );
    }
}