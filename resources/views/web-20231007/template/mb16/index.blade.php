@extends('web.template.mb16.layouts.main')
@section('after.js')
    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img src="{{ $_system_config->alert_img }}" alt="">
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
@endsection
@section('content')
    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img src="{{ $_system_config->alert_img }}" alt="">
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

    <div class="indexbanner">
        <div class="lunbo" style="overflow: hidden;">
            <div class="hd">
                <ul>
                    @foreach($banners as $item)
                        <li></li>
                    @endforeach
                    {{--<li class="on"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>--}}
                </ul>
            </div>
            <div class="bd">
                <ul>
                    {{--@foreach($banners as $item)--}}
                        {{--<li><a href="#"><img class="carousel-inner" src="{{ $item->path }}"></a>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                    {{--<li><a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/banner01.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img
                                    src="{{ asset('/web') }}/mb16/images/banner02.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img
                                    src="{{ asset('/web') }}/mb16/images/banner03.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/banner04.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/banner05.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img
                                    src="{{ asset('/web') }}/mb16/images/banner06.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img
                                    src="{{ asset('/web') }}/mb16/images/banner07.jpg"></a></li>--}}

                    @foreach($banners as $item)
                    <li @if(!$loop->first)style="display: none;"@endif>
                        <a href="{{$item->jumpurl}}" target="_blank">
                            <img src="{{$item->path}}">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
        </div>
    </div>

    <div class="download-center">
        <div class="wrap con">
            <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="left" scrollamount=3
                     loop="infinite">
                @foreach($_system_notices as $v)
                    <a href="javascript:;">
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    </a>
                @endforeach
            </marquee>
            <div class="topgirl">
                <img src="{{ asset('/web') }}/mb16/images/girl01.png">
            </div>
            <ul class="downlist">
                <li class="download01">
                    <a href="javascript:;">
                        <div class="img"></div>
                        <h3>下载中心</h3>
                        <h2>Download</h2>
                    </a>
                </li>
                <li class="download02">
                    <a href="javascript:;">
                        <div class="imgicon"><img src="{{ asset('/web') }}/mb16/images/downicon1.png"></div>
                        <h3>PT客户端</h3>
                        <h2>下载</h2>
                    </a>
                </li>
                <li class="download03">
                    <a href="{{ route('web.register_one') }}">
                        <div class="imgicon"><img src="{{ asset('/web') }}/mb16/images/downicon2.png"></div>
                        <h3>立即注册</h3>
                        <h2>新手注册送好礼</h2>
                    </a>
                </li>
                <li class="download04">
                    <a href="{{ route('web.activityList') }}">
                        <div class="imgicon"><img src="{{ asset('/web') }}/mb16/images/downicon3.png"></div>
                        <h3>新手礼包</h3>
                        <h2>新会员礼包</h2>
                    </a>
                </li>
                <li class="download05">
                    <a href="{{ route('web.activityList') }}">
                        <div class="imgicon"><img src="{{ asset('/web') }}/mb16/images/downicon4.png"></div>
                        <h3>优惠活动</h3>
                        <h2>优惠活动</h2>
                    </a>
                </li>
                <li class="download06">
                    <a href="javascript:;" class="daili_apply">
                        <div class="imgicon"><img src="{{ asset('/web') }}/mb16/images/downicon5.png"></div>
                        <h3>代理加盟</h3>
                        <h2>业界首创日结工资</h2>
                    </a>
                </li>
                <li class="download07">
                    <a href="javascript:;">
                        <h3>PT老虎机累计奖池</h3>
                        <div class="price num" id="j-jackpot">301,518,240.31</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="top-game">
        <div class="wrap con">
            <div class="left">
                <div class="slot-machine">
                    <ul class="gamelist">
                        @if(in_array('PP', $_api_list))
                            <li class="gamelist01">
                                <a href="/pp/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>PP</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('CQ9', $_api_list))
                            <li class="gamelist03">
                                <a href="/cq9/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>CQ9</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('PG', $_api_list))
                            <li class="gamelist04">
                                <a href="/pg/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>PG</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('SG', $_api_list))
                            <li class="gamelist05">
                                <a href="/sg/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>SG</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('JDB', $_api_list))
                            <li class="gamelist02">
                                <a href="/jdb/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>JDB</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('HB', $_api_list))
                            <li class="gamelist06">
                                <a href="/hb/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>HB</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('SA', $_api_list))
                            <li class="gamelist07">
                                <a href="/sa/playGame?gamename=MyGameLobby" target="_blank">
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>SA</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                    </ul>
                    <div class="bot">
                        <div class="left">
                            <h3>老虎机</h3>
                            <p class="eng">Slot Machine</p>
                        </div>
                        <div class="right">
                            @if(in_array('PT', $_api_list))
                                <a href="/pt/playGame?gamename=MyGameLobby" target="_blank">PT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('MG', $_api_list))
                                <a href=/mg/playGame?gamename=MyGameLobby" target="_blank">MG</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('AG', $_api_list))
                                <a href="/ag/playGame?gamename=MyGameLobby" target="_blank">AG</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('RT', $_api_list))
                                <a href="/rt/playGame?gamename=MyGameLobby" target="_blank">RT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="/bbin/playGame?gamename=MyGameLobby" target="_blank">BBIN</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('QT', $_api_list))
                                <a href="/qt/playGame?gamename=MyGameLobby" target="_blank">QT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('VT', $_api_list))
                                <a href="/vt/playGame?gamename=MyGameLobby" target="_blank">VT</a>&nbsp;|&nbsp;&nbsp;
                            @endif
                            @if(in_array('BOG', $_api_list))
                                <a href="/bog/playGame?gamename=MyGameLobby" target="_blank">BNG</a>
                            @endif
                        </div>
                    </div>
                    <div class="bg"><img src="{{ asset('/web') }}/mb16/images/lhj-bg.jpg"></div>
                </div>
                <!--end-->
                <div class="slot-machine casio-game">
                    <ul class="gamelist">
                        @if(in_array('AG', $_api_list))
                            <li class="gamelist01">
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>AG</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li class="gamelist02">
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=live','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>BBIN</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('BG', $_api_list))
                            <li class="gamelist03">
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=2','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>BG</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                        @if(in_array('SUNBET', $_api_list))
                            <li class="gamelist03">
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SUNBET','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    <span class="icon"></span>
                                    <dl>
                                        <dt>SUNBET</dt>
                                        <dd>进入游戏</dd>

                                        <dd>手机版</dd>
                                    </dl>
                                </a>
                            </li>
                        @endif
                            @if(in_array('AB', $_api_list))
                                <li class="gamelist03">
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AB','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        <span class="icon"></span>
                                        <dl>
                                            <dt>AB</dt>
                                            <dd>进入游戏</dd>

                                            <dd>手机版</dd>
                                        </dl>
                                    </a>
                                </li>
                            @endif
                            @if(in_array('MX', $_api_list))
                                <li class="gamelist03">
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MX','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        <span class="icon"></span>
                                        <dl>
                                            <dt>MX</dt>
                                            <dd>进入游戏</dd>

                                            <dd>手机版</dd>
                                        </dl>
                                    </a>
                                </li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li class="gamelist03">
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        <span class="icon"></span>
                                        <dl>
                                            <dt>SA</dt>
                                            <dd>进入游戏</dd>

                                            <dd>手机版</dd>
                                        </dl>
                                    </a>
                                </li>
                            @endif
                    </ul>
                    <div class="bot">
                        <div class="left">
                            <h3>真人娱乐</h3>
                            <p class="eng">Casino</p>
                        </div>
                        <div class="right">
                            @if(in_array('GD', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GD','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                GD厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                                @if(in_array('OG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=OG','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        OG厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('DG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DG','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        DG厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('IGZR', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IGZR','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        IG厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('WM', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WM','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                        WM厅</a>
                                @endif
                        </div>
                    </div>
                    <div class="bg"><img src="{{ asset('/web') }}/mb16/images/zhenren.jpg"></div>
                </div>
                <!--end-->
                <div class="slot-machine fish-game">
                    <ul class="gamelist">
                            @if(in_array('AG', $_api_list))
                                <li class="gamelist01">
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=6','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                        <span class="icon"></span>
                                        <dl>
                                            <dt>AG捕鱼王</dt>
                                            <dd>进入游戏</dd>

                                            <dd>手机版</dd>
                                        </dl>
                                    </a>
                                </li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="gamelist01">
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=30599','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                        <span class="icon"></span>
                                        <dl>
                                            <dt>BB捕鱼达人</dt>
                                            <dd>进入游戏</dd>

                                            <dd>手机版</dd>
                                        </dl>
                                    </a>
                                </li>
                            @endif
                                @if(in_array('BBIN', $_api_list))
                                    <li class="gamelist01">
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                            <span class="icon"></span>
                                            <dl>
                                                <dt>BB捕鱼大师</dt>
                                                <dd>进入游戏</dd>

                                                <dd>手机版</dd>
                                            </dl>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array('PG', $_api_list))
                                    <li class="gamelist01">
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&game_type=4001','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                            <span class="icon"></span>
                                            <dl>
                                                <dt>PG鱼王争霸</dt>
                                                <dd>进入游戏</dd>

                                                <dd>手机版</dd>
                                            </dl>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <li class="gamelist01">
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=FishermenGold','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                            <span class="icon"></span>
                                            <dl>
                                                <dt>SA捕鱼达人</dt>
                                                <dd>进入游戏</dd>

                                                <dd>手机版</dd>
                                            </dl>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array('CQ9', $_api_list))
                                    <li class="gamelist01">
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=AB3','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                            <span class="icon"></span>
                                            <dl>
                                                <dt>CQ9皇金渔场</dt>
                                                <dd>进入游戏</dd>

                                                <dd>手机版</dd>
                                            </dl>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <li class="gamelist01">
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>
                                            <span class="icon"></span>
                                            <dl>
                                                <dt>JDB财神捕鱼</dt>
                                                <dd>进入游戏</dd>

                                                <dd>手机版</dd>
                                            </dl>
                                        </a>
                                    </li>
                                @endif


                    </ul>
                    <div class="bot">
                        <div class="left">
                            <h3>捕鱼游戏</h3>
                            <p class="eng">Fishing Game</p>
                        </div>
                        <div class="right">
                            @if(in_array('PG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=4004','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                >PG全民捕鱼</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            @endif
                                @if(in_array('JDB', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7001','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >JDB龙王捕鱼</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7002','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >JDB龙王捕鱼2</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                               @if(in_array('FG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_mm','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >FG美人捕鱼</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_3D','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >FG捕鱼嘉年华</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_tt','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >FG天天捕鱼</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_bn','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >FG捕鸟达人</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                @endif
                                @if(in_array('FG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_zj','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif
                                    >FG雷霆战警</a>
                                @endif

                        </div>
                    </div>
                    <div class="bg"><img src="{{ asset('/web') }}/mb16/images/buyu1.jpg"></div>
                </div>
            </div>
            <!--end-->
        </div>

        <div class="left pe-game">
            <div class="shadow">
                <ul>
                    <li>
                        <div class="title">
                            体育投注
                            <p class="eng">Bet Sports</p>
                        </div>
                        <div class="btn"><a href="{{ route('web.esports') }}" class="hvr-radial-out">立即投注</a></div>
                    </li>
                    {{--<li>--}}
                        {{--<p class="line">推荐球赛（滚球）</p>--}}
                        {{--<p class="line">9月5号：得过VS挪威</p>--}}
                        {{--<p class="line">9月5号：因格兰vs斯洛伐克</p>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<div class="title">--}}
                            {{--体育投注--}}
                            {{--<p class="eng">Bet Sports</p>--}}
                        {{--</div>--}}
                        {{--<div class="btn"><a href="javascript:;" class="hvr-radial-out">立即观看</a></div>--}}
                    {{--</li>--}}
                </ul>
            </div>
            <div class="tit">体育游戏</div>
            <div class="team-name">BBIN体育</div>
            <div class="game-num">沙巴体育</div>

            <div class="bg"><img src="{{ asset('/web') }}/mb16/images/sport-bg.jpg"></div>
        </div>
    </div>
    <div class="service">
        <div class="wrap">
            <dl>
                <dt>产品优势</dt>
                <dd>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/left01.jpg" class="img"></a>
                    <div class="text">
                        <h4>七大老虎机</h4>
                        <p class="details">各款游戏任您选择，千万等您来爆</p>
                    </div>
                </dd>
                <dd>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/left02.jpg" class="img"></a>
                    <div class="text">
                        <h4>真人视讯</h4>
                        <p class="details">高清晰线上娱乐，让您身临其境</p>
                    </div>
                </dd>
                <dd>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/left03.jpg" class="img"></a>
                    <div class="text">
                        <h4>体育投注</h4>
                        <p class="details">最新芡亚视角，平台上万盘中供您选择</p>
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>在线服务</dt>
                <dd>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/md01.jpg" class="img"></a>
                    <div class="text">
                        <h4>在线客服</h4>
                        <p class="details">
                            有任何问题，请
                            <a class="service-btn" href="javascript:;"
                               onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">点击这里</a>
                        </p>
                    </div>
                </dd>
                <dd>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb16/images/md02.jpg" class="img"></a>
                    <div class="text">
                        <h4>客服邮箱</h4>
                        <p class="details">{{ $_system_config->qq}}@qq.com</p>
                    </div>
                </dd>
                {{--<dd>--}}
                    {{--<a href="javascript:;"><img src="{{ asset('/web') }}/images/md03.jpg" class="img"></a>--}}
                    {{--<div class="text">--}}
                        {{--<h4>微信客服</h4>--}}
                        {{--<p class="details">扫描关注微信客服>></p>--}}
                    {{--</div>--}}
                    {{--<img src="{{ asset('/web') }}/images/" class="ercode-pic">--}}
                {{--</dd>--}}
            </dl>
            <dl class="advantage">
                <dt>服务优势</dt>
                <dd>
                    <div class="module">
                        <div class="title">存款</div>
                        <p>平均时间1.25分钟</p>
                        <div class="line"><span class="line-grocess" style="width: 70px"></span></div>
                    </div>
                    <div class="module">
                        <div class="title">取款</div>
                        <p>平均时间1.05分钟</p>
                        <div class="line"><span class="line-grocess" style="width: 30px"></span></div>
                    </div>
                    <p class="tips">*以上存款提款平均时间仅供参考。</p>
                    <p class="tips">*银行维护期间除外，详情请咨询在线客服。</p>
                </dd>
            </dl>
        </div>
    </div>

    <script type="text/javascript">
        (function ($) {
            $(function () {
                //count
                setJackpot();
                jQuery(".lunbo").slide({
                    mainCell: ".bd ul",
                    autoPlay: true,
                    trigger: "click",
                    delayTime: 2000,
                    interTime: 5000
                });
                jQuery(".game-slide").slide({titCell: ".game-top a", mainCell: ".game-bd", trigger: "click"});
                jQuery(".news-tab").slide({titCell: ".news-head a", mainCell: ".news-bd"});
                jQuery(".news-prize").slide({
                    mainCell: ".infoList",
                    autoPlay: true,
                    effect: "topMarquee",
                    vis: 3,
                    interTime: 50
                });
            });
        })(jQuery);
    </script>
@endsection
