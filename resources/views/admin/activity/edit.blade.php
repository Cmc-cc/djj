@extends('admin.layouts.main')
@section('content')
    @include('admin.layouts.ueditor_admin')
    <script>
        var ue = UE.getEditor('editor');
        ue.ready(function(){
            //var content = "";
            ue.setContent('{!! $data->content !!}');
        })
        var ue2 = UE.getEditor('title_editor');
        ue2.ready(function(){
            //var content = "";
            ue2.setContent('{!! $data->title_content !!}');
        })

        var ue3 = UE.getEditor('rule_editor');
        ue3.ready(function(){
            //var content = "";
            ue3.setContent('{!! $data->rule_content !!}');
        })

    </script>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑活动</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="{{ route('activity.update', ['id' => $data->getKey()]) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">活动类型 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <select name="type" id="type" class="form-control">
                                    <option value="">--请选择--</option>
                                    @foreach(config('platform.activity_type') as $k => $v)
                                        <option value="{{ $k }}" @if($k == $data->type) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">申请模式 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <select name="is_apply" id="is_apply" class="form-control">
                                    <option value="0" @if($data->is_apply == 0) selected @endif>需要申请</option>
                                    <option value="1" @if($data->is_apply == 1) selected @endif>无需申请</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">活动标题 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label">活动副标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $data->subtitle }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="sort" name="sort" value="{{ $data->sort }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label">活动列表图片(1张)</label>
                            <div class="col-sm-7">
                                <input id="fileupload" type="file" name="file" multiple>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <div id="files" class="files">
                                    @if($data->title_img)
                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                            <a href="{{ $data->title_img }}" target="_blank"><img src="{{ $data->title_img }}" alt="" style="width: 100px;"></a>
                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                            <input type="hidden" name="title_img" value="{{ $data->title_img }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start_at" class="col-sm-2 control-label">活动开始时间</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="start_at" name="start_at" value="{{ $data->start_at }}" readonly />
                            </div>

                            <label for="end_at" class="col-sm-1 control-label">活动截止时间</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="end_at" name="end_at" value="{{ $data->end_at }}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_desc" class="col-sm-2 control-label">活动时间文字描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="date_desc" name="date_desc" value="{{ $data->date_desc }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="money" class="col-sm-2 control-label">活动所需达到的金额</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="money" name="money" value="{{ $data->money }}" />
                            </div>

                            <label for="rate" class="col-sm-1 control-label">赠送比例</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="rate" name="rate" value="{{ $data->rate }}"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gift_limit_money" class="col-sm-2 control-label">赠送金额上限</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="gift_limit_money" name="gift_limit_money" value="{{ $data->gift_limit_money }}" />
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="gift_limit_money" class="col-sm-2 control-label">选择参与接口 <strong style="color: red">*</strong></label>--}}
                            {{--<div class="col-sm-7">--}}
                                {{--@foreach($api_list as $k => $v)--}}
                                    {{--<label><input type="checkbox" name="api[]"  value="{{ $k }}" @if(in_array($k, $data->apis()->pluck('id')->toArray())) checked @endif />{{$v}}</label>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">标题内容</label>
                            <div class="col-sm-7">
                                <script id="title_editor" name="title_content" type="text/plain"></script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">活动说明</label>
                            <div class="col-sm-7">
                                <script id="editor" name="content" type="text/plain"></script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quota" class="col-sm-2 control-label">活动规则</label>
                            <div class="col-sm-7">
                                <script id="rule_editor" name="rule_content" type="text/plain"></script>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('activity.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
@section('after.js')
    <script src="{{ asset('/backstage/js/jquery.ui.widget.js') }}"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{{ asset('/backstage/js/jquery.iframe-transport.js') }}"></script>
    <!-- The basic File Upload plugin -->
    <script src="{{ asset('/backstage/js/jquery.fileupload.js') }}"></script>
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        var upload_url = "{{ route('upload.post') }}";
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = upload_url;
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="title_img" value="'+img_path+'">' +
                        '</div>';
                    $('#files').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });

        function removeDiv(e)
        {
            $(e).closest('div').remove();
        }
    </script>
@endsection