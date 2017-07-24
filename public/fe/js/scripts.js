
(function($) {
    "use strict";
    /*==============================
        Is mobile
    ==============================*/
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    }

    /*==============================
        Main
    ==============================*/

    function main() {
        fnHeader();
        GoogleMap();
        /*==============================
            SELECT STYLE
        ==============================*/
        if ($('select').length) {
            $.each($('select'), function() {
                var selected = $(this).find('option:selected').text();
                $(this)
                    .wrap('<div class="select-custom"></div>')
                    .css({
                        'z-index':10,
                        'opacity':0,
                    })
                    .after('<span class="select">' +
                                selected +
                            '</span>' +
                            '<i class="fa fa-caret-down">' +
                            '</i>'
                    )
                    .change(function() {
                        var val = $('option:selected',this).text();
                        $(this).next().text(val);
                    });
            });
        }

        /*==============================
            Scroll To and popup
        ==============================*/
        $(".scroll-to-menu .awe-btn").on('click', function(){
            $("html,body").animate({
                scrollTop:$("#the-menu").offset().top
            }, 800, 'easeInOutExpo');
            return false;
        });
        $(".scroll-to-events .awe-btn").on('click', function(){
            $("html,body").animate({
                scrollTop:$("#events").offset().top
            }, 800, 'easeInOutExpo');
            return false;
        });

        $('.awe-title-3').each(function() {
            $(this)
                .append('<span class="before">\
                         </span>\
                         <span class="after">\
                         </span>\
                        ');
            var $aweTitle = $(this),
                heightRibb = $aweTitle.height() / 2 + 1,
                widthRibb = $aweTitle.height() / 2 - 22,
                $before = $aweTitle.find('.before'),
                $after = $aweTitle.find('.after');
            if (window.innerWidth > 767) {
                if ($aweTitle.find('h3').hasClass('big') || $aweTitle.find('h3').hasClass('sbig')) {
                    var heightRibb = $aweTitle.height() / 2;
                    $aweTitle.css('border', '0');
                }
            }
                $before.css({
                    'border-width': heightRibb + 'px ' + widthRibb + 'px',
                });
                $after.css({
                    'border-width': heightRibb + 'px ' + widthRibb + 'px',
                });
        });


        if ($('.open-popup-reservation').length) {
            $('.open-popup-reservation .awe-btn').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midclick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-reservation'
            });
        };

        /*==============================
            Toggle cart
        ==============================*/
        $(document).on('click', '.toggle-minicart', function() {
            $('.minicart-body')
                .toggleClass('cart-toggle');
        });
        $('.navigation').on('click', '.toggle-minicart', function() {
            $('.minicart-body')
                .toggleClass('cart-toggle');
        });

        $(document).on('click', function() {
            $('.minicart-body')
                .removeClass('cart-toggle');
        });
        $(document).on('click', '.minicart-wrap', function(e) {
            e.stopPropagation();
        });


        /*==============================
            Home slider
        ==============================*/
        if ($('.home-slider').length) {
            var slider = $('.home-slider').bxSlider({
                mode: 'fade',
                auto: true,
                speed: 1200,
                slideMargin: 0,
                pager: true,
                controls: false,
                prevText: '<i class="fa fa-angle-double-left"></i>',
                nextText: '<i class="fa fa-angle-double-right"></i>',
                onSliderLoad: function(currentIndex) {
                        $('.home-slider').children().eq(currentIndex).addClass('active-slide');
                    },
                onSlideBefore: function($slideElement, newIndex){
                    $('.home-slider').children().removeClass('active-slide');
                    $slideElement.addClass('active-slide');
                }
            });

            // custom slider img
            var background = $('.home-slider').data('background');
            $('.home-slider li img')
                .before(function () {
                    var srcImg = $(this).attr('src');
                    return '<div class="item-img ' + background +  '" style="background-image: url(' + srcImg + ')">';
                });
            $('.home-slider')
                .find('.image-wrap')
                    .append('<div class="awe-overlay overlay-default"></div>');
        }


        /*==============================
            Event slider
        ==============================*/
        if ($('.event-slider').length) {
            $('.event-slider').bxSlider({
                mode: 'fade',
                speed: 1000,
                slideMargin: 0,
                pager: true,
                controls: false,
                pagerCustom: '.event-pager'
            });
            colPagerEvent();
        }

        /*==============================
            Event scroll
        ==============================*/
        var $scrollbarEvent = $('.event-pager-scroll');
        $scrollbarEvent.perfectScrollbar({
            maxScrollbarLength: 150,
            suppressScrollY: true,
            useBothWheelAxes: true,
            includePadding: true
        });

        /*==============================
            Map show
        ==============================*/
        var dataText1 = $('.see-map a').data('see-contact'),
            dataText2 = $('.see-map a').data('see-map');
        $('.see-map a').text(dataText2);
        $('.see-map').delegate('a', 'click', function(e) {
            e.preventDefault();
            $('.contact-first')
                .find('.contact-body')
                    .slideToggle(300);
            $('.contact-first')
                .find('.awe-overlay')
                    .fadeToggle(300);
            $('.contact-first')
                .find('.section-content')
                    .toggleClass('pd0');

            $(this).text(dataText2);
            if ($('.section-content').hasClass('pd0')) {
                $(this).text(dataText1);
            }
        });
        var heightMap = $('.contact-first').find('.section-content').outerHeight();
        $('.contact-first').height(heightMap);

        /*==============================
            Testimonial slider
        ==============================*/
        if ($(".testimonial-slider").length) {
            $(".testimonial-slider").owlCarousel({
                autoPlay: 20000,
                slideSpeed: 300,
                navigation: false,
                pagination: true,
                singleItem: true,
                navigationText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>']
            });
        }
        /*==============================
            Milestones slider
        ==============================*/
        if ($(".milestones-slider").length) {
            $(".milestones-slider").owlCarousel({
                items: 5,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [992,3],
                itemsTablet: [767,2],
                itemsTabletSmall: [600,1],
                slideSpeed: 200,
                navigation: true,
                pagination: false,
                navigationText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>']
            });
        }
        /*==============================
            Our story slider
        ==============================*/
        if ($('.our-story').length) {
            $('.story-slider').bxSlider({
                mode: 'fade',
                speed: 600,
                slideMargin: 0,
                pager: true,
                controls: false,
                pagerCustom: '.story-pager'
            });
            $('.story-pager').owlCarousel({
                items: 5,
                itemsCustom: [[0,3], [400,4], [700,5]],
                slideSpeed: 300,
                navigation: false,
                pagination: false,
                addClassActive: true,
                touchDrag: false,
                mouseDrag: false
            });
            var totalActive = $('.story-pager').find('.owl-item.active').length;
            $('.story-pager .active:eq('+ totalActive +')').find('.line').hide();
            $('.story-pager').delegate('.owl-item ', 'click', function() {
                $('.story-pager').find('.owl-item').css('border', '0');
                if ($(this).prevAll('.active').length == 0) {
                    if ($(this).index() > 0){

                        $(this).find('.line').fadeIn(400);
                        $('.story-pager').trigger('owl.prev');
                        $('.story-pager .active:eq('+ totalActive +')').find('.line').fadeOut(500);
                    }

                }
                if ($(this).prevAll('.active').length ==  $('.story-pager').find('.owl-item.active').length -1) {

                    if ($(this).index() < $('.story-pager').find('.owl-item').length -1) {

                        $(this).next().find('.line').fadeOut(400);
                        $(this).find('.line').fadeIn(400);
                        $('.story-pager').trigger('owl.next');
                    }


                }
            });

        }

        /*==============================
            Staff slider
        ==============================*/
        if ($('.staff-slider').length) {
            $('.staff-slider').owlCarousel({
                items: 3,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [992,2],
                itemsTablet: [767,2],
                itemsTabletSmall: [600,1],
                slideSpeed: 300,
                navigation: true,
                pagination: false,
                navigationText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>']
            });
        }
        /*==============================
            Gallery slider
        ==============================*/
        if ($('.gallery-slider').length) {
            $('.gallery-slider').owlCarousel({
                items: 5,
                autoPlay: true,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [992,3],
                itemsTablet: [767,3],
                itemsTabletSmall: [600,2],
                slideSpeed: 300,
                navigation: false,
                pagination: false,
                navigationText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>']
            });
            //Popup
            $('.gallery-slider').magnificPopup({
                delegate: '.gallery-item a',
                type: 'image',
                closeOnContentclick: false,
                closeBtnInside: false,
                mainClass: 'pp-gallery mfp-with-zoom mfp-img-mobile',
                image: {
                    verticalFit: true,
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function(element) {
                        return element.find('img');
                    }
                },
            });
            $('.gallery-item a').hover(function() {
                $('.gallery-item a').addClass('grayscale');
                $(this).removeClass('grayscale');
            }, function() {
                $('.gallery-item a').removeClass('grayscale');
            });
        }
        /*==============================
            Ajax popup
        ==============================*/
        if ($('.pp-product-detail').length) {
            $('.pp-product-detail').magnificPopup({
                type: 'ajax'
            });
        }


        /*==============================
            Accordion
        ==============================*/
        $('.accordion-wrap .collapse').on('shown.bs.collapse', function() {
            $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
        }).on('hidden.bs.collapse', function(){
            $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
        });


        /*==============================
            Validate message
        ==============================*/
        if($('#send-message-form').length) {
            $('#send-message-form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name.",
                        minlength: $.format("At least {0} characters required.")
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email."
                    },
                    message: {
                        required: "Please enter a message.",
                        minlength: $.format("At least {0} characters required.")
                    }
                },

                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        success: function(responseText, statusText, xhr, $form) {
                            $('#contact-content').slideUp(600, function() {
                                $('#contact-content').html(responseText).slideDown(600);
                            });
                        }
                    });
                    return false;
                }
            });
        }

        /*==============================
            Validate reservation
        ==============================*/
        if($('#reservation-form').length) {
            $('#reservation-form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 2
                    },
                    note: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name.",
                        minlength: $.format("At least {0} characters required.")
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email."
                    },
                    phone: {
                        required: "Please enter your phone.",
                        minlength: $.format("At least {0} characters required.")
                    },
                    note: {
                        required: "Please enter a note.",
                        minlength: $.format("At least {0} characters required.")
                    }
                },

                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        success: function(responseText, statusText, xhr, $form) {
                            $('#reservation-form-content').slideUp(600, function() {
                                $('#reservation-form-content').html(responseText).slideDown(600);
                            });
                        }
                    });
                    return false;
                }
            });
        }


    }

    /*==============================
        Header
    ==============================*/

    function fnHeader() {

        //Nav
        var $nav = $('.navigation'),
            flagResize = 0,
            mediascreen = $nav.data('menu-type'),
            windowWidth = window.innerWidth,
            $minicart = $('.minicart-wrap');
        if (windowWidth <= mediascreen) {
            flagResize = 1;
            $('header.header').prependTo('body');
            $('body').prepend('<div class="menu-mobile"></div>');
            $nav.appendTo('.menu-mobile');
            $('.open-menu-mobile')
                .show()
                .before($('.minicart-wrap'));
        }
        $(window).resize(function() {
            var $nav = $('.navigation'),
            mediascreen = $nav.data('menu-type'),
            windowWidth = window.innerWidth,
            $minicart = $('.minicart-wrap');
            if (windowWidth <= mediascreen && !flagResize) {
                flagResize = 1;
                $('header.header').prependTo('body');
                $('body').prepend('<div class="menu-mobile"></div>');
                $nav.appendTo('.menu-mobile');
                $('.open-menu-mobile')
                    .show()
                    .before($('.minicart-wrap'));
            }
            if (windowWidth > mediascreen && flagResize) {
                flagResize = 0;
                $('header.header').prependTo('#page-wrap');
                $('.menu-mobile').remove();
                $nav.appendTo('header.header .container');
                $('.navigation .nav').after($('.minicart-wrap'));
                $('.open-menu-mobile').hide();
            }
        });
        var wHeight = $(window).height(),
            headerHeight = $('header.header').height(),
            homeHeight = wHeight - $('header.header').height();
        $('.home-fullscreen').height(homeHeight);
        $('.header-sticky')
            .closest('#page-wrap')
            .prepend('<div class="sticky-fix"></div>');
        $(window).on('scroll', function() {
            //header fixed
            var windownScrolltop = $(window).scrollTop();
            if (windownScrolltop > 180) {
                $('.header-sticky')
                    .addClass('header-fixed');
                $('.sticky-fix').height(headerHeight);
            } else {
                $('.header-sticky')
                    .removeClass('header-fixed');
                $('.sticky-fix').height(0);
            }
        });
        var $haschild = $('.nav .menu-item-has-children');
        $('html').on('click', function() {
            $('#page-wrap, .header').removeClass('toggle-translate');
            $('.open-menu-mobile').removeClass('open-menu-active');
            $('.menu-mobile').removeClass('fixSfr');
            setTimeout(function() {
                if (windowWidth <= mediascreen) {
                    $('html, body').removeClass('overflow-hidden');
                    $('.menu-mobile').removeClass('overflow-auto');
                    $haschild
                        .children('.plus')
                            .removeClass('plus-active')
                        .siblings('.sub-menu')
                            .slideUp();
                }
            }, 290);
        });
        $('.open-menu-mobile').on('click', function() {
            $('#page-wrap, .header').toggleClass('toggle-translate');
            $(this).toggleClass('open-menu-active');
            $('.menu-mobile').toggleClass('fixSfr');
            setTimeout(function() {
                if (windowWidth <= mediascreen) {
                    $('html, body').toggleClass('overflow-hidden');
                    $('.menu-mobile').toggleClass('overflow-auto');
                    $haschild
                        .children('.plus')
                            .removeClass('plus-active')
                        .siblings('.sub-menu')
                            .slideUp();
                }
            }, 290);
        });
        $('.navigation, .open-menu-mobile').on('click', function(evt) {
            evt.stopPropagation();
        });
        $haschild.prepend('<span class="plus"><span>+</span></span>');
        $haschild.on('click', '> .plus', function() {
            if ($(this).hasClass('plus-active') == false) {
                $(this)
                    .parent()
                        .siblings()
                            .children('.plus')
                                .removeClass('plus-active')
                            .siblings('.sub-menu')
                                .slideUp(300);
            }
            $(this)
                .toggleClass('plus-active')
                .siblings('.sub-menu')
                    .slideToggle(300);
        });

        $('.navigation').find('.nav > li').on('click', '> a', function(evt) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 800, 'easeInOutExpo');
            setTimeout(function() {
                $('#page-wrap, .header').removeClass('toggle-translate');
                $('.open-menu-mobile').removeClass('open-menu-active');
                $('.menu-mobile').removeClass('fixSfr');
                setTimeout(function() {
                    $('html, body').removeClass('overflow-hidden');
                    $('.menu-mobile').removeClass('overflow-auto');
                    $('.menu-mobile .nav .menu-item-has-children')
                        .children('.plus')
                            .removeClass('plus-active')
                        .siblings('.sub-menu')
                            .slideUp();
                }, 290);
            },700);
            evt.preventDefault();
        });

        $('.navigation .sub-menu').each(function() {
            var offsetLeft = $(this).offset().left,
                width = $(this).width(),
                offsetRight = ($(window).width() - (offsetLeft + width));

            if (offsetRight < 60) {
                $(this)
                .removeClass('left')
                .addClass('right');
            } else {
                $(this)
                .removeClass('right');
            }
            if (offsetLeft < 60) {
                $(this)
                    .removeClass('right')
                    .addClass('left');
            } else {
                $(this)
                    .removeClass('left');
            }
        });
    }


    function setHeight() {
        var wHeight = $(window).height(),
            headHeight = $('header.header').height(),
            homeHeight = wHeight - headHeight,
            homefixheight = $('.home-fixheight').height();
        $('.home-fullscreen, .home-fullscreen .image-wrap, .home-fullscreen .home-slider').height(homeHeight);
        $('.home-fixheight .image-wrap, .home-fixheight .home-slider').height(homefixheight);

    }

    /*==============================
        Google map
    ==============================*/
    function GoogleMap() {
        if ($('#map').length) {
            // Option map
            var $map = $('#map'),
                mapZoom = $map.data('map-zoom'),
                lat = $map.data('map-latlng').split(',')[0],
                lng = $map.data('map-latlng').split(',')[1],
                marker = $map.data('map-marker'),
                width = parseInt($map.data('map-marker-size').split('*')[0]),
                height = parseInt($map.data('map-marker-size').split('*')[1]),
                grayscale = [
                    {featureType: 'all',  stylers: [{saturation: -100},{gamma: 0.50}]}
                ],
                blue = [
                    {featureType: 'all',  stylers: [{hue: '#0000b0'},{invert_lightness: 'true'},{saturation: -30}]}
                ],
                dark = [
                    {featureType: 'all',  stylers: [{ hue: '#ff1a00' },{ invert_lightness: true },{ saturation: -100  },{ lightness: 33 },{ gamma: 0.5 }]}
                ],
                pink = [
                    {"stylers": [{ "hue": "#ff61a6" },{ "visibility": "on" },{ "invert_lightness": true },{ "saturation": 40 },{ "lightness": 10 }]}
                ],
                light = [
                    {"featureType": "water","elementType": "all","stylers": [{"hue": "#e9ebed"},{"saturation": -78},{"lightness": 67},{"visibility": "simplified"}]
                    },{"featureType": "landscape","elementType": "all","stylers": [{"hue": "#ffffff"},{"saturation": -100},{"lightness": 100},{"visibility": "simplified"}]
                    },{"featureType": "road","elementType": "geometry","stylers": [{"hue": "#bbc0c4"},{"saturation": -93},{"lightness": 31},{"visibility": "simplified"}]
                    },{"featureType": "poi","elementType": "all","stylers": [{"hue": "#ffffff"},{"saturation": -100},{"lightness": 100},{"visibility": "off"}]
                    },{"featureType": "road.local","elementType": "geometry","stylers": [{"hue": "#e9ebed"},{"saturation": -90},{"lightness": -8},{"visibility": "simplified"}]
                    },{"featureType": "transit","elementType": "all","stylers": [{"hue": "#e9ebed"},{"saturation": 10},{"lightness": 69},{"visibility": "on"}]
                    },{"featureType": "administrative.locality","elementType": "all","stylers": [ {"hue": "#2c2e33"},{"saturation": 7},{"lightness": 19},{"visibility": "on"}]
                    },{"featureType": "road","elementType": "labels","stylers": [{"hue": "#bbc0c4"},{"saturation": -93},{"lightness": 31},{"visibility": "on"}]
                    },{"featureType": "road.arterial","elementType": "labels","stylers": [{"hue": "#bbc0c4"},{"saturation": -93},{"lightness": -2},{"visibility": "simplified"}]}
                ],
                blueessence = [
                    {featureType: "landscape.natural",elementType: "geometry.fill",stylers: [{ "visibility": "on" },{ "color": "#e0efef" }]
                    },{featureType: "poi",elementType: "geometry.fill",stylers: [{ "visibility": "on" },{ "hue": "#1900ff" },{ "color": "#c0e8e8" }]
                    },{featureType: "landscape.man_made",elementType: "geometry.fill"
                    },{featureType: "road",elementType: "geometry",stylers: [{ lightness: 100 },{ visibility: "simplified" }]
                    },{featureType: "road",elementType: "labels",stylers: [{ visibility: "off" }]
                    },{featureType: 'water',stylers: [{ color: '#7dcdcd' }]
                    },{featureType: 'transit.line',elementType: 'geometry',stylers: [{ visibility: 'on' },{ lightness: 700 }]}
                ],
                bentley = [
                    {featureType: "landscape",stylers: [{hue: "#F1FF00"},{saturation: -27.4},{lightness: 9.4},{gamma: 1}]
                    },{featureType: "road.highway",stylers: [{hue: "#0099FF"},{saturation: -20},{lightness: 36.4},{gamma: 1}]
                    },{featureType: "road.arterial",stylers: [{hue: "#00FF4F"},{saturation: 0},{lightness: 0},{gamma: 1}]
                    },{featureType: "road.local",stylers: [{hue: "#FFB300"},{saturation: -38},{lightness: 11.2},{gamma: 1}]
                    },{featureType: "water",stylers: [{hue: "#00B6FF"},{saturation: 4.2},{lightness: -63.4},{gamma: 1}]
                    },{featureType: "poi",stylers: [{hue: "#9FFF00"},{saturation: 0},{lightness: 0},{gamma: 1}]}
                ],
                retro = [
                    {featureType:"administrative",stylers:[{visibility:"off"}]
                    },{featureType:"poi",stylers:[{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"simplified"}]
                    },{featureType:"water",stylers:[{visibility:"simplified"}]},{featureType:"transit",stylers:[{visibility:"simplified"}]},{featureType:"landscape",stylers:[{visibility:"simplified"}]
                    },{featureType:"road.highway",stylers:[{visibility:"off"}]},{featureType:"road.local",stylers:[{visibility:"on"}]
                    },{featureType:"road.highway",elementType:"geometry",stylers:[{visibility:"on"}]},{featureType:"water",stylers:[{color:"#84afa3"},{lightness:52}]},{stylers:[{saturation:-17},{gamma:0.36}]
                    },{featureType:"transit.line",elementType:"geometry",stylers:[{color:"#3f518c"}]}
                ],
                cobalt = [
                    {featureType: "all",elementType: "all",stylers: [{invert_lightness: true},{saturation: 10},{lightness: 30},{gamma: 0.5},{hue: "#435158"}]}
                ],
                brownie = [
                    {"stylers": [{ "hue": "#ff8800" },{ "gamma": 0.4 }]}
                ];
            var mapTheme;
            switch($map.data('snazzy-map-theme')){
                case 'grayscale' : {
                    mapTheme = grayscale;
                } break;
                case 'blue' : {
                    mapTheme = blue;
                } break;
                case 'dark' : {
                    mapTheme = dark;
                } break;
                case 'pink' : {
                    mapTheme = pink;
                } break;
                case 'light' : {
                    mapTheme = light;
                } break;
                case 'blue-essence' : {
                    mapTheme = blueessence;
                } break;
                case 'bentley' : {
                    mapTheme = bentley;
                } break;
                case 'retro' : {
                    mapTheme = retro;
                } break;
                case 'cobalt' : {
                    mapTheme = cobalt;
                } break;
                case 'brownie' : {
                    mapTheme = brownie;
                } break;
                default : {
                    mapTheme = grayscale;
                }
            }

            // Map
            if (isMobile.any()) {
                var noDraggableMobile = false;
            } else {
                var noDraggableMobile = true;
            }
            var MY_MAPTYPE_ID = 'custom_style';
            var featureOpts = mapTheme;
            var latlng = new google.maps.LatLng(lat, lng);
            var settings = {
                zoom: mapZoom,
                center: latlng,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
                },
                mapTypeControl: false,
                mapTypeId: MY_MAPTYPE_ID,
                scrollwheel: false,
                draggable: noDraggableMobile,
            };

            var map = new google.maps.Map(document.getElementById("map"), settings);
            var styledMapOptions = {
                name: 'Custom Style'
            };
            var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

            map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

            google.maps.event.addDomListener(window, "resize", function () {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                map.setCenter(center);
            });
            var companyImage = new google.maps.MarkerImage(marker,
                new google.maps.Size(width, height),
                new google.maps.Point(0, 0)
            );
            var companyPos = new google.maps.LatLng(lat, lng);
            var companyMarker = new google.maps.Marker({
                position: companyPos,
                map: map,
                icon: companyImage,
                title: "Road",
                zIndex: 3
            });
        }
    }

    /*==============================
        BLOG GRID
    ==============================*/
    function masonry() {
        if ($('.blog-grid').length) {
            $('.blog-grid').masonry({
                columnWidth: '.grid-sizer',
                itemSelector: '.post'
            });
        }
    }


    /*==============================
        BUTTON STYLE
    ==============================*/
    function aweBtn() {
        $.each($('.awe-btn'), function() {
            var classtype = $(this).attr("class");
            $(this)
                .wrap('<div class="' + classtype +'"></div>')
                .removeClass();
        });
    }

    /*==============================
        Set col pager
    ==============================*/
    function colPagerEvent() {
        var widthitem = $('.event-pager-scroll').width()/3;
        if (window.innerWidth <= 480  ) {
            var widthitem = $('.event-pager-scroll').width()/2;
        }
        var $item = $('.event-pager a'),
            $allitem = $item.length,
            allwidthitem = $allitem * widthitem;
        $item.css('width', widthitem);
        $('.event-pager').css({
            'width': allwidthitem
        });
    }
    /*==============================
        Divider
    ==============================*/
    function divider() {
        $.each($('.divider'), function() {
            var bgcolor = $(this).css('color'),
                color = bgcolor,
                svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="8 px" viewBox="0 0 96.166 48.083" enable-background="new 0 0 96.166 48.083" xml:space="preserve"><polyline fill="'+color+'" points="0,48.083 48.083,0 96.166,48.083 "/></svg>',
                encoded = window.btoa(svg);
            $(this).css({
                'background-image': 'url(data:image/svg+xml;base64,' + encoded + ')'
            });
        });
    }
    var ie = (function() {
        var undef,
            v = 3,
            div = document.createElement('div'),
            all = div.getElementsByTagName('i');
        while (
            div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
            all[0]
        );
        var checkIe9 = v > 4 ? v : undef;
        if (checkIe9){
            if (checkIe9 > 9) {
                divider();
            }
        } else {
            divider();
        }
        return v > 4 ? v : undef;
    });

    function parallaxInit() {
        if ($('.awe-parallax').length) {
            if (isMobile.any()) {
            } else {
                $('.home-media .awe-parallax').parallax("50%", 0.1);
                $('.our-story .awe-parallax').parallax("50%", 0.1);
                $('.the-menu .awe-parallax').parallax("50%", 0.1);
                $('.the-staff .awe-parallax').parallax("50%", 0.1);
                $('.events .awe-parallax').parallax("50%", 0.1);
                $('.testimonial .awe-parallax').parallax("50%", 0.1);
                $('.sub-banner .awe-parallax').parallax("50%", 0.1);
            }
        }
    }

    // READY FUNCTION
    $(document).ready(function() {
        main();
        ie();
        // GoogleMap();

        $(window).on('load', function() {
            aweBtn();
            masonry();
            setHeight();
            parallaxInit();

            //Preloader
            $('.preloader').addClass('load-anim');

            var widthPagerEvent = $('.event-pager-scroll').outerHeight();
            $('.event-pager-scroll').css('margin-top', - widthPagerEvent);
        });

        $(window).on('resize', function() {
            setHeight();
            colPagerEvent();
        });

        if (isMobile.iOS()) {
            $('.awe-parallax, .awe-static, .home-slider li .image-wrap .item-img')
                .addClass('fix-background-ios');
        }

    });
})(jQuery);
