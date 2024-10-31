<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://knowhalim.com
 * @since      1.0.0
 *
 * @package    Pfatraining_Kit
 * @subpackage Pfatraining_Kit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Pfatraining_Kit
 * @subpackage Pfatraining_Kit/includes
 * @author     Knowhalim <contact@knowhalim.com>
 */
class Pfatraining_Kit_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'pfatraining-kit',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
