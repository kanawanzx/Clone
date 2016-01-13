<?php

/**
 * Notification
 */

function dslc_sc_notification( $atts, $content ) {

	/* Attributes */
	extract( shortcode_atts( array(
		'color' => 'default',
	), $atts));

	return '<div class="dslc-notification dslc-' . $color . '">' . $content . '<span class="dslc-notification-close"><span class="dslc-icon dslc-icon-remove-sign"></span></span></div>';

} add_shortcode( 'dslc_notification', 'dslc_sc_notification' );

/**
 * Output custom field value
 */

function dslc_sc_get_custom_field( $atts, $content ) {

	extract( shortcode_atts( array(
		'id' => false,
		'post_id' => false,
	), $atts));

	if ( ! $id )
		return 'Custom field ID not supplied ( "id" parameter ).';

	if ( ! $post_id && in_the_loop() )
		$post_id = get_the_ID();

	if ( ! $post_id )
		$post_id = $_POST['dslc_post_id'];

	if ( get_post_meta( $post_id, $id, true ) ) {
		return do_shortcode( get_post_meta( $post_id, $id, true ) );
	}

} add_shortcode( 'dslc_custom_field', 'dslc_sc_get_custom_field' );

/**
 * Site URL
 */

function dslc_sc_site_url( $atts, $content ) {

	return site_url();

} add_shortcode( 'dslc_site_url', 'dslc_sc_site_url' );