<div class="new-footer clearfix">
    <div class="container1">
        <div class="contact clearfix">
            <ul>
                <li style="margin-right: 110px;">
                    <img src="{{ asset('/web/mb18/images/contact_1.jpg') }}">
                    <div class="txt">
                        <p class="cn">官方邮箱</p>
                        <p class="en">{{ $_system_config->qq }}@qq.com</p>
                    </div>
                </li>
                <li style="margin-right: 130px;">
                    <img src="{{ asset('/web/mb18/images/contact_2.jpg') }}">
                    <div class="txt">
                        <p class="cn">国际热线</p>
                        <p class="en">{{ $_system_config->phone1 }}</p>
                    </div>
                </li>
                {{--<li style="margin-right: 150px;">--}}
                    {{--<img src="{{ asset('/web/images/contact_1.jpg') }}">--}}
                    {{--<div class="txt">--}}
                        {{--<p class="cn">微信客服</p>--}}
                        {{--<p class="en">微信客服</p>--}}
                    {{--</div>--}}
                {{--</li>--}}
                <li>
                    <img src="{{ asset('/web/mb18/images/contact_1.jpg') }}">
                    <div class="txt">
                        <p class="cn">客服QQ</p>
                        <p class="en">{{ $_system_config->qq }}</p>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="clearfix footer-inc">
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_2.png') }}" alt=""></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_3.png') }}" alt="" style="width:130px"></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_12.png') }}" alt=""></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_4.png') }}" alt=""></a></li>
            <li><a href="javascript:;" target="_blank"><img src="{{ asset('/web/images/footer_icon_5.png') }}" alt="" style="width:78px"></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_6.png') }}" alt="" style="width:50px"></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_7.png') }}" alt=""></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_8.png') }}" alt=""></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_9.png') }}" alt=""></a></li>
            <li><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_11.png') }}" alt=""></a></li>
            <li class="last"><a href="javascript:;"><img src="{{ asset('/web/mb18/images/footer_icon_10.png') }}" alt=""></a></li>
        </ul>
        <ul class="new-footer-link">

            <li>
                <a href="javascript:void(0);" target="mem_index"
                   class="js-article-color aboutUs_modal">关于我们
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="mem_index"
                   onclick="window.open('{{ $_system_config->service_link }}','','width=1024,height=768')"
                   class="js-article-color">联系我们
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="mem_index"
                   class="js-article-color cunkuanHelp_modal">存款帮助
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="mem_index"
                   class="js-article-color qukuanHelp_modal">取款帮助
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="mem_index"
                   class="js-article-color daili_apply">代理联盟
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" target="mem_index"
                   class="js-article-color normalQues_modal">常见问题
                </a>
            </li>
            <li>
                <a href="{{route('daili.init')}}" target="_blank">代理登陆
                </a>
            </li>

        </ul>
        <p class="new-copyright">
            Copyright © {{ $_system_config->site_name }}Reserved
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