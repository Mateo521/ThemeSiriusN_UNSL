<?php
global $post;
global $enlace_categoria;

$args = array(
  'post_type'      => 'post',
  'posts_per_page' => 5,
  'order'          => 'DESC',
  'category__not_in' => array(
    get_category_by_slug('entrevistas')->term_id,
    get_category_by_slug('fotogalerias')->term_id,
  ),
);

$latest_posts = get_posts($args);

?>


<style>
  :root {
    --swiper-theme-color: #fff;
  }

 .sliderprincipal{
  padding: 0;

  }
   .sliderprincipal .swiper {
    width: 100%;
    height: 40vw;
  }

   .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .tex a,
  .tex p,
  .text h1 {
    color: white !important;
  }
</style>

<section class="sliderprincipal">

<!--div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
      <?php
      $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');

      if (!$thumbnail_url) {

        $thumbnail_url = 'img.img';
      }
      ?>

      <div class="swiper-slide">
        <div class="w-100 h-100" id="slide-e" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>); background-repeat: no-repeat; width:100%;height:100vh; background-size:cover;position:relative; top:155px;">
          <div style="align-items: flex-end;position:relative; height:100vh; display:flex; align-items:end; justify-content:center;top:60px;">
            <div style="z-index: 1; color:white;">
              <p><?php echo get_the_category_list(', ', '', $post->ID); ?></p>
              <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                <h1 class="text-4xl"><?php echo get_the_title($post->ID); ?></h1>
              </a>
            </div>
            <div style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%); position:absolute; width:100%; height:350px; bottom : 0 ;"></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div style="width:45px;" class="swiper-pagination"></div>
</div-->

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
      <?php
      $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');

      $content = get_the_content();
      $trimmed_content = wp_trim_words(strip_shortcodes($content), 50, '...');

      if (!$thumbnail_url) {

        $thumbnail_url = 'img.img';
      }
      ?>

      <div class="swiper-slide">
        <div class="w-100 h-100" id="slide-e" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>); background-repeat: no-repeat; width:100%; height:100%; background-size:cover;position:relative;">
          <div style="background-color:#00000075; position:relative; width:100%; height:100%;"></div>

          <div class="tex">

            <p><?php echo get_the_category_list(', ', '', $post->ID); ?></p>
            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
              <h1 style="font-size:2vw;"><?php echo get_the_title($post->ID); ?></h1>

              <!--p><?php echo $trimmed_content; ?></p-->
            </a>
          </div>
        </div>

        <div class="slide-mobile">
          <img src="<?php echo esc_url($thumbnail_url); ?>" alt="">
          <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
          <div class="tarjeta">
            <h1 style="font-size:25px;     line-height: 25px;"><?php echo get_the_title($post->ID); ?></h1>
            <!--p><?php echo $trimmed_content; ?></p-->
          </div>
          </a>
        </div>
      </div>


    <?php endforeach; ?>
  </div>
  <div class="swiper-button-next" style="margin-right:5vw;"></div>
  <div class="swiper-button-prev" style="margin-left:5vw;"></div>
  <div class="swiper-pagination"></div>
</div>

</section>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 900,
    keyboard: {
      enabled: true,
    },
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
<style>
  .tarjeta {
    padding: 15px 15px 45px 15px;
/*margin: ;
    background-color: #1D70B7;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%231D70B7' stroke-width='0.7' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cuse fill='%232e75b9' href='%23s' y='2'/%3E%3Cuse fill='%232e75b9' href='%23s' x='1' y='2'/%3E%3Cuse fill='%233a79ba' href='%23s' x='2' y='2'/%3E%3Cuse fill='%233a79ba' href='%23s'/%3E%3Cuse fill='%23447dbc' href='%23s' x='2'/%3E%3Cuse fill='%23447dbc' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%234d81be'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%234d81be'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%235585bf'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%231D70B7'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%235c89c1'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%23DDD5FF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%23DDD5FF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(13.55) translate(-926.2 -694.65)'%3E%3Cg fill='%23DDD5FF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
background-attachment: local;
background-size: cover;
*/
    color:white;
  }

  .tex {
    position: absolute;
    bottom: 6vw;
    color: white;
    z-index: 10;
    left: 12vw;
    text-align: start;
    max-width: 1000px;
  }

  .slide-mobile {
    display: none;
    width: 100%;
  }

  .slide-mobile img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  @media screen and (max-width:1000px) {

  

    .sliderprincipal    .swiper [class^="swiper-button-"]::after{
    font-size: 30px;
}

.sliderprincipal  .swiper-slide {

      background: #27699f;
    }

    .sliderprincipal  .swiper .swiper-button-next,
    .sliderprincipal  .swiper .swiper-button-prev {
 
      top: 85px;
    }

    .sliderprincipal .swiper {
      background-color: #27699f;
      height: unset;
    }


    .tex {
      display: none;
    }

    #slide-e {
      display: none;
    }

    .slide-mobile {
      display: block;
    }
  }
</style>