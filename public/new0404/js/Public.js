(function($){
    var App = {
        GameHall: {},
        GameGroup: {},
        GameList: {},
        UserMainStatus: false,
        Speed: {},//各個線路
        NewWindow: {},

        Initial: function()
        {
            App.Api.GetGameHall({options: {async: false}});
            App.Api.GetGameGroup();
            App.Api.GetGameList();

            App.BindEvent();
            // this.Apispeed(function() {
            //     App.Api.GetGameHall({options: {async: false}});
            //     App.Api.GetGameGroup();
            //     App.Api.GetGameList();

            //     App.BindEvent();
            // });
        },
        BindEvent: function()
        {
            window.onmessage = App.ReceiveMessage;
        },
        ReceiveMessage: function(e)
        {
            if (! (typeof(e.data) === 'object'))
            {
                return ;
            }
            if (e.data.var in App)
            {
                App[e.data.var](e.data.data);
            }
        },
        /* from ReceiveMessage */
        SetConfig: function(data)
        {
            if (! (typeof(data) === 'object'))
            {
                return ;
            }
            if (('Type' in data) && data.Type === 'game')
            {
                Config.GAMEURL = data.Url + '/13DB43E3D1';
            }
            if (('Type' in data) && data.Type === 'form')
            {
                Config.FORMURL = data.Url + '/form';
            }
            if (('Type' in data) && data.Type === 'app')
            {
                Config.APPURL = data.Url + '/app';
            }
            if (('Type' in data) && data.Type === 'apiurl')
            {
                Config.APIURL = data.Url + '/boxApi.php';
                Config.CREATEQRCODEURL = data.Url;
            }
            if (('Type' in data) && data.Type === 'imgurl')
            {
                Config.QRPAYURL = data.Url + '/imgx21/mobile/images/qrpay/';
                Config.EXTERNALURL = data.Url + '/imgx21/wechat';
            }
        },
        GetConfig: function(key)
        {
            if (key == 'EXTERNALURL' && localStorage.Fastimgurl)
            {
                return localStorage.Fastimgurl + '/imgx21/wechat';
            }
            if (key == 'APIURL' && localStorage.Fastapiurl)
            {
                return localStorage.Fastapiurl + '/boxApi.php';
            }
            return Config[key];
        },
        GoTo: function(url)
        {
            location.href = url || (App.GetConfig('HOST') + '/wechat');
        },
        ParentGoTo: function(url)
        {
            parent.location.href = url || (App.GetConfig('HOST') + '/wechat');
            // location.href = App.GetConfig('HOST') + '/?' + new Date().toLocaleString();
        },
        WindowOpen: function(url, name, notClose, option)
        {
            var newWindow = (name in App.NewWindow) ? App.NewWindow[name] : '';

            if (! option && App.GetConfig('ISAPP'))
            {
                option = 'location=no,transitionstyle=fliphorizontal,closebuttoncaption=' + Language.Get('回大厅');
            }

            ! notClose && newWindow && App.WindowClose(name);

            if (! newWindow || ! ('closed' in newWindow) || newWindow['closed'])
            { 
                newWindow = App.NewWindow[name] = window.open(url, name, option);
            }
            else
            {
                newWindow.location.href = url;
            }
            return newWindow;
        },
        WindowClose: function(name)
        {
            for (var key in App.NewWindow)
            {
                var newWindow = App.NewWindow[key];

                if (! name || name == key)
                {
                    ('close' in newWindow) && newWindow.close();
                }
            }
        },
        SetLocalStorage: function(data)
        {
            if (typeof(data) === 'object')
            {
                for (var key in data)
                {
                    localStorage[key] = data[key];
                }
            }
        },
        GetLocalStorage: function(key)
        {
            return((key in localStorage) ? localStorage[key] : false);
        },
        GetUrlData: function(index)
        {
            var rows = location.search.substring(1).split('&');
            for (var key in rows)
            {
                var row = rows[key].split('=');
                if (row[0] == index)
                {
                    return row[1];
                }
            }
        },
        GetApiUrl: function()
        {
            apiUrl = localStorage.Fastapiurl != undefined ? localStorage.Fastapiurl + '/boxApi.php' : App.GetConfig('APIURL');
            return apiUrl;
        },
        GetGameHallByHall: function(hall)
        {
            if (! hall)
            {
                return ;
            }
            for (var key in App.GameHall)
            {
                var row = App.GameHall[key];
                if (row['gamehall'].toUpperCase() == hall.toUpperCase())
                {
                    return row;
                }
            }
            return ;
        },
        GetGameHallById: function(id)
        {
            for (var key in App.GameHall)
            {
                var row = App.GameHall[key];
                if (row['id'] == id)
                {
                    return row;
                }
            }
            return ;
        },
        GetGameHall: function()
        {
            return App.GameHall;
        },
        GetGameGroup: function()
        {
            return App.GameGroup;
        },
        /* 有index時 只刪index, 否則刪除其他 */
        ClearLocalStorage: function(index, isLogout)
        {
            var tmp1 = App.GetConfig('DONTREMOVEITEM') || [];
            var tmp2 = (! isLogout && App.GetConfig('LOGINDONTREMOVEITEM')) || [];
            var dontRemoveItem = tmp1.concat(tmp2);

            for (var key in localStorage)
            {
                index
                    ? (index === key && localStorage.removeItem(key))
                    : (dontRemoveItem.indexOf(key) < 0 && localStorage.removeItem(key));
            }
        },
        Ajax: function(param, options)
        {
            param = typeof(param) === 'object' ? param : {};
            options = typeof(options) === 'object' ? options : {};

            var cmd = ('cmd' in param) ? ('?' + param.cmd) : '';
            var url = (('url' in options) ? options.url : this.GetConfig('APIURL')) + cmd;
            var vendor = this.GetConfig('VENDOR');

            $.extend(param, vendor);

            return ($.ajax({
                url: url,
                data: param,
                type: ('type' in options) ? options.type : 'post',
                async: ('async' in options) ? options.async : true,
                cache: ('cache' in options) ? options.cache : false,
                dataType: ('dataType' in options) ? options.dataType : 'json',
                timeout: ('timeout' in options) ? options.timeout : (60 * 1000),
                startTime: new Date().getTime(),
            }));
        },
        loadExternal: function(data)
        {
            for(var key in data){
                var row = data[key];
                var element = row.element;
                var attribute = row.attribute;
                var element = document.createElement(element);
                for (var key2 in attribute)
                {
                    var value2 = attribute[key2];
                    if(key2 === 'href')
                    {
                        value2 = value2.replace('@EXTERNALURL', App.GetConfig('EXTERNALURL')) + '?202203162138';
                    }
                    element[key2] = value2;
                }
                document.getElementsByTagName('head')[0].appendChild(element);
            }  
        },
        GetApiList: function(){
            var hosturl = App.GetConfig('HOSTURL');
            App.Ajax({}, {url: hosturl + '/apiurl.txt', type: 'GET', async: false})
                .done(function(data){
                    App.Speed = data;
                });
        },
        Apispeed: function(callback){
            var oldurl = App.GetConfig('APIURL');
            var speed = App.GetConfig('SPEED');
            var status = true;

            //計算每條api的時間並儲存於object
            for (var key in speed)
            {
                App.Ajax('',{'url': speed[key]['api'] + '/boxApi.php'}).always(function(response, statusText, xhr){

                    var time = (statusText === 'success' ? ((new Date().getTime() - this.startTime) / 1000).toFixed(2) : false);
                    var result = (oldurl.match(this.url) != null) ? true : false;
                    var httpCode = xhr.status;
                    var fastUrl = this.url.split('/boxApi.');
                    // console.log(httpCode);

                    if (statusText == 'success' && status && httpCode == 200) {
                        status = false;
                        App.ChangeApi(fastUrl[0]);
                        callback();
                    }
                })
            }
        },
        ChangeApi: function(fastUrl){
            var oldurl = App.GetConfig('APIURL');
            //更換的api是否與目前使用的api相同,若相同則不更換,反之
            var result = (oldurl.match(fastUrl) != null) ? true : false;
            if (oldurl != fastUrl)
            {
                var apidata = {
                    Type: 'apiurl',
                    Url: fastUrl,
                };
                App.SetConfig(apidata);
                console.log('更換成功!');
                App.SetLocalStorage({Fastapiurl: fastUrl});
            }
        },
        GetHostGoogleStatus: function(host)
        {
            var GetHostGoogleKeyArr = App.GetHostGoogleKey(host);
            var status = typeof(GetHostGoogleKeyArr) == 'object' ? 'true' : 'false';
            return status;
        },
        GetHostGoogleKey: function($host)
        {
            var group = '';
            if(
                $host == 'x21.oltgzn888.com' || $host == 'game68.cc' || $host == 'www.game68.cc' || $host == '688xy.com' || $host == 'www.688xy.com' || $host == 'best228.com' || $host == 'www.best228.com' || $host == 'gameone666.com' || $host == 'www.gameone666.com' || $host == 'wingameone.com' || $host == 'www.wingameone.com' || $host == 'gameone8888.com' || $host == 'www.gameone8888.com' || $host == 'kingdom228.com' || $host == 'www.kingdom228.com' || $host == 'win68win.com' || $host == 'www.win68win.com' || $host == 'lemon888.com' || $host == 'www.lemon888.com' || $host == 'gameone668.com' || $host == 'www.gameone668.com' || $host == 'gameonew.com' || $host == 'www.gameonew.com' || $host == 'gameonehk666.com' || $host == 'www.gameonehk666.com' || $host == 'win18game.cc' || $host == 'www.win18game.cc' || $host == 'bigwin68.vip' || $host == 'www.bigwin68.vip' || $host == 'fb3388.vip' || $host == 'www.fb3388.vip' || $host == 'pdyo888.com' || $host == 'www.pdyo888.com' || $host == 'play368.cc' || $host == 'www.play368.cc' || $host == 'play268.vip' || $host == 'www.play268.vip' || $host == '238.one' || $host == 'www.238.one' || $host == 'asiagame1.com' || $host == 'www.asiagame1.com' || $host == '88win88.cc' || $host == 'www.88win88.cc' || $host == '88win88.vip' || $host == 'www.88win88.vip' || $host == '398.one' || $host == 'www.398.one' || $host == 'siubo.cc' || $host == 'www.siubo.cc' || $host == '668win.cc' || $host == 'www.668win.cc' || $host == '266win.com' || $host == 'www.266win.com' || $host == '128win.cc' || $host == 'www.128win.cc' || $host == '368game.vip' || $host == 'www.368game.vip' || $host == '368game.cc' || $host == 'www.368game.cc' || $host == 'gameonehk288.com' || $host == 'www.gameonehk288.com' || $host == 'Play24hr.cc' || $host == 'www.Play24hr.cc' || $host == 'Shooter338.com' || $host == 'www.Shooter338.com' || $host == 'gameonehk0527.com' || $host == 'www.gameonehk0527.com' || $host == 'gameonehk020.com' || $host == 'www.gameonehk020.com' || $host == 'gameonehk068.com' || $host == 'www.gameonehk068.com' || $host == 'gameone.one' || $host == 'www.gameone.one' || $host == 'game9988.cc' || $host == 'www.game9988.cc' || $host == '6688.money' || $host == 'www.6688.money' || $host == 'easy333.cc' || $host == 'www.easy333.cc' || $host == 'easy68.cc' || $host == 'www.easy68.cc' || $host == 'gameone777.com' || $host == 'www.gameone777.com' || $host == 'bets38.com' || $host == 'www.bets38.com' || $host == 'happy666.cc' || $host == 'www.happy666.cc' || $host == 'gameonehk228.com' || $host == 'www.gameonehk228.com' || $host == 'winwin2888.com' || $host == 'www.winwin2888.com' || $host == 'game1asian.vip' || $host == 'www.game1asian.vip' || $host == 'lotus168.vip' || $host == 'www.lotus168.vip' || $host == '113.money' || $host == 'www.113.money' || $host == '988.money' || $host == 'www.988.money'
            ) { 
                group = 'webgof01'; 
            }
            else if (
                $host == '338.money' || $host == 'www.338.money' || $host == '688.money' || $host == 'www.688.money' || $host == 'win168win.com' || $host == 'www.win168win.com' || $host == 'win88888win.com' || $host == 'www.win88888win.com' || $host == 'winwin8080.com' || $host == 'www.winwin8080.com' || $host == 'game028.vip' || $host == 'www.game028.vip' || $host == 'superme168.com' || $host == 'www.superme168.com' || $host == '686805.cc' || $host == 'www.686805.cc' || $host == '686804.cc' || $host == 'www.686804.cc' || $host == '686803.cc' || $host == 'www.686803.cc' || $host == '686802.cc' || $host == 'www.686802.cc' || $host == '686801.cc' || $host == 'www.686801.cc' || $host == '66688.one' || $host == 'www.66688.one' || $host == 'teq002.com' || $host == 'www.teq002.com' || $host == 'game1cs.com' || $host == 'www.game1cs.com' || $host == 'game01.vip' || $host == 'www.game01.vip' || $host == '168188.vip' || $host == 'www.168188.vip' || $host == 'game007.cc' || $host == 'www.game007.cc' || $host == 'gohk168.com' || $host == 'www.gohk168.com' || $host == 'game66.vip' || $host == 'www.game66.vip' || $host == '1scasino.one' || $host == 'www.1scasino.one' || $host == 'win188.cc' || $host == 'www.win188.cc' || $host == 'gameone88.vip' || $host == 'www.gameone88.vip' || $host == 'game188.club' || $host == 'www.game188.club' || $host == 'hkgame1888.com' || $host == 'www.hkgame1888.com' || $host == 'game1hk.net' || $host == 'www.game1hk.net' || $host == 'snk1488.com' || $host == 'www.snk1488.com' || $host == 'gg003.vip' || $host == 'www.gg003.vip' || $host == 'gg002.vip' || $host == 'www.gg002.vip' || $host == 'gg001.vip' || $host == 'www.gg001.vip' || $host == 'fb005.vip' || $host == 'www.fb005.vip' || $host == 'fb004.vip' || $host == 'www.fb004.vip' || $host == 'fb003.vip' || $host == 'www.fb003.vip' || $host == 'game6806.cc' || $host == 'www.game6806.cc' || $host == 'game6803.cc' || $host == 'www.game6803.cc' || $host == 'game6802.cc' || $host == 'www.game6802.cc' || $host == 'game6801.cc' || $host == 'www.game6801.cc' || $host == 'game006.cc' || $host == 'www.game006.cc' || $host == 'fb002.vip' || $host == 'www.fb002.vip' || $host == 'fb001.vip' || $host == 'www.fb001.vip' || $host == 'game005.cc' || $host == 'www.game005.cc' || $host == 'sky168.vip' || $host == 'www.sky168.vip' || $host == 'game004.cc' || $host == 'www.game004.cc' || $host == 'game003.cc' || $host == 'www.game003.cc' || $host == 'game002.cc' || $host == 'www.game002.cc' || $host == 'game001.cc' || $host == 'www.game001.cc' || $host == 'game118.cc' || $host == 'www.game118.cc' || $host == 'hg338.vip' || $host == 'www.hg338.vip' || $host == '148pp.bet' || $host == 'www.148pp.bet' || $host == '88game88.com' || $host == 'www.88game88.com'
            ) { 
                group = 'webgof02'; 
            }
            else if (
                $host == 'lucky88game88.com' || $host == 'www.lucky88game88.com' || $host == 'ty128.cc' || $host == 'www.ty128.cc' || $host == 'sh888.one' || $host == 'www.sh888.one' || $host == 'fb0008.com' || $host == 'www.fb0008.com' || $host == 'fbet008.com' || $host == 'www.fbet008.com' || $host == 'okok888.vip' || $host == 'www.okok888.vip' || $host == 'bb166.cc' || $host == 'www.bb166.cc' || $host == 'fbc828.com' || $host == 'www.fbc828.com' || $host == 'hfc668.vip' || $host == 'www.hfc668.vip' || $host == 'hcl148.com' || $host == 'www.hcl148.com' || $host == 'fbc228.com' || $host == 'www.fbc228.com' || $host == '88188yy.com' || $host == 'www.88188yy.com' || $host == '66168.vip' || $host == 'www.66168.vip' || $host == 'lucky1688.club' || $host == 'www.lucky1688.club' || $host == 'hkgame1.com' || $host == 'www.hkgame1.com' || $host == 'hkfung6657.com' || $host == 'www.hkfung6657.com' || $host == 'fb168s.com' || $host == 'www.fb168s.com' || $host == 'winner168.cc' || $host == 'www.winner168.cc' || $host == 'fbluckygame.com' || $host == 'www.fbluckygame.com' || $host == 'win168.shop' || $host == 'www.win168.shop' || $host == 'win888.online' || $host == 'www.win888.online' || $host == 'win168.bet' || $host == 'www.win168.bet' || $host == '927s.vip' || $host == 'www.927s.vip' || $host == 'win666.bet' || $host == 'www.win666.bet' || $host == 'win888.shop' || $host == 'www.win888.shop' || $host == 'win777.vip' || $host == 'www.win777.vip' || $host == 'win999.online' || $host == 'www.win999.online' || $host == 'veve888.com' || $host == 'www.veve888.com' || $host == 'wow7777.club' || $host == 'www.wow7777.club' || $host == 'win333.club' || $host == 'www.win333.club' || $host == 'fb999.cc' || $host == 'www.fb999.cc' || $host == 'fb777.vip' || $host == 'www.fb777.vip' || $host == 'fb18.cc' || $host == 'www.fb18.cc' || $host == 'pronhub888.com' || $host == 'www.pronhub888.com' || $host == 'fb919.com' || $host == 'www.fb919.com' || $host == 'fb718.com' || $host == 'www.fb718.com' || $host == 'win118.cc' || $host == 'www.win118.cc' || $host == 'fb8999.com' || $host == 'www.fb8999.com' || $host == 'wewe8888.com' || $host == 'www.wewe8888.com' || $host == 'mi1491.com' || $host == 'www.mi1491.com' || $host == 'win111.vip' || $host == 'www.win111.vip' || $host == 'fb668vip.com' || $host == 'www.fb668vip.com' || $host == 'fb668s.com' || $host == 'www.fb668s.com' || $host == '13816888.com' || $host == 'www.13816888.com' || $host == 'beb168.com' || $host == 'www.beb168.com' || $host == 'ccho168.com' || $host == 'www.ccho168.com' || $host == '3688game.com' || $host == 'www.3688game.com' || $host == '932168.cc' || $host == 'www.932168.cc' || $host == 'win007.bet' || $host == 'www.win007.bet' || $host == 'bb6168.com' || $host == 'www.bb6168.com'
            ) { 
                group = 'webgof03'; 
            }
            else if (
                $host == 'win333.vip' || $host == 'www.win333.vip' || $host == 'fb338.com' || $host == 'www.fb338.com' || $host == 'fbc148.com' || $host == 'www.fbc148.com' || $host == 'apple368.com' || $host == 'www.apple368.com' || $host == 'fb698.cc' || $host == 'www.fb698.cc' || $host == 'fb666.cc' || $host == 'www.fb666.cc' || $host == 'wow7777.vip' || $host == 'www.wow7777.vip' || $host == 'ck168.bet' || $host == 'www.ck168.bet' || $host == 'win999.bet' || $host == 'www.win999.bet' || $host == 'totti.live' || $host == 'www.totti.live' || $host == '468win.com' || $host == 'www.468win.com' || $host == 'google999.com' || $host == 'www.google999.com' || $host == 'game888s.com' || $host == 'www.game888s.com' || $host == 'bet168.shop' || $host == 'www.bet168.shop' || $host == 'fbc16.com' || $host == 'www.fbc16.com' || $host == 'joker186.com' || $host == 'www.joker186.com' || $host == 'ww678.live' || $host == 'www.ww678.live' || $host == 'win001.cc' || $host == 'www.win001.cc' || $host == 'win008.vip' || $host == 'www.win008.vip' || $host == 'look828.com' || $host == 'www.look828.com' || $host == 'game828.cc' || $host == 'www.game828.cc' || $host == 'fbcity.net' || $host == 'www.fbcity.net' || $host == 'cc228.cc' || $host == 'www.cc228.cc' || $host == '234win.cc' || $host == 'www.234win.cc' || $host == 'fb299.com' || $host == 'www.fb299.com' || $host == 'day365.cc' || $host == 'www.day365.cc' || $host == 'win282.cc' || $host == 'www.win282.cc' || $host == 'livefootballclub.com' || $host == 'www.livefootballclub.com' || $host == 'best666.cc' || $host == 'www.best666.cc' || $host == 'sky1628.com' || $host == 'www.sky1628.com' || $host == 'sky138.cc' || $host == 'www.sky138.cc' || $host == 'pk168s.com' || $host == 'www.pk168s.com' || $host == 'koala88.cc' || $host == 'www.koala88.cc' || $host == 'ac188.cc' || $host == 'www.ac188.cc' || $host == 'win365.club' || $host == 'www.win365.club' || $host == 'ac999.vip' || $host == 'www.ac999.vip' || $host == 'vip666club.com' || $host == 'www.vip666club.com' || $host == 'best234.com' || $host == 'www.best234.com' || $host == 'tm888s.com' || $host == 'www.tm888s.com' || $host == '23456win.com' || $host == 'www.23456win.com' || $host == 'win138.shop' || $host == 'www.win138.shop' || $host == 'de1356.com' || $host == 'www.de1356.com' || $host == 'vee168.com' || $host == 'www.vee168.com' || $host == 'yk666.cc' || $host == 'www.yk666.cc' || $host == 'win666.shop' || $host == 'www.win666.shop' || $host == '927.cash' || $host == 'www.927.cash' || $host == 'bigbig168.com' || $host == 'www.bigbig168.com' || $host == 'fb668.cc' || $host == 'www.fb668.cc' || $host == 'fat188.com' || $host == 'www.fat188.com' || $host == 'bee668.com' || $host == 'www.bee668.com' 
            ) { 
                group = 'webgof04'; 
            }
            else if (
                $host == 'sky7728.com' || $host == 'www.sky7728.com' || $host == '288.games' || $host == 'www.288.games' || $host == 'ph128.cc' || $host == 'www.ph128.cc' || $host == 'ball368.cc' || $host == 'www.ball368.cc' || $host == 'fbc12.com' || $host == 'www.fbc12.com' || $host == 'fbc198.com' || $host == 'www.fbc198.com' || $host == 'fb168.cc' || $host == 'www.fb168.cc' || $host == 'ecplay888.com' || $host == 'www.ecplay888.com' || $host == '888one.cc' || $host == 'www.888one.cc' || $host == 'coleman888.com' || $host == 'www.coleman888.com' || $host == 'win9838.com' || $host == 'www.win9838.com' || $host == 'win234.cc' || $host == 'www.win234.cc' || $host == 'fb613.com' || $host == 'www.fb613.com' || $host == '888lok.com' || $host == 'www.888lok.com' || $host == 'cw678.cc' || $host == 'www.cw678.cc' || $host == 'bw882.cc' || $host == 'www.bw882.cc' || $host == 'boss1668.com' || $host == 'www.boss1668.com' || $host == 'fbgaminghk.com' || $host == 'www.fbgaminghk.com' || $host == 'win28.vip' || $host == 'www.win28.vip' || $host == 'letgo88.cc' || $host == 'www.letgo88.cc' || $host == 'boss001.vip' || $host == 'www.boss001.vip' || $host == 'boss002.vip' || $host == 'www.boss002.vip' || $host == 'boss003.vip' || $host == 'www.boss003.vip' || $host == 'boss004.vip' || $host == 'www.boss004.vip' || $host == 'boss005.vip' || $host == 'www.boss005.vip' || $host == 'boss006.vip' || $host == 'www.boss006.vip' || $host == 'boss007.vip' || $host == 'www.boss007.vip' || $host == 'lucky668.cc' || $host == 'www.lucky668.cc' || $host == 'kk666club.com' || $host == 'www.kk666club.com' || $host == 'hk188.club' || $host == 'www.hk188.club' || $host == 'jjkr.vip' || $host == 'www.jjkr.vip' || $host == '002vip.cc' || $host == 'www.002vip.cc' || $host == 'money108.cc' || $host == 'www.money108.cc' || $host == 'joker286.com' || $host == 'www.joker286.com' || $host == 'fb698a.com' || $host == 'www.fb698a.com' || $host == 'icefire68.com' || $host == 'www.icefire68.com' || $host == 'icefire40.com' || $host == 'www.icefire40.com' || $host == 'icefire30.com' || $host == 'www.icefire30.com' || $host == 'gtiger3.cc' || $host == 'www.gtiger3.cc' || $host == 'gtiger2.cc' || $host == 'www.gtiger2.cc' || $host == 'gtiger1.cc' || $host == 'www.gtiger1.cc' || $host == 'robin668.com' || $host == 'www.robin668.com' || $host == 'rock668.com' || $host == 'www.rock668.com' || $host == 'icefire668.com' || $host == 'www.icefire668.com' || $host == 'game228.vip' || $host == 'www.game228.vip' || $host == 'game628.cc' || $host == 'www.game628.cc' || $host == 'game188.cc' || $host == 'www.game188.cc' || $host == 'ufc666.com' || $host == 'www.ufc666.com' || $host == 'joker188.vip' || $host == 'www.joker188.vip' || $host == '188win.vip' || $host == 'www.188win.vip'
            ) { 
                group = 'webgof05'; 
            }
            else if (
                $host == 'gtiger.cc' || $host == 'www.gtiger.cc' || $host == '388win.vip' || $host == 'www.388win.vip' || $host == 'eetrr.top' || $host == 'www.eetrr.top' || $host == 'swen.top' || $host == 'www.swen.top' || $host == 'ssvnn.top' || $host == 'www.ssvnn.top' || $host == 'kksxx.top' || $host == 'www.kksxx.top' || $host == 'kkstt.top' || $host == 'www.kkstt.top' || $host == 'kkszz.top' || $host == 'www.kkszz.top' || $host == 'kkscc.top' || $host == 'www.kkscc.top' || $host == 'kksbb.top' || $host == 'www.kksbb.top' || $host == 'px68.top' || $host == 'www.px68.top' || $host == 'ssvzz.top' || $host == 'www.ssvzz.top' || $host == 'ssvxx.top' || $host == 'www.ssvxx.top' || $host == 'ssvmm.top' || $host == 'www.ssvmm.top' || $host == 'ssvjj.top' || $host == 'www.ssvjj.top' || $host == 'aaac.top' || $host == 'www.aaac.top' || $host == '1688p.top' || $host == 'www.1688p.top' || $host == 'ren888.top' || $host == 'www.ren888.top' || $host == 'kkshh.top' || $host == 'www.kkshh.top' || $host == 'kksmm.top' || $host == 'www.kksmm.top' || $host == 'kksqq.top' || $host == 'www.kksqq.top' || $host == 'kksnn.top' || $host == 'www.kksnn.top' || $host == 'ssvrr.top' || $host == 'www.ssvrr.top' || $host == 'up02.top' || $host == 'www.up02.top' || $host == 'optv.top' || $host == 'www.optv.top' || $host == 'ssvhh.top' || $host == 'www.ssvhh.top' || $host == 'ssvtt.top' || $host == 'www.ssvtt.top' || $host == 'ssvdd.top' || $host == 'www.ssvdd.top' || $host == 'cccche.top' || $host == 'www.cccche.top' || $host == 'jiw58.top' || $host == 'www.jiw58.top' || $host == 'ummmm.top' || $host == 'www.ummmm.top' || $host == 'zhoufb.com' || $host == 'www.zhoufb.com' || $host == '510k.top' || $host == 'www.510k.top' || $host == 'hb184.top' || $host == 'www.hb184.top' || $host == 'totti.top' || $host == 'www.totti.top' || $host == 'p10.top' || $host == 'www.p10.top' || $host == 'ip101.top' || $host == 'www.ip101.top' || $host == 'linkse.top' || $host == 'www.linkse.top' || $host == 'v315.top' || $host == 'www.v315.top' || $host == 'gxsun.top' || $host == 'www.gxsun.top' || $host == 'wh168.top' || $host == 'www.wh168.top' || $host == 'iann.top' || $host == 'www.iann.top' || $host == 'aalin.top' || $host == 'www.aalin.top' || $host == 'smileit.top' || $host == 'www.smileit.top' || $host == 'cxhd.top' || $host == 'www.cxhd.top' || $host == 'n10.top' || $host == 'www.n10.top' || $host == 'supercc.top' || $host == 'www.supercc.top' || $host == 'lucky520.top' || $host == 'www.lucky520.top' || $host == 'ray1997.top' || $host == 'www.ray1997.top' || $host == 'lovephp.top' || $host == 'www.lovephp.top'
            ) { 
                group = 'webgof06'; 
            }
            else if (
                $host == 'yicon.top' || $host == 'www.yicon.top' || $host == '68wz.top' || $host == 'www.68wz.top' || $host == 'myzz520.top' || $host == 'www.myzz520.top' || $host == 'wa520.top' || $host == 'www.wa520.top' || $host == 'szzbb.top' || $host == 'www.szzbb.top' || $host == 'fcun.top' || $host == 'www.fcun.top' || $host == '7ch.top' || $host == 'www.7ch.top' || $host == 'yyg5.top' || $host == 'www.yyg5.top' || $host == 'zfr96.top' || $host == 'www.zfr96.top' || $host == 'cysu.top' || $host == 'www.cysu.top' || $host == 'sx02.top' || $host == 'www.sx02.top' || $host == 'wo1.top' || $host == 'www.wo1.top' || $host == 'leezk.top' || $host == 'www.leezk.top' || $host == 'iseep.top' || $host == 'www.iseep.top' || $host == '7k7.top' || $host == 'www.7k7.top' || $host == 'ny01.top' || $host == 'www.ny01.top' || $host == 'so188.top' || $host == 'www.so188.top' || $host == 'u9b.top' || $host == 'www.u9b.top' || $host == '95nu.top' || $host == 'www.95nu.top' || $host == 'hb191.top' || $host == 'www.hb191.top' || $host == 'y10.top' || $host == 'www.y10.top' || $host == 'winwb.top' || $host == 'www.winwb.top' || $host == '688xy.com' || $host == 'www.688xy.com' || $host == 'fhx88.com' || $host == 'www.fhx88.com' || $host == 'mjsj.top' || $host == 'www.mjsj.top' || $host == 'bjuu.top' || $host == 'www.bjuu.top' || $host == '360gs.top' || $host == 'www.360gs.top' || $host == 'queenking.top' || $host == 'www.queenking.top' || $host == 'b7s.top' || $host == 'www.b7s.top' || $host == 'xigg.top' || $host == 'www.xigg.top' || $host == '14sb.top' || $host == 'www.14sb.top' || $host == '081024.top' || $host == 'www.081024.top' || $host == 'pz11.top' || $host == 'www.pz11.top' || $host == 's188.top' || $host == 'www.s188.top' || $host == 'v389.top' || $host == 'www.v389.top' || $host == 'hb245.top' || $host == 'www.hb245.top' || $host == 'veve9999.com' || $host == 'www.veve9999.com' || $host == 'wapb.top' || $host == 'www.wapb.top' || $host == 'yn1u.top' || $host == 'www.yn1u.top' || $host == 'lzy688.cn' || $host == 'www.lzy688.cn' || $host == 'yoyoxm.cn' || $host == 'www.yoyoxm.cn' || $host == 'zzzdsb.cn' || $host == 'www.zzzdsb.cn' || $host == 'fbc6688.com' || $host == 'www.fbc6688.com' || $host == 'nb168nb.com' || $host == 'www.nb168nb.com' || $host == 'fb199.com' || $host == 'www.fb199.com' || $host == 'tomx.top' || $host == 'www.tomx.top' || $host == '95xxk.top' || $host == 'www.95xxk.top' || $host == 'ssvww.top' || $host == 'www.ssvww.top' || $host == '214.cash' || $host == 'www.214.cash' || $host == '298.cash' || $host == 'www.298.cash'
            ) { 
                group = 'webgof07'; 
            }
            else if (
                $host == 'gg888.live' || $host == 'www.gg888.live' || $host == 'gg288.vip' || $host == 'www.gg288.vip' || $host == 'vip13888.vip' || $host == 'www.vip13888.vip' || $host == 'vip22.vip' || $host == 'www.vip22.vip' || $host == 'vip148.vip' || $host == 'www.vip148.vip' || $host == 'vip68.vip' || $host == 'www.vip68.vip' || $host == 'sx128.vip' || $host == 'www.sx128.vip' || $host == 'skcgame1.com' || $host == 'www.skcgame1.com' || $host == 'skc0game1.com' || $host == 'www.skc0game1.com' || $host == 'skc1game1.com' || $host == 'www.skc1game1.com' || $host == 'skc2game1.com' || $host == 'www.skc2game1.com' || $host == 'skc3game1.com' || $host == 'www.skc3game1.com' || $host == 'skc4game1.com' || $host == 'www.skc4game1.com' || $host == 'skc5game1.com' || $host == 'www.skc5game1.com' || $host == 'skc6game1.com' || $host == 'www.skc6game1.com' || $host == 'dayday168.vip' || $host == 'www.dayday168.vip' || $host == 'game168.live' || $host == 'www.game168.live' || $host == 'lion8888.vip' || $host == 'www.lion8888.vip' || $host == 'lion8888.cc' || $host == 'www.lion8888.cc' || $host == 'gameonehk138.com' || $host == 'www.gameonehk138.com' || $host == 'gameonehk18.com' || $host == 'www.gameonehk18.com' || $host == 'winner168.vip' || $host == 'www.winner168.vip' || $host == 'vip1688.one' || $host == 'www.vip1688.one' || $host == 'game1wp.com' || $host == 'www.game1wp.com' || $host == '456.cash' || $host == 'www.456.cash' || $host == '997.cash' || $host == 'www.997.cash' || $host == '168game.vip' || $host == 'www.168game.vip' || $host == '118game.vip' || $host == 'www.118game.vip' || $host == 'wingame.cc' || $host == 'www.wingame.cc' || $host == 'gogo128.cc' || $host == 'www.gogo128.cc' || $host == 'eatbanana.cc' || $host == 'www.eatbanana.cc' || $host == 'chisinzzz.com' || $host == 'www.chisinzzz.com' || $host == 'game368.net' || $host == 'www.game368.net' || $host == 'gameone18.com' || $host == 'www.gameone18.com' || $host == 'gameone128.com' || $host == 'www.gameone128.com' || $host == 'sisballchat.com' || $host == 'www.sisballchat.com' || $host == 'go2888.com' || $host == 'www.go2888.com' || $host == 'go3688.com' || $host == 'www.go3688.com' ||  $host == 'gchk168.com' || $host == 'www.gchk168.com' || $host == 'game1asian.net' || $host == 'www.game1asian.net' || $host == 'gameone188.com' || $host == 'www.gameone188.com' || $host == 'gameone369.vip' || $host == 'www.gameone369.vip' || $host == 'g1aisan.com' || $host == 'www.g1aisan.com' || $host == 'game6668.vip' || $host == 'www.game6668.vip' || $host == 'gameone168.com' || $host == 'www.gameone168.com' || $host == 'game2888.vip' || $host == 'www.game2888.vip' || $host == 'gg168.vip' || $host == 'www.gg168.vip' || $host == 'gameone138.com' || $host == 'www.gameone138.com' || $host == 'gameone888.cc' || $host == 'www.gameone888.cc' || $host == 'vip338.cc' || $host == 'www.vip338.cc'
            ) { 
                group = 'webgof08'; 
            }
            else if (
                $host == 'game1668.vip' || $host == 'www.game1668.vip' || $host == 'game1838.com' || $host == 'www.game1838.com' || $host == 'game1348.com' || $host == 'www.game1348.com' || $host == 'game1hk.cc' || $host == 'www.game1hk.cc' || $host == 'game1behk.com' || $host == 'www.game1behk.com' || $host == 'bljsss.com' || $host == 'www.bljsss.com' || $host == 'game1886.com' || $host == 'www.game1886.com' || $host == 'gameone.cash' || $host == 'www.gameone.cash' || $host == 'soccerbet.cc' || $host == 'www.soccerbet.cc' || $host == 'rmclub777.com' || $host == 'www.rmclub777.com' || $host == 'lucky11game88.vip' || $host == 'www.lucky11game88.vip' || $host == 'game68.club' || $host == 'www.game68.club' || $host == '686806.cc' || $host == 'www.686806.cc' || $host == 'wingame1.com' || $host == 'www.wingame1.com' || $host == 'wingame68.com' || $host == 'www.wingame68.com' || $host == 'games1.cc' || $host == 'www.games1.cc' || $host == '68sgame.com' || $host == 'www.68sgame.com' || $host == 'good188.vip' || $host == 'www.good188.vip' || $host == 'good168.vip' || $host == 'www.good168.vip' || $host == 'good128.vip' || $host == 'www.good128.vip' || $host == 'joker001.com' || $host == 'www.joker001.com' || $host == 'win668.cc' || $host == 'www.win668.cc' || $host == 'win369.cc' || $host == 'www.win369.cc' || $host == 'joker001.cc' || $host == 'www.joker001.cc' || $host == '686game.club' || $host == 'www.686game.club' || $host == '666win.vip' || $host == 'www.666win.vip' || $host == 'good668.cc' || $host == 'www.good668.cc' || $host == 'wow9898.vip' || $host == 'www.wow9898.vip' || $host == 'game-one.online' || $host == 'www.game-one.online' || $host == 'club749.club' || $host == 'www.club749.club' || $host == 'fc888club.com' || $host == 'www.fc888club.com' || $host == 'lucky888.one' || $host == 'www.lucky888.one' || $host == 'lucky18.cc' || $host == 'www.lucky18.cc' || $host == 'no1game.vip' || $host == 'www.no1game.vip' || $host == 'yes68.cc' || $host == 'www.yes68.cc' || $host == '28game.cc' || $host == 'www.28game.cc' || $host == 'win9999.vip' || $host == 'www.win9999.vip' || $host == 'win6888.vip' || $host == 'www.win6888.vip' || $host == 'game1628.com' || $host == 'www.game1628.com' || $host == 'game13888.com' || $host == 'www.game13888.com' || $host == 'winya168.com' || $host == 'www.winya168.com' || $host == 'game148.vip' || $host == 'www.game148.vip' || $host == 'game777.vip' || $host == 'www.game777.vip' || $host == 'game333.vip' || $host == 'www.game333.vip' || $host == 'gameone.cc' || $host == 'www.gameone.cc' || $host == 'gameonehk.com' || $host == 'www.gameonehk.com' || $host == 'no1game.cc' || $host == 'www.no1game.cc' || $host == 'joker002.com' || $host == 'www.joker002.com' || $host == 'win666win.com' || $host == 'www.win666win.com' || $host == 'winner666.cc' || $host == 'www.winner666.cc'
            ) { 
                group = 'webgof09'; 
            }
            else if (
                $host == 'best668.vip' || $host == 'www.best668.vip' || $host == 'best678.cc' || $host == 'www.best678.cc' || $host == 'go668.cc' || $host == 'www.go668.cc' || $host == 'vip68.cc' || $host == 'www.vip68.cc' || $host == 'vip368.vip' || $host == 'www.vip368.vip' || $host == '16288hk.com' || $host == 'www.16288hk.com' || $host == 'vip28.vip' || $host == 'www.vip28.vip' || $host == 'winwin66.vip' || $host == 'www.winwin66.vip' || $host == 'cchy8.cc' || $host == 'www.cchy8.cc' || $host == 'game999.vip' || $host == 'www.game999.vip' || $host == 'gameonehk888.com' || $host == 'www.gameonehk888.com' || $host == 'cash168.cc' || $host == 'www.cash168.cc' || $host == 'topgame1.com' || $host == 'www.topgame1.com' || $host == 'game328.cc' || $host == 'www.game328.cc' || $host == 'game12.vip' || $host == 'www.game12.vip' || $host == 'xx168.cc' || $host == 'www.xx168.cc' || $host == 'vip128.vip' || $host == 'www.vip128.vip' || $host == 'go288.cc' || $host == 'www.go288.cc' || $host == 'go888.cc' || $host == 'www.go888.cc' || $host == 'game668.live' || $host == 'www.game668.live' || $host == 'hkgame148.com' || $host == 'www.hkgame148.com' || $host == 'fun338.com' || $host == 'www.fun338.com' || $host == 'happy68.cc' || $host == 'www.happy68.cc' || $host == 'cash68.vip' || $host == 'www.cash68.vip' || $host == 'cash88.vip' || $host == 'www.cash88.vip' || $host == 'cashgame.vip' || $host == 'www.cashgame.vip' || $host == 'gameonevip.cc' || $host == 'www.gameonevip.cc' || $host == 'gameonecity.com' || $host == 'www.gameonecity.com' || $host == 'gameplay668.cc' || $host == 'www.gameplay668.cc' || $host == '128668.vip' || $host == 'www.128668.vip' || $host == 'game668.vip' || $host == 'www.game668.vip' || $host == 'ball888.vip' || $host == 'www.ball888.vip' || $host == 'game368.cc' || $host == 'www.game368.cc' || $host == 'game3688.com' || $host == 'www.game3688.com' || $host == 'winwin168.vip' || $host == 'www.winwin168.vip' || $host == 'cmwin8.com' || $host == 'www.cmwin8.com' || $host == 'super288.vip' || $host == 'www.super288.vip' || $host == 'king888.club' || $host == 'www.king888.club' || $host == 'ezwin188.com' || $host == 'www.ezwin188.com' || $host == 'goal666.vip' || $host == 'www.goal666.vip' || $host == 'lucky288.cc' || $host == 'www.lucky288.cc' || $host == 'hkbet.cc' || $host == 'www.hkbet.cc' || $host == 'game668.cc' || $host == 'www.game668.cc' || $host == 'cf888.one' || $host == 'www.cf888.one' || $host == '9898winzone.com' || $host == 'www.9898winzone.com' || $host == 'game1356.cc' || $host == 'www.game1356.cc' || $host == 'gameone2018.com' || $host == 'www.gameone2018.com' || $host == 'gameone888.com' || $host == 'www.gameone888.com' || $host == '2018gameone.com' || $host == 'www.2018gameone.com' || $host == 'gohk.live' || $host == 'www.gohk.live'
            ) { 
                group = 'webgof10'; 
            }
            else if (
                $host == '6688.cash' || $host == 'www.6688.cash' || $host == '128game.vip' || $host == 'www.128game.vip' || $host == 'go188.vip' || $host == 'www.go188.vip' || $host == 'winwin6.cc' || $host == 'www.winwin6.cc' || $host == 'hk668.club' || $host == 'www.hk668.club' || $host == '33668.vip' || $host == 'www.33668.vip' || $host == 'hkgame.cc' || $host == 'www.hkgame.cc' || $host == 'gamehk.cc' || $host == 'www.gamehk.cc' || $host == 'game368.vip' || $host == 'www.game368.vip' || $host == 'bigtwo.cc' || $host == 'www.bigtwo.cc' || $host == 'go168.cc' || $host == 'www.go168.cc' || $host == 'girl38.cc' || $host == 'www.girl38.cc' || $host == 'win16868.com' || $host == 'www.win16868.com' || $host == 'hkgame.club' || $host == 'www.hkgame.club' || $host == 'gameone520.com' || $host == 'www.gameone520.com' || $host == 'game268.vip' || $host == 'www.game268.vip' || $host == 'goodluck222.com' || $host == 'www.goodluck222.com' || $host == 'gm2888.cc' || $host == 'www.gm2888.cc' || $host == 'go1288.cc' || $host == 'www.go1288.cc' || $host == 'go1368.vip' || $host == 'www.go1368.vip' || $host == '28368.vip' || $host == 'www.28368.vip' || $host == '68668.club' || $host == 'www.68668.club' || $host == 'hklucky888.com' || $host == 'www.hklucky888.com' || $host == 'gm6888.cc' || $host == 'www.gm6888.cc' || $host == 'gm5888.cc' || $host == 'www.gm5888.cc' || $host == 'gm4888.cc' || $host == 'www.gm4888.cc' || $host == 'gm3888.co' || $host == 'www.gm3888.co' || $host == 'hkgame68.com' || $host == 'www.hkgame68.com' || $host == 'gohk888.com' || $host == 'www.gohk888.com' || $host == 'gameonehk168.com' || $host == 'www.gameonehk168.com' || $host == 'wai228.com' || $host == 'www.wai228.com' || $host == 'game1x8.com' || $host == 'www.game1x8.com' || $host == 'gamecity88.com' || $host == 'www.gamecity88.com' || $host == 'game148.cc' || $host == 'www.game148.cc' || $host == 'cc688.vip' || $host == 'www.cc688.vip' || $host == 'cc688.net' || $host == 'www.cc688.net' || $host == 'gameonecasino.com' || $host == 'www.gameonecasino.com' || $host == 'surewin682.com' || $host == 'www.surewin682.com' || $host == 'go28.vip' || $host == 'www.go28.vip' || $host == 'go668.vip' || $host == 'www.go668.vip' || $host == 'tuenmun888.cc' || $host == 'www.tuenmun888.cc' || $host == 'top68.vip' || $host == 'www.top68.vip' || $host == 'go999.vip' || $host == 'www.go999.vip' || $host == 'vv3828.com' || $host == 'www.vv3828.com' || $host == 'pd0727.com' || $host == 'www.pd0727.com' || $host == 'cbc888.vip' || $host == 'www.cbc888.vip' || $host == 'gamewin888.com' || $host == 'www.gamewin888.com' || $host == 'hkbetwin.cc' || $host == 'www.hkbetwin.cc' || $host == 'game268.cc' || $host == 'www.game268.cc' || $host == 'gm7888.cc' || $host == 'www.gm7888.cc'
            ) { 
                group = 'webgof11'; 
            }
            else if (
                $host == 'go1268.com' || $host == 'www.go1268.com' || $host == '868win.com' || $host == 'www.868win.com' || $host == 'play268.com' || $host == 'www.play268.com' || $host == 'game1686.cc' || $host == 'www.game1686.cc' || $host == 'game239.cc' || $host == 'www.game239.cc' || $host == '331.cash' || $host == 'www.331.cash' || $host == 'gameone28.com' || $host == 'www.gameone28.com' || $host == 'gameone68.com' || $host == 'www.gameone68.com' || $host == 'gameone628.com' || $host == 'www.gameone628.com' || $host == '1228.cash' || $host == 'www.1228.cash' || $host == 'game166.cc' || $host == 'www.game166.cc' || $host == 'gameone007.cc' || $host == 'www.gameone007.cc' || $host == 'game008.cc' || $host == 'www.game008.cc' || $host == 'game1006.cc' || $host == 'www.game1006.cc' || $host == 'game009.cc' || $host == 'www.game009.cc' || $host == 'game128.cc' || $host == 'www.game128.cc' || $host == '128.money' || $host == 'www.128.money' || $host == '1668.cash' || $host == 'www.1668.cash' || $host == 'game238.net' || $host == 'www.game238.net' || $host == 'hkgame168.com' || $host == 'www.hkgame168.com' || $host == 'ming1980.com' || $host == 'www.ming1980.com' || $host == 'jp168.vip' || $host == 'www.jp168.vip' || $host == 'game888.cc' || $host == 'www.game888.cc' || $host == 'vip118.vip' || $host == 'www.vip118.vip' || $host == 'jjworld.vip' || $host == 'www.jjworld.vip' || $host == 'kit888.vip' || $host == 'www.kit888.vip' || $host == 'hkgc.cc' || $host == 'www.hkgc.cc' || $host == 'game1asian.com' || $host == 'www.game1asian.com' || $host == 'game288.cc' || $host == 'www.game288.cc' || $host == 'games666.vip' || $host == 'www.games666.vip' || $host == 'play266.com' || $host == 'www.play266.com' || $host == 'play268.cc' || $host == 'www.play268.cc' || $host == 'live268.com' || $host == 'www.live268.com' || $host == 'game886.vip' || $host == 'www.game886.vip' || $host == '68casino.cc' || $host == 'www.68casino.cc' || $host == '68game.vip' || $host == 'www.68game.vip' || $host == '66game.vip' || $host == 'www.66game.vip' || $host == 'beteasyhk.com' || $host == 'www.beteasyhk.com' || $host == 'All-in888.com' || $host == 'www.All-in888.com' || $host == '168game168.com' || $host == 'www.168game168.com' || $host == '168play.vip' || $host == 'www.168play.vip' || $host == 'goc.bet' || $host == 'www.goc.bet' || $host == 'game81.vip' || $host == 'www.game81.vip' || $host == 'game82.vip' || $host == 'www.game82.vip' || $host == 'game83.vip' || $host == 'www.game83.vip' || $host == 'go666.one' || $host == 'www.go666.one' || $host == 'jackripper.vip' || $host == 'www.jackripper.vip' || $host == 'watchingyou.vip' || $host == 'www.watchingyou.vip' || $host == 'game222.cc' || $host == 'www.game222.cc' || $host == 'game333.cc' || $host == 'www.game333.cc'
            ) { 
                group = 'webgof12'; 
            }
            else if (
                $host == 'bigwin666.cc' || $host == 'www.bigwin666.cc' || $host == 'magicxgame.com' || $host == 'www.magicxgame.com' || $host == 'hkhk168.com' || $host == 'www.hkhk168.com' || $host == 'hkgame368.com' || $host == 'www.hkgame368.com' || $host == 'pp513.cc' || $host == 'www.pp513.cc' || $host == 'gameone01.com' || $host == 'www.gameone01.com' || $host == 'gameone001.com' || $host == 'www.gameone001.com' || $host == 'ecgame.cc' || $host == 'www.ecgame.cc' || $host == 'gameonewinwin.com' || $host == 'www.gameonewinwin.com' || $host == 'gameone999.com' || $host == 'www.gameone999.com' || $host == 'gameone77.com' || $host == 'www.gameone77.com' || $host == 'gamewin.one' || $host == 'www.gamewin.one' || $host == 'gameonehk2288.com' || $host == 'www.gameonehk2288.com' || $host == 'vip888hk.com' || $host == 'www.vip888hk.com' || $host == 'hkvip888.vip' || $host == 'www.hkvip888.vip' || $host == 'g1hkg1.com' || $host == 'www.g1hkg1.com' || $host == 'gameonesurewin.com' || $host == 'www.gameonesurewin.com' || $host == 'khmoney3388.com' || $host == 'www.khmoney3388.com' || $host == 'ee222.vip' || $host == 'www.ee222.vip' || $host == 'gameonehk2502.com' || $host == 'www.gameonehk2502.com' || $host == 'gameonehk1798.com' || $host == 'www.gameonehk1798.com' || $host == 'game1668.cc' || $host == 'www.game1668.cc' || $host == 'game999.live' || $host == 'www.game999.live' || $host == 'gameonekk.com' || $host == 'www.gameonekk.com' || $host == 'goodluck.one' || $host == 'www.goodluck.one' || $host == 'cv18game.vip' || $host == 'www.cv18game.vip' || $host == 'matt1996.com' || $host == 'www.matt1996.com' || $host == 'sure888.cc' || $host == 'www.sure888.cc' || $host == 'sfd888.cc' || $host == 'www.sfd888.cc' || $host == 'sbet007.cc' || $host == 'www.sbet007.cc' || $host == 'money001.cc' || $host == 'www.money001.cc' || $host == 'money002.cc' || $host == 'www.money002.cc' || $host == 'winwin999.vip' || $host == 'www.winwin999.vip' || $host == 'winwin777.cc' || $host == 'www.winwin777.cc' || $host == 'win16688.vip' || $host == 'www.win16688.vip' || $host == 'win3328.com' || $host == 'www.win3328.com' || $host == 'igame28.cc' || $host == 'www.igame28.cc' || $host == 'boy388.com' || $host == 'www.boy388.com' || $host == 'smile666.vip' || $host == 'www.smile666.vip' || $host == 'smile68.vip' || $host == 'www.smile68.vip' || $host == '8king.cc' || $host == 'www.8king.cc' || $host == 'win168.online' || $host == 'www.win168.online' || $host == 'csd998.top' || $host == 'www.csd998.top' || $host == 'winwin888.vip' || $host == 'www.winwin888.vip' || $host == 'winwin888.cc' || $host == 'www.winwin888.cc' || $host == 'luckycoin.one' || $host == 'www.luckycoin.one' || $host == 'gameone0139.com' || $host == 'www.gameone0139.com' || $host == 'game1party.com' || $host == 'www.game1party.com' || $host == 'j2035999.com' || $host == 'www.j2035999.com' || $host == 'et2233.com' || $host == 'www.et2233.com'
            ) { 
                group = 'webgof13'; 
            }
            else if (
                $host == '3688win.com' || $host == 'www.3688win.com' || $host == '3888win.com' || $host == 'www.3888win.com' || $host == '288play.com' || $host == 'www.288play.com' || $host == 'gameone228.com' || $host == 'www.gameone228.com' || $host == 'eurolivefootball.com' || $host == 'www.eurolivefootball.com' || $host == '668go.club' || $host == 'www.668go.club' || $host == '638go.com' || $host == 'www.638go.com' || $host == '818go.vip' || $host == 'www.818go.vip' || $host == 'ip168.fun' || $host == 'www.ip168.fun' || $host == '268go.vip' || $host == 'www.268go.vip' || $host == '388game.vip' || $host == 'www.388game.vip' || $host == '168gogo.vip' || $host == 'www.168gogo.vip' || $host == 'llluminati.cc' || $host == 'www.llluminati.cc' || $host == 'king128.cc' || $host == 'www.king128.cc' || $host == 'money008.cc' || $host == 'www.money008.cc' || $host == 'money68.cc' || $host == 'www.money68.cc' || $host == 'money228.cc' || $host == 'www.money228.cc' || $host == 'money28.vip' || $host == 'www.money28.vip' || $host == 'hkgame.vip' || $host == 'www.hkgame.vip' || $host == 'bets22.com' || $host == 'www.bets22.com' || $host == 'sk-4.com' || $host == 'www.sk-4.com' || $host == 'money18.vip' || $host == 'www.money18.vip' || $host == 'gameoneeasywin.com' || $host == 'www.gameoneeasywin.com' || $host == 'game2828.cc' || $host == 'www.game2828.cc' || $host == 'game2838.com' || $host == 'www.game2838.com' || $host == 'gameonehk0857.com' || $host == 'www.gameonehk0857.com' || $host == 'play168.vip' || $host == 'www.play168.vip' || $host == 'play266.cc' || $host == 'www.play266.cc' || $host == 'play368.vip' || $host == 'www.play368.vip' || $host == 'play368.live' || $host == 'www.play368.live' || $host == 'game338.vip' || $host == 'www.game338.vip' || $host == 'skc7game1.com' || $host == 'www.skc7game1.com' || $host == 'skc8game1.com' || $host == 'www.skc8game1.com' || $host == 'tgluckygame.com' || $host == 'www.tgluckygame.com' || $host == 'ecw6666.vip' || $host == 'www.ecw6666.vip' || $host == 'ec666.vip' || $host == 'www.ec666.vip' || $host == 'winwin168.online' || $host == 'www.winwin168.online' || $host == 'winwin168.one' || $host == 'www.winwin168.one' || $host == 'bets8.net' || $host == 'www.bets8.net' || $host == 'wingame77.com' || $host == 'www.wingame77.com' || $host == 'wingame1.cc' || $host == 'www.wingame1.cc' || $host == 'd1gameone.com' || $host == 'www.d1gameone.com' || $host == 'wingame01.cc' || $host == 'www.wingame01.cc' || $host == 'wingame02.cc' || $host == 'www.wingame02.cc' || $host == 'wingame03.cc' || $host == 'www.wingame03.cc' || $host == 'wingame06.cc' || $host == 'www.wingame06.cc' || $host == 'gameone.online' || $host == 'www.gameone.online' || $host == 'aj-casino.com' || $host == 'www.aj-casino.com' || $host == 'gm9888.cc' || $host == 'www.gm9888.cc' || $host == 'win238win.com' || $host == 'www.win238win.com' || $host == 'game338.cc' || $host == 'www.game338.cc' || $host == 'game38fg.cc' || $host == 'www.game38fg.cc'
            ) { 
                group = 'webgof14'; 
            }
            else if (
                $host == 'wingame188.com' || $host == 'www.wingame188.com' || $host == 'wingame168.vip' || $host == 'www.wingame168.vip' || $host == 'easy68.vip' || $host == 'www.easy68.vip' || $host == '168win.vip' || $host == 'www.168win.vip' || $host == '168win.cc' || $host == 'www.168win.cc' || $host == 'gameone116.com' || $host == 'www.gameone116.com' || $host == 'ss168s.com' || $host == 'www.ss168s.com' || $host == 'wingame.one' || $host == 'www.wingame.one' || $host == 'kinggame.net' || $host == 'www.kinggame.net' || $host == 'game068.vip' || $host == 'www.game068.vip' || $host == 'game008.vip' || $host == 'www.game008.vip' || $host == 'gameone.vip' || $host == 'www.gameone.vip' || $host == 'vip128.cc' || $host == 'www.vip128.cc' || $host == 'livegame1.com' || $host == 'www.livegame1.com' || $host == 'gameone.fun' || $host == 'www.gameone.fun' || $host == 'gamehk88.com' || $host == 'www.gamehk88.com' || $host == 'win19.cc' || $host == 'www.win19.cc' || $host == 'game128.bet' || $host == 'www.game128.bet' || $host == 'game1288.vip' || $host == 'www.game1288.vip' || $host == 'game6868.vip' || $host == 'www.game6868.vip' || $host == 'herogame.vip' || $host == 'www.herogame.vip' || $host == 'herogame88.vip' || $host == 'www.herogame88.vip' || $host == 'herogame888.vip' || $host == 'www.herogame888.vip' || $host == 'd2gameone.com' || $host == 'www.d2gameone.com' || $host == 'gameone13888.com' || $host == 'www.gameone13888.com' || $host == 'game1666.cc' || $host == 'www.game1666.cc' || $host == 'gameone2888.com' || $host == 'www.gameone2888.com' || $host == 'gameone222.com' || $host == 'www.gameone222.com' || $host == 'gameone333.com' || $host == 'www.gameone333.com' || $host == 'joker002.com' || $host == 'www.joker002.com' || $host == '88game1.net' || $host == 'www.88game1.net' || $host == 'g18888.cc' || $host == 'www.g18888.cc' || $host == 'winwin188.cc' || $host == 'www.winwin188.cc'  || $host == 'alwaywin.com' || $host == 'www.alwaywin.com' || $host == 'gameone688.com' || $host == 'www.gameone688.com' || $host == 'gameone238.com' || $host == 'www.gameone238.com' || $host == 'gameone123.com' || $host == 'www.gameone123.com' || $host == 'gameone666.vip' || $host == 'www.gameone666.vip' || $host == 'gameone666.cc' || $host == 'www.gameone666.cc' || $host == 'game178.cc' || $host == 'www.game178.cc' || $host == 'lucky08.cc' || $host == 'www.lucky08.cc' || $host == '666gogo.cc' || $host == 'www.666gogo.cc' || $host == '138gogo.cc' || $host == 'www.138gogo.cc' || $host == 'game1129.com' || $host == 'www.game1129.com' || $host == 'hkonlinegame.com' || $host == 'www.hkonlinegame.com' || $host == 'ck668s.com' || $host == 'www.ck668s.com' || $host == 'home668.vip' || $host == 'www.home668.vip'
            ) { 
                group = 'webgof15'; 
            }
            else if (
                $host == 'ph1088.com' || $host == 'www.ph1088.com' || $host == 'gamewin27.com' || $host == 'www.gamewin27.com' || $host == 'momo288.com' || $host == 'www.momo288.com' || $host == 'game1.space' || $host == 'www.game1.space' || $host == 'ew0703.com' || $host == 'www.ew0703.com' || $host == 'momo288.cc' || $host == 'www.momo288.cc' || $host == 'gameone1888.vip' || $host == 'www.gameone1888.vip' || $host == 'gameone8888.club' || $host == 'www.gameone8888.club' || $host == 'gameone8888.vip' || $host == 'www.gameone8888.vip' || $host == 'gameone888.club' || $host == 'www.gameone888.club' || $host == 'wingame.vip' || $host == 'www.wingame.vip' || $host == 'chuichui1222.com' || $host == 'www.chuichui1222.com' || $host == 'gameking666.com' || $host == 'www.gameking666.com' || $host == '9999hahaha.com' || $host == 'www.9999hahaha.com' || $host == 'gameone888.net' || $host == 'www.gameone888.net' || $host == 'gameone666.net' || $host == 'www.gameone666.net' || $host == 'mm1889.vip' || $host == 'www.mm1889.vip' || $host == 'game21.cc' || $host == 'www.game21.cc' || $host == 'gameone1888.com' || $host == 'www.gameone1888.com' || $host == 'gameone3388.com' || $host == 'www.gameone3388.com' || $host == 'gameonestart.net' || $host == 'www.gameonestart.net' || $host == 'cho888.net' || $host == 'www.cho888.net' || $host == 'vip1888.vip' || $host == 'www.vip1888.vip' || $host == 'gameone1888.net' || $host == 'www.gameone1888.net' || $host == 'inplaykinger.com' || $host == 'www.inplaykinger.com' || $host == 'win288.vip' || $host == 'www.win288.vip' || $host == 'win148.com' || $host == 'www.win148.com' || $host == 'game1.games' || $host == 'www.game1.games' || $host == 'acgame88.com' || $host == 'www.acgame88.com' || $host == 'game1allin.com' || $host == 'www.game1allin.com' || $host == 'game18.vip' || $host == 'www.game18.vip' || $host == 'rich168.cc' || $host == 'www.rich168.cc' || $host == 'wingame.bet' || $host == 'www.wingame.bet' || $host == 'gkgame.vip' || $host == 'www.gkgame.vip' || $host == 'sdgame.vip' || $host == 'www.sdgame.vip' || $host == 'girlstandup.online' || $host == 'www.girlstandup.online' || $host == 'winwin268.com' || $host == 'www.winwin268.com' || $host == 'win168win.vip' || $host == 'www.win168win.vip' || $host == 'gameone1356.vip' || $host == 'www.gameone1356.vip' || $host == 'top888cash.vip' || $host == 'www.top888cash.vip' || $host == 'vip191919.com' || $host == 'www.vip191919.com' || $host == 'gameone2828.com' || $host == 'www.gameone2828.com' || $host == 'wing168.vip' || $host == 'www.wing168.vip' || $host == 'fb77.cc' || $host == 'www.fb77.cc' || $host == 'game268.net' || $host == 'www.game268.net' || $host == 'game28.vip' || $host == 'www.game28.vip' || $host == 'qqgame19.vip' || $host == 'www.qqgame19.vip' || $host == 'gameoneace.com' || $host == 'www.gameoneace.com' || $host == 'gameoneking.com' || $host == 'www.gameoneking.com'
            ) { 
                group = 'webgof16'; 
            }
            else if (
                $host == 'x21.wm8888.vip' || $host == 'gameonefun.com' || $host == 'www.gameonefun.com' || $host == 'gameonesuper.com' || $host == 'www.gameonesuper.com' || $host == 'gameonestation.com' || $host == 'www.gameonestation.com' || $host == 'gameonecash.com' || $host == 'www.gameonecash.com' || $host == 'gameone838.com' || $host == 'www.gameone838.com' || $host == 'bet888.one' || $host == 'www.bet888.one' || $host == 'gameoneluck.com' || $host == 'www.gameoneluck.com' || $host == 'gameonelike.com' || $host == 'www.gameonelike.com' || $host == 'gameone88888.net' || $host == 'www.gameone88888.net' || $host == 'honeygem.net' || $host == 'www.honeygem.net' || $host == 'gameone2828.vip' || $host == 'www.gameone2828.vip' || $host == 'gameone28.vip' || $host == 'www.gameone28.vip' || $host == 'winmoney999.com' || $host == 'www.winmoney999.com' || $host == 'gameonefans.com' || $host == 'www.gameonefans.com' || $host == 'gameonenight.com' || $host == 'www.gameonenight.com' || $host == 'game1holiday.com' || $host == 'www.game1holiday.com' || $host == 'game1togehter.com' || $host == 'www.game1togehter.com' || $host == 'game1junior.com' || $host == 'www.game1junior.com' || $host == 'nicegameone.com' || $host == 'www.nicegameone.com' || $host == 'greatgameone.com' || $host == 'www.greatgameone.com' || $host == 'soccerbetone.com' || $host == 'www.soccerbetone.com' || $host == 'go8148.com' || $host == 'www.go8148.com' || $host == 'winwin888.bet' || $host == 'www.winwin888.bet' || $host == 'loklok.live' || $host == 'www.loklok.live' || $host == '888gogo.cc' || $host == 'www.888gogo.cc' || $host == '168gogo.cc' || $host == 'www.168gogo.cc' || $host == 'share12.com' || $host == 'www.share12.com'
            ) { 
                group = 'webgof17'; 
            }

            var keyArr = {
                webgof01 : {
                    siteKey : '6LczdkYbAAAAAH7NtV47e0KbVc5Q_F_bs3qVQqRW',
                    secretKey : '6LczdkYbAAAAAKU-ybSl_z-G21Fk-B-WtvVYbtpm',
                },
                webgof02 : {
                    siteKey : '6LdcAUkbAAAAAOAhRz85x2UQiwCREIZ1eq2pNMuI',
                    secretKey : '6LdcAUkbAAAAAKL266V90s5WuIMx6NZYB1GlLMj-',
                },
                webgof03 : {
                    siteKey : '6LdTBUkbAAAAAB2zid2qJSQ-KMlsSwlsgBThw_k0',
                    secretKey : '6LdTBUkbAAAAAMPc2SNotJ2zmaHCzwit2DC5919o',
                },
                webgof04 : {
                    siteKey : '6Lf0B0kbAAAAAMjrc98fILeaY3XuAz-dSzLhGK5S',
                    secretKey : '6Lf0B0kbAAAAAIO1LY1n-ARwb7c8ij-cGXptQH0m',
                },
                webgof05 : {
                    siteKey : '6LdMCUkbAAAAAAhwRWz4L3HrmTKElG91YoZRqIRA',
                    secretKey : '6LdMCUkbAAAAALpNqsCLStfheMvC6rLl1gekU9Qg',
                },
                webgof06 : {
                    siteKey : '6LeaDEkbAAAAADA6FfogXAfJ5PNYqOYVr1GN_GmH',
                    secretKey : '6LeaDEkbAAAAAIRRXKTr1hedSLGPHC-kSSXsd4S1',
                },
                webgof07 : {
                    siteKey : '6LeND0kbAAAAAECd1gK_J1PtPGOt7WrkQhzYLB0Y',
                    secretKey : '6LeND0kbAAAAAD5iUYMSOOnUiQPCW7yK_mU4YVP5',
                },
                webgof08 : {
                    siteKey : '6Ld1FEkbAAAAANQ89eG8uIvLomPDxV2W2QWQJzyq',
                    secretKey : '6Ld1FEkbAAAAAMoZyRPudZLO7aLdTkR1kiG0Un79',
                },
                webgof09 : {
                    siteKey : '6LdvF0kbAAAAACy4qH_kOWYJxbRK1zyiq6FDPDS7',
                    secretKey : '6LdvF0kbAAAAAA5Khw02yYmdRdU_cSoKR6gRB0hF',
                },
                webgof10 : {
                    siteKey : '6Le4GkkbAAAAAIaX005g-ZHqNnlttr8rNJJ2s-Iw',
                    secretKey : '6Le4GkkbAAAAAHPnrwangFHZTS3nc2JjDyaoKAbF',
                },
                webgof11 : {
                    siteKey : '6LfiHEkbAAAAAPjuqkqrzjaTaiG4wyG7IqdUrb_F',
                    secretKey : '6LfiHEkbAAAAABPwtpSIx6TlFK5eFzoA9SZIkV4m',
                },
                webgof12 : {
                    siteKey : '6LeJIEkbAAAAAON1u714Ca_VjV7fzJZzF1xRHfy7',
                    secretKey : '6LeJIEkbAAAAAKXHcYx1gN1l-HV6_8B2lO2auWoz',
                },
                webgof13 : {
                    siteKey : '6LeBKUkbAAAAAMxp98VeaGasMNIygj3xlUaWaiD_',
                    secretKey : '6LeBKUkbAAAAAJFmv3ZcVwIduWVKfttowWFvmi0O',
                },
                webgof14 : {
                    siteKey : '6Ld6KkkbAAAAAHfgr7en79pV-6wXLpJT-4dE_A4Z',
                    secretKey : '6Ld6KkkbAAAAALzBhK-Ef5mT3pBe4HSS61a82Q7C',
                },
                webgof15 : {
                    siteKey : '6LexLUkbAAAAAJYcyTpIbVUDwK28NGBJtKlENUVF',
                    secretKey : '6LexLUkbAAAAADZtFnHfjGj02oWU3r2ht9kQglnc',
                },
                webgof16 : {
                    siteKey : '6LcV9G4bAAAAAJJrbOhhToEeJcObMHJ7wMCumtSU',
                    secretKey : '6LcV9G4bAAAAAAOLKDjLQ4fBZuNcokzBwkaLTjXV',
                },
                webgof17 : {
                    siteKey : '6LeTuuIbAAAAAC5OnBh5k5qYQB81vlxkXvmI_LTW',
                    secretKey : '6LeTuuIbAAAAAJIVlu6Cm0eK3F2wt0_UCyLovRg3',
                },
            };

            return keyArr[group];
        },
        /**
         * param 參數 object
         * param.data 請求資料 object
         * param.done ajax完成執行該函數 function
         * param.fail ajax失敗執行該函數 function
         * param.options ajax設定
         */
        Api: {
            Login: function(param)
            {
                var cmd = 100;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    username: data.username,
                    password: data.password,
                    code: data.code,
                    host: App.GetConfig('ISAPP') == true ? App.GetConfig('HOSTURL') : App.GetConfig('HOST'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            Public.ClearLocalStorage();
                            App.SetLocalStorage({username: request.username, sid: msg.sid});
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            WechatLogin: function(param)
            {
                var cmd = 1000;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    wechatId: data.wechatId,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            App.ClearLocalStorage();
                            App.SetLocalStorage(msg);
                            App.Api.CreateGameUser();
                            // App.GoTo();
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            Logout: function(isClearLogin)
            {
                App.ClearLocalStorage(false, isClearLogin || false);
                // App.GoTo();
                App.WindowClose();
                location.reload();
            },
            Register: function(param)
            {
                var cmd = 1080;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    truename: data.truename,
                    pid: data.pid,
                    upid: data.upid,
                    sex: data.sex,
                    wechatId: data.wechatId,
                    wechatNote: data.wechatNote,
                };

                App.Ajax(request, options)
                    .done(done)
                    .fail(fail);
            },
            Registion: function(param)
            {
                var cmd = 108;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    username: data.username,
                    password: data.password,
                    password2: data.password2,
                    paypwd: data.paypwd,
                    paypwd2: data.paypwd2,
                    truename: data.truename,
                    email: data.email,
                    phone: data.phone,
                    pid: data.pid,
                    qq: data.qq,
                    line: data.line,
                    wechat: data.wechat,
                    agreeTerms: data.agreeTerms,
                    recaptchaResponse: data.recaptchaResponse,
                    host: location.hostname,
                    url: location.href,
                    phoneCode: data.phoneCode,
                    country1: 'hk', 
                };

                App.Ajax(request, options)
                    .done(done)
                    .fail(fail);
            },
            NewRegistion: function(param)
            {
                var cmd = 1081;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    username: data.username,
                    password: data.password,
                    password2: data.password2,
                    paypwd: data.paypwd,
                    paypwd2: data.paypwd2,
                    truename: data.truename,
                    email: data.email,
                    phone: data.phone,
                    pid: data.pid,
                    qq: data.qq,
                    line: data.line,
                    wechat: data.wechat,
                    agreeTerms: data.agreeTerms,
                    recaptchaResponse: data.recaptchaResponse,
                    host: location.hostname,
                    url: location.href,
                    phoneCode: data.phoneCode,
                    country1: 'hk', 
                };

                App.Ajax(request, options)
                    .done(done)
                    .fail(fail);
            },
            CreateGameUser: function(param)
            {
                var cmd = 118;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    userName: App.GetLocalStorage('username'),
                    gamemode: App.GetConfig('GAMEMODE'),
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            FreePlay: function(param)
            {
                var cmd = 901;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            var username = msg.username || false;
                            if (username)
                            {
                                var param = {
                                    data: {username: username, password: 'GUEST01'},
                                    options: {async: false},
                                    done: function(response)
                                    {
                                        var response = typeof(response) === 'object' ? response : {};
                                        var status = response.status || false;
                                        status && location.reload();
                                    }
                                };
                                App.Api.Login(param);
                            }
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            SetUserInfo: function(param)
            {
                var cmd = 101;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            App.SetLocalStorage(msg);
                        }
                        if (typeof(response) === 'object' && response.status != 0)
                        {
                            App.ClearLocalStorage();
                            // App.Api.FreePlay();
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetMoney: function(param)
            {
                var cmd = 200;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    gid: data.gid || 10,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0 && request.gid == 10)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            App.SetLocalStorage(msg);
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetGameAll: function(param)
            {
                var cmd = 110;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetGameHall: function(param)
            {
                var cmd = 300;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            App.GameHall = msg.gameHall;
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetGameGroup: function(param)
            {
                var cmd = 301;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            App.GameGroup = msg.gameGroup;
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetGameList: function(param)
            {
                var cmd = 302;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    device: App.GetConfig('DEVICE'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        if (typeof(response) === 'object' && response.status == 0)
                        {
                            var msg = typeof(response.msg) === 'object' ? response.msg : {};
                            App.GameList = msg.gameList;
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetGameReport: function(param)
            {
                var cmd = 530;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    gameHall: data.gameHall,
                    startTime: data.startTime,
                    endTime: data.endTime,
                    page: data.page,
                    num: data.num,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetTransferReport: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: data.cmd,
                    sid: App.GetLocalStorage('sid'),
                    startTime: data.startTime,
                    endTime: data.endTime,
                    page: data.page,
                    num: data.num,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetSystemNews: function(param)
            {
                var cmd = 700;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid') || '',
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetOfferApply: function(param)
            {
                var cmd = 260;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Apply: function(param)
            {
                var cmd = 261;

                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var activeid = data.activeid;

                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    id: activeid,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetOfferFree: function(param)
            {
                var cmd = 262;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            FreeApply: function(param)
            {
                var cmd = 263;

                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var activeid = data.activeid;

                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    id: activeid,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetUserNews: function(param)
            {
                var cmd = 701;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    type: data.type || 0,
                    page: data.page,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetUserNewsRead: function(param)
            {
                var cmd = 702;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    id: data.id,
                    msgid: data.msgid,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetWechatNews: function(param)
            {
                var cmd = 710;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: '',
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetReceiptAccount: function(param)
            {
                var cmd = 704;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Withdrawals: function(param)
            {
                var cmd = 202;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    paypwd: data.paypwd,
                    money: data.money,
                    auditmoney: data.auditmoney,
                    cost: data.cost,
                    withdrawalfee: data.withdrawalfee,
                    truemoney: data.truemoney,
                    bankId: data.bankId || 0,
                    typename: data.typename,
                    name: data.name,
                    alipayAccount: data.alipayAccount,
                    alipayNum: data.alipayNum,
                    fastTurnNum: data.fastTurnNum,
                    newbankName: data.newbankName,
                    newbankAccount: data.newbankAccount,
                    USDTAccount: data.USDTAccount,
                    USDTTRC20Account: data.USDTTRC20Account,
                    Ratiotruemoney: data.Ratiotruemoney,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            BankDeposit: function(param)
            {
                var cmd = 1203;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    money: data.money,
                    hnote: data.hnote,
                    intoId: data.intoId,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Deposit: function(param)
            {
                var cmd = 1223;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    money: data.money,
                    decimal: data.decimal,
                    type: data.type,
                    platform: data.platform,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Recharge: function(param)
            {
                var cmd = 223;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    money: data.money,
                    decimal: data.decimal,
                    type: data.type,
                    platform: data.platform,
                    autoStatus: data.autoStatus,
                    USDTAddress: data.USDTAddress,
                    bankcode: data.bankcode,
                    cointype: data.cointype,
                    merchanttype: data.merchanttype,
                    modetype: data.modetype,
                    truename: data.truename,
                    mobile: data.mobile,
                    email: data.email,
                    IFSC: data.IFSC,
                    bankname: data.bankname,
                    bank_account: data.bank_account,
                    bank_account_name: data.bank_account_name,
                    idcard: data.idcard,
                    phonecardType: data.phonecardType,
                    cardNumber: data.cardNumber,
                    serialNumber: data.serialNumber,
                    lang: data.lang,
                    hosturl: data.hosturl,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            OnlineQRDeposit: function(param)
            {
                var cmd = 214;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    money: data.money,
                    decimal: data.decimal,
                    intoId: data.intoId,
                    type: data.type,
                    trueName: data.trueName,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            OpenGame: function(param)
            {
                var cmd = 515;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var vendor = App.GetConfig('VENDOR');
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    gid: data.gid,
                    type: data.type,
                    gameid: data.gameid,
                    gamemode: App.GetConfig('GAMEMODE'),
                    device: App.GetConfig('DEVICE'),
                    viewsite: data.viewsite,
                    groupid: data.groupid,
                    ui: data.ui,
                    backurl: data.backurl,
                    lang: vendor.lang,
                    liveType: data.liveType,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            ChangeUsername: function(param)
            {
                var cmd = 113;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    username: data.username,
                    password: data.password,
                    password2: data.password2,
                    phone: data.phone,
                    paypwd: data.paypwd,
                    checkpaypwd: data.checkpaypwd,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            ChangePassword: function(param)
            {
                var cmd = 106;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    oldpassword: data.oldpassword,
                    password: data.password,
                    password2: data.password2,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            ChangePayPassword: function(param)
            {
                var cmd = 107;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    paypwd: data.oldpaypassword,
                    newpaypwd: data.newpaypassword,
                    newpaypwd2: data.newpaypassword2,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetLinePlatform: function(param)
            {
                var cmd = 706;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    type: data.type,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetLinePlatformtype: function(param)
            {
                var cmd = 707;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetPaymentlist: function(param)
            {
                var cmd = 708;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    payment: data.payment,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetOlinepayList: function(param)
            {
                var cmd = 709;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    type: data.type,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetDefaultWater: function(param)
            {
                var cmd = 600;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            SetDefaultWater: function(param)
            {
                var cmd = 601;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                $.extend(request, data);
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetOffline: function(param)
            {
                var cmd = 602;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    mid: data.mid
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetMemberReturn: function(param)
            {
                var cmd = 603;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    id: data.mid
                };
                App.Ajax(request)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            SetOfflineWater: function(param)
            {
                var cmd = 604;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var MemberReturn = data.MemberReturn;
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    data: data
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetOfflineReport: function(param)
            {
                var cmd = 605;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    gameHall: data.gameHall,
                    startTime: data.startTime,
                    endTime: data.endTime,
                    page: data.page,
                    num: data.num,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Getpromotion: function(param)
            {
                var cmd = 111;
                var done = param.done || new Function;
                var fail = param.fail || new Function;

                var request = {
                    cmd: cmd,
                };

                App.Ajax(request)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            AddBankcard: function(param)
            {
                var cmd = 205;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    truename: data.username || '',
                    account: data.bankcode || '',
                    checkaccount: data.bankcode || '',
                    name: data.bankname || '',
                    province: data.province || '',
                    city: data.city || '',
                    branch: data.branch || '',
                    ALIPAYAccount: data.ALIPAYAccount || '',
                    FPSAccount: data.FPSAccount || '',
                    USDTAccount: data.USDTAccount || '',
                    USDTAccountTRC20: data.USDTAccountTRC20 || '',
                    BEP20Account: data.BEP20Account || '',
                    BEP2Account: data.BEP2Account || '',
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            BindBankcard: function(param)
            {
                var cmd = 206;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid') || 0,
                    bankId: data.bankId,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            SetAuditmoney: function(param)
            {
                var cmd = 208;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid') || '',
                    username: App.GetLocalStorage('username'),
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            DeleteBankCard: function(param)
            {
                var cmd = 209;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid') || 0,
                    bankId: data.bankId,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetTransferReportRW: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: 536,
                    sid: App.GetLocalStorage('sid'),
                    startTime: data.startTime,
                    endTime: data.endTime,
                    page: data.page,
                    num: data.num,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            ChangeMoney: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: 204,
                    sid: App.GetLocalStorage('sid'),
                    source: data.source,
                    target: data.target,
                    money: data.money,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            reverseLastGameMoney: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: 1207,
                    sid: App.GetLocalStorage('sid'),
                    gid: data.gid,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            //微信取得會員資訊
            WechatUserInfoMain: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: 750,
                    code: data.code,
                    refreshToken: data.refreshToken,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        App.ClearLocalStorage('refreshToken');

                        if (typeof(response) === 'object' && response.status == 0 && typeof(response.msg) === 'object')
                        {
                            var msg = response.msg;
                            App.SetLocalStorage(msg);
                        }
                        else
                        {
                            App.ClearLocalStorage('refreshToken');
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            //微信防風驗證及取得會員資訊
            WPBUserInfoMain: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: 7500,
                    token: data.token,
                    uuid: data.uuid,
                };

                App.Ajax(request, options)
                    .done(function(response){

                        if (typeof(response) === 'object' && response.status == 0 && typeof(response.msg) === 'object' && typeof(response.msg.data) === 'object')
                        {
                            var data = response.msg.data;
                            App.SetLocalStorage(data);
                        }
                        done && done(response);
                    })
                    .fail(fail);
            },
            WPBGetLoginUrl: function(param)
            {
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: 7501,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Video: function(param)
            {
                var cmd = 760;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            setView: function(param)
            {
                var cmd = 537;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            setPid: function(param)
            {
                var cmd = 114;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};

                var host = location.href;
                if(host.indexOf("www.share12.com/") != -1)
                {
                    var hostArr = host.split('www.share12.com/');
                    var hostStr = hostArr[0] + hostArr[1];
                    var hostArr1 = hostStr.split('/');
                    host = hostArr1[2];
                }
                else if(host.indexOf("www.game1.space/") != -1)
                {
                    var hostArr = host.split('www.game1.space/');
                    var hostStr = hostArr[0] + hostArr[1];
                    var hostArr1 = hostStr.split('/');
                    host = hostArr1[2];
                }
                else
                {
                    host = location.hostname;
                }

                var request = {
                    cmd: cmd,
                    promotionurl: App.GetConfig('ISAPP') === true ? App.GetConfig('HOSTURL') : host,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            pointdataAdd: function(param)
            {
                var cmd = 711;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    username: localStorage.username,
                    type: data.type,
                    money: data.money,
                    bankname: data.bankname,
                    bankaccount: data.bankaccount,
                    phone: data.phone,
                    line: data.line,
                    note: data.hnote,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            Getpointlist: function(param)
            {
                var cmd = 712;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            GetWithdrawType: function(param)
            {
                var cmd = 713;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            pointTransfer: function(param)
            {
                var cmd = 215;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    username: localStorage.username,
                    username2: data.username2,
                    money: data.money,
                    needBet: data.needBet,
                    nowBet: data.nowBet,
                    paypwd: data.paypwd,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },

            checkActivityOrders: function(param)
            {
                var cmd = 216;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    username: localStorage.username,
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            
            checkDeposit: function(param)
            {
                var cmd = 705;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },

            GetAppVersion: function(param)
            {
                var cmd = 762;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: '',
                };

                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },

            GetLiveList: function(param)
            {
                var cmd = 303;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    username: App.GetLocalStorage('username'),
                    gamehall: data.gamehall,
                };

                App.Ajax(request, options)
                    .done(function(response){                        
                        done && done(response);
                    })
                    .fail(fail);
            },
            sendPhoneCheck: function(param)
            {
                var cmd = 115;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    phoneNumber: data.phoneNumber,
                    type: data.type,
                    recaptchaResponse: data.recaptchaResponse,
                    host: location.hostname,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
            NotifyPay: function(param)
            {
                var cmd = 714;
                var param = Object.prototype.toString.call(param) === '[object Object]' ? param : {};
                var data = param.data || {};
                var done = param.done || new Function;
                var fail = param.fail || new Function;
                var options = param.options || {};
                var request = {
                    cmd: cmd,
                    sid: App.GetLocalStorage('sid'),
                    order: data.order,
                    platform: data.platform,
                };
                App.Ajax(request, options)
                    .done(function(response){
                        done && done(response);
                    })
                    .fail(fail);
            },
        },
    };
    window.Public = App;
    Public.Initial();

})(jQuery);