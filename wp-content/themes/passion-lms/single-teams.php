<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Passion_LMS
 */
$title 				= get_the_title();
$access_list 	= get_field('access_list');
$team_id			= get_the_ID();

set_current_team_id($team_id);

if (pn_user_has_access($access_list)):

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			// announcement args
			$announcement_args = array(
				'posts_per_page'	=> -1,
				'post_type' => 'announcements',
				'meta_query'	=> array(
					array(
							'key'		=> 'view_access',
							'value'	=> serialize( strval($team_id) ),
							'compare'	=> 'LIKE'
					)
				)
			);

			$announcement_loop = new WP_Query( $announcement_args );

			if ( $announcement_loop->have_posts() ) :
			?>
				<section class="section-spacing">
					<?php
					$item_no = 0;
					while ( $announcement_loop->have_posts() ) : $announcement_loop->the_post();
						$title = get_field('title');
						$the_text = get_field('announcement_text');
						$button_text = get_field('button_text');
						$button_link = get_field('button_link');

						$pad_top = '';
						$item_no += 1;
						if ($item_no > 1) {
							$pad_top = 'margin-top-30';
						}
						?>
						<div class="container">
							<div class="announcement <?php echo $pad_top; ?>">
								<h3><?php echo $title; ?> <i class="fa fa-bell-o" aria-hidden="true"></i></h3>
								<?php echo $the_text; ?>
								<?php if ($button_text != ''): ?>
									<a href="<?php echo $button_link; ?>" class="btn btn-bw"><?php echo $button_text; ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile;
								wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
					?>
					</section>
				<?php endif; ?>
				<?php
				// Args: $team_id, $num_posts, $archive_link, $header_text
				$team_id 			= $team_id;
				$num_posts 		= 3;
				$archive_link = TRUE;
				$header_text	= 'FEATURED BLOG POSTS';
				include 'components/blog-section.php';
				?>

		<?php	get_template_part( 'template-parts/content', 'page' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

else: // user does not have access to this team, so redirect them to the home page.
	wp_redirect(get_home_url());
	exit;
endif;
