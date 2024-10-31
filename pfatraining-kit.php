<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://knowhalim.com
 * @since             1.0.0
 * @package           Pfatraining_Kit
 *
 * @wordpress-plugin
 * Plugin Name:       Psychological First Aid Training kit
 * Plugin URI:        https://knowhalim.com/app/
 * Description:       Equip yourself with the essential skills to provide immediate emotional support to those in crisis with our Psychological First Aid Training Kit plugin. Download for free now.
 * Version:           1.0.0
 * Author:            Knowhalim
 * Author URI:        https://knowhalim.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pfatraining-kit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PFATRAINING_KIT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pfatraining-kit-activator.php
 */
function activate_pfatraining_kit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pfatraining-kit-activator.php';
	Pfatraining_Kit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pfatraining-kit-deactivator.php
 */
function deactivate_pfatraining_kit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pfatraining-kit-deactivator.php';
	Pfatraining_Kit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pfatraining_kit' );
register_deactivation_hook( __FILE__, 'deactivate_pfatraining_kit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pfatraining-kit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pfatraining_kit() {

	$plugin = new Pfatraining_Kit();
	$plugin->run();

}
run_pfatraining_kit();
