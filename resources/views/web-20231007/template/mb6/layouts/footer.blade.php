<div class="Tfooter">
    <div class="footCenter">
        <ul class="centerTxt">
            <li><span class="icon01">客服QQ：{{ $_system_config->qq }}</span></li>
            <li><span class="icon05 icon04">代理QQ：{{ $_system_config->qq }}</span></li>
            <li><span class="icon02">邮箱：{{ $_system_config->qq }}@qq.com</span></li>
            <li class="noBorder"><span class="icon03" style="cursor: pointer;" onclick="window.open('{{ $_system_config->service_link }}', '在线客服' , 'width=800,height=650,top=0,left=0,status=no,toolbar=no,scrollbars=yes,resizable=no,personalbar=no')">客服中心 SERVICE CENTER</span></li>
        </ul>
    </div>
    <div class="foot-block">
        <img src="{{ asset('/web/mb6/images/img/16070517115551115.png') }}" style="display: inline-block" />
    </div>
    <div class="footnav">
        <a href="javascript:;" class="aboutUs_modal">关于我们</a>|
        <a href="javascript:void(0)" onclick="window.open('{{ $_system_config->service_link }}', '在线客服' , 'width=800,height=650,top=0,left=0,status=no,toolbar=no,scrollbars=yes,resizable=no,personalbar=no')">联系我们</a>|
        <a href="javascript:void(0)" class="daili_apply">代理合作</a>|
        <a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a>|
        <a href="javascript:;" class="qukuanHelp_modal">取款帮助</a>|
        <a href="javascript:;" class="normalQues_modal">常见问题</a>|
        <a href="{{route('web.register_one')}}">免费注册</a>|
        <a href="{{ route('web.activityList') }}">优惠活动</a>
        <p>Copyright © {{ $_system_config->site_name }}版权所有. Reserved </p>
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
<div class="yk_backdrop"></div>

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