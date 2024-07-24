(function() {
    var $topNav = null;
    var $loginForm = null;
    var $logoutButton = null;
    var $sub = null;
    var $page = null;
    var totalPage = null;
    var serviceUrl = "'" + parent.Public.SERVICEURL + "'";
    var app = {
        initial: function() {
            $topNav = $('#loginNav');
            $loginForm = $('#loginForm');
            $logoutButton = $('#logout');
            $("input[name=username]").val("");
            $("input[name=password]").val("");
            $page = 0;
            app.checkLogin();
            app.setMenu();
            app.setService();
            app.SetAgentUrl();
            app.bindEvents();
            app.autoGoToRegistion();
            app.contact();
            setInterval(function() { localStorage.sid && app.checkLogin(); }, 30000);
            setInterval(function() { window.parent.Public.getIsLogin() && app.checkDeposit(); }, 30000);
            window.top.Public.controltime();
            app.ChangeImg();
            app.SetHelpContent();
        },
        bindEvents: function() {
            $('body').on('click', '.checkLoginPage', function(){
                if (! localStorage.sid)
                {
                    alert(parent.Language.Get('请先登入'));
                    return false;
                }
                if(localStorage.isTest == '1')
                {
                    alert(parent.Language.Get('未开放'));
                    return false;
                }
                if(localStorage.upAgentType == '2')
                {
                    alert(parent.Language.Get('仅提供微投会员使用'));
                    return false;
                }
            });
            $('a , #loginForm').attr("oncontextmenu", "return false;");

            $(".test_button").find('a#freeplay').on('click', app.FreePlay);
            $logoutButton.bind('click', app.logout);

            $loginForm.on('click', '.btn-login', function() {
                app.login.apply($loginForm, {});
            });

            $('body').on('keypress', '#loginForm', function(e) {
                var key = e.which;
                if (key == 13)
                    app.login.apply($loginForm, {});
            });
            $('#loginForm').on('click', 'g#run', app.UpdateUserMoney);

            $('.header').on('mouseover', '.header-main', app.UpdateGameView);
            $('body').on('click', '.ReCode', app.ReCode);
            $('.header').on('click', '#videoButton', app.setMenu);
            $('.header').on('mouseover', '.menu > ul > li.headerGame', function(){
                $('.menubottom .line-gray').css('height', '110px');
            });
            $('.header').on('mouseout', '.menu > ul > li.headerGame', function(){
                $('.menubottom .line-gray').css('height', '40px');
            });
            $('body').on('click', '.videoButton', function(){
                var $this = $(this);
                if (! localStorage || ! localStorage.username)
                {
                    alert(parent.Language.Get('请先登入'));
                    return false;
                }
                var data = { cmd: 760, sid: localStorage.sid};
                parent.Public
                    .post(data, { async: false })
                    .done(function(response) {
                        var url = response.msg;
                        if(response.status == 0)
                        {
                            if (url) {
                                var WM = window.open(url, "WM");
                                window.parent.Public.pushGameWindowObject(WM);
                            }
                        }
                        else
                        {
                            alert(response.msg);
                        }
                    });
            });
            $(window).on('beforeunload',function(){
                app.changeonline(0);
            });

            var site = window.parent.Public.getSITE();
            if(site !== 'w21')
            {
                $('.comingsoon').on('click', function() {
                    alert(parent.Language.Get('即将开放'));
                    return false;
                });
            }
            else
            {
                 $('.comingsoon').on('click', function() {
                    alert(parent.Language.Get('即将开放'));
                    return false;
                });
            }
            if (location.pathname == '/html/frm/index.html')
            {
                app.eventbox();
            }
            $('.eventbox-E3-close').on('click', '.close-img', function(){
                $('.eventbox-E3').css('display', 'none');
                $('html').css('overflow', 'auto');
            });
        },
        setMenu: function() {
            var tag =   '<ul class="menu-list-box">'+
                            '<a href="../frm/index.html" class="logo">'+
                            '</a>'+
                            '<li id="btn-menu-casino">'+
                                '<a href="../live/livecasino.html">'+
                                    '<div class="text_13"></div>'+
                                    '<span>Live Casino</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    // '<li groupid="21">'+
                                    //     '<a groupid="21" class="openGame" gameName="Lixinlive" gameType="" ui="1">'+
                                    //         '<div class="icon c-1"></div>'+
                                    //         '<span class="text_69"></span>'+
                                    //     '</a>'+
                                    // '</li>'+
                                    '<li groupid="70">'+
                                        '<a groupid="70" class="openGame" gameName="DG" gameType="1" target="_blank">'+
                                            '<div class="icon c-8"></div>'+
                                            '<span class="text_73"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="21">'+
                                        '<a groupid="21" class="openGame" gameName="Lixinlive" gameType="">'+
                                            '<div class="icon c-1"></div>'+
                                            '<span class="text_68"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="35">'+
                                        '<a groupid="35" class="openGame" gameName="OG" gameType="0" target="_blank">'+
                                            '<div class="icon og"></div>'+
                                            '<span class="text_70"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="55">'+
                                        '<a groupid="55" class="openGame" gameName="SHENBO" gameType="Sunbet_Lobby" gameid="SB" target="_blank">'+
                                            '<div class="icon g-10"></div>'+
                                            '<span class="text_71"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="26">'+
                                        '<a groupid="26" class="openGame" gameName="EBet" gameType="1" target="_blank">'+
                                            '<div class="icon c-2"></div>'+
                                            '<span class="text_74"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="19">'+
                                        '<a groupid="19" class="openGame" gameName="Agin" gameType="0" target="_blank">'+
                                            '<div class="icon c-3"></div>'+
                                            '<span class="text_77"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="7">'+
                                        '<a groupid="7" class="openGame" gameName="Mg" gameType="SMG_titaniumLiveGames_Baccarat" target="_blank">'+
                                            '<div class="icon c-4"></div>'+
                                            '<span class="text_75"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="14">'+
                                        '<a groupid="14" class="openGame" gameName="Allbet" gameType="1" target="_blank">'+
                                            '<div class="icon c-5"></div>'+
                                            '<span class="text_72"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="23">'+
                                        '<a groupid="23" class="openGame" gameName="Playtech" gameType="bal" target="_blank">'+
                                            '<div class="icon c-6"></div>'+
                                            '<span class="text_76"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="87">'+
                                        '<a groupid="87" class="openGame" gameName="ROYALLIVE" gameType="1">'+
                                            '<div class="icon ROYALLIVE"></div>'+
                                            '<span>皇家视讯</span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="94">'+
                                        '<a groupid="94" class="openGame" gameName="DS" gameType="1" target="_blank">'+
                                            '<div class="icon DS"></div>'+
                                            '<span>DS视讯</span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="59">'+
                                        '<a groupid="59" gameName="SA" gameType=" " target="_blank">'+
                                            '<div class="icon c-7"></div>'+
                                            '<span class="text_750"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="113">'+
                                        '<a groupid="113" gameName="SEXYLIVE" gameType="LIVE" gameid="SEXYBCRT" target="_blank">'+
                                            '<div class="icon SEXYLIVE"></div>'+
                                            '<span class="text_906"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="114">'+
                                        '<a groupid="114" gameName="EVO" gametype="" target="_blank">'+
                                            '<div class="icon c-9"></div>'+
                                            '<span class="text_795"></span>'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</li>'+
                            '<li id="chess">'+
                                '<a href="../Chessgame/Chessgame.html">'+
                                    '<div class="text_101"></div>'+
                                    '<span>Chess game</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    '<li groupid="171">' +
                                        '<a groupid="171" class="openGame" gameName="GAMEONE" gameType="0" target="_blank">'+
                                            '<div class="icon GAMEONE"></div>'+
                                            '<span class="text_879"></span>'+
                                        "</a>" +
                                    '</li>'+
                                    '<li groupid="184">' +
                                        '<a groupid="184" class="openGame" gameName="BAISONCHESS" gameType="0" target="_blank">'+
                                            '<div class="icon BAISONCHESS"></div>'+
                                            '<span class="text_1004"></span>'+
                                        "</a>" +
                                    '</li>'+
                                    '<li groupid="132">' +
                                        '<a groupid="132" class="openGame" gameName="BOLE" ui="1" target="_blank">'+
                                            '<div class="icon s-15"></div>'+
                                            '<span class="text_915"></span>'+
                                        "</a>" +
                                    '</li>'+
                                    '<li groupid="60">'+
                                        '<a groupid="60" class="openGame" gameName="KAIYUAN" gameType="0" target="_blank">'+
                                            '<div class="icon s-7"></div>'+
                                            '<span class="text_102"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="61">'+
                                        '<a groupid="61" class="openGame" gameName="JINLONG" gameType="1" target="_blank">'+
                                            '<div class="icon s-8"></div>'+
                                            '<span class="text_103"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="66">'+
                                        '<a groupid="66" class="openGame" gameName="VG" gameType="1000" target="_blank">'+
                                            '<div class="icon s-9"></div>'+
                                            '<span class="text_104"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="72">' +
                                        '<a groupid="72" class="openGame" gameName="LEG" gameType="0" target="_blank">'+
                                            '<div class="icon s-10"></div>'+
                                            '<span class="text_751"></span>'+
                                        "</a>" +
                                    '</li>'+
                                    '<li groupid="194">' +
                                        '<a groupid="194" class="openGame" gameName="DASHENGCHESS" gameType="0" target="_blank">'+
                                            '<div class="icon DASHENGCHESS"></div>'+
                                            '<span class="text_1021"></span>'+
                                        "</a>" +
                                    '</li>'+
                                    '<li groupid="21">' +
                                        '<a groupid="21" class="openGame" gameName="Lixinlive" ui="1" target="_blank">'+
                                            '<div class="icon c-1"></div>'+
                                            '<span class="text_69"></span>'+
                                        "</a>" +
                                    '</li>'+
                                    '<li groupid="129">' +
                                        '<a groupid="129" class="openGame" gameName="YABOCHESS" gameType="0" target="_blank">'+
                                            '<div class="icon s-14"></div>'+
                                            '<span class="text_911"></span>'+
                                        "</a>" +
                                    '</li>'+
                                '</ul>'+
                            '</li>'+
                            '<li id="slotgame">'+
                                '<a href="../electronic/index.html?fishBtn" oncontextmenu="return false;">'+
                                    '<div class="text_652"></div>'+
                                    '<span>Slot game</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    '<li groupid="37">'+
                                        '<a groupid="37" href="../electronic/index.html?playngoBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-5"></div>'+
                                            "<span class='text_87'></span>"+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="43">'+
                                        '<a groupid="43" href="../electronic/index.html?JDBBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-6"></div>'+
                                            '<span class="text_88"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="44">'+
                                        '<a groupid="44" href="../electronic/index.html?ECBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-7"></div>'+
                                            '<span class="text_92"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="53">'+
                                        '<a groupid="53" href="../electronic/index.html?MERCHANTBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-11"></div>'+
                                            '<span class="text_89"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="13">'+
                                        '<a groupid="13" href="../electronic/index.html?aginBtn" oncontextmenu="return false;">'+
                                            '<div class="icon c-3"></div>'+
                                            '<span class="text_93"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="24">'+
                                        '<a groupid="24" href="../electronic/index.html?playtechBtn" oncontextmenu="return false;">'+
                                            '<div class="icon c-6"></div>'+
                                            '<span class="text_94"></span>'+
                                        '</a>'+
                                    '</li>' +
                                    '<li groupid="8">'+
                                        '<a groupid="8" href="../electronic/index.html?mgBtn" oncontextmenu="return false;">'+
                                            '<div class="icon c-4"></div>'+
                                            '<span class="text_95"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="54">'+
                                        '<a groupid="54" href="../electronic/index.html?CQ9Btn" oncontextmenu="return false;">'+
                                            '<div class="icon g-12"></div>'+
                                            '<span class="text_96"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="84">'+
                                        '<a groupid="84" href="../electronic/index.html?KABtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-13"></div>'+
                                            '<span class="text_90"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="95">'+
                                        '<a groupid="95" href="../electronic/index.html?DRAGOONSOFTBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-14"></div>'+
                                            '<span class="text_91"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="116">'+
                                        '<a groupid="116" href="../electronic/index.html?JOKERBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-15"></div>'+
                                            '<span class="text_849"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="130">'+
                                        '<a groupid="130" href="../electronic/index.html?FUNKYBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-16"></div>'+
                                            '<span class="text_912"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="147">'+
                                        '<a groupid="147" href="../electronic/index.html?ICGBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-18"></div>'+
                                            '<span class="text_931"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="121">'+
                                        '<a groupid="121" class="openGame" gameName="INPOKER" gameType="1000">'+
                                            '<div class="icon g-19"></div>'+
                                            '<span class="text_907"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li>'+
                                        '<a href="../electronic/index.html?fishBtn" oncontextmenu="return false;">'+
                                            '<div class="icon g-8"></div>'+
                                            '<span class="text_97"></span>'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</li>'+
                            '<li>'+
                                '<a href="../sport/sportsbook.html">'+
                                    '<div class="text_651"></div>'+
                                    '<span>Sport</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    '<li groupid="138">'+
                                        '<a groupid="138" class="openGame" gamename="OBSPORT" gametype="0" target="_blank">'+
                                            '<div class="icon OBSPORT"></div>'+
                                            '<span class="text_945"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="25">'+
                                        '<a groupid="25" class="openGame" gamename="SBO" gametype="0" target="_blank">'+
                                            '<div class="icon s-1"></div>'+
                                            '<span class="text_86"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    // '<li groupid="34">'+
                                    //     '<a groupid="34" gamename="KK" gametype="0" target="_blank">'+
                                    //         '<div class="icon s-3"></div>'+
                                    //         '<span>众发体育</span>'+
                                    //     '</a>'+
                                    // '</li>'+
                                    '<li groupid="45">'+
                                        '<a groupid="45" class="openGame" gamename="CMD" gametype="0" target="_blank">'+
                                            '<div class="icon g-9"></div>'+
                                            '<span class="text_85"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    // '<li class="" groupid="91">'+
                                    //     '<a groupid="91" class="openGame" gamename="HILLSPORT" gametype="0" target="_blank">'+
                                    //         '<div class="icon c-1"></div>'+
                                    //         '<span class="text_83"></span>'+
                                    //     '</a>'+
                                    // '</li>'+
                                    '<li groupid="105">'+
                                        '<a groupid="105" class="openGame" gamename="WMHILL" gametype="7" target="_blank">'+
                                            '<div class="icon c-1"></div>'+
                                            '<span class="text_766"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="100">'+
                                        '<a groupid="100" class="openGame" gameName="SUPER" gameType="0" target="_blank">'+
                                            '<div class="icon SUPER"></div>'+
                                            '<span class="text_749"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="36">'+
                                        '<a groupid="36" class="openGame" gamename="M8" gametype="0" target="_blank">'+
                                            '<div class="icon s-4"></div>'+
                                            '<span class="text_84"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="4">'+
                                        '<a groupid="4" class="openGame" gamename="BBIN" gametype="FT" target="_blank">'+
                                            '<div class="icon BBIN"></div>'+
                                            '<span class="text_867"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="50">'+
                                        '<a groupid="50" class="openGame" gamename="SB" gametype="0" target="_blank">'+
                                            '<div class="icon SB"></div>'+
                                            '<span class="text_922"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="187">'+
                                        '<a groupid="187" class="openGame" gameName="YLSPORT" gameType="0" target="_blank">'+
                                            '<div class="icon YLSPORT"></div>'+
                                            '<span class="text_988"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="214">'+
                                        '<a groupid="214" class="openGame" gameName="CRSPORT" gameType="0" target="_blank">'+
                                            '<div class="icon CRSPORT"></div>'+
                                            '<span class="text_793"></span>'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</li>'+
                            '<li id="lottery">'+
                                '<a href="../keno/lottery.html" data-toggle="game" data-game="5">'+
                                    '<div class="text_653"></div>'+
                                    '<span>Keno</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    '<li groupid="29">'+
                                        '<a groupid="29" class="openGame" gameName="HaoCai" gameType="LO" target="_blank">'+
                                            '<div class="icon l-5"></div>'+
                                            '<span class="text_82"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="15">'+
                                        '<a groupid="15" class="openGame" gameName="Dios" gameType="LO" target="_blank">'+
                                            '<div class="icon l-2"></div>'+
                                            '<span class="text_79"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="64">'+
                                        '<a groupid="64" class="openGame" gameName="CB" gameType="1" target="_blank">'+
                                            '<div class="icon l-3"></div>'+
                                            '<span class="text_80"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="90">'+
                                        '<a groupid="90" class="openGame" gameName="VR" gameType="1" target="_blank">'+
                                            '<div class="icon l-4"></div>'+
                                            '<span class="text_81"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="88">'+
                                        '<a groupid="88" class="openGame" gameName="GONE" gameType="1" target="_blank">'+
                                            '<div class="icon l-10"></div>'+
                                            '<span class="text_930"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="99">'+
                                        '<a groupid="99" class="openGame" gameName="VSL" gameType="1" target="_blank">'+
                                            '<div class="icon l-6"></div>'+
                                            '<span class="text_747"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="104">'+
                                        '<a groupid="104" class="openGame" gameName="PHARAOH" gameType="1" target="_blank">'+
                                            '<div class="icon l-7"></div>'+
                                            '<span class="text_752"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li groupid="122">'+
                                        '<a groupid="122" class="openGame" gameName="KKCAIPIAO" gameType="0" target="_blank">'+
                                            '<div class="icon l-8"></div>'+
                                            '<span class="text_910"></span>'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</li>'+
                            '<li>'+
                                '<a style="cursor: default;">'+
                                    '<div class="text_98"></div>'+
                                    '<span>Live Game</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    // '<li groupid="41">'+
                                    //     '<a groupid="41" class="openGame" gamename="CF" gametype="0" target="_blank" oncontextmenu="return false;">'+
                                    //         '<div class="icon s-6"></div>'+
                                    //         '<span class="text_99"></span>'+
                                    //     '</a>'+
                                    // '</li>'+
                                    // '<li groupid="42">'+
                                    //     '<a groupid="42" class="openGame" gameName="Saima" gameType="0" target="_blank" oncontextmenu="return false;">'+
                                    //         '<div class="icon s-5"></div>'+
                                    //         '<span class="text_100"></span>'+
                                    //     '</a>'+
                                    // '</li>'+
                                    '<li class="new" groupid="159">'+
                                        '<a groupid="159" class="openGame" gameName="SEXYLIVE" gameType="LIVE" gameid="SV-LIVE-001" target="_blank">'+
                                            '<div class="icon s-6"></div>'+
                                            '<span class="text_99"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    // '<li class="new" groupid="160">'+
                                    //     '<a groupid="160" class="openGame" gameName="SEXYLIVE" gameType="LIVE" gameid="HRB-LIVE-001" target="_blank">'+
                                    //         '<div class="icon s-5"></div>'+
                                    //         '<span class="text_100"></span>'+
                                    //     '</a>'+
                                    // '</li>'+
                                '</ul>'+
                            '</li>'+
                            
                            // '<li>'+
                            //     '<a class="videoButton">'+
                            //         '<div class="text_105"></div>'+
                            //         '<span>Video Zone</span>'+
                            //     '</a>'+
                            // '</li>'+
                            // '<li>'+
                            //     '<a class="checkLoginPage" href="../wechat/qrcode.html" class="">'+
                            //         '<div class="text_106"></div>'+
                            //         '<span>WetchatBet</span>'+
                            //     '</a>'+
                            // '</li>'+
                            '<li class="headerGame">'+
                                '<a style="cursor: default;">'+
                                    '<div class="text_933"></div>'+
                                    '<span>ESport</span>'+
                                '</a>'+
                                '<ul class="menu-sub-list">'+
                                    '<li class="new" groupid="145">'+
                                        '<a groupid="145" class="openGame" gamename="AVIA" gametype="0" target="_blank" oncontextmenu="return false;">'+
                                            '<div class="icon AVIA"></div>'+
                                            '<span class="text_928"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li class="new" groupid="215">'+
                                        '<a groupid="215" class="openGame" gameName="XIAOAIESPORT" gameType="0" target="_blank">'+
                                            '<div class="icon XIAOAIESPORT"></div>'+
                                            '<span class="text_889"></span>'+
                                        '</a>'+
                                    '</li>'+
                                    '<li class="new" groupid="216">'+
                                        '<a groupid="216" class="openGame" gameName="LEIHUOESPORT" gameType="0" target="_blank">'+
                                            '<div class="icon LEIHUOESPORT"></div>'+
                                            '<span class="text_893"></span>'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</li>'+
                            '<li>'+
                                '<a href="../promotion/promotion.html">'+
                                    '<div class="text_654" style="color: #d2350c;"></div>'+
                                    '<span>Promotion</span>'+
                                '</a>'+
                            '</li>'+
                            // "<li id='pay'>"+
                            //     '<a href="../help/help-business.html#pay">'+
                            //         '<div class="text_22"></div>'+
                            //         '<span>Agent Register</span>'+
                            //     '</a>'+
                            // '</li>'+
                        '</ul>';
            $('.menu').html(tag);
            var pathname = location.pathname || false;
            $('.menu > ul > li').each(function(){
                if ($(this).find('a').prop('href').indexOf(pathname) >= 0)
                {
                    $(this).addClass('active').siblings().removeClass('active');
                }
            });

            // 遊戲開關設定
            $GameGroupData = window.parent.Public.GameGroup;
            var gamegroupIdDef = parent.Public.GetGameGroupId();
            for (key in $GameGroupData)
            {
                var grouprow = $GameGroupData[key];
                if(gamegroupIdDef && gamegroupIdDef[grouprow.id])
                {
                    var gameStatus = gamegroupIdDef[grouprow.id].status;
                    if(gameStatus == false) grouprow.isshow = 0;
                }

                if (grouprow.isshow == 0)
                {
                    $('.menu-sub-list').find('li[groupid=' + grouprow.id + ']').css('display', 'none');
                    $('.headerGame').find('li[groupid=' + grouprow.id + ']').css('display', 'none');
                    $('.Chessgame-nav').find('li[groupid=' + grouprow.id + ']').css('display', 'none');  //棋牌頁
                    $('.slotgameMenu').find('li[groupid=' + grouprow.id + ']').css('display', 'none');  //電子頁
                    $('#game-list').find('ul[groupid=' + grouprow.id + ']').css('display', 'none');
                    $('.ag-fish').find('div[groupid=' + grouprow.id + ']').css('display', 'none');
                    $('.lottery-nav').find('li[groupid=' + grouprow.id + ']').css('display', 'none');  //彩票頁
                    $('.live-game-btns-wrap, .live-game-btns-wrap2').find('a[groupid=' + grouprow.id + ']').css('display', 'none');  //真人頁
                    $('.sports-site').find('div[groupid=' + grouprow.id + ']').css('display', 'none');  //體育頁
                }
            }
        },
        setService: function() {
            var appDownQRCode = app.SetQRCode(parent.Public.GetAppDownUrl());
            var tag =  '<div class="service_tool">'+
                            '<ul>'+
                                "<li class='test_button'><a class='aftertext_7' id='freeplay' title='freeplay'></a></li>"+
                                "<li><a class='aftertext_1' data-toggle='cs' onclick=\"javascript:openChat(" + serviceUrl + ",'900','600');\"'></a></li>"+
                                //客服QRcode的方式↓
                                // "<li class='service-box'><a class='QRCodeBtn aftertext_1' goal='W4'></a>"+
                                //     '<div id="W4" class="hover-box">'+
                                //             '<img src="../../images/serviceQRcode.jpg" style="width:200px;, height:200px;">'+
                                //     '</div>'+
                                // "</li>"+
                                // "<li id='redbutton'><a>紅包</a></li>" +
                                "<li><a class='aftertext_3' href='../acc/register.html'></a></li>"+

                                // "<li class='wechatdownload-box contact_btn'><a class='QRCodeBtn' goal='W1'>联系</a>"+
                                //     '<div id="W1" class="hover-box" >'+
                                //     '</div>'+
                                // "</li>"+

                                "<li class='appdownload-box'><a class='QRCodeBtn aftertext_6' goal='W3'></a>"+
                                    '<div id="W3" class="hover-box">'+
                                            '<img src="' + appDownQRCode + '">'+
                                    '</div>'+
                                "</li>"+
                                // "<li><a href='#'' gameName='Lixinlive' gameType='onlymultiple'>利鑫真人多台</a></li>"+
                            '</ul>'+
                        '</div>';
            $('.fl_in').html(tag);
            $('#redbutton').on('click',function(){
                if(! localStorage.sid)
                {
                    alert(parent.Language.Get('请先登入'));
                    return false;
                }
                else
                {
                    var url = 'http://' + location.hostname + '/html/red/index.html?sid=' + localStorage.sid;
                    var redUrl = window.open(url);
                    window.parent.Public.pushGameWindowObject(redUrl);
                }
            });
            if(localStorage.sid && localStorage.isTest == '0')
            {
                $('.appdownload-box').show();
            }
            $('.appdownload-box').on('click',function(){
                if(appDownQRCode == '')
                {
                    alert(parent.Language.Get('即将开放'));
                    return false;
                }
            });
        },
        showVideo: function(){
            var url = parent.Public.getVIDEOURL() + '?' + 'username=' + localStorage.username;
            var WM = window.open(url, "WM");
            window.parent.Public.pushGameWindowObject(WM);
        },
        checkDeposit: function() {
            var data = { cmd: 705, sid: localStorage.sid };
            parent.Public
                .post(data, { async: false })
                .done(function(response) {
                    if (response.status == 0 && response.msg) {
                        alert(response.msg);
                        app.UpdateUserMoney();
                    }
                });
        },
        UpdateUserMoney: function() {
            var data = {
                cmd: 200,
                sid: localStorage.sid,
                gid: 10,
            };
            $('g#run').removeClass('btn-refreshS').addClass('btn-refreshR');
            window.top.Public.post(data).done(function(response) {
                if (localStorage.money != response.msg.money) {
                    localStorage.money = response.msg.money
                    var tag = ' <i class="icon icon-acc-balance"></i>' + '<a href="#" class="text_655"> ' + localStorage.money + '<g class="btn-refreshS" id="run"></g></a>';
                    $('.info-balance').html(tag);
                }
                $('g#run').removeClass('btn-refreshR').addClass('btn-refreshS');
                return;
            });
        },
        login: function() {
            var data = {
                cmd: 100,
                username: $('input[name=username]').val(),
                password: $('input[name=password]').val(),
                code: $('input[name=code]').val(),
            };
            var username = data['username'];
            var password = data['password'];
            if (!username) {
                alert(parent.Language.Get('请输入正确帐号'));
                return false;
            }
            if (!password) {
                alert(parent.Language.Get('请输入正确密码'));
                return false;
            }
            if (!window.top.Public.checkVerifiCode(data.code)) {
                alert(parent.Language.Get('验证码错误'));
                return false;
            }
            app.loading();

            window.top.Public.post(data).done(function(response) {
                if (response.status == 0) {
                    localStorage.username = data.username;
                    localStorage.sid = response.msg.sid;
                    app.checkLogin();
                    app.createGameUser();
                    app.eventbox();
                    window.location.reload();
                    return;
                }
                alert(response.msg);
                app.getVerifi.apply($('#verifi'), {});
                app.loginInput();
            });
        },
        getUnread: function() {
            var data = {
                cmd: 701,
                sid: localStorage.sid,
                type: 2,
                page: app.page,
            };
            $page = 0;
            window.parent.Public
                .post(data)
                .done(function(response) {
                    if (response.status == 0) {
                        var msg = response.msg;
                        $page = response.msg.totalPage;
                        $(".mail-num").text($page).show();
                    }else{
                        $(".mail-num").hide();
                    }
                    return;

                })
                .fail(function() {
                    localStorage.totalPage == 0;
                });
        },
        logout: function() {
            app.changeonline(0);
            window.top.Public.clearLocalStorage();
            window.top.Public.closeGameWindow();
            app.loginInput();
            app.purview();
        },
        changeonline: function(online) {
            var data = {
                cmd: 102,
                sid: localStorage.sid,
                online: online,
            };

            window.parent.Public
                .post(data, {async: false})
                .done(function(response) {
            
            });
            return true;
        },
        checkLogin: function() {
            app.loading();
            if (localStorage.sid && localStorage.username) {
                app.changeonline(1);
                app.getUserInfo();
                app.getUserMoney();
                return;
            }
            app.logout();
        },
        getUserInfo: function() {
            var failtime = window.parent.Public.getfailtime();
            app.getUnread();
            var success = false;
            var message = null;
            var username = localStorage.username || '';
            var data = {
                cmd: 101,
                sid: localStorage.sid || 0,
            };
            window.parent.Public
                .post(data, { async: false })
                .done(function(response) {
                    window.parent.Public.getfailtime();
                    if (response.status == 0 && username == response.msg.username) {
                        localStorage.id = response.msg.id || '';
                        localStorage.truename = response.msg.truename || '';
                        localStorage.phone = response.msg.phone || '';
                        localStorage.email = response.msg.email || '';
                        localStorage.qq = response.msg.qq || '';
                        localStorage.line = response.msg.line || '';
                        localStorage.birthday = response.msg.birthday || '';
                        localStorage.sex = response.msg.sex || '';
                        localStorage.banks = JSON.stringify(response.msg.banks || {});
                        localStorage.needBet = response.msg.needBet || '';
                        localStorage.nowBet = response.msg.nowBet || '';
                        localStorage.isTest = response.msg.isTest || '';
                        localStorage.upAgentPid = response.msg.upAgentPid || '';
                        localStorage.upAgentType = response.msg.upAgentType || '';
                        localStorage.mode = response.msg.mode || '';
                        localStorage.wechatId = response.msg.wechatId || '';

                        success = true;
                        app.setService();
                    }else{
                        message = response.msg;
                        alert(message || parent.Language.Get('请重新登入') + '！');
                        app.logout();
                    }
                })
                .fail(function() {
                    window.parent.Public.setfailtime(failtime+1);
                    if(failtime >= 3){
                        message = parent.Language.Get('亲，您的连线异常，请重新登入') + '！';
                        if (!success) {
                            localStorage.sid = '';
                            alert(message || parent.Language.Get('请重新登入') + '！');
                         }
                    }
                });
        },
        getUserMoney: function() {
            var data = {
                cmd: 200,
                sid: localStorage.sid,
                gid: 10,
            };

            window.top.Public.post(data).done(function(response) {
                if (response.status == 0) {
                    localStorage.money = response.msg.money;
                    app.loginSuccess();
                }
                return;
            });
        },
        createGameUser: function() {
            var data = {
                cmd: 118,
                userName: localStorage.username || 0,
            };
            window.top.Public.post(data)
                .done(function(response) {

                    app.getUnread();
                })
                .fail(function() {
                });
        },
        loginInput: function() {
            // var LineDetectUrl = parent.Public.getLineDetectUrl();
            // var LineDetect = LineDetectUrl ? ('<a class="btn-member text_111" target="_parent" href="' + LineDetectUrl + '"></a>') : '';
            var tag =

                '<input type="text" name="username" placeholder="' + parent.Language.Get('帐号') + '" class="input_tip">' +
                '<input type="password" name="password" placeholder="' + parent.Language.Get('密码') + '" class="form-underline" class="input_tip">' +
                '<input type="test" name="code" placeholder="' + parent.Language.Get('验证码') + '" class="input_tip input_tip_45">' +
                '<img id="verifi" src="" />' + 
                '<a class="ReCode">'+
                    '<img id="img" src="../../images/recode.png" style="width:40px;">' +
                '</a>' +
                '<a id="login" class="btn-login text_112"></a>' +
                '<a style="font-size: 12px;" class="btn-member text_584" href="../acc/register.html"></a>' +
                // '<a class="btn-member" href="http://wmapi.a45.me/downloads/DelCookie.bat" download target="_blank">清理缓存</a>' +
                // "<a class='btn-member text_110' onclick=\"window.open('../questions/questions.html', '', config='height=580,width=710');\"></a>"+
                // LineDetect +
                "<a class='text_115' data-toggle='cs' style='color: #059C74;' onclick=\"javascript:openChat("+serviceUrl+",'900','600');\" oncontextmenu='return false;'></a>";

            var langArea = '<div class="lang-box">' +
                '<a class="lang-on">' + 
                    '<i class="icon flag-icon-tw"></i>' +
                    '<i class="icon flag-icon-en"></i>' +
                    '<i class="icon flag-icon-th"></i>' +
                    // '<i class="icon flag-icon-vn"></i>' +
                '</a>' + 
                '<ul class="lang-select commonlist">' +
                    '<li><a id="tw" class="btn"><i class="icon flag-icon lang_tw"></i></a></li>' +
                    '<li><a id="en" class="btn">' + '<i class="icon flag-icon lang_en"></i></a></li>' +
                    '<li><a id="th" class="btn">' + '<i class="icon flag-icon lang_th"></i></a></li>' +
                    // '<li><a id="vn" class="btn">' + '<i class="icon flag-icon lang_vn"></i></a></li>' +
                    // '<li><a class="btn">' + '<i class="icon flag-icon kr"></i></a></li>' +
                    // '<li><a class="btn">' + '<i class="icon flag-icon fi"></i></a></li>' +
                '</ul>';

            $loginForm.html(tag + langArea);

            app.getVerifi.apply($('#verifi'), {});
            $('#login').bind('click', app.login);
            $('#verifi').bind('click', app.getVerifi);
            $('.lang-box').bind('click', LanguageSelect.Show);
            LanguageSelect.Initial();
        },
        getVerifi: function() {
            var $this = $(this);
            var verifiCode = window.top.Public.getVerifiCode();
            var site = window.parent.Public.getSITE();
            if(site == 'gof')
            {
                $this.attr('src', 'https://apix21.gameone.online/boxApi.php?cmd=109&verifiCode=' + verifiCode);
            }
            else
            {
                $this.attr('src', window.top.Public.getApiUrl() + '?109&cmd=109&verifiCode=' + verifiCode);                
            }
        },
        loginSuccess: function() {
            var personInfo = '<div class = "preson-info">' + '<span class= "info">' + ' <i class="icon icon-acc-person" > </i>' + ' <a href="#" class="text_656">：<i class="fa fa-user"></i> ' + localStorage.username + '</a></li>' +
                '<span class= "info info-balance">' + ' <i class="icon icon-acc-balance"></i>' + '<a href="#" class="text_655">：' + localStorage.money + '<g class="btn-refreshS" id="run"></g></a></div>';
            var topNavBegin = '<div class="acc-links fleft mleft">'
            var center = ' <a class="btn btn-navacc btn-navacc-center text_27"  href="../mem/acc-news.html"></a> ';
            var withdrawal = ' <a class="btn btn-navacc btn-navacc-deposit text_657"  href="../mc/withdrawal.html"></a> ';
            var deposit = ' <a class="btn btn-navacc btn-navacc-deposit text_658"  href="../mem/deposit.html"></a> ';
            var withdraw = ' <a class="btn btn-navacc btn-navacc-news text_659" href="../mem/placard.html"></a></li>';
            var transfer = ' <a class="btn btn-navacc btn-navacc-transfer text_122" href="../mem/acc-transfer.html"></a> ';
            // var pointTransfer = ' <a class="btn btn-navacc btn-navacc-pointTransfer text_660" href="../other/pointtransfer.html"></a> ';
            var messageNews = ' <a class="btn btn-navacc btn-navacc-mail text_661" href="../mem/acc-news.html"> (' + $page + ')</a> ';
            var logoutButton = '<a id="logout" class="btn btn-login-out text_123"></a> ';
            // var cacheButton = '<a href="http://wmapi.a45.me/downloads/DelCookie.bat" download target="_blank" class="btn btn-cacheButton">清理缓存</a> ';
            var questions = '<a class="btn btn-questions text_110" onclick=\'window.open("../questions/questions.html", "", config="height=580,width=710");\'></a>';
            // var LineDetectUrl = parent.Public.getLineDetectUrl()
            // var LineDetect = LineDetectUrl ? ('<a class="btn btn-cacheButton text_111" target="_parent" href="' + LineDetectUrl + '"></a>') : '';
            var topNavEnd = '</div>';
            var langArea = '<div class="lang-box">' +
                '<a class="lang-on">' + 
                    '<i class="icon flag-icon-tw"></i>' +
                    '<i class="icon flag-icon-en"></i>' +
                    '<i class="icon flag-icon-th"></i>' +
                    // '<i class="icon flag-icon-vn"></i>' +
                '</a>' + 
                '<ul class="lang-select commonlist">' +
                    '<li><a id="tw" class="btn"><i class="icon flag-icon lang_tw"></i></a></li>' +
                    '<li><a id="en" class="btn">' + '<i class="icon flag-icon lang_en"></i></a></li>' +
                    '<li><a id="th" class="btn">' + '<i class="icon flag-icon lang_th"></i></a></li>' +
                    // '<li><a id="vn" class="btn">' + '<i class="icon flag-icon lang_vn"></i></a></li>' +
                    // '<li><a class="btn">' + '<i class="icon flag-icon kr"></i></a></li>' +
                    // '<li><a class="btn">' + '<i class="icon flag-icon fi"></i></a></li>' +
                '</ul>';
            // var tag = personInfo + topNavBegin + center + withdrawal + deposit + withdraw + transfer + messageNews + logoutButton + questions + LineDetect + topNavEnd + langArea;
            // var tag = personInfo + topNavBegin + center + deposit + withdraw + transfer + pointTransfer + messageNews + logoutButton + topNavEnd + langArea;
            var tag = personInfo + topNavBegin + center + withdrawal + deposit + withdraw + transfer + messageNews + logoutButton + topNavEnd + langArea;
            if(localStorage.isTest == 1){
                // tag = personInfo + logoutButton + questions + LineDetect + topNavEnd + langArea;
                tag = personInfo + logoutButton + topNavEnd + langArea;
            }
            if(localStorage.isCredit == '1')
            {
                tag = personInfo + center + transfer + logoutButton + topNavEnd + langArea;
                $('.text_166').hide();
            }
            $loginForm.html(tag);
            $loginForm.find('.btn-login-out').bind('click', function() {
                app.logout.apply($loginForm, {});
                window.top.Public.goHome();
            });
            $('.lang-box').bind('click', LanguageSelect.Show);
            LanguageSelect.Initial();
        },
        loading: function() {
            var tag = '<img src="' + location.origin + '/images/ajax/loading.gif" />';

            $loginForm.html(tag);
        },
        purview: function() {
            var pass = ['index.html', 'livecasino.html', 'registion.html', 'sportsbook.html', 'lottery.html', 'fishing.html', 'playtech.html', 'joe.html', 'mg.html', 'ag.html', 'promotion.html', 'ag-mobile-app.html', 'help-about.html', 'help-betq.html', 'help-business.html', 'help-contact.html', 'help-deposit.html', 'help-generalq.html', 'help-privacy.html', 'help-techq.html', 'help-teller.html', 'terms.html', 'responsiblegambling.html', 'register.html', 'baccarat.html', 'dragontiger.html', 'Roulette.html', 'sicbo.html', 'slot777.html', 'cockfighting.html', 'horse.html', 'help-cookies.html', 'Chessgame.html'];
            var pathName = location.pathname.split('/').pop();


            if (pass.indexOf(pathName) < 0) window.top.Public.goHome();
        },
        autoGoToRegistion: function() {
            var pid = window.top.Public.getUrlData('pid');
            if (!pid) {
                return false;
            }
            if ( (pid != localStorage.pid) && (pid != '0') && (typeof(pid) != 'undefined')) {
                localStorage.pid = pid;
            }
            if(window.top.Public.getIsLogin() ) {
                return false;
            }
            window.top.history.replaceState('', '', '?welcome');
            document.location.href = '../acc/register.html';
        },
        UpdateGameView: function() {
        },
        ReCode: function() {
            app.getVerifi.apply($('#verifi'), {});
        },
        FreePlay: function() {
            var $this = $(this);
            var data = {
                cmd: 901,
            };
            window.parent.Public.post(data)
                .done(function(response) {
                    $username = response['msg']["username"];
                    $loginForm.find('input[name=username]').val($username);
                    $loginForm.find('input[name=password]').val("GUEST01");
                    var $verifiCode = $("img#verifi").attr("src");
                    var getPara, pARAVal;
                    var aryPara = [];
                    if($this.attr("title") == 'freeplay'){
                        if ($verifiCode.indexOf("?") != -1) {
                            var getSearch = $verifiCode.split("?");
                            getPara = getSearch[1].split("&");
                            for (i = 1; i < getPara.length; i++) {
                                ParaVal = getPara[i].split("=");
                            }
                            var $getVerifi = ParaVal[1];
                        }
                        $("input[name=code]").val($getVerifi);
                        app.login.apply($loginForm, {});
                    }
                    window.location.reload();
                })
                .fail(function() {
                    console.log('createGameUser Fail');
                });
        },
        SetAgentUrl: function(){
           var agentUrl = parent.Public.getAgentUrl();
           $('#agentLogin').attr('href',agentUrl);
        },
        eventbox: function(){
           var data = {
                cmd: 761,
                code: 'eventbox',
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response) {
                    $row = $.parseJSON(response.msg.value);
                    $value_login = $row['eventbox_login'];
                    $value = $row['eventbox'];
            });
            if ($value == '1' && typeof(localStorage.sid) == 'undefined')
            {
                $('.eventbox-E3').css('display', 'inline-block');
                $('.content_img').removeClass('after').addClass('before');
                $('html').css('overflow', 'hidden');
            }
            else if ($value_login == '1' && typeof(localStorage.sid) != 'undefined')
            {
                $('.eventbox-E3').css('display', 'inline-block');
                $('.content_img').removeClass('before').addClass('after');
                $('html').css('overflow', 'hidden');
            }
            else
            {
                $('.eventbox-E3').css('display', 'none');
                $('html').css('overflow', 'auto');
            }
        },
        contact: function(){
           var data = {
                cmd: 761,
                code: 'contact',
            };
            window.parent.Public
                .post(data, {async: false})
                .done(function(response) {
                    row = $.parseJSON(response.msg.value);
                    $name = row['name'];
                    $textshow = row['textshow'];
                    $textvalue = row['textvalue'];
                    $imgshow = row['imgshow'];
                    $imgweb = row['imgweb'];
            });
            /*客服欄是否顯示聯繫欄位*/
            var i = 0;
            var j = 0;
            for (key in $name)
            {
                $textshow_val = $textshow[key];
                $imgshow_val = $imgshow[key];
                if ($textshow_val == '1') i++;
                if ($imgshow_val == '1') j++;
            }
            if (i == 0 && j == 0)
            {
                $('.contact_btn').css('display', 'none');
            }
            /*聯繫欄位資料*/
            var tag = '';
            for (key in $name)
            {
                $name_val = $name[key];
                $textshow_val = $textshow[key];
                $textvalue_val = $textvalue[key];
                $imgshow_val = $imgshow[key];
                $imgweb_val = $imgweb[key];
                if ($textshow_val == '1' && $textvalue_val != '')
                {
                    if ($imgshow_val == '1' && $imgweb_val != '')
                    {
                        tag += '<a class="contact_' + key + '" href="' + location.origin + '/' + $imgweb_val + '" oncontextmenu="return false;" style="text-align: center;">';
                        tag += '<img src="' + location.origin + '/' + $imgweb_val + '" alt="" title="" border="" style= width: 200px;">' + decodeURIComponent(escape(window.atob($name_val))) + '：' + $textvalue_val + '</a><br>';
                    }
                    else
                    {
                        tag += '<a class="contact_' + key + '" oncontextmenu="return false;" style="text-align: center;">' + decodeURIComponent(escape(window.atob($name_val))) + '：' + $textvalue_val + '</a><br>';
                    }
                }
                else
                {
                    if ($imgshow_val == '1' && $imgweb_val != '')
                    {
                        tag += '<a class="contact_' + key + '" href="' + location.origin + '/' + $imgweb_val + '" oncontextmenu="return false;" style="text-align: center;">';
                        tag += '<img src="' + location.origin + '/' + $imgweb_val + '" alt="" title="" border="" style= width: 200px;">' + decodeURIComponent(escape(window.atob($name_val))) + '</a><br>';
                        // console.log(location.origin + '/' + $imgweb_val);
                    }
                }
            }
            $('#W1').html(tag);
        },
        SetQRCode: function(url)
        {
            var image = '';
            if(url)
            {
                var size = 10;
                var iframeHost = encodeURIComponent(url);
                image = parent.Public.getAgentUrl() + '/phpqrcode/get.php?string=' + iframeHost + '&size=' + size;
            }
            return image;
        },
        ChangeImg: function(){
            //隱藏下方清理緩存按鈕
            $('.box-bottom').find('#questions').css('display', 'none');
            //隱藏彩票頁中文彩種
            $('.hot-game').css('display', 'none');
            //導覽列因為沒遊戲將按鈕隱藏
            // $('.menu-sub-list > ul > li#chess').css('display', 'none'); 
            //隱藏紅包按鈕
            // $('#redbutton').css('display', 'none');

            var title = window.parent.Public.GetTitle();
            var tag =  parent.Language.titleLanguage(title) + ' Copyright© 2018 Casino Co.Group All Rights Reserved';
            $('#bottomtitle').html(tag);

            var bottomAboutUs = parent.Language.Get('WM完美娱乐城是注册的合法公司。在进行网站注册或游戏前，请确保您已满18岁并且遵循当地法律法规');
            $('#bottomAboutUs').html(bottomAboutUs);
        },
        SetHelpContent: function(){
            // 關於我們
            var SetAboutUsContent = '<div class="subject text_20"></div>'+
                                    '<div class="main-bd">' + 
                                        parent.Language.Get('WM完美娱乐城所提供的所有产品和服务由菲律宾政府卡格扬经济特区First Cagayan leisure and Resort Corporation 所授权和监管，为全球博彩爱好者提供最优惠的赔率和最优质的服务，并正发展成为最受欢迎的线上娱乐公司。我们的经营理念是通过向我们的顾客提供最佳的博彩娱乐体验和最优质的服务来发展我们的业务') + 
                                    '</div>' +
                                    '<br>'+
                                    '<br>'+
                                    '<h1 class="text_340"></h1>'+
                                    '<div class="main-bd">'+
                                        parent.Language.Get('“WM完美娱乐城”总部位于菲律宾，是获得菲律宾政府认证的合法互联网体育博彩公司，以雄厚实力建构出强大的网络在线博彩投注平台，提供安全稳定的投注系统是本公司对每位会员的承诺，让会员能随心所欲进行投注，随时随地都能够享受线上博彩的乐趣.我们的彩金支付机制的安全快速更是业界之冠，所有会员的彩金都能在1-10分钟内到账，歇力履行对广大会员的承诺永远被我们视为是成功的最重要关键，亦因此“WM完美娱乐城”能在全球网络在线体育投注平台中赢得诚信可靠的美誉') +
                                    '</div>' +
                                    '<br>' +
                                    '<br>' +
                                    '<h1 class="text_342"></h1>'+
                                    '<div class="main-bd">' +
                                        parent.Language.Get('汇集了全球的博彩业界精英，“WM完美娱乐城”致力打造符合大众博彩市场需求，并值得所有会员信赖的互联网投注平台，由业界精英组成的金牌专业团队，凭借对博彩市场的丰富经验，分别针对博彩信息及博彩市场策略等各方面，不断对有效管理博彩运营进行深入透彻的研究，并进一步将研究结果实践在产品完善化上，务求让一直给予支持的会员们获得最好的网络在线投注体验.网罗世界各地各种体育比赛项目并提供多样化玩法选择，达至为每位会员量身订造，能够满足会员们对体育赛事,真人视讯,电子游艺,各类彩票等玩法的需求') +
                                    '</div>' +
                                    '<br>' +
                                    '<br>' +
                                    '<h1 class="text_344"></h1>' +
                                    '<div class="main-bd">' +
                                        parent.Language.Get('“WM完美娱乐城”不断投放大量预算在确保投注系统的安全稳定与技术创新上，我们的投注系统全方位采用128bit高安全标准的数据加密（Encryption）技术，此种SSL(Secure Socket Layer)技术可确保会员的资料及投注数据在透过网络传输的过程中不被截取，因此会员的隐私都能得到严格保密，所有投注信息准多次加密存储，我们对每一项交易都会采取严格的保密和防盗防诈措施，保证会员账户的真实合法性并同时保证会员在充值及提现过程中的安全性，配合专业技术团队全天候24小时严格监控与对系统的不间断技术更新，以高安全规格的系统提供会员最安心便捷的交易体验') +
                                    '</div>' +
                                    '<br>' +
                                    '<br>' +
                                    '<h1 class="text_346"></h1>' +
                                    '<div class="main-bd">' +
                                        parent.Language.Get('“WM完美娱乐城”一直以提供高品质高效率的会员服务为傲，根据对市场及会员的分析而拟定之严谨客服人员培训规范，创造出具有专业认真，热情服务特点的专业客服团队，透过掌握丰富专业知识的客服人员友善热情的态度，会员们每次必能享受到完善周到的服务，无论是开户、充值、取款或有关博彩投注的问题咨询，热情专业的客服团队都能给予会员们难忘的服务体验. 24小时在线的专业热情客服团队让会员能够随心所欲进行投注，全天候24小时随时恭候办理开户、充值及取款等各种博彩投注业务.会员们可透过各种方包括网页“在线客服”、免费客服热线、客服QQ与我们热情专业的客服人员联系，无论是办理投注业务或是向我们提出宝贵意见，我们都是非常欢迎') +
                                    '</div>' +
                                    '<br>' +
                                    '<br>' +
                                    '<h1 class="text_348"></h1>' +
                                    '<div class="main-bd">' +
                                        parent.Language.Get('我们提供各种安全简便的存款及提款选择给我们的会员。我们一直坚持“了解我们的会员（KYC）”和 反洗钱(AML)的原则， 并与第三方的财务管理当局合作以确保最大范围的遵从相关的法律法规。希望所有的会员能够在一个安全愉快的环境下享受我们精心设计的产品和服务并能够从中获利。我们提供最迅捷最安全的提款手续，会员365天×24小时均可申请提款，1分钟至3分钟内到帐') +
                                    '</div>' +
                                    '<br>' +
                                    '<br>' +
                                    '<div class="main-bd">' +
                                        parent.Language.Get('诚挚欢迎您光临“ WM完美娱乐城”，每一位会员在体验过我们的服务后必能充分感受到我们的专业与热情，“ WM完美娱乐城”希望每一位玩家都能尽情享受线上博彩所带来的无限乐趣') +
                                    '</div>';
                            $('#AboutUsContent').html(SetAboutUsContent);

            // 聯繫我們
            var SetContactUsContent = '<div>' + parent.Language.Get('WM完美娱乐城的客服中心全年无休，提供1周7天、每天24小时的优质服务') + '</div>'+
                                      '<div class="text_270"></div><br>'+
                                      '<div>'+
                                            '<span>1. </span><div class="text_271" style="color: #fff;padding-left: 20px;margin-top: -18px;margin-bottom: 6px;">：</div>'+
                                            "<a class='hleps-online' onclick=\"javascript:openChat(" + serviceUrl + ",'900','600');\"'><strong class='text_272'></strong></a>"+
                                        '</div>'+
                                        '<br />'+
                                        '<div class="contact">'+
                                        '</div>';
                                      $('#ContactUsContent').html(SetContactUsContent);

            // 存款幫助
            var SetDepositContent = '<div class="subject text_262"></div>'+
                                    '<div class="main-bd">'+
                                        // parent.Language.Get('您现在可以透过以下方式存款到 WM完美娱乐城') + '：' +
                                        // '<br>'+
                                        // '<br>'+
                                        // '<h1 class="text_276"></h1>'+
                                        //     parent.Language.Get('我们有支持银联转帐，入款银行资讯请点击线上存款，进入公司入款页面即可查看 WM完美娱乐城提供的入款银行资讯') +
                                        // '<br>'+
                                        // '<br><div class="text_278"></div>'+
                                        // '<br>'+
                                        // '<br>'+
                                        // '<h1 class="text_279"></h1>'+
                                        // '<div class="text_280"></div>'+
                                        // '<div>' + parent.Language.Get('选择入款额度，并请确实填写 "联络电话" ，如有任何问题， WM完美娱乐城客服第一时间与您联系') + '</div>' +
                                        // '<div class="text_282"></div>'+
                                        // '<br>'+
                                        // '<div class="text_764"></div>'+
                                        // '<br>'+
                                        // '<div class="text_284"></div>'+
                                        // '<br>'+
                                        // '<div class="text_765"></div>'+
                                        // '<br>'+
                                        // '<br>'+
                                        // '<h1 class="text_286"></h1>'+
                                        // '<div class="text_766"></div>'+
                                        // '<br>'+
                                        // '<br>'+
                                        '<h1 class="text_767">：</h1>'+
                                            parent.Language.Get('WM完美娱乐城单笔最低存款为￥100人民币，单笔最高存款无上限') +
                                        '<div class="text_288"></div>'+
                                        '<div class="text_289"></div>'+
                                    '</div>';
                            $('#DepositContent').html(SetDepositContent);

            // 取款幫助
            var SetWithdrawContent = '<div class="subject text_24"></div>'+
                                       ' <div class="main-bd">'+
                                            // '<h1 class="text_290">：</h1>'+
                                            // '<sapn>1、</span><div class="text_291 plmt"></div>'+
                                            // '<sapn>2、</span><div class="text_292 plmt"></div>'+
                                            // '<sapn>3、</span><div class="text_293 plmt"></div>'+
                                            // '<sapn>4、</span><div class="text_768 plmt"></div>'+
                                            // '<sapn>5、</span><div class="text_295 plmt">：</div>'+
                                            // '<div class="text_769" style="padding-left: 21px;"></div>'+
                                            // '<div class="text_770" style="padding-left: 21px;"></div>'+
                                            // '<br>'+
                                            // '<br>'+
                                            '<h1>【<strong class="text_297"></strong>】</h1>'+
                                            '<sapn>1、</span><div class="text_298 plmt"></div>'+
                                            '<sapn>2、</span><div class="plmt">' + parent.Language.Get('WM完美娱乐城保留权利审核会员账户，若自出款起，有效下注金额未达""每次存款额度""，而申请出款者，公司将收取""存款额度""50%的行政费用，以及￥50元的出款手续费') + '</div>'+
                                            '<div class="text_300"></div>'+
                                            '<div class="text_301"></div>'+
                                            '<br>'+
                                            '<br>'+
                                            '<span>**</span><div class="text_303 plmt">！</div>'+
                                            '<span>**</span><div class="text_304 plmt"></div>'+
                                            '<span>**</span><div class="text_305 plmt"></div>'+
                                            '<span>**</span><div class="plmt">'+ parent.Language.Get('WM完美娱乐城相关优惠，请详见"优惠活动"') + '</div>'+
                                        '</div>';
                                $('#WithdrawContent').html(SetWithdrawContent);

            // 一般常見問題
            var SetGeneralqContent = '<div class="subject text_265"></div>'+
                                        '<div class="main-bd">'+
                                            '<span>Q1：</span><div class="gameqa">' + parent.Language.Get('如何加入 WM完美娱乐城') +'？</div>'+
                                            '<span>A1：</span><div class="gameqa">' + parent.Language.Get('您可以直接点选 "立即注册"，确实填写数据后，可立即登记成为 WM完美娱乐城会员') + '</div>'+
                                            '<br>'+
                                            '<span>Q2：</span><div class="gameqa text_329">？</div>'+
                                            '<span>A2：</span><div class="gameqa">' + parent.Language.Get('可以， WM完美娱乐城提供多种在线存款选择，详情请参照 "存款帮助"') + '</div>'+
                                            '<br>'+
                                            '<span>Q3：</span><div class="gameqa text_331">？</div>'+
                                            '<span>A3：</span><div class="gameqa text_771"></div>'+
                                            '<br>'+
                                            '<span>Q4：</span><div class="gameqa text_333">？</div>'+
                                            '<span>A4：</span><div class="gameqa text_334"></div>'+
                                            '<br>'+
                                            '<span>Q5：</span><div class="gameqa text_335"></div>'+
                                            '<span>A5：</span><div class="gameqa text_336"></div>'+
                                        '</div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<br>'+
                                        '<br>';
                            $('#GeneralqContent').html(SetGeneralqContent);

            // 博彩責任
            var SetResponsiblegambling = '<div class="subject text_17"></div>'+
                                            '<div class="main-bd">'+
                                                '<div>'+
                                                    '<div>' + parent.Language.Get('WM娱乐城致力于忠诚与可信赖的博彩保证。我们公司遵从远端博彩管理当局的适用法规以及指引，而且努力成为对社会负责任的远端博彩运营公司。') + '</div>'+
                                                    '<div>' + parent.Language.Get('远程博彩是全球数以百万玩家的合法娱乐体验。对大多数玩家来说，远端博彩是一项令人愉快的体验，不过，我们也接受这样的现实，少部分沉迷在远端博彩的玩家可能会未达到法定年龄或者出现由于博彩而影响了他们的生活或财务状况的问题。 作为一个对社会负责的公司意味着要关注我们的玩家，意味着要对可能对社会产生影响的问题採用主动的方法去解决。这正是为何 WM娱乐城会採用并完全承诺执行以下最严格的程式和强制。') + '</div>'+
                                                '</div>'+
                                                '<br>'+
                                                '<br>'+
                                                '<h1 class="text_353">：</h1>'+
                                                '<div>'+
                                                    '<div class="text_354"></div>'+
                                                    '<div>' + parent.Language.Get('WM娱乐城要求新客户申明他们已经达到他们所属的司法管辖地区规定的法定年龄且至少年满18岁。当我们怀疑客户可能虚假申报或可能有未成年人试图使用我们的服务时，我们会使用合理的方法进一步进行验证。') + '</div>'+
                                                    '<div class="text_356"></div>'+
                                                    '<div class="text_357"></div>'+
                                                    '<div>' + parent.Language.Get('WM娱乐城不会允许任何未满18岁的人士使用我们的服务。此政策完全遵从并满足监管和给我们发放运营牌照的远端博彩管理当局，First Cagayan Leisure and Resort Corporation (FCRLC) for the Cagayan Economic Zone Authority (CEZA), of Santa Ana, Cagayan，Philippines的规则和规定；') + '</div>'+
                                                '</div>'+
                                                '<br>'+
                                                '<br>'+
                                                '<div>'+
                                                    '<div class="text_359">：</div>'+
                                                    '<div>'+
                                                        '<span>1、</span><div class="plmt text_701"></div>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span>2、</span><div class="plmt text_360"></div>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span>3、</span><div class="plmt text_361"></div>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span>4、</span><div class="plmt">' + parent.Language.Get('不要在 WM娱乐城登录页面上让“保存密码”选项生效。') + '</div>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span>5、</span><div class="plmt text_363"></div>'+
                                                    '</div>'+
                                                    '<div>'+
                                                        '<span>6、</span><div class="plmt text_364"></div>'+
                                                    '</div>'+
                                                    '<br>'+
                                                '</div>';
                                $('#Responsiblegambling').html(SetResponsiblegambling);

            // 企業事務 代理加盟
            var SetAgentJoinContent = '<div class="subject">' + parent.Language.Get('以下为您加入 WM完美娱乐城代理伙伴的原因') + '</div>' +
                                           '<div class="main-bd">'+
                                                '<div>' + parent.Language.Get('WM完美娱乐城拥有多年业界经验和高度专业的经营人员。提供您完善的线上咨询，简易的网上投注介面和最佳的网路自动安全控制。我们希望能让全球的客户都能轻松的进行网上投注。本公司拥有自行开发平台软件能力，提供真人娱乐场、体育、扑克、彩票等等多种游戏。欢迎阁下成为我们的代理伙伴 。') + '</div>'+
                                                '<div class="text_445">！！！</div>'+
                                                '<span>1、</span><div class="text_446 plmt"></div>'+
                                                '<span>2、</span><div class="text_447 plmt"></div>'+
                                                '<span>3、</span><div class="text_448 plmt"></div>'+
                                                '<span>4、</span><div class="text_449 plmt"></div>'+
                                                '<span>5、</span><div class="text_500 plmt"></div>'+
                                                '<span>6、</span><div class="text_450 plmt"></div>'+
                                                '<span>7、</span><div class="text_502 plmt"></div>'+
                                                '<span>8、</span><div class="text_503 plmt"></div>'+
                                                '<div class="text_504"></div>'+
                                                '<br>'+
                                            '</div>';
                                $('#AgentJoinContent').html(SetAgentJoinContent);

            // 企業事務 代理佣金方案
            var SetCommissionContent = '<div class="subject">' + parent.Language.Get('WM完美娱乐城代理佣金方案') + '</div>' +
                                    '<div class="main-bd">' +
                                        '<table class="table1">' +
                                            '<tbody>' +
                                                '<tr>' +
                                                    '<td class="text_451"></td>' +
                                                    '<td class="text_452"></td>' +
                                                    '<td class="text_453"></td>' +
                                                    '<td class="text_454"></td>' +
                                                '</tr>' +
                                                '<tr>' +
                                                    '<td class="text_455"></td>' +
                                                    '<td>1~50,000</td>' +
                                                    '<td class="text_456"></td>' +
                                                    '<td>30%</td>' +
                                                '</tr>' +
                                                '<tr>' +
                                                    '<td class="text_457"></td>' +
                                                    '<td>50,001~500,000</td>' +
                                                    '<td class="text_458"></td>' +
                                                    '<td>35%</td>' +
                                                '</tr>' +
                                                '<tr>' +
                                                    '<td class="text_459"></td>' +
                                                    '<td>500,001~1,000,000</td>' +
                                                    '<td class="text_460"></td>' +
                                                    '<td>40%</td>' +
                                                '</tr>' +
                                            '</tbody>' +
                                        '</table>' +
                                        '<div>' + parent.Language.Get('WM完美娱乐城代理佣金比例详解') + '：</div>' +
                                        '<span>1、</span><div class="text_461 plmt"></div>' +
                                        '<span>2、</span><div class="text_462 plmt"></div>' +
                                        '<span>3、</span><div class="text_463 plmt"></div>' +
                                        '<span>4、</span><div class="text_464 plmt"></div>' +
                                        '<div class="text_465" style="padding-left: 20px;"></div>' +
                                        '<div class="text_466" style="padding-left: 20px;"></div>' +
                                        '<span>5、</span><div class="text_467 plmt"></div>' +
                                    '</div>';
                        $('#CommissionContent').html(SetCommissionContent);

            // 企業事務 代理佣金支付方案
            var SetPayCommissionContent = '<div class="subject">' + parent.Language.Get('WM完美娱乐城代理佣金支付方案') + '</div>'+
                                        '<div class="main-bd">'+
                                            '<div class="text_468"></div>'+
                                            '<div class="text_469"></div>'+
                                            '<div class="text_470"></div>'+
                                            '<div>' + parent.Language.Get('WM完美娱乐城代理佣金结算周期为每月1號中午12点至下个月的1號中午12点。佣金结算日為每月10號，约需7个工作日，经查核无误， WM完美娱乐城代理部门与代理商确定佣金及银行信息后即时发放佣金。') + '</div>'+
                                            '<div class="text_471"></div>'+
                                            '<div class="text_472">。</div>'+
                                            '<div class="text_473"></div>'+
                                            '<div class="text_474"></div>'+
                                            '<div class="text_475"></div>'+
                                            '<div class="text_476"></div>'+
                                            '<div>' + parent.Language.Get('为有效防止非诚信合作商滥用 WM完美娱乐城所提供的代理优惠制度，公司审查部门将严格审核每位代理商注册时提供的个人资料（包括姓名，邮件及电话等）,若经审核发现代理商有任何不良营利企图，或与其他代理商、会员进行合谋套利等不诚信行为， WM完美娱乐城将关闭该合作代理商之账户、扣除账户中的本金，并收回该代理商的所有佣金与优惠。') + '</div>'+
                                            '<br>'+
                                        '</div>';
                        $('#PayCommissionContent').html(SetPayCommissionContent);

            // 企業事務 推薦合營夥伴獎金
            var SetParnertBounsContent = '<div class="subject text_676"></div>'+
                                        '<div class="main-bd">'+
                                            '<table class="table1">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td></td>'+
                                                        '<td class="text_477"></td>'+
                                                        '<td class="text_478"></td>'+
                                                        '<td class="text_479"></td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_480"></td>'+
                                                        '<td>350000</td>'+
                                                        '<td>105000</td>'+
                                                        '<td>30%</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_481"></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td class="text_482"></td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_483"></td>'+
                                                        '<td>80000</td>'+
                                                        '<td>28000</td>'+
                                                        '<td>2800</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_484"></td>'+
                                                        '<td>110000</td>'+
                                                        '<td>38500</td>'+
                                                        '<td>3850</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_485"></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td class="text_486"></td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_487"></td>'+
                                                        '<td>350000</td>'+
                                                        '<td>122500</td>'+
                                                        '<td>1225</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_488"></td>'+
                                                        '<td>-20000</td>'+
                                                        '<td>0</td>'+
                                                        '<td>0</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td class="text_489"></td>'+
                                                        '<td>250000</td>'+
                                                        '<td>87500</td>'+
                                                        '<td>875</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                            '<div class="text_490"></div>'+
                                            '<div class="text_491"></div>'+
                                            '<div class="text_492"></div>'+
                                            '<div class="text_493"></div>'+
                                            '<br>'+
                                            '<div class="text_494"></div>'+
                                            '<div class="text_495"></div>'+
                                            '<div>122500+8750-2000=129250</div>'+
                                            '<br>'+
                                        '</div>';
                            $('#ParnertBounsContent').html(SetParnertBounsContent);

            // 企業事務 客戶推薦標準/支付方式
            var SetCustomPayOptionContent = '<div class="subject">' + parent.Language.Get('WM完美娱乐城客户推荐标准') + '</div>'+
                                            '<div class="main-bd">'+
                                                '<span>1、</span><div class="plmt">' + parent.Language.Get('请注意！推荐玩家在 WM完美娱乐城的注册时间不得早於您代理伙伴账户的注册时间') + '</div>'+
                                                '<span>2、</span><div class="plmt">' + parent.Language.Get('当您成功推荐代理伙伴注册 WM完美娱乐城后，请记得在5个工作日内通知我们，逾期将不会将其登记在您的帐上，若超过5个工作日， WM完美娱乐城有权单方面决定是否接受登记') + '</div>'+
                                                '<span>3、</span><div class="plmt">' + parent.Language.Get('若发现您除了代理账户外，还拥有 WM完美娱乐城的玩家账户，那此账户无论输赢与否，都将不会被记在您的代理账户之下') + '</div>'+
                                                '<span>4、</span><div class="plmt">' + parent.Language.Get('WM完美娱乐城对代理伙伴推荐的玩家质量有一定的要求(如投注量、存款金额、总流水额等等)若玩家未达到相应要求，则将不会被认定为活跃玩家') + '</div>'+
                                                '<br>'+
                                            '</div>';
                            $('#CustomPayOptionContent').html(SetCustomPayOptionContent);

            // 企業事務 會員遊戲點數買賣
            var SetPointTradingContent = '<div class="subject text_678"></div>'+
                                        '<div class="main-bd">'+
                                            '<div class="text_687"></div>'+
                                            '<span>1、</span><div class="plmt text_688"></div>'+
                                            '<span>2、</span><div class="plmt text_689"></div>'+
                                            '<br>'+
                                            '<div class="text_690"></div>'+
                                            '<span>1、</span><div class="plmt text_691"></div>'+
                                            '<span>2、</span><div class="plmt text_692"></div>'+
                                            '<br>'+
                                        '</div>';
                            $('#CustomPayOptionContent').html(SetCustomPayOptionContent);

            // 企業事務 代理申請流程
            var SetAgentApplicationProcessContent = '<div class="subject text_679"></div>'+
                                                    '<div class="main-bd">'+
                                                        '<span>1、</span><div class="plmt text_693"></div>'+
                                                        '<span>2、</span><div class="plmt text_694"></div>'+
                                                        '<span>3、</span><div class="plmt text_695"></div>'+
                                                        '<span>4、</span><div class="plmt text_696"></div>'+
                                                        '<span>5、</span><div class="plmt text_697"></div>'+
                                                        '<span>6、</span><div class="plmt text_698"></div>'+
                                                    '</div>';
                            $('#AgentApplicationProcessContent').html(SetAgentApplicationProcessContent);

            // 企業事務 代理申請
            var SetAgentApplicationContent = '<div class="subject text_440"></div>'+
                                            '<div class="main-bd">'+
                                                '<div class="text_561"></div>'+
                                                '<span>1、</span><div class="plmt text_562"></div>'+
                                                '<span>2、</span><div class="plmt text_563"></div>'+
                                                '<span>3、</span><div class="plmt text_564"></div>'+
                                                '<span>4、</span><div class="plmt text_565"></div>'+
                                                '<span>5、</span><div class="plmt text_566"></div>'+
                                                '<span>6、</span><div class="plmt text_567"></div>'+
                                                '<br>'+
                                                '<div class="inner_title">'+
                                                    '<h1 class="text_568"></h1>'+
                                                '</div>'+

                                                '<div class="table2">'+
                                                    '<form id="regmain" method="post" name="main">'+
                                                        '<p>'+
                                                            '<font class="text_569">：</font>'+
                                                            '<input id="uppid" size="30" class="inp" maxlength="11" name="uppid" />'+
                                                            '<br>'+
                                                        '</p>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_577"></span>：</font>'+
                                                            '<input id="alias" size="30" class="input2" maxlength="10" name="alias">'+
                                                            '<br>'+
                                                            '<div class="note text_571"></div>'+
                                                            '<br>'+
                                                        '</p>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_578"></span>：</font>'+
                                                            '<input name="username" type="text" class="input2" size="30" id="username" maxlength="12">'+
                                                            '<br>'+
                                                            '<div class="note text_572"></div>'+
                                                            '<br>'+
                                                        '</p>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_699"></span>：</font>'+
                                                            '<input id="pwd" maxlength="12" size="30" class="input2" type="password" name="password">'+
                                                            '<br>'+
                                                            '<div class="note text_573"></div>'+
                                                            '<br>'+
                                                        '</p>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_40"></span>：</font>'+
                                                            '<input name="e_mail" size="30" class="input2" id="e_mail" value="" maxlength="30" onfocusout="isEmail(this)">'+
                                                            '<br>'+
                                                            '<div class="note text_574"></div>'+
                                                            '<br>'+
                                                        '</p>'+
                                                        '<p>'+
                                                            '<font>QQ：</font>'+
                                                            '<input id="address" size="30" class="input2" maxlength="11" name="address">'+
                                                            '<br>'+
                                                        '</p>'+
                                                            '<br>'+
                                                        '<p>'+
                                                            '<font>LINE：</font>'+
                                                            '<input id="line" size="30" class="input2" maxlength="20" name="line">'+
                                                            '<br>'+
                                                        '</p>'+
                                                            '<br>'+
                                                        '<p>'+
                                                            '<font>WECHAT：</font>'+
                                                            '<input id="wechat" size="30" class="input2" maxlength="50" name="wechat">'+
                                                            '<br>'+
                                                        '</p>'+
                                                            '<br>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_41"></span>：</font>'+
                                                            '<input id="phone" size="30" class="input2" maxlength="11" name="phone">'+
                                                            '<br>'+
                                                        '</p>'+
                                                            '<br>'+
                                                        '<p>'+
                                                            '<div class="control-group">'+
                                                                '<label class="control-label"> <font>*<span class="text_173"></span>：</font></label>'+
                                                                '<input class="form-control" name="bank" id="bank_address">'+
                                                                // '<select class="form-control" name="bank" id="bank_address" style="color:black;">'+
                                                                    // '<option value="">请选择</option>'+
                                                                    // '<option value="中央銀行">中央銀行</option>'+
                                                                    // '<option value="中華郵政">中華郵政</option>'+
                                                                    // '<option value="中國輸出入銀行">中國輸出入銀行</option>'+
                                                                    // '<option value="全國農業金庫">全國農業金庫</option>'+
                                                                    // '<option value="臺灣銀行">臺灣銀行</option>'+
                                                                    // '<option value="臺灣土地銀行">臺灣土地銀行</option>'+
                                                                    // '<option value="合作金庫商業銀行">合作金庫商業銀行</option>'+
                                                                    // '<option value="第一商業銀行">第一商業銀行</option>'+
                                                                    // '<option value="華南商業銀行">華南商業銀行</option>'+
                                                                    // '<option value="彰化商業銀行">彰化商業銀行</option>'+
                                                                    // '<option value="上海商業儲蓄銀行">上海商業儲蓄銀行</option>'+
                                                                    // '<option value="台北富邦商業銀行">台北富邦商業銀行</option>'+
                                                                    // '<option value="國泰世華商業銀行">國泰世華商業銀行</option>'+
                                                                    // '<option value="兆豐國際商業銀行">兆豐國際商業銀行</option>'+
                                                                    // '<option value="花旗商業銀行">花旗商業銀行</option>'+
                                                                    // '<option value="王道商業銀行">王道商業銀行</option>'+
                                                                    // '<option value="臺灣中小企業銀行">臺灣中小企業銀行</option>'+
                                                                    // '<option value="渣打國際商業銀行">渣打國際商業銀行</option>'+
                                                                    // '<option value="台中商業銀行">台中商業銀行</option>'+
                                                                    // '<option value="京城商業銀行">京城商業銀行</option>'+
                                                                    // '<option value="滙豐商業銀行">滙豐商業銀行</option>'+
                                                                    // '<option value="瑞興商業銀行">瑞興商業銀行</option>'+
                                                                    // '<option value="華泰商業銀行">華泰商業銀行</option>'+
                                                                    // '<option value="臺灣新光商業銀行">臺灣新光商業銀行</option>'+
                                                                    // '<option value="陽信商業銀行">陽信商業銀行</option>'+
                                                                    // '<option value="板信商業銀行">板信商業銀行</option>'+
                                                                    // '<option value="三信商業銀行">三信商業銀行</option>'+
                                                                    // '<option value="聯邦商業銀行">聯邦商業銀行</option>'+
                                                                    // '<option value="遠東國際商業銀行">遠東國際商業銀行</option>'+
                                                                    // '<option value="元大商業銀行">元大商業銀行</option>'+
                                                                    // '<option value="永豐商業銀行">永豐商業銀行</option>'+
                                                                    // '<option value="玉山商業銀行">玉山商業銀行</option>'+
                                                                    // '<option value="凱基商業銀行">凱基商業銀行</option>'+
                                                                    // '<option value="星展商業銀行">星展商業銀行</option>'+
                                                                    // '<option value="台新國際商業銀行">台新國際商業銀行</option>'+
                                                                    // '<option value="日盛國際商業銀行">日盛國際商業銀行</option>'+
                                                                    // '<option value="安泰商業銀行">安泰商業銀行</option>'+
                                                                    // '<option value="中國信託商業銀行">中國信託商業銀行</option>'+
                                                                    // '<option value="other">其他銀行</option>'+
                                                                // '</select>'+
                                                            '</div>'+
                                                            '<br>'+
                                                        '</p>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_175"></span>：</font>'+
                                                                '<input id="Province">'+

                                                                '</input>'+
                                                            '<input id="City"></input>'+
                                                        '</p>'+
                                                            '</br>'+
                                                        '<p>'+
                                                            '<font>*<span class="text_176"></span>：</font>'+
                                                            '<input id="bank_account" class="input2" size="30" maxlength="19" name="bank_account">'+
                                                            '<br>'+
                                                        '</p>'+
                                                            '</br>'+
                                                        '<p>'+
                                                            '<span class="text_581">？</span>'+
                                                            '</br>'+
                                                            '<textarea id="howto" namn = "textareaa"></textarea>'+
                                                        '</p>'+
                                                            '</br>'+
                                                        '<p style="padding-bottom: 70px;">'+
                                                            '<font>&nbsp;</font>'+
                                                            '<a style="padding-top:5px;" id= "addAgentSubmit" class="btn1 text_582"></a>'+
                                                        '</p>'+
                                                    '</form>'+
                                                '</div>'+
                                            '</div>';
                            $('#AgentApplicationContent').html(SetAgentApplicationContent);

            // 游戏及投注问题
            var SetGameBetIssuesContent = '<div class="subject text_263"></div>'+
                                            '<div class="main-bd">'+
                                                '<span>Q1：</span><div class="gameqa text_307">？</div>'+
                                                '<span>A1：</span><div class="gameqa text_308"></div>'+
                                                '<br>'+
                                                '<span>Q2：</span><div class="gameqa text_309">？</div>'+
                                                '<span>A2：</span><div class="gameqa text_772"></div>'+
                                                '<div class="text_773" style="padding-left: 28px;"></div>'+
                                                '<div class="text_774" style="padding-left: 28px;"></div>'+
                                                '<div class="text_775" style="padding-left: 28px;"></div>'+
                                                '<br>'+
                                                '<span>Q3：</span><div class="gameqa text_314">？</div>'+
                                                '<span>A3：</span><div class="gameqa text_315"></div>'+
                                                '<br>'+
                                                '<span>Q4：</span><div class="gameqa text_316">？</div>'+
                                                '<span>A4：</span><div class="gameqa text_317"></div>'+
                                            '</div>';
                            $('#GameBetIssuesContent').html(SetGameBetIssuesContent);
        
            // 规则与条款
            var SetTermsContent = '<div class="subject text_267"></div>'+
                                    '<div class="main-bd">'+
                                        '<h1 class="text_365"></h1>'+
                                        '<div class="text_702"></div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<h1 class="text_367"></h1>'+
                                        '<div>' + parent.Language.Get('我们尽力维持本网站的内容准确，完全，与及最新（自发表的日期计算），然而，我们的公司并不保证内容准确、完整与及最新，并且不对因技术或数据输入出错而负责。此外，发表的信息可能会因日期的改变而不再有效。我们的公司不负责更新这些信息。在使用这些信息之前进行核对是您的责任。我们的公司保留权利去修改或更新本网站的信息，而不用作预先通知。一些产品或服务或会因为受监管或其它限制而不能于所有市场上提供。 本网站所有内容由 WM完美娱乐城在线拥有版权，并保留一切权利。任何未经我们的公司书面批准下的使用，复制，贮存便属非法。本网站所有图案、商标、设计、商业包装与及/或者其它知识产权均由 WM完美娱乐城在线拥有或我们的公司有合法权益；任何未经批准的应用均属违。我们的公司会追讨每一项可能的赔偿(民事或刑事)，起诉任何对本网站的知识财产的非法应用或者滥用') + '</div>'+
                                        '<div class="text_369"></div>'+
                                        '<div class="text_370"></div>'+
                                        '<div class="text_371"></div>'+
                                        '<div class="text_372"></div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<h1 class="text_373"></h1>'+
                                        '<div>'+ parent.Language.Get('用户进入及使用本网站的内容均由用户承担风险。 WM完美娱乐城在线与及任何参与创作、制作或者传播本网站的人士，对任何直接的、偶然的、造成后果的、间接的或惩罚性的损坏，或在您访问过程中出现的损坏、能否使用此网站或任何连接的其它网站、任何错误或内容中的遗漏所引起的无论什么样的损坏，都不会承担责任') + '</div>'+
                                        '<div class="text_375"></div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<h1 class="text_376"></h1>'+
                                        '<div>' + parent.Language.Get('本公司是菲律宾政府卡格扬认证的合法互联网络交易公司，现警告有意与 WM完美娱乐城交易之客户，应注意其国家或居住地的相关法律规定，如有疑问应就相关问题，寻求当地法律见解。本公司将不接受任何客户因违反当地交易相关法令所引起之任何责任') + '</div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<h1 class="text_378"></h1>'+
                                        '<div>'+
                                            '<span>1、</span><div class="plmt text_379"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>2、</span><div class="plmt text_380"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>3、</span><div class="plmt text_381"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>4、</span><div class="plmt text_382"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>5、</span><div class="plmt text_383"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>6、</span><div class="plmt">' + parent.Language.Get('倘若发生遭黑客入侵破坏行为或不可抗拒之灾害导致网站故障或数据损坏，数据丢失等情况，我们将以 WM完美娱乐城在线交易之后备数据数据为最后处理依据；为确保各方真实利益，请各会员交易后打印数据，本公司 WM完美娱乐城才接受投诉及处理') + '</div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>7、</span><div class="plmt text_385"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>8、</span><div class="plmt text_386"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>9、</span><div class="plmt text_497"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>10、</span><div class="plmt text_498"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>11、</span><div class="plmt text_499"></div>'+
                                        '</div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<h1 class="text_387"></h1>'+
                                        '<div>'+
                                            '<span>1、</span><div class="plmt text_388">：</div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>A、</span><div class="plmt text_389"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>B、</span><div class="plmt text_390"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>C、</span><div class="plmt text_391"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>D、</span><div class="plmt text_392"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>2、</span><div class="plmt text_393"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>3、</span><div class="plmt text_394"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>4、</span><div class="plmt text_395"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>5、</span><div class="plmt">' + parent.Language.Get('任何的投诉必须在开打之前提出， WM完美娱乐城不会受理任何开打之后的投诉。所有交易项目(包括走地)；公布获利率时出现的任何打字错误或非故意人为失误') + '</div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>6、</span><div class="plmt text_397"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>7、</span><div class="plmt text_840"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>8、</span><div class="plmt text_828"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>9、</span><div class="plmt text_829">：</div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>（1）</span><div class="plmt text_830" style="padding-left: 33px;"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>（2）</span><div class="plmt text_831" style="padding-left: 33px;"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>（3）</span><div class="plmt text_832" style="padding-left: 33px;"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>（4）</span><div class="plmt text_833" style="padding-left: 33px;"></div>'+
                                        '</div>'+
                                        '<div style="padding-left: 22px;">'+
                                            '<span>（5）</span><div class="plmt text_834" style="padding-left: 33px;"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>10、</span><div class="plmt text_835"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>11、</span><div class="plmt text_836"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>12、</span><div class="plmt text_837"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>13、</span><div class="plmt text_838"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>14、</span><div class="plmt text_839"></div>'+
                                        '</div>'+
                                        '<div>'+
                                            '<span>◆</span><div class="plmt text_398"></div>'+
                                        '</div>'+
                                        '<br>'+
                                        '<br>'+
                                        '<div style="float: right">' + parent.Language.Get('WM完美娱乐城管理层 敬启') + '</div>'+
                                        '<br>'+
                                    '</div>';
                            $('#TermsContent').html(SetTermsContent);

            // 隐私保护规则
            var SetPrivacyContent = '<div class="subject text_268"></div>'+
                                    '<div class="main-bd">'+
                                        '<div>' + parent.Language.Get('此政策将描述 WM完美娱乐城（或在此提及的“我们”）如何处理您提供给我们的信息和数据，以帮助我们维系您与 WM完美娱乐城的关系') + '</div>'+
                                        '<div>' + parent.Language.Get('我们将根据此声明的规定来处理任何提供给我们的（通过 WM完美娱乐城网站（简称“网站”）、客户申请表或任何其他途径）或我们所持有的关于您的个人信息。提交您的信息并使用网站即表示您已同意我们根据本隐私政策使用您的信息。如果您不同意本隐私政策中的条款，请不要使用网站或将您的个人信息提供给我们') + '</div>'+
                                        '<br>'+
                                        '<h1 class="text_402"></h1>'+
                                        '<div class="text_403">：</div>'+
                                        '<span>1、</span><div class="plmt text_404"></div>'+
                                        '<span>2、</span><div class="plmt text_405"></div>'+
                                        '<span>3、</span><div class="plmt text_406"></div>'+
                                        '<span>4、</span><div class="plmt">' + parent.Language.Get('您通过网站、电话或其他方式在 WM完美娱乐城进行的交易详情') + '</div>'+
                                        '<span>5、</span><div class="plmt text_408"></div>'+
                                        '<br>'+
                                        '<div class="text_409">：</div>'+
                                        '<span>1、</span><div class="plmt text_410"></div>'+
                                        '<span>2、</span><div class="plmt text_411"></div>'+
                                        '<span>3、</span><div class="plmt text_412"></div>'+
                                        '<span>4、</span><div class="plmt text_413"></div>'+
                                        '<span>5、</span><div class="plmt text_414"></div>'+
                                        '<span>6、</span><div class="plmt text_415"></div>'+
                                        '<span>7、</span><div class="plmt text_416"></div>'+
                                        '<br>'+
                                        '<h1 class="text_417"></h1>'+
                                        '<div class="text_418"></div>'+
                                        '<br>'+
                                        '<h1 class="text_419"></h1>'+
                                        '<div class="text_420"></div>'+
                                        '<br>'+
                                        '<h1 class="text_421"></h1>'+
                                        '<div>' + parent.Language.Get('客户使用本网站后，我们出于以上目的可能使用cookies技术从服务器中收集客户信息。如果您在 WM完美娱乐城注册或者继续使用网站，则您将被视为同意我们使用Cookies') + '</div>'+
                                        '<div class="text_423"></div>'+
                                        '<div class="text_424"></div>'+
                                        '<br>'+
                                        '<h1 class="text_425"></h1>'+
                                        '<div class="text_426"></div>'+
                                        '<br>'+
                                        '<h1 class="text_427"></h1>'+
                                        '<div class="text_428"></div>'+
                                        '<div>'+ parent.Language.Get('为遵循 WM完美娱乐城的法律和制度方面的要求以及 WM完美娱乐城本身内部的风险管理程序，我们将在您的账户关闭后对信息保留一段时间（通常不超过6年）。所有此类信息均将根据此隐私声明的规定来保存') +'</div>'+
                                        '<br>'+
                                        '<h1 class="text_430"></h1>'+
                                        '<div class="text_431"></div>'+
                                        '<br>'+
                                        '<h1 class="text_432"></h1>'+
                                        '<div class="text_433"></div>'+
                                        '<div class="text_434"></div>'+
                                    '</div>';
                            $('#PrivacyContent').html(SetPrivacyContent);

            // 技术常见问题
            var SetTechqContent = '<div class="subject text_264"></div>'+
                                    '<div class="main-bd">'+
                                        '<span>Q：</span><div class="plmt text_318">？</div>'+
                                        '<br>'+
                                        '<span>1、</span><div class="plmt text_319"></div>'+
                                        '<span>2、</span><div class="plmt text_320"></div>'+
                                        '<span>3、</span><div class="plmt text_321"></div>'+
                                        '<span>4、</span><div class="plmt text_322"></div>'+
                                        '<span>5、</span><div class="plmt text_323"></div>'+
                                        '<span>6、</span><div class="plmt text_325"></div>'+
                                    '</div>';
                            $('#TechqContent').html(SetTechqContent);
        },
    };
    var LanguageSelect = {
        $top : {},
        $css : {},
        Initial: function() {
            this.$top = $('.lang-select');
            this.$btnLanguage = $('.lang-box');
            this.$css = $('#languageCss');
            this.Set(parent.Public.GetLocalStorage('language'));
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$top.find('li a').on('click', this.Change);
        },
        Change: function()
        {
            var $this = $(this);
            var lang = $this.prop('id');
            localStorage.language = lang;
            LanguageSelect.Set(lang);
            window.parent.Public.goHome();
        },
        Show: function()
        {
            LanguageSelect.$top.hasClass('active')
                ? LanguageSelect.$top.removeClass('active')
                : LanguageSelect.$top.addClass('active');

            LanguageSelect.$top.find('li a i').css('display','block');
        },
        Hide: function()
        {
            LanguageSelect.$top.hide();
        },
        Set: function(lang)
        {
            localStorage.language = lang;
            $('html').attr('language', lang);

            var cssUrl = (lang == 'cn') ? "../../css/language.css" : "../../css/language_" + lang + ".css?2020121200000";
            LanguageSelect.$css.prop('href', cssUrl);
            
            LanguageSelect.ChangeLangLogo(lang);
        },
        ChangeLangLogo: function(lang)
        {
            var langShow = 'flag-icon-' + lang;
            LanguageSelect.$btnLanguage.find('a i').css('display', 'none');
            LanguageSelect.$btnLanguage.find('.' + langShow).css('display','block');
        },
    };
    app.initial();
})();