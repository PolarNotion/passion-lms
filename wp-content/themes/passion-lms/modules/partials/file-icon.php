<?php
// Set the $file_icon based on the active media type
// active_media: will be 'video', 'audio', 'file' or 'text'
if ( $active_media == 'video' ):
  $file_icon = "fa-play";
elseif( $active_media == 'audio' ):
  $file_icon = "fa-file-audio-o";
elseif( $active_media == 'file' ):
  $file_parts = pathinfo($other_file);
  switch($file_parts['extension']) {
    case "pdf":
      $file_icon = "fa-file-text-o";
      break;

    case "jpg":
    case "png":
    case "gif":
      $file_icon = "fa-file-image-o";
      break;

    default:
      $file_icon = "fa-file-text-o";
  }
else: // $active_media == 'text'
  $file_icon = '';
endif;

// RESULT: $file_icon is set properly
$file_icon = $file_icon;

?>
