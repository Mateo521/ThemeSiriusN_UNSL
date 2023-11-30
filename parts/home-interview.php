<?php
/* SECCIÓN ENTREVISTAS
-------------------------------------------------------------------------------------------------*/
$nombre_categoria = "Entrevistas";

$parametros = array(
		'numberposts'	=>	1,
		'category_name'		=>	$nombre_categoria
	);
$noticia = get_posts($parametros);

if( $noticia ){
	$categoria = get_the_category( $noticia[0]->ID );
	if ( ! empty( $categoria ) ) {
		$enlace_categoria = esc_url( get_category_link( $categoria[0]->term_id ) );
	}
}

if($noticia){

	foreach ($noticia as $post):
		setup_postdata( $post );
		printf('
			<div class="container">
				<section class="tarjeta-inicio seccion-entrevistas">
					<div class="entry tarjeta-inicio__fondo-blanco">
						<div class="row">
							<div class="col-md-12 categoria-seccion">
								<a href="%s">
									<p>%s</p>
								</a>
							</div>
							<div class="col-md-6">
								<a href="%s">
									<h3>%s</h3>
								</a>
								<div class="subheading">
									<p>%s</p>
								</div>
							</div>
							<div class="col-md-6">
								<a href="%s">
									%s
								</a>
							</div>
						</div>
						<hr>
						<a class="btn-ver-mas" href="%s">VER MÁS</i></a>
					</div>
				</section>
			</div class="container">',
			$enlace_categoria,
			$nombre_categoria,
			get_the_permalink(),
			get_the_title(),
			get_the_excerpt(),
			get_the_permalink(),
			get_the_post_thumbnail( $post->ID, 'sirius-large', array('class'=>'img-responsive') ),
			$enlace_categoria
		);
	endforeach;
	wp_reset_postdata();
}
else{
	printf('<section></section>');
}
/* FIN DE SECCIÓN ENTREVISTAS */