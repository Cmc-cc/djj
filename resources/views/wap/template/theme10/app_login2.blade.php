
<!-- saved from url=(0056)https://www.cash669.net/play/app_login?plat_type=JOKER_2 -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<script type="text/javascript" src="/new/css/font.js"></script>
	<style>
		 img {
				 display: inline;
				 pointer-events: none;
		}
	</style>
</head>
<body style="background: url(/new/img/jokerbj1.jpg) #141414 no-repeat;background-size: cover;">
	<div style="width: 100%;text-align: center;padding-top:14%">
		<img src="/new/css/logopit1.png" style="width:56%" onclick="return false">
	</div>
	<div style="width: 100%;text-align: center;padding-top:6%">
		<img src="/new/img/logo2.png" style="width:50%" onclick="return false">
	</div>
		<div style="width: 100%;text-align: center;padding-top:8%">
		<a id="appp"><img src="/new/img/logo1.png" style="width:50%" onclick="return false"></a>
	</div>
		<div style="width: 100%;text-align: center;padding-top:8%">
		<a href="{{$url}}"><img src="/new/img/loginh5.png" style="width:50%" onclick="return false"></a>
	</div>
	<div style="width: 100%;text-align: center;padding-top:8%">
		<a href="http://dl.jsoftdev.com/joker/lobby/live/android/lobby-android.1.2.39.apk"><img src="/new/css//btn.png" style="width:56%" onclick="return false"></a>
	</div>

</body></html>
<script type="text/javascript" src="/new/css/jquery.js"></script>
<script>
var code ="{{$code}}";
    $('body').on('click','#appp',function(){
            
            $.ajax({
                url:'/api/jokergame',
                data:{code:code},
                success:function(res){
                    location.href=res;
                }
            })
        })
</script>