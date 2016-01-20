(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = $(this), settings = $.extend({
            format: "dropdown",
            sticky: false
        }, options);
        return this.each(function () {
            $(this).find(".as-nav-menu-button").on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                }
                else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle')
                multiTg();
            else
                cssmenu.addClass('dropdown');
            if (settings.sticky === true)
                cssmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 700;
                if ($(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function ($) {
    $(window).resize(function () { 
    var as_width;
    as_width = $(window).width();
    if (as_width < 996) {
        $(".as-sub-menu-scroll").html($(".as-mail-menu-scroll").html());
        $(".as-sub-menu-scroll").addClass("dslc-last-col dslc-col dslc-8-col");
        $(".as-menu-search").removeClass("dslc-last-col")
        $(".as-mail-menu-scroll").remove();
    }
    });
    $(document).ready(function () {
        var as_width;
    as_width = $(window).width();
    if (as_width < 996) {
        $(".as-sub-menu-scroll").html($(".as-mail-menu-scroll").html());
        $(".as-sub-menu-scroll").addClass("dslc-last-col dslc-col dslc-8-col");
        $(".as-menu-search").removeClass("dslc-last-col")
        $(".as-mail-menu-scroll").remove();
    }
        $("#as-menu-scroll").menumaker({
            format: "multitoggle"
        });
        
    });
})(jQuery);