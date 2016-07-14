var timeset;
// $('.slick-reviews').removeClass('loading')
var slick = $('.slider').slick({
    autoplay: false,
    arrows: false,
    dots: false,
    draggable: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true
}).on('afterChange', function (slick, currentSlide) {
        $('.slider .slick-active').trigger('animationStart');
});

var speed = 1.2;
var animateSlide = new TimelineMax({
    onComplete: function () {
        timeset = setTimeout(function () {
            slick.slick('slickNext');
            animateSlide.pause(0, true);
        }, 1000);
    }
});
animateSlide.add([TweenMax.to($('#title-1'), .5 * speed, {
        top: 0,
        opacity: 1,
        ease: Power1.easeOut
    }), TweenMax.to($('#text-1'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: .5,
        ease: Power1.easeIn
    }), TweenMax.to($('#link-1'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: .75,
        ease: Power1.easeIn
    }), TweenMax.to($('#sudno'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: 0,
        ease: Power1.easeIn
    }), TweenMax.to($('#sudno'), .3 * speed, {
        top: 200,
        opacity: 0,
        delay: 2,
        ease: Power1.easeIn
    })
]);
// Slide 2
var animateSlide2 = new TimelineMax({
    onComplete: function () {
        timeset = setTimeout(function () {
            slick.slick('slickNext');
            animateSlide2.pause(0, true);
        }, 1500);
    }
});
animateSlide2.add([TweenMax.to($('#title-2'), .5 * speed, {
        top: 0,
        opacity: 1,
        ease: Power1.easeOut
    }), TweenMax.to($('#text-2'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: .5,
        ease: Power1.easeIn
    }), TweenMax.to($('#link-2'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: .75,
        ease: Power1.easeIn
    }), TweenMax.to($('#air'), .5 * speed, {
        left: 0,
        top: 0,
        opacity: 1,
        delay: 0,
        ease: Power1.easeIn
    }), TweenMax.to($('#air'), .3 * speed, {
        left: 600,
        top: -100,
        opacity: 0,
        delay: 3.5,
        ease: Power1.easeIn
    }), TweenMax.to($('#cloud'), 1 * speed, {
        right: 1000,
        delay: 0,
        ease: Power1.easeIn
    })
]);
$('.slide-1').on('animationStart', function () {
    animateSlide.restart();
});
$('.slide-2').on('animationStart', function () {
    animateSlide2.restart();
});
