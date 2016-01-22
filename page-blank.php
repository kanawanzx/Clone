<?php
/**
 * Template name: Page Blank
 *
 * @package Anna
 * @since Anna Theme 1.0
 */
get_header();
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Content
        ======================================================================== -->
        <div class="as-page-wrapper">
            <div class="as-content-wrapper">
                <div class="as-wrapper clearfix">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <!-- Content / End -->
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
