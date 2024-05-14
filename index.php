<?php get_header(); ?>

<?php if (is_front_page() && !is_paged()) {
    get_template_part('parts/frontpage', 'banner');
} ?>

<?php $sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show'); ?>

<section class="blog-feed">
    <div class="container">

        <?php

        if (is_category('154')) :




            // Obtener noticias relacionadas
            $related_posts = new WP_Query(array(
                'posts_per_page' => 3,

                'post_type'      => 'post',
                'orderby'        => 'date',
                'order'          => 'DESC',
                'category_name'  => 'fotogalerias',
            ));

            // Verificar si hay noticias relacionadas
            if ($related_posts->have_posts()) :
        ?>
                <!-- Incluir el enlace al archivo CSS de Swiper -->
                <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">

                <!-- Inicializar el contenedor del slider -->
                <div class="swiper mySwiper3" style="margin:30px 0 ;">
                    <div class="swiper-wrapper">
                        <?php
                        // Iterar sobre las noticias relacionadas
                        while ($related_posts->have_posts()) : $related_posts->the_post();
                        ?>
                            <div class="swiper-slide">
                                <?php
                                // Obtener la URL de la imagen destacada
                                $thumbnail_url = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full'));

                                // Verificar si hay una imagen destacada
                                if ($thumbnail_url) :
                                ?>
                                    <!-- Crear un enlace al detalle de la noticia con la imagen destacada -->
                                    <a href="<?php the_permalink(); ?>" data-lightbox="img-<?php echo get_the_ID(); ?>">
                                        <img style="width:100%;" src="<?php echo $thumbnail_url; ?>" alt="#">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php
            else :
                echo 'No hay noticias relacionadas.';
            endif;
            ?>


            <!-- Initialize Swiper -->

            <script>
                jQuery(document).ready(function($) {
                    var swiper3 = new Swiper(".mySwiper3", {
                        pagination: {
                            el: ".swiper-pagination",
                            dynamicBullets: true,
                        },
                    });

                    $('.mySwiper3 img').each(function(index) {
                        var imgSrc = $(this).attr('src');

                        var imgLink = $('<a>', {
                            href: imgSrc,
                            'data-lightbox': 'img-' + (index + 1)
                        });

                        var imgElement = $('<img>', {
                            src: imgSrc,
                            style: 'width: 100%;' // Añadir el estilo para ajustar el ancho al 100%
                        });

                        $(this).wrap(imgLink).after(imgElement).remove();
                    });
                });

                /*
                                var swiper = new Swiper(".mySwiper3", {
                                    pagination: {
                                        el: ".swiper-pagination",
                                        dynamicBullets: true,
                                    },
                                });
                                */
            </script>
            <script src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/js/lightbox-plus-jquery.js"></script>
        <?php endif; ?>

        <?php if ($sirius_blog_feed_sidebar_show == 1) { ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="main-column two-columns">
                        <h1 class="feed-title"><?php echo esc_html(get_the_archive_title()); ?></h1>
                        <?php get_template_part('parts/feed'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="main-column one-column">
                <!--h1 class="feed-title"--><?php esc_html(get_the_archive_title()); ?><!--/h1-->
                <?php get_template_part('parts/feed'); ?>
            </div>
            <?php get_template_part('parts/feed', 'pagination'); ?>

        <?php } ?>

    </div>
</section>
<style>
    .blog-feed {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23ffffff' stroke-width='.5' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cuse fill='%23fcfcfc' href='%23s' y='2'/%3E%3Cuse fill='%23fcfcfc' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='2'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23f2f2f2'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23ffffff'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23efefef'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23B5C9FF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23B5C9FF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(6.85) translate(-854.01 -640.51)'%3E%3Cg fill='%23B5C9FF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
        background-attachment: local;
        background-size: cover;
    }
</style>
<?php get_footer(); ?>