<?php
function as_function_comments_better($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>

    <li <?php comment_class(); ?> id="as-li-comment-<?php comment_ID() ?>">
        <div class="as-comment" id="as-comment-<?php comment_ID(); ?>">
            
            <div class="as-comment-content">					
                <?php echo get_avatar($comment, $size = '65'); ?>
                <div class="as-comment-meta">
                    <h4><?php comment_author_link() ?>
                    	<span><?php comment_date(); ?> at <?php comment_time() ?></span>
                    </h4> 		
                </div>	
                <div class="as-comment-text">
                    <?php comment_text() ?>
					<?php if ($comment->comment_approved == '0') : ?>
                        <p style="font-style:italic;"><?php _e('Your comment is awaiting moderation.',AS_DOMAIN) ?></p>
                        <br />
                    <?php endif; ?>
					<?php edit_comment_link(__('[Edit]', AS_DOMAIN),'  ','') ?>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div> 
            </div>
        </div>

<?php
}
?>