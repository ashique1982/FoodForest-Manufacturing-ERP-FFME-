<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Date Field Component.
 *
 * Reusable date input renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class DateField
{
    /**
     * Render date field.
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

        $required = ! empty($options['required']);

        $description = $options['description'] ?? '';

        $min = $options['min'] ?? '';

        $max = $options['max'] ?? '';

        ?>

        <div class="ffme-field">

            <label for="<?php echo esc_attr($name); ?>">

                <?php echo esc_html($label); ?>


                <?php if ($required) : ?>

                    <span class="required">
                        *
                    </span>

                <?php endif; ?>

            </label>


            <input
                type="date"
                name="<?php echo esc_attr($name); ?>"
                id="<?php echo esc_attr($name); ?>"
                value="<?php echo esc_attr($value); ?>"
                class="regular-text"
                <?php echo $required ? 'required' : ''; ?>

                <?php if (! empty($min)) : ?>

                    min="<?php echo esc_attr($min); ?>"

                <?php endif; ?>


                <?php if (! empty($max)) : ?>

                    max="<?php echo esc_attr($max); ?>"

                <?php endif; ?>

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