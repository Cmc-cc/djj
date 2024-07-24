(function($){
    var App = {
        UserMainErrorNum: 0,
        urlIsApp: false,

        /* 初始 */
        Initial: function()
        {
            UrlIsApp.Initial();
            SystemError.Initial();
            Home.Initial();
            UserCenter.Initial();
            MobileUrl.Initial();
            GameReport.Initial();
            TransferReport.Initial();
            Withdrawals.Initial();
            BankDeposit.Initial();
            Recharge.Initial();
            News.Initial();
            Offer.Initial();
            Game.Initial();
            WalletCenter.Initial();
            invite.Initial();
            MemberManager.Initial();
            ChangeWithdrawPwd.Initial();   //修改提現密碼
            ChangeLoginPwd.Initial();      //修改登入密碼
            Login.Initial();               //登入
            PromotionQRCode.Initial();     //QRcode
            LayerMember.Initial();         //下線列表
            SetBouns.Initial();            //下線預設返水
            Layermember_Report.Initial();  //下線報表查詢
            SetOfflineWater.Initial();     //下線列表裡的下線預設返水
            UserSet.Initial();
            FreePlay.Initial();            //確認試玩視窗
            Promotions.Initial();          //優惠活動
            AddBankcard.Initial();         //新增銀行卡視窗
            DeleteBankcard.Initial();      //刪除銀行卡
            Electronicgames.Initial();     //電子遊戲清單
            Registion.Initial();
            PointList.Initial();           //點數公告
            PointTransfer.Initial();       //點數轉移
            SpeedMeasuring.Initial();      //api測速
            JoinUs.Initial();              //加入我們
            // Live.Initial();                //直播
            LanguageSelect.Initial();      //抓預設語系
            AboutUs.Initial();             //關於我們
            ChackAppVersion.Initial();     //確認APP版本
            BankManagement.Initial();            //銀行卡管理

            this.DefaultTime();            //預設時間初始值
            this.BindEvents();
            App.UserMain();
            App.ChangeImg();

            setInterval(function() {Public.Api.checkDeposit({done: App.CheckDeposit,});}, 180000);
            setInterval(function() {Home.GetOnlinePeople()}, 20000);
        },
        /* 事件 */
        BindEvents: function()
        {
            // $('div[gamelistbtn="lottery"]').on('click', function(){
            //     alert(Language.Get('即将开放'));
            // });
            // $('div[gamelistbtn="eSports"]').on('click', function(){
            //     alert(Language.Get('即将开放'));
            // });
            // // $('div[gamelistbtn="chess"]').on('click', function(){
            //     alert(Language.Get('即将开放'));
            // });

            $('.SportMImg').on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                if (sid == '' || sid == undefined)
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
            });
            $('.BulletinImg').on('click', function(){
                $('.BulletinImg').css({
                    'display':'none',
                });
            });

            var andisapp = Public.GetConfig('ISAPP');
            var iosisapp = App.urlIsApp;

            if(! (localStorage.sid))
            {
                if(andisapp == true || iosisapp == true)
                {
                    $('.home-register').hide();
                    $('#btn-login-registion').hide();
                }
                // else
                // {
                //     $('#home-register').show();
                //     $('#home-login').show();
                //     $('#home-register').on('click', function(){
                //         $('.login-wrapper').show();
                //     });
                //     $('#home-login').on('click', function(){
                //         $('.login-wrapper').show();
                //     });
                // }
            }
            // else if(localStorage.sid && localStorage.isTest == '0')
            // {
            //     $('#free-play').hide();
            //     $('a[data-page-name="wallet-center"]').show();
            //     $('a[data-page-name="offer"]').show();
            //     $('#home-register').hide();
            // }

        },
        /* 確認使用者是否註冊 及取得會員資訊 */
        UserMain: function()
        {
            if (App.UserMainErrorNum > 1)
            {
                SystemError.Do('UserMain Error: ' + App.UserMainErrorNum, 'error');
                App.UserLoginFail();
                return ;
            }
            App.UserMainErrorNum ++;

            var sid = Public.GetLocalStorage('sid');
            // weixin
            var code = Public.GetUrlData('code');
            var refreshToken = Public.GetLocalStorage('refreshToken');
            // weixin防封
            var token = Public.GetUrlData('token');
            var uuid = Public.GetLocalStorage('uuid');

            var param = {
                done: function(response)
                {
                    var response = typeof(response) === 'object' ? response : {};
                    var status = response.status;
                    var message = response.msg;
                    $('#main-container').show();

                    if (status === 0)
                    {
                        Public.Api.CreateGameUser();
                        App.UserMainDone();
                        return ;
                    }

                    if (status !== 0 && ! code && ! refreshToken && ! token)
                    {
                        App.UserLoginFail();
                        if (status != '-20' && status != '-1011' && status != '-1013' && status != '-1014')
                        {
                            SystemError.Do(message, 'error');
                        }
                        return ;
                    }

                    Public.GetConfig('WEIXINMODE') === 'WPB' ? App.WPBUserInfoMain(token, uuid) : App.WechatUserInfo(code, refreshToken);
                },
                fail: function()
                {
                    App.UserLoginFail();
                }
            };
            Public.Api.SetUserInfo(param);
        },
        WechatUserInfo: function(code, refreshToken)
        {
            var param = {
                data: {code: code, refreshToken: refreshToken},
                done: function(response)
                {
                    var response = typeof(response) === 'object' ? response : {};
                    var status = response.status == 0 ? true : false;
                    var message = typeof(response.msg) === 'object' ? response.msg : {};

                    if (! status)
                    {
                        SystemError.Do(Language.Get('取得资讯失败') + '：' + message, 'error');
                        App.UserLoginFail();
                        return ;
                    }
                    App.Register((message.nickname || ''), (message.sex || ''), message.openId, JSON.stringify(message))
                }
            };
            Public.Api.WechatUserInfoMain(param);
        },
        WPBUserInfoMain: function(token, uuid)
        {
            var param = {
                data: {token: token, uuid: uuid},
                done: function(response)
                {
                    var response = typeof(response) === 'object' ? response : {};
                    var status = response.status == 0 ? true : false;
                    var message = typeof(response.msg) === 'object' ? response.msg : {};
                    var data = typeof(message.data) === 'object' ? message.data : {};
                    if (! status)
                    {
                        SystemError.Do(Language.Get('取得资讯失败') + '：' + message, 'error');
                        App.UserLoginFail();
                        return ;
                    }
                    App.Register((data.name || ''), (data.sex || ''), data.uuid, JSON.stringify(data))
                }
            };
            Public.Api.WPBUserInfoMain(param);
        },
        Register: function(truename, sex, wechatId, wechatNote)
        {
            var data = {
                truename: truename,
                sex: sex,
                pid: Public.GetUrlData('pid'),
                upid: Public.GetUrlData('upid'),
                wechatId: wechatId,
                wechatNote: wechatNote,
            };
            var registerParam = {
                data: data,
                done: function(response)
                {
                    var response = typeof(response) === 'object' ? response : {};
                    var status = response.status;
                    var message = response.msg || 'Register Error';

                    if (! [0, '0', '-9', -1825, '-1825'].includes(status))
                    {
                        SystemError.Do(message, 'error');
                        App.UserLoginFail();
                        return ;
                    }
                    Public.Api.WechatLogin({data: {wechatId: data.wechatId}, done: App.UserMain});
                }
            };
            Public.Api.Register(registerParam);
        },
        /* 取得會員資訊後執行 */
        UserMainDone: function()
        {
            console.log('done');

            // $('.SportMask1').on('click', function(){
            //     $('.Img1').css({'display':'none',});
            //     $('.Img2').css({'display':'initial',});
            // });

            $('.SportMask').on('click', function(){
                $('.SportImg, .SportMask').css({
                    'display':'none',
                });
                // $('.SportImg, .Img2').css({'display':'none',});
                $('.BulletinImg').css({
                    'display':'block',
                    'background-color':'rgba(0,0,0,0.6)',
                });
                if (News.$BulletinStatus)
                {
                    // 後台設置的公告顯示 
                    var popWindow = document.querySelector('#bulletin-dialog');
                    popWindowEvent.open(popWindow, popWindow);
                }
            });

            document.querySelector('#bulletin-dialog .modal-close, .SportMask').addEventListener('click', () => {
                soundObj.flag_bg == 'true' && soundObj.play();
                welcomesoundObj.flag_wc == 'true' && welcomesoundObj.soundPlay();
            }, false);

            Public.UserMainStatus = true;
            App.UserMainErrorNum = 0;

            Home.CkeckIsFreePlay();
            Home.SetInfo();
            Home.CheckAccountSet();
            Home.Setuserinfo();
            Home.SetTransfer();

            UserCenter.SetInfo();
            UserCenter.CheckAccountSet();
            UserCenter.SetHeadImg();

            UserSet.SetUsername();

            UserCenter.SetUserMoneyLoading();
            Public.Api.reverseLastGameMoney({
                done: function() {
                    Public.Api.GetMoney({
                        done: function(){
                            UserCenter.SetUserMoney();
                            Recharge.SetUserMoney();
                            Home.SetUserMoney();
                            WalletCenter.SetUserMoney();
                        },
                    });
                },
            });

            PromotionQRCode.Main();
            /*檢查是否有未讀訊息 但不包含最新公告*/
            Public.Api.GetUserNews({data: {page: News.page}, done: News.SetUserHaveread});
            /*一開始進入的公告*/
            // Public.Api.GetWechatNews({done: News.GetBulletin});
            Public.Api.GetSystemNews({done: Home.GetmarqueeDone});
            Login.Hide();
        },
        /* 登入失敗 */
        UserLoginFail: function()
        {
            console.log('fail');
            Home.Setuserinfo();
            Home.SetUserMoney();
            Public.UserMainStatus = true;
            /*失敗時會顯示loading及登入頁面*/
            // $('.pages-loading-box').removeClass('ani').css('display', 'none');
            // $('body').addClass('no-scroll');
            // Login.$top.css('display', 'block');
            // Registion.setView();

            // $('.SportMask1').on('click', function(){
            //     $('.Img1').css({'display':'none',});
            //     $('.Img2').css({'display':'initial',});
            // });

            $('.SportMask').on('click', function(){
                $('.SportImg, .SportMask').css({
                    'display':'none',
                });
                // $('.SportImg, .Img2').css({'display':'none',});
                $('.BulletinImg').css({
                    'display':'block',
                    'background-color':'rgba(0,0,0,0.6)',
                });
                if (News.$BulletinStatus)
                {
                    // 後台設置的公告顯示 
                    var popWindow = document.querySelector('#bulletin-dialog');
                    popWindowEvent.open(popWindow, popWindow);
                }
            });

            document.querySelector('#bulletin-dialog .modal-close, .SportMask').addEventListener('click', () => {
                soundObj.flag_bg == 'true' && soundObj.play();
                welcomesoundObj.flag_wc == 'true' && welcomesoundObj.soundPlay();
            }, false);
        },
        /* 預設時間 */
        DefaultTime: function()
        {
            var time = new Date();
            var endTime = time.toISOString().substring(0,10);      
            var year = time.toISOString().substring(0,4);
            var month = time.toISOString().substring(5,7);
            var day = '01';

            startTime = year + '-' + month + '-' + day;     //設定當月月初
            TransferReport.$startTime.val(startTime);
            TransferReport.$endTime.val(endTime);
            GameReport.$startTime.val(startTime);
            GameReport.$endTime.val(endTime);
            Layermember_Report.$startTime.val(startTime);
            Layermember_Report.$endTime.val(endTime);
        },
        /* 入帳成功提示框 */
        CheckDeposit: function(response)
        {
            if (response.status == '0' && response.msg != false)
            {
                App.UserMainDone();
                Offer.CheckDepositMain();
                alert(response.msg);
            }
        },
        ChangeImg: function(){
            // var title = Public.GetConfig('TITLE');
            // $(document).attr("title", parent.Language.titleLanguage(title));
            var imgType = Public.GetConfig('IMGTYPE');
            $("#icon").attr("href", "images/favicon" + imgType + ".ico");
            $('.login-icon img').css({
                'content': "url(./resource/images/hall_logo" + imgType + ".png)",
                'width': 'auto',
                'height': 'auto',
                'max-width': '100%',
                'max-height': '100%',
            });
            $('.guide-photo').find('#backGround').css({
                'content': "url(./images/loading/guide-3.jpg)",
            });
        },
    };
    /* 登入 */
    var Login = {
        $top: {},
        $username: {},
        $password: {},
        $btn_remember: {},
        $btn_login: {},
        $captcha: {},
        $close: {},
        $verifiCode: {},
        $captcha_img: {},
        $registusername: {},
        $registpassword: {},
        $registpassword2: {},
        $gologin: {},
        $btn_gohome: {},
        $flag: Public.GetLocalStorage('rememberflag'),
        
        Initial: function()
        {
            this.$top = $('.login-wrapper');
            this.$username = this.$top.find('#account');
            this.$password = this.$top.find('#password');
            this.$remember_box = this.$top.find('.remember_box');
            this.$btn_remember = this.$top.find('#btn_remember');
            this.$btn_login = this.$top.find('#btn-login');
            this.$captcha = this.$top.find('#captcha');
            this.$close = $('.pages-container').find('.close-btn');
            this.$captcha_img = this.$top.find('#captcha_img');
            this.$login_service = this.$top.find('#login_service');
            this.$login_FreePlay = this.$top.find('#login_FreePlay');
            // this.$registion = this.$top.find('#registion');
            this.$registusername = this.$top.find('#registusername');
            this.$registpassword = this.$top.find('#registpassword');
            this.$registpassword2 = this.$top.find('#registpassword2');
            this.$gologin = this.$top.find('#gologin');
            this.$registion = this.$top.find('#btn-login-registion');
            this.$btn_gohome = this.$top.find('#btn-gohome');
            this.$loginclose = this.$top.find('.login-close');
            this.$login_service = this.$top.find('.forget_pwd');

            this.Setinfo();
            /*判斷一開始是否要讓記住密碼顯示*/
            this.Remember_show();
            /*產生驗證碼*/
            this.VerifiCode();
            /*判斷是否可以點選登入鍵*/
            // this.IsClickLogin();
            this.BindEvents();
        },
        BindEvents: function()
        {
            /*記住密碼*/
            this.$remember_box.on('click', function(){
                var $this = $(this);
                if (!Login.$flag)
                {
                    Login.$btn_remember.removeClass('btn_remember_noactive').addClass('btn_remember_active');
                    // $this.addClass('btn_remember_active').find('i');
                    // $this.find('i').addClass('btn_remember_i_active');
                    Login.$flag = true;
                }
                else
                {
                    Login.$btn_remember.removeClass('btn_remember_active').addClass('btn_remember_noactive');
                    // $this.removeClass('btn_remember_active');
                    // $this.find('i').removeClass('btn_remember_i_active');
                    Login.$flag = false;
                }
            });

            /*聯繫客服*/
            this.$login_service.on('click', function(){
                $SERVICEURL = Public.GetConfig('SERVICEURL');
                if($SERVICEURL)
                {
                    Public.ParentGoTo($SERVICEURL);
                }else
                {
                    alert(Language.Get('暂不开放'));
                    return false;
                }
            });

            /*判斷是否可以點選登入鍵*/
            // this.$username.on('keyup', Login.IsClickLogin);
            // this.$password.on('keyup', Login.IsClickLogin);
            /*登入按鈕*/
            this.$btn_login.on('click', function(){
                var $this = $(this);
                // Login.$btn_login.removeClass('active').addClass('noallowed');
                Login.Remember(); //執行記住密碼的事件
                Login.Do();
                // Login.Check_captcha();
            });
            /*點擊圖片換驗證碼*/
            this.$captcha_img.on('click', Login.VerifiCode);
            /*聯繫客服*/
            this.$login_service.on('click', function(){
                $SERVICEURL = Public.GetConfig('SERVICEURL');
                if($SERVICEURL)
                {
                    Public.ParentGoTo($SERVICEURL);
                }else
                {
                    alert(Language.Get('暂不开放'));
                    return false;
                }
            });
            this.$login_FreePlay.on('click', FreePlay.Show);
            /*前往註冊區塊*/
            this.$registion.on('click', function(){
                Login.$top.find('.content-box').css('left','-100vw');
            });
            /*前往登錄區塊*/
            this.$gologin.on('click', function(){
                Login.$top.find('.content-box').css('left','0');
            });
            /*前往大廳*/
            this.$btn_gohome.on('click', function(){
                Login.$top.css('display','none');
            });
             /*登入頁面*/
             this.$loginclose.on('click', function(){
                Login.$top.css('display','none');
            });
            /*前往註冊頁面*/
            this.$registion.on('click', function(){
                Registion.setView();
            });


             /*開啟關閉齒輪設定*/
            $('.setting-icon').on('click', this.OpenSetting);
            $('.close-icon').on('click', this.CloseSetting);
        },

        Do: function()
        {
            var param = {
                data: {username: Login.$username.val(), password: Login.$password.val()},
                done: Login.Done,
            };
            Public.Api.Login(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }
            if (status === '0')
            {
                if(Public.GetUrlData('isapp'))
                {
                    var u = navigator.userAgent;
                    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                    if(isAndroid != true)
                    {
                        window.webkit.messageHandlers.loginResult.postMessage(true);
                    }
                }
                App.UserMain();
                // location.reload();
            }
            if (status != 0)
            {
                SystemError.Do(msg, 'error');
                Login.$username.val('');
                Login.$password.val('');
            }
        },
        Hide: function()
        {
            Login.$top.hide();
        },
        /*產生驗證碼*/
        VerifiCode: function()
        {
            //隨機驗證碼號碼
            Login.$verifiCode = Math.random().toString().slice(5,9);
            //產生驗證碼圖片
            Login.$captcha_img.attr('src', window.Public.GetConfig('APIURL') + '?109&cmd=109&verifiCode=' + Login.$verifiCode);
        },
        /*檢查驗證碼*/
        Check_captcha: function()
        {
            var $captcha = Login.$captcha.val();
            var check_captcha = $captcha === this.$verifiCode ? true : false;
            if (check_captcha == true)
            {
                Login.Remember(); //執行記住密碼的事件
                Login.Do();
            }
            else if (check_captcha == false)
            {
                SystemError.Do(Language.Get('验证码输入失败,请重新输入') + '！', 'error');
                Login.$captcha.val('');
                Login.VerifiCode();
            }
        },
        Setinfo: function()
        {
            Login.$username.val(Public.GetLocalStorage('loginaccount') || '');
            Login.$password.val(Public.GetLocalStorage('loginpassword') || '');
        },
        Remember: function()
        {
            if (Login.$flag)
            {
                Public.SetLocalStorage({
                    rememberflag: Login.$flag,
                    loginaccount: Login.$username.val(),
                    loginpassword: Login.$password.val(),
                });
            }
            else
            {
                Public.SetLocalStorage({rememberflag: Login.$flag});
                Public.ClearLocalStorage('loginaccount');
                Public.ClearLocalStorage('loginpassword');
            }
        },
        Remember_show: function()
        {
            if (Login.$flag == 'true')
            {
                Login.$btn_remember.removeClass('btn_remember_noactive').addClass('btn_remember_active');
                Login.$flag = true;
            }
            else
            {
                Login.$btn_remember.removeClass('btn_remember_active').addClass('btn_remember_noactive');
                Login.$flag = false;
            }
        },
        SetPlaceholder: function()
        {
            Login.$top.find('#account').attr('placeholder',Language.Get('帐号'));
            Login.$top.find('#registusername').attr('placeholder',Language.Get('帐号'));
            Login.$top.find('#password').attr('placeholder',Language.Get('密码'));
            Login.$top.find('#registpassword').attr('placeholder',Language.Get('密码'));
            Login.$top.find('#registpassword2').attr('placeholder',Language.Get('确认密码'));
            Login.$top.find('#captcha').attr('placeholder',Language.Get('验证码'));
        },
         /*開啟齒輪設定*/
        OpenSetting: function()
        {
            $('#box-setting2').show();
            $('.close-icon').show();
            $('.setting-icon').hide();
        },
        /*關閉齒輪設定*/
        CloseSetting: function()
        {
            $('#box-setting2').hide();
            $('.close-icon').hide();
            $('.setting-icon').show();
        },
        IsShow: function()
        {
            $('.login-wrapper').show();
            var andisapp = Public.GetConfig('ISAPP');
            var iosisapp = App.urlIsApp;
            if(! localStorage.sid)
            {
                if(andisapp == true || iosisapp == true)
                {
                    $('.home-register').hide();
                    $('#btn-login-registion').hide();
                }
            }
        },
        /*登入按鈕是否顯示*/
        // IsClickLogin: function()
        // {
        //     var username = Login.$username.val();
        //     var password = Login.$password.val();
        //     if (username == '' || password == '')
        //     {
        //         Login.$btn_login.removeClass('active').addClass('noallowed');
        //     }
        //     else
        //     {
        //         Login.$btn_login.removeClass('noallowed').addClass('active');
        //     }
        // },
    };    

    var UrlIsApp = {
        Initial: function()
        {
            if(Public.GetUrlData('isapp'))
            {
                console.log('app');
                App.urlIsApp = true;
            }
            else
            {
                console.log('H5');
            }
        },
    };

    var SystemError = {
        $top: {},
        $icon: {},
        $message: {},
        $system_bar: {},
        timer: 3,
        length: 0,

        Initial: function()
        {
            this.$top = $('.system-bar-box');
            this.$icon = this.$top.find('.icon');
            this.$message = this.$top.find('.message');
            this.$system_bar = this.$top.find('.system-bar');
        },
        Do: function(message, status)
        {
            alert(message);
            return ;

            status == 'success' 
                ? SystemError.$system_bar.removeClass('error').addClass('success')
                : SystemError.$system_bar.removeClass('success').addClass('error');
            SystemError.length ++;
            SystemError.$message.html(message);
            SystemError.Show();

            setTimeout(function(){
                SystemError.length --;

                if (SystemError.length === 0)
                {
                    SystemError.Hide();
                }
            }, (SystemError.timer * 1000));

        },
        Show: function()
        {
            SystemError.$top.addClass('active');
        },
        Hide: function()
        {
            SystemError.$top.removeClass('active');
        }
    };

    /* Home */
    var Home = {
        $top: {},
        $trailModal: {},
        $freeplay_button: {},
        $logout: {},
        $news: {},
        $offer: {},
        $event: {},
        $walletcenter: {},
        $usercenter: {},
        $btnsound: {},
        $service:{},
        $invite: {},
        $marquee: {},
        $appdownload: {},
        $accountSet: {},
        $accountNote: {},
        $usernumber: {},
        $account: {},
        $str: {},
        $tab_left: {},
        $home: {},
        $home_login: {},
        $home_register: {},
        $onlinepeople: {},

        Initial: function()
        {
            this.$top = $('#main-container');
            this.$trailModal = $('#trailModal');
            this.$freeplay_button = this.$top.find('#free-play');
            this.$logout = $('.logout');
            this.$fullLogout = this.$top.find('.version .number');
            this.$news = this.$top.find('a[data-page-name=news]');
            this.$offer = this.$top.find('a[data-gipage-name=offer]');
            this.$event = this.$top.find('a[data-menu=event]');
            this.$walletcenter = this.$top.find('a[data-page-name=wallet-center]');

            this.$appdownload = this.$top.find('a[data-menu=mobile]');
            this.$usercenter = this.$top.find('a[data-page-name=user-center]');
            this.$home = this.$top.find('a[data-menu=home]');
            this.$recharge = this.$top.find('div[data-pop=recharge-dialog]');
            this.$btnsound = this.$top.find('#btn-sound');
            this.$service = this.$top.find('a[data-menu=service]');
            this.$invite = this.$top.find('a[data-pop=invite-dialog]');
            this.$marquee = this.$top.find('.home-marquee');
            this.$accountSet = this.$top.find('#accountSet');
            this.$accountNote = this.$top.find('#accountNote');
            this.$usernumber = $('.home-link-bar').find('#usernumber');
            this.$account = $('.home-link-bar').find('#account');
            this.$money = $('.home-link-bar').find('#money');
            this.$lockmoney = $('.home-link-bar').find('#lockmoney');

            this.$gameitem = $('.gamelist-wrapper').find('.gameitem');
            this.$gamelistType = $('.gamelist-wrapper').find('.gamelist-type');
            this.$sportitem = $('.gamelist-wrapper').find('.sport');
            this.$liveitem = $('.gamelist-wrapper').find('.live');
            this.$lotteryitem = $('.gamelist-wrapper').find('.lottery');
            this.$eSportsitem = $('.gamelist-wrapper').find('.eSports');
            this.$slotgameitem = $('.gamelist-wrapper').find('.slotgame');
            this.$chessitem = $('.gamelist-wrapper').find('.chess');

            this.$tab_left = $('.home-link-bar').find('.tab-left');
            this.$home_login = this.$top.find('.home-login');
            this.$home_register = this.$top.find('.home-register');
            this.$home_account = this.$top.find('.home-account');
            this.$home_logout = this.$top.find('.home-logout22');
            this.$onlinepeople = this.$top.find('.onlinepeople');
            this.$withdrawdialog = this.$top.find('div[data-pop=withdraw-dialog]');

            this.$banner = this.$top.find('.banner');
            this.$transbtn = this.$top.find('.trans-btn');

            this.BindEvents();
            this.SetVersion();
            // this.Getmarquee();
            this.GetOnlinePeople();
        },
        BindEvents: function()
        {
            var homeJumpUrl = window.Config.EXTERNALURL;
            $('.SportMImg').css('background', 'url(' + homeJumpUrl + '/images/SportMImg.png)');
            // $('.SportMImg1').css('background', 'url(' + homeJumpUrl + '/images/SportMImg1.png)');
            
            // var homeJumpUrl = window.Config.QRPAYURL;
            // $('.SportMImg').css('background', 'url(' + homeJumpUrl + '/SportMImg.png)');
            
            $('.SportMImg').css('background-size', '100% 100%');
            $('.SportMImg').css('background-position', 'center');
            // $('.SportMImg1').css({'background-size': '90% 95%', 'background-repeat': 'no-repeat'});
            // $('.SportMImg, .SportMImg1').css('background-position', 'center');

            var sid = Public.GetLocalStorage('sid');
            if (sid == '' || sid == undefined)
            {
                this.$home_login.css('display','block');
                this.$home_register.css('display','block');
            }
            else
            {
                $('.home-account-display').css('display','block');
                this.$home_account.html(Public.GetLocalStorage('username'));
                this.$home_logout.css('display','block');
            }

            this.$home_logout.on('click', function(){Public.Api.Logout(true);});

            /*試玩*/
            this.$freeplay_button.on('click', FreePlay.Show);
            this.$logout.on('click', function(){Public.Api.Logout(true);});
            this.$fullLogout.on('click', function(){Public.Api.Logout(true);});
            /*開啟關閉齒輪設定*/
            $('.setting-icon').on('click', this.OpenSetting);
            $('.close-icon').on('click', this.CloseSetting);
            /*取得公告信息資訊*/
            this.$news.on('click', News.Main);
            /*取得優惠信息資訊*/
            this.$offer.on('click', Offer.Main);
            /*取得優惠活動資訊*/
            this.$event.on('click', function(){
                Promotions.GetItemList();
                //如果沒有優惠活動的話,就不會執行判斷
                var slide_active = $('.event-banner-list').find('.swiper-slide-active').length;
                if (slide_active != 0)
                {
                    Promotions.$list_left = $('.event-banner-list').find('.swiper-slide-active').offset().left;
                }
            });
            /*取得充提紀錄*/
            // this.$walletcenter.on('click', WalletCenter.GetReport);
            // this.$usercenter.on('click', App.UserMainDone);

            this.$service.on('click', function(){
                $SERVICEURL = Public.GetConfig('SERVICEURL');
                var SERVICEIFRAME = Public.GetConfig('SERVICEIFRAME');
                var url = Public.GetConfig('GAMEURL');

                if (! $SERVICEURL)
                {
                    alert(Language.Get('暂不开放'));
                    return false;
                }
                $SERVICEURL = (SERVICEIFRAME && parent != window) ? (url + '?url=' + $SERVICEURL) : $SERVICEURL;
                Public.ParentGoTo($SERVICEURL);
            });

            // this.$walletcenter.on('click', Recharge.PlatformtypeDo);

            $('.call-server').on('click', function(){
                alert(Language.Get('请联系客服'));
                return false;
            });
            $('body').on('click', 'a[data-pop=invite-dialog]', App.UserMain);

            /* 新版面的功能區 */
            $('.gameitem').on('click', function(){
                var $this = $(this);
                var type = $this.attr('gamelistBtn');
                // if(type != 'eSports')
                // {
                    $this.addClass('active').siblings().removeClass('active');
                    Home.$gamelistType.siblings('[gamelistType=' + type + ']').addClass('active').siblings().removeClass('active');
                // }
            });
            Home.$tab_left.on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                if (sid == '' || sid == undefined)
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                }
            });

            Home.$home_login.on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                if (sid == '' || sid == undefined)
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
            });

            Home.$home_register.on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                if (sid == '' || sid == undefined)
                {
                    Registion.setView();
                    return false;
                }
            });

            // 未登入時 點存款 取款 個人中心 導註冊頁
            this.$recharge.on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                var isTest = Public.GetLocalStorage('isTest');
                if(localStorage.isCredit == '1')
                {
                    alert(Language.Get('你的上层代理为信用代理, 不开放使用存提功能'));
                    return false;
                }
                if (sid == '' || sid == undefined)
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
                else if (isTest == '1')
                {
                    return false;
                }
                else
                {
                    App.UserMainDone();
                    Recharge.$select.html('');
                    Recharge.$decimal.html('');
                    Recharge.$moneylimit.html('');
                    Recharge.$note.html('');
                    Recharge.PlatformtypeDo();
                } 
            });
            this.$withdrawdialog.on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                var isTest = Public.GetLocalStorage('isTest');
                if(localStorage.isCredit == '1')
                {
                    alert(Language.Get('你的上层代理为信用代理, 不开放使用存提功能'));
                    return false;
                }
                if (sid == '' || sid == undefined)
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
                else if (isTest == '1')
                {
                    return false;
                }
                else
                {
                    Withdrawals.SetBank();
                } 
            });
            $('a[data-page-name="news"]').on('click', function(){
                var sid = Public.GetLocalStorage('sid');
                if (sid == '' || sid == undefined)
                {
                    // $('.login-wrapper').show();
                    $('.pages-container').hide();
                    Login.IsShow();
                    return false;
                }
            });

            $('.serviceqrclose').on('click', function(){
                $('a[data-menu="serviceqr"]').removeClass('active');
                $('a[data-menu="home"]').addClass('active');
            });

            this.$banner.on('click', function(){
                Promotions.GetItemList();
                //如果沒有優惠活動的話,就不會執行判斷
                var slide_active = $('.event-banner-list').find('.swiper-slide-active').length;
                if (slide_active != 0)
                {
                    Promotions.$list_left = $('.event-banner-list').find('.swiper-slide-active').offset().left;
                }
                $('#event-dialog').addClass('in');
                $('#event-dialog').css('display', 'block');
                $('#modal-backdrop').addClass('fade in');
                Home.$event.addClass('active').siblings().removeClass('active');
            });

            if (localStorage.sid)
            {
                this.$appdownload.css('display','flex');
                $('.btn-3').css('display','block');
            }

            this.$appdownload.on('click', function(){
                if (! Public.GetConfig('APPDOWNLOAD'))
                {
                    alert(Language.Get('暂不开放'));
                    return false;
                }
                if (localStorage.isTest == '1')
                {
                    alert(Language.Get('请先登入'));
                    // $('.home-register').click();
                    // $('.login-wrapper').show();
                    return false;
                }
                if (localStorage.sid)
                {
                    if(Public.GetUrlData('isapp'))
                    {
                        alert('目前是最新版本APP');
                        return false;
                    }
                    Public.ParentGoTo(
                        parent == window 
                            ? Public.GetConfig('APPDOWNLOAD') 
                            : Public.GetConfig('APPURL') + '/?url=' + Public.GetConfig('APPDOWNLOAD')
                    );
                }
                else
                {
                    alert(Language.Get('请先登入'));
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
            });

            this.$transbtn.on('click', function(){
                if (localStorage.sid)
                {
                    Game.lastGameChange1();
                }
                else
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
            });
        },
        CkeckIsFreePlay: function()
        {
            var isTest = Public.GetLocalStorage('isTest');
            if (isTest == 1)
            {
                this.$freeplay_button.hide();
                this.$logout.show();
                /*試玩模式時,個人充提中心及專屬下線設定不能點擊*/
                this.$usercenter.css({
                    'color':'#6f6d6d',
                    'opacity':'0.5',
                    'background-image':'-webkit-linear-gradient(90deg, rgb(7, 7, 7) 0px, rgb(16, 16, 16) 23%, rgb(29, 29, 29) 64%, rgb(47, 47, 47) 100%)'
                });
                this.$walletcenter.css('background-image', '-webkit-linear-gradient(90deg,#808080 0,#808080 23%,#808080 64%,#808080 100%)');
                this.$invite.removeClass('btn-pop').addClass('is-close');
                this.$accountNote.removeClass('btn-pop').addClass('is-close');
            }
        },
        SetInfo: function()
        {
            this.$usernumber.html(Public.GetLocalStorage('id'));
            this.$account.html(Public.GetLocalStorage('username'));
        },
        Setuserinfo: function()
        {
            this.$account.html(Public.GetLocalStorage('sid') ? Public.GetLocalStorage('username') : Language.Get('会员登入/注册'))
        },
        SetUserMoney: function()
        {
            this.$money.html(Public.GetLocalStorage('sid') ? Language.Get('点数') + '：' + (Math.floor(Public.GetLocalStorage('money')) || '0') : '');
            this.$lockmoney.html(Public.GetLocalStorage('sid') ? Language.Get('锁定点数') + '：' + (Math.floor(Public.GetLocalStorage('lockmoney')) || '0') : '');
        },
        CheckAccountSet: function()
        {
            var isChange = Public.GetLocalStorage('wechatChange');

            if (isChange == 0)
            {
                this.$accountSet.show();
                this.$accountNote.hide();
            }
            else
            {
                this.$accountNote.show();
                this.$accountSet.hide();
            }
        },
        /*開啟齒輪設定*/
        OpenSetting: function()
        {
            $('#box-setting').show();
            $('.close-icon').show();
            $('.setting-icon').hide();
        },
        /*關閉齒輪設定*/
        CloseSetting: function()
        {
            $('#box-setting').hide();
            $('.close-icon').hide();
            $('.setting-icon').show();
        },
        RenewLogin: function()
        {
            if (Public.GetLocalStorage('loginaccount') && Public.GetLocalStorage('loginpassword'))
            {
                var param = {
                    data: {username: Public.GetLocalStorage('loginaccount'), password: Public.GetLocalStorage('loginpassword')},
                    done: function()
                    {
                        // location.reload();
                    },
                };
                Public.Api.Login(param);
            }
            else
            {
                Public.Api.Logout();
            }
        },
        SetVersion: function()
        {
            $('#box-setting .version .number').text(Public.GetConfig('VERSION'));
        },
        Getmarquee: function()
        {
            Public.Api.GetSystemNews({done: Home.GetmarqueeDone});
        },
        GetmarqueeDone: function(response)
        {
            if (typeof(response) !== 'object')
            {
                return ;
            }

            var str = '';
            var rows = typeof(response.msg) === 'object' ? response.msg : {};
            var nbsp = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            for (var key in rows)
            {
                str += rows[key].content + nbsp;

                if (key < rows.length - 1)
                {
                    str += nbsp;
                }
            }
            Home.$str = str;
            Public.Api.Getpointlist({done: Home.GetmarqueeDone1});
        },
        //買賣幣公告
        GetmarqueeDone1: function(response)
        {
            if (typeof(response) !== 'object')
            {
                return ;
            }

            var str2 = '';
            var rows2 = typeof(response.msg) === 'object' ? response.msg : {};
            var nbsp = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            if(response.status != -2601)
            {
                for (var key in rows2)
                {
                    var type = rows2[key].type == 1 ? '卖币' : '买币';
                    if (key != 0)
                    {
                        Home.$str += nbsp;
                    }
                    Home.$str += rows2[key].username + ' ' + Language.Get(type) + ' ' + Math.floor(rows2[key].money);
                }
            }
            Home.$marquee.find('.marquee').remove();
            Home.$marquee.html('<div class="marquee" style="width: 100%;"><p></p></div>');
            Home.$marquee.find('.marquee > p').html(Home.$str);
            Home.$marquee.find('.marquee').marquee();
        },
        //取得線上人數
        GetOnlinePeople: function()
        {
            var num = $('.onlinepeople').text();
            var n = Math.floor(Math.random()*(50));
            num = parseInt(num) + parseInt(n);
            if (num < 41000)
            {
                num = parseInt(num) + 100;
            }
            if (num > 43500)
            {
                num = parseInt(num) - 100;
            }
        
            Home.$onlinepeople.html(num);
        },
        SetTransfer: function()
        {
            // if(localStorage.isCredit == '1')
            // {
            //     $('div[data-pop=recharge-dialog]').hide();
            //     $('div[data-pop=withdraw-dialog]').hide();
            // }
        },
    };

    /* 個人中心 */
    var UserCenter = {
        $top: {},
        $username: {},
        $usernumber: {},
        $money: {},
        $lockmoney: {},
        $refreshBtn: {},
        $switchNumber: {},
        $switchAccount: {},
        $setAccount: {},
        $infoData: {},
        $infoImg: {},
        $account: {},
        $gamereport: {},
        $transferreport: {},
        $withdraw: {},
        $headimgurl: {},
        $appdownload: {},
        $transbtn: {},
        $bankmanagement: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=user-center]');
            this.$username = this.$top.find('.person-name');
            this.$usernumber = this.$top.find('#usernumber');
            this.$money = this.$top.find('#money');
            this.$lockmoney = this.$top.find('#lockmoney');
            this.$integral = this.$top.find('#integral');
            this.$refreshBtn = this.$top.find('#refresh');
            this.$switchNumber = this.$top.find('#switch_number');
            this.$switchAccount = this.$top.find('#switch_account');
            this.$setAccount = this.$top.find('#set_account');
            this.$infoImg = this.$top.find('.info-img');
            this.$infoData = this.$top.find('.info-data');
            this.$headimgurl = this.$top.find('.headimgurl');

            this.$gamereport = this.$top.find('div[data-page-name=person-report]');
            this.$transferreport = this.$top.find('div[data-page-name=accounting-records]');
            this.$withdraw = this.$top.find('a[data-pop=withdraw-dialog]');
            this.$recharge = this.$top.find('a[data-pop=recharge-dialog]');
            this.$news = this.$top.find('a[data-page-name=news]');
            this.$offer = this.$top.find('div[data-page-name=offer]');
            this.$appdownload = this.$top.find('div[data-pop=invite-dialog]');
            this.$walletcenter = this.$top.find('div[data-page-name=wallet-center]');
            this.$bankmanagement = this.$top.find('div[data-page-name=BankManagement]');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$switchNumber.on('click', this.Switch);
            this.$switchAccount.on('click', this.Switch);
            this.$gamereport.on('click', GameReport.GetReport);
            this.$transferreport.on('click', TransferReport.GetReport);
            this.$refreshBtn.on('click', App.UserMainDone);     //更新餘額 
            this.$withdraw.on('click', Withdrawals.SetBank);    //提現撈取銀行卡資料
            this.$recharge.on('click', App.UserMainDone);       //更新充值現金餘額
            this.$recharge.on('click', Recharge.PlatformDo);    //第一次開啟取通道支付口
            this.$news.on('click', News.Main);                  //取得公告信息資訊
            this.$offer.on('click', Offer.Main);                //取得優惠信息資訊
            this.$bankmanagement.on('click', BankManagement.SetBody);    //取得銀行卡資訊
            this.$top.on('click', '#logout', function(){Public.Api.Logout(true);});
            this.$appdownload.on('click', function(){
                if (! Public.GetConfig('APPDOWNLOAD'))
                {
                    alert(Language.Get('暂不开放'));
                    return false;
                }
                Public.ParentGoTo(
                    parent == window 
                        ? Public.GetConfig('APPDOWNLOAD') 
                        : Public.GetConfig('APPURL') + '/?url=' + Public.GetConfig('APPDOWNLOAD')
                );
            });
            this.$walletcenter.on('click', function(){
                App.UserMainDone();
                WalletCenter.GetReport();
            });
        },
        IsLogout: function()
        {
            if(parent == window)
            {
                $('#logout').css('display', 'inline-flex');
            }
        },
        SetInfo: function()
        {
            UserCenter.$infoImg.addClass('logined');
            UserCenter.$infoData.html(Public.GetLocalStorage('username'));
        },
        SetUserMoney: function()
        {
            UserCenter.$money.html(Public.GetLocalStorage('money'));
            UserCenter.$lockmoney.html(Public.GetLocalStorage('lockmoney'));
            UserCenter.$integral.html(Public.GetLocalStorage('integral'));
        },
        SetUserMoneyLoading: function()
        {
            UserCenter.$money.html('-');
            UserCenter.$lockmoney.html('-');
            UserCenter.$integral.html('-');
        },
        SetHeadImg: function()
        {
            var url = Public.GetLocalStorage('headimgurl') || Public.GetLocalStorage('avatar');
            url && UserCenter.$headimgurl.attr('src', url);
        },
        CheckAccountSet: function()
        {
            var isChange = Public.GetLocalStorage('wechatChange');

            if (isChange == 0)
            {
                UserCenter.$setAccount.show();
            }
            else
            {
                var dis_account = UserCenter.$username.parents('p').attr('style');
                var isNone = dis_account ? dis_account.indexOf('none').indexOf('none') : -1;
                if (isNone >= 0)
                {
                    UserCenter.$setAccount.hide();
                    UserCenter.$switchAccount.show();
                }
                else
                {
                    UserCenter.$setAccount.hide();
                    UserCenter.$switchNumber.show();
                }
            }
        },
        Switch: function()
        {
            $this = $(this);
            UserCenter.$switchNumber.hide();
            UserCenter.$switchAccount.hide();
            UserCenter.$usernumber.parent().hide();
            UserCenter.$account.parent().hide();

            var target = $this.attr('id');

            if (target === 'switch_account')
            {
                UserCenter.$switchNumber.show();
                UserCenter.$account.parent().show();
            }
            else
            {
                UserCenter.$switchAccount.show();
                UserCenter.$usernumber.parent().show();
            }
        },
    };

    /* 個人報表 */
    var GameReport = {
        $top: {},
        $startTime: {},
        $endTime: {},
        $submit: {},
        $select: {},
        page: 1,
        num: 10,

        $table: {},
        $tbody: {},
        $footerTable: {},
        $footerhead: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=person-report]');
            this.$startTime = this.$top.find('.startTime');
            this.$endTime = this.$top.find('.endTime');
            this.$submit = this.$top.find('#submit');
            this.$select = this.$top.find('select');
            this.$table = this.$top.find('#report');
            this.$tbody = this.$table.find('tbody');

            this.$footerTable = this.$top.find('#footer');
            this.$footerhead = this.$footerTable.find('thead');
            
            this.Setoption();
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$submit.on('click', this.GetReport);
            this.$table.on('click', '#loadMore', this.GetReport);
        },
        Setoption: function()
        {
            var tag = '';
            var hall = Public.GetGameHall();
            var gameName = Language.Get('全部类型');
            tag += '<option value="">' + gameName + '</option>';
            for (var key in hall)
            {
                if (hall[key].id != '10') 
                {
                    if (hall[key].status == '1')
                    {
                        tag += "<option value =" + hall[key].gamehall + ">" + Language.Get(hall[key].gameHallNickname) + "</option>";
                    }
                }
            }
            GameReport.$select.html(tag);
        },
        GetReport: function()
        {
            var isLoadMore = $(this).prop('id') === 'loadMore';
            /* 判斷是否加載 */
            if (isLoadMore)
            {
                GameReport.page ++;
            }
            else
            {
                GameReport.page = 1;
                GameReport.$tbody.html('');
            }

            GameReport.$tbody.find('#loadMore').remove();
            GameReport.$tbody.append('<tr id="loading"><td class="acenter" colspan="6">loading</td></tr>');

            /* 報表參數 */
            var param = {
                data: {
                    gameHall: GameReport.$select.val(),
                    startTime: GameReport.$startTime.val(),
                    endTime: GameReport.$endTime.val(),
                    page: GameReport.page,
                    num: GameReport.num,
                },
                done: GameReport.SetTable,
            };
            /* 取得報表資料 */
            Public.Api.GetGameReport(param);
        },
        SetTable: function(response)
        {
            if (typeof(response) !== 'object' || response.status != 0 || typeof(response.msg) !== 'object')
            {
                return ;
            }
            GameReport.SetBody(response.msg);
            GameReport.SetFooter(response.msg);
        },
        SetBody: function(data)
        {
            var rows = typeof(data.rows) === 'object' ? data.rows : {};
            var list = '';

            for (var key in rows)
            {
                var row = rows[key];
                var gameHall = Public.GetGameHallByHall(row.gameHall) || {};
                var betTime = row.betTime.split(' ') || {};
                var flag = '';
                if (row.flag == 1)
                {
                    flag = Language.Get('已結算');
                }
                else if (row.flag == 0)
                {
                    flag = Language.Get('未結算');
                }
                else if (row.flag == -9)
                {
                    flag = Language.Get('取消注單');
                }
                else
                {
                    flag = '';
                }
                var betAmount = row.betAmount;
                var validBetAmount = row.validBetAmount;
                var netAmount = row.netAmount;

                list += 
                    '<tr>' +
                        '<td class="acenter"><p>' + betTime[0] + '<br />' + betTime[1] + '</p></td>' +
                        '<td class="acenter">' + Language.Get(gameHall.gameHallNickname) + '</td>' +
                        '<td class="aright">' + Math.round(betAmount * 1000) / 1000 + '</td>' +
                        '<td class="aright">' + Math.round(validBetAmount * 1000) / 1000 + '</td>' +
                        '<td class="aright">' + Math.round(netAmount * 1000) / 1000 + '</td>' +
                        '<td class="acenter">' + flag + '</td>' +
                    '</tr>';
            }

            GameReport.$tbody.find('#loading').remove();

            /* 顯示頁數 */
            var page = parseInt(data.page);
            /* 顯示筆數 */
            var num = parseInt(data.num);
            /* 報表總比數 */
            var total = parseInt(data.total) || 0;

            if (list && (page * num) < total)
            {
                list += '<tr id="loadMore"><td class="acenter text_189" colspan="6" style="background: #ddd; color: #007bff;"></td></tr>';
            }
            GameReport.$tbody.append(list);
        },
        SetFooter: function(data)
        {
            var sum = typeof(data.sum) === 'object' ? data.sum : {};
            var sumbetAmount = sum.sumbetAmount || '0';
            var sumvalidBetAmount = sum.sumvalidBetAmount || '0';
            var sumnetAmount = sum.sumnetAmount || '0';
            var head = 
                '<tr>' +
                    '<th width="22%"></th>' +
                    '<th width="20%" class="acenter text_188"></th>' +
                    '<th width="15%" class="aright">' + Math.round(sumbetAmount * 1000) / 1000 + '</th>' +
                    '<th width="18%" class="aright">' + Math.round(sumvalidBetAmount * 1000) / 1000 + '</th>' +
                    '<th width="15%" class="aright">' + Math.round(sumnetAmount * 1000) / 1000 + '</th>' +
                    '<th width="15%"></th>' +
                '</tr>';
            GameReport.$footerhead.html(head);
        },
        SetPlaceholder: function()
        {
            GameReport.$top.find('#submit').attr('value',Language.Get('查询'));
        }
    };

    /* 帳變紀錄 */
    var TransferReport = {
        $top: {},
        $startTime: {},
        $endTime: {},
        $submit: {},
        $type: {},
        page: 1,
        num: 10,

        $table: {},
        $tbody: {},
        $footerTable: {},
        $footerhead: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=accounting-records]');
            this.$startTime = this.$top.find('.startTime');
            this.$endTime = this.$top.find('.endTime');
            this.$submit = this.$top.find('#submit_record');
            this.$type = this.$top.find('#type');     //下拉式選單按鍵
            this.$table = this.$top.find('#report');
            this.$tbody = this.$table.find('tbody');
            this.$footerTable = this.$top.find('#footer');
            this.$footerhead = this.$footerTable.find('thead');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$submit.on('click', this.GetReport);
            this.$table.on('click', '#loadMore', this.GetReport);
            this.$tbody.on('click', '.transferrecord', this.ChangeArrow);
        },
        GetReport: function()
        {
            var isLoadMore = $(this).prop('id') === 'loadMore';
            /* 判斷是否加載 */
            if (isLoadMore)
            {
                TransferReport.page ++;
            }
            else
            {
                TransferReport.page = 1;
                TransferReport.$tbody.html('');
            }

            TransferReport.$tbody.find('#loadMore').remove();
            TransferReport.$tbody.append('<tr id="loading"><td class="acenter text_236" colspan="4"></td></tr>');

            /* 報表參數 */
            var param = {
                data: {
                    cmd: TransferReport.$type.val(),
                    startTime: TransferReport.$startTime.val(),
                    endTime: TransferReport.$endTime.val(),
                    page: TransferReport.page,
                    num: TransferReport.num,
                },
                done: TransferReport.SetTable,
            };
            /* 取得報表資料 */
            Public.Api.GetTransferReport(param);
        },
        SetTable: function(response)
        {
            if (typeof(response) !== 'object' || response.status != 0 || typeof(response.msg) !== 'object')
            {
                return ;
            }
            TransferReport.SetBody(response.msg);
            TransferReport.SetFooter(response.msg);
        },
        SetBody: function(data)
        {
            var rows = typeof(data.rows) === 'object' ? data.rows : {};
            var list = '';
            for (var key in rows)
            {
                var row = rows[key];
                var betTime = (TransferReport.$type.val() == '534') ? row.request_time : row.addtime || {};
                //手工存款 & 支付碼存款 & 在線提款
                if (TransferReport.$type.val() == '531' || TransferReport.$type.val() == '533' || TransferReport.$type.val() == '541')
                {
                    var details = row.ordernumber;
                    var money = row.money;
                    var note = row.jnote;
                    var icon = row.status != 0 ? '<i class="icon-xiajiantou"></i>' : '';
                    if (row.status == 0)
                    {
                        var status = Language.Get('审核中');
                        var color = 'txt-red';
                    }
                    else if (row.status == 1)
                    {
                        var status = Language.Get('成功');
                        var color = 'txt-green';
                    }
                    else if (row.status == 2)
                    {
                        var status = Language.Get('拒绝');
                        var color = 'txt-red';
                    }
                }
                //紅利
                if (TransferReport.$type.val() == '534')
                {
                    if (row.actvityName == '存款手续费' || row.actvityName == '红包' || row.actvityName == '不返水优惠' || row.actvityName == '返水优惠')
                    {
                        var details = Language.Get(row.actvityName);
                    }
                    else
                    {
                        var details = row.actvityName;
                    }
                    var money = row.bonus;
                    var note = row.memo;
                    var icon = row.status != 0 ? '<i class="icon-xiajiantou"></i>' : '';
                    if (row.status == 0)
                    {
                        var status = Language.Get('审核中');
                        var color = 'txt-red';
                    }
                    else if ((row.status == 1 && row.answer == 1) || (row.status == 2 && row.answer == 1))
                    {
                        var status = Language.Get('成功');
                        var color = 'txt-green';
                    }
                    else if ((row.status == 1 && row.answer == 0) || (row.status == 2 && row.answer == 0))
                    {
                        var status = Language.Get('拒绝');
                        var color = 'txt-red';
                        var note = row.refuseMemo;
                    }
                }
                //返水 & 人工異動 & 在線存款 & 點數轉換
                if (TransferReport.$type.val() == '523' || TransferReport.$type.val() == '524' || TransferReport.$type.val() == '532' || TransferReport.$type.val() == '535')
                {
                    var details = TransferReport.$type.val() != '532' ? row.type : row.ordernumber;
                    var money = row.money;
                    var note = TransferReport.$type.val() != '532' ? row.note : row.type;
                    var icon = '';
                    if (row.status != 0 || (TransferReport.$type.val() == '532' && row.status == 0))
                    {
                        icon = '<i class="icon-xiajiantou"></i>';
                    }
                    if (row.status == 0)
                    {
                        var status = Language.Get('审核中');
                        var color = 'txt-red';
                    }
                    else if (row.status == 1)
                    {
                        var status = Language.Get('成功');
                        var color = 'txt-green';
                    }
                    else if (row.status == 2)
                    {
                        var status = Language.Get('拒绝');
                        var color = 'txt-red';
                    }
                }
                details = (TransferReport.$type.val() != '532' && TransferReport.$type.val() != '534' && TransferReport.$type.val() != '541' && TransferReport.$type.val() != '531' && TransferReport.$type.val() != '533') ? Language.Get(details) : details;
                var width = (TransferReport.$type.val() != '532') ? '25%' : '33%';
                list += 
                    '<tr class="transferrecord hide">' +
                        '<td class="acenter"><p>' + betTime + '</p></td>' +
                        '<td class="acenter">' + details + '</td>' +
                        '<td class="aright">' + money + '</td>' +
                        '<td class="btn_transferrecord acenter" style="width: ' + width + '"><p class="showSanjiao ' + color + '">' + status + icon +'</p></td>' +
                    '</tr>';
                if (TransferReport.$type.val() == '524')
                {
                    list +=
                        '<tr class="point_reason" style="display:none;">' +
                            '<td class="td-note" colspan="2" style="width: 50%;">' + Language.Get('转出方') + '：' + row.source + '</td>' +
                            '<td class="td-note" colspan="2" style="width: 50%;">' + Language.Get('转入方') + '：' + row.target + '</td>' +
                        '</tr>';
                }
                if (TransferReport.$type.val() == '531')
                {
                    list +=
                        '<tr class="collectaccount_reason" style="display:none;">' +
                            '<td class="td-note text_242" colspan="4">：' + row.collectaccount + '</td>' +
                        '</tr>';
                }
                list +=
                    '<tr class="note_reason" style="display:none;">' +
                        '<td class="td-note" colspan="4">' + Language.Get('备注') + '：' + note + '</td>' +
                    '</tr>';
                
            }

            TransferReport.$tbody.find('#loading').remove();

            /* 顯示頁數 */
            var page = parseInt(data.page);
            /* 顯示筆數 */
            var num = parseInt(data.num);
            /* 報表總比數 */
            var total = parseInt(data.total) || 0;

            if (list && (page * num) < total)
            {
                list += '<tr id="loadMore"><td class="acenter text_189" colspan="4" style="background: #ddd; color: #007bff;"></td></tr>';
            }
            TransferReport.$tbody.append(list);
        },
        SetFooter: function(data)
        {
            var summoney = data.summoney || '0';
            var head = 
                '<tr>' +
                    '<th style="width:50%;"></th>' +
                    '<th style="width:25%;" class="acenter text_188"></th>' +
                    '<th style="width:25%;" class="aright">' + summoney + '</th>' +
                '</tr>';
            TransferReport.$footerhead.html(head);
        },
        /*備註開關轉換*/
        ChangeArrow: function()
        {
            var $this = $(this);
            var $classname = $this.find('i').attr('class');
            if ($classname == 'icon-xiajiantou')
            {
                $this.find('i').addClass('icon-shangjiantou');
                $this.find('i').removeClass('icon-xiajiantou');

                if (TransferReport.$type.val() == '524')
                {
                    $this.next('tr.point_reason').show();
                    $this.next('tr.point_reason').next('tr.note_reason').show();
                }
                else if (TransferReport.$type.val() == '531')
                {
                    $this.next('tr.collectaccount_reason').show();
                    $this.next('tr.collectaccount_reason').next('tr.note_reason').show();
                }
                else
                {
                    $this.next('tr.note_reason').show();
                }
            }
            else if ($classname == 'icon-shangjiantou')
            {
                $this.find('i').removeClass('icon-shangjiantou');
                $this.find('i').addClass('icon-xiajiantou');

                if (TransferReport.$type.val() == '524')
                {
                    $this.next('tr.point_reason').hide();
                    $this.next('tr.point_reason').next('tr.note_reason').hide();
                }
                else if (TransferReport.$type.val() == '531')
                {
                    $this.next('tr.collectaccount_reason').hide();
                    $this.next('tr.collectaccount_reason').next('tr.note_reason').hide();
                }
                else
                {
                    $this.next('tr.note_reason').hide();
                }
            }
        },
        SetPlaceholder: function()
        {
            TransferReport.$top.find('#submit_record').attr('value',Language.Get('查询'));
            var type = '<option value="532">' + Language.Get('在线存款') +'</option>'+
                        '<option value="531">' + Language.Get('手工存款') +'</option>'+
                        '<option value="541">' + Language.Get('支付码存款') +'</option>'+
                        '<option value="533">' + Language.Get('提款') +'</option>'+
                        '<option value="534">' + Language.Get('红利') +'</option>'+
                        '<option value="523">' + Language.Get('返水') +'</option>'+
                        '<option value="535">' + Language.Get('人工异动') +'</option>';
                        // '<option value="524">' + Language.Get('点数转移') +'</option>'+
                        // '<option value="525">' + Language.Get('用户上分') +'</option>'+
                        // '<option value="526">' + Language.Get('用户下分') +'</option>';
            TransferReport.$type.html(type);
        }
    };

    /* 提現 */
    var Withdrawals = {
        $top: {},
        $money: {},
        $password: {},      
        $submit: {},
        $cancel: {},
        $clearMoney: {},
        $clearPassword: {},
        $close: {},
        $bank_list: {},
        $hnote: {},
        $bank_list_item: {},
        $btn_delete_card: {},
        $bankId: {},
        $tip: {},                   //備註
        $tip1: {},                  //暫存備註

        $auditmoney: {},            //優惠稽核
        $auditmsg: {},              //儲存優惠稽核顯示在前台的值
        $cost: {},                  //行政費用
        $withdrawalfee: {},         //取款手續費
        $truemoney: {},             //實提金額
        $Ratiotruemoney: {},        //USDT實提金額

        $typename : {},      
        $name : {},          
        $alipayAccount : {}, 
        $alipayNum : {},     
        $fastTurnNum : {},   
        $newbankName : {},   
        $newbankAccount : {},
        $USDTAccount : {},
        $USDTTRC20Account: {},
        $BRP20Account: {},
        $BEP2Account: {},

        $auditmoney_data: {},       //優惠稽核資料庫版
        $cost_data: {},             //行政費用資料庫版
        $audittotal_data: {},       //總審計費用資料庫版 ???
        $bankfees_data: {},         //取款手續費資料庫版
        $bankfeeslimit_data: {},    //取款手續費最大限制資料庫版
        $withdrawalfee_data: {},    //取款手續費資料庫版
        $truemoney_data: {},        //實提金額資料庫版
        $Ratiotruemoney_data: {},   //實提金額USDT資料庫版
        $ratio: {},                 //匯率
        $ratio1: {},                //匯率存放

        Initial: function()
        {
            this.$top            = $('div#withdraw-dialog');
            this.$money          = this.$top.find('#withdraw_money');
            this.$password       = this.$top.find('#paypassword');
            this.$submit         = this.$top.find('#submit');
            this.$cancel         = this.$top.find('#cancel');
            this.$clearMoney     = this.$top.find('#clearMoney');
            this.$clearPassword  = this.$top.find('#clearPassword');
            this.$close          = this.$top.find('#close');
            this.$bank_list      = this.$top.find('.bank-list');
            this.$tip            = this.$top.find('.tip');                  //備註
            this.$ratio          = this.$top.find('.ratio');                //匯率

            this.$auditmoney     = this.$top.find('#auditmoney');           //優惠稽核
            this.$cost           = this.$top.find('#cost');                 //行政費用
            this.$withdrawalfee  = this.$top.find('#withdrawalfee');        //取款手續費
            this.$truemoney      = this.$top.find('#truemoney');            //實提金額
            this.$Ratiotruemoney = this.$top.find('#Ratiotruemoney');       //USDT實提金額

            this.$typename       = this.$top.find('#typename');             //取款方式
            this.$name           = this.$top.find('#name');                 //姓名
            this.$alipayAccount  = this.$top.find('#alipayAccount');        //支付宝账号
            this.$alipayNum      = this.$top.find('#alipayNum');            //支付宝收款码
            this.$fastTurnNum    = this.$top.find('#fastTurnNum');          //转数快号码
            this.$newbankName    = this.$top.find('#newbankName');          //银行名称
            this.$newbankAccount = this.$top.find('#newbankAccount');       //银行账号
            this.$USDTAccount    = this.$top.find('#usdtAccount');          //USDTERC20账号
            this.$USDTTRC20Account = this.$top.find('#usdtTRC20Account');   //USDTTRC20账号
            this.$BRP20Account   = this.$top.find('#bep20Account');         //BEP20账号
            this.$BEP2Account    = this.$top.find('#bep2Account');          //BEP2账号

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$submit.on('click', this.Do);
            this.$cancel.on('click', this.Cancel);
            this.$close.on('click', this.Cancel);
            this.$clearMoney.on('click', this.ClearMoney);
            this.$clearPassword.on('click', this.ClearPassword);
            this.$bank_list.on('click', 'li .btn-delete-card', DeleteBankcard.Show);
            this.$bank_list.on('click', 'li', function(){
                var $this = $(this);
                $this.siblings().removeClass('active');
                $this.addClass('active');
                Withdrawals.$bankId = $this.attr('id');
                Withdrawals.Default();
            });
            this.$money.on('keyup', this.SetValue);
        },
        SetBank: function()
        {
            var isChange = Public.GetLocalStorage('wechatChange');
            if (isChange == 0)
            {
                return false;
            }
            if(localStorage.isCredit == '1')
            {
                alert(Language.Get('你的上层代理为信用代理, 不开放使用存提功能'));
                return false;
            }

            var param = {
                data: {},
                done: Withdrawals.SetBody,
            };
            Public.Api.SetUserInfo(param);
            
            Withdrawals.SetAuditmoney();
        },
        SetBody: function(response)
        {
            var bank = response.msg.banks || {};
            if (bank == '')
            {
                // $('#add-card-dialog').css('display','block').addClass('in');
                // AddBankcard.setBody('Withdrawals');
                WalletCenter.$top.removeClass('active ani');
                $('#withdraw-dialog').css('display','none').removeClass('in');
                $('.pages-container').addClass('show');
                BankManagement.$top.addClass('active ani');
                $('#modal-backdrop').removeClass('fade in');
                BankManagement.SetBody();
                return false;
            }

            var bankusername = '';
            var fpsusername = '';
            var usdtercusername = '';
            var usdttrcusername = '';
            var bep20username = '';
            var bep2username = '';
            var fpsaccount = '';
            var bankaccount = '';
            var bankname = '';
            var USDTaccount = '';
            var USDTAccountTRC20 = '';
            var BEP20Account = '';
            var BEP2Account = '';

            for (var key in bank)
            {
                var row = bank[key];

                if (row.account != '')
                {
                    bankusername = row.truename;
                    bankaccount = row.account;
                    bankname = row.name; 
                }
                if (row.FPSAccount != '')
                {
                    fpsusername = row.truename;
                    fpsaccount = row.FPSAccount;
                }
                if (row.USDTAccount != '')
                {
                    usdtercusername = row.truename;
                    USDTaccount = row.USDTAccount;
                }
                if (row.USDTAccountTRC20 != '')
                {
                    usdttrcusername = row.truename;
                    USDTAccountTRC20 = row.USDTAccountTRC20;
                }
                if (row.BEP20Account != '')
                {
                    bep20username = row.truename;
                    BEP20Account = row.BEP20Account;
                }
                if (row.BEP2Account != '')
                {
                    bep2username = row.truename;
                    BEP2Account = row.BEP2Account;
                }
            }

            Withdrawals.$submit.show();
            var param = {
                data: {},
                done: function(response){
                    var tag = '';
                    var msg = response.msg;
                    var withdrawType = msg.withdrawType;
                    for(var key in withdrawType)
                    {
                        var row = withdrawType[key];
                        if(row.ismoblie == '1')
                        {
                            tag += "<option id='" + row.type + "' value='" + row.type + "'>" + Language.Get(row.name) + "</option>";
                            Withdrawals.$tip1[row.type] = Language.Get(row.tip);
                            Withdrawals.$ratio1[row.type] = row.ratio;
                        }
                    }
                    Withdrawals.$top.find('#typename').html(tag);

                    var typename = Withdrawals.$typename.val();
                    var type = '';

                    // if(typename == 'alipayToalipay')
                    // {
                    //     Withdrawals.$top.find('.alipayBtn').show();
                    //     Withdrawals.$top.find('.alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                    // }
                    // if(typename == 'alipayCar')
                    // {
                    //     Withdrawals.$top.find('.alipayNumBtn').show();
                    //     Withdrawals.$top.find('.alipayBtn, .fastTurnNumBtn, .newbankBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                    // }
                    if(typename == 'fastTurn')
                    {
                        Withdrawals.$top.find('.fastTurnNumBtn').show();
                        Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                        Withdrawals.$top.find('#fastTurnNum').val(fpsaccount);
                        Withdrawals.$top.find('#fastTurnNum').attr('readonly','readonly');
                        Withdrawals.$top.find('#name').val(fpsusername);
                        Withdrawals.$top.find('#name').attr('readonly','readonly');
                        if (fpsaccount == '')
                        {
                            Withdrawals.$top.find('#fastTurnNum').hide();
                        }
                    }
                    if(typename == 'bank')
                    {
                        Withdrawals.$top.find('.newbankBtn').show();
                        Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                        Withdrawals.$top.find('#newbankName').val(bankname);
                        Withdrawals.$top.find('#newbankAccount').val(bankaccount);
                        Withdrawals.$top.find('#newbankName').attr('readonly','readonly');
                        Withdrawals.$top.find('#newbankAccount').attr('readonly','readonly');
                        Withdrawals.$top.find('#name').val(bankusername);
                        Withdrawals.$top.find('#name').attr('readonly','readonly');
                        if (bankaccount == '' || bankname == '')
                        {
                            Withdrawals.$top.find('#newbankName').hide();
                            Withdrawals.$top.find('#newbankAccount').hide();
                        }
                    }
                    if(typename == 'USDT-ERC20')
                    {
                        var type = 'USDT';
                        Withdrawals.$top.find('.USDTERC20NumBtn, .RatioBtn').show();
                        Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTTRC20NumBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                        Withdrawals.$top.find('#usdtAccount').val(USDTaccount);
                        Withdrawals.$top.find('#usdtAccount').attr('readonly','readonly');
                        Withdrawals.$top.find('#name').val(usdtercusername);
                        Withdrawals.$top.find('#name').attr('readonly','readonly');
                        if (USDTaccount == '')
                        {
                            Withdrawals.$top.find('#usdtAccount').hide();
                        }
                    }
                    if(typename == 'USDT-TRC20')
                    {
                        var type = 'USDT';
                        Withdrawals.$top.find('.USDTTRC20NumBtn, .RatioBtn').show();
                        Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                        Withdrawals.$top.find('#usdtTRC20Account').val(USDTAccountTRC20);
                        Withdrawals.$top.find('#usdtTRC20Account').attr('readonly','readonly');
                        Withdrawals.$top.find('#name').val(usdttrcusername);
                        Withdrawals.$top.find('#name').attr('readonly','readonly');
                        if (USDTAccountTRC20 == '')
                        {
                            Withdrawals.$top.find('#usdtTRC20Account').hide();
                        }
                    }
                    if(typename == 'BEP20')
                    {
                        var type = 'BEP20';
                        Withdrawals.$top.find('.BEP20NumBtn, .RatioBtn').show();
                        Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .BEP2NumBtn').hide();
                        Withdrawals.$top.find('#bep20Account').val(BEP20Account);
                        Withdrawals.$top.find('#bep20Account').attr('readonly','readonly');
                        Withdrawals.$top.find('#name').val(bep20username);
                        Withdrawals.$top.find('#name').attr('readonly','readonly');
                        if (BEP20Account == '')
                        {
                            Withdrawals.$top.find('#bep20Account').hide();
                        }
                    }
                    if(typename == 'BEP2')
                    {
                        var type = 'BEP2';
                        Withdrawals.$top.find('.BEP2NumBtn, .RatioBtn').show();
                        Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .BEP20NumBtn').hide();
                        Withdrawals.$top.find('#bep2Account').val(BEP2Account);
                        Withdrawals.$top.find('#bep2Account').attr('readonly','readonly');
                        Withdrawals.$top.find('#name').val(bep2username);
                        Withdrawals.$top.find('#name').attr('readonly','readonly');
                        if (BEP2Account == '')
                        {
                            Withdrawals.$top.find('#bep2Account').hide();
                        }
                    }
                    Withdrawals.$tip.html(Withdrawals.$tip1[typename]);
                    Withdrawals.$ratio.html(Language.Get('汇率提示') + ': 1 ' + type + ' : ' + Withdrawals.$ratio1[typename]);
                    Withdrawals.$top.find('.WithdrawalRatio').html(Language.Get(type + '数量'));
                },
            };
            Public.Api.GetWithdrawType(param);

            $this = $('this');
            Withdrawals.$typename.on('change', function(){
                var typename = Withdrawals.$typename.val();
                var type = '';
                Withdrawals.$top.find('#name').attr('readonly','readonly');
                // if(typename == 'alipayToalipay')
                // {
                //     Withdrawals.$top.find('.alipayBtn').show();
                //     Withdrawals.$top.find('.alipayNumBtn, .fastTurnNumBtn, .newbankBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                // }
                // if(typename == 'alipayCar')
                // {
                //     Withdrawals.$top.find('.alipayNumBtn').show();
                //     Withdrawals.$top.find('.alipayBtn, .fastTurnNumBtn, .newbankBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                // }
                if(typename == 'fastTurn')
                {
                    Withdrawals.$top.find('.fastTurnNumBtn').show();
                    Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                    Withdrawals.$top.find('#fastTurnNum').val(fpsaccount);
                    Withdrawals.$top.find('#fastTurnNum').attr('readonly','readonly');
                    Withdrawals.$top.find('#name').val(fpsusername);
                    Withdrawals.$top.find('#name').attr('readonly','readonly');
                    if (fpsaccount == '')
                    {
                        Withdrawals.$top.find('#fastTurnNum').hide();
                    }
                }
                if(typename == 'bank')
                {
                    Withdrawals.$top.find('.newbankBtn').show();
                    Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .RatioBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                    Withdrawals.$top.find('#newbankName').val(bankname);
                    Withdrawals.$top.find('#newbankAccount').val(bankaccount);
                    Withdrawals.$top.find('#newbankName').attr('readonly','readonly');
                    Withdrawals.$top.find('#newbankAccount').attr('readonly','readonly');
                    Withdrawals.$top.find('#name').val(bankusername);
                    Withdrawals.$top.find('#name').attr('readonly','readonly');
                    if (bankaccount == '' || bankname == '')
                    {
                        Withdrawals.$top.find('#newbankName').hide();
                        Withdrawals.$top.find('#newbankAccount').hide();
                    }
                }
                if(typename == 'USDT-ERC20')
                {
                    var type = 'USDT';
                    Withdrawals.$top.find('.USDTERC20NumBtn, .RatioBtn').show();
                    Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTTRC20NumBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                    Withdrawals.$top.find('#usdtAccount').val(USDTaccount);
                    Withdrawals.$top.find('#usdtAccount').attr('readonly','readonly');
                    Withdrawals.$top.find('#name').val(usdtercusername);
                    Withdrawals.$top.find('#name').attr('readonly','readonly');
                    if (USDTaccount == '')
                    {
                        Withdrawals.$top.find('#usdtAccount').hide();
                    }
                }
                if(typename == 'USDT-TRC20')
                {
                    var type = 'USDT';
                    Withdrawals.$top.find('.USDTTRC20NumBtn, .RatioBtn').show();
                    Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .BEP20NumBtn, .BEP2NumBtn').hide();
                    Withdrawals.$top.find('#usdtTRC20Account').val(USDTAccountTRC20);
                    Withdrawals.$top.find('#usdtTRC20Account').attr('readonly','readonly');
                    Withdrawals.$top.find('#name').val(usdttrcusername);
                    Withdrawals.$top.find('#name').attr('readonly','readonly');
                    if (USDTAccountTRC20 == '')
                    {
                        Withdrawals.$top.find('#usdtTRC20Account').hide();
                    }
                }
                if(typename == 'BEP20')
                {
                    var type = 'BEP20';
                    Withdrawals.$top.find('.BEP20NumBtn, .RatioBtn').show();
                    Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .BEP2NumBtn').hide();
                    Withdrawals.$top.find('#bep20Account').val(BEP20Account);
                    Withdrawals.$top.find('#bep20Account').attr('readonly','readonly');
                    Withdrawals.$top.find('#name').val(bep20username);
                    Withdrawals.$top.find('#name').attr('readonly','readonly');
                    if (BEP20Account == '')
                    {
                        Withdrawals.$top.find('#bep20Account').hide();
                    }
                }
                if(typename == 'BEP2')
                {
                    var type = 'BEP2';
                    Withdrawals.$top.find('.BEP2NumBtn, .RatioBtn').show();
                    Withdrawals.$top.find('.alipayBtn, .alipayNumBtn, .newbankBtn, .fastTurnNumBtn, .USDTERC20NumBtn, .USDTTRC20NumBtn, .BEP20NumBtn').hide();
                    Withdrawals.$top.find('#bep2Account').val(BEP2Account);
                    Withdrawals.$top.find('#bep2Account').attr('readonly','readonly');
                    Withdrawals.$top.find('#name').val(bep2username);
                    Withdrawals.$top.find('#name').attr('readonly','readonly');
                    if (BEP2Account == '')
                    {
                        Withdrawals.$top.find('#bep2Account').hide();
                    }
                }
                Withdrawals.$tip.html(Withdrawals.$tip1[typename]);
                Withdrawals.$ratio.html(Language.Get('汇率提示') + ': 1 ' + type + ' : ' + Withdrawals.$ratio1[typename]);
                Withdrawals.$top.find('.WithdrawalRatio').html(Language.Get(type + '数量'));
                Withdrawals.Cancel();
            });
        },
        /*取得優惠稽核, 行政費用, 手續費欄位值*/
        SetAuditmoney: function()
        {
            var param = {
                done: Withdrawals.DoneAudit,
            };
            Public.Api.SetAuditmoney(param);
        },
        DoneAudit: function(response)
        {
            if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || 
                typeof(response.msg.data) !== 'object' || response.status != '0')
            {
                return ;
            }
            var data = response.msg.data;
            var tag = '';
            var type3 = 0.0;
            for (var key in data)
            {
                if (data[key].type == 2)
                {
                    tag += Language.Get('优惠') + '(' + data[key].aname + '):' + data[key].bonus + '<br />';
                }
                if (data[key].type == 3)
                {
                    type3 += parseFloat(data[key].bonus);
                }
            }
            tag += Language.Get('返水') + '：' + Math.round(type3 * 100) / 100;
            Withdrawals.$auditmsg = tag;
            /*儲存優惠稽核, 行政費用, 手續費*/
            Withdrawals.$auditmoney_data = response.msg.preferential;
            Withdrawals.$audittotal_data = response.msg.total;
            Withdrawals.$cost_data = response.msg.administrative;
            Withdrawals.$bankfees_data = response.msg.bankfees;
            Withdrawals.$bankfeeslimit_data = response.msg.bankfeeslimit;
            Withdrawals.SetValue();
        },
        /*計算優惠稽核, 行政費用, 手續費, 實提金額 及顯示在畫面上, 手續費與實提金額的值有四捨五入取小數點兩位*/
        SetValue: function()
        {
            /*計算手續費及實提金額*/
            Withdrawals.$withdrawalfee_data = Withdrawals.$money.val() * Withdrawals.$bankfees_data;
            Withdrawals.$withdrawalfee_data = Withdrawals.$withdrawalfee_data > Withdrawals.$bankfeeslimit_data ? Withdrawals.$bankfeeslimit_data : Withdrawals.$withdrawalfee_data.toFixed(2);
            Withdrawals.$truemoney_data = Withdrawals.$money.val() == '' ? 0 : (Withdrawals.$money.val() - Withdrawals.$audittotal_data - Withdrawals.$withdrawalfee_data).toFixed(2);
            Withdrawals.$Ratiotruemoney_data = (Withdrawals.$typename.val() == 'USDT-ERC20' || Withdrawals.$typename.val() == 'USDT-TRC20' || Withdrawals.$typename.val() == 'BEP20' || Withdrawals.$typename.val() == 'BEP2') ? (Withdrawals.$truemoney_data / Withdrawals.$ratio1[Withdrawals.$typename.val()]).toFixed(2) : 0;

            /*顯示在畫面上*/
            Withdrawals.$auditmoney.html(Withdrawals.$auditmsg);
            Withdrawals.$cost.text(Withdrawals.$cost_data);
            Withdrawals.$withdrawalfee.text(Withdrawals.$withdrawalfee_data);
            Withdrawals.$truemoney.text(Withdrawals.$truemoney_data);
            Withdrawals.$Ratiotruemoney.text(Withdrawals.$Ratiotruemoney_data);
        },
        /* 執行取款 */
        Do: function()
        {
            var $this = $(this);
            $this.hide();
            $('.pages-loading-box').removeClass('ani').css('display', 'block');
            var bankid = Withdrawals.$bank_list.find('li.active').attr('id');

            if (Withdrawals.$truemoney_data != Withdrawals.$truemoney.text() || Withdrawals.$cost_data != Withdrawals.$cost.text() ||
                Withdrawals.$withdrawalfee_data != Withdrawals.$withdrawalfee.text() || Withdrawals.$Ratiotruemoney_data != Withdrawals.$Ratiotruemoney.text())
            {
                SystemError.Do(Language.Get('请勿随意窜改金额') + '！！', 'error');
                Withdrawals.Cancel();
                return false;
            }

            var param = {
                data: {
                    paypwd: Withdrawals.$password.val(),
                    money: Withdrawals.$money.val(),
                    auditmoney: Withdrawals.$auditmoney_data,
                    cost: Withdrawals.$cost_data,
                    withdrawalfee: Withdrawals.$withdrawalfee_data,
                    truemoney: Withdrawals.$truemoney_data,
                    Ratiotruemoney: Withdrawals.$Ratiotruemoney_data,
                    bankId: bankid,
                    typename: Withdrawals.$typename.val(),
                    name: Withdrawals.$name.val(),
                    alipayAccount: Withdrawals.$alipayAccount.val(),
                    alipayNum: Withdrawals.$alipayNum.val(),
                    fastTurnNum: Withdrawals.$fastTurnNum.val(),
                    newbankName: Withdrawals.$newbankName.val(),
                    newbankAccount: Withdrawals.$newbankAccount.val(),
                    USDTAccount: Withdrawals.$USDTAccount.val(),
                    USDTTRC20Account: Withdrawals.$USDTTRC20Account.val(),
                    BRP20Account: Withdrawals.$BRP20Account.val(),
                    BEP2Account: Withdrawals.$BEP2Account.val(),
                },
                done: Withdrawals.Done,
            };
            Public.Api.Withdrawals(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';
            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }
            if (status === '0')
            {
                SystemError.Do(msg, 'success');
                Withdrawals.Cancel();
            }
            else
            {
                SystemError.Do(msg, 'error');
                Withdrawals.SetValue();
            }
            $('.pages-loading-box').addClass('ani').css('display', 'none');
        },
        /* 預設銀行卡 */
        Default: function()
        {
            var param = {
                data: {
                    bankId: Withdrawals.$bankId,
                },
                done: Withdrawals.DefaultBankDone,
            };
            Public.Api.BindBankcard(param);
        },
        DefaultBankDone: function(response)
        {
            if (typeof(response) !== 'object' || response.status!= 0)
            {
                SystemError.Do(Language.Get('绑定银行卡失败') + '！', 'error');
                return ;
            }
        },
        Cancel: function()
        {
            // Withdrawals.clearWithdrawalsInput();
            Withdrawals.ClearMoney();
            Withdrawals.ClearPassword();
            Withdrawals.SetValue();
        },
        ClearMoney: function()
        {
            Withdrawals.$money.val('');
        },
        ClearPassword: function()
        {
            Withdrawals.$password.val('');
        },
        clearWithdrawalsInput: function()
        {
            Withdrawals.$name.val('');
            Withdrawals.$alipayAccount.val('');
            Withdrawals.$alipayNum.val('');
            Withdrawals.$fastTurnNum.val('');
            Withdrawals.$newbankName.val('');
            Withdrawals.$newbankAccount.val('');
        },
        /*隱藏碼*/
        Hidenumber: function(truename, account)
        {
            var name_count = truename.length;
            var str = '';
            for (i = 0; i < name_count-1; i++)
            {
                str += '*';
            }
            var name = truename.replace(truename.substring(0, name_count-1), str);

            var bankcode_count = account.length;
            var bankcode = account.replace(account.substring(bankcode_count-9, bankcode_count-4), '*****');

            var data = {
                truename: name,
                account: bankcode,
            }
            return data;
        },
        SetPlaceholder: function()
        {
            Withdrawals.$top.find('#withdraw_money').attr('placeholder',Language.Get('输入HKD金额') + '：');
            Withdrawals.$top.find('#paypassword').attr('placeholder',Language.Get('输入支付密码') + '：');
            Withdrawals.$top.find('#name').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#alipayAccount').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#alipayNum').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#fastTurnNum').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#newbankName').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#newbankAccount').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#usdtAccount').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#usdtTRC20Account').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#bep20Account').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
            Withdrawals.$top.find('#bep2Account').attr('placeholder',Language.Get('请至个人中心绑定提款资料'));
        }
    };

    /* 聯繫客服充值 */
    var BankDeposit = {
        $top: {},
        $money: {},
        $hnote: {},
        $submit: {},
        $cancel: {},
        $clearMoney: {},
        $close: {},

        $table: {},
        $tbody: {},
        $item: {},
        $bank_list: {},

        Initial: function()
        {
            this.$top = $('div#recharge-service-dialog');
            this.$money = this.$top.find('#money');
            this.$hnote = this.$top.find('#hnote');
            this.$submit = this.$top.find('#submit');
            this.$cancel = this.$top.find('#cancel');
            this.$clearMoney = this.$top.find('#clearMoney');
            this.$close = this.$top.find('#close');

            this.$table = this.$top.find('#table');
            this.$tbody = this.$table.find('#tbody');
            this.$bank_list = this.$table.find('.recharge-custom-radio .bank-list');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$submit.on('click', this.Do);
            this.$cancel.on('click', this.Cancel);
            this.$clearMoney.on('click', this.ClearMoney);
            this.$bank_list.on('click', 'li', BankDeposit.ItemActive);
        },
        Do: function()
        {
            var param = {
                data: {
                    money: BankDeposit.$money.val(),
                    hnote: BankDeposit.$hnote.val(),
                    intoId: BankDeposit.$item.filter('.active').attr('intoId'),
                },
                done: BankDeposit.Done,
            };
            Public.Api.BankDeposit(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === '0')
            {
                SystemError.Do(msg, 'success');
                BankDeposit.$cancel.click();
                BankDeposit.$close.click();
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        SetMain: function()
        {
            Public.Api.GetReceiptAccount({done: BankDeposit.SetTable});
        },
        SetTable: function(response)
        {
            if (typeof(response) !== 'object' || response.status != 0 || typeof(response.msg) !== 'object')
            {
                return ;
            }
            var rows = typeof(response.msg) === 'object' ? response.msg : {};
            var list = '';
            /* 內容 */
            for (var key in rows)
            {
                var row = rows[key];
                var branch2 = row.branch2;
                if(branch2) branch2 += Language.Get("分行");
                var branch = row.branch;
                if(branch) branch += Language.Get("支行");
                list +=
                    '<li class="bank-list-item" intoId="'+ row.id +'">' +
                        '<h2><a id="' + row.type + '" class="account">' + row.type + '</a><span class="btn copy text_191" style="cursor: pointer;background: #dcb454;text-align: center;border-radius: 44px;" data-clipboard-text="' + row.type + '"></span></h2>' +
                        '<h2><a id="' + row.account + '" class="account">' + row.account + '</a><span class="btn copy text_191" style="cursor: pointer;background: #dcb454;text-align: center;border-radius: 44px;" data-clipboard-text="' + row.account + '"></span></h2>' +
                        '<h2><a id="' + row.province + row.city + branch2 + branch + '" class="account">' + row.province + row.city + branch2 + branch + '</a><span class="btn copy text_191" style="cursor: pointer;background: #dcb454;text-align: center;border-radius: 44px;" data-clipboard-text="' + row.province + row.city + branch2 + branch + '"></span></h2>' +
                        '<h2><a id="' + row.name + '" class="account">' + row.name + '</a><span class="btn copy text_191" style="cursor: pointer;background: #dcb454;text-align: center;border-radius: 44px;" data-clipboard-text="' + row.name + '"></span></h2>' +
                    '</li>';
            }
            BankDeposit.$bank_list.html(list);
            BankDeposit.$item = BankDeposit.$bank_list.find('li');
            BankDeposit.ItemActive.apply(BankDeposit.$item.eq(0));
            BankDeposit.$bank_list.find('.copy').on('click', BankDeposit.Copy);
        },
        Copy: function(){
            // 先取得 複製按鈕 的屬性 取得account
            var $this = $(this);
            var account = $this.attr('data-clipboard-text');

            //自動選取某個區域的文字
            var TextRange = document.createRange();
            TextRange.selectNode(document.getElementById(account));
            // 選擇的文本範圍
            sel = window.getSelection();
            // 選擇中刪除所有範圍
            sel.removeAllRanges();
            // 選擇中新增範圍
            sel.addRange(TextRange);
            // 複製
            if(document.execCommand("Copy"))
            {
                document.execCommand("Copy");
                alert(Language.Get('复制成功'));
            }
        },
        ItemActive: function()
        {
            BankDeposit.$item.removeClass('active');
            $(this).addClass('active');
        },
        Cancel: function()
        {
            BankDeposit.ClearMoney();
            BankDeposit.ClearHnote();
            BankDeposit.ItemActive.apply(BankDeposit.$item.eq(0));
        },
        ClearMoney: function()
        {
            BankDeposit.$money.val('');
        },
        ClearHnote: function()
        {
            BankDeposit.$hnote.val('');
        },
        SetPlaceholder: function()
        {
            BankDeposit.$money.attr('placeholder',Language.Get('输入金额') + '：');
            BankDeposit.$hnote.attr('placeholder',Language.Get('请先联系在线客服索取入款帐号，完成打款后在此页填入您的银行名称、户名、卡号及充值金额，谢谢'));
        }
    };

    /* 充值 */
    var Recharge = {
        $top: {},
        $money: {},
        $clearMoney: {},
        $close: {},
        $recharge_tabBtn: {},
        $usermoney: {},
        $select: {},
        $bankdeposit: {},
        $form: {},
        $type: {},
        $decimal: {},
        $onlinepay: {}, //存放支付碼
        $moneylimit: {}, //金額限制
        $moneylimit1: {}, //金額限制傳資料用的
        $note: {}, //備註
        $note1: {}, //備註傳資料用的
        $bankcode: {}, //存放銀行代碼
        $cointype: {}, //存放虛擬貨幣種類
        $merchanttype: {}, //存放超商種類
        $modetype: {}, //存放模式種類
        $qrimg: {},
        $CBSaddress: Public.GetLocalStorage('CBSaddress') || '', //存放CBS支付地址
        $paytypelist: {},
        $ratio: {},
        $ratio1: {}, //匯率傳資料用的
        $ratio2: {}, //匯率

        Initial: function()
        {
            this.$top = $('div#recharge-dialog');
            this.$money = this.$top.find('.recharge-custom-input-box input');
            this.$clearMoney = this.$top.find('.clear-btn');
            this.$close = this.$top.find('.btn-close');
            this.$recharge_tabBtn = this.$top.find('.recharge-tab-btns');
            this.$usermoney = this.$top.find('.recharge-user-mony strong');
            this.$select = this.$top.find('select[name="platform"]');
            this.$bankdeposit = this.$top.find('a[data-pop=recharge-service-dialog]');
            this.$form = this.$top.find('#recharge-form');
            this.$type = this.$form.find('input[name=type]');
            this.$decimal = this.$form.find('.decimal');
            this.$moneylimit = this.$form.find('.limitmoney');
            this.$note = this.$form.find('.note');
            this.$bankselect = this.$top.find('select[name="bankcode"]');
            this.$cointypeselect = this.$top.find('select[name="cointype"]');
            this.$cointypetext = this.$top.find('span[name="cointypetext"]');
            this.$merchanttypeselect = this.$top.find('select[name="merchanttype"]');
            this.$modetypeselect = this.$top.find('select[name="modetype"]');
            this.$ratio = this.$form.find('.ratio');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$recharge_tabBtn.on('click', '.recharge-item-btns', function(){
                var $this = $(this);
                var $classname = $this.attr('class').indexOf('is-close');
                $('.QRData, .payData, .payNotify').hide();
                $('.recharge-onlineQRimg').html('');
                Recharge.$top.find('.recharge-data, .recharge-submit').show();
                if ($classname == -1)
                {
                    $this.siblings().removeClass('active');
                    $this.addClass('active');
                }
                else
                {
                    $this.removeClass('active');
                }
                Recharge.PlatformDo();
            });
            this.$clearMoney.on('click', this.ClearMoney);
            this.$close.on('click', function(){
                Recharge.ClearMoney();
                $('.QRData, .payData, .ratio, .USDTAddress, .Tutorial').hide();
                Recharge.$top.find('.recharge-data').show();
            });
            this.$bankdeposit.on('click', this.ClearMoney);
            this.$bankdeposit.on('click', BankDeposit.SetMain);
            this.$form.bind('submit', this.Do);

            this.$select.on('change', function(){
                var $this = $(this);
                var id = $this.val();
                $('.QRData, .payData, .Tutorial').hide();
                Recharge.$top.find('.recharge-data').show();
                $('.recharge-onlineQRimg').html('');
                Recharge.changePlatform(id);
                Recharge.$top.find('input[name="money"], input[name="Ratiotruemoney"]').val('');
            });

            this.$top.find('.payData').on('click', '.copytext', function(){
                var $this = $(this);
                var account = $this.attr('data-clipboard-text');
                //自動選取某個區域的文字
                const TextRange = document.createRange();
                TextRange.selectNode(document.getElementById(account));
                const sel = window.getSelection();  // 選擇的文本範圍
                sel.removeAllRanges(); // 選擇中刪除所有範圍
                sel.addRange(TextRange); // 選擇中新增範圍
                if(document.execCommand("Copy")) // 複製
                {
                    document.execCommand("Copy");
                    alert(Language.Get('复制成功'));
                }
            });

            this.$top.find('.payData').on('click', '.payNotify', function(){
                var $this = $(this);
                var order = $this.attr('order');
                var platform = $this.attr('platform');
                var param = {
                    data: {
                        order: order,
                        platform: platform,
                    },
                    done: Recharge.NotifyPayDone,
                };
                Public.Api.NotifyPay(param);
                $this.hide();
            });

            this.$top.find('.USDTTutorial1, .USDTTutorial2').on('click', function(){
                $('div#recharge-dialog').hide();
                $('#modal-backdrop').removeClass('fade in');
                var $this = $(this);
                var name = $this.attr('type');
                Recharge.GetTutorial(name);
            });

            this.$top.find('input[name="money"], input[name="Ratiotruemoney"]').on('keyup', this.SetRatesValue);
        },
        GetTutorial: function(name)
        {
            if (name == 'USDTTutorial_mp4')
            {
                $('div[data-page-name="USDTTutorial"]').find('.USDTTutorialTitle').html(Language.Get('USDT教程影片'));
                var data =  '<div>1.<span>' + Language.Get("新增币种及转账") + '</span></div>' +
                            '<video class="video01" controls style="width: 100%;" poster="./images/USDTTutorial_imtoken_img.png" preload= "none"><source src="./media/USDTTutorial_imtoken.mp4" type="video/mp4"></video>' +
                            '<div>2.<span>' + Language.Get("创建专属电子钱包") + '</span></div>' +
                            '<video class="video02" controls style="width: 100%;" poster="./images/USDTTutorial_Openimtoken_img.png" preload= "none"><source src="./media/USDTTutorial_Openimtoken.mp4" type="video/mp4"></video>' +
                            '<div>3.<span>' + Language.Get("虚拟货币交易所推介") + '</span></div>' +
                            '<video class="video03" controls style="width: 100%; margin-bottom: 60px;" poster="./images/USDTTutorial_Exchange_img.png" preload= "none"><source src="./media/USDTTutorial_Exchange.mp4" type="video/mp4"></video>';
            }
            if (name == 'USDTTutorial_pdf')
            {
                $('div[data-page-name="USDTTutorial"]').find('.USDTTutorialTitle').html(Language.Get('USDT教程文档'));
                var data =  '<div>1.<span>' + Language.Get("新增币种及转账") + '</span></div>' +
                            '<img src="./images/USDTTutorial_imtoken.png" style="width: 100%;">' +
                            '<div style="margin-top: 25px;">2.<span>' + Language.Get("创建专属电子钱包") + '</span></div>' +
                            '<img src="./images/USDTTutorial_Openimtoken.png" style="width: 100%;">' +
                            '<div style="margin-top: 25px;">3.<span>' + Language.Get("虚拟货币交易所推介") + '</span></div>' +
                            '<img src="./images/USDTTutorial_Exchange.png" style="width: 100%; margin-bottom: 60px;">';
            }
            $('div[data-page-name="USDTTutorial"]').find('.Tutorialdata').html(data);
        },
        changePlatform: function(id)
        {
            var code = Recharge.$select.find('option[value="' + id + '"]').attr('code');
            var type = Recharge.$recharge_tabBtn.find('a.active').attr('type');

            if (Recharge.$paytypelist[type].isOnlineQR == 1)
            {
                /* 呼叫該支付碼的資訊 */
                Recharge.OnlinepayList(id);
            }

            /* 呼叫第三方支付的資訊 708 */
            Public.Api.GetPaymentlist({
                data: {payment: code,},
                done: Recharge.GetDecimal,
            });

            /* 呼叫會員資訊 101 抓取CBS資訊用 */
            Public.Api.SetUserInfo();

            Recharge.$CBSaddress = Public.GetLocalStorage('CBSaddress');
            Recharge.$bankselect.html(Recharge.$bankcode[code] || '');
            Recharge.$cointypeselect.html(Recharge.$cointype[code] || '');
            Recharge.$merchanttypeselect.html(Recharge.$merchanttype[code] || '');
            Recharge.$modetypeselect.html(Recharge.$modetype[code] || '');
            Recharge.$cointypetext.html(Public.GetLocalStorage('CBScointype'));
            Recharge.$moneylimit.html(Recharge.$moneylimit1[id]);
            Recharge.$note.html(Recharge.$note1[id]);
            Recharge.$ratio.html(Recharge.$ratio1[id]);
            Recharge.$top.find('input[name=USDTAddress]').val('');
            Recharge.SetTableView(type, code);
        },
        /* 呼叫支付類型 707 */
        PlatformtypeDo: function()
        {
            Recharge.$top.find('#recharge-submit').show();
            var isChange = Public.GetLocalStorage('wechatChange');
            if (isChange == 0)
            {
                return false;
            }
            Public.Api.GetLinePlatformtype({done: Recharge.PlatformtypeDone});
        },
        /* 取得支付類型且顯示出來 */
        PlatformtypeDone: function(response)
        {
            if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || typeof(response.msg.paytypelist) !== 'object' || response.status !== 0)
            {
                return ;
            }
            Recharge.$paytypelist = response.msg.paytypelist;
            var tag = '<span class="scroll-tip"></span>';
            var num = 1;
            var typeimg = '';
            for (var key in Recharge.$paytypelist)
            {
                var row = Recharge.$paytypelist[key];
                if (row.ismoblie == 1)
                {
                    if (key != 'CompanyBank' && key != 'withdrawal')
                    {
                        tag += '<a class="recharge-item-btns ' + key + '" type="' + key + '"></a>';
                        num++;
                    }
                }
            }
            Recharge.$recharge_tabBtn.html(tag);
        },
        /* 呼叫某種類型的第三方支付 706 */
        PlatformDo: function()
        {
            var isChange = Public.GetLocalStorage('wechatChange');
            if (isChange == 0)
            {
                return false;
            }
            if(localStorage.isCredit == '1')
            {
                alert(Language.Get('你的上层代理为信用代理, 不开放使用存提功能'));
                return false;
            }
            var type = Recharge.$recharge_tabBtn.find('a.active').attr('type');
            if (Recharge.$paytypelist[type].isOnlineQR == 1)
            {
                Public.Api.GetOlinepayList({
                    data: {type: type,},
                    done: Recharge.OnlinepayDone,
                });
                Recharge.SetTableView(type, '');
            }
            else
            {
                Public.Api.GetLinePlatform({
                    data: {type: type,},
                    done: Recharge.PlatformDone,
                });
            }
        },
        /* 取得某種類型的第三方支付_初始值 706 */
        PlatformDone: function(response)
        {
            if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || typeof(response.msg.linePlatform) !== 'object' || response.status !== 0)
            {
                $('.recharge-onlineQRimg, .recharge-PhoneCard').css('display', 'none');
                Recharge.$top.find('.bank_account_name,.bank_account,.mobile,.idcard,.truename,.bankname,.IFSC,.merchanttype,.truename,.email, .CSC, .expDate, .modetype, .ratio, .USDTAddress, .Tutorial, .Ratiotruemoney').hide();
                SystemError.Do(Language.Get('暂无通道可以支付') + '！', 'error');
                Recharge.$select.html('');
                Recharge.$decimal.html('');
                Recharge.$moneylimit.html('');
                Recharge.$note.html('');
                return ;
            }
            var linePlatform = response.msg.linePlatform;
            var bankcode = response.msg.bankcode;
            var bank = response.msg.bank;
            var cointype = response.msg.cointype;
            var merchanttype = response.msg.merchanttype;
            var modetype = response.msg.modetype;
            var tag = '';
            for (var key in linePlatform)
            {
                var row = linePlatform[key];
                tag += '<option autoStatus="' + row.autoStatus + '" value="' + row.id + '" code="' + row.code + '">' + row.merchantname + '</option>';
                Recharge.$moneylimit1[row.id] = Language.Get('金额') + ': ' + row.singlelow + '~' + row.singlehigh + Language.Get('元');
                var note = (row.hnote != '') ? Language.Get('备注') + ': <pre style="white-space: pre-wrap;word-wrap: break-word; color: #bda287;">' + row.hnote + '</pre>' : '';
                Recharge.$note1[row.id] = note;
                var ratio = (row.ratio != '' && row.ratio != 1) ? '<pre style="white-space: pre-wrap;word-wrap: break-word; color: #f37830;">' + Language.Get('汇率提示') + ': 1' + row.type + ' : ' + row.ratio + '</pre>' : '';
                Recharge.$ratio1[row.id] = ratio;
                Recharge.$ratio2[row.id] = row.ratio;
                Recharge.$top.find('.RatioTitle').html(row.type);
            }
            //銀行代碼
            for (var key in bankcode)
            {
                var tag1 = '';
                for (var key1 in bankcode[key])
                {
                    var row1 = bankcode[key][key1];
                    tag1 += '<option value="' + row1 + '">' + bank[row1] + '</option>';
                }
                Recharge.$bankcode[key] = tag1;
            }

            //虛擬貨幣種類
            for (var key in cointype)
            {
                var tag2 = '';
                var CBScointype = Public.GetLocalStorage('CBScointype') || '';
                if (CBScointype == '' || CBScointype == 'null')
                {
                    for (var key1 in cointype[key])
                    {
                        var row1 = cointype[key][key1];
                        tag2 += '<option value="' + row1 + '">' + row1 + '</option>';
                    }
                }
                else
                {
                    tag2 = '<option value="' + CBScointype + '">' + CBScointype + '</option>';
                }
                Recharge.$cointype[key] = tag2;
            }

            //超商種類
            for (var key in merchanttype)
            {
                var tag1 = '';
                for (var key1 in merchanttype[key])
                {
                    var row1 = merchanttype[key][key1];
                    tag1 += '<option value="' + key1 + '">' + row1 + '</option>';
                }
                Recharge.$merchanttype[key] = tag1;
            }

            //模式種類
            for (var key in modetype)
            {
                var tag1 = '';
                for (var key1 in modetype[key])
                {
                    var row1 = modetype[key][key1];
                    tag1 += '<option value="' + key1 + '">' + row1 + '</option>';
                }
                Recharge.$modetype[key] = tag1;
            }

            Recharge.$select.html(tag);

            var paymentId = $('select[name=platform]').val();
            Recharge.changePlatform(paymentId);
        },   
        /* 取得支付碼支付通道且顯示出來 */
        OnlinepayDone: function(response)
        {
            if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || typeof(response.msg.onlinepay) !== 'object' || response.status !== 0)
            {
                $('.recharge-onlineQRimg, .recharge-PhoneCard').css('display', 'none');
                Recharge.$top.find('.bank_account_name,.bank_account,.mobile,.idcard,.truename,.bankname,.IFSC,.merchanttype,.truename,.email, .CSC, .expDate, .modetype, .ratio, .USDTAddress, .Tutorial, .Ratiotruemoney').hide();
                SystemError.Do(Language.Get('暂无通道可以支付') + '！', 'error');
                Recharge.$select.html('');
                Recharge.$decimal.html('');
                Recharge.$moneylimit.html('');
                Recharge.$note.html('');
                return ;
            }
            Recharge.$onlinepay = response.msg.onlinepay;
            var tag = '';
            var num = 1;
            for (var key in Recharge.$onlinepay)
            {
                var active = (num == 1) ? 'active' : '';
                var row = Recharge.$onlinepay[key];
                tag += '<option name="onlinelist" value="' + row.id + '" class="' + active + '">' + row.name + '</option>';
                Recharge.$moneylimit1[row.id] = Language.Get('金额') + ': ' + row.singlelow + '~' + row.singlehigh + Language.Get('元');
                Recharge.$note1[row.id] = (row.hnote != '') ? Language.Get('备注') + ': <pre style="white-space: pre-wrap;word-wrap: break-word; color: #bda287;">' + row.hnote + '</pre>' : '';
                Recharge.$qrimg[row.id] = '<img intoId="' + row.id + '" class="onlineimg" style="width:150px;" src="' + window.Config.QRPAYURL + row.QRname_web + row.QRextension_web + '">';
                if (row.showtype == 'url')
                {
                    Recharge.$qrimg[row.id] += '<br><a href="' + row.text + '" style="white-space: pre-wrap; word-wrap: break-word;">' + row.text + '</a>';
                }
                else if (row.showtype == 'text')
                {
                    Recharge.$qrimg[row.id] += '<div style="white-space: pre-wrap; word-wrap: break-word;">' + row.text + '</div>';
                }
                num++;
            }
            if (num == 1)
            {
                Recharge.$select.html('');
                Recharge.$decimal.html('');
                Recharge.$moneylimit.html('');
                Recharge.$note.html('');
            }
            Recharge.$select.html(tag);
            
            var id = $('option[name=onlinelist]').val();
            Recharge.OnlinepayList(id);
        },
        /* 取得該支付碼的資訊並顯示出來 */
        OnlinepayList: function(id)
        {
            Recharge.$moneylimit.html(Recharge.$moneylimit1[id]);
            Recharge.$note.html(Recharge.$note1[id]);
            Recharge.$decimal.html('');
            Recharge.GetDecimal();
        },
        Do: function()
        {
            var url = Public.GetConfig('FORMURL');
            var apiUrl = Public.GetConfig('APIURL');
            var $this = $(this);
            var platformid = $this.find('select[name=platform]').val();
            var type = Recharge.$recharge_tabBtn.find('a.active').attr('type');
            var autostatus = Recharge.$select.find('option[value="' + platformid + '"]').attr('autoStatus');
            var platform = $this.find('select[name=platform]').find('option:selected').attr('code');
            var truename = $this.find('input[name=truename]').val();

            if ((platform == 'RSPAY' || platform == 'BAOFU' || platform == 'WPAY') && truename == '')
            {
                alert(Language.Get('姓名不能为空'));
                return false;
            }
            if (($this.find('input[name=money]').val() % 1) != 0)
            {
                alert(Language.Get('金额请输入整数'));
                return false;
            }
            if ($this.find('input[name=decimal]').val() != $this.find('.decimal').text())
            {
                alert(Language.Get('请勿随意窜改金额'));
                return false;
            }

            $this.find('.recharge-submit').hide();

            if (Recharge.$paytypelist[type].isOnlineQR == 1)
            {
                var param = {
                    data: {
                        sid: Public.GetLocalStorage('sid'),
                        intoId: $this.find('select[name=platform]').val(),
                        money: $this.find('input[name=money]').val(),
                        decimal: $this.find('.decimal').text(),
                        trueName: Public.GetLocalStorage('truename'),
                        type: type,
                        lang: Public.GetLocalStorage('lang'),
                        hosturl: Public.GetConfig('HOSTURL'),
                    },
                    done: Recharge.OnlineQRDone,
                };
                Public.Api.OnlineQRDeposit(param);
            }
            else
            {
                //判斷一般通道是自動上分還是手動上分
                if (autostatus == '1')
                {
                    var param = {
                        data: {
                            action: apiUrl,
                            method: 'POST',
                            target: '_self',
                            cmd: 223,
                            sid: Public.GetLocalStorage('sid'),
                            platform: $this.find('select[name=platform]').val(),
                            bankcode: $this.find('select[name=bankcode]').val(),
                            cointype: (Public.GetLocalStorage('CBSaddress') != '' && Public.GetLocalStorage('CBSaddress') != 'null') ? Public.GetLocalStorage('CBScointype') : $this.find('select[name=cointype]').val(),
                            merchanttype: $this.find('select[name=merchanttype]').val(),
                            modetype: $this.find('select[name=modetype]').val(),
                            money: $this.find('input[name=money]').val(),
                            decimal: $this.find('.decimal').text(),
                            truename: $this.find('input[name=truename]').val(),
                            mobile: $this.find('input[name=mobile]').val(),
                            email: $this.find('input[name=email]').val(),
                            IFSC: $this.find('input[name=IFSC]').val(),
                            bankname: $this.find('input[name=bankname]').val(),
                            bank_account: $this.find('input[name=bank_account]').val(),
                            bank_account_name: $this.find('input[name=bank_account_name]').val(),
                            idcard: $this.find('input[name=idcard]').val(),
                            phonecardType: $this.find('input[name=phonecardType]:checked').val(),
                            cardNumber: $this.find('input[name=cardNumber]').val(),
                            serialNumber: $this.find('input[name=serialNumber]').val(),
                            type: type,
                            lang: Public.GetLocalStorage('lang'),
                            hosturl: Public.GetConfig('HOSTURL'),
                            autoStatus: autostatus,
                        },
                        done: Recharge.DepositDone,
                    };
                    Public.Api.Recharge(param);
                }
                else
                {
                    var param = {
                        data: {
                            action: apiUrl,
                            method: 'POST',
                            target: '_self',
                            cmd: 223,
                            sid: Public.GetLocalStorage('sid'),
                            platform: Recharge.$top.find('select[name=platform]').val(),
                            merchanttype: Recharge.$top.find('select[name=merchanttype]').val(),
                            money: Recharge.$top.find('input[name=money]').val(),
                            decimal: Recharge.$top.find('.decimal').text(),
                            USDTAddress: Recharge.$top.find('input[name=USDTAddress]').val(),
                            type: type,
                            lang: Public.GetLocalStorage('lang'),
                            autoStatus: autostatus,
                        },
                        done: Recharge.PayDone,
                    };
                    Public.Api.Recharge(param);
                }
            }
            Recharge.ClearMoney();
            return false;
        },
        /* 自動上分的提交訂單後顯示的支付資訊 */
        DepositDone: function(response)
        {
            var status = -99;
            var msg = 'System error';
            var tag = '';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
            }
            if (status == '0')
            {
                var lineData = response.msg.lineData;
                var linePlatformData = response.msg.linePlatformData;
                var data = response.msg.result;

                if (data.msg != '' && data.msg != undefined)
                {
                    alert(data.msg);
                    return false;
                }

                if (lineData.type == 'alipay' || lineData.type == 'AlipayMobile' || lineData.type == 'NativeAlipayH5' || lineData.type == 'AlipayTransfer' ||
                    lineData.type == 'AlipayQRpay' || lineData.type == 'AlipayToAlipay' || lineData.type == 'AlipayReds')
                {
                     var accountText = Language.Get('支付宝帐号');
                }
                else if (lineData.type == 'web' || lineData.type == 'ATM' || lineData.type == 'WebATM' || lineData.type == 'BankTransfer' || lineData.type == 'HSBC' ||
                         lineData.type == 'BACHF' || lineData.type == 'BKEAF' || lineData.type == 'ZABANK' || lineData.type == 'MASTER' || lineData.type == 'VISA')
                {
                    var accountText = Language.Get('银行帐号');
                }
                else if (lineData.type == 'wechat' || lineData.type == 'WechatMobile' || lineData.type == 'WechatMina')
                {
                    var accountText = Language.Get('微信帐号');
                }                
                else if (lineData.type == 'QQ' || lineData.type == 'fast' || lineData.type == 'FPS' || lineData.type == 'PAYME' || lineData.type == 'MOMO' ||
                         lineData.type == 'ZALO' || lineData.type == 'VIETTELPAY' || lineData.type == 'USDT')
                {
                    var paytypename = Recharge.$paytypelist[lineData.type].name;
                    var accountText =  Language.Get(paytypename) + Language.Get('帐号');
                }
                else //UnionpayQR  JingdongScanCod  JingdongMobile YunShanPay OnlineQR PhoneCard Deposit VNQR MerchantCode MerchantBarcode Cash BankScan PaytmWallet PaytmUPI
                {
                    var accountText = Language.Get('帐号');
                }
				
				if (linePlatformData.showtype == 'qr')
                {
                     tag =  "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px;'>" + Language.Get('支付平台') + ": <span class='Payplatformtext'></span></div>" +
                            "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>" +
                            "<div class='recharge-onlineQRimg' style='text-align:center; margin-top: 7px;'>" +
                                "<div id='pay_qrcode'></div>" +
                            "</div>";
                }else{
					tag =   "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px;'>" + Language.Get('订单编号') + ": <span class='Payorderno'></span></div>" +
							"<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px;'>" + Language.Get('支付平台') + ": <span class='Payplatformtext'></span></div>" +
							"<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>" +
							"<div class='" + lineData.type + "Data accountnameText' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('用户姓名') + ": <span class='Payaccountname'></span></div>" +
							"<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + accountText + ": " +
								"<span id='" + data.account + "' class='Payaccount'></span>" +
								"<div id='PayaccountCopy' class='clipboard copytext btn btn-xs' data-clipboard-text='" + data.account + "' style='margin-left: 5px; background: linear-gradient(to right, #a4e2ff, #2c66a8); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 3px 10px; border-radius: 3px; font-size: 13px; letter-spacing: 2px;'>" + Language.Get('复制') + "</div>" +
							"</div>" +
							"<div class='" + lineData.type + "Data banknameText' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('银行名称') + ": <span class='Paybankname'></span></div>" +
							"<div order='" + lineData.ordernumber + "' platform='" + linePlatformData.code + "' class='recharge-custom-input-box payNotify' style='background: linear-gradient(to right, #a4e2ff, #2c66a8); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 5px 10px; border-radius: 3px; font-size: 16px; letter-spacing: 2px; text-align: center; min-height: 25px; line-height: 25px;'>" + Language.Get('确认支付') + "</div>";
				}
                Recharge.$top.find('.payData').html(tag).show();
				if (linePlatformData.showtype == 'qr')
					new QRCode(document.getElementById("pay_qrcode"), linePlatformData.url);
                Recharge.$top.find('.recharge-data').hide();
                $('.' + lineData.type + 'Data').show();
                if (lineData.type != 'BankTransfer' && lineData.type != 'HSBC' && lineData.type != 'BACHF' && lineData.type != 'BKEAF' && lineData.type != 'ZABANK' && lineData.type != 'MASTER' && lineData.type != 'VISA')
                {
                    $('.banknameText').hide();
                }
                $('.' + lineData.type + 'Data').find('.Payplatformtext').html(linePlatformData.merchantname);
                $('.' + lineData.type + 'Data').find('.Payorderno').html(lineData.ordernumber);
                $('.' + lineData.type + 'Data').find('.PayMoneytext').html(data.money);
                $('.' + lineData.type + 'Data').find('.Payaccount').html(data.account);
                $('.' + lineData.type + 'Data').find('.Payaccountname').html(data.name);
                $('.' + lineData.type + 'Data').find('.Paybankname').html(data.bankname);
                Recharge.ClearMoney();
            }
            else
            {
                msg = (('msg' in response) && response.msg) || msg;
                alert(msg);
            }
        },
        /* 手動上分的提交訂單後顯示的支付資訊 */
        PayDone: function(response)
        {
            var status = -99;
            var msg = 'System error';
            var tag = '';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
            }
            if (status == '0')
            {
                msg = (('msg' in response) && response.msg.msg) || msg;
                var lineData = response.msg.lineData;
                var linePlatformData = response.msg.linePlatformData;
                if (lineData.type == 'alipay' || lineData.type == 'AlipayMobile' || lineData.type == 'NativeAlipayH5' || lineData.type == 'AlipayTransfer' ||
                    lineData.type == 'AlipayQRpay' || lineData.type == 'AlipayToAlipay' || lineData.type == 'AlipayReds')
                {
                     var accountText = Language.Get('支付宝帐号');
                }
                else if (lineData.type == 'web' || lineData.type == 'ATM' || lineData.type == 'WebATM' || lineData.type == 'BankTransfer' || lineData.type == 'HSBC' ||
                         lineData.type == 'BACHF' || lineData.type == 'BKEAF' || lineData.type == 'ZABANK' || lineData.type == 'MASTER' || lineData.type == 'VISA')
                {
                    var accountText = Language.Get('银行帐号');
                }
                else if (lineData.type == 'wechat' || lineData.type == 'WechatMobile' || lineData.type == 'WechatMina')
                {
                    var accountText = Language.Get('微信帐号');
                }                
                else if (lineData.type == 'QQ' || lineData.type == 'fast' || lineData.type == 'FPS' || lineData.type == 'PAYME' || lineData.type == 'MOMO' ||
                         lineData.type == 'ZALO' || lineData.type == 'VIETTELPAY')
                {
                    var paytypename = Recharge.$paytypelist[lineData.type].name;
                    var accountText =  Language.Get(paytypename) + Language.Get('帐号');
                }
                else if (lineData.type == 'USDT')
                {
                    var accountText = Language.Get('钱包地址');
                }
                else if (lineData.type == 'GCash')
                {
                    var accountText = Language.Get('号码');
                }
                else //UnionpayQR  JingdongScanCod  JingdongMobile YunShanPay OnlineQR PhoneCard Deposit VNQR MerchantCode MerchantBarcode Cash BankScan PaytmWallet PaytmUPI
                {
                    var accountText = Language.Get('帐号');
                }

                if (linePlatformData.showtype == 'text')
                {
                    tag += "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px;'>" + Language.Get('支付平台') + ": <span class='Payplatformtext'></span></div>";
                            
                    if (linePlatformData.type == 'USDT' || linePlatformData.type == 'SLP')
                    {
                        tag +=  "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" +
                                    "<div>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>" +
                                    "<div>" + Language.Get(linePlatformData.type + '数量') + ": <span>" + lineData.Ratiotruemoney + "</span></div>" +
                                "</div>";
                    }
                    else
                    {
                        tag += "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>";
                    }
                    tag +=  "<div class='" + lineData.type + "Data accountnameText' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('用户姓名') + ": <span class='Payaccountname'></span></div>" +
                            "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + accountText + ": " +
                                "<span id='" + linePlatformData.cardnoin + "' class='Payaccount' style='white-space: pre-wrap; word-wrap: break-word;'></span>" +
                                "<div id='PayaccountCopy' class='clipboard copytext btn btn-xs' data-clipboard-text='" + linePlatformData.cardnoin + "' style='margin-left: 5px; background: linear-gradient(to right, #a4e2ff, #2c66a8); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 3px 10px; border-radius: 3px; font-size: 13px; letter-spacing: 2px;'>" + Language.Get('复制') + "</div>" +
                            "</div>" +
                            "<div class='" + lineData.type + "Data banknameText' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('银行名称') + ": <span class='Paybankname'></span></div>";
                }
                else if (linePlatformData.showtype == 'qr')
                {
                    tag +=  "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px;'>" + Language.Get('支付平台') + ": <span class='Payplatformtext'></span></div>";
                    if (linePlatformData.type == 'USDT' || linePlatformData.type == 'SLP')
                    {
                        tag +=    "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" +
                                      "<div>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>" +
                                      "<div>" + Language.Get(linePlatformData.type + '数量') + ": <span>" + lineData.Ratiotruemoney + "</span></div>" +
                                  "</div>";
                    }
                    else
                    {
                        tag += "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>";
                    }
                    tag +=    "<div class='recharge-onlineQRimg' style='text-align:center; margin-top: 7px;'>" +
                                  "<img class='onlineimg' style='width:150px;'' src='" + window.Config.QRPAYURL + linePlatformData.QRfile + "'>" +
                              "</div>";
                }
                else if (linePlatformData.showtype == 'all')
                {
                    tag +=  "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px;'>" + Language.Get('支付平台') + ": <span class='Payplatformtext'></span></div>";
                    if (linePlatformData.type == 'USDT' || linePlatformData.type == 'SLP')
                    {
                        tag +=  "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" +
                                    "<div>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>" +
                                    "<div>" + Language.Get(linePlatformData.type + '数量') + ": <span>" + lineData.Ratiotruemoney + "</span></div>" +
                                "</div>";
                    }
                    else
                    {
                        tag += "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('充值金额') + ": <span class='PayMoneytext'></span></div>";
                    }
                    tag +=  "<div class='recharge-onlineQRimg' style='text-align:center; margin-top: 5px;'>" +
                                "<img class='onlineimg' style='width:100px; height: 100px;' src='" + window.Config.QRPAYURL + linePlatformData.QRfile + "'>" +
                            "</div>" +
                            "<div class='" + lineData.type + "Data accountnameText' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('用户姓名') + ": <span class='Payaccountname'></span></div>" +
                            "<div class='" + lineData.type + "Data' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + accountText + ": " +
                                "<span id='" + linePlatformData.cardnoin + "' class='Payaccount' style='white-space: pre-wrap; word-wrap: break-word;'></span>" +
                                "<div id='PayaccountCopy' class='clipboard copytext btn btn-xs' data-clipboard-text='" + linePlatformData.cardnoin + "' style='margin-left: 5px; background: linear-gradient(to right, #a4e2ff, #2c66a8); color: #fff; border: 0; box-shadow: none; cursor: pointer; padding: 3px 10px; border-radius: 3px; font-size: 13px; letter-spacing: 2px;'>" + Language.Get('复制') + "</div>" +
                            "</div>" +
                            "<div class='" + lineData.type + "Data banknameText' style='min-height: 40px; line-height: 40px; margin-top: 5px;'>" + Language.Get('银行名称') + ": <span class='Paybankname'></span></div>";
                }

                Recharge.$top.find('.payData').html(tag).show();
                Recharge.$top.find('.recharge-data').hide();
                $('.' + lineData.type + 'Data').show();
                if (lineData.type != 'BankTransfer' && lineData.type != 'HSBC' && lineData.type != 'BACHF' && lineData.type != 'BKEAF' && lineData.type != 'ZABANK' && lineData.type != 'MASTER' && lineData.type != 'VISA' && lineData.type != 'FPS')
                {
                    $('.accountnameText, .banknameText').hide();
                }
                $('.' + lineData.type + 'Data').find('.Payplatformtext').html(linePlatformData.merchantname);
                $('.' + lineData.type + 'Data').find('.PayMoneytext').html(lineData.money);
                $('.' + lineData.type + 'Data').find('.Payaccount').html(linePlatformData.cardnoin);
                $('.' + lineData.type + 'Data').find('.Payaccountname').html(linePlatformData.accountname);
                $('.' + lineData.type + 'Data').find('.Paybankname').html(linePlatformData.bankname);
                alert(msg);
                Recharge.ClearMoney();
            }
            else
            {
                msg = (('msg' in response) && response.msg) || msg;
                alert(msg);
            }
        },
        OnlineQRDone: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
            }
            if (status === '0')
            {
                msg = (('msg' in response) && response.msg.msg) || msg;
                var onlinpayData = response.msg.onlinpayData;
                var qrtransferData = response.msg.qrtransferData;

                $('.QRData').find('.Payplatformtext').html(': ' + onlinpayData.name);
                $('.QRData').find('.PayMoneytext').html(': ' + qrtransferData.money);

                var id = Recharge.$select.val();
                $('.recharge-onlineQRimg').html(Recharge.$qrimg[id]);
                $('.QRData').show();
                Recharge.$top.find('.recharge-data').hide();
                SystemError.Do(msg, 'success');
                Recharge.ClearMoney();
            }
            else
            {
                msg = (('msg' in response) && response.msg) || msg;
                SystemError.Do(msg, 'error');
            }
        },
        ClearMoney: function()
        {
            Recharge.$money.val('');
        },
        SetUserMoney: function()
        {
            Recharge.$usermoney.html(Public.GetLocalStorage('money'));
        },
        /* 取得第三方支付的是否使用小數點 708 */
        GetDecimal: function(response)
        {
            var type = Recharge.$recharge_tabBtn.find('a.active').attr('type');
            if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || typeof(response.msg.paymentlist) !== 'object' || response.status !== 0)
            {
                if (type == 'AlipayToAlipay' || type == 'FPS' || type == 'PAYME' || type == 'AlipayQRpay')
                {
                    var a = Math.floor(Math.random()*(39))+10;
                    Recharge.$decimal.html('.' + a);
                    Recharge.$top.find('input[name=decimal]').val('.' + a);
                }
                else
                {
                    Recharge.$decimal.html('');
                    Recharge.$top.find('input[name=decimal]').val('');
                }
                return ;
            }
            
            var isDecimal = $.parseJSON(response.msg.paymentlist.isDecimal);
            var decimal = isDecimal[type];
            if (decimal == 1)
            {
                Recharge.$decimal.html('');
                Recharge.$top.find('input[name=decimal]').val('');
            }
            else
            {
                var a = Math.floor(Math.random()*(39))+10;
                Recharge.$decimal.html('.' + a);
                Recharge.$top.find('input[name=decimal]').val('.' + a);
                Recharge.$top.find('.point').css('right', '60px');
            }
        },
        SetRatesValue: function()
        {
            var $this = $(this);
            var name = $this.attr('name');
            var platformid = Recharge.$top.find('select[name=platform]').val();
            var type = Recharge.$recharge_tabBtn.find('a.active').attr('type');
            var autostatus = Recharge.$select.find('option[value="' + platformid + '"]').attr('autoStatus');

            if (type == 'USDT' && autostatus == '0')
            {
                if (name == 'money')
                {
                    $truemoney = Recharge.$top.find('input[name="money"]').val() != '' ? Math.round((Recharge.$top.find('input[name="money"]').val() / Recharge.$ratio2[platformid]) * 100) / 100 : 0;
                    Recharge.$top.find('input[name="Ratiotruemoney"]').val($truemoney);
                    console.log(Recharge.$ratio2[platformid]);
                }
                else if (name == 'Ratiotruemoney')
                {
                    $truemoney = Recharge.$top.find('input[name="Ratiotruemoney"]').val() != '' ? Math.round((Recharge.$top.find('input[name="Ratiotruemoney"]').val() * Recharge.$ratio2[platformid]) * 100) / 100 : 0;
                    Recharge.$top.find('input[name="money"]').val($truemoney);
                }
            }
        },
        SetTableView: function(type, code)
        {
            var platformid = Recharge.$top.find('select[name=platform]').val();
            var autostatus = Recharge.$select.find('option[value="' + platformid + '"]').attr('autoStatus');
            //調整欄位顯示隱藏
            Recharge.$top.find('.bank_account_name,.bank_account,.mobile,.idcard,.truename,.bankname,.IFSC,.merchanttype,.truename,.email, .CSC, .expDate, .modetype, .truename_note, .ratio, .USDTAddress, .Tutorial, .Ratiotruemoney').hide();
            if (type == 'fast' && code == 'YIBAOPAY')
            {
                Recharge.$top.find('.bank_account_name,.mobile,.idcard').show();
            }
            else if (code == 'MPPAY' || code == 'DAIFAPAY' || code == 'RSPAY' || code == 'BAOFU' || code == 'WPAY' || code == 'SSTGPAY')
            {
                if (code == 'DAIFAPAY' && type == 'web')
                {
                    Recharge.$top.find('.modetype').show();
                }
                if (code == 'SSTGPAY' && type == 'MerchantCode')
                {
                    Recharge.$top.find('.merchanttype').show();
                }
                Recharge.$top.find('.truename').show();
            }
            else if (code == 'HUEITONGPAY')
            {
                var item = (type == 'MerchantCode') ? '.merchanttype,.truename,.mobile,.email' : '.truename,.mobile,.email';
                Recharge.$top.find('.merchanttype,.truename,.mobile,.email').hide();
                Recharge.$top.find(item).show();
            }
            else if (code == 'ASTROPAY')
            {
                Recharge.$top.find('.bank_account, .CSC, .expDate').show();
            }
            else if (code == 'HUEIJHONGPAY')
            {
                var item = (type == 'web') ? '.bank_account,.truename,.mobile,.email' : '.truename,.mobile,.email';
                Recharge.$top.find('.bank_account,.truename,.mobile,.email').hide();
                Recharge.$top.find(item).show();
            }
            else if ((code == 'UZPAY' && type == 'BankTransfer') || (code == 'EXTRAORDINARY' && (type == 'web' || type == 'fast' || type == 'web2')) ||
                      code == 'CIANCHENGPAY' || code == 'HAOJIE' || code == 'CENTURYPAY' || code == 'KUAILE')
            {
                Recharge.$top.find('.truename').show();
            }
            else if (code == 'SHUPAY')
            {
                Recharge.$top.find('.merchanttype').show();
            }
            else if (code == 'DP30' && type == 'UPI')
            {
                Recharge.$top.find('.UPI').show();
            }
            else if (code == 'JuXingPay')
            {
                if (type == 'MerchantCode')
                {
                    Recharge.$top.find('.merchanttype').show();
                }
                else if (type == 'Point')
                {
                    Recharge.$top.find('.mobile').show();
                }
            }
            else if (type == 'USDT')
            {
                if (autostatus == '0')
                {
                    Recharge.$top.find('.ratio, .USDTAddress, .Ratiotruemoney').show();
                    Recharge.$top.find('.Tutorial').css('display', 'flex');
                }
            }
            else if (type == 'GCash')
            {
                if (autostatus == '0')
                {
                    Recharge.$top.find('.mobile').show();
                }
            }
            else if (type == 'SLP')
            {
                if (autostatus == '0')
                {
                    Recharge.$top.find('.SLPAccount').show();
                }
            }

            var blocknone1 = (type == 'PhoneCard') ? 'block' : 'none';
            var blocknone2 = (Recharge.$paytypelist[type].isOnlineQR == 1) ? 'block' : 'none';
            var blocknone3 = (typeof(Recharge.$bankcode[code]) != 'undefined') ? 'block' : 'none';
            var blocknone4 = (code == 'CBS' && (typeof(Recharge.$cointype[code]) != 'undefined' && (Recharge.$CBSaddress == '' || Recharge.$CBSaddress == 'null'))) ? 'block' : 'none';
            var blocknone5 = (code == 'CBS' && (Recharge.$CBSaddress != '' && Recharge.$CBSaddress != 'null')) ? 'block' : 'none';

            //依照各個支付平台的通道設定是否顯示銀行名稱
            if (((code == 'WPAY' || code == 'RSPAY' || code == 'UZPAY') && (type == 'MOMO' || type == 'ZALO')) ||
                (code == 'DALIPAY' && (type == 'MOMO' || type == 'ZALO')) ||
                (code == 'APPAY' && (type == 'MOMO' || type == 'ZALO' || type == 'BankTransfer')) ||
                (code == 'BEIDOUPAY' && (type == 'THAIQR' || type == 'MOMO' || type == 'ZALO' || type == 'VNQR')) ||
                (code == 'FEIBAOPAY' && (type == 'GCash' || type == 'GrabPay'))
               )
            {
                var blocknone3 = 'none';
            }
            else
            {
                var blocknone3 = blocknone3;
            }

            $('.recharge-PhoneCard').css('display', blocknone1);
            $('.recharge-onlineQRimg').css('display', blocknone2);
            $('.recharge-selectbankcode').css('display', blocknone3);
            $('.recharge-selectcointype').css('display', blocknone4);
            $('.recharge-spancointypetext').css('display', blocknone5);
        },
        SetPlaceholder: function()
        {
            Recharge.$top.find('input[name="money"]').attr('placeholder',Language.Get('请输入金额'));
            Recharge.$top.find('#recharge-submit').attr('value',Language.Get('确认支付'));
            Recharge.$top.find('input[name="truename"]').attr('placeholder',Language.Get('汇款人姓名') + '：');
            Recharge.$top.find('input[name="bank_account_name"]').attr('placeholder',Language.Get('银行账户名') + '：');
            Recharge.$top.find('input[name="bank_account"]').attr('placeholder',Language.Get('银行账户') + '：');
            Recharge.$top.find('input[name="mobile"]').attr('placeholder',Language.Get('手机号') + '：');
            Recharge.$top.find('input[name="email"]').attr('placeholder',Language.Get('电子邮件') + '：');
            Recharge.$top.find('input[name="idcard"]').attr('placeholder',Language.Get('证件号码') + '：');
            Recharge.$top.find('input[name="cardNumber"]').attr('placeholder',Language.Get('电话卡密') + '：');
            Recharge.$top.find('input[name="serialNumber"]').attr('placeholder',Language.Get('电话卡号') + '：');
            Recharge.$top.find('input[name="CSC"]').attr('placeholder',Language.Get('信用卡安全码') + '：');
            Recharge.$top.find('input[name="expDate"]').attr('placeholder',Language.Get('卡有效期') + '：');
            Recharge.$top.find('input[name="bankname"]').attr('placeholder',Language.Get('银行名称') + '：');
            Recharge.$top.find('input[name="IFSC"]').attr('placeholder',Language.Get('IFSC') + '：');
            Recharge.$top.find('input[name="USDTAddress"]').attr('placeholder',Language.Get('请输入账号'));
            Recharge.$top.find('input[name="Ratiotruemoney"]').attr('placeholder',Language.Get('请输入数量'));
        },
        NotifyPayDone: function(response)
        {
            var status = -99;
            var msg = 'System error';
            var tag = '';
            if (typeof(response) === 'object')
            {
                status = response.status;
                msg = response.msg.msg;
                if (status != 0)
                {
                    Recharge.$top.find('.payData .payNotify').show();
                }
                alert(msg);
            }
            else
            {
                alert(msg);
            }
        },
    };

    var News = {
        $top: {},
        $systemBtn: {},
        $userBtn: {},
        $table: {},
        $tbody: {},
        page: 1,
        num: 10,
        type: 'system',
        $bulletin:{},   //一開始跳出的公告
        $BulletinStatus: false,

        Initial: function()
        {
            this.$top = $('div[data-page-name=news]');
            this.$systemBtn = this.$top.find('#system');
            this.$userBtn = this.$top.find('#user');
            this.$table = this.$top.find('#table');
            this.$tbody = this.$table.find('#tbody');

            this.$bulletin = $('#bulletin-dialog');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$systemBtn.on('click', this.Main);
            this.$userBtn.on('click', this.Main);
            this.$top.on('click', '#loadMore', this.Main);
            this.$tbody.on('click', '.news-article .switch-btn', this.GetUserHaveread);

            Public.Api.GetWechatNews({done: News.GetBulletin});
        },
        GetBulletin: function(response)
        {
            if (typeof(response) !== 'object')
            {
                return;
            }
            var rows = typeof(response.msg) === 'object' ? response.msg : {};
            var list = '';
            /* 內容 */
            for (var key in rows)
            {
                var row = rows[key];
                list += '<tr><td style="word-break: break-all;"><pre style="white-space: pre-wrap; word-wrap: break-word;">' + row.content + '</pre></td></tr>';
            }
            if (list != '')
            {
                News.$BulletinStatus = true;
            }
            $('.bulletin_table').html(list);
        },
        Main: function()
        {
            var isLoadMore = $(this).prop('id') === 'loadMore';
            /* 判斷是否加載 */
            if (isLoadMore)
            {
                News.page ++;
            }
            else
            {
                News.type = $(this).prop('id') || News.type;
                News.page = 1;
                News.$tbody.html('');
            }

            News.$tbody.find('#loadMore').remove();
            News.$tbody.append('<div id="loading" class="news-article-box" style="text-align: center;"><div class="news-article">loading</div></div>');

            /* 系統公告 or 我的短信 */
            // if (News.type === 'system')
            // {
            //     Public.Api.GetSystemNews({done: News.SetSystemTable});
            //     News.$systemBtn.addClass('active');
            //     News.$userBtn.removeClass('active');
            // }
            // else
            // {
                Public.Api.GetUserNews({data: {page: News.page}, done: News.SetUserTable});
                News.$systemBtn.removeClass('active');
                News.$userBtn.addClass('active');
            // }
        },
        SetSystemTable: function(response)
        {
            if (typeof(response) !== 'object')
            {
                return ;
            }

            var rows = typeof(response.msg) === 'object' ? response.msg : {};
            var list = '';

            /* 內容 */
            for (var key in rows)
            {
                var row = rows[key];
                list += 
                    '<div class="news-article-box">' +
                        '<p class="news-date">' + row.addtime + '</p>' +
                        '<div class="news-article hidden">' +
                            '<h1 class="title">' + row.title + '</h1>' +
                            '<p class="content">' + row.content + '</p>' +
                            '<a class="switch-btn">' +
                                '<span>' + Language.Get('阅读全文') + '</span>' +
                            '</a>' +
                        '</div>' +
                    '</div>';
            }
            News.$tbody.find('#loading').remove();
            News.$tbody.append(list);
        },
        SetUserTable: function(response)
        {
            if (typeof(response) !== 'object')
            {
                return ;
            }
            if (response.status != 0)
            {
                UserCenter.$news.find('.unread').css('display', 'none');
            }

            var msg = typeof(response.msg) === 'object' ? response.msg : {};
            var page = News.page;
            var num = News.num;
            var total = msg.totalPage;
            var total_num = msg.total;
            var rows =  typeof(msg.data) === 'object' ? msg.data : {};
            var list = '';
            var $readnum = 0;

            /* 內容 */
            for (var key in rows)
            {
                var row = rows[key];
                var readicon = '';
                if (row.status == 1)
                {
                    $readnum = $readnum + 1;
                    readicon =  '<div class="haveread"></div><h1 class="title">' + row.title + '</h1>';
                }
                else
                {
                    readicon =  '<h1 class="title">' + row.title + '</h1>';
                }

                list += 
                    '<div class="news-article-box" id="' + row.id + '" msgid="' + row.msgid + '">' +
                        '<p class="news-date">' + row.addtime + '</p>' +
                        '<div class="news-article hidden" style="position: relative;">' +
                            readicon +
                            '<p class="content">' + row.msg + '</p>' +
                            '<a class="switch-btn">' +
                                '<span>' + Language.Get('阅读全文') + '</span>' +
                            '</a>' +
                        '</div>' +
                    '</div>';
            }
            $unread = total_num - $readnum;
            if (total_num)
            {
                UserCenter.$news.find('.unread').html($unread);
                $display = ($readnum == total_num) ? 'none' : 'block';
                UserCenter.$news.find('.unread').css('display', $display);
            }

            News.$tbody.find('#loading').remove();

            /* 載入更多 */
            if (list && (page * num) < total)
            {
                list += '<div id="loadMore" class="news-article-box" style="text-align: center;"><div class="news-article text_189"></div></div>';
            }
            News.$tbody.append(list);
        },
        /* 站內信已讀 */
        GetUserHaveread: function()
        {
            var $this = $(this);
            var $id = $this.parents('.news-article-box').attr('id');
            var $msgid = $this.parents('.news-article-box').attr('msgid');
            var param = {
                data:{
                    id: $id,
                    msgid: $msgid,
                },
            };
            Public.Api.GetUserNewsRead(param);
            Public.Api.GetUserNews({data: {page: News.page}, done: News.SetUserHaveread});
        },
        /*判斷是否有未讀訊息*/
        SetUserHaveread: function(response)
        {
           if (typeof(response) !== 'object' || response.status != 0)
            {
                UserCenter.$news.find('.unread').css('display', 'none');
                return ;
            }
            var msg = typeof(response.msg) === 'object' ? response.msg : {};         
            var rows =  typeof(msg.data) === 'object' ? msg.data : {};
            var total = msg.totalPage;
            var total_num = msg.total;
            var $readnum = 0;

            for (var key in rows)
            {
                var row = rows[key];
                if (row.status == 1)
                {
                    $readnum = $readnum + 1;
                }
            }
            $unread = total_num - $readnum;
            if (total_num)
            {
                UserCenter.$news.find('.unread').html($unread);
                $display = ($readnum == total_num) ? 'none' : 'block';
                UserCenter.$news.find('.unread').css('display', $display);
            }
        },
    };

    // 申請優惠
    var Offer = {
        $top: {},
        $offerApply: {},
        $offerFree: {},
        $table: {},
        $tbody: {},
        $type: {},
        page: 1,
        num: 10,
        $bulletin:{},   //一開始跳出的優惠

        Initial: function()
        {
            this.$top = $('div[data-page-name=offer]');
            this.$offerApply = this.$top.find('#offerApply');
            this.$offerFree = this.$top.find('#offerFree');
            this.$table = this.$top.find('#table');
            this.$tbody = this.$table.find('#tbody');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$offerApply.on('click', this.Main);
            this.$offerFree.on('click', this.MainFree);
        },
        Main: function()
        {
            $('.pages-loading-box').removeClass('ani').css('display', 'block');
            Offer.$type = 'offerApply';
            Offer.$offerFree.removeClass('active');
            Offer.$offerApply.addClass('active');
            Public.Api.GetOfferApply({done: Offer.SetOfferTable});
        },
        CheckDepositMain: function()
        {
            Offer.$type = 'offerApply';
            Offer.$offerFree.removeClass('active');
            Offer.$offerApply.addClass('active');
            Public.Api.GetOfferApply({done: Offer.SetOfferTable});
        },
        MainFree: function()
        {
            $('.pages-loading-box').removeClass('ani').css('display', 'block');
            Offer.$type = 'offerFree';
            Offer.$offerApply.removeClass('active');
            Offer.$offerFree.addClass('active');
            Public.Api.GetOfferFree({done: Offer.SetOfferTable});
        },
        SetOfferTable: function(response)
        {
            $('.pages-loading-box').addClass('ani').css('display', 'none');
            Offer.$tbody.html('<div id="loading" class="news-article-box" style="text-align: center;"><div class="news-article text_236"></div></div>');

            var rows = typeof(response.msg) === 'object' ? response.msg : {};
            var list = '';

            if (Array.isArray(rows) && rows.length === 0)
            {
                list = '<p style="text-align: center;" class="text_193"></p>';
            }
            else
            {
                /* 內容 */
                for (var key in rows)
                {
                    var row = rows[key];
                    var productNameArray = row.productName.split(',');
                    var productName = '';
                    for (var k2 in productNameArray)
                    {
                        productName += Language.Get(productNameArray[k2]) + ',';
                    }
                    productName = productName.substring(0,productName.length-1);

                    list += 
                        '<table class="discountapplication-table" style="width: 100%;border: 3px solid #b9b4a3;table-layout : fixed;">' +
                            '<tbody style="width:100%;">' +
                                '<tr style="text-align: center;">' + 
                                    '<td class="OfferFreeContent text_194" style="width:25%;"></td>' +
                                    '<td class="OfferFreeContent text_195" style="width:25%;"></td>' +
                                    '<td class="OfferFreeContent text_197" style="width:25%;"></td>' +
                                    '<td class="OfferFreeContent text_198" style="width:25%;"></td>' +
                                '</tr>' +
                                '<tr style="text-align: center;">' + 
                                    '<td style="text-align: center;width:25%;border-right: #8c7561 1px solid;">' + row.code + '</td>' +
                                    '<td style="text-align: center;width:25%;border-right: #8c7561 1px solid;">' + row.name + '</td>' +
                                    '<td style="width:25%;border-right: #8c7561 1px solid;">' + row.depositMoney + '</td>' +
                                    '<td style="width:25%;">' + row.depositturnover + '</td>' +
                                '</tr>' +
                                '<tr style="text-align: center;">' + 
                                    '<td colspan="3" class="OfferFreeContent text_196" style="width:75%;"></td>' +
                                    '<td class="OfferFreeContent text_199" style="width:25%;"></td>' +
                                '</tr>' +
                                '<tr class="news-date" style="text-align: center;">' + 
                                    '<td colspan="3" style="text-align: center;width:75%;border-right: #8c7561 1px solid;text-align: left;">' + productName + '</td>' +
                                    '<td style="width:25%;"><button class="offerFreeSubmit text_200" style="background-color: #7cdd41;width: 90%;" type="submit" activeid="' + row['id'] + '"></button></td>' +
                                '</tr>' +
                            '</tbody>' + 
                        '</table> <br>' ;
                }
            }
            
            Offer.$tbody.find('#loading').remove();
            Offer.$tbody.html(list);

            Offer.$tbody.find('.offerFreeSubmit').on('click' , Offer.apply);
        },

        apply: function()
        {
            var type = Offer.$type; 

            var $this = $(this);
            var activeid = $this.attr('activeid');
            $this.hide();

            /*報表參數*/
            var parm = {
                data:{
                    activeid: activeid,
                },
                done: Offer.response,
            };

            if(type == 'offerApply')
            {
                Public.Api.Apply(parm);
            }
            if(type == 'offerFree')
            {
                Public.Api.FreeApply(parm);
            }
        },
        response: function(response)
        {
            var rows = typeof(response.msg) === 'object' ? response.msg : {};
            var success = false;
            if (response.status == 0)
            {
                alert(response.msg);
                success = response.status == 0 ? true : false;
            }
            if (response.status == -19)
            {
                alert(Language.Get("优惠审核中!或达到每日申请限制或") + response.msg);
                $('.offerFreeSubmit').show();
                return false;
            }
            if(response.status != 0)
            {
                alert(response.msg);
                $('.offerFreeSubmit').show();
                return false;
            }
            if (success)
            {
                Offer.Main();
            }
        },
    }

    var Game = {
        $top: {},
        $openBtn: {},
        gameHall: {},
        gameType: {},
        newWindow: 'wgame',
        $liveListUrl: '',

        Initial: function()
        {
            this.$top = $('div.gamelist-content');
            this.$openBtn = this.$top.find('.game-btn');
            // this.$openBtn2 = this.$top.find('.gamelist-item');

            this.GetGameGroup();
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$openBtn.on('click', this.Main);
            this.$top.find('.comingsoon').on('click', function(){
                alert(Language.Get('即将开放'));
            });
        },
        GetGameGroup: function()
        {
            var gamegroupIdDef = Public.GetConfig('GAMEGROUPID');
            var func = function(){
                setTimeout(function(){
                    var GameGroupData = Public.GetGameGroup() || {};
                    if (GameGroupData == {})
                    {
                        func();
                    }
                    for (key in GameGroupData)
                    {
                        var grouprow = GameGroupData[key];
                        if(gamegroupIdDef && gamegroupIdDef[grouprow.id])
                        {
                            var gameStatus = gamegroupIdDef[grouprow.id].status;
                            if(gameStatus == true)
                            {
                                if(gamegroupIdDef == '55')
                                {
                                    if(parent != window) //設定的遊戲不能上微投，只能上H5
                                    {
                                        continue;
                                    }
                                }
                                $('.gamelist-col').find('a[groupid=' + grouprow.id + ']').prev().css('display', 'none');
                                $('.gamelist-col').find('a[groupid=' + grouprow.id + ']').css('display', 'inline-flex');
                            }
                        }
                        if (grouprow.isshow == 0)
                        {
                            $('.gamelist-col').find('a[groupid=' + grouprow.id + ']').addClass('is-close');
                        }
                    }
                }, 500)
            };
            func();
        },
        Main: function()
        {
            var date = new Date();
            var dateTime = date.getTime();
            var NextGameTime = Public.GetLocalStorage('NextGameTime') || '';
            var time = Number(NextGameTime) + 8000;
            if (dateTime <= time && NextGameTime != '')
            {
                alert(Language.Get('8秒内不可重复开启游戏，请稍后'));
                return false;
            }
            $('.pages-loading-box').removeClass('ani').css('display', 'block');
            var $this = $(this);
            var hall = $this.attr('hall');
            var gameid = $this.attr('gameid');
            var viewsite = $this.attr('viewsite');
            var groupid = $this.attr('groupid');
            var ui = $this.attr('ui');
            var sid = Public.GetLocalStorage('sid');
            var liveType = '';
            Game.liveListUrl = $this.find('div').attr('livelisturl');
            if ($this.hasClass('is-close'))
            {
                $('.pages-loading-box').addClass('ani').css('display', 'none');
                return true;
            }
            if(hall == 'LIVE')
            {
                liveType = 'liveroom';
            }
            if(hall === 'VIP')
            {
                Game.Video();
            }
            else
            {
                Game.gameHall = Public.GetGameHallByHall(hall);
                Game.gameType = $this.attr('gameType');

                if (! Game.gameHall)
                {
                    $('.pages-loading-box').addClass('ani').css('display', 'none');
                    return true;
                }

                Game.lastGameChange();
                var param = {
                    data: {
                        gid: Game.gameHall.id,
                        type: Game.gameType,
                        gameid: gameid,
                        groupid: groupid,
                        viewsite: viewsite,
                        ui: ui,
                        backurl: parent != window ? Public.GetConfig('BACKONEURL') : Public.GetConfig('HOSTURL'),
                        liveType: liveType,
                    },
                    done: Game.Open,
                };
                Public.Api.OpenGame(param);
            }
        },
        Open: function(response)
        {
            if (typeof(response) !== 'object' || response.status != 0 || typeof(response.msg) !== 'object' || ! response.msg.gameUrl)
            {
                $('.pages-loading-box').addClass('ani').css('display', 'none');
                Public.WindowClose(Game.newWindow);
                if (response.status == -1011)
                {
                    // $('.login-wrapper').show();
                    Login.IsShow();
                    return false;
                }
                SystemError.Do(response.msg || Language.Get('系统错误'), 'error');

                // if (response.status == -22 && Public.GetConfig('ISAPP'))
                if (response.status == -22 && (App.urlIsApp || Public.GetConfig('ISAPP')))
                {
                    App.UserLoginFail();
                }
                return ;
            }

            var date = new Date();
            var dateTime = date.getTime();
            Public.SetLocalStorage({NextGameTime: dateTime});
            var NextGameTime = Public.GetLocalStorage('NextGameTime');
            var url = Public.GetConfig('GAMEURL');
            var ptUrl = Public.GetConfig('PTURL');
            var isapp = Public.GetConfig('ISAPP');
            var isIosapp = App.urlIsApp;
            var gameUrl = response.msg.gameUrl;
            var param = '';

            if ((Game.gameHall.gamehall === 'BBIN' && Game.gameType === 'FT') || (Game.gameHall.gamehall === 'BBIN' && Game.gameType === 'OTHER'))
            {
                var url = Public.GetConfig('FORMURL') + '/?action=' + response.msg.actionurl + "&uid=" + response.msg.valuedata['uid'] + "&langx=" + response.msg.valuedata['langx'] + "&target=_TOP&method=POST";
                Public.WindowOpen(url, Game.newWindow, true, "hidden=no, location=no, clearsessioncache=yes, clearcache=yes");
                $('.pages-loading-box').addClass('ani').css('display', 'none');
                return false;
            }

            if(Game.gameHall.gamehall === 'LIVE')
            {
                if(Game.liveListUrl == '')
                {
                    alert(Language.Get('即将开放'));
                    $('.pages-loading-box').addClass('ani').css('display', 'none');
                    return false;
                }
                gameUrl = Game.liveListUrl + '&backurl=' + Public.GetConfig('HOSTURL');
                // gameUrl = Game.liveListUrl;
            }
            if(isapp == true)
            {
                Public.WindowOpen(gameUrl, Game.newWindow, true);
                $('.pages-loading-box').addClass('ani').css('display', 'none');
                return false;
            }
            if (Game.gameHall.gamehall === 'LIXINLIVESINGLE')
            {
                param = 
                    '&headimgurl=' + encodeURIComponent(Public.GetLocalStorage('headimgurl')) +
                    // '&memberqrcodeurl=' + encodeURIComponent(Public.GetPromotionQRCode()) + 
                    '&homeurl=' + encodeURIComponent(Public.GetConfig('IFRAMEHOST')) + 
                    '&serviceurl=' + encodeURIComponent(Public.GetConfig('SERVICEURL')) + 
                    '&depositurl=' + encodeURIComponent(Public.GetConfig('DEPOSITURL')) +
                    '&withdrawalurl=' + encodeURIComponent(Public.GetConfig('WITHDRAWALURL'));
            }
            if(Game.gameHall.gamehall === 'PLAYTECH')
            {
                gameUrl = ptUrl + '?';
                param = 
                        'url=' + encodeURIComponent(response.msg.gameUrl) +
                        '&language=' + encodeURIComponent(response.msg.gameLanguage) + 
                        '&account=' + encodeURIComponent(response.msg.gameAccount) +
                        '&password=' + encodeURIComponent(response.msg.gamePassword) +
                        '&gameType=' + encodeURIComponent(Game.gameType);
            }
            //判斷不使用iframe
            if(
                (isIosapp == true) || 
                (
                    (Game.gameHall.gamehall === 'SBO') || (Game.gameHall.gamehall === 'WMLGSINGLE') || 
                    (Game.gameHall.gamehall === 'MG') || (Game.gameHall.gamehall === 'AGIN') || 
                    (Game.gameHall.gamehall === 'PLAYTECH') || (Game.gameHall.gamehall === 'JDBSINGLE') || 
                    (Game.gameHall.gamehall === 'VRSINGLE') || (Game.gameHall.gamehall === 'HILLSPORTSINGLE') || 
                    (Game.gameHall.gamehall === 'ROYALLIVE') || (Game.gameHall.gamehall === 'Lixinlive') || 
                    (Game.gameHall.gamehall === 'HILLSPORT') || (Game.gameHall.gamehall === 'PLAYNGO') || 
                    (Game.gameHall.gamehall === 'JINLONG') || (Game.gameHall.gamehall === 'HAOCAI') || 
                    (Game.gameHall.gamehall === 'M8') || (Game.gameHall.gamehall === 'SUPER') ||
                    (Game.gameHall.gamehall === 'SA') || (Game.gameHall.gamehall === 'PHARAOH') || 
                    (Game.gameHall.gamehall === 'VSL') || (Game.gameHall.gamehall === 'WMHILLSINGLE') || 
                    (Game.gameHall.gamehall === 'GOLDENFSBO') || (Game.gameHall.gamehall === 'HUANGGUAN') || 
                    (Game.gameHall.gamehall === 'LIVE') || (Game.gameHall.gamehall === 'BOCAISINGLE') || 
                    (Game.gameHall.gamehall === 'BBIN') || (Game.gameHall.gamehall === 'SEXYLIVE') || 
                    (Game.gameHall.gamehall === 'SAIMA') || (Game.gameHall.gamehall === 'EC') || 
                    (Game.gameHall.gamehall === 'EVO') || (Game.gameHall.gamehall === 'CMD') || 
                    (Game.gameHall.gamehall === 'EBET') || (Game.gameHall.gamehall === 'SSG') || 
                    (Game.gameHall.gamehall === 'JOKER') || (Game.gameHall.gamehall === 'BTS') || 
                    (Game.gameHall.gamehall === 'OG') || (Game.gameHall.gamehall === 'ALLBET') || 
                    (Game.gameHall.gamehall === 'NINEWICKETS') || (Game.gameHall.gamehall === 'LIXINCHESS') ||
                    (Game.gameHall.gamehall === 'KKCAIPIAO') || (Game.gameHall.gamehall === 'FUNKY') || 
                    (Game.gameHall.gamehall === 'SB') || (Game.gameHall.gamehall === 'OBSPORT') || 
                    (Game.gameHall.gamehall === 'SASLOT') || (Game.gameHall.gamehall === 'AVIA') || 
                    (Game.gameHall.gamehall === 'GONE') || (Game.gameHall.gamehall === 'ICG') || 
                    (Game.gameHall.gamehall === 'DT') || (Game.gameHall.gamehall === 'PCEGG') || 
                    (Game.gameHall.gamehall === 'BTI') || (Game.gameHall.gamehall === 'JDB') || 
                    (Game.gameHall.gamehall === 'VR') || (Game.gameHall.gamehall === 'CRPATI') ||
                    (Game.gameHall.gamehall === 'DIOS') || (Game.gameHall.gamehall === 'BAISONCHESS') ||
                    (Game.gameHall.gamehall === 'INPOKER') || (Game.gameHall.gamehall === 'YLSPORT') ||
                    (Game.gameHall.gamehall === 'CRSPORT') || (Game.gameHall.gamehall === 'XIAOAIESPORT')
                )
            ) {
                gameUrl =  gameUrl + param;
            }
            else
            {
                gameUrl = (url + '?url=' + gameUrl + param);
            }

            console.log(gameUrl);
            Public.ParentGoTo(gameUrl);
            $('.pages-loading-box').addClass('ani').css('display', 'none');
        },
        AutoMoney: function()
        {
            var unBackGids = JSON.parse(Public.GetLocalStorage('unBackGids') || '[]');
            var tmp = [Game.gameHall.id];

            //遊戲轉至中心
            for (var key in unBackGids)
            {
                var gid = parseInt(unBackGids[key]);
                if (gid == Game.gameHall.id) continue;

                var param = {
                    data: {gid: gid},
                    options: {async: false},
                    done: function(response){
                        var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                        if (status)
                        {
                            var money = parseInt(response.msg.money || 0);
                            if (money > 0)
                            {
                                var param = {
                                    data: {source: gid, target: 10, money: money},
                                    options: {async: false},
                                    done: function(response){
                                        var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                                        console.log(response);
                                    },
                                };
                                Public.Api.ChangeMoney(param);
                            }
                        }
                        ! status && tmp.push(gid);
                    }
                };
                Public.Api.GetMoney(param);
            }
            //轉回中心失敗的遊戲
            Public.SetLocalStorage({unBackGids: JSON.stringify(tmp)});

            //中心轉至遊戲
            var param = {
                data: {gid: 10},
                options: {async: false},
                done: function(response){
                    var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                    if (status)
                    {
                        var money = parseInt(response.msg.money || 0);
                        if (money > 0)
                        {
                            var param = {
                                data: {source: 10, target: Game.gameHall.id, money: money},
                                options: {async: false},
                                done: function(response){
                                    var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                                    console.log(response);
                                },
                            };
                            Public.Api.ChangeMoney(param);
                        }
                    }
                }
            };

            Public.Api.GetMoney(param);
        },
        lastGameChange : function()
        {   
            //转帐钱包或单一钱包开游戏时, lastGame点数转回
            var param = {
                data: {gid: Game.gameHall.id},
                options: {async: false},
                done: function(response){
                    var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                },
            };
            Public.Api.reverseLastGameMoney(param);

            //中心轉至遊戲 && 单一钱包游戏就不做此动作
            if(Game.gameHall.mode == 0)
            {
                var param = {
                    data: {gid: 10},
                    options: {async: false},
                    done: function(response){
                        var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                        if (status)
                        {
                            var money = parseInt(response.msg.money || 0);
                            if (money > 0)
                            {
                                var param = {
                                    data: {source: 10, target: Game.gameHall.id, money: money},
                                    options: {async: false},
                                    done: function(response){
                                        var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                                    },
                                };
                                Public.Api.ChangeMoney(param);
                            }
                        }
                    }
                };
                Public.Api.GetMoney(param);
            } 
        },
        Video: function()
        {
            var username = Public.GetLocalStorage('username');
            if (! username)
            {
                alert(Language.Get('请先登入'));
                return false;
            }

            Public.Api.Video({done: Game.OpenVideo});
        },
        OpenVideo: function(response)
        {
            if (typeof(response) !== 'object' || response.status != 0)
            {
                return;
            }

            var url = response.msg;
            if(response.status == 0)
            {
                if (url) {
                    Public.ParentGoTo(url);
                }
            }
            else
            {
                alert(response.msg);
            }
        },
        lastGameChange1 : function()
        {   
            //转帐钱包或单一钱包开游戏时, lastGame点数转回
            var param = {
                data: {gid: ''},
                options: {async: false},
                done: function(response){
                    var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                },
            };
            Public.Api.reverseLastGameMoney(param);

            var param = {
                data: {gid: 10},
                options: {async: false},
                done: function(response){
                    var status = (typeof(response) === 'object') && (response.status == 0) ? true : false;
                    UserCenter.SetUserMoney();
                    Recharge.SetUserMoney();
                    Home.SetUserMoney();
                    WalletCenter.SetUserMoney();
                }
            };
            Public.Api.GetMoney(param);

            alert(Language.Get('操作成功'));
        },
    };

    /* 充值中心 */
    var WalletCenter = {
        $top: {},
        $denial_reasonBtn: {},
        $table: {},
        $tbody: {},
        $startTime: {},
        $endTime: {},
        $withdraw: {},
        $recharge: {},
        page: 1,
        num: 1000,
        $money: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=wallet-center]');
            /*充值提現紀錄表*/
            this.$table = this.$top.find('.acc-table');
            this.$tbody = this.$table.find('tbody');
            this.$startTime = this.Day;
            this.$endTime = this.Day;

            this.$withdraw = this.$top.find('a[data-pop=withdraw-dialog]');
            this.$recharge = this.$top.find('a[data-pop=recharge-dialog]');
            this.$money = this.$top.find('.money');
            
            this.BindEvents();
        },
        BindEvents: function()
        {
            /*拒絕狀態的箭頭*/
            this.$tbody.on('click', '.showSanjiao', this.ChangeArrow);
            this.$table.on('click', '#loadMore', this.GetReport);
            this.$withdraw.on('click', Withdrawals.SetBank);
            /*更新充值現金餘額及支付通道*/
            this.$recharge.on('click', App.UserMainDone);
            this.$recharge.on('click', function(){
                if(localStorage.isCredit == '1')
                {
                    alert(Language.Get('你的上层代理为信用代理, 不开放使用存提功能'));
                    return false;
                }
                Recharge.$select.html('');
                Recharge.$decimal.html('');
                Recharge.$moneylimit.html('');
                Recharge.$note.html('');
                Recharge.PlatformtypeDo();
            });
        },
        SetUserMoney: function()
        {
            this.$money.html(Public.GetLocalStorage('sid') ? Language.Get('点数') + '：' + (Public.GetLocalStorage('money') || '0.00') : '')
        },
        /* 日期 */
        Day: function()
        {
            var date = new Date();
            day = date.getDate();
            if(day < 10)
            {
                day = "0" + day;
            }
        },
        /*狀態箭頭轉換*/
        ChangeArrow: function()
        {
            var $this = $(this);
            var $classname = $this.find('i').attr('class');
            if ($classname == 'icon-xiajiantou')
            {
                $this.find('i').addClass('icon-shangjiantou');
                $this.find('i').removeClass('icon-xiajiantou');
                $this.parents('tr').next('tr').show();
            }
            else if ($classname == 'icon-shangjiantou')
            {
                $this.find('i').removeClass('icon-shangjiantou');
                $this.find('i').addClass('icon-xiajiantou');
                $this.parents('tr').next('tr').hide();
            }
        },
        GetReport: function()
        {
            var isLoadMore = $(this).prop('id') === 'loadMore';
            /* 判斷是否加載 */
            if (isLoadMore)
            {
                WalletCenter.page ++;
            }
            else
            {
                WalletCenter.page = 1;
                WalletCenter.$tbody.html('');
            }
            WalletCenter.$tbody.find('#loadMore').remove();
            WalletCenter.$tbody.append('<tr id="loading"><td class="acenter text_236" colspan="4"></td></tr>');

            /*報表參數*/
            var parm = {
                data:{
                    startTime: WalletCenter.$startTime,
                    endTime: WalletCenter.$endTime,
                    page: WalletCenter.page,
                    num: WalletCenter.num,
                },
                done: WalletCenter.SetTable,
            };
            Public.Api.GetTransferReportRW(parm); //在線手工支付碼存款提現紀錄
        },
        SetTable: function(response)
        {
            if (typeof(response) !== 'object' || response.status != 0 || typeof(response.msg) !== 'object')
            {
                return;
            }
            WalletCenter.SetBody(response.msg);
        },
        SetBody: function(data)
        {
            var line = typeof(data.line) === 'object' ? data.line : {};
            var fetch = typeof(data.fetch) === 'object' ? data.fetch : {};
            var handwork = typeof(data.handwork) === 'object' ? data.handwork : {};
            var qrcode_transfer = typeof(data.qrcode_transfer) === 'object' ? data.qrcode_transfer : {};
            var lineRows = '';
            var fetchRows = '';
            var handworkRows = '';
            var qrcode_transferRows = '';
            var tag = '';

            /*將各個資料表的資料合併*/
            var rows = {};
            var i = 0;
            for (var key in line)
            {
                var row = line[key];
                var lineRows = row.rows;
                if (lineRows != '')
                {
                   for (var k in lineRows)
                    {
                        rows[i] = lineRows[k];
                        rows[i]['sort'] = Language.Get('在线充值');
                        i++;
                    } 
                }
            }
            for (var key in fetch)
            {
                var row = fetch[key];
                var fetchRows = row.rows;
                if (fetchRows != '')
                {
                    for (var k in fetchRows)
                    {
                        rows[i] = fetchRows[k];
                        rows[i]['sort'] = Language.Get('取款');
                        i++;
                    }
                }
            }
            for (var key in handwork)
            {
                var row = handwork[key];
                var handworkRows = row.rows;
                if (handworkRows != '')
                {
                    for (var k in handworkRows)
                    {
                        rows[i] = handworkRows[k];
                        rows[i]['sort'] = Language.Get('手工充值');
                        i++;
                    }
                }
            }
            for (var key in qrcode_transfer)
            {
                var row = qrcode_transfer[key];
                var qrcode_transferRows = row.rows;
                if (qrcode_transferRows != '')
                {
                    for (var k in qrcode_transferRows)
                    {
                        rows[i] = qrcode_transferRows[k];
                        rows[i]['sort'] = Language.Get('支付码充值');
                        i++;
                    }
                }
            }

            /*將資料排序*/
            for (var i = Object.keys(rows).length-1; i > 0; --i)
            {
                for (var j = 0; j < i; ++j)
                {
                    if (rows[j].addtime < rows[j+1].addtime)
                    {
                        var tmp = '';
                        tmp = rows[j];
                        rows[j] = rows[j+1];
                        rows[j+1] = tmp;
                    }
                }
            }

            /*將資料顯示在螢幕上*/
            for (var i = 0; i < Object.keys(rows).length; i++)
            {
                var denial_reason = '';
                if (rows[i].status && (rows[i].status == '2'))
                {
                    if (rows[i].sort != Language.Get('在线充值') && rows[i].sort != Language.Get('支付码充值'))
                    {
                        var status = '<td class="acenter" style="width:25%"><p class="showSanjiao txt-red text_237"><i class="icon-shangjiantou"></i></p></td>';
                        denial_reason = '<tr class="denial_reason">' +
                                            '<td class="td-note text_202" colspan="4" style=" background-color: rgb(218, 217, 218); font-size: 12px; padding: 8px; color: rgb(0, 0, 0);">：' + rows[i].jnote + '</td>' +
                                        '</tr>';
                    }
                    else
                    {
                        var status = '<td class="acenter" style="width:25%"><p class="showSanjiao txt-red text_237"></p></td>';
                    }
                }
                else
                {
                    var status = rows[i].status && (rows[i].status == '0')
                    ? '<td class="acenter" style="width:25%"><p class="txt-red text_238"></p></td>'
                    : '<td class="acenter" style="width:25%"><p class="txt-green text_239"></p></td>';
                }
                tag += 
                    '<tr>' +
                        '<td class="acenter" style="width:40%">' + rows[i].addtime + '</td>' +
                        '<td class="acenter">' + rows[i].sort + '</td>' +
                        '<td class="acenter">' + rows[i].money + '</td>'+
                        status +
                    '</tr>'; 
                tag += denial_reason;
            }
            
            WalletCenter.$tbody.find('#loading').remove();

            /* 顯示頁數 */
            var page = parseInt(data.page);
            /* 顯示筆數 */
            var num = parseInt(data.num);
            /* 報表總比數 */
            var total = parseInt(data.total) || 0;
            if (tag && (page * num) < total)
            {
                tag += '<tr id="loadMore"><td class="acenter text_189" colspan="4" style="background: #ddd; color: #007bff;"></td></tr>';
            }
            WalletCenter.$tbody.append(tag);
        },
    };

    /* 推廣查詢 */
    var invite = {
        $top: {},
        $Btn: {},

        Initial: function()
        {
            /*Set Element*/
            this.$top = $('div[data-page-name=invite-report]');
            this.$Btn = this.$top.find('.tab-btn');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$Btn.on('click', function(){
                var $this = $(this);
                //var $main = $('.invite-report-wrapper').find('');
                $this.addClass('active');
                $this.siblings().removeClass('active');
                //$main.show();
            });
        },
    };
  
    /* 優惠活動 */
    var Promotions = {
        $Promotions: {},
        $PromotionsBanner: {},
        $itemlist: {},
        $eventphoto: {},
        $eventintro: {},
        $eventbannerlist: {},
        $close: {},
        $list_left: {},

        Initial: function()
        {
            this.$Promotions = $('#event-dialog');
            this.$PromotionsBanner = $('#event-scroll-banner');
            this.$itemlist = this.$Promotions.find('.event-item-list');
            this.$eventphoto = this.$PromotionsBanner.find('.event-photo');
            this.$eventintro = this.$PromotionsBanner.find('.event-intro');
            this.$eventbannerlist = this.$PromotionsBanner.find('.event-banner-list');
            this.$close = this.$Promotions.find('.btn-close');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$close.on('click', function(){
                Home.$event.removeClass('active');
                $('a[data-menu=home]').addClass('active');
            });

            this.$eventbannerlist.on("touchend", function(e)
            {
                $left = $('.event-banner-list').find('.swiper-slide-active').offset().left;
                $result = $('.event-banner-list').find('.swiper-slide-active').attr('pagination');
                if ($left > Promotions.$list_left)
                {
                    $result = parseInt($result) - 1;
                }
                if ($left < Promotions.$list_left)
                {
                    $result = parseInt($result) + 1;
                }
                $('.event-banner-list').find('div[pagination=' + $result + ']').addClass('swiper-slide-active').siblings().removeClass('swiper-slide-active');
                $('.event-pagination').find('span[aria-label="Go to slide '+ $result +'"]').addClass('swiper-pagination-bullet-active').siblings().removeClass('swiper-pagination-bullet-active');
            });
        },
        GetItemList: function()
        {
            Public.Api.Getpromotion({done: Promotions.SetBody});
        },
        SetBody: function(response)
        {
            var promotion_upload = response.msg.promotion_upload;
            var tag = '';
            var taglist = '';
            var titlename = '';
            var ontime = {};    //存優惠資訊的上架時間
            var today_date = Math.round((new Date()) / 1000);
            var i = 0;
            var url = Public.GetConfig('PROMOTIONURL');
            for (var key in promotion_upload)
            {
                var row = promotion_upload[key] || {};
                if (today_date < row.off_time)
                {
                    var img = url + row['filename'];
                    titlename += '<a class="event-item hot"><span>' + row.name + '</span></a>';
                    ontime[key] = row.on_time;   //存取每項優惠的上架時間
                    tag += '<div pagination='+ (i+1) +' class="swiper-slide event-banner-box" style="margin-right: 30px;">' +
                                '<a class="event-banner-close-btn"></a>' +
                                '<div class="scroll-event-con">' +
                                    '<div class="event-photo" style="height:26vmin;">' +
                                        '<div class="text-center btn-dialog" dialog="promotionlist" style="background:url(' + img + ') no-repeat; background-size:contain; height: 100%;"></div>' +
                                    '</div>' +
                                    '<div class="event-intro">' + row.html + '</div>' +
                                '</div>' +
                                '<div class="event-pagination">' + '</div>' +
                            '</div>';
                    i++;    //計算出最後一個資料,但要-1
                }
            }

            Promotions.ChangeTime(ontime);
            Promotions.$eventbannerlist.html(tag);
            Promotions.$itemlist.html(titlename);
            var swiper = new Swiper('.event-swiper-container', {
                slidesPerView: 'auto',
                centeredSlides: true,
                spaceBetween: 30,
                resistanceRatio: 0,
                pagination: {
                  el: '.event-pagination',
                  clickable: true,
                },
            });
        },
        /*判斷優惠未讀提示是否顯示*/
        ChangeTime: function(time)
        {
            for (var key in time)
            {
                var today = new Date();  
                var before_date = new Date((+today) - 6 * 24 * 3600 * 1000);
                var ontime_date = new Date(time[key] * 1000);

                if (ontime_date <= today && ontime_date >= before_date)
                {
                    Home.$event.find('.fix-bottom-btn-icon').addClass('new-news');
                    return false;
                }
                else
                {
                    Home.$event.find('.fix-bottom-btn-icon').removeClass('new-news');
                }
            }
        },
    };

    /* 下線管理 */
    var MemberManager = {
        $top: {},
        $layermember: {},
        $layermember_report: {},
        $setbouns: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=member-manager]');
            /*下線列表*/
            this.$layermember = $('a[data-page-name=layer-member]');
            /*下線管理報表查詢*/
            this.$layermember_report = $('a[data-page-name=layer-member-report]');
            /*下線返水管裡*/
            this.$setbouns = $('a[data-menu=set-bouns]');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$layermember.on('click', LayerMember.SetTable);
            this.$setbouns.on('click', SetBouns.SetTable);
            this.$layermember_report.on('click', Layermember_Report.GetReport);
        },
    };

    /* 下線列表 */
    var LayerMember = {
        $top: {},
        $table: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=layer-member]');   
            this.$table = this.$top.find('.acc-table');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$table.on('click', '.btn-more', SetOfflineWater.SetTable);
        },
        SetTable: function()
        {
            Public.Api.GetOffline({done: LayerMember.SetBody});
        },
        SetBody: function(response)
        {
            if( typeof(response) !== 'object' || typeof(response.msg) !== 'object' || 
                typeof(response.msg.memlineData) !== 'object' || response.status != 0 )
            {
                return ;
            }

            var rows = response.msg.memlineData;
            var tags = '';
            for (var key in rows)
            {
                var row = rows[key];
                tags +=
                    '<tr>' +
                        '<td class="acenter">' + row.truename + '</td>' +
                        '<td class="acenter">' + row.money + '</td>' +
                        '<td data-menu="set-bouns1" data-pop="set-bounsch-dialog" class="btn-pop acenter">' +
                            '<a class="btn-more" style="margin-left: -25px;" mid="' + row.id + '"></a>' +
                        '</td>' +
                    '</tr>';
            }
            LayerMember.$table.find('tbody').html(tags);
        },
    };

    /* 下線預設返水 */
    var SetBouns = {
        $top: {},
        $dialog_btn_submit: {},
        $dialog_btn_cancel: {},
        $table: {},
        valuewater: {},

        Initial: function()
        {
            this.$top = $('div#set-bouns-dialog-st');
            this.$dialog_btn_submit = this.$top.find('.dialog-btn-submit');
            this.$dialog_btn_cancel = this.$top.find('.dialog-btn-cancel');
            this.$table = this.$top.find('.acc-table');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$dialog_btn_submit.on('click', this.Moidify);
            this.$dialog_btn_cancel.on('click', this.Clear);
        },
        Moidify: function()
        {
            var rows = SetBouns.$top.find('.set-bouns-input');
            var data = {};
            rows.each(function(){
                var $this = $(this);
                var groupId = $this.attr('groupId');
                var value = $this.val();
                data['defMemberReturn[' + groupId + ']'] = value;
            });
            var parm = {data: data, done: SetBouns.MoidifyDone};
            Public.Api.SetDefaultWater(parm);
        },
        MoidifyDone: function(response)
        {
            var response = typeof(response) === 'object' ? response : {};
            var msg = response.msg || 'system error';
            response.status == '0' ? SystemError.Do(msg, 'success') : SystemError.Do(msg, 'error');
        },
        Clear: function()
        {
            var rows = SetBouns.$top.find('.set-bouns-input');
            rows.each(function(){
                var $this = $(this);
                var groupId = $this.attr('groupId');
                $this.val(SetBouns.valuewater[groupId]);
            });
        },
        SetTable: function()
        {
            Public.Api.GetDefaultWater({done: SetBouns.SetBody});
        },
        SetBody: function(response)
        {
            if( typeof(response) !== 'object' || typeof(response.msg) !== 'object' || 
                typeof(response.msg.return) !== 'object' || typeof(response.msg.returnDef) !== 'object' || response.status != 0 )
            { 
                return ;
            }

            var gameGroup = Public.GetGameGroup() || {};
            var returns = response.msg.return || {};
            var returnDef = response.msg.returnDef || {};
            var tags = '';

            for (var key in gameGroup)
            {
                var row = gameGroup[key] || {};
                var returnDefRow = returnDef[row.id] || {};
                var returnRow = returns[row.id] || {};
                var gameHall = Public.GetGameHallById(row.gamehallid) || {};
                SetBouns.valuewater[row['id']] = returnDefRow['MemberReturn'];

                if (gameHall.status != 1 || row.status != 1)
                {
                    continue;
                }
                tags +=
                    '<tr>' +
                        '<td>' + Language.Get(gameHall.gameHallNickname) + '(' + Language.Get(row.groupname) + ')' + '</td>' +
                        '<td class="acenter">' +
                            '<input type="text" class="set-bouns-input acenter" groupId="' + row['id'] + '" value="' + (returnDefRow['MemberReturn'] || 0) + '" />' +
                        '</td>' +
                        '<td class="acenter bouns-num">' + 
                            '0 ~ ' + (returnRow['MemberReturn'] || 0) +
                        '</td>' +
                    '</tr>';
            }
            SetBouns.$table.find('tbody').html(tags);
        },
    };

    /* 下線列表的下線返水 */
    var SetOfflineWater = {
        $top: {},
        $dialog_btn_submit: {},
        $dialog_btn_cancel: {},
        $table: {},
        valuewater: {},

        Initial: function()
        {
            this.$top = $('div#set-bounsch-dialog');
            this.$dialog_btn_submit = this.$top.find('.dialog-btn-submit');
            this.$dialog_btn_cancel = this.$top.find('.dialog-btn-cancel');

            this.$table = this.$top.find('.acc-table');
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$dialog_btn_submit.on('click', this.Moidify);
            this.$dialog_btn_cancel.on('click', this.Clear);
        },
        Moidify: function()
        {
            var rows = SetOfflineWater.$top.find('.set-bouns-input');
            var mid = SetOfflineWater.$dialog_btn_submit.attr('mid');
            var data = {id: mid};
            rows.each(function(){
                var $this = $(this);
                var groupId = $this.attr('groupId');
                var value = $this.val();

                data['MemberReturn][' + groupId + ']'] = value;
            });
            var parm = {data: data, done: SetOfflineWater.MoidifyDone};
            Public.Api.SetOfflineWater(parm);
        },
        MoidifyDone: function(response)
        {
            var response = typeof(response) === 'object' ? response : {};
            var msg = response.msg || 'system error';
            response.status == '0' ? SystemError.Do(msg, 'success') : SystemError.Do(msg, 'error');
        },
        Clear: function()
        {
            var rows = SetOfflineWater.$top.find('.set-bouns-input');
            rows.each(function(){
                var $this = $(this);
                var groupId = $this.attr('groupId');
                $this.val(SetOfflineWater.valuewater[groupId]);
            });
        },
        SetTable: function()
        {
            var $this = $(this);
            var data = {mid: $this.attr('mid')};
            var param = {
                data: data,
                done: SetOfflineWater.SetBody,
            };
            Public.Api.GetMemberReturn(param);
        },
        SetBody: function(response)
        {
            if( typeof(response) !== 'object' || typeof(response.msg) !== 'object' || 
                typeof(response.msg.gamegroupData) !== 'object' || typeof(response.msg.member) !== 'object' || response.status != 0 )
            { 
                return ;
            }

            var gameGroup = response.msg.gamegroupData || {};
            var member = response.msg.member;
            var mid = member.id;
            var tags = '';

            for (var key in gameGroup)
            {
                var row = gameGroup[key] || {};
                SetOfflineWater.valuewater[row['id']] = row['MemberReturn'] || 0;
                tags +=
                    '<tr>' +
                        '<td>' + row.gamehallid + '(' + row.groupname + ')' + '</td>' +
                        '<td class="acenter">' +
                            '<input type="number" class="set-bouns-input acenter" groupId="' + row['id'] + '" value="' + (row['MemberReturn'] || 0) + '" />' +
                        '</td>' +
                        '<td class="acenter bouns-num">' + 
                            '0 ~ ' + (row['upMemberReturn'] || 0) +
                        '</td>' +
                    '</tr>';
            }
            SetOfflineWater.$table.find('tbody').html(tags);
            SetOfflineWater.$dialog_btn_submit.attr('mid' ,mid);
        },
    };

    /* 下線報表查詢 */
    var Layermember_Report = {
        $top: {},
        $startTime: {},
        $endTime: {},
        $searchbtn: {},
        $select: {},
        $table: {},   
        $tbody: {},
        $footerTable: {},
        $footerhead: {},
        page: 1,
        num: 10,

        Initial: function()
        {
            this.$top = $('div[data-page-name=layer-member-report]');
            this.$startTime = this.$top.find('.startTime');
            this.$endTime = this.$top.find('.endTime');
            this.$searchbtn = this.$top.find('.submit');
            this.$select = this.$top.find('select');

            this.$table = this.$top.find('.acc-table');
            this.$tbody = this.$table.find('tbody');
            this.$footerTable = this.$top.find('#footer');
            this.$footerhead = this.$footerTable.find('thead');
            this.Setoption();   //下拉式選單
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$searchbtn.on('click', this.GetReport);
            this.$table.on('click', '#loadMore', this.GetReport);
        },
        Setoption: function()
        {
            var tag = '';
            var hall = Public.GetGameHall();
            var gameName = Language.Get('全部类型');
            tag += '<option value="">' + gameName + '</option>';
            for (var key in hall)
            {
                if (hall[key].id != '10' && hall[key].status == '1')
                {
                    tag += "<option value =" + hall[key].gamehall + ">" + Language.Get(hall[key].gameHallNickname) + "</option>";
                }
            }
            Layermember_Report.$select.append(tag);
        },
        GetReport: function()
        {
            var isLoadMore = $(this).prop('id') === 'loadMore';
            /* 判斷是否加載 */
            if (isLoadMore)
            {
                Layermember_Report.page ++;
            }
            else
            {
                Layermember_Report.page = 1;
                Layermember_Report.$tbody.html('');
            }
            Layermember_Report.$tbody.find('#loadMore').remove();
            Layermember_Report.$tbody.append('<tr id="loading"><td class="acenter text_236" colspan="7">loading</td></tr>');

            /* 報表參數 */
            var parm = {
                data:{
                    gameHall: Layermember_Report.$select.val(),
                    startTime: Layermember_Report.$startTime.val(),
                    endTime: Layermember_Report.$endTime.val(),
                    page: Layermember_Report.page,
                    num: Layermember_Report.num,
                },
                done: Layermember_Report.SetTable,
            };
            /* 取得報表資料 */
            Public.Api.GetOfflineReport(parm);
        },
        SetTable: function(response)
        {
            if (typeof(response) !== 'object')
            {
                return ;
            }
            Layermember_Report.SetBody(response.msg);
            Layermember_Report.SetFooter(response.msg);
        },
        SetBody: function(data)
        {
            var rows = typeof(data.rows) === 'object' ? data.rows : {};
            var tags = '';

            for (var key in rows)
            {
                var row = rows[key];
                var gameHall = Public.GetGameHallByHall(row.gameHall) || {};
                var betTime = row.betTime.split(' ') || {};
                var flag = '';
                if (row.flag == 1)
                {
                    flag = Language.Get('已結算');
                }
                else if (row.flag == 0)
                {
                    flag = Language.Get('未結算');
                }
                else if (row.flag == -9)
                {
                    flag = Language.Get('取消注單');
                }
                else
                {
                    flag = '';
                }

                tags +=
                    '<tr>' +
                        '<td class="acenter">' + betTime[0] + '<br />' + betTime[1] + '</td>' +
                        '<td class="acenter">' + row.username + '</td>' +
                        '<td class="acenter">' + Language.Get(gameHall.gameHallNickname) + '</td>' +
                        '<td class="aright"><p>' + row.betAmount + '</p></td>' +
                        '<td class="aright"><p>' + row.validBetAmount + '</p></td>' +
                        '<td class="aright"><p>' + row.netAmount + '</p></td>' +
                        '<td class="acenter">' + flag + '</td>' +
                    '</tr>';
            }

            Layermember_Report.$tbody.find('#loading').remove();
            /* 顯示頁數 */
            var page = parseInt(data.page);
            /* 顯示筆數 */
            var num = parseInt(data.num);
            /* 報表總比數 */
            var total = parseInt(data.total) || 0;

            if (tags && (page * num) < total)
            {
                tags += '<tr id="loadMore"><td class="acenter text_189" colspan="7" style="background: #ddd; color: #007bff;"></td></tr>';
            }
            Layermember_Report.$tbody.append(tags);
        },
        SetFooter: function(data)
        {
            var sum = typeof(data.sum) === 'object' ? data.sum : {};
            var sumbetAmount = sum.sumbetAmount || '0';
            var sumvalidBetAmount = sum.sumvalidBetAmount || '0';
            var sumnetAmount = sum.sumnetAmount || '0';
            var head = 
                '<tr>' +
                    '<th width="15%"></th>' +
                    '<th width="10%"></th>' +
                    '<th width="15%" class="acenter text_188"></th>' +
                    '<th width="15%" class="aright">' + sumbetAmount + '</th>' +
                    '<th width="18%" class="aright">' + sumvalidBetAmount + '</th>' +
                    '<th width="15%" class="aright">' + sumnetAmount + '</th>' +
                    '<th width="15%"></th>' +
                '</tr>';
            Layermember_Report.$footerhead.html(head);
        },
        SetPlaceholder: function()
        {
            Layermember_Report.$top.find('#layer-member-report-submit').attr('value',Language.Get('查询'));
        }
    };

    /* 帳號設置 */
    var UserSet = {
        $top: {},
        $username: {},
        $account: {},
        $password: {},
        $password2: {},
        $phone: {},
        $paypwd: {},
        $checkpaypwd: {},
        $submit: {},
        $close: {},

        Initial: function()
        {
            this.$top = $('#wt-dialog');
            this.$username = this.$top.find('.username');
            this.$account = this.$top.find('.account');
            this.$password = this.$top.find('.password');
            this.$password2 = this.$top.find('.password2');
            this.$phone = this.$top.find('.phone');
            this.$paypwd = this.$top.find('.paypwd');
            this.$checkpaypwd = this.$top.find('.checkpaypwd');
            this.$submit = this.$top.find('.submit');
            this.$close = document.querySelector('#wt-dialog .btn-close');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$submit.on('click', this.Do);
        },
        SetUsername: function()
        {
            this.$username.html(Public.GetLocalStorage('truename'));
        },
        Do: function()
        {
            var param = {
                data: {
                    username: UserSet.$account.val(),
                    password: UserSet.$password.val(),
                    password2: UserSet.$password2.val(),
                    phone: UserSet.$phone.val(),
                    paypwd: UserSet.$paypwd.val(),
                    checkpaypwd: UserSet.$checkpaypwd.val(),
                },
                done: UserSet.Done,
            };
            Public.Api.ChangeUsername(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === '0')
            {
                Public.SetLocalStorage({loginaccount: UserSet.$account.val(), loginpassword: UserSet.$password.val()});
                SystemError.Do(msg, 'success');
                App.UserMain();
                UserSet.Cancel();
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        Cancel: function()
        {
            UserSet.$username.val('');
            UserSet.$password.val('');
            UserSet.$password2.val('');
            UserSet.$phone.val('');
            UserSet.$paypwd.val('');
            UserSet.$checkpaypwd.val('');
            UserSet.$close.click();
        },
    };

    var MobileUrl = {
        $top: {},

        Initial: function()
        {
            this.$top = $('#addressDialog');
            this.Set();
        },
        Set: function()
        {
            this.$top.find('.url').text(Public.GetConfig('HOSTURL'));
        },
    };

    /* 修改提現密碼 */
    var ChangeWithdrawPwd = {
        $top: {},
        $oldpwd: {},
        $newpwd: {},
        $confirmpwd: {},
        $updatebtn: {},
        $close: {},

        Initial: function()
        {
            this.$top = $('#change-pwd-safe-dialog');
            this.$oldpwd = this.$top.find('input[name="oldpwd"]');
            this.$newpwd = this.$top.find('input[name="newpwd"]');
            this.$confirmpwd = this.$top.find('input[name="confirmpwd"]');
            this.$updatebtn = this.$top.find('.btn-acc-bind');
            this.$close = this.$top.find('.btn-close');
            
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$updatebtn.on('click', this.Do);
        },
        Do: function()
        {
            var param = {
                data: {
                    oldpaypassword: ChangeWithdrawPwd.$oldpwd.val(),
                    newpaypassword: ChangeWithdrawPwd.$newpwd.val(),
                    newpaypassword2: ChangeWithdrawPwd.$confirmpwd.val(),
                },
                done: ChangeWithdrawPwd.Done,
            };
            Public.Api.ChangePayPassword(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === '0')
            {
                ChangeWithdrawPwd.Clear();
                SystemError.Do(msg, 'success');
                ChangeWithdrawPwd.$close.click();
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        Clear: function()
        {
            ChangeWithdrawPwd.$oldpwd.val('');
            ChangeWithdrawPwd.$newpwd.val('');
            ChangeWithdrawPwd.$confirmpwd.val('');
        },
        // IsChangePaypwd: function(response)
        // {
        //     if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || response.status != 0)
        //     {
        //         return ;
        //     }
        //     var msg = response.msg;
        //     if (msg.paypwd == '')
        //     {
        //         ChangeWithdrawPwd.$top.show();
        //         ChangeWithdrawPwd.$top.addClass('in');
        //     }
        // },
        SetPlaceholder: function()
        {
            ChangeWithdrawPwd.$top.find('#changePayWd').attr('placeholder',Language.Get('请输入支付旧密码'));
            ChangeWithdrawPwd.$top.find('#changeNewPaywd').attr('placeholder',Language.Get('请输入新支付密码'));
            ChangeWithdrawPwd.$top.find('#changeNewPaywd1').attr('placeholder',Language.Get('请再次输入支付密码'));
        }
    };

    /* 修改登入密碼 */
    var ChangeLoginPwd = {
        $top: {},
        $oldpwd: {},
        $newpwd: {},
        $confirmpwd: {},
        $updatebtn: {},
        $close: {},

        Initial: function()
        {
            this.$top = $('#change-pwd-dialog');
            this.$oldpwd = this.$top.find('input[name="oldpwd"]');
            this.$newpwd = this.$top.find('input[name="newpwd"]');
            this.$confirmpwd = this.$top.find('input[name="confirmpwd"]');
            this.$updatebtn = this.$top.find('.btn-acc-bind');
            this.$close = this.$top.find('.btn-close');
            
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$updatebtn.on('click', this.Do);
        },
        Do: function()
        {
            var param = {
                data: {
                    oldpassword: ChangeLoginPwd.$oldpwd.val(),
                    password: ChangeLoginPwd.$newpwd.val(),
                    password2: ChangeLoginPwd.$confirmpwd.val(),
                },
                done: ChangeLoginPwd.Done,
            };
            Public.Api.ChangePassword(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === '0')
            {
                ChangeLoginPwd.Clear();
                SystemError.Do(msg, 'success');
                ChangeLoginPwd.$close.click();
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        Clear: function()
        {
            ChangeLoginPwd.$oldpwd.val('');
            ChangeLoginPwd.$newpwd.val('');
            ChangeLoginPwd.$confirmpwd.val('');
        },
        SetPlaceholder: function()
        {
            ChangeLoginPwd.$top.find('#changeloginwd').attr('placeholder',Language.Get('请输入旧密码'));
            ChangeLoginPwd.$top.find('#changeloginNewwd').attr('placeholder',Language.Get('请输入密码'));
            ChangeLoginPwd.$top.find('#changeloginNewwd1').attr('placeholder',Language.Get('请再次输入密码'));
        }
    };

    /* 設定QRcode碼 */
    var PromotionQRCode = {
        $top: {},
        $button: {},
        $QRCode: {},
        size: 10,

        Initial: function()
        {
            this.$top = $('#invite-dialog');
            this.$QRCode = this.$top.find('#qrcode');

            this.BindEvents();
        },
        BindEvents: function()
        {
        },
        Main: function()
        {
            Public.GetConfig('WEIXINMODE') !== 'WPB'
                ? PromotionQRCode.Set(Public.GetConfig('IFRAMEHOST'))
                : (function(){
                    var param = {
                        done: function(response)
                        {
                            var response = typeof(response) === 'object' ? response : {};
                            var status = response.status == 0 ? true : false;
                            var message = response.msg;
                            var data = typeof(message.data) === 'object' ? message.data : {};

                            if (! status) {
                                PromotionQRCode.$top.find('.message').text(message).show();
                                PromotionQRCode.$top.find('.memo').hide();
                                PromotionQRCode.$top.find('.memo2').hide();
                                return ;
                            }
                            PromotionQRCode.$top.find('.message').hide();
                            PromotionQRCode.$top.find('.memo').show();
                            PromotionQRCode.$top.find('.memo2').show();

                            PromotionQRCode.Set(data.url);
                        }
                    };
                    Public.Api.WPBGetLoginUrl(param);
                })();
        },
        Set: function(url)
        {
            var vendor = Public.GetConfig('VENDOR');
            var id = Public.GetLocalStorage('id');
            var size = PromotionQRCode.size;

            var spreadUrl = Public.GetConfig('HOSTURL') + '/?method=register&trim=' + localStorage.upAgentid + '-';
            if(localStorage.mode == '1' && localStorage.upAgentType == '3')
            {
                spreadUrl += localStorage.id;
            }
            var iframeHost = encodeURIComponent(spreadUrl);
            var qrcodeUrl = id && (Public.GetConfig('CREATEQRCODEURL') + '/phpqrcode/get.php?string=' + iframeHost + '&size=' + size);
            PromotionQRCode.$QRCode.attr('src', qrcodeUrl);

            var tag = "";
            tag += '<span class="text_240">：</span> <br />';
            tag += '<span id="spreadUrl">' + spreadUrl + '</span><br /><br />';
            tag += '<span class="copy text_351" style="border-radius: 14px; border: 1px solid #d3b498; color: #d3b498; padding: 2px;"></span><br />';
            PromotionQRCode.$top.find('.memo').html(tag);
            PromotionQRCode.$top.find('.copy').on('click', PromotionQRCode.Copy);
        },
        Copy: function(){
            // 先取得 複製按鈕 的屬性 取得account
            var $this = $(this);

            //自動選取某個區域的文字
            var TextRange = document.createRange();
            TextRange.selectNode(document.getElementById('spreadUrl'));
            // 選擇的文本範圍
            sel = window.getSelection();
            // 選擇中刪除所有範圍
            sel.removeAllRanges();
            // 選擇中新增範圍
            sel.addRange(TextRange);
            // 複製
            if(document.execCommand("Copy"))
            {
                document.execCommand("Copy");
                alert(Language.Get('复制成功'));
            }
        },
    };

    /* 確認試玩視窗 */
    var FreePlay = {
        $top: {},
        $freeplay_submit: {},
        $freeplay_cancel: {},

        Initial: function()
        {
            this.$top = $('#trailModal');
            this.$freeplay_submit = this.$top.find('#freeplay_submit');
            this.$freeplay_cancel = this.$top.find('#freeplay_cancel');
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$freeplay_submit.on('click', Public.Api.FreePlay);
            this.$freeplay_cancel.on('click', this.Hide); 
        },
        Show: function()
        {
            FreePlay.$top.show();
        },
        Hide: function()
        {
            FreePlay.$top.hide();
        },
    };

    /* 新增銀行卡視窗 */
    var AddBankcard = {
        $top: {},
        $username: {},
        $bankcode: {},
        $Bankname: {},
        $province: {},
        $city: {},
        $branch: {},
        $ALIPAYAccount: {},
        $FPSAccount: {},
        $USDTAccount: {},
        $USDTAccountTRC20: {},
        // $BEP20Account: {},
        // $BEP2Account: {},
        $recharge_submit: {},
        $recharge_cancel: {},

        Initial: function()
        {
            this.$top = $('#add-card-dialog');
            this.$username = this.$top.find('.username');
            this.$bankcode = this.$top.find('#bankcode');
            this.$Bankname = this.$top.find('#Bankname');
            this.$province = this.$top.find('#Province');
            this.$city = this.$top.find('#City');
            this.$branch = this.$top.find('#Branch');
            this.$ALIPAYAccount = this.$top.find('#ALIPAYAccount');
            this.$FPSAccount = this.$top.find('#FPSAccount');
            this.$USDTAccount = this.$top.find('#USDTAccount');
            this.$USDTAccountTRC20 = this.$top.find('#USDTAccountTRC20');
            // this.$BEP20Account = this.$top.find('#BEP20Account');
            // this.$BEP2Account = this.$top.find('#BEP2Account');
            this.$recharge_submit = this.$top.find('.recharge-submit');
            this.$recharge_cancel = this.$top.find('.recharge-cancel');

            this.BindEvents();
            this.setBankOption();
        },
        BindEvents: function()
        {
            this.$recharge_submit.on('click', this.Do);
            this.$recharge_cancel.on('click', this.Hide);
        },
        setBody: function(str)
        {
            // AddBankcard.$top.find('.bankcode, .Bankname, .FPSAccount, .USDTAccount, .USDTAccountTRC20, .BEP20Account, .BEP2Account').css('display', 'none');
            AddBankcard.$top.find('.datahide').css('display', 'none');
            
            AddBankcard.$top.find('div[type="' + str + '"]').css('display', 'block');

            // if (str == 'bank')
            // {
            //     AddBankcard.$top.find('.bankcode, .Bankname').css('display', 'block');
            // }
            // if (str == 'FPS')
            // {
            //     AddBankcard.$top.find('.FPSAccount').css('display', 'block');
            // }
            // if (str == 'ERC20')
            // {
            //     AddBankcard.$top.find('.USDTAccount').css('display', 'block');
            // }
            // if (str == 'TRC20')
            // {
            //     AddBankcard.$top.find('.USDTAccountTRC20').css('display', 'block');
            // }
            // if (str == 'BEP20')
            // {
            //     AddBankcard.$top.find('.BEP20Account').css('display', 'block');
            // }
            // if (str == 'BEP2')
            // {
            //     AddBankcard.$top.find('.BEP2Account').css('display', 'block');
            // }
            // if (str == 'Withdrawals')
            // {
            //     if (localStorage.banks == '')
            //     {
            //         // AddBankcard.$top.find('.FPSAccount').css('display', 'none');
            //         $('.pages-container').show();
            //         BankManagement.$top.addClass('active ani');
            //         BankManagement.SetBody();
            //     }
            // }
        },
        Hide: function()
        {
            AddBankcard.Clear();
            AddBankcard.$top.hide();
            $('#modal-backdrop').removeClass('fade in');
            /*提現視窗顯示及撈取銀行卡資訊*/
            // Withdrawals.SetBank();
            // Withdrawals.$top.addClass('in');
            // Withdrawals.$top.css('display', 'block');
        },
        Do: function()
        {
            AddBankcard.$recharge_submit.hide();
            var username = AddBankcard.$username.val();
            var bankcode = AddBankcard.$bankcode.val();
            var Bankname = AddBankcard.$Bankname.val();
            var province = AddBankcard.$province.val();
            var city = AddBankcard.$city.val();
            var branch = AddBankcard.$branch.val();
            var ALIPAYAccount = AddBankcard.$ALIPAYAccount.val();
            var FPSAccount = AddBankcard.$FPSAccount.val();
            var USDTAccount = AddBankcard.$USDTAccount.val();
            var USDTAccountTRC20 = AddBankcard.$USDTAccountTRC20.val();
            // var BEP20Account = AddBankcard.$BEP20Account.val();
            // var BEP2Account = AddBankcard.$BEP2Account.val();

            // if (bankcode != '' && FPSAccount != '' && USDTAccount != '' && USDTAccountTRC20 != '' && BEP20Account != '' && BEP2Account != '')
            if (bankcode != '' && FPSAccount != '' && USDTAccount != '' && USDTAccountTRC20 != '')
            {
                alert(Language.Get('只能填写一种账号'));
                AddBankcard.$recharge_submit.show();
                return false;
            }
            
            var param = {
                data: {
                    username: username,
                    bankcode: bankcode,
                    bankname: Bankname,
                    province: province,
                    city: city,
                    branch: branch,
                    ALIPAYAccount: ALIPAYAccount,
                    FPSAccount: FPSAccount,
                    USDTAccount: USDTAccount,
                    USDTAccountTRC20: USDTAccountTRC20,
                    // BEP20Account: BEP20Account,
                    // BEP2Account: BEP2Account,
                },
                done: AddBankcard.Done,
            };
            Public.Api.AddBankcard(param);
        },
        Done: function(response)
        {
            if (typeof(response) !== 'object' || response.status!== '0')
            {
                SystemError.Do(response.msg, 'error');
                AddBankcard.$recharge_submit.show();
                return ;
            }
            SystemError.Do(response.msg, 'success');
            AddBankcard.Clear();
            AddBankcard.Hide();
            // location.reload();
        },
        Clear: function()
        {
            AddBankcard.$username.val('');
            AddBankcard.$bankcode.val('');
            AddBankcard.$Bankname.val('');
            AddBankcard.$FPSAccount.val('');
            AddBankcard.$USDTAccount.val('');
        },
        SetPlaceholder: function()
        {
            AddBankcard.$top.find('.username').attr('placeholder',Language.Get('请输入持卡人姓名'));
            AddBankcard.$top.find('#bankcode').attr('placeholder',Language.Get('请输入您的银行卡号'));
            AddBankcard.$top.find('#Province').attr('placeholder',Language.Get('请输入开户省份'));
            AddBankcard.$top.find('#City').attr('placeholder',Language.Get('请输入开户城市'));
            AddBankcard.$top.find('#Branch').attr('placeholder',Language.Get('请输入开户支行名称'));
            AddBankcard.$top.find('#Bankname').attr('placeholder',Language.Get('请输入开户行名称'));
            AddBankcard.$top.find('#ALIPAYAccount').attr('placeholder',Language.Get('请输入支付宝号码'));
            AddBankcard.$top.find('#FPSAccount').attr('placeholder',Language.Get('请输入转数快号码'));
            AddBankcard.$top.find('#USDTAccount, #USDTAccountTRC20').attr('placeholder',Language.Get('请输入USDT账号'));
            // AddBankcard.$top.find('#BEP20Account, #BEP2Account').attr('placeholder',Language.Get('请输入账号'));
        },
        setBankOption: function(){
            var tag = 
                '<option value="003 渣打銀行(香港)有限公司">' + '003 ' + Language.Get('渣打银行(香港)有限公司') + '</option>' +
                '<option value="004 香港上海滙豐銀行有限公司">' + '004 ' + Language.Get('香港上海汇丰银行有限公司') + '</option>' +
                '<option value="005 東方匯理銀行">' + '005 ' + Language.Get('东方汇理银行') + '</option>' +
                '<option value="006 花旗銀行">' + '006 ' + Language.Get('花旗银行') + '</option>' +
                '<option value="007 摩根大通銀行">' + '007 ' + Language.Get('摩根大通银行') + '</option>' +
                '<option value="008 國民西敏寺資本市場銀行有限公司">' + '008 ' + Language.Get('国民西敏寺资本市场银行有限公司') + '</option>' +
                '<option value="009 中國建設銀行(亞洲)股份有限公司">' + '009 ' + Language.Get('中国建设银行(亚洲)股份有限公司') + '</option>' +
                '<option value="012 中國銀行(香港)有限公司">' + '012 ' + Language.Get('中国银行(香港)有限公司') + '</option>' +
                '<option value="015 東亞銀行有限公司">' + '015 ' + Language.Get('东亚银行有限公司') + '</option>' +
                '<option value="016 星展銀行(香港)有限公司">' + '016 ' + Language.Get('星展银行(香港)有限公司') + '</option>' +
                '<option value="018 中信銀行(國際)有限公司">' + '018 ' + Language.Get('中信银行(国际)有限公司') + '</option>' +
                '<option value="020 招商永隆銀行有限公司">' + '020 ' + Language.Get('招商永隆银行有限公司') + '</option>' +
                '<option value="022 華僑銀行">' + '022 ' + Language.Get('华侨银行') + '</option>' +
                '<option value="024 恒生銀行有限公司">' + '024 ' + Language.Get('恒生银行有限公司') + '</option>' +
                '<option value="025 上海商業銀行有限公司">' + '025 ' + Language.Get('上海商业银行有限公司') + '</option>' +
                '<option value="027 交通銀行股份有限公司">' + '027 ' + Language.Get('交通银行股份有限公司') + '</option>' +
                '<option value="028 大眾銀行(香港)有限公司">' + '028 ' + Language.Get('大众银行(香港)有限公司') + '</option>' +
                '<option value="035 華僑永亨銀行有限公司">' + '035 ' + Language.Get('华侨永亨银行有限公司') + '</option>' +
                '<option value="038 大有銀行有限公司">' + '038 ' + Language.Get('大有银行有限公司') + '</option>' +
                '<option value="039 集友銀行有限公司">' + '039 ' + Language.Get('集友银行有限公司') + '</option>' +
                '<option value="040 大新銀行有限公司">' + '040 ' + Language.Get('大新银行有限公司') + '</option>' +
                '<option value="041 創興銀行有限公司">' + '041 ' + Language.Get('创兴银行有限公司') + '</option>' +
                '<option value="043 南洋商業銀行有限公司">' + '043 ' + Language.Get('南洋商业银行有限公司') + '</option>' +
                '<option value="045 UCO BANK">' + '045 ' + Language.Get('UCO BANK') + '</option>' +
                '<option value="046 韓亞銀行">' + '046 ' + Language.Get('韩亚银行') + '</option>' +
                '<option value="047 三菱UFJ銀行">' + '047 ' + Language.Get('三菱UFJ银行') + '</option>' +
                '<option value="049 盤谷銀行">' + '049 ' + Language.Get('盘谷银行') + '</option>' +
                '<option value="050 印度海外銀行">' + '050 ' + Language.Get('印度海外银行') + '</option>' +
                '<option value="054 德意志銀行">' + '054 ' + Language.Get('德意志银行') + '</option>' +
                '<option value="055 美國銀行">' + '055 ' + Language.Get('美国银行') + '</option>' +
                '<option value="056 法國巴黎銀行">' + '056 ' + Language.Get('法国巴黎银行') + '</option>' +
                '<option value="058 印度銀行">' + '058 ' + Language.Get('印度银行') + '</option>' +
                '<option value="060 巴基斯坦國民銀行">' + '060 ' + Language.Get('巴基斯坦国民银行') + '</option>' +
                '<option value="061 大生銀行有限公司">' + '061 ' + Language.Get('大生银行有限公司') + '</option>' +
                '<option value="063 馬來亞銀行">' + '063 ' + Language.Get('马来亚银行') + '</option>' +
                '<option value="065 三井住友銀行">' + '065 ' + Language.Get('三井住友银行') + '</option>' +
                '<option value="066 印尼國家銀行">' + '066 ' + Language.Get('印尼国家银行') + '</option>' +
                '<option value="067 金融銀行有限公司">' + '067 ' + Language.Get('金融银行有限公司') + '</option>' +
                '<option value="071 大華銀行有限公司">' + '071 ' + Language.Get('大华银行有限公司') + '</option>' +
                '<option value="072 中國工商銀行（亞洲）有限公司">' + '072 ' + Language.Get('中国工商银行（亚洲）有限公司') + '</option>' +
                '<option value="074 巴克萊銀行">' + '074 ' + Language.Get('巴克莱银行') + '</option>' +
                '<option value="076 加拿大豐業銀行">' + '076 ' + Language.Get('加拿大丰业银行') + '</option>' +
                '<option value="080 加拿大皇家銀行">' + '080 ' + Language.Get('加拿大皇家银行') + '</option>' +
                '<option value="081 法國興業銀行">' + '081 ' + Language.Get('法国兴业银行') + '</option>' +
                '<option value="082 印度國家銀行">' + '082 ' + Language.Get('印度国家银行') + '</option>' +
                '<option value="085 多倫多道明銀行">' + '085 ' + Language.Get('多伦多道明银行') + '</option>' +
                '<option value="086 滿地可銀行">' + '086 ' + Language.Get('满地可银行') + '</option>' +
                '<option value="092 加拿大帝國商業銀行">' + '092 ' + Language.Get('加拿大帝国商业银行') + '</option>' +
                '<option value="097 德國商業銀行">' + '097 ' + Language.Get('德国商业银行') + '</option>' +
                '<option value="103 瑞士銀行">' + '103 ' + Language.Get('瑞士银行') + '</option>' +
                '<option value="106 美國滙豐銀行">' + '106 ' + Language.Get('美国汇丰银行') + '</option>' +
                '<option value="109 瑞穗銀行">' + '109 ' + Language.Get('瑞穗银行') + '</option>' +
                '<option value="113 德國中央合作銀行">' + '113 ' + Language.Get('德国中央合作银行') + '</option>' +
                '<option value="118 友利銀行">' + '118 ' + Language.Get('友利银行') + '</option>' +
                '<option value="119 菲律賓國家銀行">' + '119 ' + Language.Get('菲律宾国家银行') + '</option>' +
                '<option value="128 富邦銀行(香港)有限公司">' + '128 ' + Language.Get('富邦银行(香港)有限公司') + '</option>' +
                '<option value="138 三菱UFJ信託銀行">' + '138 ' + Language.Get('三菱UFJ信托银行') + '</option>' +
                '<option value="139 紐約梅隆銀行有限公司">' + '139 ' + Language.Get('纽约梅隆银行有限公司') + '</option>' +
                '<option value="145 ING BANK N.V.">' + '145 ' + Language.Get('ING BANK N.V.') + '</option>' +
                '<option value="147 西班牙對外銀行">' + '147 ' + Language.Get('西班牙对外银行') + '</option>' +
                '<option value="150 澳大利亞國民銀行">' + '150 ' + Language.Get('澳大利亚国民银行') + '</option>' +
                '<option value="151 西太平洋銀行">' + '151 ' + Language.Get('西太平洋银行') + '</option>' +
                '<option value="152 澳新銀行集團有限公司">' + '152 ' + Language.Get('澳新银行集团有限公司') + '</option>' +
                '<option value="153 澳洲聯邦銀行">' + '153 ' + Language.Get('澳洲联邦银行') + '</option>' +
                '<option value="161 義大利聯合聖保羅銀行股份有限公司">' + '161 ' + Language.Get('义大利联合圣保罗银行股份有限公司') + '</option>' +
                '<option value="164 裕信(德國)銀行股份有限公司">' + '164 ' + Language.Get('裕信(德国)银行股份有限公司') + '</option>' +
                '<option value="165 瑞典商業銀行">' + '165 ' + Language.Get('瑞典商业银行') + '</option>' +
                '<option value="170 千葉銀行">' + '170 ' + Language.Get('千叶银行') + '</option>' +
                '<option value="178 比利時聯合銀行">' + '178 ' + Language.Get('比利时联合银行') + '</option>' +
                '<option value="180 富國銀行香港分行">' + '180 ' + Language.Get('富国银行香港分行') + '</option>' +
                '<option value="183 荷蘭合作銀行">' + '183 ' + Language.Get('荷兰合作银行') + '</option>' +
                '<option value="185 星展銀行(香港)有限公司">' + '185 ' + Language.Get('星展银行(香港)有限公司') + '</option>' +
                '<option value="186 靜岡銀行">' + '186 ' + Language.Get('静冈银行') + '</option>' +
                '<option value="188 八十二銀行">' + '188 ' + Language.Get('八十二银行') + '</option>' +
                '<option value="198 華南商業銀行股份有限公司">' + '198 ' + Language.Get('华南商业银行股份有限公司') + '</option>' +
                '<option value="199 滋賀銀行">' + '199 ' + Language.Get('滋贺银行') + '</option>' +
                '<option value="201 臺灣銀行股份有限公司">' + '201 ' + Language.Get('台湾银行股份有限公司') + '</option>' +
                '<option value="203 第一商業銀行股份有限公司">' + '203 ' + Language.Get('第一商业银行股份有限公司') + '</option>' +
                '<option value="206 彰化商業銀行股份有限公司">' + '206 ' + Language.Get('彰化商业银行股份有限公司') + '</option>' +
                '<option value="210 法國外貿銀行">' + '210 ' + Language.Get('法国外贸银行') + '</option>' +
                '<option value="214 中國工商銀行股份有限公司">' + '214 ' + Language.Get('中国工商银行股份有限公司') + '</option>' +
                '<option value="220 美國道富銀行">' + '220 ' + Language.Get('美国道富银行') + '</option>' +
                '<option value="221 中國建設銀行股份有限公司">' + '221 ' + Language.Get('中国建设银行股份有限公司') + '</option>' +
                '<option value="222 中國農業銀行股份有限公司">' + '222 ' + Language.Get('中国农业银行股份有限公司') + '</option>' +
                '<option value="227 第一儲蓄銀行">' + '227 ' + Language.Get('第一储蓄银行') + '</option>' +
                '<option value="229 中國信託商業銀行股份有限公司">' + '229 ' + Language.Get('中国信托商业银行股份有限公司') + '</option>' +
                '<option value="230 臺灣中小企業銀行股份有限公司">' + '230 ' + Language.Get('台湾中小企业银行股份有限公司') + '</option>' +
                '<option value="233 CREDIT SUISSE AG">' + '233 ' + Language.Get('CREDIT SUISSE AG') + '</option>' +
                '<option value="236 國泰世華商業銀行股份有限公司">' + '236 ' + Language.Get('国泰世华商业银行股份有限公司') + '</option>' +
                '<option value="237 瑞士盈豐銀行股份有限公司">' + '237 ' + Language.Get('瑞士盈丰银行股份有限公司') + '</option>' +
                '<option value="238 招商銀行股份有限公司">' + '238 ' + Language.Get('招商银行股份有限公司') + '</option>' +
                '<option value="239 台北富邦商業銀行股份有限公司">' + '239 ' + Language.Get('台北富邦商业银行股份有限公司') + '</option>' +
                '<option value="241 永豐商業銀行股份有限公司">' + '241 ' + Language.Get('永丰商业银行股份有限公司') + '</option>' +
                '<option value="242 兆豐國際商業銀行">' + '242 ' + Language.Get('兆丰国际商业银行') + '</option>' +
                '<option value="243 玉山商業銀行股份有限公司">' + '243 ' + Language.Get('玉山商业银行股份有限公司') + '</option>' +
                '<option value="245 台新國際商業銀行股份有限公司">' + '245 ' + Language.Get('台新国际商业银行股份有限公司') + '</option>' +
                '<option value="248 豐隆銀行有限公司">' + '248 ' + Language.Get('丰隆银行有限公司') + '</option>' +
                '<option value="249 渣打銀行">' + '249 ' + Language.Get('渣打银行') + '</option>' +
                '<option value="250 花旗銀行(香港)有限公司">' + '250 ' + Language.Get('花旗银行(香港)有限公司') + '</option>' +
                '<option value="251 印度工業信貸投資銀行">' + '251 ' + Language.Get('印度工业信贷投资银行') + '</option>' +
                '<option value="254 MELLI BANK PLC">' + '254 ' + Language.Get('MELLI BANK PLC') + '</option>' +
                '<option value="258 華美銀行">' + '258 ' + Language.Get('华美银行') + '</option>' +
                '<option value="259 巴魯達銀行">' + '259 ' + Language.Get('巴鲁达银行') + '</option>' +
                '<option value="260 遠東國際商業銀行股份有限公司">' + '260 ' + Language.Get('远东国际商业银行股份有限公司') + '</option>' +
                '<option value="262 CANARA BANK">' + '262 ' + Language.Get('CANARA BANK') + '</option>' +
                '<option value="263 國泰銀行">' + '263 ' + Language.Get('国泰银行') + '</option>' +
                '<option value="264 台灣土地銀行股份有限公司">' + '264 ' + Language.Get('台湾土地银行股份有限公司') + '</option>' +
                '<option value="265 合作金庫商業銀行股份有限公司">' + '265 ' + Language.Get('合作金库商业银行股份有限公司') + '</option>' +
                '<option value="266 PUNJAB NATIONAL BANK">' + '266 ' + Language.Get('PUNJAB NATIONAL BANK') + '</option>' +
                '<option value="267 西班牙桑坦德銀行有限公司">' + '267 ' + Language.Get('西班牙桑坦德银行有限公司') + '</option>' +
                '<option value="268 印度聯合銀行">' + '268 ' + Language.Get('印度联合银行') + '</option>' +
                '<option value="269 上海商業儲蓄銀行股份有限公司">' + '269 ' + Language.Get('上海商业储蓄银行股份有限公司') + '</option>' +
                '<option value="271 INDUSTRIAL BANK OF KOREA">' + '271 ' + Language.Get('INDUSTRIAL BANK OF KOREA') + '</option>' +
                '<option value="272 新加坡銀行有限公司">' + '272 ' + Language.Get('新加坡银行有限公司') + '</option>' +
                '<option value="273 新韓銀行">' + '273 ' + Language.Get('新韩银行') + '</option>' +
                '<option value="274 王道商業銀行股份有限公司">' + '274 ' + Language.Get('王道商业银行股份有限公司') + '</option>' +
                '<option value="275 BNP PARIBAS SECURITIES SERVICES">' + '275 ' + Language.Get('BNP PARIBAS SECURITIES SERVICES') + '</option>' +
                '<option value="276 國家開發銀行">' + '276 ' + Language.Get('国家开发银行') + '</option>' +
                '<option value="277 FIRST ABU DHABI BANK PJSC">' + '277 ' + Language.Get('FIRST ABU DHABI BANK PJSC') + '</option>' +
                '<option value="278 BANK J. SAFRA SARASIN LTD.">' + '278 ' + Language.Get('BANK J. SAFRA SARASIN LTD.') + '</option>' +
                '<option value="307 ABN AMRO BANK N.V.">' + '307 ' + Language.Get('ABN AMRO BANK N.V.') + '</option>' +
                '<option value="308 HDFC BANK LIMITED">' + '308 ' + Language.Get('HDFC BANK LIMITED') + '</option>' +
                '<option value="309 UNION BANCAIRE PRIVEE, UBP SA">' + '309 ' + Language.Get('UNION BANCAIRE PRIVEE, UBP SA') + '</option>' +
                '<option value="316 SKANDINAVISKA ENSKILDA BANKEN AB">' + '316 ' + Language.Get('SKANDINAVISKA ENSKILDA BANKEN AB') + '</option>' +
                '<option value="320 寶盛銀行">' + '320 ' + Language.Get('宝盛银行') + '</option>' +
                '<option value="324 CREDIT INDUSTRIEL ET COMMERCIAL">' + '324 ' + Language.Get('CREDIT INDUSTRIEL ET COMMERCIAL') + '</option>' +
                '<option value="337 臺灣新光商業銀行股份有限公司">' + '337 ' + Language.Get('台湾新光商业银行股份有限公司') + '</option>' +
                '<option value="338 中國銀行香港分行">' + '338 ' + Language.Get('中国银行香港分行') + '</option>' +
                '<option value="339 CA INDOSUEZ (SWITZERLAND) SA">' + '339 ' + Language.Get('CA INDOSUEZ (SWITZERLAND) SA') + '</option>' +
                '<option value="341 ICBC STANDARD BANK PLC">' + '341 ' + Language.Get('ICBC STANDARD BANK PLC') + '</option>' +
                '<option value="342 LGT皇家銀行(香港)">' + '342 ' + Language.Get('LGT皇家银行(香港)') + '</option>' +
                '<option value="344 麥格理銀行有限公司">' + '344 ' + Language.Get('麦格理银行有限公司') + '</option>' +
                '<option value="345 上海浦東發展銀行股份有限公司">' + '345 ' + Language.Get('上海浦东发展银行股份有限公司') + '</option>' +
                '<option value="353 中國民生銀行股份有限公司">' + '353 ' + Language.Get('中国民生银行股份有限公司') + '</option>' +
                '<option value="357 PICTET AND CIE (EUROPE) S.A.">' + '357 ' + Language.Get('PICTET AND CIE (EUROPE) S.A.') + '</option>' +
                '<option value="359 廣發銀行股份有限公司">' + '359 ' + Language.Get('广发银行股份有限公司') + '</option>' +
                '<option value="361 渤海銀行股份有限公司">' + '361 ' + Language.Get('渤海银行股份有限公司') + '</option>' +
                '<option value="368 中國光大銀行股份有限公司">' + '368 ' + Language.Get('中国光大银行股份有限公司') + '</option>' +
                '<option value="371 三井住友信託銀行">' + '371 ' + Language.Get('三井住友信托银行') + '</option>' +
                '<option value="372 上海銀行(香港)有限公司">' + '372 ' + Language.Get('上海银行(香港)有限公司') + '</option>' +
                '<option value="374 CIMB BANK BERHAD">' + '374 ' + Language.Get('CIMB BANK BERHAD') + '</option>' +
                '<option value="377 興業銀行股份有限公司">' + '377 ' + Language.Get('兴业银行股份有限公司') + '</option>' +
                '<option value="378 元大商業銀行股份有限公司">' + '378 ' + Language.Get('元大商业银行股份有限公司') + '</option>' +
                '<option value="379 MASHREQ BANK-PUBLIC SHAREHOLDING COMPANY">' + '379 ' + Language.Get('MASHREQ BANK-PUBLIC SHAREHOLDING COMPANY') + '</option>' +
                '<option value="381 KOOKMIN BANK">' + '381 ' + Language.Get('KOOKMIN BANK') + '</option>' +
                '<option value="382 交通銀行(香港)有限公司">' + '382 ' + Language.Get('交通银行(香港)有限公司') + '</option>' +
                '<option value="383 浙商銀行股份有限公司">' + '383 ' + Language.Get('浙商银行股份有限公司') + '</option>' +
                '<option value="384 摩根士丹利銀行亞洲有限公司">' + '384 ' + Language.Get('摩根士丹利银行亚洲有限公司') + '</option>' +
                '<option value="385 平安銀行股份有限公司">' + '385 ' + Language.Get('平安银行股份有限公司') + '</option>' +
                '<option value="386 華夏銀行股份有限公司">' + '386 ' + Language.Get('华夏银行股份有限公司') + '</option>' +
                '<option value="387 眾安銀行">' + '387 ' + Language.Get('众安银行') + '</option>' +
                '<option value="388 LIVI VB LIMITED">' + '388 ' + Language.Get('LIVI VB LIMITED') + '</option>' +
                '<option value="389 MOX BANK">' + '389 ' + Language.Get('MOX BANK') + '</option>' +
                '<option value="390 匯立銀行">' + '390 ' + Language.Get('汇立银行') + '</option>' +
                '<option value="391 富融銀行">' + '391 ' + Language.Get('富融银行') + '</option>' +
                '<option value="392 平安壹賬通銀行(香港)有限公司">' + '392 ' + Language.Get('平安壹账通银行(香港)有限公司') + '</option>' +
                '<option value="393 螞蟻銀行">' + '393 ' + Language.Get('蚂蚁银行') + '</option>' +
                '<option value="394 QATAR NATIONAL BANK (Q.P.S.C.)">' + '394 ' + Language.Get('QATAR NATIONAL BANK (Q.P.S.C.)') + '</option>' +
                '<option value="395 天星銀行">' + '395 ' + Language.Get('天星银行') + '</option>' +
                '<option value="802 HONG KONG SECURITIES CLEARING COMPANY LIMITED">' + '802 ' + Language.Get('HONG KONG SECURITIES CLEARING COMPANY LIMITED') + '</option>' +
                '<option value="868 CLS BANK INTERNATIONAL">' + '868 ' + Language.Get('CLS BANK INTERNATIONAL') + '</option>';
            AddBankcard.$top.find('#Bankname').html(tag);
        },
    };

    /* 刪除銀行卡 */
    var DeleteBankcard = {
        $top: {},
        $cancel: {},
        $delcard: {},

        Initial: function()
        {
            this.$top = $('#delbandcard');
            this.$cancel = this.$top.find('#cancel');
            this.$delcard = this.$top.find('#delcard');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$cancel.on('click', this.Hide);
            this.$delcard.on('click', this.DeleteCard);
        },
        DeleteCard: function()
        {
            var bankId = $('#withdraw-dialog').find('.bank-list li.active').attr('id');
            var param = {
                data: {
                    bankId: bankId,
                },
                done: DeleteBankcard.Done,
            };
            Public.Api.DeleteBankCard(param);
            DeleteBankcard.Hide(); 
        },
        Done: function(response)
        {
            if (typeof(response) !== 'object' && response.status !== '0')
            {
                SystemError.Do(response.msg, 'error');
                return ;
            }
            SystemError.Do(response.msg, 'success');
            Withdrawals.SetBank();   //撈取銀行卡資料

        },
        Show: function()
        {
            DeleteBankcard.$top.show();
        },
        Hide: function()
        {
            DeleteBankcard.$top.hide();
        },
    };

    /* 銀行卡管理 */
    var BankManagement = {
        $top: {},
        $Bankbtn: {},
        $FPSbtn: {},
        $ERC20btn: {},
        $TRC20btn: {},
        $BEP20btn: {},
        $BEP2btn: {},
        $listtext: {},
        $list: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name="BankManagement"]');
            this.$Bankbtn = this.$top.find('.addbank');
            this.$FPSbtn = this.$top.find('.addFPS');
            this.$ERC20btn = this.$top.find('.addERC20');
            this.$TRC20btn = this.$top.find('.addTRC20');
            // this.$BEP20btn = this.$top.find('.addBEP20');
            // this.$BEP2btn = this.$top.find('.addBEP2');
            this.$listtext = this.$top.find('.listtext');
            this.$list = this.$top.find('.list');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$list.on('click', 'div .deletebtn', DeleteBankcard.Show);
            this.$Bankbtn.on('click', function(){
                $('#add-card-dialog').css('display','block').addClass('in');
                $('#withdraw-dialog').css('display','none').removeClass('in');
                AddBankcard.setBody('bank');
            });
            this.$FPSbtn.on('click', function(){
                $('#add-card-dialog').css('display','block').addClass('in');
                $('#withdraw-dialog').css('display','none').removeClass('in');
                AddBankcard.setBody('FPS');
            });
            this.$ERC20btn.on('click', function(){
                $('#add-card-dialog').css('display','block').addClass('in');
                $('#withdraw-dialog').css('display','none').removeClass('in');
                AddBankcard.setBody('ERC20');
            });
            this.$TRC20btn.on('click', function(){
                $('#add-card-dialog').css('display','block').addClass('in');
                $('#withdraw-dialog').css('display','none').removeClass('in');
                AddBankcard.setBody('TRC20');
            });
            // this.$BEP20btn.on('click', function(){
            //     $('#add-card-dialog').css('display','block').addClass('in');
            //     $('#withdraw-dialog').css('display','none').removeClass('in');
            //     AddBankcard.setBody('BEP20');
            // });
            // this.$BEP2btn.on('click', function(){
            //     $('#add-card-dialog').css('display','block').addClass('in');
            //     $('#withdraw-dialog').css('display','none').removeClass('in');
            //     AddBankcard.setBody('BEP2');
            // });
        },
        SetBody: function()
        {
            var param = {
                data: {},
                done: BankManagement.SetTable,
            };
            Public.Api.SetUserInfo(param);
        },
        SetTable: function(response)
        {
            if (typeof(response) !== 'object' || typeof(response.msg) !== 'object' || response.status != 0)
            {
                return ;
            }
            
            var bank = response.msg.banks || {};
            var tags = '';
            var banknum = 0;
            var fpsnum = 0;
            var erc20num = 0;
            var trc20num = 0;
            var bep20num = 0;
            var bep2num = 0;

            for (var key in bank)
            {
                var row = bank[key] || {};
                var account = BankManagement.Hidenumber(row.account);
                var FPSAccount = BankManagement.Hidenumber(row.FPSAccount);
                var ERC20Account = BankManagement.Hidenumber(row.USDTAccount);
                var TRC20Account = BankManagement.Hidenumber(row.USDTAccountTRC20);
                // var BEP20Account = BankManagement.Hidenumber(row.BEP20Account);
                // var BEP2Account = BankManagement.Hidenumber(row.BEP2Account);
                console.log(row);

                tags += '<div class="bank-list-item" id="'+ row.id +'" style="width: 91%; margin: 15px; background: rgb(255, 255, 255); border: 1px solid rgb(220, 180, 84); padding: 10px;">';
                if (row.account != '')
                {
                    tags += '<div style="text-align: center; border-bottom: 1px solid #787878;">' + Language.Get('绑定银行卡') + '</div>' +
                            '<div class="username" style="height: 30px; line-height: 30px;">' + Language.Get('真实姓名') + ': ' + row.truename + '</div>' +
                            '<div class="name" style="height: 30px; line-height: 30px;">' + Language.Get('银行名称') + ': ' + row.name + '</div>' +
                            '<div class="account" style="line-height: 30px; word-wrap: break-word; word-break: break-all;">' + Language.Get('银行卡号') + ': ' + account + '</div>';
                    banknum++;
                }
                else if (row.FPSAccount != '')
                {
                    tags += '<div style="text-align: center; border-bottom: 1px solid #787878;">' + Language.Get('绑定转数快') + '</div>' +
                            '<div class="username" style="height: 30px; line-height: 30px;">' + Language.Get('真实姓名') + ': ' + row.truename + '</div>' +
                            '<div class="FPSAccount" style="line-height: 30px; word-wrap: break-word; word-break: break-all;">' + Language.Get('转数快账号') + ': ' + FPSAccount + '</div>';
                    fpsnum++;
                }
                else if (row.USDTAccount != '')
                {
                    tags += '<div style="text-align: center; border-bottom: 1px solid #787878;">' + Language.Get('绑定USDT-ERC20') + '</div>' +
                            '<div class="username" style="height: 30px; line-height: 30px;">' + Language.Get('真实姓名') + ': ' + row.truename + '</div>' +
                            '<div class="ERC20Account" style="line-height: 30px; word-wrap: break-word; word-break: break-all;">' + Language.Get('USDT账号') + ': ' + ERC20Account + '</div>';
                    erc20num++;
                }
                else if (row.TRC20Account != '')
                {
                    tags += '<div style="text-align: center; border-bottom: 1px solid #787878;">' + Language.Get('绑定USDT-TRC20') + '</div>' +
                            '<div class="username" style="height: 30px; line-height: 30px;">' + Language.Get('真实姓名') + ': ' + row.truename + '</div>' +
                            '<div class="TRC20Account" style="line-height: 30px; word-wrap: break-word; word-break: break-all;">' + Language.Get('USDT账号') + ': ' + TRC20Account + '</div>';
                    trc20num++;
                }
                // else if (row.BEP20Account != '')
                // {
                //     tags += '<div style="text-align: center; border-bottom: 1px solid #787878;">' + Language.Get('绑定BEP20') + '</div>' +
                //             '<div class="username" style="height: 30px; line-height: 30px;">' + Language.Get('真实姓名') + ': ' + row.truename + '</div>' +
                //             '<div class="BEP20Account" style="line-height: 30px; word-wrap: break-word; word-break: break-all;">' + Language.Get('BEP20账号') + ': ' + BEP20Account + '</div>';
                //     bep20num++;
                // }
                // else if (row.BEP2Account != '')
                // {
                //     tags += '<div style="text-align: center; border-bottom: 1px solid #787878;">' + Language.Get('绑定BEP2') + '</div>' +
                //             '<div class="username" style="height: 30px; line-height: 30px;">' + Language.Get('真实姓名') + ': ' + row.truename + '</div>' +
                //             '<div class="BEP2Account" style="line-height: 30px; word-wrap: break-word; word-break: break-all;">' + Language.Get('BEP2账号') + ': ' + BEP2Account + '</div>';
                //     bep2num++;
                // }
                tags += '</div>';
            }

            if (bank.length == 0)
            {
                BankManagement.$Bankbtn.css('display', 'inline-block');
                BankManagement.$FPSbtn.css('display', 'inline-block');
                BankManagement.$ERC20btn.css('display', 'inline-block');
                BankManagement.$TRC20btn.css('display', 'inline-block');
                // BankManagement.$BEP20btn.css('display', 'inline-block');
                // BankManagement.$BEP2btn.css('display', 'inline-block');
                BankManagement.$listtext.css('display', 'none');
                BankManagement.$list.css('display', 'none');
            }
            else if (bank.length >= 1)
            {
                BankManagement.$list.css('display', 'inline-block');
                BankManagement.$listtext.css('display', 'inline-block');
            }

            var bankdisplay = (banknum == 0) ? 'inline-block' : 'none';
            var fpsdisplay = (fpsnum == 0) ? 'inline-block' : 'none';
            var erc20display = (erc20num == 0) ? 'inline-block' : 'none';
            var trc20display = (trc20num == 0) ? 'inline-block' : 'none';
            // var bep20display = (bep20num == 0) ? 'inline-block' : 'none';
            // var bep2display = (bep2num == 0) ? 'inline-block' : 'none';
            BankManagement.$Bankbtn.css('display', bankdisplay);
            BankManagement.$FPSbtn.css('display', fpsdisplay);
            BankManagement.$ERC20btn.css('display', erc20display);
            BankManagement.$TRC20btn.css('display', trc20display);
            // BankManagement.$BEP20btn.css('display', bep20display);
            // BankManagement.$BEP2btn.css('display', bep2display);
            
            BankManagement.$list.html(tags);
        },
        /*隱藏碼*/
        Hidenumber: function(account)
        {
            var number_count = account.length;
            var str = '';
            for (i = 0; i < number_count-1; i++)
            {
                str += '*';
            }
            var number = account.replace(account.substring(2, number_count-2), str);

            return number;
        },
    };

    /* 電子遊戲 */
    var Electronicgames = {
        $top: {},
        $electroniclist: {},
        $gamelist: {},

        Initial: function()
        {
            this.$top = $('.electronicgames');
            this.$gamelist = $('.electroniclist');
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$top.on('click', this.GameHall);
            Electronicgames.$gamelist.on('click', '.gamelist-item', Game.Main);
        },
        GameHall: function()
        {
            $('.pages-loading-box').addClass('ani').css('display', 'none');
            var hall = $(this).attr('data-page-name');
            Electronicgames.$electroniclist = $('.electroniclist[data-page-name=' + hall + ']');

            var groupid = [];
            var list = [];
            $gamehall_row = Public.GetGameHallByHall(hall);
            $gamegroup_row = Public.GameGroup;
            $gamelist_row = Public.GameList;
            $i = 0;
            for (var $key in $gamegroup_row)
            {
                $row = $gamegroup_row[$key];
                if ($row.gamehallid == $gamehall_row.id)
                {
                    groupid[$i] = $row.id;
                    $i++;
                }
            }
            $j = 0;
            for (var $i in groupid)
            {
                for (var $key in $gamelist_row)
                {
                    $row = $gamelist_row[$key];
                    if ($row.mobilestatus == 1 && $row.groupid == groupid[$i])
                    {
                        list[$j] = $row;
                        $j++;
                    }
                }
            }
            Electronicgames.Setbody(hall, list);
        },
        Setbody: function(hall, list)
        {
            var extension = (hall == 'MG' || hall == 'PLAYNGO' || hall == 'BBIN' || hall == 'DRAGOONSOFT' || hall == 'JOKER' || hall == 'LIXINCHESS' || hall == 'FUNKY' || hall == 'RSG' || hall == 'VA' || hall == 'OBSLOT' || hall == 'JILI' || hall == 'AE' || hall == 'RICHSLOT' || hall == 'SEASLOT') ? '.png' : '.jpg';
            var tag = '';
            var image = hall;
            if(hall == 'KA' || hall == 'KASINGLE'){var image = 'KA'}
            if(hall == 'SASLOT'){var image = 'SA'}
            if(hall == 'OBSLOT'){var image = 'OB'}
            for ($key in list)
            {
                row = list[$key];
                var language = Public.GetLocalStorage('lang');
                var gamename = (language === 'cn' || language === 'tw') ? row.gamename : (language === 'th') ? row.gameThName : row.gameEnglishName;
                var gametype = row.gamecode;
                var imgSize = 'background-repeat: no-repeat; background-position: center; background-size: 100% 100%;';
                if(hall == 'MG')
                {
                    var gametype2 = row.gamecode;
                    var imgSize = '';
                }
                else if(hall == 'JDB')
                {
                    var gametype2 = '100' + row.gamecode;
                }
                else if(hall == 'PLAYNGO')
                {
                    var gametype2 = 'webclipicon_' + row.gamecode;
                }
                else if(hall == 'EC')
                {
                    var gametype2 = row.gameid + '_icon1_0';
                }
                else
                {
                    var gametype2 = row.gamecode;
                }
                var homeJumpUrl = window.Config.EXTERNALURL;
                var imageStyle = 'background-image: url(' + homeJumpUrl + '/images/game/' + image + '/' + gametype2 + extension + ');' + imgSize;

                if(hall == 'EC')
                {
                    tag += "<a groupid='" + row.groupid + "' hall='" + hall + "' gametype='" + row.gameid + "' class='gamelist-item'>" +
                                "<div class='gamelist'>" +
                                    "<div class='game-image " + hall + "' style='" + imageStyle + "'></div>" +
                                    "<span>"+ gamename +"</span>" +
                                "</div>" +
                            "</a>";
                }
                else
                {
                    tag += "<a groupid='" + row.groupid + "' hall='" + hall + "' gametype='" + gametype + "' gameid='" + row.gameid + "' class='gamelist-item'>" +
                                "<div class='gamelist'>" +
                                    "<div class='game-image " + hall + "' style='" + imageStyle + "'></div>" +
                                    "<span>"+ gamename +"</span>" +
                                "</div>" +
                            "</a>";
                }
            }
            Electronicgames.$electroniclist.find('.wallet-center-list').html(tag);
        },
    };

    /* 註冊 */
    var Registion = {
        $top: {},
        $username: {},
        $password: {},
        $password2: {},
        $paypwd: {},
        $paypwd2: {},
        $email: {},
        $phone: {},
        $country1: {},
        $pid: {},
        $qq: {},
        $agreeTerms: {},
        $submitbtn: {},
        $close: {},
        $verifiCode: {},
        $captcha_img: {},
        $urlpid: '',
        $phoneCode: {},
        $recaptchaResponse: {},

        Initial: function()
        {
            this.$top = $('#registion-dialog');
            this.$username = this.$top.find('input[name="username"]');
            this.$password = this.$top.find('input[name="password"]');
            this.$password2 = this.$top.find('input[name="password2"]');
            this.$paypwd = this.$top.find('input[name="paypwd"]');
            this.$paypwd2 = this.$top.find('input[name="paypwd2"]');
            this.$truename = this.$top.find('input[name="truename"]');
            this.$email = this.$top.find('input[name="email"]');
            this.$phone = this.$top.find('input[name="phone"]');
            this.$country1 = this.$top.find('select[name=countryCode]');
            this.$pid = this.$top.find('input[name="pid"]');
            this.$qq = this.$top.find('input[name="qq"]');
            this.$line = this.$top.find('input[name="line"]');
            this.$wechat = this.$top.find('input[name="wechat"]');
            this.$submitbtn = this.$top.find('.btn-acc-bind');
            this.$close = this.$top.find('.registion-close');
            this.$captcha_img = this.$top.find('#captcha_img');
            this.$btn_gologin = this.$top.find('#btn-gologin');
            this.$phoneCode = this.$top.find('input[name="phoneCode"]');

            this.BindEvents();
            /*產生驗證碼*/
            this.VerifiCode();

            // Registion.$submitbtn.on('click', Registion.Do);
        },
        BindEvents: function()
        {
            Registion.$close.on('click', function(){
                Registion.$top.css('display','none');
            });
            /*點擊圖片換驗證碼*/
            this.$captcha_img.on('click', Login.VerifiCode);

            this.$btn_gologin.on('click', function(){
                Login.$top.css('display','block');
                Registion.$top.css('display','none');
            });

            this.$recaptchaResponse = this.$top.find('input[name="recaptcha_response"]');

            var siteKeyStatus = window.Public.GetHostGoogleStatus(location.hostname);
            if(siteKeyStatus != 'true')
            {
                Registion.$submitbtn.on('click', Registion.Do);
                // 發送簡訊驗證碼
                $('.phoneCodeBtn').on('click', function(){
                    $(this).hide();
                    var phone = Registion.$phone.val();
                    var type = 'hk';
                    var param = {
                        data: {phoneNumber: phone, type: type},
                        done: function(response)
                        {
                            alert(response.msg);
                            $('.phoneCodeBtn').show();
                        }
                    };
                    Public.Api.sendPhoneCheck(param);
                });
            }
            else
            {
                Registion.$submitbtn.on('click', function(){
                    var siteArr = window.Public.GetHostGoogleKey(location.hostname);
                    grecaptcha.execute(siteArr['siteKey'], {action: 'homepage'}).then(function(token) {
                        $('#recaptchaResponse').val(token);
                        Registion.Do();
                    });
                });   
                $('.phoneCodeBtn').on('click', function(){
                    var siteArr = window.Public.GetHostGoogleKey(location.hostname);
                    grecaptcha.execute(siteArr['siteKey'], {action: 'homepage'}).then(function(token) {
                        $('#recaptchaResponse').val(token);
                        $(this).hide();
                        var phone = Registion.$phone.val();
                        var type = 'hk';
                        var param = {
                            data: {
                                phoneNumber: phone, 
                                type: type,
                                recaptchaResponse: token,
                            },
                            done: function(response)
                            {
                                alert(response.msg);
                                $('.phoneCodeBtn').show();
                            }
                        };
                        Public.Api.sendPhoneCheck(param);
                    });
                });
            }
        },
        setView: function(){
            Registion.$top.css('display','block');
            Public.Api.setView({done: Registion.RegisterView});
        },
        /*產生驗證碼*/
        VerifiCode: function()
        {
            //隨機驗證碼號碼
            Registion.$verifiCode = Math.random().toString().slice(5,9);
            //產生驗證碼圖片
            Registion.$captcha_img.attr('src', window.Public.GetConfig('APIURL') + '?109&cmd=109&verifiCode=' + Registion.$verifiCode);
        },
        RegisterView: function(response)
        {
            if (response.status != 0) return;
            var data = response.msg.data;
            for (key in data)
            {
                var row = data[key];
                if (row.display == 1)
                {
                    Registion.$top.find('.' + row.name).css('display', 'inline-flex');
                }
                if (row.need == 1)
                {
                    Registion.$top.find('input[name="' + row.name + '"]').attr('required', 'required');
                }
            }
            Public.Api.setPid({done: Registion.setPid});
        },
        setPid: function(response){
            if(response.status == '0')
            {
                Registion.$urlpid = typeof(response.msg) === 'object' ? response.msg.pid : false;
                // Registion.$urlpid && Registion.$top.find('input[name="pid"]').val(Registion.$urlpid);
                // Registion.$urlpid && Registion.$top.find('input[name="pid"]').attr('readonly', true);
                // Registion.$top.find('input[name="pid"]').val(Registion.$urlpid).attr('readonly', true);   
                // return;
            }
            
            Registion.SetSpreadMember();
        },
        SetSpreadMember: function() 
        {
            var pid = Public.GetUrlData('pid') ? Public.GetUrlData('pid') : (Registion.$urlpid ? Registion.$urlpid : '');
            var spread = (Public.GetUrlData('trim') || '').replace('-', ',');

            if(pid == '' && spread == '')
            {
                return;
            }

            Registion.$top.find('input[name="pid"]').val(pid || spread).attr('readonly', true);

            if(Public.GetUrlData('pid') || Public.GetUrlData('trim'))
            {
                Registion.$top.addClass('in');
                Registion.$top.show();
            }
        },
        Do: function()
        {
            var siteKeyStatus = Public.GetHostGoogleStatus(location.hostname);

            var param = {
                data: {
                    pid: Registion.$pid.val(),
                    username: Registion.$username.val(),
                    password: Registion.$password.val(),
                    password2: Registion.$password2.val(),
                    paypwd: Registion.$paypwd.val(),
                    paypwd2: Registion.$paypwd2.val(),
                    truename: Registion.$truename.val(),
                    email: Registion.$email.val(),
                    phone: Registion.$top.find('select[name="countryCode"] :selected').text() + Registion.$phone.val(),
                    country1: Registion.$country1.val(),
                    qq: Registion.$qq.val(),
                    line: Registion.$line.val(),
                    wechat: Registion.$wechat.val(),
                    agreeTerms: true,
                    phoneCode: Registion.$phoneCode.val(),
                },
                done: Registion.Done,
            };

            param['data']['recaptchaResponse'] = siteKeyStatus == 'true' ? Registion.$recaptchaResponse.val() : 'false';

            var spread = (Public.GetUrlData('trim') || '').replace('-', ',');
            var pid = (Public.GetUrlData('pid') || '');
            if(spread)
            {
                Public.Api.NewRegistion(param);
            } else {
                Public.Api.Registion(param);
            }
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === '0')
            {
                SystemError.Do(msg, 'success');
                var param = {
                    data: {
                        username: Registion.$username.val(),
                        password: Registion.$password.val(),
                    },
                    done: function(){
                        // location.reload();
                    }
                };
                Public.Api.Login(param);
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        SetPlaceholder: function()
        {
            Registion.$top.find('#registpid').attr('placeholder',Language.Get('请输入介绍人'));
            Registion.$top.find('#registusername').attr('placeholder',Language.Get('请输入帐号'));
            Registion.$top.find('#registpassword').attr('placeholder',Language.Get('请输入登录密码'));
            Registion.$top.find('#registpassword2').attr('placeholder',Language.Get('请再次输入登录密码'));
            Registion.$top.find('#registtruename').attr('placeholder',Language.Get('请输入真实姓名'));
            Registion.$top.find('#registemail').attr('placeholder',Language.Get('请输入邮箱'));
            Registion.$top.find('#registphone').attr('placeholder',Language.Get('请输入手机'));
            Registion.$top.find('#registpaypwd').attr('placeholder',Language.Get('请输入取款密码'));
            Registion.$top.find('#registpaypwd2').attr('placeholder',Language.Get('请再次输入取款密码'));
            Registion.$top.find('#registqq').attr('placeholder',Language.Get('请输入QQ'));
            Registion.$top.find('#registline').attr('placeholder',Language.Get('请输入LINE'));
            Registion.$top.find('#registwechat').attr('placeholder',Language.Get('请输入WECHAT'));
            Registion.$top.find('#captcha').attr('placeholder',Language.Get('验证码'));
            Registion.$top.find('#registPhoneCode').attr('placeholder',Language.Get('手机验证码'));
        }
    };

    /* 點數公告 */
    var PointList = {
        $top: {},
        $type: {},
        $money: {},
        $line: {},
        $phone: {},
        $hnote: {},
        $updatebtn: {},
        $close: {},

        Initial: function()
        {
            this.$top = $('#pointlist-dialog');
            this.$money = this.$top.find('input[name="money"]');
            this.$bankname = this.$top.find('select[name="bankname"]');
            this.$bankaccount = this.$top.find('input[name="bankaccount"]');
            this.$line = this.$top.find('input[name="line"]');
            this.$phone = this.$top.find('input[name="phone"]');
            this.$hnote = this.$top.find('#hnote');
            this.$updatebtn = this.$top.find('.btn-acc-bind');
            this.$close = this.$top.find('.btn-close');
            
            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$updatebtn.on('click', this.Do);
        },
        Do: function()
        {
            if((PointList.$line.val().indexOf(" ") >= 0 || PointList.$line.val() == null)){
                alert(Language.Get('LINE ID不能為空格或null值'));
                return false;
            }
            var param = {
                data: {
                    type: PointList.$top.find('input[name="type"]:checked').val(),
                    money: PointList.$money.val(),
                    bankname: PointList.$bankname.val(),
                    bankaccount: PointList.$bankaccount.val(),
                    line: PointList.$line.val(),
                    phone: PointList.$phone.val(),
                    hnote: PointList.$hnote.val(),
                },
                done: PointList.Done,
            };
            Public.Api.pointdataAdd(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === '0')
            {
                PointList.Clear();
                SystemError.Do(msg, 'success');
                PointList.$close.click();
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        Clear: function()
        {
            PointList.$money.val('');
            PointList.$bankname.val('');
            PointList.$bankaccount.val('');
            PointList.$line.val('');
            PointList.$phone.val('');
            PointList.$hnote.val('');
        },
        Setoption: function(){
            var tag = '';
            tag += '<option value="">' + Language.Get('请选择') + '</option>'+
                    '<option value="中央銀行">' + Language.Get('中央銀行') + '</option>'+
                    '<option value="中華郵政">' + Language.Get('中華郵政') + '</option>'+
                    '<option value="中國輸出入銀行">' + Language.Get('中國輸出入銀行') + '</option>'+
                    '<option value="全國農業金庫">' + Language.Get('全國農業金庫') + '</option>'+
                    '<option value="臺灣銀行">' + Language.Get('臺灣銀行') + '</option>'+
                    '<option value="臺灣土地銀行">' + Language.Get('臺灣土地銀行') + '</option>'+
                    '<option value="合作金庫商業銀行">' + Language.Get('合作金庫商業銀行') + '</option>'+
                    '<option value="第一商業銀行">' + Language.Get('第一商業銀行') + '</option>'+
                    '<option value="華南商業銀行">' + Language.Get('華南商業銀行') + '</option>'+
                    '<option value="彰化商業銀行">' + Language.Get('彰化商業銀行') + '</option>'+
                    '<option value="上海商業儲蓄銀行">' + Language.Get('上海商業儲蓄銀行') + '</option>'+
                    '<option value="台北富邦商業銀行">' + Language.Get('台北富邦商業銀行') + '</option>'+
                    '<option value="國泰世華商業銀行">' + Language.Get('國泰世華商業銀行') + '</option>'+
                    '<option value="兆豐國際商業銀行">' + Language.Get('兆豐國際商業銀行') + '</option>'+
                    '<option value="花旗商業銀行">' + Language.Get('花旗商業銀行') + '</option>'+
                    '<option value="王道商業銀行">' + Language.Get('王道商業銀行') + '</option>'+
                    '<option value="臺灣中小企業銀行">' + Language.Get('臺灣中小企業銀行') + '</option>'+
                    '<option value="渣打國際商業銀行">' + Language.Get('渣打國際商業銀行') + '</option>'+
                    '<option value="台中商業銀行">' + Language.Get('台中商業銀行') + '</option>'+
                    '<option value="京城商業銀行">' + Language.Get('京城商業銀行') + '</option>'+
                    '<option value="滙豐商業銀行">' + Language.Get('滙豐商業銀行') + '</option>'+
                    '<option value="瑞興商業銀行">' + Language.Get('瑞興商業銀行') + '</option>'+
                    '<option value="華泰商業銀行">' + Language.Get('華泰商業銀行') + '</option>'+
                    '<option value="臺灣新光商業銀行">' + Language.Get('臺灣新光商業銀行') + '</option>'+
                    '<option value="陽信商業銀行">' + Language.Get('陽信商業銀行') + '</option>'+
                    '<option value="板信商業銀行">' + Language.Get('板信商業銀行') + '</option>'+
                    '<option value="三信商業銀行">' + Language.Get('三信商業銀行') + '</option>'+
                    '<option value="聯邦商業銀行">' + Language.Get('聯邦商業銀行') + '</option>'+
                    '<option value="遠東國際商業銀行">' + Language.Get('遠東國際商業銀行') + '</option>'+
                    '<option value="元大商業銀行">' + Language.Get('元大商業銀行') + '</option>'+
                    '<option value="永豐商業銀行">' + Language.Get('永豐商業銀行') + '</option>'+
                    '<option value="玉山商業銀行">' + Language.Get('玉山商業銀行') + '</option>'+
                    '<option value="凱基商業銀行">' + Language.Get('凱基商業銀行') + '</option>'+
                    '<option value="星展商業銀行">' + Language.Get('星展商業銀行') + '</option>'+
                    '<option value="台新國際商業銀行">' + Language.Get('台新國際商業銀行') + '</option>'+
                    '<option value="日盛國際商業銀行">' + Language.Get('日盛國際商業銀行') + '</option>'+
                    '<option value="安泰商業銀行">' + Language.Get('安泰商業銀行') + '</option>'+
                    '<option value="中國信託商業銀行">' + Language.Get('中國信託商業銀行') + '</option>'+
                    '<option value="other">' + Language.Get('其他銀行') + '</option>';

            PointList.$bankname.html(tag);
        },
        SetPlaceholder: function()
        {
            PointList.$top.find('#pointlistamount').attr('placeholder',Language.Get('请输入买卖数量'));
            PointList.$top.find('#pointlistbankaccount').attr('placeholder',Language.Get('请输入银行帐户'));
            PointList.$top.find('#pointlistline').attr('placeholder',Language.Get('请输入LINE ID'));
            PointList.$top.find('#pointlistphone').attr('placeholder',Language.Get('请输入电话号码'));
            PointList.$top.find('#hnote').attr('placeholder',Language.Get('备注'));
        }
    };

    /* 點數轉移 */
    var PointTransfer = {
        $top: {},
        $username2: {},
        $money: {},
        $needBet: {},
        $nowBet: {},
        $updatebtn: {},
        $close: {},

        Initial: function()
        {
            this.$top = $('#pointtransfer-dialog');
            this.$username2 = this.$top.find('input[name="username2"]');
            this.$money = this.$top.find('input[name="money"]');
            this.$needBet = this.$top.find('input[name="needBet"]');
            this.$nowBet = this.$top.find('input[name="nowBet"]');
            this.$updatebtn = this.$top.find('.btn-acc-bind');
            this.$close = this.$top.find('.btn-close');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$updatebtn.on('click', function(){
                if (!confirm(Language.Get('是否确认转移')))
                {
                    return;
                }
                PointTransfer.Do();
            });

            $('a[data-pop="pointtransfer-dialog"]').on('click', function(){
                var param = {done: PointTransfer.SetPointView};
                Public.Api.checkActivityOrders(param);
            });
        },
        SetPointView: function(response)
        {
            var msg = {};
            if (typeof(response) === 'object')
            {
                msg = (('msg' in response) && response.msg) || {};
            }
            var needBet = msg.needBet || '0';
            var nowBet = msg.nowBet || '0';
            PointTransfer.$needBet.val(needBet);
            PointTransfer.$nowBet.val(nowBet);
        },
        Do: function()
        {
            var param = {
                data: {
                    username2: PointTransfer.$username2.val(),
                    money: PointTransfer.$money.val(),
                    needBet: PointTransfer.$needBet.val(),
                    nowBet: PointTransfer.$nowBet.val(),
                },
                done: PointTransfer.Done,
            };
            Public.Api.pointTransfer(param);
        },
        Done: function(response)
        {
            var status = -99;
            var msg = 'System error';

            if (typeof(response) === 'object')
            {
                status = ('status' in response) ? response.status : status;
                msg = (('msg' in response) && response.msg) || msg;
            }

            if (status === 0)
            {
                PointTransfer.Clear();
                SystemError.Do(msg, 'success');
                PointTransfer.$close.click();
            }
            else
            {
                SystemError.Do(msg, 'error');
            }
        },
        Clear: function()
        {
            PointTransfer.$username2.val('');
            PointTransfer.$money.val('');
        },
        SetPlaceholder: function()
        {
            PointTransfer.$top.find('#pointtransferothersideaccount').attr('placeholder',Language.Get('请输入对方的帐号'));
            PointTransfer.$top.find('#pointtransferquantity').attr('placeholder',Language.Get('请输入转移数量'));
        }
    };

    /* api測速 */
    var SpeedMeasuring = {
        $top: {},
        $str: {},
        $model: {},
        $refresh: {},
        $speed: {},
        $close: {},

        Initial: function()
        {
            // this.$top = $('.speed-measuring');
            this.$top = $('.apiSpeed');
            this.$model = $('#speed-dialog');
            this.$refresh = this.$model.find('.btn-acc-bind');
            this.$close = this.$model.find('.btn-close');
            // this.Do();
            this.GetApiList();
            this.BindEvents();
        },
        BindEvents: function()
        {
            SpeedMeasuring.$top.on('click', this.getData);
            SpeedMeasuring.$refresh.on('click', this.Refresh);
            SpeedMeasuring.$model.on('click', '.btn-status', function(){
                var $this = $(this);
                var id = $this.attr('id');
                SpeedMeasuring.ChangeApi(id);
                SpeedMeasuring.$close.click();
            });
            // setInterval(function(){SpeedMeasuring.Do();}, 30000);
        },
        Do: function()
        {
            Public.Ajax().always(function(response, statusText){
                SpeedMeasuring.$str = (statusText === 'success' ? ((new Date().getTime() - this.startTime) / 1000).toFixed(2) : '- ') + 's';
                color = (SpeedMeasuring.$str >= '5') ? '#ff0000' : '#56ff00';
                SpeedMeasuring.$top.css('color', color);
                SpeedMeasuring.$top.html(SpeedMeasuring.$str);
            })
        },
        GetApiList: function()
        {
            SpeedMeasuring.$speed = window.Public.Speed;
            var tag = '';
            for(var key in SpeedMeasuring.$speed)
            {
                var row = SpeedMeasuring.$speed[key];
                tag +=  '<li class="speedapi-list-item" id="apispeed' + key + '">' +
                            '<a id="title' + key + '">' + row.title_cn + '</a>' +
                            '<a> - </a>' +
                            '<a id="time' + key + '" class="speedtime">...</a>' +
                            '<span id="apistatus_' + key + '" class="btn-status">' + Language.Get('选择') + '</span>' +
                        '</li>';
            }
            SpeedMeasuring.$model.find('.speedapi-list').html(tag);
        },
        getData: function()
        {
            $('.speedtime').html('...');
            SpeedMeasuring.$speed = window.Public.Speed;
            for(var key in SpeedMeasuring.$speed)
            {
                var row = SpeedMeasuring.$speed[key];
                var time = row.time ? row.time + 's' : '╳';
                var active = ((row.api + '/boxApi.php') == window.Public.GetConfig('APIURL') && row.time != false) ? 'active' : '';
                //判斷時間獲取顏色
                var color = (row.time <= 5 && row.time != false) 
                    ? 'currently' : (row.time > 5 && row.time != false) 
                    ? 'spare' : 'debacle';
                //把抓到的值丟進頁面上
                $('#time' + key).html(time);
                $('#apispeed' + key).addClass(active);
                $('#title' + key).removeClass().addClass(color);
            }
        },
        Refresh: function()
        {
            $('.speedtime').html('...');
            var oldurl = window.Public.GetConfig('APIURL');
            SpeedMeasuring.$speed = window.Public.Speed;

            for (var key in SpeedMeasuring.$speed)
            {
                window.Public.Ajax('',{'url': SpeedMeasuring.$speed[key]['api'] + '/boxApi.php'}).always(function(response, statusText){
                    var time = (statusText === 'success' ? ((new Date().getTime() - this.startTime) / 1000).toFixed(2) : false);
                    var result = (oldurl.match(this.url) != null) ? true : false;

                    for (var key2 in SpeedMeasuring.$speed)
                    {
                        if (this.url == (SpeedMeasuring.$speed[key2]['api'] + '/boxApi.php'))
                        {
                            SpeedMeasuring.$speed[key2]['time'] = time;
                            var speedtime = time ? time + 's' : '╳';
                            //判斷時間獲取顏色
                            var color = (time <= 5 && time != false) 
                                ? 'currently' : (time > 5 && time != false) 
                                ? 'spare' : 'debacle';
                            $('#time' + key2).html(speedtime);
                            $('#title' + key2).removeClass().addClass(color);
                        }
                    }
                })
            }
        },
        ChangeApi: function(data)
        {
            var oldurl = window.Public.GetConfig('APIURL');
            var id = data.split('_')[1];
            if (SpeedMeasuring.$speed[id]['time'] != false)
            {
                window.Public.ChangeApi(SpeedMeasuring.$speed[id]);
                $('#apispeed' + id).addClass('active').siblings().removeClass('active');
            }
        },
    };

    // 加入我們
    var JoinUs = {
        $top: {},
        $cancel: {},
        $delcard: {},

        Initial: function()
        {
            this.$top = $('div[data-page-name=join]');
            // this.$cancel = this.$top.find('#cancel');
            // this.$delcard = this.$top.find('#delcard');

            this.BindEvents();
        },
        BindEvents: function()
        {
            this.$top.find('.copy').on('click', this.Copy);
        },
        Copy: function(){
            // 先取得 複製按鈕 的屬性 取得account
            var $this = $(this);
            var account = $this.attr('data-clipboard-text');

            //自動選取某個區域的文字
            var TextRange = document.createRange();
            TextRange.selectNode(document.getElementById(account));
            // 選擇的文本範圍
            sel = window.getSelection();
            // 選擇中刪除所有範圍
            sel.removeAllRanges();
            // 選擇中新增範圍
            sel.addRange(TextRange);
            // 複製
            if(document.execCommand("Copy"))
            {
                document.execCommand("Copy");
                alert(Language.Get('复制成功'));
            }
        },
    };

    /* 直播 */
    var Live = {
        $top: {},
        $livelist: {},
        $allLiveList:{},

        Initial: function()
        {
            this.$top = $('.container');
            // this.$livelist = $('.pagelist');
            // this.$openBtn = $('.game-btn');
            this.$comingsoon = $('.comingsoon');

            this.BindEvents();
            // this.GetViewData();
        },
        BindEvents: function()
        {
            
        },
        GetViewData: function()
        {
            var param = {
                done: Live.SetView,
                data: {
                    gamehall: 'LIVE',
                },
            };
            Public.Api.GetLiveList(param);
        },
        SetView: function(response)
        {
            var followlistData = typeof(response.msg.follow_list) === 'object' ? response.msg.follow_list : {};
            var liveListData = typeof(response.msg.anchor_list) === 'object' ? response.msg.anchor_list : {};
            var tag = '';

            if(typeof(liveListData.length) != 'undefined')
            {  
                for(var key in liveListData)
                {
                    var value = liveListData[key];
                    var nextKey = Number(key) + 1;
                    if(key == 0)
                    {
                        $('.gameImage-liveBroadcast').attr('liveListUrl',value['url']);
                    }
                    else
                    {
                        $('.gameImage-liveBroadcast' + nextKey).attr('liveListUrl',value['url']);
                    }
                }
            }

            // Live.$openBtn.on('click', Game.Main);
            $('.comingsoon').on('click', function(){
                alert(Language.Get('即将开放'));
            });

            var followListTag =  '';
            if(followlistData && followlistData.length != '0')
            {
                for (var key2 in followlistData)
                {
                    var row2 = followlistData[key2];
                    followListTag += '<div class="livebox">'+
                                        '<div class="livephoto" style="background-image: url('+ row2.avatar +')">'+
                                            '<span class="livelistname">'+ row2.nickname +'</span>'+
                                        '</div>'+
                                    '</div>';
                }
            }
            $('#followLiveListData').html(followListTag);
        },
    };

    var AboutUs = {
        $top: {},
        $css: {},

        Initial: function()
        {
            this.BindEvents();
            this.Contents();
        },
        BindEvents: function()
        {
            
        },
        Contents: function()
        {
            tag = '<div style="margin-bottom: 5%;">' + Language.Get('WM完美娱乐城所提供的所有产品和服务由菲律宾政府卡格扬经济特区First Cagayan leisure and Resort Corporation 所授权和监管，为全球博彩爱好者提供最优惠的赔率和最优质的服务，并正发展成为最受欢迎的线上娱乐公司。我们的经营理念是通过向我们的顾客提供最佳的博彩娱乐体验和最优质的服务来发展我们的业务') + '</div>'+
                    '<div style="margin-bottom: 5%;">' + Language.Get('“WM完美娱乐城”总部位于菲律宾，是获得菲律宾政府认证的合法互联网体育博彩公司，以雄厚实力建构出强大的网络在线博彩投注平台，提供安全稳定的投注系统是本公司对每位会员的承诺，让会员能随心所欲进行投注，随时随地都能够享受线上博彩的乐趣.我们的彩金支付机制的安全快速更是业界之冠，所有会员的彩金都能在1-10分钟内到账，歇力履行对广大会员的承诺永远被我们视为是成功的最重要关键，亦因此“WM完美娱乐城”能在全球网络在线体育投注平台中赢得诚信可靠的美誉') + '</div>'+
                    '<div style="margin-bottom: 5%;">' + Language.Get('汇集了全球的博彩业界精英，“WM完美娱乐城”致力打造符合大众博彩市场需求，并值得所有会员信赖的互联网投注平台，由业界精英组成的金牌专业团队，凭借对博彩市场的丰富经验，分别针对博彩信息及博彩市场策略等各方面，不断对有效管理博彩运营进行深入透彻的研究，并进一步将研究结果实践在产品完善化上，务求让一直给予支持的会员们获得最好的网络在线投注体验.网罗世界各地各种体育比赛项目并提供多样化玩法选择，达至为每位会员量身订造，能够满足会员们对体育赛事,真人视讯,电子游艺,各类彩票等玩法的需求') + '</div>'+
                    '<div style="margin-bottom: 5%;">' + Language.Get('“WM完美娱乐城”不断投放大量预算在确保投注系统的安全稳定与技术创新上，我们的投注系统全方位采用128bit高安全标准的数据加密（Encryption）技术，此种SSL(Secure Socket Layer)技术可确保会员的资料及投注数据在透过网络传输的过程中不被截取，因此会员的隐私都能得到严格保密，所有投注信息准多次加密存储，我们对每一项交易都会采取严格的保密和防盗防诈措施，保证会员账户的真实合法性并同时保证会员在充值及提现过程中的安全性，配合专业技术团队全天候24小时严格监控与对系统的不间断技术更新，以高安全规格的系统提供会员最安心便捷的交易体验') + '</div>'+
                    '<div style="margin-bottom: 5%;">' + Language.Get('“WM完美娱乐城”一直以提供高品质高效率的会员服务为傲，根据对市场及会员的分析而拟定之严谨客服人员培训规范，创造出具有专业认真，热情服务特点的专业客服团队，透过掌握丰富专业知识的客服人员友善热情的态度，会员们每次必能享受到完善周到的服务，无论是开户、充值、取款或有关博彩投注的问题咨询，热情专业的客服团队都能给予会员们难忘的服务体验. 24小时在线的专业热情客服团队让会员能够随心所欲进行投注，全天候24小时随时恭候办理开户、充值及取款等各种博彩投注业务.会员们可透过各种方包括网页“在线客服”、免费客服热线、客服QQ与我们热情专业的客服人员联系，无论是办理投注业务或是向我们提出宝贵意见，我们都是非常欢迎') + '</div>'+
                    '<div style="margin-bottom: 5%;">' + Language.Get('我们提供各种安全简便的存款及提款选择给我们的会员。我们一直坚持“了解我们的会员（KYC）”和 反洗钱(AML)的原则， 并与第三方的财务管理当局合作以确保最大范围的遵从相关的法律法规。希望所有的会员能够在一个安全愉快的环境下享受我们精心设计的产品和服务并能够从中获利。我们提供最迅捷最安全的提款手续，会员365天×24小时均可申请提款，1分钟至3分钟内到帐') + '</div>'+
                    '<div style="margin-bottom: 9%;">' + Language.Get('诚挚欢迎您光临“ WM完美娱乐城”，每一位会员在体验过我们的服务后必能充分感受到我们的专业与热情，“ WM完美娱乐城”希望每一位玩家都能尽情享受线上博彩所带来的无限乐趣') + '</div>';
            $('.aboutContent').html(tag);
        },
    };

    /* 切換語系 */
    var LanguageSelect = {
        $top: {},
        $css: {},

        Initial: function()
        {
            this.$top = $('.language-select');
            this.$btn = $('.btn-language');
            this.$css = $('#languageCss');
            this.BindEvents();
            this.Set(Public.GetLocalStorage('lang'));
        },
        BindEvents: function()
        {
            this.$top.find('span').on('click', this.Change);
            this.$btn.on('click', function(){
                LanguageSelect.$top.hasClass('active')
                    ? LanguageSelect.Hide()
                    : LanguageSelect.Show();
            });
        },
        Show: function()
        {
            LanguageSelect.$top.addClass('active');
        },
        Hide: function()
        {
            LanguageSelect.$top.removeClass('active');
        },
        Change: function()
        {
            var $this = $(this);
            var lang = $this.prop('class').replace('lang-', '');
            // Public.SetLocalStorage({lang: lang});
            LanguageSelect.Hide();
            // LanguageSelect.Set(lang);
            // location.reload();
        },
        Set: function(lang)
        {
            $('html').attr('language', lang);
            this.$css.prop('href',  "css/Language_" + lang + ".css?" + this.$css.attr('cacheTime'));
            
            Login.SetPlaceholder();
            GameReport.SetPlaceholder();
            TransferReport.SetPlaceholder();
            Withdrawals.SetPlaceholder();
            Recharge.SetPlaceholder();
            Layermember_Report.SetPlaceholder();
            // UserSet.SetPlaceholder();
            ChangeWithdrawPwd.SetPlaceholder();
            ChangeLoginPwd.SetPlaceholder();
            AddBankcard.SetPlaceholder();
            Registion.SetPlaceholder();
            GameReport.Setoption();
            // Layermember_Report.Setoption();
            PointList.SetPlaceholder();
            // PointList.Setoption();
            PointTransfer.SetPlaceholder();
            // Home.GetmarqueeDone();
            BankDeposit.SetPlaceholder();
            Public.Api.GetSystemNews({done: Home.GetmarqueeDone});
        },
    };

    /* 確認APP版本 */
    var ChackAppVersion = {

        Initial: function()
        {
            this.BindEvents();
        },
        BindEvents: function()
        {
            var andisapp = Public.GetConfig('ISAPP');
            if(andisapp == true)
            {
                Public.Api.GetAppVersion({done: ChackAppVersion.Done});
            }
        },
        Done: function(response)
        {
            var DbAppVersion = response.msg.value;
            var ConfigAppVersion = Public.GetConfig('VERSION');
            // 當DB的版本號與config.js的版本號不相符，跳轉下載頁並關閉app
            if(DbAppVersion != ConfigAppVersion)
            {
                alert(Language.Get('请更新我们的APP至最新版本'));
                Public.ParentGoTo(
                    Public.GetConfig('APPDOWNLOAD')
                );
                // 在html有載入cordova.js，這邊使用cordova語法關閉app
                navigator.app.exitApp();
                return false;
            }
        },
    };

    App.Initial();
})(jQuery);