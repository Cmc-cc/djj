
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">管理员新增</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('user.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="用户名" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" placeholder="密码" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" placeholder="邮箱" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="col-sm-2 control-label">管理组</label>
                            <div class="col-sm-7">
                                <select name="role_id" id="role_id" class="form-control">
                                    <?php $__currentLoopData = $role_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <button type="button" class="btn btn-primary submit-form-sync">添加</button>
                                &nbsp;<a href="<?php echo e(route('user.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>