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
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                ?>

                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <p class="post-description"><?php echo wp_trim_words(get_the_content(), 100); ?></p>

            <?php endwhile;
            the_posts_pagination();
        else: ?>
            <p></p>
            <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
