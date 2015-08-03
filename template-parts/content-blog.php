<?php $args = array(
    'post_type' => 'post',
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
            <hr>
            <?php $niceName =  get_the_author_meta('display_name'); ?>
            <p class="autor"><?php echo $niceName; ?></p>
            <p class="fecha"><?php the_date();  ?></p>
        </div>
        </a>
    </li>
  <?php endwhile; wp_reset_postdata(); ?>

  </ul>
