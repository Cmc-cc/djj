@php($path = 'member.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
<?php
  use App\Models\SystemConfig;
 $sys = SystemConfig::findOrfail(1);
 $mz_open=$sys->mz_open;
?>
<div id="main-container">
	<div class="member-exchange-module-index">
		<div class="module-top" style="margin-bottom:0;">
			<div class="list-head-container" style="width: 920px; height: 31px;">
				<div class="list-head" style="width: 920px;">
					<div class="col-xs-8" style="padding:0;">
						<div class="col-xs-3">我的厅室</div>
						<div class="col-xs-3">余额</div>
						<div class="col-xs-6">按键操作</div>
					</div>
					@if(!$mz_open)
					<div class="col-xs-4"><span>额度转换</span></div>
				    @endif
				</div>
			</div>
		</div>
		<div class="module-main" style="height: 630px; overflow: auto;padding:0">
				<div class="col-xs-8 exchange" style="padding:0">
					<table class="table table-striped table-bordered">
						<tbody>
						<?php
						$own_api_list = $_member->apis()->pluck('api_id')->toArray();
						?>						
						@foreach($api_mod as $key=>$item)
							<?php
							$mod = '';
							if (in_array($item->id, $own_api_list))
								$mod = $_member->apis()->where('api_id', $item->id)->first();
							?>						
							<tr class="api_{{$item->api_name}}">
								<td class="col-xs-3">{{ $item->api_title }}</td>
								<td class="col-xs-3 exchange-money"><span class="newpos">@if($mod) {{ $mod->money }}元  @else N/A @endif</span><a href="javascript:;" class="refresh" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"></a></td>
								<td class="col-xs-6">
									
									@if($item->is_target == 1)
										<a class="btn btn-sm btn-default" href="{{ $item->start_game_link }}" target="_blank">开始游戏</a>
									@else
										<a class="btn btn-sm btn-default" onclick="javascript:window.open('{{ $item->start_game_link }}','','width=1024,height=768')">开始游戏</a>
									@endif
								</td>
							</tr>
						@endforeach									
						</tbody>
					</table>						
				</div>
				<div class="col-xs-4">
                        @if(!$mz_open)
						<div class="exchange-area">																		
							<div class="turn-action text-center">
								<a href="JavaScript:void(0)" class="turn-in-action active">转入</a>
								<a href="JavaScript:void(0)" class="turn-out-action">转出</a>
							</div>
							<div class="turn-area turn-in">
								<form action="{{ route('member.post_transfer') }}" method="post">
									<div class="form-group">
										<label class="col-xs-3 control-label">从</label>
										<div class="col-xs-9">
											<select class="form-control" name="account1">
												<option value="1">主账户</option>
												<option value="0">红利账户 </option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">到</label>
										<div class="col-xs-9">
											<select class="form-control" name="account2">
											@foreach($api_mod as $item)
												<option value="{{ $item->id }}">{{ $item->api_title }}</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">金额</label>
										<div class="col-xs-9">
											<input type="number" class="form-control" name="money">
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label"></label>
										<div class="col-xs-9">
											<input type="hidden" name="transfer_type" value="0">
											<button type="button" class="btn btn-primary form-control ajax-submit-without-confirm-btn">确定转入</button>
										</div>
									</div>
								</form>
							</div>
							<div class="turn-area turn-out" style="display:none;">
								<form action="{{ route('member.post_transfer') }}" method="post">
									<div class="form-group">
										<label class="col-xs-3 control-label">从</label>
										<div class="col-xs-9">
											<select class="form-control" name="account2">
											@foreach($api_mod as $item)
												<option value="{{ $item->id }}">{{ $item->api_title }}</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">到</label>
										<div class="col-xs-9">
											<select class="form-control" name="account1">
												<option value="1">主账户</option>
												<option value="0">红利账户</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label">金额</label>
										<div class="col-xs-9">
											<input type="number" class="form-control" name="money">
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 control-label"></label>
										<div class="col-xs-9">
											<input type="hidden" name="transfer_type" value="1">
											<button type="button" class="btn btn-warning form-control ajax-submit-without-confirm-btn">确定转出</button>
										</div>
									</div>
								</form>
							</div>							
						</div>
                        @endif
					<div class="info-container" style="padding:8px;">
						<div class="heading">我的额度</div>
						<div class="info">
							<p class="item-info">账户余额：<span>{{ $_member->money }}</span> 元</p>
							<p class="item-info">剩余码量：<span>{{ $_member->ml_money }}</span> 元</p>
						</div>
					</div>
					<div class="info-container" style="padding:8px;">
							<div class="heading">友情提示</div>
							<div class="info">
								<p class="item-info" style="margin-bottom:10px"><font color="red">一键转入</font>将把账户余额一次性转入到对应游戏余额。</p>
								<p class="item-info"><font color="red">一键转出</font>将把对应游戏余额一次性转出到账户余额。</p>
							</div>
						</div>							
				</div>
	
		</div>
	</div>
</div>
<script>
    $(function(){
		
		$('.turn-in-action').on('click', function(){
			$('.turn-in').show();
			$('.turn-out').hide();
			$(this).addClass('active');
			$('.turn-out-action').removeClass('active');
		});
		$('.turn-out-action').on('click', function(){
			$('.turn-out').show();
			$('.turn-in').hide();
			$(this).addClass('active');
			$('.turn-in-action').removeClass('active');
		});		
		
        $('.refresh').on('click',function(){
            var _this=$(this);
            var pos = _this.parent('.exchange-money').find('span');
            _this.css({
                'background':'url({{ asset("/web/images/h-u-loading2.gif") }}) no-repeat center center'
            })
            $.ajax({
                type : 'GET',
                url : _this.attr('data-uri'),
                data : '',
                contentType : "application/json; charset=utf-8",
                success : function(data){

                    _this.css({
                        'background':'url({{ asset("/web/images/bg-ico.png") }}) no-repeat center center',
                        'background-position': '-80px -102px'
                    })
                    if (data.Code != 0)
                    {
                        alert(data.Message);
                        return ;
                    }
                    pos.html(data.Data+'元');
                },
                error: function (err, status) {
                    //console.log(err)
                }
            })
        });
        $('.refresh_GetUserPlatform').on('click',function(){
            var _this=$(this);
            $.ajax({
                type : 'GET',
                url : _this.attr('data-uri'),
                data : '',
                contentType : "application/json; charset=utf-8",
                success : function(data){

                    if (data.retCode != 0)
                    {
                        alert(data.retMsg);
                        return ;
                    }
                    $.each(JSON.parse(data.retMsg), function(i, item){
                        $(".api_"+i+" .exchange-money").find('span').html(item+'元');
                        if(i == "BB"){
                            $(".api_BBIN .exchange-money").find('span').html(item+'元');
						}
                        if(i == "SunBet"){
                            $(".api_SUNBET .exchange-money").find('span').html(item+'元');
                        }
                    });
//                    pos.html(data.Data+'元');
                },
                error: function (err, status) {
                    //console.log(err)
                }
            })
        });

		// $('.exchange-money .refresh').each(function(){
			// $(this).trigger('click');
		// });
    });
</script>
@endsection
