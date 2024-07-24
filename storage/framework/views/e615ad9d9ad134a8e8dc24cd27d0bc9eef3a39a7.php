
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">新增代理</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="<?php echo e(route('member_daili.store')); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="level" class="col-sm-2 control-label">选择会员</label>
                            <div class="col-sm-7">
                                <select name="member_id" id="member_id" class="form-control select2">
                                    <option value="">--请选择--</option>
                                    <?php $__currentLoopData = $member_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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