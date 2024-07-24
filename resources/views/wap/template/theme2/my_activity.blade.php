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
@extends('wap.template.theme2.layouts.header')
@section('content')
  <div class="m_container">
        <div class="m_body">
            <div class="m_member-title clear textCenter" >
                <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>

            </div>
            <div class="m_userCenter-line"></div>
            <div class="m_activityDetail" style="margin-top:20px;">
               @if(isset($data) && count($data) > 0)
                    <ul class="list-group">
                    @foreach($data as $item)
                        <li class="list-group-item message-item">
                            <div class="message-title" style="color:#232323;">{{ $item->activity->title }}</div>
                            <div class="message-content">
                                @if($item->status == 3)
                                    <font color="red">你的活动申请未通过，原因：{{ $item->fail_reason }}</font>
                                @endif
                                @if($item->status == 2)
                                    恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                @endif
                                @if($item->status == 1)
                                    <font color="blue">你的活动申请正在审核，请耐心等耐！</font>
                                @endif
                            </div>
                        </li>
                    @endforeach
                    </ul>
	@else
		<p class="text-center">暂无活动申请记录！</p>
	@endif		
            </div>
        </div>
    </div>











@endsection