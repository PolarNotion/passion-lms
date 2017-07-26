<?php if ($video_file != ''): ?>
  <div class="content-description">
    <div class="content-title">
      <h4><?php echo $title; ?></h4>
      <?php echo $description; ?>
    </div>
  </div>
  <div class="embed-responsive embed-responsive-16by9">
    <div class="video-bigger">
      <div class="box-btn">
        <i class="fa fa-chevron-circle-left fa-4x" aria-hidden="true"></i>
      </div>
    </div>
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_file; ?>?rel=0&amp;showinfo=0&amp;modestbranding=0&amp;color=white" allowfullscreen></iframe>
  </div>
<?php elseif ($audio_file != ''): ?>
  <div class="content-description">
    <div class="content-title">
      <h4><?php echo $title; ?></h4>
      <?php echo $description; ?>
    </div>
  </div>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $audio_file; ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
  </div>
<?php elseif ($other_file != ''):
  $file_parts = pathinfo($other_file);
  switch($file_parts['extension']) {
    case "pdf":
    ?>
      <div class="content-description clearfix">
        <div class="content-title">
          <h4><?php echo $title; ?></h4>
          <?php echo $description; ?>
        </div>
        <div class="text-center">
          <img src="<?php echo $image ?>" class="content-image">
        </div>
        <div class="button-footer">
          <a href="<?php echo $other_file; ?>" class="btn btn-lg btn-bw pull-right two-btns" download>Download</a>
          <a href="<?php echo $other_file; ?>" class="btn btn-lg btn-bw pull-left two-btns" target="_blank">Preview</a>
        </div>
      </div>
    <?php
    break;

    case "jpg":
    case "png":
    case "gif":
    ?>
      <div class="content-description clearfix">
        <div class="content-title">
          <h4><?php echo $title; ?></h4>
          <?php echo $description; ?>
        </div>
        <img src="<?php echo $image ?>" class="content-image">
        <div class="text-center button-footer">
          <a href="<?php echo $other_file; ?>" class="btn btn-lg btn-bw" download>Download</a>
        </div>
      </div>
    <?php
    break;

    default: // file type is unknown
    ?>
      <div class="content-description clearfix">
        <div class="content-title">
          <h4><?php echo $title; ?></h4>
          <?php echo $description; ?>
        </div>
        <img src="<?php echo $image ?>" class="content-image">
        <div class="text-center button-footer">
          <a href="<?php echo $other_file; ?>" class="btn btn-lg btn-bw" download>Download</a>
        </div>
      </div>
    <?php
  } // end switch
else: // no file was given ?>
  <div class="content-description">
    <div class="content-title">
      <h4><?php echo $title; ?></h4>
      <?php echo $description; ?>
    </div>
    <img src="<?php echo $image ?>" class="content-image no-buttons">
  </div>
  <div class="file-type-empty">
  </div>
<?php endif; ?>
