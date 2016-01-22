<?php
/**
 * Class AS_Flickr_Widget
 * create flickr widget
 *
 * @package 	Anna
 * @author   	Alena Studio
 */
 
/*-----------------------------------------------------------------------------------*/
/* Setting Flickr */
/*-----------------------------------------------------------------------------------*/
class AS_Flickr_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget', 'description' => __( 'Drag this widget to single sidebars to display a list of related questions.',AS_DOMAIN) );
		$control_ops = array('width' => 250, 'height' => 100);
		parent::__construct('as_flickr_widget', __('AS Flickr', AS_DOMAIN) , $widget_ops ,$control_ops );
	}

	function update ( $new_instance, $old_instance ) {
		if( $new_instance['number'] != $old_instance['number'] ){
			delete_transient( 'related_questions_query' );
		}
		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
				'title'     => '' ,
				'number'    => '4',
				'flickr_id' => '',
			) 
		);
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
				<?php _e('Title:', AS_DOMAIN) ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('number') ); ?>">
				<?php _e('Number of photos to display:', AS_DOMAIN) ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('flickr_id') ); ?>">
				<?php _e('Flickr ID:', AS_DOMAIN) ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('flickr_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('flickr_id') ); ?>" type="text" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" /> <a target="_blank" href="http://idgettr.com/">Get ID</a>
		</p>
	<?php
	}

	function widget( $args, $instance ) {
		extract($args);
		
		$title 	= apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		$id     = $instance['flickr_id'];
		echo $args['before_widget'];
		if ( ! empty( $title ) )
	    echo $args['before_title'] . $title . $args['after_title'];
		?>
		
		<div class="flickr-wrapper">
			<div class="list-photos">
				<script type="text/javascript" src="//www.flickr.com/badge_code_v2.gne?count=<?php echo esc_attr($number); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo esc_attr($id); ?>"></script>
			</div>
		</div>
		<?php
			
		echo $args['after_widget'];
	}
}
//End Flickr Widget


/**
 * AS_Social_Info_Widget
 * create social info widget
 *
 * @package 	Anna
 * @author   	alenastudio
 */

class AS_Social_Info_Widget extends WP_Widget {
	
	function __construct() {
		  $widget_ops = array('classname' => 'social_info', 'description' => __( 'Displaying your contact information',AS_DOMAIN) );
		  $control_ops = array('width' => 250, 'height' => 100);
		  parent::__construct('as_social_info_widget', __('AS Social Network', AS_DOMAIN) , $widget_ops ,$control_ops );
		 
	}
	
