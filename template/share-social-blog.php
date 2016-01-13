<?php
/**
 * Anna the list social share for post.
 *
 * Sets up the share social.
 *
 * @package WordPress
 * @subpackage Anna
 * @since Anna 1.0
 */
?>
<ul class="as-list-icon-share-btn">
    <li><a class="as-post-share-social-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=660');
            return false;" target="_blank"><span class="dslc-icon dslc-icon-facebook"></span></a></li>
    <li><a class="as-post-share-social-twitter" href="http://twitter.com/share?url=<?php echo get_permalink(); ?>&amp;lang=en&amp;text=Check%20out%20this%20awesome%20project:&amp;" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=620');
            return false;" data-count="none" data-via=" "><span class="dslc-icon dslc-icon-twitter"></span></a></li>
    <li><a class="as-post-share-social-google" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');
            return false;"><span class="dslc-icon dslc-icon-google-plus"></span></a></li>
</ul>
