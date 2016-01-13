<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package Anna
 * @since Anna Theme 1.0
 */
get_header(); 

$sidebar_position = as_option('as_woo_listing_sidebar_position');
if( $sidebar_position == 'disable' ){
	$content_size_class = 'dslc-12-col dslc-last-col';
}elseif( $sidebar_position == 'left' ){
	$content_size_class = 'dslc-9-col dslc-last-col';
}else{
	$content_size_class = 'dslc-9-col';
}

?>
    <!-- Content
    ======================================================================== -->
    <div class="as-page-wrapper">
        <div class="as-content-wrapper">
            <div class="as-wrapper clearfix as-woo-page-wrapper">
	            
	            <?php if($sidebar_position == 'left'): ?>
	            	<div class="dslc-col dslc-3-col">
		                <div class="as-sidebar-content">
		                	<?php get_sidebar( 'shop' ); ?>
		                </div>
					</div><!-- Sidebar / End -->
	            <?php endif; ?>
	            
                <div class="dslc-col <?php echo esc_attr( $content_size_class ); ?>">
                    <?php woocommerce_content(); ?>
                </div>
                
                <?php if($sidebar_position == 'right'): ?>
	            	<div class="dslc-col dslc-3-col dslc-last-col">
		                <div class="as-sidebar-content">
		                	<?php get_sidebar( 'shop' ); ?>
		                </div>
					</div><!-- Sidebar / End -->
	            <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Content / End -->
<?php
get_footer();
