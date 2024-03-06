  <!-- Swiper -->
  <div class="contenedor" style="padding:0;">
    <div class="swiper1 mySwiper3">
      <div class="swiper-wrapper">

        <?php $i = 0;
        for ($i; $i < 3; $i++) {

        ?>

          <div class="swiper-slide">
            <div style="display:flex; flex-direction:column; width:100%;">
              <div style="position:relative;">
                <img src="https://picsum.photos/900/900?random=<?php echo ($i); ?>" alt="">
                <div class="bk"></div>
              </div>
              <p> archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor</p>
            </div>

          </div>
        <?php } ?>

        <div class="swiper-slide">
          <img class="filtered" src="https://picsum.photos/900/900?random=<?php echo ($i + 1); ?>" alt="">
          <div class="bk"></div>
          <div>
            <p>Ver la nota completa::</p>
          </div>
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
      speed: 0,
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
      /*max-height: 450px;*/
    }

    .swiper-wrapper img {

      height: 27vw;
    }



    .swiper1 .swiper-pagination {

      left: 0;
      position: absolute;
      /* right: 35px; */
      width: 45px;
    }

    @media screen and (max-width:766px) {
      .swiper-wrapper img {
        height: 350px;
      }
    }
  </style>
