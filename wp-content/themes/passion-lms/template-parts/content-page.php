<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			$dir = get_template_directory() . "/modules/*";
			foreach(glob($dir) as $file) {
				if(!is_dir($file)) {
					$file_name = $file;
					$module		= basename(str_replace('.php', '', $file_name));

					// check if the flexible content field has rows of data
					if( have_rows($module) ):

							 // loop through the rows of data
							while ( have_rows($module) ) : the_row();

									include $file_name;

							endwhile;

					else :

					endif;
		   	}
			}

		?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
