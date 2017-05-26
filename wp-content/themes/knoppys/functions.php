<?php

/***************************
* Load Styles and Scripts
****************************/
function scp_front_styles() {      

    wp_register_style( 'style', get_stylesheet_uri() );    
    wp_enqueue_style( 'style' ); 
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/core.js', array('jquery'), '', true );
 
}
add_action( 'wp_enqueue_scripts', 'scp_front_styles' );

/***************************
* Deque Jquery Migrate
****************************/
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

/***************************
* Remove some pesky code from the header that we dotn need. 
****************************/
function removeHeadLinks() {
  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
  remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
  remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
  remove_action( 'wp_head', 'index_rel_link' ); // index link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
  remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');
add_filter('show_admin_bar', '__return_false');

/***************************
* Enable Post Thumbnails
****************************/
add_theme_support( 'post-thumbnails' );

/***************************
* Disable XMLRPC
****************************/
add_filter('xmlrpc_enabled', '__return_false');

/***************************
* Remove Wp Version Number
****************************/
function wpb_remove_version() {
	return '';
}
add_filter('the_generator', 'wpb_remove_version');

/***************************
* Credit in the admin footer
****************************/
function remove_footer_admin () {
	echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Theme By: <a href="http://www.knoppys.co.uk" target="_blank">Knoppys Digital</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/***************************
* Custom login error message
****************************/
function no_wordpress_errors(){
  return 'Something is wrong! But we wont tell you what, the force is stronger with us.';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

/***************************
* Remove the welcome to WordPress stuff from teh dashboard, like we dont already know we're here.
****************************/
remove_action('welcome_panel', 'wp_welcome_panel');

/***************************
* Add jQuery to the wp_head()
****************************/
function insert_jquery(){
   wp_enqueue_script('jquery');
}
add_filter('wp_head','insert_jquery');

/***************************
* Load Menus
****************************/
register_nav_menus( array(
	'primary' => __( 'Primary' ),
) );

/***************************
* Register Sidebars
****************************/
$args1 = array(
	'name'          => __( 'Blog Sidebar' ),
	'id'            => 'sidebar-blog',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
); 
register_sidebar( $args1 );

/***************************
* Custom Excerpt Length
****************************/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*************************
Remove those peski emojis
*************************/
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_filter( 'emoji_svg_url', '__return_false' );

/***************************
* Add a logo to the wp customiser
****************************/
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

/*************************************
Add the company logo to the WP Login
*************************************/
add_action( 'login_head', 'ilc_custom_login');
function ilc_custom_login() {
  $custom_logo_id = get_theme_mod( 'custom-logo' );
  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  echo '<style type="text/css">
  h1 a { background-image:url('.$logo[0].') !important; margin-bottom: 10px; }
  padding: 20px;}
  </style>
  <script type="text/javascript">window.onload = function(){document.getElementById("login").getElementsByTagName("a")[0].href = "'. home_url() . '";document.getElementById("login").getElementsByTagName("a")[0].title = "Go to site";}</script>';
}

/*************************************
Customsise the wp menu
Add and remove links in the wp menu to give you
a cleaner back end interface without a plugin.
**************************************/
function remove_menus(){
  
  //remove_menu_page( 'index.php' );                  
  remove_menu_page( 'edit-comments.php' );
  //remove_menu_page( 'themes.php' );
  remove_menu_page( 'plugins.php' );
  //remove_menu_page( 'tools.php' );
  remove_menu_page( 'options-general.php' );
  remove_menu_page( 'edit.php?post_type=acf' );
  
  
}
add_action( 'admin_menu', 'remove_menus' );


/***************************
* Version 5 now uses get_nav_menu_items() insstead of wp_nav_menu()
* so technically we dont need this.
* It was used up to V4 with the bootstrap walker.
* It still has benefiots if you chose to use wp_nav_menu() anywhere else so Ill leave it in.
* **************************
* Ive used the following to remove all the
* junk classes wordpress adds to the tree
****************************/
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}

/***************************
* Ditch the comments style added to the head
****************************/
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');

/***************************
* Ditch the wp-embed script
****************************/
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


/***************************
* HTML Minify
* This is not a 100% tested function
* There are reports it can break on PHP7 and on 
* caching plugins however, on basic testing it is working. 
* You can simply comment the code out.
****************************/
class WP_HTML_Compression {
    protected $compress_css = true;
    protected $compress_js = true;
    protected $info_comment = true;
    protected $remove_comments = true;
 
    protected $html;
    public function __construct($html) {
      if (!empty($html)) {
        $this->parseHTML($html);
      }
    }
    public function __toString() {
      return $this->html;
    }
    protected function bottomComment($raw, $compressed) {
      $raw = strlen($raw);
      $compressed = strlen($compressed);    
      $savings = ($raw-$compressed) / $raw * 100;   
      $savings = round($savings, 2);    
      return '<!-- HTML Minify | Gross page reduction of '.$savings.'% | From '.$raw.' Bytes, To '.$compressed.' Bytes -->';
    }
    protected function minifyHTML($html) {
      $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
      preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
      $overriding = false;
      $raw_tag = false;
      $html = '';
      foreach ($matches as $token) {
        $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
        $content = $token[0];
        if (is_null($tag)) {
          if ( !empty($token['script']) ) {
            $strip = $this->compress_js;
          }
          else if ( !empty($token['style']) ) {
            $strip = $this->compress_css;
          }
          else if ($content == '<!--wp-html-compression no compression-->') {
            $overriding = !$overriding;
            continue;
          }
          else if ($this->remove_comments) {
            if (!$overriding && $raw_tag != 'textarea') {
              $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
            }
          }
        }
        else {
          if ($tag == 'pre' || $tag == 'textarea') {
            $raw_tag = $tag;
          }
          else if ($tag == '/pre' || $tag == '/textarea') {
            $raw_tag = false;
          }
          else {
            if ($raw_tag || $overriding) {
              $strip = false;
            }
            else {
              $strip = true;
              $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
              $content = str_replace(' />', '/>', $content);
            }
          }
        }
        if ($strip) {
          $content = $this->removeWhiteSpace($content);
        }
        $html .= $content;
      }
      return $html;
    }
    public function parseHTML($html) {
      $this->html = $this->minifyHTML($html);
      if ($this->info_comment) {
        $this->html .= "\n" . $this->bottomComment($html, $this->html);
      }
    }
    protected function removeWhiteSpace($str) {
      $str = str_replace("\t", ' ', $str);
      $str = str_replace("\n",  '', $str);
      $str = str_replace("\r",  '', $str);
      while (stristr($str, '  ')) {
        $str = str_replace('  ', ' ', $str);
      }
      return $str;
    }
}
function wp_html_compression_finish($html) {
    return new WP_HTML_Compression($html);
}
function wp_html_compression_start() {
    ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');