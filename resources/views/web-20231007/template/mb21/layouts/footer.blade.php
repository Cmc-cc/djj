<style>
	.weihuan-footernav {
		font-size: 12px;
		 height: auto;
		background-color: #1d160c;
		color: #f2f2f2;
		line-height: 32px;
		text-align: center;
	}
	.weihuan-footernav .footer .top a{
		margin-right: 80px;
	}
	.modal {
		width: 100%;
		height: 100%;
		position: fixed;
		left: 35%;
		top: 20%;
		z-index: 10000;
		display: none;
		overflow: auto;
	}
	.backdrop {
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		background: #000;
		opacity: 0.6;
		filter: alpha(opacity=60);
		display: none;
		z-index: 1;
	}

</style>
<div class="weihuan-footer">
	<div class="container clear">
		<div class="left">
			<h1>关于我们</h1>
			<p>
				{{ $_system_config->site_name }} 为尖端技术带来了全新的体验和更高层次的创新与革命 我们的愿景是：成为市场领导者,为客户提供最好的游戏体验,最好的创新投注,以及最贴心的VIP服务 我们将不余遗力保证您在此网站的机密性，安全性和公平性
			</p>
		</div>
		<div class="right">
			<h1>合作伙伴</h1>
			<img src="{{ asset('/web/mb21/images/footer_ad.png') }}">
		</div>
	</div>
</div>

<div class="weihuan-footernav">
	<!--footer-->
	<div class="footer">
		<div class="wrap">
			<div class="top">
				<a href="javascript:;" class="aboutUs_modal">关于我们</a>
				<a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a>
				<a href="javascript:;" class="qukuanHelp_modal">取款帮助</a>
				<a href="javascript:;" class="normalQues_modal">常见问题</a>
				<a href="javascript:;" class="daili_apply">合作代理</a>
				<a href="{{route('daili.init')}}" target="_blank">代理登陆</a>
			</div>
		</div>
	</div>
    <a href="/" target="_blank">© 2018 |{{ $_system_config->site_name }} </a>| 版权所有  All Rights Reserved.
</div>
<div id="aboutUs" class="yk_modal">
	<div class="yk_modal-container">
		<a data-close="close" href="javascript:;" class="yk_modal-close"></a>
		<div class="yk_modal-hd"></div>
		<div class="yk_modal-content"></div>
		<div class="yk_modal-ft">
			<a href="javascript:;" class="yk_btn-sure">确定</a>
		</div>
	</div>
</div>
<div id="cunkuanHelp" class="yk_modal">
	<div class="yk_modal-container">
		<a data-close="close" href="javascript:;" class="yk_modal-close"></a>
		<div class="yk_modal-hd"></div>
		<div class="yk_modal-content"></div>
		<div class="yk_modal-ft">
			<a href="javascript:;" class="yk_btn-sure">确定</a>
		</div>
	</div>
</div>
<div id="qukuanHelp" class="yk_modal">
	<div class="yk_modal-container">
		<a data-close="close" href="javascript:;" class="yk_modal-close"></a>
		<div class="yk_modal-hd"></div>
		<div class="yk_modal-content"></div>
		<div class="yk_modal-ft">
			<a href="javascript:;" class="yk_btn-sure">确定</a>
		</div>
	</div>
</div>
<div id="normalQues" class="yk_modal">
	<div class="yk_modal-container">
		<a data-close="close" href="javascript:;" class="yk_modal-close"></a>
		<div class="yk_modal-hd"></div>
		<div class="yk_modal-content"></div>
		<div class="yk_modal-ft">
			<a href="javascript:;" class="yk_btn-sure">确定</a>
		</div>
	</div>
</div>
<div id="dailiModal" class="modal modal-login modal-daili">
	<div class="modal-content">
		<form method="POST" action="{{ route('member.post_agent_apply') }}">
			<a href="" class="close bg-icon"></a>
			<div class="modal-login_form">
				<h2>代理申请</h2>
				<div class="modal-login_line">
					<input type="text" placeholder="QQ" required name="qq">
				</div>
				<div class="modal-login_line">
					<input type="text" placeholder="联系电话" required name="phone">
				</div>
				<div class="modal-login_line" style="height: auto;margin-bottom: 15px">
					<textarea name="about" placeholder="填写申请"></textarea>
				</div>
				<div class="modal-login_line">
					<button class="modal-login_submit ajax-submit-btn" type="button">确定</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="yk_backdrop"></div>
<script>
    var m = "{{ $_member }}";
    var u = "{{ route('web.login') }}";
    (function($){
        $(function(){
            $('.daili_apply').on('click',function(){
                if (!m)
                {
                    location.href=u
                }else{
                    $('#dailiModal').modal();
                }
            })
        })
    })(jQuery)
</script>
<script>
    (function($){
        $(function(){
            $('.aboutUs_modal').on('click',function(){
                $('#aboutUs').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'关于我们',
                    content:'{!! $about1->content !!}'
                });
            });
            $('.cunkuanHelp_modal').on('click',function(){
                $('#cunkuanHelp').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'存款帮助',
                    content:'{!! $about2->content !!}'
                });
            });
            $('.qukuanHelp_modal').on('click',function(){
                $('#qukuanHelp').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'取款帮助',
                    content:'{!! $about3->content !!}'
                });
            });
            $('.normalQues_modal').on('click',function(){
                $('#normalQues').yk_modal({
                    animate:'slide',
                    width:'800px',
                    height:'500px',
                    title:'常见问题',
                    content:'{!! $about4->content !!}'
                });
            });
        });
    })(jQuery);
</script>