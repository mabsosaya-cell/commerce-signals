<?php
/**
 * Plugin Name: Commerce Signals
 * Description: Profit and business signals for WooCommerce.
 * Version: 0.1.0
 * Author: Kim Kanghoon
 * License: GPL v2 or later
 * Text Domain: commerce-signals
 */

if (!defined('ABSPATH')) {
    exit;
}

define('CS_VERSION', '0.1.0');
define('CS_PATH', plugin_dir_path(__FILE__));
define('CS_URL', plugin_dir_url(__FILE__));

require_once CS_PATH . 'includes/class-activator.php';
require_once CS_PATH . 'includes/class-loader.php';

register_activation_hook(
    __FILE__,
    ['CS_Activator', 'activate']
);

CS_Loader::init();