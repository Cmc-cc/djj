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
        .acc-window-bg{
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="top-box">
        @include('member.layouts.pc_header')

        <div class="acc-window-bg" >
            <div class="acc-window acc-trans3" style="margin: -225px 0 0 -460px;">
                <form class="form-horizontal withdrawalBank">
                    <a class="close" oncontextmenu="return false;"></a>
                    <div class="acc-w-title text_198"></div>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                           style="border: 1px #FFF solid;">
                        <tbody>
                        <tr>
                            <td colspan="2" align="center" valign="middle">
                                <div class="nav">
                                    <ul class="commonlist">
                                        <li class="current text_199"></li>
                                    </ul>
                                </div>
                                <div>
                                    <table class="table-1 withdrawalBank" style="color: #000000;" border="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td class="aright col-4 text_200">：</td>
                                            <td class="aleft myMoney"><b>HKD</b> {{$member->money}}</td>
                                        </tr>
                                        <tr>
                                            <td class="aright col-4 text_703">：</td>
                                            <td class="aleft">
                                                <input type="text" id="name" readonly="readonly"
                                                       value="{{$member->username}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright text_202">：</td>
                                            <td class="aleft">
                                                <input type="text" id="withdrawalMoney" class="form-control withdrawalMoney"
                                                       style="width: 245px;" placeholder="最低提款金額 HKD100.00">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="alipayBtn">
                                            <td class="aright text_844">：</td>
                                            <td class="aleft">
                                                <input type="text" id="alipayAccount" class="form-control"
                                                       style="width: 245px;" readonly="readonly" value="">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="alipayNumBtn">
                                            <td class="aright text_858">：</td>
                                            <td class="aleft">
                                                <input type="text" id="alipayNum" class="form-control"
                                                       style="width: 245px;">
                                            </td>
                                        </tr>
                                        <tr style="" class="fastTurnNumBtn">
                                            <td class="aright text_859">：</td>
                                            <td class="aleft">
                                                <input type="text" id="fastTurnNum" class="form-control"
                                                       style="width: 245px;" readonly="readonly"
                                                       value="{{$member->fps}}">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="USDTERCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdtAccount" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="USDTTRCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdttrcAccount" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="BEP20NumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="bep20Account" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="BEP2NumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="bep2Account" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="newbankBtn">
                                            <td class="aright text_173">：</td>
                                            <td class="aleft">
                                                <input type="text" id="newbankName" class="form-control"
                                                       style="width: 245px;" readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="newbankBtn">
                                            <td class="aright text_59">：</td>
                                            <td class="aleft">
                                                <input type="text" id="newbankAccount" class="form-control"
                                                       style="width: 245px;" readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright">剩餘碼量：</td>
                                            <td class="aleft">
                                                {{$member->ml_money}}
                                            </td>
                                        </tr>
                                       <tr>
                                            <td class="aright">{{trans("lang.tkmm")}}：</td>
                                            <td class="aleft">
                                                <input type="password" id="qk_pwd1" class="form-control"  style="width: 245px;" >
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table-1 " border="0" cellspacing="0">
                                        <tbody>
                                        <tr class="ctrl" style="visibility: visible;">
                                            <td colspan="2" class="acenter">
                                                <a class="btn text_777" id="withdrawalBanksubmit" type="submit"
                                                   value="確認送出" typename="fastTurn"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="acc-window-bg" >
            <div class="acc-window acc-trans3" style="margin: -225px 0 0 -460px;">
                <form class="form-horizontal withdrawalBank">
                    <a class="close" oncontextmenu="return false;"></a>
                    <div class="acc-w-title text_198"></div>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                           style="border: 1px #FFF solid;">
                        <tbody>
                        <tr>
                            <td colspan="2" align="center" valign="middle">
                                <div class="nav">
                                    <ul class="commonlist">
                                        <li class="current text_199"></li>
                                    </ul>
                                </div>
                                <div>
                                    <table class="table-1 withdrawalBank" style="color: #000000;" border="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td class="aright col-4 text_200">：</td>
                                            <td class="aleft myMoney"><b>HKD</b> {{$member->money}}</td>
                                        </tr>
                                        <tr>
                                            <td class="aright col-4 text_703">：</td>
                                            <td class="aleft">
                                                <input type="text" id="name" readonly="readonly"
                                                       value="{{$member->username}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright text_202">：</td>
                                            <td class="aleft">
                                                <input type="text" id="withdrawalMoney" class="form-control withdrawalMoney"
                                                       style="width: 245px;" placeholder="最低提款金額 HKD100.00">
                                            </td>
                                        </tr>
                                        <tr class="alipayBtn">
                                            <td class="aright ">銀行名稱：</td>
                                            <td class="aleft">
                                                    <input type="text" id="alipayAccount" class="form-control"
                                                       style="width: 245px;" readonly="readonly" value="{{$member['bank']}}">
                                            </td>
                                        </tr>
                                        <tr class="alipayNumBtn">
                                            <td class="aright">銀行賬號：</td>
                                            <td class="aleft">
                                                <input type="text" id="alipayNum" class="form-control" value="{{$member['card']}}"
                                                       style="width: 245px;">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="fastTurnNumBtn">
                                            <td class="aright text_859">：</td>
                                            <td class="aleft">
                                                <input type="text" id="fastTurnNum" class="form-control"
                                                       style="width: 245px;" readonly="readonly"
                                                       value="{{$member->fps}}">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="USDTERCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdtAccount" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="USDTTRCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdttrcAccount" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="BEP20NumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="bep20Account" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="BEP2NumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="bep2Account" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="newbankBtn">
                                            <td class="aright text_173">：</td>
                                            <td class="aleft">
                                                <input type="text" id="newbankName" class="form-control"
                                                       style="width: 245px;" readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="newbankBtn">
                                            <td class="aright text_59">：</td>
                                            <td class="aleft">
                                                <input type="text" id="newbankAccount" class="form-control"
                                                       style="width: 245px;" readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright">剩餘碼量：</td>
                                            <td class="aleft">
                                                 {{$member->ml_money}}
                                    
                                            </td>
                                        </tr>
                                           <tr>
                                            <td class="aright">{{trans("lang.tkmm")}}：</td>
                                            <td class="aleft">
                                                <input type="password" id="qk_pwd2" class="form-control"  style="width: 245px;" >
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table-1 " border="0" cellspacing="0">
                                        <tbody>
                                        <tr class="ctrl" style="visibility: visible;">
                                            <td colspan="2" class="acenter">
                                                <a class="btn text_777" id="withdrawalBanksubmit2" type="submit"
                                                   value="確認送出" typename="fastTurn"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="acc-window-bg" >
            <div class="acc-window acc-trans3" style="margin: -225px 0 0 -460px;">
                <form class="form-horizontal withdrawalBank">
                    <a class="close" oncontextmenu="return false;"></a>
                    <div class="acc-w-title text_198"></div>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                           style="border: 1px #FFF solid;">
                        <tbody>
                        <tr>
                            <td colspan="2" align="center" valign="middle">
                                <div class="nav">
                                    <ul class="commonlist">
                                        <li class="current text_199"></li>
                                    </ul>
                                </div>
                                <div>
                                    <table class="table-1 withdrawalBank" style="color: #000000;" border="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td class="aright col-4 text_200">：</td>
                                            <td class="aleft myMoney"><b>HKD</b> {{$member->money}}</td>
                                        </tr>
                                        <tr>
                                            <td class="aright col-4 text_703">：</td>
                                            <td class="aleft">
                                                <input type="text" id="name" readonly="readonly"
                                                       value="{{$member->username}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright text_202">：</td>
                                            <td class="aleft">
                                                <input type="text" id="withdrawalMoney" class="form-control withdrawalMoney"
                                                       style="width: 245px;" placeholder="最低提款金額 HKD100.00">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="alipayBtn">
                                            <td class="aright text_844">：</td>
                                            <td class="aleft">
                                                <input type="text" id="alipayAccount" class="form-control"
                                                       style="width: 245px;" readonly="readonly" value="">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="alipayNumBtn">
                                            <td class="aright text_858">：</td>
                                            <td class="aleft">
                                                <input type="text" id="alipayNum" class="form-control"
                                                       style="width: 245px;">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="fastTurnNumBtn">
                                            <td class="aright text_859">：</td>
                                            <td class="aleft">
                                                <input type="text" id="fastTurnNum" class="form-control"
                                                       style="width: 245px;" readonly="readonly"
                                                       value="{{$member->fps}}">
                                            </td>
                                        </tr>
                                        <tr style="display: none;"  class="USDTERCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdtAccount" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr class="USDTTRCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdttrcAccount" class="form-control" value="{{$member->trc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="BEP20NumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="bep20Account" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="BEP2NumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="bep2Account" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="newbankBtn">
                                            <td class="aright text_173">：</td>
                                            <td class="aleft">
                                                <input type="text" id="newbankName" class="form-control"
                                                       style="width: 245px;" readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr style="display: none;" class="newbankBtn">
                                            <td class="aright text_59">：</td>
                                            <td class="aleft">
                                                <input type="text" id="newbankAccount" class="form-control"
                                                       style="width: 245px;" readonly="readonly">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright">剩餘碼量：</td>
                                            <td class="aleft">
                                                {{$member->ml_money}}
                                            </td>
                                        </tr>
                                       <tr>
                                            <td class="aright">{{trans("lang.tkmm")}}：</td>
                                            <td class="aleft">
                                                <input type="password" id="qk_pwd3" class="form-control"  style="width: 245px;" >
                                            </td>
                                        </tr>   
                                        </tbody>
                                    </table>
                                    <table class="table-1 " border="0" cellspacing="0">
                                        <tbody>
                                        <tr class="ctrl" style="visibility: visible;">
                                            <td colspan="2" class="acenter">
                                                <a class="btn text_777" id="withdrawalBanksubmit3" type="submit"
                                                   value="確認送出" typename="fastTurn"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="acc-window-bg" >
            <div class="acc-window acc-trans3" style="margin: -225px 0 0 -460px;">
                <form class="form-horizontal withdrawalBank">
                    <a class="close" oncontextmenu="return false;"></a>
                    <div class="acc-w-title text_198"></div>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                           style="border: 1px #FFF solid;">
                        <tbody>
                        <tr>
                            <td colspan="2" align="center" valign="middle">
                                <div class="nav">
                                    <ul class="commonlist">
                                        <li class="current text_199"></li>
                                    </ul>
                                </div>
                                <div>
                                    <table class="table-1 withdrawalBank" style="color: #000000;" border="0"
                                           cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td class="aright col-4 text_200">：</td>
                                            <td class="aleft myMoney"><b>HKD</b> {{$member->money}}</td>
                                        </tr>
                                        <tr>
                                            <td class="aright col-4 text_703">：</td>
                                            <td class="aleft">
                                                <input type="text" id="name" readonly="readonly"
                                                       value="{{$member->username}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="aright text_202">：</td>
                                            <td class="aleft">
                                                <input type="text" id="withdrawalMoney" class="form-control withdrawalMoney"
                                                       style="width: 245px;" placeholder="最低提款金額 HKD100.00">
                                            </td>
                                        </tr>
                                
                                        <tr class="USDTERCNumBtn">
                                            <td class="aright text_918">：</td>
                                            <td class="aleft">
                                                <input type="text" id="usdtAccount" class="form-control" value="{{$member->erc20}}"
                                                       style="width: 245px;" placeholder="請至&quot;綁定銀行卡&quot;新增"
                                                       readonly="readonly">
                                            </td>
                                        </tr>
                           
                            
                                        <tr>
                                            <td class="aright ">剩餘碼量：</td>
                                            <td class="aleft">
                                                {{$member->ml_money}}
                                            </td>
                                        </tr>

                                           <tr>
                                            <td class="aright">{{trans("lang.tkmm")}}：</td>
                                            <td class="aleft">
                                                <input type="password" id="qk_pwd4" class="form-control"  style="width: 245px;" >
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table-1 " border="0" cellspacing="0">
                                        <tbody>
                                        <tr class="ctrl" style="visibility: visible;">
                                            <td colspan="2" class="acenter">
                                                <a class="btn text_777" id="withdrawalBanksubmit4" type="submit"
                                                   value="確認送出" typename="fastTurn"></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
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
                            <li><a href="/member/customer_report_3" class="text_169" oncontextmenu="return false;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist" id="fianca_ul">
                                <li><a href="/member/finance_center" class="text_170" oncontextmenu="return false;"></a>
                                </li>
                                <li class="select withdrawal"><a href="/member/update_bank_info" class="text_121"
                                                                 oncontextmenu="return false;"></a></li>
                                <!-- <li class="bankinfo"><a href="../mem/bankinfo.html" class="text_171"></a></li> -->
                                <li class="modifybankinfo"><a href="/member/bank" class="text_172"
                                                              oncontextmenu="return false;"></a></li>
                            </ul>
                        </div>
                        <div style="padding:0" class="memCon clearfix">
                            <div class="trans-money-header clear" id="Withdrawaltable">
                                <div style="width: 100%;display: flex;">
                                    <div class="t-h-box" data-num="10"><span class="add-icon"></span><span
                                                class="minus-icon"></span><a class="refresh-icon"></a>
                                        <div class="t-h-info"><h1 class="text_194"></h1><h6 class="gameMoney"
                                                                                            gamename="Center">{{$member->money}}</h6>
                                        </div>
                                    </div>
                                    <div class="t-h-box" data-num="11"><span class="add-icon"></span><span
                                                class="minus-icon"></span><a class="refresh-icon"></a>
                                        <div class="t-h-info"><h1 class="text_195"></h1><h6 class="lockmoney"
                                                                                            gamename="LockMoney">0</h6>
                                        </div>
                                    </div>
                                    <div class="t-h-box" data-num="13"><a id="reloadBetMoney"></a>
                                        <div class="t-h-info"><h1 class="text_197"></h1><h6 id="betMoney">{{$member->ml_money}}</h6></div>
                                    </div>
                                </div>
                                <div class="txt" style="display: block;padding: 9px 23px">
                                    <div class="de-title">
                                        <div style="color: #e3c7af;font-size: 1.17em;font-weight: bold;text-align: left;margin-bottom: 5px;">
                                            轉數快
                                        </div>
                                        <div class="de-txt1" style="text-align: left;"></div>
                                        <div class="balancegameMoney"><a type="fastTurn"
                                                                         class="login-btn4 text_196"></a></div>
                                    </div>
                                    <div class="de-title">
                                        <div style="color: #e3c7af;font-size: 1.17em;font-weight: bold;text-align: left;margin-bottom: 5px;">
                                            銀行轉帳
                                        </div>
                                        <div class="de-txt1" style="text-align: left;">親愛的會員：使用銀行轉帳／入鈔機出款時
                                            ，請以100元作單位，以便增加出款效率，謝謝
                                        </div>
                                        <div class="balancegameMoney"><a type="bank"
                                                                         class="login-btn4 text_196"></a></div>
                                    </div>
                                    <div class="de-title">
                                        <div style="color: #e3c7af;font-size: 1.17em;font-weight: bold;text-align: left;margin-bottom: 5px;">
                                            USDT-TRC20
                                        </div>
                                        <div class="de-txt1" style="text-align: left;">收款通道請使用TRC20</div>
                                        <div class="balancegameMoney"><a type="USDT-TRC20"
                                                                         class="login-btn4 text_196"></a></div>
                                    </div>
                                    <div class="de-title">
                                        <div style="color: #e3c7af;font-size: 1.17em;font-weight: bold;text-align: left;margin-bottom: 5px;">
                                            USDT-ERC20
                                        </div>
                                        <div class="de-txt1" style="text-align: left;">收款通道請使用ERC20</div>
                                        <div class="balancegameMoney"><a type="USDT-ERC20"
                                                                         class="login-btn4 text_196"></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="trans-money-header clear" id="Withdrawaltable1">
                                <!-- <div class="t-h-box" data-num="12">
                                    <div class="">
                                        <h1 class="text_36"></h1>
                                        <a id="trans3-btn" class="btn text_196"></a>
                                    </div>
                                </div>
                                <div class="t-h-box" data-num="13">
                                    <a id="reloadBetMoney"></a>
                                    <div class="t-h-info">
                                        <h1 class="text_197"></h1>
                                        <h6 id='betMoney'>读取中</h6>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('member.layouts.pc_footer')
    </div>
</div>
<!-- main end -->
@include('member.layouts.pc_right')

<script>
    $('.close').click(function () {
        $('.acc-window-bg').hide()
    });

    $('.login-btn4').click(function () {
        var index = $('.login-btn4').index(this);
        console.log(index)
        $('.acc-window-bg').hide().eq(index).show();
    });

    $('#withdrawalBanksubmit').click(function () {
        var money = $('.withdrawalMoney').eq(0).val();
        if (money >= 100) {
            $.ajax({
                type: "post",
                url: "{{ route('wap.post_drawing') }}",
                data: {bank_name: '转速快', money: money,name:$("#name").val(),qk_pwd:$('#qk_pwd1').val(),bank_card:$("#fastTurnNum").val()},
                success: function (data) {
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                        alert(data.data)
                    } else {
                        alert(data.status.msg);
                    }
                    $('#acc-trans3-w').hide();

                }
            })
        } else {
            alert('低于最低提款金额！');
        }
        return false;
    });

    $('#withdrawalBanksubmit2').click(function () {
        var money = $('.withdrawalMoney').eq(1).val();
        var bank= "{{$member['bank']}}";
        var card= "{{$member['card']}}";
        if (money >= 100) {
            $.ajax({
                type: "post",
                url: "{{ route('wap.post_drawing') }}",
                data: {bank_name: bank, money: money,name:$("#name").val(),qk_pwd:$('#qk_pwd2').val(),bank_card:card},
                success: function (data) {
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                        alert(data.data)
                    } else {
                        alert(data.status.msg);
                    }
                    $('#acc-trans3-w').hide();

                }
            })
        } else {
            alert('低于最低提款金额！');
        }
        return false;
    });

    $('#withdrawalBanksubmit3').click(function () {
        var money = $('.withdrawalMoney').eq(2).val();
        if (money >= 100) {
            $.ajax({
                type: "post",
                url: "{{ route('wap.post_drawing') }}",
                data: {bank_name: 4, type:4, money: money,name:$("#name").val(),qk_pwd:$('#qk_pwd3').val(),bank_card:$("#usdttrcAccount").val()},
                success: function (data) {
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                        alert(data.data)
                    } else {
                        alert(data.status.msg);
                    }
                    $('#acc-trans3-w').hide();

                }
            })
        } else {
            alert('低于最低提款金额！');
        }
        return false;
    });

    $('#withdrawalBanksubmit4').click(function () {
        var money = $('.withdrawalMoney').eq(3).val();
        if (money >= 100) {
            $.ajax({
                type: "post",
                url: "{{ route('wap.post_drawing') }}",
                data: {bank_name: 3, type:3,money: money,name:$("#name").val(),qk_pwd:$('#qk_pwd4').val(),bank_card:$("#usdtAccount").val()},
                success: function (data) {
                    if (data.status.errorCode == 0) {
                        //location.href = data.url;
                        alert(data.data)
                    } else {
                        alert(data.status.msg);
                    }
                    $('#acc-trans3-w').hide();

                }
            })
        } else {
            alert('低于最低提款金额！');
        }
        return false;
    });
</script>
</body>
</html>