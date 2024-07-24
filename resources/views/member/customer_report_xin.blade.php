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
    <script src="/js/laydate.js"></script>
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
            				<div id="main-container">
            	<div class="top-filter">
            		<div class="col-xs-4" style="padding-left:0;padding-right:0">
            			<div class="form-group">
            				<label class="col-xs-4" style="text-align:center;padding-top:7px;padding-right:0">{{trans("lang.xclx")}}</label>
            				<div class="col-xs-7">
            					<select class="form-control1 report_option" id="report_option" onchange="deposit2()">
            						<option value="0" @if($type==0)  selected @endif>{{trans("lang.ckjl")}}</option>
            						<option value="1" @if($type==1)  selected @endif>{{trans("lang.tkjl")}}</option>
            						<option value="2" @if($type==2)  selected @endif>{{trans("lang.edzh")}}</option>
            						<option value="4" @if($type==4)  selected @endif>{{trans("lang.hljl")}}</option>
            					</select>
            				</div>
            			</div>			
            		</div>
            		<div class="col-xs-4" style="padding-left:0;padding-right:0">
            			<div class="form-group">
            				<label class="col-xs-4" style="text-align:center;padding-top:7px;padding-right:0">{{trans("lang.kssj")}}</label>
            				<div class="col-xs-7">
            					<input type="text" id="startTime" class="form-control1" value="{{$start}}" placeholder="{{trans("lang.xzrq")}}" lay-key="1">
            				</div>
            			</div>		
            		</div>
            		<div class="col-xs-4" style="padding-left:0;padding-right:0">
            			<div class="form-group">
            				<label class="col-xs-4" style="text-align:center;padding-top:7px;padding-right:0">{{trans("lang.jssj")}}</label>
            				<div class="col-xs-7">
            					<input type="text" id="endTime" style="margin-right:0" value="{{$end}}" class="form-control1" placeholder="{{trans("lang.xzrq")}}" lay-key="2">
            				</div>
            			</div>		
            		</div>		
            	</div>
            	<div class="module-main" style="height: 630px; overflow: auto">
                    <div class="table-top">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>{{trans("lang.shijian")}}</th>
                                <th>{{trans("lang.leixing")}}</th>
                                <th>{{trans("lang.jine")}}</th>
                                <th>{{trans("lang.yy")}}</th>
                                <th>{{trans("lang.zhuangtai")}}</th>
                            </thead>
                            <tbody>
                                 @foreach($data as $item)
                                    <tr>
                                         <td style="width:24%">{{ $item->created_at }}</td>   
                                        <td style="width:19%">
                                            @if($type==0) {{trans("lang.ckjl")}}@endif
                                            @if($type==1) {{trans("lang.tkjl")}}@endif
                                            @if($type==2) {{trans("lang.edzh")}}@endif
                                            @if($type==4) {{trans("lang.hljl")}}@endif
                                        </td>  
                                        <td style="width:19%">{{ $item->money }}</td>  
                                        <td style="width:20%">{{ $item->fail_reason }}</td>
                                        <td style="width:19%">
                                            @if($type==2 || $type==4)
                                                 <strong style="color:green;">{{trans("lang.chenggong")}}</strong>
                                            @else
                                             @if($type==0)
                                               {!! \App\Models\Base::$RECHARGE_STATUS_HTML[$item->status] !!}
                                               @else
                                               {!! \App\Models\Base::$DRAWING_STATUS_HTML[$item->status] !!}
                                               @endif
                                            @endif
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="tcdPageCode">
                          {!! $data->render() !!}
                        </div>
                        <!--<div class="tcdPageCode tcdPageCode0" style="display: block;">
                            <span class="disabled">上一页</span>
                            <span class="current">1</span>
                            <span class="disabled">下一页</span></div>
                        <div class="tcdPageCode tcdPageCode1" style="display: none;"></div>
                        <div class="tcdPageCode tcdPageCode2" style="display: none;"></div>
                        <div class="tcdPageCode tcdPageCode3" style="display: none;"></div>-->
                    </div>		
            	</div>
            
            </div>
            
            <script type="text/javascript">
            	function deposit2(){
            	    var type = $("#report_option").val();
            	    var start = $('#startTime').val();
            	    var end = $('#endTime').val();
            	    window.location.href='/member/customer_report_xin?type='+type+'&start='+start+'&end='+end;
            	}
                var initPage=false;  //初始状态
            	var size = 13; 
            	function deposit(obj,type, page, callback){
            		//obj  选择时间控件的时候 obj传递了他本身 this
            		//type=0  左侧select选择模式  type=1 右侧时间选择
            		//左侧select切换的时候，右侧有默认时间，则请求的时候要带上；
            		var optionIndex= $('option:selected', '.report_option').val(); //选中的option的index
            		var theadArr=[['存款時間','存款方式','存款金額','原因','狀態'],['提款時間','金額','原因','狀態'],['轉賬時間','金額','轉出/轉入賬戶','狀態'],['平台','投注','输赢','时间'],['紅利類型','金額',  '發放時間']];
            		//请求的地址1111 以数组存放  一一对应
            		
            		
            		//存款记录
            		//提款记录
            		//额度转换
            		//游戏记录
            		
            		
            		var tbodyHtml='';  //tbody tag
            		var theadHtml='';  //thead tag
            
            
            
            
            
            		var search = function (p,type) {
            			var filter = {
            				page: p
            			}
            
            			getList(filter);
            
            		};
            
            		search(page);
            
            		
            	}
            
            	$(function(){
            		//开始日期
            	var insStart = laydate.render({
            		elem: '#startTime'
            		,min: '2017-1-1',
            		theme: '#393D49'
            		,done: function(value, date){
            			//更新结束日期的最小日期
            			/*insEnd.config.min = lay.extend({}, date, {
            				month: date.month - 1
            			});*/
            
            			//自动弹出结束日期的选择器
            			insEnd.config.elem[0].focus();
            		}
            	});
            	//结束日期
            	var insEnd = laydate.render({
            		elem: '#endTime'
            		,min: '2017-1-1',
            		theme: '#393D49'
            		,done: function(value, date){
            			 deposit2()
            		}
            	});
            	})
            
            	function dateAjax(nowDate){
            		console.log(nowDate.value);
            		console.log($('#startTime').val());
            	}
            	
            
            	
            	$("#report_option").change(function(){
            		
            		
            	})
            
            
            
            
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
</div>
<style>
table{
	color:#000;
}
.form-control1 {
	display:block;
	width:100%;
	height:38px;
	padding:6px 12px;
	font-size:14px;
	line-height:1.42857143;
	color: #777575;
    background-color: #fff;
    background-image: none;
    border: 1px solid #a9abaf;
    border-radius: 4px;
	-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow:inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s
}
</style>
 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>