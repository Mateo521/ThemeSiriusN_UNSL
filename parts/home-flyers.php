<div style="position:relative;">

    .
    <div style="display:flex;justify-content:center;width:100%;padding:0 15px;">

        <div style="max-width:1200px;width:100%;">
            <p style="margin:0 30px;display:inline-flex;padding:5px 10px;background-color:#1b5281;color:white;position:absolute;z-index:10;top:15px;">Flyers</p>
        </div>
    </div>
    <section class="flyers" style="padding: 0; margin:35px 0;">
        <div class="contenedor">
            <!--h1>Ciencia y Laboratorios</h1-->
            <div class="display-f">
                <div class="p" style="width: 100%;">
                    <?php
                    
                    $images = get_option('swiper_gallery_images', array());
                    if (!empty($images)): ?>
                        <div class="swiper mySwiper4" style="color:black; border-radius:15px;">
                            <div class="swiper-wrapper">
                                <?php foreach ($images as $image):
                                    
                                    $image_url = isset($image['url']) ? $image['url'] : '';
                                    $caption = isset($image['caption']) ? $image['caption'] : '';
                                    $link = isset($image['link']) ? $image['link'] : '';
                                ?>
                                    <div class="swiper-slide">
                                        <a style="height: 100%;" href="<?php echo esc_url($image_url); ?>" data-title="<?php echo esc_html($caption); ?><?php if ($link): ?> <a target='_blank' href='<?php echo esc_url($link) ?>'>Ver más</a>. <?php endif; ?>" data-lightbox="img-">
                                            <img style="width: 100%;" src="<?php echo esc_url($image_url); ?>" alt="">
                                            <div class="">
                                                <?php if ($caption): ?>
                                                    <div style="display:flex;justify-content:center;width:100%;">
                                                        <figcaption  id="dynamic-caption"><?php echo esc_html($caption); ?> </figcaption>
                                                        <?php if ($link): ?>
                                                        <script>
                                                            var linkUrl = '<?php echo esc_url($link); ?>';
                                                        </script>
                                                        <?php endif; ?>   
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    <?php endif; ?>
                </div>
            </div>
    </section>
    <?php
    /*
    function mytheme_display_swiper_gallery()
    {
        $images = get_option('swiper_gallery_images', array());
        if (!empty($images)) {
            echo '<div class="swiper-container"><div class="swiper-wrapper" style="display:flex;width:100%;">';
            foreach ($images as $image) {
                echo '<div class="swiper-slide"><img style="width:100%;" src="' . esc_url($image) . '" /></div>';
            }
            echo '</div></div>';
        }            
    }
    mytheme_display_swiper_gallery();
    */
    ?>
</div>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/css/lightbox.min.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lightbox2-2.11.4/dist/js/lightbox-plus-jquery.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var captionElement = document.getElementById('dynamic-caption');
        if (captionElement && typeof linkUrl !== 'undefined' && linkUrl !== '') {
            // Crear el enlace dinámicamente
            var linkElement = document.createElement('a');
            linkElement.href = linkUrl;
            linkElement.target = '_blank';
            linkElement.style.color ="#a7d7ff";
            linkElement.innerText = ' → Ver más';

            // Añadir el enlace al final del figcaption
            captionElement.appendChild(linkElement);
        }
    });
</script>
<style>
    figcaption {
        padding: 5px;
        width: 100%;
        position: absolute;
        bottom: 0;
        background-color: #0c4974c2;
        color: white;
        border-radius: 15px;
        max-width: 55vw;
    }

    .flyers .mySwiper4 {
        height: 500px;
    }

    @media screen and (max-width:766px) {
        .flyers .mySwiper4 {
            height: 75vw;
        }

        figcaption {
            font-size: 10px;

        }
    }

    .flyers .mySwiper4 .swiper {
        width: 100%;
        height: 100%;
    }

    .flyers .mySwiper4 .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #ffffff00;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .flyers .mySwiper4 .swiper-slide img {
        border-radius: 15px;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .flyers .mySwiper4 .swiper-slide {
        width: max-content;
    }

    .flyers .swiper-horizontal>.swiper-pagination-bullets,
    .flyers .swiper-pagination-bullets.swiper-pagination-horizontal,
    .flyers .swiper-pagination-custom,
    .flyers .swiper-pagination-fraction {
        top: 0;
        bottom: inherit;
    }

    /*
    .mySwiper3 .swiper-slide:nth-child(2n) {
        width: 40%;
    }
    .mySwiper3 .swiper-slide:nth-child(3n) {
        width: 20%;
    }
*/
    .flyers {
        color: white;
        background-color: #164f71;
        outline: 10px solid #cdedff;
        border-top: 10px solid;
        border-bottom: 10px solid;
        border-image: linear-gradient(to right, #27487b 0% 33.33%, #1b639c 33.33% 66.66%, #0b3a62 66.66% 100%) 10;
        background-color: #164F71;
        background-color: #599ED4;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23599ED4' stroke-width='0.6' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cuse fill='%235fa1d5' href='%23s' y='2'/%3E%3Cuse fill='%235fa1d5' href='%23s' x='1' y='2'/%3E%3Cuse fill='%2365a3d6' href='%23s' x='2' y='2'/%3E%3Cuse fill='%2365a3d6' href='%23s'/%3E%3Cuse fill='%236ba5d7' href='%23s' x='2'/%3E%3Cuse fill='%236ba5d7' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%2370a8d8'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%2370a8d8'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%2375aad9'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%23599ED4'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%237aadda'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%23F4E5FF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%23F4E5FF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(8.05) translate(-875.78 -656.83)'%3E%3Cg fill='%23F4E5FF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
        background-attachment: local;
        background-size: cover;
        font-family: "Libre Franklin", sans-serif;
        font-optical-sizing: auto;
        font-weight: normal;
        font-style: normal;
    }
</style>
<script>
    var swiper = new Swiper(".mySwiper4", {
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>