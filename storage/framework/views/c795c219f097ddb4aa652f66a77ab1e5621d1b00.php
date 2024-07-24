<?php $__env->startSection('content'); ?>
    <style type="text/css">
        .btn-group>.btn:first-child{
            width: 84px;
        }
    </style>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">代理列表</h3>
             </div>
             <div class="panel-body">
                 <?php echo $__env->make('admin.member_daili.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th style="width: 6%">ID</th>
                         <th class="text-center" style="width: 14%">用户名</th>
                         <th  style="width: 20%">真实姓名/注册时间</th>
                         <th  style="width: 10%">代理/上级</th>
                         <th  style="width: 10%">手机/邮箱</th>
                         <th  style="width: 10%">状态</th>
                         <th  style="width: 20%">代理链接</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                             <td>
                                 <?php echo e($item->id); ?>

                             </td>
                             <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary">
                                        <?php echo e($item->name); ?>

                                    </button>
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" class="show-cate" data-uri="<?php echo e(route('member.checkBalance', ['id' => $item->getKey()])); ?>">查看</a></li>
                                        <li><a href="<?php echo e(route('member.edit', ['id' => $item->getKey()])); ?>">修改</a></li>
                                        <li><a href="<?php echo e(route('member.assign', ['id' => $item->getKey()])); ?>">分配代理</a></li>

                                         <?php if($item->status == 0): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->getKey(), 'status' => 1])); ?>" onclick="return confirm('确定禁用吗？')">禁用</a></li>
                                         <?php elseif($item->status == 1): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->getKey(), 'status' => 0])); ?>" onclick="return confirm('确定启用吗？')">启用</a></li>
                                         <?php endif; ?>
                                        
                                    </ul>
                                </div>
                             </td>
                             <td>
                                 <?php echo e($item->real_name); ?><br>
                                 <?php echo e($item->created_at); ?>

                             </td>
                             <td>
                                 <?php if($item->is_daili == 1): ?>
                                     <span style="color: red">是</span>
                                 <?php else: ?>
                                     <span>否</span>
                                 <?php endif; ?>
                                 /<?php echo e(isset($item->top_member->name) ? $item->top_member->name : ''); ?>

                             </td>
                             <td>
                                 <?php echo e($item->phone); ?>/<?php echo e($item->email); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$MEMBER_STATUS_HTML[$item->status]; ?>

                             </td>
                             <td>
                                 <?php if($item->agent_uri): ?>
                                     <?php echo e($item->agent_uri); ?>

                                 <?php else: ?>
                                    <?php echo e($url.'?code='.$item->invite_code); ?>

                                 <?php endif; ?>
                             </td>
                             <td>
                                 <a href="<?php echo e(route('member_daili.edit', ['id' => $item->getKey()])); ?>" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="<?php echo e(route('member_daili.destroy', ['id' => $item->getKey()])); ?>"
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
                     <?php echo $data->appends(['name' => $name])->links(); ?>

                 </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
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
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>