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

        <ul class="nav nav-tabs">
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
            <li class="<?php echo $active_class; ?>">
              <a data-toggle="tab" href="#item_<?php echo $item_no; ?>">
                <?php echo $title; ?>
              </a>
            </li>
				<?php endwhile; ?>
        </ul>
      <?php endif; ?>

      <!-- The Tab Content -->
      <?php if(get_sub_field('content_items')): ?>

        <div class="tab-content">
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
              $active_class = 'in active';
            }
          ?>
            <div id="item_<?php echo $item_no; ?>" class="tab-pane fade <?php echo $active_class; ?>">
              <img src="<?php echo $image; ?>">
              <?php echo $description; ?>
            </div>
				<?php endwhile; ?>
      </div><!-- end tab-content -->
      <?php endif; ?>
    </div>
  </div>
</section>
