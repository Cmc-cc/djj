var gamePageSize = 1000;
var dataPlateForm = [];
var exclusiveCount = 0;
//首页开通接口展示index
function getGamePlate(num, type) {
    biCommon.getGamePlates(num, type);
}

//首页快捷导航栏
function platformIndexs(platform, type) {
    var slot = "", live = "", sport = "", chess = "", chessGame = "", lottery = "", lotteryType = "", gamelist = "", gameSlot = "", liveGame = "", sportGame = "", lotteryGame = "", competition = "", competitionGame="";
    for (var i = 0; i < platform.length; i++) {
        var spanClass = platform[i].ifhot == true ? "sub-hot" : "";
        var name = getTypeCh(platform[i].plattype);
        if (platform[i].plattype == "game") {
                gameSlot += '<li class="swiper-slide ' + spanClass + '" game-box="' + (platform[i].api_name).toLowerCase() + '" onmouseover="gameslotMouse(this,\'in\')" onclick="gameOpen(\'' + platform[i].api_name + '\')">' + platform[i].api_title + name + '</li>';
            gamelist += '<div class="col-3 col-sm-6 swiper-slide  ' + spanClass + '" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="gameOpen(\'' + platform[i].api_name + '\')" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0)" ><img src="/Areas/Wap9/Content/images/BIimg/game/' + platform[i].api_name + '.png" alt=""><div class="text"><h6>' + platform[i].api_title + name + '</h6></div></a></div >';
            slot += ' <a game-box="' + (platform[i].api_name).toLowerCase() + '"  class="rj-hamburger-tabs-01-link " ' + spanClass + '"" href="/Index/game?id=' + platform[i].api_name + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '</span></a>';
        }
        else if (platform[i].plattype == "chess") {
            chess += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '</span></a>';
            chessGame += '<div class="col-3 col-sm-6" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0);" ><img src="/Areas/Wap9/Content/images/BIimg/board/' + platform[i].api_name + '.png" alt=""><div class="text"><h4>' + platform[i].api_title + name + '</h4></div></a></div >';
        }
        else if (platform[i].plattype == "live") {
            liveGame += '<div class="col-3 col-sm-6 swiper-slide  ' + spanClass + '" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0)" ><img src="/Areas/Wap9/Content/images/BIimg/live/' + platform[i].api_name + '.png" alt=""><div class="text"><h6>' + platform[i].api_title + name + '</h6></div></a></div >';
            live += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '</span></a>';
        } else if (platform[i].plattype == "competition") {
            var introduce = getCompetitionIntroduce(platform[i].api_name.toLowerCase());
            competition += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '</span></a>';
            competitionGame += '<div class="col-12"  class="esports_son" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0);" ><img src="/Areas/Wap9/Content/images/BIimg/competition/' + platform[i].api_name + '.png" alt=""><div class="text text-btn"><span class="btn">' + platform[i].api_title + name + '</span><h6>' + introduce + '</h6></div></a></div >';
        }else if (platform[i].plattype == "sport") {
           sportGame += '<div class="col-3 col-sm-6" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0);" ><img src="/Areas/Wap9/Content/images/BIimg/sport/' + platform[i].api_name + '.png" alt=""><div class="text"><h4>' + platform[i].api_title + name + '</h4></div></a></div >';
            sport += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '</span></a>';
        } else if (platform[i].plattype == "lottery") {
            lotteryType += '<div class="col-3 col-sm-6" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0);" ><img src="/Areas/Wap9/Content/images/BIimg/lottery/' + platform[i].api_name + '.png" alt=""><div class="text"><h4>' + platform[i].api_title + name + '</h4></div></a></div >';
            lottery += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '</span></a>';
        } else if (platform[i].plattype == "liuhecai") {
            lotteryType += '<div class="col-3 col-sm-6" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0);" ><img src="/Areas/Wap9/Content/images/BIimg/lottery/' + platform[i].api_name + '.png" alt=""><div class="text"><h4>' + platform[i].api_title + name + '六合彩</h4></div></a></div >';
            lottery += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '六合彩</span></a>';
        } else if (platform[i].plattype == "guanfangcai") {
            lotteryType += '<div class="col-3 col-sm-6" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href = "javascript:void(0);" ><img src="/Areas/Wap9/Content/images/BIimg/lottery/' + platform[i].api_name + '.png" alt=""><div class="text"><h4>' + platform[i].api_title + name + '官方彩</h4></div></a></div >';
            lottery += '<a class="rj-hamburger-tabs-01-link ' + spanClass + '" href="javascript:void(0)" game-box="' + (platform[i].api_name).toLowerCase() + '" onclick="return landing(this);"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><span class="rj-hamburger-tabs-01-link-title">' + platform[i].api_title + name + '官方彩</span></a>';
        }
    }
    if (type == "index") { //首页
        $("#indexLive").html(liveGame);
        $("#indexSolt").html(gamelist);
        $("#indexSport").html(sportGame);
        $("#indexLottery").html(lotteryType);
        $("#indexChess").html(chessGame);
        $("#indexCompetition").html(competitionGame);

        biCommon.getApiFish("fishindex");
        indexSwipers();
    }
    $("#Layoutslot").html(slot);
    $("#Layoutlive").html(live);
    $("#Layoutsport").html(sport);
    $("#lotteryType").html(lottery);
    $("#Layoutchess").html(chess);
    $("#Layoutcompetition").html(competition);

    $("#leftList").children("div").first().click();

}
//显示隐藏首页游戏列表
function GamesListShow(type) {
    $(".grid .nav-body .GamesList").css("display","none");
    $("#lotteryContent").hide();
    if (type == "sport") {
        $("#Gametype").text("體育游戏");
        $(".grid .nav-body #Indexsport").removeAttr("style");
    }
    else if (type == "lottery") {
        $("#lotteryContent").removeAttr("style");
        $("#Gametype").text("彩票游戏");
    }
    else if (type == "live") {

        $("#Gametype").text("真人視訊");
        $(".grid .nav-body #Indexlive").removeAttr("style");
    }
    else if (type == "chess") {

        $("#Gametype").text("棋牌游戏");
        $(".grid .nav-body #Indexchess").removeAttr("style");
    }
    else if (type == "slot") {

        $("#Gametype").text("電子游戏");
        $(".grid .nav-body #Indexslot").removeAttr("style");
    }
    else if (type == "competition") {

        $("#Gametype").text("电竞游戏");
        $(".grid .nav-body #Indexcompetition").removeAttr("style");
    }
    else if (type == "fish") {
        $("#Gametype").text("捕魚游戏");
        $(".grid .nav-body #Indexfish").removeAttr("style");
    }
}

