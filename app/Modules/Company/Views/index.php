<?php

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}

?>

<div class="wrap">

    <h1>

        <?php esc_html_e('Companies', 'ffme'); ?>

        <a
            href="<?php echo esc_url(
                admin_url('admin.php?page=ffme-company-create')
            ); ?>"
            class="page-title-action"
        >

            <?php esc_html_e('Add New Company', 'ffme'); ?>

        </a>

    </h1>

    <p>
        <?php esc_html_e(
            'Manage your companies from here.',
            'ffme'
        ); ?>
    </p>

    <hr>

    <table class="widefat striped">

        <thead>

            <tr>

                <th>
                    <?php esc_html_e('ID', 'ffme'); ?>
                </th>

                <th>
                    <?php esc_html_e('Company Name', 'ffme'); ?>
                </th>

                <th>
                    <?php esc_html_e('Code', 'ffme'); ?>
                </th>

                <th>
                    <?php esc_html_e('Status', 'ffme'); ?>
                </th>

                <th>
                    <?php esc_html_e('Created', 'ffme'); ?>
                </th>

                <th>
                    <?php esc_html_e('Actions', 'ffme'); ?>
                </th>

            </tr>

        </thead>

        <tbody>

        <?php if (! empty($companies)) : ?>

            <?php foreach ($companies as $company) : ?>

                <tr>

                    <td>
                        <?php echo esc_html($company->id); ?>
                    </td>

                    <td>
                        <?php echo esc_html($company->name); ?>
                    </td>

                    <td>
                        <?php echo esc_html($company->code); ?>
                    </td>

                    <td>
                        <?php echo esc_html($company->status); ?>
                    </td>

                    <td>
                        <?php echo esc_html($company->created_at); ?>
                    </td>

                    <td>

                        <a href="<?php echo esc_url(
                            admin_url(
                                'admin.php?page=ffme-company-profile&id=' . $company->id
                            )
                        ); ?>">

                            <?php esc_html_e('Profile', 'ffme'); ?>

                        </a>

                        |

                        <a href="<?php echo esc_url(
                            admin_url(
                                'admin.php?page=ffme-company-edit&id=' . $company->id
                            )
                        ); ?>">

                            <?php esc_html_e('Edit', 'ffme'); ?>

                        </a>

                        |

                        <a
                            href="<?php echo esc_url(
                                wp_nonce_url(
                                    admin_url(
                                        'admin-post.php?action=ffme_delete_company&id=' . $company->id
                                    ),
                                    'ffme_delete_company'
                                )
                            ); ?>"
                            onclick="return confirm('<?php esc_attr_e(
                                'Are you sure you want to delete this company?',
                                'ffme'
                            ); ?>');"
                        >

                            <?php esc_html_e('Delete', 'ffme'); ?>

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <tr>

                <td colspan="6">

                    <?php esc_html_e(
                        'No companies found.',
                        'ffme'
                    ); ?>

                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>