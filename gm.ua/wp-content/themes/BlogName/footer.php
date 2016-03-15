<footer class="site-footer">
    <div class="wrapper">
            <?php my_social_media_icons(); ?>
        <div class="copyright">
            <?php
            if (get_theme_mod('hide_copyright') == '') {
                echo __('&copy; Copyright ', 'text_domain');
                echo get_theme_mod('copyright_year' . '') . ' ';?>
                <a class="site-link" href="<?php the_permalink(); ?>"><?php echo get_theme_mod('copyright_name', '') . ' ';?></a>
            <?php }
            ?>
        </div>
    </div>
    </div>
</footer>
<script type="text/javascript" src="<?php bloginfo( 'template_url' );?>/js/jquery.flexslider.js" ></script>
<script type="text/javascript">
    // Can also be used with $(document).ready()
    jQuery(window).load(function() {
        jQuery('.flexslider').flexslider({
            animation: "slide"
        });
    });
</script>
<?php wp_footer(); ?>

</body>
</html>