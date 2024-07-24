
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员编辑</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="<?php echo e(route('member.update', ['id' => $data->getKey()])); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="membername" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name"  placeholder="用户名" value="<?php echo e($data->name); ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="real_name" class="col-sm-2 control-label">真实姓名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="real_name"  placeholder="真实姓名" name="real_name" value="<?php echo e($data->real_name); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="money" class="col-sm-2 control-label">中心账户余额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="my-money" name=""  value="<?php echo e($data->money); ?>" readonly />
                            </div>
                        </div>
                        
						<div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">码量账户余额</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="ml_money" name="ml_money"  value="<?php echo e($data->ml_money); ?>"/>
                            </div>
                        </div>
						<div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">AG切换AGS</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="ag2ags" value="0" <?php if($data->ag2ags == 0): ?>checked <?php endif; ?>>不切换</label>
                                            <label><input type="radio" name="ag2ags" value="1" <?php if($data->ag2ags == 1): ?>checked <?php endif; ?>>切换</label>
                                        </div>
                        </div>
						<div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">SUNBET切换SUNBETS</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="sunbet2sunbets" value="0" <?php if($data->sunbet2sunbets == 0): ?>checked <?php endif; ?>>不切换</label>
                                            <label><input type="radio" name="sunbet2sunbets" value="1" <?php if($data->sunbet2sunbets == 1): ?>checked <?php endif; ?>>切换</label>
                                        </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email"  value="<?php echo e($data->email); ?>"/>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">手机</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="phone" name="phone"  value="<?php echo e($data->phone); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_username" class="col-sm-2 control-label">开户人名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_username" name="bank_username"  value="<?php echo e($data->bank_username); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_name" class="col-sm-2 control-label">银行名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_name" name="bank_name"  value="<?php echo e($data->bank_name); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_card" class="col-sm-2 control-label">银行卡号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_card" name="bank_card"  value="<?php echo e($data->bank_card); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_username" class="col-sm-2 control-label">开户行网点</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name"  value="<?php echo e($data->bank_branch_name); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_address" class="col-sm-2 control-label">开户地址</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bank_address" name="bank_address"  value="<?php echo e($data->bank_address); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">登录密码</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="password" name="password" placeholder="不修改则为原密码"  value="<?php echo e($data->o_password); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fs_money" class="col-sm-2 control-label">取款密码</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="qk_pwd" name="qk_pwd" maxlength="6" minlength="6" placeholder="不修改则为原密码" value="<?php echo e($data->qk_pwd); ?>"/>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="<?php echo e(route('member.index')); ?>" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script>
        $(function(){
            var name = '<?php echo e($data->name); ?>';
            var id = '<?php echo e($data->id); ?>';
            $.ajax({
                type:'get',
                url : "<?php echo e(route('member.get_money')); ?>",
                data : {name:name,id:id},
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if (data.Code != 0)
                    {
                        alert(data.Message);
                        return ;
                    }else{
                        $('#my-money').val('');
                        $('#my-money').val(data.Data.toFixed(2));
                    }
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>