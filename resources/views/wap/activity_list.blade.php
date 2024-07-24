@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
<style>
    .act li {
        margin-left: 10px;
        float: left;
        margin-top: 5px;
    }
    .act li span {
        background: #2b2122 none repeat scroll 0 0;
        border-bottom: 3px solid #36304a;
        border-radius: 5px;
        border-right: 3px solid #36304a;
        color: #8e6d31;
        display: block;
        font-size: 13px;
        line-height: 30px;
        padding: 2px 10px;
        cursor: pointer;
    }
    .act li span.ok, .act li span:hover {
        color: #f6d768;
        font-weight: bold;
    }
</style>
    <div class="m_container">

        <div class="m_body">
            <ul class="act">
                <li>
                    <a href="{{route('wap.activity_list')}}">
                        <span @if ( !request()->get('type') )class="ok" @endif>全部活动</span>
                    </a>
                </li>
                @foreach(config('platform.activity_type') as $k => $v)
                    <li>
                        <a href="{{route('wap.activity_list',['type'=>$k])}}">
                            <span @if (request() -> get('type') == $k)class="ok" @endif>{{$v}}</span>
                        </a>
                    </li>
                @endforeach
                <div style="clear: both;"></div>
            </ul>

            <div class="m_activity">
                <div style="text-align:center;height:40px; line-height:40px; margin-right:10px;">
                    <a href="{{ route('wap.my_activity') }}" style="padding:2px 10px; border:0px;  background:#C60; color:#ffffff; border-radius:4px;">申请进度查询</a>
                </div>
                <ul>
                    @foreach($data as $k => $item)
                        <li>
                            <a href="{{ route('wap.activity_detail', ['id' => $item->id]) }}">
                                <img src="{{ $item->title_img }}" alt="">
                            </a>
                            <div style="text-align: center;margin-top: 2%">
                                @if($item->is_apply == 0)

                                    @if($_member)
                                        <form action="{{ route('member.apply_activity') }}" method="post">
                                            <input type="hidden" name="activity_id" value="{{ $item->id }}">
                                            <button class="applybtn ajax-submit-without-confirm-btn" style="padding:2px 5px; border:0px; background:#C30; color:#ffffff; border-radius:4px;">申请活动</button>
                                        </form>
                                    @else
                                        <a class="applybtn" onclick="alert('请先登录')" style="padding:2px 5px; border:0px; background:#C30; color:#ffffff; border-radius:4px;">申请活动</a>
                                    @endif

                                @endif

                            </div>
                        </li>
                        <div style="clear: both;"></div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection