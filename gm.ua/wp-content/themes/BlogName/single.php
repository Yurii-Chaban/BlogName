<?php get_header(); ?>
    <div class="wrapper">
        <div class="wrapper">
            <aside class="sidebar">
                <?php if (is_active_sidebar('main-sidebar')) { ?>
                    <?php
                    $example_position = get_theme_mod('sidebar_placement');
                    if ($example_position != '') {
                        switch ($example_position) {
                            case 'right':
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

                <div class="post-content">
                    <?php if (have_posts()):
                        while (have_posts()): the_post(); ?>
                            <div class="content-post">
                                <a class="posted-date" href="<?php the_permalink(); ?>">
                            <span class="date">
                                <span class="date-number"><?php the_time('j'); ?></span>
                                <span class="date-month"><?php the_time('F'); ?></span>
                            </span>
                                </a>
                                <div class="post-description">
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
                                                echo " Category ";
                                                echo $category[0]->category_count;
                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        <?php endwhile;
                        the_posts_pagination();

                    else: ?>
                        <p><?php _e('No content found', 'BlogName'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>