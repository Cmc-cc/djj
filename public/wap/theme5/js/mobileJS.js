var pageSizeNothing = 10;
var gameWindow = "";
var gameWindowBoo = false;
//显示返水内容
function showBackWater(resData) {
    var str = "";
    var fsmoney = 0,betmoney = 0,vilimoney = 0,netmoney = 0;
    if (resData != "") {
        for (var i = 0; i < resData.length; i++) {
            var colr = resData[i].NetAmount >= 0 ? "green" : "red";
            fsmoney += parseFloat(resData[i].fs_money);
            betmoney += parseFloat(resData[i].BetAmount);
            vilimoney += parseFloat(resData[i].ValidBetAmount);
            netmoney += parseFloat(resData[i].NetAmount);
            str += '<tr><td>' + resData[i].typename + '</td><td>' + resData[i].BetAmount + '</td><td>' + resData[i].ValidBetAmount + '</td><td class="' + colr + '">' + resData[i].NetAmount + '</td><td>' + (Math.floor(resData[i].fs * 100 * 1000) / 1000).toFixed(1) + '%</td><td>' + resData[i].fs_money + '</td></tr>';
        }
        var netColr = netmoney >= 0 ? "green" : "red";
        var fsColr = fsmoney >= 0 ? "green" : "red";
        if (parseInt(fsmoney) <= 0) disabledT(1, $("#backWaters"));
        $("#foot").html('<tr><td>统计</td><td>' + betmoney + '</td><td>' + vilimoney + '</td><td class="' + netColr + '">' + netmoney + '</td><td></td><td class="' + fsColr+'">' + fsmoney+'</td></tr>');
        $("#backWaterList").html(str);
    } else {
        notify("暂无返水！");
    }
}
//领取返水
function yijianBackWater(type,obj) {
    disabledT(type, obj);
    biCommon.liQuBackWater(obj);
}
//点击“发送验证码”
var sendTime = 60;
var codeTimer = "";
function sendBtn(phoneNum, sendCode, type) {
    var phone = /^1[3456789]\d{9}$/;
    if (!phone.test($(phoneNum).val().trim())) {
        notify("请输入手机号!");
        $("#regUserPhone").val("");
        return false;
    } else {
        if ($(sendCode).attr("state") == "1") {
            $(sendCode).attr("state", "2");
            $(sendCode).html('<b id="sendSix">' + sendTime + '</b>s后重新发送');
            $(sendCode).addClass("disabledcode");
            window.clearInterval(codeTimer);
            var userPhone = type == "1" ? $("#loginUserPhone").val() : $("#regUserPhone").val();
            condeTimer($("#regUsername").val(), userPhone, type);
        }
    }
}
//发送验证码倒计时
function condeTimer(regName, phone, type) {
    biCommon.sendSMS(regName, phone, type);
}
function timeCount() {
    codeTimer = setInterval(function () {
        sendTime--;
        if (sendTime == 0) {
            window.clearInterval(codeTimer);
            $("#sendCode").attr("state", "1");
            $("#sendCode").html("重新获取验证码");
            $("#sendCode").removeClass("disabledcode");
            sendTime = 60;
        } else {
            $("#sendSix").html(sendTime);
        }
    }, 1000);
}
//手机号登录或者账号密码登陆
function loginCode(obj) {
    if ($(obj).attr("state") == "1") {
        $(obj).attr("state", "2");
        $("#longUserName").hide(); 
        $("#longUserPwd").hide();
        $(".sendcodes").show();
        $(obj).html("账号登录");
    } else {
        $(obj).attr("state", "1");
        $("#longUserName").show();
        $("#longUserPwd").show();
        $(".sendcodes").hide();
        $(obj).html("手机号登录");
    }
}
//手机号注册或者账号密码注册
function regCode(obj) {
    if ($(obj).attr("state") == "1") {
        $(obj).attr("state", "2");
        $('#sendCodeLi').show();
        $(obj).html("账号注册");
    } else {
        $(obj).attr("state", "1");
        $('#sendCodeLi').hide();
        $(obj).html("手机号注册");
    }
}
//判断是否开启手机号注册
function whetherOpenSMS() {
    if ($("#sendCodeLi").length > 0) {
        if ($("#OpenSMS").attr("isopensms") != "True") $("#sendCodeLi").hide();
        else $("#sendCodeLi").show();
    } else {
        if ($("#OpenSMS").attr("isopensms") != "True") $(".reg-mobile").hide();
    }
   
}
//绑定银行列表
function showBindBankList(retData) {
    var str = "";
    for (var i = 0; i < retData.length; i++) {
        str += '<option value="' + retData[i].bankCode + '">' + retData[i].bankName + '</option>';
    }
    $("#bankname").html(str);
}
 //复制文本
