<?php
/**
 * Anna the format content post for index.
 *
 * Sets up the content.
 *
 * @package WordPress
 * @subpackage Anna
 * @since Anna 1.0
 */
//global $meta_boxes;
?>
<!-- Video -->
<div class="as-featured-img as-featured-video flex-video">
    <?php echo wp_oembed_get(rwmb_meta('as_oembed_link')); ?>
</div>
<!-- Video / End -->
