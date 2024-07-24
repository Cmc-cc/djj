$(function () {
    var options = {
        containerScroll: ".mui-content.mui-scroll-wrapper"
    };
    
    recommendUser();
    //$("img.captcha_img").attr("src", $("img.captcha_img").attr("data-src") + "?t=" + random);
    sex();
    currency();
    locale();
    question();
    birthday();
    bindButtonEvent();
    function recommendUser() {
        var recommendUser = $("input[name = recommendUserInputCode]").val();
        recommendUser === null || recommendUser === "" ? "" : $("input[name = recommendUserInputCode]").attr("readonly", "readonly")
    }
    $(".agree_register_rules").on("tap", function () {
        if ($(".agree_register_rules").hasClass("not_choosen")) {
            $(".agree_register_rules").removeClass("not_choosen").addClass("is_choosen");
            $(".common_btn").removeClass("btn-not-ok").addClass("btn-ok").removeAttr("disabled");
            $(".common_btn").on("tap", function () {
                $(".register_success").fadeIn(300);
                setTimeout(function () {
                    $(".register_success").fadeOut(300)
                }, 1000)
            })
        } else {
            $(".agree_register_rules").removeClass("is_choosen").addClass("not_choosen");
            $(".common_btn").removeClass("btn-ok").addClass("btn-not-ok");
            $(".common_btn").attr("disabled", true)
        }
    });
    $(".pwd_icon").on("tap", showPWD);
    $(".confirm_pwd_icon").on("tap", showConfirmPWD);
    $(".withdrawalsPwd_icon").on("tap", showWithdrawalsPwd);
    $(".mui-btn.mui-poppicker-btn-cancel").on("tap", function () {
        $(".mui-backdrop").css({
            opacity: "0",
            transition: "opacity 0.3s"
        });
        $(".mui-poppicker").css({
            display: "none"
        })
    })
});

function changeBtnRegist() {
    if ($(".agree_register_rules").hasClass("not_choosen")) {
        $(".agree_register_rules").removeClass("not_choosen").addClass("is_choosen");
        $(".common_btn").removeClass("btn-not-ok").addClass("btn-ok").removeAttr("disabled");
        $(".common_btn").on("tap", function () {
            $(".register_success").fadeIn(300);
            setTimeout(function () {
                $(".register_success").fadeOut(300)
            }, 1000)
        })
    } else {
        $(".agree_register_rules").removeClass("is_choosen").addClass("not_choosen");
        $(".common_btn").removeClass("btn-ok").addClass("btn-not-ok");
        $(".common_btn").attr("disabled", true)
    }
}

function showPWD() {
    if ($(".pwd_icon").hasClass("not_view_icon")) {
        $(".show_pwd_way").attr("type", "text");
        $(".pwd_icon").removeClass("not_view_icon").addClass("can_view_icon")
    }else {
        $(".show_pwd_way").attr("type", "password");
        $(".pwd_icon").removeClass("can_view_icon").addClass("not_view_icon")
    }
}

function showConfirmPWD() {
    if ($(".confirm_pwd_icon").hasClass("not_view_icon")) {
        $(".confirm_pwd_way").attr("type", "text");
        $(".confirm_pwd_icon").removeClass("not_view_icon").addClass("can_view_icon")
    } else {
        $(".confirm_pwd_way").attr("type", "password");
        $(".confirm_pwd_icon").removeClass("can_view_icon").addClass("not_view_icon")
    }
}
function showWithdrawalsPwd() {
    if ($(".withdrawalsPwd_icon").hasClass("not_view_icon")) {
        $(".withdrawalsPwd_way").attr("type", "text");
        $(".withdrawalsPwd_icon").removeClass("not_view_icon").addClass("can_view_icon")
    } else {
        $(".withdrawalsPwd_way").attr("type", "password");
        $(".withdrawalsPwd_icon").removeClass("can_view_icon").addClass("not_view_icon")
    }
}
function terms() {
    var url = root + "/getRegisterRules.html?path=protocol";
    if (isNative) {
        nativeOpenWindow(url)
    } else {
        goToUrl(url)
    }
}

