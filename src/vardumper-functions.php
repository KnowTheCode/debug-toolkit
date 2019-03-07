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

use KnowTheCode\DebugToolkit\VarDumper_Helpers;

require_once __DIR__ . '/class-vardumper.php';

if ( ! function_exists( 'vdump' ) ) {
	/**
	 * Dumps the given variable(s).
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdump( $var ) {
		VarDumper_Helpers::dump( $var );
	}
}

if ( ! function_exists( 'vd' ) ) {
	/**
	 * Dumps the given variable(s).
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vd( $var ) {
		VarDumper_Helpers::dump( $var, __FUNCTION__ );
	}
}

if ( ! function_exists( 'vdd' ) ) {
	/**
	 * Dumps the given variable(s) and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdd( $var ) {
		VarDumper_Helpers::dump_and_die( $var );
	}
}

if ( ! function_exists( 'vddd' ) ) {
	/**
	 * Dumps the given variable(s) and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vddd( $var ) {
		VarDumper_Helpers::dump_and_die( $var );
	}
}
