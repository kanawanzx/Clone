<?php
/**
 * Heli the template single project content.
 *
 * Sets up the single project content.
 *
 * @package WordPress
 * @subpackage Heli
 * @since Heli 1.0
 */
?>
<div class="as-content-blog-wrapper as-single-project">
    <h2 class="as-post-title">
        <a href="<?php echo get_permalink(); ?>"><?php the_title() ?></a>
    </h2>
    <div class="as-post-info">
        <?php if (as_option('as_blog_post_date', '1')) : ?>
            <span class="as-date">
                <span class="dslc-icon dslc-icon-time"></span>&nbsp; <?php the_time('F j, Y'); ?>
            </span>
        <?php endif ?>
        <?php if (as_option('as_blog_post_comments', '1')) : ?>
            <span class="as-get-comment">
                <?php as_get_number_comment(); ?>
            </span>
        <?php endif ?>
    </div><!-- Info / End -->

    <div class="clearfix"></div>
    <div class="as-excerpt">
        <?php the_content(); ?>
    </div><!-- Excerpt / End -->
    <div class="clearfix"></div>

    <!-- Meta info project -->
    <?php
    $the_project_url        = '';
    $the_project_url_text   = get_post_meta(get_the_ID(), 'dslc_project_url_text', true);
    $the_project_url_client = get_post_meta(get_the_ID(), 'dslc_project_name', true);
    if (get_post_meta(get_the_ID(), 'dslc_project_url', true))
    {
        $the_project_url = get_post_meta(get_the_ID(), 'dslc_project_url', true);
    }
    else
    {
        $the_project_url = '#';
    }
    ?>
    <div class="as-info-project-meta">
        <?php if (as_option('as_port_post_info_client', '1')) : ?>
            <div class="as-info-client">
                <span class="dslc-icon dslc-icon-user"></span>&nbsp;&nbsp;<span class="as-info-sum"><?php _e('Client:', AS_DOMAIN) ?></span>&nbsp; <span><?php echo esc_attr( $the_project_url_client ); ?></span>
            </div>
        <?php endif ?>

        <?php if (as_option('as_port_post_info_url', '1')) : ?>
            <div class="as-info-url">
                <span class="dslc-icon dslc-icon-link"></span>&nbsp;&nbsp;<span class="as-info-sum"><?php _e('URL Project:', AS_DOMAIN) ?></span>&nbsp; <a href="<?php echo esc_url( $the_project_url ); ?>" target="_blank"><?php echo esc_attr( $the_project_url_text ); ?></a>
            </div>
        <?php endif ?>

        <?php if (as_option('as_port_post_info_categories', '1')) : ?>
            <div class="as-info-category">
                <span class="dslc-icon dslc-icon-tags"></span>&nbsp;&nbsp;<span class="as-info-sum"><?php _e('Category:', AS_DOMAIN) ?></span>&nbsp; <?php the_terms($post->ID, 'dslc_projects_cats', '', ', '); ?>
            </div>
        <?php endif ?>
    </div>
    <!-- Meta info project / End -->

    <div class="clearfix"></div>
    <div class="as-post-btn-group">
        <a href="<?php echo esc_url( $the_project_url ); ?>" class="as-btn-readmore as-btn-single-project" target="_blank">
            <?php _e('Visit Project', AS_DOMAIN) ?>
        </a>
        <div class="as-post-social-group">
            <?php if (as_option('as_port_btn_like_heart', '1')) : ?>
                <div class="as-btn-heart-blog">
                    <a href="#" class="as-post-like <?php echo as_is_like_post($post->ID); ?>" data-id="<?php echo esc_attr( $post->ID ); ?>">
                        <span class="dslc-icon dslc-icon-heart"></span>
                        <span class="number-like-heart">
                            <?php
                            echo get_post_meta($post->ID, 'as_like_count', true) ? get_post_meta($post->ID, 'as_like_count', true) : 0;
                            ?>
                        </span>
                    </a>
                </div>
            <?php endif ?>
            <?php if (as_option('as_port_btn_list_share_social', '1')) : ?>
                <div class="as-share-social-list">
                    <?php
                    get_template_part('template/share', 'social-blog');
                    ?>
                    <div class="as-share-btn">
                        <span class="dslc-icon dslc-icon-share-alt"></span>
                        <?php _e('Share', AS_DOMAIN); ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div class="clearfix"></div>
    </div><!-- Bottom / End -->
</div>