//Game页面
function gameOpen(plateform) {
    window.location.href = "/Index/game?id=" + plateform;
}

//显示隐藏子菜单
function openPlatform(clickType, obj) {
    $("#leftList").find("sb-tab-trigger").attr("data-tab-trigger", "true");
    $(obj).children("sb-tab-trigger").attr("data-tab-trigger", "active");
    $("nav.rj-hamburger-tabs-01-nav").addClass("isHidden");
    $("nav.rj-hamburger-tabs-01-nav[id=" + clickType + "]").removeClass("isHidden");
}

function showQuickData(type) {
    var arr = "";
    var str = "";
    type = type == "" ? "BB" : type;
    $("div.gameView-top-item[plateform=" + type + "]").parent().children().removeClass("active");
    $("div.gameView-top-item[plateform=" + type + "]").parent().children().children().removeClass("activeBorder");
    $("div.gameView-top-item[plateform=" + type + "]").addClass("active");
    $("div.gameView-top-item[plateform=" + type + "]").children().addClass("activeBorder");
    arr = eval(type + "LotteryList");
    for (var i = 0; i < arr.length; i++) {
        str += '<div data-v-4df4ea0a="" class="game-box" onclick= "return landing(this);"><div data-v-4df4ea0a="" class="border-top"></div><div data-v-4df4ea0a="" class="game-box-content"><img data-v-4df4ea0a="" src="/Areas/Wap9/Content/images/lottery/' + arr[i].plateform + '/' + arr[i].imgName + '.png" alt="" class="" > <p data-v-4df4ea0a="">' + arr[i].name + '</p></div> </div>';
    }
    str += '<div data-v-4df4ea0a="" class="game-box" onclick="window.location.href=\'' + $("#userNameController").attr("downandroid") + '\'"><div data-v-4df4ea0a="" class="border-top"></div><div data-v-4df4ea0a="" class="game-box-content"><img data-v-4df4ea0a="" src="/Areas/Wap9/Content/images/main/anzhuo.png" alt="" class="" > <p data-v-4df4ea0a="">安卓客户端</p></div> </div>';
    str += '<div data-v-4df4ea0a="" class="game-box" onclick="window.location.href=\'' + $("#userNameController").attr("downios") + '\'"><div data-v-4df4ea0a="" class="border-top"></div><div data-v-4df4ea0a="" class="game-box-content"><img data-v-4df4ea0a="" src="/Areas/Wap9/Content/images/main/ios.png" alt="" class="" > <p data-v-4df4ea0a="">IOS客户端</p></div> </div>';
    $("#lotterList").html(str);

}

function quickNav(platform) {
    for (var i = 0; i < platform.length; i++) {
        var name = getTypeCh(platform[i].plattype);
        switch (platform[i].plattype) {
            case "live":
                liveQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "game":
                slotQuick += '<li><a href="/Index/game?id=' + platform[i].api_name + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "sport":
                sportQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "lottery":
                lotteryQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "liuhecai":
                lotteryQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '6.png" /><span>' + platform[i].api_title + '六合彩</span></a></li>';
                break;
            case "guanfangcai":
                lotteryQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + 'gfc.png" /><span>' + platform[i].api_title + '官方彩</span></a></li>';
                break;
            case "chess":
                chessQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "competition":
                competitionQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            //default: slotQuick += '<li><a href="/Index/game?id=' + platform[i].api_name + '"><img src="/Areas/Wap9/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
        }
    }
}
//首页轮播
function indexSwiper() {
    var mySwiper = new Swiper(".lottery-swiper", {
        loop: true, //可以让图片循环轮播
        spaceBetween: 20,
        slidesPerView: 4,
        loopedSlides: 1,
        pagination: {
            el: '.swiper-pagination',
        }
    })

}

