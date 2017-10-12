<?php
	$title   	= get_sub_field('title');
	$access  	= get_sub_field('access');
	$bg_image	= get_sub_field('grid_bg_image');
	$bg_cover = '';
	if ($bg_image != ''):
		$bg_cover = 'bg-cover';
	endif;
  $row_id  = get_row_index();


	if (pn_user_has_access($access)):
?>

<section class="section-spacing grid-content <?php echo $bg_cover . ' position-relative'; ?>" style="background-image: url('<?php echo $bg_image; ?>')">
  <div class="container">
		<?php if($title != ''): ?>
			<h2 class="h5 margin-btm-neg-10"><?php echo $title; ?></h2>
		<?php endif; ?>
    <div class="row">
			<?php if ($bg_cover != ''): ?>
				<div class="bg-overlay"></div>
			<?php endif; ?>
			<?php if(get_sub_field('content_items')): ?>

        <?php
          $modal_id = 0;
          while(the_repeater_field('content_items')):
            $modal_id += 1;
            if($modal_id == 7) {
              echo "</div><div class='row collapse' id='more_" . $row_id . "'>";
            }
        ?>

          <div class="col-sm-4">
          <?php
          	$title       	= get_sub_field('title');
						$title_color 	= get_sub_field('title_color');
						$btn_color 		= 'card__title--' . $title_color;
						$title_img		= get_sub_field('title_image');
					  $bg_image     = get_sub_field('image');
						$description 	= get_sub_field('description');
					  $video_file  	= get_sub_field('video_file');
					  $other_file  	= get_sub_field('other_file');
						$audio_file		= get_sub_field('audio_file');
						$date_posted	= get_sub_field('date_posted');
						$one_week_ago = date_create('-1 week');

						// This include sets $file_icon to the right icon file, and $file_type for use later by partials/embed-content.php
						$video_file = $video_file;
						$audio_file = $audio_file;
						$other_file = $other_file;
						$file_icon = '';
						$file_type = '';
						include 'partials/file-icon.php';
          ?>
						<a href="#" class="a-wrapper" data-toggle="modal" data-target="#modal_<?php echo $row_id; ?>_<?php echo $modal_id; ?>">
							<div class="card">
								<?php if($date_posted > date_format($one_week_ago, 'Ymd') ): ?><div class="new-tag">New</div><?php endif; ?>
								<div class="fixedratio" style="background-image: url(<?php echo $bg_image; ?>)"></div>
								<?php if ( $title_img != '' ): ?>
									<img class="card__titleImage"  src="<?php echo $title_img; ?>" />
								<?php else: ?>
									<h3 class="truncate card__title <?php echo $btn_color; ?>"><?php if($file_icon != ''){?><i class="fa <?php echo $file_icon; ?>" aria-hidden="true"></i> <?php } ?><?php echo $title; ?></h3>
								<?php endif; ?>
							</div>
						</a>

            <!-- Modal -->
            <div id="modal_<?php echo $row_id; ?>_<?php echo $modal_id; ?>" class="modal fade bs-override" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
										<?php
											$video_file 	= $video_file;
											$video_format = get_sub_field('video_format');
											$audio_file 	= $audio_file;
											$audio_format = get_sub_field('audio_format');
											$other_file 	= $other_file;
											$file_type		= $file_type; // set by partials/icon-file.php above
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
			<?php if($modal_id > 8): ?>
				<div class='text-center'><button class='btn btn-lg btn-bw margin-top-30 view-more-btn <?php echo $bg_cover; ?>' data-toggle='collapse' data-target='#more_<?php echo $row_id; ?>'>VIEW MORE</button></div>
			<?php endif; ?>
    </div>
</section>
<?php endif; ?>
