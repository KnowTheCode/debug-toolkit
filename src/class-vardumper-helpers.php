<?php
/**
 * VarDumper Helpers - a collection of helper functionality.
 *
 * @package     KnowTheCode\DebugToolkit
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://github.com/KnowTheCode/debug-toolkit
 * @license     GNU-2.0+
 */

namespace KnowTheCode\DebugToolkit;

use Closure;
use InvalidArgumentException;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class VarDumper_Helpers
 *
 * @package KnowTheCode\DebugToolkit
 */
class VarDumper_Helpers {

	/**
	 * Array of VarDumper configuration parameters.
	 *
	 * @var array
	 */
	private static $config;

	/**
	 * VarDumper handler.
	 *
	 * @var Closure
	 */
	protected static $handler;

	/**
	 * Run the var dumper.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @param mixed $var Variable to dump.
	 */
	public static function dump( $var ) {
		static::set_styles();
		VarDumper::dump( $var );
	}

	/**
	 * Run the var dumper.
	 *
	 * @since  1.0.0
	 * @access private
	 *
	 * @param mixed $var Variable to dump.
	 */
	public static function dump_and_die( $var ) {
		static::dump( $var );
		die();
	}

	/**
	 * Sets the VarDumper HTML Dumper's styles.
	 *
	 * @since  1.0.0
	 *
	 * @return null bails out when cli or handler is already set.
	 */
	private static function set_styles() {
		// Bail out.
		if ( in_array( PHP_SAPI, [ 'cli', 'phpdbg' ], true ) ) {
			return;
		}

		if ( null !== static::$handler ) {
			return;
		}

		$cloner = new VarCloner();
		$dumper = new HtmlDumper();

		$dumper->setStyles( static::get_config( 'styles' ) );
		static::$handler = function( $var ) use ( $cloner, $dumper ) {
			$dumper->dump( $cloner->cloneVar( $var ) );
		};
		VarDumper::setHandler( static::$handler );
	}

	/**
	 * Gets the VarDumper's configuration or a specific configuration parameter.
	 *
	 * @since  1.0.0
	 *
	 * @param string $key Optional. Parameter's key to return.
	 *
	 * @return mixed
	 * @throws  InvalidArgumentException If the key does not exist, an error is thrown.
	 */
	private static function get_config( $key = '' ) {
		if ( empty( static::$config ) ) {
			/**
			 * Filter the VarDumper configuration parameters.
			 *
			 * @since 1.0.0
			 *
			 * @param array Array of configuration parameters for the VarDump component.
			 */
			static::$config = apply_filters( 'debug_toolkit_set_html_dumper_config', (array) require _get_plugin_root_dir() . '/config/var-dumper.php' );
		}

		if ( empty( $key ) ) {
			return static::$config;
		}

		if ( ! array_key_exists( $key, static::$config ) ) {
			$message = __( 'The key [$s] does not exist in the config:', 'debugtoolkit' );
			$message = sprintf( $message, $key );
			throw new InvalidArgumentException(
				esc_html( $message . ': ' ) .
				print_r( static::$config, true ) // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
			);
		}

		return static::$config[ $key ];
	}
}
