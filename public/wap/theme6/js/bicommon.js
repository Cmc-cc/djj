var biCommon = {
	getQueryString:function() {//获取url中的参数
		var qs = location.search.substr(1), // 获取url中"?"符后的字串  
			args = {}, // 保存参数数据的对象
			items = qs.length ? qs.split("&") : [], // 取得每一个参数项,
			item = null,
			len = items.length;

		for(var i = 0; i < len; i++) {
			item = items[i].split("=");
			var name = decodeURIComponent(item[0]),
				value = decodeURIComponent(item[1]);
			if(name) {
				args[name] = value;
			}
		}
		return args;
	},
    getGamePlates: function (num, type) {
        var apiurl = num == 1 ? "getapiassort" : "getapi";
        biCommon.ajax('post', "", "/api/NotLoggedInApi?ApiInterface=" + apiurl, function (res) {
            if (res.retCode == 0) {//1首页，2转账，3下注记录
                switch (num) {
                    case 1:
                        platformIndexs(res.retData,type);
                        break;
                    case 2:
                        getPlatform(res.retData);
                        break;
                    case 3:
                        historyPlatform(res.retData);
                        break;
                }
            } else {
                notify(res.retData);
            }
        })
    },
    playGo: function (platformCode, gameName, gameType, gameId) {//进入游戏
        var data = "platformCode=" + platformCode + "&gameType=" + gameType + "&gameId=" + gameId + "&gameName=" + gameName + "&devices=1";
        var urls = "/Index/goPlayGame?" + data;
        //window.location.href = urls;
        gameWindow = window.open(urls, "gaming");
        gameWindowBoo = true;
    },
	getCode:function(obj){//获取验证码
        $(obj).attr("src", "/api/Vaildatacode?t=" + (new Date()).valueOf());
	},
	loginData:function(loginUsername,loginUserpwd,loginUsercode){//用户登录
        var data = {
            "rcode": loginUsercode,
            "un": loginUsername,
            "pw": loginUserpwd,
            "ar":""
        }
        biCommon.ajax('post', data, "/api/NotLoggedInApi?ApiInterface=login", function (res) {
            if (res.retCode == 0) {
                notify("恭喜您已登录成功");
                localStorage.setItem("loginUsername", loginUsername);
                localStorage.setItem("loginUserpwd", loginUserpwd);
                window.location.href = "/Index/Index";
            } else {
                notify(res.retMsg);
            }
        })
    },
    getNotices: function (pageNum, pageSize) {//获取公告
        pageSize = pageSize == undefined ? 1000 : pageSize;
        var data = { "pageSize": pageSize, "pageIndex": pageNum };
        biCommon.ajax('post', data, "/m/gonggao", function (res) {
            if (res.retCode == 0) {
                if (pageSize != '1000') {
                    $(".transaction-record:eq(1) #pages").text(Math.ceil(res.retTotal / gamePageSize));
                    $(".transaction-record:eq(1) #pageCounts").text(res.retTotal);
                }
                showNoticeList(res.retData, pageSize);
            } else {
                notify(res.retMsg);
            }
        })
    },
    updatepwd: function (oldPwd,newPwd,type) {//修改登录、提款密码
        var data = {
            "pass": oldPwd,
            "npass": newPwd,
            "par": type
        }
        biCommon.ajax('post', data, "/api/MemberApi?ApiInterface=updatepwd", function (res) {
            if (res.retCode == 0) {
                notify("密码修改成功！");
                setInterval(function () {
                    if (type == "login") biCommon.logout();
                    else window.location.href = "/Index/info";
                },1000)
            } else {
                notify(res.retMsg);
            }
        })
    },
    regData: function (recommendCode, regUserPhoneCode, regUsername, regUserpwd, regUserSurepwd, regUserTrueName, regUserPhone, regUserWithdrawalsPwd, regUserCaptcha, regIntroducer, regMailbox) {//用户注册
        regUserPhoneCode == regUserPhoneCode == undefined ? "" : regUserPhoneCode;
        var data = {
            "rcode": regUserCaptcha,
            "gusername": regUsername,
            "gpassword": regUserpwd,
            "gmyqkpwd": regUserWithdrawalsPwd,
            "gmyname": regUserTrueName,
            "gmyphone": regUserPhone,
            "smsrcode": regUserPhoneCode,
            "gaddress": "",
            "agentid": regIntroducer,
            "mailbox": regMailbox
        }
        biCommon.ajax('post', data, "/api/NotLoggedInApi?ApiInterface=register", function (res) {
            if (res.retCode == 0) {
                notify("恭喜您已注册成功");
                window.location.href = "/Index/Index";
            } else {
                notify(res.retMsg);
            }
        })
    },
    getUserMoneys: function () {//获取用户余额
        if ($("#userNameController").val() != "") {
            biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=readmoney", function (res) {
                if (res.retCode == 0) {
                    if ($(".UserAmountController").length > 0) {
                        $(".UserAmountController").html(res.retMsg);
                        $("#mailbox b").text(res.retTotal);
                        var str = res.retData.split(",");
                        $("#vipLayout").attr("src", str[0]);
                        $("#vipLayoutText").text(str[2] + "/" + str[1]);
                    }
                } else {
                    if (res.retCode == 10002) window.location.href = "/Index/Index";
                    else notify(res.retMsg);
                }
            })
        }
    },
    getUserMeg: function (UserName, TrueName, Phone, openBank, bankCard, bankMeg) {//获取用户资料
        biCommon.getBindbank(openBank, bankCard, bankMeg, TrueName,1);
        biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=memberInfo", function (res) {
            if (res.retCode == 0) {
                var retMeg = JSON.parse(res.retMsg);
                $(UserName).val(retMeg.Username);
                $(TrueName).val(retMeg.Myname);
                $(Phone).val(retMeg.Myphone);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getBindbank: function (openBank, bankCard, bankMeg, TrueName, type) {//获取银行卡
        biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=bindbank", function (res) {
            if (res.retCode == 0) {
                var retMeg = JSON.parse(res.retMsg);
                if (retMeg.mybankname != "") {
                    if (type == 1 || type == 3) {//1个人资料、2绑定银行卡、3提款
                        $(openBank).text(retMeg.mybankname);
                        $(bankCard).text(retMeg.mybanknum);
                        $(bankMeg).text(retMeg.mybankaddress);
                        $(TrueName).val(retMeg.myname);
                    } else {
                        $("#cardStatu").val(1);
                        if ($("#sliderSegmentedControl a.mui-active").index() == 2)    $(".surebtn").hide();
                        $(TrueName).text(retMeg.myname);
                        $(openBank).text(retMeg.mybankname);
                        $(bankCard).text(retMeg.mybanknum);
                        $(bankMeg).text(retMeg.mybankaddress);
                        $("#scroll1 .mui-table-view span").show();
                        $("#scroll3 .mui-table-view input").hide();
                        $("#scroll3 .mui-table-view select").hide();
                    }
                } else {
                    if (type == 2) {
                        $("#UserName").val(retMeg.myname);
                        $("#scroll1 .mui-table-view span").hide();
                        $("#scroll1 .mui-table-view input").show();
                    } else if (type == 3) {
                        window.location.href = "/Index/securityCenter";
                    }
                }
            } else {
                notify(res.retMsg);
            }
        })
    },
    logout: function () {//退出
        biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=logout", function (res) {
            if (res.retCode == 0) {
                notify("退出当前账号成功！")
                setInterval(function () {
                    window.location.href = "/Index/Index";
                },1000)
            }
        })
    },
    transfer: function (amount, gamePlatform, operation,yijian,obj) {//输入金额的转账和一键转入转出
        var inout = "";
        if (operation != "") inout = operation == "in" ? "转入" : "转出";
        else inout = yijian == "in" ? "转入" : "转出";
        var data = {
            "moneydata": amount,
            "apitype": gamePlatform,
            "inout": operation,
            "to": yijian
        }
        biCommon.ajax('post', data, "/api/CashOperationApi?ApiInterface=convertmoney", function (res) {
            if (res.retCode == 0) {
                notify("从" + gamePlatform + inout + "成功！");
                findPlateform(gamePlatform,1);
            } else {
                notify(res.retMsg);
            }
            mui(obj).button('reset');
        })
    },
    getuserplatform: function (obj) {//一键查询所有平台余额
        biCommon.ajax('post', "", "/api/CashOperationApi?ApiInterface=getuserplatform", function (res) {
            if (res.retCode == 0) {
                findPlateform(JSON.parse(res.retMsg),2);
            } else {
                notify(res.retMsg);
            }
            mui(obj).button('reset');
        })
    },
    getGameBalance: function (platformCode,obj) {//获取单个平台的游戏余额
        var data = {
            "par": platformCode
        }
        biCommon.ajax('post', data, "/api/CashOperationApi?ApiInterface=ref_ed", function (res) {
            if (res.retCode == 0)  $(obj).parent().find("em").html(res.retMsg);
            else notify(res.retMsg);
            $(obj).removeClass("add");
        })
	},
	rollout:function(obj){//一键转出(转出所有平台余额)
        biCommon.ajax('post', "", "/api/CashOperationApi?ApiInterface=onetouchtransfer", function (res) {
            if (res.retCode == 0) {
                notify("转出所有平台余额成功！");
                $("#yijianrefsh").click();
            } else {
                notify(res.retMsg);
            }
            mui(obj).button('reset');
        })
	},
    withdrawMoney: function (money, qkpwd, obj) {//申请提款
        var data = { "qkmoney": money, "qkpwd": qkpwd }
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=moneyout", function (res) {
            if (res.retCode == 0) {
                notify("您的取款申请已提交！");
            } else {
                notify(res.retMsg);
            }
            disabledT(2, obj);
        })
    },
    bankinfo: function (type) {//获取银行卡、二维码收款
        var data = { "payType": type }
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=bankinfo", function (res) {
            if (res.retCode == 0) {
                depositFuns(type,res.retData);
            } else {
                notify(res.retMsg);
            }
        })
    },
    bankSave: function (money,name) {//银行卡存款
        var data = { "moneynum": money, "moneyinname": name}
        biCommon.ajax('post', data, "/api/CashOperationApi?ApiInterface=moneyinhk", function (res) {
            if (res.retCode == 0) {
                notify("您的存款订单已提交成功！");
                $("#commoney0").val("");
                $("#Accounts").val("");
            } else {
                notify(res.retMsg);
            }
        })
    },
    qrcodeSave: function (par, money, name) {//二维码存款
        var data = { "par": par, "money": money, "type": name, "save": 1 }
        biCommon.ajax('post', data, "/api/CashOperationApi?ApiInterface=moneyinqr", function (res) {
            if (res.retCode == 0) {
                $("#" + par + "Qrcode").attr("src", res.retMsg);
                showhideQr(res.retMsg);
            } else {
                notify(res.retMsg);
            }
        })
    },
	addCards:function(cardName,cardNum,cardAddress){//绑定银行卡
        var data = {
            "mybankname": cardName,
            "mybanknum": cardNum,
            "mybankaddress": cardAddress
        }
        biCommon.ajax('post', data, "/api/MemberApi?ApiInterface=bindbankadd", function (res) {
            if (res.retCode == 0) {
                notify("绑定银行卡成功");
                window.location.href = "/Index/info";
            } else {
                notify(res.retMsg);
            }
        })
    },
    mconvertrecord: function (type, startTime, endTime, page) {//获取各种记录
        if (type == "") {//转账记录
            var data = { "inputtime1": startTime, "inputtime2": endTime, "page": page}
            biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=mconvertrecord", function (res) {
                if (res.retCode == 0) {
                    $("#page").text(Math.ceil(res.retTotal / 10));
                    appendDataList(type, res.retData);
                } else {
                    notify(res.retMsg);
                }
            })
        } else {//除转账以外的其他记录
            var data = { "moneytype": type, "inputtime1": startTime, "inputtime2": endTime, "page": page}
            biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=moneyinfo", function (res) {
                if (res.retCode == 0) {
                    $("#page").text(Math.ceil(res.retTotal / 10));
                    appendDataList(type, res.retData);
                } else {
                    notify(res.retMsg);
                }
            })
        }
    },
    getBetInfo: function (type, startTime, endTime, page) {//获取下注记录
        var data = { "gametype": type, "bettime1": startTime, "bettime2": endTime, "page": page,"pagesize":10 }
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=betinfodata", function (res) {
            if (res.retCode == 0) {
                $("#page").text(Math.ceil(res.retTotal / 10));
                historyList(type, res.retData, res);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getActivity: function () {//获取优惠活动
        biCommon.ajax('post', "", "/api/NotLoggedInApi?ApiInterface=gethotall", function (res) {
            if (res.retCode == 0) {
                getDataActivity(res.retData);
            } else {
                notify(res.retMsg);
            }
        })
    },
    askActivity: function (id) {//申请优惠活动
        var data = { "id": id }
        biCommon.ajax('post', data, "/api/CashOperationApi?ApiInterface=applicationhot", function (res) {
            if (res.retCode == 0) {
                notify("申请该优惠活动成功！");
            } else {
                notify(res.retMsg);
            }
        })
    },
    getBankList: function (type) {//在线存款
        var data = { "payType": "PHONE" }
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=payinfolist", function (res) {
            if (res.retCode == 0) {
                banklists = res.retData;
                if (type == 1) {
                    for (var i = 0; i < res.retData.length; i++) {
                        $("#zxDepositTitle li").eq(parseInt(res.retData[i].bankType) - 1).show();
                    }
                    $("#zxDepositTitle li").each(function (x, y) {
                        if (!$(y).is(":hidden")) {
                            $(y).click();
                            return false;
                        }
                    })
                }
                if (res.retData.length>0) $("#depositTitle .mui-col-xs-3").eq(5).css({ "display": "inline-block" });
            } else {
                notify(res.retMsg);
            }
        })
    },
    getApiFish: function () {//获取捕魚列表
        var data = { "devices": "HTML5" }
        biCommon.ajax('post', data, "/api/NotLoggedInApi?ApiInterface=getapifish", function (res) {
            if (res.retCode == 0) {
                getFishGame(res.retData, "fish");
            } else {
                notify(res.retMsg);
            }
        })
    },
    getGameSlotNav: function () {//获取電子平台分类
        biCommon.ajax('post', "", "/api/NotLoggedInApi?ApiInterface=getapitypegame", function (res) {
            if (res.retCode == 0) {
                gameNav(res.retData);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getGameSlotCount: function (game, gametype, pageIndex, gameName) {//根据平台名称获取对应的電子子游戏
        gameName = gameName == undefined ? "" : gameName;
        var data = { "game": game, "gametype": gametype, "pageSize": gamePageSize, "pageIndex": pageIndex, "devices": "HTML5", "gameName": gameName }
        biCommon.ajax('post', data, "/api/NotLoggedInApi?ApiInterface=getapigame", function (res) {
            if (res.retCode == 0) {
                getFishGame(res.retData, game);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getKeFu: function () {//获取联系方式
        biCommon.ajax('post', "", "/api/NotLoggedInApi?ApiInterface=systemseting", function (res) {
            if (res.retCode == 0) {
                kefuLink(res.retData);
            } else {
                notify(res.retMsg);
            }
        })
    },
    isEmptyObject: function (e) {
        var t;
        for (t in e)
            return !1;
        return !0
    },
    getUserHongBaoCount: function () {//获取用户是否还有领红包的机会
        if ($("#userNameController").attr("isOpenRed") == "True" && $("#userNameController").val() != "") {
            biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=rednum", function (res) {
                if (res.retCode == 0) {
                    if (parseInt(res.retMsg) > 0) {
                        $("#hbCount").val(parseInt(res.retMsg));
                        hongbao();
                    }
                } else {
                    notify(res.retMsg);
                }
            })
        }
    },
    getHongBao: function () {//领红包
        biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=receivingenvelope", function (res) {
            if (res.retCode == 0) {
                if (parseInt($("#hbCount").val()) > 1) $(".mo .sen").addClass("more");
                else $(".mo .sen").removeClass("more");
                $("#hbCount").val($("#hbCount").val() - 1);
                $("#luckHongBao").html(res.retMsg);
                $(".loading-content").css("display", "none");
                $(".mo").css("display", "block");
            } else {
                notify(res.retMsg);
                $(".loading-content").css("display", "none");
                clearInterval(setTimeoutadd);
                clearInterval(setTimeoutdel);
            }
        })
    },
    addParner: function (content) {//申请代理
        var data = { "subcontent": content }
        biCommon.ajax('post', data, "/api/MemberApi?ApiInterface=subagent", function (res) {
            if (res.retCode == 0) {
                notify("您的申请已提交！");
                setTimeout(function () {
                    window.location.href = "/Index/Index";
                }, 1000)
            } else if (res.retCode != 0) {
                notify(res.retMsg);
            }
        })
    },
    ajax: function (type, data, url, successFun) {//公共的调用ajax方法
        $.ajax({
            type: type,
            datatype: "json",
            data: data,
            async: true,
            url: url,
            success: successFun
        })
    },
    getBackWater: function () {//获取实时返水详情
        biCommon.ajax('post', '', "/api/RecordingApi?ApiInterface=realtimereturn", function (res) {
            if (res.retCode == 0) {
                showBackWater(res.retData);
            } else {
                notify(res.retMsg);
            }
        })
    },
    liQuBackWater: function (obj) {//领取返水金额
        biCommon.ajax('post', '', "/api/MemberApi?ApiInterface=rreceivereturn", function (res) {
            if (res.retCode == 0) {
                notify("领取返水成功！");
                biCommon.getBackWater();
            } else {
                notify(res.retMsg);
            }
            disabledT(2, obj);
        })
    },
    sendSMS: function (regName, phone, type) {//发送短信验证码
        regName = regName == undefined ? "" : regName;
        var data = { "gusername": regName, "gmyphone": phone, "type": type };
        biCommon.ajax('post', data, "/api/NotLoggedInApi?ApiInterface=sendmessages", function (res) {
            if (res.retCode == 0) {
                notify("发送验证码成功！");
                timeCount();
            } else {
                notify(res.retMsg);
            }
        })
    },
    loginDataPhone: function (phone, smsrcode, rcode) {//用户手机号登录
        var data = {
            "phone": phone,
            "smsrcode": smsrcode,
            "rcode": rcode,
            "ar": ""
        }
        biCommon.ajax('post', data, "/api/NotLoggedInApi?ApiInterface=loginsms", function (res) {
            if (res.retCode == 0) {
                notify("恭喜您已登录成功");
                window.location.reload();
            } else {
                notify(res.retMsg);
            }
        })
    },
    getWithdrawBankList: function () {//获取取款银行卡列表
        biCommon.ajax('post', '', "/api/RecordingApi?ApiInterface=bankinfolist", function (res) {
            if (res.retCode == 0) {
                showBindBankList(res.retData);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getOldAndNew: function () {//获取是否有老带新
        biCommon.ajax('post', "", "/api/MemberApi?ApiInterface=memberInfo", function (res) {
            if (res.retCode == 0) {
                var retMeg = JSON.parse(res.retMsg);
                if (retMeg.is_oldwithnew != "0") $("#OldwithNew").show();
            } else {
                notify(res.retMsg);
            }
        })
    },
    oldWtithNewMeg: function () {//判断是否老带新
        biCommon.ajax('post', "", "/api/RecordingApi?ApiInterface=oldwithnewinfo", function (res) {
            if (res.retCode == 0) {
                var retMeg = res.retData;
                showOldwithNew(retMeg);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getOldwithNewList: function (pageNum) {//获取老带新列表
        var data = { "pageSize": pageSizeNothing, "pageIndex": pageNum }
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=oldwithnewinfolist", function (res) {
            if (res.retCode == 0) {
                var retMeg = res.retData;
                $("#page").text(Math.ceil(res.retTotal / pageSizeNothing));
                $("#pageCount").text(res.retTotal);
                showOldwithNewList(retMeg);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getWebsitemailList: function (pageNum) {//获取站内信列表
        var data = { "pageSize": pageSizeNothing, "pageIndex": pageNum }
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=websitemaillist", function (res) {
            if (res.retCode == 0) {
                var retMeg = res.retData;
                $(".transaction-record:eq(0) #page").text(Math.ceil(res.retTotal / pageSizeNothing));
                $(".transaction-record:eq(0) #pageCount").text(res.retTotal);
                showWebsitemailList(retMeg);
            } else {
                notify(res.retMsg);
            }
        })
    },
    readWebsitemail: function (id, obj) {//阅读站内信
        var data = { "id": id };
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=readwebsitemail", function (res) {
            if (res.retCode == 0) {
                if (obj != "undefined") {
                    $(obj).find("td img").attr('src', "/img/message1.png");
                }
                if (id == "0") {
                    $("#siteMail tr").each(function (x, y) {
                        $(y).find("td img").attr('src', "/img/message1.png");
                    });
                }
                $("#siteMail tr input").prop("checked", false);
                id = id == "0" ? $("#mailbox span").text(0) : $("#mailbox span").text(parseInt($("#mailbox span").text()) - 1);
            } else {
                notify(res.retMsg);
            }
        })
    },
    deleteWebsitemail: function (id) {//删除站内信
        var data = { "id": id };
        biCommon.ajax('post', data, "/api/RecordingApi?ApiInterface=websitemaildelete", function (res) {
            if (res.retCode == 0) {
                biCommon.getWebsitemailList("1");
                $(".transaction-record:eq(0) #num").text(1);
            } else {
                notify(res.retMsg);
            }
        })
    },
    getDialogContent: function () {//获取首页广告和标题
        $('#indexDialog').hide();
        biCommon.ajax('post', "", "/api/NotLoggedInApi?ApiInterface=indexhot", function (res) {
            if (res.retCode == 0 && biCommon.isEmptyObject(res.retData) == false) {
                $('#indexDialog').css({ "display": "flex" });
                $("#dialogImg").attr("src", res.retData.image);
                $("#dialogTitle").html(res.retData.rem);
            } else if (res.retCode != 0) {
                notify(res.retMsg);
            }
        })
    }
}
