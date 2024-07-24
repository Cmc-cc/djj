(function($){
    var version = 'x29.2.1P';
    var isApp = false;
    var siteIndex = '';
    var host = location.protocol + '//' + location.hostname;
    var hostUrlDef = 'http://game68.cc';
    var apiUrl = 'https://apix21b.gameone.online';
    var imgUrl = 'https://www.share12.com/www.game68.cc';
    // var imgUrl = 'https://wmhk-2021.s3.ap-east-1.amazonaws.com';
    var agentUrlDef = 'http://dgayt369.com';
    var appDownUrlDef = 'http://gameone.fun';
    var langDef = 'tw';
    var gamegroupIdDef = '';
    var siteSet = [];

    siteIndex = isApp ? siteIndex : siteSet.map(function(item) {
        return item.hostUrl;
    }).indexOf(host);
    if(siteIndex == -1) siteIndex = '';

    var hostUrl = (siteIndex in siteSet) && ('hostUrl' in siteSet[siteIndex]) ? siteSet[siteIndex].hostUrl : hostUrlDef;
    var agentUrl = (siteIndex in siteSet) && ('agentUrl' in siteSet[siteIndex]) ? siteSet[siteIndex].agentUrl : agentUrlDef;
    var appDownUrl = (siteIndex in siteSet) && ('appDownUrl' in siteSet[siteIndex]) ? siteSet[siteIndex].appDownUrl : appDownUrlDef;
    var lang = (siteIndex in siteSet) && ('lang' in siteSet[siteIndex]) ? siteSet[siteIndex].lang : langDef;
    var gamegroupId = (siteIndex in siteSet) && ('gamegroupId' in siteSet[siteIndex]) ? siteSet[siteIndex].gamegroupId : gamegroupIdDef;
    var imgType = (siteIndex in siteSet) && ('imgType' in siteSet[siteIndex]) ? siteSet[siteIndex].imgType : '';
    var title = (siteIndex in siteSet) && ('title' in siteSet[siteIndex]) ? siteSet[siteIndex].title : 'Game One';

    localStorage.lang = localStorage.lang && localStorage.lang != "true" && localStorage.lang != false ? localStorage.lang : lang;
    var app = {
        // V版本.站.台
        VERSION: version + siteIndex,
        // 模式 null or WPB(台北防封)
        WEIXINMODE: '',
        IFRAMEHOST: 'http://esrsc3.gameapi.fun',
        HOST: host,
        HOSTURL: hostUrl,
        APIURL: apiUrl + '/boxApi.php',
        CREATEQRCODEURL: apiUrl,
        PTURL: 'http://api.lx-api-dc.net/playtech/loginGame.html',
        WECHATAPIURL: 'http://esrsc3.gameapi.fun',
        AGENTURL: agentUrl,
        SERVICEURL: 'https://direct.lc.chat/12568494/',
        SERVICEIFRAME: true,
        GAMEURL: 'http://esrsc3.gameapi.fun/13DB43E3D1',
        FORMURL: 'http://esrsc3.gameapi.fun/form',
        APPURL: 'http://esrsc3.gameapi.fun/app',
        DEPOSITURL: 'http://esrsc3.gameapi.fun?function=wallet-center',
        WITHDRAWALURL: 'http://esrsc3.gameapi.fun?function=wallet-center',
        // QRPAYURL: isApp == true ? 'http://gameoneapp.com/images/qrpay/' : '../../images/qrpay/',
        QRPAYURL: 'https://gameoneapp.com/images/qrpay/',
        GAMEMODE: 'Single',
        DEVICE: 'mobile',
        ISAPP: isApp,
        APPDOWNLOAD: appDownUrl,
        BACKONEURL: 'http://esrsc3.gameapi.fun/',
        PROMOTIONURL: 'https://api.lx-api-dc.net/promotion/8888box/promotion/',
        VENDOR:
        {
            vendorId: 'test',
            signature: 'test',
            site: 'gof',
            lang: localStorage.lang,
        },
        DONTREMOVEITEM: ['rememberflag', 'loginaccount', 'loginpassword', 'backgroundsound', 'welcomesound', 'lang'],
        LOGINDONTREMOVEITEM: ['uuid', 'avatar', 'headimgurl', 'refreshToken'],
        GAMEGROUPID: gamegroupId,
        IMGTYPE: imgType,
        TITLE: '123',
        // EXTERNALURL: imgUrl + '/imgx21/wechat',
        EXTERNALURL: imgUrl + '/wechat',

        SPEED: {
            0: {
                api: "https://apix21.gameone.online",
            },
            1: {
                api: "https://apix21a.gameone.online",
            },
            2: {
                api: "https://apix21b.gameone.online",
            },
        },
    };
    window.Config = app;

})(jQuery);