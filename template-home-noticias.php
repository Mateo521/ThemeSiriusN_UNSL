<?php
get_header();

// Sección Principal


//get_template_part('parts/home', 'main');

// Sección Institucional
get_template_part('parts/home', 'slider');

get_template_part('parts/home', 'info');


get_template_part('parts/home', 'interview');

?>
<!--

<div class="flex justify-center container" style="background-color: #164f81; padding:15px 0; color:#fff; margin:15px auto;">
<p>Etiquetas populares</p>
<div class="w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
      <div class="grid-container-2 w-full mx-2 text-white">
        <div class="item7 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=1" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">A</h3>
            <p>Ecobioetica</p>
          </div>
        </div>
        <div class="item8 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=2" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">B</h3>
            <p>FaPsi</p>
          </div>
        </div>
        <div class="item9 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=3" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">C</h3>
            <p>Colacion</p>
          </div>
        </div>
        <div class="item10 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=4" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">D</h3>
            <p>Especializacion</p>
          </div>
        </div>
        <div class="item11 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=5" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">E</h3>
            <p>Educacion</p>
          </div>
        </div>
      </div>

   </div>
  </div>
</div>

<style>
  .item7 {
    grid-area: a;
   
    width: 100%;
  }

  .item8 {
    grid-area: b;
    width: 100%;

  }

  .item9 {
    grid-area: c;
    width: 100%;
  
  }

  .item10 {
    grid-area: d;
    width: 100%;
   
  }

  .item11 {
    grid-area: e;
    width: 100%;

  }

  .grid-container-2 {
    background-color: var(--container-1-bg-color);
  
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-areas:
      'a c c d'
      'b c c e';
    gap: 0 5px;
    padding: 10px;
  }

  @media screen and (max-width:550px) {

    .grid-container-2 {
      height: 100%;
      grid-template-columns: 1fr;
      grid-template-areas:
        'a'
        'b'
        'c'
        'd'
        'e';
    }
  }
</style>
-->


<?php

get_template_part('parts/home', 'institutional');

// Sección Destacada
get_template_part('parts/home', 'outstanding');

// Sección Medios
get_template_part('parts/home', 'media');
// Sección Entrevistas






$videos = obtener_videos_de_youtube();
?>

<div class="w-full py-12" style="background-color:#0f2f49; width:100%; padding:10px;margin:10px 0;">
  <div class="flex justify-center  text-white" style="display:flex; justify-content:center; color:white;">
    <div class="max-w-screen-xl w-full" style="width:100%; max-width:1170px;">
      <p class="text-3xl  p-5" style="padding:10px;">AUDIOVISUAL</p>
      <div class="flex flex-wr items-center justify-between mx-auto " style="display:flex; flex-wrap:wrap;align-items:center; justify-content:space-between;margin:0 auto;">
        <div class="grid-container-3 w-full p-3">

          <div class="item1" id="item1">



            <?php if (!empty($videos)) {
              $videoId = $videos['items'][0]['snippet']['resourceId']['videoId'];
              $thumbnails = $primer_video['snippet']['thumbnails'];
              $thumbnail_url = $thumbnails['medium']['url'];
            ?>
              <div class="flex h-full" style="flex-direction:column; height:100%;">
                <iframe id="videoPlayer" class="w-full h-full" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen></iframe>
                <p id="titulo"><?php echo $videos['items'][0]['snippet']['title']; ?></p>
              </div>

            <?php
            }
            ?>
          </div>
          <?php
          for ($index = 0; $index < count($videos['items']) - 1; $index++) {
            $video = $videos['items'][$index];
            $thumbnails = $video['snippet']['thumbnails'];
            $thumbnail_url = $thumbnails['medium']['url'];
          ?>
   
            <div style="cursor:pointer;" class="miniatura item<?php echo ($index + 2); ?>" data-video-id="<?php echo $video['snippet']['resourceId']['videoId']; ?> " data-video-title="<?php echo $video['snippet']['title']; ?>">
              <div class="grid items-center gap-3 grid-cols-2" style="display:grid; align-items:center; gap:5px; grid-template-columns:1fr 1fr;">
                <div class="relative w-full h-full" style="position:relative; width:100%;height:100%;">

                  <img class="absolute" style="left:50%;top:50%; transform:translate(-50%,-50%); position:absolute;" width="35" height="35" src="<?php echo get_template_directory_uri(); ?>/assets/img/pngegg.png" alt="">

                  <img class="w-full h-full" src="<?php echo $thumbnail_url; ?>" style="width:100%;height:100%;">
                </div>


                <p class="text"><?php echo $video['snippet']['title']; ?></p>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>




<script>
  document.addEventListener("DOMContentLoaded", function() {
    var videoPlayer = document.querySelector("#videoPlayer");
    var miniaturas = document.querySelectorAll(".miniatura");
    var titulo = document.querySelector("#titulo");

    miniaturas.forEach(function(miniatura) {
      miniatura.addEventListener("click", function() {
        var videoId = this.getAttribute("data-video-id");
        var videoTitle = this.getAttribute("data-video-title");

        videoPlayer.src = "https://www.youtube.com/embed/" + videoId;
        titulo.innerHTML = videoTitle;
      });
    });
  });
</script>
<?php



/* Fila Ciencia y Sociedad
------------------------------------------------------------------------------------------------------*/
printf('<div class="container sys">
			<div class="row">');

get_template_part('parts/home', 'science');

get_template_part('parts/home', 'society');

printf('
	</div>
</div>
');
/* Fin de fila Ciencia y Sociedad
-------------------------------------------------------------------------------------------------------*/

// Sección Laboratorios
get_template_part('parts/home', 'laboratorios');








// Sección Cultura y Agenda Cultural
get_template_part('parts/home', 'culture');



// Sección Pruebas
?>
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

<?php




// Agenda Universitaria
get_template_part('parts/home', 'university-agenda');

// Sección UNSL TV
//get_template_part('parts/home', 'unsltv');

get_footer();
