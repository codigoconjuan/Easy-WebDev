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

			<div class="container">
					<div class="course-list">
						<?php $currentlang = get_bloginfo('language');
								if($currentlang=="en-US") {
									echo "<h3>Premium Courses That Might Interest You </h3>";
								} else {
									echo "	<h3>Cursos que podrían interesarte</h3>";
								}
								?>
							<ul>
								<?php $args = array(
					          'post_type' => 'cursos',
					          'posts_per_page' => -1,
					          'order' => 'DESC',
					          'orderby' => 'date',
					      ); ?>
								<?php $cursos = new WP_Query($args); ?>
								<?php while($cursos->have_posts()): $cursos->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
								<?php endwhile; wp_reset_postdata(); ?>
							</ul>
					</div>

					<div class="blog-list">
						<?php if($currentlang=="en-US") {
							echo "<h3>Popular From the Blog</h3>";
						} else {
							echo "	<h3>Entradas de Nuestro Blog</h3>";
						}
						?>
							<ul>
								<?php $args = array(
								    'post_type' => 'post',
								    'posts_per_page' => 4,
								    'order' => 'DESC',
								    'orderby' => 'rand',
								); ?>
								<?php $cursos = new WP_Query($args); ?>
								<?php while($cursos->have_posts()): $cursos->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
							  <?php endwhile; wp_reset_postdata(); ?>
							</ul>
					</div>
			</div>

			<div class="site-info">
				<div class="container">
							<p>{ easy-WebDev } <?php echo date('Y'); ?></p>
					</div>
			</div>
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
