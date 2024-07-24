var gamePageSize = 1000;
var dataPlateForm = [];
var exclusiveCount = 0;
//首页开通接口展示index
function getGamePlate(num) {
   
    biCommon.getGamePlates(num);
}
function platformIndexs(platform) {
    biCommon.getApiFish("fishindex");
    var sport = "", lottery = "", live = "", slot = "", chess = "", layoutFish = "", competition = "", sportleft = "", lotteryleft = "", liveleft = "", slotleft = "", chessleft = "", Fishleft = "", competitionleft = "";
    for (var i = 0; i < platform.length; i++) {
        var name = getTypeCh(platform[i].plattype);
        if (platform[i].plattype == "sport") {
            sportleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'
            sport += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/sport/' + platform[i].api_name.toUpperCase() +'.png" class="GameImg" /></div>'
        } else if (platform[i].plattype == "competition") {
            competitionleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'
            competition += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/competition/' + platform[i].api_name.toUpperCase() +'.png" class="GameImg" /></div>'
        }  else if (platform[i].plattype == "live") {
            liveleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'

            live += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/live/' + platform[i].api_name.toUpperCase() +'1.png" class="GameImg" /></div>'
        } else if (platform[i].plattype == "chess") {
            chessleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'

            chess += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/board/' + platform[i].api_name.toUpperCase() +'1.png" class="GameImg" /></div>'
        } else if (platform[i].plattype == "game") {

            slotleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'

            slot += '<div style="padding: 10px;"  platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><a href="/Index/game?id=' + platform[i].api_name + '"><img src="/Areas/Wap8/Content/images/BIimg/game/' + platform[i].api_name.toUpperCase()+'.png" class="GameImg" /></a></div>'
        } else if (platform[i].plattype == "lottery") {

            lotteryleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'
            lottery += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/lottery/' + platform[i].api_name.toUpperCase() + '1.png" class="GameImg" /></div>'
        } else if (platform[i].plattype == "liuhecai") {

            lotteryleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'
            lottery += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/lottery/' + platform[i].api_name.toUpperCase() +'1.png" class="GameImg" /></div>'
        } else if (platform[i].plattype == "guanfangcai") {
            lotteryleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'

            lottery += '<div style="padding: 10px;" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><img src="/Areas/Wap8/Content/images/BIimg/lottery/' + platform[i].api_name.toUpperCase() +'1.png" class="GameImg" /></div>'
        }
        else if (platform[i].plattype == "fish"){
            Fishleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" platformCode="' + platform[i].api_name + '" gameType = "' + platform[i].gameType + '"><div class="am-list-line"><div class="am-list-content">' + platform[i].api_title + name + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'

        }
    }
    $("#layoutSport").html(sport);
    $("#layoutLottery").html(lottery);
    $("#layoutLive").html(live);
    $("#layoutChess").html(chess);
    $("#layoutSlot").html(slot);
    $("#layoutCompetition").html(competition);
    $("#layoutFish").html(layoutFish);

    $("#indexSport").html(sportleft);
    $("#indexLottery").html(lotteryleft);
    $("#indexLive").html(liveleft);
    $("#indexChess").html(chessleft);
    $("#indexSlot").html(slotleft);
    $("#indexCompetition").html(competitionleft); 
    $("#indexFishleft").html(Fishleft);
    $(".HomeCenterout ul li").eq(0).addClass("Setative").click();


}
//底部
function TabbottomSide() {
   
    var num = biCommon.getQueryString()["tap"];
    $("#tablistId").find("div.am-tab-bar-tab").eq(num - 1).attr("aria-selected", "true").addClass("am-tab-bar-tab-active").siblings().attr("aria-selected", "false").removeClass("am-tab-bar-tab-active");
    $("#tablistId").find("div.am-tab-bar-tab").eq(num - 1).find(".am-tab-bar-tab-icon").addClass("bgicon").removeClass("bgwhite").parent().siblings().children().removeClass("bgicon").addClass("bgwhite");
    $("#tablistId").find("div.am-tab-bar-tab").eq(num - 1).find(".am-tab-bar-tab-title").addClass("bgicon").removeClass("bgwhite").parent().siblings().children().removeClass("bgicon").addClass("bgwhite");
}
function downLoadApp() {
    if ($("#userNameController").attr("downandroid") != "") {
        $(".androidUrL").attr("href", $("#userNameController").attr("downandroid"));
    }
    if ($("#userNameController").attr("downios") != "") {
        $(".androidUrL").attr("href", $("#userNameController").attr("downios"));
    }
}
function layoutFish(retDate) {
    var fishQuick = '';
    var Fishleft = '';
    for (var i = 0; i < retDate.length; i++) {
        fishQuick += '<div style="padding: 10px;" onclick="return landing(this);" game-box="' + (retDate[i].api_Name.toLowerCase() + '_' + retDate[i].onlyImg) + '" platformCode="' + retDate[i].api_Name + '" gameType = "' + retDate[i].gameType + '" gameId= "' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '"><a><img src="/Areas/Wap8/Content/images/BIimg/fish/' + (retDate[i].api_Name.toLowerCase() + '_' + retDate[i].onlyImg) + '.png" class="GameImg" /></a></div>';
        Fishleft += '<div class="drawer-Line am-list-item am-list-item-middle" onclick="return landing(this);" game-box="' + (retDate[i].api_Name.toLowerCase() + '_' + retDate[i].onlyImg) + '" platformCode="' + retDate[i].api_Name + '" gameType = "' + retDate[i].gameType + '" gameId= "' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '"><div class="am-list-line"><div class="am-list-content">' + retDate[i].chineseName + '</div> </div><div class="am-list-ripple" style="display: none;"></div> </div>'

        //str += '<li type= "' + retDate[i].plattype + '" onclick= "return landing(this);" platformCode= "' + retDate[i].api_Name + '" gameType = "' + retDate[i].gameType + '" gameName= "' + retDate[i].gameName + '" gameId= "' + retDate[i].gameId + '" > ' + retDate[i].chineseName + '</li>';
    }
 
    $("#layoutFish").html(fishQuick);
    $("#indexFishleft").html(Fishleft);
}
//存款页面
function MoneybottomSide(num) {
    
    $("#moneybottom").find("div.am-flexbox-item.buttonB2 p").eq(num - 1).addClass("Headhave").removeClass("Headnohave").parent().parent().siblings().children().find("p").addClass("Headnohave").removeClass("Headhave");
       
}
//首页
function Showlist(type, obj) {
    $(obj).siblings().removeClass("Setative");
    $(obj).addClass("Setative");

    switch (type) {
        case "layoutSport":
            $("div.RightTabs").hide();
            $("#layoutSport").show();
            break;
        case "layoutLottery":
            $(obj).removeClass("Setative")
            $(obj).addClass("Setative")
            $("div.RightTabs").hide();
            $("#layoutLottery").show();
          
            break;
        case "layoutChess":
            $("div.RightTabs").hide();
            $("#layoutChess").show();
            break;
        case "layoutSlot":
            $("div.RightTabs").hide();
            $("#layoutSlot").show();
          
            break;
        case "layoutCompetition":
            $("div.RightTabs").hide();
            $("#layoutCompetition").show();
            
            break;
        case "layoutLive":
            $("div.RightTabs").hide();
            $("#layoutLive").show();
            break;
        case "layoutFish":
            $("div.RightTabs").hide();
            $("#layoutFish").show();
            break;
    }

}
function showQuickData(obj, index) {
	var arr = "";
	var str = "";
    if (index == undefined) {
        $("#indexLottery .swiper-slide").removeClass("swiper-slide-active");
		$("#indexLottery .swiper-slide").each(function (x, y) {
			if($(y).attr("plateform") == obj.slides[obj.clickedIndex].attributes["plateform"].nodeValue) $(y).find("b").addClass("mui-active");
			else $(y).find("b").removeClass("mui-active");
		})
		arr = eval(obj.slides[obj.clickedIndex].attributes["plateform"].nodeValue + "LotteryList");
    } else {
		arr = eval(obj + "LotteryList");
        $("#indexLottery li.swiper-slide").eq(index).find("b").addClass("mui-active")
    }
	for (var i = 0; i < arr.length;i++){
		str += '<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href= "javascript:;" onclick= "return landing(this);" platformCode= "' + arr[i].plateform + '" gameType= "' + arr[i].gameType + '" gameId= "' + arr[i].gameId + '" class="_api"><img src="/Areas/Wap8/Content/images/lottery/' + arr[i].plateform +'/'+arr[i].imgName+'.png" class="lottery-img" /> <div class="mui-media-body" >'+arr[i].name+'</div></a></li>';
	}
	$(".lotteryList").html(str);
        
}

