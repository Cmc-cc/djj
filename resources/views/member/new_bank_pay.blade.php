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
		<div id="layout-main-area">
			<div style="height: 100%; background-color: rgb(255, 255, 255);" id="layout-main-area-div">
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


</style>

<div style="width:100%;margin-bottom:5px;background: linear-gradient(90deg,#e8e8e8,#cccbca);overflow: hidden;">
	@if(!$setting->is_qq_on)
		<a href="ali_pay_xin" class="switchroute"><div class="zfu"><span class="zfu1">{{trans('lang.zhuanhuankuai')}}</span></div></a>
	@endif

	@if(!$setting->is_bankpay_on)
		<a href="new_bank_pay" class="switchroute"><div class="zfu bgc"><span style="color:#f5f5f5">{{trans('lang.yinhanghuikuan')}}</span></div></a>
	@endif

	@if(!$setting->is_alipay_on)
		<a href="weixin_pay_xin" class="switchroute"><div class="zfu"><span class="zfu1">{{trans('lang.bldzz')}}</span></div></a>
	@endif

	@if(!$setting->is_wechat_on)
		<a href="usdt_pay_xin" class="switchroute"><div class="zfu"><span class="zfu1">{{trans('lang.xnbzf')}}</span></div></a>
	@endif
					  
	  </div>

<div id="main-container">
	<div class="module-main" style="margin-top:26px;">
		<form action="https://www.emixbet.com/member/new_bank_pay" method="post" class="form-horizontal">
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
					<input type="number" class="form-control" name="amount" id="amount" onblur="jine_input()" placeholder="{{trans("lang.qingshuru")}}{{trans("lang.huikuanjine")}}">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp;{{trans("lang.qingshuru")}}{{trans("lang.huikuanjine")}}<span class="STYLE12">*</span>
				</div>
			</div>

			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">{{trans('lang.hkyh')}}：</div>
				<div style="float:left" class="col-xs-6">
					<select class="form-control" id="banksss" onchange="setBank(this.value);">
                    	@foreach($banks as $item)
						<option value='{{ $item->bank_id }}' data-cardno="{{ $item->card_no }}" data-username="{{ $item->username }}">{{ $item->bank_name }}</option>
					    @endforeach
					</select>
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp;{{trans('lang.qxzckyh')}}<span class="STYLE12">*</span>
				</div>
			</div>	
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">{{trans('lang.skzh')}}：</div>
				<div style="float:left;" class="col-xs-6">
					<input type="text" class="form-control" id="bank_card" name="name" value="{{ count($banks)>0 ? $banks[0]->card_no : '' }}" readonly="">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp; {{trans('lang.skzh')}}<span class="STYLE12">*</span>
				</div>
			</div>
			
			<div class="form-group" style="margin-bottom:10px">
				<div class="col-xs-3 control-label">{{trans('lang.skzhm')}}：</div>
				<div style="float:left;" class="col-xs-6">
					<input type="text" class="form-control" id="bank_name" name="name" value="{{ count($banks)>0 ? $banks[0]->username : '' }}" readonly="">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp; {{trans('lang.skzhm')}}<span class="STYLE12">*</span>
				</div>
			</div>

		<!--	<div class="form-group" style="margin-bottom:16px;">
				<div class="col-xs-3 control-label">{{trans("lang.cksj")}}：</div>
				<div style="float:left;" class="col-xs-6">
						<input type="text" name="paytime" class="form-control" value="2022-08-16 21:36:37" readonly="">
				</div>
				<div class="col-xs-3 info">
					&nbsp;&nbsp;{{trans("lang.zdhq")}}{{trans("lang.cksj")}}<span class="STYLE12">*</span>
				</div>
			</div>

			<div class="form-group">
			    <div class="col-xs-3 control-label">{{trans("lang.skyh")}}：</div>
				<div class="col-xs-6">
				<div id="kuang1" style="text-align:left">
																		<ul class="kuang1" id="kuang2">
								<label class="checkbox1 cc-checkbox" style="float:left">
									<li class="blank2">
										<table cellpadding="0" cellspacing="0" border="0">
											<tbody><tr>
												<td style="height:46px">
													<div style="float:left;font-size:14px;float:left;padding:0 10px;line-height: 27px;display:flex; color:#000;">
														<img src="/images/bank17.png" style="height:27px">&nbsp;
														{{trans("lang.zhuanhuankuai")}}
														<input type="radio" name="xuankuang" id="rad" value="64">
													</div>
												</td>
											</tr>
										</tbody></table>


									</li>
								</label>
							</ul>
											                </div>	
				</div>
			</div>-->
			<script type="text/javascript">
	            var paytype = 5;
	            var bankid = $("#banksss").val();
	            var account = "{{trans('lang.yinhanghuikuan')}}";
        		function setBank(bid){
        		    bankid = bid;
        		    var username = $("#banksss").find("option:selected").attr('data-username');
        		    $("#bank_name").val(username);
        		    $("#bank_card").val(account);
        		}
			</script>

			<input type="hidden" name="payment_type" value="3">
			<div class="form-group">
			    <div class="col-xs-3 control-label"></div>
				<div class="col-xs-6">
					<button onclick="chongzhi()" type="button" class="ajax-submit-without-confirm-btn switchroute" style="width: 100%;height: 46px;font-size: 16px;color:#fff;font-weight: 800;border: 0px solid #EB5D4D;background:linear-gradient(90deg,#d2b496,#e6ceb6);margin-top:10px;border-radius: 4px;">{{trans("lang.qrcz")}}</button>
				</div>
			</div>

		  
		</form>

		<table width="71%" border="0" cellpadding="0" cellspacing="5" style="margin:auto">
            <tbody><tr>
                <td align="left" style="padding-top:10px;font-family: 微软雅黑;color:#696969"><strong class="STYLE1">支付寶轉數快轉賬說明：</strong></td>
            </tr>
            <tr>

                <td align="left">
                   <span class="font-hblack">
					  <span>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">1.在轉賬界面，填入我們公司轉數快的電話號碼(注：不是FPS ID，支付寶只是支持轉數快手機號碼）。</div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">2.如果您在本公司看到的是FPS ID，請您向客服徵求FPS ID的手機號碼及再次確認。</div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">3.轉賬前，請您確保存款人名字與手機號碼持有人一致，確認存款人姓名了才能轉賬。</div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">4.切記：您一定需要把 whatsapp/支付寶轉賬換成FPS，這個步驟很重要，必須確保選擇了FPS！！！</div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">5.如果您的存款轉錯帳號，我司恕不負責，謝謝您的體諒。</div>
						 <div style=" line-height:22px;font-size:12px;font-family: 微软雅黑;color:#696969">如有不明之處，請您在轉賬前聯繫客服再次確認，謝謝您。</div>
					  </span>                   
				   </span>                  
				</td>

            </tr>
         </tbody>
    </table>


	</div>
</div>
			</div>
		</div><span></span>
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