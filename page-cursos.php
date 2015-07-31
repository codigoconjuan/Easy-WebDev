<?php
/**
 * Template Name: Cursos / Courses
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

      <h2><?php echo get_post_meta( get_the_ID(), '_descripciones_first_title', true ); ?></h2>


      <?php $args = array(
          'post_type' => 'cursos',
          'posts_per_page' => -1,
          'order' => 'DESC',
          'orderby' => 'date',
          'tax_query' => array(
        		array(
        			'taxonomy' => 'idioma',
        			'field'    => 'slug',
        			'terms'    => 'espanol',
        		),
        	),
      ); ?>

        <ul class="list">
        <?php $cursos = new WP_Query($args); ?>
        <?php while($cursos->have_posts()): $cursos->the_post(); ?>
          <li>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail() ?>
                  <div class="content">
                      <h3><?php echo get_the_title(); ?></h3>
                      <p><strong>Nivel: </strong><?php echo get_post_meta( get_the_ID(), '_cursos_nivel_curso', true ); ?></p>
                      <p><?php echo get_post_meta( get_the_ID(), '_cursos_cantidad_videos', true); ?> Videos</p>
                      <p><strong>Duración: </strong><?php echo get_post_meta( get_the_ID(), '_cursos_duracion_curso', true ); ?> horas</p>
                  </div>
              </a>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>

        </ul>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
