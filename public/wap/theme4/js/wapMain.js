var gamePageSize = 1000;
var dataPlateForm = [];
var exclusiveCount = 0;
//首页开通接口展示index
function getGamePlate(num) {
    biCommon.getGamePlates(num);
}
function platformIndexs(platform) {
    var count = 1;
    var str = "";
    if (indexQuickNav == 1) {
        quickNav(platform);
        $("#quickList").html(liveQuick);
    }
    for (var i = 0; i < platform.length; i++) {
        if (platform[i].plattype != "fish") {
            var name = getTypeCh(platform[i].plattype);
            if (platform[i].plattype == "game") {
                str += '<li><a href="/Index/game?id=' + platform[i].api_name + '"><img src="/Areas/Wap1/Content/images/BIimg/' + platform[i].api_name.toUpperCase() + '.png"/><span>' + platform[i].api_title + name + '</span></a></li>';
            } else {
                if (platform[i].plattype == "liuhecai") {
                    str += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimg/' + platform[i].api_name.toUpperCase() + '6.png"/><span>' + platform[i].api_title + '六合彩</span></a></li>';
                } else if (platform[i].plattype == "guanfangcai"){
                    str += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimg/' + platform[i].api_name.toUpperCase() + 'gfc.png"/><span>' + platform[i].api_title + '官方彩</span></a></li>';
                } else {
                    str += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimg/' + platform[i].api_name.toUpperCase() + '.png"/><span>' + platform[i].api_title + name + '</span></a></li>';
                }
            }
            count++;
        }
        choosePlateForm(platform[i].api_name);
    }
    if (plateFormGameChild == 1) {
        str = str + Exclusive();
        count += exclusiveCount;
    }
    str += '<li><a href="/Index/game?id=fish"><img src="/img/fish/fish.png"/><span>欢乐捕魚</span></a></li>';
    //安卓ios下载
    if (indexQuickNav == 1) {
        if ($("#userNameController").attr("downandroid") != "") {
            $("#androidUrL").attr("href", $("#userNameController").attr("downandroid"));
            $("#androidUrL").css({ "display": "inline-block" });
        }
        if ($("#userNameController").attr("downios") != "") {
            $("#iosUrL").attr("href", $("#userNameController").attr("downios"));
            $("#iosUrL").css({ "display": "inline-block" });
        }
    } else {
        if ($("#userNameController").attr("downandroid") != "") {
            count++;
            str += '<li><a href="' + $("#userNameController").attr("downandroid") + '"><img src="/Areas/Wap1/Content/images/main/anzhuo.png"/><span>安卓客户端</span></a></li>';
        }
        if ($("#userNameController").attr("downios") != "") {
            count++;
            str += '<li><a href="' + $("#userNameController").attr("downios") + '"><img src="/Areas/Wap1/Content/images/main/ios.png"/><span>IOS客户端</span></a></li>';
        }
    }

    if (count % 4 != 0){
        for (var j = 0; j < 4 - (count % 4); j++) {
            str += '<li class="platform-more hei"><span>敬请期待</span></li>';
        }
    }
    $("#gamelist").html(str);
}
//首页快捷导航栏
function quickNav(platform) {
    for (var i = 0; i < platform.length; i++) {
        var name = getTypeCh(platform[i].plattype);
        switch (platform[i].plattype) {
            case "live":
                liveQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "game":
                slotQuick += '<li><a href="/Index/game?id=' + platform[i].api_name + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "sport":
                sportQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "lottery":
                lotteryQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "liuhecai":
                lotteryQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '6.png" /><span>' + platform[i].api_title + '六合彩</span></a></li>';
                break;
            case "guanfangcai":
                lotteryQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + 'gfc.png" /><span>' + platform[i].api_title + '官方彩</span></a></li>';
                break;
            case "chess":
                chessQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            case "competition":
                competitionQuick += '<li><a href="javascript:void(0)" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
                break;
            //default: slotQuick += '<li><a href="/Index/game?id=' + platform[i].api_name + '"><img src="/Areas/Wap1/Content/images/BIimgQuick/' + platform[i].api_name.toUpperCase() + '.png" /><span>' + platform[i].api_title + name + '</span></a></li>';
        }
    }
}
function showQuickData(obj, index) {
    $(".swiper-quickcontainer .swiper-slide").removeClass("active");
    if (index == '') {
        $(obj).addClass("active");
    } else {
        $(".swiper-quickcontainer .swiper-slide").eq(index).addClass("active");
    }
    $("#quickList").html(eval($("#quickNav .swiper-slide.active").attr("type")));
}
function swiperLoad() {
    if (indexQuickNav == 0) {
        $("#quickContent").hide();
        $("#quickList").hide();
        $("#gamelist").show();
        mySwiper = new Swiper('.swiper-quickcontainer', {
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
function pwdViliData(pwd, surePwd,type) {
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
    if (boo) boo = pwdViliData($("#regUserpwd"), $("#regUserSurepwd"),1);
    if (boo) boo = withdrawalsPwdViliData($("#regUserWithdrawalsPwd"));
    if (boo && !$("#Mailbox").is(":hidden")) boo = isEmail($("#regMailbox").val().trim(), "#regMailbox");
    if(boo) {
        var name = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,9}$/;
        var trueName = /^[\u4E00-\u9FA5\uf900-\ufa2d·.s]{1,24}$/;
        var phone = /^1[3456789]\d{9}$/;
        if(!name.test($("#regUsername").val().trim())) {
            notify("用户名必须包含字母和数字!");
            $("#regUsername").val("");
            return false;
        }
        if(!trueName.test($("#regUserTrueName").val().trim())) {
            notify("请输入正确的姓名!");
            $("#regUserTrueName").val("");
            return false;
        }
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
        if (boo) boo = pwdViliData($("#newPwd"), $("#confirmPwd"), 1);
    } else {
        if (boo) {
            boo = pwdViliData($("#newPwd"), $("#confirmPwd"), 2);
            if (boo)    boo = withdrawalsPwdViliData($("#confirmPwd"));
        }
    }
    if (boo) biCommon.updatepwd($("#oldPwd").val().trim(), $("#confirmPwd").val().trim(),type);
}
//transaction页面
function transactionChange(obj, num) {
    $("#num").val(1);
    $(".dep-title span").removeClass("active");
    $(".dep-title span").eq(num).addClass("active");
    $("#transactionContent table").hide();
    $("#transactionContent table").each(function (x, y) {
        if ($(y).attr("dataSource") == $(obj).attr("dataSource")) {
            $(y).show();
            return false;
        }
    })
    biCommon.mconvertrecord($(obj).attr("type"), $("#startTime").val(), $("#endTime").val(), 1);
}
function getMeg(obj) {
    var start = new Date($("#startTime").val().replace(/\-/g, "\/"));
    var end = new Date($("#endTime").val().replace(/\-/g, "\/"));
    if (end < start) {
        notify("查询的结束时间必须大于开始时间！");
        return false;
    }
    var type = $(".dep-title span.active").attr("type");
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
function appendDataList(type,retData) {
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
                    var IsComplete = "",colr = "";
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
            } else {
                notify("暂无记录！");
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
            }else {
                notify("暂无记录！");
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
            str += '<tr onclick="notify(\'' + retData[i].BetContent + '\')"><td>' + retData[i].BillNo + '</td><td>' + gametype + '</td><td>' + retData[i].BetAmount + '</td><td class="' + colr + '">' + retData[i].NetAmount + '</td><td>' + CUnits.DNetDate(retData[i].BetTime).format("yyyy-MM-dd hh:mm:ss") + '</td><td>' + retData[i].ValidBetAmount+'</td><td>' + content + '</td></tr>';
        }
        $("#getlists").html(str);
        var tongJi = JSON.parse(res.retMsg);
        $("#footCount").html('下注金额：' + tongJi.BetAmount + ', 有效投注：' + tongJi.ValidBetAmount + ", 实际输赢 <span id='countMoney'>" + tongJi.NetAmount + "</span>");
        $("#countMoney").removeClass();
        $("#pageCount").text(res.retTotal);
        parseFloat(tongJi.ValidBetAmount).toFixed(2) >=  0 ? $("#countMoney").addClass("green") : $("#countMoney").addClass("red")
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
            str += '<li onclick="changeActive(' + retData[i].Type + ',this)">' + retData[i].TypeName + '</li>';
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
    $("#activityTitle li").removeClass("active");
    $(obj).addClass("active");
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
function getPlatform(platform){//获取游戏列表
    var str = "";
    var arr = "";
    for (var i = 0; i < platform.length; i++) {
        str += '<li platform="' + platform[i].api_name + '" onclick="chooseplace(this)">' + platform[i].api_mainname + '</li>';
        arr += "<tr platform='" + platform[i].api_name + "'><td><span>" + platform[i].api_mainname + "</span><b>0.00</b><img src='/Areas/Wap1/Content/images/main/freshmoney.svg' onclick='chaxun(\"" + platform[i].api_name + "\",this)'/><div class='btntwo'><button onclick='yijianinout(\"" + platform[i].api_name + "\",this,\"in\")'>一键转入</button><button onclick='yijianinout(\"" + platform[i].api_name + "\",this,\"out\")'>一键转出</button></div></td></tr>";
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
function chaxun(platformCode,obj){
    biCommon.getGameBalance(platformCode,obj);
    $(obj).addClass("add");
}
function yijianinout(plateCode,obj,type) {//单个平台一键转入转出
    disabledT("1", obj);
    biCommon.transfer("", plateCode,"", type, obj);
}
function gameTransfer(){
    if($("#gamePlatform").text() == ""){
        notify("请选择游戏平台！");
        return false;
    }
    if($("#operation").text() == ""){
        notify("请选择操作类型！");
        return false;
    }
    if($("#amount").val() == "" || $("#amount").val() <= 0){
        notify("请输入正确的转账金额！");
        return false;
    }
    disabledT("1", $("#zhuanru"));
    biCommon.transfer($("#amount").val(), $("#gamePlatform").attr("platform"), $("#operation").attr("type"),"", $("#zhuanru"));
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

function yijianzhuanchu(obj){
    disabledT(1,obj);
    biCommon.rollout(obj);
}
function disabledT(num,obj) {
    if(num == "1") {
        $(obj).attr("disabled", true);
        $(obj).css({
            "background-color": "#ccc"
        });
        $(obj).val($(obj).attr("warning"));
    } else {
        $(obj).attr("disabled", false);
        $(obj).css({
            "background-color": "#007aff"
        });
        $(obj).val($(obj).attr("show"));
    }
}
//deposit存款页面
function changgepage(obj, num) {
    $("#mgmChongZhi span").removeClass("active");
    $(obj).addClass("active");
    $(".depcont").hide();
    if ($(obj).attr("type") != "zxcz") {
        $(".depcont").each(function (x, y) {
            if ($(y).attr("type") == $(obj).attr("type")) $(y).show();
        })
    }
    if ($(obj).attr("type") == "zxcz") window.location.href = "/Index/chongbanklist";
}
var countDeposit = 0;
function depositFun(type, retData) {
    var str = "";
    countDeposit++;
    switch (type) {
        case "bank":
            if (biCommon.isEmptyObject(retData) == false) {

                $("#mgmChongZhi span").eq(0).css({ "display": "inline-block" });
                for (var i = 0; i < retData.length; i++) {
                    str += '<option value="' + retData[i].bankid + '" bankinfo ="' + retData[i].bankinfo + '">' + retData[i].banktype + '</option>';
                }
                $("#AccountHolders").val(retData[0].bankinfo);
                $("#BankId").val(retData[0].bankid);
                $("#BankNames").html(str);
            }
            break;
        case "wx":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "wx") str += '<option value="' + retData[i].id + '" payname ="' + retData[i].payname + '" img="' + retData[i].img + '">' + retData[i].payname + '</option>';
                }
                if (str != "") {
                    $("#mgmChongZhi span").eq(1).css({ "display": "inline-block" });
                    $("#wxSel").html(str);
                }
            } else {
                notify("暂无线下微信汇款！");
            }
            break;
        case "zfb":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "zfb") str += '<option value="' + retData[i].id + '" payname ="' + retData[i].payname + '" img="' + retData[i].img + '">' + retData[i].payname + '</option>';
                }
                if (str != "") {
                    $("#mgmChongZhi span").eq(2).css({ "display": "inline-block" });
                    $("#zfbSel").html(str);
                }
            } else {
                notify("暂无线下支付宝汇款！");
            }
            break;
        case "qqpay":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "qqpay") str += '<option value="' + retData[i].id + '" payname ="' + retData[i].payname + '" img="' + retData[i].img + '">' + retData[i].payname + '</option>';
                }
                if (str != "") {
                    $("#mgmChongZhi span").eq(4).css({ "display": "inline-block" });
                    $("#qqSel").html(str);
                }
            } else {
                notify("暂无线下QQ汇款！");
            }
            break;
        case "ysf":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "ysf") str += '<option value="' + retData[i].id + '" payname ="' + retData[i].payname + '" img="' + retData[i].img + '">' + retData[i].payname + '</option>';
                }
                if (str != "") {
                    $("#mgmChongZhi span").eq(5).css({ "display": "inline-block" });
                    $("#yunsfSel").html(str);
                }
            } else {
                notify("暂无云闪付汇款！");
            }
            break;
    }
    if (countDeposit == 5) {
        var count = 0;
        $("#mgmChongZhi span").each(function (x, y) {
            if (!$(y).is(":hidden")) {
                if (count == 0) {
                    count++;
                    $(y).click();
                }
            }
        })
    }
}
function changebank() {
    $("#AccountHolders").val($("#BankNames option:selected").attr("bankinfo"));
    $("#BankId").val($("#BankNames option:selected").val());
}
function compaly(num) {
    if ($("#commoney" + num).val() != "" && parseFloat($("#commoney" + num).val().trim()) >= $("#userNameController").attr("minmoney") && parseFloat($("#commoney" + num).val().trim()) <= $("#userNameController").attr("maxmoney")) {
        if (num != 0) {
            var name = "";
            $(".depcont").each(function(x,y){
                if (!$(y).is(":hidden")) name = $(y).find("select option:selected").text();
            })
            biCommon.qrcodeSave($("#mgmChongZhi span.active").attr("partype"), $("#commoney" + num).val(), name );
        } else {
            if ($("#Accounts").val().trim() != "") {
                biCommon.bankSave($("#commoney" + num).val(), $("#Accounts").val());
            } else {
                notify("请输入汇款人姓名！");
            }
        }
    }else{
        notify("存款金额须在" + $("#userNameController").attr("minmoney") + "~" + $("#userNameController").attr("maxmoney")+"之间");
        return false;
    }
}
function showhideQr(code) {
    $(".depcont").each(function(x,y){
        if (!$(y).is(":hidden")) {
            $(y).find(".depcont-img").show();
            $(y).find(".dep-warning").show();
            $(y).find(".dep-warnings").show();
            $(y).find(".mod-forms").hide();
            $(y).find("input[type='submit']").hide();
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
function tikuan(obj){
    var mintkmoney = parseInt($("#userNameController").attr("mintkmoney"));
    if ($("#amount").val().trim() == "" || $("#amount").val().trim() < mintkmoney) {
        notify("提款金额不能小于" + mintkmoney + "！");
        return false;
    }
    if($("#WithdrawalsPassword").val().trim() == ""){
        notify("请输入提款密码！");
        return false;
    }
    disabledT(1,obj);
    biCommon.withdrawMoney($("#amount").val().trim(),$("#WithdrawalsPassword").val().trim(),obj);
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
        //window.location.href = "/Index/personData";
    }
    //if($("#cardlist tbody tr").length >= 3) {
    //notify('每人最多可绑定3张卡');
    //} else {
    $('#form_card').show();
    $("#newbtn").hide();
    $('.wtdCard-content').hide();
    //}
}

function addcard(){
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
function notify(msg, type) {
    if(!type) {
        type = 'info';
    }
    Messenger().post({
        message: msg,
        type: type,
        hideAfter: 3,
        showCloseButton: true
    });
}
//获取对应的電子列表
function getElectronic(type) {
    var str = "";
    var plateform = biCommon.getQueryString()["id"];
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
function getFishGame(retDate,type) {
    var str = "";
    for (var i = 0; i < retDate.length; i++) {
        if (type == "fish") str += '<li onclick="return landing(this);" platformCode="' + retDate[i].api_Name + '" gameType = "' + retDate[i].gameType + '" gameId="' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '"><a href="javascript:void(0)"><img src="/img/fish/' + retDate[i].api_Name.toLowerCase() + '_' + retDate[i].onlyImg + '.png"><span class="game-text">' + retDate[i].api_Name+ retDate[i].chineseName + '</sapn></a></li>';
        else str += '<li onclick="return landing(this);" platformCode="' + retDate[i].api_Name + '" gameType = "' + retDate[i].gameType + '" gameId="' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '"><a href="javascript:void(0)"><img src="/img/imgPC/' + retDate[i].api_Name.toLowerCase() + "/" + retDate[i].onlyImg + '.png"><span class="game-text">'+ retDate[i].chineseName + '</sapn></a></li>';
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


function landingslocation(){//页面跳转
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
    var str = "";
    $("#zxDepositTitle li").removeClass("active");
    $(obj).addClass("active");
    for (var i = 0; i < banklists.length; i++) {
        if (banklists[i].bankType == type) str += '<li><input type= "radio" value="' + banklists[i].id + '" name="bank"/><img src="/img/bank/' + banklists[i].bankImg + '" /></li>';
    }
    $("#bankList").html(str);
    $("#bankList input[type='radio']").get(0).checked = true;
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
    $(".couten").append("<li class='li" + num + "' ><a href='javascript:;'><img src='/Areas/Wap1/Content/images/main/hb_" + hb + ".png'></a></li>");
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
        //window.location.href = "/Home/MaintainMobile";
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
