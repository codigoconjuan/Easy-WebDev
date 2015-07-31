<?php
/**
 * Template Name: Inicio
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package easy-WebDev
 */

get_header(); ?>

<div class="featured" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/bgimage.jpg);">
    <div class="pattern"></div>

    <div class="content">
         <div class="container">
            <p><strong>Aprende: </strong></p>
            <span id="typed"></span>
            <p>en video, de una forma fácil, paso a paso y <br/>creando proyectos del <span>mundo real</span></p>
        </div>
    </div>
</div>

<section id="tecnologias">
  <h2>Nos enfocamos en herramientas modernas</h2>
    <ul>
        <li><img src="<?php echo get_template_directory_uri(); ?>/img/html5.jpg"></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/img/wordpress.jpg"></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/img/frameworkscss.jpg"></li>
    </ul>
</section>

<div class="parallax skills">
	<div class="container">
			<h2>Estas listo para llevar tus habilidades al <span>siguiente nivel? </span></h2>
			<a href="https://www.udemy.com/u/juanpablodelatorrevaldez/" target="_blank" class="button">Ir a cursos en Udemy</a>
		</div>
</div>


<section class="cursos">
    <div class="container">
          <h2>Aprende Diseño Web con Nuestros Cursos Premium</h2>

          <ul class="list">
              <li>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/curso.jpg">
                  <div class="content">
                      <h3>Aprende ZURB Foundation 5 y SASS creando un Sitio Web.</h3>
                      <p><strong>Nivel:</strong> Intermedio</p>
                      <p>51 Videos</p>
                      <p><strong>Duración:</strong> 4 horas</p>
                  </div>
              </li>

              <li>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/curso.jpg">
                  <div class="content">
                      <h3>Aprende ZURB Foundation 5 y SASS creando un Sitio Web.</h3>
                      <p><strong>Nivel:</strong> Intermedio</p>
                      <p>51 Videos</p>
                      <p><strong>Duración:</strong> 4 horas</p>
                  </div>
              </li>

              <li>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/curso.jpg">
                  <div class="content">
                      <h3>Aprende ZURB Foundation 5 y SASS creando un Sitio Web.</h3>
                      <p><strong>Nivel:</strong> Intermedio</p>
                      <p>51 Videos</p>
                      <p><strong>Duración:</strong> 4 horas</p>
                  </div>
              </li>
          </ul>
    </div>
</section>

<section class="blog">
  <div class="container">
        <h2>Últimas Entradas de Nuestro Blog</h2>
        <ul class="list">
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/curso.jpg">
                <div class="content">
                    <h3>Aprende ZURB Foundation 5 y SASS creando un Sitio Web.</h3>
                    <hr>
                    <p class="autor">Juan De la torre</p>
                    <p class="fecha">22 de Julio, 2015</p>
                </div>
            </li>

            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/curso.jpg">
                <div class="content">
                    <h3>Aprende ZURB Foundation 5 y SASS creando un Sitio Web.</h3>
                    <hr>
                    <p class="autor">Juan De la torre</p>
                    <p class="fecha">22 de Julio, 2015</p>
                </div>
            </li>

            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/curso.jpg">
                <div class="content">
                    <h3>Aprende ZURB Foundation 5 y SASS creando un Sitio Web.</h3>
                    <hr>
                    <p class="autor">Juan De la torre</p>
                    <p class="fecha">22 de Julio, 2015</p>
                </div>
            </li>
        </ul>
  </div>
</section>

<section class="platform">
  <div class="container">
        <h2>Utilizamos la plataforma UDEMY</h2>

        <div class="image-platform">
            <img src="<?php echo get_template_directory_uri(); ?>/img/landing.jpg">
        </div>

        <div class="platform-description ">
            <p>Utilizamos la plataforma Udemy para nuestros cursos, así tendrás la garantia que recibiras un curso de calidad, que fue previamente revisado y aprobado, pagarás una vez, y tendrás acceso siempre en cualquier dispositivo (iPhone, iPad, Android), así como un certificado por cumplimiento. ¡Comienza a aprender ya! Además actualizamos y creamos nuevos cursos todo el tiempo.</p>
        </div>

      <div class="view-courses">
          	<a href="https://www.udemy.com/u/juanpablodelatorrevaldez/" target="_blank" class="button">Ir a cursos en Udemy</a>
      </div>


    </div>
</section>



<?php get_footer(); ?>
