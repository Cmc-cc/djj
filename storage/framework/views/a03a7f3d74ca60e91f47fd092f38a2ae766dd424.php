<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/rendezvous.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/index1.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/fonts/iconfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/mb3/css/style.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/member.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/yk_modal.css')); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/one.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/layui/css/layui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/web/css/mystyle.css')); ?>">
    <script src="<?php echo e(asset('/web/js/jquery-2.1.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/web/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/web/js/one.js')); ?>"></script>
    <script src="<?php echo e(asset('/web/layui/layui.all.js')); ?>"></script>
    <script src="<?php echo e(asset('/web/js/jq.page.js')); ?>"></script>
    <script src="<?php echo e(asset('/web/js/weihuan.js')); ?>"></script>
    <style>
        .header .container{
            width: 1200px;
        }
        .header_ft li>a{
            width: 157px;
        }
    </style>
</head>
<body>

<?php echo $__env->make('web.template.mb3.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div id="banner"></div>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('web.template.mb3.layouts.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.template.mb3.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('/web/mb3/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/index1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/yk_modal.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/jquery.SuperSlide.2.1.1.js')); ?>"></script>
<script src="<?php echo e(asset('/web/layer/layer.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/ajax-submit-form.js')); ?>"></script>
<script src="<?php echo e(asset('/web/mb3/js/rendezvous.js')); ?>"></script><!--日历-->
<script src="<?php echo e(asset('/web/mb3/js/jquery.page.js')); ?>"></script><!--翻页-->
<script src="<?php echo e(asset('/web/My97DatePicker/WdatePicker.js')); ?>"></script><!--起止时间日历 My97DatePicker-->
<?php echo $__env->yieldContent('after.js'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
</body>
</html>