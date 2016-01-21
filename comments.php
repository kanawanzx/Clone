<?php
/**
 * Heli the comment of post.
 *
 * Sets up the comment.
 *
 * @package WordPress
 * @subpackage Heli
 * @since Heli 1.0
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die(__('Please do not load this page directly. Thanks!', AS_DOMAIN));
if (post_password_required())
{
    ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', AS_DOMAIN); ?></p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<?php if (comments_open()) : ?>
    <div id="as-comment-wrapper">
        <h3><?php comments_number(__('No Comments', AS_DOMAIN), __('1 Comment', AS_DOMAIN), _n('% comment', '% comments', get_comments_number(), AS_DOMAIN)); ?> <a class="as-leave-cmt" href="#respond"><?php _e('Leave a comment', AS_DOMAIN) ?> &nbsp;<span class="dslc-icon dslc-icon-chevron-down"></span></a></h3>
        <?php if (have_comments()) : ?>
            <ul id="comments">
                <?php
                wp_list_comments(
                        array(
                            'login_text' => 'Log in to Reply',
                            'reply_text' => 'Reply',
                            'callback'   => 'as_function_comments_better'
                        )
                );
                ?>
            </ul>
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
                <nav id="comment-nav-above">
                    <h6 class="nav-previous"><?php previous_comments_link(__('&lt; Older Comments', AS_DOMAIN)); ?></h6>
                    <h6 class="nav-next"><?php next_comments_link(__('Newer Comments &gt;', AS_DOMAIN)); ?></h6>
                </nav>
            <?php endif; // check for comment navigation ?>
        <?php endif; ?>
        <?php
    else :
        // comments are closed 
        ?>
    <?php endif; ?>
    <?php if (comments_open()) : ?>
        <div class="as-reply-form-comment">
            <?php

            function my_fields($fields)
            {
                $fields['author'] = '<div class="as-input-comment as-name-label">
                    <input type="text" aria-required="true" tabindex="1" size="22" placeholder="' . __('Your name (Required)', AS_DOMAIN) . '" id="author" name="author">
                </div>';
                $fields['email']  = '<div class="as-input-comment as-email-label">
                    <input type="text" aria-required="true" tabindex="2" size="22" placeholder="' . __('Email (Required)', AS_DOMAIN) . '" id="email" name="email">
                </div>';
                $fields['url']    = '<div class="as-input-comment as-url-website-label" style="margin-right:0 !important;">
                    <input type="text" tabindex="3" size="22" placeholder="' . __('Website', AS_DOMAIN) . '" id="url" name="url">
                </div>';
                return $fields;
            }

            add_filter('comment_form_default_fields', 'my_fields');
            comment_form(
                    array(
                        'comment_field' => '<div class="clear" style="height:5px;"></div><div class="clearfix comment-textarea">
                    <textarea style="padding:14px 2%; width:96%;" tabindex="4" cols="15" rows="10" id="comment" name="comment" placeholder="' . __('Message (Required)', AS_DOMAIN) . '"></textarea>
                </div>'
            ));
            ?>
        </div>
    </div>
<?php endif; ?>
