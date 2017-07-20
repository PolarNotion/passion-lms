<?php
  if ( get_row_layout() == 'grid_section' ):

    include('grid_section.php');

  elseif ( get_row_layout() == 'content_list' ):

    include('content_list.php');

  elseif ( get_row_layout() == 'team_directory' ):

    include('team_directory.php');

  endif;

 ?>
