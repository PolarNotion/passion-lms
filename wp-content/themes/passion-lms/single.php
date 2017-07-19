<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passion_LMS
 */

$post_team_doors = get_field('view_access');

if (pn_user_has_team_access($post_team_doors)):
get_header();
echo "Valid Teams: ";
print_r($_SESSION['user_team_keys']);
echo "Access Doors: ";
print_r($post_team_doors);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
else: // user does not have access to any of the teams associated with this post, so redirect them to the home page.
	wp_redirect(get_home_url());
	exit;
endif;
