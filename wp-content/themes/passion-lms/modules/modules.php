<?php
  if ( get_row_layout() == 'grid_section' ):

    include('grid_section.php');

  elseif ( get_row_layout() == 'announcements' ):

    include('announcements.php');

  elseif ( get_row_layout() == 'blog_section' ):

    include('blog_section.php');

  endif;

 ?>
