<?php

declare(strict_types=1);

namespace FoodForestERP\UI\Components;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * FFME Modal Component.
 *
 * Reusable modal dialog renderer.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class Modal
{
    /**
     * Render modal start.
     *
     * @param string $id
     * @param string $title
     *
     * @return void
     */
    public static function open(
        string $id,
        string $title
    ): void {

        ?>

        <div
            id="<?php echo esc_attr($id); ?>"
            class="ffme-modal"
            style="display:none;"
        >

            <div class="ffme-modal-overlay"></div>


            <div class="ffme-modal-content">


                <div class="ffme-modal-header">

                    <h2>
                        <?php echo esc_html($title); ?>
                    </h2>


                    <button
                        type="button"
                        class="ffme-modal-close"
                    >
                        ×
                    </button>


                </div>


                <div class="ffme-modal-body">

        <?php
    }


    /**
     * Render modal end.
     *
     * @return void
     */
    public static function close(): void
    {
        ?>

                </div>

            </div>

        </div>

        <?php
    }
}