<?php
/* SECCIÓN INSTITUCIONAL - NOTICIA DESTACADA
--------------------------------------------------------------------------------------*/
$nombre_categoria = "INSTITUCIONAL";

$fijadas = get_option('sticky_posts');
rsort( $fijadas );
if (!empty($fijadas)) {
	$fijadas = array_slice( $fijadas, 0, 1 );
    $parametros = array(
        'post__in' => $fijadas
    );
    
}else{
	$parametros = array(
		'numberposts'		=>	1,
		'category_name'		=>	$nombre_categoria
	);
	
}
$noticia = get_posts( $parametros );

printf('
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<section class="tarjeta-inicio">
				<div class="entry tarjeta-inicio__fondo-blanco">
');

if($noticia){
	foreach ($noticia as $noticia_destacada_institucional):
		$categoria = get_the_category( $noticia_destacada_institucional->ID );
		if ( ! empty( $categoria ) ) {
			$enlace_categoria = esc_url( get_category_link( $categoria[0]->term_id ) );
		}
		printf('<div class="categoria-seccion">
					<a href="%s">
						<p>%s</p>
					</a>
				</div>
				<a href="%s">
					<h2>%s</h2>
				</a>
				<a class="entry-thumb" href="%s">
					%s
				</a>',
				$enlace_categoria,
				$nombre_categoria,
				$noticia_destacada_institucional->guid,
				$noticia_destacada_institucional->post_title,
				$noticia_destacada_institucional->guid,
				get_the_post_thumbnail( $noticia_destacada_institucional->ID, 'post-thumbnail', array('class'=>'img-responsive') )
			);
	endforeach;
}

/* SECCIÓN INSTITUCIONAL - NOTICIAS SECUNDARIAS
--------------------------------------------------------------------------------------*/
$nombre_categoria = "INSTITUCIONAL";

$parametros = array(
		'numberposts'	=>	6,
		'category_name'	=>	$nombre_categoria,
		'exclude'		=>	$noticia_destacada_institucional->ID
	);

$noticias_secundarias = get_posts( $parametros );

printf('<div class="row">');

if($noticias_secundarias):
	$contador = 0;
	foreach ($noticias_secundarias as $noticia_secundaria):
		printf('<div class="col-md-4 noticia-secundaria-institucional">
					<div class="row">
						<a href="%s" class="col-xs-6 col-md-12">
							<h4 class="inicio__h4-title">%s</h4>
						</a>
						<a href="%s" class="col-xs-6 col-md-12">
							%s
						</a>
					</div>
				</div>',
				$noticia_secundaria->guid,
				$noticia_secundaria->post_title,
				$noticia_secundaria->guid,
				get_the_post_thumbnail( $noticia_secundaria->ID, 'medium', array('class'=>'img-responsive') ) );
		$contador++;
		if($contador == 3)
			printf('</div><div class="row">');
	endforeach;
endif;

printf('</div><hr><a class="btn-ver-mas" href="%s">VER MÁS</i></a></div>',$enlace_categoria);
//Fin de Sección Institucional