function swiperLoad() {
    if (indexQuickNav == 0) {
        $("#quickContent").hide();
        $("#quickList").hide();
        $("#gamelist").show();
        mySwiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: 3000,
            pagination: '.swiper-pagination',
        });
    } else {
        biCommon.getApiFish("quickFish");
        $("#gamelist").hide();
        $("#quickContent").show();
        $("#quickList").show();
        mySwiper = new Swiper('.swiper-quickcontainer', {
            slidesPerView: 6,
            slidesPerGroup: 1,
            initialSlide: 0,
            loopedSlides: 5,
            loop: true,
            prevButton: '.swiper-button-prev',
            nextButton: '.swiper-button-next',
            onSlideChangeStart: function (swiper) {
                showQuickData('', swiper.activeIndex);
            }
        });
    }
}
//首页左边游戏分类显示
function gameClassifys() {
    var str = "";
    for (var i = 0; i < gameClassify.length; i++) {
        //str += '<li class="mui-table-view-cell"><a class="mui-navigate-right" type="' + gameClassify[i].type + '">' + gameClassify[i].name + '</a></li>';
        str += '<div class="menu-item" plateform="' + gameClassify[i].type + '" onclick="getGamePlate(4,\'' + gameClassify[i].type + '\');"><a href="javascript:void(0)"><span><i middle="" class="iconfont icon-' + gameClassify[i].type + '"></i>' + gameClassify[i].name + '</span></a><svg name="test' + i + '" class="md-icon arrow-right md-icon-arrow-right lg" middle=""><use xmlns: xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-right"></use></svg></div >';
        str += '<div class="menu-sub-group" plateform="' + gameClassify[i].type + '" style="display:none" id="' + gameClassify[i].type + '"></div>';
    }
    $("#leftList").html(str);
}
//获取介绍说明
function getCompetitionIntroduce(plateCode) {
    var str = "";
    for (var i = 0; i < competitionIntroduce.length; i++) {
        if (competitionIntroduce[i].platformCode == plateCode) {
            str = competitionIntroduce[i].introduce;
        }
    }
    return str;
}
//首页平台中文显示
function getTypeCh(type) {
    var name = "";
    for (var i = 0; i < ZHandCH.length; i++) {
        if (ZHandCH[i].ch == type) {
            name = ZHandCH[i].zh;
            break;
        }
    }
    return name;
}
//获取公告
function getNotice(obj) {
    biCommon.getNotices(obj);
}
//登录页面 login
function changeCode(obj) {
    biCommon.getCode(obj);
}
function loginFun() {
    if (localStorage.getItem("loginUserpwd") != null && localStorage.getItem("loginUserpwd") != "") {
        $("#loginUsername").val(localStorage.getItem("loginUsername"));
        $("#loginUserpwd").val(localStorage.getItem("loginUserpwd"));
    }
}
function login() {
    var boo = true;
    $(".mod-forms-2 input").each(function (x, y) {
        if ($(y).val().trim() == "" && !$(y).is(':hidden')) {
            notify("请输入" + $(y).attr("placeholder") + "!");
            boo = false
            return false;
        }
    })
    if (boo) {
        if ($("#loginUserPhoneCode").is(":hidden")) biCommon.loginData($("#loginUsername").val(), $("#loginUserpwd").val(), $("#loginUsercode").val());
        else biCommon.loginDataPhone($("#loginUserPhone").val(), $("#loginUserPhoneCode").val(), $("#loginUsercode").val());
    }
}
//非空验证
function nullViliData(obj) {
    var boo = true;
    var selector = obj.selector + " input";
    $(selector).each(function (x, y) {
        if ($(y).attr("id") != "recommendCode" && !$(y).is(':hidden')) {
            if ($(y).val().trim() == "") {
                notify($(y).attr("warning") + "!");
                boo = false;
            }
        }
        if (!boo) return false;
    })
    return boo;
}
//登录密码验证
function pwdViliData(pwd, surePwd, type) {
    var boo = true;
    var pwd = pwd.selector;
    var surePwd = surePwd.selector;
    if ($(pwd).val().trim() != $(surePwd).val().trim()) {
        notify("两次密码输入不一致!");
        $(pwd).val("");
        $(surePwd).val("");
        boo = false;
    }
    if (boo) {
        if (type == 1) {
            var pwds = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,12}$/;
            if (!pwds.test($(surePwd).val().trim())) {
                notify("密码必须包含字母和数字!");
                $(surePwd).val("");
                boo = false;
            }
        }
    }
    return boo;
}
//提款密码验证
function withdrawalsPwdViliData(WithdrawalsPwd) {
    var boo = true;
    var WithdrawalsTest = /^\d{4,6}$/;
    var WithdrawalsPwd = WithdrawalsPwd.selector;
    if (!WithdrawalsTest.test($(WithdrawalsPwd).val().trim())) {
        notify("请输入4-6位数字提款密码!");
        $(WithdrawalsPwd).val("");
        boo = false;
    }
    return boo;
}
//验证邮箱格式
function isEmail(str, attribute) {
    var boo = true;
    if (str.charAt(0) == "." || str.charAt(0) == "@" || str.indexOf('@', 0) == -1 ||
        str.indexOf('.', 0) == -1 || str.lastIndexOf("@") == str.length - 1 ||
        str.lastIndexOf(".") == str.length - 1 ||
        str.indexOf('@.') > -1) {
        notify("请输入正确的邮箱格式!");
        $(attribute).val("");
        boo = false;
    }
    return boo;
}
//注册页面 reg.html
function regCaptcha() {
    var boo = nullViliData($(".mod-forms"));
    if (boo) boo = pwdViliData($("#regUserpwd"), $("#regUserSurepwd"), 1);
    if (boo) boo = withdrawalsPwdViliData($("#regUserWithdrawalsPwd"));
    if (boo && !$("#Mailbox").is(":hidden")) boo = isEmail($("#regMailbox").val().trim(), "#regMailbox");
    if (boo) {
        var name = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,9}$/;
        var trueName = /^[\u4E00-\u9FA5\uf900-\ufa2d·.s]{1,24}$/;
        var phone = /^1[34578]\d{9}$/;
        if (!name.test($("#regUsername").val().trim())) {
            notify("用户名必须包含字母和数字!");
            $("#regUsername").val("");
            return false;
        }
        if (!trueName.test($("#regUserTrueName").val().trim())) {
            notify("请输入正确的姓名!");
            $("#regUserTrueName").val("");
            return false;
        }
        //if (!phone.test($("#regUserPhone").val().trim())) {
        //    notify("请输入手机号!");
        //    $("#regUserPhone").val("");
        //    return false;
        //}
        if (!phone.test($("#regUserPhone").val().trim()) && !$("#UserPhone").is(":hidden")) {
            notify("请输入手机号!");
            $("#regUserPhone").val("");
            return false;
        }
        biCommon.regData($("#recommendCode").val(), $("#regUserPhoneCode").val(), $("#regUsername").val().trim(), $("#regUserpwd").val().trim(), $("#regUserSurepwd").val().trim(), $("#regUserTrueName").val().trim(), $("#regUserPhone").val().trim(), $("#regUserWithdrawalsPwd").val().trim(), $("#regUserCaptcha").val().trim(), $("#regIntroducer").val().trim(), $("#regMailbox").val().trim());
    }
}
//=修改提款密码和登录密码
function updPwd(type) {
    var boo = nullViliData($(".mod-forms"));
    if (type == "login") {
        if (boo) {
            boo = pwdViliData($("#newLoginPwd"), $("#confirmLoginPwd"), 1);
            if (boo) {
                biCommon.updatepwd($("#oldLoginPwd").val().trim(), $("#confirmLoginPwd").val().trim(), type);
            }
        }
    } else {
        if (boo) {
            boo = pwdViliData($("#newWtdPwd"), $("#confirmWtdPwd"), 2);
            if (boo) {
                boo = withdrawalsPwdViliData($("#confirmWtdPwd"));
                if (boo) {
                    biCommon.updatepwd($("#oldWtdPwd").val().trim(), $("#confirmWtdPwd").val().trim(), type);
                }
            }
        }
    }
}
//transaction页面
function transactionChange(obj, num) {
    $("#num").val(1);
    $("#transactionContent li").removeClass("tab-switch-active");
    $(obj).addClass("tab-switch-active");
    $(".tab-switch-tabs .pagetab").hide();
    $(".tab-switch-tabs .pagetab").each(function (x, y) {
        if ($(y).attr("dataSource") == $(obj).attr("dataSource")) {
            $(y).show();
            return false;
        }
    })
    biCommon.mconvertrecord($("#transactionContent li.tab-switch-active").attr("type"), $("#startTime").val(), $("#endTime").val(), 1);
}
function getMeg(obj) {
    var start = new Date($("#startTime").val().replace(/\-/g, "\/"));
    var end = new Date($("#endTime").val().replace(/\-/g, "\/"));
    if (end < start) {
        notify("查询的结束时间必须大于开始时间！");
        return false;
    }
    var type = $("#transactionContent li.tab-switch-active").attr("type");
    var page = "";
    if (obj == "-1") {
        page = parseInt($("#num").val()) - 1;
        if (page >= 1) {
            $("#num").val(page);
        } else {
            notify("请输入正确的分页数！");
            return false;
        }
    } else if (obj == "+0") {
        page = $("#num").val();
        if (page < 1) {
            notify("请输入正确的分页数！");
            return false;
        }
    } else if (obj == "+1") {
        page = parseInt($("#num").val()) + 1;
        if (page <= $("#page").text()) {
            $("#num").val(page);
        } else {
            notify("请输入正确的分页数！");
            return false;
        }
    }
    if ($("#transactionContent").length > 0) biCommon.mconvertrecord(type, $("#startTime").val(), $("#endTime").val(), page);
    else biCommon.getBetInfo($("#historySel option:selected").val(), $("#startTime").val(), $("#endTime").val(), page);
}
function appendDataList(type, retData) {
    var str = '';
    $("#cashin").html("");
    switch (type) {
        case "1":
        case "2":
        case "3":
        case "4":
        case "5":
        case "7":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {//1成功，0未处理，2失败
                    var IsComplete = "", colr = "";
                    switch (retData[i].moneystatus) {
                        case "0":
                            IsComplete = "未处理";
                            colr = "green";
                            break;
                        case "1":
                            IsComplete = "成功";
                            colr = "green";
                            break;
                        default:
                            IsComplete = "失败";
                            colr = "red";
                            break;
                    }
                    var beizhu = retData[i].beizhu == "" ? "无" : retData[i].beizhu;
                    str += '<tr><td class="' + colr + '">' + IsComplete + '</td><td>' + retData[i].moneynum + '</td><td>' + retData[i].inputtime + '</td><td onclick="notify(\'' + beizhu + '\')">' + beizhu + '</td></tr>';
                }
                $("#cashin").html(str);
                $("#nothing").addClass("isHidden");
            } else {
                notify("暂无记录！");
                $("#nothing").removeClass("isHidden");
            }
            break;
        default:
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    var IsComplete = retData[i].IsComplete == true ? "成功" : "失败";
                    var colr = retData[i].IsComplete == true ? "green" : "red";
                    str += '<tr><td>' + retData[i].ConvertType + '</td><td>' + CUnits.DNetDate(retData[i].CreateTime).format("yyyy-MM-dd hh:mm") + '</td><td>' + retData[i].ConvertMoney + '</td><td class="' + colr + '">' + IsComplete + '</td><td onclick="notify(\'' + retData[i].ConvertText + '\')">' + retData[i].ConvertText + '</td></tr>';
                }
                $("#transferrecord").html(str);
                $("#nothing").addClass("isHidden");
            } else {
                notify("暂无记录！");
                $("#nothing").removeClass("isHidden");
            }
            break;
    }
}
//history下注记录
function historyPlatform(platform) {
    var str = "";
    for (var i = 0; i < platform.length; i++) {
        str += '<option value="' + platform[i].api_name + '">' + platform[i].api_mainname + '</option>';
    }
    $("#historySel").html(str);
    getMeg('+0');
}
function historyList(type, retData, res) {

    var str = "";
    var count = 0;
    var content = "";
    if (retData != "") {
        for (var i = 0; i < retData.length; i++) {
            count += parseFloat(retData[i].NetAmount);
            var gametype = historyZH(type, retData[i].GameType)
            var colr = retData[i].NetAmount >= 0 ? "green" : "red";
            var con = retData[i].BetContent;
            if (con.indexOf("注单状态") == 0) {
                var s = con.substring(5, con.indexOf(','))
                var plat = retData[i].PlatformType;
                content = "注单状态:" + changeState(plat, s) + con.substring(con.indexOf(','))

                if (changeState(plat, s) == undefined) content = retData[i].BetContent;
            }
            str += '<tr onclick="notify(\'' + retData[i].BetContent + '\')"><td>' + retData[i].BillNo + '</td><td>' + gametype + '</td><td>' + retData[i].BetAmount + '</td><td class="' + colr + '">' + retData[i].NetAmount + '</td><td>' + CUnits.DNetDate(retData[i].BetTime).format("yyyy-MM-dd hh:mm:ss") + '</td><td>' + retData[i].ValidBetAmount + '</td><td>' + content + '</td></tr>';
        }
        $("#getlists").html(str);
        var tongJi = JSON.parse(res.retMsg);
        $("#footCount").html('下注金额：' + tongJi.BetAmount + ', 有效投注：' + tongJi.ValidBetAmount + ", 实际输赢 <span id='countMoney'>" + tongJi.NetAmount + "</span>");
        $("#countMoney").removeClass();
        $("#pageCount").text(res.retTotal);
        parseFloat(tongJi.ValidBetAmount).toFixed(2) >= 0 ? $("#countMoney").addClass("green") : $("#countMoney").addClass("red")
    } else {
        notify("暂无下注记录！");
    }
}
function historyZH(platformCode, gameType) {
    var ZH = gameType;
    try {
        if (platformCode == "IG") {
            ZH = IGName(platformCode, gameType);
        } else {
            var data = eval('(' + 'electronicgame' + platformCode + ')').find(function (e) {
                if (platformCode == "PT") {
                    return gameType.indexOf(e.gameType) != -1;
                } else {
                    return e.gameType == gameType;
                }
            });
            if (data != undefined) ZH = data.gameName;
        }
    }
    catch (exception) {

    }
    return ZH;
}
function IGName(platformCode, gameType) {
    var ZH = gameType;
    var typeArr = gameType.split("-");
    var bigName = "";
    switch (typeArr[0]) {
        case "LOTTERY":
            bigName = "时时彩";
            break;
        case "GFC":
            bigName = "官方彩";
            break;
        case "LOTTO":
            bigName = "六合彩";
            break;
    }
    var data = eval('(' + 'electronicgame' + platformCode + ')').find(function (e) {
        if (e.gameLottery == typeArr[0] && e.gameType == typeArr[1]) {
            return e.gameType == typeArr[1];
        }
    });
    if (data != undefined) ZH = data.gameName + '(' + bigName + ')';
    return ZH;
}
var activityContent = [];
//优惠活动
function getDataActivity(retData) {
    for (var i = 0; i < retData.length; i++) {
        activityContent.push(retData[i]);
    }
    var str = "";
    if (retData != "") {
        for (var i = 0; i < retData.length; i++) {
            for (var j = i + 1; j < retData.length;) {
                if (retData[i].Type == retData[j].Type) retData.splice(j, 1);//去除重复的对象；
                else j++;
            }
        }
        for (var i = 0; i < retData.length; i++) {
            //str += '<li onclick="changeActive(' + retData[i].Type + ',this)">' + retData[i].TypeName + '</li>';
            str += '<li class="scarousel-item" data-uat="scarousel-item" onclick="changeActive(' + retData[i].Type + ',this)"><span class="promotions-category" data-action="Application.blockAction" >' + retData[i].TypeName + '</span></li>';

        }
        $("#activityTitle").html(str);
        $("#activityTitle li").eq(0).click();
    } else {
        notify("暂无优惠活动！");
    }
}
function activetyImg() {
    $(".contentbox").hide();
    $("#activety .hotbox dl dd img").click(function () {
        if ($(this).parent().parent().find(".contentbox").is(":hidden")) $(this).parent().parent().find(".contentbox").slideDown();
        else $(this).parent().parent().find(".contentbox").slideUp();

    })
}
function applicationActivities() {
    $("a.hotApplication").click(function () {
        biCommon.askActivity($(this).attr("data-id"));
    })
}
function changeActive(type, obj) {
    var str = "";
    $("#activityTitle li").removeClass("scarousel-active");
    $(obj).addClass("scarousel-active");
    for (var i = 0; i < activityContent.length; i++) {
        if (activityContent[i].Type == type) {
            str += '<div class="hotbox clearboth"><dl data-id="10"><dd><img src="' + activityContent[i].Pcimg + '"></dd><dd><div class="contentbox clearboth" style="display: none;">' + activityContent[i].Title + activityContent[i].Hottime + activityContent[i].Pc + '</div></dd></dl></div>';
            

        }
    }
    $("#activety").html(str);
    activetyImg();
    applicationActivities();
}
//transfer页面调用的方法
function getPlatform(platform) {//获取游戏列表
    var str = "";
    var arr = "";
    for (var i = 0; i < platform.length; i++) {
        str += '<option value="' + platform[i].api_name + '">' + platform[i].api_mainname + '</option>';
        arr += "<tr platform='" + platform[i].api_name + "'><td><span>" + platform[i].api_mainname + "</span><b>0.00</b><img src='/Areas/Wap9/Content/images/main/freshmoney.svg' onclick='chaxun(\"" + platform[i].api_name + "\",this)'/><div class='btntwo'><button onclick='yijianinout(\"" + platform[i].api_name + "\",this,\"in\")'>一键转入</button><button onclick='yijianinout(\"" + platform[i].api_name + "\",this,\"out\")'>一键转出</button></div></td></tr>";

    }
    $("#limitplace").html(str);
    $("#limitlist").html(arr);
}
function findPlateform(platform, type) {//刷新单个平台余额
    $("#limitlist tr").each(function (x, y) {
        if (type == 1) {
            if ($(y).attr("platform") == platform) {
                $(y).find("img").click();
            }
        } else {
            platform[$(y).attr("platform")] == "-1" ? "0.00" : $(y).find("b").html(platform[$(y).attr("platform")]);
        }
    })
}
function getPlateAllMoney(obj) {//一键刷新
    disabledT("1", obj);
    biCommon.getuserplatform(obj);
}
function chaxun(platformCode, obj) {
    biCommon.getGameBalance(platformCode, obj);
    $(obj).addClass("add");
}
function yijianinout(plateCode, obj, type) {//单个平台一键转入转出
    disabledT("1", obj);
    biCommon.transfer("", plateCode, "", type, obj);
}
function gameTransfer(obj) {
    if ($("#limitplace").text() == "") {
        notify("请选择游戏平台！",2);
        return false;
    }
    if ($("#operation").text() == "") {
        notify("请选择操作类型！",2);
        return false;
    }
    if ($("#amount").val() == "" || $("#amount").val() <= 0) {
        notify("请输入正确的转账金额！",2);
        return false;
    }
    disabledT("1", $("#zhuanru"));
    biCommon.transfer($("#amount").val(), $("#limitplace option:selected").val(), $("#operation option:selected").val(), "", obj);
}
function selectout_in(num) {
    $(".reveal-modal-bg").show();
    num == 0 ? $("#modalOut").css("visibility", "visible") : $("#modalIn").css("visibility", "visible");
}

