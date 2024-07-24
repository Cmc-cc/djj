<!-- 底部 -->
<link rel="stylesheet" href="{{ asset('/web/mb16/css/yk_modal.css') }}">
<style>
    .modal{width:100%;height:100%;position:fixed;left:0;top:0;z-index:10000;display:none;overflow:auto}.modal .modal-content{width:100%;height:100%;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto}


    .modal-login .modal-content{width:400px;height:400px;background:#fff;border-radius:6px;padding:5px 30px 0 30px}.modal-login .close{position:absolute;top:24px;right:30px;width:20px;height:20px;background-position:-140px -140px;cursor:pointer;-moz-opacity:.25;opacity:.25;filter:alpha(opacity=25);-webkit-transition:all .2s;-ms-transition:all .2s;-moz-transition:all .2s;-o-transition:all .2s;transition:all .2s;z-index:2}.modal-login .modal-login_form h2{overflow:visible;position:relative;clear:both;width:100%;height:60px;line-height:59px;text-align:left;font-size:20px;color:#333;margin-bottom:16px;border-bottom:1px solid #e8e8e8}.modal-login .modal-login_line{position:relative;width:100%;overflow:visible;clear:both;height:68px}.modal-login .modal-login_line input{height:44px;line-height:44px;width:99%;padding:0;background:none;border:1px solid #ccc;box-shadow:inset 0 0 3px rgba(0,0,0,0.1);border-radius:3px;font-size:13px;text-indent:6px}.modal-login .modal-login_line input.username{background:url(/web/images/user-ico.png) no-repeat right center}.modal-login .modal-login_line input.psw{background:url(/web/images/lock-ico.png) no-repeat right center}.modal-login .modal-login_line.code input{width:200px}.modal-login .modal-login_line.code img{display:inline;height:44px;vertical-align:-90%}.modal-login .modal-login_submit{width:100%;float:left;height:50px;line-height:50px;border-radius:3px;overflow:hidden;background:none;border:none;background:#ff3a2b;font-size:16px;color:#fff;cursor:pointer;text-align:center;box-shadow:0 1px 1px rgba(0,0,0,0.05);-webkit-transition:all .2s;-ms-transition:all .2s;-moz-transition:all .2s;-o-transition:all .2s;transition:all .2s}.modal-login .modal-login_submit:hover{box-shadow:0 4px 8px rgba(0,0,0,0.25)}.modal-login .modal-login_link a{color:#ff3a2b}.modal-daili .modal-content{height:410px !important}.modal-daili .modal-content textarea{width:100%;height:100px;border:1px solid #ccc;border-radius:4px;padding:8px}.modal-mobileBet .modal-content{width:400px;height:400px;background:#fff;border-radius:6px;padding:5px 30px 0 30px}


    #footer-info>li.mobile span.qrcode:before {
        content: '';
        display: block;
        height: 78px;
        margin-bottom: 8px;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-image: url({{ $_system_config->wap_qrcode }});
    }
    #footer-info>li.mobile span.android:before {
        content: '';
        display: block;
        height: 78px;
        margin-bottom: 8px;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-image: url({{ $_system_config->pic_link }});
    }
</style>
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
<div id="dailiModal" class="modal modal-login modal-daili">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.post_agent_apply') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form" method="POST" action="{{ route('member.post_agent_apply') }}">
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
<footer id="footer">
    <div class="wrapper">
        {{--<div id="footer-logo">
            <ul id="footer-info">
                <li class="qq" ng-click=""onclick="javascript:window.open('http://wpa.qq.com/msgrd?V=3&uin={{ $_system_config->qq}}&Site=QQ客服&Menu=yes','','width=1024,height=768')" >QQ:<span ng-bind="{{ $_system_config->qq }}"></span></li>
                <li class="chat" ng-click=""onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服</li>
                <li class="hour">服务时间：00:00-24:00</li>
                <li class="email">Email:<span ng-bind="{{ $_system_config->agent_qq }}">{{ $_system_config->agent_qq }}</span></li>
            </ul>
            <div class="tel">7x24小时热线：<span>{{ $_system_config->phone1 }}</span></div>
        </div>--}}
    </div>
    <ul id="footer-nav">
        <li><a href="javascript:;" class="aboutUs_modal">关于我们</a></li>
        <li><a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a></li>
        <li><a href="javascript:;" class="qukuanHelp_modal">取款帮助</a></li>
        <li><a href="javascript:;" class="normalQues_modal">常见问题</a></li>
    </ul>
    <p id="footer-suggest">
        Copyright &#169; {{ $_system_config->site_title or 'motoo' }}Reserved
    </p>
</footer>
{{--<footer id="footer">
    <div class="wrapper">
        <ul id="footer-info">
            <li class="help">
                <div class="title">新手帮助</div>
                <ul>
                    <li><a href="javascript:;" class="aboutUs_modal">关于我们</a></li>
                    --}}{{--<li><a href="{{ route('web.Contact') }}">联系我们</a></li>--}}{{--
                    <li><a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a></li>
                    <li><a href="javascript:;" class="qukuanHelp_modal">取款帮助</a></li>
                    <li><a href="javascript:;" class="normalQues_modal">常见问题</a></li>
                </ul>
            </li>
            <li class="map">
                <div class="title">站内链接</div>
                <ul>
                    <li><a href="{{route('daili.init')}}" target="_blank">代理登陆</a></li>
                    <li><a href="javascript:;" class="daili_apply">合作代理</a></li>
                    <li><a href="/m">手机投注</a></li>
                    <li><a ng-href="" target="_blank">上网导航</a></li>
                    --}}{{--<li><a href="http://gpk-client.com/" target="_blank">客戶端</a></li>--}}{{--
                </ul>
                --}}{{--<ul>
                    <li><a ng-href="" target="_blank">手机APP下载</a></li>
                    <li><a ng-href="" target="_blank">VIP贵宾会</a></li>
                    <li><a ng-href="" target="_blank">活动大厅</a></li>
                    <li><a ng-href="" target="_blank">升级模式</a></li>
                    <li><a ng-href="" target="_blank">抢红包</a></li>
                </ul>--}}{{--
            </li>

            <li class="contact">
                <div class="title">联系我们</div>
                <div class="chat" ng-click="lineChatClick()"></div>
                <ul>
                    <li>澳门热线：<span>{{ $_system_config->phone1 }}</span></li>
                    <li>菲律宾热线：<span>{{ $_system_config->phone1 }}</span></li>
                    <li>客服QQ：<span >{{ $_system_config->qq }}</span></li>
                    <li>E-mail：<span>{{ $_system_config->agent_qq }}</span></li>
                </ul>
            </li>
            <li class="browser">
                <div class="title">浏览器推荐</div>
                <ul>
                    <li class="browser01"><a href="https://www.ub66.com/" target="_blank">寰宇</a></li>
                    <li class="browser02"><a href="http://www.maxthon.cn/" target="_blank">遨游</a></li>
                    <li class="browser03"><a href="http://www.firefox.com.cn/" target="_blank">火狐</a></li>
                    <li class="browser04"><a href="https://www.google.cn/chrome/" target="_blank">谷歌</a></li>
                    <li class="browser05"><a href="https://liulanqi.baidu.com/" target="_blank">百度</a></li>
                    <li class="browser06"><a href="https://ie.sogou.com/" target="_blank">搜狗</a></li>
                </ul>
            </li>
        </ul>
        <div id="footer-logo"></div>
        <p id="footer-suggest">
            Copyright &#169; {{ $_system_config->site_title or 'motoo' }} Reserved
        </p>
    </div>


    </footer>--}}
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
