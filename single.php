<?php
/**
 * The template for displaying all single posts.
 *
 * @package _s
 */

get_header(); ?>

<?php $featured = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
<?php $featured = $featured[0]; ?>
<div class="featured page" style="background-image:url(<?php echo $featured ?>);">
    <div class="pattern"></div>
    <div class="content">
      <div class="container">
         <h1><?php the_title(); ?></h1>
         <p><?php echo get_post_meta( get_the_ID(), '_blog_fields_subtitulo', true ); ?></p>
     </div>
    </div>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

  <div class="bottom-content">
      <?php $relatedPost =  get_post_meta( get_the_ID(), 'attached_cmb2_attached_posts', true ); ?>


    <?php $args = array(
        'post__in' => $relatedPost,
        'post_type' => array('post','cursos')
    ); ?>
    <?php $related = new WP_Query($args); ?>

    <?php while($related->have_posts() ): $related->the_post(); ?>
        <?php the_title(); ?>
    <?php endwhile; wp_reset_postdata();   ?>

  </div>

<?php get_footer(); ?>
