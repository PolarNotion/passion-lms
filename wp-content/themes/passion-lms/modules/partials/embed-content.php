<?php
// ARGUMENTS:
// $video_file: string: a youtube, vimeo or haivision ID
// $video_format: string: "youtube", "vimeo" or "haivision"
// $audio_file: string: a soundcluod ID or dropbox URL
// $audio_format: string: "soundcloud" or "dropbox"
// $other_file: a URL for another kind of file. Can be PDF, XLS, image, etc.
// $file_type: set by partials/icon-file.php above
// $image: a thumbnail image that represents the content.
// $connect_video_id: the text ID of the connect video if it is one.

if ($video_file != ''): ?>
  <div class="content-description">
    <div class="content-title">
      <h4><?php echo $title; ?></h4>
      <?php echo $description; ?>
    </div>
  </div>
  <div class="embed-responsive embed-responsive-16by9">
    <?php if ($video_format == 'youtube'): ?>
      <iframe
        id="youtube-<?php echo $video_file; ?>"
        class="embed-responsive-item trackable-video"
        data-media-id="<?php echo $connect_video_id; ?>"
        src="https://www.youtube.com/embed/<?php echo $video_file; ?>?rel=0&amp;showinfo=0&amp;modestbranding=0&amp;color=white&amp;enablejsapi=1" allowfullscreen></iframe>
    <?php elseif ($video_format == 'vimeo'): ?>
      <iframe
        id="vimeo-<?php echo $video_file; ?>"
        class="trackable-video"
        data-media-id="<?php echo $connect_video_id; ?>"
        src="https://player.vimeo.com/video/<?php echo $video_file; ?>?color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0" width="640" height="360"
        frameborder="0"
        webkitallowfullscreen
        mozallowfullscreen
        allowfullscreen></iframe>
    <?php elseif ($video_format == 'haivision'): // It's Haivision ?>
      <iframe
        id="haivision-<?php echo $video_file; ?>"
        class="trackable-video"
        data-media-id="<?php echo $connect_video_id; ?>"
        data-haivision-id="<?php echo $video_file; ?>"
        width="500"
        height="300"
        src="http://player.theplatform.com/p/IfSiAC/zRWLH3MHyzaX/embed/select/media/<?php echo $video_file; ?>?form=html"
        seamless="seamless"
        allowfullscreen
        onload="window.player<?php echo $video_file; ?> = $pdk.bind(this, false); $pdk.controller.setIFrame(this, true); window.dispatchEvent(new CustomEvent('<?php echo $video_file; ?>Loaded'))"></iframe>
    <?php else: ?>
      <!-- No valid video format - this should be impossible. Make sure the ACF video_format variable is setup correctly -->
      <iframe src="https://player.vimeo.com/video/NOT-A-VALID-VIDEO?color=ffffff&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <?php endif; // end of video if statement ?>
  </div>
<?php elseif ($audio_file != ''): ?>
  <div class="content-description">
    <div class="content-title">
      <h4><?php echo $title; ?></h4>
      <?php echo $description; ?>
    </div>
    <?php if ($audio_format == "dropbox" ):
      //Find the mp3?dl=0 at the end, and replace it with mp3?raw=1&t=.mp3
      $position = strpos($audio_file, '.mp3?', -10);
      $new_audio_file = substr($audio_file, 0, $position) . '.mp3?raw=1&t=.mp3';
      ?>
        <div class="position-relative dropbox">
          <audio controls>
            <!-- <?php echo $audio_file; ?> -->
            <source src="<?php echo $new_audio_file; ?>" type="audio/mpeg">
          </audio>
        </div>
    <?php endif; // end dropbox ?>
  </div>
  <?php if ($audio_format == "soundcloud"): ?>
    <div class="embed-responsive embed-responsive-16by9">
      <iframe id="soundcloud-<?php echo $audio_file; ?>" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $audio_file; ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
    </div>
  <?php endif; // end soundcloud ?>

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
        <div class="position-relative">
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
        <div class="position-relative">
          <img src="<?php echo $image ?>" class="content-image">
        </div>
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
        <div class="position-relative">
          <img src="<?php echo $image ?>" class="content-image">
        </div>
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
    <div class="position-relative">
      <img src="<?php echo $image ?>" class="content-image no-buttons">
    </div>
  </div>
  <div class="file-type-empty">
  </div>
<?php endif; ?>
