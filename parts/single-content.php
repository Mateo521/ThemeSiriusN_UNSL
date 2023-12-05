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

        <?php /* Featured Image */
        if ($sirius_posts_featured_image_show == 1 && has_post_thumbnail()) { ?>
            <div class="entry-thumb"><?php the_post_thumbnail('full', array('alt' => the_title_attribute(array('echo' => false)), 'class' => 'img-responsive')); ?></div>
        <?php } ?>


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

</div>
<!-- /Post Content -->