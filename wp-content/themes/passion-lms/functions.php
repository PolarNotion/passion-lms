<?php
/**
 * Passion LMS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Passion_LMS
 */

/**
 * Setting up global user permissions
 */

if ( ! function_exists( 'passion_lms_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function passion_lms_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Passion LMS, use a find and replace
	 * to change 'passion-lms' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'passion-lms', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'passion-lms' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'passion_lms_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'passion_lms_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function passion_lms_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'passion_lms_content_width', 640 );
}
add_action( 'after_setup_theme', 'passion_lms_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function passion_lms_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'passion-lms' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'passion-lms' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'passion_lms_widgets_init' );

/**
 * Create Custom Post Types
 */
	function custom_post_announcements() {
		 $labels = array(
			 'name' 					=> _x( 'Announcements', 'post type general name' ),
			 'singular_name' => _x( 'Announcement', 'post type singular name' ),
			 'add_new' 			=> _x( 'Add New', 'book'),
			 'add_new_item'	=> __( 'Add New Announcement' ),
			 'edit_item'			=> __( 'Edit Announcement' ),
			 'new_item'			=> __( 'New Announcement' ),
			 'all_items'			=> __( 'All Announcements' ),
			 'view_item'			=> __( 'View Announcement' ),
			 'search_items'	=> __( 'Search Announcements' ),
			 'menu_name'			=> 'Announcements'
		 );
		 $args = array (
			 'labels'			=> $labels,
			 'description'	=> 'Announcements',
			 'public'			=> true,
			 'menu_position' => 5,
			 'supports'		=> array ('title', 'page-attributes' ),
			 'has_archive' => true
		 );
	 register_post_type( 'announcements', $args );
	}
	add_action( 'init', 'custom_post_announcements' );

	function custom_post_teams() {
		 $labels = array(
			 'name' 					=> _x( 'Teams', 'post type general name' ),
			 'singular_name' 	=> _x( 'Team', 'post type singular name' ),
			 'add_new' 				=> _x( 'Add New', 'book'),
			 'add_new_item'		=> __( 'Add New Team' ),
			 'edit_item'			=> __( 'Edit Team' ),
			 'new_item'				=> __( 'New Team' ),
			 'all_items'			=> __( 'All Teams' ),
			 'view_item'			=> __( 'View Team' ),
			 'search_items'		=> __( 'Search Teams' ),
			 'menu_name'			=> 'Teams'
		 );
		 $args = array (
			 'labels'				=> $labels,
			 'description'	=> 'PCC Volunteer Teams',
			 'public'				=> true,
			 'menu_position' => 5,
			 'supports'			=> array ('title', 'page-attributes', 'revisions' ),
			 'has_archive' 	=> true,
			 'taxonomies' 	=> array( 'category' ),
		 );
	 register_post_type( 'teams', $args );
	}
	add_action( 'init', 'custom_post_teams' );

/**
 * Enqueue scripts and styles.
 */
function passion_lms_scripts() {
	wp_enqueue_style( 'passion-lms-style', get_stylesheet_uri() );

	wp_enqueue_script( 'passion-lms-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'passion-lms-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_register_script( 'my-jquery' , 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'my-jquery');

	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('my-jquery'), '', true);
	wp_enqueue_script( 'bootstrap-js');

	wp_register_script('matchHeight-js', get_template_directory_uri() . '/js/jquery.matchHeight.js', array('my-jquery'), '', true);
	wp_enqueue_script('matchHeight-js');

	wp_register_script('general-js', get_template_directory_uri() . '/js/general.js', array('my-jquery', 'bootstrap-js', 'matchHeight-js'), '', true);
	wp_enqueue_script('general-js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'passion_lms_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Polarn Notion Functions for use on Template Files
 */

 // Setting up the Session - used for Permissions and the Current Team ID
add_action('init', 'start_session', 1);

function start_session() {
  if(!session_id()) {
    session_start();
  }
}

add_action(‘wp_logout’, ‘end_session’);
add_action(‘wp_login’, ‘end_session’);
add_action(‘end_session_action’, ‘end_session’);

function end_session() {
  session_destroy ();
}

function set_current_team_id ($team_id) {
  $_SESSION['current_team_id'] = $team_id;
}

function get_current_team_id () {
	return $_SESSION['current_team_id'];
}

function add_user_team_key ($team_id) {
  $teams_so_far = $_SESSION['user_team_keys'];
  if (!in_array($team_id, $teams_so_far)):
    $_SESSION['user_team_keys'][] = $team_id;
  endif;
}

// pn_user_has_team_access
// Argument: $team_doors: an array of team doors required for access
// RETURN: True if this user has a valid "user_team_key" for one of the given doors. False otherwise.
function pn_user_has_team_access ($team_doors) {
  $user_has_key = FALSE;

	if ($team_doors != ''):
	  foreach($_SESSION['user_team_keys'] as $k) {
	    if (in_array($k, $team_doors)):
	      $user_has_key = TRUE;
	    endif;
	  }
	else:
		$user_has_key = TRUE; // No doors means it's an EVERYONE post
	endif;

  return $user_has_key;
}

// Permissions Stuff...
global $user_permissions;
$user_permissions = array("101", "10", "202", "203", "4", "5", '777', '11');

// pn_user_has_access
// Argument: $allowed_permissions: a string of the permission keys that are allowed for this thing
// RETURN: True if this user has a permission key that is also on the $allowed_permissions list.
function pn_user_has_access ($allowed_permissions) {
  global $user_permissions; // The global array of this user's permissions
  $user_has_access = FALSE;

  if ($allowed_permissions != '' ):
   $allowed_array   = explode(',', trim($allowed_permissions));

   foreach($user_permissions as $p) {
  	 if (in_array($p, $allowed_array)) {
  		 $user_has_access = TRUE;
  	 }
   }
  else:
   $user_has_access = TRUE;
  endif;

  return $user_has_access;
}
