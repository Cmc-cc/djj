<!-- 底部 -->
<div id="hfooter">
    <!--footer start-->
    <div class="footer" style="clear: both;">
        <div class="w1000">
            <div style="float: left; width: 554px; margin-top: 20px;">
                {{--<img src="{{ asset('/web/images/b1.png') }}" style="display: inline-block">--}}
                <img src="{{ asset('/web/mb10/images/b2.png') }}" style="display: inline-block">
                <img src="{{ asset('/web/mb10/images/b3.png') }}" style="display: inline-block">
            </div>
            <div class="footright">
                <a href="javascript:;" class="aboutUs_modal">关于我们</a> |
                <a href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">联系我们</a> |
                <a href="javascript:;" class="daili_apply">代理合作</a> |
                <a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a> |
                <a href="javascript:;" class="qukuanHelp_modal">取款帮助</a> |
                <a href="javascript:;" class="normalQues_modal">常见问题</a>
                <br> Copyrights (c)
                {{ $_system_config->site_name }}
                24小时客服QQ：{{ $_system_config->qq }}
            </div>
        </div>
    </div>
    <!--footer end-->
    <!--index footer start-->
    <div class="indexbottom">
        <div class="describe">
            <div class="desitem item1">
                <h1>信息中心</h1>
                <h3>优惠活动</h3>
                <p>{{ $_system_config->site_name }}会员均可享有各投注產品定期推出的存款红利优惠及返水优惠。</p>
                <h3>常见问题</h3>
                <p>通过常见问题可即时解答您建立 {{ $_system_config->site_name }} 帐户、存款、提款，有关于投注和游戏玩法等等问题。</p>
                <h3>联系我们</h3>
                <p>您可通过7*24小时在线客服、邮箱或电话方式联系我们。每名客户的资讯保密性对我们来说是最重要的。我们承诺，将继续不遗余力地坚持严格实行保密和隐私制度。</p>
                <h3>合作伙伴</h3>
                <p>加入Sun Game合作伙伴，您可以利用您的人际网络每月简单赚取高额佣金，轻松实现成功与财富的梦想！</p>
                <h3>注册</h3>
                <p>您只需要在我们的网页上方点击「立即开户」，花数分钟时间填写帐户登记表，便可以成功建立 {{ $_system_config->site_name }} 个人帐户。</p>
                <h3>存款及提款</h3>
                <p>您可以通过我们建议的方法轻鬆进行存款及提款到您的账户中</p>
            </div>

            <div class="desitem item2">
                <h1>产品</h1>
                <h3>體育博彩</h3>
                <p>{{ $_system_config->site_name }}网罗各类體育赛事，玩家可以选择的其喜爱项目进行游戏。{{ $_system_config->site_name }}开出盘口多，高水赔率，选择丰富。</p>
                <h3>體育博彩项目</h3>
                <p>种类包括足球、网球、篮球、棒球、排球、乒乓球、羽毛球、高尔夫球、冰球、手球、美式足球、榄球、桌球/台球、赛车及飞镖等等。</p>
                <h3>滚球</h3>
                <p>推出全新體育博彩滚球页面后，滚球选择更多达每月5,000多场，是全行之冠。当然少不了英超、意甲、西甲、德甲、冠军联赛等。</p>
                <h3>真人娱乐场</h3>
                <p>拥有多个最受欢迎的真人娱乐场系统的{{ $_system_config->site_name }}娱乐场，包括真人百家乐、轮盘、骰宝、廿一点及斗牛等游戏。通过现场视频，让您感受到现场实况下注的体验。</p>
                <h3>老虎机及電子游戏</h3>
                <p>多款富有传统民间色彩的主题老虎机及電子游戏，打造一个精彩多变，极受欢迎的新热点。</p>
                <h3>扑克王游戏</h3>
                <p>{{ $_system_config->site_name }}诚意呈献专为德州扑克玩家而设之扑克馆。在这里，您可与世界顶级高手即场一决高下。</p>
            </div>

            <div class="desitem item3">
                <h1>投注资料</h1>
                <h3>优惠活动</h3>
                <p>可即时了解{{ $_system_config->site_name }}所有體育赛事的即时及完场赛果。</p>
                <h3>體育博彩规则</h3>
                <p>所有在{{ $_system_config->site_name }}进行的一切體育博彩投注都需要遵从我们體育博彩规则条款。</p>
                <h3>真人娱乐场游戏介绍</h3>
                <p>提供各娱乐场馆游戏平台的详尽游戏介绍，如百家乐、骰宝、轮盘、廿一点等。</p>
                <h3>扑克游戏规则</h3>
                <p>所有在{{ $_system_config->site_name }}进行的一切扑克游戏投注都需要遵从扑克游戏的规则条款。</p>
                <h3>投注记录</h3>
                <p>透过游戏系统或用户中心，您可以随时随地查询一切投注记录。</p>
                <h3>责任博彩</h3>
                <p>我们积极推行负责任博彩，并极力拒绝未成年玩家使用我们的软件进行网上娱乐。同时，我们更透过专业人员及各种有效方法，以防止问题博彩的发生。</p>
            </div>

        </div>

    </div>
    <!--index footer end-->

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