jQuery(window).load(function() {
	jQuery('#as-preloading-wrapper').fadeOut('slow');
	jQuery('.as-wrapper-pane-404').addClass('as-active');
});
jQuery(document).ready(function($) {
	// MENU HAMBURGER STYLE
	var trigger 	= $('#as-hamburger'),
		primary_nav = $('.as-primary-nav'),
        isClosed 	= true;

		trigger.click(function () {
		    burgerTime();
		    primary_nav.toggleClass('is-visible');
		    $('html, body').toggleClass('as-hidden');
		});

		function burgerTime() {
		  if (isClosed == true) {
			trigger.removeClass('is-open');
			trigger.addClass('is-closed');
			isClosed = false;
		  } else {
			trigger.removeClass('is-closed');
			trigger.addClass('is-open');
			isClosed = true;
		}
    }
	// MENU HAMBURGER SIDENAV STYLE
	var hamburger_button = $('.as-icon-hamburger-menu'),
		mobile_close_nav = $('.as-close-nav-mobile span'),
		main_nav_menu 	 = $('.as-main-nav-menu'),
		nav_menu_left 	 = $('.as-nav-menu-left'),
		nav_menu_right 	 = $('.as-nav-menu-right'),
		logo_main_site 	 = $('.as-logo-main-site'),
		menu_one_page 	 = $('#menu-onepage-menus li'),
		windowWidth 	 = $(window).width();
		
	if ( windowWidth > 480 ){
		if( nav_menu_right.length > 0 ){
			hamburger_button.css({'right' : '60px', 'top' : '60px'});
			logo_main_site.css('left',60);
		}
		if( nav_menu_left.length > 0 ){
			hamburger_button.css({'left' : '60px', 'top' : '60px'});
			logo_main_site.css('right',60);
		}
	}else{
		if( nav_menu_right.length > 0 ){
			hamburger_button.css({'right' : '20px', 'top' : '20px'});
			logo_main_site.css('left',40);
		}
		if( nav_menu_left.length > 0 ){
			hamburger_button.css({'left' : '20px', 'top' : '20px'});
			logo_main_site.css('right',40);
		}
	}
	
	function position_show_hide() {
		$('#as-mark-black-sidenav').fadeToggle(500);
		hamburger_button.toggleClass('as-close');
		if( nav_menu_right.length > 0 ){
			hamburger_button.toggleClass('as-position-right');
		}
		if( nav_menu_left.length > 0 ){
			hamburger_button.toggleClass('as-position-left');
		}
		main_nav_menu.toggleClass('as-menu-nav-active');
	}
	
	hamburger_button.click(function(){
		position_show_hide();
	});
	mobile_close_nav.click(function(){
		position_show_hide();
	});
	// ACTIVE MENU ONE PAGE
    menu_one_page.click(function () {
        menu_one_page.removeClass('active');
        $(this).addClass('active');
        position_show_hide();
    });
	
	// MENU HEADER FIXED 
	$(window).scroll(function(e){ 
		$el = $('#as-menu-header-1'); 
		
		if ( $(this).scrollTop() > 150 && $el.css('position') != 'fixed' ){ 			
			$el.css({'position': 'fixed', 'top': '0px', 'opacity':'0'}).animate({opacity:1},1000);		
		}
		if ($(this).scrollTop() < 80 && $el.css('position') == 'fixed'){
			$el.css({'position': 'relative'});			
		}
	});
	
	// SIZE SHOP CART
	var shop_cart_header  = $('.as-shop-search-wrapper .as-shop-cart-header'),
		shop_cart_content = $('.as-shop-cart-header .widget_shopping_cart_content');
	shop_cart_header.click(function(){
		shop_cart_content.addClass('as-cart-active');
	});
	shop_cart_content.mouseleave(function(){
		shop_cart_content.toggleClass('as-cart-active');
	});
	
	// 	SCROLL TO TOP
	var scroll_up = $('.as-scrollup');
	$(window).scroll(function(){
		if ($(this).scrollTop() > 500) {
			scroll_up.fadeIn("slow");
		} else {
			scroll_up.fadeOut("slow");
		}
	});
	scroll_up.click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600, 'easeOutExpo');
		return false;
	});
});
/**/
var optimizedScroll = (function($) {

    var callbacks = new Array(),
        running = false;

    // fired on resize event
    function scroll() {

        if (!running) {
            running = true;

            if (window.requestAnimationFrame) {
                window.requestAnimationFrame(runCallbacks);
            } else {
                setTimeout(runCallbacks, 66);
            }
        }

    }

    // run the actual callbacks
    function runCallbacks() {
        $.each(callbacks, function(k,callback){
            callback();
        });

        running = false;
    }

    // adds callback to loop
    function addCallback(callback) {

        if (callback) {
            callbacks.push(callback);
        }

    }

    return {
        // initalize resize event listener
        init: function(callback) {
            $(window).on('scroll', scroll);

            addCallback(callback);
        },

        // public method to add additional callback
        add: function(callback) {
            addCallback(callback);
        }
    }
}(jQuery));
optimizedScroll.init();

/**/
var optimizedResize = (function($) {

    var callbacks = new Array(),
        running = false;

    // fired on resize event
    function resize() {

        if (!running) {
            running = true;

            if (window.requestAnimationFrame) {
                window.requestAnimationFrame(runCallbacks);
            } else {
                setTimeout(runCallbacks, 66);
            }
        }

    }

    // run the actual callbacks
    function runCallbacks() {
        $.each(callbacks, function(k,callback){
            callback();
        });

        running = false;
    }

    // adds callback to loop
    function addCallback(callback) {

        if (callback) {
            callbacks.push(callback);
        }

    }

    return {
        // initalize resize event listener
        init: function(callback) {
            $(window).on('resize', resize);
            addCallback(callback);
        },

        // public method to add additional callback
        add: function(callback) {
            addCallback(callback);
        }
    }
}(jQuery));
optimizedResize.init(function(){});
/* Create cookie for like post */
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
