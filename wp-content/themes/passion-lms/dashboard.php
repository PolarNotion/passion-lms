<?php
/**
 * Template Name: Dashboard
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */
set_current_team_id('EVERYONE'); // This makes the blog archive work for EVERYONE blog posts.

// Set the list of Teams this user has access to...
$_SESSION['team_links'] = [];

$args = array(
	'posts_per_page'	=> -1,
	'post_type'   => 'teams',
);

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();
	$access_list  = get_field('access_list');
	if (pn_user_has_access($access_list)):
		add_user_team_key(get_the_ID());
		add_team_link(get_the_title(), get_permalink());
	endif;
endwhile;
wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page

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
				// Args: $team_id, $num_posts, $archive_link
				$team_id 			= get_current_team_id();
				$num_posts 		= 3;
				$archive_link = TRUE;
				$header_text	= 'FEATURED BLOG POSTS';
				include 'components/blog-section.php';
				?>
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
					<h2 class="h5 margin-btm-neg-10">SELECT A TEAM</h2>
			      <div class="row">
			        <?php while ( $loop->have_posts() ) : $loop->the_post();
			          $access_list  = get_field('access_list');
			          if (pn_user_has_access($access_list)):
			            add_user_team_key(get_the_ID());
			              $team_name    = get_the_title();
			              $image        = get_field('thumbnail_image');
										$btn_color		= get_field('btn_color');
			              $team_page    = get_permalink();

										$btn_color 		= ($btn_color == '') ? 'white' : $btn_color;

			            ?>
			              <div class="col-sm-3 js-height">
			                <a href="<?php echo $team_page; ?>" class="a-wrapper">
												<div class="card">
				                  <div class="fixedratio" style="background-image: url(<?php echo $image; ?>)"></div>
													<h3 class="truncate card__title card__title--<?php echo $btn_color; ?>"><?php echo $team_name; ?></h3>
												</div>
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
			<div class="pad-top-30">&nbsp;</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
