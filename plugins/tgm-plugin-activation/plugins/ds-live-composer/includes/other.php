<?php

/**
 * Table of contents
 *
 * - dslc_yoast_seo_content_filter ( Include LC content in Yoast SEO filter )
 */


/**
 * Include LC content in Yoast SEO filter
 *
 * @since 1.1.6
 */

function dslc_yoast_seo_content_filter( $post_content, $post ) {

	// If there's LC content append it to the post content var
	if ( get_post_meta( $post->ID, 'dslc_content_for_search', true ) ) {
		$post_content .= ' ' . get_post_meta( $post->ID, 'dslc_content_for_search', true );
	}

	// Return the post content var
	return $post_content;

} add_filter( 'wpseo_pre_analysis_post_content', 'dslc_yoast_seo_content_filter', 10, 2 );

