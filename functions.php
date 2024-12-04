<?php

/**
 * sirius functions and definitions
 *
 * @package sirius-lite
 */
?>
<?php

/*------------------------------
 Customizer
 ------------------------------*/

if (!class_exists('Kirki')) {
    require get_template_directory() . '/inc/kirki/kirki.php';
}
require get_template_directory() . '/customize/theme-defaults.php';
require get_template_directory() . '/customize/kirki-config.php';
require get_template_directory() . '/customize/customizer.php';

function sirius_customize_register($wp_customize)
{
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->get_section('colors')->title = esc_html__('Custom Colors', 'sirius-lite');
    $wp_customize->get_section('colors')->priority = 94;
}
add_action('customize_register', 'sirius_customize_register');

if (is_admin())  add_action('customize_controls_enqueue_scripts', 'sirius_custom_customize_enqueue');
function sirius_custom_customize_enqueue()
{
    wp_enqueue_style('sirius-customizer', get_template_directory_uri() . '/customize/style.css');
}

/*------------------------------
 Setup
 ------------------------------*/


 
function custom_loading_screen_scripts() {
    wp_enqueue_script('loading-screen', get_template_directory_uri() . '/assets/js/loading-screen.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'custom_loading_screen_scripts');




function sirius_setup()
{
    global $sirius_defaults;
    load_theme_textdomain('sirius-lite', get_template_directory() . '/languages');

    $locations = array(
        'main'      => esc_html__('Menú Principal', 'sirius-lite'),
        'footer'    => esc_html__('Mapa de Sitio', 'sirius-lite')
    );

    register_nav_menus($locations);

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption'));

    $args = array(
        'flex-width'    => true,
        'width'         => 1920,
        'flex-height'    => true,
        'height'        => 600,
        'default-image' => $sirius_defaults['sirius_custom_header'],
    );
    add_theme_support('custom-header', $args);
    // ACA ES LAS DIMENSIONES DE LAS IMAGENES
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1000, 600, array('center', 'center'));
    add_image_size('sirius-thumb',     1000, 600, array('center', 'center'));
    add_image_size('sirius-banner',    1090, 380, array('center', 'center'));
    add_image_size('sirius-related',   540,  540, array('center', 'center'));
    add_image_size('sirius-large',     740,  380, array('center', 'center'));
    add_image_size('sirius-reducido',  300,  200, array('center', 'center'));
    add_image_size('sirius-vertical',  540,  600, array('center', 'center'));

    add_post_type_support('page', 'excerpt');

    //add_theme_support( 'post-formats', array( 'video' ) );

    #https://make.wordpress.org/core/2016/11/26/extending-the-custom-css-editor/
    if (function_exists('wp_update_custom_css_post')) {
        $css = sirius_get_option('sirius_advanced_css');
        if ($css) {
            $core_css = wp_get_custom_css();
            $return = wp_update_custom_css_post($core_css . $css);
            if (!is_wp_error($return)) {
                remove_theme_mod('sirius_advanced_css');
            }
        }
    }
}
add_action('after_setup_theme', 'sirius_setup');

/*------------------------------
 Styles and Scripts
 ------------------------------*/

function sirius_scripts()
{

    /* Styles */

    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    //wp_register_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

    //wp_register_style('bootstrap-select', get_template_directory_uri().'/assets/css/bootstrap-select.css' );

    $sirius_custom_colors = 0;

    $sirius_custom_typography = 0;

    if ($sirius_custom_typography == 0) {
        wp_enqueue_style('sirius-fonts', sirius_fonts_url(), array(), null);
    }
    //default stylesheet
    $deps = array('bootstrap', 'font-awesome');
    $this_theme = wp_get_theme();
    wp_enqueue_style('sirius-style', get_stylesheet_uri(), $deps, $this_theme->get('Version'));

    //wp_enqueue_style('animate-css', get_template_directory_uri().'/assets/css/animate.css');

    // Load html5shiv.min.js
    wp_enqueue_script('sirius-html5', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.0');
    wp_script_add_data('sirius-html5', 'conditional', 'lt IE 9');
    // Load respond.min.js
    wp_enqueue_script('sirius-respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '1.3.0');
    wp_script_add_data('sirius-html5', 'conditional', 'lt IE 9');

    /* Scripts */

    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array('jquery'), '', true);
    //wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array('jquery'), '', true );
    wp_enqueue_script('sirius-js', get_template_directory_uri() . '/assets/js/sirius.js', array('jquery'), '', true);

    #animation
    /*wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '', true );
    wp_enqueue_script('vega-wp-themejs-anim', get_template_directory_uri() . '/assets/js/sirius-anim.js', array('jquery'), '', true );*/

    //comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'sirius_scripts');

if (!function_exists('sirius_fonts_url')) :
    function sirius_fonts_url()
    {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';
        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto font: on or off', 'sirius-lite')) {
            $fonts[] = 'Roboto:300,300i,400,400i,500,500i,700';
        }
        /* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto Slab font: on or off', 'sirius-lite')) {
            $fonts[] = 'Roboto+Slab:400,700';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;

/*------------------------------
 Custom CSS
 ------------------------------*/

if (!function_exists('sirius_custom_css_cta1')) :
    function sirius_custom_css_cta1()
    {
        $sirius_frontpage_cta_1_background_color = sirius_get_option('sirius_frontpage_cta_1_background_color');
        $sirius_frontpage_cta_1_parallax_image = sirius_get_option('sirius_frontpage_cta_1_parallax_image');
        echo "<style>";
        if ($sirius_frontpage_cta_1_parallax_image != '') {
            echo ".frontpage-cta1.parallax{background-image:url(" . esc_url($sirius_frontpage_cta_1_parallax_image) . ");}";
            echo ".frontpage-cta1.no-parallax{background-image:url(" . esc_url($sirius_frontpage_cta_1_parallax_image) . ");}";
        }
        if ($sirius_frontpage_cta_1_background_color != '') {
            echo ".frontpage-cta1.parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_1_background_color) . "}";
            echo ".frontpage-cta1.no-parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_1_background_color) . "}";
        }
        echo "</style>";
    }
endif;
add_action('wp_head', 'sirius_custom_css_cta1', 96);

if (!function_exists('sirius_custom_css_testimonials')) :
    function sirius_custom_css_testimonials()
    {
        $sirius_frontpage_testimonials_background_color = sirius_get_option('sirius_frontpage_testimonials_background_color');
        $sirius_frontpage_testimonials_parallax_image = sirius_get_option('sirius_frontpage_testimonials_parallax_image');
        echo "<style>";
        if ($sirius_frontpage_testimonials_parallax_image != '') {
            echo ".frontpage-testimonials.parallax{background-image:url(" . esc_url($sirius_frontpage_testimonials_parallax_image) . ");}";
            echo ".frontpage-testimonials.no-parallax{background-image:url(" . esc_url($sirius_frontpage_testimonials_parallax_image) . ");}";
        }
        if ($sirius_frontpage_testimonials_background_color != '') {
            echo ".frontpage-testimonials.parallax:before{background-color:" . esc_attr($sirius_frontpage_testimonials_background_color) . "}";
            echo ".frontpage-testimonials.no-parallax:before{background-color:" . esc_attr($sirius_frontpage_testimonials_background_color) . "}";
        }
        echo "</style>";
    }
endif;
add_action('wp_head', 'sirius_custom_css_testimonials', 96);


if (!function_exists('sirius_custom_css_cta2')) :
    function sirius_custom_css_cta2()
    {
        $sirius_frontpage_cta_2_background_color = sirius_get_option('sirius_frontpage_cta_2_background_color');
        $sirius_frontpage_cta_2_parallax_image = sirius_get_option('sirius_frontpage_cta_2_parallax_image');
        echo "<style>";
        if ($sirius_frontpage_cta_2_parallax_image != '') {
            echo ".frontpage-cta2.parallax{background-image:url(" . esc_url($sirius_frontpage_cta_2_parallax_image) . ");}";
            echo ".frontpage-cta2.no-parallax{background-image:url(" . esc_url($sirius_frontpage_cta_2_parallax_image) . ");}";
        }
        if ($sirius_frontpage_cta_2_background_color != '') {
            echo ".frontpage-cta2.parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_2_background_color) . "}";
            echo ".frontpage-cta2.no-parallax:before{background-color:" . esc_attr($sirius_frontpage_cta_2_background_color) . "}";
        }
        echo "</style>";
    }
