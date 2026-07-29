<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME TextArea Component.
 *
 * Reusable textarea renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class TextArea
{
    /**
     * Render textarea field.
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

        $placeholder = $options['placeholder'] ?? '';

        $rows = $options['rows'] ?? 5;

        $description = $options['description'] ?? '';

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


            <textarea
                name="<?php echo esc_attr($name); ?>"
                id="<?php echo esc_attr($name); ?>"
                rows="<?php echo esc_attr((string) $rows); ?>"
                class="large-text"
                placeholder="<?php echo esc_attr($placeholder); ?>"
                <?php echo $required ? 'required' : ''; ?>
            ><?php echo esc_textarea($value); ?></textarea>


            <?php if (! empty($description)) : ?>

                <p class="description">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>


        </div>

        <?php
    }
}