//侧滑菜单打开或隐藏
function Opentoolbar() {

    $("#open").removeClass("am-openbars");
    $("#open").addClass("am-openbar");
    $("#open1").addClass("am-openbar1");
    $("#open2").addClass("am-openbar2");
}
function Closetoolbar() {
    $("#open").addClass("am-openbars");
    $("#open").removeClass("am-openbar");
    $("#open1").removeClass("am-openbar1");
    $("#open2").removeClass("am-openbar2");
 
}
var clicknum = 0;
//点击列表展开或关闭
function OpenOrClose(type, obj) {
    clicknum++;
    $(obj).siblings().children().attr("aria-expanded", false);
    $(obj).children().attr("aria-expanded", true);
    $(".am-accordion-content.am-accordion-content-active").hide();
    switch (type) {
        case "sport1":
            $("#sport1").show();
            break;
        case "IM1":   
            $("#IM1").show();
            break;
        case "chess1":
     
            $("#chess1").show();
            break;
        case "slot1":         
            $("#slot1").show();
            break;
        case "competition1":
            $("#competition1").show();

            break;
        case "live1":
            $("#live1").show();
            break;
        case "fish1":
            $("#fish1").show();
            break;
    } 
  
    if (clicknum % 2 == 0) {
        $(obj).children().attr("aria-expanded", false);
        $(".am-accordion-content.am-accordion-content-active").hide();
    }
}

