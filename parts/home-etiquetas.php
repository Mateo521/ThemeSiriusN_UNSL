
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



<div class=" contenedor" style="background-color: #333; padding:15px 0;">

<div class="w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto w-full">
      <div class="grid-container-2 w-full mx-2 text-white">
        <div class="item7 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=1" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">Las mil y una noches es una colección de historias y cuentos compilados entre el siglo VIII y el siglo XIII.</h3>
          
          </div>
        </div>
       
        <div class="item8 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=2" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">El arte de la guerra es un antiguo texto militar chino escrito por Sun Tzu alrededor del siglo V a.C.</h3>
          
          </div>
        </div>


        <div class="item9 p-2">
          <img class="w-full" src="https://picsum.photos/1200/700.jpg?page=3" alt="" style="width: 100%;">
          <div>
            <h3 class="text-2xl title-c">Chandrakanta es una novela hindi de fantasía épica de Devki Nandan Khatri, publicada en 1888.
</h3>
          
          </div>
        </div>
        <div class="item10 p-2">
             <div>
            <h3 class="text-2xl title-c">La Odisea es un poema épico griego clásico escrito por Homero alrededor del siglo VIII a.C.</h3>
      
          </div>
        </div>
        <div class="item11 p-2">
              <div>
            <h3 class="text-2xl title-c">Tirant lo Blanc es una novela de caballerías escrita por Joanot Martorell y publicada en 1490.</h3>
           
          </div>
        </div>
      </div>

   </div>
  </div>
</div>




<style>
  .title-c{
    font-size:15px;
    color:#fff;
  }
  .item7 {
    grid-area: a;
    padding:0 10px 10px 10px;
    width: 100%;
    border-bottom: white 1px solid;
  }

  .item8 {
    padding:0 10px 10px 10px;
    grid-area: b;
    width: 100%;
    border-bottom: white 1px solid;
   
  }

  .item9 {
    padding:0 10px 10px 10px;
    grid-area: c;
    width: 100%;
    border-left: white 1px solid;
    border-right: white 1px solid;
 
  }

  .item10 {
    padding:10px;
    grid-area: d;
    width: 100%;
   
  }

  .item11 {
    grid-area: e;
    width: 100%;
    padding:10px;
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

<?php
// Aquí incluyes el archivo functions.php si no está incluido ya
// require_once get_template_directory() . '/functions.php';

// Llamas a la función para obtener los datos
$datos_obtenidos = obtener_datos_desde_pagina();

// Verificas si hay datos disponibles
if ($datos_obtenidos) {
    // Imprimes los datos en tu componente
    echo '<div class="datos-obtenidos">';
    echo '<h2>Datos obtenidos desde la página:</h2>';
    echo '<p>' . $datos_obtenidos . '</p>';
    echo '</div>';
} else {
    // Si no hay datos disponibles, imprimes un mensaje de error o haces lo que consideres necesario
    echo '<p>No se pudieron obtener los datos.</p>';
}
?>