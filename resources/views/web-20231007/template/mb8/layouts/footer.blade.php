<!--尾部 start-->
<div id="footerbg">
    <div class="footer">
        <ul class="nav">
            <li><a href="javascript:;" class="aboutUs_modal">关于我们</a></li>
            <li class="line">|</li>
            <li><a href="javascript:;" class="qukuanHelp_modal">取款帮助</a></li>
            <li class="line">|</li>
            <li><a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a></li>
            <li class="line">|</li>
            <li><a href="javascript:;" class="daili_apply">合作伙伴</a></li>
            <li class="line">|</li>
            <li>
                <a href="javascript:;"
                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                    联系我们
                </a>
            </li>
            <li class="line">|</li>
            <li><a href="javascript:;" class="normalQues_modal">常见问题</a></li>
            <li>Copyright &copy; {{ $_system_config->site_name }}</li>
        </ul>
        <div class="index-contact ">
            <ol>
                <li class="phone">客服热线：{{ $_system_config->phone1 }}</li>
                <li class="tel">客服qq：{{ $_system_config->qq }}</li>
                <li class="online">
                    <a href="javascript:void(0);"
                       onclick="window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        在线客服 ONLINE
                    </a>
                </li>
                <li class="email">{{ $_system_config->qq }}@qq.com</li>
            </ol>
            <div class="link">
                <img src="{{ asset('/web/mb8/images/link.png') }}"/>
            </div>
        </div>
        <div class="moreinfo">
            <div>
                <h2>关于{{ $_system_config->site_name }}</h2>
                <dl>
                    <dt>注册账户</dt>
                    <dd>开设一个账户即可享受娱乐城和所有的精彩游戏，享受我们高品质、高赔率、多元化的娱乐游戏，更有机会获取我们多项优惠和开户红利。</dd>
                    <dt>合作伙伴</dt>
                    <dd>现在开始加入的联盟合作伙伴项目，您可以利用我们娱乐平台，通过介绍新客户加入{{ $_system_config->site_name }}，坐享高额佣金。</dd>
                    <dt>责任博彩</dt>
                    <dd>作为一个信誉极好和富有强烈社会责任感的博彩公司澳门(国际)博彩集团致力将博彩游戏带来的负面影响降至最低。我们的游戏规则不允许未满18岁的人投注博彩游戏。</dd>
                    <dt>安全保密</dt>
                    <dd>我们采用国际最先进的娱乐博彩系统，信息保密度安全稳定。保证让每位玩家放心游戏。</dd>
                </dl>
            </div>
            <div>
                <h2>全线产品 </h2>
                <dl>
                    <dt>运动博弈</dt>
                    <dd>我们提供您最爱投注的体育赛事。如足球五大联赛、世界杯、欧洲冠军杯、各大洲际杯赛和其他所有球类赛事，我们也提供其它的博彩项目。</dd>
                    <dt>真人娱乐</dt>
                    <dd>我们的真人娱乐玩法众多。如百家乐， 骰宝，龙虎以及轮盘。您可以畅游真人娱乐的精彩世界。当然，您也可以选择容易上手的线上老虎机或小游戏消遣时光。</dd>
                    <dt>电子游艺</dt>
                    <dd>我们的游戏包括轮盘、电子扑克、老虎机等在线娱乐场游戏。此外您更有机会赢得累积超级奖金。</dd>
                    <dt>彩票游戏</dt>
                    <dd>彩票游戏玩法简单、赔率多样化、福彩3D、体彩排列三、各地区时时彩及香港特区六合彩，连线同步即时开彩。</dd>
                </dl>
            </div>
            <div class="last">
                <h2>信息中心</h2>
                <dl>
                    <dt>优惠活动</dt>
                    <dd>新用户享有首次存款红利及开户礼品，高额返水，银行卡划款优惠，多重优惠任君选择。老客户可享有更多优惠服务。</dd>
                    <dt>帮助中心</dt>
                    <dd>您可以通过新手指引和常见问题栏目获得有关免费开户、存款、提款、玩法及其他问题的解答和帮助。</dd>
                    <dt>支付方式</dt>
                    <dd>{{ $_system_config->site_name }}为客户提供众多的存取款方式并保障您存取过程顺利及时，使资金安全快捷到达。</dd>
                    <dt>联络我们</dt>
                    <dd>如果您有任何关于体育及娱乐城遇到的所有问题，可通过在线客服、电话及电邮方式与我们取得联系获取帮助。</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<!--尾部 end-->

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