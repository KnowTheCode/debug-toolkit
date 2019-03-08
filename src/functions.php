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
