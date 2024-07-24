@php($path = 'member.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
	<div id="layout-main-area">
		<div id="main-menu">
			<div class="menu-area">
				<ul class="list-group">
					<ul class="list-group">
						<li class="list-group-item system-message">
							<a href="{{ route('member.service_center') }}">公告信息</a>
						</li>
						<li class="list-group-item complaint">
							<a href="{{ route('member.complaint_proposal') }}">意见反馈</a>
						</li>
						<li class="list-group-item activity active">
							<a href="JavaScript:void(0)">活动列表</a>
						</li>
						<li class="list-group-item mymessage">
							<a href="{{ route('member.message_list') }}">我的消息</a>
						</li>
					</ul>
				</ul>
			</div>
		</div>

		<div id="main-container">
			<div class="module-main" style="height: 630px; overflow: auto;margin-top:10px;">
				@if(isset($data) && count($data) > 0)
					<ul class="list-group">
						@foreach($data as $item)
							<li class="list-group-item message-item">
								<div class="message-title">{{ $item->activity->title }}</div>
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