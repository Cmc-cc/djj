function loadCustomer(obj, options) {
    if (isNative) {
        nativeGoToCustomerPage()
    } else {
        var url = options.url;
        if (!url) {
            var ajaxOpt = {
                url: root + "/index/getCustomerService.html",
                dataType: "text",
                success: function (data) {
                    options.url = data;
                    $(obj).data("rel", JSON.stringify(options));
                    goToUrl(data);
                    $(obj).unlock()
                }
            };
            muiAjax(ajaxOpt)
        } else {
            goToUrl(url, true);
            $(obj).unlock()
        }
    }
}

function downLoadApp() {
    goToUrl($("#userNameController").attr("downandroid"), null, $("#userNameController").attr("downandroid"));   
}

function lang(obj, options) {
    $(obj).parent().addClass("active");
    if ($(".lang-menu").is(":hidden")) {
        $(".lang-menu").show()
    } else {
        $(".lang-menu").hide()
    }
    $(obj).unlock()
}

function changeLanguage(obj, options) {
    mui(".mui-off-canvas-left").offCanvas("close");
    var language = options.lang;
    if (language != null && language.length > 0) {
        var index = language.indexOf("-");
        var lang = language.substring(0, index);
        var country = language.substring(index + 1, language.length);
        var options = {
            url: root + "/index/language/change.html",
            dataType: "json",
            cache: false,
            data: {
                lang: lang,
                country: country
            },
            type: "get",
            success: function (data) {
                location.reload()
            }
        };
        muiAjax(options)
    }
}

function goPC() {
    mui(".mui-off-canvas-left").offCanvas("close");
    setCookie("ACCESS_TERMINAL", "pc", 0);
    window.location.replace(root + "/")
}

function goTab(obj, options) {
    var skip = options.skip;
    var dataHref = root + options.dataHref;
    var isLeft = options.isLeft;
    if (isLeft == "true") {
        mui(".mui-off-canvas-left").offCanvas("close")
    }
    goToUrl(dataHref)
};