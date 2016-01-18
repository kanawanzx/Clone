<?php
/**
 * Template Name: Search Page
 *
 * @package Heli
 * @since Heli Theme 1.0
 */
global $wp_query, $wp_rewrite;
get_header();
?>
<!-- Content
======================================================================== -->
<?php
$full_col = '';
$last_col = '';
if (as_option('as_blog_position_sidebar') == "left") {
    $last_col = ' dslc-last-col';
}
if (as_option('as_blog_position_sidebar') == "fullwidth") {
    $full_col = ' dslc-12-col';
}
else {
    $full_col = ' dslc-8-col';
}
?>
<div class="as-page-wrapper">
    <div class="as-content-wrapper">
        <div id="as-page-blog-classic" class="as-wrapper clearfix">
            <?php
            if (as_option('as_blog_position_sidebar') == "left") {
                ?>
                <div class="dslc-col dslc-4-col">
                    <?php get_sidebar(); ?>
                </div><!-- Sidebar / End -->
            <?php } ?>
            <div class="dslc-col <?php echo esc_attr($full_col); ?> <?php echo esc_attr($last_col); ?>">
                <?php //query_posts(array('meta_key' => get_search_query(), 'post_type' => 'post')); ?>
                <?php
                if (have_posts()):
                    while (have_posts()): the_post();
                        $format = get_post_format();
                        ?>
                        <div <?php post_class('as-post-item'); ?>>
                            <?php get_template_part('template/content', $format); ?>
                            <?php
                            if ($format != 'quote') {
                                get_template_part('template/blog', 'detail');
                            }
                            ?>
                        </div>	
                        <div class="clearfix"></div>	
                        <?php
                    endwhile;
                else:
                    ?>
                    <div class="search-error">
                        <p style="font-size:30px;"><?php esc_html_e('Sorry there are no posts to display, oh man!', 'alenastudio') ?></p>
                    </div>
                <?php endif; ?>
                <!-- Pagination -->
                <div class="as-pagination-wrapper">
                    <?php echo as_get_pagination(); ?>
                </div>
                <!-- Pagination / End -->
                <?php wp_reset_postdata(); ?>
            </div><!-- Post Loop / End -->
            <?php
            if (as_option('as_blog_position_sidebar') == "right") {
                ?>
                <div class="dslc-col dslc-4-col dslc-last-col">
                    <?php get_sidebar(); ?>
                </div><!-- Sidebar / End -->
            <?php } ?>
        </div><!-- Wrapper / End -->
    </div>
</div>
<!-- Content / End -->
<?php
get_footer();
