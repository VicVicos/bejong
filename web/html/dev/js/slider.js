var timeset;
// $('.slick-reviews').removeClass('loading')
var slick = $('.slider').slick({
    autoplay: false,
    arrows: true,
    dots: false,
    draggable: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    speed: 0
}).on('afterChange', function (slick, currentSlide) {
        $('.slider .slick-active').trigger('animationStart');
});
$('.slick-arrow').on('click', function(event) {
    event.preventDefault();
    animateSlide.pause(0, true);
    animateSlide2.pause(0, true);
    animateSlide3.pause(0, true);
    slick.slick('slickNext');
});
var speed = 1;
// Slide 1
var animateSlide = new TimelineMax({
    onComplete: function () {
        timeset = setTimeout(function () {
            slick.slick('slickNext');
            animateSlide.pause(0, true);
        }, 3000);
    }
});
// Slide 2
var animateSlide2 = new TimelineMax({
    paused: true,
    onComplete: function () {
        timeset = setTimeout(function () {
            slick.slick('slickNext');
            animateSlide2.pause(0, true);
        }, 3000);
    }
});
// Slide 3
var animateSlide3 = new TimelineMax({
    paused: true,
    onComplete: function () {
        timeset = setTimeout(function () {
            slick.slick('slickNext');
            animateSlide3.pause(0, true);
        }, 3000);
    }
});
// Slide 1
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
    }), TweenMax.to($('#sudno'), 1.5 * speed, {
        top: 40,
        opacity: 1,
        delay: 0,
        ease: Power1.easeIn
    }), TweenMax.to($('#sudno'), .8 * speed, {
        top: 350,
        opacity: 0,
        delay: 2.5,
        ease: Power1.easeIn
    })
]);
// SLide 2
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
    }), TweenMax.to($('#air'), 1.5 * speed, {
        left: -450,
        top: 0,
        opacity: 1,
        delay: 0,
        ease: Power1.easeIn
    }), TweenMax.to($('#air'), 1 * speed, {
        left: 600,
        top: -100,
        opacity: 0,
        delay: 4,
        ease: Power1.easeIn
    }), TweenMax.to($('#cloud'), 5 * speed, {
        right: 1500,
        delay: 0,
        ease: Power1.easeIn
    })
]);
animateSlide3.add([TweenMax.to($('#title-3'), .5 * speed, {
        top: 0,
        opacity: 1,
        ease: Power1.easeOut
    }), TweenMax.to($('#text-3'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: .5,
        ease: Power1.easeIn
    }), TweenMax.to($('#link-3'), .5 * speed, {
        top: 0,
        opacity: 1,
        delay: .75,
        ease: Power1.easeIn
    }), TweenMax.to($('#auto'), 1.5 * speed, {
        left: -200,
        opacity: 1,
        delay: 0.3,
        ease: Power1.easeIn
    }), TweenMax.to($('#gruz'), 1.3 * speed, {
        left: -480,
        opacity: 1,
        delay: 1,
        ease: Power1.easeIn
    }), TweenMax.to($('#guarantee'), 1.5 * speed, {
        opacity: 1,
        delay: 0,
        ease: Bounce.easeOut,
        rotation:30,
        scaleX:0.8
    }), TweenMax.to($('#auto'), 1.5 * speed, {
        left: 650,
        opacity: 0,
        delay: 3.5,
        ease: Power1.easeIn
    }), TweenMax.to($('#gruz'), 1.5 * speed, {
        left: -700,
        opacity: 0,
        delay: 3.5,
        ease: Power1.easeIn
    })
]);

$('.slide-1').on('animationStart', function () {
    console.log(1);
    animateSlide.restart();
});
$('.slide-2').on('animationStart', function () {
    console.log(2);
    animateSlide2.restart();
});
$('.slide-3').on('animationStart', function () {
    console.log(3);
    animateSlide3.restart();
});
