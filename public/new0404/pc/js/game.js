(function(){
    var $gameForm = null;
    var app = {
        initial: function(){
            $gameButton = $('a');
            $gameForm = $('#gameForm');
            app.bindEvends();
        },
        bindEvends: function(){
            $('body').on('click', 'a', app.openGame);
            $('._subMenu').on('mouseover', 'a.mouseSubmenu', app.subMenu);
        },
        openGame: function(){
            var $this = $(this);
            var gameName = $this.attr('gameName');
            var gameType = $this.attr('gameType');
            var gameid = $this.attr('gameid');
            var groupid = $this.attr('groupid');
            var ui = $this.attr('ui');
            if (! gameName)
            {
                return true;
            }
            if (! localStorage || ! localStorage.username)
            {
                alert(parent.Language.Get('请先登入'));
                return false;
            }

            if (gameName == 'Playtech')
            {
                var gameType = $this.attr('gameType');
                var ptUrl = top.Public.getPTUrl();
                var data = playtechGame.getUserData(gameType, groupid);
                if (! data || ! ptUrl || typeof(data) == 'string')
                {
                    alert(data || parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(10)');
                    //游戏登入 请求失败
                    return false;
                }
                // $this.attr('href', ptUrl + '?' + $.param(data, true));
                var url = ptUrl + '?' + $.param(data, true);
                var Playtech = window.open(url, 'Playtech');
                window.top.Public.pushGameWindowObject(Playtech);
                return true;
            }

            var data = {
                cmd: 515,
                sid: localStorage.sid,
                gid: window.top.Public.getGameHallAndGidByHall(gameName).gid,
                type: gameType,
                gameid: gameid,
                groupid: groupid,
                lang: localStorage.lang,
                ui: ui,
                backurl: window.top.Public.GetHOST(),
            };

            // if ((gameName == 'BBIN' && gameType == 'FT') || (gameName == 'BBIN' && gameType == 'OTHER'))
            // {
            //     BBINGame.openGame(data);
            //     return false;
            // }

            if (gameName == 'PlaynGO')
            {
                playngoGame.openGame(data);
                return false;
            }
            
            if (gameName == 'Hill')
            {
                hillGame.openGame(data);
                return false;
            }

            if (gameName == 'SBO')
            {
                SBOGame.openGame(data);
                return false;
            }

            if(gameName =='EBet')
            {
                EBetGame.openGame(data);
				return false
            
            }

            if(gameName=='OG')
            {
                OGGame.openGame(data);
                return false
            }

            // if(gameName=='SB')
            // {
            //     SBGame.openGame(data);
            //     return false
            // }

            if(gameName=='WMHILL')
            {
                data.backurl = null;
            }

            window.top.Public.post(data, {async: false}).done(function(response){
                if (response.status == 0)
                {
                    var inputs = ((gameName == 'BBIN' && gameType == 'FT') || (gameName == 'BBIN' && gameType == 'OTHER')) ? response.msg.valuedata : (response.msg.input ? response.msg.input : []);
                    var tags = '';

                    for (var key in inputs)
                    {
                        var value = inputs[key];
                        tags += '<input type="hidden" name="' + key + '" value="' + value + '" />';
                    }

                    var url = ((gameName == 'BBIN' && gameType == 'FT') || (gameName == 'BBIN' && gameType == 'OTHER')) ? response.msg.actionurl : (response.msg.gameUrl ? response.msg.gameUrl : []);
                    
                    // 站台有SSL，但廠商遊戲網址是http，window.open時頁面會顯示不安全，所以使用防封網址http去開啟廠商網址
                    if(gameName=='SUPERLOTTERY')
                    {
                        var url = 'http://esrsc3.gameapi.fun/form/?action=' + response.msg.gameUrl + "&PostData=" + response.msg.input['PostData'] + "&target=_TOP&method=POST";
                    }
                    if(gameName=='HaoCai' || gameName=='GTRLOTTERY')
                    {
                        var url = 'http://esrsc3.gameapi.fun/form/?action=' + response.msg.gameUrl + "&target=_TOP&method=POST";
                    }
                    
                    // 對應頁面遊戲按鈕名稱
                    if((gameName.toUpperCase() == 'LIXINLIVE') || (gameName=='KAIYUAN') || (gameName=='JDB') || (gameName=='JINLONG') || (gameName=='CQ9') || (gameName=='Agin') || (gameName=='VG') || (gameName=='CB') || (gameName=='ROYALLIVE') || (gameName=='KA') || (gameName=='LEG') || (gameName=='PHARAOH') || (gameName=='WMHILL') || (gameName=='GUANJUN') || (gameName=='DG') || (gameName=='GOLDENFSBO') || (gameName=='HUANGGUAN') || (gameName=='LIVE') || (gameName=='LIXINCHESS') || (gameName=='INPOKER') || (gameName=='KKCAIPIAO') || (gameName=='YABOCHESS') || (gameName=='FUNKY') || (gameName=='BOLE') || (gameName=='OBCAIPIAO') || (gameName=='MPOKER') || (gameName=='OBSPORT') || (gameName=='SASLOT') || (gameName=='RSG') || (gameName=='VA') || (gameName=='ICG') || (gameName=='GONE') || (gameName=='PCEGG') || (gameName=='BTI') || (gameName=='OBLIVE') || (gameName=='OBSLOT') || (gameName=='OBFISH') || (gameName=='CRPATI') || (gameName=='LONGCHENG') || (gameName=='OBESPORT') || (gameName=='AE') || (gameName=='SALON') || (gameName=='RICHSLOT') || (gameName=='SEASLOT') || (gameName=='GAMEONE') || (gameName=='SXBSPORT') || (gameName=='SB') || (gameName=='BAISONCHESS') || (gameName=='SXBLOTTERY') || (gameName=='SXBLIVE') || (gameName=='SUPERLOTTERY') || (gameName=='HaoCai') || (gameName=='GTRLOTTERY') || (gameName=='YLSPORT') || (gameName=='DASHENGCHESS') || (gameName=='CRSPORT') || (gameName=='XIAOAIESPORT') || (gameName=='LEIHUOESPORT'))
                    {
                        var game = window.open(url, gameName);
                    }
                    else
                    {
                        var form = "<form action=" + url + " method='post'>" + tags + "</form>";
                        var script = '<script> document.getElementsByTagName("form")[0].submit(); </script>';
                        var game = window.open('', gameName);
                        game.document.write(form + script);
                    }
                    window.top.Public.pushGameWindowObject(game);
                }
                else
                {
                    var message = typeof(response.msg) === 'string' ? response.msg : parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(11)';
                    //开启游戏失败
                    alert(response.msg);
                }
            });
            return false;
        },
        subMenu: function(){
            var style="color:#cbff31;";

            $('a.mouseSubmenu').attr('style', '');
            $(this).attr('style', style);
        }
    };

    var BBINGame = {
        openGame: function(data){
            var temp = document.createElement("form");
            temp.action = url = window.top.Public.getApiUrl();
            temp.method = "post";
            temp.target = "_blank";
            temp.style.display = "none";
            for (var x in data) {
                var opt = document.createElement("textarea");
                opt.name = x;
                opt.value = data[x];
                temp.appendChild(opt);
            }
            document.body.appendChild(temp);
            temp.submit();
            return temp;
        },
    };

    var playtechGame = {
        cmd: 515,
        gid: 14,

        getUserData: function(gameType, groupid){
            var result = null;
            var gameType = gameType || null;
            var data = {
                cmd: this.cmd,
                gid: this.gid,
                type: gameType,
                sid: window.top.Public.getLocalData('sid'),
                groupid: groupid,
            };
            window.top.Public
                .post(data, {async: false})
                .done(function(response){
                    result = {
                        url: response.msg.gameUrl,
                        language: response.msg.gameLanguage,
                        account: response.msg.gameAccount,
                        password: response.msg.gamePassword,
                        gameType: gameType,
                    };
                    if (response.status != 0)
                    {
                        result = response.msg
                    }
                    
                })
                .fail(function(){
                    result = false;
                });
            return result;
        },
    };

    var hillGame = {
        openGame: function(data){
            data.cmd = 515;
            window.top.Public.post(data).done(function(response){
                var status = response.status || false;
                var data = response.msg || null;
                if (status)
                {
                    alert(data);
                    return false;
                }

                var url = data.url || null;
                var params = data.params || {};

                $.ajax(url,{
                    type: 'post',
                    data: params,
                    xhrFields: {
                        withCredentials: true,
                    },
                    cache: false,
                    dataType: 'json',
                }).done(function(response){
                    var code = response.Code || false;
                    var url = response.LoginUrl || false;

                    if (code != 'OK' || ! url)
                    {
                        alert(parent.Language.Get('开启 hill 失败'));
                    } else {
                        var hill = window.open(url, 'hill');
                        window.top.Public.pushGameWindowObject(hill);
                    }
                }).fail(function(){
                    alert(parent.Language.Get('hill 维修中'));
                });
            });
        }
    };

    var SBOGame = {
        cmd: 515,
        openGame: function(request){
            request.cmd = 515;
            window.top.Public
                .post(request, {async: false})
                .done(function(response){
                    if (response.status != 0)
                    {
                        alert(response.msg);
                        return false;
                    }
                    var url = response.msg.gameUrl; 
                    var SBO = window.open(url, 'SBO');
                    window.top.Public.pushGameWindowObject(SBO);
                })
                .fail(function(){
                    alert(parent.Language.Get('SBO 维修中'));
                });

                return false;
        }
    };
    var playngoGame = {
        cmd: 515,
        gid: 32,
        openGame: function(request){
            request.cmd = this.cmd;
            request.gid = this.gid;
            window.top.Public
                .post(request, {async: false})
                .done(function(response){
                    if (response.status != 0)
                    {
                        alert(response.msg);
                        return false;
                    }
                    var url = './openPlaynGO.html?jsUrl=' + response.msg.gameUrl;
                    var PlaynGO = window.open(url, 'PlaynGO');
                    window.top.Public.pushGameWindowObject(PlaynGO);
                })
                .fail(function(){
                    alert(parent.Language.Get('PlaynGO 维修中'));
                });

                return false;
        }
    };

     var EBetGame = {
        cmd: 515,
        gid: 21,
        openGame: function(request){
            request.cmd = 515;
            window.top.Public
                .post(request, {async: false})
                .done(function(response){
                    if (response.status != 0)
                    {
                        alert(response.msg);
                        return false;
                    }
                    //2017-07-13 測試線暫時丟至遊客試玩
                    var url = response.msg.gameUrl; 
                    var EBet = window.open(url, 'EBet');
                    window.top.Public.pushGameWindowObject(EBet);
                })
                .fail(function(){
                    alert(parent.Language.Get('EBet 维修中'));
                });

                return false;
        }
    };
    var LixinliveGame = {
        cmd: 515,
        gid: 17,
        openGame: function(request){
            request.cmd = 515;
            window.top.Public
                .post(request, {async: false})
                .done(function(response){
                    if (response.status != 0)
                    {
                        alert(response.msg);
                        return false;
                    }

                // window.open("http://wm99.info?sid=ANONYMOUS");


                    $gameForm
                        .prop({action: url, method: 'post', target: '_blank'});

                    if(response.status == '0')
                    {
                        var url = response.msg.gameUrl;

                        if (request.type == "onlymultiple")
                        {
                            var LixinliveOnlymultiple = window.open(url, 'LixinliveOnlymultiple', 'width=900, height=600');
                            window.top.Public.pushGameWindowObject(LixinliveOnlymultiple);
                        }
                        else
                        {
                            var Lixinlive = window.open(url, 'Lixinlive');
                            window.top.Public.pushGameWindowObject(Lixinlive);
                        }
                    }
                    // var form = "<form action='"+url+"' method='post'></form>";
                    // var script = '<script> document.getElementsByTagName("form")[0].submit(); </script>';
                    // lixinlve.document.write(form + script);

                })
                .fail(function(){
                    alert(parent.Language.Get('Lixinlive 维修中'));
                });

                return false;
        }
    };

     var OGGame = {
        cmd: 515,
        gid: 29,
        openGame: function(request){
            request.cmd = 515;
            window.top.Public
                .post(request, {async: false})
                .done(function(response){
                    if (!response.msg.status)
                    {
                        alert(response.msg);
                        return false;
                    }

                    var url = response.msg.gameUrl;

                    var OG = window.open(url, 'OG');
                    window.top.Public.pushGameWindowObject(OG);

                })
                .fail(function(){
                    alert(parent.Language.Get('OG 维修中'));
                });

                return false;
        }
    };

    var SBGame = {
        cmd: 512,
        gid: 42,

        openGame: function(request){
            request.cmd = 512;
            window.top.Public
                .post(request, {async: false})
                .done(function(response){
                    if (response.status != 0)
                    {
                        alert(response.msg);
                        return false;
                    }
                    var result = response.msg;
                    var SBUrl = parent.Public.getSBUrl();
                    var url = SBUrl +'?' + $.param(response.msg, true);
                    
                    var SB = window.open(url, 'SB');
                    window.top.Public.pushGameWindowObject(SB);
                })
                .fail(function(){
                    alert(parent.Language.Get('SB 维修中'));
                });

                return false;
        }
    };


    app.initial();
})();