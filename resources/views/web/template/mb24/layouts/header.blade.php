<header id="header" scrolltop-fixed>
    <div id="top-header">
        <div class="wrapper">
            <ul class="top-nav" ng-controller="LobbiesCtrl">
                <li class="green" toggle-color="400"><a href="{{route('game.playGame')}}?plat_type=MG&game_type=2" target="_blank">MG電子</a></li>
                <li class="yellow" toggle-color="400"><a href="{{route('game.playGame')}}?plat_type=CQ9&game_type=2" target="_blank">传奇電子</a></li>
                <li class="red" toggle-color="400"><a href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" target="_blank">BBIN電子</a></li>
                <li class="blue" toggle-color="400"><a href="{{route('game.playGame')}}?plat_type=PT&game_type=2" target="_blank">PT電子</a></li>
                <li><a href="{{route('game.playGame')}}?plat_type=JDB&game_type=2" target="_blank">夺宝電子</a></li>
                <li><a href="{{route('game.playGame')}}?plat_type=AG&game_type=2" target="_blank">AG電子</a></li>
                <li><a href="{{route('game.playGame')}}?plat_type=QT&game_type=2" target="_blank">QT電子</a></li>
                <li><a href="{{ route('web.catchFish') }}">捕魚游戏</a></li>
                <li><a href="{{ route('web.activityList') }}">优惠大厅</a></li>
                <li><a target="_blank" href="{{route('daili.init')}}">代理登陆</a></li>
                {{--<li class="red2" toggle-color="400"><a ng-href="{{ $_system_config->kscz}}" target="_blank">快捷支付</a></li>--}}
                <li><a href="{{ $_system_config->app_link }}" target="_blank">APP下载</a></li>
                <li><a ng-href="{{ route('web.red') }}"target="_blank">VIP抢红包</a></li>
            </ul>
            <div class="select-language" select-language>
                语言选择:
                <span data-language="zh-CN" title="简体中文" class="ng-scope"></span>
                <span data-language="zh-TW" title="繁体中文" class="ng-scope"></span>
                <span data-language="en-US" title="English" class="ng-scope"></span>
                <span data-language="th" title="ภาษาไทย" class="ng-scope"></span>
            </div>
        </div>
    </div>
    <div class="wrapper">

        <div id="logo-bg" style="background: none;">
            <a href="/">
                <img src="{{ $_system_config->site_logo}}">
            </a>
        </div>

        @if (Auth::guard('member')->guest())
            <div id="account-box">
                <form name="LoginForm" id="LoginForm" action="{{ route('member.login.post') }}" method="POST">
                    <input id="login_account" type="text" placeholder="帐号" name="name" tabindex="1" required title="请输入账号"/>
                    <input id="login_password" type="password" placeholder="密码" name="password" tabindex="2" required title="请输入密码" />

                    <div id="check-code-wrapper">
                        <input id="rmNum"  type="text" placeholder="验证码" name="captcha" tabindex="3" onfocus="javascript:re_captcha();"  required title="请输入验证码"/>
                        <img id="captcha"  style="background-color: burlywood;"onfocus="javascript:re_captcha();"
                        />
                        <script>
                            function re_captcha() {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('captcha').src = $url;
                            }
                        </script>
                    </div>
                    <button id="login-box" class="btn-login ajax-submit-btn" ng-disabled="isProcessing" ng-bind="isProcessing ? '立即登录...' : '立即登录'">立即登录</button>
                    <button class="register-btn" onclick="javascript:window.location.href = '{{ route('web.register_one') }}';" type="button">免費註冊</button>
                    <span class="forget-btn" onclick="return layer.alert('您好！忘记密码请联系客服!',{icon:7});">忘记密码？</span>


                </form>
            </div>

        @else


            <div id="account-box" class="is-login">
                <ul id="account-info">
                    <li>
                        帐号 :
                        <span class="account" title="{{ $_member->name }}">{{ $_member->name }}</span>
                        {{--<a id="mailbox" ng-controller="SiteMailCountCtrl" href="/member/FYcenter/12#2" title="站内信">
                            <span>{{ $_not_read_message_num }}</span>
                        </a>--}}
                    </li>
                    <li>

                        账户余额 :

                        <strong class="money">{{ $_member->money }}</strong>

                    </li>
                </ul>

                <ul id="account-nav">
                    @if($_system_config ->is_new_center == 1)
                    <li title="会员中心">
                        <a href="{{ route('member.userCenter') }}">
                            会员中心
                        </a>
                    </li>
                    @else
                    <li title="会员中心">
                        <a href="{{ route('member.userCenter') }}">
                            会员中心
                        </a>
                    </li>
                    <li title="线上存款">
                        <a href="{{ route('member.finance_center') }}">
                            线上存款
                        </a>
                    </li>
                    <li title="线上取款">
                        <a href="{{ route('member.member_drawing') }}">
                            线上取款
                        </a>
                    </li>
                    <li title="账户记录">
                        <a href="{{ route('member.customer_report') }}">
                            账户记录
                        </a>
                    </li>
                    <li title="账户管理">
                        <a href="{{ route('member.userCenter') }}">
                            账户管理
                        </a>
                    </li>
                    @endif
                    {{--<li title="修改取款密码">
                        <a href="/member/FYcenter/6#6">
                            修改取款密码
                        </a>
                    </li>
                    <li title="修改密码">
                        <a href="/member/FYcenter/2#5">
                            修改密码
                        </a>
                    </li>--}}
                </ul>
                <div id="action-box">
                    <a href="{{ route('member.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn-forget">登出</a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endif




    </div>