function chooseplace(obj) {
    $('#modalOut').css('visibility', 'hidden');
    $('#modalIn').css('visibility', 'hidden');
    $('.reveal-modal-bg').hide();
    $("#gamePlatform").html($(obj).html());
    $("#gamePlatform").attr("platform", $(obj).attr("platform"));
    $("#gamePlatform").attr("num", $(obj).index());
    //$("#gamePlatform").attr("type", $(obj).attr("type"));
}

function caozuo(num, arr) {
    $('#modalOut').css('visibility', 'hidden');
    $('#modalIn').css('visibility', 'hidden');
    $('.reveal-modal-bg').hide();
    $("#operation").html(arr);
    $("#operation").attr("type", num);
}

function yijianzhuanchu(obj, type) {
    disabledT(1, obj);
    biCommon.rollout(obj, type);
}
function disabledT(num, obj) {
    if(num == "1") {
		$(obj).attr("disabled", true);
		$(obj).val($(obj).attr("warning"));
	} else {
		$(obj).attr("disabled", false);
		$(obj).val($(obj).attr("show"));
	}
}
//deposit存款页面
function changgepage(obj) {
    $("#depositTitle li").removeClass("active");
    $(obj).addClass("active");
    $(".content-section").hide();
    $(".content-section").each(function (x, y) {
        if ($(y).attr("choose") == $(obj).attr("choose")) {
            $(y).show();
        }
    })
    if ($(obj).attr("choose") == "withdraw") {
        biCommon.getBindbank($("#openBank"), $("#bankCard"), $("#bankMeg"), $("#TrueName"), 3);
    }
}
var countDeposit = 0;
function depositFun(type, retData) {
    var str = "";
    switch (type) {
        case "bank":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    $("#AccountHolders").val(retData[0].bankinfo);
                    $("#BankId").val(retData[0].bankid);
                   str += '<label><input type="radio" onclick="changebank(this);" value="' + retData[i].bankid + '" bankinfo="' + retData[i].bankinfo + '" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="6" bankId="' + retData[i].banktype + '">' + retData[i].banktype + '</label>';
                }
                $("#BankNames").html(str);
                $("#BankNames input[type='radio']").get(0).click();
            } else {
                notify("暂无公司汇款银行！");
            }
            break;
        case "wx":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "wx") {
                       str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap9/Content/images/main/wcxx.png"></label></div>';
                    }
                }
                $("#skAccount").html(str);
                $("#skAccount input[type=radio]").first().prop("checked", true);
            } else {
                notify("暂无线下微信汇款！");
            }
            break;
        case "zfb":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "zfb") {
                       str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap9/Content/images/main/zfbxx.png"></label></div>';
                    }
                }
                $("#skAccount").html(str);
                $("#skAccount input[type=radio]").first().prop("checked", true);
            } else {
                notify("暂无线下支付宝汇款！");
            }
            break;
        case "qqpay":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "qqpay") {
                        str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap9/Content/images/main/qqxx.png"></label></div>';
                    }
                }
                $("#skAccount").html(str);
                $("#skAccount input[type=radio]").first().prop("checked", true);
            } else {
                notify("暂无线下QQ汇款！");
            }
            break;
        case "ysf":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "ysf") {
                        str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap9/Content/images/main/ysfxx.png"></label></div>';
                    }

                }
                $("#skAccount").html(str);
                $("#skAccount input[type=radio]").first().prop("checked", true);
            } else {
                notify("暂无云闪付汇款！");
            }
            break;
    }
}
function changebank() {
    $("#AccountHolders").val($("#BankNames option:selected").attr("bankinfo"));
    $("#BankId").val($("#BankNames option:selected").val());
}
function compaly(num) {
    if ($("#commoney" + num).val() != "" && parseFloat($("#commoney" + num).val().trim()) >= $("#userNameController").attr("minmoney") && parseFloat($("#commoney" + num).val().trim()) <= $("#userNameController").attr("maxmoney")) {
        if (num != 0) {
            $("#money").text($("#commoney" + num).val());
            biCommon.qrcodeSave($("#partType").val(), $("#commoney" + num).val(), $("#skAccount input[type=radio]:checked").val());
        } else {
            if ($("#Accounts").val().trim() != "") {
                biCommon.bankSave($("#commoney" + num).val(), $("#Accounts").val());
            } else {
                notify("请输入汇款人姓名！");
            }
        }
    } else {
        notify("存款金额须在" + $("#userNameController").attr("minmoney") + "~" + $("#userNameController").attr("maxmoney") + "之间");
        return false;
    }
}
function showhideQr(code) {
    $(".deposit-detail").each(function (x, y) {
        if (!$(y).is(":hidden")) {
            $(y).find(".deposit-qrcode").show();
            $(y).find(".deposit-shuru").hide();
            $(y).find("button").hide();
            $(y).find(".zhuanCode").html(code.split('?')[1]);
        }
    })
}
//personData个人资料页面
function personDataFunc() {
    biCommon.getUserMeg($("#UserName"), $("#TrueName"), $("#Phone"), $("#openBank"), $("#bankCard"), $("#bankMeg"));
}
function backPre() {
    window.location.href = "/Index/info";
}
//withdraw提款页面
function tikuan(obj) {
    var mintkmoney = parseInt($("#userNameController").attr("mintkmoney"));
    if ($("#amount").val().trim() == "" || $("#amount").val().trim() < mintkmoney) {
        notify("提款金额不能小于" + mintkmoney + "！",2);
        return false;
    }
    if ($("#WithdrawalsPassword").val().trim() == "") {
        notify("请输入提款密码！",2);
        return false;
    }
    disabledT(1, obj);
    biCommon.withdrawMoney($("#amount").val().trim(), $("#WithdrawalsPassword").val().trim(), obj);
}
//info页面
function doLogout() {
    biCommon.logout();
}

