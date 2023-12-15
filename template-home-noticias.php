<?php
get_header();

// Sección Principal


//get_template_part('parts/home', 'main');

// Sección Institucional
get_template_part('parts/home', 'slider');

get_template_part('parts/home', 'info');

// Sección Entrevistas
get_template_part('parts/home', 'interview');

// Sección Etiquetas
get_template_part('parts/home', 'etiquetas');

// Sección Institucional
get_template_part('parts/home', 'institutional');

// Sección Destacada
get_template_part('parts/home', 'outstanding');

// Sección Medios
get_template_part('parts/home', 'media');

// Sección audiovisual
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
get_template_part('parts/home', 'fotogalerias');

// Agenda Universitaria
get_template_part('parts/home', 'university-agenda');

// Sección UNSL TV
//get_template_part('parts/home', 'unsltv');

get_footer();