function tapCopy($id) {
    selectText($id);
    document.execCommand('copy');
    alert('复制成功');
}
//选中文本
function selectText(element) {
    var text = document.getElementById(element);
    //做下兼容
    if (document.body.createTextRange) {  //如果支持
        var range = document.body.createTextRange(); //获取range
        range.moveToElementText(text); //光标移上去
        range.select();  //选择
    } else if (window.getSelection) {
        var selection = window.getSelection(); //获取selection
        var range = document.createRange(); //创建range
        range.selectNodeContents(text);  //选择节点内容
        selection.removeAllRanges(); //移除所有range
        selection.addRange(range);  //添加range
    } else {
        alert("复制失败");
    }
}
 
function downloadIamge(selector, name) {
    // 通过选择器获取img元素，
    var img = document.querySelector(selector)
    // 将图片的src属性作为URL地址
    var url = img.src
    var a = document.createElement('a')
    var event = new MouseEvent('click')
    
    a.download = name || '下载图片名称'
    a.href = url
    
    a.dispatchEvent(event)
}
function oldwithnewTitle(num) {
    $(".oldwithnew-list li").removeClass("active");
    $(".oldwithnew-list li").eq(num).addClass("active");
    $("#articles .oldwithnewcontent").hide();
    $("#articles .oldwithnewcontent").eq(num).show();
}
function judgeOldAndNew() {//判断是否老带新
    if ($("#userNameController").val() != "")  biCommon.getOldAndNew();
}
function showOldwithNew(retMeg) {//老带新基本信息显示
    $("#tuiURL").text(retMeg.TuiRul);
    $("#tuiQrcode").attr("src", retMeg.QrUrl);
    $("#tuiFriend").html(retMeg.FriendCount);
    $("#tuiMoney").html(retMeg.RebateAmount);
}
function showOldwithNewList(res){
    var str = "";
    for (var i = 0; i < res.length; i++) {
        var isRebate = res[i].isRebate == "0" ? "未返佣" : "已返佣";
        str += '<tr><td>' + res[i].oldusername + '</td><td>' + res[i].addtime + '</td><td>' + isRebate + '</td><td class="green">' + res[i].rebateamount+'</td></tr>';
    }
    $("#oldWithNewList").html(str);
}
function getMegOldNew(obj) {
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
    biCommon.getOldwithNewList($("#num").val());
}
//消息中心
function messageTitle(num) {
    $("#messageLi li").removeClass("active");
    $("#messageLi li").eq(num).addClass("active");
    $("#mesageContent .transaction-record").hide();
    $("#mesageContent .transaction-record").eq(num).show();
}
function showWebsitemailList(res){
     var str = "";
    for (var i = 0; i < res.length; i++) {
        if (res[i].state == "False") str += '<tr ids="' + res[i].id + '" onclick="showMessageDiog(this,\'siteEmail\')"><td><input type="checkbox" onclick="event.stopPropagation();"/> <img src="/img/message0.png" state="0"/></td><td>' + res[i].title + '</td><td>' + res[i].inputtime + '</td><td class="content">' + res[i].context+'</td></tr>';
        else str += '<tr ids="' + res[i].id + '" onclick="showMessageDiog(this,\'siteEmail\')"><td><input type="checkbox" onclick="event.stopPropagation();"/> <img src="/img/message1.png" state="1" /></td><td>' + res[i].title + '</td><td>' + res[i].inputtime + '</td><td class="content">' + res[i].context+'</td></tr>';
    }
    $("#siteMail").html(str);
}
function getMessageCenter(obj,type) {
    var page = "";
    if (obj == "-1") {
        page = type == "siteEmail" ? parseInt($(".transaction-record:eq(0) #num").val()) - 1 : parseInt($(" #nums").val())-1;
        if (page >= 1) {
            type == "siteEmail" ? $(".transaction-record:eq(0) #num").val(page) : $(" #nums").val(page);
        } else {
            notify("请输入正确的分页数！");
            return false;
        }
    } else if (obj == "+0") {
        page = type == "siteEmail" ? $(".transaction-record:eq(0) #num").val() :$(" #nums").val();
        if (page < 1) {
            notify("请输入正确的分页数！");
            return false;
        }
    } else if (obj == "+1") {
        var pageText = type == "siteEmail" ? $(".transaction-record:eq(0) #page").text() : $(".transaction-record:eq(1) #page");
        page = type == "siteEmail" ? parseInt($(".transaction-record:eq(0) #num").val()) + 1 : parseInt($(" #nums").val())+1;
        if (page <= pageText) {
           type == "siteEmail" ? $(".transaction-record:eq(0) #num").val(page) : $(" #nums").val(page);
        } else {
            notify("请输入正确的分页数！");
            return false;
        }
    }
    var num = type == "siteEmail" ?$(".transaction-record:eq(0) #num").val() :$(" #nums").val();
    type == "siteEmail" ? biCommon.getWebsitemailList(num):biCommon.getNotices(num,gamePageSize);
}
function showMessageDiog(obj, type) {
    $("#marquee-wrapper").removeClass("hide"); 
    $("#marquee-wrapper").addClass("show");
    $(".notice-content").removeClass("hide");
    $(".notice-content").addClass("show");
    var str = "";
    if (type == "siteEmail") {
        $("#marquee-wrapper #newsBags").html('<li class="ng-scope ng-binding">' + $(obj).find("td.content").html() + '</li>');
        $("#marquee-wrapper #newsBags").css({ "height": "200px" });
        biCommon.readWebsitemail($(obj).attr("ids"),$(obj));
    } else if (type == "notice"){
        $("#marquee-wrapper  #newsBags").css({ "height": "200px" });
        str = '<li class="ng-scope ng-binding">' +$(obj).html() + '</li>';
        $("#marquee-wrapper #newsBags").html(str);
    } else {
        //首页弹出层公告显示
        $("#marquee-wrapper  #newsBags").css({ "height": "300px" });
        for (var i = 0; i < noticeSwiperLayout.length; i++) {
            //str += '<li class="ng-scope ng-binding text-hide" onclick="showMessageContent(this)">' +noticeSwiperLayout[i].ggcontent + '</li>';
            str += '<li class="ng-scope ng-binding" onclick="showMessageContent(this)"><img src="/img/notice.png" class="notice" /><span class=" text-hide">' + noticeSwiperLayout[i].ggcontent + '</span><img src="/img/more.png" class="more" /></li>';
        }
        $("#marquee-wrapper #newsBags").html(str);
    }
}
//关闭公告详情
function closeNoticeContent() {
    $("#announcement-content").addClass("hide");
    $("#announcement-content").removeClass("show");
}
//关闭公告列表和公告详情
function closeNotices() {
    $("#announcement-content").removeClass("show");
    $("#announcement-content").addClass("hide");
    $("#marquee-wrapper").removeClass("show");
    $("#marquee-wrapper").addClass("hide");
}
//更多公告
function moreNotice() {
    closeNotices();
    if($("#userNameController").val() != "") window.location.href = '/Index/MessageCenter';
}
//弹出公告详情
function showMessageContent(obj) {
    $("#marquee-wrapper").removeClass("show");
    $("#marquee-wrapper").addClass("hide");
    $("#announcement-content").removeClass("hide");
    $("#announcement-content").addClass("show");
    $("#notice-content").html($(obj).children("span").text());
}
function closeMessageDioag() {
    $("#marquee-wrapper").removeClass("show");
    $("#marquee-wrapper").addClass("hide");
    $(".notice-content").removeClass("show");
    $(".notice-content").addClass("hide");
}
function readSiteEmail(num) {
    if (num == 0) {
        var count = 0;
        $("#siteMail tr").each(function (x, y) {
            if ($(y).find("input[type='checkbox']").is(':checked') && $(y).find("td img").attr("state") == "0") {
                biCommon.readWebsitemail($(y).attr("ids"), $(y));
                count++;
            }
        });
        if (count == 0) notify("请选择操作内容！");
    } else {
       biCommon.readWebsitemail('0');
    }
} 
function deleteSiteEmail(num) {
    if (num == 0) {
        var count = 0;
        $("#siteMail tr").each(function (x, y) {
            if ($(y).find("input[type='checkbox']").is(':checked')) {
                biCommon.deleteWebsitemail($(y).attr("ids"));
                count++;
            }
        });
        if (count == 0) notify("请选择操作内容！");
    } else {
        biCommon.deleteWebsitemail('0');
    }
}
var noticeSwiperLayout = "";
function showNoticeList(res, size) {//公告显示
    var strList = "";
    for(var i = 0;i <res.length;i++ ){
        if(size != '1000'){
            strList += '<tr><td class="content" onclick="showMessageDiog(this,\'notice\')">'+res[i].ggcontent+'</td></tr>';
        }else{
             noticeSwiperLayout= res;
            strList +='<li class="swiper-slide" onclick="showMessageDiog(this,\'notices\')"><marquee scrollamount="5" class="content"  onMouseOut="this.start()" onMouseOver="this.stop()">'+res[i].ggcontent+'</marquee></li>';
        }
    }
    size=size == '1000'?noticeSwiper(strList):$("#notice").html(strList);
}
function noticeSwiper(str){
    $("#noticeSiper").html(str);
    swiperLayout(".notice-swiper", 1, 1, 1, 5000, true,'vertical');
}

