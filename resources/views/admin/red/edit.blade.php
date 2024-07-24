@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑红包等级</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="{{ route('red.update', ['id' => $data->id]) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="min_amount" class="col-sm-2 control-label">充值范围最小</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="min_amount" name="min_amount" placeholder="" value="{{ $data->min_amount }}" />
                            </div>
                            <label for="max_amount" class="col-sm-1 control-label">最大</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="max_amount" name="max_amount" placeholder="" value="{{ $data->max_amount }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="min_rate" class="col-sm-2 control-label">红包金额比例最小</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="min_rate" name="min_rate" placeholder="例 5% 只需填写 5" value="{{ $data->min_rate }}" />
                            </div>
                            <label for="max_rate" class="col-sm-1 control-label">最大</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="max_rate" name="max_rate" placeholder="例 5% 只需填写 5" value="{{ $data->max_rate }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="sort" name="sort" placeholder="例：1500"  value="{{ $data->sort }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="times" class="col-sm-2 control-label">抽取次数</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="times" name="times" placeholder="1" value="{{ $data->times }}" />
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('red.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection