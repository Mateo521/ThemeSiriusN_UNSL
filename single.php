<?php get_header();
$sirius_posts_featured_image_show = true; // Definir esta variable según la lógica de tu tema
?>
<?php $sirius_posts_sidebar = sirius_get_option('sirius_posts_sidebar'); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">

<?php while (have_posts()) : the_post();
    /*
    if ($sirius_posts_featured_image_show == true && has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image_meta = wp_get_attachment_metadata($image_id);
        $upload_dir = wp_upload_dir();
        if ($image_meta) {
            $image_file = basename(get_attached_file($image_id));
            $image_url = $upload_dir['baseurl'] . '/' . dirname($image_file) . '/' . $image_meta['file'];
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

            // Aplicar filtro para establecer la calidad de la imagen (movido fuera del bucle)
            add_filter('jpeg_quality', function ($arg) {
                return 100;
            });
?>
            <div class="entry-thumb"><img style="height:100%; object-position:top; object-fit:contain;" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-responsive"></div>
    <?php
        }
    }
*/
?>
    <section class="blog-post tarjeta-inicio" style=" justify-items:center;">
        <div class="redessticky">
            <ul style="list-style-type: none; position:sticky;top:100px; display:flex; flex-direction:column;align-items:center;padding:15px;">
                <li class="lis" style=" border-left: 3px solid #CCCCCC; height: 100px;"></li>
                <li class="facebook">
                    <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="blank" rel="noopener noreferrer">
                        <i class="fab fab-lg fa-facebook"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="blank" rel="noopener noreferrer">
                        <i class="fab fab-lg fa-twitter"></i>
                    </a>
                </li>
                <li class="instagram">
                    <a href="mailto:?Título&body=Noticias Universidad Nacional de San Luis:%20<?php the_permalink(); ?>" target="blank">
                        <svg style="filter: invert(98%) sepia(3%) saturate(16%) hue-rotate(314deg) brightness(83%) contrast(95%);" width="25" height="25" viewBox="0 0 18 14" fill="#CCCCCC" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.667 0.333328H2.33366C1.41699 0.333328 0.675326 1.08333 0.675326 1.99999L0.666992 12C0.666992 12.9167 1.41699 13.6667 2.33366 13.6667H15.667C16.5837 13.6667 17.3337 12.9167 17.3337 12V1.99999C17.3337 1.08333 16.5837 0.333328 15.667 0.333328ZM15.667 3.66666L9.00033 7.83333L2.33366 3.66666V1.99999L9.00033 6.16666L15.667 1.99999V3.66666Z" fill="#282828"></path>
                        </svg>
                    </a>
                </li>
                <li class="tiktok">
                    <a target="_blank" href="https://wa.me/?text=<?php the_permalink(); ?>" target="blank" data-action="share/whatsapp/share">
                        <i class="fab fab-lg fa-whatsapp"></i>
                    </a>
                </li>
                <li class="lis" style=" border-left: 3px solid #CCCCCC; height: 100px;"></li>
            </ul>
        </div>
        <div class="container">
            <?php if ($sirius_posts_sidebar == 1) { ?>
                <div class="row">
                    <div class="col-md-8 noticia-sin-bordes-laterales">
                        <div class="main-column two-columns" id="noticia">

                            <!-- Contenido principal -->
                            <?php get_template_part('parts/single', 'content'); ?>
                            <?php if (comments_open()) {
                                comments_template();
                            } ?>

                            <!-- Fin del contenido principal -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>


                <style>
                    .entry-thumb {
                        padding: 0 0 25px 0;
                        background-color: #3d7ecf00;
                    }

                    .contenedor1 {
                        display: grid;
                        border-top: 3px solid #1b5281;
                        grid-template-columns: repeat(2, 1fr);
                        width: 100%;
                        height: 100%;
                        justify-items: center;
                    }

                    .contenedor1 p {
                        margin: 0;
                    }

                    @media screen and (max-width:766px) {
                        .contenedor1 {
                            grid-template-columns: 1fr;
                            padding: 5px;
                        }
                    }
                </style>


                <?php


                function obtener_noticias_relacionadas($post_id, $cantidad = 10)
                {
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $cantidad,
                        'post__not_in' => array($post_id),
                        'orderby' => 'rand'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        return $query->posts;
                    } else {
                        return array();
                    }
                }



                $post_id = get_the_ID(); // Obtener el ID del post actual
                $noticias_relacionadas = obtener_noticias_relacionadas($post_id);
                ?>

                <!--div class="conn" style="display: flex; justify-content: center;">
                    <div style="max-width: 1200px; width: 100%; padding: 15px;">
                        <p style="background-color: #1b5281; display: inline-flex; padding: 5px; color: white; margin: 0;">También te puede interesar</p>
                        <div class="contenedor1">

              
                            <div style="padding: 5px; width: 100%;">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if (isset($noticias_relacionadas[$i])): $noticia = $noticias_relacionadas[$i]; ?>
                                        <div style="display:flex;gap: 10px; align-items: center; padding: 5px 0;">
                                            <?php if (has_post_thumbnail($noticia->ID)): ?>
                                                <img style="max-width:150px; width: 100%; height: 100px; object-fit: cover;" src="<?php echo get_the_post_thumbnail_url($noticia->ID, 'thumbnail'); ?>" alt="<?php echo get_the_title($noticia->ID); ?>">
                                            <?php else: ?>
                                                <img style="max-width:150px; width: 100%; height: 100px; object-fit: cover;" src="URL_DE_IMAGEN_POR_DEFECTO" alt="<?php echo get_the_title($noticia->ID); ?>">
                                            <?php endif; ?>
                                            <div style="margin: 0; display: flex; flex-direction: column; gap:5px;">
                                                <div> <b class="links" style="color: #4bb9ef;font-size:16px;"><?php echo get_the_category_list(', ', '', $noticia->ID); ?></b>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <p><?php echo wp_trim_words(strip_shortcodes(get_the_title($noticia->ID)), 10, '...'); ?></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                         
                            <div style="padding: 5px; width: 100%;">
                                <?php for ($i = 5; $i < 10; $i++): ?>
                                    <?php if (isset($noticias_relacionadas[$i])): $noticia = $noticias_relacionadas[$i]; ?>
                                        <div style="display:flex;gap: 10px; align-items: center; padding: 5px 0;">
                                            <?php if (has_post_thumbnail($noticia->ID)): ?>

                                                <img style="max-width:150px; width: 100%; height: 100px; object-fit: cover;" src="<?php echo get_the_post_thumbnail_url($noticia->ID, 'thumbnail'); ?>" alt="<?php echo get_the_title($noticia->ID); ?>">

                                            <?php else: ?>
                                                <img style="max-width:150px; width: 100%; height: 100px; object-fit: cover;" src="URL_DE_IMAGEN_POR_DEFECTO" alt="<?php echo get_the_title($noticia->ID); ?>">
                                            <?php endif; ?>
                                            <div style="margin: 0; display: flex; flex-direction: column; gap:5px;">

                                                <div> <b class="links" style="color: #4bb9ef;font-size:16px;"><?php echo get_the_category_list(', ', '', $noticia->ID); ?></b>

                                                    <a href="<?php the_permalink(); ?>">

                                                        <p><?php echo wp_trim_words(strip_shortcodes(get_the_title($noticia->ID)), 10, '...'); ?></p>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div-->
            <?php } else { ?>
                <?php get_template_part('parts/single', 'content'); ?>
                <?php if (comments_open()) {
                    comments_template();
                } ?>
            <?php } ?>
        </div>
    </section>



