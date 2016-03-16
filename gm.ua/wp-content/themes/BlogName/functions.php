<?php

function my_newblog_theme_load_resources()
{
    wp_enqueue_style('newblog_style', get_template_directory_uri() . '/stylesheets/style.css');
}

add_action('wp_enqueue_scripts', 'my_newblog_theme_load_resources');

//__________________________________________________________________
//Theme setup
function my_theme_setup()
{

    //Navigation Menus

    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));

    // Add feature image support
    add_theme_support('post-thumbnails');
}

/*___________________________________*/
/*sidebar*/
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Site Sidebar',
        'id' => 'main-sidebar',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
register_sidebar(array(
    'name' => 'Contact Sidebar',
    'id' => 'contact-sidebar',
    'before_widget' => '<div class="contact-item">',
    'after_widget' => '</div>',
    'before_title' => '<div class="contact-title">',
    'after_title' => '</div>',
));

add_action('after_setup_theme', 'my_theme_setup');
//__________________________________________________________________
//enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets()
{
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_our_required_stylesheets');

add_action('wp_enqueue_scripts', 'blm_init_method');
/*__________________________________________________________________*/

function blm_init_method()
{

    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'blm_init_method');
/*____________________________________________________________________________________*/
//Add social icons
function my_customizer_social_media_array()
{
    $social_sites = array('twitter', 'facebook', 'pinterest', 'flickr', 'google-plus', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');
    return $social_sites;
}

add_action('customize_register', 'my_add_social_sites_customizer');

function my_add_social_sites_customizer($wp_customize)
{

    $wp_customize->add_section('my_social_settings', array(
        'title' => __('Social Media Icons', 'text-domain'),
        'priority' => 35,
    ));

    $social_sites = my_customizer_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'text-domain'),
            'section' => 'my_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

function my_social_media_icons()
{
    $social_sites = my_customizer_social_media_array();
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }
    if (!empty($active_sites)) {
        echo "<ul class='social-icons'>";
        foreach ($active_sites as $active_site) {
            $class = 'fa fa-' . $active_site;
            if ($active_site == 'email') {
                ?>
                <li>
                    <a class="email" target="_blank"
                       href="mailto:<?php echo antispambot(is_email(get_theme_mod($active_site))); ?>">
                        <span class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></span>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="<?php echo $active_site; ?>" target="_blank"
                       href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="<?php echo esc_attr($class); ?>"
                              title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></span>
                    </a>
                </li>
                <?php
            }
        }
        echo "</ul>";
    }
}

/*____________________________________________________________________________________*/
/**
 * Adds a section, the parameters and controls (control) on the theme settings page
 */
add_action('customize_register', function ($customizer) {
    $customizer->add_section(
        'edits-copyright',
        array(
            'title' => 'Copyright',
            'description' => 'Edit',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'copyright_name',
        array('default' => 'DesignerFirst.com')
    );
    $customizer->add_control(
        'copyright_name',
        array(
            'label' => 'Site name',
            'section' => 'edits-copyright',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'copyright_year',
        array('default' => '2016')
    );
    $customizer->add_control(
        'copyright_year',
        array(
            'label' => 'Year',
            'section' => 'edits-copyright',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'hide_copyright',
        array(
            'type' => 'checkbox',
            'label' => 'Hide text copyright',
            'section' => 'edit-copyright',
        )
    );
});
/*__________________________________________________*/
/*create slider post type*/
add_action('init', 'create_slider_post_type');

function create_slider_post_type()
{
    register_post_type('slider',
        array(
            'labels' => array(
                'name' => __('Slider'),
                'singular_name' => __('Slider')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'slider'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}

/*__________________________________________________*/
/*create slider taxonomy*/
add_action('init', 'create_my_slider_tax');

function create_my_slider_tax()
{
    register_taxonomy(
        'slider_type',
        'slider',
        array(
            'label' => __('Slider type'),
            'rewrite' => array('slug' => 'slider_type'),
            'hierarchical' => true,
        )
    );
}

/*________________________________________________*/
/*create gallery post type */
add_action('init', 'create_gallery_post_type');

function create_gallery_post_type()
{
    register_post_type('gallery',
        array(
            'labels' => array(
                'name' => __('Gallery'),
                'singular_name' => __('Gallery')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'gallery'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}

/*__________________________________________________*/
/*create gallery taxonomy*/
add_action('init', 'create_my_gallery_tax');

function create_my_gallery_tax()
{
    register_taxonomy(
        'gallery_type',
        'gallery',
        array(
            'label' => __('Gallery type'),
            'rewrite' => array('slug' => 'gallery_type'),
            'hierarchical' => true,
        )
    );
}

/*__________________________________________________________*/
/*create logo in theme customize*/
/*_____________________________________*/
function gootheme_theme_customizer($wp_customize)
{

    $wp_customize->add_section('gootheme_logo_section', array(
        'title' => __('Site logo', 'gootheme'),
        'priority' => 30,
        'description' => 'Upload a logo for this theme',
    ));

    $wp_customize->add_setting('gootheme_logo', array(
        'default' => get_bloginfo('template_directory') . '/images/default-logo1.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gootheme_logo', array(

        'label' => __('Current logo', 'gootheme'),
        'section' => 'gootheme_logo_section',
        'settings' => 'gootheme_logo',
    )));

}

add_action('customize_register', 'gootheme_theme_customizer');

/*custom float sidebar*/
function sidebar_customizer($wp_customize)
{
    $wp_customize->add_section(
        'example_section_one',
        array(
            'title' => 'Sidebar settings',
            'description' => 'This is a layout for sidebar',
            'priority' => 35,
        )
    );
    $wp_customize->add_setting(
        'sidebar_placement',
        array(
            'default' => 'right',
        )
    );

    $wp_customize->add_control(
        'sidebar_placement',
        array(
            'type' => 'radio',
            'label' => 'Sidebar layout',
            'section' => 'example_section_one',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
            ),
        )
    );
}

add_action('customize_register', 'sidebar_customizer');


/*__________________*/
/*color picker*/
function colorpicker_customize_register($wp_customize)
{
    $wp_customize->add_setting('custom_color', array(
        'default' => '#fdd500',
        'transport' => 'refresh',
    ));

    $wp_customize->add_section('standart_color', array(
        'title' => __('Customize site colors', 'text-domain'),
        'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_color_control', array(
        'label' => __('Link Color', 'text-domain'),
        'section' => 'standart_color',
        'settings' => 'custom_color'
    )));
}

add_action('customize_register', 'colorpicker_customize_register');


// Output customize css
function customize_css()
{ ?>
    <style type="text/css">
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('custom_color'); ?>;
        }
    </style>
<?php }

add_action('wp_head', 'customize_css');
/*_________________________*/