	// display the widget in the theme
	function widget( $args, $instance ) {
		extract($args);
		
		$title        = apply_filters('widget_title', $instance['title']);
	  	$twitter      = strip_tags($instance['twitter']);
	  	$facebook     = strip_tags($instance['facebook']);
	  	$google_plus  = strip_tags($instance['google_plus']);
		$youtube      = strip_tags($instance['youtube']);
		$vimeo        = strip_tags($instance['vimeo']);
		$dribbble     = strip_tags($instance['dribbble']);
		$behance      = strip_tags($instance['behance']);
		$flickr       = strip_tags($instance['flickr']);
		$tumblr       = strip_tags($instance['tumblr']);
		$pinterest    = strip_tags($instance['pinterest']);
		$linkedin     = strip_tags($instance['linkedin']);
		$instagram    = strip_tags($instance['instagram']);
		$github       = strip_tags($instance['github']);
		$dropbox      = strip_tags($instance['dropbox']);
		$foursquare   = strip_tags($instance['foursquare']);
	
		echo $args['before_widget'];
		if ( ! empty( $title ) )
	    echo $args['before_title'] . $title . $args['after_title']; 
				?>		
				<div class="as-social-info-widget-wrapper">
                    <ul class="as-social-info-widget">
                        <?php 
						if($twitter) echo '<li><a href="'.esc_url($twitter).'" title="Twitter"><span class="dslc-icon dslc-icon-twitter"></span></a></li>'; 
						if($facebook) echo '<li><a href="'.esc_url($facebook).'" title="Facebook"><span class="dslc-icon dslc-icon-facebook"></span></a></li>';
						if($google_plus) echo '<li><a href="'.esc_url($google_plus).'" title="Google Plus"><span class="dslc-icon dslc-icon-google-plus"></span></a></li>';
						if($youtube) echo '<li><a href="'.esc_url($youtube).'" title="Youtube"><span class="dslc-icon dslc-icon-youtube-play"></span></a></li>';
						if($vimeo) echo '<li><a href="'.esc_url($vimeo).'" title="Vimeo"><span class="dslc-icon dslc-icon-vimeo-square"></span></a></li>';
						if($dribbble) echo '<li><a href="'.esc_url($dribbble).'" title="Dribbble"><span class="dslc-icon dslc-icon-dribbble"></span></a></li>';
						if($behance) echo '<li><a href="'.esc_url($behance).'" title="Behance"><span class="dslc-icon dslc-icon-behance"></span></a></li>';
						if($flickr) echo '<li><a href="'.esc_url($flickr).'" title="Flickr"><span class="dslc-icon dslc-icon-flickr"></span></a></li>';
						if($tumblr) echo '<li><a href="'.esc_url($tumblr).'" title="Tumblr"><span class="dslc-icon dslc-icon-tumblr"></span></a></li>';
						if($pinterest) echo '<li><a href="'.esc_url($pinterest).'" title="Pinterest"><span class="dslc-icon dslc-icon-pinterest"></span></a></li>';
						if($linkedin) echo '<li><a href="'.esc_url($linkedin).'" title="Linkedin"><span class="dslc-icon dslc-icon-linkedin"></span></a></li>';
						if($instagram) echo '<li><a href="'.esc_url($instagram).'" title="Instagram"><span class="dslc-icon dslc-icon-instagram"></span></a></li>';
						if($github) echo '<li><a href="'.esc_url($github).'" title="Github"><span class="dslc-icon dslc-icon-github-title"></span></a></li>';
						if($dropbox) echo '<li><a href="'.esc_url($dropbox).'" title="Dropbox"><span class="dslc-icon dslc-icon-dropbox"></span></a></li>';
						if($foursquare) echo '<li><a href="'.esc_url($foursquare).'" title="Foursquare"><span class="dslc-icon dslc-icon-foursquare"></span></a></li>';
						?>
                    </ul>
                </div>
			<?php
			
		echo $args['after_widget'];
		
		//end
	}
	
	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {
		
		$instance                     = $old_instance;
		$instance['title']            = strip_tags($new_instance['title']);
		$instance['twitter']          = strip_tags($new_instance['twitter']);
	  	$instance['facebook']         = strip_tags($new_instance['facebook']);
	  	$instance['google_plus']      = strip_tags($new_instance['google_plus']);
		$instance['youtube']          = strip_tags($new_instance['youtube']);
		$instance['vimeo']            = strip_tags($new_instance['vimeo']);
		$instance['dribbble']         = strip_tags($new_instance['dribbble']);
		$instance['behance']          = strip_tags($new_instance['behance']);
		$instance['flickr']           = strip_tags($new_instance['flickr']);
		$instance['tumblr']           = strip_tags($new_instance['tumblr']);
		$instance['pinterest']        = strip_tags($new_instance['pinterest']);
		$instance['linkedin']         = strip_tags($new_instance['linkedin']);
		$instance['instagram']        = strip_tags($new_instance['instagram']);
		$instance['github']           = strip_tags($new_instance['github']);
		$instance['dropbox']          = strip_tags($new_instance['dropbox']);
		$instance['foursquare']       = strip_tags($new_instance['foursquare']);
		return $instance;
	}
	
