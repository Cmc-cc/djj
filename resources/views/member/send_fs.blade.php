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
    				<section class="content">
        <div class="rebate-wrapper">
    
     <form action="https://www.emixbet.com/member/send_fss" method="post">
    	<div class="top">
    		<div class="title">
    			<h2>
    				{{trans("lang.fanshui")}} 
    			</h2>
    			<!-- <span class="watch-rule">
    				查看洗碼規則
    			</span> -->
    		</div>
    		<div class="contents">
    			<p class="total-txt">
    				{{trans("lang.kejiesuanjine")}}  
    			</p>
    			<div class="amount-area">
    				<p class="dollars">
    					{{$total['fs_money']}}
    				</p>
    			</div>
    		    <input type="hidden" name="member_id[]" checked="" value="13513">
    	        <input type="hidden" name="money[13513]" value="0.00">
                <input type="hidden" name="gamebillno[13513]" class="form-control" value="">
                            <input type="hidden" name="uniqid" value="3afbaa36efac2611e0733152d1311170">
                <button type="button" id="fanshuic" class="wash submit-form-sync">
    				{{trans("lang.quanbuximajiesuan")}}
    			</button>
    			<p class="cant">
    				<span>
    					{{trans("lang.fanshui_alt")}}
    				</span>
    			</p>
    		</div>
    	</div>
    	
      </form>
    </div>
    
    
    
        </section><!-- /.content -->
    
    <style type="text/css">
    .rebate-wrapper {
      width: 100%;
      float: left;
    
    }
    .rebate-wrapper:before, .rebate-wrapper:after {
        content: '';
        display: table;
    }
    .rebate-wrapper:after {
        clear: both;
    }
    .rebate-wrapper .top, .rebate-wrapper .bottom {
        background-color: #fff;
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
        padding: 26px 24px 44px;
    }
    .rebate-wrapper .top .title, .rebate-wrapper .bottom .title {
          margin-bottom: 15px;
    }
    .rebate-wrapper .top .title:before, .rebate-wrapper .top .title:after, .rebate-wrapper .bottom .title:before, .rebate-wrapper .bottom .title:after {
            content: '';
            display: table;
    }
    .rebate-wrapper .top .title:after, .rebate-wrapper .bottom .title:after {
            clear: both;
    }
    .rebate-wrapper .top .title h2, .rebate-wrapper .bottom .title h2 {
            float: left;
            color: #666666;
            font-size: 20px;
            font-weight: 400;
    }
    .rebate-wrapper .top .title .watch-rule, .rebate-wrapper .bottom .title .watch-rule {
            float: right;
            color: #F9AB10;
            font-size: 14px;
            cursor: pointer;
            position: relative;
            top: 4px;
    }
    .rebate-wrapper .top {
        margin-bottom: 12px;
    }
    .rebate-wrapper .top .contents {
          text-align: center;
    }
    .rebate-wrapper .top .contents .total-txt {
            margin-bottom: 6px;
            color: #675c5c;
            font-size: 14px;
    }
    .rebate-wrapper .top .contents .amount-area {
            height: 40px;
            margin-bottom: 24px;
    }
    .rebate-wrapper .top .contents .amount-area .dollars {
              font-size: 30px;
              color: #F9AB10;
    }
    .rebate-wrapper .top .contents button.wash {
            width: 176px;
            height: 50px;
            color: #FFF;
            font-size: 16px;
            background: linear-gradient(90deg,#d2b496,#e6ceb6);
            font-weight: bold;
            margin-bottom: 6px;
    		border:0;
    		border-radius: 4px;
    }
    .rebate-wrapper .top .contents button.wash.active {
              background-image: linear-gradient(135deg, #EB5D4D, #FB2464);
              filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EB5D4D', endColorstr='#FB2464', GradientType=1);
              cursor: pointer;
    }
    .rebate-wrapper .top .contents .monday {
            color: #999999;
            font-size: 14px;
    }
    .rebate-wrapper .top .contents .cant {
            margin-top: 24px;
            color: #E05244;
            font-size: 12px;
    }
    .rebate-wrapper .top .contents .cant img {
              position: relative;
              top: 4px;
              margin-right: 2px;
    }
    .rebate-wrapper .bottom table {
        font-size: 14px;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }
    .rebate-wrapper .bottom table thead {
          color: #666666;
    }
    .rebate-wrapper .bottom table tbody {
          color: #999999;
    }
    .rebate-wrapper .bottom table tbody tr {
          background-color: #f7f9fb;
          border-top: 6px solid #ffffff;
    }
    .rebate-wrapper .bottom table tbody tr span.ques {
              display: inline-block;
              width: 18px;
              height: 18px;
              background-image: url(../web/css/images/xunwen1.png);
              background-size: cover;
              cursor: pointer;
              position: relative;
              top: 4px;
              left: 5px;
              -webkit-transition: .3s;
              transition: .3s;
    }
    .rebate-wrapper .bottom table tbody tr span.ques:hover {
                background-image: url(../web/css/images/xunwen.png);
    }
    .rebate-wrapper .bottom table tbody tr span.ques:hover .quesPop {
                  opacity: 1;
                  z-index: 0;
    }
    .rebate-wrapper .bottom table tbody tr span.ques .quesPop {
                position: absolute;
                top: -13px;
                left: 32px;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                background-color: #181818;
                font-size: 14px;
                color: #999999;
                border: 1px solid #333333;
                width: 460px;
                height: 44px;
                line-height: 44px;
                -webkit-transition: .3s;
                transition: .3s;
                opacity: 0;
                z-index: -1;
    }
    .rebate-wrapper .bottom table tbody tr span.ques .quesPop:before {
                  content: '';
                  display: inline-block;
                  position: absolute;
                  width: 0;
                  height: 0;
                  border-color: transparent;
                  border-style: solid;
                  top: 12px;
                  left: -13px;
                  border-width: 10px 13px 10px 0;
                  border-right-color: #333333;
                  pointer-events: none;
                  -webkit-transition: .3s;
                  transition: .3s;
    }
    .rebate-wrapper .bottom table tbody tr span.ques .quesPop:after {
                  content: '';
                  position: absolute;
                  width: 0;
                  height: 0;
                  border-color: transparent;
                  border-style: solid;
                  top: 9px;
                  left: -11px;
                  border-width: 13px 16px 13px 0;
                  border-right-color: #181818;
                  pointer-events: none;
    }
    .rebate-wrapper .bottom table tbody tr.cant {
              color: #555;
    }
    .rebate-wrapper .bottom table tr {
          height: 50px;
    }
    .rebate-wrapper .success-popup {
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0px;
        left: 0px;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 99;
    }
    .rebate-wrapper .success-popup .success-content {
          width: 494px;
          background-color: #F9F9F9;
          position: absolute;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
                  transform: translate(-50%, -50%);
    }
    .rebate-wrapper .success-popup .success-content .success-header {
            position: relative;
            background-image: -webkit-gradient(linear, left top, right top, from(#F1F1F4), to(#DFE0E4));
            background-image: linear-gradient(to right, #F1F1F4, #DFE0E4);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F1F1F4', endColorstr='#DFE0E4', GradientType=1);
    }
    .rebate-wrapper .success-popup .success-content .success-header h5 {
              margin: 0;
              line-height: 50px;
              font-size: 16px;
              color: #7F7F7F;
              text-align: center;
    }
    .rebate-wrapper .success-popup .success-content .success-header img {
              position: absolute;
              top: 12px;
              right: 12px;
              cursor: pointer;
    }
    .rebate-wrapper .success-popup .success-content .success-body {
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            padding: 36px;
            text-align: center;
    }
    .rebate-wrapper .success-popup .success-content .success-body p {
              font-weight: bold;
              text-align: center;
    }
    .rebate-wrapper .success-popup .success-content .success-body p.big {
                font-size: 20px;
                margin-bottom: 12px;
    }
    .rebate-wrapper .success-popup .success-content .success-body p.small {
                font-size: 16px;
                margin-bottom: 18px;
    }
    .rebate-wrapper .success-popup .success-content .success-body p .yellow {
                color: #F9AB10;
    }
    .rebate-wrapper .success-popup .success-content .success-body p .red {
                color: #FB2464;
    }
    .rebate-wrapper .success-popup .success-content .success-body p .gray {
                color: #7F7F7F;
    }
    .rebate-wrapper .success-popup .success-content .success-body .detail-toggle {
              color: #7F7F7F;
              font-size: 14px;
              cursor: pointer;
              margin-bottom: 18px;
              display: inline-block;
    }
    .rebate-wrapper .success-popup .success-content .success-body .detail-toggle:after {
                content: '';
                display: inline-block;
                width: 18px;
                height: 18px;
                background-image: url(../web/css/images/xia.png);
                background-size: cover;
                position: relative;
                top: 4px;
                -webkit-transform: rotateZ(0deg);
                        transform: rotateZ(0deg);
                margin-left: 5px;
    }
    .rebate-wrapper .success-popup .success-content .success-body .detail-toggle.open:after {
                -webkit-transform: rotateZ(180deg);
                        transform: rotateZ(180deg);
    }
    .rebate-wrapper .success-popup .success-content .success-body table {
              background-color: #F2F2F2;
              width: 100%;
              font-size: 14px;
    }
    .rebate-wrapper .success-popup .success-content .success-body table tr {
                line-height: 43px;
    }
    .rebate-wrapper .success-popup .success-content .success-body table.head {
                color: #A5A5A5;
    }
    .rebate-wrapper .success-popup .success-content .success-body table td.fail {
                color: #E05244;
    }
    .rebate-wrapper .success-popup .success-content .success-body .table-scroll {
              max-height: 192px;
              overflow-y: auto;
              margin-bottom: 24px;
    }
    .rebate-wrapper .success-popup .success-content .success-body .pop-btns {
              -webkit-box-sizing: border-box;
                      box-sizing: border-box;
              padding: 0 12px;
    }
    .rebate-wrapper .success-popup .success-content .success-body .pop-btns:before, .rebate-wrapper .success-popup .success-content .success-body .pop-btns:after {
                content: '';
                display: table;
    }
    .rebate-wrapper .success-popup .success-content .success-body .pop-btns:after {
                clear: both;
    }
    .rebate-wrapper .success-popup .success-content .success-body .pop-btns button {
                width: 181px;
                height: 50px;
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
    }
    .rebate-wrapper .success-popup .success-content .success-body .pop-btns button.contact {
                  color: #7F7F7F;
                  border: 1px solid rgba(24, 24, 24, 0.1);
                  float: left;
    }
    .rebate-wrapper .success-popup .success-content .success-body .pop-btns button.keep {
                  color: #FFF;
                  background-image: linear-gradient(135deg, #EB5D4D, #FB2464);
                  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EB5D4D', endColorstr='#FB2464', GradientType=1);
                  float: right;
    }
    </style>
    
    
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
$('#fanshuic').click(function(){
		$('#loading_div').css({'display':'flex'})
	    var btn = $('#fanshuic');
        btn.attr("disabled",true);
        $.ajax({
            url : "{{route('wap.send_fs')}}",
            type : 'POST',
            success : function (data) {
                if(data.status.errorCode == 0){
					chenggong_alert(1,data.status.msg);
                    btn.attr("disabled",false);
                    location.href=data.url;
                }
				else{
					chenggong_alert(2,data.status.msg);
				}
				$('#loading_div').css({'display':'none'})
            }
        })
        return false;
	})
</script>
 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>