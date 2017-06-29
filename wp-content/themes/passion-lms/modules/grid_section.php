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

        <?php
          $modal_id = 0;
          while(the_repeater_field('content_items')):
            $modal_id += 1;
        ?>

          <div class="col-sm-3 js-height">
            <?php
            	$title       = get_sub_field('title');
						  $image       = get_sub_field('image');
							$description = get_sub_field('description');
						  $video_file  = get_sub_field('video_file');
						  $other_file  = get_sub_field('other_file');
	          ?>
            <div class="vertical-child fixedratio position-relative" style="background-image: url('<?php echo $image; ?>');">
              <a href="#" data-toggle="modal" data-target="#modal_<?php echo $modal_id; ?>"><img class="file-icon" src="<?php echo get_template_directory_uri() . '/img/play.svg' ?>"></a>
            </div>
            <div>
              <?php echo $title; ?>
            </div>

            <!-- Modal -->
            <div id="modal_<?php echo $modal_id; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p><?php echo $description; ?></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
          </div>

				<?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
