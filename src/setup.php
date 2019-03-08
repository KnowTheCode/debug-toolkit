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

use Kint;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Set up the plugin.
 *
 * @since  1.0.0
 * @access private
 */
function _setup_plugin() {
	_setup_whoops();
	_setup_admin_bar();
	_register_kint_aliases();
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

/**
 * Register helper functions with Kint.
 *
 * Per Kint:
 * "Some Kint features (Variable names, modifiers, mini trace) only work if Kint
 * knows where it was called from. But Kint can't know that if it doesn't know
 * what the helper function is called. Add your functions to `Kint::$aliases`."
 *
 * @since  1.0.0
 * @access private
 */
function _register_kint_aliases() {
	$aliases = [
		'dump',
		'dump_and_die',
		'trace',
		'trace_dump',
		'trace_dump_and_die',
		'dd',
		'ddd',
		'traced',
		'tracedd',
		'traceddd',
	];

	foreach ( $aliases as $alias ) {
		Kint::$aliases[] = $alias; // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	}
}
