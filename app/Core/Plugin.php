<?php

declare(strict_types=1);

namespace FoodForestERP\Core;

use FoodForestERP\Admin\Assets;
use FoodForestERP\Admin\Menu;
use FoodForestERP\Contracts\Bootable;
use FoodForestERP\Database\Migrator;
use FoodForestERP\Database\Migrations\CreateCompaniesTable;
use FoodForestERP\Modules\Company\Models\CompanyModel;
use FoodForestERP\Modules\Company\CompanyService;
use FoodForestERP\Modules\Company\Controllers\CompanyController;
use FoodForestERP\Modules\Company\Controllers\CompanyProfileController;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Main Plugin Kernel.
 *
 * Coordinates FFME application lifecycle.
 *
 * @package FoodForestERP
 * @since 0.8.0
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
     * Container instance.
     *
     * @var Container
     */
    private Container $container;


    /**
     * Loader instance.
     *
     * @var Loader
     */
    private Loader $loader;


    /**
     * Constructor.
     */
    private function __construct()
    {
        $this->application = Application::instance();

        $this->container = new Container();

        $this->loader = new Loader();
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
     * Boot plugin.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->application->boot();

        $this->registerServices();

        $this->registerModules();

        $this->loader->boot();
    }


    /**
     * Register services.
     *
     * @return void
     */
    private function registerServices(): void
    {
        $companyModel = new CompanyModel();


        $companyService = new CompanyService(
            $companyModel
        );


        $this->container->set(
            'company.service',
            $companyService
        );
    }


    /**
     * Register modules.
     *
     * @return void
     */
    private function registerModules(): void
    {

        /*
        |--------------------------------------------------------------------------
        | Admin
        |--------------------------------------------------------------------------
        */

        $this->loader->register(
            'admin.menu',
            new Menu()
        );


        $this->loader->register(
            'admin.assets',
            new Assets()
        );


        /*
        |--------------------------------------------------------------------------
        | Company Module
        |--------------------------------------------------------------------------
        */


        $companyService = $this->container->get(
            'company.service'
        );


        $this->loader->register(
            'company.controller',
            new CompanyController(
                $companyService
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Company Profile Module
        |--------------------------------------------------------------------------
        */


        $this->loader->register(
            'company.profile.controller',
            new CompanyProfileController(
                $companyService
            )
        );

    }


    /**
     * Get application.
     *
     * @return Application
     */
    public function application(): Application
    {
        return $this->application;
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
     * Plugin activation.
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
     * Plugin deactivation.
     *
     * @return void
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}