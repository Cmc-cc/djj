@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.css') }}">
    <script src="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">会员列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.member.filter')
<?php
                 use App\Models\SystemConfig;
				 $sys = SystemConfig::findOrfail(1);
				 $mz_open=$sys->mz_open;
                 $ag = (new \App\Models\Api())->where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
                 $ags =(new \App\Models\Api())->where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();
?>
                 <table id="tab" class="table table-bordered table-hover text-center">
                     <thead>
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th class="text-center" style="width: 5%">用户名</th>
                         <th  style="width: 5%">中心账户</th>
                         <th  style="width: 5%">剩余码量</th>
                         <th  style="width: 5%">来源地址</th>
                         <th  style="width: 5%">真实姓名</th>
                         <th  style="width: 5%">代理/上级</th>
                         <th  style="width: 5%">手机/邮箱</th>
						 <th  style="width: 5%">AG私网</th>
						 <th  style="width: 5%">申博私网</th>
                         <th  style="width: 5%">QQ/微信</th>
                         <th  style="width: 5%">注册IP</th>
                         <th  style="width: 5%">注册时间</th>
						 <th  style="width: 5%">打码限制</th>
                         <th  style="width: 5%">状态</th>
                         <th  style="width: 5%">在线</th>
                         @if($ag && $ag->on_line==0&& $ags &&$ags->on_line==0)
						 {{-- <th  style="width: 5%">AGS</th>--}}
                         @endif
                         <th  style="width: 25%">操作</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->name }}
                             </td>
                             <td>
                                 <span>{{ $item->money }}</span>
								 <?php if($mz_open){ ?>
                                 <a href="javascript:void(0)" data-uri="{{ route('member.get_money',['id'=>$item->id,'name'=>$item->name]) }}" class="refresh" style="vertical-align: top"></a>
								 <?php } ?>
                             </td>
                             <td>
                                 {{ $item->ml_money }}
                             </td>
                             <td>
                                 {{ $item->register_url }}
                             </td>
                             <td>
                                 {{ $item->real_name }}
                             </td>
                             <td>
                                 @if ($item->is_daili == 1)
                                     <span style="color: red">是</span>
                                 @else
                                     <span>否</span>
                                 @endif
                                 /{{ $item->top_member->name or '' }}
                             </td>
                             <td>
                                 {{ $item->phone }}/{{ $item->email }}
                             </td>
							 <td>
							     @if ($item->ag2ags == 0)
                                     <button type="button" class="btn btn-danger btn-xs" onclick="changeline('ag2ags','1','{{ $item->id }}');">下线</button>
                                 @else
                                     <button type="button" class="btn btn-success btn-xs" onclick="changeline('ag2ags','0','{{ $item->id }}');">上线</button>
                                 @endif
                             </td>
							 <td>
							     @if ($item->sunbet2sunbets == 0)
                                     <button type="button" class="btn btn-danger btn-xs" onclick="changeline('sunbet2sunbets','1','{{ $item->id }}');">下线</button>
                                 @else
                                     <button type="button" class="btn btn-success btn-xs" onclick="changeline('sunbet2sunbets','0','{{ $item->id }}');">上线</button>
                                 @endif
                             </td>
                             <td>
                                 {{ $item->qq }}/{{ $item->weixin }}
                             </td>
                             <td>
                                 {{ $item->register_ip }}
                             </td>
                             <td>
                                 {{ $item->created_at }}
                             </td>
							 <td>
                                 @if($item->open_dml==1) <a href="{{ route('member.checkdama', ['id' => $item->getKey()]) }}" class="btn btn-danger btn-xs">关闭</a> @else <a href="{{ route('member.checkdama', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">开启</a> @endif
                             </td>
                             <td>
                                 {!! \App\Models\Base::$MEMBER_STATUS_HTML[$item->status] !!}
                             </td>
                             <td>
                                 @if(in_array($item->id, $_online_member_array)) 是  @else 否 @endif
                             </td>
                             @if($ag && $ag->on_line==0&& $ags &&$ags->on_line==0)
							 {{-- <td>
                                 @if($item->is_ag==1)
                                 <strong style="color:red;">禁用</strong>
                                     @elseif($item->is_ag=2)
                                 <strong style="color:green;">启用</strong>
                                     @endif
                                 @if($item->is_ag==1)
                                     <a href="{{ route('member.set_ag', ['id' => $item->getKey(), 'is_ag' => 2]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定启用吗？')">启用</a>
                                     @elseif($item->is_ag == 2)
                                     <a href="{{ route('member.set_ag', ['id' => $item->getKey(), 'is_ag' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定禁用吗？')">禁用</a>
                                 @endif
                             </td>--}}
                             @endif
                             <td>
                                 <button type="button" data-uri="{{ route('member.checkBalance', ['id' => $item->getKey()]) }}" class="btn btn-info btn-xs show-cate">查看</button>
                                 <a href="{{ route('member.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 <a href="{{ route('member.assign', ['id' => $item->getKey()]) }}" class="btn btn-warning btn-xs">分配代理</a>
                             @if ($item->status == 0)
                                    <a href="{{ route('member.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定禁用吗？')">禁用</a>
                                 @elseif($item->status == 1)
                                     <a href="{{ route('member.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定启用吗？')">启用</a>
                                 @endif
                                 <a href="{{ route('member.edit2', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">加/扣款</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="{{route('member.destroy', ['id' => $item->getKey()])}}"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     删除
                                 </button>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                     <div class="pull-right" style="margin: 0;">
                         {!! $data->appends(['name' => $name, 'status' => $status, 'register_ip' =>$register_ip,'on_line' => $on_line])->links() !!}
                     </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
     <script>
		 function changeline(field,status,id){
			 $.ajax({
						type : 'POST',
						url : '{{ route("member.check_status") }}',
						data : {"field":field,"status":status,"id":id},
						dataType : 'Json',
						success : function(data){

						   
							window.location.reload();
						},
						error: function (err, status) {
							console.log(err)
						}
					})
		 }
         $(function(){
             $('#tab').DataTable({
                 "scrollX": true,
                 "scrollY": false,
                 "ordering": false,
                 "paging" : false,
                 'info' : false,
                 'searching' : false
             });
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })
             $('.refresh').on('click',function(){
                 var _this=$(this);
                 var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
                 _this.css({
                     'background':'url({{ asset("/web/images/h-u-loading2.gif") }}) no-repeat center center'
                 })
				 <?php if($mz_open){ ?>
                 $.ajax({
                     type : 'GET',
                     url : _this.attr('data-uri'),
                     data : '',
                     contentType : "application/json; charset=utf-8",
                     dataType:'json',
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
                         console.log(err)
                     }
                 })
				 <?php } ?>
             });
             $('.refresh').trigger('click');
         });
     </script>
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'])
@endsection