	// print the widget option form on the widget management screen
	function form( $instance ) {
		// combine provided fields with defaults
		$instance = wp_parse_args( 
			(array) $instance, 
			array( 
				'title'         => 'Contact Info', 
				'twitter'       => '', 
				'facebook'      => '', 
				'google_plus'   => '', 
				'youtube'       => '', 
				'vimeo'         => '',
				'dribbble'      => '', 
				'behance'       => '', 
				'flickr'        => '', 
				'tumblr'        => '', 
				'pinterest'     => '',
				'linkedin'      => '', 
				'instagram'     => '', 
				'github'        => '', 
				'dropbox'       => '', 
				'foursquare'    => '',
			) 
		);
		$title 		  = strip_tags($instance['title']);
		$twitter      = strip_tags($instance['twitter']);
	  	$facebook     = strip_tags($instance['facebook']);
	  	$google_plus  = strip_tags($instance['google_plus']);
		$youtube      = strip_tags($instance['youtube']);
		$vimeo        = strip_tags($instance['vimeo']);
		$dribbble     = strip_tags($instance['dribbble']);
		$behance      = strip_tags($instance['behance']);
		$flickr       = strip_tags($instance['flickr']);
		$tumblr       = strip_tags($instance['tumblr']);
		$pinterest    = strip_tags($instance['pinterest']);
		$linkedin     = strip_tags($instance['linkedin']);
		$instagram    = strip_tags($instance['instagram']);
		$github       = strip_tags($instance['github']);
		$dropbox      = strip_tags($instance['dropbox']);
		$foursquare   = strip_tags($instance['foursquare']);
		
		// print the form fields
	?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e('Title:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>"><?php _e('Twitter URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('twitter') ); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
	</p>
    <p>
		<label for="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>"><?php _e('Facebook URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('facebook') ); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('google_plus') ); ?>"><?php _e('Google Plus URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('google_plus') ); ?>" name="<?php echo esc_attr( $this->get_field_name('google_plus') ); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>"><?php _e('Youtube URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('vimeo') ); ?>"><?php _e('Vimeo URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('vimeo') ); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('dribbble') ); ?>"><?php _e('Dribbble URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('dribbble') ); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('behance') ); ?>"><?php _e('Behance URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('behance') ); ?>" name="<?php echo esc_attr( $this->get_field_name('behance') ); ?>" type="text" value="<?php echo esc_attr($behance); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('flickr') ); ?>"><?php _e('Flickr URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('flickr') ); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('tumblr') ); ?>"><?php _e('Tumblr URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('tumblr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('tumblr') ); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('pinterest') ); ?>"><?php _e('Pinterest URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pinterest') ); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>"><?php _e('Linkedin URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('linkedin') ); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>"><?php _e('Instagram URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('instagram') ); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('github') ); ?>"><?php _e('Github URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('github') ); ?>" name="<?php echo esc_attr( $this->get_field_name('github') ); ?>" type="text" value="<?php echo esc_attr($github); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('dropbox') ); ?>"><?php _e('Dropbox URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('dropbox')); ?>" name="<?php echo esc_attr( $this->get_field_name('dropbox') ); ?>" type="text" value="<?php echo esc_attr($dropbox); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id('foursquare') ); ?>"><?php _e('Foursquare URL:',AS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('foursquare')); ?>" name="<?php echo esc_attr( $this->get_field_name('foursquare') ); ?>" type="text" value="<?php echo esc_attr($foursquare); ?>" />
	</p>    
   	