endif;
add_action('wp_head', 'sirius_custom_css_cta2', 96);

if (!function_exists('sirius_custom_css')) :
    function sirius_custom_css()
    {
        $sirius_advanced_css = sirius_get_option('sirius_advanced_css');
        if ($sirius_advanced_css != '') {
            echo '<!-- Custom CSS -->';
            $output = "<style>" . wp_strip_all_tags($sirius_advanced_css) . "</style>";
            echo $output;
            echo '<!-- /Custom CSS -->';
        }
    }
endif;
add_action('wp_head', 'sirius_custom_css', 100);


/*------------------------------
 Widgets
 ------------------------------*/
require_once get_template_directory() . '/widgets/widgets.php';


/*------------------------------
 Content Width 
 ------------------------------*/

function sirius_content_width()
{
    $content_width = 1200;
    $GLOBALS['content_width'] = apply_filters('sirius_content_width', $content_width);
}
add_action('after_setup_theme', 'sirius_content_width', 0);

/*------------------------------
 wp_bootstrap_navwalker
 ------------------------------*/
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/*------------------------------
 Filters
 ------------------------------*/

#disable comments on media attachments
function sirius_filter_media_comment_status($open, $post_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'attachment') {
        return false;
    }
    return $open;
}
add_filter('comments_open', 'sirius_filter_media_comment_status', 10, 2);

