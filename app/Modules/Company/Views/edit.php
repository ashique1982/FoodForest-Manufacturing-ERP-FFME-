<?php

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}

?>

<div class="wrap">

    <h1>
        <?php esc_html_e('Edit Company', 'ffme'); ?>
    </h1>


    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

        <?php wp_nonce_field('ffme_update_company'); ?>


        <input 
            type="hidden" 
            name="action" 
            value="ffme_update_company"
        >


        <input 
            type="hidden" 
            name="id" 
            value="<?php echo esc_attr($company->id); ?>"
        >


        <table class="form-table">

            <tbody>

                <tr>
                    <th>
                        <label for="name">
                            <?php esc_html_e('Company Name', 'ffme'); ?>
                        </label>
                    </th>

                    <td>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="regular-text"
                            value="<?php echo esc_attr($company->name); ?>"
                            required
                        >
                    </td>
                </tr>


                <tr>
                    <th>
                        <label for="code">
                            <?php esc_html_e('Company Code', 'ffme'); ?>
                        </label>
                    </th>

                    <td>
                        <input
                            type="text"
                            name="code"
                            id="code"
                            class="regular-text"
                            value="<?php echo esc_attr($company->code); ?>"
                            required
                        >
                    </td>
                </tr>


                <tr>
                    <th>
                        <label for="email">
                            <?php esc_html_e('Email', 'ffme'); ?>
                        </label>
                    </th>

                    <td>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="regular-text"
                            value="<?php echo esc_attr($company->email); ?>"
                        >
                    </td>
                </tr>


                <tr>
                    <th>
                        <label for="phone">
                            <?php esc_html_e('Phone', 'ffme'); ?>
                        </label>
                    </th>

                    <td>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            class="regular-text"
                            value="<?php echo esc_attr($company->phone); ?>"
                        >
                    </td>
                </tr>


                <tr>
                    <th>
                        <label for="address">
                            <?php esc_html_e('Address', 'ffme'); ?>
                        </label>
                    </th>

                    <td>
                        <textarea
                            name="address"
                            id="address"
                            class="large-text"
                            rows="4"
                        ><?php echo esc_textarea($company->address); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <th>
                        <label for="status">
                            <?php esc_html_e('Status', 'ffme'); ?>
                        </label>
                    </th>

                    <td>

                        <select name="status" id="status">

                            <option value="active"
                                <?php selected($company->status, 'active'); ?>
                            >
                                <?php esc_html_e('Active', 'ffme'); ?>
                            </option>


                            <option value="inactive"
                                <?php selected($company->status, 'inactive'); ?>
                            >
                                <?php esc_html_e('Inactive', 'ffme'); ?>
                            </option>

                        </select>

                    </td>
                </tr>


            </tbody>

        </table>


        <?php submit_button(
            __('Update Company', 'ffme')
        ); ?>


    </form>

</div>