	<?php
	}
} 
/*-----------------------------------------------------------------------------------*/
/* Setting Contact Form */
/*-----------------------------------------------------------------------------------*/
class AS_Contact_Info_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'contact_info', 'description' => __( 'Displaying your contact information',AS_DOMAIN) );
		$control_ops = array('width' => 250, 'height' => 100);
		parent::__construct('as_contact_info_widget', __('AS Contact Form', AS_DOMAIN) , $widget_ops ,$control_ops );
	}
	function AS_Contact_Info_Widget() {
		
		// define widget title and description
		$widget_ops = array('classname' => 'contact_info','description' => __( 'Displaying your contact information', AS_DOMAIN ) );
		// register the widget
		$this->WP_Widget('AS_Contact_Info_Widget', __( 'AS Contact Form', AS_DOMAIN ), $widget_ops);
	
	}
	
	// display the widget in the theme
	function widget( $args, $instance ) {
		extract($args);
		
		$title 		= apply_filters('widget_title', $instance['title']);
	  	$name  		= strip_tags($instance['name']);
	  	$mail 		= strip_tags($instance['mail']);
		$phone 		= strip_tags($instance['phone']);
		$address 	= strip_tags($instance['address']);
		$xtra_info 	= strip_tags($instance['xtra_info']);
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
	    echo $args['before_title'] . $title . $args['after_title']; 
				 ?>		
				<div class="contact-info-widget-wrapper">
                    <ul class="contact-info-widget">
                        <?php 
						if($name) echo '<li><span class="as-icon-contact-wrapper"><span class="dslc-icon dslc-icon-building"></span></span><p>'.esc_html($name).'</p><div class="clearfix"></div></li>'; 
						if($mail) echo '<li><span class="as-icon-contact-wrapper"><span class="dslc-icon dslc-icon-envelope"></span></span><p>'.is_email($mail).'</p><div class="clearfix"></div></li>';
						if($phone) echo '<li><span class="as-icon-contact-wrapper"><span class="dslc-icon dslc-icon-phone"></span></span><p>'.esc_html($phone).'</p><div class="clearfix"></div></li>';
						if($address) echo '<li><span class="as-icon-contact-wrapper"><span class="dslc-icon dslc-icon-map-marker"></span></span><p>'.esc_html($address).'</p><div class="clearfix"></div></li>';
						if($xtra_info) echo '<li><span class="as-icon-contact-wrapper"><span class="dslc-icon dslc-icon-info-sign"></span></span><p>'.esc_textarea($xtra_info).'</p><div class="clearfix"></div></li>';
						?>
                    </ul>
                </div>
			<?php
			
		echo $args['after_widget'];
		
		//end
	}
	
	// update the widget when new options have been entered
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['name'] 		= strip_tags($new_instance['name']);
		$instance['mail'] 		= strip_tags($new_instance['mail']);
		$instance['phone'] 		= strip_tags($new_instance['phone']);
		$instance['address'] 	= strip_tags($new_instance['address']);
		$instance['xtra_info'] 	= strip_tags($new_instance['xtra_info']);
		return $instance;
	}
	
	// print the widget option form on the widget management screen
	function form( $instance ) {
		// combine provided fields with defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Contact Info', 'name' => '', 'mail'=> '', 'phone' => '', 'address' => '', 'xtra_info' => '' ) );
		$name 		= strip_tags($instance['name']);
		$mail 		= strip_tags($instance['mail']);
		$phone 		= strip_tags($instance['phone']);
		$address 	= strip_tags($instance['address']);
		$xtra_info 	= strip_tags($instance['xtra_info']);
		$title 		= strip_tags($instance['title']);
		// print the form fields
	?>
	<p><label for="<?php echo esc_attr ($this->get_field_id('title') ); ?>">
	<?php _e('Title:',AS_DOMAIN); ?></label>
	<input class="widefat" id="<?php echo esc_attr ($this->get_field_id('title') ); ?>" name="<?php echo esc_attr ($this->get_field_name('title') ); ?>" type="text" value="<?php echo
		esc_attr($title); ?>" /></p>
	
	<p><label for="<?php echo esc_attr ($this->get_field_id('name') ); ?>">
	<?php _e('Name:',AS_DOMAIN); ?></label>
	<input class="widefat" id="<?php echo esc_attr ($this->get_field_id('name') ); ?>" name="<?php echo esc_attr ($this->get_field_name('name') ); ?>" type="text" value="<?php echo
		esc_attr($name); ?>" /></p>
        
   	<p><label for="<?php echo esc_attr ($this->get_field_id('mail') ); ?>">
	<?php _e('Mail:',AS_DOMAIN); ?></label>
	<input class="widefat" id="<?php echo esc_attr ($this->get_field_id('mail') ); ?>" name="<?php echo esc_attr ($this->get_field_name('mail') ); ?>" type="text" value="<?php echo
		esc_attr($mail); ?>" /></p>
        
  	<p><label for="<?php echo esc_attr ($this->get_field_id('phone') ); ?>">
	<?php _e('Phone:',AS_DOMAIN); ?></label>
	<input class="widefat" id="<?php echo esc_attr ($this->get_field_id('phone') ); ?>" name="<?php echo esc_attr ($this->get_field_name('phone') ); ?>" type="text" value="<?php echo
		esc_attr($phone); ?>" /></p>
        
   	<p><label for="<?php echo esc_attr ($this->get_field_id('address') ); ?>">
	<?php _e('Address:',AS_DOMAIN); ?></label>
	<input class="widefat" id="<?php echo esc_attr ($this->get_field_id('address') ); ?>" name="<?php echo esc_attr ($this->get_field_name('address') ); ?>" type="text" value="<?php echo
		esc_attr($address); ?>" /></p>
   
   	<p><label for="<?php echo esc_attr ($this->get_field_id('xtra_info') ); ?>">
	<?php _e('Extra Info:',AS_DOMAIN); ?></label>
	<textarea class="widefat" id="<?php echo esc_attr ($this->get_field_id('xtra_info') ); ?>" name="<?php echo esc_attr ($this->get_field_name('xtra_info') ); ?>"><?php echo
		esc_attr($xtra_info); ?></textarea></p>
	<?php
	}
}

/**
 * Class AS_Recent_Posts_Widget
 * create recent posts widget
 *
 * @package 	Anna
 * @author   	alenastudio
 */
 