</header>
<script>
    @if (!Auth::guard('member')->guest())
    @if($_member->is_trans_on == 1)
    $(function () {
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
    @endif
</script>
<nav id="nav" scrolltop-fixed>
    <ul ng-controller="LobbiesCtrl">
        <li class="small">
            <a href="/">首页<span>HOME</span></a>
        </li>
        <li>
            <a href="{{ route('web.liveCasino') }}">真人荷官<span>CASINO</span></a>
            <div class="subnav col2">
                <ol>
                    @if(in_array('AG', $_api_list))
                        <li class="hot" game-box="ag"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>AG寰亚厅</li>
                    @endif
                    @if(in_array('BG', $_api_list))
                        <li game-box="bg" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>BG尊娱厅</li>
                    @endif
                    @if(in_array('ALLBET', $_api_list))
                        <li game-box="ab" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>AB尊爵厅</li>
                    @endif
                    @if(in_array('GPI', $_api_list))
                        <li game-box="gpi" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>GPI贵宾厅</li>
                    @endif
                    @if(in_array('GD', $_api_list))
                        <li game-box="gd" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>GD奢华厅</li>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <li game-box="sa" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>沙龙荣耀厅</li>
                    @endif
                </ol>
                <ol>
                    @if(in_array('BBIN', $_api_list))
                        <li class="hot" game-box="bb" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>BBIN旗舰厅</li>
                    @endif
                    @if(in_array('MG', $_api_list))
                        <li game-box="mg" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>MG欧美厅</li>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <li game-box="pt" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>PT国际厅</li>
                    @endif
                    @if(in_array('DG', $_api_list))
                        <li game-box="evo" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>DG尊爵会</li>
                    @endif
                    @if(in_array('SUNBET', $_api_list))
                        <li game-box="sb" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>申博梦幻厅</li>
                    @endif
                    @if(in_array('OG', $_api_list))
                        <li game-box="og" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>OG如意厅</li>
                    @endif
                        @if(in_array('CQ9', $_api_list))
                            <li game-box="og" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>CQ9視訊</li>
                        @endif
                </ol>
            </div>
        </li>
        <li class="green hot">
            <a href="{{ route('web.eGame') }}">電子游艺<span>SLOTS</span></a>
            <div class="subnav col2">
                <ol>
                    @if(in_array('MG', $_api_list))
                    <li class="hot" game-box="mg">
                        <a target="_blank" href="{{route('game.playGame')}}?plat_type=MG&game_type=2">MG電子</a>
                    </li>
                    @endif
                        @if(in_array('PT', $_api_list))
                            <li class="hot" game-box="pt">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=PT&game_type=2">PT電子</a>
                            </li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li class="hot" game-box="bb">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2">BBIN電子</a>
                            </li>
                        @endif
                        @if(in_array('AG', $_api_list))
                            <li game-box="ag">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=AG&game_type=2">AG電子</a>
                            </li>
                        @endif
                        @if(in_array('PP', $_api_list))
                            <li game-box="ag">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=PP&game_type=2">PP電子</a>
                            </li>
                        @endif
                        @if(in_array('SA', $_api_list))
                            <li game-box="ag">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=SA&game_type=2">SA電子</a>
                            </li>
                        @endif
                        @if(in_array('QT', $_api_list))
                            <li game-box="ag">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=QT&game_type=2">QT電子</a>
                            </li>
                        @endif
                        @if(in_array('SW', $_api_list))
                            <li game-box="ag">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=SW&game_type=2">SW電子</a>
                            </li>
                        @endif
                    {{--<li game-box="ag" ng-click="toAgHtml()">AG電子</li>
                    <li game-box="pp" ng-click="toPrgFlash()">PP電子</li>
                    <li game-box="gns" ng-click="toGnsHtml()">SA電子</li>
                    <li game-box="hb" ng-click="toHabaHtml()">QT電子</li>
                    <li game-box="rt" ng-click="toRedTigerHtml()">SW電子</li>--}}
                </ol>
                <ol>
                    @if(in_array('CQ9', $_api_list))
                        <li class="hot" game-box="mg">
                            <a target="_blank" href="{{route('game.playGame')}}?plat_type=CQ9&game_type=2">传奇電子</a>
                        </li>
                    @endif
                        @if(in_array('JDB', $_api_list))
                            <li class="hot" game-box="mg">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=JDB&game_type=2">夺宝電子</a>
                            </li>
                        @endif
                        @if(in_array('MW', $_api_list))
                            <li game-box="mg">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=MW&game_type=2">MW電子</a>
                            </li>
                        @endif
                        @if(in_array('SG', $_api_list))
                            <li game-box="mg">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=SG&game_type=2">新霸電子</a>
                            </li>
                        @endif
                        @if(in_array('GPI', $_api_list))
                            <li game-box="mg">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=GPI&game_type=2">GPI電子</a>
                            </li>
                        @endif
                        @if(in_array('FG', $_api_list))
                            <li game-box="mg">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=FG&game_type=2">FG電子</a>
                            </li>
                        @endif
                        @if(in_array('BNG', $_api_list))
                            <li game-box="mg">
                                <a target="_blank" href="{{route('game.playGame')}}?plat_type=BNG&game_type=2">BNG電子</a>
                            </li>
                        @endif
                    {{--<li class="hot" game-box="cq9" ng-click="toCq9Html()">传奇電子</li>

                    <li class="hot" game-box="jdb" ng-click="toJdbHtml()">夺宝電子</li>
                    <li game-box="mw" ng-click="toMwHtml()">MW電子</li>
                    <li game-box="sg" ng-click="toSgFlash()">新霸電子</li>
                    <li game-box="gpi" ng-click="toGpiFlash()">GPI電子</li>
                    <li game-box="ne" ng-click="toNetentHtml()">FG電子</li>
                    <li game-box="isb" ng-click="toIsbHtml()">BNG電子</li>--}}
                </ol>
            </div>
        </li>
        <li class="blue">
            <a href="{{ route('web.poker') }}">棋牌游戏<span>POKER</span></a>
            <ol class="subnav">
                @if(in_array('AP', $_api_list))
                    <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=AP&game_type=7">AP爱棋牌</a></li>
                @endif
                @if(in_array('VG', $_api_list))
                    <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=VG&game_type=7">VG棋牌</a></li>
                @endif
                @if(in_array('SG', $_api_list))
                    <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=SG&game_type=7">SG棋牌</a></li>
                @endif
                @if(in_array('LEG', $_api_list))
                    <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=LEG&game_type=7">LEG棋牌</a></li>
                @endif
                @if(in_array('MT', $_api_list))
                    <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=MT&game_type=7">美天棋牌</a></li>
                @endif
                @if(in_array('KY', $_api_list))
                    <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=KY&game_type=7">开元棋牌</a></li>
                @endif
                @if(in_array('FG', $_api_list))
                    <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=FG&game_type=7">FG棋牌</a></li>
                @endif

            </ol>
        </li>
        <li>
            <a href="{{ route('web.catchFish') }}">捕魚游戏<span>FISHING</span></a>
            <div class="subnav col2">
                <ol>
                    @if(in_array('FG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>FG美人捕魚</li>
                    @endif

                    @if(in_array('FG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>FG捕鸟达人</li>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>FG天天捕魚</li>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>JDB财神捕魚</li>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>JDB龙王捕魚</li>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>AG捕魚王</li>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>BB捕魚达人</li>
                    @endif
                    @if(in_array('SW', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>SW捕魚多福</li>
                    @endif
                    @if(in_array('SW', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&game_code=sw_fuqsg','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>SW捕魚多福</li>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=6&game_code=cashfi','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>PT深海大赢家</li>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>SA鱼乐无穷</li>
                    @endif
                </ol>
                <ol>
                    @if(in_array('FG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>FG欢乐捕魚</li>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>FG雷霆战警</li>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>FG捕魚嘉年华</li>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>CQ9皇金渔场</li>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <li class="hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>JDB龙王捕魚2</li>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <li class="sub-hot"
                            @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                            @else onclick="Alert();"
                                @endif>BBIN捕魚大师</li>
                    @endif
                    @if(in_array('MW', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>MW千炮捕魚</li>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>MT李逵捕魚</li>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <li
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0045','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>MT金蟾捕魚</li>
                    @endif

                </ol>
            </div>
        </li>
        <li class="hot red">
            <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
            <ol class="subnav">
                <?php
                $lottery = (new \App\Http\Controllers\Wap\AjaxController())->getGames('lottery');
                ?>
                    @if(count($lottery) > 0)
                        @foreach($lottery as $k=> $v)
                            <li @if($k<=3)class="hot" @endif
                            @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"@endif>
                                <span>{{ $v['name'] }}</span>
                            </li>
                        @endforeach
                    @endif
                {{--@if(in_array('SGL', $_api_list))

                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>SG双赢彩票</span></li>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN彩票</span></li>
                @endif
                @if(in_array('IG', $_api_list))
                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG彩票</span></li>
                @endif
                @if(in_array('IG', $_api_list))
                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=imlotto10059','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG六合彩</span></li>
                @endif
                @if(in_array('VR', $_api_list))
                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>VR竞速彩票</span></li>
                @endif
                @if(in_array('EG', $_api_list))
                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>EG彩票</span></li>
                @endif
                @if(in_array('BG', $_api_list))
                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BG彩票</span></li>
                @endif--}}
            </ol>
        </li>
        <li>
            <a href="{{ route('web.esports') }}">體育赛事<span>SPORT</span></a>
            <ol class="subnav">
                @if(in_array('SS', $_api_list))
                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>三昇體育</span></li>
                @endif
                @if(in_array('SS', $_api_list))
                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>皇冠體育</span></li>
                @endif
                @if(in_array('IBC', $_api_list))
                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>沙巴體育</span></li>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <li class="hot"  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN體育</span></li>
                @endif
                @if(in_array('AG', $_api_list))
                    <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>AG體育</span></li>
                @endif
                @if(in_array('NEWBB', $_api_list))
                    <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>NEWBB體育</span></li>
                @endif
                @if(in_array('ESB', $_api_list))
                    <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>ESB电竞</span></li>
                @endif
                @if(in_array('AVIA', $_api_list))
                    <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>泛亚电竞</span></li>
                @endif

            </ol>
        </li>
        {{--<li class="hot red">
            <a href="javascript:void(0)" ng-click="toBbGame()">BBIN電子<span>BBIN SLOTS</span></a>
            <ol class="subnav">
                <li class="hot" ng-click="toBbGame()">糖果派对</li>
                <li class="hot" ng-click="toBbGame()">糖果派对2</li>
                <li class="hot" ng-click="toBbGame()">连环夺宝</li>
                <li class="hot" ng-click="toBbGame()">连环夺宝2</li>
            </ol>
        </li>
        <li class="hot red">
            <a href="javascript:void(0)" ng-click="toCq9Html()">传奇電子<span>CQ9 SLOTS</span></a>
            <ol class="subnav">
                <li class="hot" ng-click="toCq9Html()">跳高高</li>
                <li class="hot" ng-click="toCq9Html()">跳起来</li>
                <li class="hot" ng-click="toCq9Html()">五福临门</li>
                <li class="hot" ng-click="toCq9Html()">武圣</li>
                <li class="hot" ng-click="toCq9Html()">火烧连环船</li>
                <li class="hot" ng-click="toCq9Html()">金鸡报喜</li>
            </ol>
        </li>--}}
        <li class="red">
            <a href="{{ route('web.activityList') }}">优惠活动<span>PROMOTION</span></a>
            {{--<ol class="subnav">
                <!-- <li class="hot"><a ng-href="" target="_blank">電子等级系统</a></li>
                 <li class="hot"><a ng-href="" target="_blank">電子擂台赛</a></li>
                 <li class="hot"><a ng-href="" target="_blank">真人等级系统</a></li>-->
                <li class="hot"><a ng-href="{{ $_system_config->vipjlb }}" target="_blank">VIP等级系统</a></li>
                <li class="hot"><a ng-href="" target="_blank">优惠大厅</a></li>
            </ol>--}}
        </li>
        <li class="small">
            <a href="javascript:void(0)" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服<span>SERVICE</span></a>
        </li>
    </ul>
</nav>
