<!-- Sidebar -->

<?php
/*
if (is_single())
    if (is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single"><?php dynamic_sidebar('sidebar-single'); ?></div><?php }
                                                                                                                        if (is_page())
                                                                                                                            if (is_active_sidebar('sidebar-page')) { ?><div class="sidebar-page"><?php dynamic_sidebar('sidebar-page'); ?></div><?php }

        */ if (is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>

<?php
// Recupera las publicaciones más leídas
$popular_posts = pvc_get_most_viewed_posts();

// Verifica si hay publicaciones para mostrar
if ($popular_posts) :
?>
    <div class="sidebar-widget">
        <h3 style="margin:0; padding:0 0 10px 0;">Noticias más leídas</h3>
        <ul>
            <?php
            $post_count = 0; // Inicializa el contador de publicaciones

            foreach ($popular_posts as $post) : setup_postdata($post);
                if ($post_count >= 6) {
                    // Si ya hemos alcanzado el límite de 6 noticias, salir del bucle
                    break;
                }
            ?>
                <li style="list-style-type: none; display:flex; justify-content:space-between;align-items:start; gap:10px; padding:5px 0 ;border-bottom: 1px dashed #999;">
                    <p>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </p>
                    <?php
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

                    // Muestra la miniatura si está disponible
                    if ($thumbnail) :
                    ?>
                        <img style="width:75px;height:75px;" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="">
                    <?php endif; ?>

                </li>
                <?php
                $post_count++; // Incrementa el contador de publicaciones
            endforeach;
            ?>
        </ul>
    </div>
    <?php
    // Restablece la información de la publicación después de usar la consulta personalizada
    wp_reset_postdata();
endif;
?>


<style>
    .sidebar-widget {
        padding: 10px;
        margin: 5px;
        background-color: white;
    }
</style>

<!-- /Sidebar -->