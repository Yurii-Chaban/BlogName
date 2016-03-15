<?php get_header(); ?>
<section class="main-block">

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
            <section class="slider-wrapper">
                <div class="flexslider">
                    <ul class="slides">

                        <?php
                        $args = array('post_type' => 'slider', 'post_per_page' => 6);
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <li>
                                <?php the_post_thumbnail(); ?>
                                <div class="caption">
                                    <h3 class="slider-title"><?php the_title(); ?></h3>
                                    <p class="slider-content"><?php the_excerpt(); ?></p>
                                </div>
                            </li>
                        <?php endwhile ?>
                    </ul>
                </div>
            </section>

            <h2 class=""><?php _e('Latest Blog Post', 'BlogName'); ?></h2>
            <?php if (have_posts()):
                while (have_posts()): the_post(); ?>
                    <a class="posted-date" href="<?php the_permalink(); ?>"><?php the_time('j F'); ?></a>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <ul class="post-meta">
                        <li>
                            <span class="fa fa-comment"></span>
                            <a href="<?php the_permalink(); ?>">
                                <?php global $post;
                                echo $post->comment_count;
                                echo " comments"; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <span class="fa fa-folder"></span>
                                <?php
                                $category = get_the_category();
                                echo $category[0]->category_count;
                                ?>
                            </a>
                        </li>
                    </ul>
                    <p class="post-description"><?php the_excerpt(); ?></p>
                    <a class="read-more" href="<?php the_permalink(); ?>">
                        <?php _e('Continue Reading', 'BlogName'); ?>
                        <span class="fa fa-chevron-right"></span>
                    </a>
                <?php endwhile;
                the_posts_pagination();

            else: ?>
                <p><?php _e('No content found', 'BlogName'); ?></p>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>
