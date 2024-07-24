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
            <div class="m_member-title clear textCenter" >
                <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
                {{ $data->title }}
            </div>
            <div class="m_userCenter-line"></div>
            <div class="m_activityDetail">
                <h3 class="title t_1">{{ $data->title }}</h3>
                {!! $data->title_content !!}
                {{--<h3 class="title t_2">活动说明</h3>--}}
                {!! $data->content !!}
                {{--<h3 class="title t_3">活动规则</h3>--}}
                {!! $data->rule_content !!}
				@if($data->is_apply==0)
                    @if($_member)
                        <form action="{{ route('member.apply_activity') }}" method="post">
                            <input type="hidden" name="activity_id" value="{{ $data->id }}">
                            <div class="applybtn shenqin ajax-submit-without-confirm-btn" style="margin:0 auto;background:#09bd09;padding:5px 10px;text-align:center;border-radius:15px;color:#fff;display:block">申请活动</div>
                        </form>
                    @else
                        <a class="applybtn shenqin" onclick="alert('请先登录')" style="margin:0 auto;background:#09bd09;padding:5px 10px;text-align:center;border-radius:15px;color:#fff;display:block">申请活动</a>
                    @endif
				@endif
            </div>
        </div>
    </div>
   <script>
        (function($){
            $(function () {

               
				$('.shenqin').click(function(){
				
                    var aid=$(this).data('id');
                    $.ajax({
						 type: "POST",
						 url: "{{ route('member.apply_activity') }}",
						 data: {activity_id:aid},
						 dataType: "json",
						 success: function(data){
                
                            var html = '';
                            var obj = JSON.parse (data.status.msg);

                            for ( var p in obj )
                            {
                                if (typeof (obj[p]) == 'string')
                                {
                                    html+= '<p><b>'+ obj[p] + '</b></p>';
                                } else if(obj[p] instanceof Array)
                                {
                                    for (var i=0;i<obj[p].length;i++)
                                    {
                                        html+= '<p><b>'+ obj[p][i] + '</b></p>';
                                    }

                                }
                            }
                            
                            layer.open({
                                content: html,
                                //time: 1.5,
                                style: 'color: #333; background-color: #fff; width: auto'
                            });

                         },
						 error: function (err, status) {
							 console.log(err)
						 }
					 });
                })
            })
        })(jQuery)
    </script>	
@endsection