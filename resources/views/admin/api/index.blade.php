@extends('admin.layouts.main')
@section('content')
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if($type == 5) class="active" @endif><a href="{{ route('apple.index') }}?type=5" >接口信息</a></li>
        </ul>
    </div>

    <div style="margin-top: 5px;">
        <form class="form-horizontal" id="form" action="{{ route('apple.update', ['id' => 250]) }}" method="post">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="api_name" value="SELF">
            <input type="hidden" name="api_title" value="SELF">
            <input type="hidden" name="api_money" value="0">

        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    {{--<td style="width: 20%">API域名</td>--}}
                    {{--<td style="width: 10%">前缀</td>--}}
                    <td style="width: 30%">api_token</td>
                    <td style="width: 30%">MD5密码</td>
                    </tr>
            </thead>
            @foreach($data as $i)
                @if($i->api_name == 'SELF')
            <tr>
           {{-- <td>--}}
               {{--  <input type="text" class="form-control" id="api_domain" name="api_domain" placeholder="例：api.wgapi88.com" value="{{ $i->api_domain }}" />--}}
           {{-- </td>--}}
            {{--<td>--}}
                {{--<input type="text" class="form-control" id="prefix" name="prefix" placeholder="例：9k" value="{{ $i->prefix }}" />--}}

            {{--</td>--}}
            <td>
                <input type="text" class="form-control" id="api_token" name="api_token" placeholder="" value="{{ $i->api_token }}" />

            </td>
            <td>
                <input type="text" class="form-control" id="api_Key" name="api_Key" placeholder="" value="{{ $i->api_key }}" />

            </td>
            <td>
                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
            </td>

            </tr>
                @endif
                @endforeach

        </table>
        </form>
    </div>



     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">接口列表</h3>

             </div>
             <div class="panel-body"><b><font color="red">在以上窗口填写WG基础域名、商户api_token、Md5密码即可，不使用的接口请下线处理！</font></b><br><br>
     <b>
         <font color="DarkRed">{{--注:同时上线“AG”和“AGS”请在用户管理-用户列表中给指定玩家“启用”或“禁用”AGS--}}
         </font>　</b>
                 @include('admin.api.filter',['type' => $type])
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th>平台名称</th>
                         <th  style="width: 10%">显示名称</th>
                         <th  style="width: 10%">余额</th>
                         <th  style="width: 20%">最后更新时间</th>
                         <th  style="width: 10%">排序</th>
                         <th  style="width: 20%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     @foreach($data as $item)
                         @if($item->api_name != 'SELF')
                         <tr>
                             <td>
                                 {{ $item->api_name }}
                             </td>
                             <td>
                                 {{ $item->api_title }}
                             </td>
                             <td>
                                 <span class="balance">{{ $item->api_money }}</span>
                                 <a class="refresh" href="javascript:void(0)"  data-uri="{{ route('api.credit') }}?api_name={{ $item->api_name }}"></a>

                             </td>
                             <td>
                                 {{ $item->updated_at }}
                             </td>
                             <td>
                                 {{ $item->sort }}
                             </td>
                             <td>
                                 {!! \App\Models\Base::$ON_LINE_HTML[$item->on_line] !!}
                             </td>
                             <td>
                                 @if ($item->on_line == 0)
                                     <a href="{{ route('apple.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 @elseif($item->on_line == 1)
                                     <a href="{{ route('apple.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 @endif
                                {{-- <button type="button" class="btn btn-info btn-xs show-cate" data-uri="{{ route('apple.show', ['id' => $item->getKey()]) }}">查看</button>
                                 <a href="{{ route('apple.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>--}}
                                 {{--<button class="btn btn-danger btn-xs"--}}
                                         {{--data-url="{{route('api.destroy', ['id' => $item->getKey()])}}"--}}
                                         {{--data-toggle="modal"--}}
                                         {{--data-target="#delete-modal"--}}
                                 {{-->--}}
                                     {{--删除--}}
                                 {{--</button>--}}
                             </td>
                         </tr>
                         @endif
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
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '信息',
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
                         console.log(err)
                     }
                 })
             })
         });
     </script>
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个接口吗?'])
@endsection