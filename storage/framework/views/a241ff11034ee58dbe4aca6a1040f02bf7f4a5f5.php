
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">代理编辑</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('member_daili.update', ['id' => $data->getKey()])); ?>}" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name"  placeholder="用户名" value="<?php echo e($data->name); ?>" readonly />
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <label for="agent_uri" class="col-sm-2 control-label">代理独立链接</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="agent_uri" name="agent_uri" placeholder="不需要填写 http://"  value="<?php echo e($data->agent_uri); ?>"/><br>
                                <font color="red">此处需要指向域名"A"记录或"CNAME"记录到服务器IP或别名</font><br><br><b>
                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agent_uri" class="col-sm-2 control-label">代理分成</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="agent_fencheng" name="agent_fencheng" placeholder="代理分成请输入0-100" value="<?php echo e($data->agent_fencheng); ?>"/><br>
                             </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('member_daili.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>