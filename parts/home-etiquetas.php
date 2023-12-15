
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


