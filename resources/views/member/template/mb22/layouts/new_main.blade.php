<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="{{asset('web/mb22/css/vendor.css')}}" rel="stylesheet">--}}
    <link href="{{asset('web/mb22/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('web/mb22/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/web/mb16/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/web/css/vendor.css') }}">--}}
    <script src="{{asset('web/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('web/mb22/js/common.js')}}"></script>
    <script src="{{asset('web/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <script src="{{asset('web/mb22/js/wow.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/mystyle.css') }}">

    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jq.page.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan.js') }}"></script>

</head>
<body>
@include('web.template.mb22.layouts.header')
<div id="banner"></div>
@yield('content')
@include('web.template.mb22.layouts.footer')
@include('web.template.mb22.layouts.aside')
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/mb16/js/yk_modal.js') }}"></script>
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