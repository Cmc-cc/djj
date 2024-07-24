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
    <script src="/new0404/js/jquery.page.js"></script>
</head>
<body>
<div class="container2">
    <div class="top-box">
          <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
                 <div class="v-application--wrap">
                    @include('web.layouts.header_q8')
            <!-- main -->
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
    					<select name="api_type" id="api_type" class="form-control1 report_option">
    					    <option value="">{{trans("lang.xzyx")}}</option>
    					    @foreach($api_list as $k => $v)
                                @if($v=='AGS' || $v=='SUNBETS')
                                    @continue
                                @endif
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
    					</select>
    				</div>
    			</div>			
    		</div>
    		<div class="col-xs-4" style="padding-left:0;padding-right:0">
    			<div class="form-group">
    				<label class="col-xs-4" style="text-align:center;padding-top:7px;padding-right:0">{{trans("lang.kssj")}}</label>
    				<div class="col-xs-7">
    					<input type="text" id="startTime" class="form-control1" placeholder="{{trans("lang.xzrq")}}" lay-key="1">
    				</div>
    			</div>		
    		</div>
    		<div class="col-xs-4" style="padding-left:0;padding-right:0">
    			<div class="form-group">
    				<label class="col-xs-4" style="text-align:center;padding-top:7px;padding-right:0">{{trans("lang.jssj")}}</label>
    				<div class="col-xs-7">
    					<input type="text" id="endTime" style="margin-right:0"  class="form-control1" placeholder="{{trans("lang.xzrq")}}" lay-key="2">
    				</div>
    			</div>		
    		</div>		
    	</div>
    	<div class="module-main" style="height: 630px; overflow: auto">
            <div class="table-top">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>投註時間</th>
                        <th>訂單號碼</th>
                        <th>遊戲類型</th>
                        <th>投註金額</th>
                        <th>有效投註</th>
                        <th>派彩</th>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
                 <div class="tcdPageCode tcdPageCode3" style="display: block;">
                    <span class="disabled">上一页</span>
                    <span class="current">1</span>
                    <span class="disabled">下一页</span></div>
                <div class="tcdPageCode tcdPageCode3" style="display: none;"></div>
                <div class="tcdPageCode tcdPageCode3" style="display: none;"></div>
                <div class="tcdPageCode tcdPageCode3" style="display: none;"></div>
     
                </div>
            </div>		
    	</div>
        <div class="loading_shadow" style="display:none">
            <div class="shadow"></div>
            <img src="https://www.emixbet.com/web/images/loading-win8.gif" class="loading_win" width="110">
        </div>	
    </div>
    
    <script type="text/javascript">
    
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
    			
    		}
    	});
    	})
    	
    	var initPage=1;  //初始状态
    	var size = 13; 
    	var optionIndex= 3;
    	
    	function deposit(obj,type, callback){
    		//obj  选择时间控件的时候 obj传递了他本身 this
    		//type=0  左侧select选择模式  type=1 右侧时间选择
    		//左侧select切换的时候，右侧有默认时间，则请求的时候要带上；
    		//var optionIndex= $('option:selected', '.report_option').val(); //选中的option的index
    		
    		
    		var theadArr=[['存款时间','存款金额','状态'],['提款时间','提款金额','状态'],['转账时间','金额','转出/转入账户','状态'],['投註時間','訂單號碼','遊戲類型','投註金額','有效投註','派彩'],['红利类型','金额',  '发放时间']];
    		//请求的地址1111 以数组存放  一一对应
    
    		//存款记录
    		//提款记录
    		//额度转换
    		//游戏记录
    		var getUrl=["https://www.emixbet.com/member/rechargeList","https://www.emixbet.com/member/drawingList","https://www.emixbet.com/member/transferList","/member/gameRecordList","https://www.emixbet.com/member/dividendList"];
    		
    		var tbodyHtml='';  //tbody tag
    		var theadHtml='';  //thead tag
    		
    		
    		var getList = function (filter) {
    			var defaultStartTime=$('#startTime').val();  //开始时间内
    			var defaultEndTime=$('#endTime').val();   //结束时间
    			var api_type = $('option:selected', '#api_type').val()||'';
    			var url = getUrl[optionIndex]+"?page="+filter.page+"&start_at="+defaultStartTime+"&end_at="+defaultEndTime+"&api_type="+api_type+"&size="+size;
    			$.ajax({
    				type : 'GET',
    				url : url,
    				success : function(data){
    
    
    					var data=data;
    					var totalPage=Math.ceil(data.total/data.per_page);
    					var currentPage=data.current_page;
    
    
    						
    					tbodyHtml='';
    
    					  //游戏记录
    						var m = n =0;
    						var d=0;
    						console.log(data.data,3123)
    						for(var i=0;i<data.data.length;i++){
    							var type = '';
    
    							var sy = data.data[i].netAmount;
    							// alert(data.data[i].netAmount);
    							if(data.data[i].netAmount>0){
    							tbodyHtml+='<tr style="color:red">';
    							tbodyHtml+='   <td style=width:20%>'+data.data[i].betTime+'</td>';
    							tbodyHtml+='   <td style=width:19%>'+data.data[i].billNo+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+data.data[i].api.api_title+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+data.data[i].betAmount+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+data.data[i].validBetAmount+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+sy+'</td>';
    							tbodyHtml+='</tr>';
    							}else{
    							tbodyHtml+='<tr>';
    							tbodyHtml+='   <td style=width:20%>'+data.data[i].betTime+'</td>';
    							tbodyHtml+='   <td style=width:19%>'+data.data[i].billNo+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+data.data[i].api.api_title+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+data.data[i].betAmount+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+data.data[i].validBetAmount+'</td>';
    							tbodyHtml+='   <td style=width:15%>'+sy+'</td>';
    							tbodyHtml+='</tr>';								
    							}
    							d+=Number(data.data[i].validBetAmount);
    							m+=Number(data.data[i].betAmount);
    							n+=Number(sy);
    						}
    						tbodyHtml+='<tr>';
    						tbodyHtml+='<td style=width:20%;color:#FF9800;font-family:微软雅黑><B>總和</B></td>';
    						tbodyHtml+='<td style=width:19%></td>';
    						tbodyHtml+='<td style=width:15%></td>';
    						//tbodyHtml+='<td style=width:15%;color:#FF9800><B>$'+m.toFixed(2)+'</B></td>';
    						tbodyHtml+='<td style=width:15%;color:#FF9800><B>$'+d+'</B></td>';
    						//tbodyHtml+='<td style=width:15%;color:#FF9800><B>$'+d.toFixed(2)+'</B></td>';
    						tbodyHtml+='<td style=width:15%;color:#FF9800><B>$'+m+'</B></td>';
    						//tbodyHtml+='<td style=width:15%;color:#FF9800><B>$'+n.toFixed(2)+'</B></td>';
    						tbodyHtml+='<td style=width:15%;color:#FF9800><B>$'+n+'</B></td>';
    						tbodyHtml+='</tr>';
    					
    
    					$('tbody').html(tbodyHtml);
    					$('.tcdPageCode').hide().eq(optionIndex).show();
    					
    					if (initPage == false) {
    						initPage = true;
    						//表头
    						for(var m=0;m<theadArr[optionIndex].length;m++){
    							theadHtml+='<th>'+theadArr[optionIndex][m]+'</th>';
    						}
    						$('thead').html(theadHtml);
    						
    						
    					} else {	
    					}
    					$('.loading_shadow').hide();
    					callback && callback(totalPage)
    				}
    			})
    		};
    
    		var search = function (p,type) {
    			var filter = {
    				page: p
    			}
    
    			getList(filter);
    
    		};
    
    		search(type);
    	}
    	
    	function dateAjax(nowDate){
    		console.log(nowDate.value);
    		console.log($('#startTime').val());
    	}
    	
    	deposit(0,0, function(totalPage){
    	    
    		$(".tcdPageCode"+optionIndex).off() 
    		$(".tcdPageCode"+optionIndex).createPage({
    			pageCount: totalPage,
    			backFn:function(p){
    				$('.loading_shadow').show();
    				deposit(null, p)
    			}
    		});
    	
    	//开始日期
    	var insStart1 = laydate.render({
    		elem: '#startTime'
    		,min: '2017-1-1',
    		theme: '#47484a'
    		,done: function(value, date){
    			//更新结束日期的最小日期
    			/*insEnd.config.min = lay.extend({}, date, {
    				month: date.month - 1
    			});*/
    
    			//自动弹出结束日期的选择器
    			insEnd1.config.elem[0].focus();
    		}
    	});
    	//结束日期
    	var insEnd1 = laydate.render({
    		elem: '#endTime'
    		,min: '2017-1-1',
    		theme: '#47484a'
    		,done: function(value, date){
    			$('.loading_shadow').show();
    			deposit(this,1, function(totalPage){
    				$(".tcdPageCode"+optionIndex).off()
    				$(".tcdPageCode"+optionIndex).createPage({
    					pageCount: totalPage,
    					backFn:function(p){
    						$('.loading_shadow').show();
    						deposit(null, p)
    					}
    				});
    			});
    			//更新开始日期的最大日期
    			/*insStart.config.max = lay.extend({}, date, {
    				month: date.month - 1
    			});*/
    		}
    	});
    	});
    	
    	
    	$("#api_type").change(function(){
    		$('.loading_shadow').show();
    		deposit(this,1, function(totalPage){
    			$(".tcdPageCode"+optionIndex).off() 
    			$(".tcdPageCode"+optionIndex).createPage({
    				pageCount: totalPage,
    				backFn:function(p){
    					$('.loading_shadow').show();
    					deposit(null, p)
    				}
    			});
    		});
    	})
    	
    	
    
    	
    	//日期选择
    
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
</body>
</html>