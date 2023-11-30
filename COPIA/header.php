<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="google-site-verification" content="8MoPVlOgrn4Fi-lxmomglQWpO7C9tS9fhr9WQXFSBEg" />
	<?php if (is_singular() && 'open' === get_option('default_ping_status')) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-103162636-2', 'auto');
		ga('send', 'pageview');
	</script>
	<div class="main-wrapper">

		<!-- Header -->

		<header style="position: fixed; width:100%;">
			<!-- Header Row 1: Eliminada -->

			<!-- Header Row 2 -->
			<div class="header-row-2">
				<div class="container">
					<!--row-->
					<div class="row">
						<div class="encabezado__margen-superior">
							<!-- Izquierda: Logo de la UNSL y de la Dependencia -->
							<div class="col-xs-12 col-sm-5">
								<div class="logo <?php if (sirius_get_option('sirius_image_logo_show') == 1) { ?>image-logo<?php } ?>">
									<?php
									//Logo
									if (sirius_get_option('sirius_image_logo_show') == 1) {
										$custom_logo_id = get_theme_mod('custom_logo');
										$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
										if (has_custom_logo()) {
											echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home" itemprop="url">'
												. '<img src="' . esc_url($logo[0])
												. '" alt="' . esc_html(get_bloginfo('name'))
												. '" title="Enlace a la página de Inicio de '
												. esc_html(get_bloginfo('name'))
												. '" class="custom-logo img-responsive" itemprop="logo">'
												. '</a>';
										}
									} else {
										//Texto Alternativo al Logo 
										$sirius_text_logo = sirius_get_option('sirius_text_logo');
										if ($sirius_text_logo == '') $sirius_text_logo = get_bloginfo('name'); ?>
										<h1 class="header-logo-text">
											<a href="<?php echo esc_url(home_url('/')); ?>" title="Enlace a la página de Inicio de <?php echo esc_html($sirius_text_logo) ?>">
												<?php echo esc_html($sirius_text_logo) ?>
											</a>
										</h1>
									<?php } ?>
								</div>
							</div>

							<!-- Centro: Redes Sociales -->
							<div class="hidden-xs col-sm-4 col-md-3" style="margin-top: 20px">
								<a href="https://www.facebook.com/noticias.unsl/" target="_blank" title="Ir a fanpage de UNSL en Facebook">
									<img style="margin:0px 0px 10px 12px;" alt="Logo Facebook" aria-hidden="true" src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-aplicacion-facebook-azul-claro.svg" width="30px">
								</a>
								<a href="https://www.instagram.com/unslactiva/" target="_blank" title="Ir a UNSL ACTIVA en Instagram">
									<img style="margin:0px 0px 10px 12px;" alt="Logo Instagram" aria-hidden="true" src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-de-instagram.svg" width="30px">
								</a>
								<a href="https://www.youtube.com/channel/UC1NJ3ir99QUd0ErmD1-q-JA/videos" target="_blank" title="Ir a Canal de Youtube de la UNSL">
									<img style="margin:0px 0px 10px 12px;" alt="Logo Youtube" aria-hidden="true" src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-de-youtube.svg" width="30px">
								</a>
								<a href="https://twitter.com/noticiasUNSL" target="_blank" title="Ir a Noticias UNSL en Twitter">
									<img style="margin:0px 0px 10px 12px;" alt="Logo Twitter" aria-hidden="true" src="<?php echo get_template_directory_uri(); ?>/assets/icons/simbolo-de-twitter.svg" width="30px">
								</a>
							</div>

							<!-- Derecha: Buscador-->
							<div class="hidden-xs col-sm-3 col-md-4" style="margin-top: 20px">
								<?php
								if (is_active_sidebar('sidebar-header')) { ?>
									<div class="sidebar-header">
										<?php dynamic_sidebar('sidebar-header'); ?>
									</div>
								<?php } ?>
							</div>

						</div><!--Encabezado-->
					</div><!--/row-->
				</div><!--/container-->
				<div class="container-fluid fondo-menu">
					<div class="container">
						<div class="row">
							<!-- Main Menu -->
							<div class="col-xs-12 col-sm-12">
								<nav class="navbar navbar-default menu-principal">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
											<span class="sr-only"><?php echo esc_html__('Toggle Navigation', 'sirius-lite'); ?></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<?php
									$args = array(
										'theme_location'    => 'main',
										'depth'             => 2,
										'container'         => 'div',
										'container_class'   => 'collapse navbar-collapse',
										'menu_class'        => 'nav navbar-nav',
										'fallback_cb'       => 'sirius_default_nav',
										'walker'            => new wp_bootstrap_navwalker()
									);
									wp_nav_menu($args);
									?>
								</nav>
							</div><!-- /Main Menu -->
						</div>
					</div>
				</div>
			</div><!-- /Header Row 2 -->
		</header>
		<div style="display: block;position:relative;width:100%;height:155px;"></div>
		
		<!-- /Header -->
		<style>
			body {
				background-color: #efefef;
			}
		</style>