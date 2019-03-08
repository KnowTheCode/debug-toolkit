<?php
/**
 * Kint and VarDumper Functions.
 *
 * VarDumper functions:
 *      vdump()
 *      vd()
 *      vdd()
 *      vddd()
 *
 *      Note: The `v` prefix separates it from the Kint version.
 *
 * Kint functions:
 *      dd()
 *      ddd()
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
	 * VarDumper: Dumps the given variable(s).
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
	 * VarDumper: Dumps the given variable.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vd( $var ) {
		VarDumper_Helpers::dump( $var );
	}
}

if ( ! function_exists( 'dd' ) ) {
	// Add dd() to Kint.
	Kint::$aliases[] = 'dd'; // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	/**
	 * Kint: Dumps the given variable(s) and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function dd( $var ) {
		$vars = func_get_args();

		if ( count( $vars ) > 1 ) {
			call_user_func_array( [ Kint::class, 'dump' ], $vars );
		} else {
			Kint::dump( $var );
		}

		die();
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

if ( ! function_exists( 'ddd' ) ) {
	// Add ddd() to Kint.
	Kint::$aliases[] = 'ddd'; // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

	/**
	 * Kint: Dumps the given variable and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function ddd( $var ) {
		$vars = func_get_args();

		if ( count( $vars ) > 1 ) {
			call_user_func_array( [ Kint::class, 'dump' ], $vars );
		} else {
			Kint::dump( $var );
		}

		die();
	}
}

if ( ! function_exists( 'vddd' ) ) {
	/**
	 * VarDumper: Dumps the given variable and then ends the execution of the program.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vddd( $var ) {
		VarDumper_Helpers::dump_and_die( $var );
	}
}

if ( ! function_exists( 'trace' ) ) {
	/**
	 * Kint: Renders a backtrace at the point where this function is invoked.
	 *
	 * @since 1.0.0
	 */
	function trace() {
		Kint::trace();
	}
}

if ( ! function_exists( 'dtrace' ) ) {
	/**
	 * Kint: Renders a backtrace at the point where this function is invoked AND dumps the given variable(s).
	 *
	 * Combines trace() and d().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function dtrace( $var ) {
		trace();

		call_user_func_array( 'd', func_get_args() );
	}
}

if ( ! function_exists( 'ddtrace' ) ) {
	/**
	 * Kint: Renders a backtrace at the point where this function is invoked AND dumps the given variable(s).
	 *
	 * Combines trace() and dd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function ddtrace( $var ) {
		trace();

		call_user_func_array( 'dd', func_get_args() );
	}
}

if ( ! function_exists( 'dddtrace' ) ) {
	/**
	 * Kint: Renders a backtrace at the point where this function is invoked AND dumps the given variable(s).
	 *
	 * Combines trace() and ddd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function dddtrace( $var ) {
		trace();

		call_user_func_array( 'ddd', func_get_args() );
	}
}

if ( ! function_exists( 'vdtrace' ) ) {
	/**
	 * Renders a backtrace at the point where this function is invoked AND dumps the given variable.
	 *
	 * Combines trace() and vd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdtrace( $var ) {
		trace();

		vd( $var );
	}
}

if ( ! function_exists( 'vddtrace' ) ) {
	/**
	 * Renders a backtrace at the point where this function is invoked AND dumps the given variable.
	 *
	 * Combines trace() and vdd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vddtrace( $var ) {
		trace();

		vdd( $var );
	}
}

if ( ! function_exists( 'vdddtrace' ) ) {
	/**
	 * Renders a backtrace at the point where this function is invoked AND dumps the given variable.
	 *
	 * Combines trace() and vddd().
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $var Variable to dump.
	 */
	function vdddtrace( $var ) {
		trace();

		vddd( $var );
	}
}
