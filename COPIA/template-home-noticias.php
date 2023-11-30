<?php
/**
 * Template Name: Página de Inicio Noticias
 */
get_header();

global $post;
global $enlace_categoria;

// Sección Principal
get_template_part('parts/home', 'main');

// Sección Institucional
get_template_part('parts/home', 'institutional');

// Sección Destacada
get_template_part('parts/home', 'outstanding');

// Sección Medios
get_template_part('parts/home', 'media');

/* Fila Ciencia y Sociedad
------------------------------------------------------------------------------------------------------*/
printf('<div class="container">
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

// Sección Entrevistas
get_template_part('parts/home', 'interview');

// Sección Cultura y Agenda Cultural
get_template_part('parts/home', 'culture');

// Agenda Universitaria
get_template_part('parts/home', 'university-agenda');

// Sección UNSL TV
//get_template_part('parts/home', 'unsltv');

get_footer();