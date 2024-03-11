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
<?php get_footer(); ?>