//wtdCard银行卡
function clickadd() {
    var boo = false;
    if (boo) {
        alert("请先完善个人资料！");
        window.location.href = "/Index/personData";
    }
    
    $('#form_card').show();
    $("#newbtn").hide();
    $('.wtdCard-content').hide();
    //}
}

function addcard() {
    var boo = nullViliData($(".mod-forms-2"));
    if (boo) {
        biCommon.addCards($("#bankname option:selected").text(), $("#card").val(), $("#banknode").val());
    }
}
//kefu页面
function kefuIfr() {
    biCommon.getKeFu();
}
function kefuLink(retData) {
    $("#ifr").attr("src", retData.kf_link);
}
//公共的提示框
function notify(msg, type) {//1:没图标 2：有图标，错误提示
    type = type == undefined ? 1 : type;
    $(".user-info__popup--login").removeClass("isHidden");
    $("body").addClass("not_scorll");
    $("html").addClass("not_scorll");
    $("#errorText").html(msg);
    //closeNotify(type);
}
function closeNotify(type) {
    $("#errorText").html("");
    $(".user-info__popup--login").addClass("isHidden");
    $("body").removeClass("not_scorll");
    $("html").removeClass("not_scorll");

}
//获取对应的電子列表
function getElectronic(type) {
    if (type == 1) {
        plateform = biCommon.getQueryString()["id"];
        $("#gamePlate").val(plateform);
        plateform == "fish" ? $(".van-search").addClass("isHidden") : $(".van-search").removeClass("isHidden");
    } else {
        plateform = $("#gamePlate").val();
    }
    if (type == 1) {
        if (plateform == "fish") {
            biCommon.getApiFish()
        } else {
            biCommon.getGameSlotCount(plateform, "0", "1");
        }
    } else {
        if (plateform != "fish") biCommon.getGameSlotCount(plateform, "0", "1", $("#byelectronicsFocus").val());
    }
}

