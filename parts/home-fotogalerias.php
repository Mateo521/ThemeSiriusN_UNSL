  <!-- Swiper -->
  <div class="contenedor" style="padding:0;">
    <div class="swiper1 mySwiper3">
      <div class="swiper-wrapper">

        <?php $i = 0;
        for ($i; $i < 3; $i++) {

        ?>

          <div class="swiper-slide">
            <div>
              <img src="https://picsum.photos/900/900?random=<?php echo ($i); ?>" alt="">
              <div class="bk"></div>
            </div>

          </div>
        <?php } ?>

        <div class="swiper-slide">
          <img class="filtered" src="https://picsum.photos/900/900?random=<?php echo ($i + 1); ?>" alt="">
          <div class="bk"></div>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper3", {
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

  <style>
    .bk {
      width: 100%;
      position: absolute;
      height: 100%;
      background-color: #0000008f;
      top: 0;
      left: 0;

    }

    .filtered {
      filter: blur(10px);
    }

    .swiper1 {
      width: 100%;
      max-height: 450px;
    }

    
    .swiper1 .swiper-slide img {
      width: 100%;
    }

    .swiper1 .swiper-pagination {
      color: white;
    }
  </style>