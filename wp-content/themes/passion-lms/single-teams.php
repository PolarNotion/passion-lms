<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passion_LMS
 */
$title 				= get_the_title();
$description 	= get_field('team_description');
$access_list 	= get_field('access_list');
$permissions_list = explode(" ", $access_list);

if (pn_user_has_access($permissions_list)):

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			echo $title;
			echo "<br>";
			echo $description;

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

else: // user does not have access to this team, so redirect them to the home page.
	wp_redirect(get_home_url());
	exit;
endif;
