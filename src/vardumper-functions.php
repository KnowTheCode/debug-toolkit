<?php
/**
 * VarDumper Functions - used in your code:
 *      vdump()
 *      vd()
 *      vdd()
 *      vddd()
 *
 * Note: The `v` prefix separates it from the Kint version.
 *
 * @package     KnowTheCode\DebugToolkit
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://github.com/KnowTheCode/debug-toolkit
 * @license     GNU-2.0+
 */

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\VarDumper;
use function KnowTheCode\DebugToolkit\_get_plugin_root_dir;

if ( ! function_exists( 'vdump' ) ) {
	/**
	 * Dumps the given variable(s).
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 *
	 * @throws InvalidArgumentException If no arguments are passed, throws an error.
	 */
	function vdump( $var ) {
		_dump_var( $var, __FUNCTION__ );
	}
}

if ( ! function_exists( 'vd' ) ) {
	/**
	 * Dumps the given variable(s).
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 *
	 * @throws InvalidArgumentException If no arguments are passed, throws an error.
	 */
	function vd( $var ) {
		_dump_var( $var, __FUNCTION__ );
	}
}

if ( ! function_exists( 'vdd' ) ) {
	/**
	 * Dumps the given variable(s) and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 *
	 * @throws InvalidArgumentException If no arguments are passed, throws an error.
	 */
	function vdd( $var ) {
		_dump_var( $var, __FUNCTION__ );
		die();
	}
}

if ( ! function_exists( 'vddd' ) ) {
	/**
	 * Dumps the given variable(s) and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 *
	 * @throws InvalidArgumentException If no arguments are passed, throws an error.
	 */
	function vddd( $var ) {
		_dump_var( $var, __FUNCTION__ );
		die();
	}
}

/**
 * Run the var dumper.
 *
 * @since  1.0.0
 * @access private
 *
 * @param mixed  $var       Variable to dump.
 * @param string $func_name Name of the calling function.
 *
 * @throws InvalidArgumentException If no arguments are passed, throws an error.
 */
function _dump_var( $var, $func_name ) {

	if ( empty( $var ) ) {
		$message = __( 'No variable passed to the VarDumper function', 'devtoolkit' );
		throw new InvalidArgumentException( esc_html( "{$message} {$func_name}" ) );
		die();
	}

	_set_html_dumper_styles();
	VarDumper::dump( $var );
}

/**
 * Sets the VarDumper HTML Dumper's styles.
 *
 * @since  1.0.0
 * @access private
 *
 * @return null bails out when cli or handler is already set.
 */
function _set_html_dumper_styles() {
	static $handler = null;

	// Bail out.
	if ( in_array( PHP_SAPI, [ 'cli', 'phpdbg' ], true ) ) {
		return;
	}

	if ( null !== $handler ) {
		return;
	}

	$cloner = new VarCloner();
	$dumper = new HtmlDumper();

	$dumper->setStyles( _get_vardumper_config( 'styles' ) );
	$handler = function( $var ) use ( $cloner, $dumper ) {
		$dumper->dump( $cloner->cloneVar( $var ) );
	};

	VarDumper::setHandler( $handler );
}

/**
 * Gets the VarDumper's configuration or a specific configuration parameter.
 *
 * @since  1.0.0
 * @access private
 *
 * @param string $key Optional. Parameter's key to return.
 *
 * @return mixed
 * @throw  InvalidArgumentException If the key does not exist, an error is thrown.
 */
function _get_vardumper_config( $key = '' ) {
	static $config = null;

	if ( empty( $config ) ) {
		/**
		 * Filter the VarDumper configuration parameters.
		 *
		 * @since 1.0.0
		 *
		 * @param array Array of configuration parameters for the VarDump component.
		 */
		$config = apply_filters( 'set_html_dumper_config', (array) require _get_plugin_root_dir() . '/config/var-dumper.php' );
	}

	if ( empty( $key ) ) {
		return $config;
	}

	if ( ! array_key_exists( $key, $config ) ) {
		$message = __( 'The key [$s] does not exist in the config:', 'devtoolkit' );
		$message = sprintf( $message, $key );
		throw new InvalidArgumentException(
			esc_html( $message . ': ' ) . print_r( $config, true )
		);
	}

	return $config[ $key ];
}
