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

  .swiper {
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

              <p><?php echo $trimmed_content; ?></p>
            </a>
          </div>
        </div>

        <div class="slide-mobile">
          <img src="<?php echo esc_url($thumbnail_url); ?>" alt="">
          <div class="tarjeta">
            <h1 style="font-size:25px;     line-height: 25px;"><?php echo get_the_title($post->ID); ?></h1>
            <p><?php echo $trimmed_content; ?></p>
          </div>
        </div>
      </div>


    <?php endforeach; ?>
  </div>
  <div class="swiper-button-next" style="margin-right:5vw;"></div>
  <div class="swiper-button-prev" style="margin-left:5vw;"></div>
  <div class="swiper-pagination"></div>
</div>

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
    padding: 15px;
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
    height: 175px;
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

 

    .swiper [class^="swiper-button-"]::after{
    font-size: 30px;
}

    .swiper-slide {

      background: #27699f;
    }

    .swiper .swiper-button-next,
    .swiper .swiper-button-prev {
 
      top: 15%;
    }

    .swiper {
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