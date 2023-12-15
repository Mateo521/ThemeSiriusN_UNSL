
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



?>

