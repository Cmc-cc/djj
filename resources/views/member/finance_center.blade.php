    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/new0404/js/jquery.min.js"></script>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
    <link rel="stylesheet" href="/new0404/pc/css/loadingTrack.css">
    <link rel="stylesheet" href="/new0404/pc/css/loading.css">
    <link rel="stylesheet" href="/new0404/pc/css/main-1440.css" media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/js/jquery.marquee.min.js"></script>
    <script src="/new0404/js/jquery.knob.js"></script>
    <script src="/new0404/js/modernizr.custom.js"></script>
    <script src="/new0404/js/ImgPreload.js"></script>
    <script src="/new0404/js/banner.js"></script>
    <script src="/new0404/js/script.js"></script>
    <style>
        .b_rig {
            color: #000000;
            background-color: #FFF;
            text-align: right;
            border: 1px solid;
        }

        .b_rig_2 {
            background-color: #FFF;
            text-align: right;
            color: black;
            display: none;
        }

        .top {

            color: #000;
            font-size: 16px;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-box">
    @include('member.layouts.pc_header')
    <!-- main -->
        <div class="pages-con p-c1">
            <div class="main-bg">
                <h2 class="title-s1 text_165"><span>FINANCIAL CENTER</span></h2>
                <div class="line1"></div>
                <div class="memcenter clear">
                    <div class="memMenu">
                        <ul class="commonlist">
                            <li class="select"><a href="/member/bank" class="text_166"
                                                  oncontextmenu="return false;"></a></li>
                            <li><a href="/member/promotion_apply" class="text_167" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="/member/acc-transfer" class="text_122" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report" class="text_168" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="/member/customer_report?type=3" class="text_169"
                                   oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist" id="fianca_ul">
                                <li class="select"><a href="/member/finance_center" class="text_170"
                                                      oncontextmenu="return false;"></a></li>
                                <li class="withdrawal"><a href="/member/update_bank_info" class="text_121"
                                                          oncontextmenu="return false;"></a></li>
                                <!-- <li class="bankinfo"><a href="../mem/bankinfo.html" class="text_171"></a></li> -->
                                <li class="modifybankinfo"><a href="/member/bank" class="text_172"
                                                              oncontextmenu="return false;"></a></li>
                            </ul>
                        </div>
                        <form>
                            <div class="memCon clearfix">
                                <div class="txt">
                                    <h3 style="color: #e3c7af">轉數快 支付連結說明</h3>
                                    <p></p>
                                    <a id="FPS_btn" class="btn typebtn" type="FPS"
                                       style="margin-top: 5px;margin-bottom: 15px; width: 170px; height: 30px; line-height: 30px;">轉數快</a>
                                    <h3 style="color: #e3c7af">便利商店增值</h3>
                                    <p></p>
                                    <a id="BankTransfer_btn" class="btn typebtn" type="BankTransfer"
                                       style="margin-top: 5px;margin-bottom: 15px; width: 170px; height: 30px; line-height: 30px;">便利商店增值</a>
                                    <h3 style="color: #e3c7af">USDT 支付連結說明</h3>
                                    <p></p>
                                    <a id="USDT_btn" class="btn typebtn" type="USDT"
                                       style="margin-top: 5px;margin-bottom: 15px; width: 170px; height: 30px; line-height: 30px;">USDT</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="acc-window acc-trans2-1" style="top:40%;left:52%;display: none;">
            <a class="close" oncontextmenu="return false;"></a>
            <div class="acc-w-title">轉數快</div>
            <table style="width: 100%;" border="0" cellspacing="1" cellpadding="0">
                <tbody>
                <tr>
                    <td class="top">
                        <h1>轉數快</h1>
                    </td>
                </tr>
                <tr class="b_rig recharge-data recharge-data-platform amount">
                    <td width="20%">
                        <div align="right" class="text_134">：</div>
                    </td>
                    <td width="80%">
                        <div align="left">
                            <select name="platform" class="platform" style="width: 180px">
                                <option autostatus="1" value="82" code="POPPAY" typecode="FPS">轉數快通道</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data recharge-data-bankcode" style="display: none;">
                    <td width="20%">
                        <div align="right" class="text_136">：</div>
                    </td>
                    <td width="80%">
                        <div align="left">
                            <select name="bankcode" style="width: 180px">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data merchanttype" style="display: none;">
                    <td width="20%">
                        <div align="right" class="text_779">：</div>
                    </td>
                    <td width="80%">
                        <div align="left">
                            <select name="merchanttype" class="merchanttype" style="width: 180px; display: none;">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data recharge-data-cointype" style="display: none;">
                    <td width="20%">
                        <div align="right" class="text_755">：</div>
                    </td>
                    <td width="80%">
                        <div align="left">
                            <select name="cointype" class="cointype" style="width: 180px; display: none;">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data cointypetext" style="display: none;">
                    <td width="20%">
                        <div align="right" class="text_755">：</div>
                    </td>
                    <td width="80%">
                        <div align="left">
                            <span name="cointypetext" id="cointypetext" style="width: 180px"></span>
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data amount">
                    <td width="20%">
                        <div align="right" class="">HDK<span class="text_229">：</span></div>
                    </td>
                    <td width="80%" style="display: flex;">
                        <div align="left" style="float: left;position: relative;">
                            <input type="hidden" id="xiaoshu" value="0">
                            <input name="money" id="PayMoney" style="width: 180px"
                                   onkeyup="this.value=this.value.replace(/\D/g,'')"
                                   onafterpaste="this.value=this.value.replace(/\D/g,'')">
                            <span class="point" style="color: red; font-size: 14px;"></span>
                            <div class="decimal"></div>
                            <input name="decimal" hidden="">
                        </div>
                        <span class="style1" style="padding-left: 8px;">金額：100.00~100000.00(元)</span>
                    </td>
                </tr>
                <!--<tr class="b_rig recharge-data Ratiotruemoney" style="display: none;">-->
                <!--    <td width="20%">-->
                <!--        <div align="right" class="text_1028">：</div>-->
                <!--    </td>-->
                <!--    <td width="80%" style="display: flex;">-->
                <!--        <div align="left" style="float: left;position: relative;">-->
                <!--            <input name="Ratiotruemoney" id="Ratiotruemoney" style="width: 180px">-->
                <!--        </div>-->
                <!--    </td>-->
                <!--</tr>-->
                <tr class="b_rig recharge-data truename" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_577">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="truename" id="truename" style="width: 180px">
                        </div>
                        <div align="left" class="truename_note" style="display: none;">Họ tên thật không dấu</div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data bank_account_name" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_140">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="bank_account_name" id="bank_account_name" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data bank_account" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_139">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="bank_account" id="bank_account" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data bankname" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_173">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="bankname" id="bankname" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data mobile" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_142">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="mobile" id="mobile" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data email" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_778">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="email" id="email" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data idcard" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_143">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="idcard" id="idcard" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data CSC" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_791">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="CSC" id="CSC" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data expDate" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_792">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="expDate" id="expDate" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data IFSC" style="display:none;">
                    <td width="20%">
                        <div align="right">IFSC：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="IFSC" id="IFSC" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data USDTAddress" style="display:none;">
                    <td width="20%">
                        <div align="right" class="text_1029">：</div>
                    </td>
                    <td width="80%">
                        <div align="left" style="float: left;position: relative;">
                            <input name="USDTAddress" id="USDTAddress" style="width: 180px">
                        </div>
                    </td>
                </tr>
                <tr class="b_rig recharge-data deviceType" style="display: none;">
                    <td width="20%">
                        <div align="right" class="text_147">：</div>
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="devicetype" value="ios" checked="checked"
                               style="float: left;margin-left: 30px;">
                        <label class="form-check-label text_148" for="inlineRadio1" style="float: left;"></label>
                        <input class="form-check-input" type="radio" name="devicetype" value="android">
                        <label class="form-check-label text_149" for="inlineRadio1" style="margin-right: 80px;"></label>
                    </td>
                </tr>

                <tr class="b_rig payData" style="">
                <tr class="b_rig_2">
                    <td width="20%">
                        <div align="right">訂單編號：</div>
                    </td>
                    <td width="80%">
                        <div align="left" class="Payorderno" style="width: 180px;float: left;position: relative;">

                        </div>
                    </td>
                </tr>
                <tr class="b_rig_2">
                    <td width="20%">
                        <div align="right">支付平台：</div>
                    </td>
                    <td width="80%">
                        <div align="left" class="Payplatformtext" style="width: 180px;float: left;position: relative;">
                            POPPAY
                        </div>
                    </td>
                </tr>
                <tr class="b_rig_2">
                    <td width="20%">
                        <div align="right">充值金額：</div>
                    </td>
                    <td width="80%">
                        <div align="left" class="PayMoneytext" style="width: 180px;float: left;position: relative;">

                        </div>
                    </td>
                </tr>
                <tr class="b_rig_2 accountnameText">
                    <td width="20%">
                        <div align="right">用戶姓名：</div>
                    </td>
                    <td width="80%">
                        <div align="left" class="Payaccountname"
                             style="width: 180px;float: left;position: relative;">{{ $_system_config->qq_nickname }}</div>
                    </td>
                </tr>
                <tr class="b_rig_2">
                    <td width="20%">
                        <div align="right">帳號：</div>
                    </td>
                    <td width="80%">
                        <div align="left" id="95404128" class="Payaccount"
                             style="width: 130px;float: left;position: relative; line-height: 25px;">{{ $_system_config->qq_account }}
                        </div>
                        <div id="PayaccountCopy" class="clipboard copytext btn btn-xs"
                             data-clipboard-text="{{ $_system_config->qq_account }}"
                             style="background: linear-gradient(to right, #fde687, #d8870f); color: #fff; border: 0; box-shadow: none; cursor: pointer; border-radius: 3px; font-size: 13px; letter-spacing: 2px; float: left; width: 80px;">
                            複製
                        </div>
                        <div class="payNotify" order="lin202204264395036" platform="code"
                             style="width: 25%; background: linear-gradient(to right, #62eac6, #059c74); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 5px 10px; border-radius: 3px; font-size: 13px; letter-spacing: 2px; text-align: center; float: left; margin-left: 5px;">
                            確認支付
                        </div>
                    </td>
                </tr>
                <tr class="banknameText" style="display: none;">
                    <td width="20%">
                        <div align="right">銀行名稱：</div>
                    </td>
                    <td width="80%">
                        <div align="left" class="Paybankname"
                             style="width: 180px;float: left;position: relative;"></div>
                    </td>
                </tr>
                </tr>
                <tr class="b_rig ratio" style="display: none;"></tr>
                <tr class="b_rig hnote">
                    <td colspan="2" style="text-align: left;" class="text_66">:<br>1.首充即送20%，充$1000送$200，充$10000送$2000；系統根據最新一筆充值金額審核優惠申請。

                        2.請準確轉帳小數後2位,以免造成延誤或損失

                        3.收款帳號隨時更換,請按顯示之收款帳號進行支付,如與系統收款帳號不符,所有損失本公司一概不承擔。

                        4.如閣下使用支付寶進行轉數快轉帳,請緊記需要選擇[轉數快]通道,如使用[P2P]或其他方式,本公司一概不會接受。

                        5.一般充值在沒有領取優惠下,只需一倍有效投注金額便可申請提款。
                    </td>
                </tr>
                <tr class="b_rig recharge-data amount">
                    <td colspan="2">
                        <div align="center">
                            <a id="submit" type="submit" class="btn repairSubBtn" style="width: 140px;"
                               value="立即充值">立即充值</a>
                            <input id="reset" type="reset" class="btn repairBtn" style="width: 140px;" value="重新填寫">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="confirm-box clearfix" style="position: absolute; width: 100%; bottom: 0px;">
                <a class="confirm text_7" oncontextmenu="return false;"></a>
            </div>
        </div>
        <div class="acc-window acc-trans2-1" style="top:40%;left:52%;display: none;">
            <a class="close" oncontextmenu="return false;"></a>
            <div class="acc-w-title">便利商店增值</div>
            <table style="margin:0px 10px; width: 660px;" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td class="top">
                        <h1>便利商店增值</h1>
                    </td>
                </tr>
                <tr class="Tutorial" style="margin: 0px 0px 10px; text-align: center; display: none;">
                    <td>
                        <a type="USDTTutorial_mp4" class="USDTTutorial1 Functionbtn USDTTutorial_movie text_1026"
                           oncontextmenu="return false;"></a>
                        <a type="USDTTutorial_pdf" class="USDTTutorial1 Functionbtn USDTTutorial_file text_1027"
                           oncontextmenu="return false;"></a>
                    </td>
                </tr>
                <tr>
                    <td class="mem">
                        <form id="Depositeform">
                            <input type="hidden" name="type" value="BankTransfer">
                            <input type="hidden" name="lang" value="tw">
                            <table style="width: 100%;" border="0" cellspacing="1" cellpadding="0">
                                <tbody>
                                <tr class="b_rig recharge-data recharge-data-platform amount">
                                    <td width="20%">
                                        <div align="right" class="text_134">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="platform" class="platform" style="width: 180px">
                                                <option autostatus="1" value="83" code="POPPAY" typecode="BankTransfer">
                                                    便利商店增值
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data recharge-data-bankcode" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_136">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="bankcode" style="width: 180px">
                                                <option value="">请选择</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data merchanttype" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_779">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="merchanttype" class="merchanttype"
                                                    style="width: 180px; display: none;">
                                                <option value="">请选择</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data recharge-data-cointype" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_755">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="cointype" class="cointype"
                                                    style="width: 180px; display: none;">
                                                <option value="">请选择</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data cointypetext" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_755">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <span name="cointypetext" id="cointypetext" style="width: 180px"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data amount">
                                    <td width="20%">
                                        <div align="right" class="">HDK<span class="text_229">：</span></div>
                                    </td>
                                    <td width="80%" style="display: flex;">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="money" id="PayMoney2" style="width: 180px"
                                                   onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                   onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                            <span class="point" style="color: red; font-size: 14px;"></span>
                                            <div class="decimal"></div>
                                            <input name="decimal" hidden="">
                                        </div>
                                        <span class="style1" style="padding-left: 8px;">金額：100.00~100000.00(元)</span>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data Ratiotruemoney" style="">
                                    <td width="20%">
                                        <div align="right" class=""> 收款二維碼：</div>
                                    </td>
                                    <td width="80%" style="display: flex;">
                                        <div align="left" style="float: left;position: relative;">
                                           <img src="{{ $setting->bld_pic }}"  style="width:200px;height:200px;margin:0 auto;"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data truename" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_577">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="truename" id="truename" style="width: 180px">
                                        </div>
                                        <div align="left" class="truename_note" style="display: none;">Họ tên thật không
                                            dấu
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data bank_account_name" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_140">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="bank_account_name" id="bank_account_name" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data bank_account" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_139">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="bank_account" id="bank_account" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data bankname" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_173">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="bankname" id="bankname" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data mobile" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_142">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="mobile" id="mobile" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data email" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_778">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="email" id="email" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data idcard" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_143">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="idcard" id="idcard" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data CSC" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_791">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="CSC" id="CSC" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data expDate" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_792">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="expDate" id="expDate" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data IFSC" style="display:none;">
                                    <td width="20%">
                                        <div align="right">IFSC：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="IFSC" id="IFSC" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data USDTAddress" style="display:none;">
                                    <td width="20%">
                                        <div align="right" class="text_1029">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="USDTAddress" id="USDTAddress" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data deviceType" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_147">：</div>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="devicetype" value="ios"
                                               checked="checked" style="float: left;margin-left: 30px;">
                                        <label class="form-check-label text_148" for="inlineRadio1"
                                               style="float: left;"></label>
                                        <input class="form-check-input" type="radio" name="devicetype" value="android">
                                        <label class="form-check-label text_149" for="inlineRadio1"
                                               style="margin-right: 80px;"></label>
                                    </td>
                                </tr>
                                <tr class="b_rig payData" style="">
                                <tr  class="b_rig_2">
                                    <td width="20%">
                                        <div align="right">訂單編號：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" class="Payorderno2"
                                             style="width: 180px;float: left;position: relative;">
                                        </div>
                                    </td>
                                </tr>
                                <tr  class="b_rig_2">
                                    <td width="20%">
                                        <div align="right">支付平台：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" class="Payplatformtext2"
                                             style="width: 180px;float: left;position: relative;">POPPAY
                                        </div>
                                    </td>
                                </tr>
                                <tr  class="b_rig_2">
                                    <td width="20%">
                                        <div align="right">充值金額：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" class="PayMoneytext2"
                                             style="width: 180px;float: left;position: relative;">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="accountnameText b_rig_2">
                                    <td width="20%">
                                        <div align="right">用戶姓名：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" class="Payaccountname"
                                             style="width: 180px;float: left;position: relative;">{{ $_system_config->qq_nickname }}
                                        </div>
                                    </td>
                                </tr>
                                <tr  class="b_rig_2">
                                    <td width="20%">
                                        <div align="right">銀行帳號：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" id="31385262201" class="Payaccount"
                                             style="width: 130px;float: left;position: relative; line-height: 25px;">
                                            {{ $_system_config->qq_account }}
                                        </div>
                                        <div id="PayaccountCopy" class="clipboard copytext btn btn-xs"
                                             data-clipboard-text="{{ $_system_config->qq_account }}"
                                             style="background: linear-gradient(to right, #fde687, #d8870f); color: #fff; border: 0; box-shadow: none; cursor: pointer; border-radius: 3px; font-size: 13px; letter-spacing: 2px; float: left; width: 80px;">
                                            複製
                                        </div>
                                        <div class="payNotify" order="lin202204263817829" platform="code"
                                             style="width: 25%; background: linear-gradient(to right, #62eac6, #059c74); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 5px 10px; border-radius: 3px; font-size: 13px; letter-spacing: 2px; text-align: center; float: left; margin-left: 5px;">
                                            確認支付
                                        </div>
                                    </td>
                                </tr>
                                <tr class="banknameText b_rig_2">
                                    <td width="20%">
                                        <div align="right">銀行名稱：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" class="Paybankname"
                                             style="width: 180px;float: left;position: relative;">003渣打銀行
                                        </div>
                                    </td>
                                </tr>
                                </tr>
                                <tr class="b_rig ratio" style="display: none;"></tr>
                                <tr class="b_rig hnote">
                                    <td colspan="2" style="text-align: left;" class="text_66">:<br>1.首充即送20%，充$1000送$200，充$10000送$2000；系統根據最新一筆充值金額審核優惠申請。

                                        2.如使用入鈔機進行支付,請在到達銀行時才打開支付頁面,以免超時支付而取消訂單,謝謝。

                                        3.收款帳號隨時更換,請按顯示之收款帳號進行支付,如與系統收款帳號不符,所有損失本公司一概不承擔。

                                        4.一般充值在沒有領取優惠下,只需一倍有效投注金額便可申請提款。
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data amount">
                                    <td colspan="2">
                                        <div align="center">
                                            <a id="submit" type="submit" class="btn repairSubBtn2"
                                               style="width: 140px;" value="立即充值">立即充值</a>
                                            <input id="reset" type="reset" class="btn repairBtn" style="width: 140px;"
                                                   value="重新填寫">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td id="foot">
                        <b>&nbsp;</b>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="confirm-box clearfix" style="position: absolute; width: 100%; bottom: 0px;">
                <a class="confirm text_7" oncontextmenu="return false;"></a>
            </div>
        </div>
        <div class="acc-window acc-trans2-1" style="top:40%;left:52%;display: none;">
            <a class="close" oncontextmenu="return false;"></a>
            <div class="acc-w-title">USDT</div>
            <table style="margin:0px 10px; width: 660px;" border="0" cellpadding="0" cellspacing="0">
                <tbody>
  
                <tr>
                    <td class="mem">
                        <form id="Depositeform">
                            <input type="hidden" name="type" value="USDT">
                            <input type="hidden" name="lang" value="tw">
                            <table style="width: 100%;" border="0" cellspacing="1" cellpadding="0">
                                <tbody>
                                <tr class="b_rig recharge-data recharge-data-platform" style="display: table-row;">
                                    <td width="20%">
                                        <div align="right" class="text_134">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="platform" class="platform" style="width: 180px"><option autostatus="0" value="116" code="" typecode="USDT">USDT充值_TRC20</option><option autostatus="0" value="117" code="" typecode="USDT">USDT充值_TRC20</option></select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data recharge-data-bankcode" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_136">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="bankcode" style="width: 180px">
                                                <option value="">请选择</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data merchanttype" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_779">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="merchanttype" class="merchanttype" style="width: 180px; display: none;">
                                                <option value="">请选择</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data recharge-data-cointype" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_755">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <select name="cointype" class="cointype" style="width: 180px; display: none;">
                                                <option value="">请选择</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data cointypetext" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_755">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left">
                                            <span name="cointypetext" id="cointypetext" style="width: 180px"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data amount" style="display: table-row;">
                                    <td width="20%">
                                        <div align="right" class="">USDT<span>数量：</span></div>
                                    </td>
                                    <td width="80%" style="display: flex;">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="money" id="PayMoney3" style="width: 180px" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                            <span class="point" style="color: red; font-size: 14px;"></span>
                                            <div class="decimal"></div>
                                            <input name="decimal" hidden="">
                                        </div>
                                        <span class="style1" style="padding-left: 8px;">金額：100.00~1000000.00(元)</span>
                                    </td>
                                </tr>
                                <!--<tr class="b_rig recharge-data Ratiotruemoney" style="display: table-row;" style="display: none;">-->
                                <!--    <td width="20%">-->
                                <!--        <div align="right" class="text_1028">：</div>-->
                                <!--    </td>-->
                                <!--    <td width="80%" style="display: flex;">-->
                                <!--        <div align="left" style="float: left;position: relative;">-->
                                <!--            <input name="Ratiotruemoney" id="Ratiotruemoney" style="width: 180px">-->
                                <!--        </div>-->
                                <!--    </td>-->
                                <!--</tr>-->
                                <tr class="b_rig recharge-data truename" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_577">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="truename" id="truename" style="width: 180px">
                                        </div>
                                        <div align="left" class="truename_note" style="display: none;">Họ tên thật không dấu</div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data bank_account_name" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_140">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="bank_account_name" id="bank_account_name" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data bank_account" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_139">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="bank_account" id="bank_account" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data bankname" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_173">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="bankname" id="bankname" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data mobile" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_142">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="mobile" id="mobile" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data email" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_778">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="email" id="email" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data idcard" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_143">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="idcard" id="idcard" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data CSC" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_791">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="CSC" id="CSC" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data expDate" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_792">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="expDate" id="expDate" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data IFSC" style="display: none;">
                                    <td width="20%">
                                        <div align="right">IFSC：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="IFSC" id="IFSC" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data USDTAddress" style="display: none;">
                                    <td width="20%">
                                        <div align="right" class="text_1029">：</div>
                                    </td>
                                    <td width="80%">
                                        <div align="left" style="float: left;position: relative;">
                                            <input name="USDTAddress" id="USDTAddress" style="width: 180px">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="b_rig recharge-data deviceType" style="display: none;">
                                    <td width="20%"><div align="right" class="text_147">：</div></td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="devicetype" value="ios" checked="checked" style="float: left;margin-left: 30px;">
                                        <label class="form-check-label text_148" for="inlineRadio1" style="float: left;"></label>
                                        <input class="form-check-input" type="radio" name="devicetype" value="android">
                                        <label class="form-check-label text_149" for="inlineRadio1" style="margin-right: 80px;"></label>
                                    </td>
                                </tr>
                                  <tr class="b_rig recharge-data deviceType" style="">
                                    <td width="20%"><div align="right" class="">充值地址(TRC20)：</div></td>
                                    <td width="80%" style="display: flex;">
                                       TWupqoLWqoaiPHbfeJq9qDWBtP14GVo3er
                                    </td>
                                </tr>
                                 <tr class="b_rig recharge-data deviceType">
                                    <td width="20%"><div align="right" class="">收款二維碼：</div></td>
                                    <td width="80%" style="display: flex;">
                                        <img src="/new/img/token.jpg" width="100" height="100" style="margin-left: 0px;margin-top: 0px"/>
                                    </td>
                                </tr>
                                
                               
                                <!--<tr class="b_rig ratio" style="display: table-row;"><td colspan="2" style="text-align: left; color: #ff0505;">匯率提示: 1USDT : 7.97</td></tr>-->
                                <tr class="b_rig hnote"><td colspan="2" style="text-align: left;" class="text_66">:<br>1.首充即送20%，充$1000送$200，充$10000送$2000；系統根據最新一筆充值金額審核優惠申請。

                                        2.USDT充值可通過掃描二維碼或收款地址直接轉出，轉賬前請核對清楚我方的收款資料

                                        3.請準確轉帳小數後2位,以免造成延誤或損失

                                        4.收款帳號隨時更換,請按顯示之收款帳號進行支付,如與系統收款帳號不符,所有損失本公司一概不承擔。

                                        5.如閣下使用支付寶進行轉數快轉帳,請緊記需要選擇[轉數快]通道,如使用[P2P]或其他方式,本公司一概不會接受。

                                        6.一般充值在沒有領取優惠下,只需一倍有效投注金額便可申請提款。</td></tr>
                                <tr class="b_rig recharge-data" style="display: table-row;">
                                    <td colspan="2">
                                        <div align="center">
                                            <a id="submit" type="submit" class="btn repairSubBtn3" style="width: 140px;" value="立即充值">立即充值</a>
                                            <input id="reset" type="reset" class="btn repairBtn" style="width: 140px;" value="重新填寫">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td id="foot">
                        <b>&nbsp;</b>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="confirm-box clearfix" style="position: absolute; width: 100%; bottom: 0px;">
                <a class="confirm text_7" oncontextmenu="return false;"></a>
            </div>
        </div>
        <!--<div class="USDTTutorial acc-window-bg" style="display: none;">
            <div class="acc-window acc-trans2-1" style="overflow: auto;">
                <a class="close1" oncontextmenu="return false;"></a>
                <div class="USDTTutorialTitle">USDT教程影片</div>
                <div class="Tutorialdata"><div style="font-size: 16px; font-weight: 700; text-align: center; margin: 10px 0;">1.<span>新增幣種及轉帳</span></div><video controls="" style="width: 100%;"><source src="../../wechat/media/USDTTutorial_imtoken.mp4" type="video/mp4"></video><div style="font-size: 16px; font-weight: 700; text-align: center; margin: 10px 0;">2.<span>創建專屬電子錢包</span></div><video controls="" style="width: 100%;"><source src="../../wechat/media/USDTTutorial_Openimtoken.mp4" type="video/mp4"></video><div style="font-size: 16px; font-weight: 700; text-align: center; margin: 10px 0;">3.<span>虛擬貨幣交易所推介</span></div><video controls="" style="width: 100%; margin-bottom: 60px;"><source src="../../wechat/media/USDTTutorial_Exchange.mp4" type="video/mp4"></video></div>
            </div>
        </div>
        <div class="USDTTutorial acc-window-bg" style="display: none;">
            <div class="acc-window acc-trans2-1" style="overflow: auto;">
                <a class="close1" oncontextmenu="return false;"></a>
                <div class="USDTTutorialTitle">USDT教程文檔</div>
                <div class="Tutorialdata"><img src="../../wechat/images/USDTTutorial_imtoken.png" style="width: 100%;"><img src="../../wechat/images/USDTTutorial_Openimtoken.png" style="width: 100%;"><img src="../../wechat/images/USDTTutorial_Exchange.png" style="width: 100%; margin-bottom: 60px;"></div>
            </div>
        </div>-->
        @include('member.layouts.pc_footer')
    </div>
</div>
<!-- main end -->
@include('member.layouts.pc_right')

<script>

    function formatDate() {
        var now = new Date();//北京时间：当前13位时间戳
        var year = now.getFullYear();  //取得4位数的年份
        var month = now.getMonth() + 1;  //取得日期中的月份，其中0表示1月，11表示12月
        var date = now.getDate();      //返回日期月份中的天数（1到31）
        var hour = now.getHours();     //返回日期中的小时数（0到23）
        var minute = now.getMinutes(); //返回日期中的分钟数（0到59）
        var second = now.getSeconds(); //返回日期中的秒数（0到59）
        return year + '' + month + '' + '' + date + '' + hour + '' + minute + '' + second + Math.floor((Math.random() * 40) + 10);
    }


    $('#FPS_btn').click(function () {
        $('.acc-trans2-1').hide().eq(0).show();
        $(".b_rig_2").hide();
        $(".amount").show();
    });

    $('#BankTransfer_btn').click(function () {
        $('.acc-trans2-1').hide().eq(1).show();
    });

    $('#USDT_btn').click(function () {
        $('.acc-trans2-1').hide().eq(2).show();
    });

    $('.confirm ').click(function () {
        $(this).parents('.acc-trans2-1').hide()
    });
    $('.close').click(function () {
        $(this).parents('.acc-trans2-1').hide()
    });


    $('.repairSubBtn').click(function () {
        var sj = Math.floor((Math.random() * 40) + 10) / 100;
        $("#xiaoshu").val(sj);
        var PayMoney = $("#PayMoney").val() * 1;
        if (PayMoney > 0) {
            $(".b_rig_2").show();
            $(".amount").hide();
            $(".PayMoneytext").text(PayMoney + sj);
            var Payorderno = 'F' + formatDate();
            $(".Payorderno").text(Payorderno);
            $("#PayMoney2").val(PayMoney);
        } else {
            alert('請輸入正確的充值金額');
            return;
        }
    });

    $('.payNotify').click(function () {
       // var PayMoney = $("#PayMoney").val();
        var xiaoshu = $("#xiaoshu").val();
         var PayMoney = $("#PayMoney2").val() * 1;
        if (PayMoney > 0) {
            $(".b_rig_2").show();
            $(".amount").hide();
			
            $.ajax({
                type: "post",
                url: "{{ route('wap.post_qq_pay') }}",
                data: {money: PayMoney, xiaoshu: xiaoshu*100},
                success: function (data) {
                    console.log(data)
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                          alert('提交成功');
                    } else {
                        alert(data.status.msg);
                    }
                }
            });
        } else {
            alert('請輸入正確的充值金額');
            return;
        }
    });


    $('.repairSubBtn3').click(function () {
        var sj = Math.floor((Math.random() * 40) + 10);
        $("#xiaoshu2").val(sj);
        var PayMoney = $("#PayMoney3").val() * 1;
        if (PayMoney > 0) {
            $.ajax({
                type:"post",
                url : "{{ route('ajax_pay') }}",
                data : {amount:PayMoney,xiaoshu:sj,'paytype':'usdt'},
                success : function (data) {
                    if(data.status.errorCode == 0){
                       // location.href=data.url;
                        alert('提交成功');
                    }else{
                        alert(data.status.msg);
                    }

                }
            })
        } else {
            alert('請輸入正確的充值金額');
            return;
        }
    });
    $('.repairSubBtn2222').click(function () {
        var sj = Math.floor((Math.random() * 40) + 10) / 100;
        $("#xiaoshu2").val(sj);
        var PayMoney = $("#PayMoney2").val() * 1;
        if (PayMoney > 0) {
            $(".b_rig_2").show();
            $(".amount").hide();
            $(".PayMoneytext2").text(PayMoney + sj);
            var Payorderno = 'B' + formatDate();
            $(".Payorderno2").text(Payorderno);
        } else {
            alert('請輸入正確的充值金額');
            return;
        }
    });
    
    $('.repairSubBtn2').click(function () {
        var PayMoney = $("#PayMoney2").val();
        var xiaoshu = $("#xiaoshu2").val();
       var sj = Math.floor((Math.random() * 40) + 10) / 100;
        if (PayMoney > 0) {
          //  $(".b_rig_2").show();
           // $(".amount").hide();
            $.ajax({
                type: "post",
            	url:"{{ route('ajax_pay') }}",
				data : {amount:PayMoney,xiaoshu:sj*100},
			
                success: function (data) {
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                          alert('提交成功');
                    } else {
                        alert(data.status.msg);
                    }
                }
            });
        } else {
            alert('請輸入正確的充值金額');
            return;
        }
    });


    $('.payNotify2').click(function () {
        var PayMoney = $("#PayMoney2").val();
        var xiaoshu = $("#xiaoshu2").val();
        if (PayMoney > 0) {
            $(".b_rig_2").show();
            $(".amount").hide();
            $.ajax({
                type: "post",
                url: "{{ route('wap.post_qq_pay') }}",
                data: {money: PayMoney, xiaoshu: xiaoshu*100},
                success: function (data) {
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                          alert('提交成功');
                    } else {
                        alert(data.status.msg);
                    }
                }
            });
        } else {
            alert('請輸入正確的充值金額');
            return;
        }
    });
</script>
</body>
</html>