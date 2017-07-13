<?php if ($video_file != ''): ?>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_file; ?>?rel=0&amp;showinfo=0&amp;modestbranding=0&amp;color=white" allowfullscreen></iframe>
  </div>
<?php elseif ($audio_file != ''): ?>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $audio_file; ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
  </div>
<?php elseif ($other_file != ''):
  $file_parts = pathinfo($other_file);
  switch($file_parts['extension']) {
    case "pdf":
    ?>
      <div class="">
        <a href="<?php echo $other_file; ?>" class="btn btn-primary" download>Download PDF</a>
        <a href="<?php echo $other_file; ?>" class="btn btn-primary pull-left" target="_blank">View PDF</a>
      </div>
    <?php
    break;

    case "jpg":
    case "png":
    case "gif":
    ?>
      <div class="">
        <img src="<?php echo $other_file; ?>">
        <a href="<?php echo $other_file; ?>" class="btn btn-primary" download>Download Image</a>
        <a href="<?php echo $other_file; ?>" class="btn btn-primary pull-left" target="_blank">View in Browser</a>
      </div>
    <?php
    break;

    default: // file type is unknown
    ?>
      <div class="">
        <a href="<?php echo $other_file; ?>" class="btn btn-primary" download>Download the File</a>
        <a href="<?php echo $other_file; ?>" class="btn btn-primary pull-left" target="_blank">View the File</a>
      </div>
    <?php
  } // end switch
else: // no file was given ?>
  <div class="file-type-empty">
  </div>
<?php endif; ?>