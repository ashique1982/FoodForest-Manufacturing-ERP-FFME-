<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Main Plugin Kernel.
 *
 * This class coordinates the application's lifecycle.
 *
 * @package FoodForestERP
 * @since 0.2.0
 */
final class Plugin
{
    /**
     * Plugin instance.
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
        $this->container  = new Container();
        $this->loader     = new Loader();
        $this->application = Application::instance();
    }

    /**
     * Get plugin instance.
     *
     * @return Plugin
     */
    public static function instance(): Plugin
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Boot plugin.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->application::boot();
    }

    /**
     * Get container.
     *
     * @return Container
     */
    public function container(): Container
    {
        return $this->container;
    }

    /**
     * Get loader.
     *
     * @return Loader
     */
    public function loader(): Loader
    {
        return $this->loader;
    }

    /**
     * Activation callback.
     *
     * @return void
     */
    public static function activate(): void
    {
        flush_rewrite_rules();
    }

    /**
     * Deactivation callback.
     *
     * @return void
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}