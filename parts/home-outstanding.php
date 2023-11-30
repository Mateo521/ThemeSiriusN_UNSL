<?php
/* SECCIÓN DESTACADO
--------------------------------------------------------------------------------------*/
printf('	</section>
		</div>
		<div class="col-md-3">
			<section class="tarjeta-inicio">'
	);

$nombre_categoria = "Destacado";

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

printf('<div class="entry tarjeta-inicio__fondo-azul tarjeta-seccion-destacado">
			<div class="categoria-seccion">
				<a href="%s">
					<p>%s</p>
				</a>
			</div>
			<div class="row">',
			$enlace_categoria,
			$nombre_categoria);

if($noticia){
	foreach ($noticia as $post):
		setup_postdata( $post );
		printf('<div class="col-xs-12">
					<a href="%s">
						<h3>%s</h3>
					</a>
					<a href="%s">
						%s
					</a>
				</div>',
				get_the_permalink(),
				get_the_title(),
				get_the_permalink(),
				get_the_post_thumbnail( $post->ID, 'sirius-related', array('class'=>'img-responsive') )
			);
	endforeach;
}
printf('</div></div>');