function sex() {
    var sexButton = document.getElementById("sexButton");
    if (sexButton) {
        var options = {
            url: root + "/signUp/optionText.html?option=sex",
            success: function (data) {
                if (data) {
                    sexButton.addEventListener("tap", function (event) {
                        pickerBlur();
                        var sexPick = new mui.PopPicker();
                        sexPick.setData(data);
                        sexPick.show(function (items) {
                            document.getElementById("sysUser.sex").value = items[0].value;
                            sexButton.value = items[0].text;
                            sexPick.dispose();
                            sexPick = null
                        })
                    }, false)
                }
            }
        };
        muiAjax(options)
    }
}

function pickerBlur() {
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].blur()
    }
}

function currency() {
    var currencyButton = document.getElementById("currencyButton");
    if (currencyButton) {
        var options = {
            url: root + "/signUp/optionText.html?option=mainCurrency",
            success: function (data) {
                if (data) {
                    currencyButton.addEventListener("tap", function (event) {
                        var currencyPick = new mui.PopPicker();
                        currencyPick.setData(data);
                        currencyPick.show(function (items) {
                            document.getElementById("sysUser.defaultCurrency").value = items[0].value;
                            currencyButton.value = items[0].text;
                            currencyPick.dispose();
                            currencyPick = null
                        })
                    }, false)
                }
            }
        };
        muiAjax(options)
    }
}

function locale() {
    var localeButton = document.getElementById("localeButton");
    if (localeButton) {
        var options = {
            url: root + "/signUp/optionText.html?option=defaultLocale",
            success: function (data) {
                if (data) {
                    localeButton.addEventListener("tap", function (event) {
                        var localePick = new mui.PopPicker();
                        localePick.setData(data);
                        localePick.show(function (items) {
                            document.getElementById("sysUser.defaultLocale").value = items[0].value;
                            localeButton.value = items[0].text;
                            localePick.dispose();
                            localePick = null
                        })
                    }, false)
                }
            }
        };
        muiAjax(options)
    }
}

function question() {
    var questionButton = document.getElementById("questionButton");
    if (questionButton) {
        var options = {
            url: root + "/signUp/optionText.html?option=securityIssues",
            success: function (data) {
                if (data) {
                    questionButton.addEventListener("tap", function (event) {
                        var questionPick = new mui.PopPicker();
                        questionPick.setData(data);
                        questionPick.show(function (items) {
                            document.getElementById("sysUserProtection.question1").value = items[0].value;
                            questionButton.value = items[0].text;
                            questionPick.dispose();
                            questionPick = null
                        })
                    }, false)
                }
            }
        };
        muiAjax(options)
    }
}

function birthday() {
    var dateButton = document.getElementById("dateButton");
    if (dateButton) {
        var optionsJson = dateButton.getAttribute("data-options") || "{}";
        var options = JSON.parse(optionsJson);
        dateButton.addEventListener("tap", function (event) {
            var datePick = new mui.DtPicker(options);
            var id = this.getAttribute("id");
            datePick.show(function (rs) {
                dateButton.value = rs.text;
                document.getElementById("sysUser.birthday").value = rs.text;
                datePick.dispose();
                datePick = null
            })
        }, false)
    }
}

function captchaImg(obj, options) {
    $(".captcha_img").attr("src", options.src + "?_t" + random)
}

function termsOfService() {
    if ($("[name=termsOfService]").is(":checked")) {
        $("[name=termsOfService]").val("")
    } else {
        $("[name=termsOfService]").val("11")
    }
}

