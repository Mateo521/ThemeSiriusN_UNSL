<?php
/* Nueva maquetación de la sección UNSL TV
-----------------------------------------------------------------*/
$nombre_categoria = "UNSL TV";

$parametros = array(
		'numberposts'	=>	1,
		'category_name'		=>	$nombre_categoria
	);

$contenido_unsltv = get_posts($parametros);

if( $contenido_unsltv ){
	$categoria = get_the_category( $contenido_unsltv[0]->ID );
	if ( ! empty( $categoria ) ) {
		$enlace_categoria = esc_url( get_category_link( $categoria[0]->term_id ) );
		$enlace_categoria_padre = esc_url( get_category_link( $categoria[0]->parent ) );
	}
}

if($contenido_unsltv){

	foreach ($contenido_unsltv as $post):
		setup_postdata( $post );
		printf('
			<div class="container">
				<section class="tarjeta-inicio">
					<div class="entry tarjeta-inicio__fondo-blanco">
						<div class="row">
							<div class="col-md-12 categoria-seccion">
								<a href="%s">
									<p>CANAL WEB</p>
								</a>
							</div>							
							<div class="col-sm-6">
								<a href="%s">
									%s
								</a>
							</div>
							<div class="col-sm-6">
								<div class="col-xs-7 col-sm-8">
									<a href="%s">
										<img class="img-responsive" alt="Logo de UNSL TV" src="%s">
									</a>
								</div>

								<div class="col-xs-12">
									<a href="%s">
										<h1>%s</h1>
									</a>
									<h4 class="inicio-principal__bajada">%s</h4>
								</div>
							</div>
						</div>
						<hr>
						<a class="btn-ver-mas" href="%s">VER MÁS</i></a>
					</div>
				</section>
			</div class="container">',
			$enlace_categoria_padre,
			get_the_permalink(),//$post->guid,
			get_the_post_thumbnail( $post->ID, 'sirius-large', array('class'=>'img-responsive') ),
			$enlace_categoria_padre,
			get_template_directory_uri()."/assets/img/isologo-unsltv-2018-630px.png",
			get_the_permalink(),//$post->guid,
			get_the_title(),//$post->post_title,
			get_the_excerpt(),
			$enlace_categoria
		);
	endforeach;
	wp_reset_postdata();
}
else{
	printf('<section></section>');
}