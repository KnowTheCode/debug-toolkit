<?php
/**
 * Kint Functions:
 *      dump()
 *      dump_and_die()
 *      trace()
 *      trace_dump()
 *      trace_dump_and_die()
 *
 * Shorthand aliases:
 *      d() - packaged with Kint (not in this file)
 *      dd()
 *      ddd()
 *      traced()
 *      tracedd()
 *      traceddd()
 *
 * @package     KnowTheCode\DebugToolkit
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://github.com/KnowTheCode/debug-toolkit
 * @license     GNU-2.0+
 */

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- Function names are intentational here.

if ( ! function_exists( 'dump' ) ) {
	/**
	 * Dumps the given variable(s).
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function dump( $var ) {
		call_user_func_array( [ 'Kint', 'dump' ], func_get_args() );
	}
}

if ( ! function_exists( 'dump_and_die' ) ) {
	/**
	 * Dumps the given variable(s)
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function dump_and_die( $var ) {
		call_user_func_array( [ 'Kint', 'dump' ], func_get_args() );
		die();
	}
}

if ( ! function_exists( 'trace' ) ) {
	/**
	 * Dumps the backtrace at the point where this function is invoked.
	 *
	 * @since 1.0.0
	 */
	function trace() {
		Kint::trace();
	}
}

if ( ! function_exists( 'trace_dump' ) ) {
	/**
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable.
	 *
	 * Combines trace() and dump().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function trace_dump( $var ) {
		trace();

		call_user_func_array( [ 'Kint', 'dump' ], func_get_args() );
	}
}

if ( ! function_exists( 'trace_dump_and_die' ) ) {
	/**
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * Combines trace() and dump_and_die().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function trace_dump_and_die( $var ) {
		trace();

		call_user_func_array( 'dump_and_die', func_get_args() );
	}
}

if ( ! function_exists( 'dd' ) ) {
	/**
	 * Alias of dump_and_die(): Dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function dd( $var ) {
		call_user_func_array( 'dump_and_die', func_get_args() );
	}
}

if ( ! function_exists( 'ddd' ) ) {
	/**
	 * Alias of dump_and_die(): Dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * Alternative to dd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function ddd( $var ) {
		call_user_func_array( 'dump_and_die', func_get_args() );
	}
}

if ( ! function_exists( 'traced' ) ) {
	/**
	 * Alias of trace_dump().
	 *
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function traced( $var ) {
		call_user_func_array( 'trace_vdump_and_die', func_get_args() );
	}
}

if ( ! function_exists( 'tracedd' ) ) {
	/**
	 * Alias of trace_dump_and_die().
	 *
	 * Alternative to tracedd() for those who are used to dd().
	 *
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function trace_dd( $var ) {
		call_user_func_array( 'trace_vdump_and_die', func_get_args() );
	}
}

if ( ! function_exists( 'traceddd' ) ) {
	/**
	 * Alias of trace_dump_and_die().
	 *
	 * Alternative to tracedd() for those who are used to ddd().
	 *
	 * Dumps the backtrace at the point where this function is invoked
	 * AND then dumps the given variable
	 * AND then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function traceddd( $var ) {
		call_user_func_array( 'trace_vdump_and_die', func_get_args() );
	}
}
