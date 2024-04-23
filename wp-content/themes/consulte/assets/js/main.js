(function ($) {
    "use strict";

    /*--
        Commons Variables
    -----------------------------------*/
    var $window = $(window),
        $body = $('body');

    /*--
        Custom script to call Background
        Image & Color from html data attribute
    -----------------------------------*/
    $('[data-bg-image]').each(function () {
        var $this = $(this),
            $image = $this.data('bg-image');
        $this.css('background-image', 'url(' + $image + ')');
    });
    $('[data-bg-color]').each(function () {
        var $this = $(this),
            $color = $this.data('bg-color');
        $this.css('background-color', $color);
    });
    $('[data-color]').each(function () {
        var $this = $(this),
            $color = $this.data('color');
        $this.css('color', $color);
    });

    /*--
        Header Sticky
    -----------------------------------*/
    $window.on('scroll', function () {
        if ($window.scrollTop() > 80) {
            $('.consulte-header').addClass('is-sticky');
        } else {
            $('.consulte-header').removeClass('is-sticky');
        }
    });


    /*--
        Off Canvas Function
    -----------------------------------*/
    $('.consulte-mobile-menu-toggle, .consulte-mobile-menu-close').on('click', '.toggle', function () {
        $body.toggleClass('mobile-menu-open');
    });
    $('.consulte-site-mobile-menu').on('click', '.menu-toggle', function (e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.siblings('.consulte-sub-menu:visible').length) {
            $this.siblings('.consulte-sub-menu').slideUp().parent().removeClass('open').find('.consulte-sub-menu').slideUp().parent().removeClass('open');
        } else {
            $this.siblings('.consulte-sub-menu').slideDown().parent().addClass('open').siblings().find('.consulte-sub-menu').slideUp().parent().removeClass('open');
        }
    });
    $body.on('click', function (e) {
        if (!$(e.target).closest('.consulte-site-main-mobile-menu').length && !$(e.target).closest('.consulte-mobile-menu-toggle').length) {
            $body.removeClass('mobile-menu-open');
        }
    });


    //Header Search
    if($('.search-box-outer').length) {
        $('.search-box-outer').on('click', function() {
            $('body').addClass('search-active');
        });
        $('.close-search').on('click', function() {
            $('body').removeClass('search-active');
        });
    }


})(jQuery);