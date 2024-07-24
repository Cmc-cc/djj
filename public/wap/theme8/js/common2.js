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
    
    $("#hongbao").on("tap", ".icon-close", function (e) {
        e.stopPropagation();
        $(this).parent().hide()
    });
    $(".desk").on("tap", ".close", function () {
        $(this).parents(".desk").hide()
    })
});