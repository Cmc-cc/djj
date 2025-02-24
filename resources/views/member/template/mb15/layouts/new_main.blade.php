<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb15/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb15/css/common.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/web/css/vendor.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb15/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb15/css/index1.css') }}">
    <script src="{{ asset('/web/js/jquery-2.1.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/mystyle.css') }}">
    <script src="{{ asset('/web/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jq.page.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan.js') }}"></script>
</head>
<body>

@include('web.template.mb15.layouts.header')

<div id="banner" style="margin-top: -0px;"></div>
@yield('content')
@include('web.template.mb15.layouts.aside')
@include('web.template.mb15.layouts.footer')

<script src="{{ asset('/web/mb15/js/index1.js') }}"></script>
<script src="{{ asset('/web/mb15/js/common.js') }}"></script>
<script src="{{ asset('/web/mb15/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/mb15/js/jquery.SuperSlide.2.1.1.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/mb15/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/mb15/js/rendezvous.js') }}"></script><!--日历-->
<script src="{{ asset('/web/mb15/js/jquery.page.js') }}"></script><!--翻页-->
<script src="{{ asset('/web/My97DatePicker/WdatePicker.js') }}"></script><!--起止时间日历 My97DatePicker-->
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
</body>
</html>