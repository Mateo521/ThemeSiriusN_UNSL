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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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

        <!-- Header Row 1: Eliminada -->

        <!-- Header Row 2 -->
        <!--div class="header-row-2"-->
        <!--div-->
        <!--row-->
        <!--div class="row"-->
        <div class="encabezado__margen-superior">
            <!-- Izquierda: Logo de la UNSL y de la Dependencia -->
            <!--div class="col-xs-12 col-sm-5"-->
            <div class="logo <?php if (sirius_get_option('sirius_image_logo_show') == 1) { ?>image-logo<?php } ?>">
                <?php
                //Logo
                if (sirius_get_option('sirius_image_logo_show') == 1) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home" itemprop="url">'
                            . '<img style="width:250px;height:auto;" src="' . esc_url($logo[0])
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
            <div class="idioma hidden-sm hidden-md hidden-lg"></div>
            <!--/div-->

            <!-- Centro: Redes Sociales -->
            <!--div class="hidden-xs col-sm-4 col-md-3" style="margin-top: 20px"-->
            <!--
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
									-->

            <!--/div-->

            <!-- Derecha: Buscador-->
            <!--div class="hidden-xs col-sm-3 col-md-4"-->
            <?php
            if (is_active_sidebar('sidebar-header')) { ?>
                <div class="sidebar-header">
                    <?php dynamic_sidebar('sidebar-header'); ?>
                </div>
            <?php } ?>
            <!--/div-->

        </div>
        <!--Encabezado-->
        <div class="col-xs-3 hidden-sm hidden-md hidden-lg" style="display: inline-block; width: 100%;">
            <?php
            if (is_active_sidebar('sidebar-header')) { ?>
                <div class="sidebar-header">
                    <?php dynamic_sidebar('sidebar-header'); ?>
                </div>
            <?php } ?>
        </div>
        <!--/div-->
        <!--/row-->
        <!--/div-->
        <!--/container-->
        </header>
    </div>
    <!--/div-->
    <!-- /Header Row 2 -->
    <div class="container-fluid fondo-menu d-none d-md-block" id="navbar">





        <div class="container">
            <div class="row">
                <!-- Main Menu -->

                <div class="col-xs-12 col-sm-12">


                    <nav class="navbar navbar-default menu-principal">

                        <div class="navbar-header" style="position:relative;z-index:0;">




                            <form role="search" name="main-search" method="get" class="search1" action="<?php echo esc_url(home_url('/')); ?>">

                                <div class="search">
                                    <input type="search" placeholder=" " name="s">

                                    <div>
                                        <svg>
                                            <use xlink:href="#path">
                                        </svg>
                                    </div>

                                </div>
                            </form>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 28" id="path">
                                    <path d="M32.9418651,-20.6880772 C37.9418651,-20.6880772 40.9418651,-16.6880772 40.9418651,-12.6880772 C40.9418651,-8.68807717 37.9418651,-4.68807717 32.9418651,-4.68807717 C27.9418651,-4.68807717 24.9418651,-8.68807717 24.9418651,-12.6880772 C24.9418651,-16.6880772 27.9418651,-20.6880772 32.9418651,-20.6880772 L32.9418651,-29.870624 C32.9418651,-30.3676803 33.3448089,-30.770624 33.8418651,-30.770624 C34.08056,-30.770624 34.3094785,-30.6758029 34.4782612,-30.5070201 L141.371843,76.386562" transform="translate(83.156854, 22.171573) rotate(-225.000000) translate(-83.156854, -22.171573)"></path>
                                </symbol>
                            </svg>




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

        <ul class='social'>
            <li class='facebook'>
                <a>
                    <i class='fab fab-lg fa-facebook'></i>
                </a>
            </li>
            <li class='twitter'>
                <a>
                    <i class='fab fab-lg fa-twitter'></i>
                </a>
            </li>
            <li class='instagram'>
                <a>
                    <i class='fab fab-lg fa-instagram'></i>
                </a>
            </li>
            <li class='tiktok'>
                <a>
                    <i class='fab fab-lg fa-tiktok'></i>
                </a>
            </li>
        </ul>

    </div>

    <!--div class="head" style=" position:relative;width:100%;"></div-->
    <style>
        .social {
            margin: 0;
            text-align: center;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            padding: 5px 15px;
        }

        .social li {
            list-style-type: none;
            display: inline-block;
            margin: 0 0 0 -10px;
            padding: 0;
        }

        .social li a {
            text-align: center;
            color: #444444;
        }

        .social li a i {
            display: inline-block;
            font-size: 0;
            line-height: 1;
            cursor: pointer;
            padding: 10px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            position: relative;
            color: #fff;
            z-index: 1;
            transition: all 0.2s ease-in-out;
        }

        .social li a i:before {
            font-size: 20px;
            z-index: 2;
            position: relative;
        }

        .social li a i:after {
            opacity: 0;
            pointer-events: none;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border-radius: 100%;
            content: "";
            transform: scale(0.2);
            transition: all 0.2s ease-in-out;
        }

        .social li a i:hover {
            color: #ffffff;
        }

        .social li a i:hover:after {
            transform: scale(1);
            opacity: 1;
        }

        .social .facebook .fa:after {
            background: #3b5998;
        }

        .social .twitter .fa:after {
            background: #55acee;
        }

        .social .instagram .fa:after {
            background: #125688;
        }

        .social .tiktok .fa:after {
            background: #007bb5;
        }

        .social .rss .fa:after {
            background: #ff6600;
        }

        #fixedLogo {

            left: 0;
            position: absolute;
            padding: 6px 0;


            pointer-events: all;
            z-index: 99;
            top: 50%;
            transform: translateY(-50%);
        }

        #fixedLogo img {
            z-index: 99;
            max-height: 55px;

            /* height: 100%; */
            /* width: 100%; */

            /* position: relative; */
        }

        .logo.image-logo,
        .logo {
            padding: 25px;
        }

        .encabezado__margen-superior {
            margin: 0 !important;
            padding: 0;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .head {
            height: 144px;
        }

        .navbar-header {
            display: none;
        }

        @media screen and (max-width:766px) {
            .encabezado__margen-superior {
                padding: 10px;
            }

            #fixedLogo img {
                max-height: 37px;
            }




            .navbar-header {
                align-items: center;
                display: flex;
                gap: 10px;
                justify-content: flex-end;
            }

            .social {
                display: none;
            }

            .logo.image-logo,
            .logo {
                padding: 0;
            }

            .head {
                height: 215px;
            }
        }

        .header-row-2 {
            background-color: white !important;
        }

        #navbar {
            position: sticky;
            width: 100%;
            z-index: 9999;
            top: 0;
            padding: 5px 0;
            transition: top 0.65s;

        }

        body {
            background-color: whitesmoke !important;
        }

        .tarjeta-inicio .entry img {
            width: 100%;
        }

        .main-wrapper {
            overflow: visible !important;
        }

        /*
			.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
				width: 100% !important;
			}



			

			.tarjeta-inicio__fondo-blanco img {
				height: 200px;
			}*/


        /*.facebook
        :root {
            font-size: calc(16px + (24 - 16)*(100vw - 320px)/(1920 - 320));
        }
*/

        .search {
            display: table;
        }

        .search input {
            background: none;
            border: none;
            outline: none;
            width: 28px;
            min-width: 0;
            padding: 0;
            z-index: 1;
            position: relative;
            line-height: 18px;
            margin: 5px 0;
            font-size: 14px;
            -webkit-appearance: none;
            font-family: "Mukta Malar";
            transition: all 0.6s ease;
            cursor: pointer;
            color: #fff;
        }

        .search input+div {
            position: relative;
            height: 28px;
            width: 100%;
            margin: -28px 0 0 0;
        }

        .search input+div svg {
            display: block;
            position: absolute;
            height: 28px;
            width: 160px;
            right: 0;
            top: 0;
            fill: none;
            stroke: #fff;
            stroke-width: 1.5px;
            stroke-dashoffset: 271.908;
            stroke-dasharray: 59 212.908;
            transition: all 0.6s ease;
        }

        .search input:not(:-moz-placeholder-shown) {
            width: 160px;
            padding: 0 4px;
            cursor: text;
        }

        .search input:not(:-ms-input-placeholder) {
            width: 160px;
            padding: 0 4px;
            cursor: text;
        }

        .search input:not(:placeholder-shown),
        .search input:focus {
            width: 160px;
            padding: 0 4px;
            cursor: text;
        }

        .search input:not(:-moz-placeholder-shown)+div svg {
            stroke-dasharray: 150 212.908;
            stroke-dashoffset: 300;
        }

        .search input:not(:-ms-input-placeholder)+div svg {
            stroke-dasharray: 150 212.908;
            stroke-dashoffset: 300;
        }

        .search input:not(:placeholder-shown)+div svg,
        .search input:focus+div svg {
            stroke-dasharray: 150 212.908;
            stroke-dashoffset: 300;
        }

        ::-moz-selection {
            background: rgba(255, 255, 255, 0.2);
        }

        ::selection {
            background: rgba(255, 255, 255, 0.2);
        }

        ::-moz-selection {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            var logo = $('#fixedLogo');
            if ($(window).width() < 766) {
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();

                    if (scroll >= 145) {
                        logo.fadeIn();
                    } else {
                        logo.fadeOut();
                    }
                });
            }
        });
    </script>

    <!-- /Header -->