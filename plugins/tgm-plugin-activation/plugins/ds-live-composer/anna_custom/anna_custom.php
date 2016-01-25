<?php
// Include modules
include DS_LIVE_COMPOSER_ABS . '/heli_custom/lc-addon-animations/lc-addon-animations.php';
//include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-tp-meta/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-title-head/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-counter/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-circle-chart/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-button/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-image/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-infobox/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-infobox-2/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-infobox-3/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-accordion/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-projects/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-staff/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-testimonials/module.php';
//include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-social/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-posts/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-pricing/module.php';
//include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-timeline/module.php';
//include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-related-posts/module.php';
//include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-woocommerce/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-tabs/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-googlemap/module.php';
include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-subscription/module.php';
//include DS_LIVE_COMPOSER_ABS . '/heli_custom/modules/heli-countdown/module.php';
function heli_load_script()
{
	wp_enqueue_style('heli-animation-css', DS_LIVE_COMPOSER_URL . 'heli_custom/lc-addon-animations/css/animations.css');
    wp_enqueue_style('heli-custom-css', DS_LIVE_COMPOSER_URL . 'heli_custom/css/heli-custom.css');
    wp_enqueue_script('heli-front-plugins-js', DS_LIVE_COMPOSER_URL . 'heli_custom/js/front-plugins.js', array('jquery'));
    wp_enqueue_script('heli-front-js', DS_LIVE_COMPOSER_URL . 'heli_custom/js/front.js', array('jquery'));
    wp_enqueue_script('heli-googlemap-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'));
}
add_action('wp_enqueue_scripts', 'heli_load_script');

// Register New Module
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_TP_Meta" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Button" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Circle_Chart_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Counter_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Image" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Info_Box" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Info_Box_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Info_Box_3" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Accordion" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Projects" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Staff" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Heading_Title_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Posts" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Pricing" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Timeline" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Related_Posts" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Testimonials_Simple" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Social" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_WooCommerce_Products" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Tabs" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Google_Map" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_SubscriptionBox" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Heli_Countdown" );'));

// Add galleries to post
global $dslc_var_post_options;
$dslc_var_post_options['dslc-gallery-post-options'] = array(
	'title'   => 'Gallery Options',
	'show_on' => 'post',
	'options' => array(
		array(
			'label' => 'Images',
			'std'   => '',
			'id'    => 'dslc_gallery_images',
			'type'  => 'files',
		),
	)
);