<?php

declare(strict_types=1);

namespace FoodForestERP\Config;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Default configuration values.
 *
 * @package FoodForestERP
 * @since 0.4.1
 */
final class Defaults
{
    /**
     * Get default configuration.
     *
     * @return array<string, mixed>
     */
    public static function all(): array
    {
        return [

            'plugin_name' => 'FoodForest Manufacturing ERP',

            'version' => defined('FFME_VERSION')
                ? FFME_VERSION
                : '0.4.1',

            'textdomain' => 'ffme',

            'capability' => 'manage_options',

            'menu_slug' => 'ffme',

            'debug' => false,

        ];
    }
}