<?php
	$title   = get_sub_field('title');
	$access  = get_sub_field('access');
  $row_id  = get_row_index();

	if (pn_user_has_access($access)):
?>

<section class="section-spacing">
  <div class="container">
		<?php if($title != ''): ?>
			<h2 class="h5 margin-btm-neg-20"><?php echo $title; ?></h2>
		<?php endif; ?>
    <div class="row">
			<?php if(get_sub_field('content_items')): ?>

        <?php
          $modal_id = 0;
          while(the_repeater_field('content_items')):
            $modal_id += 1;
            if($modal_id == 9) {
              echo "</div><div class='text-center'><button class='btn btn-lg btn-bw margin-top-30' data-toggle='collapse' data-target='#more_" . $row_id . "'>VIEW MORE</button></div><div class='row collapse' id='more_" . $row_id . "'>";
            }
        ?>

          <div class="col-sm-3 js-height">
          <?php
          	$title       	= get_sub_field('title');
					  $image       	= get_sub_field('image');
						$description 	= get_sub_field('description');
					  $video_file  	= get_sub_field('video_file');
					  $other_file  	= get_sub_field('other_file');
						$audio_file		= get_sub_field('audio_file');

						// This include sets $file_icon to the right icon file, and $file_type for use later by partials/embed-content.php
						$video_file = $video_file;
						$audio_file = $audio_file;
						$other_file = $other_file;
						$file_icon = '';
						$file_type = '';
						include 'partials/file-icon.php';
          ?>
						<a href="#" class="a-wrapper" data-toggle="modal" data-target="#modal_<?php echo $modal_id; ?>">
							<div class="card">
								<div class="fixedratio" style="background-image: url(<?php echo $image; ?>)"></div>
								<h3><?php if($file_icon != ''){?><img src="<?php echo $file_icon ?>"><?php } ?><?php echo $title; ?></h3>
							</div>
						</a>

            <!-- Modal -->
            <div id="modal_<?php echo $modal_id; ?>" class="modal fade bs-override" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<?php
											$video_file = $video_file;
											$audio_file = $audio_file;
											$other_file = $other_file;
											$file_type	= $file_type; // set by partials/icon-file.php above
											include 'partials/embed-content.php';
										?>
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
<?php endif; ?>
