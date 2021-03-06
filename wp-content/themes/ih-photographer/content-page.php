<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package IH Photography
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ih-photographer' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'ih-photographer' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
