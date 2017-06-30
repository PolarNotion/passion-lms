<?php
  $blog_section_title = get_sub_field('blog_section_title');
  $args = array( 'post_type' => 'production_blog', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
  $loop = new WP_Query( $args );
?>
<section>
  <div class="container blog">
    <h2><?php echo $blog_section_title; ?></h2>
    <?php
    while ( $loop->have_posts() ) : $loop->the_post();
      $title          = get_field('blog_title');
      $featured_image = get_field('featured_image');
      $blog_body      = get_field('blog_body');
    ?>
      <div class="background-lightgray blog-post">
        <div class="pull-left blog-image">
          <div class="fixedratio" style="background-image: url('<?php echo $featured_image; ?>')"></div>
        </div>
        <div class="blog-teaser">
          <h3><?php echo $title; ?></h3>
          <?php echo $blog_body; ?>
        </div>
      </div>
      <br>

    <?php endwhile;
          wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
    ?>
  </div>
</section>
