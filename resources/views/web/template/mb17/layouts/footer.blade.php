<div class="goTop">
    <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb17/images/float_top_up.png"></a>
</div>

<!--footer-->
<div class="footer">
    <div class="top">
        <div class="wrap">
            <dl class="pay">
                <dt>支付方式</dt>
                <dd><img src="{{ asset('/web') }}/mb17/images/footer_img01.png"></dd>
            </dl>
            <dl class="company">
                <dt>合作伙伴</dt>
                <dd>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb17/images/bbinlogo.png"></a>
                    {{--<a href="javascript:;"><img src="{{ asset('/web') }}/images/ublogo.png"></a>--}}
                </dd>
            </dl>
            <dl class="service">
                <dt>支付方式</dt>
                <dd>客服QQ：<span class="num">{{ $_system_config->qq }} </span></dd>
                <dd>官方邮箱：<span class="num">{{ $_system_config->qq }}@qq.com</span></dd>
            </dl>
        </div>
    </div>
    <div class="bot">
        <div class="wrap">
            <div class="link left">
                <a href="javascript:;" class="aboutUs_modal">關於我們</a>
                <a href="javascript:;"
                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                    聯絡我們
                </a>
                <a href="javascript:;" class="link03 daili_apply">代理合作</a>
                <a href="javascript:;" class="cunkuanHelp_modal">存款幫助</a>
                <a href="javascript:;" class="qukuanHelp_modal">取款幫助</a>
                <a href="javascript:;" class="normalQues_modal">常見問題</a>
            </div>
            <div class="copyright right">Copyright © {{ $_system_config->site_name }} Reserved</div>
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