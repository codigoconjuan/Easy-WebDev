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

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


  <div class="bio-information">
    <div class="container">
     <h2>Información del Autor:</h2>
         <?php $image =  esc_attr(get_the_author_meta('_yourprefix_user_avatar')); ?>
          <?php if ($image != '') { ?>
              <div class="bio-img">
                  <img src="<?php echo $image; ?>" alt="Image of <?php echo $niceName; ?>">
              </div>
          <?php } ?>
          <div class="biography-info">
                <?php $niceName =  get_the_author_meta('display_name'); ?>
                <?php if(!empty($niceName)) { ?>
                    <h3><?php echo $niceName; ?></h3>
                <?php } ?>
                <?php $bio =  get_the_author_meta('description'); ?>
                <?php if(!empty($bio)) { ?>
                    <p><?php echo $bio; ?></p>
                <?php } ?>

                  <div class="social-links">
                  <h4>Sígueme: </h4>
                  <ul class="social-links">
                          <?php $facebook =  get_the_author_meta('_yourprefix_user_facebookurl'); ?>
                          <?php if(!empty($facebook)) { ?>
                              <li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
                          <?php } ?>

                          <?php $twitter =  get_the_author_meta('_yourprefix_user_twitterurl'); ?>
                          <?php if(!empty($twitter)) { ?>
                              <li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                          <?php } ?>

                          <?php $linkedin =  get_the_author_meta('_yourprefix_user_linkedinurl'); ?>
                          <?php if(!empty($linkedin)) { ?>
                              <li><a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                          <?php } ?>
                  </ul>
                </div>
           </div>


      </div>
 </div>



  <div class="bottom-content">
      <?php $relatedPost =  get_post_meta( get_the_ID(), 'attached_cmb2_attached_posts', true ); ?>


    <?php $args = array(
        'post__in' => $relatedPost,
        'post_type' => array('post','cursos')
    ); ?>
    <?php $related = new WP_Query($args); ?>
    <?php $posts = $related->get_posts() ?>
    <?php global $post; ?>

     <?php
       $entradas = array();
       foreach ($posts as $p) {
          if($p->post_type == 'cursos') {
            $entradas['cursos'][] = $p->ID;
          } else {
            $entradas['posts'][] = $p->ID;
          }
      } ?>

       <?php if(isset($entradas['posts'])) {  ?>
       <?php $number =  count($entradas['posts']); ?>
       <?php if($number != 0) { ?>
          <section class="blog">
                <div class="container">
                  <?php $currentlang = get_bloginfo('language');
                    if($currentlang=="en-US") { ?>
                        <h2>Related Entries:</h2>
                  <?php  } else { ?>
                        <h2>Post Relacionados:</h2>
                  <?php  } ?>

                    <ul class="list relacionados  <?php echo ($number == 1 ? 'shift1' : 'shift2') ?> ">
                        <?php foreach($entradas['posts'] as $entradaID) {
                            $args = array(
                                'p' => $entradaID
                              );
                            $entrada = new WP_Query($args); ?>

                              <?php while($entrada->have_posts()): $entrada->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail() ?>
                                        <div class="content">
                                            <h3><?php echo get_the_title(); ?></h3>
                                            <hr>
                                            <?php $niceName =  get_the_author_meta('display_name'); ?>
                                            <p class="autor"><?php echo $niceName; ?></p>
                                            <p class="fecha"><?php the_date();  ?></p>
                                        </div>
                                        </a>
                                    </li>
                               <?php  endwhile; wp_reset_postdata();?>
                        <?php } // end foreach ?>
                    </ul>
                  </div>
          </section>
       <?php }  // endif?>
  <?php } // end isset ?>


       <?php if(isset($entradas['cursos'])) {  ?>
       <?php $number =  count($entradas['cursos']); ?>
       <?php if($number != 0) { ?>
          <section class="cursos">
                <div class="container">
                  <?php $currentlang = get_bloginfo('language');
                    if($currentlang=="en-US") { ?>
                        <h2>Recommended Courses:</h2>
                  <?php  } else { ?>
                        <h2>Cursos Recomendados:</h2>
                  <?php  } ?>

                    <ul class="list relacionados  <?php echo ($number == 1 ? 'shift1' : 'shift2') ?> ">
                        <?php foreach($entradas['cursos'] as $cursosID) {
                            $args = array(
                                'p' => $cursosID,
                                'post_type' => 'cursos'
                              );
                            $entrada = new WP_Query($args); ?>

                              <?php while($entrada->have_posts()): $entrada->the_post(); ?>
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
                               <?php  endwhile; wp_reset_postdata();?>
                        <?php } // end foreach ?>
                    </ul>
                  </div>
          </section>
       <?php }  // endif?>
  <?php } ?>
<?php get_footer(); ?>