/*-----------------------------------------------------------------------------------*/
/* Setting AS_Recent_Posts_Widget */
/*-----------------------------------------------------------------------------------*/
class AS_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __("Your site&#8217;s most recent Posts.",AS_DOMAIN));
        parent::__construct('cocktail-recent-posts', __('AS Recent Posts',AS_DOMAIN), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
        add_action('save_post', array($this, 'flush_widget_cache'));
        add_action('deleted_post', array($this, 'flush_widget_cache'));
        add_action('switch_theme', array($this, 'flush_widget_cache'));
    }
    function widget($args, $instance)
    {
        $cache = array();
        if (!$this->is_preview())
        {
            $cache = wp_cache_get('widget_cocktail_recent_posts', 'widget');
        }
        if (!is_array($cache))
        {
            $cache = array();
        }
        if (!isset($args['widget_id']))
        {
            $args['widget_id'] = $this->id;
        }
        if (isset($cache[$args['widget_id']]))
        {
            echo $cache[$args['widget_id']];
            return;
        }
        ob_start();
        extract($args);
        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Recent Posts',AS_DOMAIN);
        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        $number     = (!empty($instance['number']) ) ? absint($instance['number']) : 5;
        if (!$number)
            $number     = 5;
        $show_date  = isset($instance['show_date']) ? $instance['show_date'] : false;
        $show_thumb = isset($instance['show_thumb']) ? $instance['show_thumb'] : false;
        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query(apply_filters('widget_posts_args', array(
                    'posts_per_page'      => $number,
                    'no_found_rows'       => true,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true
        )));
        if ($r->have_posts()) :
        echo $args['before_widget'];
		if ( ! empty( $title ) )
	    echo $args['before_title'] . $title . $args['after_title']; 
            ?>
            <ul class="recent-post-widget-wrapper">
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                    <li>
                        <div class="recent-post-widget">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                                $thumbnail_src = wp_get_attachment_url(get_post_thumbnail_id());
                                $website_url   = site_url();
                                $thumbnail_src = str_replace($website_url, '', $thumbnail_src);
                                $thumbnail     = wp_get_attachment_url(get_post_thumbnail_id());
                                ?>
                                <?php if ($show_thumb) : ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="as-img-thumb">
                                        <img src="<?php echo dslc_aq_resize($thumbnail, 70, 50, true) ?>" alt="<?php the_title(); ?>"/>                                   
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="recent-post-widget-content">
                                <h5><a href="<?php the_permalink(); ?>" class="sidebar-item-title"><?php the_title(); ?></a></h5>
                                <?php if ($show_date) : ?>
                                    <p class="recent-post-widget-date"><?php _e('Posted:', AS_DOMAIN) ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', AS_DOMAIN); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
        endif;
        if (!$this->is_preview())
        {
            $cache[$args['widget_id']] = ob_get_flush();
            wp_cache_set('widget_cocktail_recent_posts', $cache, 'widget');
        }
        else
        {
            ob_end_flush();
        }
    }
    function update($new_instance, $old_instance)
    {
        $instance               = $old_instance;
        $instance['title']      = strip_tags($new_instance['title']);
        $instance['number']     = (int) $new_instance['number'];
        $instance['show_date']  = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        $instance['show_thumb'] = isset($new_instance['show_thumb']) ? (bool) $new_instance['show_thumb'] : false;
        $this->flush_widget_cache();
        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_entries']))
            delete_option('widget_recent_entries');
        return $instance;
    }
    function flush_widget_cache()
    {
        wp_cache_delete('widget_cocktail_recent_posts', 'widget');
    }
    function form($instance)
    {
        $title      = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number     = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_date  = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
        $show_thumb = isset($instance['show_thumb']) ? (bool) $instance['show_thumb'] : false;
        ?>
        <p>
	        <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e('Title:',AS_DOMAIN); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
	        <label for="<?php echo esc_attr( $this->get_field_id('number') ); ?>"><?php _e('Number of posts to show:',AS_DOMAIN); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <p>
	        <input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo esc_attr( $this->get_field_id('show_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_date') ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id('show_date') ); ?>"><?php _e('Display post date?',AS_DOMAIN); ?></label>
        </p>
        <p>
	        <input class="checkbox" type="checkbox" <?php checked($show_thumb); ?> id="<?php echo esc_attr( $this->get_field_id('show_thumb') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_thumb') ); ?>" />
            <label for="<?php echo esc_attr ( $this->get_field_id('show_thumb') ); ?>"><?php _e('Display thumb image?',AS_DOMAIN); ?></label>
        </p>
        <?php
    }
}

