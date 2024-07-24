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
				    <style type="text/css">
       .dv{ line-height:25px;}
        .body2{
            width: 940px;
            height: auto;
            padding: 10px 0 0 12px;
            margin-left:10px;
            margin-right:10px;
            float:left;
        }
        .tds {
            line-height:25px;
        }
        .STYLE1 {font-weight: bold}
        .STYLE2 {color: #0000FF}
        .STYLE12{ color:#F00;padding:4px 0 0 4px ;}

		.add{width:100%;margin-top:5px}
        .add p{padding:10px 10px 0 70px ;font-size: 14px;}
		.add1, .add p input {
    height: 30px;
    margin-left: 10px;
    line-height: 30px;
    padding-left: 5px;
    width: 200px;
    border-radius: 4px;
    border: 1px solid #ab8c84;
		}

ul,li{list-style: none;}
.kuang1 li{
	height: 46px;
	border: 2px solid #545454;
	float: left;
	margin: 0 10px 12px 0;
}


.kuang1 .blank2{
	border: 2px solid red;
}
.kuang1 li input{
	margin-left: 30px;
	display: none;
}
.kuang1 .checkbox1.cc-checkbox li{
	position: relative;
}
.col-xs-asc{
	width:100%;
	padding-right:15px;
	padding-left:15px
}

</style>

<div style="width:100%;margin-bottom:5px;background: linear-gradient(90deg,#e8e8e8,#cccbca);overflow: hidden;">
	  	@if(!$setting->is_qq_on)
		<a href="ali_pay_xin" class="switchroute"><div class="zfu "><span class="zfu1" >{{trans('lang.zhuanhuankuai')}}</span></div></a>
	@endif

	@if(!$setting->is_bankpay_on)
		<a href="new_bank_pay" class="switchroute"><div class="zfu"><span class="zfu1">{{trans('lang.yinhanghuikuan')}}</span></div></a>
	@endif

	@if(!$setting->is_alipay_on)
		<a href="weixin_pay_xin" class="switchroute"><div class="zfu bgc"><span class="zfu1" style="color:#f5f5f5">{{trans('lang.bldzz')}}</span></div></a>
	@endif

	@if(!$setting->is_wechat_on)
		<a href="usdt_pay_xin" class="switchroute"><div class="zfu"><span class="zfu1">{{trans('lang.xnbzf')}}</span></div></a>
	@endif
</div>

<div id="main-container">
	<div class="module-main" style="margin-top:26px;">
		<form action="https://www.emixbet.com/member/weixin_pay" method="post" class="form-horizontal">

			<script type="text/javascript">
			    account = "{{trans('lang.bldzz')}}";
                paytype = 2;
                bankid =0;
			</script>
		
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">{{trans("lang.yhzh")}}：</div>
				<div style="float:left;" class="col-xs-6">
					<input type="text" class="form-control" value="{{$_member->name}}" disabled="">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp; {{trans("lang.zdhq")}}{{trans("lang.zanghao")}}<span class="STYLE12">*</span>
				</div>
			</div>

			
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">{{trans("lang.huikuanjine")}}：</div>
				<div style="float:left;" class="col-xs-6">
					<input type="number" class="form-control" name="money" id="amount" placeholder="{{trans("lang.qingshuru")}}{{trans("lang.huikuanjine")}}">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp;{{trans("lang.qingshuru")}}{{trans("lang.huikuanjine")}}<span class="STYLE12">*</span>
				</div>
			</div>

			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">{{trans('lang.skewm')}}：</div>
				<div style="float:left;" class="col-xs-6">
					<img src="{{ $_system_config->bld_pic }}" alt="">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp;{{trans('lang.skewm')}}<span class="STYLE12">*</span>
				</div>
			</div>
			<input type="hidden" name="payment_type" value="14">
			<div class="form-group">
			    <div class="col-xs-3 control-label"></div>
				<div class="col-xs-6">
					<button type="button" onclick="chongzhi()"  class="ajax-submit-without-confirm-btn" style="width: 100%;height: 46px;font-size: 16px;color:#fff;font-weight: 800;border: 0px solid #EB5D4D;background:linear-gradient(90deg,#d2b496,#e6ceb6);margin-top:10px;border-radius: 4px;"> {{trans("lang.qrcz")}}</button>
				</div>
			</div>
		</form>

     <table width="71%" border="0" cellpadding="0" cellspacing="5" style="margin:auto">
            <tbody><tr>
                <td align="left" style="padding-top:10px;font-family: 微软雅黑;color:#696969"><strong class="STYLE1">匯款信息提交說明：</strong></td>
            </tr>
            <tr>

                <td align="left">
                   <span class="font-hblack">
					  <span>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">(1).請按表格填寫準確的匯款轉賬信息,確認提交後相關財務人員會即時為您查詢入款情況! </div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">(2).便利店充值金額必需為50之倍數! 最小100 最大5000！！</div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">(3).如有任何疑問,您可以聯系在線客服,電運娛樂為您提供365天×24小時不間斷的友善和專業客戶咨詢服務!</div>
					  </span>                   
				   </span>                  
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
 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>