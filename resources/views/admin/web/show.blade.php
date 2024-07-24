@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">更新信息</h3>
            </div>
            <div class="panel-body">
                <form action="" method="get" id="searchForm">
                    <div class="row">
                        <div class="col-lg-2 pull-right">
                            <div class="input-group">
                                <a id="up" class="btn btn-info" href="javascript:void('')"><span class="glyphicon glyphicon-plus"></span>点击更新</a>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 10%">更新信息</th>
                        <th style="width: 15%">版本</th>
                    </tr>
                    @if(count($all) > 0)
                    @foreach($all as $item)
                        <tr>
                            <td>
                                {{ $item['id'] }}
                            </td>
                            <td>
                                {{ $item['desc'] }}
                            </td>
                            <td>
                                {{ $item['ver'] }}
                            </td>
                        </tr>
                    @endforeach
                        @else
                    <tr>
                        <td colspan="3">暂无更新</td>
                    </tr>
                        @endif
                </table>

            </div>
        </div>

    </section><!-- /.content -->
    <script>
        $(function () {
            var total = "{{$total}}";

            if(total <= 0){
                $('#up').attr('disabled',true)
            }else{
                $('#up').click(function () {
                    var sign = confirm('确定更新网站吗?注意更新网站需要等待几分钟然后刷新页面！！！')
                    if(sign==true){
                        $.get('{{route('web.upgrade')}}')
                        $('#up').attr('disabled',true);
                        $('#up').unbind('click');
                    }
                })
            }

        })
    </script>
@endsection
@section("after.js")
    @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条反馈吗?'])
@endsection