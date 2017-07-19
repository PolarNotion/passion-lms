<?php
/**
 * Template Name: Blog Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */



get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">
				<?php
				/* Start the Archive Loop */
				$team_id = $_SESSION['current_team_id'];

				echo "hello world: " . $team_id;

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
				?>
					<div class="row">
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
					</div>

				<?php endwhile;
				?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
