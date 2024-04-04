<section class="fotogaleria " style="font-family: 'Skema Pro Display';padding:0;">

<div class="anchomaximo contenedor">
<h1>Fotogalerías</h1>
  <div style="display:flex;justify-content:center;">
  
    <!-- Slider main wrapper  copyright (c) 2024 by Roger (https://codepen.io/rogerkuik/pen/abZOLXr)-->
    <div class="swiper-container-wrapper ">
      <!-- Slider main container -->
      <div class="swiper-container gallery-top" id="thm">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">


          <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'order' => 'DESC',  // Orden descendente por fecha de publicación
            'orderby' => 'date', // Ordenar por fecha de publicación
            'category_name' => 'fotogalerias'
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) {
            while ($query->have_posts()) {

              $query->the_post();
              $thumbnail_id = get_post_thumbnail_id();
              $post_link = get_permalink();
              $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
              $attachments = get_posts(array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'post_parent' => get_the_ID(),
                'exclude'     => $thumbnail_id,
              ));

          ?>



              <!-- Slides -->



              <div class="swiper-slide" style="background-color: #0b2439; background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
                <div class="title">1</div>
                <div class="description"><?php echo get_the_title(); ?></div>
              </div>


              <?php
              $reversed_attachments = array_reverse($attachments);
              $reversed_captions = array_reverse($captions[1]);

              $content = get_the_content();
              preg_match_all('/<figcaption class="blocks-gallery-item__caption">(.*?)<\/figcaption>/', $content, $captions);

              $attachments_count = count($attachments);
              $captions_count = count($captions[1]);
              $max_count = min($attachments_count, $captions_count);
              $counter = 0;
              $link = [];          
              $max_count = count($reversed_attachments);
              for ($i = 0; $i < $max_count; $i++) {
                  $attachment = $reversed_attachments[$i];
                  $image_url = wp_get_attachment_image_url($attachment->ID, 'full');
                  $image_caption = !empty($captions[1][$i]) ? $captions[1][$i] : '';
                  $counter++;
              
                  ?>


                  <div class="swiper-slide" style="background-color: #0b2439;">
                     
                  <div style="background-image: url('<?php echo esc_url($image_url); ?>');position:absolute;width:100%;height:100%;left:0;bottom:0;background-position:center;background-size:contain;z-index:-1;background-repeat:no-repeat;"></div>
                  
                  
                  <div class="title"><?php echo $counter + 1 ?></div>
                      <?php if ($i == $max_count - 1) : ?>
                          <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">

                         <?php endif; ?>
                      <div class="description"><?php echo $image_caption; ?></div>
                      <?php if ($i == $max_count - 1) : ?>
                          </a>
                      <?php endif; ?>
                  </div>



                  <?php
                  array_push($link, $image_url);
              }
            
              
            }
          }
          ?>




        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
      <!-- Slider thumbnail container -->
      <div class="swiper-container gallery-thumbs" id="thn">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->




          <div class="swiper-slide" style="background-size: cover; background-image: url('<?php echo esc_url($thumbnail_url); ?>');"></div>

          <?php
          foreach ($link as $url) {


          ?>
            <div class="swiper-slide" style="background-size: cover; background-image: url('<?php echo esc_url($url); ?>');"></div>

          <?php
          }
          ?>






        </div>
      </div>
    </div>
  </div>
  </div>
</section>


<style>
  .fotogaleria{
    background-color: #ffffff;
    padding: 15px;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23ffffff' stroke-width='0.6' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cuse fill='%23fcfcfc' href='%23s' y='2'/%3E%3Cuse fill='%23fcfcfc' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23fafafa' href='%23s'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='2'/%3E%3Cuse fill='%23f7f7f7' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23f5f5f5'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23f2f2f2'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23ffffff'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23efefef'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23C8ECFF'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23C8ECFF'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(13.75) translate(-927.27 -695.45)'%3E%3Cg fill='%23C8ECFF'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
		background-attachment: local;
		background-size: cover;
  }
  #thn{
