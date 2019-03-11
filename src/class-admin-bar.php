<?php
/**
 * Admin functions to change the look of the admin bar when this plugin
 * is activated, i.e. to differentiate that we are in development mode.
 *
 * @package     KnowTheCode\DebugToolkit
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://github.com/KnowTheCode/debug-toolkit
 * @license     GNU-2.0+
 */

namespace KnowTheCode\DebugToolkit;

/**
 * Class Admin_Bar
 *
 * @package KnowTheCode\DebugToolkit
 */
class Admin_Bar {

	/**
	 * Configuration parameters.
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * Admin_Bar constructor.
	 *
	 * @param array $config Configuration parameters.
	 */
	public function __construct( array $config ) {
		$this->config = $config;
	}

	/**
	 * Initializes by registering each hook's callback to the object.
	 *
	 * @since 1.0.1
	 */
	public function init() {
		add_action( 'admin_bar_menu', [ $this, 'add_admin_bar_notice' ], 9999 );
		add_action( 'admin_bar_init', [ $this, 'render_admin_bar_css' ], 9999 );
	}

	/**
	 * Add an admin bar notice to alert user that they are in local development
	 * and this plugin is activated.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_admin_bar_notice() {
		if ( ! is_admin_bar_showing() ) {
			return;
		}
		global $wp_admin_bar;

		$admin_notice = [
			'parent' => 'top-secondary',
			'id'     => 'environment-notice',
			'title'  => sprintf( '<span class="adminbar--environment-notice">%s</span>', $this->config['message'] ),
		];

		$wp_admin_bar->add_menu( $admin_notice );
	}


	/**
	 * Render the admin bar CSS.
	 *
	 * @since 1.0.1
	 *
	 * @return void
	 */
	public function render_admin_bar_css() {
		if ( ! is_admin_bar_showing() ) {
			return;
		}

		$css =
			'
			.adminbar--environment-notice {
				color: #fff;
			}
							
			@media only screen and ( min-width: 800px ) {
				#wp-admin-bar-environment-notice {
					display: block;
				}
		
				#wp-admin-bar-environment-notice .ab-item {
					background-color: %s !important;
				}
		
				#wp-admin-bar-environment-notice:hover .ab-item {
					background-color: %s !important;
					color: #fff;
				}
			}
			';

		$css = vsprintf( $css, $this->config['colors'] );

		wp_add_inline_style( 'admin-bar', $css );
	}
}
