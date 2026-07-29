<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Checkbox Component.
 *
 * Reusable checkbox renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Checkbox
{
    /**
     * Render checkbox field.
     *
     * @param string $name
     * @param string $label
     * @param bool $checked
     * @param array<string,mixed> $options
     *
     * @return void
     */
    public static function render(
        string $name,
        string $label,
        bool $checked = false,
        array $options = []
    ): void {

        $description = $options['description'] ?? '';

        ?>

        <div class="ffme-field ffme-checkbox">

            <label>

                <input
                    type="checkbox"
                    name="<?php echo esc_attr($name); ?>"
                    id="<?php echo esc_attr($name); ?>"
                    value="1"
                    <?php checked($checked); ?>
                >

                <?php echo esc_html($label); ?>

            </label>


            <?php if (! empty($description)) : ?>

                <p class="description">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>


        </div>

        <?php
    }
}