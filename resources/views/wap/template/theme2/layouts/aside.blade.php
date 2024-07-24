<div id="u_nav" style="display: none">
    <ul class="u_bar">
        <li style="margin-bottom: 6px">
            <span>
                <img src="{{ asset('/wap/images/aside_usere.png') }}" alt="">账号：{{ $_member->name }}
                <br>
                <img src="{{ asset('/wap/images/aside_money.png') }}" alt="">余额：<em id="aside-money">{{ $_member->all_money }} </em>元
				<br>
                <img src="{{ asset('/wap/images/aside_money.png') }}" alt="">码量：<em id="aside-money">{{ $_member->ml_money }} </em>元
				
            </span>
            <em class="level">
                <a href="javascript:;">


                </a>
            </em>
        </li>
        <li style="margin-bottom: 6px">
            <a href="{{ route('wap.index') }}"><img src="{{ asset('/wap/images/aside_1.png') }}" alt="">首页</a>
            <i class="icon-angle-right"></i>
        </li>
		<?php
		 use App\Models\SystemConfig;
		 $sys = SystemConfig::findOrfail(1);
		 $mz_open=$sys->mz_open;
		 if(!$mz_open){
		?>
			<li><a href="{{ route('wap.transfer') }}"><img src="{{ asset('/wap/images/aside_2.png') }}" alt="">额度转换</a> <i class="icon-angle-right"></i></li>
		 <?php } ?>
        <li><a href="{{ route('wap.recharge') }}"><img src="{{ asset('/wap/images/aside_3.png') }}" alt="">在线充值</a> <i class="icon-angle-right"></i></li>
        <li style="margin-bottom: 6px"><a href="{{ route('wap.drawing') }}"><img src="{{ asset('/wap/images/aside_4.png') }}" alt="">在线提款</a> <i class="icon-angle-right"></i></li>
        @if($_system_config->is_fs==1)
        <li><a href="{{ route('wap.user_fs') }}"><img src="{{ asset('/wap/images/aside_2.png') }}" alt="">实时返水</a> <i class="icon-angle-right"></i></li>
        @endif
        <li><a href="{{ route('wap.recharge_record') }}"><img src="{{ asset('/wap/images/aside_5.png') }}" alt="">充值记录</a> <i class="icon-angle-right"></i></li>

        <li><a href="{{ route('wap.drawing_record') }}"><img src="{{ asset('/wap/images/aside_6.png') }}" alt="">提款记录</a> <i class="icon-angle-right"></i></li>
         <li><a href="{{ route('wap.transfer_record') }}"><img src="{{ asset('/wap/images/aside_7.png') }}" alt="">额度转换记录</a> <i class="icon-angle-right"></i></li>
		{{--<li><a  target="_blank" href="https://wg.a55a66.com"><img src="{{ asset('/wap/images/aside_8.png') }}" alt="">APP下载</a> <i class="icon-angle-right"></i></li>--}}
       <li style="margin-bottom: 6px"><a href="{{ route('wap.game_record') }}"><img src="{{ asset('/wap/images/aside_12.png') }}" alt="">投注记录</a> <i class="icon-angle-right"></i></li>

        <li><a href="{{ route('wap.userinfo') }}"><img src="{{ asset('/wap/images/aside_8.png') }}" alt="">会员资料</a> <i class="icon-angle-right"></i></li>
        <li><a href="{{ route('wap.agent') }}"><img src="{{ asset('/wap/images/aside_13.png') }}" alt="">代理中心</a> <i class="icon-angle-right"></i></li>
        <li style="margin-bottom: 6px"><a href="{{ route('wap.reset_password') }}"><img src="{{ asset('/wap/images/aside_9.png') }}" alt="">修改密码</a> <i class="icon-angle-right"></i></li>
        <li><a href="{{route('wap.msg')}}"><img src="{{ asset('/wap/images/aside_8.png') }}" alt="">站内信</a> <i class="icon-angle-right"></i></li>
        <li><a href="{{ $_system_config->service_link }}" target="_blank"><img src="{{ asset('/wap/images/aside_10.png') }}" alt="">在线客服</a> <i class="icon-angle-right"></i></li>
        <li><a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="{{ asset('/wap/images/aside_11.png') }}" alt="">安全退出</a> <i class="icon-angle-right"></i>
            <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
<script>
/*
    $.ajax({
        type:'post',
        url : "{{route('member.api.wallet_balance')}}",
        dataType : 'json',
        success : function (data) {
            //console.log(data);
            if(data.statusCode == '01'){
                var all = Number({{ $_member->all_money }}) + Number(data.data);
                $('#aside-money').text('');
                $('#aside-money').text(parseInt(all.toFixed(2)));
            }
        }
    })
*/	
</script>