<!DOCTYPE html>
<!-- saved from url=(0032)https://www.cash669.net/m/xiaoxi -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo e($_system_config->site_title); ?></title>
    <meta name="csrf-token" content="Xq26q21cIIcUe7g0ljuZBMlJCEO4iqIp5lWwUVKn">
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

<div class="m_container1">

    <div class="nytop" style="position: fixed;top:0;width: 100%;">
        <a href="javascript:history.go(-1);" class="fhbtn"></a>
        <h1>申请进度</h1>
    </div>



<style>
a:hover{color:#0066FF}
td a {
    color: #428bca;
    text-decoration: none;
}
.Hyzx-body {
    padding:.88rem 0 .4rem;
}    
.Hyzx-table {
    border-collapse: collapse;
    width: 100%;
}

table {
    text-align: center;
    vertical-align: middle;
}
.Hyzx-table th {
    background: #837863;
    color: #fff;
}
.Hyzx-table td, .Hyzx-table th {
    border-right: 0 none;
    font: .26rem/.8rem arial;
    height: .8rem;
}
th {
    text-align: center;
    vertical-align: middle;
}
.Hyzx-table td .Hyzx-tdTitle {
    color: #999;
    margin-right: .2rem;
    display: inline-block;
    min-width: 1.8rem;
    text-align: right;
}
.Hyzx-table td {
    /*border-top: .02rem solid #EFEAE5;*/
    border-bottom: .02rem solid #837863;
    line-height: 1.5;
    padding:.2rem 0;
    /*background: #fff;*/
    font-size:18px;
    color:#fff;
}
.Hyzx-table {
    border-collapse: collapse;
    width: 100%;
}
.Hyzx-btn{margin: 0 .08rem}
.active {
    color: red;
    border-radius: .1rem;
    background:#fff
}
</style>



<div id="main-container" style="height:100%">
    <div class="Hyzx-body">                
        
        <div id="MMainData">
            
            <ul class="list-group" style="padding: 15px;">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item message-item" style="background: #fff;background: #fff;padding: 10px;font-size: 16px;line-height: 1.5;border-radius:5px;">
                                <div class="message-title" style="color:#000;">活动标题：<?php echo e($item->activity->title); ?></div>
                                <div class="message-content" style="color:#000;">
                                    <?php if($item->status == 3): ?>
                                        你的活动申请未通过，原因：<?php echo e($item->fail_reason); ?>

                                    <?php endif; ?>
                                    <?php if($item->status == 2): ?>
                                        恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                    <?php endif; ?>
                                    <?php if($item->status == 1): ?>
                                        你的活动申请正在审核，请耐心等耐！
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
        </div>
    </div>
</div>
</div>

    <script type="text/javascript">
        var oMsg = {
            "totalPage": {},    //總頁數
            "pageMsg": 10,      //每頁顯示訊息數
            "msglist": $('#general-msg'),
            'currentPage': 1,    //當前頁碼
            //訊息處理(閱讀、刪除、設定未讀訊息)
            "processMsg": function(msgId, type, method) {
                var msgwrap = $("#msg" + msgId);
                if(document.getElementById("msg" + msgId) && method == 'getdetail') {
                    if(msgwrap.is(":hidden")) {
                        $("p[id^=msg]").not("#msg" + msgId).slideUp(function() {
                            $(this).parent().css("display", "none");
                        });
                        msgwrap.parent().css("display", "").end().slideDown();
                    }else{
                        msgwrap.slideUp(function() {
                            $(this).parent().css("display", "none");
                        });
                    }
                } else {
                    $.ajax({
                        type:'GET',
                        url:'/post_msg',
                        dataType:'json',
                        data: {'id': msgId,'type':type,'uid':4751},
                        cache: false,
                        error: function() {
                            alert('Failed!! Please Try Again!!');
                            return false;
                        },
                        success: function(data) {
                            switch(method) {
                                case "getdetail":
                                    $("p[id^=msg]").slideUp(function() {
                                        $(this).parent().css("display", "none");
                                    });
                                    $("#list" + msgId).removeClass('notRead').addClass("haveRead");

                                    var content = "<tr class='msgcontent'><td style='padding-left:12px;' width='980' colspan='4'><p id='msg" + msgId + "' style='display:none;'>" + data.content +"</p></td></tr>";
                                    $("#list" + msgId).after(content);
                                    $("#msg" + msgId).slideDown();
                                    $("#islook" + msgId).text("已读");
                                    break;
                                case "delmsg":
                                    if($("#list" + msgId).next().is("tr[class=msgcontent]")) {
                                        $(".msgcontent").remove();
                                    }
                                    $("#list"+msgId).remove();
                                    oMsg.page(oMsg.currentPage);
                                    break;
                            }

                        }
                    });
                }
            },
        "page": function(p) {
            this.msglist.find("tr").css({"background-color": ""});
            $(".msgcontent").remove();
            oMsg.currentPage = p;
            this.totalPage = Math.ceil(this.msglist.find("tr").length / this.pageMsg);

            if(this.totalPage > 1) {
                $("#msgfoot").show();
            }
            if(this.totalPage == 1) {
                $("#msgfoot").hide();
            }
            $("#msgfoot tr td").html("");
            oMsg.msglist.find("tr").hide();

            //判斷最後一頁是否有筆數
            if(oMsg.currentPage > this.totalPage) {
                oMsg.currentPage = this.totalPage ;
            }
            for(var i = ((oMsg.currentPage-1) * oMsg.pageMsg ) ; i < oMsg.pageMsg + ((oMsg.currentPage - 1) * oMsg.pageMsg); i++) {
                oMsg.msglist.find("tr:eq(" + i + ")").show();
            }
            if(oMsg.currentPage>1){
                $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(1)'>首页&nbsp;</a>");
                $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(" + (oMsg.currentPage-1) + ")'>&nbsp;上一页&nbsp;&nbsp;</a>");
            }
            var min = oMsg.currentPage-3;
            if(min<=0)min=1;
            var max = min+7;
            if(oMsg.currentPage>5){
                $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(1)'>1</a>");
                $("#msgfoot tr td").append("&nbsp;&nbsp;...");
            }
            for(var t = 1 ; t <= this.totalPage ; t++) {
                if(t<min||t>max)continue;
                if(oMsg.currentPage == t) {
                    $("#msgfoot tr td").append("<span id='currentpage' href='javascrip:void(0);' class='Hyzx-btn active'>" + t + "</span>");
                } else {
                    $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(" + t + ")'>" + t + "</a>");
                }
            }
            if(max<this.totalPage){
                $("#msgfoot tr td").append("&nbsp;&nbsp;...");
                $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(" + this.totalPage + ")'>" + this.totalPage + "</a>");
            }
            if(oMsg.currentPage<this.totalPage){
                $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(" + (oMsg.currentPage+1) + ")'>&nbsp;&nbsp;&nbsp;下一页&nbsp;&nbsp;</a>");
                $("#msgfoot tr td").append("<a class='Hyzx-btn' href='javascrip:void(0);' onclick='oMsg.page(" + this.totalPage + ")'>&nbsp;尾页&nbsp;</a>");
            }
            //$("#msgfoot tr td").append("&nbsp;&nbsp;<a class='Hyzx-btn' href='javascrip:void(0);'>&nbsp;共"+this.totalPage+"页&nbsp;</a>");
        }           

        }

        oMsg.page(oMsg.currentPage);

        $(".MMain tbody tr").hover(function(){
            $("td", this).addClass("mouseenter");
            $("td a", this).addClass("mouseenter");
        }, function() {
            $("td", this).removeClass("mouseenter");
            $("td a", this).removeClass("mouseenter");
        });
    </script>



<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>