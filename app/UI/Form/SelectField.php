<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Select Field Component.
 *
 * Reusable select dropdown renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class SelectField
{
    /**
     * Render select field.
     *
     * @param string $name
     * @param string $label
     * @param array<string,string> $options
     * @param string $selected
     * @param array<string,mixed> $settings
     *
     * @return void
     */
    public static function render(
        string $name,
        string $label,
        array $options,
        string $selected = '',
        array $settings = []
    ): void {

        $required = ! empty($settings['required']);

        $description = $settings['description'] ?? '';

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


            <select
                name="<?php echo esc_attr($name); ?>"
                id="<?php echo esc_attr($name); ?>"
                class="regular-text"
                <?php echo $required ? 'required' : ''; ?>
            >

                <?php foreach ($options as $value => $text) : ?>

                    <option
                        value="<?php echo esc_attr($value); ?>"
                        <?php selected($selected, $value); ?>
                    >

                        <?php echo esc_html($text); ?>

                    </option>

                <?php endforeach; ?>


            </select>


            <?php if (! empty($description)) : ?>

                <p class="description">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>


        </div>

        <?php
    }
}