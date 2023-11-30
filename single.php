<?php get_header(); ?>
<?php $sirius_posts_sidebar = sirius_get_option('sirius_posts_sidebar'); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">

<?php while ( have_posts() ) : the_post(); ?>

<section class="blog-post tarjeta-inicio">
    <div class="container">
        
        <?php if($sirius_posts_sidebar == 1) { ?>
        
        <div class="row">
            <div class="col-md-8 noticia-sin-bordes-laterales">
                <div class="main-column two-columns" id="noticia">
                    <?php get_template_part('parts/single', 'content'); ?>
                    <?php if ( comments_open() ) { comments_template(); } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        
        <?php } else { ?>
        
        <?php get_template_part('parts/single', 'content'); ?>
        <?php if ( comments_open() ) { comments_template(); } ?>
        
        <?php } ?>
        
    </div>
</section>



<?php endwhile; ?>
<script>
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

<?php get_footer(); ?>