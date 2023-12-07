<!-- Sidebar -->

<?php 
if(is_single()) 
    if(is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single"><?php dynamic_sidebar('sidebar-single'); ?></div><?php } 
if(is_page())   
    if(is_active_sidebar('sidebar-page'))   { ?><div class="sidebar-page"><?php dynamic_sidebar('sidebar-page'); ?></div><?php } 

if(is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>

<?php
// Recupera las publicaciones más leídas
$popular_posts = pvc_get_most_viewed_posts();

// Verifica si hay publicaciones para mostrar
if ($popular_posts) :
?>
    <div class="sidebar-widget">
        <h2>Noticias más leídas</h2>
        <ul>
            <?php foreach ($popular_posts as $post) : setup_postdata($post); ?>
                <li style="list-style-type: none;">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    // Restablece la información de la publicación después de usar la consulta personalizada
    wp_reset_postdata();
endif;
?>

<!-- /Sidebar -->