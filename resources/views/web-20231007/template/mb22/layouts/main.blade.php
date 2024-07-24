<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{ $_system_config->site_title or 'motoo' }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('web/mb22/css/vendor.css')}}" rel="stylesheet">
<link href="{{asset('web/mb22/css/reset.css')}}" rel="stylesheet">
<link href="{{asset('web/mb22/css/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/web/mb16/css/yk_modal.css') }}">
<script src="{{asset('web/js/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('web/mb22/js/common.js')}}"></script>
<script src="{{asset('web/js/jquery.SuperSlide.2.1.1.js')}}"></script>
<script src="{{asset('web/mb22/js/wow.js')}}"></script>

</head>
<body>
@include('web.template.mb22.layouts.header')
@yield('content')
@include('web.template.mb22.layouts.footer')
<div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
        @foreach($_system_notices as $v)
            <div class="module">
                <h4>{{ $v->title }}</h4>
                <p>✿{{ $v->content }}</p>
            </div>
        @endforeach
    </div>
</div>
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
<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0').on('click', function () {
                var notice_index = layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['680px'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click', '.close', function () {
                    layer.close(notice_index)
                })
            })

        })
    })(jQuery)
</script>
</body>
</html>