=== Debug Toolkit ===
Contributors: hellofromTonya
Donate link: https://KnowTheCode.io
Tags: debug, debugger, var_dump, print_r, backtrace, trace, debug_backtrace
Requires at least: 3.5
Tested up to: 5.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Code debug made easier and more enjoyable.

== Description ==

Code debug made easier and more enjoyable.  This WordPress plugin includes a suite of developer essential tools to debug your code:

* [Whoops - the "PHP errors for cool kids"](http://filp.github.io/whoops/)
* [VarDumper from Symfony](https://symfony.com/doc/current/components/var_dumper.html)
* [Kint - a modern and powerful PHP debugging helper](https://kint-php.github.io/kint/)
* "DEBUG ACTIVE" indicator in the WordPress admin bar to let you know the plugin is activated.

== Whoops - An Awesome PHP Error Tool ==

The built-in PHP error container is basic and not as helpful as it could be.  On top of that, it's rather ugly. Wouldn't you agree?

Whoops gives you a cool interface that is helpful, interactive, and quite nice to look at.  Some features:

* Provides the error message and links to search Google, DuckDuckGo, and Stack Overflow.
* Shows the actual code where the error occurred.
* Provides an interactive call stack.  Click each and the actual code appears in the viewer panel.
* Environment and details including GET Data, POST Data, Files, Cookie, Session, Server/Request Data, Environment Variables, and Registered Handlers.

== Handy Tools for Exploring Variable Values ==

This plugin provides two different tools for exploring the value in a variable:

* VarDumper from Symfony
* Kint

VarDumper provides a simple container that displays where you place it.

Kint gathers all the data and displayed it at the bottom of the screen as a fixed position container.  It also provides a call stack, which can be handy, and tracing functionality if you need it.

= Which one should you use? =

It depends.

1. You want to simply display the contents of a variable: Use VarDumper's functions, i.e. `vdump()`, `vd()`, `vdd()`, or `vddd()`.
2. You want the call stack in addition to the variable:  Use Kint's functions: `d()`, `dd()`, or `ddd()`.

= Functions =

| Task      | VarDumper | Kint     |
| :---        | :---    | :---  |
| Dumps the given variable(s) | `vd( mixed $var );` | `d( mixed $var [ , mixed $var2, ...] );` |
| Dumps the given variable(s) | `vdump( mixed $var );` | `Kint::dump( mixed $var [ , mixed $var2, ...] );` |
| Dumps and dies   | `vdd( mixed $var );` | `dd( mixed $var [ , mixed $var2, ...] );` |
| Dumps and dies   | `vddd( mixed $var );` | `ddd( mixed $var [ , mixed $var2, ...] );` |
| Dumps and dies   | `vddd( mixed $var );` | `ddd( mixed $var [ , mixed $var2, ...] );` |
| Dumps plain text | na | `s( mixed $var [ , mixed $var2, ...] );` |
| Dumps debug trace | na | `Kint::trace();` |

== Admin Bar ==

"DEBUG ACTIVE" indicator displays in the WordPress admin bar to alert you when the plugin is active.

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins > Add New'
2. Search for 'Debug Toolkit'
3. Activate Debug Toolkit from your Plugins page.

= Once Activated =

Whenever you want to dump out the data within a variable, simply use `d( $var )` to replace when you do pre + var_dump().

To dump and die, you use `ddd( $var );`.

== Frequently Asked Questions ==

= How do I use this utility? =

When you are testing your code, you use d( $var ) in place of var_dump( $var ) and print_r( $var ).  No need to wrap it in pre's either.

= What does it render in the browser? =

Kint provides a handy UI that wraps up the data within the variable.  Click to open it up and see the data.

See the [screenshot 1](http://wordpress.org/extend/plugins/kint-php-debugger/screenshots/) for an example.

= What else does Kint provide to help me debug? =

As you can see the [screenshot 1](http://wordpress.org/extend/plugins/kint-php-debugger/screenshots/), besides the handy UI, it also provides you with a full call stack.  Click on the text below the UI to expand it out.

= Can I run this on a live site? =

I wouldn't unless you are testing.  This tool is for debug only.  Once you push the site live, deactivate and delete this plugin.

= What should I do when the site goes live? =

Deactivate and delete this plugin.

== Screenshots ==

1. An example of what gets rendered in the browser when using 'd( $var )'.
2. Profile example from Kint.
3. "DEBUG ACTIVE" indicator in the WordPress admin bar.

== ChangeLog ==

= Version 1.0.0 =

* First release

== Upgrade Notice ==
