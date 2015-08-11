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
          <?php $currentlang = get_bloginfo('language');
            if($currentlang=="en-US") { ?>
            <div class="content"> 
                <h3><?php echo get_the_title(); ?></h3>
                <?php $level = get_post_meta( get_the_ID(), '_cursos_nivel_curso', true ); ?>

                <?php switch ($level) {
                  case 'intermedio':
                    echo  "<p><strong>Level: </strong> Intermediate </p>";
                    break;
                  case 'basico':
                    echo  "<p><strong>Level: </strong> Basic </p>";
                    break;
                  case 'avanzado':
                    echo  "<p><strong>Level: </strong> Advanced </p>";
                    break;
                  default:
                    break;
                } ?>
                
                <p><?php echo get_post_meta( get_the_ID(), '_cursos_cantidad_videos', true); ?> Videos</p>
                <p><strong>Duration: </strong><?php echo get_post_meta( get_the_ID(), '_cursos_duracion_curso', true ); ?> hours</p>
            </div>
           <?php } else { ?>
            <div class="content">
                <h3><?php echo get_the_title(); ?></h3>
                <?php $nivel = get_post_meta( get_the_ID(), '_cursos_nivel_curso', true ); ?>

                <?php switch ($nivel) {
                  case 'intermedio':
                    echo  "<p><strong>Nivel: </strong> Intermedio </p>";
                    break;
                  case 'basico':
                    echo  "<p><strong>Nivel: </strong> Básico </p>";
                    break;
                  case 'avanzado':
                    echo  "<p><strong>Nivel: </strong> Avanzado </p>";
                    break;
                  default:
                    break;
                } ?>
                <p><?php echo get_post_meta( get_the_ID(), '_cursos_cantidad_videos', true); ?> Videos</p>
                <p><strong>Duración: </strong><?php echo get_post_meta( get_the_ID(), '_cursos_duracion_curso', true ); ?> horas</p>
            </div>
            <?php } ?>


        </a>
    </li>
  <?php endwhile; wp_reset_postdata(); ?>

  </ul>
