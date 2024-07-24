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
    				<div style="width:100%;margin-bottom:5px;background: linear-gradient(90deg,#e8e8e8,#cccbca);overflow: hidden;">
    	     <a href="javascript:;"><div class="zfu bgc"><span style="color:#f5f5f5">{{trans("lang.tkzx")}}</span></div></a>
    
    </div>
    
    <div id="main-container">
    <div style="width:46.2%;height:50px;background:#e1e4e6;margin: 30px auto 0;border-radius: 5px;padding: 11px 0 11px 10px;">
       <div style="width:50%;float:left">{{trans("lang.zhye")}}&nbsp;<b>:</b>&nbsp;<span style="font-size: 20px;color: #DF9917;">$</span>&nbsp;<span class="ch"></span><span class="ch" id="gamemoneyy" style="font-size: 20px;color:#DF9917;">{{$member->money}}</span>
       </div>
       <div style="float:left;width:50%">
         <a href="javascript:void(0);"  class="abutton refresh11" style="" id="transfer">{{trans("lang.zijinhuishou")}}</a>
       </div>
    </div>
    <script>				
    
    </script>	
    
    	<div class="module-main" style="margin-top:20px">
    	   
    		<form action="https://www.emixbet.com/member/drawing" method="post" class="form-horizontal">
    		    <div class="form-group">
    				<label class="col-xs-3 control-label">{{trans("lang.zhenshixingming")}}：</label>
    				<div class="col-xs-6">
    					 <input class="form-control" id="username" value="{{$member->username}}" @if($member->username) disabled @endif >
    				</div>
    			</div>
    				<div class="form-group">
    				<label class="col-xs-3 control-label">{{trans("lang.zhlx")}}：</label>
    				<div class="col-xs-6">
    					<select class="form-control" onchange="setPay(this.value);" id="type" >
    						<option value='1'>{{trans("lang.zsk")}}</option>
    					<!--	<option value='3'>USDT-TRC20</option>-->
    					<!--	<option value='4'>USDT-ERC20</option> -->
    						<option value='5'>{{trans("lang.yhzz")}}</option>
                        </select>
    				</div>
    			</div>
    			<div class="form-group fps">
    				<label class="col-xs-3 control-label">{{trans("lang.zskzh")}}：</label>
    				<div class="col-xs-6">
    					 <input class="form-control" id="fps" value="{{$member->fps}}"   @if($member->fps) disabled=""  @endif >
    				</div>
    			</div>
    			<div class="form-group trc" style="display:none;">
    				<label class="col-xs-3 control-label">USDT-TRC20：</label>
    				<div class="col-xs-6">
    					 <input class="form-control" id="trc20"  value="{{$member->trc20}}"  @if($member->trc20) disabled @endif >
    				</div>
    			</div>
    			<div class="form-group erc" style="display:none;">
    				<label class="col-xs-3 control-label">USDT-ERC20：</label>
    				<div class="col-xs-6">
    					 <input class="form-control" id="erc20" value="{{$member->erc20}}" @if($member->erc20) disabled @endif >
    				</div>
    			</div>
    			<div class="form-group bank" style="display:none;">
    				<label class="col-xs-3 control-label">{{trans("lang.yhmc")}}：</label>
    				<div class="col-xs-6">
    					 <input class="form-control" id="bank_name" value="{{$member->bank}}"  @if($member->bank) disabled @endif >
    				</div>
    			</div>
    			<div class="form-group bank" style="display:none;">
    				<label class="col-xs-3 control-label">{{trans("lang.yhzh2")}}：</label>
    				<div class="col-xs-6">
    					 <input class="form-control" id="bank_card" value="{{$member->card}}"  @if($member->card) disabled @endif >
    				</div>
    			</div>
    			<div class="form-group">
    				<label class="col-xs-3 control-label">{{trans("lang.tkje")}}：</label>
    				<div class="col-xs-6">
    					<input type="text" class="form-control" id="money2222" name="money" placeholder='{{trans("lang.qingshurujine")}}' autocomplete="off">
    				</div>
    				<div class="col-xs-3 info">
    					*<span style="color:#FF0000;">&nbsp;{{trans("lang.tk100")}}&nbsp;</span>
    				</div>
    			</div>
    			<div class="form-group">
    				<label class="col-xs-3 control-label">{{trans("lang.shengyumaliang")}}：</label>
    				<div class="col-xs-6">
    					<input type="text" value="{{$member->ml_money}}" class="form-control" disabled >
    				</div>
    			</div>	
    			<div class="form-group">
    				<label class="col-xs-3 control-label">{{trans("lang.qkmm")}}：</label>
    				<div class="col-xs-6">
    					<input type="text" id="qk_pwd" onfocus="this.type='password'" class="form-control" name="qk_pwd" placeholder="******" autocomplete="off">
    				</div>
    				<div class="col-xs-3 info">
    					*<span style="color:#FF0000;">{{trans("lang.qingshuqukuanmima")}}</span>
    				</div>
    			</div>			
    			<div class="form-group">
    				<label class="col-xs-3 control-label"></label>
    				<div class="col-xs-6">
    					<button type="button" onclick="tixian();" class="ajax-submit-without-confirm-btn" style="width: 100%;height: 46px;font-size: 16px;color:#fff;font-weight: 800;border: 0px solid #EB5D4D;background:linear-gradient(90deg,#d2b496,#e6ceb6);margin-top:10px;border-radius: 4px;">{{trans("lang.quedihng")}}</button>
    				</div>
    			</div>
    		</form>
    
    	<table width="60%" border="0" cellpadding="0" cellspacing="5" style="margin:30px auto;">
             <tbody>
    
                <tr>
    
                    <td>
    
    				  <div style=" line-height:26px;font-size:12px;font-family: 微软雅黑;color:#696969">
                          備注：若貴客您的提現狀態顯示提款成功，其實並不意味著錢已經存入您的銀行戶口，本公司需要大約5至15分鐘時間處理出款事物，但會盡快把您的款項存入您所提供的帳號內，謝謝您的諒解，希望您盈利多多！
    				  </div>
                    </td>
    
                </tr>
             </tbody>
        </table>
    
    
    	</div>
    </div>
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
</div>
<script>
    
</script>
 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>