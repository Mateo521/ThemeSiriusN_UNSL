<?php
$sirius_posts_meta_show = sirius_get_option('sirius_posts_meta_show');
$sirius_posts_date_show = sirius_get_option('sirius_posts_date_show');
$sirius_posts_category_show = sirius_get_option('sirius_posts_category_show');
$sirius_posts_author_show = sirius_get_option('sirius_posts_author_show');
$sirius_posts_tags_show = sirius_get_option('sirius_posts_tags_show');
$sirius_posts_featured_image_show = sirius_get_option('sirius_posts_featured_image_show');

$sirius_posts_featured_image_full = sirius_get_option('sirius_posts_featured_image_full');
$banner_size = $sirius_posts_featured_image_full == 1 ? 'full' : 'sirius-thumb';
?>

<!-- Post Content -->
<div id="post-<?php the_ID(); ?>" <?php post_class('entry details entry-single tarjeta-inicio__fondo-blanco tarjeta-principal'); ?> style="padding:0 30px 30px;">
    <!-- Imprimir categorías -->
    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap;">
        <div class="post-categories">
            <?php the_category(', '); ?>
        </div>

        <div class="flex items-center gap-3" style="display: flex; align-items:center; gap:5px; padding:10px;">
            <button class="boton" id="boton1" onclick="tipografia(); cambiarIcono('icono1')">
                <i id="icono1" class="fa fa-eye" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>
            <button class="boton" id="boton2" onclick="blancoynegro(); cambiarIcono('icono2')">
                <i id="icono2" class="fa fa-toggle-off" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>


            <!--script src="https://code.responsivevoice.org/responsivevoice.js?key=a8aJefCk"></script-->


            <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

            <button class="boton" id="boton3" onclick="handleButtonClick();">
                <i id="icono3" class="fa fa-volume-off" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>



            <button class="boton" style="display: none;" id="boton4" onclick="handlePauseResume();">
                <i id="icono4" class="fa fa-pause" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>



            <!--button class="boton" id="boton3" onclick="cambiarIcono('icono3')">
                <i id="icono3" class="fa fa-volume-off" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>

            <button class="boton" id="botonStop" style="display:none;" onclick="stopSynthesis()">
                <i id="icono4" class="fa fa-stop" aria-hidden="true"></i>
            </button-->



        </div>





    </div>
    <script>
        function handleButtonClick() {
            cambiarIcono('icono3');

            readTextFromNoticia();

        }
    </script>
    <style>
        .boton {
            cursor: pointer;
            width: 35px;
            border: none;
            background-color: white;
            border-radius: 50%;
            padding: 5px 10px;
        }

        .boton i {
            pointer-events: none;
        }

        figure {
            position: relative;
        }

        figcaption {
            font-size: 14px;
            position: relative;
            color: white;
            margin: 0 !important;
            bottom: 0;
            width: 100%;
            padding: 10px;
            background-color: #002a3db8;
        }
    </style>


    <div class="entry-body">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
        <?php /* Title */
        if (get_the_title() != '') { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php } else { ?>
            <h1 class="entry-title"><?php echo esc_html__('Post ID: ', 'sirius-lite');
                                    the_ID(); ?></h1>
        <?php } ?>
        <?php /* Meta */
        if ($sirius_posts_meta_show == 1) { ?>
            <ol class="entry-meta">
                <?php if ($sirius_posts_date_show == 1) { ?><li><i class="fa fa-clock-o"></i> <?php echo get_the_date() ?></li><?php } ?>
            </ol>
            <br>
        <?php } ?>
        <?php

        if ($sirius_posts_featured_image_show == 1 && has_post_thumbnail() && !in_category('entrevistas')) {
            $image_id = get_post_thumbnail_id();
            $image_meta = wp_get_attachment_metadata($image_id);
            $upload_dir = wp_upload_dir();

            if ($image_meta) {
                $image_file = basename(get_attached_file($image_id));
                $image_url = $upload_dir['baseurl'] . '/' . dirname($image_file) . '/' . $image_meta['file'];
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);


                add_filter('jpeg_quality', function ($arg) {
                    return 100;
                });

        ?>
                <div class="entry-thumb">


                    <img
                        src="<?php echo esc_url($image_url); ?>"
                        srcset="<?php echo esc_url(wp_get_attachment_image_srcset($image_id)); ?>"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="<?php echo esc_attr($image_alt); ?>"
                        class="img-responsive"
                        loading="lazy">



                </div>

        <?php }
        }  ?>





        <div id="contenidonoticia" class="entry-content clearfix">
            <?php if (get_post_format() == 'video') {
                $sirius_post_meta = get_post_meta(get_the_ID(), '_video_post_meta', TRUE);
                if (array_key_exists('youtube_link', $sirius_post_meta)) { ?>
                    <div class="iframe-embed"><iframe width="100%" height="315" src="<?php echo esc_url($sirius_post_meta['youtube_link']); ?>" frameborder="0" allowfullscreen></iframe></div><br />
            <?php }
            } ?>
            <?php the_content();
            wp_link_pages(); ?>
        </div>

        <?php /* Meta */
        if ($sirius_posts_meta_show == 1) { ?>

            <?php if ($sirius_posts_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><span><?php echo esc_html__('Etiquetas: ', 'sirius-lite'); ?></span><?php the_tags('', ', '); ?></div><?php } ?>

            <!--ol class="entry-meta">
                <?php if ($sirius_posts_date_show == 1) { ?><li><i class="fa fa-clock-o"></i> <?php echo get_the_date() ?></li><?php } ?>

                <?php if ($sirius_posts_author_show == 1) { ?><li><i class="fa fa-user"></i> <?php the_author(); ?></li><?php } ?>
            </ol-->
        <?php } ?>

    </div>


    <script>
        var isSpeaking = false;
        var isPaused = false;

        function handleButtonClick() {
            cambiarIcono('icono3');
            readTextFromNoticia();
        }

        function handlePauseResume() {
            if (isSpeaking) {


                if (isPaused) {
                    responsiveVoice.resume();
                    isPaused = false;
                    cambiarIcono('icono4');
                } else {
                    responsiveVoice.pause();
                    isPaused = true;
                    cambiarIcono('icono4');
                }
            }
        }



        function readTextFromNoticia() {
            document.getElementById("boton4").style.display = "block";
            var text = $('#noticia').clone()
                .find('style, script, img')
                .remove()
                .end()
                .text()
                .replace(/\s+/g, ' ')
                .trim();

            if (isSpeaking) {
                responsiveVoice.cancel();
                isSpeaking = false;

                document.getElementById("boton4").style.display = "none";
                isPaused = false;

            } else {



                responsiveVoice.speak(text, 'Spanish Latin American Male');
                isSpeaking = true;
                isPaused = false;
            }
        }


        window.addEventListener('beforeunload', function(event) {
            responsiveVoice.cancel();
        });
    </script>



    <ul class="mobile-red" style="list-style-type: none;/* position: relative; */top:100px;/* flex-direction:column; */align-items:center;gap: 15px;padding:15px;">
        <li class="lis" style=" border-left: 3px solid #CCCCCC; height: 100px;"></li>
        <li class="facebook">
            <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=https://scivz.unsl.edu.ar/noticias/13/03/2024/alvaro-maglia-la-educacion-publica-argentina-siempre-ha-tenido-un-compromiso-con-el-pais/" rel="noopener noreferrer">
                <i class="fab fab-lg fa-facebook"></i>
            </a>
        </li>
        <li class="twitter">
            <a href="https://twitter.com/intent/tweet?text=https://scivz.unsl.edu.ar/noticias/13/03/2024/alvaro-maglia-la-educacion-publica-argentina-siempre-ha-tenido-un-compromiso-con-el-pais/" target="blank" rel="noopener noreferrer">
                <i class="fab fab-lg fa-twitter"></i>
            </a>
        </li>
        <li class="instagram">
            <a href="mailto:?Título&amp;body=Noticias Universidad Nacional de San Luis:%20https://scivz.unsl.edu.ar/noticias/13/03/2024/alvaro-maglia-la-educacion-publica-argentina-siempre-ha-tenido-un-compromiso-con-el-pais/" target="blank">
                <svg style="filter: invert(98%) sepia(3%) saturate(16%) hue-rotate(314deg) brightness(83%) contrast(95%);" width="25" height="25" viewBox="0 0 18 14" fill="#CCCCCC" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.667 0.333328H2.33366C1.41699 0.333328 0.675326 1.08333 0.675326 1.99999L0.666992 12C0.666992 12.9167 1.41699 13.6667 2.33366 13.6667H15.667C16.5837 13.6667 17.3337 12.9167 17.3337 12V1.99999C17.3337 1.08333 16.5837 0.333328 15.667 0.333328ZM15.667 3.66666L9.00033 7.83333L2.33366 3.66666V1.99999L9.00033 6.16666L15.667 1.99999V3.66666Z" fill="#282828"></path>
                </svg>
            </a>
        </li>
        <li class="tiktok">
            <a target="_blank" href="https://wa.me/?text=https://scivz.unsl.edu.ar/noticias/13/03/2024/alvaro-maglia-la-educacion-publica-argentina-siempre-ha-tenido-un-compromiso-con-el-pais/" data-action="share/whatsapp/share">
                <i class="fab fab-lg fa-whatsapp"></i>
            </a>
        </li>
        <li class="lis" style=" border-left: 3px solid #CCCCCC; height: 100px;"></li>
    </ul>


</div>
<!-- /Post Content -->


<style>
    .mobile-red {
        display: none;
    }

    @media screen and (max-width:766px) {
        .mobile-red {
            display: flex;
        }
    }
</style>