<section class="fond">
<div style="display:flex; justify-content:center;">
<div style="max-width:1200px">
  <div class="stick">
<div style="display:flex; flex-direction:column; align-items:start;padding:10px;">
<p style="margin:0 ; display:inline-flex;  padding:5px 10px; background-color:#1b5281; color:white;">Institucional</p>
  <div class="grid-container-1 w-full" style="width:100%;">


    <?php
    $categories = array('institucional'); 
    $item = 0;
    foreach ($categories as $index => $category) {
    
      $args = array(
        'category_name' => $category,
        'posts_per_page' => 3,
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
       
          $trimmed_content = wp_trim_words(strip_shortcodes($content), 10, '...');
       
    ?>


          <div class="item<?php echo ($item + 1); ?> relative" style="position:relative;">
            <a href="<?php echo ($permalink); ?>">
              <div class="w-full h-full" style="background-image:url(<?php echo esc_url($thumbnail_url); ?>); width:100%;height:100%; background-size:cover; background-position:center; ">
                <!--p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#1794d3; position:absolute; left:0; padding:5px; color:white; margin:5px; text-transform:uppercase;"><?php echo $category ?></p-->
                <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
                  <h5 class="text-sm relative" style="z-index:5; position:relative;"> | <?php echo $title ?></h5>
                  <p class="text-xl relative" style="z-index:5; position:relative;"><?php echo  $trimmed_content ?></p>
                </div>
                <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%; position:absolute; left:0; bottom:0; width:100%;">
                </div>
              </div>
            </a>
          </div>
    <?php
     $item++;
        }
      }



      wp_reset_postdata(); 
    }
    ?>


    <!--
    <div class="item2 relative" style="position:relative;">
      <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=1); width:100;height:100%;">
        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B; position:absolute; left:0; padding:5px; color:white; margin:5px;">SOCIEDAD</p>
        <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
          <h5 class="text-sm relative" style="z-index:5; position:relative;"> | Espacio de intercambio académico y prductivo</h5>
          <p class="text-xl relative" style="z-index:5; position:relative;">Universidad Siglo 21 celebró “Semana 21” junto a múltiples empresas nacionales e internacionales</p>
        </div>
        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%; position:absolute; left:0; bottom:0; width:100%;">
        </div>
      </div>
    </div>
    <div class="item3 relative" style="position:relative;">
      <div class="w-full h-full" style="background-image:url(https://picsum.photos/1200/700.jpg?page=2); width:100;height:100%;">
        <p class="absolute left-0 text-sm p-1 text-white m-2" style="background-color:#0F577B; position:absolute; left:0; padding:5px; color:white; margin:5px;">CULTURA</p>
        <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
          <h5 class="text-sm relative" style="z-index:5; position:relative;"> | Espacio de intercambio académico y prductivo</h5>
          <p class="text-xl relative" style="z-index:5; position:relative;">Universidad Siglo 21 celebró “Semana 21” junto a múltiples empresas nacionales e internacionales</p>
        </div>
        <div class="absolute left-0 bottom-0 w-full" style=" z-index:0; background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,1,0) 100%);  height:100%; position:absolute; left:0; bottom:0; width:100%;">
        </div>
      </div>
    </div>
  -->
  </div>
