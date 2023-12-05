<?php
printf('
<div class="container">
	<section class="tarjeta-inicio seccion-cultura">
		<div class="entry bg-primary labs">
			<div class="row">');

$nombre_categoria = "Laboratorios";

$parametros = array(
		'numberposts'		=>	3,
		'category_name'		=>	$nombre_categoria
	);

$noticia = get_posts( $parametros );

if( $noticia ){
	$categoria = get_the_category( $noticia[0]->ID );
	if ( ! empty( $categoria ) ) {
		$enlace_categoria = esc_url( get_category_link( $categoria[0]->term_id ) );
	}
}
printf('<div class="col-md-12">
			<div class="categoria-seccion">
				<a href="%s">
					<p>%s</p>
				</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">',
		$enlace_categoria,
		$nombre_categoria);

if( $noticia ){
	foreach ($noticia as $post):
		setup_postdata( $post );

		printf('
				<div class="col-md-6">
					<a href="%s">
						<h3 class="inicio__h3-headline">%s</h3>
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

printf('</div><hr><a class="btn-ver-mas" href="%s">VER MÁS</a></div>',$enlace_categoria);



?>
	

</div></div></div></section></div>

<style>
 .labs a{
color: white !important;

}
.labs
{
	background-color:#0f2f49;
}

</style>