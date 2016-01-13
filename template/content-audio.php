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
?>
<!-- Audio -->
<div class="as-featured-img">
    <?php
    global $post;
    $pattern = get_shortcode_regex();
    preg_match('/' . $pattern . '/s', $post->post_content, $matches);
    if (is_array($matches) && isset($matches[2]) && $matches[2] == 'audio')
    {
        $shortcode = $matches[0];
        echo do_shortcode($shortcode);
    }
    elseif (get_post_meta($post->ID, 'as_audio_link', true))
    {
        echo do_shortcode('[audio ' . get_post_meta($post->ID, 'as_audio_link', true) . ']');
    }
    ?>
</div>
<!-- Audio / End -->
