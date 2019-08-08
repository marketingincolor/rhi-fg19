<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FlirtyGirl
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer  grid-x grid-padding-x">
		<div class="site-info large-12 medium-12 small-12 cell">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fg' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'fg' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'fg' ), 'Flirty Girl', '<a href="http://iotheme.com">MIC</a>' );
				?>
		</div><!-- .site-info large-12 medium-12 small-12 cell -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
