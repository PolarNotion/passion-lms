<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passion_LMS
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			$title 			= the_title();
			$description 	= get_field('team_description');

			echo $title;
			echo "<br>";
			echo $description;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
