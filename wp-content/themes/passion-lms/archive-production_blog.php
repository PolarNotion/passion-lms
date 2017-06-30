<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

      <div class="container blog">
        <h2>The Production Volunteer Blog</h2>
			<?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array( 'post_type' => 'production_blog', 'posts_per_page' => 3, 'paged' => $paged, 'orderby' => 'menu_order', 'order' => 'ASC' );
      $loop = new WP_Query( $args );

      $num_blogs = 0;
			/* Start the Loop */
			while ( $loop->have_posts() ) : $loop->the_post();

        $title          = the_title();
        $featured_image = get_field('featured_image');
        $blog_body      = get_field('blog_body');
        $num_blogs += 1;
      ?>
        <div class="background-lightgray blog-post">
          <?php if($featured_image != ''): ?>
            <div class="pull-left blog-image<?php if($num_blogs == 1){ echo '-first'; } ?>">
              <div class="fixedratio" style="background-image: url('<?php echo $featured_image; ?>')"></div>
            </div>
          <?php endif; ?>
          <div class="blog-teaser">
            <h3><?php echo $title; ?></h3>
            <?php if($num_blogs == 1): ?>
              <p><?php echo wp_html_excerpt($blog_body, 400, '...'); ?></p>
            <?php else: ?>
              <?php echo wp_html_excerpt($blog_body, 200, '...'); ?>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>">Read More</a>
          </div>
        </div>
        <br>

      <?php endwhile; ?>
      </div>
      <nav>
        <?php previous_posts_link('Newer'); ?>
        <?php next_posts_link('Older', $loop->max_num_pages); ?>
      </nav>
      <?php
      // clean up after the query and pagination
			// wp_reset_postdata();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
