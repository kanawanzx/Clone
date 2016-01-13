<?php
/*-----------------------------------------------------------------------------------*/
/* Check post is like or not
/*-----------------------------------------------------------------------------------*/ 
function as_is_like_post($id){
    if(isset($_COOKIE['as_like_'.$id]) && $_COOKIE['as_like_'.$id] == 1)
        return 'active';
}
/*-----------------------------------------------------------------------------------*/
/* Get next or previous post by id
/*-----------------------------------------------------------------------------------*/ 
function get_next_previous_port_id( $post_id, $next_or_prev ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;

    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $previous_post = $next_or_prev == "prev" ? get_previous_post() : get_next_post();

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $previous_post ){
        $port = get_posts(array(
            'post_type'      => 'dslc_projects',
            'order'          => $next_or_prev == "prev" ? 'DESC' : 'ASC',
            'posts_per_page' => 1,
            ));
        return $port[0]->ID;
    }

    return $previous_post->ID;
}
function as_is_youtube($video_url)
{
    if (strpos($video_url, "youtube.com") || strpos($video_url, "youtu.be")) return 1; else return 0;
}
function as_is_vimeo($video_url)
{
    if (strpos($video_url, "vimeo.com")) return 1; else return 0;
}
function as_is_swf($video_url)
{
    if (strpos($video_url, ".swf")) return 1; else return 0;
}
function as_is_mov($video_url)
{
    if (strpos($video_url, ".mov")) return 1; else return 0;
}

function as_get_youtube_id($url)
{
    preg_match('#http://w?w?w?.?youtube.com/watch\?v=([A-Za-z0-9\-_]+)#s', $url, $matches);
    if ($matches[1] == "")
    {
        preg_match('#http://w?w?w?.?youtu.be/([A-Za-z0-9\-_]+)#s', $url, $matches);
    }
    return $matches[1];
}
function as_get_vimeo_id($url)
{
    preg_match('#https?://w?w?w?.?vimeo.com/([A-Za-z0-9\-_]+)#s', $url, $matches);
    return $matches[1];
}
function as_is_active_lc(){
    return isset($_GET['dslc']) && $_GET['dslc'] == 'active';
}
