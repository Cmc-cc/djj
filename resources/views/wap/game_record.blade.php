@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                {{--<div class="head">--}}
                    {{--<a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>--}}
                    {{--<span>会员中心</span>--}}
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
                    投注记录
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
                    <form action="" method="get">
                        <table cellspacing="0" cellpadding="0" border="0" class="tab1">
				<tr>
                        <td class="bg" align="right">平台：</td>
                        <td>
                            <select name="api_type" id="api_type" >
                        <option value="">全部</option>
                        @foreach($_api_list_arr as $k => $v)
                            @if($v=='AGS')
                                @continue
                            @endif
                            <option value="{{ $k }}" @if($api_type == $k) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
                           
                        </td>
                    </tr>
				<tr>
                        <td class="bg" align="right">开始日期：</td>
                        <td>
                            <input name="start_at" type="text" id="start_at" class="input_150 laydate-icon" readonly="readonly" value="<?=$start_at?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px"/>
                           
                        </td>
                    </tr>
                    <tr>
                        <td class="bg" align="right">结束日期：</td>
                        <td>
                            <input name="end_at" type="text" id="end_at" class="input_150 laydate-icon" readonly="readonly" value="<?=$end_at?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px"/>
                            
                        </td>
                    </tr>
				</table>
                        <button class="submit_btn" style="margin-top: 0;" type="submit">查询</button>
                    </form>
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                        <tr class="tic">
                            <td width="15%">平台</td>
                            <td width="15%">游戏名称</td>
                            <td width="15%">有效</td>
                            <td width="15%">投注</td>
                            <td width="15%">输赢</td>
                            <td width="25%">时间</td>
                        </tr>
                        @if ($data->total() > 0)
                            @foreach($data as $item)
                                <tr>
                                    <td><?php
                                        $plat_type = $_api_list_all[$item->api_type];
                                        if($plat_type == 'AGS'){
                                            echo 'AG';
                                        }else{
                                            echo $plat_type;
                                        }
                                        ?></td>
                                    <td>{{ $item->gamename }}</td>
                                    <td>{{ $item->validBetAmount }}</td>
                                    <td>{{ $item->betAmount }}</td>
                                    <td>{{ $item->netAmount }}</td>
                                    <td>{{ $item->betTime }}</td>
                                </tr>
                            @endforeach
							<tr>
                            <td>
                              合计
                            </td>
                            <td></td>
                            <td style="color:red;font-weight:bold;">{{ $all_validBetAmount }}</td>
                            <td style="color:red;font-weight:bold;">{{ $all_BetAmount }}</td>
                            <td style="color:red;font-weight:bold;">{{ $all_netAmount }}</td>
                            <td></td>
                    </tr>
                        @else
                            <tr>
                                <td colspan="6">暂无投注记录！</td>
                            </tr>
                        @endif
                    </table>
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        <tr>
                            {!! $data->appends(['api_type' => $api_type])->links() !!}
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    @endsection