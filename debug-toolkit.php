<?php
/**
 * Debug Toolkit - Code debug made easier and more enjoyable.
 *
 * @package      KnowTheCode\DebugToolkit
 * @author       hellofromTonya
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Debug Toolkit
 * Plugin URI:        https://wordpress.org/plugins/debug-toolkit
 * Description:       Code debug made easier and more enjoyable.  A suite of tools to help you debug your code.
 * Version:           1.0.0
 * Author:            hellofromTonya
 * Author URI:        https://KnowTheCode.io
 * Text Domain:       debugtoolkit
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/KnowTheCode/debug-toolkit
 * Requires PHP:      5.6
 * Requires WP:       4.9
 */

namespace KnowTheCode\DebugToolkit;

if ( version_compare( phpversion(), '5.6', '<' ) ) {
	add_action( 'admin_notices', __NAMESPACE__ . '\render_php_version_admin_notice' );
	/**
	 * Render the admin notice if the version of PHP is older.
	 *
	 * @since 1.0.0
	 */
	function render_php_version_admin_notice() {
		?>
		<div class="notice notice-error">
			<p><?php esc_html_e( 'The Debug Toolkit plugin requires PHP 5.6+. Please contact your host to update your PHP version.', 'debugtoolkit' ); ?></p>
		</div>
		<?php
	}
	return;
}

/**
 * Gets the plugin's root directory.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_plugin_root_dir() {
	return __DIR__;
}

/**
 * Load the Admin Bar.
 *
 * @since 1.0.0
 */
function load_admin_bar() {
	require_once __DIR__ . '/src/class-admin-bar.php';

	/**
	 * Filter the admin bar configuration parameters.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Array of configuration parameters.
	 */
	$config = apply_filters( 'debug_toolkit_admin_bar_config', (array) require __DIR__ . '/config/admin-bar.php' );

	( new Admin_Bar( $config ) )->init();
}

require_once __DIR__ . '/vendor/autoload.php';
load_admin_bar();
