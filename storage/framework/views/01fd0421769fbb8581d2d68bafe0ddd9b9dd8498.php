<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">焦点图列表</h3>
             </div>
             <div class="panel-body">
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 20%">时间</th>

                         <th style="width: 10%">类型</th>
						<th style="width: 10%">充值</th>
                        
                        <th style="width: 10%">提现</th>
                        
                         <th style="width: 10%">红利</th>
                         
                         <th style="width: 10%">代理<br/>佣金</th>
                        <th style="width: 10%">盈利</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->createtime); ?>

                             </td>
                             <td>
                                 <?php if($item->type==1): ?>晚班<?php else: ?>白班<?php endif; ?>
                             </td>
                             <td>
                                 <?php echo e($item->recharge); ?>

                             </td>
                             <td>
                                 <?php echo e($item->drawing); ?>

                             </td>
                             <td>
                             	    <?php echo e($item->dividend); ?>

                             </td>
                             
                             <td>
                             	    
                             </td>
                             <td>
                             	    <?php echo e($item->recharge-$item->drawing); ?>

                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     <?php echo $data->render(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这条记录吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>