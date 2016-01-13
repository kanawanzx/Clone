<?php
/**
 * Anna the single page.
 *
 * Set up the single page.
 *
 * @package WordPress
 * @subpackage Anna
 * @since Anna 1.0
 */
get_header();
global $wp_query;
?>
<!-- Content
======================================================================== -->
<?php
    $full_img = '';
    $full_col = '';
    $last_col = '';
    if ( as_option('as_blog_position_sidebar') == "left" ){
	    $last_col = ' dslc-last-col';
	}
    if ( as_option('as_blog_position_sidebar') == "fullwidth" ){
	    $full_col = ' dslc-12-col';
	    $full_img = ' as-full-img-post';
    }else{
	    $full_col = ' dslc-8-col';
    }
?>
<div class="as-page-wrapper">
    <div class="as-content-wrapper">
        <div id="as-page-blog-classic" class="as-wrapper clearfix">
	        <?php if ( as_option('as_blog_position_sidebar') == "left") { ?>
	        	<div class="dslc-col dslc-4-col">
		        	<?php get_sidebar(); ?>
	        	</div><!-- Sidebar / End -->
	        <?php } ?>
        	<div class="dslc-col <?php echo esc_attr( $full_col ); ?> <?php echo esc_attr( $last_col ); ?> <?php echo esc_attr( $full_img ); ?>">
        		<?php
        			if(have_posts()):
        				while(have_posts()): the_post();
                            $format = get_post_format();
                ?>
                <div <?php post_class('as-post-item'); ?>>
                	<?php get_template_part( 'template/content', $format ); ?>
                	<?php 
	                	if( $format != 'quote' ){ 
                	 		get_template_part( 'template/blog', 'single' ); 
                	 	}
                	?>
                </div>	
                <div class="clearfix"></div>	
                <?php wp_link_pages(); ?> 
				<?php
        				endwhile;
        			endif;
        		?>
		        <?php wp_reset_postdata(); ?>
		        <?php get_template_part( 'template/author', 'info' ); ?>
		        <?php comments_template(); ?>
        	</div><!-- Post Loop / End -->
        	<?php if ( as_option('as_blog_position_sidebar') == "right") { ?>
	        	<div class="dslc-col dslc-4-col dslc-last-col">
		        	<?php get_sidebar(); ?>
	        	</div><!-- Sidebar / End -->
	        <?php } ?>
        </div><!-- Wrapper / End -->
    </div>
</div>
<!-- Content / End -->
<?php get_footer( ); ?>
