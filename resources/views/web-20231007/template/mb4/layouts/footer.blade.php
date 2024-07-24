<div class="footer no-firefly">
    <div class="container">
        <div class="footer_first">
            {{--<img src="{{ asset('/web/images/footer_logo.png') }}" alt="手机官网" >--}}
        </div>
        <div class="footer_second">
            <div class="footer_second_left">
                <ul>
                    <li><img style="cursor: pointer;" srcname="partner_one" src="{{ asset('/web/mb4/images/partner_one_h.png') }}" alt="pt老虎机"/></li>
                    <li><img style="cursor: pointer;" srcname="partner_two" src="{{ asset('/web/mb4/images/partner_two_h.png') }}" alt="pt电子游戏"/></li>
                    <li><img style="cursor: pointer;" srcname="partner_three" src="{{ asset('/web/mb4/images/partner_three_h.png') }}" alt="线上娱乐"/></li>
                    <li><img style="cursor: pointer;" srcname="partner_four" src="{{ asset('/web/mb4/images/partner_four_h.png') }}" alt="老虎机彩金"/></li>
                    <li><img style="cursor: pointer;" srcname="partner_five" src="{{ asset('/web/mb4/images/partner_five_h.png') }}" alt="老虎机娱乐"/></li>
                    <li><img style="cursor: pointer;" srcname="partner_six" src="{{ asset('/web/mb4/images/partner_six_h.png') }}" alt="娱乐城"/></li>
                    <li><img style="cursor: pointer;" srcname="partner_six" src="{{ asset('/web/mb4/images/partner_seven_h.png') }}" alt="bbin"/></li>
                </ul>
            </div>
            <div class="footer_second_right">
                <ul>
                    <li><img style="cursor: pointer;" src="{{ asset('/web/mb4/images/mechanism_one_h.png') }}" alt="波音老虎机"/></li>
                    <li><img style="cursor: pointer;" src="{{ asset('/web/mb4/images/mechanism_two_h.png') }}" alt="老虎机投注技巧"/></li>
                    <li><img style="cursor: pointer;" src="{{ asset('/web/mb4/images/mechanism_three_h.png') }}" alt="老虎机"/></li>
                    <li><img style="cursor: pointer;" src="{{ asset('/web/mb4/images/mechanism_four_h.png') }}" alt="彩金"/></li>
                </ul>
            </div>
        </div>
        <div class="footer_third">
            <ul>
                <li><a href="javascript:;">里约游戏是由PT TransPacific在PAGCOR<img style="width:30px;" src="{{ asset('/web/mb4/images/pagcorlogo.png') }}" alt="官网">的授权下部署</a></li>
                <li><a href="javascript:;" target="_blank">合营计划</a></li>
            </ul>
        </div>
        <div class="footer_fourth" style="margin: 5px 0">
            <a href="javascript:;" class="aboutUs_modal">关于我们</a> |
            <a href="javascript:;" class="cunkuanHelp_modal">存款帮助</a> |
            <a href="javascript:;" class="qukuanHelp_modal">取款帮助</a> |
            <a href="javascript:;" class="normalQues_modal">常见问题</a> |
            <a href="javascript:;" class="daili_apply">代理加盟</a> |
            <a href="{{route('daili.init')}}" target="_blank">代理登陆</a>
        </div>
        <div class="footer_fourth">
            @2010-2017 {{$_system_config->site_name}}，All rights reserved
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