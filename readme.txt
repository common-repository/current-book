=== Plugin Name ===
Contributors: joshharbaugh
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=pixelhavenllc%40gmail%2ecom&item_name=Wordpress%20Plugin%20%28Current%20Book%29&no_shipping=1&return=http%3a%2f%2fwww%2epixelhavenllc%2ecom&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: display book, books, current book, reading
Requires at least: 2.0.2
Tested up to: 3.0
Stable tag: 1.0.3

Want to show your readers what book you're reading?

That's just what this plugin does coincidentally.

== Description ==

This plugin will allow you to display the book title and author of the book you are currently reading to your viewers/readers.

An added feature of the plugin is the ability to link directly to the book using whichever service you found most convenient.

== Installation ==

1. Upload `bookdisplay.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the `Plugins` menu in WordPress
3. Open the Plugin configuration page, which is located under Manage -> Current Book
4. Place `<?php current_book(); ?>` anywhere in your templates you'd like to display the title and author

NOTE: The Standard markup created for the book title and author is:
`<div><p><a href=<link-to-book>>Book Title</a> <em>by Book Author</em></p></div>`

== Frequently Asked Questions ==

= How do I customize the markup created by the current_book(); hook =

The function current_book is defined within the bookdisplay.php file and can be manipulated there with a basic understanding of the PHP programming language.

= Does this plugin work with all Wordpress versions =

Do to its simplicity the plugin should work for almost (if not) all versions of Wordpress. It has been thoroughly tested in the current Wordpress release (2.5).
If you find a bug in any other versions of Wordpress, please let me know so that I may fix them.

== Other Notes ==

== Licensing ==
This plugin is free for everyone to use. Since it's released under the GPL, you can use it free of charge on your personal or commercial blog. If you enjoy the plugin you can send me a 'Thank you' in the form of an email.

== Plugin Support ==
I will be maintaining this plugin with bug fixes future releases based on the responses from the Wordpress community.