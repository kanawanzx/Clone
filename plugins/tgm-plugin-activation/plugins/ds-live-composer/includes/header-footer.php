<?php

/**
 * Table of contents
 *
 * - dslc_hf_init ( Register custom post type and add options )
 * - dslc_hf_col_title ( Listing - Column title )
 * - dslc_hf_col_content ( Listing - Column content )
 * - dslc_hf_unique_default ( Make sure there's only one default per header and footer )
 * - dslc_hf_options ( Register options for posts/pages to choose which header/footer to use )
 * - dslc_hf_get_ID ( Get the header and footer ID of a specific post/page )
 */

/**
 * Register custom post type and add options
 *
 * @since 1.0.7
 */

function dslc_hf_init() {

	if ( ! defined( 'DS_LIVE_COMPOSER_HF' ) || ! DS_LIVE_COMPOSER_HF ) return;

	$capability = 'publish_posts';

	register_post_type( 'dslc_hf', array(
		'menu_icon' => 'dashicons-image-flip-vertical',
		'labels' => array(
			'name' => __( 'Header/Footer', 'dslc_string' ),
			'singular_name' => __( 'Add Header/Footer', 'dslc_string' ),
			'add_new' => __( 'Add Header/Footer', 'dslc_string' ),
			'add_new_item' => __( 'Add Header/Footer', 'dslc_string' ),
			'edit' => __( 'Edit', 'dslc_string' ),
			'edit_item' => __( 'Edit Header/Footer', 'dslc_string' ),
			'new_item' => __( 'New Header/Footer', 'dslc_string' ),
			'view' => __( 'View Header/Footer', 'dslc_string' ),
			'view_item' => __( 'View Header/Footer', 'dslc_string' ),
			'search_items' => __( 'Search Header/Footer', 'dslc_string' ),
			'not_found' => __( 'No Header/Footer found', 'dslc_string' ),
			'not_found_in_trash' => __( 'No Header/Footer found in Trash', 'dslc_string' ),
			'parent' => __( 'Parent Header/Footer', 'dslc_string' ),
		),
		'public' => true,
		'supports' => array( 'title', 'custom-fields', 'author', 'thumbnail'  ),
		'capabilities' => array(
			'publish_posts' => $capability,
			'edit_posts' => $capability,
			'edit_others_posts' => $capability,
			'delete_posts' => $capability,
			'delete_others_posts' => $capability,
			'read_private_posts' => $capability,
			'edit_post' => $capability,
			'delete_post' => $capability,
			'read_post' => $capability
		),
	));
	
	/**
	 * Options
	 */

	global $dslc_var_post_options;
	$dslc_var_post_options['dslc-hf-opts'] = array(
		'title' => 'Options',
		'show_on' => 'dslc_hf',
		'options' => array(
			array(
				'label' => __( 'For', 'dslc_string' ),
				'descr' => __( 'Choose what is this for, header or footer.', 'dslc_string' ),
				'std' => 'header',
				'id' => 'dslc_hf_for',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => 'Header',
						'value' => 'header'
					),
					array(
						'label' => 'Footer',
						'value' => 'footer'
					),
				)
			),
			array(
				'label' => __( 'Type', 'dslc_string' ),
				'std' => 'regular',
				'descr' => __( '<strong>Default</strong> will be used as the default for all the posts and pages. <strong>Regular</strong> is an additional type that you can set to specific posts/pages.', 'dslc_string' ),
				'id' => 'dslc_hf_type',
				'type' => 'radio',
				'choices' => array(
					array(
						'label' => 'Regular',
						'value' => 'regular'
					),
					array(
						'label' => 'Default',
						'value' => 'default'
					),
				)
			),
			array(
				'label' => __( 'Position', 'dslc_string' ),
				'std' => 'relative',
				'descr' => __( '<strong>Relative</strong> is normal positioning. <strong>Fixed</strong> will make the header/footer scroll with the page. <strong>Absolute</strong> will make the regular page content go behind the header/footer.', 'dslc_string' ),
				'id' => 'dslc_hf_position',
				'type' => 'radio',
				'choices' => array(
					array(
						'label' => 'Relative',
						'value' => 'relative'
					),
					array(
						'label' => 'Fixed',
						'value' => 'fixed'
					),
					array(
						'label' => 'Absolute',
						'value' => 'absolute'
					),
				)
			),
		)
	);

} add_action( 'init', 'dslc_hf_init' );

