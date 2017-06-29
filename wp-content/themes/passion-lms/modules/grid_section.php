<?php
	$title		     = get_sub_field('title');
	$access        = get_sub_field('access');
?>

<section class="text-center pad">
  <div class="container">
		<?php if($title != ''): ?>
			<h2 class="text-center"><?php echo $title; ?></h2>
		<?php endif; ?>
    <div class="row">
			<?php if(get_sub_field('content_items')): ?>

        <?php while(the_repeater_field('content_items')): ?>

          <div class="col-sm-3 js-height">
            <?php
            	$title       = get_sub_field('title');
						  $image       = get_sub_field('image');
							$description = get_sub_field('description');
						  $video_file  = get_sub_field('video_file');
						  $other_file  = get_sub_field('other_file');
	          ?>
            <div class="vertical-child fixedratio position-relative" style="background-image: url('<?php echo $image; ?>');">
              <img class="file-icon" src="<?php echo get_template_directory_uri() . '/img/play.svg' ?>">
            </div>
            <div>
              <?php echo $title; ?>
            </div>
          </div>

				<?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
