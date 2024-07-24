/// jquery.cookie.min.js
(function(n){typeof define=="function"&&define.amd?define(["jquery"],n):typeof exports=="object"?n(require("jquery")):n(jQuery)})(function(n){function i(n){return t.raw?n:encodeURIComponent(n)}function f(n){return t.raw?n:decodeURIComponent(n)}function e(n){return i(t.json?JSON.stringify(n):String(n))}function o(n){n.indexOf('"')===0&&(n=n.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return n=decodeURIComponent(n.replace(u," ")),t.json?JSON.parse(n):n}catch(i){}}function r(i,r){var u=t.raw?i:o(i);return n.isFunction(r)?r(u):u}var u=/\+/g,t=n.cookie=function(u,o,s){var y,a,h,v,c,p;if(o!==undefined&&!n.isFunction(o))return s=n.extend({},t.defaults,s),typeof s.expires=="number"&&(y=s.expires,a=s.expires=new Date,a.setTime(+a+y*864e5)),document.cookie=[i(u),"=",e(o),s.expires?"; expires="+s.expires.toUTCString():"",s.path?"; path="+s.path:"",s.domain?"; domain="+s.domain:"",s.secure?"; secure":""].join("");for(h=u?undefined:{},v=document.cookie?document.cookie.split("; "):[],c=0,p=v.length;c<p;c++){var w=v[c].split("="),b=f(w.shift()),l=w.join("=");if(u&&u===b){h=r(l,o);break}u||(l=r(l))===undefined||(h[b]=l)}return h};t.defaults={};n.removeCookie=function(t,i){return n.cookie(t)===undefined?!1:(n.cookie(t,"",n.extend({},i,{expires:-1})),!n.cookie(t))}});


//换背景
(function () {
    "use strict";
    var DefautIndex = $.cookie("skin");
    var bgfolder = location.origin + "/images/bg/index/";
	var bglist = [
		{color:"#716b79"},
		{img:"02.jpg",color:"#70253c"},
		{img:"03.jpg",color:"#7382c7"},
		{img:"04.jpg",color:"#346e82"},
		{img:"05.jpg",color:"#193c8e"},
		{img:"06.jpg",color:"#2d5258"},
		{img:"07.jpg",color:"#24292f"},
		{img:"08.jpg",color:"#2f739a"},
		{img:"09.jpg",color:"#da305d"},
		{img:"10.jpg",color:"#bf9241"},
		{img:"11.jpg",color:"#14599e"},
		{img:"12.jpg",color:"#0f1e3b"},
		{img:"13.jpg",color:"#766d5e"},
		{img:"14.jpg",color:"#414449"},
		{img:"15.jpg",color:"#030825"},
		{img:"16.jpg",color:"#129f97"},
		{img:"17.jpg",color:"#ff9d46"},
		{img:"18.jpg",color:"#8cbc4c"}
	];


    var BGSetting = {
        Container: 'body'
    };
    var BGChange = function (i) {
        var src = bgfolder + bglist[i].img;

        //覆写背景
        $(BGSetting.Container).css('background-image', 'url("' + src + '")');

        //给按钮加上active样式，其余去除
        $('.btn-skin').eq(i).addClass('active').siblings().removeClass('active');
    };
    var BGLength = bglist.length;
    DefautIndex = DefautIndex || 0;
    

    function init() {    
        BGChange(DefautIndex);    
        $('.btn-skin').each(function (index) {
            var btn = $(this);
            btn.on('click', function (e) {
                e.preventDefault();

				// 切换时先添加一个与图片近似的颜色
				$("body").css("backgroundColor",bglist[index].color);
				
                //显示载入画面
                $('#loading').show();

                //预载图片
                var img = new Image();
                var src = bgfolder + bglist[index].img;
                img.onload = loadend;
                img.src = src;

                //载入完成
                function loadend() {
                    //为了画面效果 延迟1秒
                    setTimeout(function () {
					
					/// 将选择的皮肤存入cookie, dependencies:["jquery","jquery.cookie.min.js"]
                        $.cookie("skin", index, { expires: 365 }); /// 365天过期

                        //替换背景
                        BGChange(index);

                        //关闭载入画面
                        $('#loading').hide();
                    }, 1000);
                }
            });
        });


        //BGChange(DefautIndex);
    }

    window.BGSetting = BGSetting;
    window.BGChange = BGChange;  
    window.BGLength = BGLength;
    $(init);
})();


function random(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

//DEBUG
$(function () {
    var debug = false;
    if (window.location.hash == "#debug") debug = true;

    if (debug) {
        $('#loading').show();
    }
});


//Transfer
$(function () {
    if (!window.XTransfer) return;
    var transfer = new XTransfer('#trans', {
        minValue: 0,
        maxValue: 200000,
        initValue: 88888,
        ondrag: function (value) { },
        ontransfer: function (value) {
            alert(value);
        }
    });
});

//語言選擇
$(function () {
    $('.lang-box').on('click', function () {
        $('.lang-select', this).toggle();
    });
});

function onloadChangeBg() {
    function windowOnload() {
        if (!BGSetting) return;

        var bgloader = $('<div class="bg-loader"><div class="bg-content"><div>随机为您挑选背景…</div></div></div>');
        var rand = random(0, BGLength);

        bgloader.height(0);
        bgloader.prependTo('body');
        loadershow();


        function loadershow() {
            bgloader.animate({ height: 56 }, 1000, function () {
                setTimeout(function () {
                    BGChange(rand);
                    loaderhide();
                }, 1000);
            });

        }
        function loaderhide() {
            bgloader.animate({ height: 0 }, 1000);
        }
    }

    $(window).on('load', windowOnload);
}

$(function () {
    $('.input_tip').bind({
        focus: function () {
            if (this.value == this.defaultValue) {
                this.value = "";
            }
        },
        blur: function () {
            if (this.value == "") {
                this.value = this.defaultValue;
            }
        }
    });
})


$(function(){
	setTimeout (function(){
		$(".main_wrap").removeClass("loading");
		$(".content").fadeIn(1000);
	},2000)
})

//test
//$(function () {
//    var b = $('<button>fix game html</button>');
//    b.css({ position: "fixed", top: 30, left: 30, zIndex: 9999999, color: "#000", fontSize:"20px", lineHeight:"30px" });              
//    b.appendTo('body'); 
//    b.on('click', function () {
//        $('.gameplay-box').each(function () {
//            var t = $('.gameplay-title', this);
//            var title = t.text();         
//            t.text("[ " + title + " ]");
//            t.appendTo(this);   
//            var tip = $('<div style="position: fixed;top: 50%;left: 50%;z-index: 2147483647;margin: -100px 0 0 -150px;"><textarea style="resize: none;width: 300px;height: 200px;background: #fff;color: #000;font-size: 16px;padding: 5px;"></textarea><a style="display: inline-block;width: 20px;height: 20px;background: #000;position: absolute;top: -5px;right: -5px;text-align: center;line-height: 20px;">X</a></div>').appendTo('body');
//            tip.find('a').on('click', function () { tip.hide(); });
//            tip.find('textarea').text($(".game-content").html());
//        });
//    });
//});