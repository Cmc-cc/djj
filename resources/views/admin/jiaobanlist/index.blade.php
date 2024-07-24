@extends('admin.layouts.main')
@section('content')
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">焦点图列表</h3>
             </div>
             <div class="panel-body">
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 20%">时间</th>

                         <th style="width: 10%">类型</th>
						<th style="width: 10%">充值</th>
                        
                        <th style="width: 10%">提现</th>
                        
                         <th style="width: 10%">红利</th>
                         
                         <th style="width: 10%">代理<br/>佣金</th>
                        <th style="width: 10%">盈利</th>
                     </tr>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->createtime }}
                             </td>
                             <td>
                                 @if ($item->type==1)晚班@else白班@endif
                             </td>
                             <td>
                                 {{ $item->recharge }}
                             </td>
                             <td>
                                 {{ $item->drawing }}
                             </td>
                             <td>
                             	    {{ $item->dividend }}
                             </td>
                             
                             <td>
                             	    
                             </td>
                             <td>
                             	    {{ $item->recharge-$item->drawing }}
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