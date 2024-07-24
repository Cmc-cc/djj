<div data-v-c82ea94c="" data-v-b09f0a36="">
    <div data-v-68d16e1b="" data-v-c82ea94c="" id="Homefoot">
        <div data-v-68d16e1b="" class="contenttop">
            <img data-v-68d16e1b="" src="{{ asset('web/mb46/images/aone_ico.png') }}" alt="" class="logo_img">
            <img data-v-68d16e1b="" src="{{ asset('web/mb46/images/playtech.ead4bf8.png') }}" alt="" class="logo_img">
            <img data-v-68d16e1b="" src="{{ asset('web/mb46/images/AG_ico.png') }}" alt="" class="logo_img">
            <img data-v-68d16e1b="" src="{{ asset('web/mb46/images/sunbet.db3d9fe.png') }}" alt="" class="logo_img">
            <img data-v-68d16e1b="" src="{{ asset('web/mb46/images/gdlive.dc56754.png') }}" alt="" class="logo_img">
            <img data-v-68d16e1b="" src="{{ asset('web/mb46/images/bbin.5bab369.png') }}" alt="" class="logo_img">
        </div>
        <div data-v-68d16e1b="" class="contentboot">
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
        </div>
        <div data-v-68d16e1b="" class="messagesfoot">Copyright © {{ $_system_config -> site_name }} 2019 Reserved</div>
    </div>
</div>
<style>
    .modal-login .modal-content {
        width: 400px;
        height: 400px;
        background: #fff;
        border-radius: 6px;
        padding: 5px 30px 0 30px
    }

    .modal-login .close {
        position: absolute;
        top: 24px;
        right: 30px;
        width: 20px;
        height: 20px;
        background-position: -140px -140px;
        cursor: pointer;
        -moz-opacity: .25;
        opacity: .25;
        filter: alpha(opacity=25);
        -webkit-transition: all .2s;
        -ms-transition: all .2s;
        -moz-transition: all .2s;
        -o-transition: all .2s;
        transition: all .2s;
        z-index: 2
    }

    .modal-login .modal-login_form h2 {
        overflow: visible;
        position: relative;
        clear: both;
        width: 100%;
        height: 60px;
        line-height: 59px;
        text-align: left;
        font-size: 20px;
        color: #333;
        margin-bottom: 16px;
        border-bottom: 1px solid #e8e8e8
    }

    .modal-login .modal-login_line {
        position: relative;
        width: 100%;
        overflow: visible;
        clear: both;
        height: 68px
    }

    .modal-login .modal-login_line input {
        height: 44px;
        line-height: 44px;
        width: 99%;
        padding: 0;
        background: none;
        border: 1px solid #ccc;
        box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        font-size: 13px;
        text-indent: 6px
    }
    .modal-login .modal-login_line input.username {
        background: url(../images/user-ico.png) no-repeat right center
    }

    .modal-login .modal-login_line input.psw {
        background: url(../images/lock-ico.png) no-repeat right center
    }

    .modal-login .modal-login_line.code input {
        width: 200px
    }

    .modal-login .modal-login_line.code img {
        display: inline;
        height: 44px;
        vertical-align: -90%
    }

    .modal-login .modal-login_submit {
        width: 100%;
        float: left;
        height: 50px;
        line-height: 50px;
        border-radius: 3px;
        overflow: hidden;
        background: none;
        border: none;
        background: #ff3a2b;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
        text-align: center;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        -webkit-transition: all .2s;
        -ms-transition: all .2s;
        -moz-transition: all .2s;
        -o-transition: all .2s;
        transition: all .2s
    }

    .modal-login .modal-login_submit:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25)
    }

    .modal-login .modal-login_link a {
        color: #ff3a2b
    }

    .modal-daili .modal-content {
        height: 410px !important
    }

    .modal-daili .modal-content textarea {
        width: 100%;
        height: 100px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px
    }

    .modal-mobileBet .modal-content {
        width: 400px;
        height: 400px;
        background: #fff;
        border-radius: 6px;
        padding: 5px 30px 0 30px
    }

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



