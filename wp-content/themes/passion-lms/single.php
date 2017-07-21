<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passion_LMS
 */
global $header_bg_backup, $title_image_backup;
$header_bg_backup 	= get_template_directory_uri() . "/img/blog_header.jpeg";
$title_image_backup = get_template_directory_uri() . "/img/pcc-title-image.png";
$post_team_doors 		= get_field('view_access');

if (pn_user_has_team_access($post_team_doors)):
get_header();
// echo "Valid Teams: ";
// print_r($_SESSION['user_team_keys']);
// echo "Access Doors: ";
// print_r($post_team_doors);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$featured_image = get_field('featured_image');

		?>
		<section class="single-blog">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="h5"><?php the_title(); ?></h2>
						<em><?php echo 'posted ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></em>
						<?php if($featured_image != ''): ?>
								<img src="<?php echo $featured_image; ?>" class="">
						<?php endif; ?>
						<div class="blog-content">
							<?php echo $post->post_content; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
else: // user does not have access to any of the teams associated with this post, so redirect them to the home page.
	wp_redirect(get_home_url());
	exit;
endif;
