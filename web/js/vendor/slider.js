(function ($) {
    $(window).load(function () {
        var timeset;
        $('#slider-animate .inner').removeClass('loading')
        var slick = $('#slider-animate').slick({
            autoplay: false,
            arrows: false,
            dots: false,
            draggable: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true
        }).on('afterChange', function (slick, currentSlide) {
                $('#slider-animate .slick-active').trigger('animationStart');
        });
        var speed = 1.2;
        var animateSlide = new TimelineMax({
            onComplete: function () {
                timeset = setTimeout(function () {
                    slick.slick('slickNext');
                    animateSlide.pause(0, true);
                }, 1500);
            }
        });
        animateSlide.add([TweenMax.to($('#car'), 2.25 * speed, {
            left: 0,
            ease: Power1.easeOut
        }), TweenMax.to($('#box-3'), 1.06 * speed, {
            top: 241,
            ease: Power1.easeIn
        }), TweenMax.to($('#box-1'), 0.93 * speed, {
            right: 380,
            opacity: 1,
            delay: 1.07,
            ease: Power1.easeOut
        }), TweenMax.to($('#box-2'), 1.08 * speed, {
            top: 200,
            ease: Power1.easeIn
        }), TweenMax.to($('#box-5'), 1 * speed, {
            top: 210,
            ease: Power1.easeIn
        }), TweenMax.to($('#box-4'), 0.99 * speed, {
            top: 131,
            delay: 0.08,
            ease: Power1.easeIn
        }), TweenMax.to($('#box-8'), 0.93 * speed, {
            top: 144,
            delay: 0.15,
            ease: Power1.easeIn
        }), TweenMax.to($('#box-6'), 1.04 * speed, {
            top: 110,
            delay: 0.19,
            ease: Power1.easeIn
        }), TweenMax.to($('#box-7'), 1 * speed, {
            right: 0,
            ease: Power1.ease
        }), TweenMax.to($('#car-2'), 1 * speed, {
            right: 670,
            opacity: 1,
            delay: 1.5,
            ease: Power1.ease
        }), TweenMax.to($('#car-2-1'), .5 * speed, {
            top: -50,
            delay: 1.5,
            ease: Power1.ease
        }), TweenMax.to($('#car-2-1'), .5 * speed, {
            top: 0,
            delay: 2,
            ease: Power1.ease
        }), TweenMax.to($('#earth .info h5'), 1.75 * speed, {
            top: 0,
            opacity: 1,
            delay: 1.05,
            ease: Power1.ease
        }), TweenMax.to($('#earth .info .col'), 2 * speed, {
            top: 0,
            opacity: 1,
            delay: 1.05,
            ease: Power1.ease
        }), TweenMax.to($('#fly'), 3 * speed, {top: -50, right: -190, opacity: 1, delay: 1.05, ease: Power1.ease}),]);
        $('#animate-slide-1').on('animationStart', function () {
            animateSlide.restart();
        });
        var animateSlide2 = new TimelineMax({
            paused: true, onComplete: function () {
                timeset = setTimeout(function () {
                    slick.slick('slickNext');
                    animateSlide2.pause(0, true);
                }, 1500);
            }
        });
        animateSlide2.add([TweenMax.to($('#big-car'), 2 * speed, {
            right: 1903,
            ease: Power1.easeOut
        }), TweenMax.to($('#man'), 1.15 * speed, {
            right: 678,
            opacity: 1,
            ease: Power1.easeOut
        }), TweenMax.to($('#big-fly'), 1 * speed, {
            top: 0,
            left: 1903,
            delay: 1
        }), TweenMax.to($('#sert-3'), 1 * speed, {bottom: -25}), TweenMax.to($('#sert-2'), 0.9 * speed, {
            bottom: -25,
            delay: 0.17
        }), TweenMax.to($('#sert-1'), 0.5 * speed, {
            bottom: -25,
            delay: 0.7
        }), TweenMax.to($('#sert-4'), 1 * speed, {
            bottom: -25,
            delay: 0.1
        }), TweenMax.to($('#info-slide-2 h5'), 0.25 * speed, {
            top: 0,
            opacity: 1,
            delay: 0.1,
            ease: Power1.easeIn
        }), TweenMax.to($('#info-slide-2 ul'), 0.3 * speed, {left: 0, opacity: 1, delay: 0.2}),]);
        $('#animate-slide-2').on('animationStart', function () {
            animateSlide2.restart();
        });
        var animateSlide3 = new TimelineMax({
            paused: true, onComplete: function () {
                timeset = setTimeout(function () {
                    slick.slick('slickNext');
                    animateSlide3.pause(0, true);
                }, 2000);
            }
        });
        animateSlide3.add([TweenMax.to($('#light'), 1.1 * speed, {
            top: 0,
            ease: Power1.easeOut
        }), TweenMax.to($('#man-2'), 1.1 * speed, {
            bottom: 0,
            ease: Power1.easeOut
        }), TweenMax.to($('#light-line'), 0.02 * speed, {
            opacity: 1,
            delay: 1.1 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#light-line'), 0.02 * speed, {
            opacity: 0,
            delay: 1.12 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#light-line'), 0.02 * speed, {
            opacity: 1,
            delay: 1.14 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#light-line'), 0.04 * speed, {
            opacity: 0,
            delay: 1.16 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#light-line'), 0.02 * speed, {
            opacity: 1,
            delay: 1.20 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#light-line'), 0.02 * speed, {
            opacity: 0,
            delay: 1.22 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#light-line'), 0.04 * speed, {
            opacity: 1,
            delay: 1.24 * speed,
            ease: Power1.easeIn
        }), TweenMax.to($('#symb-1'), 0.3 * speed, {
            opacity: 1,
            top: 200,
            left: 380,
            scale: 1,
            rotation: 0,
            delay: 1.6 * speed,
            ease: Power1.easeOut
        }), TweenMax.to($('#symb-2'), 0.2 * speed, {
            opacity: 1,
            top: 195,
            left: 520,
            scale: 1,
            rotation: 0,
            delay: 1.61 * speed,
            ease: Power1.easeOut
        }), TweenMax.to($('#symb-3'), 0.2 * speed, {
            opacity: 1,
            top: 430,
            left: 395,
            scale: 1,
            rotation: 0,
            delay: 1.59 * speed,
            ease: Power1.easeOut
        }), TweenMax.to($('#symb-4'), 0.2 * speed, {
            opacity: 1,
            top: 390,
            left: 575,
            scale: 1,
            rotation: 0,
            delay: 1.7 * speed
        }), TweenMax.to($('#symb-5'), 0.2 * speed, {
            opacity: 1,
            top: 360,
            left: 375,
            scale: 1,
            rotation: 0,
            delay: 1.5 * speed
        }), TweenMax.to($('#symb-6'), 0.2 * speed, {
            opacity: 1,
            top: 320,
            left: 595,
            scale: 1,
            rotation: 0,
            delay: 1.5 * speed
        }), TweenMax.to($('#info-slide-3 #persents'), 0.4 * speed, {
            opacity: 1,
            top: 0,
            delay: 1.55 * speed
        }), TweenMax.to($('#info-slide-3 h5'), 0.4 * speed, {opacity: 1, left: 0, delay: 1.55 * speed}),]);
        $('#animate-slide-3').on('animationStart', function () {
            animateSlide3.restart();
        });
        var animateSlide4 = new TimelineMax({
            paused: true, onComplete: function () {
                timeset = setTimeout(function () {
                    slick.slick('slickNext');
                    animateSlide4.pause(0, true);
                }, 8000);
            }
        });
        animateSlide4.add([]);
        $('#animate-slide-4').on('animationStart', function () {
            timeset = setTimeout(function () {
                slick.slick('slickNext');
            }, 5000);
        });
        var animateSlide5 = new TimelineMax({
            paused: true, onComplete: function () {
                timeset = setTimeout(function () {
                    slick.slick('slickNext');
                    animateSlide5.pause(0, true);
                }, 8000)
            }
        });
        animateSlide5.add([]);
        $('#animate-slide-5').on('animationStart', function () {
            /*timeset = setTimeout(function () {
                slick.slick('slickNext');
            }, 5000);*/
        });
        $('.b-action').click(function() {
            animateSlide.pause(0, true);
            animateSlide2.pause(0, true);
            animateSlide3.pause(0, true);
            animateSlide4.pause(0, true);
            animateSlide5.pause(0, true);
            clearTimeout(timeset);
            timeset = false;
            $('#slider-animate').slick('slickGoTo', 4);
            setTimeout(function() {
                slick.slick('slickNext');
            }, 60000);
        });
    });
}(jQuery));
