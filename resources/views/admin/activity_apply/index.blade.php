@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">申请列表</h3>
            </div>
            <div class="panel-body">
                @include('admin.activity_apply.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
						<td><input type="checkbox" class="checkall"/></td>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">活动类型</th>
                        <th style="width: 10%">申请用户</th>
                        <th style="width: 40%">申请主题</th>
                        <th style="width: 10%">赠送比例</th>
                        <th style="width: 10%">赠送上限</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
							<td><input type="checkbox" name="delcheck" value="{{ $item->id }}"/></td>
                            <td>
                                {{ $item->id }}
                            </td>							
                            <td>
								@foreach(config('platform.activity_type') as $k => $v)
									@if($k == $item->activity->type) {{ $v }} @endif
								@endforeach
                            </td>
                            <td>
                                {{ $item->member->name }}
                            </td>
                            <td>
                                {{ $item->activity->title }}
                            </td>
                            <td>
                                {{ $item->activity->rate }}
                            </td>
                            <td>
                                {{ $item->activity->gift_limit_money }}
                            </td>
                            <td>
								@if($item->status == 1)
								<a href="{{ route('activity_apply.show', ['id' => $item->id]) }}" class="btn btn-primary btn-xs">通过</a>
								<button type="button" class="btn btn-danger btn-xs" data-uri="{{ route('activity_apply.update', ['id' => $item->id]) }}" onclick="showRemark(this)">不通过</button>									
								@endif
								@if($item->status == 2)
								<a href="javascript:void(0)" class="btn btn-primary btn-xs">审核通过</a>
								@endif
								@if($item->status == 3)
								<a href="javascript:void(0)" class="btn btn-danger btn-xs">未通过</a>
								@endif								
                            </td>
                        </tr>
					@endforeach
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
					 <div class="pull-right" style="margin: 0;">
						 {!! $data->links() !!}
					 </div>
                </div>

            </div>
        </div>
    </section><!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">不通过原因</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal" id="updateReason">
                        
                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fail_reason" class="col-sm-3 control-label"><span style="color: red">不通过原因</span></label>
                                <div class="col-sm-8">
                                    <textarea name="fail_reason" id="fail_reason" rows="3" required class="form-control"></textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info btn-flat">提交</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>	
	
    <script>
		
		$(".checkall").on('click', function(){ 
			if(this.checked){
				$("input[name='delcheck']").prop('checked', true)
			}
			else
			{ 
				$("input[name='delcheck']").prop('checked', false)
			}
		});
		
		$('#delAll').on('click', function(){
			var delIds = [];
            $.each($("input[name='delcheck']:checkbox:checked"),function(){
                delIds.push($(this).val());
            });
			
			if(delIds.length < 1)
			{
				alert('请选择要删除的记录');
				return false;
			}
			else
			{
				$(this).attr('data-ids', delIds);
			}
		});
	
        function showRemark(e)
        {
            var uri = $(e).attr('data-uri');
            $('#updateReason').attr('action',uri)
            $('#myModal').modal('show');
        }
    </script>
@endsection
@section("after.js")
     @include('admin.layouts.deleteall',['title'=>'操作提示','content'=>'你确定要删除所有选中的记录么?'])
@endsection