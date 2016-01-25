<?php
define('AS_DOMAIN', 'helistudio');
define('TEMPLATEURL', get_template_directory_uri() );

add_theme_support( "title-tag" );
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}
/* ----------------------------------------------------------------------------------- */
/* 	TGM Plugin */
/* ----------------------------------------------------------------------------------- */
require_once('plugins/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once('plugins/tgm-plugin-activation/required_plugins.php');
/* ----------------------------------------------------------------------------------- */
/* 	Library Files */
/* ----------------------------------------------------------------------------------- */
require_once dirname(__FILE__) . '/includes/index.php';
/* ----------------------------------------------------------------------------------- */
/* 	Meta-Box INIT */
/* ----------------------------------------------------------------------------------- */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/meta-box' ) );

require_once RWMB_DIR . 'meta-box.php';

require_once get_template_directory() . '/includes/metaboxes_config.php';
require_once get_template_directory() . '/includes/metaboxes_config.php';
/* 	Function Import */
/* ----------------------------------------------------------------------------------- */
require_once dirname(__FILE__) . '/includes/admin/inc/extensions/wbc_importer/function.php';
/* ----------------------------------------------------------------------------------- */
/* 	WooCommerce INIT */
/* ----------------------------------------------------------------------------------- */
if ( class_exists('Woocommerce') ) {
	require_once get_template_directory() . '/includes/woocommerce_init.php';
}
/* ----------------------------------------------------------------------------------- */
/* 	Pagination */
/* ----------------------------------------------------------------------------------- */
function as_get_pagination(){
    global $wp_rewrite;
    global $wp_query;
    return paginate_links(array(
        'base'      => str_replace('99999', '%#%', esc_url(get_pagenum_link(99999))),
        'format'    => $wp_rewrite->using_permalinks() ? 'page/%#%' : '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => '<span class="dslc-icon dslc-icon-double-angle-left"></span>',
        'next_text' => '<span class="dslc-icon dslc-icon-double-angle-right"></span>',
        'type'      => 'list'
    ));
}
add_filter('as_pagination', 'as_get_pagination');
/* ----------------------------------------------------------------------------------- */
/* 	Custom Number Comment Post */
/* ----------------------------------------------------------------------------------- */
include('includes/comment-better.php');
function as_get_number_comment()
{
    global $post;
    $num_comments   = get_comments_number(); // get_comments_number returns only a numeric value
    $comments       = '';
    $write_comments = '';
    if (comments_open())
    {
        if ($num_comments == 0)
        {
            $comments = __('No comments', AS_DOMAIN);
        }
        elseif ($num_comments > 1)
        {
            $comments = $num_comments . __(' comments', AS_DOMAIN);
        }
        else
        {
            $comments = __('1 comment', AS_DOMAIN);
        }
        $write_comments = '<a href="' . esc_url( get_comments_link() )  . '">' . $comments . '</a>';
    }
    else
    {
        $write_comments = __('Comments are off for this post.', AS_DOMAIN);
    }
    echo '<span class="dslc-icon dslc-icon-comments"></span>&nbsp;'.$write_comments;
}

add_filter('as_number_comment', 'as_get_number_comment');
/*-----------------------------------------------------------------------------------*/
/*	Custom Excerpt Content Post */
/*-----------------------------------------------------------------------------------*/
function as_customize_excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count ( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ).'...';
	} else {
		$excerpt = implode( " ",$excerpt );
	}
		return $excerpt;
}

