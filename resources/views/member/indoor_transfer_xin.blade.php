<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/new0404/js/jquery.min.js"></script>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
    <link rel="stylesheet" href="/new0404/pc/css/loadingTrack.css">
    <link rel="stylesheet" href="/new0404/pc/css/loading.css">
    <link rel="stylesheet" href="/new0404/pc/css/main-1440.css" media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">

    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/js/jquery.marquee.min.js"></script>
    <script src="/new0404/js/jquery.knob.js"></script>
    <script src="/new0404/js/modernizr.custom.js"></script>
    <script src="/new0404/js/ImgPreload.js"></script>
    <script src="/new0404/js/banner.js"></script>
    <script src="/new0404/js/script.js"></script>
</head>
<body>
<div class="container2">
    <div class="top-box">
        <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
             <div class="v-application--wrap">
                 @include('web.layouts.header_q8')
                 <div style="width:100%;background: #f7f9fb;">
			<div class="container">
				
			 @include('member.layouts.pc_left_user')
			 <div class="right-container">
        
		
<div class="page-wrapper">
<div class="member-container">
	<div class="member-body">
		<div id="layout-main-area"><div style="height: 100%; background-color: rgb(255, 255, 255); display: block;" id="layout-main-area-div">
				<div id="main-container" style="height:100%">


    <div style="background-color:#fff;padding:12px 16px;border-bottom: 1px solid #c9cfdc;">
        <table style="width:100%">
			<tbody><tr>
			   <td style="width:50%">
				  <div class="" style="padding:0 0 0 10px;font-size:16px;float:left;width:100%">
					<div style="width:50%;float:left;color:#000;">{{trans("lang.zhye")}}  &nbsp;<b>:</b>&nbsp;<span style="font-size: 20px;color: #DF9917;">$</span>&nbsp;<span class="ch"></span><span class="ch" id="gamemoneyy" style="font-size: 20px;color:#DF9917;">{{$member->money}}</span>
					</div>
					<div style="float:left;width:50%">
                    <a href="javascript:void(0);" class="abutton refresh11" id="transfer">{{trans("lang.zijinhuishou")}}</a>
                    </div>
					

                    				
					<!-- <p class="">红利余额：<span>0.00</span> 元</p> -->
					<!-- <div id="session" style="display:none;">dd1122</div> -->
					</div>
				</td>	
<script>				

</script>				
              <td style="width:50%">
	             <div style="width:100%">
                    <a href="javascript:void(0);" onclick="javascript:allrefresh();" style="color:#fff;font-weight:normal">
					   <div style="background:#2e6da4;float:right;font-size:14px;padding:5px 36px;line-height:18px;margin:1px 30px;border-radius:3px">額度壹鍵刷新</div></a>
                   </div>
			   </td>
		    </tr>
		</tbody></table>
	</div>
