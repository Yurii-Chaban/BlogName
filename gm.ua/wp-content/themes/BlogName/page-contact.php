<?php get_header(); ?>
<div class="wrapper">
    <aside class="sidebar">
        <?php if (is_active_sidebar('contact-sidebar')) { ?>
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
            <?php dynamic_sidebar('contact-sidebar'); ?>
        <?php } ?>
    </aside>
    <div class="main-post">
        <?php
        if (have_posts()):?>
            <?php while (have_posts()):the_Post(); ?>
                <?php foreach ($posts as $post) : ?>
                    <?php setup_postdata($post); ?>
                    <p class="phone-img"><?php the_post_thumbnail(); ?></p>
                    <h2 class="custom-title"><?php the_title(); ?></h2>
                    <p class="custom-description"><?php the_content(); ?></p>
                <?php endforeach; ?>

            <?php endwhile ?>
        <?php endif ?>
    </div>
</div>
<?php get_footer(); ?>
