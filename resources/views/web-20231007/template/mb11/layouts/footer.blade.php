<div class="footer">
    <div class="wrap">
        <div class="game-link">
            <div class="left link">
                <div class="top">
                    <a href="javascript:;" class="aboutUs_modal">关于我们</a> ｜
                    <a href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">联系我们</a> ｜
                    <a href="javascript:;" class="daili_apply">代理合作</a> ｜
                    <a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a> ｜
                    <a href="javascript:;" class="qukuanHelp_modal">取款帮助</a> ｜
                    <a href="javascript:;" class="normalQues_modal">常见问题</a>
                </div>
                {{--<div class="bot">--}}
                    {{--<img src="{{ asset('/web/images/flash_img.jpg') }}">--}}
                    {{--系统要求:IE8 或以上,本站最佳浏览分辨率为1024x768用户必须安装Flash 10 viewer或以上--}}
                {{--</div>--}}
            </div>
            <div class="right">
                <a href="javascript:;" class="service-pic" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')"></a>
            </div>
        </div>
        @if($web_route == 'web.index')
        <div class="quality">
            <img src="{{ asset('/web/mb11/images/footer_img01.png') }}">
        </div>
        @endif
        <div class="info">
            @if($web_route == 'web.index')
            <dl>
                <dt>责任博彩</dt>
                <dd>博弈游戏是以一种即可使得双方获得娱乐，又可获取盈利的游戏。但是，世界上没有常胜的将军。请玩家谨记责任，博彩坚持“小赌怡情，适度游戏”的原则，身心健康最重要。切勿沉迷。{{ $_system_config->site_name }}温馨提醒18岁以下青年请远离博弈游戏。</dd>
            </dl>
            <dl>
                <dt>体育投注</dt>
                <dd>{{ $_system_config->site_name }}每周精彩呈献超过5000场的超高赔率的体育赛事投注，现场滚球，即时投注欧洲五大联赛，美国职业篮球NBA，{{ $_system_config->site_name }}给您带来亲临现场的无与伦比的精彩刺激感受，最快最准的派彩，令您体验畅快淋漓的体育动感与刺激。</dd>
            </dl>
            <dl>
                <dt>真人娱乐</dt>
                <dd>在{{ $_system_config->site_name }}您可以一站登陆即可与近千名性感动人的专业荷官会面。所有的真人荷官游戏（各种真人百家乐、轮盘、骰子、21点、三公、牛牛、牌九等游戏）应有尽有，百家争艳。最佳的赔率，最完善的服务，最公平的游戏，千名佳丽与你相约{{ $_system_config->site_name }}。</dd>
            </dl>
            <dl>
                <dt>彩票游戏</dt>
                <dd>世界各地美轮美奂的彩票齐聚{{ $_system_config->site_name }}，单画面，多平台，多地区，官方开奖，绝对真实。{{ $_system_config->site_name }}不仅提高购彩的方便性与安全性，更加为玩家奉献更多购彩奖金与刺激好礼。人人争做大赢家，更高赔率，更高返奖，尽在{{ $_system_config->site_name }}彩票。</dd>
            </dl>
            <dl>
                <dt>电子游戏</dt>
                <dd>{{ $_system_config->site_name }}聚全球最佳老虎机游戏，精致画面，动感效果，总计种类超过500余款，世界超强老虎机火力大比拼，超高赔率的老虎机游戏，一个好的游戏，伴随着一个经常的故事。保证令玩家爱不释手，兴致浓浓。</dd>
            </dl>
            <dl>
                <dt>优惠活动</dt>
                <dd>{{ $_system_config->site_name }}开户的首笔存款可申请开户红利,单笔存款100元或以上可享受1%的转帐优惠, 不计输赢每天投注即可参与洗码优惠活动，洗码金额不限上限。老客户同样享有各种存款红利。更多优惠尽在{{ $_system_config->site_name }}。</dd>
            </dl>
            <div class="desc">
                <p><span class="tit">{{ $_system_config->site_name }}</span>-与亚洲最大博彩软件提供商“BBIN”进行技术合作，共同打造高质量游戏平台，以及更多精彩在线游戏于一体的综合线上国际娱乐品牌。</p>
                <p style="color: #554949">神话赌场向广大玩家承诺保证提供种类齐全的世界一流安全公平有趣的在线博弈游戏。</p>
                <p>如果您在游戏过程遇到任何问题，请随时与我们的24/7在线客服或着访问网站的 “联系我们”我们时刻为您准备着！</p>
            </div>
            <div class="copyright">
                Copyright © {{ $_system_config->site_name }} Reserved  服務電話：0063-9159333888
            </div>
            @endif
            <div class="bot-company">
                <img src="{{ asset('/web/mb11/images/footer_img.jpg') }}">
            </div>
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