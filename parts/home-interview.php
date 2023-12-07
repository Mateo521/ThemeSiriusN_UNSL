<?php
/* SECCIÓN ENTREVISTAS
-------------------------------------------------------------------------------------------------*/
$nombre_categoria = "Entrevistas";

$parametros = array(
	'numberposts'	=>	1,
	'category_name'		=>	$nombre_categoria
);
$noticia = get_posts($parametros);

if ($noticia) {
	$categoria = get_the_category($noticia[0]->ID);
	if (!empty($categoria)) {
		$enlace_categoria = esc_url(get_category_link($categoria[0]->term_id));
	}
}

if ($noticia) {


	foreach ($noticia as $post) :
		setup_postdata($post);
		printf(
			'
			<div class="container">
				<section class="tarjeta-inicio seccion-entrevistas">
					<div class="entry tarjeta-inicio__fondo-blanco entr">
				
						<div class="row img-entrevista" style="position:relative;">
						<div class="entrevista-r" style="position:absolute; z-index:55;">
							<div class="col-md-12 categoria-seccion" style="color:white;">
								<a href="%s">
									<p>%s</p>
								</a>
							</div>
							<div class="col-md-6" >
								<a href="%s">
									<h3>%s</h3>
								</a>
<!--
								<div class="subheading">
									<p>%s</p>
									</div>
-->
					</div>
				</div>
							
				<a href="%s">
									%s
								</a>
							
						</div>
						<hr>
						<a class="btn-ver-mas" style="padding:0 8px;"  href="%s">VER MÁS</i></a>
					</div>
				</section>
			</div>',
			$enlace_categoria,
			$nombre_categoria,
			get_the_permalink(),
			get_the_title(),
			get_the_excerpt(),
			get_the_permalink(),
			get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-responsive')),
			$enlace_categoria
		);
	endforeach;
	wp_reset_postdata();
} else {
	printf('<section></section>');
}

/* FIN DE SECCIÓN ENTREVISTAS */
?>
<style>
	.entrevista-r {
		width: 100%;
		bottom: 0;

		/*	background: rgb(0, 0, 0); */
		background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 1, 0) 100%);
	}

	@media screen and (max-width:766px) {

		.img-entrevista img {
			height: 200px;
		}

		.entrevista-r h3 {
			font-size: 15px;
		}

	}



	/* Ver el ancho de la imagen seccion entrevistas */

	.seccion-entrevistas img {
		width: 100%;
		/*  height: 525px; 
    object-fit: cover;
    object-position: 0 50%;
	*/
		/* animation: desplazar 60s linear infinite;*/
	}


	.entrevista-r,
	.entrevista-r a,
	.entrevista-r p {
		color: white !important;
	}

	.entr {
		padding: 0 0 30px 0 !important;
	}
</style>