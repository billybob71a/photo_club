<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Seven_Sages
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="ss-container">
			<div class="ss-row">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'seven-sages' ) ); ?>"><?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'seven-sages' ), 'WordPress' );
					?></a>
					<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'seven-sages' ), 'seven-sages', '<a href="https://rushijagani.wordpress.com/">Rushi Jagani</a>' );
					?>
				</div><!-- .site-info -->
			</div><!-- .ss-row -->
		</div><!-- .ss-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
