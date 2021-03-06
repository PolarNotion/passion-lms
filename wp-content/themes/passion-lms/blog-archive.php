<?php
/**
 * Template Name: Blog Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */
$current_team      = get_current_team_wpid();
$url_team          = $_GET['tid'];

// If global current_team_wpid is not equal to the URL team id, then make this the EVERYONE archive.
if ($current_team != $url_team):
  $team_id = 'EVERYONE';
  set_current_team_wpid('EVERYONE');
else:
  $team_id = $current_team;
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
