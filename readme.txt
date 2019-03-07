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


= Handy Tools =

Some handy tools just for the PHP Developer:

* `d( $var );` to render a collapsible UI container which displays your variable data in "the most informative way"
* `ddd( $var );` same as d() except that it also executes `die()` to halt execution.



== Admin Bar ==

"KINT ACTIVE" indicator displays in the WordPress admin bar to alert you when the plugin is active.

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
