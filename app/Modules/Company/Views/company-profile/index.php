<?php

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}

$logo = ! empty($company->logo)
    ? $company->logo
    : '';

$banner = ! empty($company->banner)
    ? $company->banner
    : '';

$status = $company->status ?? 'inactive';

?>

<div class="wrap ffme-company-profile">


    <!-- Company Cover Header -->

    <div class="ffme-profile-cover">


        <?php if ($banner) : ?>

            <img
                src="<?php echo esc_url($banner); ?>"
                alt="<?php echo esc_attr($company->name); ?>"
                class="ffme-cover-image"
            >

        <?php else : ?>

            <div class="ffme-cover-placeholder">

                <?php esc_html_e(
                    'Company Cover Banner',
                    'ffme'
                ); ?>

            </div>

        <?php endif; ?>


    </div>



    <!-- Company Identity -->

    <div class="ffme-profile-header">


        <div class="ffme-company-logo">


            <?php if ($logo) : ?>


                <img
                    src="<?php echo esc_url($logo); ?>"
                    alt="<?php echo esc_attr($company->name); ?>"
                >


            <?php else : ?>


                <div class="ffme-logo-placeholder">

                    <?php echo esc_html(
                        strtoupper(
                            substr(
                                $company->name,
                                0,
                                1
                            )
                        )
                    ); ?>

                </div>


            <?php endif; ?>


        </div>



        <div class="ffme-company-info">


            <h1>

                <?php echo esc_html(
                    $company->name
                ); ?>


            </h1>



            <?php if (! empty($company->industry)) : ?>

                <p class="description">

                    <?php echo esc_html(
                        $company->industry
                    ); ?>

                </p>

            <?php endif; ?>



            <div class="ffme-profile-badges">


                <?php if ($status === 'active') : ?>


                    <span class="ffme-badge success">

                        <?php esc_html_e(
                            'Active',
                            'ffme'
                        ); ?>

                    </span>


                <?php else : ?>


                    <span class="ffme-badge danger">

                        <?php esc_html_e(
                            'Inactive',
                            'ffme'
                        ); ?>

                    </span>


                <?php endif; ?>



                <?php if (! empty($company->verified)) : ?>


                    <span class="ffme-badge verified">

                        ✓
                        <?php esc_html_e(
                            'Verified',
                            'ffme'
                        ); ?>

                    </span>


                <?php endif; ?>


            </div>


        </div>


    </div>





    <!-- Company Summary -->


    <div class="ffme-profile-summary">


        <div class="ffme-card">


            <strong>

                <?php esc_html_e(
                    'Company Code',
                    'ffme'
                ); ?>

            </strong>


            <span>

                <?php echo esc_html(
                    $company->code ?? '-'
                ); ?>

            </span>


        </div>



        <div class="ffme-card">


            <strong>

                <?php esc_html_e(
                    'Industry',
                    'ffme'
                ); ?>

            </strong>


            <span>

                <?php echo esc_html(
                    $company->industry ?? '-'
                ); ?>

            </span>


        </div>



        <div class="ffme-card">


            <strong>

                <?php esc_html_e(
                    'Created',
                    'ffme'
                ); ?>

            </strong>


            <span>

                <?php echo esc_html(
                    $company->created_at ?? '-'
                ); ?>

            </span>


        </div>


    </div>





    <!-- Profile Tabs -->


    <div class="ffme-profile-tabs">


        <?php

        $tabs = [

            'general' => 'General',

            'branding' => 'Branding',

            'contact' => 'Contact',

            'legal' => 'Legal',

            'certificates' => 'Certificates',

            'verification' => 'Verification',

            'gallery' => 'Gallery',

            'settings' => 'Settings',

        ];

        ?>


        <?php foreach ($tabs as $key => $label) : ?>


            <a href="<?php echo esc_url(
                admin_url(
                    'admin.php?page=ffme-company-profile&id=' .
                    $company->id .
                    '&tab=' .
                    $key
                )
            ); ?>"
            class="<?php echo $tab === $key
                ? 'active'
                : '';
            ?>">


                <?php echo esc_html(
                    $label
                ); ?>


            </a>


        <?php endforeach; ?>


    </div>





    <!-- Tab Content -->


    <div class="ffme-profile-content">


        <?php

        $view = FFME_PLUGIN_DIR .
            'app/Modules/Company/Views/company-profile/' .
            $tab .
            '.php';


        if (file_exists($view)) {

            include $view;

        } else {

            echo '<div class="notice notice-warning"><p>';

            esc_html_e(
                'Profile section not available.',
                'ffme'
            );

            echo '</p></div>';

        }

        ?>


    </div>


</div>