//根据ID获取对应的游戏列表
function getFishGame(retDate, type) {
    var str = "";
    for (var i = 0; i < retDate.length; i++) {
        if (type == "fish") {
            str += '<div data-v-38c8ad3c="" class="ptgame-item" onclick="return landing(this);" platformCode="' + retDate[i].api_Name + '" gameType="' + retDate[i].gameType + '" gameId="' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '" ><img data-v-38c8ad3c="" src="/img/fish/' + retDate[i].api_Name.toLowerCase() + '_' + retDate[i].onlyImg + '.png" alt="" ><p data-v-38c8ad3c="" class="text">' + retDate[i].api_Name + retDate[i].chineseName + '</p></div>'
        }
        else {
            str += '<div data-v-38c8ad3c="" class="ptgame-item" onclick="return landing(this);" platformCode="' + retDate[i].api_Name + '" gameType="' + retDate[i].gameType + '" gameId="' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '" ><img data-v-38c8ad3c="" src="/img/imgPC/' + retDate[i].api_Name.toLowerCase() + "/" + retDate[i].onlyImg + '.png" alt="" ><p data-v-38c8ad3c="" class="text">' + retDate[i].api_Name + retDate[i].chineseName + '</p></div>'
        }
    }
    $("#game-list").html(str);
}
//进入游戏之前验证是否已登录
function landing(obj) {
    if ($("#userNameController").val() != "") {
        var platformCode = $(obj).attr("platformCode");
        var gameType = $(obj).attr("gameType");
        var gameId = $(obj).attr("gameId");
        var gameName = $(obj).attr("gameName");
        biCommon.playGo(platformCode, gameName, gameType, gameId);
    } else {
        notify("请先登录游戏！");
        return false;
    }
}


