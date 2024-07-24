<div class="weihuan-aside">
	<div class="content">
		<div class="call" style="background-image: url({{ asset('/web/mb21/images/aside.png') }});">
			<span>联系我们</span>
		</div>
		<div class="list">
			<li onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=573,height=407')"><img class="icon" src="{{ asset('/web/mb21/images/call.png') }}">7x24 在线客服</li>
			<li><img class="icon" src="{{ asset('/web/mb21/images/email.png') }}">{{ $_system_config->qq }}</li>
			<li><img class="icon" src="{{ asset('/web/mb21/images/email.png') }}">{{ $_system_config->agent_qq }}</li>
			{{-- <li><img class="qr-code" src="{{ $_system_config->wx_pic }}"></li> --}}
			<li class="gotop">返回顶部</li>
		</div>
	</div>
</div>
@if($_system_config->is_hongbao ==1)
<div class="weihuan-aside-red"><a href="{{ route('web.red') }}"target="_blank"><img src="{{ asset('/web/mb21/images/hb.png') }}"></a></div>
@endif