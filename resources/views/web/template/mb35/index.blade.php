@extends('web.template.mb35.layouts.main')
@section('css_js')
    <link href="/web/mb35/css/animate.css" rel="stylesheet" />

    <link href="/web/mb35/each-site/cute-slider-style.css" rel="stylesheet" />

@endsection
@section('content')

    @if (Auth::guard('member')->guest())
        <div class="wrapper">

            <div id="account-box">
                <form ng-controller="LoginCtrl" method="post" id="login_form" action="{{ route('member.login.post') }}" onkeydown="if(event.keyCode==13)return false;" ng-submit="login(loginParams)" ng-disabled="isProcessing">
                    <div class="input-wrapper input-account">
                        <input name="name" id="login_account" type="text" placeholder="账号" ng-model="loginParams.account" tabindex="1" required autofocus />
                    </div>
                    <div class="input-wrapper input-password">
                        <input name="password" id="login_password" type="password" placeholder="会员密码" ng-model="loginParams.password" tabindex="2" required />
                    </div>
                    <div class="input-wrapper input-capcha">
                        <input data-checkcode-retriever="checkCode" onclick="getKey();" name="captcha" checkcode-type="Login" type="text" placeholder="验证码" autocomplete="off" ng-model="loginParams.checkCode" tabindex="3" required />
                        <img id="captcha" onclick="getKey();" src="{{ URL('kit/captcha/1') }}" />
                    </div>
                    <button id="login-box" type="button" class="btn-login ajax-submit-btn">立即登陆</button>
                    <button class="btn-reg" type="button" onclick="window.location.href='{{ route('web.register_one') }}'">免费开户</button>
                    <button class="btn-forget" type="button" onclick="window.location.href='{{ $_system_config -> service_link }}'">联系客服</button>

                    {{--<div id="agree" ng-show="loginOver" ng-cloak>
                        {{ trans('welcome.ClickLogintoagree') }}<a ng-click="agreement()">{{ trans('welcome.UserAgreement') }}</a>
                    </div>--}}
                </form>
            </div>
        </div>
        </div>
        </div>
    @else


        <div class="wrapper">

            <div id="account-box" class="login" ng-controller="AccountCtrl" ng-init="$root.user.isLogin=true">
                <ul id="account-info">
                    <li>
                        账号:
                        <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>

                    </li>
                    <li>
                        账户余额 :$
                        <span class="account ng-binding money1" title="{{ $_member -> money }}">{{ $_member -> money }}</span>&nbsp;&nbsp;

                    </li>
                    {{--<li>
                        {{ trans('welcome.gamemoney') }} :$
                        <span class="account" ng-init="$root.wallets.my=0.00" ng-bind="$root.wallets.my | currency" title="{{ trans('welcome.gamemoney') }}"id="gamemoney">0.00</span>
                    </li>--}}
                </ul>

                <ul id="account-nav">
                    @if($_system_config ->is_new_center == 1)
                        <li title="个人中心">
                            <a href="{{ route('member.userCenter') }}">
                                个人中心
                            </a>
                        </li>
                    @else
                        <li title="个人中心">
                            <a href="{{ route('member.userCenter') }}">
                                个人中心
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
                    @endif
                </ul>
                <div id="action-box">
                    <a class="login-btn" href="{{ route('member.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">安全退出</a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endif

    <div id="banner">


        <section id="cuteslider_3_wrapper" class="cs-circleslight" ng-controller="HomeCtrl">
            <div id="slide-banner" ng-controller="LobbiesCtrl">
                <div custom-cuteslider="@{{slideImgs}}" id="cuteslider_3" class="cute-slider" data-width="1920" data-height="500" data-overpause="true">
                    <ul id="imgNames" data-type="slides"></ul>
                    <ul data-type="controls">
                        <li data-type="captions"></li>
                        <li data-type="link"></li>
                        <li data-type="video"></li>
                        <li data-type="slideinfo"></li>
                        <li data-type="circletimer"></li>

                        <li data-type="slidecontrol" data-thumb="true" data-thumbalign="up"></li>
                    </ul>
                </div>
        </section>

    </div>




    <div id="content">
        <div class="content-title">
            <div class="wrapper">

            </div>
        </div>


        <div id="news" popup-news>
            <div class="wrapper" style="height: 45px;color: #fff;">
                <div id="hot-news" style="position: absolute;top: 10px;" news-marquee>
                    <marquee id="mar0" onmouseover="$(this).find('span').css('text-decoration','underline');this.stop()" onmouseout="$(this).find('span').css('text-decoration','none');this.start()" direction="left" scrollamount=3  loop="infinite">
                        @foreach($_system_notices as $v)
                            <span>~{{ $v->title }}~</span>
                            <span>{{ $v->content }}</span>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>




        <div id="home">
            <section class="hot-game wow fadeInUp" ng-controller="LobbiesCtrl" ng-init="show='mg'">
                <div class="wrapper">
                    <div class="slot-slider wow bounceInUp"
                         data-wow-delay="0.3s"
                         carousel-slider
                         super-vis="8"
                         super-play="false"
                         super-effect="leftLoop">
                        <span class="prev"></span>
                        <span class="next"></span>
                        <div class="main-cell">
                            <ul class="slot-list">
                                @if(in_array('MG', $_api_list))
                                <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show == 'mg'}">MG 電子</li>
                                @endif
                                    @if(in_array('PT', $_api_list))
                                <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show == 'pt'}">PT 電子</li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show == 'ag'}">AG 電子</li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show == 'bb'}">BBIN 電子</li>
                                    @endif
                                    @if(in_array('HB', $_api_list))
                                <li game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='hb'" ng-class="{'active': show == 'hb'}">HB 電子</li>
                                    @endif
                                    @if(in_array('MW', $_api_list))
                                <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show == 'mw'}">MW 電子</li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show == 'jdb'}">JDB 電子</li>
                                    @endif
                                    @if(in_array('PP', $_api_list))
                                <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='pp'" ng-class="{'active': show == 'pp'}">PP 電子</li>
                                    @endif
                                    @if(in_array('RT', $_api_list))
                                <li game-box="rt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')" ng-mouseover="show='rt'" ng-class="{'active': show == 'rt'}">RT 電子</li>
                                    @endif
                                    @if(in_array('SG', $_api_list))
                                <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show == 'sg'}">SG 電子</li>
                                    @endif
                                    @if(in_array('GNS', $_api_list))
                                <li game-box="gns" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')" ng-mouseover="show='gns'" ng-class="{'active': show == 'gns'}">GNS 電子</li>
                                    @endif
                                    @if(in_array('ISB', $_api_list))
                                <li game-box="isb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')" ng-mouseover="show='isb'" ng-class="{'active': show == 'isb'}">ISB 電子</li>
                                    @endif
                                {{--<li game-box="fish" ng-click="toFish()" ng-mouseover="show='fish'" ng-class="{'active': show == 'fish'}">{{ trans('welcome.Fish2') }}</li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="slot-game wow bounceInUp" data-wow-delay="0.5s" ng-cloak>
                        @if(in_array('MG', $_api_list))
                        <ul ng-show="show == 'mg'">
                            <li game-box="mg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">不朽的传奇</div></li>
                            <li game-box="mg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">摆脱</div></li>
                            <li game-box="mg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">银行破坏家</div></li>
                            <li game-box="mg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">伴娘我最大</div></li>
                            <li game-box="mg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">黄金工厂</div></li>
                            <li game-box="mg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">女孩与枪</div></li>
                            <li game-box="mg07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">招财鞭炮</div></li>
                            <li game-box="mg08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">美人鱼</div></li>
                        </ul>
                        @endif
                            @if(in_array('PT', $_api_list))
                        <ul ng-show="show == 'pt'">
                            <li game-box="pt01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">犎牛闪电突击</div></li>
                            <li game-box="pt02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">三倍猴子</div></li>
                            <li game-box="pt03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">龙龙龙</div></li>
                            <li game-box="pt04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">古怪猴子</div></li>
                            <li game-box="pt05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">多幅投降21点</div></li>
                            <li game-box="pt06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">高速公路之王</div></li>
                            <li game-box="pt07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">招财童子</div></li>
                            <li game-box="pt08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">职业21点</div></li>
                        </ul>
                            @endif
                            @if(in_array('AG', $_api_list))
                        <ul ng-show="show == 'ag'">
                            <li game-box="ag01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">金拉霸</div></li>
                            <li game-box="ag02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">猛龙传奇</div></li>
                            <li game-box="ag03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">金龙珠</div></li>
                            <li game-box="ag04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">复古花园</div></li>
                            <li game-box="ag05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">麻将老虎机</div></li>
                            <li game-box="ag06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">运财羊</div></li>
                            <li game-box="ag07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">龙凤呈祥</div></li>
                            <li game-box="ag08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">太空漫游</div></li>
                        </ul>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                        <ul ng-show="show == 'bb'">
                            <li game-box="bb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">糖果派对</div></li>
                            <li game-box="bb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">连环夺宝</div></li>
                            <li game-box="bb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">沙滩排球</div></li>
                            <li game-box="bb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">喜福猴年</div></li>
                            <li game-box="bb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">喜福牛年</div></li>
                            <li game-box="bb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">钻石列车</div></li>
                            <li game-box="bb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">三国</div></li>
                            <li game-box="bb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">钻石水果盘</div></li>
                        </ul>
                            @endif
                            @if(in_array('HB', $_api_list))
                        <ul ng-show="show == 'hb'">
                            <li game-box="hb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">发财神</div></li>
                            <li game-box="hb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">鲤鱼门</div></li>
                            <li game-box="hb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">炸弹追击</div></li>
                            <li game-box="hb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">圣诞乐村</div></li>
                            <li game-box="hb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">四大神兽</div></li>
                            <li game-box="hb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">伦敦猎人</div></li>
                            <li game-box="hb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">美国百家乐</div></li>
                            <li game-box="hb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">雷鸟</div></li>
                        </ul>
                            @endif
                            @if(in_array('MW', $_api_list))
                        <ul ng-show="show == 'mw'">
                            <li game-box="mw01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">森林舞会</div></li>
                            <li game-box="mw02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">千炮捕魚</div></li>
                            <li game-box="mw03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">水浒传</div></li>
                            <li game-box="mw04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">水浒英雄</div></li>
                            <li game-box="mw05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">五龙争霸</div></li>
                            <li game-box="mw06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">好运5扑克</div></li>
                            <li game-box="mw07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">黄金777</div></li>
                            <li game-box="mw08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">百家乐</div></li>
                        </ul>
                            @endif
                            @if(in_array('JDB', $_api_list))
                        <ul ng-show="show == 'jdb'">
                            <li game-box="jdb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">龙王捕魚2</div></li>
                            <li game-box="jdb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">龙王捕魚</div></li>
                            <li game-box="jdb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">变脸</div></li>
                            <li game-box="jdb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">金鸡报囍</div></li>
                            <li game-box="jdb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">文房四宝</div></li>
                            <li game-box="jdb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">麻雀无双</div></li>
                            <li game-box="jdb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">悟空</div></li>
                            <li game-box="jdb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">唐伯虎点秋香</div></li>
                        </ul>
                            @endif
                            @if(in_array('PP', $_api_list))
                        <ul ng-show="show == 'pp'">
                            <li game-box="pp01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">88火</div></li>
                            <li game-box="pp02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">发发发龙</div></li>
                            <li game-box="pp03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">野狼黄金</div></li>
                            <li game-box="pp04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">财神黄金</div></li>
                            <li game-box="pp05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">三只老虎</div></li>
                            <li game-box="pp06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">猴子疯狂</div></li>
                            <li game-box="pp07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">古时代宝石</div></li>
                            <li game-box="pp08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">富贵888</div></li>
                        </ul>
                            @endif
                            @if(in_array('RT', $_api_list))
                        <ul ng-show="show == 'rt'">
                            <li game-box="rt01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">淘气的神灯</div></li>
                            <li game-box="rt02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">假面舞会</div></li>
                            <li game-box="rt03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">神秘水果</div></li>
                            <li game-box="rt04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">追击劫匪</div></li>
                            <li game-box="rt05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">矿洞奇遇</div></li>
                            <li game-box="rt06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">澳门赛车</div></li>
                            <li game-box="rt07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">火辣辣</div></li>
                            <li game-box="rt08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')"><div class="text">诺德英雄传</div></li>
                        </ul>
                            @endif
                            @if(in_array('SG', $_api_list))
                        <ul ng-show="show == 'sg'">
                            <li game-box="sg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">发发发</div></li>
                            <li game-box="sg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">一路发发</div></li>
                            <li game-box="sg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">潘金莲特别版</div></li>
                            <li game-box="sg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">齐天大胜</div></li>
                            <li game-box="sg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">森林之王</div></li>
                            <li game-box="sg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">金鸡</div></li>
                            <li game-box="sg07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">财神888</div></li>
                            <li game-box="sg08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">发发发2</div></li>
                        </ul>
                            @endif
                            @if(in_array('GNS', $_api_list))
                        <ul ng-show="show == 'gns'">
                            <li game-box="gns01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">草原争霸战</div></li>
                            <li game-box="gns02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">财神888</div></li>
                            <li game-box="gns03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">钻石暴富王</div></li>
                            <li game-box="gns04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">招福钱龟</div></li>
                            <li game-box="gns05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">星际探索:猎</div></li>
                            <li game-box="gns06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">金龙卷</div></li>
                            <li game-box="gns07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">糖果粉碎大战</div></li>
                            <li game-box="gns08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">大红包</div></li>
                        </ul>
                            @endif
                            @if(in_array('ISB', $_api_list))
                        <ul ng-show="show == 'isb'">
                            <li game-box="isb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">枪手</div></li>
                            <li game-box="isb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">超级现金定时</div></li>
                            <li game-box="isb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">蒙娜丽莎的</div></li>
                            <li game-box="isb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">重赏百万</div></li>
                            <li game-box="isb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">疯狂钻石</div></li>
                            <li game-box="isb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">皇家现金</div></li>
                            <li game-box="isb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">生命之最</div></li>
                            <li game-box="isb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><div class="text">百万分</div></li>
                        </ul>
                            @endif
                        {{--<ul ng-show="show == 'fish'">
                            <li game-box="fish01" ng-click="toBbFish()"><div class="text">捕魚达人</div></li>
                            <li game-box="fish02" ng-click="toBbFish2()"><div class="text">捕魚大师</div></li>
                            <li game-box="fish03" ng-click="toPtFish()"><div class="text">深海大贏家</div></li>
                            <li game-box="fish04" ng-click="toGnsFish()"><div class="text">寻宝捕魚王</div></li>
                            <li game-box="fish05" ng-click="toJdbFish()"><div class="text">龙王捕魚</div></li>
                            <li game-box="fish06" ng-click="toJdbFish2()"><div class="text">龙王捕魚2</div></li>
                            <li game-box="fish07" ng-click="toAgFish()"><div class="text">捕魚王</div></li>
                            <li game-box="fish08" ng-click="toMwFish()"><div class="text">千炮捕魚</div></li>
                        </ul>--}}
                    </div>
                    <div class="winner-list wow bounceInUp" data-wow-delay="0.5s" winner-list vis="6">
                        <ul class="winner-wrapper">
                            <li class="winner-item" ng-repeat="item in winnerList" ng-cloak>
                                <span class="name" ng-bind="item.name"></span>获得奖金<span class="money" ng-bind="item.money"></span>元
                            </li>
                        </ul>
                    </div>
                    <div class="jackpot">
                        CNY <span digital digital-min="8526562" add></span>
                    </div>
                </div>
            </section>

            <div class="wrapper">

                <ul id="game-box" class="wow bounceInUp">
                    <li data-img="live"><a href="{{ route('web.liveCasino') }}"></a></li>
                    <li data-img="sport"><a href="{{ route('web.esports') }}"></a></li>
                    <li data-img="lottery"><a href="{{ route('web.lottory') }}"></a></li>
                </ul>

                <div class="home-mobile">
                    <p><span>{{ $_system_config->site_name }}</span>手机投注平台面向全网玩家，提供万款老虎机，真人，彩票，體育，棋牌投注，线上存取款一键操作，一机在手，随时畅游，娱乐永不断电。</p>
                    <span class="mobile-qr">
                    <img  src="{{ $_system_config->wap_qrcode }}" width="100"/>
                </span>
                </div>
            </div>
        </div>


        <div class="wrapper">




        </div>
    </div>
    <script type='text/javascript' src='/web/mb35/each-site/cute3D/js/modernizr.min.js'></script>
    <script type='text/javascript'>
        var CSSettings = {
            "pluginPath": "/web/mb35/each-site/cute3D"
        };
    </script>
    <script src="/web/mb35/each-site/cute3D/js/cute.slider.js"></script>
    <script src="/web/mb35/each-site/cute3D/js/cute.transitions.all.js"></script>
    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img style="max-width: 100%" src="{{ $_system_config->alert_img }}" alt="">
                </a>
            </div>
        </div>
        <script>
            (function($){
                $(function(){
                    $('#modal-tit').modal();
                })
            })(jQuery);
        </script>
    @endif
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
                        var all = Number($('.money1').text()) + Number(data.data);
                        $('.money1').text('');
                        $('.money1').text(parseInt(all.toFixed(2)));
                    }
                }
            })
        })
        @endif
        @endif
    </script>

@endsection
