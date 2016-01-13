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
?>
<div class="as-page-wrapper">
    <div class="as-content-wrapper">
        <div id="as-page-blog-classic" class="as-wrapper clearfix">
        	<div class="dslc-col dslc-8-col">
        		<?php
        			if(have_posts()):
        				while(have_posts()): the_post();
                            $format = get_post_format();
                ?>
                <div <?php post_class('as-post-item'); ?>>
                	<?php get_template_part( 'template/content', $format ); ?>
                </div>	
				<?php
        				endwhile;
        			endif;
        		?>
		        <?php wp_reset_postdata(); ?>
		        
        	</div><!-- Post Loop / End -->
        	<div class="dslc-col dslc-4-col dslc-last-col">
	        	<?php
        			if(have_posts()) : while(have_posts()) : the_post();
                ?>
                <div <?php post_class('as-post-item'); ?>>
                	<?php 
	                	if( $format != 'quote' ){ 
                	 		get_template_part( 'template/project', 'info' ); 
                	 	}
                	?>
                </div>	
				<?php
        				endwhile;
        			endif;
        		?>
		        <?php wp_reset_postdata(); ?>	
        	</div>
        	<div class="dslc-col dslc-12-col dslc-last-col" style="margin-top: 50px;">
	        	<?php get_template_part( 'template/author', 'info' ); ?>
	        	<?php comments_template(); ?>
        	</div>
        </div><!-- Wrapper / End -->
    </div>
</div>
<!-- Content / End -->
<?php get_footer( ); ?>
