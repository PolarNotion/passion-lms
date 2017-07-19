<?php
/**
 * Template Name: Dashboard
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */
set_current_team_id('EVERYONE'); // This makes the blog archive work for EVERYONE blog posts.

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
							'value'	=> '',
							'compare'	=> '='
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
							$pad_top = 'pad-top';
						}
						?>
						<div class="container">
							<div class="announcement <?php echo $pad_top; ?>">
								<h3><?php echo $title; ?><?php echo get_the_ID(); ?> &nbsp;<i class="fa fa-bullhorn fa-lg" aria-hidden="true"></i></h3>
								<?php echo $the_text; ?>
								<?php if ($button_text != ''): ?>
									<a href="<?php echo $button_link; ?>" class="btn btn-secondary-white btn-lg"><?php echo $button_text; ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile;
								wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
					?>
					</section>
				<?php endif; ?>
				<?php // blog args
				$blog_args = array(
					'posts_per_page'	=> 3,
					'meta_query'	=> array(
						array(
								'key'		=> 'view_access',
								'value'		=> '',
								'compare'	=> '='
						)
					)
				);
			  $blog_loop = new WP_Query( $blog_args );

				if ( $blog_loop->have_posts() ) :
				?>
				<section class="section-spacing blog">
					<div class="container">
						<h2>FEATURED BLOG POSTS</h2>
						<div class="row">
						<?php while ( $blog_loop->have_posts() ) : $blog_loop->the_post();
				      $featured_image = get_field('featured_image');
				    ?>
				      <div class="col-sm-4">
				        <div class="blog-teaser">
				          <?php if($featured_image != ''): ?>
				              <div class="blog-image">
				                <div class="fixedratio" style="background-image: url('<?php echo $featured_image; ?>')"></div>
				              </div>
				          <?php endif; ?>
				          <?php the_title(); ?>
				          <?php the_excerpt(); ?>
				          <a href="<?php the_permalink(); ?>">Read More</a>
				        </div>
				      </div>

				    <?php endwhile;
				          wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
						?>
						</div>
					</div>
				</section>
			<?php endif; ?>
			<?php
			// TEAM Index module
			$args = array(
			  'posts_per_page'	=> -1,
			  'post_type'   => 'teams',
			);

			$loop = new WP_Query( $args );
			?>

			<section class="section-spacing">
			  <div class="container">
			      <div class="row">
			        <?php while ( $loop->have_posts() ) : $loop->the_post();
			          $access_list  = get_field('access_list');
			          if (pn_user_has_access($access_list)):
			            add_user_team_key(get_the_ID());
			              $team_name    = get_the_title();
			              $image        = get_field('thumbnail_image');
			              $team_page    = get_permalink();
			            ?>
			              <div class="col-sm-3">
			                <a href="<?php echo $team_page; ?>">
			                  <div class="fixedratio" style="background-image: url(<?php echo $image; ?>)"></div>
			                  <h3><?php echo $team_name; ?></h3>
			                </a>
			              </div>
			          <?php
			          endif;
			        endwhile;
			        wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
			        ?>
			      </div>
			  </div>
			</section>
			<?php print_r($_SESSION['user_team_keys']); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
