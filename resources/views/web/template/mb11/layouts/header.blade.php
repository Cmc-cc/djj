<!--登录模态框-->
<div id="login" class="modal modal-login">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.login.post') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>用户登录</h2>
                <div class="modal-login_line">
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                </div>
                <div class="modal-login_line">
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                </div>
                <!-- <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div> -->
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">登录</button>
                </div>
                <div class="modal-login_link clear">
                    <p class="pullRight">
                        还没有账号？
                        <a href="{{ route('web.register_one') }}">点击注册</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

{{--手机投注模态框--}}
<div id="mobileBet" class="modal modal-mobileBet">
    <div class="modal-content">
        <a href="" class="close bg-icon"></a>
        111
    </div>
</div>

<!--半透明遮罩层-->
<div class="backdrop"></div>


<div class="header">
    <div class="wrap">
        <div class="top">
            <div class="left">
                7X24小时在线电话客服: &nbsp;&nbsp;
                <img src="{{ asset('/web/mb11/images/ph_flag02.png') }}" style="display: inline">
                &nbsp;&nbsp;{{ $_system_config->phone1 }}&nbsp;&nbsp;
                <img src="{{ asset('/web/mb11/images/ph_flag01.png') }}" style="display: inline">
                &nbsp;&nbsp;{{ $_system_config->phone2 }}
            </div>
            <div class="right">
                <a href="javascript:;" class="daili_apply">代理加盟</a>&nbsp;|&nbsp;
                <a href="{{route('daili.init')}}" target="_blank">代理登录</a>&nbsp;|&nbsp;
                <a href="{{ route('web.activityList') }}">在线申请优惠</a>&nbsp;&nbsp;
                <a href="javascript:;" class="rightlink01"></a>
                <a href="javascript:;" class="rightlink02"></a>
                <a href="javascript:;" class="rightlink03"></a>
            </div>
        </div>
        <div class="nav">
            <div class="logo-wrap" style="float: left;">
                <a class="logo" id="logo">
                    <img src="{{ $_system_config->site_logo }}" width="200px" height="85px">
                </a>
            </div>
            {{--<script>--}}
            {{--(function () {--}}
            {{--$(function () {--}}
            {{--var flashvars = {}, attributes = {},--}}
            {{--params = {--}}
            {{--wmode: 'transparent',--}}
            {{--quality: 'high'--}}
            {{--};--}}
            {{--swfobject.embedSWF('media/logo.swf', 'logo', '260', '85', '8.0.35.0', 'media/logo.swf', flashvars, params, attributes);--}}
            {{--});--}}
            {{--})();--}}
            {{--</script>--}}
            <ul class="list">
                <li @if($web_route == 'web.index')class="active"@endif>
                    <a href="{{ route('web.index') }}"><span class="tit">首页</span></a>
                </li>
                <li @if($web_route == 'web.esports')class="active"@endif>
                    <a href="{{ route('web.esports') }}"><span class="tit">體育赛事</span></a>
                    <div class="second-nav">
                        @if(in_array('GJ', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                            >皇冠體育</a>
                        @endif
                            @if(in_array('IBC', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >沙巴體育</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >BBIN體育</a>
                            @endif
                            @if(in_array('NEWBB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >NEWBB體育</a>
                            @endif
                            @if(in_array('AG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >AG體育</a>
                            @endif
                            @if(in_array('ESB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >ESB电竞</a>
                            @endif
                            @if(in_array('AVIA', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >泛亚电竞</a>
                            @endif
                            @if(in_array('HC', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HC&game_type=5','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                >皇朝电竞</a>
                            @endif
                    </div>
                </li>
                <li @if($web_route == 'web.liveCasino')class="active"@endif>
                    <a href="{{ route('web.liveCasino') }}"><span class="tit">視訊直播</span></a>
                    <div class="second-nav">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                        @if(count($live) > 0)
                            @foreach($live as $v)
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>{{ $v['name'] }}</a>
                            @endforeach
                            @endif
                        {{--@if(in_array('AG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AG視訊</a>
                        @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BBIN視訊</a>
                            @endif
                            @if(in_array('BG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BG視訊</a>
                            @endif
                            @if(in_array('SUNBET', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>申博視訊</a>
                            @endif
                            @if(in_array('ALLBET', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>欧博視訊</a>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>SA視訊</a>
                            @endif
                            @if(in_array('GD', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>GD視訊</a>
                            @endif
                            @if(in_array('OG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>OG視訊</a>
                            @endif
                            @if(in_array('DG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>DG視訊</a>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>MG視訊</a>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>PT視訊</a>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>GPI視訊</a>
                            @endif--}}
                    </div>
                </li>
                <li @if($web_route == 'web.eGame')class="active"@endif>
                    <a href="{{ route('web.eGame') }}"><span class="tit">電子游艺</span></a>
                    <div class="second-nav">
                        @if(in_array('PP', $_api_list))
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=PP&game_type=2">PP電子</a>
                        @endif
                            @if(in_array('CQ9', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=CQ9&game_type=2">CQ9電子</a>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MW&game_type=2">MW電子</a>
                            @endif
                            @if(in_array('SG', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SG&game_type=2">SG電子</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=2">JDB電子</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=FG&game_type=2">FG電子</a>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SA&game_type=2">SA電子</a>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=PT&game_type=2">PT電子</a>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MG&game_type=2">MG電子</a>
                            @endif
                            @if(in_array('AG', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=AG&game_type=2">AG電子</a>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=GPI&game_type=2">GPI電子</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=2">BBIN電子</a>
                            @endif
                            @if(in_array('QT', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=QT&game_type=2">QT電子</a>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SW&game_type=2">SW電子</a>
                            @endif
                            @if(in_array('BNG', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=BNG&game_type=2">BNG電子</a>
                            @endif
                    </div>
                </li>
                <li @if($web_route == 'web.catchFish')class="active"@endif>
                    <a href="{{ route('web.catchFish') }}">
                        <span class="tit">捕魚游戏</span>
                    </a>
                    <div class="second-nav">
                        @if(in_array('AG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                AG捕魚王</a>
                        @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    BB捕魚达人</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    BB捕魚大师</a>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    MW千炮捕魚</a>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    SA鱼乐无穷</a>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    CQ9皇金渔场</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    JDB财神捕魚</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    FG欢乐捕魚</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    JDB龙王捕魚</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    JDB龙王捕魚2</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    FG美人捕魚</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    FG捕魚嘉年华</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    FG天天捕魚</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    FG雷霆战警</a>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6&game_code=AD01','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    CQ9捕魚去喽</a>
                            @endif
                            @if(in_array('MT', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    MT李逵捕魚</a>
                            @endif
                            @if(in_array('MT', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0045','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    MT金蟾捕魚</a>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=cashfi','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    PT深海大赢家</a>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    SW捕魚多福</a>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&game_code=sw_fuqsg','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    SW福气水果</a>
                            @endif
                    </div>
                </li>

                <li @if($web_route == 'web.lottory')class="active"@endif>
                    <a href="{{ route('web.lottory') }}">
                        <span class="tit">彩票游戏</span>
                    </a>
                    <div class="second-nav">
                        <?php
                            $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                        @foreach($lottery as $v)
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                {{ $v['name'] }}
                            </a>
                        @endforeach

                    </div>
                </li>
                <li @if($web_route == 'web.poker')class="active"@endif>
                    <a href="{{ route('web.poker') }}">
                        <span class="tit">棋牌游戏</span>
                    </a>
                    <div class="second-nav">
                        <?php
                            $poker = (new \App\Http\Controllers\Wap\AjaxController())->getGames('poker');
                        ?>
                        @foreach($poker as $v)
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}">{{ $v['name'] }}</a>
                        @endforeach
                        {{--@if(in_array('MT', $_api_list))
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MT&game_type=7">美天棋牌</a>
                        @endif
						@if(in_array('FG', $_api_list))
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=FG&game_type=7">FG棋牌</a>
                        @endif
						@if(in_array('AP', $_api_list))
                                <a target="_blank" href="{{ route('game.playGame') }}?plat_type=AP&game_type=7">爱棋牌</a>
						@endif
                        @if(in_array('LEG', $_api_list))
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=LEG&game_type=7">LEG棋牌</a>
                        @endif
						@if(in_array('VG', $_api_list))
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=VG&game_type=7">VG棋牌</a>
                        @endif
						@if(in_array('KY', $_api_list))
                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=KY&game_type=7">开元棋牌</a>
                        @endif--}}
                    </div>
                </li>
                <li @if($web_route == 'web.activityList')class="active"@endif>
                    <a href="{{ route('web.activityList') }}" class="activity">
                        <span class="tit">优惠活动</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $_system_config->app_link }}" target="_blank">
                        <span class="tit">手机下注</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        <span class="tit">在线客服</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

@if($web_route != 'web.index')
    @if (Auth::guard('member')->guest())
        <div class="login-wrap pngfix">
            <div class="login-wrap-inner">
                <form method="POST" action="{{ route('member.login.post') }}" style="overflow: hidden">
                    <p class="login-unit login-unit-user floatL">
                        {{--<label for="username" class="login-placeholder">帐号</label>--}}
                        <input type="text" size="12" id="username" title="请填写 7-12 位大小写英数字" maxlength="12"
                               class="login-input" name="name" placeholder="账号">
                    </p>
                    <p class="login-unit login-unit-pwd floatL">
                        {{--<label for="passwd" class="login-placeholder">密码</label>--}}
                        <input type="password" size="12" id="passwd" title="请填写 6-12 位大小写英数字" maxlength="12"
                               class="login-input" name="password" placeholder="密码">
                    </p>
                    <p class="login-unit login-unit-chk floatL">
                        {{--<label for="rmNum" class="login-placeholder">验证码</label>--}}
                        <input type="text" size="12" id="rmNum" title="验证码" maxlength="4" class="login-input"
                               name="captcha" placeholder="验证码">
                        <a class="vPic" onclick="javascript:re_captcha();"><img src="{{ URL('kit/captcha/1') }}"
                                                                                id="c2c98f0de5a04167a9e427d883690ff6"></a>
                        <script>
                            function re_captcha() {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                            }
                        </script>
                    </p>
                    <p class="login-unit-btn floatL">
                        <input type="button"
                               class="login-submit button floatL pngfix modal-login_submit ajax-submit-btn"
                               tabindex="4">
                        <a href="" class="joinus-btn link inline-block">加入会员</a>
                        <a href="" class="forget-btn link inline-block">忘记密码</a>
                    </p>
                </form>
            </div>
        </div>
    @else
        <div class="loginInfo-wrap pngfix">
            <div class="loginInfo-wrap-inner">
                <div class="mem-info floatL">
                    <div class="ele-accinfo ele-acc-name">
                        <span>帐号：</span>
                        <strong>{{ $_member->name }}</strong>
                    </div>
                    <div class="ele-acc-unit">
                        <div id="_bbsportBalance" class="ele-accinfo ele-first-balance">
                            <span>账户余额：</span>
                            <strong class="money">{{ $_member->money }}</strong>
                        </div>
                    </div>
                </div>
                <div class="SU-Menual floatL">
                    <ul class="login-Menual">
                        @if($_system_config->is_new_center == 1)
                            <li>
                                <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|&nbsp;
                            </li>
                        @else

                        <li>
                            <a href="{{ route('member.customer_report') }}">下注记录</a>&nbsp;|&nbsp;
                        </li>
                        <li>
                            <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|&nbsp;
                        </li>
                        <li>
                            <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|&nbsp;
                        </li>
                        <li>
                            <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|&nbsp;
                        </li>
                        <li>
                            <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;|&nbsp;
                        </li>
                        @endif
                        <li>
                            <a class="logoutbtn quit_btn" href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endif

<div class="hb_in">
    <a href="{{route('web.red')}}" target="_blank">
        <img src="{{ asset('/web/images/hb_in.png') }}" alt="">
    </a>
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
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));

                    $('#money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
    @endif
</script>
