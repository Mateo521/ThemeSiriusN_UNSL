<section class="cienciaylaboratorios">





    <div class="contenedor">




        <div class="display-f">
            <div class="p">
                <img src="https://scivz.unsl.edu.ar/noticias/wp-content/uploads/2024/03/62e7e39867567_450.png" alt="">
                <div class="items">
                    <p>Laboratorio</p>
                    <p>Ciencia</p>
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
                        <img src="<?php echo $science_post['thumbnail_url']; ?>" alt="">
                        <h4>Ciencia</h4>
                        <p><?php echo $science_post['title']; ?></p>
                    </div>
                <?php
                    $item++;
                }

                // Mostrar una noticia de laboratorios
                if (!empty($laboratory_posts)) {
                    $laboratory_post = array_shift($laboratory_posts);
                ?>
                    <div class="item<?php echo $item; ?>">
                        <img src="<?php echo $laboratory_post['thumbnail_url']; ?>" alt="">
                        <h4>Laboratorios</h4>
                        <h3><?php echo $laboratory_post['title']; ?></h3>
                        <p><?php echo $laboratory_post['content']; ?></p>
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
    .cienciaylaboratorios {
        color: white;
        background-color: #164f71;
        outline: 10px solid #0b2839;
        border-top: 10px solid;
        border-bottom: 10px solid;
        border-image: linear-gradient(to right, #26b1e7 0% 25%, #8136d0 25% 50%, #e83e8d 50% 100%) 10;
        margin: 40px 0;


    }

    .items {
        padding: 25px;
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
        padding: 25px;
        display: grid;
        width: 100%;
        grid-template-areas: "a c c"
            "b c c";
        gap: 0;
        grid-template-columns: 25% 75%;
    }

    .p img {
        width: 245px;
    }

    .p {
        padding: 35px;
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