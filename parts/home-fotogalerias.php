<div class="container" style="background-color: #fff; margin: 15px auto;" >

  <?php
  $nombre_categoria = 'fotogalerias';
  $term = get_term_by('name', $nombre_categoria, 'category');
  if ($term) {
    $id_categoria = $term->term_id;
    $enlace_categoria = esc_url(get_category_link($id_categoria));
  }


  ?>

  <a href="<?php echo $enlace_categoria ?>">
    <h3>Fotogalerías</h3>
  </a>

  <div class="fotogal-posts" style="display: grid; justify-content:center; margin:0 0 25px 0 ;">



    <?php
    $current_post_id = get_the_ID();

    $related_posts = new WP_Query(array(
      'posts_per_page' => 3,
      'post__not_in'   => array($current_post_id),
      'post_type'      => 'post',
      'orderby'        => 'rand',
      'category_name'  => 'fotogalerias',
    ));

    if ($related_posts->have_posts()) :
      while ($related_posts->have_posts()) : $related_posts->the_post();
    ?>
        <article class="related-post">
          <?php
          $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

          if ($thumbnail) :
          ?>
            <a href="<?php the_permalink(); ?>">
              <img style="width:100%;height:175px;" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="#">
            </a>
          <?php endif; ?>

          <!--h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2-->
        </article>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo 'No hay noticias relacionadas.';
    endif;
    ?>



  
  </div>
  <?php
  $nombre_categoria = 'fotogalerias';
  $term = get_term_by('name', $nombre_categoria, 'category');
  if ($term) {
    $id_categoria = $term->term_id;
    $enlace_categoria = esc_url(get_category_link($id_categoria));
  }


  ?>

  <hr><a class="btn-ver-mas" href="<?php echo $enlace_categoria ?>">VER MÁS</a>
</div>
<style>
  .fotogal-posts {
    grid-template-columns: repeat(3, 1fr);
  }

  @media screen and (max-width:766px) {

    .fotogal-posts {

      grid-template-columns: 1fr;
    }
  }
</style>
