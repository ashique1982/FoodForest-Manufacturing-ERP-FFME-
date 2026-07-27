<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main Application Class.
 *
 * Boots the FFME application and registers core WordPress hooks.
 *
 * @package FoodForestERP
 * @since   0.2.0
 */
final class Application
{
    /**
     * Singleton instance.
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
        $this->version = FFME_VERSION;
    }

    /**
     * Get singleton instance.
     *
     * @return Application
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Boot the application.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerHooks();
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
            [$this, 'onPluginsLoaded']
        );
    }

    /**
     * Runs after all plugins are loaded.
     *
     * @return void
     */
    public function onPluginsLoaded(): void
    {
        load_plugin_textdomain(
            'ffme',
            false,
            dirname(FFME_PLUGIN_BASENAME) . '/languages'
        );

        // Future:
        // $this->loader->boot();
    }

    /**
     * Get plugin version.
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}