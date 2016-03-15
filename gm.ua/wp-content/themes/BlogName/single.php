<?php get_header(); ?>
    <div class="wrapper">
        <aside class="sidebar">
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) { ?>
                <?php
                $example_position = get_theme_mod( 'sidebar_placement' );
                if( $example_position != '' ) {
                    switch ( $example_position ) {
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
                <?php dynamic_sidebar( 'main-sidebar' ); ?>
            <?php } ?>
        </aside>
        <div class="main-post">
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
                    <p class="post-description"><?php the_content(); ?></p>
                <?php endwhile;
                the_posts_pagination();

            else: ?>
                <p><?php _e('No content found', 'BlogName'); ?></p>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>