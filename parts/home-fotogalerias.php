  <!-- Swiper -->
  <section style="background-color:#07344d; padding:0; margin:0 0 25px 0;">
    <div class="contenedor" style="padding: 0 0 25px 0;font-family:'Skema Pro Display'; color:white;">
      <h1>Galería de fotos</h1>
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
          <div class="swiper1 mySwiper3">
            <div class="swiper-wrapper">
              <?php
              if ($thumbnail_url) {
              ?>
                <div class="swiper-slide">
                  <div style="display:flex;flex-direction: column; align-items: flex-start; width:100%;">
                    <div class="cib">
                      <img class="image" src="<?php echo esc_url($thumbnail_url); ?>" alt="">
                      <div class="bk"></div>
                    </div>
                    <div class="texto-pp">
                      <p><?php echo get_the_title(); ?></p>
                      <div class="swiper-pagination"></div>
                    </div>
                  </div>
                </div>
              <?php
              }

              $reversed_attachments = array_reverse($attachments);
              $reversed_captions = array_reverse($captions[1]);

              $content = get_the_content();
              preg_match_all('/<figcaption class="blocks-gallery-item__caption">(.*?)<\/figcaption>/', $content, $captions);

              $attachments_count = count($attachments);
              $captions_count = count($captions[1]);
              $max_count = min($attachments_count, $captions_count);
              $counter = 0;
              for ($i = 0; $i < $max_count; $i++) {

                if ($counter >= 2) {
                  break;
                }

                $attachment = $reversed_attachments[$i];
                $image_url = wp_get_attachment_image_url($attachment->ID, 'full');
                $image_caption = !empty($captions[1][$i]) ? $captions[1][$i] : '';
                $counter++;

              ?>
                <div class="swiper-slide">
                  <div style="display:flex;flex-direction: column; align-items: flex-start;width:100%;">
                    <div class="cib">
                      <img class="image" src="<?php echo esc_url($image_url); ?>" alt="">
                      <div class="bk"></div>
                    </div>
                    <div class="texto-pp">
                      <p><?php echo $image_caption; ?></p>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
              <?php $attachment = $reversed_attachments[$i + 1];
              $image_url = wp_get_attachment_image_url($attachment->ID, 'full');
              ?>
              <div class="swiper-slide">
                <div style="display:flex;flex-direction: column; align-items: flex-start;width:100%;">
                  <div class="cib blur1">
                    <img class="image" src="<?php echo esc_url($image_url); ?>" alt="">
                    <div class="bk"></div>
                  </div>
                  <div class="texto-pp">
                    <p> <a target="_blank" href="<?php echo  esc_url($post_link); ?>"> → Ver noticia completa</a></p>
                  </div>
                </div>
              </div>


            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
      <?php
        }
      }
      wp_reset_postdata();
      ?>
    </div>
  </section>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var swiper2 = new Swiper(".mySwiper3", {
        pagination: {
          el: ".swiper-pagination",
          type: "fraction",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        speed: 0,
        paginationClickable: true,
        on: {
          init: function() {
            var slides = this.slides;
            calcularColoresPromedio(slides);
          },
          slideChange: function() {
            calcularColorPromedio(this.slides[this.activeIndex].querySelector('.image'));
          },
        },
      });

      function calcularColoresPromedio(slides) {
        slides.forEach(function(slide) {
          var imagen = slide.querySelector('.image');
          calcularColorPromedio(imagen);
        });
      }

      function calcularColorPromedio(imagenElemento) {
        var canvas = document.createElement('canvas');
        canvas.width = imagenElemento.width;
        canvas.height = imagenElemento.height;

        var ctx = canvas.getContext('2d');
        ctx.drawImage(imagenElemento, 0, 0);

        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        var data = imageData.data;

        var r = 0,
          g = 0,
          b = 0;

        for (var i = 0; i < data.length; i += 4) {
          r += data[i];
          g += data[i + 1];
          b += data[i + 2];
        }

        r = Math.floor(r / (data.length / 4));
        g = Math.floor(g / (data.length / 4));
        b = Math.floor(b / (data.length / 4));
/*
        console.log(r + " ");
        console.log(g + " ");
        console.log(b);
        */
        var colorPromedio = 'rgb(' + r + ',' + g + ',' + b + ')';


        imagenElemento.parentNode.style.backgroundColor = colorPromedio;
      }
    });
  </script>

  <style>
    .blur1 {

      filter: blur(5px);

    }

    .swiper1 .swiper-button-next,
    .swiper1 .swiper-button-prev {
      top: calc(50% + 30px) !important;
    }

    .texto-pp {
      background: rgb(0, 0, 0);
      background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(73, 183, 255, 0.19091386554621848) 100%);
      width: 100%;
      text-align: start;
      /*
      background-color: #15254b;
*/
      position: absolute;
      bottom: 0;
      padding: 10px;
      color: white;
    }

    .texto-pp p {
      margin: 0;
      text-indent: 40px;
    }

    .texto-pp a {
      color: white;
    }

    .mySwiper3 {
      background-color: #15254b;
    }

    /*
    .swiper-pagination {
     
      width: 45px;
      height: 35px;
      bottom: 65px;
      color: white;
      padding: 0 0 0 10px;
      
    }
*/
    .cib {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
    }

    .cib img {
      object-fit: contain;
      max-width: 966px;
      height: 400px;
    }

    .bk {
      width: 100%;
      position: absolute;
      height: 100%;
      background-color: #0000006e;
      top: 0;
      left: 0;
    }

    .filtered {
      filter: blur(10px);
    }

    /*
    .swiper1 {
      width: 100%;
      /*max-height: 450px;
    }
/*
    .mySwiper3 {
      height: 27vw;
    }
 
    */


    /*
    .swiper1 .swiper-pagination {

      left: 0;
      position: absolute;
    
      width: 45px;
  
    }
   */
    /*
    @media screen and (max-width:766px) {
      .swiper-wrapper img {
        height: 350px;
      }
    }
    */
  </style>