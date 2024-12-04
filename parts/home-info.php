<section class="fond">
<div style="display:flex; justify-content:center;">
<div class="anchomaximo">
  <div class="stick">
<div style="display:flex; flex-direction:column; align-items:start;padding:10px;">
<p style="margin:0 ; display:inline-flex;  padding:5px 10px; background-color:#1b5281; color:white;">Institucional</p>
  <div class="grid-container-1 w-full tarjeta-infos" style="width:100%;">
    <?php
    $categories = array('institucional'); 
    $item = 1;
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
<div class="item<?php echo ($item); ?> relative " style="position:relative; background-image:url(<?php echo esc_url($thumbnail_url); ?>); background-size:cover; background-position:center;">
  <a href="<?php echo ($permalink); ?>">
    <div class="w-full h-full img-fulls" style="position:relative; width:100%;height:100%; overflow:hidden;">

      <div class="absolute bottom-0 text-left text-white p-2" style="position:absolute; bottom:0; text-align:left; color:white; padding:5px;">
        <h5 class="text-sm relative" style="z-index:5; position:relative;"> | <?php echo $title ?></h5>
      
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
 ?>
 <?php
      wp_reset_postdata(); 
    }
    ?>

  </div>
