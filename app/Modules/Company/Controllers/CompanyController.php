<?php

declare(strict_types=1);

namespace FoodForestERP\Modules\Company\Controllers;

use FoodForestERP\Contracts\Bootable;
use FoodForestERP\Modules\Company\CompanyService;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Company Controller.
 *
 * Handles company admin operations.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class CompanyController implements Bootable
{
    /**
     * Company service.
     *
     * @var CompanyService
     */
    private CompanyService $service;


    /**
     * Constructor.
     *
     * @param CompanyService $service
     */
    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }


    /**
     * Boot controller.
     *
     * @return void
     */
    public function boot(): void
    {
        add_action(
            'admin_menu',
            [$this, 'registerMenu']
        );


        add_action(
            'admin_post_ffme_create_company',
            [$this, 'store']
        );


        add_action(
            'admin_post_ffme_update_company',
            [$this, 'update']
        );


        add_action(
            'admin_post_ffme_delete_company',
            [$this, 'delete']
        );
    }


    /**
     * Register menus.
     *
     * @return void
     */
    public function registerMenu(): void
    {
        add_submenu_page(
            'ffme',
            __('Companies', 'ffme'),
            __('Companies', 'ffme'),
            'manage_options',
            'ffme-companies',
            [$this, 'index']
        );


        add_submenu_page(
            'ffme',
            __('Add Company', 'ffme'),
            __('Add Company', 'ffme'),
            'manage_options',
            'ffme-company-create',
            [$this, 'create']
        );


        add_submenu_page(
            'ffme',
            __('Edit Company', 'ffme'),
            __('Edit Company', 'ffme'),
            'manage_options',
            'ffme-company-edit',
            [$this, 'edit']
        );
    }


    /**
     * Company list.
     *
     * @return void
     */
    public function index(): void
    {
        $companies = $this->service->getAll();

        include FFME_PLUGIN_DIR .
            'app/Modules/Company/Views/index.php';
    }


    /**
     * Create form.
     *
     * @return void
     */
    public function create(): void
    {
        include FFME_PLUGIN_DIR .
            'app/Modules/Company/Views/create.php';
    }


    /**
     * Edit form.
     *
     * @return void
     */
    public function edit(): void
    {
        $id = absint(
            $_GET['id'] ?? 0
        );


        $company = $this->service->find(
            $id
        );


        if (! $company) {
            wp_die(
                __('Company not found.', 'ffme')
            );
        }


        include FFME_PLUGIN_DIR .
            'app/Modules/Company/Views/edit.php';
    }


    /**
     * Store company.
     *
     * @return void
     */
    public function store(): void
    {
        $this->checkPermission();


        check_admin_referer(
            'ffme_create_company'
        );


        $this->service->create(
            $this->sanitizeData()
        );


        wp_safe_redirect(
            admin_url(
                'admin.php?page=ffme-companies'
            )
        );

        exit;
    }


    /**
     * Update company.
     *
     * @return void
     */
    public function update(): void
    {
        $this->checkPermission();


        check_admin_referer(
            'ffme_update_company'
        );


        $id = absint(
            $_POST['id'] ?? 0
        );


        $this->service->update(
            $id,
            $this->sanitizeData()
        );


        wp_safe_redirect(
            admin_url(
                'admin.php?page=ffme-companies'
            )
        );

        exit;
    }


    /**
     * Delete company.
     *
     * @return void
     */
    public function delete(): void
    {
        $this->checkPermission();


        check_admin_referer(
            'ffme_delete_company'
        );


        $id = absint(
            $_GET['id'] ?? 0
        );


        if ($id > 0) {

            $this->service->delete(
                $id
            );

        }


        wp_safe_redirect(
            admin_url(
                'admin.php?page=ffme-companies'
            )
        );

        exit;
    }


    /**
     * Check permission.
     *
     * @return void
     */
    private function checkPermission(): void
    {
        if (! current_user_can('manage_options')) {

            wp_die(
                __('Permission denied.', 'ffme')
            );

        }
    }


    /**
     * Sanitize company data.
     *
     * @return array<string,string>
     */
    private function sanitizeData(): array
    {
        return [

            'name' => sanitize_text_field(
                $_POST['name'] ?? ''
            ),


            'code' => sanitize_text_field(
                $_POST['code'] ?? ''
            ),


            'email' => sanitize_email(
                $_POST['email'] ?? ''
            ),


            'phone' => sanitize_text_field(
                $_POST['phone'] ?? ''
            ),


            'address' => sanitize_textarea_field(
                $_POST['address'] ?? ''
            ),


            'status' => sanitize_text_field(
                $_POST['status'] ?? 'active'
            ),

        ];
    }
}