#move comment field to the bottom of the comments form
function sirius_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'sirius_move_comment_field_to_bottom');

#excerpt length
function sirius_excerpt_length($length)
{
    return 50;
}
add_filter('excerpt_length', 'sirius_excerpt_length', 999);

#add class to page nav
function sirius_wp_page_menu_class($class)
{
    return preg_replace('/<ul>/', '<ul class="nav navbar-nav">', $class, 1);
}
add_filter('wp_page_menu', 'sirius_wp_page_menu_class');

#add class to pagination links
add_filter('next_posts_link_attributes', 'sirius_next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'sirius_prev_posts_link_attributes');

function sirius_next_posts_link_attributes()
{
    return 'class="btn btn-blue post-pagination-prev"';
}
function sirius_prev_posts_link_attributes()
{
    return 'class="btn btn-blue post-pagination-next"';
}


//http://wordpress.stackexchange.com/questions/50779/how-to-wrap-oembed-embedded-video-in-div-tags-inside-the-content
add_filter('embed_oembed_html', 'sirius_embed_oembed_html', 99, 4);
function sirius_embed_oembed_html($html, $url, $attr, $post_id)
{
    return '<div class="iframe-embed">' . $html . '</div>';
}


function sirius_archive_title($title)
{
    if (is_home() && get_option('page_for_posts')) {
        $title = get_page(get_option('page_for_posts'))->post_title;
    } else if (is_home()) {
        $title = esc_html__("Home", 'sirius-lite');
    }
    return $title;
}
add_filter('get_the_archive_title', 'sirius_archive_title');

/*------------------------------
 Theme Functions
 ------------------------------*/

#sirius_get_option
if (!function_exists('sirius_get_option')) :
    function sirius_get_option($key)
    {
        global $sirius_defaults;
        if (array_key_exists($key, $sirius_defaults))
            $value = get_theme_mod($key, $sirius_defaults[$key]);
        else
            $value = get_theme_mod($key);
        return $value;
    }
endif;

#sirius_get_col_class
if (!function_exists('sirius_get_col_class')) :
    function sirius_get_col_class($n)
    {
        switch ($n) {
            case 1:
                return 'col-xs-4 col-xs-offset-4';
                break;
            case 2:
                return 'col-sm-3 col-sm-offset-3' . '|' . 'col-sm-3';
                break;
            case 3:
                return 'col-sm-4|col-sm-4|col-sm-4';
                break;
            case 4:
                return 'col-sm-3|col-sm-3|col-sm-3|col-sm-3';
                break;
            case 5:
                return 'col-sm-2 col-sm-offset-1|col-sm-2|col-sm-2|col-sm-2|col-sm-2';
                break;
            case 6:
                return 'col-sm-2|col-sm-2|col-sm-2|col-sm-2|col-sm-2|col-sm-2';
                break;
        }
    }
endif;


if (!function_exists('sirius_show_custom_css_field')) :
    function sirius_show_custom_css_field()
    {
        if (get_bloginfo('version') >= 4.7) {
            $sirius_advanced_css = sirius_get_option('sirius_advanced_css');
            if ($sirius_advanced_css == '') return false;
            else return true;
        }
        return true;
    }
endif;

if (!function_exists('sirius_animate')) :
    function sirius_animate($x)
    {
        echo esc_attr('wow ' . $x);
    }
endif;

/*------------------------------
 Example
 ------------------------------*/

#default nav top level pages
function sirius_default_nav()
{
    echo '<div class="navbar-collapse collapse">';
    echo '<ul class="nav navbar-nav">';
    $pages = get_pages();
    $n = count($pages);
    $i = 0;
    foreach ($pages as $page) {
        $menu_name = $page->post_title;
        $menu_link = get_page_link($page->ID);
        if (get_the_ID() == $page->ID) $current_class = "current_page_item";
        else {
            $current_class = '';
            $home_current_class = '';
        }
        $menu_class = "page-item-" . $page->ID;
        echo "<li class='page_item " . esc_attr($menu_class) . " $current_class'><a href='" . esc_url($menu_link) . "'>" . esc_html($menu_name) . "</a></li>";
        $i++;
    }
    echo '</ul>';
    echo '</div>';
}

#sirius_rand_page
function sirius_rand_page()
{
    return 2;
}

#sirius_get_sample_image
function sirius_get_sample_image($what)
{
    global $sirius_defaults;
    switch ($what) {
        case 'sirius-large':
            $images = $sirius_defaults['sirius_featured_large_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
        case 'thumbnail':
        case 'sirius-thumb':
            $images = $sirius_defaults['sirius_featured_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
    }
}

/*----------------------------------------------
 Remover campos sin utilizar al crear un evento
 ----------------------------------------------*/
add_action('admin_menu', 'remove_post_meta_boxes');
function remove_post_meta_boxes()
{
    remove_meta_box('postcustom', 'ajde_events', 'normal');
    remove_meta_box('commentstatusdiv', 'ajde_events', 'normal');
    remove_meta_box('commentsdiv', 'ajde_events', 'normal');
    remove_meta_box('authordiv', 'ajde_events', 'normal');
    remove_meta_box('slugdiv', 'ajde_events', 'normal');
}

add_filter('eventon_lang_var_count', 'eventon_lang_count', 10, 1);
add_filter('eventon_lang_variation', 'eventon_lang_vars', 10, 1);
function eventon_lang_count($count)
{
    return 6;
}
function eventon_lang_vars($array)
{
    $new_array = array('L4', 'L5', 'L6');
    return array_merge($array, $new_array);
}

function displayHomePosts()
{
    //default values obj from post.php.
    //pass these in as args that you really want
    $defaults = array(
        'numberposts' => 5,
        'offset' => 0,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'post',
        'suppress_filters' => true
    );

    $args = array(
        'numberposts' => 4
    );

    //explore why the redirect error occurs?
    //$num = 5;
    $post_array = get_posts($args); //as found in wp-includes/post.php
    //var_dump($post_array); 

    //add the last className for the bottom border?

    for ($i = 0; $i < count($post_array); $i++) {
        $post_title = $post_array[$i]->post_title;
        $post_name = $post_array[$i]->post_name;

        $post_permalink = "http://localhost:8080/noticiasUNSL" . $post_name;

        //actually output the html with the php variables included
        echo "<li><a href=\"$post_permalink\" rel=\"bookmark\" title=\"Permanent Link to $post_title\">$post_title</a></li>";
    }
}
function obtenerTitulo()
{
    $args = array(
        'numberposts' => 1
    );
    $post_array = get_posts($args);

    for ($i = 0; $i < count($post_array); $i++) {
        $post_title = $post_array[$i]->post_title;
        $post_name = $post_array[$i]->post_name;

        $post_permalink = "http://localhost:8080/noticiasUNSL" . $post_name;
        echo "<a href=\"$post_permalink\" rel=\"bookmark\" title=\"Permanent Link to $post_title\">$post_title</a>";
    }
}

/*function wcs_post_thumbnails_in_feeds( $content ) {
    global $post;
    if( has_post_thumbnail( $post->ID ) ) {
        $content = '<p>' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '</p>' . $content;
    }
    return $content;
}*/
add_action('rss2_item', function () {
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $output = '';
        $thumbnail_ID = get_post_thumbnail_id($post->ID);
        $thumbnail = wp_get_attachment_image_src($thumbnail_ID, 'thumbnail');
        $output .= '<post-thumbnail>';
        $output .= '<url>' . $thumbnail[0] . '</url>';
        $output .= '<width>' . $thumbnail[1] . '</width>';
        $output .= '<height>' . $thumbnail[2] . '</height>';
        $output .= '</post-thumbnail>';

        echo $output;
    }
});
add_filter('the_excerpt_rss', 'wcs_post_thumbnails_in_feeds');
add_filter('the_content_feed', 'wcs_post_thumbnails_in_feeds');
function obtener_videos_de_youtube()
{
    $cached_results = get_transient('youtube_api_cache');

    if ($cached_results) {
        return $cached_results;
    } else {
        $max = '6';
        $playlistid = 'PLPHjzCOfwhCU8wJYO-SazoXjbzYV780UE'; 

        $api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=$playlistid&maxResults=$max&key=$key&order=date";
        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
         
            error_log('Error al obtener videos de YouTube: ' . $response->get_error_message());
            return array();
        }
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        if (isset($data['error'])) {
         
            error_log('Error en la API de YouTube: ' . json_encode($data['error']));
            return array();
        }
        set_transient('youtube_api_cache', $data, 60 * 60);
        return $data;
    }
}



add_filter('jpeg_quality', function ($arg) {
    return 100;
});

add_filter('wp_editor_set_quality', function ($arg) {
    return 100;
});

add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);
    return $sizes;
});

