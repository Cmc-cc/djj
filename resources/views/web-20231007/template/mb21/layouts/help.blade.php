<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>777</title>
    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">
    <script src="{{ asset('/web/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jackpot.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan.js') }}"></script>
</head>
<body>

    @section('nav')
    <div class="nav help">
        <div class="container clear">
           <li style="display: inline-block;float: left;"><a href="{{ route('web.index') }}" style="color: #fff">网站首页</a></li>
            <ul class="left">
               <li data-type="1" class="on">常见问题</li>
               <li data-type="2">存款帮助</li>
               <li data-type="3">取款帮助</li>
               <li data-type="4">体育规则</li>
               <li data-type="5">真人规则</li>
               <li data-type="6">棋牌规则</li>
               <li data-type="7">防劫持教程</li>
               <li data-type="8">浏览器允许弹框说明</li>
           </ul>
       </div>
   </div>
   @endsection

   @include('web.layouts.header')
   @yield('content')
   @include('web.layouts.aside')
   @include('web.layouts.footer')


</script>
</body>
</html>