/**
 * Listing - Column Title
 *
 * @since 1.0.7
 */

function dslc_hf_col_title($defaults) {

	if ( ! defined( 'DS_LIVE_COMPOSER_HF' ) || ! DS_LIVE_COMPOSER_HF ) return;

	unset( $defaults['date'] );
	unset( $defaults['author'] );
	$defaults['dslc_hf_col_cpt'] = 'For';
	$defaults['dslc_hf_col_default'] = 'Type';
	return $defaults;

} add_filter( 'manage_dslc_hf_posts_columns', 'dslc_hf_col_title', 5);

/**
 * Listing - Column Content
 *
 * @since 1.0.7
 */

function dslc_hf_col_content($column_name, $post_ID) {

	if ( ! defined( 'DS_LIVE_COMPOSER_HF' ) || ! DS_LIVE_COMPOSER_HF ) return;
	
	if ( $column_name == 'dslc_hf_col_cpt' ) {
		echo get_post_meta( $post_ID, 'dslc_hf_for', true );
	}	

	if ( $column_name == 'dslc_hf_col_default' ) {
		if ( get_post_meta( $post_ID, 'dslc_hf_type', true ) == 'default' )
			echo '<strong>Default</strong>';
	}

} add_action( 'manage_dslc_hf_posts_custom_column', 'dslc_hf_col_content', 10, 2);

/**
 * Make sure there's only one default per header and footer
 *
 * @since 1.0.7
 */

function dslc_hf_unique_default( $post_id ) {

	if ( ! defined( 'DS_LIVE_COMPOSER_HF' ) || ! DS_LIVE_COMPOSER_HF ) return;

	// If no post type ( not really a save action ) stop execution
	if ( ! isset( $_POST['post_type'] ) ) return;

	// If not a header/footer stop excution
	if ( $_POST['post_type'] !== 'dslc_hf' ) return;

	// If template type not supplied stop execution
	if ( ! isset( $_REQUEST['dslc_hf_type'] ) ) return;

	// If template not default stop execution
	if ( $_REQUEST['dslc_hf_type'] !== 'default' ) return;

	// Get header/footer that are default
	$args = array(
		'post_type' => 'dslc_hf',
		'post_status' => 'any',
		'posts_per_page' => -1,
		'meta_query' => array(
			array (
				'key' => 'dslc_hf_for',
				'value' => $_POST['dslc_hf_for'],
				'compare' => '=',
			),
			array (
				'key' => 'dslc_hf_type',
				'value' => 'default',
				'compare' => '=',
			),
		),
	);
	$templates = get_posts( $args );

	// Set those old defaults to regular tempaltes
	if ( $templates ) {
		foreach ( $templates as $template ) {
			update_post_meta( $template->ID, 'dslc_hf_type' , 'regular' );
		}
	}

	// Reset query
	wp_reset_query();

} add_action( 'save_post', 'dslc_hf_unique_default' );

/**
 * Register options for posts/pages to choose which header/footer to use
 *
 * @since 1.0.7
 */

