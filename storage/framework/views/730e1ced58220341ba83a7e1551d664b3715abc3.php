<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">确认充值</h3>
                    </div>
                    <!--内容头部-->
                    <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('recharge.confirm', ['id' => $data->getKey()])); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="account" class="col-sm-2 control-label">账户/卡号</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="account" name="account" placeholder="用户名" value="<?php echo e($data->account); ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="money" class="col-sm-2 control-label">金额</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="money" name="money" value="<?php echo e($data->money); ?>" readonly required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="diff_money" class="col-sm-2 control-label">赠送金额</label>
                                <div class="col-sm-7">
                                    
                                    <font color="#ff3300">上次充值金额<?php if(@$last): ?> <?php echo e($last->money); ?> <?php else: ?> 无 <?php endif; ?>  &nbsp;&nbsp; 
                                    
                                        <?php if($data->fanli==0): ?>  不送分 <?php endif; ?>
                                        <?php if($data->fanli==1): ?>  日常5% <?php endif; ?>
                                        <?php if($data->fanli==2): ?>  首充赠送10% <?php endif; ?>
                                        <?php if($data->fanli==3): ?>  新用户赠送100%  <?php endif; ?>
                                    </font>
                                    
                                    <input type="number" class="form-control" id="diff_money" name="diff_money" value="<?php echo e($data->diff_money); ?>"  required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="diff_money" class="col-sm-2 control-label">赠送码量</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control"  name="ml_money" value="<?php echo e($data->ml_money); ?>"  required />
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                    &nbsp;<a href="<?php echo e(route('recharge.index')); ?>" class="btn btn-info">返回</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>