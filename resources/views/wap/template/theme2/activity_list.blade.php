@extends('wap.template.theme2.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    @extends('wap.template.theme2.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_activity" style="margin-top: 50px;">
                <div style="text-align:center;height:40px; line-height:40px; margin-right:10px;">
                    <a href="{{ route('wap.my_activity') }}" style="padding:2px 10px; border:0px;  background:#C60; color:#ffffff; border-radius:4px;">申请进度查询</a>
                </div>
                <ul>
                    @foreach($data as $k => $item)
                        <li>
                            <a href="{{ route('wap.activity_detail', ['id' => $item->id]) }}">
                                <img src="{{ $item->title_img }}" alt="">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection