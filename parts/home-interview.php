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
			<div>
			<p style="margin:0 ; display:inline-flex;  padding:5px 10px; background-color:#1b5281; color:white;">Entrevistas</p>
				<section class="tarjeta-inicio seccion-entrevistas" style="border-top:solid #1b5281 3px;">
					<div class="entry tarjeta-inicio__fondo-blanco entr">
				
						<div class="row img-entrevista" style="position:relative;margin:0;">
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
			</div></div>

			',
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

<div style="  
  position: sticky;
  top: 55px;
  left: 0;
  align-self: start;">
	<div class="tarjetas-info">



	<?php
// Obtener la última entrada de la categoría "Principal"
$principal_query = new WP_Query(array(
    'category_name' => 'principal',
    'posts_per_page' => 1,
));

// Verificar si hay entradas
if ($principal_query->have_posts()) {
    while ($principal_query->have_posts()) {
        $principal_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
            <div style="padding: 10px;">
                <p style="margin: 0; display:inline-flex;  padding:5px 10px; background-color:#1b5281; color:white;">Principal</p>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full', array('style' => 'width:100%; border-top: solid #1b5281 3px; max-height:150px;object-fit:cover;'));
                } ?>
                 <h4 style="margin:0;">→ <?php the_title(); ?></h4>
                <!--p><?php the_excerpt(); ?></p-->
            </div>
        </a>
<?php }
}

// Restaurar datos originales de la consulta principal
wp_reset_postdata();

// Obtener la última entrada de la categoría "Destacado"
$destacado_query = new WP_Query(array(
    'category_name' => 'destacado',
    'posts_per_page' => 1,
));

// Verificar si hay entradas
if ($destacado_query->have_posts()) {
    while ($destacado_query->have_posts()) {
        $destacado_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
            <div style="padding: 10px;">
                <p style="margin: 0; display:inline-flex;  padding:5px 10px; background-color:#1b5281; color:white;">Destacado</p>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full', array('style' => 'width:100%; border-top: solid #1b5281 3px;  max-height:150px;object-fit:cover;'));
                } ?>
                <h4 style="margin:0;">→ <?php the_title(); ?></h4>
                <!--p><?php the_excerpt(); ?></p-->
            </div>
        </a>
<?php }
}

// Restaurar datos originales de la consulta principal
wp_reset_postdata();
?>





	</div>
</div>

</div>
</div>
</div>
</div>
</section>


<style>
	.tarjetas-info a{
		color: inherit;

	}
	.stick {
		display: grid;
		gap: 10px;
		grid-template-columns: 70% 30%;
		justify-items: center;

	}
	@media screen and (max-width:800px) {
		.stick {
		grid-template-columns: 1fr;
		}
		
	}

	.fond {
		font-family: 'Skema Pro Display';
		background-color: #ffffff;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23ffffff' stroke-width='0.6' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cuse fill='%23fcfcfc' href='%23s' y='2'/%3E%3Cuse fill='%23fcfcfc' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='2'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23f2f2f2'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23ffffff'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23efefef'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23C8ECFF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23C8ECFF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23C8ECFF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
		background-attachment: local;
		background-size: cover;
	}

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