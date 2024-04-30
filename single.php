<?php get_header(); 
$sirius_posts_featured_image_show = true; // Definir esta variable según la lógica de tu tema
?>
<?php $sirius_posts_sidebar = sirius_get_option('sirius_posts_sidebar'); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">

<?php while (have_posts()) : the_post(); 

    if ($sirius_posts_featured_image_show == true && has_post_thumbnail()) { 
        $image_id = get_post_thumbnail_id();
        $image_meta = wp_get_attachment_metadata($image_id);
        $upload_dir = wp_upload_dir();
        
        if ($image_meta) {
            $image_file = basename(get_attached_file($image_id));
            $image_url = $upload_dir['baseurl'] . '/' . dirname($image_file) . '/' . $image_meta['file'];
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            
            // Aplicar filtro para establecer la calidad de la imagen (movido fuera del bucle)
            add_filter('jpeg_quality', function($arg){return 100;});

            ?>
            <div class="entry-thumb"><img style="height:100%; object-position:top; object-fit:contain;" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-responsive"></div>
        <?php 
        }
    } 

?>
<section class="blog-post tarjeta-inicio" style=" justify-items:center;">
    <div class="redessticky">
        <ul  style="list-style-type: none; position:sticky;top:100px; display:flex; flex-direction:column;align-items:center;padding:15px;">
        <li style=" border-left: 3px solid #CCCCCC; height: 100px;"></li>
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
            <li style=" border-left: 3px solid #CCCCCC; height: 100px;"></li>
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


    var isPlaying = false; // Variable para controlar si la síntesis de voz está en reproducción
    var synth = window.speechSynthesis;
    var utterance = new SpeechSynthesisUtterance();
    var currentChunkIndex = 0;
    var isPaused = false; // Variable para controlar si la síntesis de voz está en pausa
    var pausedIndex; // Variable para guardar la posición de la pausa

    function synthesisVoice() {
        var textContent = document.getElementById('noticia').innerText;
        var chunkSize = 200;
        var chunks = [];

        for (var i = 0; i < textContent.length; i += chunkSize) {
            chunks.push(textContent.substring(i, i + chunkSize));
        }

        // Si está reproduciéndose, pausar la síntesis de voz
        if (isPlaying && !isPaused) {
            console.log('Índice actual:', currentChunkIndex); // Agregamos un console log para verificar el valor actual de currentChunkIndex
            synth.pause();
            console.log('Pausando síntesis de voz.');
            pausedIndex = currentChunkIndex;
            isPaused = true;
            console.log('Índice de pausa:', pausedIndex);
            return;
        }

        // Si está en pausa, reanudar la síntesis de voz
        if (isPlaying && isPaused) {
            synth.resume();
            console.log('Reanudando síntesis de voz...');
            isPaused = false;
            console.log('Índice de pausa:', pausedIndex);
            synthesisVoiceFromIndex(pausedIndex); // Reanudar desde la posición de pausa
            return;
        }

        // Iniciar la síntesis de voz desde el principio
        synthesisVoiceFromIndex(0);
    }

    function synthesisVoiceFromIndex(startIndex) {
    var textContent = document.getElementById('noticia').innerText;

    var chunkSize = 200;
    var chunks = [];

    for (var i = 0; i < textContent.length; i += chunkSize) {
        chunks.push(textContent.substring(i, i + chunkSize));
    }

    // Configurar el evento onend para continuar la síntesis de voz desde el índice dado
    utterance.onend = function() {
        if (startIndex < chunks.length && isPlaying) {
            var chunk = chunks[startIndex];
            utterance.text = chunk;
            synth.speak(utterance);
            console.log('Iniciando síntesis de voz desde el índice:', startIndex);
            startIndex++;
        } else {
            // Si es la última parte, actualizar el estado de reproducción
            isPlaying = false;
            document.getElementById('botonStop').style.display = 'none';
        }
    };

    // Sintetizar la parte del texto desde el índice dado
    var chunk = chunks[startIndex];
    utterance.text = chunk;
    
    // Seleccionar la voz específica que deseas usar
    var selectedVoice = synth.getVoices().find(function(voice) {
        return voice.name === 'Monica' && voice.lang === 'es-ES'; // Cambia 'es-ES' por el idioma deseado
    });
    
    utterance.voice = selectedVoice || synth.getVoices()[0]; // Si no se encuentra la voz específica, usa la primera voz disponible

    synth.speak(utterance);
    console.log('Iniciando síntesis de voz desde el índice:', startIndex);
    currentChunkIndex = startIndex;
    isPlaying = true;
    document.getElementById('botonStop').style.display = 'block'; // Mostrar botón de detener
}


    function resetSynthesis() {
        // Cancelar la síntesis de voz si está en curso
        if (isPlaying) {
            synth.cancel();
        }

        // Restablecer variables relevantes
        isPlaying = false;
        currentChunkIndex = 0;
        isPaused = false;
    }

    function stopSynthesis() {
        resetSynthesis();
        console.log('Deteniendo síntesis de voz.');

    

 
        var icono = document.getElementById('icono3');

        // Verificar si ya hemos almacenado un estado para este icono

        if (icono.classList.contains('fa-volume-off')) {
            icono.classList = 'fa fa-volume-off';
        } else if (icono.classList.contains('fa-volume-up')) {
            icono.classList = 'fa fa-volume-off';
        }
    



        document.getElementById('botonStop').style.display = 'none'; // Ocultar botón de detener
    }

    window.addEventListener('beforeunload', function() {
        synth.cancel();
        console.log('Síntesis de voz detenida al abandonar la página.');
    });

    document.getElementById('boton3').addEventListener('click', synthesisVoice);



    jQuery(document).ready(function($) {
        $('#noticia img').each(function(index) {
            var $img = $(this);
            var imgSrc = $img.attr('src');
            var hasGalleryParent = $img.parents('figure.wp-block-gallery').length > 0;
            var $figcaption = $img.next('figcaption');

            var imgLink = $('<a>', {
                href: imgSrc,
                'data-lightbox': hasGalleryParent ? 'img-gallery' : 'img-' + (index + 1), // Utilizar un valor diferente si hay un componente padre de galería
                'data-title': $figcaption.text().trim() // Establecer el contenido de la figcaption como el título del lightbox
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
    // Asignar funciones a los eventos de Lightbox
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
   
  
    .tarjeta-inicio{
        display: grid; 
        grid-template-columns:1fr 1fr 1fr;
    }
    .redessticky li{
        font-size: 25px;
    }
    .redessticky a{
       color: #CCCCCC;
    }
    @media screen and (max-width:766px) {
    .redessticky{
            display: none;
    }
    .tarjeta-inicio{
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