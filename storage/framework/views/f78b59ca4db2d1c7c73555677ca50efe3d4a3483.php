
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">提款列表</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.member_offline_drawing.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 15%">订单号</th>
                        <th style="width: 10%">提款金额</th>
                        <th style="width: 5%">手续费</th>
                        <th style="width: 15%">开户行/卡号</th>
                        <th style="width: 15%">开户人/开户地址</th>
                        <th style="width: 10%">申请时间</th>
                        <th style="width: 10%">状态</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($item->id); ?>

                            </td>
                            <td>
                                <?php echo e($item->bill_no); ?>

                            </td>
                            <td>
                                <?php echo e($item->money); ?>

                            </td>
                            <td>
                                <?php echo e($item->counter_fee); ?>

                            </td>
                            <td>
                                <?php echo e($item->bank_name); ?>/<?php echo e($item->bank_card); ?>

                            </td>
                            <td>
                                <?php echo e(isset($item->member->real_name) ? $item->member->real_name : '已删除'); ?>/<?php echo e($item->bank_address); ?>

                            </td>
                            <td>
                                <?php echo e($item->created_at); ?>

                            </td>
                            <td>
                                <?php echo \App\Models\Base::$DRAWING_STATUS_HTML[$item->status]; ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td></td>
                            <td><strong style="color: red"><?php echo e($total_money); ?></strong></td>
                            <td><strong style="color: red"><?php echo e($total_counter_fee); ?></strong></td>
                            <td colspan="4"></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                <div class="pull-right" style="margin: 0;">
                    <?php echo $data->appends(['status' => $status, 'top_id' =>$top_id, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>