//Game页面
function gameOpen(plateform) {
    window.location.href = "/Index/game?id=" + plateform;
}
//首页查询游戏平台余额
function apiListIndex(platform) {
    var str = "";
    for (var i = 0; i < platform.length; i++) {
        str += '<li onclick="chooseplace(this)" class="item_data"><span>' + platform[i].api_mainname + '</span><span class="apibalance" platform="' + platform[i].api_name + '">￥0</span></li>';
    }
    $("#api-balance").html(str);
    biCommon.getuserplatform("", 3);
}
function apiBalanceIndex(platform) {
    $("#api-balance li").each(function (x, y) {
        platform[$(y).find("span").eq(1).attr("platform")] == "-1" ? "￥0" : $(y).find("span").eq(1).html("￥"+platform[$(y).find("span").eq(1).attr("platform")]);
    })
    
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
    $(".login-form input").each(function (x, y) {
        if ($(y).val().trim() == "" && !$(y).is(':hidden')) {
            notify($(y).attr("placeholder") + "!");
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

function bottomLocation() {
    
    $(".app_bottom.tablist").each('click', 'a', function (x, y) {
        alert(1111);
    })
        
   
}
//跳转方法封装
function hrefPage(url, id, title) {
    window.location.href = url;
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
//返回上一步
//function goLast(obj) {
//    if (obj == "/Index" || obj == "deposit" || obj == "kefu" || obj == "activity" || obj == "info") {
//        switch (obj) {
//            case "/Index":
//                window.location.href = "/Index/" + obj + "?tap=1";
//                break;
//            case "/deposit":
//                window.location.href = "/Index/" + obj + "?tap=2";
//                break;
//            case "/kefu":
//                window.location.href = "/Index/" + obj + "?tap=3";
//                break;
//            case "/activity":
//                window.location.href = "/Index/" + obj + "?tap=4";
//                break;
//            case "/info":
//                window.location.href = "/Index/" + obj + "?tap=5";
//                break;
//        }
//    } else {
//        window.location.href = "/Index/" + obj ;
//    }
//}
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
        var phone = /^1[3456789]\d{9}$/;
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
function transactionChange(obj) {
    $("#num").val(1);
    $(obj).attr("aria-selected", true).addClass("am-tabs-tab-active");
    $(obj).siblings().attr("aria-selected", false).removeClass("am-tabs-tab-active");
    $(".mine-table table").hide();
    $(".mine-table table").each(function (x, y) {
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
    var type = $("#transactionContent div.am-tabs-tab-active").attr("type");
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
        str += '<option type="' + platform[i].api_name + '" value="' + platform[i].api_name + '">' + platform[i].api_mainname + '</option>';
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
            str += '<tr onclick="notify(\'' + retData[i].BetContent + '\')"><td>' + retData[i].BillNo + '</td><td>' + gametype + '</td><td>' + retData[i].BetAmount + '</td><td class="' + colr + '">' + retData[i].NetAmount + '</td><td>' + CUnits.DNetDate(retData[i].BetTime).format("yyyy-MM-dd hh:mm:ss") + '</td><td>' + retData[i].ValidBetAmount +'</td><td>' + content + '</td></tr>';
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
        str += '<option value="' + platform[i].api_name + '">' + platform[i].api_mainname + '</option>';
        arr += "<tr platform='" + platform[i].api_name + "'><td><span>" + platform[i].api_mainname + "</span><b>0.00</b><img src='/Areas/Wap8/Content/images/main/freshmoney.svg' onclick='chaxun(\"" + platform[i].api_name + "\",this)'/><div class='btntwo'><button onclick='yijianinout(\"" + platform[i].api_name + "\",this,\"in\")'>一键转入</button><button onclick='yijianinout(\"" + platform[i].api_name + "\",this,\"out\")'>一键转出</button></div></td></tr>";

    }
    $("#limitplace").html(str);
    $("#limitlist").html(arr);
}
function findPlateform(platform, type) {//刷新单个平台余额
    $("#limitplace .item_name").each(function (x, y) {
        if (type == 1) {
            if ($(y).attr("platform") == platform) {
                $(y).find("i").click();
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
function gameTransfer() {
  
	if($("#operation").text() == ""){
		notify("请选择操作类型！");
		return false;
	}
	if($("#amount").val() == "" || $("#amount").val() <= 0){
		notify("请输入正确的转账金额！");
		return false;
	}
    disabledT("1", $("#zhuanru"));
    biCommon.transfer($("#amount").val(), $("#limitplace option:selected").val(), $("#operation option:selected").val(),"", $("#zhuanru"));
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
function caozuo(num, arr) {
	$('#modalOut').css('visibility', 'hidden');
	$('#modalIn').css('visibility', 'hidden');
	$('.reveal-modal-bg').hide();
	$("#operation").html(arr);
	$("#operation").attr("type", num);
}

function yijianzhuanchu(obj, type) {
    
	disabledT(1,obj);
    biCommon.rollout(obj, type);
}
function disabledT(num, obj) {
    
	if(num == "1") {
		$(obj).attr("disabled", true);
		$(obj).css({
			"background-color": "#ccc"
		});
		$(obj).val($(obj).attr("warning"));
	} else {
        $(obj).attr("disabled", false);
        if ($(obj).attr("bgcolor") == undefined) {
            $(obj).css({
                "background-color": "#01633c"
            });
        } else {
            $(obj).css({
                "background-color": $(obj).attr("bgcolor")
            });
        }
		$(obj).val($(obj).attr("show"));
	}
}
//deposit存款页面
 //$("#mgmChongZhi li").removeClass("active");
    //$(obj).addClass("active");

    //$(".bank_list_i_w").hide();
    //if ($(obj).attr("type") != "zxcz") {
    //    $(".bank_list_i_w").each(function (x, y) {
    //        $(".sucess-content").hide();
    //        $("#rechargeForm").show();
    //        if ($(y).attr("type") == $(obj).attr("type")) $(y).show();
    //    })
    //}
    //if ($(obj).attr("type") == "zxcz") window.location.href = "/Index/chongbanklist";
//存款方式显示
function changgepage(obj, num) {
    MoneybottomSide(num);
    $("#mgmChongZhi .newdesposit").hide();
    $("#mgmChongZhi div").each(function (x, y) {
        if ($(y).attr("choose") == $(obj).attr("choose")) {
            $(y).show();
        }
    })
    if (num == 4) {
        biCommon.getBindbank($("#openBank"), $("#bankCard"), $("#bankMeg"), $("#TrueName"), 3);
    }

}
var countDeposit = 0;
function depositFun(type, retData) {
    var str = "";
    countDeposit++;
    switch (type) {
        case "bank":
            if (biCommon.isEmptyObject(retData) == false) {
                $("#mgmChongZhi li." + type).show();
                for (var i = 0; i < retData.length; i++) {
                    str += '<label><input type="radio" onclick="changebank(this);" value="' + retData[i].bankid + '" bankinfo="' + retData[i].bankinfo + '" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="6" bankId="' + retData[i].banktype + '">' + retData[i].banktype + '</label>';
                }
                $("#BankNames").html(str);
                $("#BankNames input[type='radio']").eq(0).click();
               
               
            } else {
                notify("暂无公司汇款银行！");
            }
            break;
        case "wx":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "wx")
                        str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap8/Content/images/main/wcxx.png"></label></div>';

                }
                if (str != "") {
                    $("#mgmChongZhi li." + type).show();
                    $("#skAccount").html(str);
                    $("#skAccount input[type=radio]").first().prop("checked", true);
                }
            } else {
                notify("暂无线下微信汇款！");
            }
            break;
        case "zfb":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "zfb")
                        str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap8/Content/images/main/zfbxx.png"></label></div>';
                }
                if (str != "") {
                    $("#mgmChongZhi li." + type).show();
                    $("#skAccount").html(str);
                    $("#skAccount input[type=radio]").first().prop("checked", true);
                }
            } else {
                notify("暂无线下支付宝汇款！");
            }
            break;
        case "qqpay":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "qqpay")
                        str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap8/Content/images/main/qqxx.png"></label></div>';
                }
                if (str != "") {
                    $("#mgmChongZhi li." + type).show();
                    $("#skAccount").html(str);
                    $("#skAccount input[type=radio]").first().prop("checked", true);
                }
            } else {
                notify("暂无线下QQ汇款！");
            }
            break;
        case "ysf":
            if (retData != null) {
                for (var i = 0; i < retData.length; i++) {
                    if (retData[i].type == "ysf")
                        str += '<div class="col col-name tdName">' + retData[i].payname + '</div><div class="col col-data" ><label class="pay-label"><span class="blink">' + $("#userNameController").attr("minmoney") + '-' + $("#userNameController").attr("maxmoney") + '</span><input type="radio" name="payType" value="' + retData[i].payname + '"><img width="266" height="70" src="/Areas/Wap8/Content/images/main/ysfxx.png"></label></div>';
                }
                if (str != "") {
                    $("#mgmChongZhi li." + type).show();
                    $("#skAccount").html(str);
                    $("#skAccount input[type=radio]").first().prop("checked", true);
                }
            } else {
                notify("暂无云闪付汇款！");
            }
            break;
    }
    if (countDeposit == 5) {
        var count = 0;
        $("#mgmChongZhi .list_pay_item").each(function (x, y) {
            if (!$(y).is(":hidden")) {
                if (count == 0) {
                    count++;
                    $(y).click();
                }
            }
        })
    }
}
//快捷金额
function choosezxBlance(obj, money) {
    
    $(obj).addClass("active").siblings().removeClass("active");
    $("#amount").val(money);
}
function chooseBlance(money,obj) {
    $("#commoney1").val(money);
    $(obj).siblings().removeClass("active");
    $(obj).addClass("active");
}
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

function despositXianxia() {
    plateform = biCommon.getQueryString()["type"];
    $("#partType").val(plateform);
    biCommon.bankinfo(plateform);
    //支付图片替换
    if (plateform == "zfb") {
        $("span.ico_payLogo").css("background", "url(/Areas/Wap8/Content/images/main/logo_alipay.jpg) no-repeat").css("background-size", "cover");
    }
    else if (plateform == "ysf") {
        $("span.ico_payLogo").css("background", "url(/Areas/Wap8/Content/images/main/logo_ysf.jpg) no-repeat").css("background-size", "cover");
    }
    else if (plateform == "wx") {
        $("span.ico_payLogo").css("background", "url(/Areas/Wap8/Content/images/main/logo_weixin.jpg) no-repeat").css("background-size", "cover");
    }
    else if (plateform == "qqpay") {
        $("span.ico_payLogo").css("background", "url(/Areas/Wap8/Content/images/main/logo_qq.jpg) no-repeat").css("background-size", "cover");
    }
}
function compaly(num) {
    if ($("#commoney" + num).val() != "" && parseFloat($("#commoney" + num).val().trim()) >= $("#userNameController").attr("minmoney") && parseFloat($("#commoney" + num).val().trim()) <= $("#userNameController").attr("maxmoney")) {
        if (num != 0) {
            var skr = $("#skAccount input[type=radio]:checked").val();
            $("#money").text($("#commoney" + num).val());
            biCommon.qrcodeSave($("#partType").val(), $("#commoney" + num).val(), skr);
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

function showhideQr(code, par) {
    $("#rechargeForm").hide();
    $(".sucess-content." + par).show();
    $(".sucess-content." + par).find(".zhuanCode").html(code.split('?')[1]);
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
        window.location.href = "/Index/personData";
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
    var boo = nullViliData($("#bankcardForm"));
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
//
function closeDownLoad() {
    $(".app_container.remove.appdd").removeClass("remove");
    $("#_appclose").parent().hide();
}
//公共的提示框
function notify(msg, type) {
    $("#modalWaring").show();
    $("#messageWaring").html(msg);
    closeNotify();
}
function closeNotify() {
    setTimeout(function () {
        $("#modalWaring").hide();
        $("#messageWaring").html("");
    }, 1500)
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
        toggleSearch();
        if (plateform != "fish") biCommon.getGameSlotCount(plateform, "0", "1", $("#byelectronicsFocus").val());
    }
}

//根据ID获取对应的游戏列表
function getFishGame(retDate,type) {
    var str = "";
    for (var i = 0; i < retDate.length; i++) {
        if (type == "fish")
            str += '<div class="" style="width: 50%;float:left" onclick="return landing(this);" platformCode="' + retDate[i].api_Name + '" gameType="' + retDate[i].gameType + '" gameId="' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '"><div class="am-grid-item-content"><div class="img_wrap">' +
                '<div class="LazyLoad is-visible is-loaded" > <img src="/img/imgPC/' + retDate[i].api_Name.toLowerCase() + "/" + retDate[i].onlyImg + '.png"></div>' +
                '<div style="color: rgb(136, 136, 136); font-size: 0.28rem; margin-top: 0.24rem;"><span style="padding-left: 44px;">' + retDate[i].chineseName + '</span></div></div></div></div>'
        else

        str += '<div class="" style="width: 50%;float:left" onclick="return landing(this);" platformCode="' + retDate[i].api_Name + '" gameType="' + retDate[i].gameType + '" gameId="' + retDate[i].gameId + '" gameName="' + retDate[i].gameName + '"><div class="am-grid-item-content"><div class="img_wrap">'+
            '<div class="LazyLoad is-visible is-loaded" > <img src="/img/imgPC/' + retDate[i].api_Name.toLowerCase() + "/" + retDate[i].onlyImg + '.png"></div>'+
            '<div style="color: rgb(136, 136, 136); font-size: 0.28rem; margin-top: 0.24rem;"><span style="padding-left: 44px;">' + retDate[i].chineseName + '</span></div></div></div></div>'

    }
    $("#game-list").html(str);
}
function toggleSearch() {
    if ($("div[name=searchDiv]").is(":hidden")) {
        $("div[name=searchDiv]").show();
        $(".search-shadow").show()
    } else {
        $("div[name=searchDiv]").hide();
        $(".search-shadow").hide()
    }
}
function hideShadow() {
    $(".search-shadow").hide();
    $("div[name=searchDiv]").hide()
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


function landingslocation(obj) {//页面跳转
    if ($("#userNameController").val() != "") {
        goToUrl($(obj).attr("hre"), "", $(obj).attr("hre"));
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


function banklist(obj, type) {

    var num = 0;
    var str = "";
    for (var i = 0; i < banklists.length; i++) {
        if (banklists[i].bankType == type) {
            num++;
            str += '<li><input type= "radio" value="' + banklists[i].id + '" name="bank" onclick="changePayLine(this)"/><img src="/img/bank/' + banklists[i].bankImg + '" /><span class="clor">' + obj + '-' + num +'</span></li>';
        }
    }
    $("#bankList").html(str);
   
}
function changePayLine(obj) {
    $("#wangying1").hide();
    $("#wangying2").show();
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
    $(".couten").append("<li class='li" + num + "' ><a href='javascript:;'><img src='/Areas/Wap8/Content/images/main/hb_" + hb + ".png'></a></li>");
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
//获取当前域名
function getHost(obj) {
    $(obj).html(window.location.host);
}