<?php endwhile; ?>
<script>
    function cambiarIcono(iconoId) {
        var icono = document.getElementById(iconoId);


        if (icono.classList.contains('fa-eye')) {
            icono.classList = 'fa fa-eye-slash';
        } else if (icono.classList.contains('fa-eye-slash')) {
            icono.classList = 'fa fa-eye';
        } else if (icono.classList.contains('fa-toggle-off')) {
            icono.classList = 'fa fa-toggle-on';
        } else if (icono.classList.contains('fa-toggle-on')) {
            icono.classList = 'fa fa-toggle-off';
        } else if (icono.classList.contains('fa-volume-off')) {
            icono.classList = 'fa fa-volume-up';
        } else if (icono.classList.contains('fa-volume-up')) {

            icono.classList = 'fa fa-volume-off';
        } else if (icono.classList.contains('fa-play')) {
            console.log("stop");
            icono.classList = 'fa fa-pause';
        } else if (icono.classList.contains('fa-pause')) {
            console.log("play");
            icono.classList = 'fa fa-play';
        }
    }

    function tipografia() {
        document.body.classList.toggle("tipog");
    }

    function blancoynegro() {
        document.documentElement.classList.toggle("grayscale");
    }


    jQuery(document).ready(function($) {
        $('#noticia img').each(function(index) {
            var $img = $(this);
            var imgSrc = $img.attr('src');
            var hasGalleryParent = $img.parents('figure.wp-block-gallery').length > 0;
            var $figcaption = $img.next('figcaption');
            var imgLink = $('<a>', {
                href: imgSrc,
                'data-lightbox': hasGalleryParent ? 'img-gallery' : 'img-' + (index + 1),
                'data-title': $figcaption.text().trim()
            });
            var imgElement = $('<img>', {
                src: imgSrc
            });
            $img.wrap(imgLink).after(imgElement).remove();
        });
    });