function register(obj, options) {
    $("body").mLoading({
        text: "数据检查中，请稍后",
        iconTag: "img",
        icon: "data:image/gif;base64,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",
        html: false,
        content: "",
        mask: true
    });
    var $form = $("#regForm");
    if (!$form.valid()) {
        $("body").mLoading("hide");
        return
    }
    var data = $form.serialize();
    options = {
        data: data,
        dataType: "json",
        type: "post",
        url: root + "/signUp/save.html",
        beforeSend: function () {
            $("body").mLoading({
                text: "注册中，请稍后",
                iconTag: "img",
                icon: "data:image/gif;base64,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",
                html: false,
                content: "",
                mask: true
            });
            $(obj).text(window.top.message.passport_auto["提交中"]).attr("disabled", "disabled")
        },
        success: function (data) {
            if (data.state == false) {
                $("body").mLoading("hide");
                toast(data.msg)
            } else {
                $("body").mLoading({
                    text: "跳转首页中，请稍后",
                    iconTag: "img",
                    icon: "data:image/gif;base64,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",
                    html: false,
                    content: "",
                    mask: true
                });
                autoLogin()
            }
        },
        error: function () {
            $("body").mLoading({
                text: "服务器忙，请刷新页面",
                iconTag: "img",
                icon: "data:image/gif;base64,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",
                html: false,
                content: "",
                mask: true
            })
        },
        complete: function () {
            $(obj).text(window.top.message.passport_auto["立即注册"]).removeAttr("disabled")
        }
    };
    muiAjax(options)
}

function autoLogin() {
    var _username = $("[name='sysUser.username']").val();
    var _password = $("[name='sysUser.password']").val();
    if (isNative) {
        nativeAutoLogin(_username, _password)
    } else {
        var options = {
            type: "POST",
            url: root + "/passport/login.html",
            dataType: "json",
            data: {
                username: _username,
                password: _password
            },
            success: function (data) {
                if (data != null) {
                    if (data.success) {
                        sessionStorage.setItem("isLogin", true);
                        var url = sessionStorage.getItem(LOGIN_TARGET_URL);
                        if (!url) {
                            url = root + "/mainIndex.html"
                        }
                        goToUrl(url)
                    } else {
                        if (data.message) {
                            toast(message.passport[data.message] || data.message)
                        }
                    }
                } else {
                    sessionStorage.setItem("isLogin", true);
                    goToUrl(root + "/mainIndex.html")
                }
            }
        };
        muiAjax(options)
    }
}

function sendPhoneCode() {
    var $phone = $("[name='phone.contactValue']");
    var obj = $("#sendPhoneCode");
    var phone = $phone.val();
    if (!phone) {
        toast(window.top.message.passport_auto["请输入手机号"]);
        return
    } else {
        if ($phone.valid()) {
            var options = {
                type: "POST",
                url: root + "/verificationCode/getPhoneVerificationCode.html",
                dataType: "json",
                data: {
                    phone: phone
                },
                success: function (data) {
                    if (data) {
                        var phoneInterval;
                        wait(90, obj, phoneInterval)
                    }
                },
                error: function () {
                    toast(window.top.message.passport_auto["服务忙"])
                }
            };
            muiAjax(options)
        }
    }
}

function sendEmailCode() {
    var $email = $("[name='email.contactValue']");
    var obj = $("#sendEmailCode");
    var email = $email.val();
    if (!email) {
        toast("请输入email！");
        return
    } else {
        if ($email.valid()) {
            var locale = $("[name='sysUser.defaultLocale']").val();
            var options = {
                type: "POST",
                url: root + "/signUp/checkEmail.html",
                dataType: "json",
                data: {
                    email: email,
                    locale: typeof locale === "undefined" ? "" : locale
                },
                success: function (data) {
                    if (data) {
                        var emailInterval;
                        wait(90, obj, emailInterval)
                    }
                },
                error: function () {
                    toast(window.top.message.passport_auto["服务忙"])
                }
            };
            muiAjax(options)
        }
    }
}

function wait(t, obj, interval) {
    interval = setInterval(function () {
        if (t > 0) {
            obj.text((t--) + window.top.message.passport_auto["重新发送2"]);
            obj.attr("disabled", true);
            obj.addClass("mui-disabled")
        } else {
            window.clearInterval(interval);
            obj.text(window.top.message.passport_auto["重新发送"]);
            obj.removeAttr("disabled");
            obj.removeClass("mui-disabled")
        }
    }, 1000)
};