add_filter('wp_generate_attachment_metadata', 'prevent_image_resize', 10, 2);

function prevent_image_resize($metadata, $attachment_id)
{
   
    if (is_single()) {
       
        unset($metadata['sizes']);
    }
    return $metadata;
}
add_filter('big_image_size_threshold', '__return_false');

function modificar_formato_fecha($fecha)
{
    
    $fecha = str_replace(',', '', $fecha);
  
    $fecha = preg_replace('/(\d{1,2}) (\w+) (\d{4})/', '$1 de $2, $3', $fecha);
    return $fecha;
}
add_filter('get_the_date', 'modificar_formato_fecha');




function get_and_cache_most_viewed_posts()
{
    
    $popular_posts = get_transient('cached_popular_posts');


    if ($popular_posts === false) {
      
        $popular_posts = pvc_get_most_viewed_posts(array(
            'limit' => 6, 
            'post_type' => 'post'
        ));
      
        set_transient('cached_popular_posts', $popular_posts, 86400);
       
        reset_post_views_counters();
    }
    return $popular_posts;
}

function reset_post_views_counters()
{
    
    $args = array(
        'post_type' => 'post',
        'numberposts' => -1,
        'fields' => 'ids'
    );
    $all_posts = get_posts($args);
 
    foreach ($all_posts as $post_id) {
    
        delete_post_meta($post_id, 'pvc_views');
    }
}

