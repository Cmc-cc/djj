
<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 10px;">

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo e(route('member.checkBalance', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">接口余额</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showGameRecordInfo', ['id' => $id])); ?>" aria-controls="home" role="tab" data-toggle="tab">历史输赢</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showRechargeInfo', ['id' => $id])); ?>" aria-controls="profile" role="tab" data-toggle="tab">历史充值</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDrawingInfo', ['id' => $id])); ?>" aria-controls="messages" role="tab" data-toggle="tab">历史提款</a></li>
                <li role="presentation"><a href="<?php echo e(route('member.showDividendInfo', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">历史红利</a></li>
                <li role="presentation" class="active"><a href="<?php echo e(route('member.showTransfer', ['id' => $id])); ?>" aria-controls="settings" role="tab" data-toggle="tab">平台转账记录</a></li>
            </ul>
        </div>

        <section class="content" style="margin-top: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">平台转账记录</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="margin-bottom: 10px;">
                        <form action="" method="get" id="searchForm">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">用户</span>
                                        <input type="text" name="name" class="form-control" value="<?php echo e($name); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">转出/转入</span>
                                        <select name="transfer_type" id="transfer_type" class="form-control">
                                            <option value="">--请选择--</option>
                                            <?php $__currentLoopData = config('platform.transfer_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php if(is_numeric($transfer_type) && $transfer_type == $k): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">转入账户</span>
                                        <select name="transfer_in_account" id="transfer_in_account" class="form-control">
                                            <option value="">--请选择--</option>
                                            <option value="中心账户">中心账户</option>
                                            <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($v); ?>" <?php if($transfer_in_account == $v): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">转出账户</span>
                                        <select name="transfer_out_account" id="transfer_out_account" class="form-control">
                                            <option value="">--请选择--</option>
                                            <option value="中心账户">中心账户</option>
                                            <option value="返水账户">返水账户</option>
                                            <?php $__currentLoopData = $_api_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($v); ?>" <?php if($transfer_out_account == $v): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">开始时间</span>
                                        <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo e($start_at); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">结束时间</span>
                                        <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo e($end_at); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-2 pull-right">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                                        <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th>用户名称</th>
                            <th style="width: 10%">转换类型</th>
                            <th style="width: 10%">转出账户</th>
                            <th style="width: 10%">转入账户</th>
                            <th style="width: 10%">转换金额</th>
                            <th style="width: 10%">红利金额</th>
                            <th style="width: 10%">转账时间</th>
                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->id); ?>

                                </td>
                                <td>
                                    <?php echo e($item->member->name); ?>

                                </td>
                                <td>
                                    <?php echo e(config('platform.transfer_type')[$item->transfer_type]); ?>

                                </td>
                                <td>
                                    <?php echo e($item->transfer_out_account); ?>

                                </td>
                                <td>
                                    <?php echo e($item->transfer_in_account); ?>

                                </td>
                                <td>
                                    <?php echo e($item->money); ?>

                                </td>
                                <td>
                                    <?php echo e($item->diff_money); ?>

                                </td>
                                <td>
                                    <?php echo e($item->created_at); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td colspan="4"></td>
                            <td><strong style="color: red"><?php echo e($total_money); ?></strong></td>
                            <td><strong style="color: red"><?php echo e($total_diff_money); ?></strong></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            <?php echo $data->appends(['name' => $name, 'transfer_type' => $transfer_type, 'transfer_in_account' => $transfer_in_account, 'transfer_out_account' => $transfer_out_account, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>