<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Text Field Component.
 *
 * Reusable text input renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class TextField
{
    /**
     * Render text field.
     *
     * @param string $name
     * @param string $label
     * @param string $value
     * @param array<string,mixed> $options
     *
     * @return void
     */
    public static function render(
        string $name,
        string $label,
        string $value = '',
        array $options = []
    ): void {

        $type = $options['type'] ?? 'text';

        $placeholder = $options['placeholder'] ?? '';

        $required = ! empty($options['required']);

        $description = $options['description'] ?? '';

        ?>

        <div class="ffme-field">

            <label
                for="<?php echo esc_attr($name); ?>"
            >

                <?php echo esc_html($label); ?>


                <?php if ($required) : ?>

                    <span class="required">
                        *
                    </span>

                <?php endif; ?>

            </label>


            <input
                type="<?php echo esc_attr($type); ?>"
                name="<?php echo esc_attr($name); ?>"
                id="<?php echo esc_attr($name); ?>"
                value="<?php echo esc_attr($value); ?>"
                placeholder="<?php echo esc_attr($placeholder); ?>"
                class="regular-text"
                <?php echo $required ? 'required' : ''; ?>
            >


            <?php if (! empty($description)) : ?>

                <p class="description">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>


        </div>

        <?php
    }
}