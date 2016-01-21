<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit http://reduxframework.com/docs/
 * */
/**
  Most of your editing will be done in this section.
  Here you can override default values, uncomment args and change their values.
  No $args are required, but they can be overridden if needed.

 * */
$args = array();

// For use with a tab example below
$tabs = array();

// BEGIN Sample Config
// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = false;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';
// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
//args['dev_mode_icon_class'] = 'el-icon-large';
// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'as_options';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = false;
// Theme Panel Main Display Name
$args['display_name']    = __('ANNA THEME OPTIONS PANEL', AS_DOMAIN);
$args['display_version'] = false;

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyANTG_0ZzMEVSNOTw5VfrDk4RfOgaL9L3s';

// Define the starting tab for the option panel.
// Default: '0';
$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
$args['admin_stylesheet'] = 'standard';

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;
// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';
// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'el-icon-large';

// Set a custom menu icon.
$args['menu_icon'] = get_template_directory_uri() . '/img/favicon.png';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Theme Options', AS_DOMAIN);

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Theme Options', AS_DOMAIN);

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'as_options';

// Show Default
$args['default_show'] = false;

// Default Mark
$args['default_mark'] = '';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';
// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';
// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';
// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;
// Set a custom page icon class (used to override the page icon next to heading)
$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';
// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
// Set the help sidebar for the options page.
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', AS_DOMAIN);
// Add content after the form.
$args['footer_text'] = "";

// Set footer/credit line.
$args['footer_credit'] = "";

// Declare sections array
$sections = array();



// Main Setting -------------------------------------------------------------------------- >
$sections[] = array(
    'title'      => __('General Setting', AS_DOMAIN),
    'header'     => __('Welcome to Heli Theme Options Framework.', AS_DOMAIN),
    'desc'       => __('Welcome to Heli Theme Options Framework.', AS_DOMAIN),
    'icon_class' => 'el-icon-large',
    'icon'       => 'el-icon-cog',
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_page_preloading',
            'type'     => 'switch',
            'title'    => __('Preloading Animation', AS_DOMAIN),
            'subtitle' => __('Enable this option to on/off Preloading Animation for web.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_option_scroll_to_top',
            'type'     => 'switch',
            'title'    => __('Back to Top Button', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off Back to Top Button.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_option_smooth_scroll',
            'type'     => 'switch',
            'title'    => __('Smooth Scrolling', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off smooth scroll.', AS_DOMAIN),
            "default"  => '0',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_option_retina_img',
            'type'     => 'switch',
            'title'    => __('Retina Ready', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off retina image.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_custom_css',
            'type'     => 'ace_editor',
            'title'    => __('CSS Code', AS_DOMAIN),
            'subtitle' => __('Paste your CSS code here.<br>( If you are not a developer, please skip this option! )', AS_DOMAIN),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'desc'     => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
            'default'  => "#demo-css-code{\nmargin: 0 auto;\n}"
        ),
    ),
);
// Logo -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-star-alt',
    'icon_class' => 'el-icon-large',
    'title'      => __('Logo & Favicon Setting', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_favicon',
            'url'      => true,
            'type'     => 'media',
            'title'    => __('Your Favicon', AS_DOMAIN),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/favicon.png'),
            'subtitle' => __('Upload a 16 x 16 pixel .png/.gif/.ico image that will represent your favicon.', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_option_custom_logo',
            'url'      => true,
            'type'     => 'media',
            'title'    => __('Logo', AS_DOMAIN),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/logo-heli.png'),
            'subtitle' => __('Upload your custom site logo.', AS_DOMAIN),
        ),
        array(
            'id'       => 'touch_icon',
            'url'      => true,
            'type'     => 'media',
            'title'    => __('Apple touch icon', AS_DOMAIN),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/apple-touch-icon.png'),
            'subtitle' => __('Your touch icon upload here.', AS_DOMAIN),
        ),
        array(
            'id'       => 'touch_icon_72',
            'url'      => true,
            'type'     => 'media',
            'title'    => __('Apple touch icon 72x72', AS_DOMAIN),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/apple-touch-icon-72x72.png'),
            'subtitle' => __('Your touch icon upload here.', AS_DOMAIN),
        ),
        array(
            'id'       => 'touch_icon_144',
            'url'      => true,
            'type'     => 'media',
            'title'    => __('Apple touch icon 114x114', AS_DOMAIN),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/apple-touch-icon-114x114.png'),
            'subtitle' => __('Your touch icon upload here.', AS_DOMAIN),
        ),
    )
);
// Logo Header -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-chevron-right',
    'icon_class' => 'el-icon-large',
    'title'      => __('Setting In Header', AS_DOMAIN),
    'submenu'    => true,
    'subsection' => true,
    'fields'     => array(
        array(
            'id'             => 'as_option_logo_width_header',
            'type'           => 'dimensions',
            'height'         => false,
            'units'          => 'px', // You can specify a unit value. Possible: px, em, %
            'units_extended' => false, // Allow users to select any type of unit
            'title'          => __('Width of Logo (px)', AS_DOMAIN),
            'subtitle'       => __('Ex:170(px)', AS_DOMAIN),
            'output'         => array(
                '#as-header-2 .as-logo-main-site img, #as-header-2 .as-logo-main-site img, #as-header-3 .as-header-inner .as-logo-wrapper .as-logo-main-site img'),
            'default'        => array(
                'width' => 150,
            )
        ),
        array(
            'id'       => 'as_option_padding_logo_header',
            'type'     => 'spacing',
            'output'   => array(
                '#as-header-sidenav .as-logo-main-site, #as-header-2 .as-logo-main-site, #as-header-3 .as-header-inner .as-logo-wrapper .as-logo-main-site'),
            'mode'     => 'padding',
            'top'      => true, // Disable the top
            'right'    => true, // Disable the right
            'bottom'   => true, // Disable the bottom
            'left'     => true, // Disable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            'title'    => __('Padding Logo Setting (px)', AS_DOMAIN),
            'subtitle' => __('Allow you to choose the padding you want.', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'padding-top'    => '0',
                'padding-right'  => '0',
                'padding-bottom' => '0',
                'padding-left'   => '0'
            )
        ),
        array(
            'id'       => 'as_option_margin_logo_header',
            'type'     => 'spacing',
            'output'   => array(
                '#as-header-sidenav .as-logo-main-site, #as-header-2 .as-logo-main-site, #as-header-3 .as-header-inner .as-logo-wrapper .as-logo-main-site'),
            'mode'     => 'margin',
            'top'      => true, // Disable the top
            'right'    => true, // Disable the right
            'bottom'   => true, // Disable the bottom
            'left'     => true, // Disable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            'title'    => __('Margin Logo Setting (px)', AS_DOMAIN),
            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'margin-top'    => '0',
                'margin-right'  => '0',
                'margin-bottom' => '0',
                'margin-left'   => '0'
            )
        ),
        array(
            'id'            => 'as_option_position_logo_header',
            'type'          => 'spacing',
            'output'        => array(
                '#as-header-sidenav .as-logo-main-site img, #as-header-2 .as-logo-main-site img, #as-header-3 .as-header-inner .as-logo-wrapper .as-logo-main-site img'),
            'mode'          => 'absolute',
            'top'           => true, // Disable the top
            'right'         => true, // Disable the right
            'bottom'        => true, // Disable the bottom
            'left'          => true, // Disable the left
            'units'         => array(
                'px',
                'em'),
            'display_units' => true,
            'title'         => __('Position Absolute Logo Setting (px)', AS_DOMAIN),
            'subtitle'      => __('Allow your users to choose the spacing or position you want.(top, right, bottom, left)', AS_DOMAIN),
            'desc'          => __('', AS_DOMAIN),
            'default'       => array(
                'top'    => 0,
                'right'  => 0,
                'bottom' => 0,
                'left'   => 0,
                'units'  => 'px',
            )
        ),
    )
);
//// Logo SideNav -------------------------------------------------------------------------- >
//$sections[] = array(
//    'icon'       => 'el-icon-chevron-right',
//    'icon_class' => 'el-icon-large',
//    'title'      => __('Setting In SideNav', AS_DOMAIN),
//    'submenu'    => true,
//    'subsection' => true,
//    'fields'     => array(
//        array(
//            'id'       => 'as_option_logo_width_sidenav',
//            'type'     => 'dimensions',
//            'height'   => false,
//            'units'    => array(
//                'em',
//                'px',
//                '%'), // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Width of Logo (px)', AS_DOMAIN),
//            'subtitle' => __('Ex:220(px)', AS_DOMAIN),
//            'output'   => array(
//                '.as-main-nav-menu .as-logo-sidenav img'),
//            'default'  => array(
//                'width' => 150,
//                'units' => 'px'
//            )
//        ),
//        array(
//            'id'       => 'as_option_padding_logo_sidenav',
//            'type'     => 'spacing',
//            'output'   => array(
//                '.as-main-nav-menu .as-logo-sidenav'),
//            'mode'     => 'padding',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Padding Logo Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the padding you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'padding-top'    => '0',
//                'padding-right'  => '0',
//                'padding-bottom' => '0',
//                'padding-left'   => '0'
//            )
//        ),
//        array(
//            'id'       => 'as_option_margin_logo_sidenav',
//            'type'     => 'spacing',
//            'output'   => array(
//                '.as-main-nav-menu .as-logo-sidenav'),
//            'mode'     => 'margin',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Margin Logo Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'margin-top'    => '0',
//                'margin-right'  => '0',
//                'margin-bottom' => '0',
//                'margin-left'   => '0'
//            )
//        ),
//        array(
//            'id'            => 'as_option_position_logo_sidenav',
//            'type'          => 'spacing',
//            'output'        => array(
//                '.as-main-nav-menu .as-logo-sidenav img'),
//            'mode'          => 'absolute',
//            'top'           => true, // Disable the top
//            'right'         => true, // Disable the right
//            'bottom'        => true, // Disable the bottom
//            'left'          => true, // Disable the left
//            'units'         => array(
//                'px',
//                'em'),
//            'display_units' => true,
//            'title'         => __('Position Absolute Logo Setting (px)', AS_DOMAIN),
//            'subtitle'      => __('Allow your users to choose the spacing or position you want.(top, right, bottom, left)', AS_DOMAIN),
//            'desc'          => __('', AS_DOMAIN),
//            'default'       => array(
//                'top'    => 0,
//                'right'  => 0,
//                'bottom' => 0,
//                'left'   => 0,
//                'units'  => 'px',
//            )
//        ),
//    )
//);
// Typography -------------------------------------------------------------------------- >
$sections[] = array(
    'title'      => __('Typography Setting', AS_DOMAIN),
    'header'     => '',
    'desc'       => '',
    'icon_class' => 'el-icon-large',
    'icon'       => 'el-icon-font',
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'             => 'as_option_body_font',
            'type'           => 'typography',
            'title'          => __('Body Font', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                'body'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your main body font.', AS_DOMAIN),
            'default'        => array(
                'color'       => '#797979',
                'font-family' => 'Open Sans',
                'font-size'   => '13px',
                'font-weight' => '400',
            )
        ),
        array(
            'id'             => 'as_option_form_font',
            'type'           => 'typography',
            'title'          => __('Form Font', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], textarea'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your form ( textform, password form, textarea...).', AS_DOMAIN),
            'default'        => array(
                'color'       => '#797979',
                'font-family' => 'Open Sans',
                'font-size'   => '14px',
                'font-weight' => '400',
            )
        ),
        array(
            'id'             => 'as_option_menu_font',
            'type'           => 'typography',
            'title'          => __('Menu Font', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '#main-nav-menu-top .sf-menu > li > a'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your main navigation menu.', AS_DOMAIN),
            'default'        => array(
                'color'       => '#2c3e50',
                'font-family' => 'Open Sans',
                'font-size'   => '13px',
                'font-weight' => '400',
            )
        ),
        array(
            'id'             => 'as_option_heading_font',
            'type'           => 'typography',
            'title'          => __('Heading Font', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => true,
            'font-size'      => false,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                'h1, h2, h3, h4, h5, h6'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for heading font (H1, H2, H3, H4, H5, H6).', AS_DOMAIN),
            'default'        => array(
                'color'       => '#6B707E',
                'font-family' => 'Open Sans',
                'font-weight' => '700',
            )
        ),
    ),
);

