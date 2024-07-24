@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">审核申请用户</h3>
                    </div>
                    <!--内容头部-->
                    <form class="form-horizontal cmxform" name="registerForm" id="form" action="{{ route('activity_apply.confirm', ['id' => $data->getKey()]) }}" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">申请主题</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->activity->title }}" disabled>
                                </div>
                            </div>							
                            <div class="form-group">
                                <label for="member_id" class="col-sm-2 control-label">申请用户</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="member_id" name="member_id" value="{{ $data->member->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="money" class="col-sm-2 control-label">用户余额</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="money" name="money" value="{{ $data->member->money }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="givemoney" class="col-sm-2 control-label">赠送金额</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" id="givemoney" name="givemoney" value="{{ $givemoney }}"/>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                    &nbsp;<a href="{{ route('activity_apply.index') }}" class="btn btn-info">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
<script>
    $(function(){
        var name = '{{$data->member->name}}';
        var id = '{{$data->member->id}}';
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
                    $('input[name=money]').val(data.Data.toFixed(2));
                }
            }
        })
    })

</script>
@endsection