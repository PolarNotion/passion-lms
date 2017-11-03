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

	wp_register_script( 'vimeo-player-api' , 'https://player.vimeo.com/api/player.js' );
	wp_enqueue_script( 'vimeo-player-api');

	wp_register_script( 'my-jquery' , 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'my-jquery');

	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('my-jquery'), '', true);
	wp_enqueue_script( 'bootstrap-js');

	wp_register_script('videolog-js', get_template_directory_uri() . '/js/jquery.video-log.js', array('my-jquery'), '', true);
	wp_enqueue_script( 'videolog-js');

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
 // In this model there is:
 // 1. user_permissions: An array of id numbers/keys. They are numbers created
 //			by the Passion staff. These keys give the user
 //			access to teams and different content on those teams. When a user tries
 //			to open a team page, the team will only show up if the user has a key
 //			that matches the "access_list" of that team.
 //			So too, with content on a team page, the website will only display a content
 //			section if this user has a key on the "access_list" for that content section.
 // 2. current_team_wpid: This is a wordpress internal ID number for a given team
 //			custom post type. This is necessary because blog-archive.php & single.php
 //    	render different content based on the given team. The 'current_team_wpid' causes
 //    	the team id to persist across page requests, so the correct content is rendered for that team
 //			The current_team_wpid is set when the user switches to another team.
 // 3. user_team_keys: An array of team WPIDs that this user has access to. Team
 //			WPIDs are internal numbers on Wordpress. They are not the Team IDs created
 //			by Passion staff. They are the internal IDs that wordpress assigns
 //			to each team custom post type. This holds those IDs so that we don't have
 //			to continually look those up.
 // 4. team_links: These are team name & permalink pairs. Used only for navigation.php
 //

add_action('init', 'start_session', 1);
add_action('init', 'check_connect_auth', 2);
add_action(‘wp_logout’, ‘end_session’);
add_action(‘wp_login’, ‘end_session’);
add_action(‘end_session_action’, ‘end_session’);

// The first step of Connect Auth
function check_connect_auth() {

	ob_clean();
	ob_start();

	global $connect_user_id;
	global $connect_user_permissions;

	$connect_user_id 						= $_SESSION['connect_user_id'];
	$connect_user_permissions 	= $_SESSION['connect_user_permissions'];

	if ($_SERVER['REQUEST_METHOD'] === "GET" && strrpos($_SERVER['REQUEST_URI'], "/connect-auth") !== false ):
		// Set user
		$connect_user_id = $_GET['person_id'];
		$_SESSION['connect_user_id'] = $connect_user_id;

		// Set permissions
		$connect_user_perm_string = $_GET['permissions'];
		$connect_user_permissions = explode(',', trim($connect_user_perm_string));
		$_SESSION['connect_user_permissions'] = $connect_user_permissions;

		// Set the list of Teams this user has access to...
		$_SESSION['team_links']			= [];
		$_SESSION['user_team_keys'] = [];

		$args = array(
			'posts_per_page'	=> -1,
			'post_type'   => 'teams',
		);

		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post();
			$access_list  = get_field('access_list');
			// For each team. Get the access_list. If this user has access, save the team WPID, team name & permalink
			if (pn_user_has_access($access_list)):
				add_user_team_key(get_the_ID());
				add_team_link(get_the_title(), get_permalink());
			endif;
		endwhile;
		wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page

		// Go to destination_url
		if ($_GET['destination_url']) {
			header( 'Location: ' . $_GET['destination_url'] );
			exit();
		} else {
			header('Location: ' . get_site_url() . '/dashboard');
			exit();
		}
	elseif($connect_user_id && $connect_user_permissions):
		return;
	else:
		wp_redirect("http://www.passioncitychurch.com");
		exit(); // Redirect to Connect
	endif;
}

function start_session() {
  if(!session_id()) {
    session_start();
  }
}

function end_session() {
  session_destroy ();
}

function set_current_team_wpid ($team_id) {
  $_SESSION['current_team_wpid'] = $team_id;
}

function get_current_team_wpid () {
	return $_SESSION['current_team_wpid'];
}

// This is called only on the Dashboard.
// I store the wordpress team IDs (internal wordpress ID #s) that the user has
// access to on session variable: user_team_keys.
function add_user_team_key ($team_id) {
  $teams_so_far = $_SESSION['user_team_keys'];
  if (!isset($_SESSION['user_team_keys']) || !in_array($team_id, $teams_so_far)):
    $_SESSION['user_team_keys'][] = $team_id;
  endif;
}

// Adds pairs of team names & team permalinks.
// Used on the Dashboard page to add all of the teams this user has access to.
// Then team_links are only used on the navigation.php file to populate the nav menu.
function add_team_link ($name, $link) {
	$team_links = $_SESSION['team_links'];
	$this_link = array($name, $link);
	if(!in_array($this_link, $team_links)):
		$_SESSION['team_links'][] = $this_link;
	endif;
}

// pn_user_has_post_access
// Argument: $team_doors: an array of team doors required for access to this post (these are
//					internal wordpress ID numbers for the teams. NOT Team IDs given by Passion)
// RETURN: True if this user has a valid "user_team_key" for one of the given doors. False otherwise.
//
// This is used only on the single.php page (a single blog post). Because Admin users
//	set who has access to each post by choosing a team from existing team custom
//	post types.
function pn_user_has_post_access ($team_doors) {
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

// pn_user_has_access
// Argument: $allowed_permissions: a string of the permission keys that are allowed
//					for this team or content. These "permission keys" are ID numbers created
//					by Passion staff and NOT internal wordpress ID numbers.
// RETURN: True if this user has a permission key that is on the $allowed_permissions list.
//
// This is the main function used to see if this user has access to a given team, or a
//	section of content on that team. Used in dashboard.php, single-teams.php, content_list.php & grid_content.php
function pn_user_has_access ($allowed_permissions) {
  global $connect_user_permissions; // The global array of this user's permissions
  $user_has_access = FALSE;
	// print_r($connect_user_permissions); // debugging

  if ($allowed_permissions != '' ):
   $allowed_array   = explode(',', trim($allowed_permissions));

   foreach($connect_user_permissions as $p) {
  	 if (in_array((string) $p, $allowed_array)) {
  		 $user_has_access = TRUE;
  	 }
   }
  else:
   $user_has_access = TRUE;
  endif;

  return $user_has_access;
}

//
// ACF Stuff
//
// Add an Options page for the theme
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

function my_acf_admin_head() {
	?>
	<style type="text/css">

		.acf-flexible-content .layout .acf-fc-layout-handle {
			/*background-color: #00B8E4;*/
			background-color: #202428;
			color: #eee;
		}

		.acf-repeater.-row > table > tbody > tr > td,
		.acf-repeater.-block > table > tbody > tr > td {
			border-top: 2px solid #202428;
		}

		.acf-repeater .acf-row-handle {
			vertical-align: top !important;
			padding-top: 16px;
		}

		.acf-repeater .acf-row-handle span {
			font-size: 20px;
			font-weight: bold;
			color: #202428;
		}

		.imageUpload img {
			width: 75px;
		}

		.acf-repeater .acf-row-handle .acf-icon.-minus {
			top: 30px;
		}

	</style>
	<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');
