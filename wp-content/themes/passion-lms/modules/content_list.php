<?php
	$title   = get_sub_field('title');
	$access  = get_sub_field('access');
	$bg_image	= get_sub_field('list_bg_image');
	$bg_cover = '';
	if ($bg_image != ''):
		$bg_cover = 'bg-cover';
	endif;
  $row_id  = get_row_index();

	if (pn_user_has_access($access)):
?>

<section class="section-spacing js-ContentList <?php echo $bg_cover . ' position-relative'; ?>" style="background-image: url('<?php echo $bg_image; ?>')">
  <div class="container">
		<?php if ($bg_cover != ''): ?>
			<div class="bg-overlay"></div>
		<?php endif; ?>
		<?php if($title != ''): ?>
			<h2 class="h5"><span class="hide-list"><i class="fa fa-chevron-circle-left"></i></span> <?php echo $title; ?></h2>
      <div class="content-list-module-wrapper clearfix">
		<?php endif; ?>
			<?php if(get_sub_field('content_items')): ?>
        <div class="content-list-wrapper">
          <ul class="content-list">
          <?php
            $item_no = 0;
            while(the_repeater_field('content_items')):
            	$title       = get_sub_field('title');
  					  $image       = get_sub_field('image');
              $video_file  = get_sub_field('video_file');
							$audio_file	 = get_sub_field('audio_file');
              $other_file  = get_sub_field('other_file');
							$date_posted	= get_sub_field('date_posted');
							$one_month_ago = date_create('-30 days');

              // This include sets $file_icon to the right icon file
  						$video_file = $video_file;
  						$audio_file = $audio_file;
  						$other_file = $other_file;
  						$file_icon = '';
  						include 'partials/file-icon.php';

              $item_no += 1;
              $active_class = '';
              if($item_no == 1) {
                $active_class = 'active';
              }
            ?>
              <li class="<?php echo $active_class; ?>">
                <div data-toggle="tab" data-target="#item_<?php echo $item_no; ?>">
                  <div class="content-trigger clearfix">
                    <div class="content-thumbnail pull-left js-height" style="background-image: url('<?php echo $image; ?>')">
											<?php if($date_posted > date_format($one_month_ago, 'Ymd') ): ?><div class="new-tag-list">New</div><?php endif; ?>
                    </div>
                    <div class="title js-height">
												<div class="truncate">
													<?php if($file_icon != ''){?><i class="fa <?php echo $file_icon; ?>" aria-hidden="true"></i>&nbsp; <?php } ?><?php echo $title; ?>
												</div>
                    </div>
                  </div>
                </div>
              </li>
  				<?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- The Tab Content -->
      <?php if(get_sub_field('content_items')): ?>

        <div class="content-pane-wrapper tab-content">
          <?php
          $item_no = 0;
          while(the_repeater_field('content_items')):
          	$title       = get_sub_field('title');
					  $image       = get_sub_field('image');
						$description = get_sub_field('description');
					  $video_file  = get_sub_field('video_file');
						$audio_file	 = get_sub_field('audio_file');
					  $other_file  = get_sub_field('other_file');
            $item_no += 1;
            $active_class = '';
            if($item_no == 1) {
              $active_class = 'active';
            }
          ?>
            <div id="item_<?php echo $item_no; ?>" class="tab-pane <?php echo $active_class; ?>">
              <?php
                $video_file = $video_file;
								$video_format = get_sub_field('video_format');
								$audio_file 	= $audio_file;
								$audio_format = get_sub_field('audio_format');
                $other_file = $other_file;
                $file_type	= $file_type; // set by partials/icon-file.php above
                include 'partials/embed-content.php';
              ?>
            </div>
				<?php endwhile; ?>
      </div><!-- end tab-content -->
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>
