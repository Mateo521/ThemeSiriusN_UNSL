<section class="cienciaylaboratorios" style="padding: 0;">





    <div class="contenedor">


        <h1>Ciencia y Laboratorios</h1>

        <div class="display-f">
            <div class="p">
                <img src="https://scivz.unsl.edu.ar/noticias/wp-content/uploads/2024/03/62e7e39867567_450.png" alt="">
                <div class="items">
                    <h3><a target="_blank" href="<?php echo esc_url(get_category_link(get_cat_ID('laboratorios'))); ?>"> → Laboratorios</a></h3>
                    <h3><a target="_blank" href="<?php echo esc_url(get_category_link(get_cat_ID('ciencia'))); ?>"> → Ciencia</a></h3>
                </div>
            </div>
            <div class="lab">


                <?php
                $categories = array('ciencia', 'ciencia', 'laboratorios');
                $science_posts = array(); // Almacena las noticias de ciencia
                $laboratory_posts = array(); // Almacena las noticias de laboratorios
                $science_count = 0; // Contador de noticias de ciencia mostradas
                $item = 4;
                foreach ($categories as $index => $category) {
                    $args = array(
                        'category_name' => $category,
                        'posts_per_page' => 2,
                        'order' => 'DESC',
                        'orderby' => 'date',
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $title = get_the_title();
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $content = get_the_content();
                            $permalink = get_permalink();
                            $trimmed_content = wp_trim_words(strip_shortcodes($content), 35, '...');


                            if ($category === 'ciencia') {

                                if ($science_count < 2) {
                                    $science_posts[] = array(
                                        'title' => $title,
                                        'content' => $trimmed_content,
                                        'permalink' => $permalink,
                                        'thumbnail_url' => $thumbnail_url,
                                    );
                                    $science_count++;
                                }
                            } elseif ($category === 'laboratorios') {

                                $laboratory_posts[] = array(
                                    'title' => $title,
                                    'content' => $trimmed_content,
                                    'permalink' => $permalink,
                                    'thumbnail_url' => $thumbnail_url,
                                );
                            }
                        }
                    }
                }

                // Mostrar las noticias de ciencia
                foreach ($science_posts as $science_post) {
                ?>
                    <div class="item<?php echo $item; ?>">

                        <h4>Ciencia</h4>
                        <a style="color:white;" href="<?php echo esc_url($science_post['permalink']); ?>">
                            <img src="<?php echo $science_post['thumbnail_url']; ?>" alt="">

                            <p><?php echo $science_post['title']; ?></p>
                        </a>
                    </div>
                <?php
                    $item++;
                }

                // Mostrar una noticia de laboratorios
                if (!empty($laboratory_posts)) {
                    $laboratory_post = array_shift($laboratory_posts);
                ?>
                    <div class="item<?php echo $item; ?>">
                        <h4>Laboratorios</h4>
                        <a style="color:white;" href="<?php echo esc_url($laboratory_post['permalink']); ?>">
                            <img src="<?php echo $laboratory_post['thumbnail_url']; ?>" alt="">
                            <h3><?php echo $laboratory_post['title']; ?></h3>
                            <p><?php echo $laboratory_post['content']; ?></p>
                        </a>
                    </div>
                <?php
                    $item++;
                }


                wp_reset_postdata();
                ?>


            </div>
        </div>
    </div>





</section>
<style>
    @font-face {




        font-family: 'Skema Pro Display';
        src: local('Skema Pro Display SemiBold'), local('Skema-Pro-Display-SemiBold'),
            url(<?php echo get_template_directory_uri() . '/assets/fonts/SkemaProDisplay-SemiBold.woff2'; ?>) format('woff2'),
            url(<?php echo get_template_directory_uri() . '/assets/fonts/SkemaProDisplay-SemiBold.woff'; ?>) format('woff'),
            url(<?php echo get_template_directory_uri() . '/assets/fonts/SkemaProDisplay-SemiBold.ttf'; ?>) format('truetype');
        font-weight: 600;
        font-style: normal;
    }

    .cienciaylaboratorios {
        color: white;
        background-color: #164f71;
        outline: 10px solid #0b2839;
        border-top: 10px solid;
        border-bottom: 10px solid;
        border-image: linear-gradient(to right, #26b1e7 0% 25%, #8136d0 25% 50%, #e83e8d 50% 100%) 10;

        font-family: 'Skema Pro Display';

    }

    .items {
        padding: 25px;

    }

    .items a {
        color: white !important;
    }

    .item4 {
        grid-area: a;
    }

    .item4 img {
        max-height: 220px;
    }

    .item5 {
        grid-area: b;

    }

    .item5 img {
        max-height: 220px;
    }

    .item6 img {
        max-height: 350px;
    }

    .item6 {
        grid-area: c;
        padding: 15px;
    }

    .lab {
        padding: 0 25px;
        display: grid;
        width: 100%;
        grid-template-areas: "a c c"
            "b c c";
        gap: 0;
        grid-template-columns: 25% 75%;
    }

    .lab h4 {
        color: #70bcff;
    }

    .p img {
        width: 245px;
    }

    .p {
        padding: 0 35px;
    }

    .lab img {
        object-fit: cover;
        object-position: top;
        width: 100%;

    }

    .display-f {
        display: flex;
    }

    @media screen and (max-width:1000px) {
        .display-f {

            flex-direction: column;

        }

        .item5 img {
            max-height: 100%;
        }

        .item4 img {
            max-height: 100%;
        }

        .lab {
            grid-template-areas: "a"
                "b"
                "c";
            grid-template-columns: 1fr;
        }

    }
</style>