height:600px;
  }
  #thm{
  height:600px;
  }
  .swiper-container {
    overflow: hidden;
    width: 100%;

    margin-left: auto;
    margin-right: auto;
  }
@media screen and (max-width:766px){
  #thn{
      height: 100px;
    }
    #thm{
  height:450px;
  }
}
  @media (min-width: 480px) {
    
    .swiper-container {
      min-height: 320px;
    }
  }

  .swiper-container-wrapper {
    display: flex;
    flex-flow: column nowrap;
    height: 100%;
    width: 100%;

  }

  @media (min-width: 480px) {
    .swiper-container-wrapper {
      flex-flow: row nowrap;
    }
  }

  .fotogaleria .swiper-button-next,
  .fotogaleria .swiper-button-prev {
    color: #000;
  }

  .fotogaleria .swiper-slide {

    text-align: center;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #fff;
    /* Center slide text vertically */
    display: flex;
    flex-flow: column nowrap;
    justify-content: flex-end;
    align-items: baseline;
    /* Slide content */
    padding: 15px;
  }

  .swiper-slide .description,
  .swiper-slide .title {
    text-align: left;
    background-color: #1b384f;
    padding: 5px;
    display: block;
    opacity: 0;
    transition: 0.5s ease 0.5s;
  }

  .swiper-slide-active .description,
  .swiper-slide-active .title {
    opacity: 1;
  }

  .swiper-slide-active .title {
    margin-bottom: 0.5rem;
    font-size: 24px;
    color: #fff;
    transition: opacity 0.5s ease 0.5s;
  }

  .swiper-slide-active .description {
    font-size: 16px;
    color: #fff;
    transition: opacity 0.5s ease 0.75s;
  }

  .gallery-top {
    position: relative;
    width: 100%;
    height: 75vh;
  }

  @media (min-width: 480px) {
    .gallery-top {
      width: 80%;
      height: 100%;
      margin-right: 10px;
    }
  }

  .gallery-thumbs {
    width: 100%;
    height: 25vh;
    padding-top: 10px;
  }

  @media (min-width: 480px) {
    .gallery-thumbs {
      width: 20%;
      height: 100vh;
      padding: 0;
    }
  }

  .gallery-thumbs .swiper-wrapper {
    flex-direction: row;
  }

  @media (min-width: 480px) {
    .gallery-thumbs .swiper-wrapper {
      flex-direction: column;
    }
  }

  .gallery-thumbs .swiper-slide {
    width: 25%;
    flex-flow: row nowrap;
    height: 100%;
    opacity: 0.75;
    cursor: pointer;
  }

  @media (min-width: 480px) {
    .gallery-thumbs .swiper-slide {
      flex-flow: column nowrap;
      width: 100%;
    }
  }

  .gallery-thumbs .swiper-slide-thumb-active {
    opacity: 1;
  }
</style>
<script>
  jQuery(function($) {
    var galleryThumbs = new Swiper(".gallery-thumbs", {
      centeredSlides: true,
      centeredSlidesBounds: true,
      direction: "horizontal",
      spaceBetween: 10,
      slidesPerView: 5,
      freeMode: false,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      watchOverflow: true,
      breakpoints: {
        480: {
          direction: "vertical",
          slidesPerView: 5
        }
      }
    });
    var galleryTop = new Swiper(".gallery-top", {
      direction: "horizontal",
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      a11y: {
        prevSlideMessage: "Previous slide",
        nextSlideMessage: "Next slide",
      },
      keyboard: {
        enabled: true,
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
    galleryTop.on("slideChangeTransitionStart", function() {
      galleryThumbs.slideTo(galleryTop.activeIndex);
    });
    galleryThumbs.on("transitionStart", function() {
      galleryTop.slideTo(galleryThumbs.activeIndex);
    });
  });
</script>