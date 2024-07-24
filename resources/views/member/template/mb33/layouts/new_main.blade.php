<!DOCTYPE html>
<html  id="ng-app" ng-app="portalApp" meidon-time="<?php echo "". date("Y/m/d h:i:s") . "";?>" moment-lang="zh-CN"  ng-init="">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <link rel="shortcut icon" ng-controller="LayoutCtrl" href="@{{ContactInfo.Httpicon==''? '#': ContactInfo.Httpicon}}" type="image/x-icon" />

    <link href="/web/mb33/css/jquery-ui.min.css" rel="stylesheet"/>

    <link href="/web/mb33/css/jquery-ui.theme.min.css" rel="stylesheet"/>

    <link href="/web/mb33/css/normalize.min.css" rel="stylesheet"/>

    <link href="/web/mb33/css/font-awesome5.min.css" rel="stylesheet"/>

    <link href="/web/mb33/bundles/custom.css?v=5Wa8nqZwlBGzu1Pp_QLNPIWNPw7nHF_nimfxfdWB2fE1" rel="stylesheet"/>

    <link href="web/mb33/bundles/custom-modal.css?v=OoJMx9HYbSSX_kAkQy-IAdtYhsAf8mb55menPwEb4kQ1" rel="stylesheet"/>

    <link href="/web/mb33/bundles/site.css?v=15oe12wK4JsM9jhVa7vW-ZrLlLRSVJGfTBUL9yYJrLs1" rel="stylesheet"/>

    <link href="/web/mb33/css/zh-CN.css?version=20150116" rel="stylesheet" />

    <link href="/web/mb33/bundles/home.css?v=LbK70f-uDrNcVMzWecnFowfQK8PsQdHY5MCniXPFqJs1" rel="stylesheet"/>

    <link href="/web/mb33/css/zh-CN.css?version=201404141731" rel="stylesheet" />


    <script src="/web/mb33/js/jquery.min.js"></script>

    <script src="/web/mb33/js/jquery.marquee.min.js"></script>

    <script src="/web/mb33/js/jquery-ui.min.js"></script>

    <script src="/web/mb33/bundles/common.js?v=HNgwom0Dzrx_ZWnmf34LgV_TQUJqznH90A6VSugf2eM1"></script>

    <script src="/web/mb33/js/angular.min.js"></script>
    <!--<script src="https://cdn.567.sh/Web.Mobile/_Common/Scripts/angularjs/v1.6.5/angular.min.js"></script>-->

    <script src="/web/mb33/js/moment-with-locales.min.js"></script>

    <script src="/web/mb33/js/moment-timezone-with-data.min.js"></script>

    <script src="/web/mb33/js/jquery.signalR-2.2.0.min.js"></script>

    <script src="/web/mb33/js/jquery-form.js"></script>
    <script src="/web/mb33/js/template-web.js"></script>


    <!--[if lte IE 9]>
    <script src="/web/mb33/js/placeholders.min.js"></script>
    <script src="/web/mb33/js/html5shiv.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/mb32/js/index1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/web/mb32/css/index1.css') }}">

    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/mystyle.css') }}">

    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jq.page.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
</head>

@yield('css_js')

@include('web.template.mb33.layouts.header')
<div id="banner"></div>
<div class="member-container" style="background-color: #241d17">

@yield('content')
@include('web.template.mb33.layouts.aside')
@include('web.template.mb33.layouts.footer')

@yield('after.js')

{{--<div style="display:none">{!! $company_info->company_baidu_code !!}</div>--}}



<script src="/web/mb33/js/angular-animate.min.js"></script>

<script src="/web/mb33/js/ui-bootstrap-custom-tpls-0.10.0.min.js"></script>

<script src="/web/mb33/Scripts/_site.js?version=20170803"></script>

<script src="/web/mb33/bundles/environment.js?v=Giv511fvuZRlJKLjJDPqmIxOhmtht9zFlW7lvvTMf0Y1"></script>

<script src="/web/mb33/Scripts/_config.js?version=20180117"></script>
<script src="/web/mb33/Scripts/labels_zh-CN.js"></script>
<script src="/web/mb33/angular-services.js?v=KTUD20Rh5H0C4dcY-LEkmMQWdb5dZ6ZAgPkfsFwPQv81"></script>

<script src="/web/mb33/angular-controllers.js?v=6XlvZHLJw9rfvx2VOYif_ziQ4XA0tf6KNJx3t4BcMvk1"></script>

<script src="/web/mb33/angular-directives.js?v=agA_5MsASKuCuZnnudjzArmMB0Hg9A0aIc_PlABHIFY1"></script>

<script src="/web/mb33/angular-filters.js?v=MeeQJovOHWNSkHRSyl6Jkj407IAV6G2P3C98wCBb83I1"></script>

<script src="/web/mb33/portal-shared.js?v=1Qym7_7BFPaXQLvJzrHwUYSZT9__RyZpz431AkFTpQQ1"></script>
<link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">


{{--<script src="https://cdn.567.sh/Web.Portal/_Common/Scripts/Custom/common.min.js"></script>--}}


{{--@include('front.include.app'. dd_pc())--}}
<script type='text/javascript' src='/web/mb33/Scripts/cute3D/js/modernizr.min.js'></script>
<script type='text/javascript'>
    var CSSettings = {
        "pluginPath": "/web/mb33/Scripts/cute3D"
    };
</script>
<script src="/web/mb33/Scripts/cute3D/js/cute.slider.js"></script>
<script src="/web/mb33/Scripts/cute3D/js/cute.transitions.all.js"></script>

<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>

{{--@include('front.include.static')--}}

