<footer id="footer">
    <div class="footer-top">
        <ul id="footer-info">
            <li class="macau-tel">
                咨询热线
                <span class="PHONEzaixian">{{ $_system_config -> phone1 }}</span>
            </li>
            <li class="inter-tel">
                咨询热线
                <span class="PHONEzaixian">{{ $_system_config -> phone2 }}</span>
            </li>
            <li class="company-email">
                QQ
                <span>{{ $_system_config -> qq }}</span>
            </li>
            <li class="chat KFzaixian" onclick="openKuFu(this,1);" urls="{{ $_system_config -> service_link }}">
                7x24小时
                <span>在线客服</span>
            </li>
        </ul>
        <div id="footer-logo">
            <ul>
                <li class="bb"></li>
                <li class="ag"></li>
                <li class="mg"></li>
                <li class="pt"></li>
                <li class="saba"></li>
                <li class="fish"></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <ul id="footer-nav">
            <li>
                <a href="javascript:void (0)" class="aboutUs_modal">关于我们</a>
            </li>
            <li>
                <a href="javascript:void (0)" class="cunkuanHelp_modal">存款帮助</a>
            </li>
            <li>
                <a href="javascript:void (0)" class="qukuanHelp_modal">取款帮助</a>
            </li>
            <li>
                <a href="javascript:void (0)" class="normalQues_modal">常见问题</a>
            </li>
            <li>
                <a href="javascript:;" class="daili_apply">代理加盟</a>
            </li>
            <li>
                <a href="{{route('daili.init')}}">代理登陆</a>
            </li>
        </ul>
        <p id="footer-suggest">
            <small>
                Copyright &#169; 欢迎光临 Reserved
            </small>
        </p>
    </div>
</footer>
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