function landingslocation() {//页面跳转
    if ($("#userNameController").val() != "") {
        return true;
    } else {
        notify("请先登录游戏！");
        return false;
    }
}

function getUserMoney() {
    if ($("#userNameController").val() != "") {
        setInterval("biCommon.getUserMoneys()", 6000);
    }
}

//在线存款

function banklist(obj, type) {
    var num = 0;
    var str = "";
    for (var i = 0; i < banklists.length; i++) {
        if (banklists[i].bankType == type) {
            num++;
            //str += '<li><input type= "radio" value="' + banklists[i].id + '" name="bank"/><img src="/img/bank/' + banklists[i].bankImg + '" /></li>';
            str += '<div class="tongdao-item"><input type = "radio" value = "' + banklists[i].id + '" name = "bank" onclick="changePayLine(this)" ><span>' + obj + '-' + num + '</span><img src="/img/bank/' + banklists[i].bankImg + '"></div>';
        }
    }
    $("#bankList").html(str);
}
function changePayLine(obj) {
    $(".detail-form.form1").hide();
    $(".detail-form.form2").show();
    $(".detail-form.form2 p.title").text($(obj).siblings("span").text());
}
function commitDeposit() {
    if ($("#bankList input[type='radio']:checked").length == 0) {
        notify("请选择存款银行！");
        return false;
    }
    if ($("#amount").val().trim() == "") {
        notify("请输入存款金额！");
        return false;
    }
    if (parseFloat($("#amount").val().trim()) < $("#userNameController").attr("minmoney") || parseFloat($("#amount").val().trim()) > $("#userNameController").attr("maxmoney")) {
        alert("存款金额须在" + $("#userNameController").attr("minmoney") + "~" + $("#userNameController").attr("maxmoney") + "之间");
        return false;
    }
    window.location.href = "/api/CashOperationApi?ApiInterface=payapi&money=" + $("#amount").val() + "&paytype=" + $("#bankList input[type='radio']:checked").val();
}
function landingslocations() {//进入游戏
    var urls = "/api/GameLoginApi?ApiInterface=login&" + location.search.substr(1);
    window.location.href = urls;
}
//红包功能
var setTimeoutadd = "", setTimeoutdel = "", win = "";
var num = 0, nums = 0;//增加红包
function hongbao() {
    $(".hongbao-content").show();
    win = (parseInt($(".couten").css("width"))) - 60;
    $(".couten").css("height", $(document).height());
    $("li").css({});
    addHb();
    delHb();
}
// 点击确认的时候关闭模态层
function clickMo() {
    $(".mo").css("display", "none");
    if ($("#hbCount").val() <= 0) {
        $(".hongbao-content").css("display", "none");
        clearInterval(setTimeoutadd);
        clearInterval(setTimeoutdel);
    }
}
function delHb() {
    nums++;
    $(".li" + nums).remove();
    setTimeoutdel = setTimeout(delHb, 200)
}
function addHb() {
    var hb = parseInt(Math.random() * (3 - 1) + 1);
    var Wh = parseInt(Math.random() * (70 - 30) + 20);
    var Left = parseInt(Math.random() * (win - 0) + 0);
    var rot = (parseInt(Math.random() * (45 - (-45)) - 45)) + "deg";
    num++;
    $(".couten").append("<li class='li" + num + "' ><a href='javascript:;'><img src='/Areas/Wap9/Content/images/main/hb_" + hb + ".png'></a></li>");
    $(".li" + num).css({
        "left": Left,
    });
    $(".li" + num + " a img").css({
        "width": Wh,
        "transform": "rotate(" + rot + ")",
        "-webkit-transform": "rotate(" + rot + ")",
        "-ms-transform": "rotate(" + rot + ")", /* Internet Explorer */
        "-moz-transform": "rotate(" + rot + ")", /* Firefox */
        "-webkit-transform": "rotate(" + rot + ")",/* Safari 和 Chrome */
        "-o-transform": "rotate(" + rot + ")" /* Opera */
    });
    $(".li" + num).animate({ 'top': $(window).height() + 20 }, 8000, function () {
        //删掉已经显示的红包
        this.remove()
    });
    //点击红包的时候弹出模态层
    $(".li" + num).click(function () {
        $(".loading-content").css("display", "block");
        biCommon.getHongBao();
    });
    setTimeoutadd = setTimeout(addHb, 400)
}
//网站维护
function getMaintain() {
    if ($("#userNameController").attr("systemRepair") != "False") {
        window.location.href = "/Home/MaintainMobile";
    }
}
//筛选出不重复的平台
function choosePlateForm(plateform) {
    if (dataPlateForm.length > 0) {
        for (var i = 0; i < dataPlateForm.length; i++) {
            //plateform 是否与数组中数字重复
            if (dataPlateForm[i] == plateform) break;
            //保证数组能够循环一遍后且不重复，再添加元素
            if (i == dataPlateForm.length - 1) dataPlateForm[i + 1] = plateform;
        }
    } else {
        dataPlateForm.push(plateform)
    }
}
//读取首页单独进入的游戏列表
function Exclusive() {
    var str = "";
    for (var j = 0; j < dataPlateForm.length; j++) {
        for (var i = 0; i < ExclusiveGame.length; i++) {
            if (dataPlateForm[j] == ExclusiveGame[i].platformcode) {
                exclusiveCount++;
                str += '<li onclick="return landing(this);" platformcode="' + ExclusiveGame[i].platformcode + '" gametype="' + ExclusiveGame[i].gametype + '" gameid="' + ExclusiveGame[i].gameid + '" gamename="' + ExclusiveGame[i].gamename + '"><a href= "javascript:void(0)" > <img src="/img/Exclusive/' + ExclusiveGame[i].platformcode + '/' + ExclusiveGame[i].gametype + '.png"><span class="game-text">' + ExclusiveGame[i].platformcode + ExclusiveGame[i].gameName + '</span></a></li>';
            }
        }
    }
    return str;
}
//申请代理
function dailiAdd() {
    if ($("#dailiContent").val().trim() != "") biCommon.addParner($("#dailiContent").val());
    else notify("请填写申请理由");
}


