<link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
<script src="/new0404/js/jquery.min.js"></script>
<div class="header-top">
    <div class="main clear">
        <span class="now-time" id="now-time"></span>
        @if (!Auth::guard('member')->guest())
             <div class="fright">
                <div class="login-area">
                    <form id="loginForm2" oncontextmenu="return false;">
                        <div class="preson-info">
                            <span class="info"> <i class="icon icon-acc-person"> </i>
                                <a href="#" class="text_656">：<i class="fa fa-user"></i> {{ $_member->name }}</a>
                                <span class="info info-balance"> <i class="icon icon-acc-balance"></i>
                                    <a href="#"  class="text_655">：{{ $_member->money }}<g class="btn-refreshS" id="run"></g></a>
                                </span>
                            </span>
                        </div>
                        <div class="acc-links fleft mleft">
                            <a class="btn btn-navacc btn-navacc-center text_27" href="/member/userCenter"></a>
                            <a class="btn btn-navacc btn-navacc-deposit text_657" href="{{ route('member.update_bank_info') }}"></a>
                            <a class="btn btn-navacc btn-navacc-deposit text_658" href="{{ route('member.finance_center') }}"></a>
                            <a class="btn btn-navacc btn-navacc-news text_659" href="/member/service_center"></a>
                            <a class="btn btn-navacc btn-navacc-transfer text_122" href="/member/acc-transfer"></a>
                            <a class="btn btn-navacc btn-navacc-mail text_661" href="/member/message_list"></a>
                            <a id="logout" class="btn btn-login-out text_123"  href="{{ route('member.logout') }}"
                               onclick="document.getElementById('logout-form').submit();"></a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                            <div class="lang-box">
                                <a class="lang-on">
                                    <i class="icon flag-icon-tw" style="display: block;"></i>
                                    <i class="icon flag-icon-en" style="display: none;"></i>
                                    <i class="icon flag-icon-th" style="display: none;"></i>
                                </a>
                                <ul class="lang-select commonlist">
                                    <li>
                                        <a id="tw" class="btn">
                                            <i class="icon flag-icon lang_tw" style="display: none;"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="en" class="btn">
                                            <i class="icon flag-icon lang_en" style="display: none;"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="th" class="btn"> <i class="icon flag-icon lang_th" style="display: none;"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="fright">
                <div class="login-area">
                    <form id="loginForm" oncontextmenu="return false;">
                  
							
							<!--<input type="text" id="name" name="name" placeholder="帳號"  class="input_tip">
                        <input type="password" id="password"  name="password" placeholder="密碼"   class="form-underline">
                        <input type="test" id="captcha" name="captcha" placeholder="驗證碼" class="input_tip input_tip_45">
                         <img id="verifi"  src="{{ URL('kit/captcha/1') }}">
                            <a class="ReCode"><img onclick="javascript:re_captcha();" id="img" src="../new0404/pc/images/recode.png"  style="width:40px;"></a>-->
							<div style=" width:350px; float: left; height:15px;"></div>
							
                        <script>
                            function re_captcha() {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('verifi').src = $url;
                            }
                        </script>
                            <a id="login" style="font-size: 12px;" class="btn-member" href="/l" oncontextmenu="return false;">立即登入</a>
                             <a id="login" style="font-size: 12px;" class="btn-member" href="/r">立即註冊</a>
                            <a class="text_115" data-toggle="cs" style="color: #059C74;"   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')" oncontextmenu="return false;"></a>
                         
						 
						 <div class="lang-box">
                            <a class="lang-on" oncontextmenu="return false;">
                                <i class="icon flag-icon-tw"class="icon flag-icon-en" style="display: none;"></i>
                                <i class="icon flag-icon-th"   style="display: none;"></i>
                            </a>
                            <ul class="lang-select commonlist">
                                <li>
                                    <a id="tw" class="btn" oncontextmenu="return false;">
                                        <i class="icon flag-icon lang_tw" style="display: none;"></i>
                                    </a>
                                </li>
                                <li>
                                    <a id="en" class="btn" oncontextmenu="return false;">
                                        <i class="icon flag-icon lang_en" style="display: none;"></i>
                                    </a>
                                </li>
                                <li>
                                    <a id="th" class="btn" oncontextmenu="return false;">
                                        <i class="icon flag-icon lang_th" style="display: none;"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="header">
    <div class="main">
        <div class="header-main clear">
            <div class="menu">
                <ul class="menu-list-box">
                    <a href="/" class="logo"
                       oncontextmenu="return false;"></a>
                    <li id="btn-menu-casino"><a href="/liveCasino" oncontextmenu="return false;">
                            <div class="text_13"></div>
                            <span>Live Casino</span></a>
                        <ul class="menu-sub-list">
                            <li groupid="114" class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="OB">
                                <a groupid="114" gamename="EVO" gametype=""  oncontextmenu="return false;">
                                    <div class="icon c-i9"></div>
                                    <span class="">OB视讯</span></a>
                            </li>
                            <li groupid="114" class="toplay" @if($_member) data-url="/game/playGame?plat_type=EVO&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="EVO">
                                <a groupid="114" gamename="EVO" gametype=""  oncontextmenu="return false;">
                                    <div class="icon c-9"></div>
                                    <span class="">EVO真人</span></a>
                            </li>
                            <li groupid="70" class="toplay" @if($_member) data-url="/game/playGame?plat_type=DG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="DG">
                                <a groupid="70" class="openGame" gamename="DG" gametype="1"  oncontextmenu="return false;">
                                    <div class="icon c-8"></div>
                                    <span >DG真人</span></a>
                            </li>
 
                            <li groupid="105" class="toplay" @if($_member) data-url="/game/playGame?plat_type=WM&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="WM">
                                <a groupid="105" class="openGame" gamename="WMHILL" gametype="7" oncontextmenu="return false;">
                                    <div class="icon c-1"></div>
                                    <span>WM真人</span></a>
                            </li>
                                    
                            <li groupid="113" class="toplay" @if($_member) data-url="/game/playGame?plat_type=SEXY&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="SEXY">
                                <a groupid="113" gamename="SEXYLIVE" gametype="LIVE"
                                                 gameid="SEXYBCRT" 
                                                 oncontextmenu="return false;">
                                    <div class="icon c-i10"></div>
                                    <span>SEXY真人</span>
                                </a>
                            </li>
                            <li groupid="4" class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="BBIN">
                                <a groupid="4" class="openGame" gamename="BBIN" gametype="FT" oncontextmenu="return false;">
                                    <div class="icon BBIN"></div>
                                    <span>BBIN真人</span></a>
                            </li>
                        </ul>
                    </li>
                    <li id="chess"><a href="/poker" oncontextmenu="return false;">
                            <div class="text_101"></div>
                            <span>Chess game</span></a>
                        <ul class="menu-sub-list">

                            <li groupid="132" class="toplay" @if($_member) data-url="api/gamelist?api_code=BL&game_type=6&devices=1" @else data-url="" @endif data-code="BL">
                                <a groupid="132" class="openGame" gamename="BOLE" ui="1" >
                                    <div class="icon s-15"></div>
                                    <span>博樂棋牌</span>
                                </a>
                            </li>
                            <li groupid="60" class="toplay" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=6&game_code=&devices=1" @else data-url="" @endif data-code="KY">
                                <a groupid="60" class="openGame" gamename="KAIYUAN" gametype="0" >
                                    <div class="icon s-7"></div>
                                    <span class="text_102"></span>
                                </a>
                            </li>
                            
                            <li groupid="72" class="toplay" @if($_member) data-url="/game/playGame?plat_type=LEG&game_type=6&game_code=&devices=1" @else data-url="" @endif data-code="LEG">
                                <a groupid="72" class="openGame" gamename="LEG" gametype="0" >
                                    <div class="icon s-10"></div>
                                    <span class="text_751"></span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li id="slotgame"><a href="/eGame" oncontextmenu="return false;">
                            <div class="text_652"></div>
                            <span>Slot game</span></a>
                        <ul class="menu-sub-list">
                            
                            <li groupid="43" class="toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="JDB">
                                <a groupid="43"  oncontextmenu="return false;">
                                    <div class="icon g-6"></div>
                                    <span class="text_88"></span></a>
                            </li>
                            <li groupid="54" class="toplay" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="CQ9">
                                <a groupid="54"  oncontextmenu="return false;">
                                    <div class="icon g-12"></div>
                                    <span class="text_96"></span>
                                </a>
                            </li>
                            <li groupid="4" class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="BBIN">
                                <a groupid="4" class="openGame"
                                                                      gamename="BBIN" gametype="FT" oncontextmenu="return false;">
                                    <div class="icon BBIN"></div>
                                    <span >BBIN电子</span>
                                </a>
                            </li> 
                            <li groupid="37"  class="toplay" @if($_member) data-url="/game/playGame?plat_type=PNG&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="PNG">
                                <a groupid="37" oncontextmenu="return false;">
                                    <div class="icon g-5"></div>
                                    <span>PNG电子</span>
                                </a>
                            </li>
                            <li groupid="44" class="toplay" @if($_member) data-url="/game/playGame?plat_type=PG&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="PG">
                                <a groupid="44" oncontextmenu="return false;">
                                    <div class="icon g-7"></div>
                                    <span>PG电子</span>
                                </a>
                            </li>
                            <li groupid="53" class="toplay" @if($_member) data-url="/game/playGame?plat_type=PP&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="PP">
                                <a groupid="53" oncontextmenu="return false;">
                                    <div class="icon g-11"></div>
                                    <span>PP电子</span>
                                </a>
                            </li>
                            <li groupid="53" class="toplay" @if($_member) data-url="/game/playGame?plat_type=JOKER&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="JOKER">
                                <a groupid="53" oncontextmenu="return false;">
                                    <div class="icon g-21"></div>
                                    <span>JOKER电子</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li><a href="/esports" oncontextmenu="return false;">
                            <div class="text_651"></div>
                            <span>Sport</span></a>
                        <ul class="menu-sub-list">
                            <li groupid="45" class="toplay" @if($_member) data-url="/game/playGame?plat_type=CMD&game_type=5&game_code=&devices=1" @else data-url="" @endif data-code="CMD">
                                <a groupid="45" class="openGame" gamename="CMD" gametype="0">
                                    <div class="icon g-9"></div>
                                    <span class="text_85"></span>
                                </a>
                            </li>
                            <li groupid="25" class="toplay" @if($_member) data-url="/game/playGame?plat_type=SBO&game_type=5&game_code=&devices=1" @else data-url="" @endif data-code="SBO">
                                <a groupid="25" class="openGame" gamename="SBO" gametype="0" oncontextmenu="return false;">
                                    <div class="icon s-1"></div>
                                    <span class="text_86"></span>
                                </a>
                            </li>        
                            <li groupid="138" class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=5&game_code=&devices=1" @else data-url="" @endif data-code="OB">
                                <a groupid="138" class="openGame" gamename="OB" gametype="0" oncontextmenu="return false;">
                                    <div class="icon g-ob"></div>
                                    <span>OB体育</span>
                                </a>
                            </li>
                            <li groupid="4" class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=5&game_code=&devices=1" @else data-url="" @endif data-code="BBIN">
                                <a groupid="4" class="openGame"
                                                                      gamename="BBIN" gametype="FT" oncontextmenu="return false;">
                                    <div class="icon BBIN"></div>
                                    <span class="text_867"></span>
                                </a>
                            </li>        
                            <li groupid="105" class="toplay" @if($_member) data-url="/game/playGame?plat_type=HG&game_type=7&game_code=&devices=1" @else data-url="" @endif data-code="HG">
                                <a groupid="105" class="openGame"
                                                                        gamename="HG" gametype="7" oncontextmenu="return false;">
                                    <div class="icon g-hg"></div>
                                    <span >HG体育</span>
                                </a>
                            </li>
                            <li groupid="100" class="toplay" @if($_member) data-url="/game/playGame?plat_type=TFG&game_type=7&game_code=&devices=1" @else data-url="" @endif data-code="TFG">
                                <a groupid="100" class="openGame" gamename="lh" gametype="0" oncontextmenu="return false;">
                                    <div class="icon g-lh"></div>
                                    <span>雷火体育</span>
                                </a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li id="lottery"><a href="/lottory" data-toggle="game" data-game="5"
                                        oncontextmenu="return false;">
                            <div>捕鱼游戏</div>
                            <span>Keno</span></a>
                        <ul class="menu-sub-list">
                            <li class="toplay" @if($_member) data-url="/game/playGame?plat_type=FISH&game_type=redirect&devices=1" @else data-url="" @endif data-code="GDQ" >
                                <a  oncontextmenu="return false;">
                                    <div class="icon g-8"></div>
                                    <span class="text_97"></span></a>
                            </li>
                            <!--<li groupid="15"><a groupid="15" class="openGame" gamename="Dios" gametype="LO"-->
                            <!--                    target="_blank" oncontextmenu="return false;">-->
                            <!--        <div class="icon l-2"></div>-->
                            <!--        <span class="text_79"></span></a></li>-->
                            <!--<li groupid="64" style="display: none;"><a groupid="64" class="openGame"-->
                            <!--                                           gamename="CB" gametype="1"-->
                            <!--                                           target="_blank"-->
                            <!--                                           oncontextmenu="return false;">-->
                            <!--        <div class="icon l-3"></div>-->
                            <!--        <span class="text_80"></span></a></li>-->
                            <!--<li groupid="90"><a groupid="90" class="openGame" gamename="VR" gametype="1"-->
                            <!--                    target="_blank" oncontextmenu="return false;">-->
                            <!--        <div class="icon l-4"></div>-->
                            <!--        <span class="text_81"></span></a></li>-->
                            <!--<li groupid="88"><a groupid="88" class="openGame" gamename="GONE" gametype="1"-->
                            <!--                    target="_blank" oncontextmenu="return false;">-->
                            <!--        <div class="icon l-10"></div>-->
                            <!--        <span class="text_930"></span></a></li>-->
                            <!--<li groupid="99" style="display: none;"><a groupid="99" class="openGame"-->
                            <!--                                           gamename="VSL" gametype="1"-->
                            <!--                                           target="_blank"-->
                            <!--                                           oncontextmenu="return false;">-->
                            <!--        <div class="icon l-6"></div>-->
                            <!--        <span class="text_747"></span></a></li>-->
                            <!--<li groupid="104" style="display: none;"><a groupid="104" class="openGame"-->
                            <!--                                            gamename="PHARAOH" gametype="1"-->
                            <!--                                            target="_blank"-->
                            <!--                                            oncontextmenu="return false;">-->
                            <!--        <div class="icon l-7"></div>-->
                            <!--        <span class="text_752"></span></a></li>-->
                            <!--<li groupid="122" style="display: none;"><a groupid="122" class="openGame"-->
                            <!--                                            gamename="KKCAIPIAO" gametype="0"-->
                            <!--                                            target="_blank"-->
                            <!--                                            oncontextmenu="return false;">-->
                            <!--        <div class="icon l-8"></div>-->
                            <!--        <span class="text_910"></span></a></li>-->
                        </ul>
                    </li>
                    <!--<li><a style="cursor: default;" href="/catchFish">-->
                    <!--        <div class="">捕魚游戏</div>-->
                    <!--        <span>Live Game</span></a>-->
                    <!--    <ul class="menu-sub-list">-->
                    <!--        <li class="new" groupid="159"><a groupid="159" class="openGame" gamename="SEXYLIVE"-->
                    <!--                                         gametype="LIVE" gameid="SV-LIVE-001"-->
                    <!--                                         target="_blank" oncontextmenu="return false;">-->
                    <!--                <div class="icon s-6"></div>-->
                    <!--                <span class="text_99"></span></a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                   <!-- <li class="headerGame"><a style="cursor: default;" oncontextmenu="return false;">
                            <div class="text_933"></div>
                            <span>ESport</span></a>
                        <ul class="menu-sub-list">
                            <li class="new" groupid="145"><a groupid="145" class="openGame" gamename="AVIA"
                                                             gametype="0" target="_blank"
                                                             oncontextmenu="return false;">
                                    <div class="icon AVIA"></div>
                                    <span class="text_928"></span></a></li>
                            <li class="new" groupid="215"><a groupid="215" class="openGame"
                                                             gamename="XIAOAIESPORT" gametype="0"
                                                             target="_blank" oncontextmenu="return false;">
                                    <div class="icon XIAOAIESPORT"></div>
                                    <span class="text_889"></span></a></li>
                            <li class="new" groupid="216"><a groupid="216" class="openGame"
                                                             gamename="LEIHUOESPORT" gametype="0"
                                                             target="_blank" oncontextmenu="return false;">
                                    <div class="icon LEIHUOESPORT"></div>
                                    <span class="text_893"></span></a></li>
                        </ul>
                    </li>-->
                    <li><a href="/activities" oncontextmenu="return false;">
                            <div class="text_654" style="color: #d2350c;"></div>
                            <span>Promotion</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var account = '';
    
    //判断传入的数字是否大于10，如果小于10给小于10的数字之前补0
    function f(d) {
        d = d > 10 ? d : "0" + d;
        return d;
    }

    //写一个函数用来显示时间
    function showTime() {
        let today = new Date();//实例化日期对象，没有传入参数默认为今天的日期
        let year = today.getFullYear();//获取今天的年份
        let month = today.getMonth() + 1;//获取今天的月份，月份默认0为1月，因此加1显示本月
        let day = today.getDate();//获取今天是本月的哪天
        let hour = today.getHours();//获取今天的小时数
        let minute = today.getMinutes();//获取现在的分钟数
        let second = today.getSeconds();//获取现在的秒数
        //定义要显示在div中的字符串，让月日时分秒调用f()函数
        let str = year + "-" + f(month) + "-" + f(day) + " " + f(hour) + ":" + f(minute) + ":" + f(second);
        //将字符串显示在div中
        $(".now-time").html(str);
        //定时器，使每秒调用一次showTime函数
        setTimeout(showTime, 1000);
    }

    window.onload = showTime();


    function doLogin(){
        if (!$("#name").val()) {
            alert("请输入帳號");
            return false;
        }
        if (!$("#password").val()) {
            alert("请输入密碼");
            return false;
        }
        if (!$("#captcha").val()) {
            alert("请输入驗證碼");
            return false;
        }
        $.ajax({
            url : "{{ route('member.login.post') }}",
            type : 'POST',
            data : $("#loginForm").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                    window.location.reload()
                }else{
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }
    $('body').on('click','.toplay',function(){
        var url = $(this).data('url');
            var code = $(this).data('code');
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            $('#plat_type').text(code);
            if(!url){
                alert('请先登录游戏！',1);
            }else{
                // $.ajax({
                //     url: "{{ route('member.post_transfer_all') }}",
                //     type: 'POST',
                //     success: function (data) {
                //         setTimeout(function(){
                //             $.ajax({
                //                 url: "{{ route('member.one_transfer') }}",
                //                 type: 'POST',
                //                 data:{api_name:code,transfer_type:0},
                //                 success: function (data) {
                                    
                //                 }
                //             })
                //         },1000)
                //     }
                // })
                
                window.open(url);
            }
    })

</script>