class AS_Widget_Image extends WP_Widget {
	/**
	 * Setup widget options.
	 *
	 * Allows child classes to override the defaults.
	 *
	 * @see WP_Widget::construct()
	 */
	function __construct( $id_base = false, $name = false, $widget_options = array(), $control_options = array() ) {
		$id_base = ( $id_base ) ? $id_base : 'blazersix-widget-image';
		$name = ( $name ) ? $name : __( 'AS Image', 'blazersix-widget-image-i18n' );
		
		$widget_options = wp_parse_args( $widget_options, array(
			'classname'   => 'widget_image',
			'description' => __( 'An image from the media library', 'blazersix-widget-image-i18n' )
		) );
		
		$control_options = wp_parse_args( $control_options, array( 'width' => 278 ) );

		//load js for admin
		add_action( 'sidebar_admin_setup', array( $this, 'admin_setup' ) );
		

		parent::__construct( $id_base, $name, $widget_options, $control_options );


	}
	
	// Function to upload
	function admin_setup(){

		wp_enqueue_media();
		wp_register_script('tpw-admin-js', TEMPLATEURL .'/js/upload-img/tpw_admin.js', array( 'jquery', 'media-upload', 'media-views' ) );
		wp_enqueue_script('tpw-admin-js');

	}
	/**
	 * Default widget front end display method.
	 * 
	 */

	public function widget( $args, $instance ) {
		// Return cached widget if it exists.
		// Filter and sanitize instance data

		extract($args);

		$title = apply_filters( 'widget_title', $instance['title'] );
	    // before and after widget arguments are defined by themes
	    echo $args['before_widget'];
	    if ( ! empty( $title ) )
	    echo $args['before_title'] . $title . $args['after_title'];


		$image = $instance['img_url'];
		$link_to_web = $instance['link_to_web'];
		$img_title = $instance['img_title'];

		if($link_to_web != '')
		{
			?>
				<a href="<?php echo esc_url( $link_to_web );?>" target="_blank">
					<img src='<?php echo esc_url($image); ?>' title="<?php echo esc_attr( $img_title ); ?>" alt="<?php echo esc_attr( $img_title ); ?>" />
				</a>
			<?php
		}
		else{
			?>			
			<img src='<?php echo esc_url($image); ?>' title="<?php echo esc_attr( $img_title );?>" alt="<?php echo esc_attr( $img_title ); ?>" />
			<?php
		}
		

	    echo $args['after_widget'];
	}
	
