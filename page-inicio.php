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

          <?php $currentlang = get_bloginfo('language');
             if($currentlang=="en-US") { ?>
                  <p><strong>Learn: </strong></p>
                  <span id="typedEng"></span>
                  <p>in video, play and rewind if you need to <br/>learn by building <span>real world projects</span></p>
            <?php } else { ?>
                  <p><strong>Aprende: </strong></p>
                  <span id="typed"></span>
                  <p>en video, de una forma fácil, paso a paso y <br/>creando proyectos del <span>mundo real</span></p>
            <?php } ?>

        </div>
    </div>
</div>

<section id="tecnologias">
  <?php $currentlang = get_bloginfo('language');
    if($currentlang=="en-US") { ?>
        <h2>We Focus on Modern / Cutting Edge Web Technologies</h2>
    <?php } else { ?>
        <h2>Nos enfocamos en herramientas modernas</h2>
    <?php } ?>
        <ul>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/html5.jpg"></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/wordpress.jpg"></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/frameworkscss.jpg"></li>
        </ul>
</section>

<div class="parallax skills">
	   <div class="container">
       <?php $currentlang = get_bloginfo('language');
         if($currentlang=="en-US") { ?>
        			<h2>Are you ready to take your skills to <span>another level? </span></h2>
        			<a href="https://www.udemy.com/u/juanpablodelatorrevaldez/" target="_blank" class="button">view courses on udemy</a>
          <?php } else { ?>
              <h2>Estas listo para llevar tus habilidades al <span>siguiente nivel? </span></h2>
        			<a href="https://www.udemy.com/u/juanpablodelatorrevaldez/" target="_blank" class="button">Ir a cursos en Udemy</a>
          <?php } ?>

		</div>
</div>


<section class="cursos">
    <div class="container">
          <?php $currentlang = get_bloginfo('language');
            if($currentlang=="en-US") { ?>
              <h2>Learn Web Design & Development by Building Real World Projects</h2>
          <?php  } else { ?>
              <h2>Aprende Diseño Web con Nuestros Cursos Premium</h2>
          <?php  } ?>

          <?php // aqui se cargan los cursos ?>
          <?php get_template_part('template-parts/content-cursos'); ?>
    </div>
</section>

<section class="blog">
  <div class="container">
        <?php $currentlang = get_bloginfo('language');
          if($currentlang=="en-US") { ?>
            <h2>Latest Blog Entries</h2>
        <?php  } else { ?>
            <h2>Últimas Entradas de Nuestro Blog</h2>
        <?php  } ?>

        <?php // aqui se cargan los post del blog del homepage y blog ?>
        <?php get_template_part('template-parts/content-blog'); ?>
  </div>
</section>

<section class="platform">
    <div class="container">
      <?php $currentlang = get_bloginfo('language');
            if($currentlang=="en-US") {
              get_template_part('template-parts/content-platform');
            } else {
              get_template_part('template-parts/content-plataforma');
            }
            ?>

    </div>
</section>



<?php get_footer(); ?>
