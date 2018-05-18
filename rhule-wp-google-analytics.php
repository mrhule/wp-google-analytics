<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/mrhule
 * @since             1.0.0
 * @package           Rhule_Wp_Google_Analytics
 *
 * @wordpress-plugin
 * Plugin Name:       One Rhule - Wordpress Google Analytics
 * Plugin URI:        https://github.com/mrhule/wp-google-analytics
 * Description:       This is a simple plug in for adding you Google Analytics tracker to a Wordpress site.
 * Version:           1.0.0
 * Author:            Matthew Rhule
 * Author URI:        https://github.com/mrhule
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rhule-wp-google-analytics
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rhule-wp-google-analytics-activator.php
 */
function activate_rhule_wp_google_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rhule-wp-google-analytics-activator.php';
	Rhule_Wp_Google_Analytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rhule-wp-google-analytics-deactivator.php
 */
function deactivate_rhule_wp_google_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rhule-wp-google-analytics-deactivator.php';
	Rhule_Wp_Google_Analytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rhule_wp_google_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_rhule_wp_google_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rhule-wp-google-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rhule_wp_google_analytics() {

	$plugin = new Rhule_Wp_Google_Analytics();
	$plugin->run();

}
run_rhule_wp_google_analytics();


/**
 * Insert GA code into site
 */
function insert_into_footer(){

    $options = get_option('rhule-wp-google-analytics');

	if($options['valid']){
    $ga_code = $options['ga_code'];

?>
<div class="ga-footer">
	<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_code?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $ga_code?>');
</script>

</div>
<?php
//end if
	}else{
		?>
		<script>
			console.log('No GA Code found');
		</script>
		<?php
	}

}

add_action('wp_footer', 'insert_into_footer');
		
