<!-- Sidebar -->

<?php
/*
if (is_single())
    if (is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single"><?php dynamic_sidebar('sidebar-single'); ?></div><?php }
                                                                                                                        if (is_page())
                                                                                                                            if (is_active_sidebar('sidebar-page')) { ?><div class="sidebar-page"><?php dynamic_sidebar('sidebar-page'); ?></div><?php }

        */ if (is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>

<?php

// Función para obtener y almacenar los posts más vistos en un transitorio
function get_and_cache_most_viewed_posts() {
    // Verifica si existe el transitorio
    $popular_posts = get_transient('cached_popular_posts');
    
    // Si no existe, obtén los posts y almacénalos en el transitorio
    if ($popular_posts === false) {
        // Obtén los posts más vistos
        $popular_posts = pvc_get_most_viewed_posts();

        // Almacena los posts en un transitorio por 24 horas (86400 segundos)
        set_transient('cached_popular_posts', $popular_posts, 86400);
    }

    return $popular_posts;
}

// Obtener los posts más vistos usando la función de transitorio
$popular_posts = get_and_cache_most_viewed_posts();

if ($popular_posts) :
?>
    <div class="sidebar-widget entry details entry-single tarjeta-inicio__fondo-blanco tarjeta-principal">
        <h3 style="margin:0; padding:0 0 10px 0;">Noticias más leídas</h3>
        <ul>
            <?php
            $post_count = 0;

            foreach ($popular_posts as $post) : setup_postdata($post);
                if ($post_count >= 6) {
                    break;
                }
            ?>
                <li style="list-style-type: none; display:flex; justify-content:space-between;align-items:center; gap:10px; padding:5px 0 ;border-bottom: 1px dashed #999;">
                    <div style="display: flex;gap:15px;">
                        <span style="color: #121263; font-weight: 700;"><?php echo ($post_count + 1); ?></span>
                        <p>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </p>
                    </div>

                    <?php
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

                    if ($thumbnail) :
                    ?>
                        <img style="width:75px;height:75px;" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="">
                    <?php endif; ?>

                </li>
            <?php
                $post_count++;
            endforeach;
            ?>
        </ul>
    </div>
<?php
    wp_reset_postdata();
endif;

// Función para restablecer las vistas
function reset_post_views() {
    // Aquí debes implementar el código específico para restablecer las vistas de tu plugin
    // El siguiente es un ejemplo general
    $all_posts = get_posts(array(
        'numberposts' => -1, // Obtener todos los posts
        'post_type'   => 'post', // Cambia esto si necesitas restablecer otro tipo de post
        'post_status' => 'publish',
    ));

    foreach ($all_posts as $post) {
        // Usar la función adecuada del plugin para restablecer las vistas
        pvc_reset_post_views($post->ID);
    }
}

// Programar la tarea para restablecer las vistas cada 24 horas
if (!wp_next_scheduled('reset_post_views_event')) {
    wp_schedule_event(time(), 'daily', 'reset_post_views_event');
}

// Enganchar la función a la tarea programada
add_action('reset_post_views_event', 'reset_post_views');
?>



<div class="fb-page">

<iframe class="pc-facebook" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnoticias.unsl&tabs=timeline&width=350&height=900&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>



<iframe class="mobile-facebook" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnoticias.unsl&tabs=timeline&width=350&height=1200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

</div>



<style>
    .fb-page{
        padding: 35px 0;
    }
   .pc-facebook {
  width: 100%;
  height: 500px;
}
.mobile-facebook{
height: 1200px !important;
    display: none;
}
.fb-page iframe {
  width: 100%;
}
    .sidebar-widget {
        padding: 10px;
        margin: 5px;
     
    }

    @media screen and (max-width:766px) {

        .pc-facebook{
            display:none;

        }

        .mobile-facebook{
           
        display: block;
        }

        .fb-page {
  width: 100%;
 
}




.fb-page iframe{
    height: 100%;
}
        
    }
</style>

<!-- /Sidebar -->