<section class="cienciaylaboratorios" style="padding: 0;">





    <div class="contenedor">


        <!--h1>Ciencia y Laboratorios</h1-->

        <div class="display-f">
            <div class="p">
                <!--img src="https://scivz.unsl.edu.ar/noticias/wp-content/uploads/2024/03/62e7e39867567_450.png" alt=""-->
                <div class="items" style="padding: 0;     min-width: max-content;">
    <h2>Ciencia y <br> Laboratorios</h2>

                    <h3 style="font-size:19px;"><a target="_blank" href="<?php echo esc_url(get_category_link(get_cat_ID('laboratorios'))); ?>"> → Laboratorios</a></h3>
                    <h3 style="font-size:19px;"><a target="_blank" href="<?php echo esc_url(get_category_link(get_cat_ID('ciencia'))); ?>"> → Ciencia</a></h3>
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
?>
             
                   <div class="item4">
                    <?php
                foreach ($science_posts as $science_post) {
                ?>
                 

                        <h4>Ciencia</h4>
                        <a style="color:white;" href="<?php echo esc_url($science_post['permalink']); ?>">
                            <img src="<?php echo $science_post['thumbnail_url']; ?>" alt="">

                            <p><?php echo $science_post['title']; ?></p>
                        </a>





                   
                <?php
                    $item++;
                }
                ?>
                </div>
                <?php
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
  
    .cienciaylaboratorios {
        color: white;
        background-color: #164f71;
        outline: 10px solid #0b2839;
        border-top: 10px solid;
        border-bottom: 10px solid;
        border-image: linear-gradient(to right, #26b1e7 0% 25%, #8136d0 25% 50%, #e83e8d 50% 100%) 10;


        background-color: #164F71;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23164F71' stroke-width='0.8' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cuse fill='%232a5676' href='%23s' y='2'/%3E%3Cuse fill='%232a5676' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23375d7a' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23375d7a' href='%23s'/%3E%3Cuse fill='%2342637e' href='%23s' x='2'/%3E%3Cuse fill='%2342637e' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%234b6982'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%234b6982'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%23536e86'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%23164F71'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%235b738a'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%23FFFFFF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%23FFFFFF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(14.1) translate(-929.08 -696.81)'%3E%3Cg fill='%23FFFFFF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
background-attachment: local;
background-size: cover;


 font-family: "Libre Franklin", sans-serif;
  font-optical-sizing: auto;
  font-weight: normal;
  font-style: normal;

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
        padding: 0 15px;
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