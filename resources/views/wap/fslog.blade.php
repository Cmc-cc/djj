@extends('wap.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>
            <span style="color:#fff">返水记录</span>
            <a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>
        </div>
        @include('wap.layouts.aside')
        <div id="type" style="display: none">
            <ul class="g_type">
                <li>
                    @include('wap.layouts.aside_game_list')
                </li>
            </ul>
        </div>
        <div class="wrap data_h_money">
            <table cellspacing="1" cellpadding="0" border="0" class="tab1 text-center">
                <tr class="tic">
                    <td width="33.333%">返水时间</td>
                    <td width="33.333%">返水金额</td>
                    <td width="33.333%">返水状态</td>
                </tr>
                @if ($data->total() > 0)
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td style="color:red"><strong>{{ $item->money }}</strong></td>
                            <td>完成</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">暂无返水记录！</td>
                    </tr>
                @endif
            </table>
            <table border="0" cellpadding="0" cellspacing="0" class="page">
                {!! $data->render() !!}
            </table>
        </div>

    </div>
@endsection