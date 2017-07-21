<?php
/**
 * Template Name: Blog Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */
 global $header_bg_backup, $title_image_backup;
 $header_bg_backup 	= get_template_directory_uri() . "/img/blog_header.jpeg";
 $title_image_backup = get_template_directory_uri() . "/img/pcc-title-image.png";

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
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
