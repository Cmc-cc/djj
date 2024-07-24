
<?php $__env->startSection('content'); ?>
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" <?php if($type == 5): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('apple.index')); ?>?type=5" >接口信息</a></li>
        </ul>
    </div>

    <div style="margin-top: 5px;">
        <form class="form-horizontal" id="form" action="<?php echo e(route('apple.update', ['id' => 250])); ?>" method="post">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="api_name" value="SELF">
            <input type="hidden" name="api_title" value="SELF">
            <input type="hidden" name="api_money" value="0">

        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    
                    
                    <td style="width: 30%">api_token</td>
                    <td style="width: 30%">MD5密码</td>
                    </tr>
            </thead>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i->api_name == 'SELF'): ?>
            <tr>
           
               
           
            
                

            
            <td>
                <input type="text" class="form-control" id="api_token" name="api_token" placeholder="" value="<?php echo e($i->api_token); ?>" />

            </td>
            <td>
                <input type="text" class="form-control" id="api_Key" name="api_Key" placeholder="" value="<?php echo e($i->api_key); ?>" />

            </td>
            <td>
                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
            </td>

            </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
        </form>
    </div>



     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">接口列表</h3>

             </div>
             <div class="panel-body"><b><font color="red">在以上窗口填写WG基础域名、商户api_token、Md5密码即可，不使用的接口请下线处理！</font></b><br><br>
     <b>
         <font color="DarkRed">
         </font>　</b>
                 <?php echo $__env->make('admin.api.filter',['type' => $type], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <table class="table table-bordered table-hover text-center">
                     <tr>
                         <th>平台名称</th>
                         <th  style="width: 10%">显示名称</th>
                         <th  style="width: 10%">余额</th>
                         <th  style="width: 20%">最后更新时间</th>
                         <th  style="width: 10%">排序</th>
                         <th  style="width: 20%">上线/下线</th>
                         <th  style="width: 20%">操作</th>
                     </tr>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($item->api_name != 'SELF'): ?>
                         <tr>
                             <td>
                                 <?php echo e($item->api_name); ?>

                             </td>
                             <td>
                                 <?php echo e($item->api_title); ?>

                             </td>
                             <td>
                                 <span class="balance"><?php echo e($item->api_money); ?></span>
                                 <a class="refresh" href="javascript:void(0)"  data-uri="<?php echo e(route('api.credit')); ?>?api_name=<?php echo e($item->api_name); ?>"></a>

                             </td>
                             <td>
                                 <?php echo e($item->updated_at); ?>

                             </td>
                             <td>
                                 <?php echo e($item->sort); ?>

                             </td>
                             <td>
                                 <?php echo \App\Models\Base::$ON_LINE_HTML[$item->on_line]; ?>

                             </td>
                             <td>
                                 <?php if($item->on_line == 0): ?>
                                     <a href="<?php echo e(route('apple.check', ['id' => $item->getKey(), 'status' => 1])); ?>" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 <?php elseif($item->on_line == 1): ?>
                                     <a href="<?php echo e(route('apple.check', ['id' => $item->getKey(), 'status' => 0])); ?>" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 <?php endif; ?>
                                
                                 
                                         
                                         
                                         
                                 
                                     
                                 
                             </td>
                         </tr>
                         <?php endif; ?>
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
     <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '信息',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })

             $('.refresh').on('click',function(){
                 var _this=$(this);
                 var pos = _this.prev('span');
//                 var money_span = _this.parent('p').next().find('span');
                 _this.css({
                     'background':'url(<?php echo e(asset("/web/images/h-u-loading2.gif")); ?>) no-repeat center center'
                 })
                 $.ajax({
                     type : 'GET',
                     url : _this.attr('data-uri'),
                     data : '',
                     contentType : "application/json; charset=utf-8",
                     success : function(data){

                         _this.css({
                             'background':'url(<?php echo e(asset("/web/images/bg-ico.png")); ?>) no-repeat center center',
                             'background-position': '-80px -102px'
                         })
                         if (data.Code != 0)
                         {
                             alert(data.Message);
                             return ;
                         }
                         pos.html(data.Data+'元');
                     },
                     error: function (err, status) {
                         console.log(err)
                     }
                 })
             })
         });
     </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
     <?php echo $__env->make('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个接口吗?'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>