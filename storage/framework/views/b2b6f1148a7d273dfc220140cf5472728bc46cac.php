
<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">一键返水</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.send_fs.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form action="<?php echo e(route('send_fs.store')); ?>" method="post" id="fsform">
				    <input type="hidden" name="start_at" value="<?php echo e(Session::get('start_at')); ?>">
					<input type="hidden" name="gametype" value="<?php echo e($gameType); ?>">
					<input type="hidden" name="api_type" value="<?php echo e($api_type); ?>">
					<input type="hidden" name="end_at"  value="<?php echo e(Session::get('end_at')); ?>">
                    <div class="row text-center" style="margin-top: 5px;margin-bottom: 5px;">
                        <button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>
                        
                        
                        
                        
                        
                    </div>
                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 10%">会员</th>
                            <th style="width: 20%">游戏类型</th>
                            <th style="width: 5%">接口</th>
                            <th style="width: 5%">笔数</th>
                            <th>有效投注金额</th>
                            <th style="width: 20%">返水等级</th>
                            <th style="width: 10%">返水比例</th>
                            <th style="width: 15%">返水金额</th>
                        </tr>
                        <?php
                       
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="gamebillno[<?php echo e($item->member_id); ?>]" checked value="<?php echo e($item->gamebillno); ?>">
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="member_id[]" checked value="<?php echo e($item->member_id); ?>"><?php echo e($item->name); ?>

                                        </label>
                                    </td>
                                    <td>
                                        <?php echo e(config('platform.game_type')[$gameType]); ?>

                                    </td>
                                    <td>
                                        <?php if($api_type): ?><?php echo e($_api_list[$api_type]); ?> <?php else: ?> 全部  <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($item->num); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->tz_amount); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->level_name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->rate.'%'); ?>

                                    </td>
                                    <td>
                                        <input type="text" name="money[<?php echo e($item->member_id); ?>]" class="form-control"  style="max-width: 80px;" value="<?php echo e(sprintf("%.2f",  $item->tz_amount*$item->rate/100)); ?>">
                                    </td>
                                </tr>
                         
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red"><?php echo e($total_num); ?></strong></td>
                            <td><strong style="color: red"><?php echo e($total_tz_amount); ?></strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red"><?php echo e($total_fs_money); ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
				
                <div class="clearfix">
                <div class="pull-left" style="margin: 0;">
                <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                </div>
                <div class="pull-right" style="margin: 0;">
                 <?php echo $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type, 'gameType' => $gameType])->links(); ?>

                </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>