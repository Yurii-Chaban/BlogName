<?php get_header(); ?>

    <div class="wrapper">
        <aside class="sidebar">
            <?php if (is_active_sidebar('main-sidebar')) { ?>
                <?php
                $example_position = get_theme_mod('sidebar_placement');
                if ($example_position != '') {
                    switch ($example_position) {
                        case 'right':
                            // Do nothing. The theme already aligns the logo to the left
                            break;
                        case 'left':
                            echo '<style type="text/css">';
                            echo '.sidebar{ float: left; }';
                            echo '</style>';
                            break;
                    }
                }
                ?>
                <?php dynamic_sidebar('main-sidebar'); ?>
            <?php } ?>
        </aside>
        <div class="main-post">
            <div class="gallery-page">

                <?php
                if (have_posts()):?>
                    <?php while (have_posts()):the_Post(); ?>
                        <?php foreach ($posts as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <h2 class="page-title"><?php the_title(); ?> - Gallery</h2>
                        <?php endforeach; ?>

                    <?php endwhile ?>
                <?php endif ?>
                <ul class="gallery-list">
                <?php
                $args = array('post_type' => 'gallery', 'post_per_page' => 20);
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>


                            <li class="item">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                <div class="item-title">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h3 class="item-content">
                                            <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </li>


                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    query_posts("post_type=gallery&posts_per_page=1&caller_get_posts=1&paged='. $paged .'"); ?>

                <?php else: ?>
                <p><?php _e('Sorry, post not found', 'BlogName'); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

<?php get_footer(); ?>