@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">添加模板</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="{{ route('template.store') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="请填写模板名称" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">客户端类型</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="client_type">
                                    <option value="1">PC</option>
                                    <option value="2">手机</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="template_name" placeholder="请填写模板路径" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">模板图片</label>
                            <div class="col-sm-7">
                                <input id="fileupload" type="file" name="file" multiple>
                                <div id="progress" class="progress">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <div id="files" class="files">
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('template.index') }}" class="btn btn-info">返回</a>
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
        var upload_url = "{{ route('upload.post') }}";
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
                    '<input type="hidden" name="pic" value="'+img_path+'">' +
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
        function removeDiv(e)
        {
            $(e).closest('div').remove();
        }
    </script>

@endsection