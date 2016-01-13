<?php
$prefix = 'as_';

global $meta_boxes;

$meta_boxes = array();

/*========================
=     MEDIA SETTINGS     =
========================*/
$meta_boxes[] = array(
	'id' => 'media',
	'title' => 'Media Settings',
	'pages' => array( 'post','dslc_projects'),
	'context' => 'normal',
	'priority' => 'high',

	'fields' => array(
		array(
			'type' => 'heading',
			'name' => __( 'oEmbed', AS_DOMAIN ),
			'id'   => 'as_link_oembed',
		),
		array(
			'name'  => __( 'Add your link video & click "Preview" button for check.', AS_DOMAIN ),
			'id'    => "{$prefix}oembed_link",
			'desc'  => __( 'Insert your media link. Ex: https://www.youtube.com/watch?v=tZuj_beuMc4 <br>
			<a href="https://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">Click here</a> for supported websites. ', AS_DOMAIN ),
			'type'  => 'oembed'
		),
		array(
			'type' => 'heading',
			'name' => __( 'Post format link', AS_DOMAIN ),
			'id'   => 'h_oembed',
		),
		array(
			'name'  => __( 'Add your url link.', AS_DOMAIN ),
			'id'    => "{$prefix}url_link",
			'desc'  => __( 'Insert your href url link. Ex: https://www.youtube.com/watch?v=tZuj_beuMc4', AS_DOMAIN ),
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Add text for link.', AS_DOMAIN ),
			'id'    => "{$prefix}text_link",
			'desc'  => __( 'Insert your text for url link. Ex: Click here ! ', AS_DOMAIN ),
			'type'  => 'text'
		),
	)

);
/******************************************/


/*==============================
=     META BOX REGISTERING     =
==============================*/
function as_register_meta_boxes(){
	global $meta_boxes, $is_activated;

	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {

			if ( isset( $meta_box['only_on'] ) AND ! rw_maybe_include( $meta_box['only_on'], $meta_box['id'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}add_action( 'admin_init', 'as_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions, $metabox_id ) {

	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = intval( $_GET['post'] );
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = intval( $_POST['post_ID'] );
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
				break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
				break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
				break;
			case 'category': //post must be saved or published first
				$categories = get_the_category( $post->ID );
				$catslugs = array();
				foreach ( $categories as $category )
				{
					array_push( $catslugs, $category->slug );
				}
				if ( array_intersect( $catslugs, $v ) )
				{
					return true;
				}
				break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) )
				{
					return true;
				}
				break;
			case 'is_activated':
				$active_list = get_post_meta( $post_id, AS_DOMAIN.'custom_page_metaboxes' );
				if ( $post_id !== false AND is_array($active_list) AND is_int(array_search($metabox_id, $active_list)) ) {
					return true;
				}
				break;
		}
	}

	// If no condition matched
	return false;
}


function rwmb_css_overwrite(){ ?>
	<style>
		.rwmb-field {
			/*border-bottom: 1px solid #eeeeee;*/
			padding-bottom: 10px;
		}
		.rwmb-field:last-child {
			border-bottom: 0;
			padding-bottom: 0;
		}
		.rwmb-input label {
			margin-right: 5px;
		}
	</style>
<?php
}add_action( 'admin_head', 'rwmb_css_overwrite' );
