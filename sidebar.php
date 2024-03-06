<!-- Sidebar -->

<?php
/*
if (is_single())
    if (is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single"><?php dynamic_sidebar('sidebar-single'); ?></div><?php }
                                                                                                                        if (is_page())
                                                                                                                            if (is_active_sidebar('sidebar-page')) { ?><div class="sidebar-page"><?php dynamic_sidebar('sidebar-page'); ?></div><?php }

        */ if (is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>

<?php

$popular_posts = pvc_get_most_viewed_posts();

if ($popular_posts) :
?>
    <div class="sidebar-widget">
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
                        <span style="color: #121263;
    font-weight: 700;"><?php echo ($post_count + 1); ?></span>
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
?>


<div class="fb-page">
  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnoticias.unsl&tabs=timeline&width=350&height=900&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
</div>



<style>
   .fb-page {
  width: 100%;
  height: 500px;
}
.fb-page iframe {
  width: 100%;
}
    .sidebar-widget {
        padding: 10px;
        margin: 5px;
        background-color: white;
    }

    @media screen and (max-width:766px) {

        .fb-page {
  width: 100%;
 
}




.fb-page iframe{
    height: 100%;
}
        
    }
</style>

<!-- /Sidebar -->