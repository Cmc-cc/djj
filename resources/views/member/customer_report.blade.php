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
                            <li><a href="/member/bank" class="text_166" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/promotion_apply" class="text_167" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/acc-transfer" class="text_122" oncontextmenu="return false;"></a></li>
                            <li  class="select"><a href="/member/customer_report" class="text_168" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report_3" class="text_169" oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 160px;"><a href="#" class="text_168"
                                                                            oncontextmenu="return false;"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane limit active" id="tab1">
                            <form id="recordForm" method="get" action="">
                                <div class="memCon clearfix">
                                    <div class="erclass form-group choiceDate" style="height: 65px;">
                                        <span class="vm text_232" for="startData">：</span>
                                        <input type="date" class="form-control hasDatepicker" id="startData" value="{{$start}}"
                                               style="font-size: 10px" name="start">
                                        <span class="vm text_233">：</span>
                                        <input type="date" class="form-control btn-datetimepicker hasDatepicker"  value="{{$end}}"
                                               id="endData" name="end"><i class="fa fa-calendar"></i><br>
                                        <span class="text_715">：</span>
                                        <select class="form-control" id="recordType" name="type">
                                            <option value="1" @if($type==1)  selected @endif>存款</option>
                                            <option value="2"  @if($type==2)  selected @endif>取款</option>
                                        </select>
                                        <button type="submit" class="vm btn btn-main btn-width text_235"
                                                style="width: 85px;"></button>
                                    </div>
                                    <!--在线存款 type1-->
                                    <div id="recordType1" class="record in" style="">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10"
                                               id="deposite">
                                            <thead>
                                            <tr>
                                                <th class="header text_236"></th>
                                                <th class="header text_237"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_238"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $item)
                                                <tr>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>@if($type==1) 存款 @else 取款 @endif</td>
                                                    <td>{{ $item->money }}</td>
                                                    <td>{!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}</td>
                                                </tr>
                                            @endforeach
                                            @if($data->total()<1)
                                                <tr>
                                                    <td colspan="8" class="text_37"></td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        <ul class="pagination">   {!! $data->render() !!}</ul>
                                    </div>
                                    <!--手工存款 type8-->
                                    <div id="recordType8" class="record in" style="display: none;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10"
                                               id="handworkDeposite">
                                            <thead>
                                            <tr>
                                                <th class="header text_236"></th>
                                                <th class="header text_237"></th>
                                                <th class="header text_234"></th>
                                                <th class="header text_748"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_238"></th>
                                                <th class="header text_66"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <!--馨頁碼-->
                                        <ul class="pagination"></ul>
                                    </div>
                                    <!--支付碼存款 type3-->
                                    <div id="recordType3" class="record in" style="display: none;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10"
                                               id="onlinepayDeposite">
                                            <thead>
                                            <tr>
                                                <th class="header text_236"></th>
                                                <th class="header text_237"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_238"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <!--馨頁碼-->
                                        <ul class="pagination"></ul>
                                    </div>
                                    <!--提款 type2-->
                                    <div id="recordType2" class="record" style="display: none;">
                                        <table width="100%" class="table table-hover table-sort" id="withdrawal">
                                            <thead>
                                            <tr>
                                                <th class="header text_236" style="width: 11%"></th>
                                                <th class="header text_237"></th>
                                                <th class="header text_244"></th>
                                                <th class="header text_203"></th>
                                                <th class="header text_204"></th>
                                                <th class="header text_205"></th>
                                                <th class="header text_245"></th>
                                                <th class="header text_238"></th>
                                                <th class="header text_66"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <ul class="pagination"></ul>
                                    </div>
                                    <!--额度转换 type5-->
                                    <div id="recordType5" class="record" style="display: none;">
                                        <table width="100%" class="table table-hover table-sort" id="change">
                                            <thead>
                                            <tr>
                                                <th class="header text_236"></th>
                                                <th class="header text_255"></th>
                                                <th class="header text_256"></th>
                                                <th class="header text_257"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_238"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <ul class="pagination">
                                        </ul>
                                    </div>
                                    <!--红利 type6-->
                                    <div id="recordType6" class="record" style="display: none;">
                                        <table width="100%" class="table table-hover table-sort" id="promotion">
                                            <thead>
                                            <tr>
                                                <th class="header text_246"></th>
                                                <th class="header text_217"></th>
                                                <th class="header text_247"></th>
                                                <th class="header text_238"></th>
                                                <th class="header text_66"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <ul class="pagination"></ul>
                                    </div>
                                    <!--返水 type7-->
                                    <div id="recordType7" class="record" style="display: none;">
                                        <table width="100%" class="table table-hover table-sort" id="rakeback">
                                            <thead>
                                            <tr>
                                                <th class="header text_258"></th>
                                                <th class="header text_259"></th>
                                                <th class="header text_260"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_66"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <ul class="pagination"></ul>
                                    </div>
                                    <!--人工异动 type9-->
                                    <div id="recordType9" class="record" style="display: none;">
                                        <table width="100%" class="table table-hover table-sort" id="Artificial">
                                            <thead>
                                            <tr>
                                                <th class="header text_236"></th>
                                                <th class="header text_259"></th>
                                                <th class="header text_260"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_66"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <ul class="pagination"></ul>
                                    </div>
                                    <!--点数转移 type10-->
                                    <div id="recordType10" class="record" style="display: none;">
                                        <table width="100%" class="table table-hover table-sort" id="pointChange">
                                            <thead>
                                            <tr>
                                                <th class="header text_236"></th>
                                                <th class="header text_255"></th>
                                                <th class="header text_256"></th>
                                                <th class="header text_257"></th>
                                                <th class="header text_229"></th>
                                                <th class="header text_238"></th>
                                                <th class="header text_66"></th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <ul class="pagination">
                                            {!! $data->render() !!}
                                        </ul>
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
    var type = 0;
    $('.bindbankcard').click(function () {
        type = 1;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(1).show();
        $(".control-group").eq(2).show();
    });
    $('.bindfps').click(function () {
        type = 2;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(3).show();
    });
    $('.bindusdterc20').click(function () {
        type = 3;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(4).show();
    });
    $('.bindusdttrc20').click(function () {
        type = 4;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(5).show();
    });


    function saveBank() {
        var bank = $("#Bankname").val();
        var username = $("#username").val();
        var card = $("#bankcode").val();
        if (username.length < 2) {
            alert('請輸入真實姓名');
            return;
        }
        if (card.length < 8) {
            alert('請輸入您的銀行卡號');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'bank': bank, 'card': card, 'username': username, 'type': 1},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }

    function saveFps() {
        var fps = $("#FPSAccount").val();
        var username = $("#username").val();
        if (username.length < 2) {
            alert('請輸入真實姓名');
            return;
        }
        if (fps.length < 8) {
            alert('請輸入轉數快號碼');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'fps': fps, 'username': username, 'type': 2},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }

    function saveErc20() {
        var erc20 = $("#USDTAccount").val();
        var username = $("#username").val();
        if (username.length < 2) {
            alert('請輸入真實姓名');
            return;
        }
        if (erc20.length < 8) {
            alert('請輸入USDT帳號');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'erc20': erc20, 'username': username, 'type': 3},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }

    function saveTrc20() {
        var trc20 = $("#USDTAccountTRC20").val();
        var username = $("#username").val();
        if (username.length < 2) {
            alert('请输入真實姓名');
            return;
        }
        if (trc20.length < 8) {
            alert('請輸入USDT帳號');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'trc20': trc20, 'username': username, 'type': 4},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }


    function add() {
        if (type < 1) {
            alert('请选择要绑定的项目！');
            return false;
        }
        switch (type) {
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