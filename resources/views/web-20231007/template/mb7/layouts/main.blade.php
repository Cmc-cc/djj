<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $_system_config->keyword }}">
    <script type="text/javascript">
        function browserRedirect() {
            var sUserAgent = navigator.userAgent.toLowerCase();
            var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
            var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
            var bIsMidp = sUserAgent.match(/midp/i) == "midp";
            var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
            var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
            var bIsAndroid = sUserAgent.match(/android/i) == "android";
            var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
            var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
            if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
                location.href='/m';
            } else {
                return false;
            }
        }

        browserRedirect();
    </script>
    <link rel="stylesheet" href="{{ asset('/web/mb7/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb7/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb7/css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb7/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <script src="{{ asset('/web/js/jquery-2.1.3.min.js') }}"></script>
</head>
<body>

@include('web.template.mb7.layouts.header')

@yield('content')
@include('web.template.mb7.layouts.aside')
@include('web.template.mb7.layouts.footer')
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
<script src="{{ asset('/web/mb7/js/index1.js') }}"></script>
<script src="{{ asset('/web/mb7/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/mb7/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/mb7/js/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('/web/mb7/js/jquery.fly.min.js') }}"></script>
<script src="{{ asset('/web/mb7/js/common.js') }}"></script>
<script src="{{ asset('/web/mb7/js/common1.js') }}"></script>
@yield('after.js')
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>