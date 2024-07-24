var os = whatOs();
var isNative = isNative();
var LOGIN_TARGET_URL = "loginTargetUrl";
var SESSION_API_OBJ = "api_object";
var muiDefaultOptions = {
    containerScroll: ".mui-content.mui-scroll-wrapper",
    rightMenuScroll: ".mui-scroll-wrapper.mui-assets",
    disabledHandSlip: [".mui-off-canvas-left"],
    horizontalScroll: [""],
    horizontalVerticalScroll: [""]
};
function pullUpRefreshOption(container, callback, auto) {
    if (!auto) {
        auto = false
    }
    var pullUpRefresh = {
        pullRefresh: {
            container: container,
            up: {
                height: 100,
                auto: auto,
                contentdown: window.top.message.promo_auto["上拉加载"],
                contentrefresh: "正在加载...",
                contentnomore: "已经到底了",
                callback: callback
            }
        }
    };
    return pullUpRefresh
}
function muiInit(options) {
    if (!options) {
        options = {}
    }
    if (options.init) {
        mui.init(options.init)
    } else {
        mui.init()
    }
    if (options.containerScroll) {
        muiScrollY(options.containerScroll)
    }
    if (options.rightMenuScroll) {
        muiScrollY(options.rightMenuScroll)
    }
    if (options.horizontalScroll) {
        var horizontalScroll = options.horizontalScroll;
        for (var i = 0; i < horizontalScroll.length; i++) {
            if (horizontalScroll[i]) {
                muiScrollX(horizontalScroll[i])
            }
        }
    }
    if (options.disabledHandSlip) {
        var disableClass = options.disabledHandSlip;
        for (var i = 0; i < disableClass.length; i++) {
            if (document.querySelector(disableClass[i])) {
                document.querySelector(disableClass[i]).addEventListener("drag", function (e) {
                    e.stopPropagation()
                })
            }
        }
    }
    var horizontalVerticalScroll = options.horizontalVerticalScroll;
    if (horizontalVerticalScroll && horizontalVerticalScroll.length > 0) {
        for (var i = 0; i < horizontalVerticalScroll.length; i++) {
            if (horizontalVerticalScroll[i]) {
                muiScrollXY(horizontalVerticalScroll[i])
            }
        }
    }
    muiAjaxError();
    bindButtonEvent();
    resizeKeyboard();
    muiBack();
    bindHrefTarget()
}
function bindHrefTarget() {
    $("a[href][target='_blank']").on("tap", function () {
        var url = $(this).attr("href");
        if (url) {
            openWindow(url)
        }
    })
}
function muiBack() {
    mui.back = function () {
        sessionStorage.removeItem(SESSION_API_OBJ);
        sessionStorage.removeItem(LOGIN_TARGET_URL);
        if (typeof mui.options.beforeback === "function") {
            if (mui.options.beforeback() === false) {
                return
            }
        }
        mui.doAction("backs")
    }
}
function resizeKeyboard() {
    if (/Android/gi.test(navigator.userAgent)) {
        window.addEventListener("resize", function () {
            if (document.activeElement.tagName == "INPUT" || document.activeElement.tagName == "TEXTAREA") {
                window.setTimeout(function () {
                    document.activeElement.scrollIntoViewIfNeeded()
                }, 0)
            }
        })
    }
}
function muiScrollY(obj, options) {
    if (!options) {
        options = {
            scrollY: true,
            scrollX: false,
            startX: 0,
            startY: 0,
            indicators: false,
            deceleration: 0.0006,
            bounce: true
        }
    }
    mui(obj).scroll(options)
}
function muiScrollX(obj, options) {
    if (!options) {
        options = {
            scrollY: false,
            scrollX: true,
            startX: 0,
            startY: 0,
            indicators: false,
            deceleration: 0.0006,
            bounce: false
        }
    }
    mui(obj).scroll(options)
}
function muiScrollXY(obj, options) {
    if (!options) {
        options = {
            scrollY: true,
            scrollX: true,
            startX: 0,
            startY: 0,
            indicators: false,
            deceleration: 0.0006,
            bounce: false
        }
    }
    mui(obj).scroll(options)
}
function muiAjaxError() {
    mui.ajaxSettings.complete = function (error, type, xhr, settings) {
        var status = error.getResponseHeader("headerStatus") || error.status;
        if (status == 600) {
            var targetUrl = window.location.href;
            var index = targetUrl.indexOf("&v=");
            if (index <= 0) {
                index = targetUrl.indexOf("?v=")
            }
            targetUrl = targetUrl.substr(0, index);
            login(targetUrl)
        } else {
            if (status == 606) {
                goToUrl(root + "/errors/" + status + ".html")
            } else {
                if (status == 608) {
                    var token = error.getResponseHeader("gb.token");
                    if (token) {
                        $("[name='gb.token']").val(token)
                    }
                    toast(window.top.message.common["repeat.request.error"])
                } else {
                    if (status >= 0 && settings && settings.comet != true) {
                        window.top.location.href = window.top.root + "/errors/" + status + ".html"
                    } else {
                        if (settings && !settings.error && status != 200 && status != 0) {
                            if (settings.comet == true) {
                                toast(window.top.message.common["online.message.error"])
                            } else {
                                toast(error.responseText)
                            }
                        } else {
                            console.log(error.context)
                        }
                    }
                }
            }
        }
    }
}
function muiAjax(options) {
    if (!options) {
        return
    }
    var url = options.url;
    if (!url) {
        return
    }
    if (url.indexOf("?") > 0) {
        url = url + "&t=" + random
    } else {
        url = url + "?t=" + random
    }
    if (options.loading == true) {
        showLoading();
        var complete = options.complete;
        options.complete = function () {
            hideLoading();
            complete()
        }
    }
    var settings = {
        data: options.data,
        dataType: options.dataType || "json",
        type: options.type || "POST",
        headers: options.headers,
        timeout: options.timeout,
        success: options.success,
        error: options.error,
        complete: options.complete,
        beforeSend: options.beforeSend,
        async: options.async,
        contentType: options.contentType,
    };
    mui.ajax(options.url, settings)
}
function showLoading() {
    var loading = '<div class="loading-wrap"><span class="loading-img loading-entirety"><img src="' + resRoot + '/../images/main/oval.svg"></span></div>';
    $("body").append(loading)
}
function whatOs() {
    var ua = navigator.userAgent;
    if (/(app_ios)/i.test(ua)) {
        return "app_ios"
    } else {
        if (/(iPhone|iPad|iPod|iOS)/i.test(ua)) {
            return "ios"
        } else {
            if (/(app_android)/i.test(ua)) {
                return "app_android"
            } else {
                if (/(android)/i.test(ua)) {
                    return "android"
                } else {
                    return "pc"
                }
            }
        }
    }
}
function isNative() {
    var ua = navigator.userAgent;
    if (/(is_native)/i.test(ua)) {
        return true
    } else {
        return false
    }
}
function hideLoading() {
    if ($(".loading-wrap").length > 0) {
        $(".loading-wrap").remove()
    }
}
function goToUrl(url, isExternalLink, targetUrl) {
    openWindow(url)
}
function openWindow(url) {
    window.location.href = url;
}
function bindButtonEvent(selector) {
    selector = selector || "body";
    mui(selector).on("tap", "[data-rel]", function (e) {
        if (document.activeElement) {
            document.activeElement.blur()
        }
        var $target = $(this);
        var isLocked = $target.isLocked();
        if (isLocked) {
            console.log("事件标签已被锁定");
            return
        }
        $target.lock();
        var options = eval("(" + $(this).attr("data-rel") + ")");
        var confirm = options.confirm;
        if (confirm) {
            options.func = doEvent(this, options);
            showConfirmMsg(options, this)
        } else {
            doEvent(this, options)
        }
    })
}
function doEvent(obj, options) {
    var precall = options.precall;
    var $target = $(obj);
    if (precall && !applyFunction(precall, options)) {
        $target.unlock();
        return false
    }
    var opType = options.opType;
    if (opType == "function") {
        doFunction(obj, options)
    } else {
        if (opType == "ajax") {
            doAjax(obj, options)
        } else {
            if (opType == "href") {
                goToUrl(options.target);
                $target.unlock()
            } else {
                if (opType == "openWindow") {
                    var win = window.open(options.target);
                    if (!win) {
                        window.location.href = options.target
                    }
                }
            }
        }
    }
}
function doFunction(obj, options) {
    var func = this[options.target];
    if (func == null && options.target && options.target.indexOf(".") != -1) {
        var args = options.target.split(".");
        func = this[args[0]][args[1]]
    }
    var returnVal = applyFunction(func, options, obj);
    $(obj).unlock();
    return returnVal
}
function applyFunction(func, options, obj) {
    if (!obj) {
        obj = this
    }
    if (func && typeof func == "function") {
        var rs = func.apply(this, [obj, options]);
        return rs
    } else {
        if (func && typeof func == "string" && this[func] && typeof this[func] == "function") {
            func = this[func];
            var rs = func.apply(this, [obj, options]);
            return rs
        } else {
            console.log(func + "方法找不到！")
        }
    }
}
function doAjax(obj, options) {
    var ajaxOption = {
        url: options.target,
        loading: options.loading || false,
        success: function (data) {
            if (data.msg) {
                toast(data.msg)
            }
            options.data = data;
            var func = options.callback;
            if (func) {
                applyFunction(func, options, obj)
            }
            $(obj).unlock()
        },
        error: function () {
            $(obj).unlock()
        }
    };
    var post = options.post;
    if (post) {
        ajaxOption.data = applyFunction(post, options, obj)
    }
    muiAjax(ajaxOption)
}
function toast(msg) {
    mui.toast(msg)
}
function showConfirmMsg(options, obj) {
    var btnArray = options.btnArray || ["是", "否"];
    mui.confirm(options.confirm, options.title, btnArray, function (e) {
        if (e.index == 0) {
            var func = options.func;
            if (func) {
                return applyFunction(func, options, obj)
            }
        } else {
            if (e.index == 1) {
                var func = options.cancelFunc;
                if (func) {
                    return applyFunction(func, options, obj)
                }
            }
        }
    })
}
function showWarningMsg(title, msg, callback, options) {
    mui.alert(msg, title, function () {
        if (callback) {
            applyFunction(callback, options)
        }
    })
}
function login(targetUrl) {
    if (isNative) {
        nativeLogin()
    } else {
        var url = "/login/commonLogin.html?v=" + rcVersion;
        if (targetUrl && targetUrl != "/") {
            sessionStorage.setItem(LOGIN_TARGET_URL, targetUrl)
        }
        openWindow(url)
    }
}
function goToHome(url) {
    if (isNative) {
        gotoHomePage()
    } else {
        openWindow(url)
    }
}
function deposit(url) {
    if (isNative) {
        nativeGotoDepositPage()
    } else {
        openWindow(url)
    }
}
function logout(e, options) {
    sessionStorage.is_login = false;
    isLogin = false;
    sessionStorage.setItem("isLogin", false);
    goToUrl("/passport/logout.html")
}
function goToLastPage() {
    if (isNative) {
        nativeGoBackPage()
    } else {
        if (document.referrer === "" || document.referrer.indexOf(document.domain) === -1) {
            goToHomePageOnly()
        } else {
            mui.back()
        }
    }
}
function setCookie(name, value, time) {
    if (value == null) {
        document.cookie = name + "=" + escape(value) + ";expires=-1"
    } else {
        if (!time || time == 0) {
            document.cookie = name + "=" + escape(value) + ";expires=0"
        } else {
            var strsec = getSecond(time);
            var exp = new Date();
            exp.setTime(exp.getTime() + strsec * 1);
            document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString()
        }
    }
}
function getSecond(str) {
    if (!str || str == 0) {
        return 0
    }
    var str1 = str.substring(1, str.length) * 1;
    var str2 = str.substring(0, 1);
    if (str2 == "s") {
        return str1 * 1000
    } else {
        if (str2 == "h") {
            return str1 * 60 * 60 * 1000
        } else {
            if (str2 == "d") {
                return str1 * 24 * 60 * 60 * 1000
            }
        }
    }
}
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) {
        return unescape(arr[2])
    }
    return null
}
function bindFormValidation($form) {
    if (!$form) {
        return
    }
    var $ruleDiv = $form.find("div[id=validateRule]");
    var rule;
    if ($ruleDiv.length > 0) {
        rule = eval("({" + $ruleDiv.text() + "})");
        rule.ignore = ".ignore"
    }
    if (rule) {
        if ($.data($form[0], "validator")) {
            $.data($form[0], "validator", null)
        }
        $form.validate(rule)
    }
}
function lazyLoadImg(self, placeholder) {
    document.body.removeAttribute("data-imagelazyload");
    if (!placeholder) {
        placeholder = ""
    }
    var lazyLoadApi = mui(self).imageLazyload({
        autoDestroy: false,
        placeholder: placeholder
    });
    return lazyLoadApi
}
function goToHomePageOnly() {
    sessionStorage.removeItem(SESSION_API_OBJ);
    sessionStorage.removeItem(LOGIN_TARGET_URL);
    goToHome(root + "/mainIndex.html")
}
function getCurrentUrl() {
    var targetUrl = window.location.href;
    var index = targetUrl.indexOf("&v=");
    if (index <= 0) {
        index = targetUrl.indexOf("?v=")
    }
    targetUrl = targetUrl.substr(0, index);
    return targetUrl
}
;