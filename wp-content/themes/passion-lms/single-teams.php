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
$team_id			= get_the_ID();

if (pn_user_has_access($permissions_list)):

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			echo $title;
			echo "<br>";
			echo $description;
			echo "<br>";
			echo $team_id;

			// args
			$args = array(
				'posts_per_page'	=> 3,
				'meta_query'	=> array(
					array(
							'key'		=> 'view_access',
							'value'		=> serialize( strval($team_id) ),
							'compare'	=> 'LIKE'
					)
				)
			);
		  $loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();
	      $featured_image = get_field('featured_image');
				$view_access_list = get_field('view_access');
	    ?>
	      <div class="div">
	        <div class="blog-teaser">
	          <?php if($featured_image != ''): ?>
	              <div class="blog-image">
	                <div class="fixedratio" style="background-image: url('<?php echo $featured_image; ?>')"></div>
	              </div>
	          <?php endif; ?>
	          <?php the_title(); ?>
	          <?php the_excerpt(); ?>
						<?php print_r($view_access_list); ?>
	          <a href="<?php the_permalink(); ?>">Read More</a>
	        </div>
	      </div>

	    <?php endwhile;
	          wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page


				get_template_part( 'template-parts/content', 'page' );

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

else: // user does not have access to this team, so redirect them to the home page.
	wp_redirect(get_home_url());
	exit;
endif;
