<?php get_header(); ?>
<?php $sirius_posts_sidebar = sirius_get_option('sirius_posts_sidebar'); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">

<?php while (have_posts()) : the_post(); ?>

    <section class="blog-post tarjeta-inicio">
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

                <!-- Noticias relacionadas o seguir leyendo -->
                <h3>También te puede interesar</h3>
                <hr style="padding: 0;  margin :0;">
                <div class="related-posts" style="display: grid; justify-content:center;">
                    <?php
                    $current_post_id = get_the_ID();

                    $related_posts = new WP_Query(array(
                        'posts_per_page' => 8,
                        'post__not_in' => array($current_post_id),
                        'post_type' => 'post',
                        'orderby' => 'rand',
                    ));

                    if ($related_posts->have_posts()) :
                        while ($related_posts->have_posts()) : $related_posts->the_post();
                    ?>
                            <article class="related-post">

                                <?php
                                $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

                                if ($thumbnail) :
                                ?><a href="<?php the_permalink(); ?>">
                                        <img style="width:100%;height:175px;object-fit:cover;" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="#">
                                    </a>
                                <?php endif; ?>

                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <!--p><?php the_excerpt(); ?></p-->


                                <!--div class="related-post-categories">
                                    <?php the_category(', '); ?>
                                </div-->
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'No hay noticias relacionadas.';
                    endif;
                    ?>
                </div>
                <!-- Fin de noticias relacionadas o seguir leyendo -->
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

        // Verificar si ya hemos almacenado un estado para este icono
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
        }
    }

    function tipografia() {
        document.body.classList.toggle("tipog");
    }

    function blancoynegro() {
        document.documentElement.classList.toggle("grayscale");
    }

    var button = true;

    function synthesisVoice() {
        var synth = window.speechSynthesis;
        var textContent = document.getElementById('noticia').innerText;
        var voices = synth.getVoices();
        var utterance = new SpeechSynthesisUtterance(textContent);

        console.log('Texto a sintetizar:', textContent);

        if (button) {
            utterance.voice = voices.find(function(voice) {
                return voice.name === 'Monica';
            }) || voices[0];

            console.log('Voz seleccionada:', utterance.voice);

            synth.speak(utterance);
            button = false;
            console.log('Iniciando síntesis de voz...');
        } else {
            button = !button;
            synth.cancel();
            console.log('Deteniendo síntesis de voz.');
        }
    }

    document.getElementById('boton3').addEventListener('click', synthesisVoice);

    jQuery(document).ready(function($) {
        $('#noticia img').each(function(index) {
            var imgSrc = $(this).attr('src');

            // Verificar si la imagen tiene un componente padre <figure class="wp-block-gallery">
            var hasGalleryParent = $(this).parents('figure.wp-block-gallery').length > 0;

            // Crear el elemento <a> con el formato deseado
            var imgLink = $('<a>', {
                href: imgSrc, // Utilizar la URL de la imagen como href
                'data-lightbox': hasGalleryParent ? 'img-gallery' : 'img-' + (index + 1) // Utilizar un valor diferente si hay un componente padre de galería
            });

            // Crear el elemento <img> y establecer su atributo src
            var imgElement = $('<img>', {
                src: imgSrc
            });

            // Envolver la imagen con el enlace y reemplazarla en el DOM
            $(this).wrap(imgLink).after(imgElement).remove();
        });
    });


    

</script>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/js/lightbox-plus-jquery.js"></script>

<script>
  // Función para manejar la apertura del modal
  function onOpen() {
    document.body.style.overflow = 'hidden';
  }

  // Función para manejar el cierre del modal
  function onClose() {
    document.body.style.overflow = 'visible';
  }

  // Asignar funciones a los eventos de Lightbox
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      onShown: onOpen,
      onNavigate: onClose,
      onClose: onClose
    });
  });
</script>


<style>
    .related-post h2 {
        font-size: 18px;
        margin: 0;
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



