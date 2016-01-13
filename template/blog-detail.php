<?php
/**
 * Anna the content.
 *
 * Sets up the content.
 *
 * @package WordPress
 * @subpackage Anna
 * @since Anna 1.0
 */
?>
<div class="as-content-blog-wrapper">
    <h2 class="as-post-title">
        <a href="<?php echo get_permalink(); ?>"><?php the_title() ?></a>
    </h2>
    <div class="as-post-info">
        <?php if (as_option('as_blog_post_date', '1')) : ?>
            <span class="as-date">
                <span class="dslc-icon dslc-icon-time"></span>&nbsp; <?php the_time('F j, Y'); ?>
            </span>
        <?php endif ?>
        <?php if (as_option('as_blog_post_author', '1')) : ?>
            <span class="as-author">
                <span class="dslc-icon dslc-icon-user"></span>&nbsp; <?php
                _e('by ', AS_DOMAIN);
                the_author();
                ?>
            </span>
        <?php endif ?>
        <?php if (as_option('as_blog_post_category', '1')) : ?>
            <span class="as-category">
                <span class="dslc-icon dslc-icon-tags"></span>&nbsp; <?php
                _e('in ', AS_DOMAIN);
                the_category(' - ');
                ?>
            </span>
        <?php endif ?>
        <?php if (as_option('as_blog_post_comments', '1')) : ?>
            <span class="as-get-comment">
                <?php as_get_number_comment(); ?>
            </span>
        <?php endif ?>
    </div><!-- Info / End -->
    <div class="as-excerpt">
        <?php
        if (get_post_type($post->ID) != 'page') {
            the_excerpt();
        }
        ?>
    </div><!-- Excerpt / End -->
    <div class="clearfix"></div>
    <div class="as-post-btn-group">
        <?php if (as_option('as_blog_btn_readmore', '1')) : ?>
            <a href="<?php echo get_permalink(); ?>" class="as-btn-readmore">
                <?php _e('learn more', AS_DOMAIN) ?>
            </a>
        <?php endif ?>
        <div class="as-post-social-group">
            <?php if (as_option('as_blog_btn_like_heart', '1')) : ?>
                <div class="as-btn-heart-blog">
                    <a href="#" class="as-post-like <?php echo as_is_like_post($post->ID); ?>" data-id="<?php echo esc_attr($post->ID); ?>">
                        <span class="dslc-icon dslc-icon-heart"></span>
                        <span class="number-like-heart">
                            <?php
                            echo get_post_meta($post->ID, 'as_like_count', true) ? get_post_meta($post->ID, 'as_like_count', true) : 0;
                            ?>
                        </span>
                    </a>
                </div>
            <?php endif ?>
            <?php if (as_option('as_blog_btn_list_share_social', '1')) : ?>
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
    </div><!-- Bottom / End -->
</div>
