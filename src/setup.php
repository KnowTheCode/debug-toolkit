<?php
/**
 * Set up Whoops.
 *
 * @package     KnowTheCode\DebugToolkit
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://github.com/KnowTheCode/debug-toolkit
 * @license     GNU-2.0+
 */

namespace KnowTheCode\DebugToolkit;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Description.
 *
 * @since  1.0.0
 * @access private
 */
function _setup_plugin() {
	_setup_whoops();
	_setup_admin_bar();
}

/**
 * Set up the Whoops container.
 *
 * @since  1.0.0
 * @access private
 */
function _setup_whoops() {
	$whoops = new Run();
	$whoops->pushHandler( new PrettyPageHandler() );
	$whoops->register();
}

/**
 * Set up the Admin Bar.
 *
 * @since  1.0.0
 * @access private
 */
function _setup_admin_bar() {
	require_once __DIR__ . '/class-admin-bar.php';

	/**
	 * Filter the admin bar configuration parameters.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Array of configuration parameters.
	 */
	$config = apply_filters( 'debug_toolkit_admin_bar_config', (array) require _get_plugin_root_dir() . '/config/admin-bar.php' );

	( new Admin_Bar( $config ) )->init();
}
