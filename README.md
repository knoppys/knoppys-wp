/********************************************
ChangeLog for Knoppys Base Wordpress Install
*********************************************/

PLEASE NOTE, IF YOUR GOING TO USE THIS THEME AND EXPECT TO USE THE UPDATES, PLEASE CREATE AND USE A CHILD THEME

VERSION 5
A few neew features in Version 5 of particular note. 

- New gird: We ditched Bootstrap!
After some reasearch into how much of the bootstrap CSS and JS we were actually using in our themes, we've found that its rather
pointless. So having a look around we've pulled out simplegrid.io. A nice simple 12 column grid that uses less classes, less HTML and is still a little similar in syntax to bootstrap. 

- Added define( 'WP_POST_REVISIONS', 2 ); to keep the database clean. 
- Added the CSS grid to the main CSS file (minified) so that we dont need to load more than 1 CSS file in the themne. 
- Deque Jquery Migrate from the header as we simply dont need to use it. 
- Using get_menu_items() for the main nav with a simple foreach loop. instead of wp_nav_menu().
- Remove the UL and LI tags from the main navigation. A well debated option but reduces the HTML output by simply showing inline block <A> tags inside a <nav class="container" role="navigation"> container. 
- Removed a tonne of stuff from the header that WP adds in. All of which we dont use on any of our websites. 
- Removed the WP version number.
- Removed the admin bar.
- Added custom logo support to the customiser (still to add to the login screen).
- Ditch the comments style added to the head.
- Ditch the wp-embed script
- HTML Minify. This isnt bulelt proof!!! In fact it seems to have some reports about not working on PHP7. If this has issues when we get it on the server Im going to look at forking this plugin here https://github.com/cferdinandi/gmt-html-minify

VERSION 4
- Updated the .htaccess file with some new hardening measures
- Added some new functions for theme customisation and development
- Removed some junk from the root
- Updated single and page files. 

VERSION 3
THEME CHANGES

Updated bootstrap to the latest version.
Added the following optimisation benefits:
- Added jQuery through the wp_head filter instead of using enqueue_script('jQuery') in the header.
- Removed all that peski emoji crap from the header and editors.
- Added the custom wp-login logo. Simply add your logo at template_directory_uri()/images/logo.png like you would for the header. 
- Added a filter to remove menu items from the wp admin and clean the UI up a bit. This is commented out in functions.php to avoid conflicts.

VERSION 3 
PLUGIN CHANGES

Added WP-Pusher to keep the theme and any custom plugins up to date with their github or bitbucket accounts.

UPCOMING FOR VERSION 5
THEME CHANGES

In version 4 I intend to
- Take advatage of gzip compression.
- Bootstraps compiler.
- WP customiser to start integrating items such as company logo and typography to speed up the dev process. 




