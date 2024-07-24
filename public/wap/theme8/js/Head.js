var isLogin = false;
var RECOVER_TIME_INTERVAL = 10;
var timer = null;
var totalTime = 6;
$(function () {
    var leftMenuScroller = mui(".index-canvas-wrap.side-menu-scroll-wrapper");
    if (leftMenuScroller && leftMenuScroller.length > 0) {
        muiScrollY(leftMenuScroller)
    }
    bindButtonEvent();
    closeLeftMenu();
    //verifyStatus()
});

function closeLeftMenu() {
    $(".index-canvas-wrap").on("tap", function (e) {
        if (e.detail && e.detail.target && !$(e.detail.target).parents(".mui-off-canvas-left")[0]) {
            $("html").toggleClass("index-canvas-show")
        } else {
            if (e.target && !$(e.target).parents(".mui-off-canvas-left")[0]) {
                $("html").toggleClass("index-canvas-show")
            }
        }
    })
}

function userAssert(obj, options) {
    if ($("#_login_info_data .money-shadow").is(":hidden")) {
        $("#_login_info_data .money-shadow").show()
    } else {
        $("#_login_info_data .money-shadow").hide()
    }
    if ($($(obj).parents()).find(".ex").attr("class") === "ex") {
        if (sessionStorage.getItem("isAutoPay") === "true") {
            $("#recovery").removeClass("mui-hidden")
        } else {
            $("#refresh").removeClass("mui-hidden")
        }
    }
    var $siteApi = $("ul#api-balance li");
    biCommon.getGamePlates(4);
    $($(obj).parents()).find(".ex").toggleClass("open")
}

function reqPrompt(textStatus) {
    var options = {
        title: window.top.message.setting["req.prompt"],
        confirm: window.top.message.setting["req.content"] + ":" + textStatus,
        btnArray: [window.top.message.setting["req.refresh.now"]],
        func: function () {
            window.location.reload()
        }
    };
    showConfirmMsg(options)
}

function leftMenu(obj) {
    if ($("html")[0].className === "index-canvas-show") {
        $("html").addClass("index-canvas-show")
    } else {
        $("html").toggleClass("index-canvas-show");
        $(obj).unlock()
    }
}

function getSiteApi() {
    var options = {
        url: root + "/api/getSiteApi.html",
        success: function (data) {
            if (data) {
                var d = eval(data);
                $(".money").text(d.currSign + d.playerAssets);
                $(".bar-wallet").html(d.currSign + d.playerWallet);
                $(".bar-asset").html(d.currSign + d.playerAssets);
                var apis = d.apis;
                for (var i = 0; i < apis.length; i++) {
                    var html = '<li class="item_data"><span>' + apis[i].apiName + "</span>";
                    if (apis[i].status == "maintain") {
                        html += '<span id="_api_' + apis[i].apiId + '"><span class="text-red" style="font-size: 10px;">' + window.top.message.common_auto["游戏维护中"] + "</span></span></li>"
                    } else {
                        html += '<span id="_api_' + apis[i].apiId + '">' + d.currSign + "" + apis[i].balance + "</span></li>"
                    }
                    $("ul#api-balance").append(html)
                }
            } else {
                isLogin = false
            }
        }
    };
    muiAjax(options)
}

function refreshApi() {
    if (event) {
        event.stopPropagation()
    }
    var loading = '<div class="loader api-loader"><div class="loader-inner ball-pulse api-div"><div></div><div></div><div></div></div></div>';
    $(".bar-wallet").html(loading);
    $(".bar-asset").html(loading);
    $("table#api-balance").find("td._money").html(loading);
    var options = {
        url: root + "/api/refreshApi.html",
        success: function (data) {
            var d = eval(data);
            $(".money").text(d.currSign + d.playerAssets);
            $(".bar-wallet").html(d.currSign + d.playerWallet);
            $(".bar-asset").html(d.currSign + d.playerAssets);
            var apis = d.apis;
            for (var i = 0; i < apis.length; i++) {
                var html;
                if (apis[i].status == "maintain") {
                    html = '<span class="text-red" style="font-size: 10px;">' + window.top.message.common_auto["游戏维护中"] + "</span>"
                } else {
                    html = data.currSign + apis[i].balance
                }
                $("td#_api_" + apis[i].apiId).html(html)
            }
        }
    };
    muiAjax(options)
}

function recovery(obj) {
    if (!isAllowRecovery(obj)) {
        toast(window.top.message.transfer_auto["太频繁"]);
        return
    }
    var title = $(obj).text();
    $(obj).attr("disabled", true);
    $(obj).text(window.top.message.transfer_auto["回收中"]);
    var url = root + "/transfer/auto/recovery.html";
    var options = {
        url: url,
        success: function (data) {
            if (data) {
                if (data.msg) {
                    toast(data.msg)
                } else {
                    toast(window.top.message.transfer_auto["正在回收"]);
                    window.setTimeout(function () {
                        refreshApi()
                    }, 1500)
                }
            } else {
                toast(window.top.message.transfer_auto["系统繁忙"])
            }
        },
        complete: function () {
            $(obj).attr("disabled", false);
            $(obj).text(title);
            $(obj).attr("lastTime", new Date().getTime())
        }
    };
    muiAjax(options)
}

function isAllowRecovery(obj) {
    var lastTime = $(obj).attr("lastTime");
    if (!lastTime) {
        return true
    }
    var timeInterval = parseInt((new Date().getTime() - lastTime) / 1000);
    if (timeInterval >= RECOVER_TIME_INTERVAL) {
        return true
    }
    return false
}

function reload() {
    if (isNative) {
        nativeRefreshPage()
    } else {
        window.location.reload()
    }
}

function verifyStatus() {
    if (!$(".login-info").is(":hidden")) {
        if (totalTime === 0) {
            logout();
            return
        }
        timer = setTimeout(function () {
            verifyStatus()
        }, 5 * 60 * 1000);
        var options = {
            url: root + "/verifyStatus.html",
            success: function (data) { }
        };
        muiAjax(options);
        totalTime--
    }
};