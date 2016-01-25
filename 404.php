<?php
/**
 * The 404 page
 *
 * @package Heli
 * @since Heli Theme 1.0
 */
get_header();
?>
<!-- 404 PAGE
======================================================================== -->
<div class="as-page-wrapper">
    <div class="as-content-wrapper">
        <div class="as-wrapper clearfix as-wrapper-page-404">
            <div class="dslc-col dslc-6-col">
                <div class="as-wrapper-pane-404 as-active">
                    <div class="nob"></div>
                    <div class="post left"></div>
                    <div class="post right"></div>
                    <div class="pane">
                        <div class="headline">
                            <?php echo esc_html( as_option('as_option_error_text_headline') ); ?>
                        </div>
                        <div class="as-context-pan">
                            <?php echo balanceTags( as_option('as_option_error_context_pan'), true ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dslc-col dslc-6-col dslc-last-col">
                <div class="as-context-404">
                    <p>
                        <?php echo balanceTags( as_option('as_option_error_context_404'), true ); ?>
                    </p>
                </div>
                <div class="as-context-404-button">
                    <a href="<?php get_home_url(); ?>" class="as-btn-404-back-home"><?php _e('BACK TO HOME', AS_DOMAIN); ?></a>
                    <a href="<?php echo esc_url( as_option('as_option_error_report_url_404') ); ?>" class="as-btn-404-back-home as-btn-report"><?php _e('REPORT A PROBLEM', AS_DOMAIN); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 PAGE / End -->
<?php get_footer(); ?>
