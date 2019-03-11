=== Debug Toolkit ===
Contributors: hellofromTonya
Donate link: https://KnowTheCode.io
Tags: debug, debugger, var_dump, print_r, backtrace, trace, debug_backtrace
Requires at least: 4.9
Tested up to: 5.1
Stable tag: 1.0.1
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Code debug made easier and more enjoyable.

== Description ==

Debug Toolkit makes debugging your code easier and more enjoyable.  It provides you with interactive and helpful tools:

* Better PHP error interface from ([Whoops](http://filp.github.io/whoops/))
* Better variable inspection - no need to use `var_dump`, `print_r`, or X-debug
* An interactive way to back trace the program's execution order

== Better PHP Error Interface from Whoops ==

The built-in PHP error container is basic and not as helpful as it could be.  On top of that, it's rather ugly. Wouldn't you agree?

Whoops gives you a cool interface that is helpful, interactive, and quite nice to look at.  Some features:

* Provides the error message and links to search Google, DuckDuckGo, and Stack Overflow.
* Shows the actual code where the error occurred.
* Provides an interactive call stack.  Click each and the actual code appears in the viewer panel.
* Environment and details including GET Data, POST Data, Files, Cookie, Session, Server/Request Data, Environment Variables, and Registered Handlers.

See the tools in action in this video

https://vimeo.com/322351688

== Better Variable Inspection ==

Though X-debug is powerful, it can be difficult to set up and run.  For that reason, it's common to dump or print out the variable to browser.  But the built-in display for the PHP `var_dump` and `print_r` is basic.

This plugin includes both two very popular variable dumper tools:

* [VarDumper from Symfony](https://symfony.com/doc/current/components/var_dumper.html)
* [Kint - a modern and powerful PHP debugging helper](https://kint-php.github.io/kint/)

VarDumper provides a simple container that displays where you place it.

On the other hand, Kint provides a more powerful interface that gives you more information such as printing out the expression that was passed into it, the data type, memory size, and the value.

To make it even easier, the following utility functions are available for you to use in your code:

= Available Functions for Inspecting Variable Values =

Let's explore the functions that are available for you through this plugin.  We'll use the variable inspectors to dump `global $post`.

Note: You can pass in any variable or function that returns a value.

Dumps the given variable(s):

`global $post;

// VarDumper
vdump( $post );

// Kint
dump( $post );`

 Dumps the given variable(s) and then exits the program's execution:

`global $post;

// VarDumper
vdump_and_die( $post );

// Kint
dump_and_die( $post );`

In addition, there are alias (shorthand) functions available for you if you prefer shorter function names:

* `vd()` is an alias for `vdump()`
* `vdd()` and `vdd()` are aliases for `vdump_and_die()`
* `d()` is an alias for `dump()`
* `dd()` and `ddd()` are aliases for `dump_and_die()`

== Tracing Call Stack ==

When debugging, there are times when you need to see the order in which functions were called that lead to a certain point in the program.  PHP offers a backtrace that traces back the execution order from the point when the function is invoked.

To make backtracing easier, this plugin provides you with a `trace()` function and combines it with the variable inspect functions.

For example, if you wanted to trace the call stack to the start of the loop in your theme's `functions.php` file, you could use this code:

`add_action( 'loop_start', function() {
	trace();
} );`

= Available Trace Functions =

Place these functions at the point where you want to trace the call stack.

* `trace();`
* `trace_vdump();` - Combines `trace()` and `vdump()`
* `trace_dump();` - Combines `trace()` and `dump()`
* `trace_vdump_and_die();` - Combines `trace()` and `vdump_and_die()`
* `trace_dump_and_die();` - Combines `trace()` and `dump_and_die()`

In addition, there are alias (shorthand) functions available for you if you prefer shorter function names:

* `tracevd();` - Combines `trace()` and `vd()`
* `traced();` - Combines `trace()` and `d()`
* `tracevdd();` - Combines `trace()` and `vdd()`
* `tracedd();` - Combines `trace()` and `dd()`
* `tracevddd();` - Combines `trace()` and `vddd()`
* `traceddd();` - Combines `trace()` and `ddd()`

== Admin Bar ==

"DEBUG ACTIVE" indicator displays in the WordPress admin bar to alert you when the plugin is active.

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins > Add New'
2. Search for 'Debug Toolkit'
3. Activate Debug Toolkit from your Plugins page.

== Frequently Asked Questions ==

= How do I use this utility? =

When you are testing or debugging your code, you can use any of the functions above in place of var_dump( $var ) and print_r( $var ).  No need to wrap it in pre's either.

= What version of PHP do I need? =

PHP 5.6, 7.0, 7.1, 7.2, and up.

= Can I run this on a live site? =

I wouldn't unless you are testing.  This tool is for debug only.  Once you push the site live, deactivate and delete this plugin.

= What should I do when the site goes live? =

Deactivate and delete this plugin.

== Screenshots ==

1. The better PHP error interface from Whoops.
1. The results of running `vdump()` and `vdump_and_die()`.
1. The results of running `dump()` and `dump_and_die()`.
1. The results of running `trace()`.

== ChangeLog ==

= Version 1.0.1 =
* Removed changing the admin color palette.
* Removed changing the admin bar background color.

= Version 1.0.0 =
* First release

== Upgrade Notice ==

= Version 1.0.0 =
First release
