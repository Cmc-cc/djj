var lazyLoadApi;
var apiSlideContent;
var apiTypeSlideIndicators;
$(function () {
    var options = {
        containerScroll: ".mui-content.mui-scroll-wrapper",
        leftMenuScroll: ".mui-scroll-wrapper.side-menu-scroll-wrapper",
        rightMenuScroll: ".mui-scroll-wrapper.mui-assets",
        disabledHandSlip: ["mui-off-canvas-left"]
    };
    //muiInit(options);
   // loadDialog();
   // loadFloatPic();
    initBanner();
    initNotice();
    hideDesk();
    
    if (!lazyLoadApi) {
        lazyLoadApi = lazyLoadImg("body");
        lazyLoadApi.refresh(true)
    }
});

function slideHeight(obj, options) {
    var index = $(obj).data("swiper-slide-index");
    var targetSlide = $(".nav-slide-content .swiper-slide[data-swiper-slide-index=" + index + "]")[0];
    setTimeout(function () {
        $(".nav-slide-content>.swiper-wrapper").css({
            height: $(targetSlide).outerHeight()
        })
    }, 100)
}

function resizeSlideHeight() {
    var targetSlide = $(".nav-slide-content .swiper-slide-active");
    setTimeout(function () {
        $(".nav-slide-content>.swiper-wrapper").css({
            height: $(targetSlide).outerHeight()
        })
    }, 100)
}

function closeDownLoad() {
    $(".banner-ads").hide()
}

function swiper() {
    var siledSize = $(".nav .swiper-container a.swiper-slide").length;
    if (siledSize > 1) {
        var apiTypeLength = $("#apiTypeLength").val();
        apiSlideContent = new Swiper(".nav-slide-content", {
            loop: true,
            loopedSlides: siledSize,
            autoHeight: true,
            observer: true,//修改swiper自己或子元素时，自动初始化swiper 
            observeParents: true,//修改swiper的父元素时，自动初始化swiper 
            on: {
                slideChangeTransitionEnd: function () { }
            }
        });
        apiTypeSlideIndicators = new Swiper(".nav-slide-indicators", {
            loop: true,
            loopedSlides: siledSize,
            slidesPerView: apiTypeLength,
            touchRatio: 0.2,
            slideToClickedSlide: true,
            observer:true,//修改swiper自己或子元素时，自动初始化swiper 
            observeParents:true,//修改swiper的父元素时，自动初始化swiper 
            on: {
                slideChangeTransitionEnd: function () {
                    if ($(".nav-slide-content .swiper-slide-active").find("img[data-lazyload]").length > 0 || $(".nav-slide-content .swiper-slide-active").find("img[data-lazyload-id]").length > 0) {
                        if (!lazyLoadApi) {
                            lazyLoadApi = lazyLoadImg("body")
                        }
                        lazyLoadApi.refresh(true)
                    }
                    resizeSlideHeight();
                   // addClassForGame()
                }
            }
        });
        apiSlideContent.controller.control = apiTypeSlideIndicators;
        apiTypeSlideIndicators.controller.control = apiSlideContent
        
        var swiperdsf = new Swiper(".lottery_nav_api", {
            loop: false,
            loopedSlides: $(".lottery_nav_api .swiper-slide").length,
            slidesPerView: 3,
            slidesPerGroup: 3,
            observer: true,//修改swiper自己或子元素时，自动初始化swiper 
            observeParents: true,//修改swiper的父元素时，自动初始化swiper 
            on: {
                slideChangeTransitionEnd: function () {
                    console.log(this.activeIndex)
                    //showQuickData('', this.activeIndex);
                },
				click:function(e){
					showQuickData(this);
				}
            },
			initialSlide :0,
			init: function(){
			  showQuickData(this);
			}, 
        });
		
    }
   
}

function addClassForGame() {
    var nav_a = $("section.nav").find("a.swiper-slide-duplicate-active")[0];
    var obj = $(".lottery-nav");
    var af = $(obj).find("a.mui-active");
    var li;
    if (nav_a.name === "apiType_lottery" || nav_a.name === "apiType_chess-and-card") {
        li = $(af).parents("li." + nav_a.name)[1]
    }
    if (li) {
        var li_id = "nav-" + li.id;
        console.log("li_id:" + li_id);
        if (li_id) {
            var thdivs = $("div#" + li_id);
            $(thdivs).each(function (i) {
                $(this).addClass("mui-active")
            })
        }
    }
}

function initBanner() {
    if ($(".banner-slide .mui-slider-item").length > 1) {
        mui(".banner-slide").slider({
            interval: 5000
        })
    }
}

function initNotice() {
    $(".marquee").marquee({
        duration: 6000
    })
}

function initDialog() {
    mui(".mui-popover").popover("toggle", document.getElementById("openPopover"))
}

function dialog(obj, options) {
    var link = options.dataLink;
    if (link) {
        goToUrl(link)
    } else {
        initDialog()
    }
}

function closeBanner(obj, options) {
    $(".gb-banner").slideUp()
}

function showNotice(obj, options) {
    var noticeA = noticeIndicator = "";
    $(".notice .notice-list .marquee a").each(function () {
        noticeA += "<a href='javascript:'>" + $(this).html() + "</a>"
    });
    var noticeHtml = $('<div><div class="mui-slider notice-slider"><div class="mui-slider-group"><div class="mui-slider-item"><div class="mui-scroll-wrapper"><div class="mui-scroll"><div style="padding-right: 10px;">' + noticeA + "</div></div></div></div></div></div></div>");
    var alertNotice = mui.alert(noticeHtml.html(), "公告", "关闭");
    $(alertNotice.element).addClass("notice-alert");
    $(".notice-slider").css({
        height: $(window).height() * 5
    });
    mui(".notice-slider .mui-scroll-wrapper").scroll()
}

function changeNavGame(obj, options) {
    $(obj).parent().parent().find(".mui-active").removeClass("mui-active");
    $(obj).addClass("mui-active");
    var apiId = options.apiId;
    var apiTypeId = options.apiTypeId;
    $("div[name='nav-content-" + apiTypeId + "'] .mui-active").removeClass("mui-active");
    var navTarget = $("div#nav-" + apiTypeId + "-" + apiId);
    navTarget.addClass("mui-active");
    if ($(navTarget).find("img[data-lazyload]").length > 0) {
        lazyLoadApi.refresh(true)
    }
    resizeSlideHeight();
    $(obj).unlock()
}

function closeDesk(obj, options) {
    $("#deskTip").hide();
    setCookie("destHide", true)
}

function hideDesk() {
    var destHide = getCookie("destHide");
    if (os != "app_ios" || destHide) {
        $("#deskTip").hide()
    }
}

function hideEffect() {
    var showEffect = getCookie("showEffect");
    if (showEffect == "true" || showEffect == true) {
        $(".ads-slider").hide()
    }
}

function loadDialog() {
    var options = {
        url: root + "/index/dialog.html",
        dataType: "html",
        success: function (data) {
            $("body").append(data);
            initDialog()
        }
    };
    muiAjax(options)
}

function loadFloatPic() {
    var showEffect = getCookie("showEffect");
    if (showEffect == "true" || showEffect == true) {
        return
    }
    var options = {
        url: root + "/index/floatPic.html",
        dataType: "html",
        success: function (data) {
            $("body").append(data);
            hideEffect()
        }
    };
    muiAjax(options)
};