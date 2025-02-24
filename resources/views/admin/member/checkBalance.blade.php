@extends('admin.layouts.basic')
@section('content')
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="{{ route('member.checkBalance', ['id' => $id]) }}" aria-controls="settings" role="tab" data-toggle="tab">接口余额</a></li>
                <li role="presentation"><a href="{{ route('member.showGameRecordInfo', ['id' => $id]) }}" aria-controls="home" role="tab" data-toggle="tab">历史输赢</a></li>
                <li role="presentation"><a href="{{ route('member.showRechargeInfo', ['id' => $id]) }}" aria-controls="profile" role="tab" data-toggle="tab">历史充值</a></li>
                <li role="presentation"><a href="{{ route('member.showDrawingInfo', ['id' => $id]) }}" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation"><a href="{{ route('member.showDividendInfo', ['id' => $id]) }}" aria-controls="settings" role="tab" data-toggle="tab">历史红利</a></li>
                <li role="presentation"><a href="{{ route('member.showTransfer', ['id' => $id]) }}" aria-controls="settings" role="tab" data-toggle="tab">平台转账记录</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">接口余额</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="margin-bottom: 10px;">
                        <form action="" method="get" id="searchForm">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">中心账户余额:</span>
                                    <span id="zong">{{ $data->money }}</span>
                                    <span class="input-group-addon">码量</span>
                                    <input type="text" name="ml_money" class="form-control" value="{{ $data->ml_money }}" style="width:100px;">
                                    <button type="submit" class="btn btn-primary">提交</button>&nbsp;
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-warning" id="shuaxin">刷新接口余额</button>&nbsp;
                            <button type="button" class="btn btn-warning" id="transfer">资金回收</button>&nbsp;
                            <a href="/admin/member/edit2/{{$data->id}}" target="_blank"><button type="button" class="btn btn-warning" >加扣款</button>&nbsp;</a>
                        </form>
                    </div>

                    <?php
                    $api_mod= \App\Models\Api::where('on_line', 0)->orderBy('created_at', 'desc')->get()->pluck('id')->toArray();

                    ?>
                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 25%">接口名称</th>
                            <th>余额</th>
                        </tr>
                        @foreach($apis as $item)
                            
                            <tr>
                                <td>
                                    {{ $item->api_name }}
                                </td>
                                <td>
                                    <span class="balance">{{ $item->money }}</span>
                                    <a class="refresh" href="javascript:void(0)"  data-uri="{{ route('api.balance', ['id' => $id, 'api_name' => $item->api_name]) }}" data-code="{{$item->api_name}}"></a>
                                </td>
                            </tr>
                                
                        @endforeach
                        
                        
                        @foreach($data->apis as $item)
                            @if($item->api)
                            @if(in_array($item->api->id,$api_mod))
                            <!--<tr>-->
                            <!--    <td>-->
                            <!--        {{ $item->api->api_name }}-->
                            <!--    </td>-->
                            <!--    <td>-->
                            <!--        <span class="balance">{{ $item->money }}</span>-->
                            <!--        <a class="refresh" href="javascript:void(0)"  data-uri="{{ route('api.balance', ['id' => $id, 'api_name' => $item->api->api_name]) }}"></a>-->
                            <!--    </td>-->
                            <!--</tr>-->
                                @endif
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>

        </section><!-- /.content -->
    </div>
@foreach($apis as $item)
    	<p style="color: #d2b79c;" class="gamecode" data-code="{{$item->api_name}}"> </p>
	@endforeach
    <script>
        $(function(){

            $('.refresh').on('click',function(){
                var _this=$(this);
                var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
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
                        // if (data.Code != 0)
                        // {
                        //     alert(data.Message);
                        //     return ;
                        // }
                        if(_this.data('code')=='KY_HK'){
                            pos.html((data.Data/2).toFixed(2)+'元');
                        }else{
                            pos.html(data.Data+'元');
                        }
                    },
                    error: function (err, status) {
                        console.log(err)
                    }
                })
            })
        });
        
        $('#shuaxin').click(function(){
            $('.refresh').click()
        })
        
        $('#transfer').click(function(){
    	    var that = $(this);
    	    that.text('回收中...');
    	    var len = $('.gamecode').length;
    	    $('.gamecode').each(function(k,v){
    	        var _this = $(this);
                $.ajax({
                    url:'/admin/transfer_all',
                    type:'post',
                    data:{api_name:_this.data('code'),transfer_type:1,name:"{{$data->name}}"},
                    success:function(res){
						if(res > 0){
						        $('#zong').text(res)
						    }
						if(k >= len-1){
						    
						    
						    setTimeout(function(){
						        $('.refresh').click()
						    },1000)
						    
						}
                    },error:function(res){
                        
                    }
                })
    		});
    	    setTimeout(function(){
    		    that.text('資金回收');
    		},2000)
    	})
    </script>

@endsection