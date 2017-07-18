<?php

$args = array(
  'posts_per_page'	=> -1,
  'post_type'   => 'teams',
);

$loop = new WP_Query( $args );
?>

<section>
  <div class="container pad">
      <div class="row">
        <?php while ( $loop->have_posts() ) : $loop->the_post();
          $access_list  = get_field('access_list');
          if (pn_user_has_access($access_list)):

              $team_name    = get_the_title();
              $image        = get_field('thumbnail_image');
              $team_page    = get_permalink();
            ?>
              <div class="col-sm-3">
                <a href="<?php echo $team_page; ?>">
                  <div class="fixedratio" style="background-image: url(<?php echo $image; ?>)"></div>
                  <h3><?php echo $team_name; ?></h3>
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
