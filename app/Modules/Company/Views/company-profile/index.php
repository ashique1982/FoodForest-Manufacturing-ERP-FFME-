<?php

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap">

    <h1 class="wp-heading-inline">
        <?php echo esc_html($company->name); ?>
    </h1>

    <a
        href="<?php echo esc_url(
            admin_url('admin.php?page=ffme-companies')
        ); ?>"
        class="page-title-action"
    >
        <?php esc_html_e('← Back to Companies', 'ffme'); ?>
    </a>

    <hr class="wp-header-end">

    <div class="ffme-company-summary">

        <table class="widefat striped">

            <tbody>

                <tr>
                    <th width="220">
                        <?php esc_html_e('Company Name', 'ffme'); ?>
                    </th>

                    <td>
                        <?php echo esc_html($company->name); ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <?php esc_html_e('Company Code', 'ffme'); ?>
                    </th>

                    <td>
                        <?php echo esc_html($company->code); ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <?php esc_html_e('Status', 'ffme'); ?>
                    </th>

                    <td>
                        <?php echo esc_html(ucfirst($company->status)); ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <?php esc_html_e('Current Tab', 'ffme'); ?>
                    </th>

                    <td>
                        <strong><?php echo esc_html(ucfirst($tab)); ?></strong>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>