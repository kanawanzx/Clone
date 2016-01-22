<?php header("Content-type: text/css"); ?>
<?php
	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];
	require_once( $path_to_wp.'/wp-load.php' );
?>
<?php 
	// Color Main 1
	$main_color 		= as_option('as_option_main_color_1');
	// Color Link
	$link_color 		= as_option('as_option_link_color');
	// Color Link
	$link_color_hover	= as_option('as_option_link_color_hover');
?>
<?php echo'
ul.as-social-nav,
#as-header-2 ul.as-list-infomation-wrapper,
.as-list-social-header-wrapper,
.as-search-and-shop,
.as-pagination-wrapper ul,
.as-list-icon-share-btn,
.as-breadcrumb-link,
.as-sidebar-content .as-widget ul,
#as-header-3 .as-shop-cart-header .widget_shopping_cart_content ul{
	padding:0;
	margin:0;
	list-style:none;
}

a, * a{
	color : '.$link_color.';
}
a:hover, * a:hover{
	color : '.$link_color_hover.';
}
ul.as-social-nav li:hover a .as-social-border-style:before {
	border-right-color: '.$main_color.';
	border-top-color: '.$main_color.';
}
ul.as-social-nav li:hover a .as-social-border-style:after {
	border-left-color: '.$main_color.';
	border-bottom-color: '.$main_color.';
}
.as-menu-main > li > a:before,
#as-header-2 .as-header-bottom .as-quatity-item-woo,
#as-header-3 .as-search-header:hover,
.as-pagination-wrapper .page-numbers li > span.page-numbers.current, 
.as-pagination-wrapper .page-numbers li a:hover{
	background-color: '.$main_color.';
}
ul.as-social-nav li:hover span.dslc-icon,
#as-header-3 .as-primary-nav > li:hover a,
#as-header-3 .as-primary-nav > li a:focus,
#as-header-3 .as-primary-nav > li > ul.sub-menu > li:hover a,
#menu-onepage-menus li.active a,
#as-header-2 .as-header-bottom .as-search-and-shop li .dslc-icon:hover,
.as-sidebar-content .as-widget ul li a:hover,
.as-sidebar-content .as-widget ul li.recentcomments .comment-author-link,
.as-sidebar-content .as-widget ul li.recentcomments .comment-author-link a,
#as-page-blog-classic .as-post-item .as-gallery-wrapper .as-customNavigation-blog a.as-btn-slider-post-next:hover,
#as-page-blog-classic .as-post-item .as-gallery-wrapper .as-customNavigation-blog a.as-btn-slider-post-prev:hover,
.as-content-blog-wrapper .as-post-title a:hover,
.as-post-social-group .as-share-social-list:hover .as-share-btn .dslc-icon,
.as-widget.widget_as_latest_tweets_widget .tweet-text a,
.as-post-btn-group a.as-btn-readmore,
#as-breadcrumb-wrapper .as-breadcrumb-link li a:hover,
.as-author-content .dslc-icon,
#as-header-2 ul.as-list-infomation-wrapper > li .as-infomation .as-icon-info{
	color: '.$main_color.';
}
.as-portfolio-ajax-wrapper .as-port-control a.prev:hover .as-btn-text-ajax-prj,
.as-portfolio-ajax-wrapper .as-port-control a.next:hover .as-btn-text-ajax-prj,
.as-portfolio-ajax-wrapper .as-port-control a.prev:hover span.dslc-icon,
.as-portfolio-ajax-wrapper .as-port-control a.next:hover span.dslc-icon,
#as-header-2 .mega-menu-wrap ul.mega-sub-menu li.mega-menu-item ul.menu li a:hover{
	color: '.$main_color.' !important;
}
a, a:hover, a:focus{
	color: '.$link_color.';
}
#as-header-3 .as-shop-cart-header:hover,
.as-widget .tagcloud a:hover{
	background: '.$main_color.';
	color: #FFF;
	border-color: '.$main_color.';
}
.as-hamburglar:hover path,
.as-hamburglar:hover line,
#as-preloading-icon polygon.rect,
.as-preloading-port polygon.rect{
	stroke: '.$main_color.';
}
.as-hamburglar:hover #top,
.as-hamburglar:hover #bottom,
.as-portfolio-ajax-wrapper .as-port-control a.close-port:hover,
ul.contact-info-widget li .as-icon-contact-wrapper{
	background: '.$main_color.';
}
.contact-style-1 > p span input:focus,
.contact-style-1 > p span textarea:focus,
.as-post-item .as-featured-quote,
.as-pricing-wrapper.as-pricing-style-2 .as-pricing-title h3:after,
#as-header-2 .mega-menu-wrap ul.mega-sub-menu li.mega-menu-item ul.menu li a:hover,
.woocommerce-main-image:hover,
.as-icon-shopping .widget_shopping_cart_content{
	border-color: '.$main_color.' !important;
}
.wpcf7-submit.as-button-main-style,
.as-button-main-style:hover,
.as-port-ajax-social-share .as-get-in-touch-prj-ajax:hover,
.as-widget.widget_wysija .widget_wysija_cont .wysija-submit,
.widget_newsletters_1 .dslc-widget-wrap .widget_wysija_cont .wysija-submit,
#as-comment-wrapper .comment-reply-link:hover,
#as-comment-wrapper .as-reply-form-comment .form-submit input.submit,
.as-scrollup,
.as-button-woo-style,
.as-btn-404-back-home,
.as-btn-404-back-home:hover{
	background: '.$main_color.' !important;
	outline-color: '.$main_color.' !important;
	border-color: '.$main_color.' !important;
	color:#fff !important;
}
.as-port-ajax-social-share .as-get-in-touch-prj-ajax,
.as-post-btn-group a.as-btn-readmore{
	outline-color: '.$main_color.' !important;
	border-color: '.$main_color.' !important;
	color: '.$main_color.';
}
.as-port-ajax-list-social li a:hover,
.as-social-info-widget-wrapper .as-social-info-widget li a:hover,
#mega-menu-wrap-as_header_menu #mega-menu-as_header_menu .as-social-info-widget li a:hover,
.as-widget-footer .tagcloud a:hover,
#mega-menu-wrap-as_header_menu #mega-menu-as_header_menu .tagcloud a:hover{
    border-color: '.$main_color.';
    color: '.$main_color.';
}
.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus,.product_listing_buttons a.as_button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce.widget_shopping_cart .buttons a:hover, .woocommerce .widget_shopping_cart .buttons a:hover, .woocommerce-page.widget_shopping_cart .buttons a:hover, .woocommerce-page .widget_shopping_cart .buttons a:hover, .widget_shopping_cart_content .buttons a:hover{
	background: '.$main_color.';
}
.woocommerce table.cart a.remove:hover, .woocommerce #content table.cart a.remove:hover, .woocommerce-page table.cart a.remove:hover, .woocommerce-page #content table.cart a.remove:hover {
	color: '.$main_color.';
}
';
?>

<?php echo as_option('as_custom_css'); ?>
