<?php
/* SECCIÓN PRINCIPAL
-----------------------------------------------------------------*/
$nombre_categoria = "PRINCIPAL";

$parametros = array(
		'numberposts'	=>	1,
		'category_name'		=>	$nombre_categoria
	);

$noticia_principal = get_posts($parametros);

if($noticia_principal){

	foreach ($noticia_principal as $post):
		setup_postdata( $post );
		printf('
	
		<div class="container">
				<section class="tarjeta-inicio">
					<div class="entry tarjeta-inicio__fondo-blanco tarjeta-principal">
						<div class="row">
							<div class="col-md-12 categoria-seccion">
								<p>%s</p>
							</div>
							<div class="col-md-7">
								<a href="%s">
									<h1>%s</h1>
								</a>
								<h4 class="inicio-principal__bajada">%s</h4>
							</div>
							<div class="col-md-5">
								<a href="%s">
									%s
								</a>
							</div>
						</div>
					</div>
				</section>
			</div class="container">',
			$nombre_categoria,
			get_the_permalink(),//$post->guid,
			get_the_title(),//$post->post_title,
			get_the_excerpt(),
			get_the_permalink(),//$post->guid,
			get_the_post_thumbnail( $post->ID, 'sirius-large', array('class'=>'img-responsive') )
		);
	endforeach;
	wp_reset_postdata();
}
else{
	printf('<section></section>');
}