@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/activity.css') }}">
    <style>
        .mb2{
            margin-top: 193px;
        }
        .mb4{
            margin-top: 97px;
        }
        .mb6{
            margin-top: 165px;
        }
        .mb12{
            margin-top: 112px;
        }
        #mb1{
            top:83px;
        }

        #mb2,#mb3,#mb4,#mb5,#mb6,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb16,#mb17,#mb18,#mb19,#mb20,#mb15,#mb21,#mb22{
            top:49px;
        }
        #mb8{
            top:91px;
        }
    </style>
    <div id="{{$mb_path}}" class="notice-row">
        <div class="noticeBox">
            <div class="w">
                <div class="title">
                    最新公告：
                </div>
                <div class="bd2">
                    <div id="memberLatestAnnouncement" style="cursor:pointer;color:#fff;">
                        <marquee id="mar0" scrollamount="4" direction="left" onmouseout="this.start()"
                                 onmouseover="this.stop()">
                            @foreach($_system_notices as $v)
                                <div class="module" style="display: inline-block;">
                                    <span>~{{ $v->title }}~</span>
                                    <span>{{ $v->content }}</span>
                                </div>
                            @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="{{$mb_path}}" id="banner"></div>
    <div class="activity">
        <div class="myhot">
            <ul class="hleft">

                <li>
                    <a href="{{route('web.activityList')}}">
                        <span @if ( !request()->get('type') )class="ok" @endif>全部活动</span>
                    </a>
                </li>
                @foreach(config('platform.activity_type') as $k => $v)
                    <li>
                        <a href="{{route('web.activityList',['type'=>$k])}}">
                            <span @if (request() -> get('type') == $k)class="ok" @endif>{{$v}}</span>
                        </a>
                    </li>
                @endforeach
                <li style="float:right">
                    @if($_member)
                        @if($_system_config->is_new_center==1)
                            <a href="{{ route('member.userCenter') }}"><span>申请进度查询</span></a>
                        @else
                            <a href="{{ route('member.my_activity') }}"><span>申请进度查询</span></a>
                        @endif
                    @else
                        <a href="javascript:void(0)" onclick="return layer.msg('请先登录!',{icon:6})"><span>申请进度查询</span></a>
                    @endif
                </li>
            </ul>
            <div class="hright">
                @foreach($data as $item)
                <dl data-id="34">
                    <dd>
                        <img src="{{ $item->title_img }}" width="1020" style="opacity: 1;height: 159px">
                    </dd>
                    <dt>
                        {{--<span class="title">{{ $item->title }}</span>
                        <span class="actime">活动时间：{{ $item->start_at }} -- {{ $item->end_at }}</span>--}}
                        @if($item->is_apply == 0)

                            @if($_member)
                                <form action="{{ route('member.apply_activity') }}" method="post">
                                    <input type="hidden" name="activity_id" value="{{ $item->id }}">
                                    <button class="applybtn ajax-submit-without-confirm-btn">申请活动</button>
                                </form>
                            @else
                                <a class="applybtn" onclick="return layer.msg('请先登录!',{icon:6})">申请活动</a>
                            @endif

                        @endif
                        <div class="hotcontent">
                        {!! $item->title_content !!}
                        {!! $item->content !!}
                        {!! $item->rule_content !!}
                        </div>
                    </dt>
                </dl>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        $(".myhot .hright dl dd img").click(function () {
            $(this).parent().parent().children("dt").children(".hotcontent").slideToggle(200)
        })
    </script>
@endsection