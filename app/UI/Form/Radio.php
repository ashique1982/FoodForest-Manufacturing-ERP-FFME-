<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Radio Component.
 *
 * Reusable radio button renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Radio
{
    /**
     * Render radio field.
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

        $description = $settings['description'] ?? '';

        ?>

        <div class="ffme-field">

            <label>

                <?php echo esc_html($label); ?>

            </label>


            <div class="ffme-radio-group">


                <?php foreach ($options as $value => $text) : ?>


                    <label>

                        <input
                            type="radio"
                            name="<?php echo esc_attr($name); ?>"
                            value="<?php echo esc_attr($value); ?>"
                            <?php checked(
                                $selected,
                                $value
                            ); ?>
                        >


                        <?php echo esc_html($text); ?>


                    </label>


                <?php endforeach; ?>


            </div>


            <?php if (! empty($description)) : ?>

                <p class="description">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>


        </div>

        <?php
    }
}