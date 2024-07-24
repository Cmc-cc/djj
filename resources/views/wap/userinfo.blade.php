@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
	<?php
	 use App\Models\SystemConfig;
	 $sys = SystemConfig::findOrfail(1);
	 $mz_open=$sys->mz_open;
	?>
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
                    会员资料
                </div>
                <div class="m_userCenter-line"></div>
                <div class="userInfo">
                    <dl>
                        <dt>账户安全</dt>
                        <dd>
                            <div class="pull-left">
                                会员账户
                            </div>
                            <div class="pull-right">
                                {{ $_member->name }}
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">手机号码</div>
                            <div class="pull-right">
                                @if ($_member->phone)
                                    {{ $_member->phone }}
                                @else
                                    <a href="{{ route('wap.set_phone') }}" class="c_blue">未设置</a>
                                @endif
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">注册时间</div>
                            <div class="pull-right">{{ $_member->created_at }}</div>
                        </dd>
                        <dd>
                            <div class="pull-left">最后登录时间</div>
                            <div class="pull-right">{{ $_member->last_login_time }}</div>
                        </dd>
                    </dl>
                    <dl>
                        <dt>财务信息</dt>
                        <dd>
                            <div class="pull-left">中心账户余额</div>
                            <div class="pull-right">
                                <strong id="money">{{ $_member->all_money }}</strong>元
                                {{--<a href=""> <img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>--}}
                            </div>
                        </dd>
						<dd>
                            <div class="pull-left">剩余码量：</div>
                            <div class="pull-right">
                                <strong id="money">{{ $_member->ml_money }}</strong>元
                                {{--<a href=""> <img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>--}}
                            </div>
                        </dd>
						
                        {{--<dd>--}}
                            {{--<div class="pull-left">反水账户余额</div>--}}
                            {{--<div class="pull-right">--}}
                                {{--{{ $_member->fs_money }}元--}}
                                {{--<a href=""> <img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>--}}
                            {{--</div>--}}
                        {{--</dd>--}}
                        <?php
                        $own_api_list = $_member->apis()->pluck('api_id')->toArray();
                        ?>
                        @foreach($_api_list as $k => $v)
                    <?php
                    $mod = '';
                    if (in_array($k, $own_api_list))
                        $mod = $_member->apis()->where('api_id', $k)->first();
					
					if($mz_open && $k==251){
                    ?>
                    <dd>
                           <div class="pull-left">WG余额</div>
                        <div class="pull-right">
                            <span class="balance_span">0.00</span> <a href="javascript:;"  class="api_check" data-uri="{{ route('member.api.check') }}?api_name=AG"><img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                        </div>
                    </dd>
					<?php }else if(!$mz_open){ ?>
					<dd>
                           <div class="pull-left">{{ $_api_list_1[$k] }}余额</div>
                        <div class="pull-right">
                            <span class="balance_span">{{ $mod?$mod->money:'未开通' }}</span> <a href="javascript:;"  class="api_check" data-uri="{{ route('member.api.check') }}?api_name={{ $v }}"><img src="{{ asset('/wap/images/user_refresh.png') }}" alt=""></a>
                        </div>
                    </dd>
					
					<?php } ?>
                @endforeach
                    </dl>
                    <dl>
                        <dt>提现信息</dt>
                        <dd>
                            <div class="pull-left">开户姓名</div>
                            <div class="pull-right">{{ $_member->bank_username }}</div>
                        </dd>
                        <dd>
                            <div class="pull-left">提款银行</div>
                            <div class="pull-right">
                                @if ($_member->bank_name)
                                    {{ $_member->bank_name }}
                                @else
                                    <a href="{{ route('wap.bind_bank') }}" class="c_blue">未设置</a>
                                @endif
                            </div>
                        </dd>
                        <dd>
                            <div class="pull-left">银行账户</div>
                            <div class="pull-right">
                                @if ($_member->bank_card)
                                    {{ $_member->bank_card }}
                                @else
                                    <a href="{{ route('wap.bind_bank') }}" class="c_blue">未设置</a>
                                @endif
                            </div>
                        </dd>
                        {{--<dd>--}}
                            {{--<div class="pull-left">开户银行地址</div>--}}
                            {{--<div class="pull-right">--}}
                                {{--@if ($_member->bank_address)--}}
                                    {{--{{ $_member->bank_address }}--}}
                                {{--@else--}}
                                    {{--<a href="{{ route('wap.bind_bank') }}" class="c_blue">未设置</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</dd>--}}
                    </dl>
                </div>

            </div>
        </div>
    </div>
    {{--<script>--}}
        {{--$('.api_check').each(function () {--}}
            {{--var a = $(this);--}}
            {{--var span = a.parent().find('.balance_span')--}}
            {{--var url = a.attr('data-uri');--}}
            {{--$.get(url, function (data) {--}}
                {{--//data = JSON.parse(data)--}}
                {{--span.html(data.Data + '元');--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
    <script>
	
        (function ($) {
			/*
            $.ajax({
                type:'post',
                url : "{{route('member.api.wallet_balance')}}",
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if(data.statusCode == '01'){
                        var all = Number($('#money').text()) + Number(data.data);
                        $('#money').text('');
                        $('#money').text(parseInt(all.toFixed(2)));
                    }
                }
            })
			*/
            var $loading_img="{{asset('/wap/images/loading.gif')}}";
            var $refresh_img="{{asset('/wap/images/user_refresh.png')}}";
            $(function () {
                $('.api_check').on('click', function () {
                    var $img = $(this).find('img');
                    var $uri=$(this).attr('data-uri');
                    var $span=$(this).prev('.balance_span');
                    $img.attr('src',$loading_img);
                    $.get($uri, function (data) {
                        //data = JSON.parse(data)
                        $img.attr('src',$refresh_img);
                        $span.html(data.Data + '元');
                    });
                });
            });
        })(jQuery);
    </script>

@endsection