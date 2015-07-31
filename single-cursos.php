<?php
/**
 * The template for displaying all pages.
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

			<?php while ( have_posts() ) : the_post(); ?>
<div class="featured page" style="background-image:url(<?php echo $featured ?>);">
    <div class="pattern"></div>
    <div class="content">
      <div class="container">
        <div class="course-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="course-description">
            <?php the_content(); ?>
						<div class="price normal-price">
								<p>Precio Normal:</p>
								<span>$<?php echo get_post_meta( get_the_ID(), '_cursos_precio_regular', true ); ?></span>
						</div>

						<div class="price special-price">
							<p>Precio Especial Web:</p>
							<span>$<?php echo get_post_meta( get_the_ID(), '_cursos_precio_web', true ); ?></span>
						</div>
						<div class="suscribe-course clearfix">
								<a href="<?php echo get_post_meta( get_the_ID(), '_cursos_enlace_curso', true ); ?>" class="button" target="_blank">Inscribirme a este curso</a>
						</div>
        </div>
     </div>
    </div>
</div>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

			<h2>¿Qué aprenderás en este curso?</h2>

			<div id="video-promo" class="video-promo">
						<?php $url = esc_url( get_post_meta( get_the_ID(), '_cursos_video_curso', 1 ) ); ?>
						<?php echo wp_oembed_get( $url ); ?>
			</div>



		</main><!-- #main -->
	</div><!-- #primary -->


	<div id="course-features" class="course-features">

		<div class="container">
					<ul>
						<li>
							<?php $nivel =  get_post_meta( get_the_ID(), '_cursos_nivel_curso', true ); ?>
							<?php		switch ($nivel) {
							    case'intermedio':
							        echo "<i class='fa fa-battery-quarter'></i>";
											echo "<p>Nivel: Intermedio</p>";
							        break;
							    case 'basico':
							        echo "<i class='fa fa-battery-half'></i>";
											echo "<p>Nivel: Básico</p>";
							        break;
							    case 'avanzado':
							        echo "<i class='fa fa-battery-full'></i>";
											echo "<p>Nivel: Avanzado</p>";
							        break;
							} ?>
						 </li>
						<li>
								<i class="fa fa-clock-o"></i>
								<p>Duración: <?php echo get_post_meta( get_the_ID(), '_cursos_duracion_curso', true ); ?> horas</p>
						</li>
						<li>
								<i class="fa fa-play-circle"></i>
								<p>
									<?php echo get_post_meta( get_the_ID(), '_cursos_cantidad_videos', true ); ?> videos en HD. La mejor calidad
								</p>
						</li>
						<li>
								<i class="fa fa-code"></i>
								<p>Archivos con los Ejercicios</p>
						</li>
						<li>
								<i class="fa fa-calendar-check-o"></i>
								<p>30 días de garantía o la devolución de tu dinero</p>
						</li>
						<li>
								<i class="fa fa-user"></i>
								<p>Escribe tus dudas al instructor del Curso ¡Gratis!</p>
						</li>
					</ul>
			</div>
	</div>

			<?php printf( '<pre>%s</pre>', var_export( get_post_custom( get_the_ID() ), true ) ); ?>
			<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>
