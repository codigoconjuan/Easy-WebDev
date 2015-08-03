<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package easy-WebDev
 */

get_header(); ?>

<div class="featured page" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/parallax-skills.jpg);">
    <div class="pattern"></div>
    <div class="content">
         <div class="container">
					 <?php
		 				the_archive_title( '<h1 class="page-title">', '</h1>' );
		 				the_archive_description( '<div class="taxonomy-description">', '</div>' );
		 			?>
        </div>
    </div>
</div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">

		<?php if ( have_posts() ) : ?>


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