function dslc_hf_options() {

	if ( ! defined( 'DS_LIVE_COMPOSER_HF' ) || ! DS_LIVE_COMPOSER_HF ) return;

	$headers_array = array();
	$headers_array[] = array(
		'label' => 'Default',
		'value' => 'default'
	);
	$headers_array[] = array(
		'label' => 'Disabled',
		'value' => '_disabled_'
	);
	$footers_array = array();
	$footers_array[] = array(
		'label' => 'Default',
		'value' => 'default'
	);
	$footers_array[] = array(
		'label' => 'Disabled',
		'value' => '_disabled_'
	);
	global $dslc_var_post_options;

	// Get header/footer
	$args = array(
		'post_type' => 'dslc_hf',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'order' => 'DESC'
	);
	$templates = get_posts( $args );

	if ( $templates ) {
		
		foreach ( $templates as $template ) {
			$template_for = get_post_meta( $template->ID, 'dslc_hf_for' , true );
			if ( $template_for == 'header' ) {
				$headers_array[] = array(
					'label' => $template->post_title,
					'value' => $template->ID
				);
			} elseif ( $template_for == 'footer' ) {
				$footers_array[] = array(
					'label' => $template->post_title,
					'value' => $template->ID
				);
			}
		}

		$dslc_var_post_options['dslc-hf-options'] = array(
			'title' => __( 'Header/Footer', 'dslc_string' ),
			'show_on' => array( 'page', 'dslc_templates' ),
			'context' => 'side',
			'options' => array(
				array(
					'label' => __( 'Header', 'dslc_string' ),
					'std' => '',
					'id' => 'dslc_header',
					'type' => 'select',
					'choices' => $headers_array
				),
				array(
					'label' => __( 'Footer', 'dslc_string' ),
					'std' => '',
					'id' => 'dslc_footer',
					'type' => 'select',
					'choices' => $footers_array
				),
			)
		);

	}

} add_action( 'init', 'dslc_hf_options' );

/**
 * Get the header and footer ID of a specific post/page
 *
 * @since 1.0.7
 */

function dslc_hf_get_ID( $post_ID ) {

	if ( ! defined( 'DS_LIVE_COMPOSER_HF' ) || ! DS_LIVE_COMPOSER_HF ) return array( 'header' => false, 'footer' => false );

	// Get header/footer template
	$header_tpl = get_post_meta( $post_ID, 'dslc_header', true );
	$footer_tpl = get_post_meta( $post_ID, 'dslc_footer', true );

	// If no header template set, make it "default"
	if ( ! $header_tpl ) {
		$header_tpl = 'default';
	}

	// If no footer template set make it "default"
	if ( ! $footer_tpl ) {
		$footer_tpl = 'default';
	}

	// Default header template supplied, find it and return the ID
	if ( $header_tpl == 'default' ) {

		// Query for default template
		$args = array(
			'post_type' => 'dslc_hf',
			'post_status' => 'publish',
			'posts_per_page' => 1,
			'meta_query' => array(
				array (
					'key' => 'dslc_hf_for',
					'value' => 'header',
					'compare' => '=',
				),
				array (
					'key' => 'dslc_hf_type',
					'value' => 'default',
					'compare' => '=',
				),
			),
			'order' => 'DESC'
		);
		$tpls = get_posts( $args );

		// If default template found set the ID if not make it false
		if ( $tpls ) 
			$header_tpl_ID = $tpls[0]->ID;
		else
			$header_tpl_ID = false;

	// Specific template supplied, return the ID
	} elseif ( $header_tpl && $header_tpl != '_disabled_' ) {

		$header_tpl_ID = $header_tpl;

	} elseif ( $header_tpl && $header_tpl == '_disabled_' ) {

		$header_tpl_ID = false;

	}

	// Default footer template supplied, find it and return the ID
	if ( $footer_tpl == 'default' ) {

		// Query for default template
		$args = array(
			'post_type' => 'dslc_hf',
			'post_status' => 'publish',
			'posts_per_page' => 1,
			'meta_query' => array(
				array (
					'key' => 'dslc_hf_for',
					'value' => 'footer',
					'compare' => '=',
				),
				array (
					'key' => 'dslc_hf_type',
					'value' => 'default',
					'compare' => '=',
				),
			),
			'order' => 'DESC'
		);
		$tpls = get_posts( $args );

		// If default template found set the ID if not make it false
		if ( $tpls ) 
			$footer_tpl_ID = $tpls[0]->ID;
		else
			$footer_tpl_ID = false;

	// Specific template supplied, return the ID
	} elseif ( $footer_tpl && $footer_tpl != '_disabled_' ) {

		$footer_tpl_ID = $footer_tpl;

	} elseif ( $footer_tpl && $footer_tpl == '_disabled_' ) {

		$footer_tpl_ID = false;

	}	

	// Return the template ID
	return array( 'header' => $header_tpl_ID, 'footer' => $footer_tpl_ID );

}

