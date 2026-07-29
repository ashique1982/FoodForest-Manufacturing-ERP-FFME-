<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

use FoodForestERP\Admin\Assets;
use FoodForestERP\Admin\Menu;
use FoodForestERP\Contracts\Bootable;
use FoodForestERP\Database\Migrator;
use FoodForestERP\Database\Migrations\CreateCompaniesTable;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Main Plugin Kernel.
 *
 * Coordinates the complete FFME application lifecycle.
 *
 * @package FoodForestERP
 * @since 0.5.0
 */
final class Plugin implements Bootable
{
    /**
     * Singleton instance.
     *
     * @var self|null
     */
    private static ?self $instance = null;

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
        $this->application = Application::instance();
        $this->container   = new Container();
        $this->loader      = new Loader();
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

        $this->registerModules();

        $this->loader->boot();
    }

    /**
     * Register plugin modules.
     *
     * @return void
     */
    private function registerModules(): void
    {
        $this->loader->register(
            'admin.menu',
            new Menu()
        );

        $this->loader->register(
            'admin.assets',
            new Assets()
        );
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
        $migrator = new Migrator();

        $migrator->register(
            new CreateCompaniesTable()
        );

        $migrator->run();

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