function my_schedule_event()
{
    if (!wp_next_scheduled('reset_post_views_counters_event')) {
        wp_schedule_event(time(), 'daily', 'reset_post_views_counters_event');
    }
}
add_action('wp', 'my_schedule_event');

function my_clear_scheduled_event()
{
    wp_clear_scheduled_hook('reset_post_views_counters_event');
}
register_deactivation_hook(__FILE__, 'my_clear_scheduled_event');

add_action('reset_post_views_counters_event', 'reset_post_views_counters');

function mytheme_add_admin_menu()
{
    add_menu_page(
        __('Galería Flyers', 'mytheme'), 
        __('Galería Flyers', 'mytheme'), 
        'manage_options',               
        'swiper_gallery',                
        'mytheme_swiper_gallery_page',   
        'dashicons-format-gallery',      
        20                              
    );
}
add_action('admin_menu', 'mytheme_add_admin_menu');
function mytheme_swiper_gallery_page()
{
?>
    <div class="wrap">
        <h1><?php _e('Galería Flyers', 'mytheme'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mytheme_swiper_gallery_settings');
            do_settings_sections('swiper_gallery');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function mytheme_swiper_gallery_settings_init()
{
    register_setting(
        'mytheme_swiper_gallery_settings', 
        'swiper_gallery_images',            
        'mytheme_sanitize_gallery_images'   
    );
    add_settings_section(
        'mytheme_swiper_gallery_section',
        __('Gestionar imágenes del carrusel', 'mytheme'),
        null,
        'swiper_gallery'
    );
    add_settings_field(
        'swiper_gallery_images',
        __('Imágenes del carrusel', 'mytheme'),
        'mytheme_swiper_gallery_images_render',
        'swiper_gallery',
        'mytheme_swiper_gallery_section'
    );
}
add_action('admin_init', 'mytheme_swiper_gallery_settings_init');
function mytheme_swiper_gallery_images_render()
{
    $images = get_option('swiper_gallery_images', array());
    echo '<div id="swiper-images-container">';
    foreach ($images as $index => $image_data) {
        $image_url = esc_url($image_data['url']);
        $image_caption = esc_html($image_data['caption']);
        $image_link = esc_url($image_data['link']);
    ?>
        <div class="swiper-image-row">
            <input type="hidden" name="swiper_gallery_images[<?php echo $index; ?>][url]" value="<?php echo $image_url; ?>" />
            <img src="<?php echo $image_url; ?>" alt="" width="100" height="100" />
            <input type="text" name="swiper_gallery_images[<?php echo $index; ?>][caption]" value="<?php echo $image_caption; ?>" placeholder="<?php _e('Texto de la imagen', 'mytheme'); ?>" />
            <input type="url" name="swiper_gallery_images[<?php echo $index; ?>][link]" value="<?php echo $image_link; ?>" placeholder="<?php _e('Enlace del botón Ver más', 'mytheme'); ?>" />
            <button type="button" class="remove-image-button"><?php _e('Eliminar', 'mytheme'); ?></button>
        </div>
    <?php
    }
    echo '</div>';
    echo '<button type="button" id="add-image-button">' . __('Añadir imagen', 'mytheme') . '</button>';
}

function mytheme_sanitize_gallery_images($input) {
    $sanitized = array();
    foreach ($input as $image_data) {
      
        if (isset($image_data['url']) && !empty($image_data['url'])) {
            $sanitized[] = array(
                'url' => esc_url_raw($image_data['url']),
                'caption' => isset($image_data['caption']) ? sanitize_text_field($image_data['caption']) : '',
                'link' => isset($image_data['link']) ? esc_url_raw($image_data['link']) : '',
            );
        }
    }
   
    error_log(print_r($sanitized, true));
    return $sanitized;
}
function mytheme_swiper_gallery_enqueue_scripts($hook)
{
    if ($hook != 'toplevel_page_swiper_gallery') {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script('mytheme-swiper-gallery', get_template_directory_uri() . '/swiper-gallery.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'mytheme_swiper_gallery_enqueue_scripts');






