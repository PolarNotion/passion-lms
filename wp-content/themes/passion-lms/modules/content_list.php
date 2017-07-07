<?php
	$title   = get_sub_field('title');
	$access  = get_sub_field('access');
  $row_id  = get_row_index();
?>

<section class="">
  <div class="container pad">
		<?php if($title != ''): ?>
			<h2 class=""><?php echo $title; ?></h2>
      <a id="video-bigger" class="btn btn-primary">Make Video Bigger</a>
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
              $other_file  = get_sub_field('other_file');

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
                  <ul class="block-line content-trigger">
                    <li>
                      <div class="content-thumbnail">
                        <img src="<?php echo $image; ?>" style="width: 75px;">
                        <img class="file-icon" src="<?php echo $file_icon; ?>">
                      </div>
                    </li>
                    <li class="title">
                      <?php echo $title; ?>
                    </li>
                  </ul>
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
                $audio_file = $audio_file;
                $other_file = $other_file;
                $file_type	= $file_type; // set by partials/icon-file.php above
                include 'partials/embed-content.php';
              ?>
              <div class="content-description">
                <h4><?php echo $title; ?></h4>
                <?php echo $description; ?>
              </div>
            </div>
				<?php endwhile; ?>
      </div><!-- end tab-content -->
      <?php endif; ?>
    </div>
  </div>
</section>