/* ----------------------------------------------------------------------------------- */
/* 	Main Heli Class */
/* ----------------------------------------------------------------------------------- */
class Heli extends AE_Base {
	function __construct() {
		/**
		 *  all theme actions go here
		 */
		$this->add_action( 'wp_enqueue_scripts', 'as_on_add_scripts' );
		$this->add_action( 'wp_print_styles', 'as_on_add_styles');
		$this->add_action( 'init', 'as_theme_init' );
		$this->add_action( 'widgets_init', 'as_widgets_init' );
		$this->add_action( 'wp_footer', 'as_scripts_in_footer', 100 );
		/**
		 *  all theme filters go here
		 */
		$this->add_filter( 'wp_title', 'as_wp_title', 10, 2 );
		/**
		 *  all theme ajax actions go here
		 */
		$this->add_ajax('as_load_project', 'as_load_project');
		$this->add_ajax('as_like_post', 'as_like_post');
	}
	function as_on_add_scripts(){
		// enqueue backbonejs, underscore
		$this->add_existed_script('backbone');
		$this->add_existed_script('underscore');
		if ( as_option('as_option_smooth_scroll', '1') ){
			// Smoothscroll
			$this->add_script('smoothscroll', TEMPLATEURL . '/js/smoothscroll.js', array('jquery'));
		}
		// Modernize
		$this->add_script('modernizr', TEMPLATEURL . '/js/libs/modernizr.custom.js', array('jquery'));
		// Classie
		$this->add_script('classie', TEMPLATEURL . '/js/libs/classie.js', array('jquery'));
		if ( as_option('as_option_retina_img', '1') ){
			// Retina JS
			$this->add_script('retina', TEMPLATEURL . '/js/libs/retina.min.js', array('jquery'));
		}
		// Dialog
		$this->add_script('dialog', TEMPLATEURL . '/js/libs/dialogFx.js', array('jquery', 'modernizr', 'classie'));
		// Front Js
		$this->add_script('front', TEMPLATEURL . '/js/front.js', array('jquery', 'backbone', 'underscore'));
		
		wp_localize_script( 'front', 'as_globals', array(
			'ajaxURL' => admin_url( 'admin-ajax.php' ),
			'imgURL'  => get_template_directory_uri() . '/img/'
		));
		// Panel Demo Style
		$this->add_script('intro_demo', TEMPLATEURL . '/js/custom_panel.js', array('jquery'));
		
		// Custom
		$this->add_script('main', TEMPLATEURL . '/js/main.js', array('jquery'));
		$this->add_script('jquery.appear', TEMPLATEURL . '/js/libs/jquery.appear.js', array('jquery', 'main'));
	}
	/**
	*
	* print scripts in footer
	* @param null
	*
	*/
	function as_scripts_in_footer(){
		?>
		<script type="text/javascript">
			(function ($ , Views, Models, AS) {
				$(document).ready(function(){
	                // init view front
	                if(typeof Views.Front !== 'undefined') {
	                    AS.App = new Views.Front();
	                }
				});
        	})(jQuery, AS.Views, AS.Models, window.AS);
		</script>
		<?php
	}
	function as_on_add_styles(){
		// Font Awesome
		$this->add_style('font-icon', TEMPLATEURL . '/css/font-awesome.min.css', array(), '1.0', 'all');

		// Panel Demo Style
		$this->add_style('as-intro-demo', TEMPLATEURL . '/css/style_end.css', array(), '1.0', 'all');
		
		        // Dialog
        $this->add_style('as-dialog', TEMPLATEURL . '/css/libs/dialog/dialog.css', array(), '1.0', 'all');
        $this->add_style('as-dialog-wilma', TEMPLATEURL . '/css/libs/dialog/dialog-wilma.css', array('as-dialog'), '1.0', 'all');
		// Style.css
        $this->add_style('as-style', get_stylesheet_uri());
        // Responsive Style
        $this->add_style('responsive-style', TEMPLATEURL . '/css/responsive-style.css', array(), '1.0', 'all');
         // Responsive menu
        $this->add_style('responsive-style-menu', TEMPLATEURL . '/css/responsive-menu.css', array(), '1.0', 'all');
		// Custom Style
        $this->add_style('custom', TEMPLATEURL . '/css/custom-style.php', array(), '1.0', 'all');
	}
	function as_theme_init(){
		// Auto feed
		add_theme_support( 'automatic-feed-links' );
		// Woocommerce
		add_theme_support( 'woocommerce' );
		// Add post formats
		add_theme_support( 'post-formats', array('gallery', 'image', 'video', 'quote', 'link') );
		add_post_type_support( 'dslc_projects', 'post-formats' );
		// Add featured images
		add_theme_support( 'post-thumbnails' );
		/* === Register Menus === */
		register_nav_menu( 'as_header_menu', __('Theme Header Menu', AS_DOMAIN) );
		register_nav_menu( 'as_sidebar_menu', __('Theme SideNav Menu', AS_DOMAIN) );
		register_nav_menu( 'as_footer_menu', __('Theme Footer Menu', AS_DOMAIN) );
	}
	function as_widgets_init(){
		register_widget( 'AS_Flickr_Widget' );
		register_widget( 'AS_Contact_Info_Widget' );
		register_widget( 'AS_Recent_Posts_Widget' );
		register_widget( 'AS_Social_Info_Widget' );
		register_widget( 'AS_Widget_Image' );
		register_widget( 'AS_Subscribe' );

	    /**
	    * Creates a sidebar blog
	    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	    */
	    $args = array(
			'name'          => __( 'Main Sidebar', AS_DOMAIN ),
			'id'            => 'as_main_sidebar',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	    /**
	    * Creates a sidebar shop
	    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	    */
	    $args = array(
			'name'          => __( 'Shop Sidebar', AS_DOMAIN ),
			'id'            => 'as_shop_sidebar',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	    /**
	    * Creates a sidebar for footer
	    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	    */
	    
	    /* Footer Area 1 */
	    $args = array(
			'name'          => __( 'Footer Area 1', AS_DOMAIN ),
			'id'            => 'footer_area_1',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	    
	    /* Footer Area 1 */
	    $args = array(
			'name'          => __( 'Footer Area 1', AS_DOMAIN ),
			'id'            => 'footer_area_1',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	    
	    /* Footer Area 2 */
	    $args = array(
			'name'          => __( 'Footer Area 2', AS_DOMAIN ),
			'id'            => 'footer_area_2',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	    
	    /* Footer Area 3 */
	    $args = array(
			'name'          => __( 'Footer Area 3', AS_DOMAIN ),
			'id'            => 'footer_area_3',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	    
	    /* Footer Area 4 */
	    $args = array(
			'name'          => __( 'Footer Area 4', AS_DOMAIN ),
			'id'            => 'footer_area_4',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="as-widget-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>'
	    );
	    register_sidebar( $args );
	}
	function as_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', AS_DOMAIN ), max( $paged, $page ) );

		return $title;
	}
	/*-----------------------------------------------------------------------------------*/
	/* Ajax Project
	/*-----------------------------------------------------------------------------------*/
	function as_load_project(){
		$data         		= $_REQUEST['content'];
		$project      		= get_post( $data['id'] );
		$project_permalink  = get_permalink( $project->ID );
		$project_url  		= get_post_meta( $project->ID, 'dslc_project_url', true );
		$project_url_text 	= get_post_meta( $project->ID, 'dslc_project_url_text', true );
		$project_name  		= get_post_meta( $project->ID, 'dslc_project_name', true );
		$cats         		= array();
		$terms        		= get_the_terms( $project->ID, 'dslc_projects_cats' );
		foreach ( $terms as $term ) {
			$cats[] = $term->name;
		}
		$dslc_projects_cats = join( ', ', $cats );
		
		$fb_share      = '<li><a class="as-port-ajax-social-facebook" href="http://www.facebook.com/sharer/sharer.php?u='.$project_permalink.'" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=660\');return false;" target="_blank"><span class="dslc-icon dslc-icon-facebook"></span></a></li>';
		$twitter_share = '<li><a class="as-port-ajax-social-twitter" href="http://twitter.com/share?url='.$project_permalink.'&amp;lang=en&amp;text=Check%20out%20this%20awesome%20project:&amp;" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=620\');return false;" data-count="none" data-via=" "><span class="dslc-icon dslc-icon-twitter"></span></a></li>';
		$google_share  = '<li><a class="as-port-ajax-social-google" href="https://plus.google.com/share?url='.$project_permalink.'" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500\');return false;"><span class="dslc-icon dslc-icon-google-plus"></span></a></li>';
		$btn_get       = '<a href="'.$project_url.'" class="as-get-in-touch-prj-ajax">'. __('Visit Project', AS_DOMAIN) .'</a>';
		
		
		$html = '<div class="as-mask-color-port">
					<svg class="as-preloading-port" width="80" height="80" viewbox="0 0 80 80">
	                    <polygon points="0 0 0 80 80 80 80 0" class="rect" />
	                </svg>
				</div>
				<div class="as-title-port-ajax-wrapper dslc-col dslc-12-col dslc-last-col">
					<h1 class="as-port-ajax-title">'.$project->post_title.'</h1>
					<span class="as-port-ajax-category">'.$dslc_projects_cats.'</span>
				</div>
				<div class="as-port-ajax-data">
					<div class="dslc-col dslc-6-col port-thumb">
						<div class="as-port-ajax-thumbnail-img">
							'.get_the_post_thumbnail( $project->ID, 'full' ).'
						</div>
					</div>
					<div class="dslc-col dslc-6-col dslc-last-col as-port-ajax-excerpt">
						<div class="as-ajax-info-wrapper">
							'.apply_filters( 'the_content', $project->post_content ).'
							<div class="clearfix"></div>
							<div class="as-info-project-meta">
								<div class="as-info-client">
									<span class="dslc-icon dslc-icon-user"></span>&nbsp;&nbsp;<span class="as-info-sum">Client:</span>&nbsp; <span>'. $project_name .'</span>
								</div>
								<div class="as-info-url">
									
									<span class="dslc-icon dslc-icon-link"></span>&nbsp;&nbsp;<span class="as-info-sum">URL Project:</span>&nbsp; <a href="'.$project_url.'" target="_blank">'.$project_url_text.'</a>
								</div>
							</div>
							<div class="as-port-ajax-social-share">
								'.$btn_get.'
								<ul class="as-port-ajax-list-social">
									'.$fb_share.'
									'.$twitter_share.'
									'.$google_share.'
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>';
		$response = array(
				'success'   => true,
				'html'	    => $html,
				'prev_post' => get_next_previous_port_id($project->ID, 'next'),
				'next_post' => get_next_previous_port_id($project->ID, 'prev'),
			);
		wp_send_json( $response );
	}
	/*-----------------------------------------------------------------------------------*/
	/* Ajax Post
	/*-----------------------------------------------------------------------------------*/
	function as_like_post(){
		$data   = $_REQUEST['content'];
		$count  = get_post_meta( $data['id'], 'as_like_count', true );
		$count++;
		$result = update_post_meta( $data['id'], 'as_like_count', $count );
		if(!is_wp_error($result)){
			$response = array(
				'success'   => true,
				'count'	    => get_post_meta( $data['id'], 'as_like_count', true ),
			);
		} else {
			$response = array(
				'success'   => false,
				'count'	    => 0,
			);
		}
		wp_send_json( $response );
	}
}
//call new Heli Class
new Heli('Copyright® 2014 ElenaStudio!');
