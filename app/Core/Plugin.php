<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Main Plugin Kernel.
 *
 * Coordinates the entire FFME application lifecycle.
 *
 * @package FoodForestERP
 * @since 0.2.0
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
     * Get singleton instance.
     *
     * @return Plugin
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
    }

    /**
     * Get the application instance.
     *
     * @return Application
     */
    public function application(): Application
    {
        return $this->application;
    }

    /**
     * Get the service container.
     *
     * @return Container
     */
    public function container(): Container
    {
        return $this->container;
    }

    /**
     * Get the module loader.
     *
     * @return Loader
     */
    public function loader(): Loader
    {
        return $this->loader;
    }

    /**
     * Runs when the plugin is activated.
     *
     * @return void
     */
    public static function activate(): void
    {
        flush_rewrite_rules();
    }

    /**
     * Runs when the plugin is deactivated.
     *
     * @return void
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}