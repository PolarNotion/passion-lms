<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion_LMS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$dir = get_template_directory() . "/modules/*";
		foreach(glob($dir) as $file) {
	    if(!is_dir($file)) {
	    	$file_name = $file;
	    	$module    = basename(str_replace('.php', '', $file_name));

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

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'passion-lms' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'passion-lms' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php passion_lms_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
