
<?php $__env->startSection('content'); ?>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">焦点图列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.advpos.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <h3 style="color: red" class="text-center"> 可根据排序调整位置</h3>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th style="width: 10%">标题</th>

                         <th style="width: 5%">排序</th>
						<th style="width: 20%">图片</th>
                        
                        <th style="width: 5%">类型</th>
                        
                         <th style="width: 8%">链接</th>

                         <th  style="width: 10%">最后更新时间</th>
                         <th  style="width: 10%">操作</th>
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
                                 <?php echo e($item->sort); ?>

                             </td>
                             <td>
                                <img src=" <?php echo e($item->path); ?>"  width="150" height="50"/>
                             </td>
                             <td>
                             	<?php if($item->type == 1): ?>
                                
                                  电脑端
                                <?php endif; ?>	
                             
                             	<?php if($item->type == 2): ?>
                                
                                  手机端
                                <?php endif; ?>	
                                
                                
                                <?php if($item->type == 3): ?>
                                
                                  左下角
                                <?php endif; ?>	
                                
                                
                                 
                             </td>
                             <td>
                                 <?php echo e($item->jumpurl); ?>

                             </td>
                             							 
                             <td>
                                 <?php echo e($item->updated_at); ?>

                             </td>
                             <td>
                                 <a href="<?php echo e(route('advpos.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('advpos.destroy', ['id' => $item->getKey()])); ?>"
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