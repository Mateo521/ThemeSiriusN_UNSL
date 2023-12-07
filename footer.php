    <!-- Footer -->
	<footer>
	
	<div class="container" id="footer">
			<div class="row">
				<div class="col-md-3">
					<h4 class="margen-titulo-footer">Información Institucional</h4>

					<a title="Enlace al sitio web de la UNSL" href="http://www.unsl.edu.ar" target="_blank">
						<img class="img-responsive footer-logo-unsl" alt="Logo de la UNSL" src="<?php echo get_template_directory_uri(); ?>/assets/img/isologo_unsl_color_footer.png">
					</a>


					<p><b>Teléfono:</b> +54 (0266) 4520300 - 4530000</p>
					<p><b>Dirección:</b> Ejército de Los Andes 950, San Luis, Argentina</p>
				</div>

				<div class="col-md-3">
					<h4 class="margen-titulo-footer">Contacto</h4>

					<a title="Enlace al sitio web Noticias UNSL" href="<?php echo esc_url(home_url('/')); ?>" target="_blank">
						<img class="img-responsive footer-logo-unsl" alt="Logo de Noticias UNSL" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo%20noticias%20web.png">
					</a>
					
					<p><b>Teléfono:</b> +54 (0266) 4520300</p>
					<p><b>Interno:</b> 5216</p>
					<p><b>Ubicación:</b> 2° Piso Edificio Rectorado - Ala A</p>
					<p><b>¿Cómo llegar?</b> <a href="https://goo.gl/maps/JfpaQGqv7zH2" target="_blank">Ver úbicación en Google Maps</a></p>
					<p><b>Email:</b> <a href="mailto:prensa@unsl.edu.ar">prensa@unsl.edu.ar</a></p>
				</div>

				<div class="col-md-3">
					<h4 class="margen-titulo-footer">Redes Sociales</h4>
                    <a href="https://www.facebook.com/noticias.unsl/" target="_blank" title="Ir a fanpage de UNSL en Facebook">
						<img style="margin: 0px 5px 20px 0px"
							alt="Logo Facebook"
							aria-hidden="true"
							src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-aplicacion-facebook-azul-claro.svg"
							width="30px">Universidad Nacional de San Luis
					</a>
					<br>
					<a href="https://www.instagram.com/unslactiva/" target="_blank" title="Ir a UNSL ACTIVA en Instagram">
						<img 	style="margin: 0px 5px 20px 0px" 
								alt="Logo Instagram"
								aria-hidden="true"
								src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-de-instagram.svg"
								width="30px">unslactiva
					</a>
					<br>
					<a href="https://www.youtube.com/channel/UC1NJ3ir99QUd0ErmD1-q-JA/videos" target="_blank" title="Ir a Canal de Youtube de la UNSL">
						<img 	style="margin: 0px 5px 20px 0px" 
								alt="Logo Youtube"
								aria-hidden="true"
								src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-de-youtube.svg"
								width="30px">Universidad Nacional de San Luis
					</a>
					<br>
					<a href="https://twitter.com/noticiasUNSL" target="_blank" title="Ir a Noticias UNSL en Twitter">
						<img 	style="margin: 0px 5px 20px 0px" 
								alt="Logo Twitter"
								aria-hidden="true"
								src="<?php echo get_template_directory_uri(); ?>/assets/icons/simbolo-de-twitter.svg"
								width="30px">noticiasUNSL
					</a>
					<br>
					<h4>Buscador</h4>
					<?php if(is_active_sidebar('sidebar-header')) { ?>
						<div class="sidebar-header">
							<?php dynamic_sidebar('sidebar-header'); ?>
						</div>
					<?php } ?>
				</div>
				
				<div class="margen-titulo-footer col-md-3">
					<h4>Mapa de Sitio</h4>
					<?php 
                    if ( has_nav_menu( 'footer' ) ) { 
                        wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => 1, 'container' => '', 'menu_class' => 'footer-menu' ) );
                    } 
                    ?>
                    
				</div>
			</div><!--/row-->


			<!-- Atribuciones -->
			<hr>
			<p>Diseño y desarrollo a cargo de la Secretaría de Comunicación Institucional - Versión 1.3.0 - Contacto: <a href="mailto:sci@unsl.edu.ar">sci@unsl.edu.ar</a></p>
		</div>
	</footer>
	<!-- /Footer -->

</div><!-- /Main Wrapper -->

<?php wp_footer(); ?>
<style>
	    .related-post {
        padding: 10px;
        margin: 5px;
    
        background-color: white;
        border: solid whitesmoke 1px;
    }
    .related-posts{
        grid-template-columns: repeat(4, 1fr);
    }

    @media screen and (max-width:766px) {

        .related-posts{

            grid-template-columns: 1fr;
        }
    }

</style>
</body>
</html>
