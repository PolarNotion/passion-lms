<?php
  $blog_section_title = get_sub_field('blog_section_title');
  $args = array( 'post_type' => 'production_blog', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'category_name' => 'featured' );
  $loop = new WP_Query( $args );
?>
<section>
  <div class="container blog">
    <h2><?php echo $blog_section_title; ?></h2>
    <?php
    $num_blogs = 0;
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

    <?php endwhile;
          wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
    ?>
    <a href="<?php echo get_post_type_archive_link( 'production_blog' ); ?>" class="btn btn-primary">Show More Blogs</a>
  </div>
</section>