//关闭悬浮框
function closeLeftRight(obj) {
    $("." + obj).hide();
}


//用户协议
function openAgreementClick() {
    //$(".modal").show();
    $("div.md-landscape .md-popup").show();
    $("div.md-landscape .md-popup .md-popup-mask").show();
    $("div.md-landscape .md-popup .md-popup-box").show();
    $("div.close").show();
}
function closeModel() {
    //$(".modal").hide();
    $("div.md-landscape .md-popup").hide();
    $("div.md-landscape .md-popup .md-popup-mask").hide();
    $("div.md-landscape .md-popup .md-popup-box").hide();
    $("div.close").hide();
}
//首页真人電子轮播
function indexSwipers(){
   //真人，電子轮播
        var liveSwiper = new Swiper('.live-swiper', {
            slidesPerView: '2',
            spaceBetween: 20,
            slidesPerGroup: 2,
            autoplay: false,
            loop: false, // 循环模式选项
            // 如果需要分页器
            pagination: {
                el: '.live-pagination',
                clickable: true,
                dynamicBullets: true,
            }
    });
        var soltSwiper = new Swiper('.solt-swiper', {
            slidesPerView: '2',
            spaceBetween: 20,
            slidesPerGroup: 2,
            autoplay: false,
            loop: false, // 循环模式选项
            // 如果需要分页器
            pagination: {
                el: '.solt-pagination',
                clickable: true,
                dynamicBullets: true,
            }
        });
}

function bannerSwiper() {
//主页顶部轮播
        var bannerSwiper = new Swiper('.banner-swiper', {
            autoplay: true,
            autoplay: {
                disableOnInteraction: false,
                delay: 4000, //2秒切换一次
            },
            centeredSlides: true,
            loop: true, // 循环模式选项
            // 如果需要分页器
            pagination: {
                el: '.banner-pagination',
                clickable: true,
            }
        });

}

//打开右侧菜单栏
function openUserAccount() {
    if ($("#responsive-home-page").hasClass("current")) {
        $("#responsive-home-page").removeClass("current");
        $("#my-account-mobile").addClass("current");
        $("#my-account-mobile").removeClass("isHidden");
        $("#hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element").removeClass("i-16");
        $("#hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element").addClass("i-14");
        $("#hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element").addClass("i-o-controls-close");
    } else {
        $("#responsive-home-page").addClass("current");
        $("#my-account-mobile").removeClass("current");
        $("#my-account-mobile").addClass("isHidden");
        $("#hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element").addClass("i-16");
        $("#hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element").removeClass("i-14");
        $("#hr-top-Top_ResponsiveHeader_45143-page-header-right3-icon-element").removeClass("i-o-controls-close");
    }
}

//打开左侧菜单栏
function showleftMenu() {
    if ($("html").hasClass("prepareMenuTransition")) {
        $("html").removeClass("prepareMenuTransition");
        $("html").removeClass("fixedMenuEnabled");
    } else {

        $("html").addClass("prepareMenuTransition");
        $("html").addClass("fixedMenuEnabled");
    }
}
//返回顶部
function pageScroll() {
    $('body,html').animate({
        scrollTop: 0
    }, 800)
}
//切换修改密码
function changeOrder(obj) {
    $("a.user-info__tab").removeClass("user-info__tab--active");
    $(obj).addClass("user-info__tab--active");
    $("div.personal-details").attr("data-current-page", $(obj).index() + 1);
}

//快捷金额
function chooseBlance(obj, money) {
    $(".kjinput div").removeClass("btn-kjActive");
    $(obj).addClass("btn-kjActive");
    $(".czMoney").val(money);
}
//公司入款，下一步
function nextstep(num) {
    //对应公司入款流程导航
    $("#stepway li").eq(num).addClass("active")
        .siblings().removeClass("active");
    //对应公司入款流程导航显示
    $("#stepwayContent div.stepway").eq(num).show()
        .siblings().hide();
}
//汇款信息备注显示隐藏
function despoitremark(obj) {
    if ($(obj).hasClass("icon_plus")) {
        $(obj).addClass("icon_minus").removeClass("icon_plus");
        $("#despoitremark").show();
    } else {
        $(obj).addClass("icon_plus").removeClass("icon_minus");
        $("#despoitremark").hide();
    }
}
//切换收款银行
function changebank(obj) {

    $("#bankName").text($(obj).val());
    $("#AccountHolders").text($(obj).attr("bankinfo"));
    $("#BankId").text($(obj).attr("bankId"));

    $("#bankName1").text($(obj).val());
    $("#AccountHolders1").text($(obj).attr("bankinfo"));
    $("#BankId1").text($(obj).attr("bankId"));

    $("#bankName2").val($(obj).val());
    $("#AccountHolders2").val($(obj).attr("bankinfo"));
    $("#BankId2").val($(obj).attr("bankId"));
}