<script>
    template.defaults.rules[1].test = /<{([@#]?)[ \t]*(\/?)([\w\W]*?)[ \t]*}>/;
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    function get_param(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if ( r != null ) return unescape(r[2]);
        return null;
    }

    function get_loading() {
        $('body').append('<style>#div1{background-color: rgba(0, 0, 0, 0.45);position: absolute;left: 0;top:0;width: 100vw;height:80vh;display: table-cell;text-align: center;vertical-align: middle;padding-top: 40vh;}</style><div id="div1"><img src="loading.gif"></div>')
    }

    function remove_loading() {
        $('#div1').remove();
    }
    $(function () {
        $('#nav .nav_block').each(function () {
            if ( $(this).children().length == 0 ) {
                $(this).remove();
            }
        });
        $('#nav li a').each(function () {
            var update_href = location.href.split('?')[0].replace(location.href.split('//')[0] + '//', '').replace(location.host, '');
            if ( $(this).attr('href') == update_href ) {
                $(this).addClass('active');
            }
        });
        $('#login_style_id').click(function () {
            $.post('/Lobby/login', {
                "user_name": $('#login_user_name').val(),
                "user_pass": $('#login_user_pass').val(),
                "code_input": $('#login_code_input').val()
            }, function (data) {
                data = eval('(' + data + ')');
                if ( data['code'] == 200 ) {
//                        alert(data['msg']);
                    window.location.href = "/";
                } else {
                    alert(data['msg']);
                }
            });
        });
        $('.game_class').click(function () {
            if ( "{{session('user_id')}}" == "" ) {
                $('.alert-wrap_login').show();
                var location_split = location.href.split('/');
                var back_name = location_split[location_split.length - 2] + '_login_bg.jpg';
                $('#login_img').attr('src', '' + back_name);
            } else {
                //如果存在id 则打开页面 ，此方法用于区分游戏线路是否开启专用
                if ( $(this).attr('id') )
                    window.open($(this).attr('id'),'','location=no,width=1200,height=760');
            }
        });


        /*$('#login-box').click(function () {
            if ( $('input[name=user_name]').val() == '' ) {
                alert('请输入账号');
                return false;
            }
            if ( $('input[name=user_pass]').val() == '' ) {
                alert('请输入密码');
                return false;
            }
            if ( $('input[name=code_input]').val() == '' ) {
                alert('请输入验证码');
                return false;
            }
            var options = {
                success: function (data) {
                    data = eval('(' + data + ')');
                    if ( data['code'] == 200 ) {
//                        alert(data['msg']);
                        window.location.href = "/";
                    } else {
                        alert(data['msg']);
                    }
                }
            };
            $('#login_form').ajaxSubmit(options);
        });*/
        $(document).keyup(function (event) {
            if ( event.keyCode == 13 ) {
                if ( $('input[name=user_name]').is(":focus") || $('input[name=user_pass]').is(':focus') || $('input[name=code_input]').is(':focus') ) {
                    $('#login-box').click();
                    return true;
                }
                if ( $('#login_user_name').is(":focus") || $('#login_user_pass').is(':focus') || $('#login_code_input').is(':focus') ) {
                    $('#login_style_id').click();
                    return true;
                }
            }
        });
        $('#nav').on('mouseenter', 'li', function () {
            $('.nav_block').stop().hide();
            $(this).find('.nav_block').stop().slideDown();
        });
        $('#nav').on('mouseleave', 'l i', function () {
            if ( !$('.nav_block').is(":focus") ) {
                $(this).find('.nav_block').stop().slideUp();
            }
        });
        $('#nav').on('mouseenter', '.nav_block', function () {
            $(this).stop().slideDown();
        });
        $('#nav').on('mouseleave', '.nav_block', function () {
            $(this).stop().slideUp();
        });
        $('#nav').on('click', '.nav_block p', function () {
            location.href = $(this).attr('id');
        });
    });
</script>

<script type="text/javascript">

    $(function(){

        //Listener();
        //getgamemoney();


    })

    function Listener(){
        payTimer = setInterval(function(){
            $.ajax({
                url:'/Lobby/listen_login',
                type:'POST',
                data:{status:1},
            }).done(function(response){
                if(response=='paid'){
                    clearInterval(payTimer);
                    paidTips();
                }
            });

        },1000)
    }





    //	function paidTips(){
    //
    //				alert("您的账号在别处登录，您已被迫下线");
    //				window.location.href="/";
    //		}





    function getgamemoney(){

        $.post('/front/person_center/person_center/bank_bussiness', {game_type: 'ag_api', select_money: 1}, function (data) {

            data = eval('(' + data + ')');
            if ( data['code'] == 200 ) {
                $("#gamemoney").html(data['msg']);
            }

        });




    }




</script>



<script>
    $(".laboxm").click(function(){
        $(this).find(".lab-mbx").toggle();
    });
    $(".nav li").mouseover(function(){
        $(this).find(".nav_er").show();
        $(this).siblings().find(".nav_er").hide();
    });
    $(".nav li .nav_er").mouseout(function(){

        $(this).hide();
    });
    function getKey() {
        $url = "{{ URL('kit/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('captcha').src = $url;
    }

    header("Cache-Control: no-cache, must-revalidate");
</script>



<input name="__RequestVerificationToken" type="hidden" value="<?php
function getRandomString($len, $chars=null)
{
    if (is_null($chars)){
        $chars = "abcdefghijk_lmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU-VWXYZ0123456789";
    }
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}
echo getRandomString(93);
?>" />

<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0,.mar0').on('click', function () {
                var notice_index = layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: '640px',
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click', '.close', function () {
                    layer.close(notice_index)
                })
            })

        })
    })(jQuery)
</script>
</body>
</html>
