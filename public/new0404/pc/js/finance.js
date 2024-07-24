(function(){
    var $myMoney = null;
    var banks = null;
    var defaultBank = {};
    var $username= null;
    var $liselect = null;
    var $paytypelist = {};

    var app = {
        initial: function(){
            $myMoney = $('.myMoney');
            $myMoney.html('<b>HKD</b> ' + (localStorage.money || 0.00).toString());
            $username =$('#username');
            $username.html('&nbsp;&nbsp;&nbsp;&nbsp;' +localStorage.username);
            app.getBankListAndDefault();
            DepositeMemCon.initial();
            DepositeCompanyBank.initial();
            Deposite.initial();
            // DepositeCard.initial();
            WithdrawalBank.initial();
            BindBank.initial();
            app.bindEvents();
            app.$htime = $('#htime');
            app.setdatainput();
        },
        bindEvents: function(){
            $('#CompanyBank_btn').on('click', DepositeCompanyBank.getmoneytransfer);
            $('.typebtn').on('click', function(){
                var $this = $(this);
                var type = $this.attr('type');
                if (type != 'CompanyBank' && type != 'withdrawal')
                {
                    Deposite.getplatform(type);
                }
            });
        },
        setdatainput: function() {
            app.$htime.datepicker({ dateFormat: 'yy-mm-dd',language: 'zh-CN' });
            $.datepicker.setDefaults($.datepicker.regional["zh-CN"]);
        },
        getBankListAndDefault: function(){
            //如未設置提款密碼,就導去設置提款密碼
            var data = {
                cmd: 101,
                sid: localStorage.sid || '',
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    msg = response.msg;
                    $liselect = $('#fianca_ul li.select').hasClass('withdrawal');
                    // if (msg.paypwd == '')
                    // {
                    //     if ($liselect)
                    //     {
                    //         alert(parent.Language.Get('无设定提款密码,请至修改提款密码设定'));
                    //         location.href='../mem/modifyBankpassword.html';
                    //         return false;
                    //     }
                    // }
                    
                    banks = JSON.parse(localStorage.banks);
                    for (var key in banks)
                    {
                        defaultBank = banks[key];
                    }
                    if($.isEmptyObject(defaultBank) && $liselect){
                        alert(parent.Language.Get('未绑定银行卡'));
                        location.href='../pc/modifybankinfo.html';
                        return false;
                    }
                });
        },
    };

    var DepositeMemCon = {
        $memCon: null,

        initial: function(){
            DepositeMemCon.$memCon = $('.memCon');
            DepositeMemCon.bindEvents();
            DepositeMemCon.getPlatformType();
        },
        bindEvents: function(){
        },
        getPlatformType: function(){
            var data = {
                cmd: 707,
                sid: localStorage.sid || '',
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    $paytypelist = response.msg.paytypelist;
                    var txt = '';
                    for (var key in $paytypelist)
                    {
                        row = $paytypelist[key];
                        languagetippc = (localStorage.language == 'cn') ?  'tippc' : localStorage.language + '_tippc';
                        tippc = decodeURI(row[languagetippc]);
                        if (row.ispc == 1)
                        {
                            btnname = row.type == 'CompanyBank' ? parent.Language.Get('汇款提交') : parent.Language.Get(row.name);
                            txt += '<h3 style="color: #e3c7af">' + parent.Language.Get(row.name) + ' ' + parent.Language.Get('支付连结说明') + '</h3>' +
                                    '<p>' +
                                        tippc +
                                    '</p>' +
                                    '<a id="' + row.type + '_btn' + '" class="btn typebtn" type="' + row.type + '" style="margin-top: 5px;margin-bottom: 15px; width: 170px; height: 30px; line-height: 30px;">' + btnname + '</a>';
                        }
                    }
                    DepositeMemCon.$memCon.find('.txt').html(txt);
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(5)');
                });
        },
    };

    var DepositeCompanyBank = {
        ajaxing: false,
        $form: null,
        initial: function(){
            DepositeCompanyBank.$form = $('.DepositeCompanyBank');
            // DepositeCompanyBank.setBankOption();
            DepositeCompanyBank.SetPlaceholder();
            DepositeCompanyBank.bankType();
            DepositeCompanyBank.bindEvents();
        },
        bindEvents: function(){
            DepositeCompanyBank.$form.bind('submit', DepositeCompanyBank.deposite)
        },
        deposite: function(){
            if (DepositeCompanyBank.ajaxing){
                return false;
            }
            var $this = $(this);
            var success = false;
            var $hms=$this.find('#htime').val() + $this.find('#hour').val() +  $this.find('#min').val() + $this.find('#sec').val();
            var data = {
                cmd: 203,
                sid: localStorage.sid || '',
                username: $this.find('username').val(),
                name: $this.find('#trueName').val(),
                account: $this.find('#bankAccount').val(),
                bank: $this.find('#bankName').val(),
                money: $this.find('#money').val(),
                way: $this.find('#bankType').val(),
                htime: $hms,
                hnote: $this.find('#hnote').val(),
                intoId:$('input[name=intoId]:checked').val(),
            };

            DepositeCompanyBank.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(5)');
                });
            DepositeCompanyBank.ajaxing = false;
            return success;
        },
        setBankOption: function(){
            var bank = window.parent.Public.getBankObject();
            var tags = null;
            for (var key in bank)
            {
                tags += '<option value="' + key + '">' + bank[key] + '</option>';
            }
            DepositeCompanyBank.$form.find('#bankName').html(tags);
        },
        getmoneytransfer: function(){
            var data = {
                cmd: 704,
                sid: localStorage.sid || 0,
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    $("#accoutnDiv").html("");
                    if(!response.msg){
                        alert(parent.Language.Get("暂无汇款匹配帐号资料"));
                        return 0;
                    }
                    var rows = response.msg;
                    var tags = "";
                    for (var key in rows)
                    {
                        var row = rows[key];
                        var branch2 = row.branch2;
                        if(branch2) branch2 += parent.Language.Get("分行");
                        var branch = row.branch;
                        if(branch) branch += parent.Language.Get("支行");
                        tags +=
                            "<div class='bank-check-box-s1'>" + 
                                "<div class='col check-circle'>" + 
                                    "<input type='radio' name='intoId' value='" + row.id + "'>" +
                                "</div>" + 
                                "<div class='col'>" +
                                    "<span class='STYLE2' id='account' intoId='" + row.id + "'>" +
                                        parent.Language.Get("银行名称") + "："+ row.type + "<br>" +     
                                        parent.Language.Get("帐号") + "：" + row.account + "<br>" +
                                        parent.Language.Get("开户行网点") + "：" + row.province + row.city + branch2 + branch + "<br>" +
                                        parent.Language.Get("收款人") + "：" + row.name + 
                                    "</span>" +
                                "</div>" +
                            "</div>";
                    }
                    $("#accoutnDiv").html(tags);
                    $('#CompanyBank').show();

                })
                .fail(function(){
                    alert(parent.Language.Get('无帐号资料,请联络管理员') + '！');
                    return 0;
                });
        },
        bankType: function()
        {
            var bankType = '<option value="">'+ parent.Language.Get('请选择汇款方式') +'</option>'+
                            '<option value="柜台转账">' + parent.Language.Get('柜台转账') + '</option>'+
                            '<option value="ATM转账">' + parent.Language.Get('ATM转账') + '</option>'+
                            '<option value="网银转账">' + parent.Language.Get('网银转账') + '</option>';
            DepositeCompanyBank.$form.find('#bankType').html(bankType);
        },
        SetPlaceholder: function()
        {
            DepositeCompanyBank.$form.find('#companydepositsub').attr('value',parent.Language.Get('提交信息'));
        }
    };

    var Deposite = {
        $top: null,
        $form: null,
        $bank: null,
        $bankcode: null,
        $cointype: null,
        $merchanttype: null,
        $money_limit : {},
        $hnote : {},
        $type: {},
        $ratio : {},
        $ratio2 : {},
        $CBSaddress: localStorage.CBSaddress || '', //存放CBS支付地址
        initial: function(){
            Deposite.$top = $('#Deposit');
            Deposite.$form = $('#Depositeform');
            Deposite.bindEvents();
            Deposite.SetPlacehold();
        },
        bindEvents: function(){
            Deposite.$form.bind('submit', Deposite.deposite);
            Deposite.$form.find('select[name=platform]').on('change', Deposite.changePlatform);
            Deposite.$form.find('#PayMoney').on('keyup', Deposite.SetRatesValue);
            Deposite.$form.find('#Ratiotruemoney').on('keyup', Deposite.SetRatesValue);


            /* 點擊確定或關閉時 必須清空金額,以及把該關閉的欄位關閉 */
            $('.confirm, .close').on('click', function(){
                Deposite.$top.find('.Tutorial').hide();
                Deposite.$form.find('.payData').hide();
                Deposite.$form.find('.recharge-data').show();
                Deposite.$form.find('#PayMoney').val('');
            });

            /* 複製按鈕專用 */
            Deposite.$form.find('.payData').on('click', '.copytext', function(){
                var $this = $(this);
                var account = $this.attr('data-clipboard-text');
                //自動選取某個區域的文字
                const TextRange = document.createRange();
                TextRange.selectNode(document.getElementById(account));
                const sel = window.getSelection();  // 選擇的文本範圍
                sel.removeAllRanges(); // 選擇中刪除所有範圍
                sel.addRange(TextRange); // 選擇中新增範圍
                if(document.execCommand("Copy")) // 複製
                {
                    document.execCommand("Copy");
                    alert(parent.Language.Get('复制成功'));
                }
            });
            Deposite.$form.find('.payData').on('click', '.payNotify', function(){
                var $this = $(this);
                var order = $this.attr('order');
                var platform = $this.attr('platform');
                $this.hide();
                var data = {
                    cmd: 714,
                    sid: localStorage.sid,
                    order: order,
                    platform: platform,
                };
                window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    success = response.status == 0 ? true : false;
                    if (! success)
                    {
                        Deposite.$form.find('.payData .payNotify').show();
                    }
                    alert(response.msg.msg);
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(99)');
                });
                return false;
            });

            Deposite.$top.find('.USDTTutorial1').on('click', function(){
                $('.USDTTutorial').show();
                var $this = $(this);
                var name = $this.attr('type');
                Deposite.GetTutorial(name);
            });
        },
        GetTutorial: function(name)
        {
            if (name == 'USDTTutorial_mp4')
            {
                $('.USDTTutorial').find('.USDTTutorialTitle').html(parent.Language.Get('USDT教程影片'));
                var data =  '<div style="font-size: 16px; font-weight: 700; text-align: center; margin: 10px 0;">1.<span>' + parent.Language.Get('新增币种及转账') + '</span></div>' +
                            '<video controls style="width: 100%;"><source src="../../wechat/media/USDTTutorial_imtoken.mp4" type="video/mp4"></video>' +
                            '<div style="font-size: 16px; font-weight: 700; text-align: center; margin: 10px 0;">2.<span>' + parent.Language.Get('创建专属电子钱包') + '</span></div>' +
                            '<video controls style="width: 100%;"><source src="../../wechat/media/USDTTutorial_Openimtoken.mp4" type="video/mp4"></video>' +
                            '<div style="font-size: 16px; font-weight: 700; text-align: center; margin: 10px 0;">3.<span>' + parent.Language.Get('虚拟货币交易所推介') + '</span></div>' +
                            '<video controls style="width: 100%; margin-bottom: 60px;"><source src="../../wechat/media/USDTTutorial_Exchange.mp4" type="video/mp4"></video>';
            }
            if (name == 'USDTTutorial_pdf')
            {
                $('.USDTTutorial').find('.USDTTutorialTitle').html(parent.Language.Get('USDT教程文档'));
                var data =  '<img src="../../wechat/images/USDTTutorial_imtoken.png" style="width: 100%;">' +
                            '<img src="../../wechat/images/USDTTutorial_Openimtoken.png" style="width: 100%;">' +
                            '<img src="../../wechat/images/USDTTutorial_Exchange.png" style="width: 100%; margin-bottom: 60px;">';
            }
            $('.USDTTutorial').find('.Tutorialdata').html(data);
        },
        deposite: function(){
            var $this = $(this);
            var $platform = Deposite.$form.find("select[name=platform] option:selected").val();
            var $autostatus = Deposite.$form.find("select[name=platform] option:selected").attr('autostatus');
            var $typecode = Deposite.$form.find("select[name=platform] option:selected").attr('typecode');

            if (($this.find('#PayMoney').val() % 1) != 0)
            {
                alert(parent.Language.Get('金额请输入整数'));
                return false;
            }

            /* 若是自動上分就直接跳轉出去, 倘若是自動上分就將資訊返回前台 */
            if ($paytypelist[$typecode].isOnlineQR == '1')
            {
                var data = {
                    cmd: 214,
                    sid: localStorage.sid || '',
                    username: localStorage.username,
                    money: $this.find('#PayMoney').val(),
                    decimal: $this.find('input[name=decimal]').val(),
                    intoId: $platform,
                };
                window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    success = response.status == 0 ? true : false;
                    msg = success ? response.msg.msg : response.msg;
                    alert(msg);
                    if (success)
                    {
                        var onlinpayData = response.msg.onlinpayData;
                        var qrtransferData = response.msg.qrtransferData;
                        var text = '';

                        if (onlinpayData.showtype == 'url')
                        {
                            text = '<a href="' + onlinpayData.text + '" style="white-space: pre-wrap; word-wrap: break-word; color: #000; font-size: 14px;">' + onlinpayData.text + '</a>';
                        }
                        else if (onlinpayData.showtype == 'text')
                        {
                            text = '<span style="white-space: pre-wrap; word-wrap: break-word; color: #000; font-size: 14px;">' + onlinpayData.text + '</span>';
                        }
                        
                        var tag =   "<tr><td width='20%'><div align='right'>" + parent.Language.Get('支付平台') + "：</div></td>" +
                                    "<td width='80%'><div align='left' class='Payplatformtext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                    "<tr><td width='20%'><div align='right'>" + parent.Language.Get('充值金额') + "：</div></td>" +
                                    "<td width='80%'><div align='left' class='PayMoneytext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                    "<tr><td width='20%'><div align='right'>" + parent.Language.Get('QR码') + "：</div></td>" +
                                    "<td width='80%' align='left'>" +
                                        "<div class='bank-check-box-s1' id='QRimg'>" +
                                            "<img class='onlineimg' src='" + location.origin + '/images/qrpay/' + onlinpayData.QRname_web + onlinpayData.QRextension_web + "' style='width: 200px;'>" +
                                        "</div>" +
                                        text +
                                    "</td></tr>";

                        Deposite.$form.find('.payData').html(tag);
                        Deposite.$form.find('.Payplatformtext').html(onlinpayData.name);
                        Deposite.$form.find('.PayMoneytext').html(qrtransferData.money);
                        Deposite.$form.find('.recharge-data').hide();
                        Deposite.$form.find('.payData').show();
                    }
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(5)');
                });
                return false;
            }
            else
            {
                if ($autostatus == 1)
                {
                    var param = {
                        cmd: 223,
                        sid: localStorage.sid,
                        username: localStorage.username,
                        platform: $this.find('select[name=platform]').val(),
                        bankcode: $this.find('select[name=bankcode]').val(),
                        merchanttype: $this.find('select[name=merchanttype]').val(),
                        modetype: $this.find('select[name=modetype]').val(),
                        money: $this.find('input[name=money]').val(),
                        decimal: $this.find('input[name=decimal]').val(),
                        truename: $this.find('input[name=truename]').val(),
                        mobile: $this.find('input[name=mobile]').val(),
                        email: $this.find('input[name=email]').val(),
                        IFSC: $this.find('input[name=IFSC]').val(),
                        bankname: $this.find('input[name=bankname]').val(),
                        bank_account: $this.find('input[name=bank_account]').val(),
                        bank_account_name: $this.find('input[name=bank_account_name]').val(),
                        idcard: $this.find('input[name=idcard]').val(),
                        phonecardType: $this.find('input[name=phonecardType]:checked').val(),
                        cardNumber: $this.find('input[name=cardNumber]').val(),
                        serialNumber: $this.find('input[name=serialNumber]').val(),
                        CSC: $this.find('input[name=CSC]').val(),
                        expDate: $this.find('input[name=expDate]').val(),
                        type: $typecode,
                        lang: localStorage.language,
                        autoStatus: $autostatus,
                    };
                    window.parent.Public
                    .post(param, {async: false})
                    .done(function(response){
                        success = response.status == 0 ? true : false;
                        msg = response.msg != '' ? response.msg : '';
                        if (success)
                        {
                            var lineData = response.msg.lineData;
                            var linePlatformData = response.msg.linePlatformData;
                            var data = response.msg.result;

                            if (data.msg != '' && data.msg != undefined)
                            {
                                alert(data.msg);
                                return false;
                            }

                            /* 判斷該通道的顯示帳號時應該顯示的title名稱 */
                            if (lineData.type == 'alipay' || lineData.type == 'AlipayMobile' || lineData.type == 'NativeAlipayH5' || lineData.type == 'AlipayTransfer' ||
                                lineData.type == 'AlipayQRpay' || lineData.type == 'AlipayToAlipay' || lineData.type == 'AlipayReds')
                            {
                                 var accountText = parent.Language.Get('支付宝帐号');
                            }
                            else if (lineData.type == 'web' || lineData.type == 'ATM' || lineData.type == 'WebATM' || lineData.type == 'BankTransfer' || lineData.type == 'HSBC' ||
                                     lineData.type == 'BACHF' || lineData.type == 'BKEAF' || lineData.type == 'ZABANK' || lineData.type == 'MASTER' || lineData.type == 'VISA')
                            {
                                var accountText = parent.Language.Get('银行帐号');
                            }
                            else if (lineData.type == 'wechat' || lineData.type == 'WechatMobile' || lineData.type == 'WechatMina')
                            {
                                var accountText = parent.Language.Get('微信帐号');
                            }                
                            else if (lineData.type == 'QQ' || lineData.type == 'fast' || lineData.type == 'FPS' || lineData.type == 'PAYME' || lineData.type == 'MOMO' ||
                                     lineData.type == 'ZALO' || lineData.type == 'VIETTELPAY')
                            {
                                var paytypename = $paytypelist[lineData.type].name;
                                var accountText = parent.Language.Get(paytypename) + parent.Language.Get('帐号');
                            }
                            else if (lineData.type == 'USDT')
                            {
                                var accountText = parent.Language.Get('钱包地址');
                            }
                            else //UnionpayQR  JingdongScanCod  JingdongMobile YunShanPay OnlineQR PhoneCard Deposit VNQR MerchantCode MerchantBarcode Cash BankScan PaytmWallet PaytmUPI
                            {
                                var accountText = parent.Language.Get('帐号');
                            }

                            var tag = '';
							if (linePlatformData.showtype == 'qr')
                            {
                                tag =   "<tr><td width='20%'><div align='right'>" + parent.Language.Get('支付平台') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Payplatformtext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + parent.Language.Get('充值金额') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='PayMoneytext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + parent.Language.Get('QR码') + "：</div></td>" +
                                        "<td width='80%' align='left'>" +
                                            "<div class='bank-check-box-s1' id='QRimg'>" +
                                                "<div id='pay_qrcode'></div>" +
                                            "</div>" +
                                        "</td></tr>";
                            }else{
								tag =   "<tr><td width='20%'><div align='right'>" + parent.Language.Get('订单编号') + "：</div></td>" +
										"<td width='80%'><div align='left' class='Payorderno' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
										"<tr><td width='20%'><div align='right'>" + parent.Language.Get('支付平台') + "：</div></td>" +
										"<td width='80%'><div align='left' class='Payplatformtext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
										"<tr><td width='20%'><div align='right'>" + parent.Language.Get('充值金额') + "：</div></td>" +
										"<td width='80%'><div align='left' class='PayMoneytext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
										"<tr class='accountnameText'><td width='20%'><div align='right'>" + parent.Language.Get('用户姓名') + "：</div></td>" +
										"<td width='80%'><div align='left' class='Payaccountname' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
										"<tr><td width='20%'><div align='right'>" + accountText + "：</div></td>" +
										"<td width='80%'>" +
											"<div align='left' id='" + data.account + "' class='Payaccount' style='width: 130px;float: left;position: relative; line-height: 25px;'></div>" +
											"<div id='PayaccountCopy' class='clipboard copytext btn btn-xs' data-clipboard-text='" + data.account + "' style='background: linear-gradient(to right, #fde687, #d8870f); color: #fff; border: 0; box-shadow: none; cursor: pointer; border-radius: 3px; font-size: 13px; letter-spacing: 2px; float: left; width: 80px;'>" + parent.Language.Get('复制') + "</div>" +
											"<div class='payNotify' order='" + lineData.ordernumber + "' platform='" + linePlatformData.code + "' style='width: 25%; background: linear-gradient(to right, #62eac6, #059c74); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 5px 10px; border-radius: 3px; font-size: 13px; letter-spacing: 2px; text-align: center; float: left; margin-left: 5px;'>" + parent.Language.Get('确认支付') + "</div>" +
										"</td></tr>" +
										"<tr class='banknameText'><td width='20%'><div align='right'>" + parent.Language.Get('银行名称') + "：</div></td>" +
										"<td width='80%'><div align='left' class='Paybankname' style='width: 180px;float: left;position: relative;'></div></td></tr>";
								  
							}

                            Deposite.$form.find('.payData').html(tag);
							if (linePlatformData.showtype == 'qr')
								new QRCode(document.getElementById("pay_qrcode"), linePlatformData.url);
							
                            if (lineData.type != 'BankTransfer' && lineData.type != 'HSBC' && lineData.type != 'BACHF' && lineData.type != 'BKEAF' && lineData.type != 'ZABANK' && lineData.type != 'MASTER' && lineData.type != 'VISA')
                            {
                                $('.banknameText').hide();
                            }
                            Deposite.$form.find('.Payplatformtext').html(linePlatformData.merchantname);
                            Deposite.$form.find('.Payorderno').html(lineData.ordernumber);
                            Deposite.$form.find('.PayMoneytext').html(data.money);
                            Deposite.$form.find('.Payaccount').html(data.account);
                            Deposite.$form.find('.Payaccountname').html(data.name);
                            Deposite.$form.find('.Paybankname').html(data.bankname);
                            Deposite.$form.find('.recharge-data').hide();
                            Deposite.$form.find('.payData').show();
                        }
                        else
                        {
                            alert(msg);
                        }
                    })
                    .fail(function(){
                        alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(5)');
                    });
                    return false;
                }
                else
                {
                    var data = {
                        cmd: 223,
                        sid: localStorage.sid || '',
                        username: localStorage.username,
                        money: $this.find('#PayMoney').val(),
                        decimal: $this.find('input[name=decimal]').val(),
                        platform: $platform,
                        type: $typecode,
                        USDTAddress: $this.find('input[name=USDTAddress]').val(),
                        Ratiotruemoney: $this.find('#Ratiotruemoney').val(),
                    };
                    window.parent.Public
                    .post(data, {async: false})
                    .done(function(response){
                        success = response.status == 0 ? true : false;
                        msg = success ? response.msg.msg : response.msg;
                        alert(msg);
                        if (success)
                        {
                            var lineData = response.msg.lineData;
                            var linePlatformData = response.msg.linePlatformData;

                            /* 判斷該通道的顯示帳號時應該顯示的title名稱 */
                            if (lineData.type == 'alipay' || lineData.type == 'AlipayMobile' || lineData.type == 'NativeAlipayH5' || lineData.type == 'AlipayTransfer' ||
                                lineData.type == 'AlipayQRpay' || lineData.type == 'AlipayToAlipay' || lineData.type == 'AlipayReds')
                            {
                                 var accountText = parent.Language.Get('支付宝帐号');
                            }
                            else if (lineData.type == 'web' || lineData.type == 'ATM' || lineData.type == 'WebATM' || lineData.type == 'BankTransfer' || lineData.type == 'HSBC' ||
                                     lineData.type == 'BACHF' || lineData.type == 'BKEAF' || lineData.type == 'ZABANK' || lineData.type == 'MASTER' || lineData.type == 'VISA')
                            {
                                var accountText = parent.Language.Get('银行帐号');
                            }
                            else if (lineData.type == 'wechat' || lineData.type == 'WechatMobile' || lineData.type == 'WechatMina')
                            {
                                var accountText = parent.Language.Get('微信帐号');
                            }                
                            else if (lineData.type == 'QQ' || lineData.type == 'fast' || lineData.type == 'FPS' || lineData.type == 'PAYME' || lineData.type == 'MOMO' ||
                                     lineData.type == 'ZALO' || lineData.type == 'VIETTELPAY')
                            {
                                var paytypename = $paytypelist[lineData.type].name;
                                var accountText = parent.Language.Get(paytypename) + parent.Language.Get('帐号');
                            }
                            else if (lineData.type == 'USDT')
                            {
                                var accountText = parent.Language.Get('钱包地址');
                            }
                            else if (lineData.type == 'GCash')
                            {
                                var accountText = parent.Language.Get('号码');
                            }
                            else //UnionpayQR  JingdongScanCod  JingdongMobile YunShanPay OnlineQR PhoneCard Deposit VNQR MerchantCode MerchantBarcode Cash BankScan PaytmWallet PaytmUPI
                            {
                                var accountText = parent.Language.Get('帐号');
                            }

                            var tag = '';
                            if (linePlatformData.showtype == 'text')
                            {
                                tag +=  "<tr><td width='20%'><div align='right'>" + parent.Language.Get('支付平台') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Payplatformtext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + parent.Language.Get('充值金额') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='PayMoneytext' style='width: 180px;float: left;position: relative;'></div></td></tr>";
                                if (linePlatformData.type == 'USDT')
                                {
                                    tag += "<tr><td width='20%'><div align='right'>" + parent.Language.Get('USDT数量') + "：</div></td>" +
                                           "<td width='80%'><div align='left' style='width: 180px;float: left;position: relative;'>" + lineData.Ratiotruemoney + "</div></td></tr>";
                                }
                                tag +=  
                                tag +=  "<tr class='accountnameText'><td width='20%'><div align='right'>" + parent.Language.Get('用户姓名') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Payaccountname' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + accountText + "：</div></td>" +
                                        "<td width='80%'>" +
                                            "<div align='left' id='" + linePlatformData.cardnoin + "' class='Payaccount' style='width: 130px;float: left;position: relative; line-height: 25px;'></div>" +
                                            "<div id='PayaccountCopy' class='clipboard copytext btn btn-xs' data-clipboard-text='" + linePlatformData.cardnoin + "' style='background: linear-gradient(to right, #fde687, #d8870f); color: #fff; border: 0; box-shadow: none; cursor: pointer; border-radius: 3px; font-size: 13px; letter-spacing: 2px; float: left; width: 80px;'>" + parent.Language.Get('复制') + "</div>" +
                                        "</td></tr>" +
                                        "<tr class='banknameText'><td width='20%'><div align='right'>" + parent.Language.Get('银行名称') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Paybankname' style='width: 180px;float: left;position: relative;'></div></td></tr>";
                            }
                            else if (linePlatformData.showtype == 'qr')
                            {
                                tag +=  "<tr><td width='20%'><div align='right'>" + parent.Language.Get('支付平台') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Payplatformtext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + parent.Language.Get('充值金额') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='PayMoneytext' style='width: 180px;float: left;position: relative;'></div></td></tr>";
                                if (linePlatformData.type == 'USDT')
                                {
                                    tag += "<tr><td width='20%'><div align='right'>" + parent.Language.Get('USDT数量') + "：</div></td>" +
                                           "<td width='80%'><div align='left' style='width: 180px;float: left;position: relative;'>" + lineData.Ratiotruemoney + "</div></td></tr>";
                                }
                                tag +=  "<tr><td width='20%'><div align='right'>" + parent.Language.Get('QR码') + "：</div></td>" +
                                        "<td width='80%' align='left'>" +
                                            "<div class='bank-check-box-s1' id='QRimg'>" +
                                                "<img class='onlineimg' src='" + location.origin + '/images/qrpay/' + linePlatformData.QRfile + "' style='width: 200px;'>" +
                                            "</div>" +
                                        "</td></tr>";
                            }
                            else if (linePlatformData.showtype == 'all')
                            {
                                tag +=  "<tr><td width='20%'><div align='right'>" + parent.Language.Get('支付平台') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Payplatformtext' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + parent.Language.Get('充值金额') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='PayMoneytext' style='width: 180px;float: left;position: relative;'></div></td></tr>";
                                if (linePlatformData.type == 'USDT')
                                {
                                    tag += "<tr><td width='20%'><div align='right'>" + parent.Language.Get('USDT数量') + "：</div></td>" +
                                           "<td width='80%'><div align='left' style='width: 180px;float: left;position: relative;'>" + lineData.Ratiotruemoney + "</div></td></tr>";
                                }
                                tag +=  "<tr><td width='20%'><div align='right'>" + parent.Language.Get('QR码') + "：</div></td>" +
                                        "<td width='80%' align='left'>" +
                                            "<div class='bank-check-box-s1' id='QRimg'>" +
                                                "<img class='onlineimg' src='" + location.origin + '/images/qrpay/' + linePlatformData.QRfile + "' style='width: 200px;'>" +
                                            "</div>" +
                                        "</td></tr>" +
                                        "<tr class='accountnameText'><td width='20%'><div align='right'>" + parent.Language.Get('用户姓名') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Payaccountname' style='width: 180px;float: left;position: relative;'></div></td></tr>" +
                                        "<tr><td width='20%'><div align='right'>" + accountText + "：</div></td>" +
                                        "<td width='80%'>" +
                                            "<div align='left' id='" + linePlatformData.cardnoin + "' class='Payaccount' style='float: left;position: relative; line-height: 25px;'></div>" +
                                            "<div id='PayaccountCopy' class='clipboard copytext btn btn-xs' data-clipboard-text='" + linePlatformData.cardnoin + "' style='background: linear-gradient(to right, #fde687, #d8870f); color: #fff; border: 0; box-shadow: none; cursor: pointer; border-radius: 3px; font-size: 13px; letter-spacing: 2px; float: left; width: 80px; margin-left: 15px;'>" + parent.Language.Get('复制') + "</div>" +
                                        "</td></tr>" +
                                        "<tr class='banknameText'><td width='20%'><div align='right'>" + parent.Language.Get('银行名称') + "：</div></td>" +
                                        "<td width='80%'><div align='left' class='Paybankname' style='width: 180px;float: left;position: relative;'></div></td></tr>";
                            }

                            Deposite.$form.find('.payData').html(tag);
                            if (lineData.type != 'BankTransfer' && lineData.type != 'HSBC' && lineData.type != 'BACHF' && lineData.type != 'BKEAF' && lineData.type != 'ZABANK' && lineData.type != 'MASTER' && lineData.type != 'VISA' && lineData.type != 'FPS')
                            {
                                $('.accountnameText, .banknameText').hide();
                            }
                            Deposite.$form.find('.Payplatformtext').html(linePlatformData.merchantname);
                            Deposite.$form.find('.PayMoneytext').html(lineData.money);
                            Deposite.$form.find('.Payaccount').html(linePlatformData.cardnoin);
                            Deposite.$form.find('.Payaccountname').html(linePlatformData.accountname);
                            Deposite.$form.find('.Paybankname').html(linePlatformData.bankname);
                            Deposite.$form.find('.recharge-data').hide();
                            Deposite.$form.find('.payData').show();
                        }
                    })
                    .fail(function(){
                        alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(5)');
                    });
                    return false;
                }
            }
        },
        /* getplatform 主要就是判斷哪個通道顯示該通道的資訊 */
        getplatform: function(type){
            Deposite.$type = type;
            if ($paytypelist[type].isOnlineQR == '1')
            {
                var data = {
                    cmd: 709,
                    sid: localStorage.sid || 0,
                    type: type,
                };
                window.parent.Public
                    .post(data, {async: false})
                    .done(function(response){
                    if(response.status != 0){
                        alert(response.msg);
                        return;
                    }
                    Deposite.$onlinepay = response.msg.onlinepay;
                    var tags = "";
                    for (var key in Deposite.$onlinepay)
                    {
                        var row = Deposite.$onlinepay[key];
                        if (type == row.type)
                        {
                            tags += "<option autostatus='0' value='" + row.id + "' code='' typecode='" + row.type + "'>" + row.name + "</option>";
                            Deposite.$money_limit[row.id] = parent.Language.Get("金额") + "：" + row.singlelow + "~" + row.singlehigh + "(" + parent.Language.Get("元") + ")";
                            Deposite.$hnote[row.id] = "<td colspan='2' style='text-align: left;' class='text_66'>:<br>" + row.hnote + "</td>";
                        }
                    }
                    Deposite.$form.find(".platform").html(tags);
                    Deposite.$form.find("input[name=type]").val(type);
                    Deposite.$form.find("input[name=lang]").val(localStorage.language);
                    Deposite.$top.find('.acc-w-title').html(parent.Language.Get($paytypelist[type].name));
                    Deposite.$top.find('.top > h1').html(parent.Language.Get($paytypelist[type].name));
                    Deposite.changePlatform();
                    $('#Deposit').show();
                });
            }
            else
            {
                var data = {
                    cmd: 706,
                    sid: localStorage.sid || 0,
                    type: type,
                };
                window.parent.Public
                    .post(data, {async: false})
                    .done(function(response){
                        if(response.status != 0){
                            alert(response.msg);
                            return;
                        }
                        Deposite.$bank = response.msg.bank;
                        Deposite.$bankcode = response.msg.bankcode;
                        Deposite.$cointype = response.msg.cointype;
                        Deposite.$merchanttype = response.msg.merchanttype;

                        var rows = response.msg.linePlatform;
                        var tags = "";
                        for (var key in rows)
                        {
                            var row = rows[key];
                            tags += "<option autostatus='" + row.autoStatus + "' value='" + row.id + "' code='" + row.code + "' typecode='" + row.type + "'>" + row.merchantname + "</option>";
                            Deposite.$money_limit[row.id] = parent.Language.Get("金额") + "：" + row.singlelow + "~" + row.singlehigh + "(" + parent.Language.Get("元") + ")";
                            Deposite.$hnote[row.id] = "<td colspan='2' style='text-align: left;' class='text_66'>:<br>" + row.hnote + "</td>";
                            Deposite.$ratio[row.id] = (row.ratio != '' && row.ratio != 1) ? "<td colspan='2' style='text-align: left; color: #ff0505;'>" + parent.Language.Get('汇率提示') + ": 1" + row.type + " : " + row.ratio + "</td>" : '';
                            Deposite.$ratio2[row.id] = row.ratio;
                        }
                        Deposite.$form.find(".platform").html(tags);
                        Deposite.$form.find("input[name=type]").val(type);
                        Deposite.$form.find("input[name=lang]").val(localStorage.language);
                        Deposite.$top.find('.acc-w-title').html(parent.Language.Get($paytypelist[type].name));
                        Deposite.$top.find('.top > h1').html(parent.Language.Get($paytypelist[type].name));
                        Deposite.changePlatform();
                        $('#Deposit').show();
                    });
            }
        },
        /* changePlatform 主要就是判斷顯示的欄位 */
        changePlatform: function(){
            Deposite.setDecimalPoint();
            var platform = Deposite.$form.find("select[name=platform] option:selected").attr('code');
            var platformid = Deposite.$form.find("select[name=platform] option:selected").attr('value');
            var typecode = Deposite.$form.find("select[name=platform] option:selected").attr('typecode');
            var autostatus = Deposite.$form.find("select[name=platform] option:selected").attr('autostatus');
            Deposite.$form.find(".style1").html(Deposite.$money_limit[platformid]);
            Deposite.$form.find(".hnote").html(Deposite.$hnote[platformid]);
            Deposite.$form.find(".ratio").html(Deposite.$ratio[platformid]);
            Deposite.$form.find("input[name='USDTAddress']").val(localStorage.USDTAddress);
            Deposite.$top.find('.Tutorial').css('display', 'none');

            if ($paytypelist[typecode].isOnlineQR == '1')
            {
                Deposite.$form.find('.bank_account_name,.bank_account,.mobile,.idcard,.truename,.bankname,.IFSC,.merchanttype,.truename,.email, .CSC, .expDate, .deviceType, .bankcode, .cointype, .cointypetext, .recharge-data-bankcode, .recharge-data-cointype, .ratio, .USDTAddress, .Ratiotruemoney').hide();
            }
            else
            {
                //判斷是否有選擇銀行卡
                if (Deposite.$bankcode != '')
                {
                    var tags = "";
                    for (var key in Deposite.$bankcode[platform])
                    {
                        var row = Deposite.$bankcode[platform][key];
                        tags += "<option value='" + row + "'>" + Deposite.$bank[row] + "</option>";
                    }
                    Deposite.$form.find("select[name=bankcode]").html(tags);
                }
                //判斷是否有選擇虛擬貨幣
                if (Deposite.$cointype != '')
                {
                    var tags1 = "";
                    for (var key in Deposite.$cointype[platform])
                    {
                        if (localStorage.CBScointype == '')
                        {
                            var row = Deposite.$cointype[platform][key];
                            tags1 += "<option value='" + row + "'>" + row + "</option>";
                        }
                        else
                        {
                            tags1 = "<option value='" + localStorage.CBScointype + "'>" + localStorage.CBScointype + "</option>";
                        }
                    }
                    Deposite.$form.find("select[name=cointype]").html(tags1);
                }
                //判斷是否有選擇超商
                if (Deposite.$merchanttype != '')
                {
                    var tags2 = "";
                    for (var key in Deposite.$merchanttype[platform])
                    {
                        var row = Deposite.$merchanttype[platform][key];
                        tags2 += "<option value='" + key + "'>" + row + "</option>";
                    }
                    Deposite.$form.find("select[name=merchanttype]").html(tags2);
                }
                //判斷選擇銀行卡是否顯示
                if(Deposite.$bankcode[platform])
                {
                    $('.bankcode').css('display', 'table-row');
                }
                else
                {
                    $('.bankcode').hide();
                }
                //判斷選擇虛擬貨幣是否顯示,且CBSaddress必須為空值
                if(Deposite.$cointype[platform] && localStorage.CBSaddress == '')
                {
                    $('.cointype').css('display', 'table-row');
                    $('.cointypetext').hide();
                }
                else
                {
                    $('.cointype').hide();
                    $('.cointypetext').css('display', 'table-row');
                }
                //判斷欄位是否顯示
                Deposite.$form.find('.bank_account_name,.bank_account,.mobile,.idcard,.truename,.bankname,.IFSC,.merchanttype,.truename,.email, .CSC, .expDate, .deviceType, .ratio, .USDTAddress, .Ratiotruemoney').hide();
                if (Deposite.$type == 'fast' && platform == 'YIBAOPAY')
                {
                    Deposite.$form.find('.bank_account_name,.mobile,.idcard').css('display', 'table-row');
                }
                else if (platform == 'MPPAY' || platform == 'DAIFAPAY' || platform == 'RSPAY' || platform == 'BAOFU' || platform == 'WPAY' || platform == 'SSTGPAY')
                {
                    if (platform == 'DAIFAPAY' && Deposite.$type == 'web')
                    {
                        Deposite.$form.find('.modetype').css('display', 'table-row');
                    }
                    if (platform == 'SSTGPAY' && Deposite.$type == 'MerchantCode')
                    {
                        Deposite.$form.find('.merchanttype').css('display', 'table-row');
                    }
                    Deposite.$form.find('.truename').css('display', 'table-row');
                }
                else if (platform == 'HUEITONGPAY')
                {
                    var item = (Deposite.$type == 'MerchantCode') ? '.merchanttype,.truename,.mobile,.email' : '.truename,.mobile,.email';
                    Deposite.$form.find('.merchanttype,.truename,.mobile,.email').hide();
                    Deposite.$form.find(item).css('display', 'table-row');
                }
                else if (platform == 'ASTROPAY')
                {
                    Deposite.$form.find('.bank_account, .CSC, .expDate').css('display', 'table-row');
                }
                else if (platform == 'HUEIJHONGPAY')
                {
                    var item = (Deposite.$type == 'web') ? '.bank_account,.truename,.mobile,.email' : '.truename,.mobile,.email';
                    Deposite.$form.find('.bank_account,.truename,.mobile,.email').hide();
                    Deposite.$form.find(item).css('display', 'table-row');
                }
                else if ((platform == 'UZPAY' && Deposite.$type == 'BankTransfer') || (platform == 'EXTRAORDINARY' && (Deposite.$type == 'web' || Deposite.$type == 'fast')) || platform == 'CIANCHENGPAY')
                {
                    Deposite.$form.find('.truename').css('display', 'table-row');
                }
                else if (platform == 'SHUPAY')
                {
                    Deposite.$form.find('.merchanttype').css('display', 'table-row');
                }
                else if (Deposite.$type == 'USDT')
                {
                    if (autostatus != '1')
                    {
                        Deposite.$form.find('.ratio, .USDTAddress, .Ratiotruemoney').css('display', 'table-row');
                        Deposite.$top.find('.Tutorial').css('display', 'block');
                    }
                }

                var blocknone1 = (Deposite.$type == 'PhoneCard') ? 'table-row' : 'none';
                // var blocknone2 = (Deposite.$type == 'OnlineQR') ? 'table-row' : 'none';
                var blocknone3 = (typeof(Deposite.$bankcode[platform]) != 'undefined') ? 'table-row' : 'none';
                var blocknone4 = (platform == 'CBS' && (typeof(Deposite.$cointype[platform]) != 'undefined' && (Deposite.$CBSaddress == '' || Deposite.$CBSaddress == 'null'))) ? 'table-row' : 'none';
                var blocknone5 = (platform == 'CBS' && (Deposite.$CBSaddress != '' && Deposite.$CBSaddress != 'null')) ? 'table-row' : 'none';

                //依照各個支付平台的通道設定是否顯示銀行名稱
                if (((platform == 'WPAY' || platform == 'RSPAY' || platform == 'UZPAY') && (Deposite.$type == 'MOMO' || Deposite.$type == 'ZALO')) ||
                    (platform == 'DALIPAY' && (Deposite.$type == 'MOMO' || Deposite.$type == 'ZALO')) ||
                    (platform == 'APPAY' && (Deposite.$type == 'MOMO' || Deposite.$type == 'ZALO' || Deposite.$type == 'BankTransfer'))
                   )
                {
                    var blocknone3 = 'none';
                }
                else
                {
                    var blocknone3 = blocknone3;
                }

                $('.recharge-PhoneCard').css('display', blocknone1);
                // $('.QRData').css('display', blocknone2);
                $('.recharge-data-bankcode').css('display', blocknone3);
                $('.recharge-data-cointype').css('display', blocknone4);
                $('.cointypetext').css('display', blocknone5);
            }
        },
        /* setDecimalPoint 主要就是抓取該第三方是否顯示小數點 */
        setDecimalPoint: function(){
            var $typecode = Deposite.$form.find("select[name=platform] option:selected").attr('typecode');
            var $cashCode = Deposite.$form.find("select[name=platform] option:selected").attr('code');
            var data = {
                cmd: 708,
                sid: localStorage.sid || 0,
                payment: $cashCode,
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    if(response.status != 0)
                    {
                        if ($typecode == 'AlipayToAlipay' || $typecode == 'FPS' || $typecode == 'PAYME' || $typecode == 'AlipayQRpay')
                        {
                            var a = Math.floor(Math.random()*(39))+10;
                            Deposite.$form.find('.decimal').html('.'+a);
                            Deposite.$form.find('input[name=decimal]').val('.'+a);
                        }
                        else
                        {
                            Deposite.$form.find('.decimal').html('');
                            Deposite.$form.find('input[name=decimal]').val('');
                        }
                        return;
                    }
                    var isDecimal = $.parseJSON(response.msg.paymentlist.isDecimal);
                    if (isDecimal[$typecode] == '1')
                    {
                        Deposite.$form.find('.decimal').html('');
                        Deposite.$form.find('input[name=decimal]').val('');
                    }
                    else
                    {
                        var a = Math.floor(Math.random()*(39))+10;
                        Deposite.$form.find('.decimal').html('.'+a);
                        Deposite.$form.find('input[name=decimal]').val('.'+a);
                    }
                });
        },
        /* SetRatesValue 轉換匯率 */
        SetRatesValue: function()
        {
            var $this = $(this);
            var platformid = Deposite.$form.find("select[name=platform] option:selected").val();
            var autostatus = Deposite.$form.find("select[name=platform] option:selected").attr('autostatus');
            var typecode = Deposite.$form.find("select[name=platform] option:selected").attr('typecode');
            var id = $this.attr('id');
            console.log(Deposite.$ratio2);
            
            if (autostatus == '0' && typecode == 'USDT')
            {
                if (id == 'PayMoney')
                {
                    $truemoney = Deposite.$form.find('#PayMoney').val() != '' ? Math.round((Deposite.$form.find('#PayMoney').val() / Deposite.$ratio2[platformid]) * 100) / 100 : 0;
                    Deposite.$form.find('#Ratiotruemoney').val($truemoney);
                }
                else if (id == 'Ratiotruemoney')
                {
                    $truemoney = Deposite.$form.find('#Ratiotruemoney').val() != '' ? Math.round((Deposite.$form.find('#Ratiotruemoney').val() * Deposite.$ratio2[platformid]) * 100) / 100 : 0;
                    Deposite.$form.find('#PayMoney').val($truemoney);
                }
            }
        },
        SetPlacehold: function(){
            Deposite.$form.find('#submit').attr('value',parent.Language.Get('立即充值'));
            Deposite.$form.find('#reset').attr('value',parent.Language.Get('重新填写'));
        },
    };

    var DepositeCard = {
        ajaxing: false,
        $form: null,
        $addButton: null,
        $length: 10,
        initial: function(){
            DepositeCard.$form = $('.depositeCard');
            DepositeCard.$addButton = DepositeCard.$form.find('#addButton');
            DepositeCard.setCardOption();
            DepositeCard.bindEvents();
        },
        bindEvents: function(){
            DepositeCard.$addButton.bind('click', DepositeCard.addCard);
            DepositeCard.$form.bind('submit', DepositeCard.deposite);
        },
        deposite: function(){
            if (DepositeCard.ajaxing) {
                return false;
            }
            var $this = $(this);
            var success = false;
            var data = {
                cmd: 213,
                sid: localStorage.sid || 0,
                method: $this.find('#method').val(),
                frpId: $this.find('#cardName').val(),
                cards: DepositeCard.getCards(),
            };
            DepositeCard.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(6)');
                    //alert('点卡存款 请求失败 !');
                });
            DepositeCard.ajaxing = false;
            return success;
        },
        getCards: function(){
            var rows = [];
            var i = 0;
            DepositeCard.$form.find('.list').each(function(){
                var number = $(this).find('.number').val() || '';
                var password = $(this).find('.password').val() || '';
                if (number && password)
                {
                    rows[i] = {
                        number: number,
                        password: password,
                    };
                    i++;
                } 
            });
            return rows;
        },
        setCardOption: function(){
            var card = window.parent.Public.getCardObject();
            var tags = null;
            for (var key in card)
            {
                tags += '<option value="' + key + '">' + card[key] + '</option>';
            }
            DepositeCard.$form.find('#cardName').html(tags);
        },
        addCard: function(){
            if (DepositeCard.$form.find('.list').length >= DepositeCard.$length)
            {
                alert(parent.Language.Get('最多') + $length + parent.Language.Get('组'));
                return false;
            }
            var deleteButton = $('<button class="btn btn-danger remove text_135"></button>')
                .bind('click', DepositeCard.deleteCard);
            var deleteBox = $('<div class="form-group"><div class="col-xs-12 text-center"></div></div>')
                .html(deleteButton);
            DepositeCard.$form
                .find('.list')
                .first()
                .clone()
                .append(deleteBox)
                .appendTo(DepositeCard.$form.find('.cards'))
                .find('input').val('');
            return false;
        },
        deleteCard: function(){
            $(this).parents('.list').remove();
            return false;
        }
    };

    var WithdrawalBank = {
        ajaxing: false,
        $form: null,
        $choose: null,
        $ratio: {},
        initial: function(){
            WithdrawalBank.$form = $('.withdrawalBank');
            WithdrawalBank.$choose = WithdrawalBank.$form.find('.choose');
            WithdrawalBank.SetPlacehold();
            WithdrawalBank.setInfo();
            WithdrawalBank.setExistBank();
            WithdrawalBank.chooseDefault();
            WithdrawalBank.bindEvents();
            WithdrawalBank.setTable();
        },
        bindEvents: function(){
            // $("#btn-withdrawal-submit").on("click",WithdrawalBank.withdrawal);
            WithdrawalBank.$form.bind('submit', WithdrawalBank.withdrawal);
            WithdrawalBank.$choose.bind('click', WithdrawalBank.showDefaultOrAuto);
            $('#Withdrawaltable').on('click',"#trans3-btn",WithdrawalBank.setauditmoney);
            $('#Withdrawaltable').on('click',"#trans3-btn",WithdrawalBank.showWindow);
            $('#Withdrawaltable').on('click',"#trans3-btn",WithdrawalBank.systemSet);
            $('.acc-window .close, .acc-window .confirm').click(WithdrawalBank.hideWindow);

            $('#withdrawalMoney').on('keyup', function() {
                var withdrawalfee = $(this).val() * $('#bankfees').val();
                var bankfeeslimit = parseFloat($('#bankfeeslimit').val());
                if (withdrawalfee > bankfeeslimit) withdrawalfee = bankfeeslimit
                $('#withdrawalfee').text(withdrawalfee.toFixed(2));
                $('#truemoney').text(($(this).val()-$('#totalauditmoney').val()-$('#withdrawalfee').text()).toFixed(2));

                var typename = $('#withdrawalBanksubmit').attr('typename');
                var usdtratio = (typename == 'USDT-ERC20' || typename == 'USDT-TRC20') ? ($('#truemoney').text() / WithdrawalBank.$ratio[typename]).toFixed(2) : 0.00;
                $('#Ratiotruemoney').text(usdtratio);
            });
        },
        setTable: function(){
            var games = window.parent.Public.getGameHallAndGid() || {};
            var tags = [];
            var defaultTags = 
                '<div style="width: 100%;display: flex;">'+
                    '<div class="t-h-box" data-num="10">'+
                        '<span class="add-icon"></span>'+
                        '<span class="minus-icon"></span>'+
                        '<a class="refresh-icon"></a>'+
                        '<div class="t-h-info">'+
                            '<h1 class="text_194"></h1>'+
                            '<h6 class="gameMoney" gameName="Center"></h6>'+
                        '</div>'+
                    '</div>';
            var defaultTags1 = 
                    '<div class="t-h-box" data-num="11">' +
                        '<span class="add-icon"></span>' +
                        '<span class="minus-icon"></span>' +
                        '<a class="refresh-icon"></a>' +
                        '<div class="t-h-info">' +
                            '<h1 class="text_195"></h1>' +
                            '<h6 class="lockmoney" gameName="LockMoney">' + parent.Language.Get('读取中') + '</h6>' +
                        '</div>' +
                    '</div>';
            var defaultTags2 = 
                    '<div class="t-h-box" data-num="13">'+
                        '<a id="reloadBetMoney"></a>'+
                        '<div class="t-h-info">'+
                            '<h1 class="text_197"></h1>'+
                            '<h6 id="betMoney">' + parent.Language.Get('读取中') + '</h6>'+
                        '</div>'+
                    '</div>'+
                '</div>';

            var defaultTags3 = '<div class="txt" style="display: block;padding: 9px 23px">';
            // var defaultTags4 = '<div class="text_857" style="color:#ffc95f;font-size:15px;font-weight:bold;width: 100%;text-align: left;padding: 23px 0px 0px 23px;"></div>';
            var data = {
                cmd: 713,
                sid: localStorage.sid || '',
            };
            window.parent.Public
            .post(data, {async: false})
            .done(function(response){
                var msg = response.msg;
                var withdrawType = msg.withdrawType;
                for(var key in withdrawType)
                {
                    var row = withdrawType[key];
                    if(row.ispc == '1')
                    {
                        defaultTags3 +=                          
                            '<div class="de-title">' + 
                                '<div style="color: #e3c7af;font-size: 1.17em;font-weight: bold;text-align: left;margin-bottom: 5px;">' + parent.Language.Get(row.name) + '</div>'+
                                '<div class="de-txt1" style="text-align: left;">' + parent.Language.Get(row.tip) + '</div>' +
                                '<div class="balancegameMoney">' +
                                    '<a id="trans3-btn" type="' + row.type + '" class="login-btn4 text_196"></a>' +
                                '</div>' +
                            '</div>';
                        WithdrawalBank.$ratio[row.type] = row.ratio;
                        if (row.type == 'USDT-ERC20' || row.type == 'USDT-TRC20')
                        {
                            WithdrawalBank.$form.find('#Ratio').text(parent.Language.Get('汇率提示') + ': 1 USDT :' + row.ratio);
                        }
                        else
                        {
                            WithdrawalBank.$form.find('#Ratio').text('');
                        }
                    }
                }
            });
            defaultTags3 += '</div>';
            // $('#Withdrawaltable').html(defaultTags + defaultTags1 + defaultTags2 + defaultTags4 + defaultTags3);
            $('#Withdrawaltable').html(defaultTags + defaultTags1 + defaultTags2 + defaultTags3);
            WithdrawalBank.getAllGameMoney();
        },
        getAllGameMoney: function() {
            $('#Withdrawaltable').find('.gameMoney').each(function() {
                var $this = $(this);
                var d = $this.attr('gameName');
                $this.attr('gameName') && WithdrawalBank.getGameMoney.apply($this, {});
            });
        },
        getGameMoney: function() {
            var $this = $(this);
            $this.html(parent.Language.Get('读取中'));
            var gameName = $this.attr('gameName');
            var data = {
                cmd: 200,
                sid: localStorage.sid,
                gid: window.parent.Public.getGameHallAndGidByHall(gameName).gid || 0,
            };

            if (data.gid == 0) {
                $this.html(parent.Language.Get('未开放'));
                return;
            }
            window.parent.Public.post(data).done(function(response) {
                var money = window.parent.Public.formatFloat(response.msg.money ,2);
                if (response.status == 0)
                {
                    $this.html(money);
                    if (data.gid == 10)
                    {
                        var lockmoney = window.parent.Public.formatFloat(response.msg.lockmoney ,2);
                        var agentprofit = window.parent.Public.formatFloat(response.msg.agentprofit ,2);
                        $('.lockmoney').html(lockmoney || 0.00);
                        $('.AgentProfit').html(agentprofit || 0.00);
                    }
                    return;
                }
            });
        },
        withdrawal: function(){
            if (WithdrawalBank.ajaxing){
                return false;
            }
            var success = false;
            var $this = $(this);
            var typename = $('#withdrawalBanksubmit').attr('typename');
            if (typename == 'bank' && $this.find('#newbankAccount').val() == '')
            {
                alert(parent.Language.Get('尚未设置银行账号, 请联系客服!'));
                return false;
            }
            else if (typename == 'fastTurn' && $this.find('#fastTurnNum').val() == '')
            {
                alert(parent.Language.Get('尚未设置转数快账号, 请联系客服!'));
                return false;
            }
            else if (typename == 'alipayToalipay' && $this.find('#alipayAccount').val() == '')
            {
                alert(parent.Language.Get('尚未设置支付宝账号, 请联系客服!'));
                return false;
            }
            else if (typename == 'USDT-ERC20' && $this.find('#usdtAccount').val() == '')
            {
                alert(parent.Language.Get('尚未设置USDT账号, 请联系客服!'));
                return false;
            }
            else if (typename == 'USDT-TRC20' && $this.find('#usdttrcAccount').val() == '')
            {
                alert(parent.Language.Get('尚未设置USDT账号, 请联系客服!'));
                return false;
            }
            else if (typename == 'BEP20' && $this.find('#bep20Account').val() == '')
            {
                alert(parent.Language.Get('尚未设置BEP20账号, 请联系客服!'));
                return false;
            }
            else if (typename == 'BEP2' && $this.find('#bep2Account').val() == '')
            {
                alert(parent.Language.Get('尚未设置BEP2账号, 请联系客服!'));
                return false;
            }


            var data = {
                cmd: 202,
                sid: localStorage.sid || '',
                paypwd: $this.find('#payPwd').val(),
                money: $this.find('#withdrawalMoney').val(),
                auditmoney: $this.find('#auditmoney').val(),
                cost: WithdrawalBank.$form.find('#cost').text(),
                withdrawalfee: WithdrawalBank.$form.find('#withdrawalfee').text(),
                truemoney: WithdrawalBank.$form.find('#truemoney').text(),
                Ratiotruemoney: WithdrawalBank.$form.find('#Ratiotruemoney').text(),
                bankId: WithdrawalBank.getBankId(),
                name: $this.find('#name').val(),
                alipayAccount: $this.find('#alipayAccount').val(),
                alipayNum: $this.find('#alipayNum').val(),
                fastTurnNum: $this.find('#fastTurnNum').val(),
                newbankName: $this.find('#newbankName').val(),
                newbankAccount: $this.find('#newbankAccount').val(),
                USDTAccount: $this.find('#usdtAccount').val(),
                USDTTRC20Account: $this.find('#usdttrcAccount').val(),
                BEP20Account: $this.find('#bep20Account').val(),
                BEP2Account: $this.find('#bep2Account').val(),
                typename: typename,
            };
            WithdrawalBank.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(7)');
                    //alert('提款 请求失败 !');
                });
            WithdrawalBank.ajaxing = false;
            return success;
        },
        getBankId: function(){
            var type = WithdrawalBank.$choose.filter('.active').attr('id');
            var id = type == 'auto'
                ? $('#existBank').val()
                : defaultBank['id'];
            return parseInt(id);
        },
        chooseDefault: function(){
            WithdrawalBank.setDefaultBank();
            WithdrawalBank.setauditmoney();
            WithdrawalBank.showDefaultOrAuto.apply(WithdrawalBank.$form.find('#default'), []);
        },
        setDefaultBank: function(){
            if (! defaultBank){
                alert(parent.Language.Get('无预设银行卡,请至绑定银行卡设定'));
                return false;
            }
            WithdrawalBank.$form.find('#bankName').val(defaultBank['name'] || ' - ');
            WithdrawalBank.$form.find('#bankAccount').val(defaultBank['account'] || ' - ');
            WithdrawalBank.$form.find('#trueName').val(defaultBank['truename'] || ' - ');
            WithdrawalBank.$form.find('#bankCity').val(defaultBank['province'] + defaultBank['city'] + defaultBank['branch'] || ' - ');
        },
        setauditmoney: function(){
            var $this = $(this);
            var typeName = $this.attr('type');
            $('#withdrawalBanksubmit').attr('typeName', typeName);

            var username = '';
            var fpsaccount = '';
            var bankaccount = '';
            var bankname = '';
            var usdtaccount = '';
            var usdttrcaccount = '';
            var bep20account = '';
            var bep2account = '';

            for (var key in banks)
            {
                var row = banks[key];
                username = row.truename;
                if (row.account != '')
                {
                    bankaccount = row.account;
                    bankname = row.name;
                }
                if (row.FPSAccount != '')
                {
                    fpsaccount = row.FPSAccount;
                }
                if (row.USDTAccount != '')
                {
                    usdtaccount = row.USDTAccount;
                }
                if (row.USDTAccountTRC20 != '')
                {
                    usdttrcaccount = row.USDTAccountTRC20;
                }
                if (row.BEP20Account != '')
                {
                    bep20account = row.BEP20Account;
                }
                if (row.BEP2Account != '')
                {
                    bep2account = row.BEP2Account;
                }
            }

            WithdrawalBank.$form.find('#name').val(username);
            WithdrawalBank.$form.find('#newbankName').val(bankname);
            WithdrawalBank.$form.find('#newbankAccount').val(bankaccount);
            WithdrawalBank.$form.find('#fastTurnNum').val(fpsaccount);
            WithdrawalBank.$form.find('#usdtAccount').val(usdtaccount);
            WithdrawalBank.$form.find('#usdttrcAccount').val(usdttrcaccount);
            WithdrawalBank.$form.find('#bep20Account').val(bep20account);
            WithdrawalBank.$form.find('#bep2Account').val(bep2account);
            WithdrawalBank.$form.find('#alipayAccount').val(defaultBank['ALIPAYAccount']);

            if (! bankaccount)
            {
                WithdrawalBank.$form.find('#newbankAccount').attr('placeholder', parent.Language.Get('请至"绑定银行卡"新增'));
            }
            if (! fpsaccount)
            {
                WithdrawalBank.$form.find('#fastTurnNum').attr('placeholder', parent.Language.Get('请至"绑定银行卡"新增'));
            }
            if (! usdtaccount)
            {
                WithdrawalBank.$form.find('#usdtAccount').attr('placeholder', parent.Language.Get('请至"绑定银行卡"新增'));
            }
            if (! usdttrcaccount)
            {
                WithdrawalBank.$form.find('#usdttrcAccount').attr('placeholder', parent.Language.Get('请至"绑定银行卡"新增'));
            }
            if (! bep20account)
            {
                WithdrawalBank.$form.find('#bep20Account').attr('placeholder', parent.Language.Get('请至"绑定银行卡"新增'));
            }
            if (! bep2account)
            {
                WithdrawalBank.$form.find('#bep2Account').attr('placeholder', parent.Language.Get('请至"绑定银行卡"新增'));
            }

            WithdrawalBank.$form.find('#name, #newbankName, #newbankAccount, #fastTurnNum, #alipayAccount, #usdtAccount, #usdttrcAccount, #bep20Account, #bep2Account').attr('readonly', 'readonly');

            if(typeName == 'alipayToalipay')
            {
                $('.alipayBtn').show();
                $('.alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTERCNumBtn, .USDTTRCNumBtn, .BEP20NumBtn, .BEP2NumBtn, .Ratio').hide();
            }
            if(typeName == 'alipayCar')
            {
                $('.alipayNumBtn').show();
                $('.alipayBtn, .fastTurnNumBtn, .newbankBtn, .USDTERCNumBtn, .USDTTRCNumBtn, .BEP20NumBtn, .BEP2NumBtn, .Ratio').hide();
            }
            if(typeName == 'fastTurn')
            {
                $('.fastTurnNumBtn').show();
                $('.alipayBtn, .alipayNumBtn, .newbankBtn, .USDTERCNumBtn, .USDTTRCNumBtn, .BEP20NumBtn, .BEP2NumBtn, .Ratio').hide();
            }
            if(typeName == 'bank')
            {
                $('.newbankBtn').show();
                $('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .USDTERCNumBtn, .USDTTRCNumBtn, .BEP20NumBtn, .BEP2NumBtn, .Ratio').hide();
            }
            if(typeName == 'USDT-ERC20')
            {
                $('.USDTERCNumBtn, .Ratio').show();
                $('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTTRCNumBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
            }
            if(typeName == 'USDT-TRC20')
            {
                $('.USDTTRCNumBtn, .Ratio').show();
                $('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTERCNumBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
            }
            if(typeName == 'BEP20')
            {
                $('.BEP20NumBtn').show();
                $('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTERCNumBtn, .USDTTRCNumBtn, .BEP2NumBtn, .Ratio').hide();
            }
            if(typeName == 'BEP2')
            {
                $('.BEP2NumBtn').show();
                $('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTERCNumBtn, .USDTTRCNumBtn, .BEP20NumBtn, .Ratio').hide();
            }
            var data = {
                cmd: 208,
                sid: localStorage.sid || '',
                username: localStorage.username,
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    WithdrawalBank.$form.find('#auditmoney').val(response.msg.preferential);
                    WithdrawalBank.$form.find('#cost').text(response.msg.administrative);
                    WithdrawalBank.$form.find('#totalauditmoney').val(response.msg.total);
                    WithdrawalBank.$form.find('#bankfees').val(response.msg.bankfees);
                    WithdrawalBank.$form.find('#bankfeeslimit').val(response.msg.bankfeeslimit);

                    var data = response.msg.data;
                    var tag = '';
                    var type3 = 0.0;
                    for (var key in data)
                    {
                        if (data[key].type == 2) {
                            //tag +='优惠' + data[key].t_activity_id + ':' + data[key].bonus + '<br />';
                            tag += parent.Language.Get('优惠') + '(' + data[key].aname + ')：' + data[key].bonus + '<br />';
                        }
                        if (data[key].type == 3) {
                            type3 += parseFloat(data[key].bonus);
                        }
                    }
                    tag += parent.Language.Get('返水') +'：' + Math.round(type3 * 100) / 100;
                    WithdrawalBank.$form.find('#auditmsg').html(tag);
                });

                if (typeName == 'USDT-ERC20' || typeName == 'USDT-TRC20')
                {
                    WithdrawalBank.$form.find('#ratio').text('1 USDT : ' + WithdrawalBank.$ratio[typeName]);
                }
                else
                {
                    WithdrawalBank.$form.find('#ratio').text('');
                }
        },
        setExistBank: function(){
            var tag = '';
            for (var key in banks)
            {
                tag += 
                    '<option value="' + banks[key].id + '">' +
                        parent.Language.Get('银行名称') + '：' + banks[key].name +
                        ' - ' + parent.Language.Get('银行卡号') + '：' + banks[key].account +
                        ' - ' + parent.Language.Get('开户姓名') + '：' + banks[key].truename +
                    '</option>'
            }
            WithdrawalBank.$form.find('#existBank').html(tag);
        },
        setInfo: function(){
            $('#needBet').html(localStorage.needBet || 0.00);
            $('#nowBet').html(localStorage.nowBet || 0.00);
        },
        showDefaultOrAuto: function(){
            var $this = $(this);
            var type = $(this).attr('id');
            WithdrawalBank.$choose.removeClass('active');
            $this.addClass('active');
            if (type == 'auto')
            {
                WithdrawalBank.$form.find('.default').hide();
                WithdrawalBank.$form.find('.auto').show();
              
                // $('.BankWithdrawalType').css('width', '199%');
                // $('.banktype').css('padding-left', '143px');
            } else {
                WithdrawalBank.$form.find('.default').show();
                WithdrawalBank.$form.find('.auto').hide();
                // $('.BankWithdrawalType').css('width', '');
                // $('.banktype').css('padding-left', '');
                
            }
        },
        showWindow: function(){
            var islock = CheckLock.IsLockWithdrawal();
            if(islock){
                alert(parent.Language.Get("锁定中! 请向客服人员解锁(锁定金额)"));
                return ; 
            }
            $('#acc-trans3-w').show();
        },
        systemSet: function(){
            var data = {
                cmd: 210,
                sid: localStorage.sid || '',
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    msg = response.msg;
                    value = msg.value;
                    var tag = parent.Language.Get("最低提款金额") + ' ' + "HKD" + value + ".00";
                    WithdrawalBank.$form.find('#withdrawalMoney').attr('placeholder',tag);
                });
        },
        hideWindow: function(){
            $('.acc-window-bg').hide();
        },
        SetPlacehold: function(){
            WithdrawalBank.$form.find('#withdrawalBanksubmit').attr('value',parent.Language.Get('确认送出'));
            WithdrawalBank.$form.find('#alipayBtn').attr('value',parent.Language.Get('支付宝账号'));
            WithdrawalBank.$form.find('#alipayNumBtn').attr('value',parent.Language.Get('支付宝收款码'));
            WithdrawalBank.$form.find('#fastTurnNumBtn').attr('value',parent.Language.Get('转数快号码'));
            WithdrawalBank.$form.find('#newbankBtn1').attr('value',parent.Language.Get('银行名称'));
            WithdrawalBank.$form.find('#newbankBtn2').attr('value',parent.Language.Get('银行账号'));
        }
    };

    var BindBank = {
        ajaxing: false,
        $form: null,
        $list: null,
        $bind: null,
        initial: function(){
            BindBank.$form = $('.bindBank');
            BindBank.$list = $('#bankList');
            BindBank.setBody(); //預設銀行卡
            BindBank.getBankList();
            BindBank.setInfo();
            // BindBank.setTrueName();
            BindBank.setBankOption();
            BindBank.bindEvents();
        },
        bindEvents: function(){
            BindBank.$form.bind('submit', BindBank.add);
            $('#addbanks').on('click', '#reWrite', BindBank.reWrite);
            $('.bindbankcard').on('click', function(){
                BindBank.$form.find('.bankName, .bankAccount').css('display', 'block');
                BindBank.$form.find('.FPSAccount, .USDTAccount, .USDTTRC20Account, .BEP20Account, .BEP2Account').css('display', 'none');
            });
            $('.bindfps').on('click', function(){
                BindBank.$form.find('.FPSAccount').css('display', 'block');
                BindBank.$form.find('.bankName, .bankAccount, .USDTAccount, .USDTTRC20Account, .BEP20Account, .BEP2Account').css('display', 'none');
            });
            $('.bindusdterc20').on('click', function(){
                BindBank.$form.find('.USDTAccount').css('display', 'block');
                BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTTRC20Account, .BEP20Account, .BEP2Account').css('display', 'none');
            });
            $('.bindusdttrc20').on('click', function(){
                BindBank.$form.find('.USDTTRC20Account').css('display', 'block');
                BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTAccount, .BEP20Account, .BEP2Account').css('display', 'none');
            });
            // $('.bindbep20').on('click', function(){
            //     BindBank.$form.find('.BEP20Account').css('display', 'block');
            //     BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTAccount, .USDTTRC20Account, .BEP2Account').css('display', 'none');
            // });
            // $('.bindbep2').on('click', function(){
            //     BindBank.$form.find('.BEP2Account').css('display', 'block');
            //     BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTAccount, .USDTTRC20Account, .BEP20Account').css('display', 'none');
            // });
        },
        setBody: function(){

            if (banks.length >= 4)
            {
                $('.oneset').css('display', 'none');
                return false;
            }

            var fpsaccount = '';
            var bankaccount = '';
            var usdtaccount = '';
            var usdttrcaccount = '';
            var bep20account = '';
            var bep2account = '';
            var banknum = 0;
            var fpsnum = 0;
            var usdtnum = 0;
            var usdttrcnum = 0;
            var bep20num = 0;
            var bep2num = 0;

            for (var key in banks)
            {
                var row = banks[key];
                if (row.account != '')
                {
                    bankaccount = row.account;
                    banknum++;
                }
                if (row.FPSAccount != '')
                {
                    fpsaccount = row.FPSAccount;
                    fpsnum++;
                }
                if (row.USDTAccount != '')
                {
                    usdtaccount = row.USDTAccount;
                    usdtnum++;
                }
                if (row.USDTAccountTRC20 != '')
                {
                    usdttrcaccount = row.USDTAccountTRC20;
                    usdttrcnum++;
                }
                // if (row.BEP20Account != '')
                // {
                //     bep20account = row.BEP20Account;
                //     bep20num++;
                // }
                // if (row.BEP2Account != '')
                // {
                //     bep2account = row.BEP2Account;
                //     bep2num++;
                // }
            }

            if (banknum == 0)
            {
                BindBank.$form.find('.bankName, .bankAccount').css('display', 'block');
                BindBank.$form.find('.FPSAccount, .USDTAccount, .USDTTRC20Account, .BEP20Account, .BEP2Account').css('display', 'none');
            }
            else if (fpsnum == 0)
            {
                BindBank.$form.find('.FPSAccount').css('display', 'block');
                BindBank.$form.find('.bankName, .bankAccount, .USDTAccount, .USDTTRC20Account, .BEP20Account, .BEP2Account').css('display', 'none');
            }
            else if (usdtnum == 0)
            {
                BindBank.$form.find('.USDTAccount').css('display', 'block');
                BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTTRC20Account, .BEP20Account, .BEP2Account').css('display', 'none');
            }
            else if (usdttrcnum == 0)
            {
                BindBank.$form.find('.USDTAccount').css('display', 'block');
                BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTAccount, .BEP20Account, .BEP2Account').css('display', 'none');
            }
            // else if (bep20num == 0)
            // {
            //     BindBank.$form.find('.USDTAccount').css('display', 'block');
            //     BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTAccount, .USDTTRC20Account, .BEP2Account').css('display', 'none');
            // }
            // else if (bep2num == 0)
            // {
            //     BindBank.$form.find('.USDTAccount').css('display', 'block');
            //     BindBank.$form.find('.bankName, .bankAccount, .FPSAccount, .USDTAccount, .USDTTRC20Account, .BEP20Account').css('display', 'none');
            // }

            var bankdisplay_title = (banknum == 0) ? 'grid' : 'none';
            var fpsdisplay_title = (fpsnum == 0) ? 'grid' : 'none';
            var usdtdisplay_title = (usdtnum == 0) ? 'grid' : 'none';
            var usdttrcdisplay_title = (usdttrcnum == 0) ? 'grid' : 'none';
            // var bep20display_title = (bep20num == 0) ? 'grid' : 'none';
            // var bep2display_title = (bep2num == 0) ? 'grid' : 'none';
            BindBank.$form.find('.bindbankcard').css('display', bankdisplay_title);
            BindBank.$form.find('.bindfps').css('display', fpsdisplay_title);
            BindBank.$form.find('.bindusdterc20').css('display', usdtdisplay_title);
            BindBank.$form.find('.bindusdttrc20').css('display', usdttrcdisplay_title);
            // BindBank.$form.find('.bindbep20').css('display', bep20display_title);
            // BindBank.$form.find('.bindbep2').css('display', bep2display_title);
        },
        add: function(){
            if (BindBank.ajaxing) {
                return false;
            }

            var $this = $(this);
            if ($this.find('#bankAccount').val() != '' && $this.find('#FPSAccount').val() != '')
            {
                alert(parent.Language.Get('只能填写一种账号'));
                return false;
            }
            
            var success = false;
            var data = {
                cmd: 205,
                sid: localStorage.sid || 0,
                name: $this.find('#bankName').val(),
                account: $this.find('#bankAccount').val(),
                checkaccount: $this.find('#bankAccount2').val(),
                truename: $this.find('#trueName').val(),
                province: $this.find('#Province').val(),
                city: $this.find('#City').val(),
                branch: $this.find('#Branch').val(),
                ALIPAYAccount: $this.find('#ALIPAYAccount').val(),
                FPSAccount: $this.find('#FPSAccount').val(),
                USDTAccount: $this.find('#USDTAccount').val(),
                USDTAccountTRC20: $this.find('#USDTTRC20Account').val(),
                // BEP20Account: $this.find('#BEP20Account').val(),
                // BEP2Account: $this.find('#BEP2Account').val(),
            };
            BindBank.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(8)');
                    //alert('新增银行卡 请求失败 !');
                });
            BindBank.ajaxing = false;
            return success;
        },
        getBankList: function(){
            var list = JSON.parse(localStorage.banks);
            var tag = '';
            for(var key in list)
            {
                var bind = list[key].bind == 1 ? 'checked' : '';
                tag += 
                    "<tr>" +
                        "<td>" + (parseInt(key) + 1) + "</td>" +
                        "<td style='word-break: normal;'>" + list[key].truename + "</td>" +
                        "<td style='word-break: normal;'><div>" + list[key].name + "</div><div>" + list[key].account + "</div></td>" +
                        // "<td>" + list[key].account + "</td>" +
                        // "<td>" + list[key].ALIPAYAccount + "</td>" +
                        "<td>" + list[key].FPSAccount + "</td>" +
                        "<td>" + list[key].USDTAccount + "</td>" +
                        "<td>" + list[key].USDTAccountTRC20 + "</td>" +
                        // "<td>" + list[key].BEP20Account + "</td>" +
                        // "<td>" + list[key].BEP2Account + "</td>" +
                        // "<td style='word-break: normal;'>" + list[key].province + list[key].city + list[key].branch + " " + parent.Language.Get("支行") + "</td>" +
                        // "<td><input type='radio' name='bind' style='display: block; margin: auto;' value='" + list[key].id + "' " + bind + " /></td>" +
                    "</tr>";
            }
            BindBank.$list.html(tag || '<td colspan="7" class="text_193"></td>');
            BindBank.$bind = BindBank.$form.find('input[name=bind]');
            BindBank.$bind.bind('click', BindBank.bind);
        },
        bind: function(){
            var $this = $(this);
            var data = {
                cmd: 206,
                sid: localStorage.sid || 0,
                bankId: $this.val() || 0,
            };
            window.parent.Public.post(data).done(function(response){
                alert(response.msg);
            });
        },
        setTrueName: function(){
            BindBank.$form.find('#trueName').val(localStorage.truename || '');
        },
        setBankOption: function(){
            var tag = 
                '<option value="003 渣打銀行(香港)有限公司">' + '003 ' + parent.Language.Get('渣打银行(香港)有限公司') + '</option>' +
                '<option value="004 香港上海滙豐銀行有限公司">' + '004 ' + parent.Language.Get('香港上海汇丰银行有限公司') + '</option>' +
                '<option value="005 東方匯理銀行">' + '005 ' + parent.Language.Get('东方汇理银行') + '</option>' +
                '<option value="006 花旗銀行">' + '006 ' + parent.Language.Get('花旗银行') + '</option>' +
                '<option value="007 摩根大通銀行">' + '007 ' + parent.Language.Get('摩根大通银行') + '</option>' +
                '<option value="008 國民西敏寺資本市場銀行有限公司">' + '008 ' + parent.Language.Get('国民西敏寺资本市场银行有限公司') + '</option>' +
                '<option value="009 中國建設銀行(亞洲)股份有限公司">' + '009 ' + parent.Language.Get('中国建设银行(亚洲)股份有限公司') + '</option>' +
                '<option value="012 中國銀行(香港)有限公司">' + '012 ' + parent.Language.Get('中国银行(香港)有限公司') + '</option>' +
                '<option value="015 東亞銀行有限公司">' + '015 ' + parent.Language.Get('东亚银行有限公司') + '</option>' +
                '<option value="016 星展銀行(香港)有限公司">' + '016 ' + parent.Language.Get('星展银行(香港)有限公司') + '</option>' +
                '<option value="018 中信銀行(國際)有限公司">' + '018 ' + parent.Language.Get('中信银行(国际)有限公司') + '</option>' +
                '<option value="020 招商永隆銀行有限公司">' + '020 ' + parent.Language.Get('招商永隆银行有限公司') + '</option>' +
                '<option value="022 華僑銀行">' + '022 ' + parent.Language.Get('华侨银行') + '</option>' +
                '<option value="024 恒生銀行有限公司">' + '024 ' + parent.Language.Get('恒生银行有限公司') + '</option>' +
                '<option value="025 上海商業銀行有限公司">' + '025 ' + parent.Language.Get('上海商业银行有限公司') + '</option>' +
                '<option value="027 交通銀行股份有限公司">' + '027 ' + parent.Language.Get('交通银行股份有限公司') + '</option>' +
                '<option value="028 大眾銀行(香港)有限公司">' + '028 ' + parent.Language.Get('大众银行(香港)有限公司') + '</option>' +
                '<option value="035 華僑永亨銀行有限公司">' + '035 ' + parent.Language.Get('华侨永亨银行有限公司') + '</option>' +
                '<option value="038 大有銀行有限公司">' + '038 ' + parent.Language.Get('大有银行有限公司') + '</option>' +
                '<option value="039 集友銀行有限公司">' + '039 ' + parent.Language.Get('集友银行有限公司') + '</option>' +
                '<option value="040 大新銀行有限公司">' + '040 ' + parent.Language.Get('大新银行有限公司') + '</option>' +
                '<option value="041 創興銀行有限公司">' + '041 ' + parent.Language.Get('创兴银行有限公司') + '</option>' +
                '<option value="043 南洋商業銀行有限公司">' + '043 ' + parent.Language.Get('南洋商业银行有限公司') + '</option>' +
                '<option value="045 UCO BANK">' + '045 ' + parent.Language.Get('UCO BANK') + '</option>' +
                '<option value="046 韓亞銀行">' + '046 ' + parent.Language.Get('韩亚银行') + '</option>' +
                '<option value="047 三菱UFJ銀行">' + '047 ' + parent.Language.Get('三菱UFJ银行') + '</option>' +
                '<option value="049 盤谷銀行">' + '049 ' + parent.Language.Get('盘谷银行') + '</option>' +
                '<option value="050 印度海外銀行">' + '050 ' + parent.Language.Get('印度海外银行') + '</option>' +
                '<option value="054 德意志銀行">' + '054 ' + parent.Language.Get('德意志银行') + '</option>' +
                '<option value="055 美國銀行">' + '055 ' + parent.Language.Get('美国银行') + '</option>' +
                '<option value="056 法國巴黎銀行">' + '056 ' + parent.Language.Get('法国巴黎银行') + '</option>' +
                '<option value="058 印度銀行">' + '058 ' + parent.Language.Get('印度银行') + '</option>' +
                '<option value="060 巴基斯坦國民銀行">' + '060 ' + parent.Language.Get('巴基斯坦国民银行') + '</option>' +
                '<option value="061 大生銀行有限公司">' + '061 ' + parent.Language.Get('大生银行有限公司') + '</option>' +
                '<option value="063 馬來亞銀行">' + '063 ' + parent.Language.Get('马来亚银行') + '</option>' +
                '<option value="065 三井住友銀行">' + '065 ' + parent.Language.Get('三井住友银行') + '</option>' +
                '<option value="066 印尼國家銀行">' + '066 ' + parent.Language.Get('印尼国家银行') + '</option>' +
                '<option value="067 金融銀行有限公司">' + '067 ' + parent.Language.Get('金融银行有限公司') + '</option>' +
                '<option value="071 大華銀行有限公司">' + '071 ' + parent.Language.Get('大华银行有限公司') + '</option>' +
                '<option value="072 中國工商銀行（亞洲）有限公司">' + '072 ' + parent.Language.Get('中国工商银行（亚洲）有限公司') + '</option>' +
                '<option value="074 巴克萊銀行">' + '074 ' + parent.Language.Get('巴克莱银行') + '</option>' +
                '<option value="076 加拿大豐業銀行">' + '076 ' + parent.Language.Get('加拿大丰业银行') + '</option>' +
                '<option value="080 加拿大皇家銀行">' + '080 ' + parent.Language.Get('加拿大皇家银行') + '</option>' +
                '<option value="081 法國興業銀行">' + '081 ' + parent.Language.Get('法国兴业银行') + '</option>' +
                '<option value="082 印度國家銀行">' + '082 ' + parent.Language.Get('印度国家银行') + '</option>' +
                '<option value="085 多倫多道明銀行">' + '085 ' + parent.Language.Get('多伦多道明银行') + '</option>' +
                '<option value="086 滿地可銀行">' + '086 ' + parent.Language.Get('满地可银行') + '</option>' +
                '<option value="092 加拿大帝國商業銀行">' + '092 ' + parent.Language.Get('加拿大帝国商业银行') + '</option>' +
                '<option value="097 德國商業銀行">' + '097 ' + parent.Language.Get('德国商业银行') + '</option>' +
                '<option value="103 瑞士銀行">' + '103 ' + parent.Language.Get('瑞士银行') + '</option>' +
                '<option value="106 美國滙豐銀行">' + '106 ' + parent.Language.Get('美国汇丰银行') + '</option>' +
                '<option value="109 瑞穗銀行">' + '109 ' + parent.Language.Get('瑞穗银行') + '</option>' +
                '<option value="113 德國中央合作銀行">' + '113 ' + parent.Language.Get('德国中央合作银行') + '</option>' +
                '<option value="118 友利銀行">' + '118 ' + parent.Language.Get('友利银行') + '</option>' +
                '<option value="119 菲律賓國家銀行">' + '119 ' + parent.Language.Get('菲律宾国家银行') + '</option>' +
                '<option value="128 富邦銀行(香港)有限公司">' + '128 ' + parent.Language.Get('富邦银行(香港)有限公司') + '</option>' +
                '<option value="138 三菱UFJ信託銀行">' + '138 ' + parent.Language.Get('三菱UFJ信托银行') + '</option>' +
                '<option value="139 紐約梅隆銀行有限公司">' + '139 ' + parent.Language.Get('纽约梅隆银行有限公司') + '</option>' +
                '<option value="145 ING BANK N.V.">' + '145 ' + parent.Language.Get('ING BANK N.V.') + '</option>' +
                '<option value="147 西班牙對外銀行">' + '147 ' + parent.Language.Get('西班牙对外银行') + '</option>' +
                '<option value="150 澳大利亞國民銀行">' + '150 ' + parent.Language.Get('澳大利亚国民银行') + '</option>' +
                '<option value="151 西太平洋銀行">' + '151 ' + parent.Language.Get('西太平洋银行') + '</option>' +
                '<option value="152 澳新銀行集團有限公司">' + '152 ' + parent.Language.Get('澳新银行集团有限公司') + '</option>' +
                '<option value="153 澳洲聯邦銀行">' + '153 ' + parent.Language.Get('澳洲联邦银行') + '</option>' +
                '<option value="161 義大利聯合聖保羅銀行股份有限公司">' + '161 ' + parent.Language.Get('义大利联合圣保罗银行股份有限公司') + '</option>' +
                '<option value="164 裕信(德國)銀行股份有限公司">' + '164 ' + parent.Language.Get('裕信(德国)银行股份有限公司') + '</option>' +
                '<option value="165 瑞典商業銀行">' + '165 ' + parent.Language.Get('瑞典商业银行') + '</option>' +
                '<option value="170 千葉銀行">' + '170 ' + parent.Language.Get('千叶银行') + '</option>' +
                '<option value="178 比利時聯合銀行">' + '178 ' + parent.Language.Get('比利时联合银行') + '</option>' +
                '<option value="180 富國銀行香港分行">' + '180 ' + parent.Language.Get('富国银行香港分行') + '</option>' +
                '<option value="183 荷蘭合作銀行">' + '183 ' + parent.Language.Get('荷兰合作银行') + '</option>' +
                '<option value="185 星展銀行(香港)有限公司">' + '185 ' + parent.Language.Get('星展银行(香港)有限公司') + '</option>' +
                '<option value="186 靜岡銀行">' + '186 ' + parent.Language.Get('静冈银行') + '</option>' +
                '<option value="188 八十二銀行">' + '188 ' + parent.Language.Get('八十二银行') + '</option>' +
                '<option value="198 華南商業銀行股份有限公司">' + '198 ' + parent.Language.Get('华南商业银行股份有限公司') + '</option>' +
                '<option value="199 滋賀銀行">' + '199 ' + parent.Language.Get('滋贺银行') + '</option>' +
                '<option value="201 臺灣銀行股份有限公司">' + '201 ' + parent.Language.Get('台湾银行股份有限公司') + '</option>' +
                '<option value="203 第一商業銀行股份有限公司">' + '203 ' + parent.Language.Get('第一商业银行股份有限公司') + '</option>' +
                '<option value="206 彰化商業銀行股份有限公司">' + '206 ' + parent.Language.Get('彰化商业银行股份有限公司') + '</option>' +
                '<option value="210 法國外貿銀行">' + '210 ' + parent.Language.Get('法国外贸银行') + '</option>' +
                '<option value="214 中國工商銀行股份有限公司">' + '214 ' + parent.Language.Get('中国工商银行股份有限公司') + '</option>' +
                '<option value="220 美國道富銀行">' + '220 ' + parent.Language.Get('美国道富银行') + '</option>' +
                '<option value="221 中國建設銀行股份有限公司">' + '221 ' + parent.Language.Get('中国建设银行股份有限公司') + '</option>' +
                '<option value="222 中國農業銀行股份有限公司">' + '222 ' + parent.Language.Get('中国农业银行股份有限公司') + '</option>' +
                '<option value="227 第一儲蓄銀行">' + '227 ' + parent.Language.Get('第一储蓄银行') + '</option>' +
                '<option value="229 中國信託商業銀行股份有限公司">' + '229 ' + parent.Language.Get('中国信托商业银行股份有限公司') + '</option>' +
                '<option value="230 臺灣中小企業銀行股份有限公司">' + '230 ' + parent.Language.Get('台湾中小企业银行股份有限公司') + '</option>' +
                '<option value="233 CREDIT SUISSE AG">' + '233 ' + parent.Language.Get('CREDIT SUISSE AG') + '</option>' +
                '<option value="236 國泰世華商業銀行股份有限公司">' + '236 ' + parent.Language.Get('国泰世华商业银行股份有限公司') + '</option>' +
                '<option value="237 瑞士盈豐銀行股份有限公司">' + '237 ' + parent.Language.Get('瑞士盈丰银行股份有限公司') + '</option>' +
                '<option value="238 招商銀行股份有限公司">' + '238 ' + parent.Language.Get('招商银行股份有限公司') + '</option>' +
                '<option value="239 台北富邦商業銀行股份有限公司">' + '239 ' + parent.Language.Get('台北富邦商业银行股份有限公司') + '</option>' +
                '<option value="241 永豐商業銀行股份有限公司">' + '241 ' + parent.Language.Get('永丰商业银行股份有限公司') + '</option>' +
                '<option value="242 兆豐國際商業銀行">' + '242 ' + parent.Language.Get('兆丰国际商业银行') + '</option>' +
                '<option value="243 玉山商業銀行股份有限公司">' + '243 ' + parent.Language.Get('玉山商业银行股份有限公司') + '</option>' +
                '<option value="245 台新國際商業銀行股份有限公司">' + '245 ' + parent.Language.Get('台新国际商业银行股份有限公司') + '</option>' +
                '<option value="248 豐隆銀行有限公司">' + '248 ' + parent.Language.Get('丰隆银行有限公司') + '</option>' +
                '<option value="249 渣打銀行">' + '249 ' + parent.Language.Get('渣打银行') + '</option>' +
                '<option value="250 花旗銀行(香港)有限公司">' + '250 ' + parent.Language.Get('花旗银行(香港)有限公司') + '</option>' +
                '<option value="251 印度工業信貸投資銀行">' + '251 ' + parent.Language.Get('印度工业信贷投资银行') + '</option>' +
                '<option value="254 MELLI BANK PLC">' + '254 ' + parent.Language.Get('MELLI BANK PLC') + '</option>' +
                '<option value="258 華美銀行">' + '258 ' + parent.Language.Get('华美银行') + '</option>' +
                '<option value="259 巴魯達銀行">' + '259 ' + parent.Language.Get('巴鲁达银行') + '</option>' +
                '<option value="260 遠東國際商業銀行股份有限公司">' + '260 ' + parent.Language.Get('远东国际商业银行股份有限公司') + '</option>' +
                '<option value="262 CANARA BANK">' + '262 ' + parent.Language.Get('CANARA BANK') + '</option>' +
                '<option value="263 國泰銀行">' + '263 ' + parent.Language.Get('国泰银行') + '</option>' +
                '<option value="264 台灣土地銀行股份有限公司">' + '264 ' + parent.Language.Get('台湾土地银行股份有限公司') + '</option>' +
                '<option value="265 合作金庫商業銀行股份有限公司">' + '265 ' + parent.Language.Get('合作金库商业银行股份有限公司') + '</option>' +
                '<option value="266 PUNJAB NATIONAL BANK">' + '266 ' + parent.Language.Get('PUNJAB NATIONAL BANK') + '</option>' +
                '<option value="267 西班牙桑坦德銀行有限公司">' + '267 ' + parent.Language.Get('西班牙桑坦德银行有限公司') + '</option>' +
                '<option value="268 印度聯合銀行">' + '268 ' + parent.Language.Get('印度联合银行') + '</option>' +
                '<option value="269 上海商業儲蓄銀行股份有限公司">' + '269 ' + parent.Language.Get('上海商业储蓄银行股份有限公司') + '</option>' +
                '<option value="271 INDUSTRIAL BANK OF KOREA">' + '271 ' + parent.Language.Get('INDUSTRIAL BANK OF KOREA') + '</option>' +
                '<option value="272 新加坡銀行有限公司">' + '272 ' + parent.Language.Get('新加坡银行有限公司') + '</option>' +
                '<option value="273 新韓銀行">' + '273 ' + parent.Language.Get('新韩银行') + '</option>' +
                '<option value="274 王道商業銀行股份有限公司">' + '274 ' + parent.Language.Get('王道商业银行股份有限公司') + '</option>' +
                '<option value="275 BNP PARIBAS SECURITIES SERVICES">' + '275 ' + parent.Language.Get('BNP PARIBAS SECURITIES SERVICES') + '</option>' +
                '<option value="276 國家開發銀行">' + '276 ' + parent.Language.Get('国家开发银行') + '</option>' +
                '<option value="277 FIRST ABU DHABI BANK PJSC">' + '277 ' + parent.Language.Get('FIRST ABU DHABI BANK PJSC') + '</option>' +
                '<option value="278 BANK J. SAFRA SARASIN LTD.">' + '278 ' + parent.Language.Get('BANK J. SAFRA SARASIN LTD.') + '</option>' +
                '<option value="307 ABN AMRO BANK N.V.">' + '307 ' + parent.Language.Get('ABN AMRO BANK N.V.') + '</option>' +
                '<option value="308 HDFC BANK LIMITED">' + '308 ' + parent.Language.Get('HDFC BANK LIMITED') + '</option>' +
                '<option value="309 UNION BANCAIRE PRIVEE, UBP SA">' + '309 ' + parent.Language.Get('UNION BANCAIRE PRIVEE, UBP SA') + '</option>' +
                '<option value="316 SKANDINAVISKA ENSKILDA BANKEN AB">' + '316 ' + parent.Language.Get('SKANDINAVISKA ENSKILDA BANKEN AB') + '</option>' +
                '<option value="320 寶盛銀行">' + '320 ' + parent.Language.Get('宝盛银行') + '</option>' +
                '<option value="324 CREDIT INDUSTRIEL ET COMMERCIAL">' + '324 ' + parent.Language.Get('CREDIT INDUSTRIEL ET COMMERCIAL') + '</option>' +
                '<option value="337 臺灣新光商業銀行股份有限公司">' + '337 ' + parent.Language.Get('台湾新光商业银行股份有限公司') + '</option>' +
                '<option value="338 中國銀行香港分行">' + '338 ' + parent.Language.Get('中国银行香港分行') + '</option>' +
                '<option value="339 CA INDOSUEZ (SWITZERLAND) SA">' + '339 ' + parent.Language.Get('CA INDOSUEZ (SWITZERLAND) SA') + '</option>' +
                '<option value="341 ICBC STANDARD BANK PLC">' + '341 ' + parent.Language.Get('ICBC STANDARD BANK PLC') + '</option>' +
                '<option value="342 LGT皇家銀行(香港)">' + '342 ' + parent.Language.Get('LGT皇家银行(香港)') + '</option>' +
                '<option value="344 麥格理銀行有限公司">' + '344 ' + parent.Language.Get('麦格理银行有限公司') + '</option>' +
                '<option value="345 上海浦東發展銀行股份有限公司">' + '345 ' + parent.Language.Get('上海浦东发展银行股份有限公司') + '</option>' +
                '<option value="353 中國民生銀行股份有限公司">' + '353 ' + parent.Language.Get('中国民生银行股份有限公司') + '</option>' +
                '<option value="357 PICTET AND CIE (EUROPE) S.A.">' + '357 ' + parent.Language.Get('PICTET AND CIE (EUROPE) S.A.') + '</option>' +
                '<option value="359 廣發銀行股份有限公司">' + '359 ' + parent.Language.Get('广发银行股份有限公司') + '</option>' +
                '<option value="361 渤海銀行股份有限公司">' + '361 ' + parent.Language.Get('渤海银行股份有限公司') + '</option>' +
                '<option value="368 中國光大銀行股份有限公司">' + '368 ' + parent.Language.Get('中国光大银行股份有限公司') + '</option>' +
                '<option value="371 三井住友信託銀行">' + '371 ' + parent.Language.Get('三井住友信托银行') + '</option>' +
                '<option value="372 上海銀行(香港)有限公司">' + '372 ' + parent.Language.Get('上海银行(香港)有限公司') + '</option>' +
                '<option value="374 CIMB BANK BERHAD">' + '374 ' + parent.Language.Get('CIMB BANK BERHAD') + '</option>' +
                '<option value="377 興業銀行股份有限公司">' + '377 ' + parent.Language.Get('兴业银行股份有限公司') + '</option>' +
                '<option value="378 元大商業銀行股份有限公司">' + '378 ' + parent.Language.Get('元大商业银行股份有限公司') + '</option>' +
                '<option value="379 MASHREQ BANK-PUBLIC SHAREHOLDING COMPANY">' + '379 ' + parent.Language.Get('MASHREQ BANK-PUBLIC SHAREHOLDING COMPANY') + '</option>' +
                '<option value="381 KOOKMIN BANK">' + '381 ' + parent.Language.Get('KOOKMIN BANK') + '</option>' +
                '<option value="382 交通銀行(香港)有限公司">' + '382 ' + parent.Language.Get('交通银行(香港)有限公司') + '</option>' +
                '<option value="383 浙商銀行股份有限公司">' + '383 ' + parent.Language.Get('浙商银行股份有限公司') + '</option>' +
                '<option value="384 摩根士丹利銀行亞洲有限公司">' + '384 ' + parent.Language.Get('摩根士丹利银行亚洲有限公司') + '</option>' +
                '<option value="385 平安銀行股份有限公司">' + '385 ' + parent.Language.Get('平安银行股份有限公司') + '</option>' +
                '<option value="386 華夏銀行股份有限公司">' + '386 ' + parent.Language.Get('华夏银行股份有限公司') + '</option>' +
                '<option value="387 眾安銀行">' + '387 ' + parent.Language.Get('众安银行') + '</option>' +
                '<option value="388 LIVI VB LIMITED">' + '388 ' + parent.Language.Get('LIVI VB LIMITED') + '</option>' +
                '<option value="389 MOX BANK">' + '389 ' + parent.Language.Get('MOX BANK') + '</option>' +
                '<option value="390 匯立銀行">' + '390 ' + parent.Language.Get('汇立银行') + '</option>' +
                '<option value="391 富融銀行">' + '391 ' + parent.Language.Get('富融银行') + '</option>' +
                '<option value="392 平安壹賬通銀行(香港)有限公司">' + '392 ' + parent.Language.Get('平安壹账通银行(香港)有限公司') + '</option>' +
                '<option value="393 螞蟻銀行">' + '393 ' + parent.Language.Get('蚂蚁银行') + '</option>' +
                '<option value="394 QATAR NATIONAL BANK (Q.P.S.C.)">' + '394 ' + parent.Language.Get('QATAR NATIONAL BANK (Q.P.S.C.)') + '</option>' +
                '<option value="395 天星銀行">' + '395 ' + parent.Language.Get('天星银行') + '</option>' +
                '<option value="802 HONG KONG SECURITIES CLEARING COMPANY LIMITED">' + '802 ' + parent.Language.Get('HONG KONG SECURITIES CLEARING COMPANY LIMITED') + '</option>' +
                '<option value="868 CLS BANK INTERNATIONAL">' + '868 ' + parent.Language.Get('CLS BANK INTERNATIONAL') + '</option>';
            BindBank.$form.find('#bankName').html(tag);
        },
        setInfo: function(){
            $('#infoName').html(defaultBank['name'] || ' - ');
            $('#infoTrueName').html(defaultBank['truename'] || ' - ');
            $('#infoCity').html(defaultBank['province'] + defaultBank['city'] + defaultBank['branch'] || ' - ');
            $('#infoAccount').html(defaultBank['account'] || ' - ');
        },
        reWrite: function(){
            $('#bankName').val('');
            $('#trueName').val('');
            $('#Province').val('');
            $('#City').val('');
            $('#Branch').val('');
            $('#bankAccount').val('');
            $('#bankAccount2').val('');
            return;
        }
    };
    app.initial();
})();
    