<!DOCTYPE html>
<!-- saved from url=(0039)https://www.cash669.net/m/activity_list -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="hdTwSaWpGN5mN7lLEUAHS2P04CoXPy2jQ9CEAYGw">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link type="text/css" rel="stylesheet" href="/wap/theme10/css/userinfo.css">
	<link rel="apple-touch-icon" href="https://www.cash669.net/wap/images/iconq.png">

	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<body class="m_bac">

    <div class="m_container">

		<div class="nytop">
			<a href="javascript:history.go(-1);" class="fhbtn"></a>
			<h1>{{trans("lang.hdzx")}}</h1>
			<!--<h2><a href="/m/my_activity">申请进度查询</a></h2>-->
		</div>
        @foreach($data as $k => $item)
    		<a href="{{ route('wap.activity_detail', ['id' => $item->id]) }}" style="overflow: hidden;display: block;">
    			<div class="activitylist">
    				<div class="" style="background: rgb(42, 46, 50); min-height: 1rem;">
    					<img class="activeLogo" src="{{ $item->title_img }}">
    				</div>
    				<div class="activeTit">
    					<p>
    						{{$item->title}}
    					</p>
    					<p>
    						<span>長期有效</span>
    						<span>
    							查看詳情 <img src="/new/css/xiangqingjiantou.png" class="rightImg">
    						</span>
    					</p>
    				</div>
    			</div>
    		</a>
		@endforeach		
</div>

@extends('wap.template.theme10.layouts.fotter')
</body>
</html>


<script type="text/javascript">

    setTimeout(function(){
        $('#footer1').addClass('cur')
    },350)
    
</script>


<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>