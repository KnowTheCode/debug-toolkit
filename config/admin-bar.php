<?php
/**
 * Admin Bar Runtime Configuration Parameters.
 *
 * @package     KnowTheCode\DebugToolkit
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://github.com/KnowTheCode/debug-toolkit
 * @license     GNU-2.0+
 */

namespace KnowTheCode\DebugToolkit;

return [
	'message'      => 'DEBUG ACTIVE',
	'color_scheme' => 'coffee',
	'colors'       => [
		'admin_bar_background_color' => '#627f00',
		'message_background_color'   => '#cb4b14',
		'message_hover_color'        => '#1b202d',
	],
	'css_file'     => _get_plugin_root_dir() . '/assets/css/admin-bar.php',
];
