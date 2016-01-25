<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @author : Heli Studio
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <title><?php wp_title('|', true, 'right'); ?></title>

        <!-- Meta
        ================================================== -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <!-- Meta / End -->

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo esc_url( as_option('as_option_favicon', false, 'url') ); ?>">
        <link rel="icon" type="image/png" href="<?php echo esc_url( as_option('as_option_favicon', false, 'url') ); ?>" />
        <link rel="apple-touch-icon" href="<?php echo esc_url( as_option('touch_icon', false, 'url') ); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( as_option('touch_icon_72', false, 'url') ); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( as_option('touch_icon_144', false, 'url') ); ?>">
        <!-- Favicons / End -->

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php echo bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo TEMPLATEURL; ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- SELECT DEMO
================================================== -->
        <div id="as-style-selection" class="as-closed">
            <h3 class="as-title-panel">OTHER DEMO</h3>
            <ul class="as-list-select-demo">
                <li><a href="http://helistudio.com/heli/creative" target="_blank"><img src="http://document.helistudio.com/heli/img-demo-doc/demo-1.jpg" alt="img-demo"></a><img src="http://document.helistudio.com/heli/img-demo-doc/demo-1.jpg" class="as-large-img-demo" alt="img-demo"></li>
                <li><a href="http://helistudio.com/heli/portfolio" target="_blank"><img src="http://document.helistudio.com/heli/img-demo-doc/demo-2.jpg" alt="img-demo"></a><img src="http://document.helistudio.com/heli/img-demo-doc/demo-2.jpg" class="as-large-img-demo" alt="img-demo"></li>
                <li><a href="http://helistudio.com/heli/creative-onepage" target="_blank"><img src="http://document.helistudio.com/heli/img-demo-doc/demo-3.jpg" alt="img-demo"></a><img src="http://document.helistudio.com/heli/img-demo-doc/demo-3.jpg" class="as-large-img-demo" alt="img-demo"></li>
                <li><a href="http://helistudio.com/heli/business-onepage" target="_blank"><img src="http://document.helistudio.com/heli/img-demo-doc/demo-4.jpg" alt="img-demo"></a><img src="http://document.helistudio.com/heli/img-demo-doc/demo-4.jpg" class="as-large-img-demo" alt="img-demo"></li>
            </ul>
            <div class="as-button-demo">
                <a href="http://themeforest.net/item/heli-creative-multipurpose-wordpress-theme/11620730?ref=helistudio" class="as-button-demo">PURCHASE NOW</a>
            </div>
            <div id="as-toggle-section"><span class="dslc-icon dslc-icon-cog"></span></div>
        </div>
        <!-- Preloading / End -->

        <!-- Preloading
        ================================================== -->
        <?php
        if (as_option('as_option_page_preloading', '1'))
        {
            ?>
            <div id="as-preloading-wrapper">
                <svg id="as-preloading-icon" width="80" height="80" viewbox="0 0 80 80">
                <polygon points="0 0 0 80 80 80 80 0" class="rect" />
                </svg>
            </div>
        <?php } ?>
        <!-- Preloading / End -->

        <?php
        if (!is_page_template('page-blank.php'))
        {
            ?>

            <!-- Custom Header
            ================================================== -->
            <?php
            if (as_option('as_option_check_header', '1'))
            {
                ?>
                <?php
                $slug = as_option('as_option_custom_header', 'default');
                get_template_part('headers/header', $slug);
                ?>
            <?php } ?>
            <!-- End / Custom Header -->

            <!-- Breadcrumb
            ================================================== -->
            <?php
            if (!is_page_template('page-home.php'))
            {
                if (as_option('as_option_breadcrumb_style', '1'))
                {
                    get_template_part('template/breadcrumb', 'page');
                }
            }
            ?>   

        <?php } ?>
