@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                {{--<div class="head">--}}
                {{--<a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>--}}
                {{--<span>在线充值</span>--}}
                {{--<a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>--}}
                {{--</div>--}}
                {{--@include('wap.layouts.aside')--}}
                {{--<div id="type" style="display: none">--}}
                {{--<ul class="g_type">--}}
                {{--<li>--}}
                {{--@include('wap.layouts.aside_game_list')--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                    实时返水
                </div>
                <div class="m_userCenter-line"></div>
                <form action="{{route('wap.send_fs')}}" method="post">
                <div class="userInfo">
                    <p style="text-align: center">可换金额:{{$total['fs_money']}}元</p>
                    <input type="button" value="全 部 兑 换" class="submit_btn ajax-submit-btn">
                </div>
                </form>
                <?php
                $i= 0;
                ?>
                @foreach($list as $k => $v)
                    @if(count($v) > 0)
                        <?php $i++?>
                <p style="color: white">{{config('platform.game_type')[$k]}}类
                    <span>&nbsp;&nbsp;最近{{date('Y-m-d H:i:s')}}</span>
                </p>
                <div class="m_userCenter-line"></div>
                <div class="wrap data_h_money">
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
                        <tr class="tic">
                            <td width="25%">日期</td>
                            <td width="25%">投注流水</td>
                            <td width="25%">返水等级</td>
                            <td width="25%">返水额度</td>
                        </tr>
                        @foreach($v as $kk => $vv)
                        <tr>
                            <td>{{$kk}}@if($kk == date('Y-m-d')) (今天) @endif</td>
                            <td>{{$vv['tz_amount']}}元</td>
                            <td>{{$vv['level_name'] ? $vv['level_name'] : '未满足条件'}}</td>
                            <td>{{$vv['fs_money']}}元</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                        @endif
                @endforeach
                @if($i  <= 0)
                    <div class="wrap data_h_money">
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
                        <tr class="tic">
                            <td width="25%">日期</td>
                            <td width="25%">投注流水</td>
                            <td width="25%">返水等级</td>
                            <td width="25%">返水额度</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: center;">暂无记录</td>
                        </tr>
                    </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        var fs_money = '{{$total['fs_money']}}';
        if(fs_money <= 0) {
            $('.submit_btn').attr('disabled','disabled');
            $('.submit_btn').css('background','#ccc');
        }

    </script>
@endsection