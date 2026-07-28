<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

use FoodForestERP\Admin\Assets;
use FoodForestERP\Admin\Menu;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Main Plugin Kernel.
 *
 * Coordinates the entire FFME application lifecycle.
 *
 * @package FoodForestERP
 * @since 0.3.0
 */
final class Plugin
{
    /**
     * Singleton instance.
     *
     * @var Plugin|null
     */
    private static ?Plugin $instance = null;

    /**
     * Application instance.
     *
     * @var Application
     */
    private Application $application;

    /**
     * Service container.
     *
     * @var Container
     */
    private Container $container;

    /**
     * Module loader.
     *
     * @var Loader
     */
    private Loader $loader;

    /**
     * Private constructor.
     */
    private function __construct()
    {
        $this->container   = new Container();
        $this->loader      = new Loader();
        $this->application = Application::instance();
    }

    /**
     * Get plugin instance.
     *
     * @return self
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Boot the plugin.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->application->boot();

        (new Menu())->boot();
        (new Assets())->boot();
    }

    /**
     * Get application instance.
     *
     * @return Application
     */
    public function application(): Application
    {
        return $this->application;
    }

    /**
     * Get service container.
     *
     * @return Container
     */
    public function container(): Container
    {
        return $this->container;
    }

    /**
     * Get module loader.
     *
     * @return Loader
     */
    public function loader(): Loader
    {
        return $this->loader;
    }

    /**
     * Plugin activation callback.
     *
     * @return void
     */
    public static function activate(): void
    {
        flush_rewrite_rules();
    }

    /**
     * Plugin deactivation callback.
     *
     * @return void
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}