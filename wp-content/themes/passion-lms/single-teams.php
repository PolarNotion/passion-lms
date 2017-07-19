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
$team_id			= get_the_ID();

set_current_team_id($team_id);

if (pn_user_has_access($access_list)):

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			// echo $title;
			// echo "<br>";
			// echo $description;
			// echo "<br>";
			// print_r(strval($team_id));
			// echo "<br>global team id:";
			// echo $_SESSION['current_team_id'];
			// echo "User Team Keys: ";
			// print_r($_SESSION['user_team_keys']);

			// announcement args
			$announcement_args = array(
				'posts_per_page'	=> -1,
				'post_type' => 'announcements',
				'meta_query'	=> array(
					array(
							'key'		=> 'view_access',
							'value'		=> serialize( strval($team_id) ),
							'compare'	=> 'LIKE'
					)
				)
			);

		  $announcement_loop = new WP_Query( $announcement_args );
			?>
			<section class="pad">
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
							<h3><?php echo $title; ?> &nbsp;<i class="fa fa-bullhorn fa-lg" aria-hidden="true"></i></h3>
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

			<?php // blog args
			$blog_args = array(
				'posts_per_page'	=> 3,
				'meta_query'	=> array(
					array(
							'key'		=> 'view_access',
							'value'		=> serialize( strval($team_id) ),
							'compare'	=> 'LIKE'
					)
				)
			);
		  $blog_loop = new WP_Query( $blog_args );
			?>
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

		</div>
			<a href="/blog-archive" class="btn btn-primary">Show More Blogs</a>
		</div>


		<?php	get_template_part( 'template-parts/content', 'page' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

else: // user does not have access to this team, so redirect them to the home page.
	wp_redirect(get_home_url());
	exit;
endif;