// Styling -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-brush',
    'icon_class' => 'el-icon-large',
    'title'      => __('Styling Color', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'          => 'as_option_main_color_1',
            'transparent' => false,
            'type'        => 'color',
            'title'       => __('Main Color', AS_DOMAIN),
            'default'     => '#337c10',
            'subtitle'    => __('Select your custom main color.', AS_DOMAIN),
        ),
        array(
            'id'          => 'as_option_link_color',
            'transparent' => false,
            'type'        => 'color',
            'title'       => __('Link Color', AS_DOMAIN),
            'default'     => '#337c10',
            'subtitle'    => __('Select your custom link color.', AS_DOMAIN),
        ),
        array(
            'id'          => 'as_option_link_color_hover',
            'transparent' => false,
            'type'        => 'color',
            'title'       => __('Link Color Hover', AS_DOMAIN),
            'default'     => '#337c10',
            'subtitle'    => __('Select your custom link color.', AS_DOMAIN),
        ),
    )
);
// Header -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-tasks',
    'icon_class' => 'el-icon-large',
    'title'      => __('Header Setting', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_check_header',
            'type'     => 'switch',
            'title'    => __('Show / Hide Header', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off header.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'       => 'as_option_custom_header',
            'type'     => 'image_select',
            'compiler' => true,
            'title'    => __('Choose Type', AS_DOMAIN),
            'subtitle' => __('Select type Header.', AS_DOMAIN),
            'options'  => array(
//                '1' => array(
//                    'alt' => 'Header 1',
//                    'img' => get_template_directory_uri() . '/img/admin-core-img/header-1.jpg'
//                ),
//                '2' => array(
//                    'alt' => 'Header 2',
//                    'img' => get_template_directory_uri() . '/img/admin-core-img/header-2.jpg'
//                ),
//                '3' => array(
//                    'alt' => 'Header 3',
//                    'img' => get_template_directory_uri() . '/img/admin-core-img/header-3.jpg'
//                ),
                '4' => array(
                    'alt' => 'Header 4',
                    'img' => get_template_directory_uri() . '/img/admin-core-img/header-4.jpg'
                )
            ),
            'default'  => '1',
            'required' => array(
                'as_option_check_header',
                "=",
                1),
        // 'desc'     => __('Note*: Option header 3, you can setting style in Options Theme > SideNav.', AS_DOMAIN),
        ),
    )
);
//// Header Option 1 -------------------------------------------------------------------------- >
//$sections[] = array(
//    'icon'       => 'el-icon-chevron-right',
//    'icon_class' => 'el-icon-large',
//    'title'      => __('Header Option 1', AS_DOMAIN),
//    'desc'       => __('Note*: This option header is not style for navigation, you can setting it in option "Appearance > Menu Theme" ( Mega menu) ', AS_DOMAIN),
//    'submenu'    => true,
//    'subsection' => true,
//    'fields'     => array(
//        array(
//            'id'       => 'as_option_check_logo_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Logo Header', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Logo Header.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_icon_shop_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Icon Shop', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Icon Shop.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_icon_search_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Icon Search', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Icon Search.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_infomation_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Header Infomation Bar', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Infomation Bar.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_list_social_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide List Social', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off List Social.', AS_DOMAIN),
//            'default'  => '1',
//            'required' => array(
//                'as_option_check_infomation_header_2',
//                "=",
//                1)
//        ),
//        array(
//            'id'       => 'as_option_check_infomation_address_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Header Infomation Address', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Infomation Address.', AS_DOMAIN),
//            'default'  => '1',
//            'required' => array(
//                'as_option_check_infomation_header_2',
//                "=",
//                1)
//        ),
//        array(
//            'id'             => 'as_option_infomation_address_content_header_2',
//            'type'           => 'editor',
//            'title'          => __('Infomation Address', AS_DOMAIN),
//            'subtitle'       => __('Enter your content Infomation Address', AS_DOMAIN),
//            'default'        => '79/69 Phu Nhuan District,<br>HCM City, Vietnam.',
//            'editor_options' => '',
//            'required'       => array(
//                'as_option_check_infomation_address_header_2',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_check_infomation_phone_header_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Header Infomation Phone & Email', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Infomation Phone & Email.', AS_DOMAIN),
//            'default'  => '1',
//            'required' => array(
//                'as_option_check_infomation_header_2',
//                "=",
//                1)
//        ),
//        array(
//            'id'             => 'as_option_infomation_phone_content_header_2',
//            'type'           => 'editor',
//            'title'          => __('Infomation Phone & Email', AS_DOMAIN),
//            'subtitle'       => __('Enter your content Infomation Phone & Email', AS_DOMAIN),
//            'default'        => '+ 84 123 456 789<br>info@helistudio.com',
//            'editor_options' => '',
//            'required'       => array(
//                'as_option_check_infomation_phone_header_2',
//                "=",
//                1),
//        ),
//    )
//);
//// Header Option 2 -------------------------------------------------------------------------- >
//$sections[] = array(
//    'icon'       => 'el-icon-chevron-right',
//    'icon_class' => 'el-icon-large',
//    'title'      => __('Header Option 2', AS_DOMAIN),
//    'desc'       => __('', AS_DOMAIN),
//    'submenu'    => true,
//    'subsection' => true,
//    'fields'     => array(
//        array(
//            'id'       => 'as_option_padding_header_3',
//            'type'     => 'spacing',
//            'output'   => array(
//                '#as-header-3'),
//            'mode'     => 'padding',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Padding Header Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the padding you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'padding-top'    => '40',
//                'padding-right'  => '0',
//                'padding-bottom' => '40',
//                'padding-left'   => '0'
//            )
//        ),
//        array(
//            'id'       => 'as_option_margin_header_3',
//            'type'     => 'spacing',
//            'output'   => array(
//                '#as-header-3'),
//            'mode'     => 'margin',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Margin Header Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'margin-top'    => '0',
//                'margin-right'  => '0',
//                'margin-bottom' => '0',
//                'margin-left'   => '0'
//            )
//        ),
//        array(
//            'id'       => 'as_option_background_header_3',
//            'type'     => 'background',
//            'output'   => array(
//                '#as-header-3'),
//            'title'    => __('Header Background', AS_DOMAIN),
//            'subtitle' => __('Header background with image, color, etc.', AS_DOMAIN),
//            'default'  => array(
//                'background-color'      => '#ffffff',
//                'background-repeat'     => 'repeat',
//                'background-attachment' => '',
//                'background-position'   => '',
//                'background-image'      => '',
//                'background-clip'       => '',
//                'background-origin'     => '',
//                'background-size'       => '',
//                'media'                 => array(),
//            ),
//        ),
//        array(
//            'id'       => 'as_option_check_logo_header_3',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Logo Header', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Logo Header.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_icon_shop_header_3',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Icon Shop', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Icon Shop.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_icon_search_header_3',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Icon Search', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Icon Search.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'             => 'as_option_menu_nav_header_3',
//            'type'           => 'typography',
//            'title'          => __('Menu Font', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => false,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => false,
//            'word-spacing'   => false,
//            'text-align'     => false,
//            'letter-spacing' => true,
//            'color'          => true,
//            'preview'        => true,
//            'output'         => array(
//                '#as-header-3 .as-primary-nav > li > a'),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your main navigation menu.', AS_DOMAIN),
//            'default'        => array(
//                'color'          => '#BABABA',
//                'font-family'    => 'Open Sans',
//                'font-size'      => '32',
//                'font-weight'    => '400',
//                'letter-spacing' => '5',
//            )
//        ),
//        array(
//            'id'             => 'as_option_sub_menu_nav_header_3',
//            'type'           => 'typography',
//            'title'          => __('Menu Font ( Sub Menu )', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => false,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => false,
//            'word-spacing'   => false,
//            'text-align'     => false,
//            'letter-spacing' => true,
//            'color'          => true,
//            'preview'        => true,
//            'output'         => array(
//                '#as-header-3 .as-primary-nav > li ul.sub-menu > li > a'),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your sub menu.', AS_DOMAIN),
//            'default'        => array(
//                'color'          => '#BABABA',
//                'font-family'    => 'Open Sans',
//                'font-size'      => '14',
//                'font-weight'    => '400',
//                'letter-spacing' => '3',
//            )
//        ),
//    )
//);
// Header Option 4 -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-chevron-right',
    'icon_class' => 'el-icon-large',
    'title'      => __('Header Option ', AS_DOMAIN),
    'desc'       => __('', AS_DOMAIN),
    'submenu'    => true,
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_check_logo_header_4',
            'type'     => 'switch',
            'title'    => __('Show / Hide Logo Header', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off Logo Header.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'       => 'as_option_padding_header_4',
            'type'     => 'spacing',
            'output'   => array(
                '#as-header-4'),
            'mode'     => 'padding',
            'top'      => true, // Disable the top
            'right'    => true, // Disable the right
            'bottom'   => true, // Disable the bottom
            'left'     => true, // Disable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            'title'    => __('Padding Header Setting (px)', AS_DOMAIN),
            'subtitle' => __('Allow you to choose the padding you want.', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'padding-top'    => '40',
                'padding-right'  => '0',
                'padding-bottom' => '40',
                'padding-left'   => '0'
            )
        ),
        array(
            'id'       => 'as_option_background_header_4',
            'type'     => 'background',
            'output'   => array(
                '#as-header-4'),
            'title'    => __('Header Background', AS_DOMAIN),
            'subtitle' => __('Header background with image, color, etc.', AS_DOMAIN),
            'default'  => array(
                'background-color'      => '#ffffff',
                'background-repeat'     => 'repeat',
                'background-attachment' => '',
                'background-position'   => '',
                'background-image'      => '',
                'background-clip'       => '',
                'background-origin'     => '',
                'background-size'       => '',
                'media'                 => array(),
            ),
        ),
        array(
            'id'             => 'as_option_menu_nav_header_4',
            'type'           => 'typography',
            'title'          => __('Menu Font', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => false,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => true,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '.as-header-4-menu-wrapper .as-menu-4 > li > a'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your main navigation menu.', AS_DOMAIN),
            'default'        => array(
                'color'          => '#BABABA',
                'font-family'    => 'Open Sans',
                'font-size'      => '32',
                'font-weight'    => '400',
                'letter-spacing' => '5',
            )
        ),
        array(
            'id'       => 'as_option_menu_hover_header_4',
            'type'     => 'link_color',
            'title'    => __('Links Color Hover', AS_DOMAIN),
            'subtitle' => __('Choose color for footer menu', AS_DOMAIN),
            'desc'     => __('', 'redux-framework-demo'),
            'output'   => array(
                '.as-header-4-menu-wrapper .as-menu-4 > li:hover > a,.as-search-and-shop.as-search-header-4 li:hover a span.dslc-icon.dslc-icon-shopping-cart, 
                .as-search-and-shop.as-search-header-4 li a span.dslc-icon-search'),
            'default'  => array(
                'regular' => '#337c10',
                'hover'   => '#337c10',
                'active'  => '#337c10',
            ),
        ),
        array(
            'id'       => 'as_option_check_icon_search_header_4',
            'type'     => 'switch',
            'title'    => __('Show / Hide Icon Search And Shop', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off Icon Search.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'             => 'as_option_icon_colorfor_header_4',
            'type'           => 'typography',
            'title'          => __('Color Icon', AS_DOMAIN),
            'compiler'       => false,
            'google'         => false,
            'font-backup'    => false,
            'font-style'     => false,
            'font-family'    => false,
            'font-weight'    => false,
            'subsets'        => false,
            'font-size'      => false,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => true,
            'preview'        => false,
            'output'         => array(
                '.as-search-and-shop.as-search-header-4 li a span.dslc-icon.dslc-icon-shopping-cart, 
                .as-search-and-shop.as-search-header-4 li a span.dslc-icon-search'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom  options for color icon.', AS_DOMAIN),
            'default'        => array(
                'color' => '#a0ce4e',
            ),
            'required' => array(
                'as_option_check_icon_search_header_4',
                "=",
                1),
        ),
    )
);
//// SideNav -------------------------------------------------------------------------- >
//$sections[] = array(
//    'icon'       => 'el-icon-indent-left',
//    'icon_class' => 'el-icon-large',
//    'title'      => __('SideNav', AS_DOMAIN),
//    'submenu'    => true,
//    'fields'     => array(
//        array(
//            'id'       => 'as_option_check_sidenav',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide SideNav', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off SideNav.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_check_list_social_sidenav',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide List Social on SideNav', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off List Social on SideNav.', AS_DOMAIN),
//            'default'  => '1',
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_position_sidenav',
//            'type'     => 'image_select',
//            'compiler' => true,
//            'title'    => __('Choose SideNav', AS_DOMAIN),
//            'subtitle' => __('Select type SideNav alignment.', AS_DOMAIN),
//            'options'  => array(
//                'left'  => array(
//                    'alt' => 'Layout With Left SideNav',
//                    'img' => get_template_directory_uri() . '/img/admin-core-img/nav-left-img.png'
//                ),
//                'right' => array(
//                    'alt' => 'Layout With Right SideNav',
//                    'img' => get_template_directory_uri() . '/img/admin-core-img/nav-right-img.png'
//                )
//            ),
//            'default'  => 'right',
//            'indent'   => true, // Indent all options below until the next 'section' option is set.
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_logo_sidenav',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Logo On SideNav', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off Logo On SideNav.', AS_DOMAIN),
//            'default'  => '1',
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_background_sidenav',
//            'type'     => 'background',
//            'output'   => array(
//                '.as-main-nav-menu'),
//            'title'    => __('SideNav Background', AS_DOMAIN),
//            'subtitle' => __('SideNav background with image, color, etc.', AS_DOMAIN),
//            'default'  => array(
//                'background-color'      => '#212121',
//                'background-repeat'     => 'repeat',
//                'background-attachment' => '',
//                'background-position'   => '',
//                'background-image'      => get_template_directory_uri() . '/img/noise.png',
//                'background-clip'       => '',
//                'background-origin'     => '',
//                'background-size'       => '',
//                'media'                 => array(),
//            ),
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_background_button_hamburger_sidenav',
//            'type'     => 'background',
//            'output'   => array(
//                '.as-icon-hamburger-menu'),
//            'title'    => __('SideNav Background Hamburger Button', AS_DOMAIN),
//            'subtitle' => __('SideNav button hamburger background with image, color, etc.', AS_DOMAIN),
//            'default'  => array(
//                'background-color'      => '#212121',
//                'background-repeat'     => 'repeat',
//                'background-attachment' => '',
//                'background-position'   => '',
//                'background-image'      => get_template_directory_uri() . '/img/noise.png',
//                'background-clip'       => '',
//                'background-origin'     => '',
//                'background-size'       => '',
//                'media'                 => array(),
//            ),
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_padding_sidenav',
//            'type'     => 'spacing',
//            'output'   => array(
//                '.as-main-nav-menu'),
//            // An array of CSS selectors to apply this font style to
//            'mode'     => 'padding',
//            // absolute, padding, margin, defaults to padding
//            //'all'      => true,
//            // Have one field that applies to all
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            //'units_extended'=> 'true',    // Allow users to select any type of unit
//            //'display_units' => 'false',   // Set to false to hide the units if the units are specified
//            'title'    => __('Padding SideNav Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow your users to choose the padding you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'padding-top'    => '80px',
//                'padding-right'  => '0',
//                'padding-bottom' => '0',
//                'padding-left'   => '60px'
//            ),
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'             => 'as_option_typography_navigation_sidenav',
//            'type'           => 'typography',
//            'title'          => __('Navigation typography Sidenav', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => true,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => true,
//            'word-spacing'   => false,
//            'letter-spacing' => true,
//            'text-transform' => true,
//            'text-align'     => false,
//            'color'          => false,
//            'preview'        => true,
//            'output'         => array(
//                '.as-menu-main li a'),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your Navigation Sidenav font.', AS_DOMAIN),
//            'default'        => array(
//                'font-family'    => 'Open Sans',
//                'font-size'      => '18',
//                'font-weight'    => '700',
//                'letter-spacing' => '2',
//                'text-transform' => 'uppercase',
//                'line-height'    => '30',
//            ),
//            'required'       => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_color_link_navigation_sidenav',
//            'type'     => 'link_color',
//            'title'    => __('Links Color Navigation Sidenav Option', 'redux-framework-demo'),
//            'subtitle' => __('Choose color for Navigation Sidenav', 'redux-framework-demo'),
//            'desc'     => __('', 'redux-framework-demo'),
//            //'regular'   => false, // Disable Regular Color
//            //'hover'     => false, // Disable Hover Color
//            //'active'    => false, // Disable Active Color
//            //'visited'   => true,  // Enable Visited Color
//            'output'   => array(
//                '.as-menu-main li a'),
//            'default'  => array(
//                'regular' => '#929194',
//                'hover'   => '#337c10',
//                'active'  => '#337c10',
//            ),
//            'required' => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//        array(
//            'id'             => 'as_option_sidenav_footer_copyright',
//            'type'           => 'editor',
//            'title'          => __('Copyright', AS_DOMAIN),
//            'subtitle'       => __('Enter your custom copyright text.', AS_DOMAIN),
//            'default'        => 'Copyright 2015 - All Rights Reserved',
//            'editor_options' => '',
//            'required'       => array(
//                'as_option_check_sidenav',
//                "=",
//                1),
//        ),
//    )
//);
// Breadcrumb -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-braille',
    'icon_class' => 'el-icon-large',
    'title'      => __('Breadcrumb', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_breadcrumb_style',
            'type'     => 'switch',
            'title'    => __('Hide / Show The Breadcrumb', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off breadcrumb.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'       => 'as_option_padding_breadcrumb',
            'type'     => 'spacing',
            'output'   => array(
                '#as-breadcrumb-wrapper'),
            'mode'     => 'padding',
            'top'      => true, // Enable the top
            'right'    => true, // Enable the right
            'bottom'   => true, // Enable the bottom
            'left'     => true, // Enable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            //'units_extended'=> 'true',    // Allow users to select any type of unit
            //'display_units' => 'false',   // Set to false to hide the units if the units are specified
            'title'    => __('Padding Breadcrumb Setting (px) ', AS_DOMAIN),
            'subtitle' => __('Allow your users to choose the spacing or padding you want.(top, right, bottom, left)', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'padding-top'    => '50px',
                'padding-right'  => '0',
                'padding-bottom' => '50px',
                'padding-left'   => '0',
            ),
            'required' => array(
                'as_option_breadcrumb_style',
                "=",
                1),
        ),
        array(
            'id'       => 'as_option_margin_breadcrumb',
            'type'     => 'spacing',
            'output'   => array(
                '#as-breadcrumb-wrapper'),
            'mode'     => 'margin',
            'top'      => true, // Enable the top
            'right'    => true, // Enable the right
            'bottom'   => true, // Enable the bottom
            'left'     => true, // Enable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            //'units_extended'=> 'true',    // Allow users to select any type of unit
            //'display_units' => 'false',   // Set to false to hide the units if the units are specified
            'title'    => __('Margin Breadcrumb Setting (px) ', AS_DOMAIN),
            'subtitle' => __('Allow your users to choose the spacing or margin you want.(top, right, bottom, left)', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'margin-top'    => '0',
                'margin-right'  => '0',
                'margin-bottom' => '50px',
                'margin-left'   => '0',
            ),
            'required' => array(
                'as_option_breadcrumb_style',
                "=",
                1),
        ),
        array(
            'id'       => 'as_option_breadcrumb_background',
            'type'     => 'background',
            'output'   => array(
                '#as-breadcrumb-wrapper'),
            'title'    => __('Background Breadcrumb Setting', AS_DOMAIN),
            'subtitle' => __('Setting background Breadcrumb with image, color, etc.', AS_DOMAIN),
            'default'  => array(
                'background-color'      => '#cccccc',
                'background-repeat'     => 'repeat',
                'background-attachment' => '',
                'background-position'   => '',
                'background-image'      => get_template_directory_uri() . '/img/noise.png',
                'background-clip'       => '',
                'background-origin'     => '',
                'background-size'       => '',
                'media'                 => array(),
            ),
            'required' => array(
                'as_option_breadcrumb_style',
                "=",
                1),
        ),
        array(
            'id'       => 'as_option_breadcrumb_parallax',
            'type'     => 'switch',
            'title'    => __('Parallax Breadcrumb Background', AS_DOMAIN),
            'subtitle' => __('Enable this option to replace the breadcrumb image with animated parallax effect.', AS_DOMAIN),
            'default'  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
            'required' => array(
                'as_option_breadcrumb_style',
                "=",
                1),
        ),
        array(
            'id'             => 'as_option_breadcrumb_title_font',
            'type'           => 'typography',
            'title'          => __('Style title of breadcrumb.', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '#as-breadcrumb-wrapper .as-page-title'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your title breadcrumb.', AS_DOMAIN),
            'default'        => array(
                'color'       => '#6B707E',
                'font-family' => 'Open Sans',
                'font-size'   => '28px',
                'font-weight' => '700',
            ),
            'required'       => array(
                'as_option_breadcrumb_style',
                "=",
                1),
        ),
        array(
            'id'             => 'as_option_breadcrumb_sub_link',
            'type'           => 'typography',
            'title'          => __('Style title of breadcrumb.', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '#as-breadcrumb-wrapper .as-breadcrumb-link li, #as-breadcrumb-wrapper .as-breadcrumb-link li a'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your title breadcrumb.', AS_DOMAIN),
            'default'        => array(
                'color'       => '#f5f5f5',
                'font-family' => 'Open Sans',
                'font-size'   => '14px',
                'font-weight' => '500',
            ),
            'required'       => array(
                'as_option_breadcrumb_style',
                "=",
                1),
        ),
    )
);

// WooCommerce -------------------------------------------------------------------------- >

if (class_exists('Woocommerce')) {

    $sections[] = array(
        'icon'       => 'el-icon-shopping-cart',
        'icon_class' => 'el-icon-large',
        'title'      => __('WooCommerce', AS_DOMAIN),
        'submenu'    => true,
        'fields'     => array(
            array(
                'id'      => 'woo_listing_column_number',
                'type'    => 'radio',
                'title'   => __('Product Listing Column No', AS_DOMAIN),
                'options' => array(
                    '1' => __('1 Column', AS_DOMAIN),
                    '2' => __('2 Columns', AS_DOMAIN),
                    '3' => __('3 Columns', AS_DOMAIN),
                    '4' => __('4 Columns', AS_DOMAIN),
                ),
                'default' => '3'
            ),
            array(
                'id'       => 'as_woo_item_per_page',
                'type'     => 'spinner',
                'title'    => __('Product Per Page', AS_DOMAIN),
                'subtitle' => __('Setting item per page.', AS_DOMAIN),
                'desc'     => __('', AS_DOMAIN),
                'default'  => '8',
                'min'      => '0',
                'step'     => '1',
                'max'      => '100',
            ),
            array(
                'id'      => 'as_woo_listing_sidebar_position',
                'type'    => 'radio',
                'title'   => __('Product Listing Sidebar Position', AS_DOMAIN),
                'options' => array(
                    'disable' => __('No Sidebar', AS_DOMAIN),
                    'left'    => __('Left', AS_DOMAIN),
                    'right'   => __('Right', AS_DOMAIN)
                ),
                'default' => 'right'
            ),
        )
    );
}

// Blog -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-edit',
    'icon_class' => 'el-icon-large',
    'title'      => __('Blog Setting', AS_DOMAIN),
    'desc'       => __('*NOTE: This is option support for Blog default of theme.', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_blog_position_sidebar',
            'type'     => 'image_select',
            'compiler' => true,
            'title'    => __('Choose Position SideBar', AS_DOMAIN),
            'subtitle' => __('Select type SideBar alignment.', AS_DOMAIN),
            'options'  => array(
                'left'      => array(
                    'alt' => 'Layout With Left SideBar',
                    'img' => get_template_directory_uri() . '/img/admin-core-img/sidebar-left.png'
                ),
                'right'     => array(
                    'alt' => 'Layout With Right SideBar',
                    'img' => get_template_directory_uri() . '/img/admin-core-img/sidebar-right.png'
                ),
                'fullwidth' => array(
                    'alt' => 'Layout None SideBar',
                    'img' => get_template_directory_uri() . '/img/admin-core-img/fullwidth.png'
                )
            ),
            'default'  => 'right',
            'indent'   => true, // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id'       => 'as_blog_width_img',
            'type'     => 'text',
            'title'    => __('Crop size of image blog (width)', AS_DOMAIN),
            'desc'     => "",
            'subtitle' => __('Set size width for img (px)', AS_DOMAIN),
            'default'  => '800',
            'class'    => 'small-text',
        ),
        array(
            'id'       => 'as_blog_height_img',
            'type'     => 'text',
            'title'    => __('Crop size of image blog (height)', AS_DOMAIN),
            'desc'     => "",
            'subtitle' => __('Set size height for img (px)', AS_DOMAIN),
            'default'  => '350',
            'class'    => 'small-text',
        ),
        array(
            'id'             => 'as_blog_btn_title_font',
            'type'           => 'typography',
            'title'          => __('Text color title blog.', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '.as-content-blog-wrapper .as-post-title a'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your title blog.', AS_DOMAIN),
            'default'        => array(
                'color'       => '#6B707E',
                'font-family' => 'Open Sans',
                'font-size'   => '28px',
                'font-weight' => '700',
            )
        ),
        array(
            'id'             => 'as_blog_btn_readmore_font',
            'type'           => 'typography',
            'title'          => __('Text color button readmore', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => false,
            'subsets'        => true,
            'font-size'      => true,
            'line-height'    => false,
            'word-spacing'   => false,
            'text-align'     => false,
            'letter-spacing' => false,
            'color'          => false,
            'preview'        => true,
            'output'         => array(
                '.as-post-btn-group a.as-btn-readmore'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your button readmore.', AS_DOMAIN),
            'default'        => array(
                'font-family' => 'Open Sans',
                'font-size'   => '14px',
                'font-weight' => '700',
            )
        ),
        array(
            'id'       => 'as_blog_post_date',
            'type'     => 'switch',
            'title'    => __('Date time post', AS_DOMAIN),
            'subtitle' => __('Toggle the blog date on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_blog_post_author',
            'type'     => 'switch',
            'title'    => __('Info author post', AS_DOMAIN),
            'subtitle' => __('Toggle the author on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_blog_post_category',
            'type'     => 'switch',
            'title'    => __('List category post', AS_DOMAIN),
            'subtitle' => __('Toggle the category on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_blog_post_comments',
            'type'     => 'switch',
            'title'    => __('Number comments post', AS_DOMAIN),
            'subtitle' => __('Toggle the author on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_blog_btn_readmore',
            'type'     => 'switch',
            'title'    => __('Read More Button', AS_DOMAIN),
            'subtitle' => __('Toggle the blog read more button on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_blog_btn_like_heart',
            'type'     => 'switch',
            'title'    => __('Like heart Button', AS_DOMAIN),
            'subtitle' => __('Toggle the blog like heart on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_blog_btn_list_share_social',
            'type'     => 'switch',
            'title'    => __('List Share Social Button', AS_DOMAIN),
            'subtitle' => __('Toggle the button share social on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
    )
);
// Project -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-star',
    'icon_class' => 'el-icon-large',
    'title'      => __('Project Setting', AS_DOMAIN),
    'desc'       => __('*NOTE: This is option support for Single Project default of theme.', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_port_post_info_client',
            'type'     => 'switch',
            'title'    => __('Hide / Show Info Name Of Client', AS_DOMAIN),
            'subtitle' => __('Toggle the client name on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_port_post_info_url',
            'type'     => 'switch',
            'title'    => __('Hide / Show URL Of Client', AS_DOMAIN),
            'subtitle' => __('Toggle the URL client on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_port_post_info_categories',
            'type'     => 'switch',
            'title'    => __('Hide / Show categories', AS_DOMAIN),
            'subtitle' => __('Toggle the categories on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_port_btn_like_heart',
            'type'     => 'switch',
            'title'    => __('Like heart Button', AS_DOMAIN),
            'subtitle' => __('Toggle the portfolio like heart on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
        array(
            'id'       => 'as_port_btn_list_share_social',
            'type'     => 'switch',
            'title'    => __('List Share Social Button', AS_DOMAIN),
            'subtitle' => __('Toggle the button share social on or off.', AS_DOMAIN),
            "default"  => '1',
            'on'       => __('On', AS_DOMAIN),
            'off'      => __('Off', AS_DOMAIN),
        ),
    ),
);
// 404 Page -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-exclamation-sign',
    'icon_class' => 'el-icon-large',
    'title'      => __('404 Page Setting', AS_DOMAIN),
    'desc'       => __('', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_error_padding',
            'type'     => 'spacing',
            'output'   => array(
                '.as-wrapper.as-wrapper-page-404'),
            'mode'     => 'padding',
            'top'      => true, // Disable the top
            'right'    => true, // Disable the right
            'bottom'   => true, // Disable the bottom
            'left'     => true, // Disable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            'title'    => __('Padding Wrapper Page 404', AS_DOMAIN),
            'subtitle' => __('Allow you to choose the padding you want.', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'padding-top'    => '50px',
                'padding-right'  => '0',
                'padding-bottom' => '100px',
                'padding-left'   => '0'
            )
        ),
        array(
            'id'       => 'as_option_error_text_headline',
            'type'     => 'text',
            'title'    => __('Text headline of Pain', AS_DOMAIN),
            'subtitle' => __('Enter your custom text.', AS_DOMAIN),
            'default'  => '404',
        ),
        array(
            'id'             => 'as_option_error_text_headline_style',
            'type'           => 'typography',
            'title'          => __('Typography For Page 404', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => false,
            'font-size'      => true,
            'line-height'    => true,
            'word-spacing'   => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'text-align'     => false,
            'color'          => true,
            'preview'        => false,
            'output'         => array(
                '.as-wrapper.as-wrapper-page-404 .headline'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your headline 404 pan.', AS_DOMAIN),
            'default'        => array(
                'font-family'    => 'Open Sans',
                'font-size'      => '105px',
                'font-weight'    => '700',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase',
                'line-height'    => '105px',
                'color'          => '#337c10',
                'units'          => 'px',
            ),
        ),
        array(
            'id'             => 'as_option_error_context_pan',
            'type'           => 'editor',
            'title'          => __('Text headline of Pain', AS_DOMAIN),
            'subtitle'       => __('Enter your custom text.', AS_DOMAIN),
            'default'        => 'Oops, the page you are<br> looking for does not exist.',
            'editor_options' => '',
        ),
        array(
            'id'             => 'as_option_error_context_pan_style',
            'type'           => 'typography',
            'title'          => __('Typography For Page 404', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => false,
            'font-size'      => true,
            'line-height'    => true,
            'word-spacing'   => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'text-align'     => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '.as-wrapper.as-wrapper-page-404 .as-context-pan'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your context pan.', AS_DOMAIN),
            'default'        => array(
                'font-family'    => 'Open Sans',
                'font-size'      => '24px',
                'font-weight'    => '700',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase',
                'line-height'    => '32px',
                'color'          => '#337c10',
                'units'          => 'px',
            ),
        ),
        array(
            'id'             => 'as_option_error_context_404',
            'type'           => 'editor',
            'title'          => __('Text content 404', AS_DOMAIN),
            'subtitle'       => __('Enter your custom text.', AS_DOMAIN),
            'default'        => 'You may want to head back to the homepage.<br>If you think something is broken, report a problem.',
            'editor_options' => '',
        ),
        array(
            'id'             => 'as_option_error_context_404_style',
            'type'           => 'typography',
            'title'          => __('Typography For content 404', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => false,
            'font-size'      => true,
            'line-height'    => true,
            'word-spacing'   => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'text-align'     => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '.as-wrapper.as-wrapper-page-404 .as-context-404'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your context 404', AS_DOMAIN),
            'default'        => array(
                'font-family'    => 'Open Sans',
                'font-size'      => '18px',
                'font-weight'    => '700',
                'letter-spacing' => '0px',
                'text-transform' => 'none',
                'line-height'    => '32px',
                'color'          => '#A0A0A0',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'as_option_error_report_url_404',
            'type'     => 'text',
            'title'    => __('URL Report.', AS_DOMAIN),
            'subtitle' => __('Enter your url Report.', AS_DOMAIN),
            'default'  => '#',
        ),
    ),
);
// Footer -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-bookmark',
    'icon_class' => 'el-icon-large',
    'title'      => __('Footer Setting', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_check_footer',
            'type'     => 'switch',
            'title'    => __('Show / Hide Footer', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off footer.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'       => 'as_option_custom_footer',
            'type'     => 'image_select',
            'compiler' => true,
            'title'    => __('Choose Type', AS_DOMAIN),
            'subtitle' => __('Select type Header.', AS_DOMAIN),
            'options'  => array(
                '1' => array(
                    'alt' => 'Footer 1',
                    'img' => get_template_directory_uri() . '/img/admin-core-img/footer-1.jpg'
                ),
//                '2' => array(
//                    'alt' => 'Footer 2',
//                    'img' => get_template_directory_uri() . '/img/admin-core-img/footer-2.jpg'
//                ),
            ),
            'default'  => '1',
            'required' => array(
                'as_option_check_footer',
                "=",
                1)
        ),
    )
);
// Footer Option 1 -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-chevron-right',
    'icon_class' => 'el-icon-large',
    'title'      => __('Footer Option 1', AS_DOMAIN),
    'desc'       => __('', AS_DOMAIN),
    'submenu'    => true,
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'as_option_background_footer_1',
            'type'     => 'background',
            'output'   => array(
                '#as-footer-1'),
            'title'    => __('Footer Background', AS_DOMAIN),
            'subtitle' => __('Footer background with image, color, etc.', AS_DOMAIN),
            'default'  => array(
                'background-color' => '#212121',
            ),
        ),
        /*
          array(
          'id'        => 'as_option_background_footer_1_parallax',
          'type'      => 'switch',
          'title'     => __('Parallax Footer Image Background', AS_DOMAIN),
          'subtitle'  => __('Enable this option to replace the footer image with animated parallax effect.', AS_DOMAIN),
          'default'   => '1',
          'on'        => __('On', AS_DOMAIN ),
          'off'       => __('Off', AS_DOMAIN ),
          ),
         */
        array(
            'id'       => 'as_option_padding_footer_1',
            'type'     => 'spacing',
            'output'   => array(
                '#as-footer-1'),
            'mode'     => 'padding',
            'top'      => true, // Disable the top
            'right'    => true, // Disable the right
            'bottom'   => true, // Disable the bottom
            'left'     => true, // Disable the left
            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
            'title'    => __('Padding Footer Bottom Setting (px)', AS_DOMAIN),
            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
            'desc'     => __('', AS_DOMAIN),
            'default'  => array(
                'padding-top'    => '60px',
                'padding-right'  => '0',
                'padding-bottom' => '30px',
                'padding-left'   => '0'
            )
        ),
        array(
            'id'       => 'as_option_check_logo_footer_1',
            'type'     => 'switch',
            'title'    => __('Show / Hide Logo Footer', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off logo footer.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'       => 'as_option_custom_logo_footer_1',
            'url'      => true,
            'type'     => 'media',
            'title'    => __('Your Logo for Footer', AS_DOMAIN),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/logo-heli.png'),
            'subtitle' => __('Upload your logo for footer.', AS_DOMAIN),
            'required' => array(
                'as_option_check_logo_footer_1',
                "=",
                1)
        ),
        array(
            'id'       => 'as_option_check_menu_footer_1',
            'type'     => 'switch',
            'title'    => __('Show / Hide Menu Footer', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off menu footer.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'             => 'as_option_typography_menu_footer_1',
            'type'           => 'typography',
            'title'          => __('Menu Typography For Footer', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => false,
            'font-size'      => true,
            'line-height'    => true,
            'word-spacing'   => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'text-align'     => false,
            'color'          => false,
            'preview'        => true,
            'output'         => array(
                '#as-footer-1 .as-menu-footer-1 li a'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your footer menu font.', AS_DOMAIN),
            'default'        => array(
                'font-family'    => 'Open Sans',
                'font-size'      => '12px',
                'font-weight'    => '700',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase',
                'line-height'    => '20px',
                'units'          => 'px',
            ),
            'required'       => array(
                'as_option_check_menu_footer_1',
                "=",
                1),
        ),
        array(
            'id'       => 'as_option_color_link_menu_footer_1',
            'type'     => 'link_color',
            'title'    => __('Links Color Footer Menu Option', AS_DOMAIN),
            'subtitle' => __('Choose color for footer menu', AS_DOMAIN),
            'desc'     => __('', 'redux-framework-demo'),
            'output'   => array(
                '#as-footer-1 .as-menu-footer-1 li a'),
            'default'  => array(
                'regular' => '#D1D1D1',
                'hover'   => '#337c10',
                'active'  => '#337c10',
            ),
            'required' => array(
                'as_option_check_menu_footer_1',
                "=",
                1),
        ),
        array(
            'id'       => 'as_option_copyright_footer_1',
            'type'     => 'text',
            'title'    => __('Copyright', AS_DOMAIN),
            'subtitle' => __('Enter your custom copyright text.', AS_DOMAIN),
            'default'  => '© Copyright 2015 by HELI - All Rights Reserved',
        ),
        array(
            'id'             => 'as_option_typography_menu_footer_1',
            'type'           => 'typography',
            'title'          => __('Typography For Copyright Footer', AS_DOMAIN),
            'compiler'       => false,
            'google'         => true,
            'font-backup'    => false,
            'font-style'     => true,
            'subsets'        => false,
            'font-size'      => true,
            'line-height'    => true,
            'word-spacing'   => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'text-align'     => false,
            'color'          => true,
            'preview'        => true,
            'output'         => array(
                '#as-footer-1 .as-copyright-footer'),
            'units'          => 'px',
            'subtitle'       => __('Select your custom font options for your footer copyright text.', AS_DOMAIN),
            'default'        => array(
                'font-family'    => 'Open Sans',
                'font-size'      => '12px',
                'font-weight'    => '700',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase',
                'line-height'    => '20px',
                'color'          => '#8b8b8b',
                'units'          => 'px',
            ),
            'required'       => array(
                'as_option_check_menu_footer_1',
                "=",
                1),
        ),
        array(
            'id'       => 'as_option_check_list_social_footer_1',
            'type'     => 'switch',
            'title'    => __('Show / Hide List Social On Footer', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off list Social.', AS_DOMAIN),
            'default'  => '1',
        ),
    )
);
//// Footer Option 2 -------------------------------------------------------------------------- >
//$sections[] = array(
//    'icon'       => 'el-icon-chevron-right',
//    'icon_class' => 'el-icon-large',
//    'title'      => __('Footer Option 2', AS_DOMAIN),
//    'desc'       => __('', AS_DOMAIN),
//    'submenu'    => true,
//    'subsection' => true,
//    'fields'     => array(
//        array(
//            'id'       => 'as_option_background_footer_2',
//            'type'     => 'background',
//            'output'   => array(
//                '#as-footer-2'),
//            'title'    => __('Footer Background', AS_DOMAIN),
//            'subtitle' => __('Footer background with image, color, etc.', AS_DOMAIN),
//            'default'  => array(
//                'background-color' => '#212121',
//            ),
//        ),
//        array(
//            'id'       => 'as_option_padding_footer_2',
//            'type'     => 'spacing',
//            'output'   => array(
//                '#as-footer-2'),
//            'mode'     => 'padding',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Padding Footer Bottom Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'padding-top'    => '60px',
//                'padding-right'  => '0',
//                'padding-bottom' => '30px',
//                'padding-left'   => '0'
//            )
//        ),
//        array(
//            'id'       => 'as_option_check_logo_footer_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Logo Footer', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off logo footer. <span style="color:red;">Note*: This option will add logo on top area first column.</span> ', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'       => 'as_option_custom_logo_footer_2',
//            'url'      => true,
//            'type'     => 'media',
//            'title'    => __('Your Logo for Footer', AS_DOMAIN),
//            'default'  => array(
//                'url' => get_template_directory_uri() . '/img/logo-heli.png'),
//            'subtitle' => __('Upload your logo for footer.', AS_DOMAIN),
//            'required' => array(
//                'as_option_check_logo_footer_2',
//                "=",
//                1)
//        ),
//        array(
//            'id'       => 'as_option_margin_logo_footer_2',
//            'type'     => 'spacing',
//            'output'   => array(
//                '#as-footer-2 .as-logo-footer'),
//            'mode'     => 'margin',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Margin Logo Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'margin-top'    => '0',
//                'margin-right'  => '0',
//                'margin-bottom' => '15px',
//                'margin-left'   => '0'
//            ),
//            'required' => array(
//                'as_option_check_logo_footer_2',
//                "=",
//                1)
//        ),
//        array(
//            'id'             => 'as_option_typography_title_menu_footer_2',
//            'type'           => 'typography',
//            'title'          => __('Menu Typography For Title Widget Footer', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => true,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => true,
//            'word-spacing'   => false,
//            'letter-spacing' => true,
//            'text-transform' => true,
//            'text-align'     => false,
//            'color'          => true,
//            'preview'        => true,
//            'output'         => array(
//                '#as-footer-2 h4.widget-title-footer'),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your footer content font.', AS_DOMAIN),
//            'default'        => array(
//                'font-family'    => 'Open Sans',
//                'font-size'      => '22px',
//                'font-weight'    => '700',
//                'letter-spacing' => '0',
//                'text-transform' => 'none',
//                'line-height'    => '24px',
//                'color'          => '#d1d1d1',
//                'units'          => 'px',
//            ),
//        ),
//        array(
//            'id'       => 'as_option_margin_typography_title_footer_2',
//            'type'     => 'spacing',
//            'output'   => array(
//                '#as-footer-2 h4.widget-title-footer'),
//            'mode'     => 'margin',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Margin Title Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'margin-top'    => '0',
//                'margin-right'  => '0',
//                'margin-bottom' => '20px',
//                'margin-left'   => '0'
//            )
//        ),
//        array(
//            'id'             => 'as_option_typography_content_menu_footer_2',
//            'type'           => 'typography',
//            'title'          => __('Menu Typography For Footer', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => true,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => true,
//            'word-spacing'   => false,
//            'letter-spacing' => true,
//            'text-transform' => true,
//            'text-align'     => false,
//            'color'          => true,
//            'preview'        => true,
//            'output'         => array(
//                '#as-footer-2, #as-footer-2 p '),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your footer content font.', AS_DOMAIN),
//            'default'        => array(
//                'font-family'    => 'Open Sans',
//                'font-size'      => '12px',
//                'font-weight'    => '400',
//                'letter-spacing' => '0',
//                'text-transform' => 'none',
//                'line-height'    => '20px',
//                'color'          => '#bdbdbd',
//                'units'          => 'px',
//            ),
//        ),
//        array(
//            'id'       => 'as_option_color_link_footer_2',
//            'type'     => 'link_color',
//            'title'    => __('Links Color Footer Menu Option', AS_DOMAIN),
//            'subtitle' => __('Choose color for footer menu', AS_DOMAIN),
//            'desc'     => __('', 'redux-framework-demo'),
//            //'regular'   => false, // Disable Regular Color
//            //'hover'     => false, // Disable Hover Color
//            //'active'    => false, // Disable Active Color
//            //'visited'   => true,  // Enable Visited Color
//            'output'   => array(
//                '#as-footer-2 a'),
//            'default'  => array(
//                'regular' => '#D1D1D1',
//                'hover'   => '#337c10',
//                'active'  => '#337c10',
//            ),
//        ),
//        array(
//            'id'       => 'as_option_background_copyright_footer_2',
//            'type'     => 'background',
//            'output'   => array(
//                '#footer-bottom-2'),
//            'title'    => __('Footer Bottom Background', AS_DOMAIN),
//            'subtitle' => __('Footer bottom background with image, color, etc.', AS_DOMAIN),
//            'default'  => array(
//                'background-color' => '#18242F',
//            ),
//        ),
//        array(
//            'id'       => 'as_option_border_copyright_footer_2',
//            'type'     => 'border',
//            'title'    => __('Footer Bottom Border Top Option', 'redux-framework-demo'),
//            'subtitle' => __('Only color validation can be done on this field type', AS_DOMAIN),
//            'output'   => array(
//                '#footer-bottom-2'),
//            'top'      => true, // Disable the top
//            'right'    => false, // Disable the right
//            'bottom'   => false, // Disable the bottom
//            'left'     => false, // Disable the left
//            'default'  => array(
//                'border-color' => '#293B4C',
//                'border-style' => 'solid',
//                'border-top'   => '1px',
//            )
//        ),
//        array(
//            'id'       => 'as_option_padding_copyright_footer_2',
//            'type'     => 'spacing',
//            'output'   => array(
//                '#footer-bottom-2'),
//            'mode'     => 'padding',
//            'top'      => true, // Disable the top
//            'right'    => true, // Disable the right
//            'bottom'   => true, // Disable the bottom
//            'left'     => true, // Disable the left
//            'units'    => 'px', // You can specify a unit value. Possible: px, em, %
//            'title'    => __('Padding Footer Bottom Setting (px)', AS_DOMAIN),
//            'subtitle' => __('Allow you to choose the margin you want.', AS_DOMAIN),
//            'desc'     => __('', AS_DOMAIN),
//            'default'  => array(
//                'padding-top'    => '20px',
//                'padding-right'  => '0',
//                'padding-bottom' => '20px',
//                'padding-left'   => '0'
//            )
//        ),
//        array(
//            'id'       => 'as_option_check_menu_copyright_footer_2',
//            'type'     => 'switch',
//            'title'    => __('Show / Hide Menu Footer', AS_DOMAIN),
//            'subtitle' => __('Enable this option to make on/off menu footer.', AS_DOMAIN),
//            'default'  => '1',
//        ),
//        array(
//            'id'             => 'as_option_typography_menu_copyright_footer_2',
//            'type'           => 'typography',
//            'title'          => __('Menu Typography For Menu Footer Bottom', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => true,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => true,
//            'word-spacing'   => false,
//            'letter-spacing' => true,
//            'text-transform' => true,
//            'text-align'     => false,
//            'color'          => false,
//            'preview'        => true,
//            'output'         => array(
//                '.as-menu-footer-2 li a'),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your footer bottom menu font.', AS_DOMAIN),
//            'default'        => array(
//                'font-family'    => 'Open Sans',
//                'font-size'      => '12px',
//                'font-weight'    => '700',
//                'letter-spacing' => '2px',
//                'text-transform' => 'uppercase',
//                'line-height'    => '20px',
//                'units'          => 'px',
//            ),
//            'required'       => array(
//                'as_option_check_menu_copyright_footer_2',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_color_link_menu_copyright_footer_2',
//            'type'     => 'link_color',
//            'title'    => __('Links Color Footer Menu Option', AS_DOMAIN),
//            'subtitle' => __('Choose color for footer menu', AS_DOMAIN),
//            'desc'     => __('', 'redux-framework-demo'),
//            //'regular'   => false, // Disable Regular Color
//            //'hover'     => false, // Disable Hover Color
//            //'active'    => false, // Disable Active Color
//            //'visited'   => true,  // Enable Visited Color
//            'output'   => array(
//                '.as-menu-footer-2 li a'),
//            'default'  => array(
//                'regular' => '#797979',
//                'hover'   => '#337c10',
//                'active'  => '#337c10',
//            ),
//            'required' => array(
//                'as_option_check_menu_copyright_footer_2',
//                "=",
//                1),
//        ),
//        array(
//            'id'       => 'as_option_copyright_footer_2',
//            'type'     => 'text',
//            'title'    => __('Copyright', AS_DOMAIN),
//            'subtitle' => __('Enter your custom copyright text.', AS_DOMAIN),
//            'default'  => '© Copyright 2015 by HELI - All Rights Reserved',
//        ),
//        array(
//            'id'             => 'as_option_typography_menu_footer_2',
//            'type'           => 'typography',
//            'title'          => __('Typography For Copyright Footer', AS_DOMAIN),
//            'compiler'       => false,
//            'google'         => true,
//            'font-backup'    => false,
//            'font-style'     => true,
//            'subsets'        => false,
//            'font-size'      => true,
//            'line-height'    => true,
//            'word-spacing'   => false,
//            'letter-spacing' => true,
//            'text-transform' => true,
//            'text-align'     => false,
//            'color'          => true,
//            'preview'        => true,
//            'output'         => array(
//                '#footer-bottom-2 .as-copyright-footer'),
//            'units'          => 'px',
//            'subtitle'       => __('Select your custom font options for your footer copyright text.', AS_DOMAIN),
//            'default'        => array(
//                'font-family'    => 'Open Sans',
//                'font-size'      => '12px',
//                'font-weight'    => '700',
//                'letter-spacing' => '2px',
//                'text-transform' => 'uppercase',
//                'line-height'    => '20px',
//                'color'          => '#8b8b8b',
//                'units'          => 'px',
//            ),
//            'required'       => array(
//                'as_option_check_menu_footer_1',
//                "=",
//                1),
//        ),
//    )
//);
// Social -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-twitter',
    'icon_class' => 'el-icon-large',
    'title'      => __('Social Setting', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'as_social_check_taget',
            'type'     => 'switch',
            'title'    => __('Check New Tab In Social Link', AS_DOMAIN),
            'subtitle' => __('Enable this option to make on/off New tab.', AS_DOMAIN),
            'default'  => '1',
        ),
        array(
            'id'       => 'as_twitter_url',
            'type'     => 'text',
            'title'    => __('Twitter', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Twitter.', AS_DOMAIN),
            'default'  => '#',
        ),
        array(
            'id'       => 'as_facebook_url',
            'type'     => 'text',
            'title'    => __('Facebook', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Facebook.', AS_DOMAIN),
            'default'  => '#',
        ),
        array(
            'id'       => 'as_google_url',
            'type'     => 'text',
            'title'    => __('Google', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Google Plus.', AS_DOMAIN),
            'default'  => '#',
        ),
        array(
            'id'       => 'as_dribbble_url',
            'type'     => 'text',
            'title'    => __('Dribbble', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Dribbble.', AS_DOMAIN),
            'default'  => '#',
        ),
        array(
            'id'       => 'as_pinterest_url',
            'type'     => 'text',
            'title'    => __('Pinterest', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Pinterest.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_youtube_url',
            'type'     => 'text',
            'title'    => __('Youtube', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Youtube.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_vimeo_url',
            'type'     => 'text',
            'title'    => __('Vimeo', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Vimeo.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_behance_url',
            'type'     => 'text',
            'title'    => __('Behance', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Behance.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_flickr_url',
            'type'     => 'text',
            'title'    => __('Flickr', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Flickr.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_tumblr_url',
            'type'     => 'text',
            'title'    => __('Tumblr', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Tumblr.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_linkedin_url',
            'type'     => 'text',
            'title'    => __('Linkedin', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Linkedin.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_instagram_url',
            'type'     => 'text',
            'title'    => __('Instagram', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Instagram.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_github_url',
            'type'     => 'text',
            'title'    => __('Github', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Github.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_dropbox_url',
            'type'     => 'text',
            'title'    => __('Dropbox', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Dropbox.', AS_DOMAIN),
            'default'  => '',
        ),
        array(
            'id'       => 'as_foursquare_url',
            'type'     => 'text',
            'title'    => __('Foursquare', AS_DOMAIN),
            'subtitle' => __('Enter a url for your Foursquare.', AS_DOMAIN),
            'default'  => '',
        ),
    )
);


// SEO -------------------------------------------------------------------------- >
$sections[] = array(
    'icon'       => 'el-icon-search',
    'icon_class' => 'el-icon-large',
    'title'      => __('SEO', AS_DOMAIN),
    'submenu'    => true,
    'fields'     => array(
        array(
            'id'       => 'meta_description',
            'type'     => 'textarea',
            'default'  => 'Heli, studio, theme, responsive, premium theme',
            'title'    => __('Add your meta description', AS_DOMAIN),
            'subtitle' => __('Ex: Heli, studio, theme ... ', AS_DOMAIN),
        ),
        array(
            'id'       => 'meta_keyword',
            'type'     => 'textarea',
            'default'  => 'Heli, studio, theme, responsive, premium theme',
            'title'    => __('Add your meta keyword', AS_DOMAIN),
            'subtitle' => __('Ex: Heli, studio, theme... ', AS_DOMAIN),
        ),
        array(
            'id'       => 'meta_author',
            'type'     => 'textarea',
            'default'  => 'Heli, studio, theme, responsive, premium theme',
            'title'    => __('Add your meta author', AS_DOMAIN),
            'subtitle' => __('Ex: Heli, studio, theme ... ', AS_DOMAIN),
        ),
    )
);

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// Function used to retrieve theme option values
if (!function_exists('as_option')) {

    function as_option($id, $fallback = false, $param = false) {
        global $as_options;
        if ($fallback == false)
            $fallback = '';
        $output   = ( isset($as_options[$id]) && $as_options[$id] !== '' ) ? $as_options[$id] : $fallback;
        if (!empty($as_options[$id]) && $param) {
            $output = $as_options[$id][$param];
        }
        return $output;
    }

}
