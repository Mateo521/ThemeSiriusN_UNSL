<?php
$sirius_posts_meta_show = sirius_get_option('sirius_posts_meta_show');
$sirius_posts_date_show = sirius_get_option('sirius_posts_date_show');
$sirius_posts_category_show = sirius_get_option('sirius_posts_category_show');
$sirius_posts_author_show = sirius_get_option('sirius_posts_author_show');
$sirius_posts_tags_show = sirius_get_option('sirius_posts_tags_show');
$sirius_posts_featured_image_show = sirius_get_option('sirius_posts_featured_image_show');

$sirius_posts_featured_image_full = sirius_get_option('sirius_posts_featured_image_full');
$banner_size = $sirius_posts_featured_image_full == 1 ? 'full' : 'sirius-thumb';
?>

<!-- Post Content -->
<div id="post-<?php the_ID(); ?>" <?php post_class('entry details entry-single tarjeta-inicio__fondo-blanco tarjeta-principal'); ?>>
    <!-- Imprimir categorías -->
    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap;">
        <div class="post-categories" style="padding:25px 0;">
            <?php the_category(', '); ?>
        </div>

        <div class="flex items-center gap-3" style="display: flex; align-items:center; gap:5px; padding:10px;">
            <button class="boton" id="boton1" onclick="tipografia(); cambiarIcono('icono1')">
                <i id="icono1" class="fa fa-eye" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>
            <button class="boton" id="boton2" onclick="blancoynegro(); cambiarIcono('icono2')">
                <i id="icono2" class="fa fa-toggle-off" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>

            <button class="boton" id="boton3" onclick="cambiarIcono('icono3')">
                <i id="icono3" class="fa fa-volume-off" aria-hidden="true" onclick="event.stopPropagation();"></i>
            </button>

            <button class="boton" id="botonStop" style="display:none;" onclick="stopSynthesis()">
            <i id="icono4" class="fa fa-stop" aria-hidden="true"></i>
         
            </button>

        </div>
    </div>
    <style>
        .boton {
            cursor: pointer;
            width: 35px;
            border: none;
            background-color: white;
            border-radius: 50%;
            padding: 5px 10px;
        }

        .boton i {
            pointer-events: none;
        }
    </style>


    <div class="entry-body">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>

        <?php /* Title */
        if (get_the_title() != '') { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php } else { ?>
            <h1 class="entry-title"><?php echo esc_html__('Post ID: ', 'sirius-lite');
                                    the_ID(); ?></h1>
        <?php } ?>

        <?php /* Meta */
        if ($sirius_posts_meta_show == 1) { ?>

            <ol class="entry-meta">
                <?php if ($sirius_posts_date_show == 1) { ?><li><i class="fa fa-clock-o"></i> <?php echo get_the_date() ?></li><?php } ?>
            </ol>
            <br>
        <?php } ?>

        <?php 
