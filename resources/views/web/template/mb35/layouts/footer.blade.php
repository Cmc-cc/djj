<footer id="footer">
    <div class="wrapper">
        <ul id="footer-info">
            <li class="tel">
                <div class="text">
                    国际热线
                    <span>{{ $_system_config ->phone1 }}</span>
                </div>
            </li>
            <li class="email">
                <div class="text">
                    客服邮箱
                    <span ng-bind="ContactInfo.Email"></span>
                </div>
            </li>
            <li class="qq">
                <div class="text">
                    客服QQ
                    <span>{{ $_system_config -> qq }}</span>
                </div>
            </li>
            <li class="chat" onclick="window.location.href='{{ $_system_config -> service_link }}'">
                <div class="text">
                    在线客服
                    <span>7x24H小时</span>
                </div>
            </li>
        </ul>
        <a href="https://www.catbet.net/" target="_blank">
            <div id="footer-logo">
            </div>
        </a>
        <ul id="footer-nav">
            {{--<li><a href="/Lobby/AboutUS">{{ trans('welcome.ABOUTUS') }}</a></li>
            <li><a href="/Contact">{{ trans('welcome.CONTACTUS') }}</a></li>
            <li><a href="/How/Deposit">{{ trans('welcome.HOWTODEPOSIT') }}</a></li>
            <li><a href="/How/Withdrawal">{{ trans('welcome.HOWWITHDRAWALS') }}</a></li>
            <li><a href="/FAQ">{{ trans('welcome.FAQ') }}</a></li>
            <li><a href="/Partner">{{ trans('welcome.Partner') }}</a></li>
            <li><a href="http://www.catbet.net/" target="_blank">{{ trans('welcome.CLIENT') }}</a></li>--}}
            <li><a href="javascript:;" class="aboutUs_modal">关于我们</a></li>
            <li><a href="javascript:;" class="daili_apply">代理加盟</a></li>
            <li><a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a></li>
            <li><a href="javascript:;" class="qukuanHelp_modal">取款帮助</a></li>
            <li><a href="javascript:;" class="normalQues_modal">常见问题</a></li>
        </ul>
        <p id="footer-suggest">
            Copyright &#169; {{ $_system_config->site_name }} Reserved
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




