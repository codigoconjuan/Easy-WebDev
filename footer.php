<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package easy-WebDev
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'easy-webdev' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'easy-webdev' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'easy-webdev' ), 'easy-webdev', '<a href="http://www.easy-webdev.com" rel="designer">Juan Pablo De la torre Valdez @JuanDevWP</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
