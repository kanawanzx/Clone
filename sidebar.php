<?php
/**
 * Heli the sidebar default for index.
 *
 * Sets up the sidebar.
 *
 * @package WordPress
 * @subpackage Heli
 * @since Heli 1.0
 */
if ( class_exists('Woocommerce')) {
	global $woocommerce; 
	if (!is_woocommerce()) {
	?>
	
	<div class="as-sidebar-content">       
		<?php
		    if(is_active_sidebar( 'as_main_sidebar' ))
		        dynamic_sidebar( 'as_main_sidebar' );
		?>
	</div>

<?php 
	} 
}else { ?>
	<div class="as-sidebar-content">       
		<?php
		    if(is_active_sidebar( 'as_main_sidebar' ))
		        dynamic_sidebar( 'as_main_sidebar' );
		?>
	</div>
<?php } ?>
