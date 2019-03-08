<?php
/**
 * VarDumper Functions.
 *      vdump()
 *      vdump_and_die()
 *      trace_vdump()
 *      trace_vdump_and_die()
 *
 * Shorthand aliases:
 *      vd()
 *      vdd()
 *      vddd()
 *      tracevd()
 *      tracevdd()
 *      tracevddd()
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

require_once __DIR__ . '/class-vardumper-helpers.php';

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- Function names are intentational here.

if ( ! function_exists( 'vdump' ) ) {
	/**
	 * Dumps the given variable.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdump( $var ) {
		VarDumper_Helpers::dump( $var );
	}
}

if ( ! function_exists( 'vdump_and_die' ) ) {
	/**
	 * Dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdump_and_die( $var ) {
		VarDumper_Helpers::dump_and_die( $var );
	}
}

/**
 * Dumps the backtrace at the point where this function is invoked
 * AND then dumps the given variable.
 *
 * Combines trace() and vdump().
 *
 * @since 1.0.0
 *
 * @param mixed $var Variable to dump.
 */
function trace_vdump( $var ) {
	trace();

	vdump( $var );
}

if ( ! function_exists( 'trace_vdump_and_die' ) ) {
	/**
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * Combines trace() and vdump_and_die().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function trace_vdump_and_die( $var ) {
		trace();

		vdump_and_die( $var );
	}
}

if ( ! function_exists( 'vd' ) ) {
	/**
	 * Alias of vdump().
	 *
	 * Dumps the given variable.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vd( $var ) {
		vdump( $var );
	}
}

if ( ! function_exists( 'vdd' ) ) {
	/**
	 * Alias of vdump_and_die().
	 *
	 * Dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * Alternative to vddd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdd( $var ) {
		vdump_and_die( $var );
	}
}

if ( ! function_exists( 'vddd' ) ) {
	/**
	 * Alias of vdump_and_die().
	 *
	 * Dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * Alternative to vdd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vddd( $var ) {
		vdd( $var );
	}
}

if ( ! function_exists( 'tracevd' ) ) {
	/**
	 * Alias of trace_vdump().
	 *
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function tracevd( $var ) {
		trace_vdump( $var );
	}
}

if ( ! function_exists( 'tracevdd' ) ) {
	/**
	 * Alias of trace_vdump_and_die().
	 *
	 * Alternative to tracevddd() for those who are used to ddd().
	 *
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function tracevdd( $var ) {
		trace_vdump_and_die( $var );
	}
}

if ( ! function_exists( 'tracevddd' ) ) {
	/**
	 * Alias of trace_vdump_and_die().
	 *
	 * Alternative to tracevdd() for those who are used to dd().
	 *
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function tracevddd( $var ) {
		trace_vdump_and_die( $var );
	}
}
