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
                            <li><a href="/member/customer_report" class="text_168" oncontextmenu="return false;"></a></li>
                            <li class="select"><a href="/member/customer_report_3" class="text_169" oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 140px;">
                                    <a href="#" class="text_169" oncontextmenu="return false;"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane limit active" id="tab1">
                              <form id="recordForm" method="get" action="">
                                <div class="memCon clearfix">
                                    <div class="erclass form-group choiceDate" style="height: 60px;">
                                        <span class="vm text_232" for="startData">：</span>
                                        <input type="date" class="form-control btn-datetimepicker hasDatepicker"  value="{{$start}}" name="start"
                                               id="startData"> <i class="fa fa-calendar"></i>
                                        <span class="vm text_233">：</span>
                                        <input type="date" class="form-control btn-datetimepicker hasDatepicker"  value="{{$end}}" name="end"
                                               id="endData"><i class="fa fa-calendar"></i><br>
                                        <span class="text_251">：</span>
                                        <select class="form-control" id="recordType" name="api_type">
                                            <option value="">全部</option>
                                            @foreach($_api_list as $k => $v)
                                                @if($v=='AGS' || $v=='SUNBETS')
                                                    @continue
                                                @endif
                                                <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                          <button type="submit"  class="vm btn btn-main btn-width text_235" style="width: 85px;"
                                           oncontextmenu="return false;"></a>
                                    </div>

                                    <div id="recordType4" class="record">
                                        <table width="100%" class="table table-hover" id="bet">
                                            <thead>
                                            <tr>
                                                <th colspan="2" style="width: 20%;word-break: normal;"
                                                    class="header text_251">

                                                </th>
                                                <th style="width: 11%;word-break: normal;" class="header text_236">

                                                </th>
                                                <th style="width: 23%;word-break: normal;" class="header text_756">

                                                </th>
                                                <!-- <th style="width: 12%;word-break: normal;" class="header text_252">

                                                </th> -->
                                                <th style="width: 11%;word-break: normal;" class="header text_253">

                                                </th>
                                                <th style="width: 11%;word-break: normal;" class="header text_757">

                                                </th>
                                                <th style="width: 12%;word-break: normal;" class="header text_758">

                                                </th>
                                                <th style="width: 12%;word-break: normal;" class="header text_759">

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $item)
                                                <tr>
                                                    <td><?php
                                                        $plat_type = $_api_list[$item->api_type];
                                                        if($plat_type == 'AGS'){
                                                            echo 'AG';
                                                        }elseif ($plat_type == 'SUNBETS'){
                                                            echo 'SUNBET';
                                                        }else{
                                                            echo $plat_type;
                                                        }

                                                        ?></td>
                                                    <td>{{ $item->betTime }}</td>
                                                    <td>{{ $item->gameCode }}</td>
                                                    <td>{{ $item->validBetAmount }}</td>
                                                    <td>{{ $item->betAmount }}</td>
                                                    <td>{{ $item->netAmount }}</td>
                                                </tr>
                                            @endforeach
                                            @if($data->total()<1)
                                            <tr>
                                                <td colspan="8" class="text_37"></td>
                                            </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        <!--馨頁碼-->
                                        <ul class="pagination">  {!! $data->render() !!}</ul>
                                        <!-- end -->
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