<?php
/**
 * Template Name: Blog Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */
global $header_bg_backup, $title_image_backup;
$current_team      = get_current_team_wpid();
$url_team          = $_GET['tid'];

// If global current_team_wpid is not equal to the URL team id, then make this the EVERYONE archive.
if ($current_team != $url_team):
  $team_id = 'EVERYONE';
  set_current_team_wpid('EVERYONE');
  $header_bg_backup 	= get_template_directory_uri() . "/img/default_header_bg.jpg";
  $title_image_backup = get_template_directory_uri() . "/img/default_title_image.png";
else:
  $team_id = $current_team;

  // Grab the background-image and title-image of the current team
  $args = array(
    'p'	=> $team_id,
    'post_type'   => 'teams',
  );

  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
    $header_bg_backup 	= get_field('header_bg_image');
    $title_image_backup = get_field('title_image');
    $title_text				= get_field('title_text');
  endwhile;
  wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page

endif;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			// Args: $team_id, $num_posts, $archive_link, $header_text
			$team_id 			= $team_id; // set above...
			$num_posts 		= -1; // -1 means get all of the posts
			$archive_link = FALSE;
			$header_text	= '';
			include 'components/blog-section.php';
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
