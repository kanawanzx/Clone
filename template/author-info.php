<?php
/**
 * Anna the author info in single blog.
 *
 * Sets up author info.
 *
 * @package WordPress
 * @subpackage Anna
 * @since Anna 1.0
 */
?>
<div id="as-about-author">
    <div class="as-avatar-img">
        <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
    </div>
    <div class="as-author-content">
        <h3 class="as-author-name"><?php _e('Posts by', AS_DOMAIN) ?>&nbsp;<?php the_author_posts_link(); ?></h3>
        <p class="as-author-info"><?php the_author_meta('description'); ?></p>
        <p class="as-author-link"><span class="dslc-icon dslc-icon-pencil"></span>&nbsp;&nbsp;<?php _e('View all posts by&nbsp; &raquo;&nbsp; ', AS_DOMAIN) ?><?php the_author_posts_link(); ?></p>
        <p class="as-author-link">
            <span class="dslc-icon dslc-icon-star"></span>&nbsp;&nbsp;<?php _e('Author URL&nbsp; &raquo;&nbsp; ', AS_DOMAIN) ?>
            <a href="<?php the_author_meta('user_url') ?>" target="_blank"><?php the_author_meta('user_url') ?></a>
        </p>
    </div>
</div>
