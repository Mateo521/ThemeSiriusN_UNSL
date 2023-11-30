<?php
printf('
<div class="container">
	<section class="tarjeta-inicio seccion-cultura">
		<div class="entry tarjeta-inicio__fondo-blanco">
			<div class="row">');

$nombre_categoria = "Cultura";

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



//Agenda Cultural

echo('<div class="col-md-4">
			<div class="row separador">
				<div class="col-md-12">
					<a >
						<h3 class="inicio__h3-headline">Agenda Cultural</h3>
							</a>													
					<div class="agenda-cultural__fecha-evento">');
if( function_exists('add_eventon')){
	$args = array(		
		'show_et_ft_img' => 'yes',		
		'cal_id' => 120,
		'event_type' => 120,
		'show_upcoming' => 2,
		'number_of_months' => 0,
		'event_count' => 5,
        'exp_jumper' => 'yes',        
		 );
	add_eventon($args);
}		
?>
</div>
				</div>
			</div>
			<hr><a class="btn-ver-mas" href="event-type/agenda-cultural/">VER MÁS</a>
		</div>
	

</div></div></div></section></div>