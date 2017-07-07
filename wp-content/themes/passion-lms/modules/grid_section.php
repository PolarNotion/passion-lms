<?php
	$title   = get_sub_field('title');
	$access  = get_sub_field('access');
  $row_id  = get_row_index();
?>

<section class="pad">
  <div class="container">
		<?php if($title != ''): ?>
			<h2 class=""><?php echo $title; ?></h2>
		<?php endif; ?>
    <div class="row">
			<?php if(get_sub_field('content_items')): ?>

        <?php
          $modal_id = 0;
          while(the_repeater_field('content_items')):
            $modal_id += 1;
            if($modal_id == 9) {
              echo "</div><a href='#more_" . $row_id . "' class='btn btn-primary' data-toggle='collapse'>Show More</a><div class='row collapse' id='more_" . $row_id . "'>";
            }
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
            <div id="modal_<?php echo $modal_id; ?>" class="modal fade bs-override" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wAg5lvKvamA?rel=0"></iframe>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <h3><?php echo $title; ?></h3>
                    <?php echo $description; ?>
                  </div>
                </div>

              </div>
            </div><!-- end Modal -->
          </div>

				<?php endwhile;
              endif; ?>
    </div>
  </div>
</section>
