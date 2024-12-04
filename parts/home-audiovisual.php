

<?php
$videos = obtener_videos_de_youtube();
?>

<div class="w-full py-12" style="background-color:#0f2f49; width:100%; padding:10px;margin:10px 0;">
  <div class="flex justify-center  text-white" style="display:flex; justify-content:center; color:white;">
    <div class="max-w-screen-xl w-full" style="width:100%; max-width:1170px;">
      <p class="text-3xl  p-5" style="padding:10px;">AUDIOVISUAL</p>
      <div class="flex flex-wr items-center justify-between mx-auto " style="display:flex; flex-wrap:wrap;align-items:center; justify-content:space-between;margin:0 auto;">
        <div class="grid-container-3 w-full p-3">

          <div class="item1" id="item1">



            <?php if (!empty($videos)) {
              $videoId = $videos['items'][0]['snippet']['resourceId']['videoId'];
              $thumbnails = $primer_video['snippet']['thumbnails'];
              $thumbnail_url = $thumbnails['medium']['url'];
            ?>
              <div class="flex h-full" style="flex-direction:column; height:100%;">
                <iframe id="videoPlayer" class="w-full h-full" height="315" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen></iframe>
                <p id="titulo"><?php echo $videos['items'][0]['snippet']['title']; ?></p>
              </div>

            <?php
            }
            ?>
          </div>
          <?php
          for ($index = 0; $index < count($videos['items']) - 1; $index++) {
            $video = $videos['items'][$index];
            $thumbnails = $video['snippet']['thumbnails'];
            $thumbnail_url = $thumbnails['medium']['url'];
          ?>
   
            <div style="cursor:pointer;" class="miniatura item<?php echo ($index + 2); ?>" data-video-id="<?php echo $video['snippet']['resourceId']['videoId']; ?> " data-video-title="<?php echo $video['snippet']['title']; ?>">
              <div class="grid items-center gap-3 grid-cols-2" style="display:grid; align-items:center; gap:5px; grid-template-columns:1fr 1fr;">
                <div class="relative w-full h-full" style="position:relative; width:100%;height:100%;">

                  <img class="absolute" style="left:50%;top:50%; transform:translate(-50%,-50%); position:absolute;" width="35" height="35" src="<?php echo get_template_directory_uri(); ?>/assets/img/pngegg.png" alt="">

                  <img class="w-full h-full" src="<?php echo $thumbnail_url; ?>" style="width:100%;height:100%;">
                </div>


                <p class="text"><?php echo $video['snippet']['title']; ?></p>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>




<script>
  document.addEventListener("DOMContentLoaded", function() {
    var videoPlayer = document.querySelector("#videoPlayer");
    var miniaturas = document.querySelectorAll(".miniatura");
    var titulo = document.querySelector("#titulo");

    miniaturas.forEach(function(miniatura) {
      miniatura.addEventListener("click", function() {
        var videoId = this.getAttribute("data-video-id");
        var videoTitle = this.getAttribute("data-video-title");

        videoPlayer.src = "https://www.youtube.com/embed/" + videoId;
        titulo.innerHTML = videoTitle;
      });
    });
  });
</script>