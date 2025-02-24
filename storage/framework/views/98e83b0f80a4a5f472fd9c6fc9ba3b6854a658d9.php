
<?php $__env->startSection('content'); ?>
    <style type="text/css">
        .btn-group>.btn:first-child{
            width: 84px;
        }
    </style>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">代理审核列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.member_daili_apply.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 15%">用户</th>
                         <th style="width: 20%">电话</th>
                         <th style="width: 20%">qq</th>
                         <th>申请理由</th>
                         <th style="width: 10%">状态</th>
                         <th style="width: 20%">拒接理由</th>
                         <th style="width: 15%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary">
                                        <?php echo e($item->member->name); ?>

                                    </button>
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" class="show-cate" data-uri="<?php echo e(route('member.checkBalance', ['id' => $item->member->getKey()])); ?>">查看</a></li>
                                        <li><a href="<?php echo e(route('member.edit', ['id' => $item->member->getKey()])); ?>">修改</a></li>
                                        <li><a href="<?php echo e(route('member.assign', ['id' => $item->member->getKey()])); ?>">分配代理</a></li>

                                         <?php if($item->member->status == 0): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->member->getKey(), 'status' => 1])); ?>" onclick="return confirm('确定禁用吗？')">禁用</a></li>
                                         <?php elseif($item->member->status == 1): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->member->getKey(), 'status' => 0])); ?>" onclick="return confirm('确定启用吗？')">启用</a></li>
                                         <?php endif; ?>
                                        
                                    </ul>
                                </div>
                             </td>
                             <td>
                                 <?php echo e($item->phone); ?>

                             </td>
                             <td>
                                 <?php echo e($item->msn_qq); ?>

                             </td>
                             <td>
                                 <?php echo e($item->about); ?>

                             </td>
                             <td>
                                 <?php if($item->status == 0): ?>
                                     <strong style="color: orange">待审核</strong>
                                 <?php elseif($item->status == 1): ?>
                                     <strong style="color: green">审核通过</strong>
                                 <?php elseif($item->status == 2): ?>
                                     <strong style="color: red">审核不通过</strong>
                                 <?php endif; ?>
                             </td>
                             <td>
                                 <?php echo e($item->fail_reason); ?>

                             </td>
                             <td>
                                 <?php if($item->status == 0): ?>
                                 <a href="<?php echo e(route('member_daili_apply.show', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs" onclick="return confirm('确定通过吗？')">同意</a>

                                 <button type="button" class="btn btn-danger btn-xs" data-uri="<?php echo e(route('member_daili_apply.update', ['id' => $item->id])); ?>" onclick="showRemark(this)">不同意</button>
                                 
                                         
                                         
                                         
                                 
                                     
                                 
                                     <?php endif; ?>
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                     </div>
                 <div class="pull-right" style="margin: 0;">
                    <?php echo $data->appends(['phone' => $phone])->links(); ?>

                 </div>
                 </div>

             </div>
         </div>

     </section><!-- /.content -->

     <!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title" id="myModalLabel">不通过原因</h4>
                 </div>
                 <div class="modal-body">
                     <form action="" method="post" class="form-horizontal" id="updateReason">
                         <?php echo csrf_field(); ?>

                         <input type="hidden" name="_method" value="put">
                         <div class="box-body">
                             <div class="form-group">
                                 <label for="fail_reason" class="col-sm-3 control-label"><span style="color: red">不通过原因</span></label>
                                 <div class="col-sm-8">
                                     <textarea name="fail_reason" id="fail_reason" rows="3" required class="form-control"></textarea>
                                 </div>
                             </div>
                         </div><!-- /.box-body -->
                         <div class="box-footer">
                             <div class="form-group">
                                 <label class="col-sm-3 control-label"></label>
                                 <div class="col-sm-8">
                                     <button type="submit" class="btn btn-info btn-flat">提交</button>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <script>
         function showRemark(e)
         {
             var uri = $(e).attr('data-uri');
             $('#updateReason').attr('action',uri)
             $('#myModal').modal('show');
         }
     </script>
      <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })
         });
     </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个返水等级吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>