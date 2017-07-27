<?php
/**
 * Template Name: Blog Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */
 global $header_bg_backup, $title_image_backup;
 $header_bg_backup 	= get_template_directory_uri() . "/img/default_header_bg.jpg";
 $title_image_backup = get_template_directory_uri() . "/img/default_title_image.png";

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			// Args: $team_id, $num_posts, $archive_link, $header_text
			$team_id 			= get_current_team_id();
			$num_posts 		= -1; // -1 means get all of the posts
			$archive_link = FALSE;
			$header_text	= '';
			include 'components/blog-section.php';
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
