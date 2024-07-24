<footer id="footer">
    <div class="wrapper">
        <ul id="footer-info">
            <li class="brand">
                <div class="title"><span class="">{{ $_system_config ->site_name }}</span>旗下品牌</div>
                <ul>
                    <li class="casino"><a href="{{ route('web.liveCasino') }}"></a></li>
                    <li class="games"><a href="{{ route('web.eGame') }}"></a></li>
                    <li class="sport"><a href="{{ route('web.esports') }}"></a></li>
                </ul>
            </li>
            <li class="partner">
                <div class="title">合作伙伴</div>
            </li>
            <li class="browser">
                <div class="title">推荐浏览器</div>
                <ul>
                    <li class="maxthon">
                        <a href="http://www.maxthon.cn/"></a>
                    </li>
                    <li class="chrome">
                        <a href="https://www.google.cn/chrome/"></a>
                    </li>
                    <li class="firefox">
                        <a href="http://www.firefox.com.cn/"></a>
                    </li>
                    <li class="ub">
                        <a href="https://www.ub66.com/"></a>
                    </li>
                </ul>
            </li>
            <li class="security">
                <div class="title">安全与信任</div>
            </li>
        </ul>
        <ul id="footer-nav">
            <li>
                <a href="javascript:void (0)" class="aboutUs_modal">关于我们</a>
            </li>
            <li>
                <a href="javascript:void (0)" class="cunkuanHelp_modal">取款帮助</a>
            </li>
            <li>
                <a href="javascript:void (0)" class="qukuanHelp_modal">存款帮助</a>
            </li>
            <li>
                <a href="javascript:void (0)" class="normalQues_modal">常见问题</a>
            </li>
            <li>
                <a class="daili_apply" href="javascript:void (0)" >代理申请</a>
            </li>
            <li>
                <a href="{{ route('daili.init') }}">代理登陆</a>
            </li>
        </ul>
        <p id="footer-suggest">
            Copyright &#169; <span class="yuLeChengTitle"></span> Reserved
        </p>
    </div>
</footer>
<style>
    /*notice*/
    .notice-row {
        height: 0;
        line-height: 0;
        position: relative;
        z-index: 1;
        width: 100%;
    }
    .noticeBox {
        position: absolute;
        width: 100%;
        height: 49px;
        line-height: 49px;
        left: 0;
        bottom: 0;
        background: #000;
        background: rgba(0, 0, 0, 0.6);
        font-size: 14px;
    }
    .noticeBox .title {
        width: 96px;
        float: left;
        color: #FFCE4B;
        text-indent: 25px;
        background: url(../images/icon-notice.png) 0 center no-repeat;
    }
    .noticeBox .bd2 {
        width: 910px;
        float: right;
        height: 33px;
        line-height: 50px;
        position: relative;
        overflow: hidden;
        margin-top: 1px;
    }
    .noticeBox .bd2 li {
        font-size: 14px;
        color: #fff;
        height: 49px;
    }
    .noticeBox .bd2 a {
        color: #fff;
    }
    .noticeBox .bd2 a:hover {
        text-decoration: underline;
    }
    .w {
        width: 1020px;
        min-width: 1020px;
        margin: 0 auto;
    }

</style>
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

