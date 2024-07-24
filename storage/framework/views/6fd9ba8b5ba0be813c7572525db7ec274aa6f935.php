<style>

/*头部*/
.m_bac{
    background: #fff!important;
}
.headerTop a.signBtn{
    background: linear-gradient(to right, #d3b99e , #caa167)
}
.glodBox{
       background: #d3b99e;
    border-bottom: 1px solid #caa167;
    border-right: 1px solid #caa167;
}
.userName{
     background: #d3b99e;
    border-bottom: 1px solid #caa167;
    border-right: 1px solid #caa167;
}
.slideChose span{
    background: none;
    color: #9aa4c2;
}
.cur{
    color: #fff!important;
}
.slideChose span{
    width: 1.3rem;
    height: .8rem;
    box-sizing: border-box;
    margin-bottom: .2rem;
    border-radius: .2rem;
    box-shadow: 0 0.08rem 0.12rem 0 rgba(65,70,92,.3);
    background-image: url(../images/tabNormal.png);
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 100% 100%;
    -webkit-box-align: center;
    align-items: center;
    position: relative;
    overflow: hidden;
}

/*底部*/
.fixBottoms {
	position: fixed;
	width: 100%;
	height: .96rem;
	left: 0;
	bottom: 0;
	z-index: 10;
	box-shadow: 0 0 0.1rem 0 rgba(0,0,0,.2);
	background-color: #fff;
	border-top-left-radius: .4rem;
	border-top-right-radius: .4rem;
	background-image: linear-gradient( to bottom ,#ffffff, #ffffff)
}

.fixBottoms a {
	text-align: center;
	padding-top: .08rem;
	float: left;
	width: 20%;
	display: block;
}

.fixBottoms p {
	margin-top: .04rem;
	font-size: .2rem;
	color: #9aa4c2;
}

.fixBottoms a.cur p {
	color: #d2b79c
}

.fixBottoms a span {
	margin: 0 auto;
	display: block;
	width: .48rem;
	height: .48rem;
}

.fixBottoms a:nth-child(1) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -.04rem -.04rem;
}

.fixBottoms a:nth-child(2) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -.6rem -.04rem;
}

.fixBottoms a:nth-child(3) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -1.16rem -.04rem;
}

.fixBottoms a:nth-child(4) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -1.72rem -.04rem;
}

.fixBottoms a:nth-child(5) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -2.28rem -.04rem;
}

.fixBottoms a.cur:nth-child(1) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -2.84rem -.04rem;
}

.fixBottoms a.cur:nth-child(2) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -3.4rem -.04rem;
}

.fixBottoms a.cur:nth-child(3) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -3.96rem -.04rem;
}

.fixBottoms a.cur:nth-child(4) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -4.52rem -.04rem;
}

.fixBottoms a.cur:nth-child(5) span {
	background: url(../images/tabBar.png);
	background-repeat: no-repeat;
	background-size: 5.6rem .58rem;
	background-position: -5.08rem -.04rem;
}
.h100 { height:1rem;}

</style>



<div class="fixBottoms">
	<a href="/m" class="cur">
		<span></span>
		<p><?php echo e(trans("lang.shouye")); ?></p>
	</a>
	<a href="/m/activity_list">
		<span></span>
		<p><?php echo e(trans("lang.hdzx")); ?></p>
	</a>
	
	<a  class="kefu_box">
		<span></span>
		<p><?php echo e(trans("lang.zxkf")); ?></p>
	</a>
	<a href="/m/transfer">
		<span></span>
		<p><?php echo e(trans("lang.yehz")); ?></p>
	</a>
	<a href="/m/userinfo">
		<span></span>
					<p><?php echo e(trans("lang.wode")); ?></p>
			</a>
</div>

<div class="bj" style="display: none;"></div>
<div class="dhtc" style="bottom: -4rem;">
	<ul>
		<li style="text-align: center;">
			<span>選擇語言：</span>
			<select id="lang" style="height: .52rem;width: 28%;border-radius: 4px;background: #323750;font-size: .3rem;color: #fff;">
				<option  value="請選擇">請選擇</option>
				<option   value="zh_cn">简体中文</option>
				<option   value="ft">繁体中文</option>
				<option   value="en">English</option>
			</select>
		</li>
					<li><a href="#">下載中心</a></li>
			</ul>
	<span class="qxbtn">取消</span>
</div>

<script type="text/javascript">
    
   var lang = $("#langs").text();
   $("#lang").val(lang)

	$('.gdbtn').click(function(){
		$('.dhtc').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.contact').click(function(){
		$('.contact_content').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.qxbtn').click(function(){
		$('.dhtc').css('bottom','-4rem');
		$('.bj').fadeOut();
	})
	$('.qxbtn_2').click(function(){
		$('.contact_content').css('bottom','-10rem');
		$('.bj').fadeOut();
	})
	$('#lang').change(function () {
		var lang =  $("#lang option:selected").val();
	    $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            type:'get',
            success:function(res){
                location.reload()
            }
        })

	})
</script>

<script type="text/javascript">
    $('body').on('click','.kefu_box',function(){
        layer.open({
            content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="wechat()" data-clipboard-target="#url">Whatsapp</span></div>    <div class="layui-m-layerbtn"><a href="<?php echo e($setting->service_link); ?>" target="_blank"><span yes="" type="1">Whatsapp<?php echo e(trans("lang.zxkf")); ?></span></a></div>'
            ,skin: 'footer'
        });
    })
    function wechat(){
        layer.open({
            content: '<img src="<?php echo e($setting->wx_pic); ?>" style="width:200px;height:400px;margin:0 auto;">'
            ,btn: 'OK'
        });
    }
</script>