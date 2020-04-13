<?php

/*
Plugin Name: Incluyeme Login Extension
Plugin URI: https://github.com/Cro22
Description: Extension de funciones (Registro) para el Plugin WPJob Board
Author: Jesus Nuñez
Version: 1.0.0
Author URI: https://github.com/Cro22
Text Domain: incluyeme-login-extension
Domain Path: /languages
*/

defined('ABSPATH') or exit;
require_once plugin_dir_path(__FILE__) . 'include/active_incluyeme_login.php';
add_action('admin_init', 'incluyeme_requirements_Login_Extension');

function plugin_name_i18n_incluyeme_login()
{
	load_plugin_textdomain('plugin-name', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'plugin_name_i18n_incluyeme_login');

function incluyeme_requirements_Login_Extension()
{
	if (is_admin() && current_user_can('activate_plugins') && !is_plugin_active('wpjobboard/index.php')) {
		add_action('admin_notices', 'incluyemeLogin_notice');
		deactivate_plugins(plugin_basename(__FILE__));
		
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}
	} else {
		incluyeme_login_load();
	}
}

function incluyemeLogin_notice()
{
	?>
	<div class="error"><p> <?php echo __('Sorry, but Incluyeme plugin requires the WPJob Board plugin to be installed and
	                      active.', 'incluyeme'); ?> </p></div>
	<?php
}
