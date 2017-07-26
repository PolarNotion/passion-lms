<?php
// blog-section.php
// Args:
// Current Team ID must be set
// $num_posts should be set
// $archive_link should be set to TRUE or FALSE
// $header_text - the Header text for this module

if ($team_id == 'EVERYONE'):
  $blog_args = array(
    'posts_per_page'	=> $num_posts,
    'meta_query'	=> array(
      array(
          'key'		=> 'view_access',
          'value'		=> '',
          'compare'	=> '='
      )
    )
  );
else:
  $blog_args = array(
    'posts_per_page'	=> $num_posts,
    'meta_query'	=> array(
      array(
          'key'		=> 'view_access',
          'value'		=> serialize( strval($team_id) ),
          'compare'	=> 'LIKE'
      )
    )
  );
endif;
$blog_loop = new WP_Query( $blog_args );

if ( $blog_loop->have_posts() ) :
?>
<section class="section-spacing blog">
  <div class="container">
    <?php if ($header_text != ''): ?>
      <h2 class="h5 margin-btm-20"><?php echo $header_text ?></h2>
    <?php endif; ?>
    <div class="row">
    <?php while ( $blog_loop->have_posts() ) : $blog_loop->the_post();
      $featured_image = get_field('featured_image');
      $lead_line			= get_field('lead_line');
      $lead_length    = strlen($lead_line);
      $title          = get_the_title();
      $title_length   = 2 * strlen($title);

      $lead_space = 215 - $title_length;
      if ($lead_space < $lead_length):
        $lead_line = substr($lead_line, 0, $lead_space) . "&hellip;";
      endif;
    ?>
      <div class="col-sm-4 margin-btm-30">
        <a href="<?php the_permalink(); ?>" class="a-wrapper">
          <div class="blog-teaser">
            <?php if($featured_image != ''): ?>
                <div class="blog-image" style="background-image: url('<?php echo $featured_image; ?>'); background-size: cover; background-position: center;">
                </div>
            <?php endif; ?>
            <div class="blog-excerpt">
              <h3><?php echo $title; ?></h3>
              <div class="blog-lead">
                <?php echo $lead_line; ?>
              </div>
              <em><?php echo 'Posted ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></em>
            </div>
          </div>
        </a>
      </div>

    <?php endwhile;
          wp_reset_postdata(); // this is necessary in order to run another query in another module on the same page
    ?>
    </div>
  </div>
  <?php if ($archive_link): ?>
    <div class="text-center">
      <a href="<?php echo get_permalink( get_page_by_title( 'Blog Archive' )->ID );?>" class="btn btn-lg btn-bw">View More Blogs</a>
    </div>
  <?php endif; ?>
</section>
<?php endif; ?>
