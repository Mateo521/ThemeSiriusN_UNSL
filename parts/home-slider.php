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
  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    height: 550px;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
      <?php
      $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');

      if (!$thumbnail_url) {

        $thumbnail_url = 'img.img';
      }
      ?>

      <div class="swiper-slide">
        <div class="w-100 h-100" id="slide-e" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>); background-repeat: no-repeat; width:100%;height:100%; background-size:cover;">
          <div style="align-items: flex-end;position:relative; height:100%; display:flex; align-items:end; justify-content:center;">
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
</div>



<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    effect: "fade",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>

<style>
  .swiper-pagination {
    text-align: end;
    padding: 5px;
    color: white;
  }

  .swiper-slide a {
    color: white !important;
  }

  #slide-e {
    animation: desp-x 50s infinite;
  }

  @media screen and (min-width: 766px) {
    #slide-e {
      animation: desp-y 150s infinite;
    }
  }

  @keyframes desp-x {
    50% {
      background-position: 100% 0;
    }
  }

  @keyframes desp-y {
    50% {
      background-position: 0 100%;
    }
  }
</style>