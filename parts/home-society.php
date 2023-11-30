<?php
/* SECCIÓN SOCIEDAD
------------------------------------------------------------------------------------------------------*/
$nombre_categoria = "Sociedad";

$parametros = array(
		'numberposts'		=>	2,
		'category_name'		=>	$nombre_categoria
	);

$noticia = get_posts( $parametros );

if( $noticia ){
	$categoria = get_the_category( $noticia[0]->ID );
	if ( ! empty( $categoria ) ) {
		$enlace_categoria = esc_url( get_category_link( $categoria[0]->term_id ) );
	}
}
printf('<div class="col-xs-12 col-md-6">
			<section class="tarjeta-inicio">
				<div class="entry tarjeta-inicio__fondo-blanco">
					<div class="categoria-seccion">
						<a href="%s">
							<p>%s</p>
						</a>
					</div>
					<div class="row">',
					$enlace_categoria,
					$nombre_categoria);

if( $noticia ){
	foreach ($noticia as $post):
		setup_postdata( $post );

		printf('
				<div class="col-xs-12 col-sm-6">
					<a href="%s">
						<h4 class="inicio__h4-title">%s</h4>
					</a>
					<a href="%s">
						%s
					</a>
				</div>',
				get_the_permalink(),
				get_the_title(),
				get_the_permalink(),
				get_the_post_thumbnail( $post->ID, 'medium', array('class'=>'img-responsive') )
			);
	endforeach;
}

printf('</div><hr><a class="btn-ver-mas" href="%s">VER MÁS</i></a></div></section></div>',$enlace_categoria);