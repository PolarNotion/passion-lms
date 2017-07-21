<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passion_LMS
 */
$post_team_doors 		= get_field('view_access');

if (pn_user_has_team_access($post_team_doors)):
	global $header_bg_backup, $title_image_backup;
	$header_bg_backup 	= get_template_directory_uri() . "/img/blog_header.jpeg";
	$title_image_backup = get_template_directory_uri() . "/img/pcc-title-image.png";

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
		$lead_line			= get_field('lead_line');
		?>
		<section class="single-blog section-spacing">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="h5"><?php the_title(); ?></h2>
						<em><?php echo 'Posted ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></em>
						<div class="blog-lead">
							<?php echo $lead_line; ?>
						</div>
						<?php if($featured_image != ''): ?>
								<img src="<?php echo $featured_image; ?>" class="">
						<?php endif; ?>
						<div class="blog-content">
							<?php echo apply_filters( 'the_content', $post->post_content ); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section-spacing blog">
			<div class="container">
				<div class="row">
					<?php
					/* Start the Archive Loop */
					$team_id = get_current_team_id();

					if ($team_id != 'EVERYONE'):
						$args = array(
							'posts_per_page'	=> -1,
							'meta_query'	=> array(
								array(
										'key'		=> 'view_access',
										'value'		=> serialize( strval($team_id) ),
										'compare'	=> 'LIKE'
								)
							)
						);
					else:
						$args = array(
							'posts_per_page'	=> -1,
							'meta_query'	=> array(
								array(
										'key'		=> 'view_access',
										'value'		=> '',
										'compare'	=> '='
								)
							)
						);
					endif;

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
						$featured_image = get_field('featured_image');
						$lead_line			= get_field('lead_line');
					?>
					<div class="col-sm-4">
						<a href="<?php the_permalink(); ?>" class="a-wrapper">
							<div class="blog-teaser">
								<?php if($featured_image != ''): ?>
										<div class="blog-image" style="background-image: url('<?php echo $featured_image; ?>'); background-size: cover; background-position: center;">
										</div>
								<?php endif; ?>
								<div class="blog-excerpt">
									<h3><?php the_title(); ?></h3>
									<div class="blog-lead">
										<?php echo $lead_line; ?>
									</div>
									<em><?php echo 'posted ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></em>
								</div>
							</div>
						</a>
					</div>
					<?php endwhile;
					?>
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
