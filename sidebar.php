<!-- Sidebar -->

<?php
/*
if (is_single())
    if (is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single"><?php dynamic_sidebar('sidebar-single'); ?></div><?php }
                                                                                                                        if (is_page())
                                                                                                                            if (is_active_sidebar('sidebar-page')) { ?><div class="sidebar-page"><?php dynamic_sidebar('sidebar-page'); ?></div><?php }

        */ if (is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>

<?php
$current_post_id = get_the_ID();
$current_post_categories = wp_get_post_categories($current_post_id);

$args = array(
    'category__in' => $current_post_categories, 
    'post__not_in' => array($current_post_id), 
    'posts_per_page' => 5, 
);

$related_posts = get_posts($args);

if ($related_posts) :
?>
    <div class="sidebar-widget entry details entry-single tarjeta-inicio__fondo-blanco tarjeta-principal">
        <h3 style="margin:0; padding:0 0 10px 0;">Noticias relacionadas</h3>
        <ul>
            <?php
            $post_count = 0;
            foreach ($related_posts as $post) :
                setup_postdata($post);
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
?>






<div class="fb-page" 
     data-href="https://www.facebook.com/noticias.unsl" 
     data-tabs="timeline" 
     data-width="" 
     data-height="" 
     data-small-header="false" 
     data-adapt-container-width="true" 
     data-hide-cover="false" 
     data-show-facepile="true">
   <blockquote cite="https://www.facebook.com/noticias.unsl" class="fb-xfbml-parse-ignore">
     <a href="https://www.facebook.com/noticias.unsl">Noticias UNSL</a>
   </blockquote>
</div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="XYZ"></script>


<!--a class="twitter-timeline" href="https://twitter.com/noticiasUNSL?ref_src=twsrc%5Etfw"
   data-height="1000"  
   data-width="400"> 
   Tweets by noticiasUNSL
</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script-->

<style>
    .fb-page {
        padding: 35px 0;
    }

    .pc-facebook {
        width: 100%;
        height: 500px;
    }


.fb-page{
    width: 350px;
    padding: 36px 5px;
    height: 500px;
}
iframe{
    padding: 25px 0;
    /*
    height: 1000px !important;
    */
}
    .sidebar-widget {
        padding: 10px;
        margin: 5px;

    }

    @media screen and (max-width:766px) {

        .pc-facebook {
            display: none;

        }

        .sidebar{
            width: 100% !important;
        }
  


.fb-page{
    width: 100%;
    display: flex;
    justify-content: center;

}



    }



</style>

<!-- /Sidebar -->