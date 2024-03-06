<?php
get_header();


//get_template_part('parts/home', 'main');
// Sección Slider
get_template_part('parts/home', 'slider');
// Sección Info slider
get_template_part('parts/home', 'info');

get_template_part('parts/home', 'labsyciencia');

get_template_part('parts/home', 'culturaysociedad');

get_template_part('parts/home', 'interview');

get_template_part('parts/home', 'university-agenda');

get_template_part('parts/home', 'fotogalerias');

// Sección Etiquetas


// Sección Institucional
//get_template_part('parts/home', 'institutional'); CONSTRUCCION

// Sección Destacada
//get_template_part('parts/home', 'outstanding'); CONSTRUCCION

// Sección Medios
//get_template_part('parts/home', 'media'); CONSTRUCCION

// Sección audiovisual
//get_template_part('parts/home', 'audiovisual');

/* Fila Ciencia y Sociedad
------------------------------------------------------------------------------------------------------*/
/*
printf('<div class="container sys">
			<div class="row">');

get_template_part('parts/home', 'science');

get_template_part('parts/home', 'society');

printf('
	</div>
</div>
');
CONSTRUCCION*/ 
/* Fin de fila Ciencia y Sociedad
-------------------------------------------------------------------------------------------------------*/

// Sección Laboratorios
//get_template_part('parts/home', 'laboratorios'); CONSTRUCCION

// Sección Cultura y Agenda Cultural
//get_template_part('parts/home', 'culture');CONSTRUCCION

// Sección Pruebas




// Agenda Universitaria

// Sección Entrevistas






// Sección UNSL TV
//get_template_part('parts/home', 'unsltv');

get_footer();


?>