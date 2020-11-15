$(document).ready(function () {
    'use strict';
    /*-----------------------------------------------------------------------------------*/
    /*	SCROLL NAVIGATION HIGHLIGHT
    /*-----------------------------------------------------------------------------------*/
    var headerWrapper = parseInt($('.navbar').height(), 10);
    var header_height = $('.navbar').height();
    var shrinked_header_height = 70;
    var firstStyle =
        {
            'padding-top': '' + shrinked_header_height + 'px',
            'margin-top': '-' + shrinked_header_height + 'px'
        };
    $('.onepage section').css(firstStyle);
    var secondStyle =
        {
            'padding-top': '' + header_height + 'px',
            'margin-top': '-' + header_height + 'px'
        };
    $('.onepage section:first-of-type').css(secondStyle);
    var offsetTolerance = -(header_height);
    //Detecting user's scroll
    $(window).scroll(function () {
        //Check scroll position
        var scrollPosition = parseInt($(this).scrollTop(), 10);
        //Move trough each menu and check its position with scroll position then add current class
        $('.onepage .navbar ul.navbar-nav a').each(function () {
            var thisHref = $(this).attr('href');
            var thisTruePosition = parseInt($(thisHref).offset().top, 10);
            var thisPosition = thisTruePosition - headerWrapper - offsetTolerance;
            if (scrollPosition >= thisPosition) {
                $('.current').removeClass('current');
                $('.navbar ul.navbar-nav a[href=' + thisHref + ']').parent('li').addClass('current');
            }
        });
        //If we're at the bottom of the page, move pointer to the last section
        var bottomPage = parseInt($(document).height(), 10) - parseInt($(window).height(), 10);
        if (scrollPosition == bottomPage || scrollPosition >= bottomPage) {
            $('.current').removeClass('current');
            $('.onepage .navbar ul.navbar-nav a:last').parent('li').addClass('current');
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	MENU
	/*-----------------------------------------------------------------------------------*/
    $('.js-activated').dropdownHover({
        instantlyCloseOthers: false,
        delay: 0
    }).dropdown();
    $('.btn.responsive-menu').on('click', function () {
        $(this).toggleClass('opn');
    });
    $('.onepage .navbar .nav li a').on('click', function () {
        $('.navbar .navbar-collapse.in').collapse('hide');
        $('.btn.responsive-menu').removeClass('opn');
    });
    $('.offset').css('padding-top', $('.navbar').height() + 'px');
    /*-----------------------------------------------------------------------------------*/
    /*	STICKY FILTER HIGHLIGHT
    /*-----------------------------------------------------------------------------------*/
    var stickyWrapper = parseInt($('#sticky-filter').height(), 10);
    var stickyOffsetTolerance = 70;
    //Detecting user's scroll
    $(window).scroll(function () {
        //Check scroll position
        var stickyScrollPosition = parseInt($(this).scrollTop(), 10);
        //Move trough each menu and check its position with scroll position then add current class
        $('#sticky-filter a').each(function () {
            var stickyThisHref = $(this).attr('href');
            var stickyThisTruePosition = parseInt($(stickyThisHref).offset().top, 10);
            var stickyThisPosition = stickyThisTruePosition - stickyWrapper - stickyOffsetTolerance;
            if (stickyScrollPosition >= stickyThisPosition) {
                $('.current').removeClass('current');
                $('#sticky-filter a[href=' + stickyThisHref + ']').parent('li').addClass('current');
            }
        });
        //If we're at the bottom of the page, move pointer to the last section
        var stickyBottomPage = parseInt($(document).height(), 10) - parseInt($(window).height(), 10);
        if (stickyScrollPosition == stickyBottomPage || stickyScrollPosition >= stickyBottomPage) {
            $('.current').removeClass('current');
            $('#sticky-filter a:last').parent('li').addClass('current');
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	LOCALSCROLL
	/*-----------------------------------------------------------------------------------*/
    $('.navbar, .scroll').localScroll({
        hash: true
    });
    $('#sticky-filter ul').localScroll({
        offset: {top: -134, left: 0}
    });
    /*-----------------------------------------------------------------------------------*/
    /*	STICKY FILTER
    /*-----------------------------------------------------------------------------------*/
    $("#sticky-filter").sticky({topSpacing: 70, className: "sfilter", responsiveBreakpoint: 0});
    /*-----------------------------------------------------------------------------------*/
    /*	CUBE PORTFOLIO
    /*-----------------------------------------------------------------------------------*/
    $('.cbp-onepage-grid').cubeportfolio({
        filters: '#js-filters-full-width',
        loadMore: '#cbp-onepage-grid-more',
        loadMoreAction: 'click',
        layoutMode: 'mosaic',
        sortToPreventGaps: true,
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 10,
        gapVertical: 10,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 768,
            cols: 3
        }, {
            width: 767,
            cols: 1
        }],
        caption: 'fadeIn',
        displayType: 'lazyLoading',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        // singlePageInline
        singlePageInlineDelegate: '.cbp-singlePageInline',
        singlePageInlinePosition: 'top',
        singlePageDeeplinking: true,
        singlePageInlineInFocus: true,
        offsetValue: 100,
        singlePageInlineCallback: function (url, element) {
            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
            var t = this;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 10000
            }).done(function (result) {
                t.updateSinglePageInline(result);
            }).fail(function () {
                t.updateSinglePageInline('AJAX Error! Please refresh the page!');
            });
        }
    });
    $('#js-grid-full-width').cubeportfolio({
        filters: '#js-filters-full-width',
        loadMore: '#js-grid-full-width-more',
        loadMoreAction: 'click',
        layoutMode: 'mosaic',
        sortToPreventGaps: true,
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 2560,
            cols: 6
        }, {
            width: 1920,
            cols: 5
        }, {
            width: 1450,
            cols: 4
        }, {
            width: 1024,
            cols: 3
        }, {
            width: 768,
            cols: 2
        }, {
            width: 650,
            cols: 1
        }],
        caption: 'fadeIn',
        displayType: 'lazyLoading',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        // singlePageInline
        singlePageInlineDelegate: '.cbp-singlePageInline',
        singlePageInlinePosition: 'top',
        singlePageDeeplinking: true,
        singlePageInlineInFocus: true,
        offsetValue: 100,
        singlePageInlineCallback: function (url, element) {
            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
            var t = this;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 10000
            }).done(function (result) {
                t.updateSinglePageInline(result);
            }).fail(function () {
                t.updateSinglePageInline('AJAX Error! Please refresh the page!');
            });
        }
    });
    $('#js-grid-mosaic').cubeportfolio({
        filters: '#js-filters-mosaic',
        loadMore: '#js-grid-mosaic-more',
        loadMoreAction: 'click',
        layoutMode: 'mosaic',
        sortToPreventGaps: true,
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 768,
            cols: 4
        }, {
            width: 767,
            cols: 2
        }],
        caption: 'fadeIn',
        displayType: 'lazyLoading',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        // singlePageInline
        singlePageInlineDelegate: '.cbp-singlePageInline',
        singlePageInlinePosition: 'top',
        singlePageDeeplinking: true,
        singlePageInlineInFocus: true,
        offsetValue: 100,
        singlePageInlineCallback: function (url, element) {
            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
            var t = this;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 10000
            }).done(function (result) {
                t.updateSinglePageInline(result);
            }).fail(function () {
                t.updateSinglePageInline('AJAX Error! Please refresh the page!');
            });
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	OWL CAROUSEL
	/*-----------------------------------------------------------------------------------*/
    $('.carousel-boxed').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        navText: ['', ''],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
    $('.basic-slider').owlCarousel({
        items: 1,
        nav: true,
        navText: ['', ''],
        dots: true,
        autoHeight: false,
        loop: true,
        margin: 0
    });
    $('.blog-carousel').owlCarousel({
        items: 5,
        nav: true,
        navText: ['', ''],
        dots: false,
        loop: false,
        margin: 0,
        autoWidth: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1441: {
                items: 3
            },
            1921: {
                items: 4
            }
        }
    });
    $('.clients').owlCarousel({
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        margin: 50,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 3
            },
            768: {
                items: 5
            },
            1200: {
                items: 6
            }
        }
    });
    $('.testimonials').owlCarousel({
        items: 1,
        nav: false,
        dots: false,
        autoHeight: true,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        margin: 0
    });
    /*-----------------------------------------------------------------------------------*/
    /*	SWIPER
	/*-----------------------------------------------------------------------------------*/
    $('.swiper-container.gallery').each(function () {
        $(this).swiper({
            grabCursor: true,
            slidesPerView: 'auto',
            wrapperClass: 'swiper',
            slideClass: 'item',
            offsetPxBefore: 0,
            offsetPxAfter: 0
        });

        var $swipers = $(this);

        $swipers.siblings('.arrow-left').on("click", function () {
            $swipers.data('swiper').swipeTo($swipers.data('swiper').activeIndex - 1);
            return false;
        });
        $swipers.siblings('.arrow-right').on("click", function () {
            $swipers.data('swiper').swipeTo($swipers.data('swiper').activeIndex + 1);
            return false;
        });
    });
    /*-----------------------------------------------------------------------------------*/
    /*	FITVIDS VIDEO
	/*-----------------------------------------------------------------------------------*/
    $('.player').fitVids();
    /*-----------------------------------------------------------------------------------*/
    /*	IMAGE ICON HOVER
	/*-----------------------------------------------------------------------------------*/
    $('.icon-overlay a').prepend('<span class="icn-more"></span>');
    /*-----------------------------------------------------------------------------------*/
    /*	REVOLUTION
	/*-----------------------------------------------------------------------------------*/
    $('.tp-fullscreen').revolution({
        delay: 9000,
        startwidth: 1170,
        startheight: 750,
        hideThumbs: 0,
        hideArrowsOnMobile: "on",
        fullWidth: "on",
        fullScreen: "on",
        soloArrowLeftHOffset: 0,
        soloArrowRightHOffset: 0,
        fullScreenOffsetContainer: ".mode-sm:not(.onepage) .navbar, .mode-xs:not(.onepage) .navbar"
    });
    /*-----------------------------------------------------------------------------------*/
    /*	FANCYBOX
	/*-----------------------------------------------------------------------------------*/
    $(".fancybox-media").fancybox({
        arrows: true,
        padding: 0,
        closeBtn: true,
        openEffect: 'fade',
        closeEffect: 'fade',
        prevEffect: 'fade',
        nextEffect: 'fade',
        helpers: {
            media: {},
            overlay: {
                locked: false
            },
            buttons: false,
            thumbs: false,
            /*thumbs: {
                width: 50,
                height: 50
            },*/
            title: {
                type: 'inside'
            }
        },
        beforeLoad: function () {
            var el, id = $(this.element).data('title-id');
            if (id) {
                el = $('#' + id);
                if (el.length) {
                    this.title = el.html();
                }
            }
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	PROGRESS BAR
	/*-----------------------------------------------------------------------------------*/
    $('.progress-list .progress .bar').progressBar({
        shadow: false,
        percentage: false,
        animation: true,
        height: 15
    });
    /*-----------------------------------------------------------------------------------*/
    /*	TABS
	/*-----------------------------------------------------------------------------------*/
    $('.tabs.tabs-top').easytabs({
        animationSpeed: 300,
        updateHash: false
    });
    /*-----------------------------------------------------------------------------------*/
    /*	TOGGLE
	/*-----------------------------------------------------------------------------------*/
    $('.panel-group').find('.panel-default:has(".in")').addClass('panel-active');
    $('.panel-group').on('shown.bs.collapse', function (e) {
        $(e.target).closest('.panel-default').addClass(' panel-active');
    }).on('hidden.bs.collapse', function (e) {
        $(e.target).closest('.panel-default').removeClass(' panel-active');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	BACKGROUND VIDEO PARALLAX
	/*-----------------------------------------------------------------------------------*/
    $('#video-office').backgroundVideo({
        $outerWrap: $('.outer-wrap'),
        pauseVideoOnViewLoss: false,
        parallaxOptions: {
            effect: 1.9
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	PARALLAX MOBILE
	/*-----------------------------------------------------------------------------------*/
    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) {
        $('.parallax').addClass('mobile');
    }
    /*-----------------------------------------------------------------------------------*/
    /*	DATA REL
	/*-----------------------------------------------------------------------------------*/
    $('a[data-rel]').each(function () {
        $(this).attr('rel', $(this).data('rel'));
    });
    /*-----------------------------------------------------------------------------------*/
    /*	PRETTIFY
	/*-----------------------------------------------------------------------------------*/
    window.prettyPrint && prettyPrint()
    /*-----------------------------------------------------------------------------------*/
    /*	TOOLTIP
    /*-----------------------------------------------------------------------------------*/
    if ($("[rel=tooltip]").length) {
        $("[rel=tooltip]").tooltip();
    }
    /*-----------------------------------------------------------------------------------*/
    /* INPUT FOCUS
	/*-----------------------------------------------------------------------------------*/
    $('.comment-form input[title], .comment-form textarea').each(function () {
        if ($(this).val() === '') {
            $(this).val($(this).attr('title'));
        }

        $(this).focus(function () {
            if ($(this).val() == $(this).attr('title')) {
                $(this).val('').addClass('focused');
            }
        });
        $(this).blur(function () {
            if ($(this).val() === '') {
                $(this).val($(this).attr('title')).removeClass('focused');
            }
        });
    });
    /*-----------------------------------------------------------------------------------*/
    /* WIDTH CLASS
	/*-----------------------------------------------------------------------------------*/
    assign_bootstrap_mode();
    $(window).resize(function () {
        assign_bootstrap_mode();
    });

    function assign_bootstrap_mode() {
        var width = $(window).width();
        var mode = '';
        if (width < 768) {
            mode = "mode-xs";
        } else if (width < 992) {
            mode = "mode-sm";
        } else if (width < 1200) {
            mode = "mode-md";
        } else if (width > 1200) {
            mode = "mode-lg";
        }
        $("body").removeClass("mode-xs").removeClass("mode-sm").removeClass("mode-md").removeClass("mode-lg").addClass(mode);
    }

    /*-----------------------------------------------------------------------------------*/
    /*	INSTAGRAM
    /*-----------------------------------------------------------------------------------*/
    var instagramFeed = new Instafeed({
        get: 'user',
        limit: 10,
        userId: 1215763826,
        accessToken: 'b6e6007c38mshdc423e78f17f93ep15cb8fjsnc35404446d07',
        resolution: 'low_resolution',
        template: '<div class="item"><figure class="icon-overlay"><a href="{{link}}"><img src="{{image}}" /></a></figure></div>',
        after: function () {
            $('#instafeed .item .icon-overlay a').prepend('<span class="icn-more"></span>');
            var $portfoliogrid = $('.image-grid .isotope');
            $portfoliogrid.isotope({
                itemSelector: '.item',
                transitionDuration: '0.7s',
                masonry: {
                    columnWidth: $portfoliogrid.width() / 12
                },
                layoutMode: 'masonry'
            });
            $(window).resize(function () {
                $portfoliogrid.isotope({
                    masonry: {
                        columnWidth: $portfoliogrid.width() / 12
                    }
                });
            });
            $portfoliogrid.imagesLoaded(function () {
                $portfoliogrid.isotope('layout');
            });
        }
    });
    $('#instafeed').each(function () {
        instagramFeed.run();
    });
    var instagramFeed2 = new Instafeed({
        target: 'instafeed-widget',
        get: 'user',
        limit: 6,
        userId: 1215763826,
        accessToken: 'f067fcf0b777f7831009d39d830a95eb',
        resolution: 'low_resolution',
        template: '<div class="item"><figure class="icon-overlay"><a href="{{link}}"><img src="{{image}}" /></a></figure></div>',
        after: function () {
            $('#instafeed-widget .item .icon-overlay a').prepend('<span class="icn-more"></span>');
            var $portfoliogrid = $('.image-grid .isotope');
            $portfoliogrid.isotope({
                itemSelector: '.item',
                transitionDuration: '0.7s',
                masonry: {
                    columnWidth: $portfoliogrid.width() / 12
                },
                layoutMode: 'masonry'
            });
            $(window).resize(function () {
                $portfoliogrid.isotope({
                    masonry: {
                        columnWidth: $portfoliogrid.width() / 12
                    }
                });
            });
            $portfoliogrid.imagesLoaded(function () {
                $portfoliogrid.isotope('layout');
            });
        }
    });
    $('#instafeed-widget').each(function () {
        instagramFeed2.run();
    });
    /*-----------------------------------------------------------------------------------*/
    /*	FLICKR
    /*-----------------------------------------------------------------------------------*/
    $('.flickr-feed').dcFlickr({
        limit: 10,
        q: {
            id: '51789731@N07',
            lang: 'en-us',
            format: 'json',
            jsoncallback: '?'
        },
        onLoad: function () {
            $('.flickr-feed .item .icon-overlay a').prepend('<span class="icn-more"></span>');
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE GRID VIEW COL3
    /*-----------------------------------------------------------------------------------*/
    var $gridviewcol3 = $('.grid-view.col3 .isotope');
    $gridviewcol3.isotope({
        itemSelector: '.grid-view-post',
        transitionDuration: '0.6s',
        masonry: {
            columnWidth: '.col-sm-6.col-md-4'
        },
        layoutMode: 'masonry'
    });
    $(window).resize(function () {
        $gridviewcol3.isotope({
            masonry: {
                columnWidth: '.col-sm-6.col-md-4'
            }
        });
    });
    $gridviewcol3.imagesLoaded(function () {
        $gridviewcol3.isotope('layout');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE GRID VIEW COL2
    /*-----------------------------------------------------------------------------------*/
    var $gridviewcol2 = $('.grid-view.col2 .isotope');
    $gridviewcol2.isotope({
        itemSelector: '.grid-view-post',
        transitionDuration: '0.6s',
        masonry: {
            columnWidth: '.col-md-6.col-sm-12'
        },
        layoutMode: 'masonry'
    });
    $(window).resize(function () {
        $gridviewcol2.isotope({
            masonry: {
                columnWidth: '.col-md-6.col-sm-12'
            }
        });
    });
    $gridviewcol2.imagesLoaded(function () {
        $gridviewcol2.isotope('layout');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE PORTFOLIO GRID
    /*-----------------------------------------------------------------------------------*/
    var $portfoliogrid = $('.image-grid .isotope');
    $portfoliogrid.isotope({
        itemSelector: '.item',
        transitionDuration: '0.7s',
        masonry: {
            columnWidth: $portfoliogrid.width() / 12
        },
        layoutMode: 'masonry'
    });
    $(window).resize(function () {
        $portfoliogrid.isotope({
            masonry: {
                columnWidth: $portfoliogrid.width() / 12
            }
        });
    });
    $portfoliogrid.imagesLoaded(function () {
        $portfoliogrid.isotope('layout');
    });
});
/*-----------------------------------------------------------------------------------*/
/*	LOADING
/*-----------------------------------------------------------------------------------*/
$(window).load(function () {
    $('#status').fadeOut();
    $('#preloader').delay(100).fadeOut('slow');
    $('#preloader .textload').delay(0).fadeOut('slow');
    $('body').delay(350).css({
        'overflow': 'visible'
    });
});
/*-----------------------------------------------------------------------------------*/
/*	FORM
/*-----------------------------------------------------------------------------------*/
// document.addEventListener("DOMContentLoaded", function() {
//     var myForm;
//     myForm = new VanillaForm(document.querySelector("form.vanilla"));
// });
/*-----------------------------------------------------------------------------------*/

/*	STICKY HEADER
/*-----------------------------------------------------------------------------------*/
function init() {
    "use strict";
    window.addEventListener('scroll', function (e) {
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 100,
            header = document.querySelector(".navbar");
        if (distanceY > shrinkOn) {
            classie.add(header, "fixed");
        } else {
            if (classie.has(header, "fixed")) {
                classie.remove(header, "fixed");
            }
        }
    });
}

window.onload = init();
$(window).resize(function () {
    $('.offset').css('padding-top', $('.navbar').height() + 'px');
});

jQuery(document).ready(function ($) {
    var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;

    //close team-member bio
    $(document).on('click', '.slide-portfolio-overlay, .slide-portfolio-item-content-close', function (event) {
        event.preventDefault();
        $('.slide-portfolio-item-content').removeClass('slide-in');
        $('.slide-portfolio-item-content-close').removeClass('is-visible');

        if (is_firefox) {
            $('main').removeClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        } else {
            $('main').removeClass('slide-out');
            $('body').removeClass('overflow-hidden');
        }
    });


    $(document).ready(function () {

        $('.sm_open').on('click', function () {
            var modal = $(this).attr('data-modal');
            var modaloverlaycolor = $(this).attr('data-overlay');
            var modaleffect = $(this).attr('data-effect');
            var modalheader = $(this).attr('data-header');
            var modalheadertype = $(this).attr('data-header-type');
            var modalcontent = $(this).attr('data-content');
            var modaliconside = $(this).attr('data-icons');
            var modalwrappercolor = $(this).attr('data-wrapper-color');

            $('#' + modal).addClass(modaloverlaycolor);
            $('#' + modal + ' .sm_content').addClass(modaleffect);
            $('#' + modal + ' .sm_content .sm_header').html(modalheader);
            $('#' + modal + ' .sm_content .sm_header').addClass(modalheadertype);
            $('#' + modal + ' .sm_content .sm_area_all').html(modalcontent);
            $('#' + modal + ' .sm_icon_menu').addClass(modaliconside);
            $('#' + modal + ' .sm_content').addClass(modalwrappercolor);
            $('#' + modal).fadeIn().css("display", "flex");
            setTimeout(function () {
                $('#' + modal + ' .sm_content').addClass('show');
            }, 400);
        });

        $('.sm_close').on('click', function () {
            var $modal = $(this).parents('.slim_modal');
            closeModal($modal);
        });

        $('.slim_modal').on('click', function (e) {
            if (e.target !== this)
                return;
            var $modal = $(this);
            closeModal($modal);
        });

        function closeModal($modal) {
            $modal.find('.sm_content').removeClass('show');
            setTimeout(function () {
                $modal.removeClass('red green tan none');
                $modal.find('.sm_content').removeClass('red green tan');
                $modal.find('.sm_icon_menu').removeClass('is_right is_left');
                $modal.find('.sm_header').removeClass('detached');
                $modal.fadeOut();
            }, 400);
        }
    });


    function validateForm(formId) {
        let valid = true;
        let form = document.getElementById(formId);
        for (let index = 0; index < form.elements.length; index++) {
            form.elements[index].addEventListener("change", ev => {
                if (validateElement(ev.target)){
                    ev.target.className = "";
                }
            });
            if (!form.elements[index].value && form.elements[index].required || !validateElement(form.elements[index])) {
                form.elements[index].className = "error";
                valid = false;
            }
        }
        return valid;
    }

    function generateFormData(formId) {
        const tokenString = "41e8091d45dda7e0dbc6edc8168b8795"
        let form = document.getElementById(formId);
        let body = new FormData();
        body.append("hash", tokenString)
        for (let index = 0; index < form.elements.length; index++) {
            body.append(form.elements[index].name, form.elements[index].value);
        }
        return body;
    }

    function validateElement(element) {
        let messageFormRules = {
            phone:{
                rule: /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im,
            },
            email:{
                rule: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            }
        }

        let fieldName = "" + element.name + "";
        if (fieldName in messageFormRules){
            const re = messageFormRules[element.name].rule;
            return re.test(element.value);
        }
        return true;
    }



    function sendMail(formData, formId)
    {
           fetch('/contacts/mail', {
                method: 'POST',
                body: formData,
            }).then(result => {
                if (result.status === 200) {
                    document.getElementById(formId).reset();
                    showInfoMessage('<strong>Спасибо,</strong> я отвечу Вам в ближаешее время.')
                } else {
                    document.getElementById(formId).reset();
                    showAlertMessage('<strong>Error!</strong> Упс... Попробуйте еще раз');
                }
            });
    }

    function resetNotification() {
        document.getElementById('alertMessage').setAttribute("hidden", "true");
    }

    function showAlertMessage(message){
        document.getElementById('alertMessage').removeAttribute("hidden");
        document.getElementById('alertMessage').setAttribute("class", "alert alert-danger");
        $("#alertMessage").html(message);
        setTimeout(resetNotification, 5000);
    }

    function showInfoMessage(message){
        document.getElementById('alertMessage').removeAttribute("hidden");
        document.getElementById('alertMessage').setAttribute("class", "alert alert-info");
        $("#alertMessage").html(message);
        setTimeout(resetNotification, 5000);
    }


    document.getElementById("modalButton").addEventListener("click", ev => {
        ev.preventDefault();
        let valid = validateForm("myModalForm");
        if (valid){
            let formData = generateFormData("myModalForm");
            sendMail(formData,"myModalForm");
        }
    });

    if (document.getElementById("sendMessage")) {
        document.getElementById("sendMessage").addEventListener("click", ev => {
            ev.preventDefault();
            let valid = validateForm("myContactsForm");
            if (valid) {
                let formData = generateFormData("myContactsForm");
                sendMail(formData, "myContactsForm");
            }
        });
    }
});

