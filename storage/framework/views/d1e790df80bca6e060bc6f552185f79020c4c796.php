<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e($_system_config->site_name); ?>-管理后台</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backstage/css/admin.css')); ?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo e(asset('/node_modules/admin-lte/dist/css/skins/skin-blue.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset("/vendor/select2/select2.min.css")); ?>">
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo e(asset('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $__env->yieldContent('after.css'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- Main Header -->
    <?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $__env->make('admin.layouts.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <?php echo $__env->make('admin.layouts.alertMsg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </section>
        <!-- Content Header (Page header) -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php echo $__env->make('admin.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('/node_modules/admin-lte/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset ("/vendor/select2/select2.full.min.js")); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/node_modules/admin-lte/dist/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/layer/layer.js?r=1')); ?>"></script>
<script src="<?php echo e(asset('/vendor/laydate/laydate.js')); ?>"></script>
<script src="<?php echo e(asset('/js/submitformsync.js')); ?>"></script>
<script src="<?php echo e(asset('/backstage/js/form_v.js')); ?>"></script>
<script src="<?php echo e(asset('/backstage/js/layer-date-default.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<?php echo $__env->yieldContent('after.js'); ?>

</body>
</html>
