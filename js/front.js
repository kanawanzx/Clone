window.AS      = window.AS || {};
AS.Models      = AS.Models || {};
AS.Collections = AS.Collections || {};
AS.Views       = AS.Views || {};
AS.Routers     = AS.Routers || {};
AS.globals     = as_globals;
AS.pubsub      = AS.pubsub || {};
_.extend(AS.pubsub, Backbone.Events);

(function($, Models, Collections, Views) {
	/**
	*
	* F R O N T  V I E W S
	*
	**/
	Views.Front = Backbone.View.extend({
		el: 'body',
		events: {
			'click .trigger-search' : 'showSearchForm',
			'click .as-menu-roll li a' : 'scrollTo',
			'click .as-post-like' : 'likePost'
		},
		initialize: function() {
			//console.log('init front');
		},
		likePost: function(event){
			event.preventDefault();
			var target = $(event.currentTarget),
			id         = target.attr('data-id'),
			heart = target.find('.dslc-icon-heart'),
			count = target.find('.number-like-heart');
			if( ! target.hasClass('loading') && ! target.hasClass('active') ){
				$.ajax({
					url : as_globals.ajaxURL,
					type : 'post',
					data : {
						action : 'as_like_post',
						content: {
							id : target.attr('data-id')
						}
					},
					beforeSend : function(){
						target.addClass('loading');
					},
					error : function(request){

					},
					success : function(response){
						target.removeClass('loading');
						if(response.success){
							target.addClass('active');
							count.text(response.count);
							createCookie('as_like_'+target.attr('data-id'), 1, 365);
						} else {
							alert('Error');
						}
					}
				});
			}
		},
		showSearchForm: function(event){
			event.preventDefault();
			var target = $(event.currentTarget),
			id         = target.attr('data-id');
			formSearch = new DialogFx( document.getElementById(id) );
			formSearch.toggle();
		},
		scrollTo: function(event){
			var target = $(event.currentTarget),
			id         = target.attr('href'),
			offset     = id !== "#home" ? $(id).offset().top : 0;
			//check is normal link or not
			if(id.indexOf("#") > -1){
				$('html, body').animate({
			        scrollTop: offset
			    }, 2000,'easeOutExpo');
			    return false;
			} else {
				return true;
			}
		},
		renderProject: function(event){
			event.preventDefault();
			var target = $(event.currentTarget);

			if(target.attr('data-id') && ! target.hasClass('loading')){
				$.ajax({
					url : as_globals.ajaxURL,
					type : 'post',
					data : {
						action : 'as_load_project',
						content: {
							id : target.attr('data-id')
						}
					},
					beforeSend : function(){
						target.addClass('loading');
						$('.mask-color-port').fadeIn('300');
					},
					error : function(request){

					},
					success : function(response){
						$('.mask-color-port').fadeOut('300');
						var container = $("#as_portfolio_content .as-port-content"),
							control   = $("#as_portfolio_content .as-port-control");
						target.removeClass('loading');
						if(response.success){
							
							if(!target.hasClass('next') &&  !target.hasClass('prev')){
								$("#as_portfolio_content").fadeIn('500', function() {
									$('html, body').animate({
								        scrollTop: $("#as_portfolio_content").offset().top
								    }, 2000,'easeOutExpo');
								});
							}

							control.find('a.prev').attr('data-id',response.prev_post);
							control.find('a.next').attr('data-id',response.next_post);
							container.html(response.html);
						} else {
							alert('Error');
						}
					}
				});
			}
		}
	});
})(jQuery, window.AS.Models, window.AS.Collections, window.AS.Views);