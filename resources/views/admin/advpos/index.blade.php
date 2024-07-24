@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">焦点图列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.advpos.filter')
                 <h3 style="color: red" class="text-center"> 可根据排序调整位置</h3>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th style="width: 10%">标题</th>

                         <th style="width: 5%">排序</th>
						<th style="width: 20%">图片</th>
                        
                        <th style="width: 5%">类型</th>
                        
                         <th style="width: 8%">链接</th>

                         <th  style="width: 10%">最后更新时间</th>
                         <th  style="width: 10%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->title }}
                             </td>
                             <td>
                                 {{ $item->sort }}
                             </td>
                             <td>
                                <img src=" {{ $item->path }}"  width="150" height="50"/>
                             </td>
                             <td>
                             	@if ($item->type == 1)
                                
                                  电脑端
                                @endif	
                             
                             	@if ($item->type == 2)
                                
                                  手机端
                                @endif	
                                
                                
                                @if ($item->type == 3)
                                
                                  左下角
                                @endif	
                                
                                
                                 
                             </td>
                             <td>
                                 {{ $item->jumpurl }}
                             </td>
                             							 
                             <td>
                                 {{ $item->updated_at }}
                             </td>
                             <td>
                                 <a href="{{ route('advpos.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="{{route('advpos.destroy', ['id' => $item->getKey()])}}"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     删除
                                 </button>
                             </td>
                         </tr>
                     @endforeach
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     {!! $data->render() !!}
                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条记录吗?'])
@endsection