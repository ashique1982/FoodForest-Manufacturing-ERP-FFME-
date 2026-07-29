<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Form;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME File Upload Component.
 *
 * Reusable media upload field renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class FileUpload
{
    /**
     * Render file upload field.
     *
     * @param string $name
     * @param string $label
     * @param int $attachmentId
     * @param array<string,mixed> $options
     *
     * @return void
     */
    public static function render(
        string $name,
        string $label,
        int $attachmentId = 0,
        array $options = []
    ): void {

        $required = ! empty($options['required']);

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


            <input
                type="hidden"
                name="<?php echo esc_attr($name); ?>"
                id="<?php echo esc_attr($name); ?>"
                value="<?php echo esc_attr(
                    (string) $attachmentId
                ); ?>"
            >


            <button
                type="button"
                class="button ffme-upload-button"
                data-target="<?php echo esc_attr($name); ?>"
            >

                <?php esc_html_e(
                    'Select File',
                    'ffme'
                ); ?>

            </button>


            <?php if ($attachmentId) : ?>

                <div class="ffme-file-preview">

                    <?php echo wp_get_attachment_image(
                        $attachmentId,
                        'thumbnail'
                    ); ?>

                </div>

            <?php endif; ?>


            <?php if (! empty($description)) : ?>

                <p class="description">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>


        </div>

        <?php
    }
}