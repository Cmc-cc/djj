(function() {
    var Msg = "";
    var tag = "";
    var $changeIcon = "";
    var $popupWindows = "";
    var $output = "";
    var $input = "";
    var $balance = {};
    var $form = "";
    var $trans = "";
    var topHtml = "";
    var btmHtml = "";
    var app = {
        initial: function() {
            $balance = $('#balance');
            $form = $('.changeMoney');
            $popupWindows = $('#acc-trans1-box');
            $changeIcon = $('a.change-icon');
            $output = $form.find('#fromAccount');
            $input = $form.find('#toAccount ');
            $trans = $('.trans-r').find('a.trans-r-btn');
            topHtml = '<div class="acc-window acc-trans1">' + '<a class="close" ></a>' +
                '<div class="acc-w-title text_239"></div>' +
                '<div class="s-tip">';
            btmHtml = '<a class="btn-confirm1 text_7"></a></div>';
            app.setBalance();
            app.setBetMoney();
            ChangMoney.initial();
            app.getAllGameMoney();
            app.bindEvents();
        },
        bindEvents: function() {
            $changeIcon.bind('click', app.exchange);
            $trans.bind('click', function(){
                app.gettablemoney();
                app.allconfrim();
            });
            $('#reloadBetMoney').on('click', app.setBetMoney);
        },
        getAllGameMoney: function() {
            $balance.find('.gameMoney').each(function() {
                var $this = $(this);
                var d = $this.attr('gameName');
                $this.attr('gameName') && app.getGameMoney.apply($this, {});
            });
        },
        getGameMoney: function() {
            var $this = $(this);
            $this.html(parent.Language.Get('读取中'));
            var gameName = $this.attr('gameName');
            var data = {
                cmd: 200,
                sid: localStorage.sid,
                gid: window.parent.Public.getGameHallAndGidByHall(gameName).gid || 0,
            };

            if (data.gid == 0) {
                $this.html(parent.Language.Get('未开放'));
                return;
            }
            window.parent.Public.post(data).done(function(response) {
                var money = window.parent.Public.formatFloat(response.msg.money ,2);
                if (response.status == 0)
                {
                    $this.html(money);
                    if (data.gid == 10)
                    {
                        var lockmoney = window.parent.Public.formatFloat(response.msg.lockmoney ,2);
                        var agentprofit = window.parent.Public.formatFloat(response.msg.agentprofit ,2);
                        $('h6.lockmoney').html(lockmoney || 0.00);
                        $('h6.AgentProfit').html(agentprofit || 0.00);
                    }
                    return;
                }
                if (response.status == -5401)
                {
                    $this.html(response.msg);
                }
            });
        },
        exchange: function() {
            var outvaltmp, invaltmp;
            invaltmp = $input.val();
            outvaltmp = $output.val();
            $output.val(invaltmp);
            $input.val(outvaltmp);
        },
        reverseAllBet: function() {
            var data = {
                cmd: 207,
                sid: localStorage.sid,
                money : app.gettablemoney(),
            };
            window.parent.Public.post(data).done(function(response) {
                if (response.status == 0) {
                    app.popWindows(response.msg + "<br>");
                }
                if (response.status != 0) {
                    app.popWindows(parent.Language.Get('游戏转点失败') + '<br>');
                }
            });
        },
        gettablemoney: function() {
            var moneys = {};
            var flag = true;
            $('.gameMoney').each(function(){
                var $this = $(this);
                var name = $this.attr('gamename');
                var value = $this.html();
                if(isNaN(value) && value!='系统维护中')
                {
                    flag = false;
                }
                moneys[name] = value;
            });
            return (flag && moneys);
        },
        loading: function() {
            topHtml = '<div class="acc-window acc-trans1">' +
                '<div class="acc-w-title text_239"></div>' +
                '<div class="s-tip">';
            tag = topHtml + parent.Language.Get('读取中请稍后') + '....</div>';
            $popupWindows.html(tag).show();
            app.reverseAllBet();
        },
        allconfrim: function() {
            tag = parent.Language.Get("你确定要将所有游戏厅的钱转回至中心钱包") + "<br>";
            app.confrimSet(tag);
        },
        confrimSet: function(content) {
            btmHtml = '<a class="btn-confirm1 text_7"></a> <a class= "btn-cancel text_240"></a></div>';
            tag = topHtml + content + btmHtml;
            $popupWindows.html(tag).show();
            $popupWindows.find('a.btn-confirm1').bind('click', function() {
                $popupWindows.hide();
                app.loading();
            });
            $popupWindows.find('a.btn-cancel,a.close').bind('click', function() {
                $popupWindows.hide();
            });
        },
        popWindows: function(content) {
            topHtml = '<div class="acc-window acc-trans1">' +
                '<div class="acc-w-title text_239"></div>' +
                '<div class="s-tip">';
            btmHtml = '<a class="btn-confirm1 text_7"></a></div>';
            tag = topHtml + content + btmHtml;
            $popupWindows.show().html(tag);
            $popupWindows.find('a.btn-confirm1').bind('click', function() {
                $popupWindows.hide();
                window.location.reload();
            });
        },
        setBalance: function(){
            var games = window.parent.Public.getGameHallAndGid() || {};
            var tags = [];
            var defaultTags = $balance.html();
            for (var key in games)
            {
                var row = games[key];
                var sort = parseInt(row['sort']);
                if (row.status != 1 || row.gid == 10 || sort < 1 || row.mode != 0)
                {
                    continue;
                }
                if(! tags[row.sort])
                {
                    tags[row.sort] = [];
                }
                tags[row.sort].push(
                    '<div class="t-h-box" data-num="2">' +
                        '<span class="add-icon"></span>' +
                        '<span class="minus-icon"></span>' +
                        '<a class="refresh-icon"></a>' +
                        '<div class="t-h-info">' +
                            '<h1>'+ parent.Language.Get((row.gameHallNickname || row.name ))+'</h1>' +
                            '<h6 class="gameMoney" gamename="'+ row.name +'">0.00</h6>' +
                        '</div>' +
                    '</div>'
                );
            }
            var tagsString = '';
            for (var key in tags)
            {
                tagsString += tags[key].join(' ');
            }
            tags && $balance.html(defaultTags + tagsString);
            $('a.refresh-icon').bind('click', function(){
                app.getGameMoney.apply($(this).next().find('h6'), {});
            });
        },
        setBetMoney: function(){
            var $this = $(this);
            $('#betMoney').html(parent.Language.Get('读取中'));
            var data = {
                cmd: 211,
                sid: localStorage.sid,
            };
            window.parent.Public.post(data).done(function(response) {
                var msg = response.msg;
                var betMoney = msg.TotalValidBetAmount;
                $('#betMoney').html(betMoney);
            });
        },
    };

    var ChangMoney = {
        ajaxing: false,
        $popupWindows: "",
        $form: null,
        $fromSelect: null,
        $toSelect: null,
        initial: function() {
            ChangMoney.$form = $('.trans-l');
            ChangMoney.$fromSelect = ChangMoney.$form.find('#fromAccount');
            ChangMoney.$toSelect = ChangMoney.$form.find('#toAccount');
            ChangMoney.$popWindows = $('#acc-trans1-box');
            ChangMoney.setOption();
            ChangMoney.bindEvents();
        },
        bindEvents: function() {
            ChangMoney.$form.find('a#trans-btn1').bind('click', ChangMoney.confrim);
            $form.bind('submit', ChangMoney.confrim);
        },
        confrim: function() {
            var games = window.parent.Public.getGameHallAndGid() || {};
            var source = games[ChangMoney.$fromSelect.val()] || {};
            var target = games[ChangMoney.$toSelect.val()] || {};
            content = parent.Language.Get("你确定要从") + "&nbsp;" + parent.Language.Get((source.gameHallNickname || source.name )) + "&nbsp;" + parent.Language.Get("转") + "&nbsp;" + $('#money').val() + "&nbsp;" + parent.Language.Get("元 至") + "&nbsp;" + parent.Language.Get((target.gameHallNickname || target.name )) + "<br>";
            btmHtml = '<a class="btn-confirm1 text_7"></a> <a class="btn-cancel text_240"></a></div>';
            tag = topHtml + content + btmHtml;
            ChangMoney.$popWindows.html(tag).show();
            var $m = $('#money').val();
            if ($m == "") {
                content = parent.Language.Get('请填写金额') + '<br>';
                btmHtml = '<a class="btn-confirm1 text_7"></a>';
                tag = topHtml + content + btmHtml;
                ChangMoney.$popWindows.html(tag);
                ChangMoney.$popWindows.find('a.btn-confirm1').bind('click', function() {
                    ChangMoney.$popWindows.hide();
                });
                ChangMoney.$popWindows.find('a.close').bind('click', function() {
                    ChangMoney.$popWindows.hide();
                });
            } else {
                ChangMoney.$popWindows.find('a.btn-confirm1').bind('click', function() {
                    ChangMoney.chang();
                });
                ChangMoney.$popWindows.find('a.btn-cancel,a.close').bind('click', function() {
                    ChangMoney.$popWindows.hide();
                });
            }
            return false;
        },

        chang: function() {
            ChangMoney.$popWindows.hide();
            if (ChangMoney.ajaxing) {
                return false;
            }
            var data = {
                cmd: 204,
                sid: localStorage.sid || 0,
                source: ChangMoney.$fromSelect.val(),
                target: ChangMoney.$toSelect.val(),
                money: $('#money').val(),
            };
            var happen = '';
            ChangMoney.ajaxing = true;


            window.parent.Public.post(data, {
                    async: false
                }).done(function(response) {
                    localStorage.money = data.money;
                    localStorage.source = data.source;
                    localStorage.target = data.target;
                    if (response.status != 0) {
                        happen = '<p> <span class="blue">' + parent.Language.Get(response.msg) + '</span> </p> ';
                    } else {
                        var games = window.parent.Public.getGameHallAndGid();
                        var source = games[localStorage.source] || {};
                        var target = games[localStorage.target] || {};
                        happen = '<p>' + parent.Language.Get('您已成功从') + '<span class="blue">&nbsp;' + parent.Language.Get((source.gameHallNickname || source.name)) + '&nbsp;</span>' + parent.Language.Get('转出') + '</p>' + ' <strong class="s-n">' + localStorage.money + '</strong><p>&nbsp;' + parent.Language.Get('至') + '&nbsp;<span class="blue">' + parent.Language.Get((target.gameHallNickname || target.name)) + '&nbsp;</span></p>';
                    }
                })
                .fail(function() {
                    happen = '<p> <span class="blue"> '+ parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(9) </span> </p> ';
                    //转点 请求失败
                });
            ChangMoney.popWindows(happen);
            ChangMoney.ajaxing = false;
            return false;
        },
        popWindows: function(content) {
            topHtml = '<div class="acc-window acc-trans1">' +
                '<div class="acc-w-title text_239"></div>' +
                '<div class="s-tip">';
            btmHtml = '<a class="btn-confirm1 text_7"></a></div>';
            tag = topHtml + content + btmHtml;
            ChangMoney.$popWindows.show().html(tag);
            ChangMoney.$popWindows.find('a.btn-confirm1').bind('click', function() {
                window.location.reload();
            });
        },

        setOption: function() {
            var games = window.parent.Public.getGameHallAndGid() || {};
            var tags = [];
            var center = '<option value="10">' + parent.Language.Get('中心钱包') + '</option>';
            for (var key in games) 
            {
                var row = games[key];
                var sort = parseInt(games[key]['sort']);
                if (games[key].status != 1 || games[key].maintain == 1 || games[key].gid == 10 || games[key].mode != 0) {
                    continue;
                }
                if(! tags[row.sort])
                {
                    tags[row.sort] = [];
                }
                tags[row.sort].push(  
                    '<option value="' + games[key].gid + '">' + parent.Language.Get((games[key].gameHallNickname || games[key].name)) + '</option>'
                );
            }
            var tagsString = '';
            for (var key in tags)
            {
                tagsString += tags[key].join(' ');
            }
            ChangMoney.$fromSelect.html(center + tagsString);
            ChangMoney.$toSelect.html(center + tagsString);
        },


    };

    app.initial();
})();