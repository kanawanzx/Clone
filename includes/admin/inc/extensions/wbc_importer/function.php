<?php

/* * **********************************************************************
 * Extended Example:
 * Way to set menu, import revolution slider, and set home page.
 * *********************************************************************** */

$demo_active_import  = array(
    'directory'     => 'current demo data folder name',
    'content_file'  => 'content.xml',
    'image'         => 'screen-image.png',
    'theme_options' => 'theme-options.json',
    'widgets'       => 'widgets.json',
    'imported'      => 'none imported'
);
$demo_directory_path = get_template_directory() . '/demo-data';
if (!function_exists('wbc_extended_example')) {

    function wbc_extended_example($demo_active_import, $demo_directory_path) {

        reset($demo_active_import);
        $current_key = key($demo_active_import);

        /************************************************************************
         * Import slider(s) for the current demo being imported
         * *********************************************************************** */

        if (class_exists('RevSlider')) {

            //If it's demo3 or demo5
            $wbc_sliders_array = array(
                'demo1' => 'portfolio.zip', //Set slider zip name
                'demo5' => 'anotherslider.zip', //Set slider zip name
            );

            if (isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && array_key_exists($demo_active_import[$current_key]['directory'], $wbc_sliders_array)) {
                $wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

                if (file_exists($demo_directory_path . $wbc_slider_import)) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost(true, true, $demo_directory_path . $wbc_slider_import);
                }
            }
        }

        /************************************************************************
         * Setting Menus
         * *********************************************************************** */

        // If it's demo1 - demo6
        $wbc_menu_array = array( 'Business-onepage', 'Portfolio', 'Creative', 'Creative-onepage');

        if (isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && in_array($demo_active_import[$current_key]['directory'], $wbc_menu_array)) {
            $top_menu = get_term_by('name', 'Temp Menu', 'nav_menu');

            if (isset($top_menu->term_id)) {
                set_theme_mod('nav_menu_locations', array(
                    'theme-primary' => $top_menu->term_id,
                    'theme-footer'  => $top_menu->term_id
                        )
                );
            }
        }

        /* * **********************************************************************
         * Set HomePage
         * *********************************************************************** */

        // array of demos/homepages to check/select from
        $wbc_home_pages = array(
	        'Business-onepage' 	=> 'Home',
	        'Portfolio' 	=> 'Home',
            'Creative' 			=> 'Home',
            'Creative-onepage' 		=> 'Home',
        );

        if (isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && array_key_exists($demo_active_import[$current_key]['directory'], $wbc_home_pages)) {
            $page = get_page_by_title($wbc_home_pages[$demo_active_import[$current_key]['directory']]);
            if (isset($page->ID)) {
                update_option('page_on_front', $page->ID);
                update_option('show_on_front', 'page');
            }
        }
    }

    // Uncomment the below
    add_action('wbc_importer_after_content_import', 'wbc_extended_example', 10, 2);
}