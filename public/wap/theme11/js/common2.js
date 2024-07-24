$(function () {
    mui(".mui-content.mui-scroll-wrapper").scroll({
        scrollY: true,
        scrollX: false,
        startX: 0,
        startY: 0,
        indicators: false,
        deceleration: 0.0006,
        bounce: true
    });
    $(".banner-slide").on("tap", ".close-slide", function () {
        $(this).parent().hide()
    });
    mui(".ads-slider").on("tap", ".close-ads", function () {
        $(".ads-slider").hide()
    });
    mui(".side-menu-scroll-wrapper").scroll({
        scrollY: true,
        scrollX: false,
        startX: 0,
        startY: 0,
        indicators: true,
        deceleration: 0.0006,
        bounce: true
    });
    $(".lottery-nav li").on("tap", function () {
        $(this).siblings().find("a").removeClass("mui-active");
        $(this).find("a").addClass("mui-active")
    });
    mui(".side-nav").on("tap", "li", function () {
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        if ($(this).hasClass("lang")) {
            $(".lang-menu").toggle()
        }
    });
    $(".mui-off-canvas-wrap").on("hidden", function (event) {
        $(".lang-menu").hide()
    });
    mui("body").on("tap", "a[href$=html]", function () {
        document.location.href = this.href;
        console.log(this.href)
    });
    $("#login-info").on("click", function () {
        $(".money-shadow").fadeIn(300);
        $(".ex").addClass("open");
        mui(".mui-assets").scroll({
            scrollY: true,
            scrollX: false,
            startX: 0,
            startY: 0,
            indicators: true,
            deceleration: 0.0006,
            bounce: true
        })
    });
    $(".money-shadow").on("tap", function () {
        $(".money-shadow").fadeOut(300);
        $(".ex").removeClass("open")
    });
    $(".lottery-nav li").on("tap", function () {
        $(this).siblings("li").find("a").removeClass("mui-active");
        $(this).find("a").addClass("mui-active");
        $(".lottery-content .mui-control-content").removeClass("mui-active");
        var index = $(this).index();
        $(this).parents(".lottery-nav").next().find(".mui-control-content").eq(index).addClass("mui-active");
        $(this).parents(".swiper-wrapper").css({
            height: $(this).parents(".lottery-nav").next().find(".mui-control-content").eq(index).outerHeight() + 48
        })
    });
    $(".swiper-container.nav-slide-indicators").on("tap", ".swiper-slide", function (e) {
        var index = $(this).data("swiper-slide-index");
        var targetSlide = $(".nav-slide-content .swiper-slide[data-swiper-slide-index=" + index + "]")[0];
        console.log($(targetSlide).outerHeight());
        setTimeout(function () {
            $(".nav-slide-content>.swiper-wrapper").css({
                height: $(targetSlide).outerHeight()
            })
        }, 100)
    });
    $("#hongbao").on("tap", ".icon-close", function (e) {
        e.stopPropagation();
        $(this).parent().hide()
    });
    $(".desk").on("tap", ".close", function () {
        $(this).parents(".desk").hide()
    })
});