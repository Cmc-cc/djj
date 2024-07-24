<style>
    #footer{
        margin-bottom: 0px;
    }
</style>
<footer id="footer">
    <div class="wrapper">
        <div id="footer-logo"></div>
        <ul id="footer-nav">
            {{--<li><a href="/Lobby/AboutUS">关于我们</a></li>
            <li><a href="/Contact">联络我们</a></li>
            <li><a href="/Partner">合作伙伴</a></li>
            <li><a href="/How/Deposit">存款帮助</a></li>
            <li><a href="/How/Withdrawal">取款帮助</a></li>
            <li><a href="/FAQ">条款与规则</a></li>
            <li><a ng-href="@{{ContactInfo.HttpInformation == '' ? '#' : ContactInfo.HttpInformation}}" target="_blank">客戶端</a></li>--}}
            <li><a href="javascript:;" class="aboutUs_modal">关于我们</a></li>
            <li><a href="javascript:;" class="daili_apply">代理加盟</a></li>
            <li><a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a></li>
            <li><a href="javascript:;" class="qukuanHelp_modal">取款帮助</a></li>
            <li><a href="javascript:;" class="normalQues_modal">常见问题</a></li>
        </ul>
        <p id="footer-suggest">
            Copyright {{ $_system_config->site_name }} Reserved
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

{{--<div id="news">
    <div id="hot-news" news-marquee news-speed="22500"></div>
</div>--}}

{{--<aside class="services service-left" scrollfollow show-btn ng-controller="LobbiesCtrl">
    <ul>
        <li class="board" ng-click="toKgHtml()"></li>
        <li class="fish" ng-click="toFish()"></li>
        <li class="game"><a href="/Lobby/Game"></a></li>
        <li class="client"><a ng-href="@{{ContactInfo.HttpPromotion== '' ? '#' : ContactInfo.HttpPromotion}}" target="_blank"></a></li>
        <li class="closed" service-closed></li>
    </ul>
</aside>

<aside class="services service-right" scrollfollow show-btn>
    <ul>

        <li class="qq" ng-click="lineChatClick()">
            <span ng-bind="ContactInfo.AgentQQ"></span>
            <span ng-bind="ContactInfo.QQ"></span>
        </li>
        <li class="wechat" title="@{{ContactInfo.WeChat}}">
            <img width="100" ng-if="ContactInfo.HttpQRcodeApp!==undefined" ng-src="@{{ContactInfo.HttpQRcodeApp| replaceCdn: ''}}" onerror="this.style.display='none'" />
            <span ng-bind="ContactInfo.WeChat"></span>
        </li>
        <li class="closed" service-closed></li>
    </ul>
</aside>--}}


<div id="marquee-wrapper" ng-class="{show: isMarqueeShowClass}" ng-init="isMarqueeShowClass = false">
    <aside id="marquee">
        <header>
            <h2>最新消息</h2>
        </header>
        <ul id="newsBags">
            <li ng-repeat="news in newsBags track by $index">@{{news}}</li>
        </ul>
        <footer>
            <span ng-click="closeMarquee()">关闭</span>
        </footer>
    </aside>
</div>


<div ng-if="ContactInfo.HttpHtmlDialog"
     class="site-announcement"
     iframe-width="1064"
     iframe-height="709"
     site-announcement
     ng-cloak>
    <span class="closed"></span>
</div>



<div id="popup-dialog" popup-dialog ng-cloak></div>


<div id="announcement-dialog" announcement-dialog></div>


