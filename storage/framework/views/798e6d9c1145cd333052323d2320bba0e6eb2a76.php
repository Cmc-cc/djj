
<?php $__env->startSection('content'); ?>

    
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">编辑焦点图</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('advpos.update', ['id' => $data->id])); ?>" method="post">
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($data->title); ?>" />
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">PC图片(1920*450) <strong style="color: red">*</strong>手机端(640*284)</label>
                            
                            <div class="col-sm-7">
                                            <input id="fileupload4" type="file" name="file" multiple>
                                            <div id="progress4" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                            
                            
                        </div>
                        
                       
                        <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files4" class="files">
                                               
                                                <?php if($data->path): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->path); ?>" target="_blank"><img src="<?php echo e($data->path); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="path" value="<?php echo e($data->path); ?>">
                                                    </div>
                                                <?php endif; ?>
                                               
                                            </div>
                                        </div>
                                    </div>
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">类型</label>
                            <div class="col-sm-7">
                               
                                <input type="radio" name="type" value="1" <?php if($data->type == 1): ?>checked <?php endif; ?> />电脑端
                                
                                
                                <input type="radio" name="type" value="2" <?php if($data->type == 2): ?>checked <?php endif; ?> />手机端
                                

                              
                              </div>
                        </div>
                        
                        
                         <div class="form-group">
                            <label for="jumpurl" class="col-sm-2 control-label">跳传链接</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="jumpurl" name="jumpurl" value="<?php echo e($data->jumpurl); ?>" />
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="sort" name="sort" value="<?php echo e($data->sort); ?>" />
                            </div>
                        </div> 
                       
                       
                       
                       
                       
                       
                       
                       
                       
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('advpos.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after.js'); ?>
    <script src="<?php echo e(asset('/backstage/js/jquery.ui.widget.js')); ?>"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo e(asset('/backstage/js/jquery.iframe-transport.js')); ?>"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo e(asset('/backstage/js/jquery.fileupload.js')); ?>"></script>
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        var upload_url = "<?php echo e(route('upload.post')); ?>";
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = upload_url;
           

            //手机站logo
            $('#fileupload4').fileupload({
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
                        '<input type="hidden" name="path" value="'+img_path+'">' +
                        '</div>';
                    $('#files4').append(html)

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
                    $('#progress4 .progress-bar').css(
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
<?php $__env->stopSection(); ?>
 
 
 













<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>