	/**
	* 3. Show widget in admin dashboard
	*/
	public function form( $instance ) {

		$title = isset( $instance['title'] ) ? $instance['title'] : 'Default Title';
	    $img_url = isset( $instance['img_url'] ) ? $instance['img_url'] : '';
	    $img_title = isset( $instance['img_title'] ) ? $instance['img_title'] : '';
	    $link_to_web = isset( $instance['link_to_web'] ) ? $instance['link_to_web'] : '';


	    // widget admin form
	    ?>
	    <p class="widget-upload-wrap">

	      <div class="widget_input">
				<button id="title_image_button" class="button" onclick="image_button_click('Choose Title Image','Select Image','image','title_image_preview_new','<?php echo esc_attr( $this->get_field_id( 'img_url' ) );  ?>',this,event);">Select Image</button>			
			</div>

				<div class="title_image_preview_new" id="title_image_preview_new" name="title_image_preview" >
					<?php 
						if($img_url != ''){
							echo '<img src="'. esc_url( $img_url ) .'" style="width:100%;margin-top:15px">';
						}
					?>
				</div>

	    </p>
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'img_url' ) ); ?>"><?php _e( 'Image url:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'img_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_url' ) ); ?>" value="<?php echo esc_attr( $img_url ); ?>">
	    </p>
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
	    </p>
	    
	    
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'img_title' ) ); ?>"><?php _e( 'Image title:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'img_title' ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_title' ) ); ?>" value="<?php echo esc_attr( $img_title ); ?>">
	    </p>
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'link_to_web' ) ); ?>"><?php _e( 'Link to website:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_to_web' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_to_web' ) ); ?>" value="<?php echo esc_attr( $link_to_web ); ?>">
	    </p>
	    <?php

	}
  	/**
	* 4. Save All Infomation
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
	    $instance['title'] = strip_tags($new_instance['title']);
	    $instance['img_url'] = strip_tags($new_instance['img_url']);
	    $instance['img_title'] = strip_tags($new_instance['img_title']);
	    $instance['link_to_web'] = strip_tags($new_instance['link_to_web']);
	    return $instance;
	}

}


class AS_Subscribe extends WP_Widget {
	/**
	 * Setup widget options.
	 *
	 * Allows child classes to override the defaults.
	 *
	 * @see WP_Widget::construct()
	 */
	function __construct( $id_base = false, $name = false, $widget_options = array(), $control_options = array() ) {
		$id_base = ( $id_base ) ? $id_base : 'as_subscribe';
		$name = ( $name ) ? $name : __( 'AS Subscribe', 'blazersix-widget-image-i18n' );
		
		$widget_options = wp_parse_args( $widget_options, array(
			'classname'   => 'as_subscribe',
			'description' => __( 'An image from the media library', 'blazersix-widget-image-i18n' )
		) );
		
		$control_options = wp_parse_args( $control_options, array( 'width' => 278 ) );	

		parent::__construct( $id_base, $name, $widget_options, $control_options );


	}
	

	/**
	 * Default widget front end display method.
	 * 
	 */

	public function widget( $args, $instance ) {
		// Return cached widget if it exists.
		// Filter and sanitize instance data

		extract($args);

		$title = apply_filters( 'widget_title', $instance['title'] );
	    // before and after widget arguments are defined by themes
	    echo $args['before_widget'];
	    if ( ! empty( $title ) )
	    echo $args['before_title'] . $title . $args['after_title'];


		$mailchimp_url = $instance['mailchimp_url'];
		$label_subscribe = $instance['label_subscribe'];

		$mailchimp_data = explode('?u=', $mailchimp_url);
		if( isset($mailchimp_data[1]) ){
			$mailchimp_s_url = $mailchimp_data[0];
			$mailchimp_data = explode('&id=',$mailchimp_data[1]);
		}else{
			$mailchimp_data = array('','');
		}

		?>

		<div class="as_mailchimp_form">
            <!-- For subscription Form-->
            <p class="as_label_subscribe" style="<?php if($label_subscribe == ""){ echo 'display:none';} ?>"><?php  echo esc_attr($label_subscribe);  ?></p>
        	<form method="GET" action="<?php echo esc_url($mailchimp_s_url); ?>" target="_blank">
                <input class="as_email_mailchimp" type="email" required="" placeholder="<?php _e('Email Address', AS_DOMAIN) ?>" name="EMAIL">
				<input type="hidden" name="u" value="<?php echo esc_attr($mailchimp_data[0]) ?>">
				<input type="hidden" name="id" value="<?php echo esc_attr($mailchimp_data[1]) ?>">
                <button class="as-button-main-style as-button-woo-style full-width" type="submit" >Subscribe</button>
            </form>
        </div>

		<?php
		

	    echo $args['after_widget'];
	}
	
	/**
	* 3. Show widget in admin dashboard
	*/
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : 'Default Title';
		$label_subscribe = isset( $instance['label_subscribe'] ) ? $instance['label_subscribe'] : '';
		$mailchimp_url = isset( $instance['mailchimp_url'] ) ? $instance['mailchimp_url'] : 'Default';


	    // widget admin form
	    ?>
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo esc_attr(  $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
	    </p>
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'label_subscribe' ) ); ?>"><?php _e( 'Label Subscribe:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'label_subscribe' ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'label_subscribe' ) ); ?>" value="<?php echo esc_attr( $label_subscribe ); ?>">
	    </p>
	    <p>
	      <label for="<?php echo esc_attr( $this->get_field_id( 'mailchim_url' ) ); ?>"><?php _e( 'MailChimp url:', AS_DOMAIN ) ?></label>
	      <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mailchimp_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mailchimp_url' ) ); ?>" value="<?php echo esc_attr( $mailchimp_url ); ?>">
	      <a href="https://www.screenr.com/kIXN" target="_blank"><?php _e('How to find MailChimp URL?', AS_DOMAIN); ?></a>
	    </p>

	    <?php

	}
  	/**
	* 4. Save All Infomation
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['label_subscribe'] = strip_tags($new_instance['label_subscribe']);
	    $instance['mailchimp_url'] = strip_tags($new_instance['mailchimp_url']);
	    return $instance;
	}

}