</script>



<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/js/lightbox-plus-jquery.js"></script>

<script>
    function onOpen() {
        document.body.style.overflow = 'hidden';
    }

    function onClose() {
        document.body.style.overflow = 'visible';
    }
    // 
    /*
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            onShown: function() {
                var $modal = $('.ekko-lightbox-modal');
                var $figure = $modal.find('figure');
                var $figcaption = $figure.find('figcaption');
                if ($figcaption.length) {
                    var caption = $figcaption.html();
                    $modal.find('.modal-footer').append('<div class="ekko-lightbox-footer">' + caption + '</div>');
                }
            },
            onNavigate: onClose,
            onClose: onClose
        });
    });
    */
</script>


<style>
    body {
        line-height: 1.5 !important;
    }

    .tarjeta-inicio {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .redessticky li {
        font-size: 25px;
    }

    .redessticky a {
        color: #CCCCCC;
    }

    @media screen and (max-width:766px) {

        .lis {
            display: none;
        }

        .redessticky {
             display: none; 
            position: fixed;
            right: 17px;
            bottom: 0;
            z-index: 99;
            bottom: 77px;
            background-color: #1D70B7;
            border-radius: 15px;
        }

        .tarjeta-inicio {
            display: block;
        }
    }

    /*
.lb-next, .lb-prev {
    opacity: 1 !important;
    display: block !important;
}
*/
    .related-post h2 {
        font-size: 18px;
        margin: 0;
    }

    .links a {

        color: #4bb9ef;
    }

    .tarjeta-inicio {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23ffffff' stroke-width='.5' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cuse fill='%23fcfcfc' href='%23s' y='2'/%3E%3Cuse fill='%23fcfcfc' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='2'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23f2f2f2'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23ffffff'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23efefef'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23B5C9FF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23B5C9FF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23B5C9FF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
        background-attachment: local;
        background-size: contain;
    }

    @font-face {
        font-family: 'OpenDyslexic-Regular';
        src: url(<?php echo get_template_directory_uri() . '/assets/fonts/OpenDyslexic-Regular.otf'; ?>) format('opentype');
    }

    html {
        transition: filter 1s;
        /* Change "1s" to any time you'd like */
    }

    html.grayscale {
        /* grayscale(1) makes the website grayscale */
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
    }

    .tipog {
        font-family: 'OpenDyslexic-Regular', sans-serif;
    }
</style>
<?php get_footer(); ?>