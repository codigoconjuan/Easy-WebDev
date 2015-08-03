<?php $args = array(
    'post_type' => 'cursos',
    'posts_per_page' => -1,
    'order' => 'DESC',
    'orderby' => 'date',
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
