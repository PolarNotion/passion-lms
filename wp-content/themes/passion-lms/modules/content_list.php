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

              $item_no += 1;
              $active_class = '';
              $file_icon = get_template_directory_uri() . "/img/blank-icon.png";

              if($item_no == 1) {
                $active_class = 'active';
              }
              if($video_file != '') {
                $file_icon = get_template_directory_uri() . "/img/play.svg";
              }
              if($other_file != '') {
                $file_parts = pathinfo($other_file);

                switch($file_parts['extension']) {
                  case "pdf":
                  $file_icon = get_template_directory_uri() . "/img/pdf.svg";
                  break;

                  default:
                  $file_icon = get_template_directory_uri() . "/img/blank-icon.png";
                }
              }
            ?>
              <li class="<?php echo $active_class; ?>">
                <div data-toggle="tab" data-target="#item_<?php echo $item_no; ?>">
                  <ul class="content-trigger">
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
              <?php if($video_file != ''): ?>
                <iframe width="623.09" height="350.48" src="https://www.youtube.com/embed/<?php echo $video_file; ?>?rel=0&showinfo=0&modestbranding=0&color=white" frameborder="0" allowfullscreen></iframe>
              <?php endif; ?>
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
