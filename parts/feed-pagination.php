<?php $sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show'); ?>
<?php if (get_next_posts_link() || get_previous_posts_link()) { ?>

    <?php if ($sirius_blog_feed_sidebar_show == 1) { ?>

        <div class="post-pagination clearfix">
            <?php
            $args = array(
                'prev_text' => __('Anterior', 'sirius-lite'),
                'next_text' => __('Siguiente', 'sirius-lite'),
                'type'      => 'list',
                'mid_size'      => 2,
            );
            echo '<div class="pagination">' . paginate_links($args) . '</div>';
            ?>
        </div>

    <?php } else { ?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="post-pagination clearfix" style="display:flex; justify-content:center;">
                    <?php
                    $args = array(
                        'prev_text' => __('Anterior', 'sirius-lite'),
                        'next_text' => __('Siguiente', 'sirius-lite'),
                        'type'      => 'list',
                        'mid_size'      => 2,
                    );
                    echo '<div class="pagination">' . paginate_links($args) . '</div>';
                    ?>
                </div>
            </div>
        </div>

        <style>
            .pagination li {
                background-color: white;
                padding: 3px 12px;
                list-style-type: none;
                border-radius: 4px;
            }

            .pagination ul {
                display: flex;
                gap: 5px;
            }
        </style>

<?php }
} ?>