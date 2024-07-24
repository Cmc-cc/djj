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
                            <li class="select"><a href="/member/bank" class="text_166" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/promotion_apply" class="text_167" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/acc-transfer" class="text_122" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report" class="text_168" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report_3" class="text_169" oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist" id="fianca_ul">
                                <li><a href="/member/finance_center" class="text_170" oncontextmenu="return false;"></a></li>
                                <li class="withdrawal"><a href="/member/update_bank_info" class="text_121" oncontextmenu="return false;"></a></li>
                                <!-- <li class="bankinfo"><a href="../mem/bankinfo.html" class="text_171"></a></li> -->
                                <li class="select modifybankinfo"><a href="/member/bank" class="text_172" oncontextmenu="return false;"></a></li>
                            </ul>
                        </div>
                        <div class="memCon memCon1">
                            <div class="memHead oneset">
                                <span class="mc-page-top-title text_177"></span>
                                <div class="mc-page-top-tool">
                                    <a href="" oncontextmenu="return false;"></a>
                                </div>
                            </div>
                            <form class="bindBank" id="addbanks" novalidate="novalidate">
                                <div class="text_880 oneset" style="text-align: center;"></div>
                                <div class="oneset" style="display: flex; width: 95%; margin: 15px auto;">
                                    <div class="text_172 oneset bindbankcard" style="text-align: center; width: 33%; height: 35px; @if($member['bank']) display: none; @else display: grid; @endif align-items: center; background: rgb(236, 216, 168); margin-right: 10px; cursor: pointer; border-radius: 5px;"></div>
                                    <div class="text_1033 oneset bindfps" style="text-align: center; width: 33%; height: 35px; @if($member['fps']) display: none; @else display: grid; @endif align-items: center; background: rgb(236, 216, 168); margin-right: 10px; cursor: pointer; border-radius: 5px;"></div>
                                    <div class="text_1034 oneset bindusdterc20" style="text-align: center; width: 33%; height: 35px; @if($member['erc20']) display: none; @else display: grid; @endif align-items: center; background: #ecd8a8; margin-right: 10px; cursor: pointer; border-radius: 5px;"></div>
                                    <div class="text_1035 oneset bindusdttrc20" style="text-align: center; width: 33%; height: 35px; @if($member['trc20']) display: none; @else display: grid; @endif align-items: center; background: #ecd8a8; margin-right: 10px; cursor: pointer; border-radius: 5px;"></div>
                               </div>
                                <div class="memMain table-mc form-horizontal oneset">
                                    <div class="control-group" @if($member['bank'] && $member['fps'] && $member['erc20'] && $member['trc20']) style="display: none;" @endif>
                                        <label class="control-label text_577">：</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="username" required="" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="control-group bankName" style="display: none;">
                                        <label class="control-label text_173">：</label>
                                        <div class="controls">
                                            <select class="form-control" name="bank" id="Bankname" style="width: auto;">
                                                @foreach($bank as $vo)
                                                    <option value="{{$vo}}">{{$vo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group bankAccount" style="display: none;">
                                        <label class="control-label text_59">：</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="bankcode" name="bankAccount">
                                        </div>
                                    </div>
                                    <div class="control-group FPSAccount" style="display: none;">
                                        <label class="control-label text_798">：</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="FPSAccount" name="FPSAccount">
                                        </div>
                                    </div>
                                    <div class="control-group USDTAccount" style="display: none;">
                                        <label class="control-label text_1036">：</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="USDTAccount" name="USDTAccount">
                                        </div>
                                    </div>
                                    <div class="control-group USDTTRC20Account" style="display: none;">
                                        <label class="control-label text_1037">：</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="USDTAccountTRC20" name="USDTTRC20Account">
                                        </div>
                                    </div>
                                </div>
                                <div class="memHead">
                                    <span class="mc-page-top-title text_182"></span>
                                    <div class="mc-page-top-tool">&nbsp;</div>
                                </div>
                                <div class="control-group2">
                                    <table class="guideTable ">
                                        <thead>
                                        <tr>
                                            <th class="text_183" style="word-break: normal;"></th>
                                            <th class="text_577" style="word-break: normal;"></th>
                                            <th style="word-break: normal;">
                                                <div class="text_173"></div>
                                                <div class="text_59"></div>
                                            </th>
                                            <th class="text_798" style="word-break: normal;"></th>
                                            <th class="text_1036" style="word-break: normal;"></th>
                                            <th class="text_1037" style="word-break: normal;"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="bankList">
                                          @if($member['bank'])
                                            <tr>
                                                <td>1</td>
                                                <td style="word-break: normal;">{{$member['username']}}</td>
                                                <td style="word-break: normal;"><div>{{$member['bank']}}</div><div>{{$member['card']}}</div></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @endif
                                            @if($member['fps'])
                                                <tr>
                                                    <td>2</td>
                                                    <td style="word-break: normal;">{{$member['username']}}</td>
                                                    <td style="word-break: normal;"></td>
                                                    <td>{{$member['fps']}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            @if($member['erc20'])
                                            <tr>
                                                <td>3</td>
                                                <td style="word-break: normal;">{{$member['username']}}</td>
                                                <td style="word-break: normal;"></td>
                                                <td></td>
                                                <td>{{$member['erc20']}}</td>
                                                <td></td>
                                            </tr>
                                            @endif
                                            @if($member['trc20'])
                                            <tr>
                                                <td>4</td>
                                                <td style="word-break: normal;">{{$member['username']}}</td>
                                                <td style="word-break: normal;"></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$member['trc20']}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    &nbsp; <br>
                                    <div class="control-group2">
                                        <div class="form-group oneset">
                                            <center>
                                                <button type="reset" class="btn btn-main btn-width text_191" id="reWrite"></button>
                                                <a class="btn btn-main btn-width " onclick="add();">绑定</a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    var type =0;
    $('.bindbankcard').click(function(){
        type =1;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(1).show();
        $(".control-group").eq(2).show();
    });
    $('.bindfps').click(function(){
        type =2;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(3).show();
    });
    $('.bindusdterc20').click(function(){
        type =3;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(4).show();
    });
    $('.bindusdttrc20').click(function(){
        type =4;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(5).show();
    });


    function saveBank() {
        var bank = $("#Bankname").val();
        var username = $("#username").val();
        var card = $("#bankcode").val();
        if(username.length<2){
            alert('請輸入真實姓名');
            return ;
        }
        if(card.length<8){
            alert('請輸入您的銀行卡號');
            return ;
        }
        $.ajax({
            url : "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'bank':bank,'card':card,'username':username,'type':1},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function() {location.reload(); },200)
                }
            }
        })
        return false;
    }
    function saveFps() {
        var fps = $("#FPSAccount").val();
        var username = $("#username").val();
        if(username.length<2){
            alert('請輸入真實姓名');
            return ;
        }
        if(fps.length<8){
            alert('請輸入轉數快號碼');
            return ;
        }
        $.ajax({
            url : "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'fps':fps,'username':username,'type':2},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function() {location.reload(); },200)
                }
            }
        })
        return false;
    }

    function saveErc20() {
        var erc20 = $("#USDTAccount").val();
        var username = $("#username").val();
        if(username.length<2){
            alert('請輸入真實姓名');
            return ;
        }
        if(erc20.length<8){
            alert('請輸入USDT帳號');
            return ;
        }
        $.ajax({
            url : "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'erc20':erc20,'username':username,'type':3},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function() {location.reload(); },200)
                }
            }
        })
        return false;
    }

    function saveTrc20() {
        var trc20  = $("#USDTAccountTRC20").val();
        var username = $("#username").val();
        if(username.length<2){
            alert('请输入真實姓名');
            return ;
        }
        if(trc20.length<8){
            alert('請輸入USDT帳號');
            return ;
        }
        $.ajax({
            url : "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'trc20':trc20,'username':username,'type':4},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function() {location.reload(); },200)
                }
            }
        })
        return false;
    }


    function add() {
        if(type<1){
            alert('请选择要绑定的项目！');
            return false;
        }
        switch(type){
            case 1:
                saveBank();
                break;
            case 2:
                saveFps();
                break;
            case 3:
                saveErc20();
                break;
            case 4:
                saveTrc20();
                break;
        }
    }
</script>
</body>
</html>