<?php
/* ----------------------------------------------------------------------------------- */
/* Remove Woo Default Styles  */
/* ----------------------------------------------------------------------------------- */
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );
	return $enqueue_styles;
}add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );

/* ----------------------------------------------------------------------------------- */
/* Load Our Woo Styles   */
/* ----------------------------------------------------------------------------------- */
function as_woo_enqueue_scripts(){
	wp_enqueue_style('as-woocommerce',get_template_directory_uri().'/css/woocommerce.css');
}add_action( 'wp_enqueue_scripts', 'as_woo_enqueue_scripts' );

/* ----------------------------------------------------------------------------------- */
/* Product Listing: Disable Page Title  */
/* ----------------------------------------------------------------------------------- */
function as_override_page_title() {
	return false;
}add_filter('woocommerce_show_page_title', 'as_override_page_title');

/* ----------------------------------------------------------------------------------- */
/* Remove woocommerce breadcrumb   */
/* ----------------------------------------------------------------------------------- */
function jk_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}add_action( 'init', 'jk_remove_wc_breadcrumbs' );

/* ----------------------------------------------------------------------------------- */
/* Product Listing: Column Size   */
/* ----------------------------------------------------------------------------------- */
add_filter( 'loop_shop_columns', create_function( '$cols', 'return '.as_option('woo_listing_column_number').';' ), 20 );

/* ----------------------------------------------------------------------------------- */
/* Product Listing: Column Classes   */
/* ----------------------------------------------------------------------------------- */
function as_woo_columns_body_class($classes) {
	if ( is_woocommerce() ) {
		$classes[] = 'columns-'.as_option('woo_listing_column_number');
	}
	return $classes;
}add_filter('body_class', 'as_woo_columns_body_class');
/* ----------------------------------------------------------------------------------- */
/* Product Listing: Item per page   */
/* ----------------------------------------------------------------------------------- */
add_filter( 'loop_shop_per_page', create_function( '$limit', 'return '.as_option('as_woo_item_per_page').';' ), 20 );
