<?php
/*
Template Name: Etiquetas Populares
*/


// Función para obtener las últimas noticias


// Función para obtener las etiquetas más usadas
/*
function obtener_etiquetas_populares()
{
  $etiquetas_populares = get_tags(array(
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => 10, 
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


obtener_etiquetas_populares();


*/
?>




<section class="cultysoc" style=" position:relative; padding:0;">

  <div class=" contenedor anchomaximo">
  <h1 style="color:#4bb9ef;">Cultura y Sociedad</h1>
    <div class="w-full">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
        <div class="grid-container-2 w-full mx-2 text-white">


          <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'category_name' => 'sociedad',
            'orderby' => 'date',
            'order' => 'DESC'
          );

          $query = new WP_Query($args);


          $current_iteration = 0;


          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
              $current_iteration++; ?>

              <div class="item<?php echo $query->current_post + 7; ?> p-2">
                <a href="<?php echo get_permalink(); ?>" target="_blank">
                  <img class="w-full" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" style="width: 100%;">
                  <div>
                    <h3 class="text-2xl title-c"><b style="color:#4bb9ef;">Sociedad </b> →<?php the_title(); ?></h3>

                    <?php
                    if ($current_iteration == 3) {
                      $excerpt = get_the_excerpt();
                    } else {
                      $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
                    }
                    ?>
                    <p style="color:black; font-size:16px;"><?php echo $excerpt; ?></p>

                  </div>
                </a>
              </div>

          <?php }
            wp_reset_postdata();
          } else {

            echo 'No se encontraron entradas en la categoría "sociedad".';
          }
          ?>




          <?php
          stream_context_set_default(
            array(
              'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
              ),
            )
          );
          $url = isset($_POST['url']) ? $_POST['url'] : "https://seu.unsl.edu.ar/index.php/menu/noticias/principal";
          $content = file_get_contents($url);
          if ($content === false) {
            echo "Error al obtener el contenido de la URL";
          } else {
            $dom = new DOMDocument;
            libxml_use_internal_errors(true);
            $dom->loadHTML($content);
            libxml_clear_errors();
            $xpath = new DOMXPath($dom);

            // Filtrar las secciones que contienen la clase 'col-md-8' (contenedor real)
            $containers = $xpath->query('//div[contains(@class, "col-md-8")]');

            $limit = 2;
            $i = 0;
            foreach ($containers as $container) {
              if ($i < $limit) {
                // Procesar cada contenedor que cumple con la clase 'col-md-8' (contenedor real)
                $titleElement = $container->getElementsByTagName('h5')->item(0);
                $titleText = $titleElement ? utf8_decode($titleElement->textContent) : '';

                $badgeElement = $container->getElementsByTagName('a')->item(0);
                $badgeText = $badgeElement ? mb_convert_encoding($badgeElement->textContent, 'UTF-8') : '';

                $dateElement = $container->getElementsByTagName('small')->item(0);
                $dateText = $dateElement ? mb_convert_encoding($dateElement->textContent, 'UTF-8') : '';

                $paragraphElement = $container->getElementsByTagName('p')->item(0);
                $paragraphText = $paragraphElement ? mb_convert_encoding($paragraphElement->textContent, 'UTF-8') : '';



                $titleLink = '';
                if ($titleElement) {
                  $titleAnchor = $titleElement->getElementsByTagName('a')->item(0);
                  if ($titleAnchor) {
                    $titleLink = $titleAnchor->getAttribute('href');
                  }
                }
                // Output o procesamiento adicional según lo que necesites hacer con los datos extraídos


                $i++;
              } else {
                break; // Salir del bucle una vez que se haya alcanzado el límite
              }


          ?>


              <div class="item<?php echo ($i + 9) ?> p-2">

                <a href=" <?php echo $titleLink; ?> " target="_blank">
                  <p class="text-2xl title-c"><b style="color:#4bb9ef;">Cultura </b> → <?php echo $titleText; ?></p>
                  <p style="color:black; font-size:16px;"><?php echo  wp_trim_words($paragraphText, 17, '...'); ?></p>

                </a>
              </div>

          <?php
            }
          }

          /*
 // Output o procesamiento adicional según lo que necesites hacer con los datos extraídos
 echo "Título: <br>";
 echo "Etiqueta: $badgeText<br>";
 echo "Fecha: $dateText<br>
";
 echo "Párrafo: <br>";
 */
          ?>







        </div>

      </div>
    </div>
  </div>

  
</section>


<style>
.cultysoc{
 

  font-family: "Libre Franklin", sans-serif;
  font-optical-sizing: auto;
  font-weight: normal;
  font-style: normal;
}


  .title-c {

    color: #000;
  
    font-size: 22px;
    line-height: normal;
  }

  .item7 {
    grid-area: a;
    padding: 0 10px 10px 10px;
    width: 100%;
 /*   border-bottom: #4bb9ef 3px solid;*/
  }

  .item8 {
    padding: 0 10px 10px 10px;
    grid-area: b;
    width: 100%;
  /*
    border-bottom: #4bb9ef 3px solid;*/

  }

  .item9 {
    padding: 0 10px 10px 10px;
    grid-area: c;
    width: 100%;
    /*
    border-left: #4bb9ef 3px solid;
    border-right: #4bb9ef 3px solid;
    */

  }

  .item10 {
    padding: 10px;
    grid-area: d;
    width: 100%;

  }

  .item11 {
    grid-area: e;
    width: 100%;
    padding: 10px;
  }

  .item12 {
    padding: 10px;
  }

  .grid-container-2 {
    background-color: var(--container-1-bg-color);

    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-areas:
      'a c c b'
      'd c c e';
    /*gap: 0 5px;*/
    padding: 10px;
  }

  @media screen and (max-width:550px) {

    .item7, .item8, .item9 {
      border: none;
    }
    .item10{
      margin:50px 0 0;
    }

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