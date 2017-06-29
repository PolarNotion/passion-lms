<?php
$args = array( 'post_type' => 'announcements', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
$loop = new WP_Query( $args );
?>
<section>
  <?php
  while ( $loop->have_posts() ) : $loop->the_post();
    $title = get_field('title');
    $the_text = get_field('announcement_text');
  ?>
    <div class="container announcement">
      <h3><?php echo $title; ?></h3>
      <?php echo $the_text; ?>
    </div>

  <?php endwhile;
        wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
  ?>
</section>
