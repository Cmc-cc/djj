@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员加/减款操作</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="{{ route('member.update2', ['id' => $data->getKey()]) }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name"  placeholder="用户名" value="{{ $data->name }}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="money" class="col-sm-2 control-label">中心账户余额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="money-all" name="money"  value="{{ $data->money }}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">类型</label>
                            <div class="col-sm-7">
                                <label><input name="money_type" type="radio" value="in" />加款 </label>
                                <label><input name="money_type" type="radio" value="out" />扣款 </label>
                                <input type="number" name="my_money" min="1">
                                <a id="transfer" style="cursor:pointer;">資金回收</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark" class="col-sm-2 control-label">码量倍数</label>
                             
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="ml_money" name="ml_money"  value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">红利类型</label>
                            <div class="col-sm-7">
                            <select name="type" id="type" class="form-control">
                                <option value="">--请选择--</option>
                                {{--@foreach(config('platform.dividend_type') as $k =>$v)
                                    <option value="{{ $k }}" >{{ $v }}</option>
                                @endforeach--}}
                                <option value="1">充值</option>
                                <option value="5">优惠活动</option>
                                <option value="3">游戏返水</option>
                                <option value="10">其他</option>
                            </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="remark" class="col-sm-2 control-label">备注</label>
                             
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="remark" name="remark"  value=""/>
                            </div>
                        </div>
						 
                     
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('member.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
    
    @foreach($apis as $item)
    	<p style="color: #d2b79c;" class="gamecode" data-code="{{$item->api_name}}"> </p>
	@endforeach
@endsection
@section('after.js')
    <script>
        @if($data->is_trans_on ==1)
        $(function(){
            var name = '{{$data->name}}';
            var id = '{{$data->id}}';
            $.ajax({
                type:'get',
                url : "{{ route('member.get_money') }}",
                data : {name:name,id:id},
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if (data.Code != 0)
                    {
                        alert(data.Message);
                        return ;
                    }else{
                        $('input[name=money]').val('');
                        $('input[name=money]').val(data.Data);
                    }
                }
            })
        })
        @endif
        
        $('#transfer').click(function(){
    	    var that = $(this);
    	    that.text('回收中...');
    	    $('.gamecode').each(function(k,v){
    	        var _this = $(this);
                $.ajax({
                    url:'/admin/transfer_all',
                    type:'post',
                    data:{api_name:_this.data('code'),transfer_type:1,name:"{{$data->name}}"},
                    success:function(res){
						$('#money-all').val(res)
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