<?php
/**
 * Plugin Name: FoodForest Manufacturing ERP
 * Plugin URI:  https://github.com/ashique1982/FoodForest-Manufacturing-ERP-FFME-
 * Description: Professional Manufacturing ERP for WordPress.
 * Version:     0.3.0
 * Requires at least: 6.7
 * Requires PHP: 8.2
 * Author: FoodForest
 * Author URI: https://github.com/ashique1982
 * License: Proprietary
 * Text Domain: ffme
 * Domain Path: /languages
 */

declare(strict_types=1);

if (! defined('ABSPATH')) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Plugin Constants
|--------------------------------------------------------------------------
*/

define('FFME_VERSION', '0.2.0');
define('FFME_PLUGIN_FILE', __FILE__);
define('FFME_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FFME_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FFME_PLUGIN_BASENAME', plugin_basename(__FILE__));

/*
|--------------------------------------------------------------------------
| Composer Autoloader
|--------------------------------------------------------------------------
*/

$autoload = FFME_PLUGIN_DIR . 'vendor/autoload.php';

if (! file_exists($autoload)) {

	add_action(
		'admin_notices',
		static function (): void {

			echo '<div class="notice notice-error"><p>';
			echo esc_html__(
				'FoodForest Manufacturing ERP requires Composer dependencies. Please run composer install.',
				'ffme'
			);
			echo '</p></div>';
		}
	);

	return;
}

require_once $autoload;

use FoodForestERP\Core\Plugin;

/*
|--------------------------------------------------------------------------
| Activation / Deactivation
|--------------------------------------------------------------------------
*/

register_activation_hook(
	__FILE__,
	[ Plugin::class, 'activate' ]
);

register_deactivation_hook(
	__FILE__,
	[ Plugin::class, 'deactivate' ]
);

/*
|--------------------------------------------------------------------------
| Boot Plugin
|--------------------------------------------------------------------------
*/

Plugin::instance()->boot();