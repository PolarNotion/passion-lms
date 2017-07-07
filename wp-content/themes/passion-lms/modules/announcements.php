<?php
$args = array( 'post_type' => 'announcements', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
$loop = new WP_Query( $args );
?>
<section class="pad">
  <?php
  $item_no = 0;
  while ( $loop->have_posts() ) : $loop->the_post();
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
        <h3><?php echo $title; ?>  &nbsp;<i class="fa fa-bullhorn fa-lg" aria-hidden="true"></i></h3>
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