/* Featured Image */
if ($sirius_posts_featured_image_show == 1 && has_post_thumbnail() && !in_category('entrevistas')) { 
    $image_id = get_post_thumbnail_id();
    $image_meta = wp_get_attachment_metadata($image_id);
    $upload_dir = wp_upload_dir();
    
    if ($image_meta) {
        $image_file = basename(get_attached_file($image_id));
        $image_url = $upload_dir['baseurl'] . '/' . dirname($image_file) . '/' . $image_meta['file'];
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        
        // Aplicar filtro para establecer la calidad de la imagen
        add_filter('jpeg_quality', function($arg){return 100;});

        ?>
        <div class="entry-thumb"><img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-responsive"></div>
    <?php }
} ?>





        <div class="entry-content clearfix">
            <?php if (get_post_format() == 'video') {
                $sirius_post_meta = get_post_meta(get_the_ID(), '_video_post_meta', TRUE);
                if (array_key_exists('youtube_link', $sirius_post_meta)) { ?>
                    <div class="iframe-embed"><iframe width="100%" height="315" src="<?php echo esc_url($sirius_post_meta['youtube_link']); ?>" frameborder="0" allowfullscreen></iframe></div><br />
            <?php }
            } ?>
            <?php the_content();
            wp_link_pages(); ?>
        </div>

        <?php /* Meta */
        if ($sirius_posts_meta_show == 1) { ?>

            <?php if ($sirius_posts_tags_show == 1 && has_tag()) { ?><div class="entry-tags"><span><?php echo esc_html__('Etiquetas: ', 'sirius-lite'); ?></span><?php the_tags('', ', '); ?></div><?php } ?>

            <ol class="entry-meta">
                <?php if ($sirius_posts_date_show == 1) { ?><li><i class="fa fa-clock-o"></i> <?php echo get_the_date() ?></li><?php } ?>

                <?php if ($sirius_posts_author_show == 1) { ?><li><i class="fa fa-user"></i> <?php the_author(); ?></li><?php } ?>
            </ol>
        <?php } ?>

    </div>

    <div class="flex gap-5 items-center py-5">
        <p class="px-2 bold">COMPARTIR</p>
        <a href="mailto:?Título&body=Noticias Universidad Nacional de San Luis:%20<?php the_permalink(); ?>" target="blank">
            <svg width="25" height="25" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.667 0.333328H2.33366C1.41699 0.333328 0.675326 1.08333 0.675326 1.99999L0.666992 12C0.666992 12.9167 1.41699 13.6667 2.33366 13.6667H15.667C16.5837 13.6667 17.3337 12.9167 17.3337 12V1.99999C17.3337 1.08333 16.5837 0.333328 15.667 0.333328ZM15.667 3.66666L9.00033 7.83333L2.33366 3.66666V1.99999L9.00033 6.16666L15.667 1.99999V3.66666Z" fill="#282828" />
            </svg>
        </a>
        <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="blank" rel="noopener noreferrer">
            <svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0003 1.66667C5.39783 1.66667 1.66699 5.39751 1.66699 10C1.66699 14.1775 4.74449 17.6275 8.75449 18.23V12.2083H6.69283V10.0175H8.75449V8.56001C8.75449 6.14667 9.93033 5.08751 11.9362 5.08751C12.897 5.08751 13.4045 5.15834 13.6453 5.19084V7.10251H12.277C11.4253 7.10251 11.1278 7.91001 11.1278 8.82V10.0175H13.6237L13.2853 12.2083H11.1287V18.2475C15.1962 17.6967 18.3337 14.2183 18.3337 10C18.3337 5.39751 14.6028 1.66667 10.0003 1.66667Z" fill="#282828" />
            </svg>

        </a>
        <a target="_blank" href="https://wa.me/?text=<?php the_permalink(); ?>" target="blank" data-action="share/whatsapp/share">
            <svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.8978 4.10666C14.1628 2.37083 11.7961 1.49499 9.31111 1.69499C5.97028 1.96333 3.04194 4.28666 2.06194 7.49166C1.36194 9.78166 1.65611 12.1725 2.79611 14.1475L1.71611 17.7333C1.61278 18.0775 1.92694 18.4017 2.27444 18.3092L6.02778 17.3033C7.24361 17.9667 8.61194 18.3158 10.0053 18.3167H10.0086C13.5044 18.3167 16.7344 16.1783 17.8519 12.8658C18.9403 9.63583 18.1353 6.34666 15.8978 4.10666ZM14.0819 12.9617C13.9086 13.4475 13.0594 13.9158 12.6778 13.95C12.2961 13.985 11.9386 14.1225 10.1819 13.43C8.06778 12.5967 6.73278 10.4292 6.62944 10.2908C6.52528 10.1517 5.78028 9.16332 5.78028 8.13999C5.78028 7.11666 6.31778 6.61333 6.50861 6.40583C6.69944 6.19749 6.92444 6.14583 7.06361 6.14583C7.20194 6.14583 7.34111 6.14583 7.46195 6.15083C7.61028 6.15666 7.77444 6.16416 7.93028 6.50999C8.11528 6.92166 8.51944 7.94999 8.57111 8.05416C8.62278 8.15833 8.65778 8.27999 8.58861 8.41833C8.51944 8.55666 8.48444 8.64332 8.38111 8.76499C8.27694 8.88666 8.16278 9.03583 8.06944 9.12916C7.96528 9.23249 7.85694 9.34583 7.97778 9.55333C8.09944 9.76166 8.51611 10.4425 9.13444 10.9933C9.92944 11.7017 10.5986 11.9208 10.8069 12.0258C11.0153 12.13 11.1361 12.1125 11.2578 11.9733C11.3794 11.835 11.7778 11.3667 11.9161 11.1583C12.0544 10.95 12.1936 10.985 12.3844 11.0542C12.5753 11.1233 13.5978 11.6267 13.8053 11.7308C14.0136 11.835 14.1519 11.8867 14.2036 11.9733C14.2553 12.0592 14.2553 12.4758 14.0819 12.9617Z" fill="#282828" />
            </svg>

            </svg>
        </a>
        <a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="blank" rel="noopener noreferrer">
            <svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.8333 2.5H4.16667C3.24583 2.5 2.5 3.24583 2.5 4.16667V15.8333C2.5 16.7542 3.24583 17.5 4.16667 17.5H15.8333C16.7542 17.5 17.5 16.7542 17.5 15.8333V4.16667C17.5 3.24583 16.7542 2.5 15.8333 2.5ZM14.2083 7.92833C14.2083 8 14.2083 8.07083 14.2083 8.21417C14.2083 10.9283 12.1367 14.0717 8.35083 14.0717C7.20833 14.0717 6.13667 13.7142 5.20833 13.1433C5.35083 13.1433 5.56583 13.1433 5.70833 13.1433C6.63667 13.1433 7.56583 12.7858 8.28 12.2858C7.35167 12.2858 6.6375 11.6433 6.35167 10.8575C6.49417 10.8575 6.6375 10.9292 6.70917 10.9292C6.92333 10.9292 7.06667 10.9292 7.28083 10.8575C6.3525 10.6433 5.63833 9.8575 5.63833 8.8575C5.92417 9 6.21 9.07167 6.56667 9.14333C5.995 8.64333 5.63833 8.07167 5.63833 7.3575C5.63833 7 5.71 6.64333 5.92417 6.3575C6.92417 7.57167 8.42417 8.42917 10.1383 8.5C10.1383 8.3575 10.0667 8.21417 10.0667 8C10.0667 6.8575 10.995 5.92833 12.1383 5.92833C12.71 5.92833 13.2808 6.1425 13.6383 6.57083C14.1383 6.49917 14.5667 6.285 14.9242 6.07083C14.7817 6.57083 14.4242 6.92833 13.9958 7.21333C14.4242 7.14167 14.7817 7.07083 15.21 6.85583C14.9225 7.28583 14.5658 7.6425 14.2083 7.92833Z" fill="#282828" />
            </svg>
        </a>
    </div>

</div>
<!-- /Post Content -->