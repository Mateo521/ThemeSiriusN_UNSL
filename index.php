<?php get_header(); ?>

<?php if (is_front_page() && !is_paged()) {
    get_template_part('parts/frontpage', 'banner');
} ?>

<?php $sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show'); ?>

<section class="blog-feed">
    <div class="container">

        <?php

        if (is_category('154')) :
        ?>
         
                <div class="swiper mySwiper3" style="margin:30px 0 ;">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=2" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=3" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=4" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=5" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=6" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=7" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=8" alt="#" style="width:100%;"></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/1920/1080?page=9" alt="#" style="width:100%;"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
     
            <!-- Initialize Swiper -->

            <script>
                var swiper = new Swiper(".mySwiper3", {
                    pagination: {
                        el: ".swiper-pagination",
                        dynamicBullets: true,
                    },
                });
            </script>
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