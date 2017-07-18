<?php
  $blog_section_title = get_sub_field('blog_section_title');
  $args = array('posts_per_page' => 3, 'category_name' => 'featured' );
  $loop = new WP_Query( $args );
?>
<section>
  <div class="container blog">
    <h2><?php echo $blog_section_title; ?></h2>
    <div class="row">
    <?php
    while ( $loop->have_posts() ) : $loop->the_post();
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
    <a href="<?php echo get_post_type_archive_link( 'production_blog' ); ?>" class="btn btn-primary">Show More Blogs</a>
  </div>
</section>
