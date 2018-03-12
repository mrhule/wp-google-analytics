<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/mrhule
 * @since      1.0.0
 *
 * @package    Rhule_Wp_Google_Analytics
 * @subpackage Rhule_Wp_Google_Analytics/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rhule_Wp_Google_Analytics
 * @subpackage Rhule_Wp_Google_Analytics/includes
 * @author     Matthew Rhule <mfrhule@gmail.com>
 */
class Rhule_Wp_Google_Analytics_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rhule-wp-google-analytics',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
