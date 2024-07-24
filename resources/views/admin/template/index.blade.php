@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">前台模板列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.template.filter')
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th class="text-center">模板名称</th>
                         <th  style="width: 10%">客户端类型</th>
                         <th  style="width: 10%">模板路径</th>
                         <th  style="width: 10%">图片</th>
                         <th  style="width: 5%">默认</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->name }}
                             </td>
                             <td>
                                 @if($item->client_type==1)
                                     PC端
                                 @else
                                    手机端
                                 @endif
                             </td>
                             <td>
                                 {{$item->template_name}}
                             </td>
                             <td>
                                 <a target="_blank" href="{{$item->pic}}"><img style="width: 50px;height: 50px;" src="{{$item->pic}}"></a>
                             </td>
                             <td>
                                 @if($item->status==2)
                                     当前默认模板
                                 @else
                                     <a href="{{route('template.set',['id'=>$item->id,'client_type'=>$item->client_type])}}" class="btn btn-success btn-xs" onclick="return confirm('确定设置为默认模板吗？')">设置默认</a>
                                 @endif
                             </td>
                             <td>
                                 @if($item->client_type == 1)
                                 <a target="_blank" href="{{$url}}?preview={{$item->id}}" class="btn btn-info btn-xs">预览</a>
                                 @else
                                     <a target="_blank" href="{{$url}}/m?preview={{$item->id}}" class="btn btn-info btn-xs">预览</a>
                                 @endif
                                 <a href="{{ route('template.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 {{--<button class="btn btn-danger btn-xs"--}}
                                         {{--data-url="{{route('red.destroy', ['id' => $item->getKey()])}}"--}}
                                         {{--data-toggle="modal"--}}
                                         {{--data-target="#delete-modal"--}}
                                 {{-->--}}
                                     {{--删除--}}
                                 {{--</button>--}}
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