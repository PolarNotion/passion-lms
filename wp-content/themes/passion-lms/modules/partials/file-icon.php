<?php
// Set the $file_icon based on the input files ($video_file, $audio_file & $other_file)
if ($video_file != ''):
  $file_icon = get_template_directory_uri() . "/img/play.svg";
  $file_type = 'video';
elseif( $audio_file != ''):
  $file_icon = get_template_directory_uri() . "/img/audio.png";
  $file_type = 'audio';
elseif($other_file != ''):
  $file_parts = pathinfo($other_file);
  switch($file_parts['extension']) {
    case "pdf":
      $file_icon = get_template_directory_uri() . "/img/pdf.svg";
      $file_type = 'pdf';
      break;

    case "jpg":
    case "png":
    case "gif":
      $file_icon = get_template_directory_uri() . "/img/image.png";
      $file_type = 'img';
      break;

    default:
      $file_icon = get_template_directory_uri() . "/img/blank-icon.png";
      $file_type = 'unknown';
  }
else:
  $file_icon = '';
  $file_type = 'error';
endif;

// RESULT: $file_icon is set properly
$file_icon = $file_icon;
$file_type = $file_type;

?>
