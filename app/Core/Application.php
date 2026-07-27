<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main Application Class.
 *
 * Boots the FFME plugin and registers all core services.
 *
 * @package FoodForestERP
 * @since   0.2.0
 */
final class Application
{
    /**
     * Application instance.
     *
     * @var Application|null
     */
    private static ?Application $instance = null;

    /**
     * Plugin version.
     *
     * @var string
     */
    private string $version;

    /**
     * Constructor.
     */
    private function __construct()
    {
        $this->version = defined('FFME_VERSION')
            ? FFME_VERSION
            : '0.2.0';
    }

    /**
     * Get application instance.
     *
     * @return Application
     */
    public static function instance(): Application
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Boot application.
     *
     * @return void
     */
    public static function boot(): void
    {
        self::instance()->registerHooks();
    }

    /**
     * Register WordPress hooks.
     *
     * @return void
     */
    private function registerHooks(): void
    {
        add_action(
            'plugins_loaded',
            [$this, 'pluginsLoaded']
        );
    }

    /**
     * Fired when plugins are loaded.
     *
     * @return void
     */
    public function pluginsLoaded(): void
    {
        load_plugin_textdomain(
            'ffme',
            false,
            dirname(FFME_PLUGIN_BASENAME) . '/languages'
        );
    }

    /**
     * Get plugin version.
     *
     * @return string
     */
    public function version(): string
    {
        return $this->version;
    }
}
