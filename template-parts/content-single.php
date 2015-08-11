<?php
/**
 * Template part for displaying single posts.
 *
 * @package easy-WebDev
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>

	<header class="entry-header">
		<div class="entry-meta">
			<?php $currentlang = get_bloginfo('language');
					if($currentlang=="en-US") {
						easy_webdev_posted_on();
					} else {
						easy_webdev_posted_on_esp();
					}
			?>
			<?php  ?>
		</div><!-- .entry-meta -->
		<div class="tag-meta">
			<?php easy_webdev_entry_footer(); ?>
		</div>
	</header><!-- .entry-footer -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

 