//轮播公共方法
function swiperLayout(swiperCla, slidesPerView, spaceBetween, slidesPerGroup, delay, loop, direction) {
    mySwiper = new Swiper(swiperCla, {
        direction: direction,
        autoplay: {
            delay: delay
        },
        slidesPerView: slidesPerView,
        slidesPerGroup: slidesPerGroup,
        spaceBetween: spaceBetween,
        observer: true,
        observeParents: true
    });
}
//线路检测页面
function downLine() {
    if ($("#userNameController").attr("downandroid") != "") {
        $("#androidUrL").attr("href", $("#userNameController").attr("downandroid"));
        $("#androidUrL").css({ "display": "inline-block" });
    }
    if ($("#userNameController").attr("downios") != "") {
        $("#iosUrL").attr("href", $("#userNameController").attr("downios"));
        $("#iosUrL").css({ "display": "inline-block" });
    }
}
function lineCheck() {
    for (var i = 0; i < autourl.length; i++) {
        var urlArr = autourl[i].split(" ");
        if (urlArr.length > 1) {
            urls += '<li><span class="btn-open"><a href="' + urlArr[0] + '" target="_blank">' + urlArr[1] + '</a></span><span class="ms" id="lineMs' + i + '">--</span><span class="url">' + urlArr[0] + '</span></li>';
        }
        else {
            urls += '<li><span class="btn-open"><a href="' + autourl[i] + '" target="_blank">进入游戏</a></span><span class="ms" id="lineMs' + i + '">--</span><span class="url">' + autourl[i] + '</span></li>';
        }
        //urls += '<li><span class="btn-open"><a href="' + autourl[i] + '" target="_blank">进入游戏</a></span><span class="ms" id="lineMs' + i + '">--</span><span class="url">' + autourl[i] + '</span></li>';
    }
    $("#urlList").html(urls);
}
function auto(url) {
    if (b < autourl.length) {
        $("#urlList li").eq(b).find(".btn-open a").attr(url);
        $("#urlList li").eq(b).find(".url").attr(url);
        if (tim > 200) {
            $("#urlList li").eq(b).find(".ms").text("链接超时");
        } else {
            $("#urlList li").eq(b).find(".ms").text(tim * 10 + "ms");
        }
        b++;
    }
}

function execAuto() {
    var html2str = '';
    document.getElementById("site1_peed").innerHTML = html2str;
    for (var i = 0; i < autourl.length; i++) {
        html2str = html2str + "<img src='" + autourl[i] + "?" + "' width='1' height='1' onerror=\"auto('" + autourl[i] + "');\" style='display:none'>";
    }
    document.getElementById("site1_peed").innerHTML = html2str;
}
function jianceWindow() {//监测进入游戏中的窗口是否关闭
    var loop = setInterval(function () {
        if (gameWindowBoo) {
            if (gameWindow.closed) {
                clearInterval(loop);
                gameWindowBoo = false;
                alert('closed');
            }
        }
    }, 1000);
}