
<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">活动列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.activity.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 10%">ID</th>
                         <th class="text-center">活动标题</th>
                         <th  style="width: 20%">活动开始时间</th>
                         <th  style="width: 20%">活动截止时间</th>
                         <th  style="width: 5%">排序</th>
                         <th style="width: 10%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                 <?php echo e($item->title); ?>

                             </td>
                             <td>
                                 <?php echo e($item->start_at); ?>

                             </td>
                             <td>
                                 <?php echo e($item->end_at); ?>

                             </td>
                             <td>
                                 <?php echo e($item->sort); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$ON_LINE_HTML[$item->on_line]; ?>

                             </td>
                             <td>
                                 <?php if($item->on_line == 0): ?>
                                     <a href="<?php echo e(route('activity.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 <?php elseif($item->on_line == 1): ?>
                                     <a href="<?php echo e(route('activity.check', ['id' => $item->getKey(), 'status' => 0])); ?>" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 <?php endif; ?>
                                 <a href="<?php echo e(route('activity.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('activity.destroy', ['id' => $item->getKey()])); ?>"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     删除
                                 </button>
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                     <?php echo $data->appends(['title' => $title, 'start_at' => $start_at, 'end_at' => $end_at])->links(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个活动吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>