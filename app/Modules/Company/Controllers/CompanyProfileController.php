<?php

declare(strict_types=1);

namespace FoodForestERP\Modules\Company\Controllers;

use FoodForestERP\Contracts\Bootable;
use FoodForestERP\Modules\Company\CompanyService;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Company Profile Controller.
 *
 * Handles company profile pages.
 *
 * @package FoodForestERP
 * @since 0.8.0
 */
final class CompanyProfileController implements Bootable
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
    public function __construct(
        CompanyService $service
    ) {
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
    }

    /**
     * Register profile page.
     *
     * Hidden page.
     *
     * @return void
     */
    public function registerMenu(): void
    {
        add_submenu_page(
            null,
            __('Company Profile', 'ffme'),
            __('Company Profile', 'ffme'),
            'manage_options',
            'ffme-company-profile',
            [$this, 'profile']
        );
    }

    /**
     * Company profile page.
     *
     * @return void
     */
    public function profile(): void
    {
        if (! current_user_can('manage_options')) {
            wp_die(
                esc_html__(
                    'Permission denied.',
                    'ffme'
                )
            );
        }

        $id = absint(
            $_GET['id'] ?? 0
        );

        if ($id <= 0) {
            wp_die(
                esc_html__(
                    'Invalid company.',
                    'ffme'
                )
            );
        }

        $company = $this->service->get($id);

        if ($company === null) {
            wp_die(
                esc_html__(
                    'Company not found.',
                    'ffme'
                )
            );
        }

        $tab = sanitize_key(
            $_GET['tab'] ?? 'general'
        );

        $allowedTabs = [
            'general',
            'branding',
            'contact',
            'legal',
            'certificates',
            'gallery',
            'settings',
        ];

        if (! in_array($tab, $allowedTabs, true)) {
            $tab = 'general';
        }

        include FFME_PLUGIN_DIR .
'app/Modules/Company/Views/company-profile/index.php';
    }
}