<style>
.abutton {
    font-size: 14px;
    text-decoration: none;
    color: #fff;
    height: 30px;
    line-height: 30px;
	background: linear-gradient(120deg, #fe6c23, #ff1577);
    padding: 8px 16px;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    box-sizing: border-box;
    border-radius: 50px;
}
.game1{
	height: 77px!important;
}
</style>


	<div class="member-exchange-module-index">

<style>
 .game1:hover {
    border: 1px solid #0e0e0e;
	background:#fffefe30
}
 .game1 {
    float: left;
    width: 182px;
    height: 100%;
    overflow: hidden;
    border: 1px solid #e0e1e4;
    padding: 5px;
    position: relative;
    border-radius: 6px;
    cursor: pointer;
	margin: 10px 7px 5px;
}
 .game-left {
    float: left;
    display: inline-block;
    margin-right: 8px;
}
.api-logo-box {
    width: 58px;
    height: 52px;
}
.api-logo-box>i {
    background-repeat: no-repeat;
    display: block;
    width: 52px;
    height: 52px;
}
.api-logo-41 {
    background-position: 0 -2160px;
}
 .acd {
    max-width: 180px;
    position: relative;
    white-space: nowrap;
    text-overflow: ellipsis;
}
 .acd .title {
    white-space: nowrap;
    text-overflow: ellipsis;
}
 .acd .title {
    display: block;
}
.blue {
    color: #547a8c;
}
.refresh1 {
    display: inline-block;
    background-position: -80px -102px;
    width: 18px;
    height: 16px;
    margin-top: 3px;
    vertical-align: inherit;
}
</style>


		<div class="module-main" style="overflow:hidden;padding:0;background: #fff;">
			<div class="col-xs-8 exchange" style="padding:0 10px 10px">
                                        

                                                                
                          @foreach($api_list as $item)
                                    <?php
                                    $mod = $_member->apis()->where('api_id', $item->id)->first();
        
                                    ?>
                                     <div class="game1 onmouse api-info api-41">
            					        <p class="game-left api-logo-box ">
                                             <i class="api-logo-41 site597"> 
                                             <img src="/uploads/ico/8ae4f7b3016fdbe12d7a9e92530032c6401e61cc.png" width="53" style="margin:6px 0" ondragstart="return false;">
                                             </i>
                                        </p>
            					        <p class="acd">
            					            @if($mod)
                                             <span class="title">{{$item->api_title}}</span>
                                             <span>  {{$mod->money}}  </span>
                                             <a href="javascript:void(0);" class="refresh1" data-uri="https://www.emixbet.com/api/check?api_name={{$item->api_name}}" style="">
                                                 <img src="../../../web/css/images/bg-ico.png">
                                            </a>
                                              @else
                                                <span class="title">{{$item->api_title}}</span>
                                                <span> {{trans("lang.zzwh")}}</span>
                                             @endif
                                            
                                        </p>
            					    </div>	
            		
                                @endforeach
					    </div>	
								</div>
		</div>
		
		
	</div>
</div>





<script>
    $(function(){
		
		$('.turn-in-action').on('click', function(){
			$('.turn-in').show();
			$('.turn-out').hide();
			$(this).addClass('active');
			$('.turn-out-action').removeClass('active');
		});
		$('.turn-out-action').on('click', function(){
			$('.turn-out').show();
			$('.turn-in').hide();
			$(this).addClass('active');
			$('.turn-in-action').removeClass('active');
		});		
		
        $('.refresh1').on('click',function(){
            var _this=$(this);
            var pos = _this.parent('.exchange-money').find('span');
            _this.html('<img src="../../../web/css/images/as.gif">');
            $.ajax({
                type : 'GET',
                url : _this.attr('data-uri'),
                data : '',
                contentType : "application/json; charset=utf-8",
                success : function(data){
                    if (data.Code != 0)
                    {
                        alert(data.Message);
                        return ;
                    }
                    // pos.html(data.Data+'元');
					
					$("#money_"+data.api_name).html(data.Data+'元');
					_this.html('<img src="../../../web/css/images/bg-ico.png">');
                },
                error: function (err, status) {
                    //console.log(err)
                }
            })
        });
		
		//$('.exchange-money .refresh').each(function(){
		//	$(this).trigger('click');
		//});
    });
	
	function allrefresh(){
		$('.refresh1').each(function(){
			var _this=$(this);
            var pos = _this.parent('.exchange-money').find('span');
            _this.html('<img src="../../../web/css/images/as.gif">');
            $.ajax({
                type : 'GET',
                url : _this.attr('data-uri'),
                data : '',
                contentType : "application/json; charset=utf-8",
                success : function(data){
                    if (data.Code != 0)
                    {
                        alert(data.Message);
                        return ;
                    }
                    // pos.html(data.Data+'元');
					$("#money_"+data.api_name).html(data.Data+'元');
					_this.html('<img src="../../../web/css/images/bg-ico.png">');
                },
                error: function (err, status) {
                }
            })
		});
	}
</script>
			</div></div><span></span>
    </div>
</div>
</div> 

   </div>
</div>
            </div>
        </div>
    </div>
</div>
 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>