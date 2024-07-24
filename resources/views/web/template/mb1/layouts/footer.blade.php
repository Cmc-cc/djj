<div class="Tfooter">
    <div class="contact-wrap clearfix">
        <div class="container clear">
            <div class="title">
                <p class="cn">联系我们</p>
                <p class="en">Contact us</p>
            </div>
            <div class="item" id="gtmail">
                <i class="iconfont"></i>
                <p class="cn">全球服务热线 <a href="javascript:;">
                        <img src="{{ asset('/web/images/footer-more.jpg') }}" alt=""></a></p>
                <p class="num">{{ $_system_config->phone1 }}</p>
                <!-- <div class="hover-box" id="maildiv">
                   <p class="tel"><i class="iconfont"></i><em class="c-999">澳门热线①：</em>00853-6259 3555</p>
                   <p class="tel"><i class="iconfont"></i><span class="c-999">菲律宾专线：</span>0063-950<en class="red">5555555</en></p>
                   <img src="//image1.hnmg9999.com/CM000171/201609/160909095533944.jpg?v=1473386201632" alt="" class="arrow">
                 </div>-->
            </div>
            {{--<div class="item">--}}
            {{--<i class="iconfont"></i>--}}
            {{--<p class="cn">官方邮箱</p>--}}
            {{--<p class="num">5595acom@gmail.com</p>--}}
            {{--</div>--}}
            <div class="item">
                <i class="iconfont"></i>
                <p class="cn">客服QQ </p>
                <p class="num"><a href="javascript:;" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin={{ $_system_config->qq }}&site=qq&menu=yes','','width=1024,height=768')">{{ $_system_config->qq }}</a></p>
            </div>
            <div class="item">
                <i class="iconfont"></i>
                <p class="cn">24小时在线客服</p>
                <a onclick="window.open('{{ $_system_config->service_link }}','','width=1024,height=768')"
                   class="detail-btn">立即咨询<i class="iconfont"></i></a>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="footer-list clearfix">
            <li><a href="javascript:;" class="ico_1">MG</a></li>
            <li><a href="javascript:;" class="ico_2">FLUI</a></li>
            <li><a href="javascript:;" class="ico_3">GT</a></li>
            <li><a href="javascript:;" class="ico_5">AG</a></li>
            <li><a href="javascript:;" class="ico_6">BBIN</a></li>
            <li><a href="javascript:;" class="ico_9">OG</a></li>
            <li><a href="javascript:;" class="ico_10">AB</a></li>
            <li><a href="javascript:;" class="ico_11">微信</a></li>
            <li><a href="javascript:;" class="ico_12">财付通</a></li>
            <li><a href="javascript:;" class="ico_13">支付宝</a></li>
            <li><a href="javascript:;" class="ico_14">信用卡</a></li>
            <li><a href="javascript:;" class="ico_15">在线支付</a></li>
            <li><a href="javascript:;" class="ico_16">18+</a></li>
        </ul>
        <ul class="footer-link">
        <li><a href="javascript:;" class="aboutUs_modal">关于我们</a></li>
        <li><a href="javascript:;"
               onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                联系我们</a>
        </li>
        <li><a href="javascript:;" class="daili_apply">代理加盟</a></li>
        <li><a href="{{route('daili.init')}}" target="_blank">代理登陆</a></li>
        <li><a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a></li>
        <li><a href="javascript:;" class="qukuanHelp_modal">取款帮助</a></li>
        <li><a href="javascript:;" class="normalQues_modal">常见问题</a></li>
        </ul>
        <p class="copyright">
            Copyright © {{ $_system_config->site_name }}版权所有
            Reserved
        </p>
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