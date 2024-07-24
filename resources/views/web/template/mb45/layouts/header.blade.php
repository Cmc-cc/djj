<div class="jsx-3526929741">
    <div class="jsx-3526929741 container" style="width: 100%;max-width: 100%">
        <a name="top" id="top" class="jsx-3526929741"></a>
        <section class="ant-layout">
            <div>
                <div>
                    <div class="RBHeader">
                        <header class="RBHeader-TOP ant-layout-header">
                            <div id="HomeContentDown" class="ant-row HomeContentDown ">
                                <div id="Home-Top-Left" class="ant-col ant-col-4" style="width:200px">
                                    <ul>
                                        <li class="Bankusermenu promotion">
                                            <a target="_blank" href="javascript:;" id="dispTime"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div style="display:inline-block" class="ant-col ant-col-20 Home-Top-Right">
                                    <ul mode="horizontal" style="float:right" id="navtop">
                                        @if (Auth::guard('member')->guest())
                                            <form action="{{ route('member.login.post') }}" method="post">
                                            <li id="userlogin_ip" class="Bankusermenu ">
                                                <span class="ant-input-affix-wrapper"><span class="ant-input-prefix"><i aria-label="icon: user" style="color:rgba(0,0,0,.25)" class="anticon anticon-user"><svg viewbox="64 64 896 896" class="" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path></svg></i></span><input id="loginUsername" name="name" type="text" placeholder="用户名" maxlength="16" value="" class="ant-input" oninput="if(value.length>16)value=value.slice(0,16)"></span>
                                            </li>
                                            <li id="pwdlogin_ip">
                                                <span class="ant-input-affix-wrapper"><span class="ant-input-prefix"><i aria-label="icon: lock" style="color:rgba(0,0,0,.25)" class="anticon anticon-lock"><svg viewbox="64 64 896 896" class="" data-icon="lock" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M832 464h-68V240c0-70.7-57.3-128-128-128H388c-70.7 0-128 57.3-128 128v224h-68c-17.7 0-32 14.3-32 32v384c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V496c0-17.7-14.3-32-32-32zM332 240c0-30.9 25.1-56 56-56h248c30.9 0 56 25.1 56 56v224H332V240zm460 600H232V536h560v304zM484 701v53c0 4.4 3.6 8 8 8h40c4.4 0 8-3.6 8-8v-53a48.01 48.01 0 1 0-56 0z"></path></svg></i></span><input id="loginUserpwd" maxlength="16" type="Password" oninput="if(value.length>16)value=value.slice(0,16)" name="password" placeholder="密码" value="" class="ant-input"></span>
                                            </li>

                                            {{--<li class="sendcodes">
                                                <div class="input-group sendcodes" style="display:none;position: relative">
                                                    <input id="loginUserPhone" type="number" placeholder="手机号码" checkcode-type="Login" required maxlength="11" oninput="if(value.length>11)value=value.slice(0,11)" onkeydown="KeyDown()" />
                                                </div>
                                            </li>--}}

                                            {{--<li class="sendcodes">
                                                <div class="input-group sendcodes" style="display:none;position: relative">
                                                    <input id="loginUserPhoneCode" type="number" placeholder="手机验证码" checkcode-type="Login" required maxlength="4" oninput="if(value.length>6)value=value.slice(0,6)" onkeydown="KeyDown()" />
                                                    <span class="reg-code forget-btn" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1">发送验证码</span>
                                                </div>
                                            </li>--}}
                                            <li>
                                                <input name="captcha" id="loginUsercode" checkcode-type="Login" type="text" required onfocus="$('#captcha').click()" placeholder="验证码" />
                                                <img id="captcha" src="{{ URL('kit/captcha/1') }}" style="margin-left: 0px;margin-top: -5px;" />
                                            </li>
                                            <li>
                                                <button id="login-box" class="ant-btn RBLogin login-btn ajax-submit-btn"><span>登 录</span></button>
                                            </li>
                                            <li class="Bankusermenu ">
                                                <button class="reg-mobile ant-btn RBLogin login-btn" onclick="loginCode(this)" state="1" style="display:none;">手机号登录</button>
                                            </li>
                                            <li class="Bankusermenu ">
                                                <span><a onclick="goTo('{{ route('web.register_one') }}')">免费开户</a></span>
                                            </li>
                                            </form>
                                            <script>
                                                $(function () {
                                                    $('#captcha').click(function () {
                                                        $url = "{{ URL('kit/captcha') }}";
                                                        $url = $url + "/" + Math.random();
                                                        $(this).attr('src',$url)
                                                    })
                                                })
                                            </script>
                                        @else
                                            <li>
                                                <a class="ant-dropdown-link ant-dropdown-trigger" href="#">
                                                    您好：<span style="color: rgb(233, 194, 39);">{{ $_member -> name }}</span>
                                                    {{--<i aria-label="icon: caret-down" class="anticon anticon-caret-down" style="color: rgb(233, 194, 39);">
                                                        <svg viewBox="0 0 1024 1024" class="" data-icon="caret-down" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false">
                                                            <path d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z"></path>
                                                        </svg>
                                                    </i>--}}
{{--                                                    <img src="" class="vip-layout" id="vipLayout" style="height:20px;width:20px">--}}
                                                </a>
                                                {{--<div class="layout_userpwd">
                                                    <a href="@Url.Action("ChangeLoginPassword", "Index")">修改密码</a>

                                                    <a href="@Url.Action("ChangeWithdrawPassword", "Index" )">修改取款密码</a>
                                                </div>--}}
                                            </li>

                                            <li>
                                                <div class="ant-spin-nested-loading ">
                                                    <div class="ant-spin-container">
                                                        <a class="ant-dropdown-link ant-dropdown-trigger" href="#" style="cursor: default;">
                                                            总余额：<span style="color: rgb(233, 194, 39);" class="UserAmountController my_money">{{ $_member -> money }}</span><span style="color: rgb(233, 194, 39);">元</span>
                                                        </a>
                                                        {{--<span style="cursor: pointer;">&nbsp;<a><i class="header-icon bg-reload" onclick="yijianzhuanchu(this,1)"></i></a></span>&nbsp;--}}
                                                        <div id="callBackAllWallet"></div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="Bankusermenu " title="个人中心"><a href="{{ route('member.userCenter') }}"> 个人中心</a></li>
                                            {{--<li class="Bankusermenu " title="代理申请"><a href="@Url.Action("Partner", "Index")"> 代理申请</a></li>
                                            <li class="Bankusermenu " title="在线充值"><a href="@Url.Action("Deposit", "Index")?userhistory=1"> 在线充值</a></li>
                                            <li class="Bankusermenu " title="在线取款">  <a href="@Url.Action("WithdrawApplication", "Index")?userhistory=2">在线取款</a></li>
                                            <li class="Bankusermenu " title="额度转换"><a href="@Url.Action("transfer", "Index")?userhistory=3">额度转换</a></li>
                                            <li class="Bankusermenu " title="投注记录"><a href="@Url.Action("BetRecord", "Index")"><span>投注记录</span></a></li>
                                            <li class="Bankusermenu " title="交易记录"><a href="@Url.Action("Transaction", "Index")?userhistory=4">交易记录</a></li>--}}

                                            <li onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="header-icon bg-shutdown"></i>&nbsp;&nbsp;<span><a>退出</a></span></li>
                                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </header>
                        <header class="RBHeader-TOP-Next ant-layout-header" id="RBHeader-TOP-Next">
                            <div class="ant-row">
                                <div class="ant-col ant-col-16">
                                    <div class="logo">
                                        <a href="{{ route('web.index') }}">

                                        <img src="{{ $_system_config -> site_logo }}" alt="" />
                                        </a>
                                    </div>
                                    <ul class="ant-menu ant-menu-dark ant-menu-root ant-menu-horizontal" role="menu" id="navList">
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus5" role="menuitem">
                                            <a style="color:white" href="{{ route('web.index') }}">首页</a>
                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus0" role="menuitem">
                                            <a style="color:white" class="SportsDowset" href="{{ route('web.esports') }}">體育博彩<i class="icon iconfont icon-icon_lib_down layouttop"></i></a>
                                            <div class="navContent1">
                                                <div>
                                                    <div class="ant-popover ant-popover-hidden navContent sport1" type="sport">
                                                        <div class="ant-popover-content">
                                                            <div class="ant-popover-arrow"></div>
                                                            <div class="ant-popover-inner" role="tooltip">
                                                                <div>
                                                                    <div class="ant-popover-inner-content" id="sport">
                                                                        <?php
                                                                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                                                        ?>
                                                                            @foreach($sports as $k => $v )
                                                                        <div class="Sports-menu-down"
                                                                             @if($_member)
                                                                             onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                                                             @else onclick="Alert();"@endif
                                                                             >
                                                                            <div class="list-content">
                                                                                <p>{{ $v['name'] }}</p></div>
                                                                        </div>
                                                                                @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>

                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus2" role="menuitem">
                                            <a style="color:white" class="LiveDowset" href="{{ route('web.liveCasino') }}">真人娱乐<i class="icon iconfont icon-icon_lib_down layouttop"></i></a>
                                            <div class="navContent3">
                                                <div>
                                                    <div class="ant-popover ant-popover-hidden navContent live1" type="womenlist">
                                                        <div class="ant-popover-content">
                                                            <div class="ant-popover-arrow"></div>
                                                            <div class="ant-popover-inner" role="tooltip">
                                                                <div>
                                                                    <div class="ant-popover-inner-content" id="live">
                                                                        <?php
                                                                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                                                        ?>
                                                                            @foreach($live as $k => $v )
                                                                                <div class="Sports-menu-down"
                                                                                     @if($_member)
                                                                                     onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                                                                     @else onclick="Alert();"@endif
                                                                                >
                                                                                    <div class="list-content">
                                                                                        <p>{{ $v['name'] }}</p></div>
                                                                                </div>
                                                                            @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus3" role="menuitem">
                                            <a style="color:white" href="{{ route('web.poker') }}">棋牌<i class="icon iconfont icon-icon_lib_down layouttop"></i><span class="new-text">热</span></a>
                                            <div class="navContent4">
                                                <div>
                                                    <div class="ant-popover ant-popover-hidden navContent chess1" type="womenlist">
                                                        <div class="ant-popover-content">
                                                            <div class="ant-popover-arrow"></div>
                                                            <div class="ant-popover-inner" role="tooltip">
                                                                <div>
                                                                    <div class="ant-popover-inner-content" id="chess">
                                                                        <?php
                                                                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                                                        ?>
                                                                            @foreach($poker as $k => $v )
                                                                                <div class="Sports-menu-down"
                                                                                     onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                                                                >
                                                                                    <div class="list-content">
                                                                                        <p>{{ $v['name'] }}</p></div>
                                                                                </div>
                                                                            @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus4" role="menuitem">
                                            <a style="color:white" class="SlotDowset" href="{{ route('web.eGame') }}">老虎机<i class="icon iconfont icon-icon_lib_down layouttop"></i></a>
                                            <div class="navContent5">
                                                <div>
                                                    <div class="ant-popover ant-popover-hidden navContent tigger1" type="tigerlist">
                                                        <div class="ant-popover-content">
                                                            <div class="ant-popover-arrow"></div>
                                                            <div class="ant-popover-inner" role="tooltip">
                                                                <div>
                                                                    <div class="ant-popover-inner-content" id="slot" style="overflow:auto;">
                                                                        <?php
                                                                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                                                        ?>
                                                                        @foreach($slot as $k => $v )
                                                                            <div class="Sports-menu-down"
                                                                                 onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                                                            >
                                                                                <div class="list-content">
                                                                                    <p>{{ $v['name'] }}</p></div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus2" role="menuitem">
                                            <a style="color:white" class="LiveDowset" href="{{ route('web.lottory') }}">彩票游戏<i class="icon iconfont icon-icon_lib_down layouttop"></i></a>
                                            <div class="navContent6">
                                                <div>
                                                    <div class="ant-popover ant-popover-hidden navContent lottery1" type="womenlist">
                                                        <div class="ant-popover-content">
                                                            <div class="ant-popover-arrow"></div>
                                                            <div class="ant-popover-inner" role="tooltip">
                                                                <div>
                                                                    <div class="ant-popover-inner-content" id="lottery">
                                                                        <?php
                                                                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                                                        ?>
                                                                        @foreach($lottery as $k => $v )
                                                                            <div class="Sports-menu-down"
                                                                                 onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                                                            >
                                                                                <div class="list-content">
                                                                                    <p>{{ $v['name'] }}</p></div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="ant-menu-item menus5" role="menuitem">
                                            <a style="color:white" href="{{ route('web.catchFish') }}">捕魚</a>
                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li class="ant-menu-item menus5" role="menuitem">
                                            <a style="color:white" href="{{ route('web.activityList') }}">优惠</a>
                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="ant-col ant-col-5">
                                    <ul class="ant-menu ant-menu-dark ant-menu-root ant-menu-horizontal" role="menu">
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>

                                        <a href="javascript:void(0)" onclick="openKuFu(this,1);" class="KFzaixian" urls="{{ $_system_config -> service_link }}">
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="display:none" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        <li style="padding:0px 0px 0px 15px" class="ant-menu-item" role="menuitem">
                                            <i aria-label="icon: customer-service" class="anticon anticon-customer-service"><svg viewBox="64 64 896 896" class="" data-icon="customer-service" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M512 128c-212.1 0-384 171.9-384 384v360c0 13.3 10.7 24 24 24h184c35.3 0 64-28.7 64-64V624c0-35.3-28.7-64-64-64H200v-48c0-172.3 139.7-312 312-312s312 139.7 312 312v48H688c-35.3 0-64 28.7-64 64v208c0 35.3 28.7 64 64 64h184c13.3 0 24-10.7 24-24V512c0-212.1-171.9-384-384-384zM328 632v192H200V632h128zm496 192H696V632h128v192z"></path></svg></i>在线客服
                                        </li>
                                        <li class="ant-menu-submenu ant-menu-submenu-horizontal ant-menu-overflowed-submenu" style="visibility:hidden;position:absolute" role="menuitem">
                                            <div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true">
                                                <span>···</span>
                                                <i class="ant-menu-submenu-arrow"></i>
                                            </div>
                                        </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </header>
                    </div>

                    {{--<div class="LeftNav">
                        <ul>
                            <a href="#" onclick="return landingDeposit('Deposit');">
                            <li>
                                <div>
                                    <span>充值</span>
                                    <i class="iconfont icon-icon_lib_yuan"></i>
                                </div>
                            </li>
                            </a>
                            <li>
                                <div class="KFzaixian" title="在线客服" onclick="openKuFu(this,1)" urls="">
                                <span>在线客服</span>
                                <i class="iconfont icon-icon_lib_livechat"></i>
                    </div>
                    </li>
                    <a href="#">
                    <li>

                        <div>
                            <span>下载中心</span>
                            <i class="iconfont icon-icon_lib_download1"></i>
                        </div>

                    </li>
                    </a>
                    <li>
                        <div class="qq QQzaixian" onclick="openKuFu(this,2);" urls="">
                        <span>客户QQ</span>
                        <i class="iconfont icon-icon_lib_qq"></i>
                </div>
                </li>

                <li onclick="goTop();">
                    <div>
                        <a href="#top" style="color:#fff"><i class="iconfont icon-icon_lib_up"></i><i class="iconfont icon-icon_lib_down"></i></a>
                    </div>
                </li>--}}
                </ul>
            </div>
            <div></div>
    </div>

</div>
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
                    var all = Number($('.my_money').text()) + Number(data.data);
                    $('.my_money').text('');
                    $('.my_money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
    @endif
</script>
