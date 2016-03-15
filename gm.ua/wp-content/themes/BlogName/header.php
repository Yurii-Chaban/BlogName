<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<header>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/flexslider.css"/>
    <?php wp_head(); ?>
</header>
<body <?php body_class(); ?>>
<!-- site header -->
<header class="site-header">
    <div class="wrapper">
        <div class="search-form">
            <?php get_search_form(); ?>
        </div>
        <h1 class="logo">
            <a href="<?php echo home_url(); ?>">
                <!--                <img src="--><?php //echo logo(); ?><!--">-->
                <?php if (get_theme_mod('gootheme_logo')) :
                    echo '<img src="' . esc_url(get_theme_mod('gootheme_logo')) . '">';
                else:
                    echo get_bloginfo('name') . '<span>' . get_bloginfo('description') . '</span>';
                endif; ?>
            </a>
        </h1>
        <nav class="primary">

            <?php
            $args = array(
                'theme_location' => 'primary'
            );
            ?>

            <?php wp_nav_menu($args); ?>
        </nav>
    </div>
</header>