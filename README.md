/********************************************
ChangeLog for Knoppys Base Wordpress Install
*********************************************/

PLEASE NOTE, IF YOUR GOING TO USE THIS THEME AND EXPECT TO USE THE UPDATES, PLEASE CREATE AND USE A CHILD THEME

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

UPCOMING FOR VERSION 4
THEME CHANGES

In version 4 I intend to
- Take advatage of gzip compression.
- Bootstraps compiler.
- WP customiser to start integrating items such as company logo and typography to speed up the dev process. 




