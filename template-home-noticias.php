<?php

/**
 * Template Name: Página de Inicio Noticias
 */
get_header();

global $post;
global $enlace_categoria;

$args = array(
  'post_type'      => 'post',
  'posts_per_page' => 5,
  'order'          => 'DESC',
  'category__not_in' => array(
    get_category_by_slug('entrevistas')->term_id,
    get_category_by_slug('fotogalerias')->term_id,
  ),
);

$latest_posts = get_posts($args);

?>


<style>
  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    height: 550px;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>




<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
      <?php
      // Obtener la URL de la imagen destacada
      $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');

      if (!$thumbnail_url) {

        $thumbnail_url = 'img.img';
      }
      ?>

      <div class="swiper-slide">
        <div class="w-100 h-100" id="slide-e" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>); background-repeat: no-repeat; width:100%;height:100%; background-size:cover;">
          <div style="align-items: flex-end;position:relative; height:100%; display:flex; align-items:end; justify-content:center;">
            <div style="z-index: 1; color:white;">
              <p><?php echo get_the_category_list(', ', '', $post->ID); ?></p>
              <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                <h1 class="text-4xl"><?php echo get_the_title($post->ID); ?></h1>
              </a>
            </div>
            <div style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%); position:absolute; width:100%; height:350px; bottom : 0 ;"></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div style="width:45px;" class="swiper-pagination"></div>
</div>



<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    effect: "fade",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>

<style>
  .swiper-pagination {
    text-align: end;
    padding: 5px;
    color: white;
  }

  .swiper-slide a {
    color: white !important;
  }

  #slide-e {
    animation: desp-x 50s infinite;
  }

  @media screen and (min-width: 766px) {
    #slide-e {
      animation: desp-y 150s infinite;
    }
  }

  @keyframes desp-x {
    50% {
      background-position: 100% 0;
    }
  }

  @keyframes desp-y {
    50% {
      background-position: 0 100%;
    }
  }
</style>
<?php
// Sección Principal



//get_template_part('parts/home', 'main');

// Sección Institucional


?>

<div style="max-width:1170px; left:50%;transform:translateX(-50%);position:relative; padding:10px;">
  <div class="grid-container-1 w-full" style="width:100%;">


    <?php
    $categories = array('principal', 'sociedad', 'cultura', 'institucional', 'entrevistas', 'ciencia'); // Asegúrate de reemplazar estos nombres con los de tus categorías

    foreach ($categories as $index => $category) {
      $args = array(
        'category_name' => $category,
        'posts_per_page' => 1,
        'order' => 'DESC',
        'orderby' => 'date',
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) {
        while ($query->have_posts()) {



          $query->the_post();
          // Aquí dentro del bucle, puedes acceder a la información de la última noticia de la categoría
          $title = get_the_title();

          $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

          $content = get_the_content();
          $permalink = get_permalink();
          // Elimina los códigos cortos y limita el texto a 20 palabras
          $trimmed_content = wp_trim_words(strip_shortcodes($content), 10, '...');
          // Muestra el contenido recortado
    ?>


          <div class="item<?php echo ($index + 1); ?> relative" style="position:relative;">
            <a href="<?php echo ($permalink); ?>">
              <div class="w-full h-full" style="background-image:url(<?php echo esc_url($thumbnail_url); ?>); width:100%;height:100%; background-size:cover;">
                <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#1794d3; position:absolute; left:0; padding:5px; color:white; margin:5px; text-transform:uppercase;"><?php echo $category ?></p>
                <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
                  <h5 class="text-sm relative" style="z-index:5; position:relative;"> | <?php echo $title ?></h5>
                  <p class="text-xl relative" style="z-index:5; position:relative;"><?php echo  $trimmed_content ?></p>
                </div>
                <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%; position:absolute; left:0; bottom:0; width:100%;">
                </div>
              </div>
            </a>
          </div>
    <?php
        }
      }



      wp_reset_postdata(); // Restaurar el objeto global $post
    }
    ?>


    <!--
    <div class="item2 relative" style="position:relative;">
      <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=1); width:100;height:100%;">
        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B; position:absolute; left:0; padding:5px; color:white; margin:5px;">SOCIEDAD</p>
        <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
          <h5 class="text-sm relative" style="z-index:5; position:relative;"> | Espacio de intercambio académico y prductivo</h5>
          <p class="text-xl relative" style="z-index:5; position:relative;">Universidad Siglo 21 celebró “Semana 21” junto a múltiples empresas nacionales e internacionales</p>
        </div>
        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%; position:absolute; left:0; bottom:0; width:100%;">
        </div>
      </div>
    </div>
    <div class="item3 relative" style="position:relative;">
      <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=2); width:100;height:100%;">
        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B; position:absolute; left:0; padding:5px; color:white; margin:5px;">CULTURA</p>
        <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
          <h5 class="text-sm relative" style="z-index:5; position:relative;"> | Espacio de intercambio académico y prductivo</h5>
          <p class="text-xl relative" style="z-index:5; position:relative;">Universidad Siglo 21 celebró “Semana 21” junto a múltiples empresas nacionales e internacionales</p>
        </div>
        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%; position:absolute; left:0; bottom:0; width:100%;">
        </div>
      </div>
    </div>
  -->
  </div>
</div>
</div>

<?php


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
/*
Template Name: Etiquetas Populares
*/


// Función para obtener las últimas noticias


// Función para obtener las etiquetas más usadas
function obtener_etiquetas_populares()
{
  $etiquetas_populares = get_tags(array(
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => 10, // Obtener las 5 etiquetas más populares
  ));

  if ($etiquetas_populares) {
    echo '<div class="container" style="margin:20px auto ;"><h2>Etiquetas Populares</h2><ul style="display:flex;gap:7px;flex-wrap:wrap;">';
    foreach ($etiquetas_populares as $etiqueta) {
      echo '<li style="list-style-type:none;"><a href="' . get_tag_link($etiqueta->term_id) . '">' . $etiqueta->name . '</a></li>';
    }
    echo '</ul></div>';
  } else {
    echo '<p>No hay etiquetas populares disponibles.</p>';
  }
}

// Mostrar las últimas noticias y etiquetas populares
obtener_etiquetas_populares();



?>


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


            <!-- Aquí se mostrará el primer video de la API -->
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
            <!-- Contenido de la miniatura -->
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
<style>
  .sys img {
    height: 190px;
  }

  iframe {
    width: 100%;
    height: 100%;
    max-height: 500px;
  }

  .item1 {
    grid-area: a;
  }

  .item2 {
    grid-area: b;
  }

  .item3 {
    grid-area: c;
  }

  .item4 {
    grid-area: d;
  }

  .item5 {
    grid-area: e;
  }

  .item6 {
    grid-area: f;
  }

  .grid-container-1 {
    height: 700px;
    display: grid;
    grid-template-areas:
      'a a b'
      'a a c'
      'd e f';
    gap: 10px;
    padding: 10px;
  }

  .grid-container-3 {
    gap: 10px;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: repeat(5, 1fr);
    display: grid;
    grid-template-areas:
      'a a b'
      'a a c'
      'a a d'
      'a a e'
      'a a f';
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

    .grid-container-1 {
      height: 1750px;
      grid-template-areas:
        'a a'
        'b b'
        'c c'
        'd d'
        'e e'
        'f f';
    }

    .grid-container-3 {
      display: flex;
      flex-direction: column;
    }

    iframe {
      height: revert-layer;

    }
  }
</style>
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
