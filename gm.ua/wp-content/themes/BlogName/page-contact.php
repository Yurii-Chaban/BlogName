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
                        <div class="contact-page-description">
                            <div class="page-content">
                                <h2 class="contact-title">Conact</h2>
                                <h3 class="after-title">Morbi accumsan ipsum velit.</h3>
                                <p class="contact-content">Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                            </div>
                        </div>
                        <p class="custom-description"><?php the_content(); ?></p>
                    <?php endforeach; ?>

                <?php endwhile ?>
            <?php endif ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>
