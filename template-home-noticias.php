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
get_template_part('parts/home', 'etiquetas');


get_template_part('parts/home', 'institutional');

// Sección Destacada
get_template_part('parts/home', 'outstanding');

// Sección Medios
get_template_part('parts/home', 'media');
// Sección Entrevistas


get_template_part('parts/home', 'audiovisual');





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





// Agenda Universitaria
get_template_part('parts/home', 'university-agenda');

// Sección UNSL TV
//get_template_part('parts/home', 'unsltv');

get_footer();
