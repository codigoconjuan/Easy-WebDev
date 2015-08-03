<?php
/**
 * Template Name: Blog Español
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package easy-WebDev
 */

get_header(); ?>

<?php $featured = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
<?php $featured = $featured[0]; ?>

<div class="featured page" style="background-image:url(<?php echo $featured ?>);">
    <div class="pattern"></div>
    <div class="content">
      <div class="container">
         <h1><?php echo get_post_meta( get_the_ID(), '_descripciones_second_title', true ); ?></h1>
         <p><?php echo get_post_meta( get_the_ID(), '_descripciones_description', true ); ?></p>
     </div>
    </div>
</div>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
      <?php $titulo =  get_post_meta( get_the_ID(), '_descripciones_first_title', true ); ?>
      <?php if(!empty($titulo)) { ?>
        <h2><?php echo $titulo; ?></h2>
      <?php  } ?>

    <?php // aqui se cargan los post del blog del homepage y blog ?>
    <?php get_template_part('template-parts/content-blog'); ?>


		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
