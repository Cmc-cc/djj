@extends('web.template.mb12.layouts.main')
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


    <div class="swiper-container">
        <div class="swiper-wrapper">
            {{--<div class="swiper-slide"><a href="#"><img src="{{ asset('/web') }}/mb12/images/02.jpg"></a></div>
            <div class="swiper-slide"><a href="#"><img src="{{ asset('/web') }}/mb12/images/03.jpg"></a></div>
            <div class="swiper-slide"><a href="#"><img src="{{ asset('/web') }}/mb12/images/04.jpg"></a></div>--}}
            @foreach($banners as $item)
                <div class="swiper-slide"><a  target="_blank" href="{{$item->jumpurl}}"><img src="{{$item->path}}"></a></div>
                @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="game-center">
        <div class="top-bg"></div>
        <div class="con">
            <div class="wrap">
                <ul class="top">
                    @if(in_array('MG', $_api_list))
                    <li class="active">
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/mg.png"><p class="tit">MG電子</p></a>
                    </li>
                    @endif
                        @if(in_array('PT', $_api_list))
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/pt.png"><p class="tit">PT電子</p></a>
                    </li>
                        @endif
                        @if(in_array('AG', $_api_list))
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/ag.png"><p class="tit">AG電子</p></a>
                    </li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/bb.png"><p class="tit">BBIN電子</p></a>
                    </li>
                        @endif
                        @if(in_array('MW', $_api_list))
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/mw.png"><p class="tit">MW電子</p></a>
                    </li>
                        @endif
                        @if(in_array('GPI', $_api_list))
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/gpi.png"><p class="tit">GPI電子</p></a>
                    </li>
                        @endif
                        @if(in_array('PP', $_api_list))
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web') }}/mb12/images/prg.png"><p class="tit">PP電子</p></a>
                    </li>
                        @endif
                </ul>
                <div class="bot">
                    <div class="left module">
                        <ul>
                            @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game01.png"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game02.png"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game03.png"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game04.png"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game05.png"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game06.png"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game07.png"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/game08.png"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                        <ul class="hide">
                            @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt01.png"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt02.png"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt03.png"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt04.png"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt05.png"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt06.png"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt07.png"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pt&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/pt08.png"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                        <ul class="hide">
                            @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag01.jpg"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag02.jpg"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag03.jpg"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag04.jpg"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag05.jpg"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag06.jpg"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag07.jpg"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=ag&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/ag08.jpg"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                        <ul class="hide">
                            @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb01.png"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb02.png"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb03.png"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb04.png"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb05.png"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb06.png"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb07.png"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=bbin&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/bb08.png"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                        <ul class="hide">
                            @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw01.png"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw02.png"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw03.png"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw04.png"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw05.png"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw06.png"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw07.png"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=mw&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/mw08.png"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                        <ul class="hide">
                            @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi01.png"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi02.png"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi03.png"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi04.png"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi05.png"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi06.png"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi07.png"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=gpi&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gpi08.png"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                        <ul class="hide">
                            @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns01.png"></div>
                                    <div class="title">
                                        <div class="left">不朽的传奇</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns02.png"></div>
                                    <div class="title">
                                        <div class="left">摆脱</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns03.png"></div>
                                    <div class="title">
                                        <div class="left">银行破坏家</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns04.png"></div>
                                    <div class="title">
                                        <div class="left">伴娘我最大</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns05.png"></div>
                                    <div class="title">
                                        <div class="left">黄金工厂</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns06.png"></div>
                                    <div class="title">
                                        <div class="left">女孩与抢</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns07.png"></div>
                                    <div class="title">
                                        <div class="left">招财鞭炮</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li>
                                <a href="{{ route('game.playGame') }}?plat_type=pp&game_type=2" target="_blank">
                                    <div class="top"><img src="{{ asset('/web') }}/mb12/images/gns08.png"></div>
                                    <div class="title">
                                        <div class="left">美人鱼</div>
                                        <div class="right star">★★★★★</div>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                    </div>
                    <div class="right prize-list">
                        <div class="txtMarquee-top">
                            <div class="bd">
                                <ul class="infoList">
                                    <li><span class="user">23**45</span>获得奖金<span class="mondy">2584**</span>元</li>
                                    <li><span class="user">aa**86</span>获得奖金<span class="mondy">658**</span>元</li>
                                    <li><span class="user">hn**sg</span>获得奖金<span class="mondy">9542**</span>元</li>
                                    <li><span class="user">w**t8</span>获得奖金<span class="mondy">1325**</span>元</li>
                                    <li><span class="user">y5**6g</span>获得奖金<span class="mondy">4856**</span>元</li>
                                    <li><span class="user">s32**ss</span>获得奖金<span class="mondy">8521**</span>元</li>
                                    <li><span class="user">ww**yh5</span>获得奖金<span class="mondy">9654**</span>元</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function($){
            $(function(){
                var swiper = new Swiper('.swiper-container', {
                    pagination: '.swiper-pagination',
                    paginationClickable: true,
                    effect:'fade',
                    autoplay : 3000,
                    loop : true
                });

                $(".txtMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:6,interTime:100,trigger:"hover"});
            })
        })(jQuery);
    </script>
@endsection
