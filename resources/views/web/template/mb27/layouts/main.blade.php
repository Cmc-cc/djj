<!DOCTYPE html>
<html  id="ng-app" ng-app="portalApp" meidon-time="2018"  moment-lang="zh-CN"  ng-init="'{{ $_system_config->site_title or 'motoo' }}'">
<head>
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" />

    <link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">
    <link href="/web/mb23/css/jquery-ui.min.css" rel="stylesheet"/>

    <link href="/web/mb23/css/jquery-ui.theme.min.css" rel="stylesheet"/>

    <link href="/web/mb23/css/normalize.min.css" rel="stylesheet"/>

    <link href="/web/mb23/css/font-awesome5.min.css" rel="stylesheet"/>

    <link href="/web/mb23/bundles/custom.css?v=5Wa8nqZwlBGzu1Pp_QLNPIWNPw7nHF_nimfxfdWB2fE1" rel="stylesheet"/>

    <link href="/web/mb23/bundles/custom-modal.css?v=OoJMx9HYbSSX_kAkQy-IAdtYhsAf8mb55menPwEb4kQ1" rel="stylesheet"/>

    <link href="/web/mb27/bundles/site.css" rel="stylesheet"/>
 @if($web_route == 'web.index')  <link href="/web/mb27/bundles/home.css?v=Z0I1MnqVfQ2Gxw7Nrs0FZ-E7HyV84bcUupfFjChrVWE1" rel="stylesheet"/> @else  @endif

    <link href="/web/mb23/Content/Views/Shared/zh-CN.css?version=20150116" rel="stylesheet" />



    <link href="/web/mb23/Content/Views/Home/zh-CN.css?version=201404141731" rel="stylesheet" />
    <link href="/web/mb23/Content/each-site/animate.css" rel="stylesheet" />

    
    <script src="/web/mb23/js/jquery.min.js"></script>

    <script src="/web/mb23/js/jquery.marquee.min.js"></script>

    <script src="/web/mb23/js/jquery-ui.min.js"></script>

    <script src="/web/mb23/bundles/common.js?v=HNgwom0Dzrx_ZWnmf34LgV_TQUJqznH90A6VSugf2eM1"></script>

    <script src="/web/mb23/js/angular.min.js"></script>

    <script src="/web/mb23/js/moment-with-locales.min.js"></script>

    <script src="/web/mb23/js/moment-timezone-with-data.min.js"></script>

    <script src="/web/mb23/js/jquery.signalR-2.2.0.min.js"></script>




    <link rel="stylesheet" href="{{ asset('/web/mb23/css/qqq5595.css') }}">


    <!--[if lte IE 9]>
        <script src="/web/mb23/js/placeholders.min.js"></script>
        <script src="/web/mb23/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body class="layout" ng-controller="LayoutCtrl">

@include('web.template.mb27.layouts.header')

@yield('content')
@include('web.template.mb27.layouts.aside')
<div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
        @foreach($_system_notices as $v)
            <div class="module">
                <h4>{{ $v->title }}</h4>
                <p>✿{{ $v->content }}</p>
            </div>
        @endforeach
    </div>
</div>
@include('web.template.mb27.layouts.footer')
    <script src="https://cdn.igsttech.com/Web.Portal/_Common/Scripts/angular-animate/v1.2.14/angular-animate.min.js"></script>

    <script src="/web/mb23/js/ui-bootstrap-custom-tpls-0.10.0.min.js"></script>

    <script src="/web/mb23/Scripts/_site.js"></script>
    <script src="/web/mb23/bundles/environment.js?v=Sre_8bGZaXimeK2YCmr6RnY-uXP9_R8xIoUe5rN9spE1"></script>

    <script src="/web/mb23/Scripts/_config.js?version=20180117"></script>
    <script src="/web/mb23/Scripts/i18n/labels_zh-CN.js"></script>
    <script src="/web/mb23/js/angular-services.js?v=xyS-EheotkV8v-wdjby6bg-IWjEt_QrwXtAziZJAbBg1"></script>

    <script src="/web/mb23/js/angular-controllers.js?v=GjlNbpztu87jUS-Hv4d-WGODPxxT3eeYi2dzmiOKFXc1"></script>

    <script src="/web/mb23/js/angular-directives.js?v=agA_5MsASKuCuZnnudjzArmMB0Hg9A0aIc_PlABHIFY1"></script>

    <script src="/web/mb23/js/angular-filters.js?v=MeeQJovOHWNSkHRSyl6Jkj407IAV6G2P3C98wCBb83I1"></script>

    <script src="/web/mb23/bundles/portal-shared.js?v=1Qym7_7BFPaXQLvJzrHwUYSZT9__RyZpz431AkFTpQQ1"></script>


    
    <script src="/web/mb23/js/common.min.js"></script>
    <script src="/web/mb23/js/jquery.cycle2.js"></script>

<script src="/web/mb23/js/jquery.cycle2.carousel.js"></script>
    <script src="/web/mb23/Scripts/each-site/wow.js"></script>
    <script>
        /*wow = new WOW(
            {
                animateClass: 'animated',
                offset: 100,
                callback: function (box) {
                }
            }
        );
        wow.init();
        jQuery(".winner").slide({ mainCell: "ul", autoPlay: true, effect: "topMarquee", vis: 6, interTime: 70, trigger: "click" });*/
    </script>
<script>
    app.controller('WinnerListCtrl', ['$scope',
        function ($scope) {
            var totalList = [{ "user": "wp****6o", "money": 88999, "game": "阿瓦隆" },
                { "user": "pe****58", "money": 83699, "game": "白狮" },
                { "user": "h5****30", "money": 50993, "game": "不朽的浪漫" },
                { "user": "x7****68", "money": 73373, "game": "捕魚王" },
                { "user": "zg****23", "money": 166350, "game": "摆脱" },
                { "user": "a1****12", "money": 224998, "game": "变脸" },
                { "user": "fk****37", "money": 162830, "game": "捕魚王" },
                { "user": "yb****20", "money": 77384, "game": "不朽的浪漫" },
                { "user": "lq***30", "money": 114250, "game": "疯狂麻将" },
                { "user": "M****92", "money": 113989, "game": "发发发888" },
                { "user": "lych****08", "money": 86529, "game": "国王现金" },
                { "user": "zha****14", "money": 257250, "game": "虎眼石" },
                { "user": "wan****45", "money": 65322, "game": "黄金鼠" },
                { "user": "gg*****01", "money": 222963, "game": "火热KTV" },
                { "user": "shw****77", "money": 859529, "game": "金鸡报囍" },
                { "user": "lj*****42", "money": 398997, "game": "惊喜复活节" },
                { "user": "w7****95", "money": 445850, "game": "糖果派对2" },
                { "user": "vo****24", "money": 52026, "game": "雷神索尔" },
                { "user": "qi****an", "money": 80738, "game": "糖果派对2" },
                { "user": "la*****51", "money": 549377, "game": "麻雀无双" },
                { "user": "ll****21", "money": 62160, "game": "猫头鹰" },
                { "user": "lq***30", "money": 249750, "game": "疯狂麻将" },
                { "user": "sd****hl", "money": 75785, "game": "糖果派对2" },
                { "user": "q1****5o", "money": 53520, "game": "圣诞奇迹" },
                { "user": "cc4****7f", "money": 691678, "game": "淑女之夜" },
                { "user": "wy****h5", "money": 223109, "game": "运财锂鱼" },
                { "user": "zh*****60", "money": 80451, "game": "招财童子" },
                { "user": "ch*****n0", "money": 361419, "game": "复古花园" },
                { "user": "o****86", "money": 58413, "game": "海滨嘉年华" },
                { "user": "he*****12", "money": 99250, "game": "好多寿司" },
                { "user": "hr****28", "money": 65770, "game": "金大款" },
                { "user": "ww*****26", "money": 105457, "game": "千炮捕魚" },
                { "user": "wa******55", "money": 81237, "game": "糖果派对" },
                { "user": "wd*****95", "money": 236741, "game": "疯狂麻将" },
                { "user": "a7****84", "money": 41496, "game": "跳起来2" },
                { "user": "ju***98", "money": 257505, "game": "舞力全开" },
                { "user": "cg****99", "money": 212373, "game": "芝麻开门" },
                { "user": "DY*****55", "money": 74291, "game": "斯巴达勇士" },
                { "user": "su****8880", "money": 61414, "game": "足球之巅" },
                { "user": "ch*****cai", "money": 71149, "game": "糖果派对2" },
                { "user": "l8*****36", "money": 81360, "game": "K歌乐韵" },
                { "user": "js*****92", "money": 53444, "game": "高清百万分" },
                { "user": "pp*****88", "money": 83524, "game": "全民捕魚" },
                { "user": "sh*****05", "money": 51963, "game": "三国争霸" },
                { "user": "ol****27", "money": 50095, "game": "泰山传奇" },
                { "user": "sc****77", "money": 271639, "game": "跳起来2" },
                { "user": "lj***22", "money": 60083, "game": "糖果派对2" },
                { "user": "u3****3u", "money": 135688, "game": "斯巴达勇士" },
                { "user": "gb****99", "money": 132221, "game": "疯狂麻将" },
                { "user": "a7****44", "money": 55762, "game": "乔吉" },
                { "user": "wb****23", "money": 62088, "game": "复古花园" },
                { "user": "wq*****58", "money": 82004, "game": "糖果派对" },
                { "user": "wt****27", "money": 50668, "game": "白狮王" },
                { "user": "wy****h5", "money": 87231, "game": "海洋派对" },
                { "user": "zh*****60", "money": 95422, "game": "酷热经典" },
                { "user": "ld*****77", "money": 81263, "game": "日日进财" },
                { "user": "cb*****52", "money": 59740, "game": "水世界" },
                { "user": "hr****28", "money": 91931, "game": "王牌特工" },
                { "user": "wo*****8I", "money": 223109, "game": "新霸天下" },
                { "user": "z3*****67", "money": 141299, "game": "旋转大战" },
                { "user": "a7****84", "money": 205047, "game": "芝麻开门" },
                { "user": "ja****51", "money": 51190, "game": "弓兵" },
                { "user": "zy*****15", "money": 56978, "game": "鸿福齐天" },
                { "user": "wq*****11", "money": 98654, "game": "龙王捕魚2" },
                { "user": "VV*****131", "money": 315814, "game": "太空漫游" },
                { "user": "a*****q5", "money": 98650, "game": "太空神猴" },
                { "user": "w3*****58", "money": 76400, "game": "曲棍球联赛" },
                { "user": "q139*****07", "money": 89000, "game": "芝麻开门" },
                { "user": "wl****53", "money": 88070, "game": "斯巴达勇士" },
                { "user": "ab****88", "money": 69825, "game": "高空飞翔" },
                { "user": "liu****234", "money": 53584, "game": "麒麟送宝" },
                { "user": "ss****z7", "money": 45368, "game": "捕魚王" },
                { "user": "ya****93", "money": 78654, "game": "波斯宝藏" },
                { "user": "ss****87", "money": 97536, "game": "金钱蛙" },
                { "user": "r6****5e", "money": 114698, "game": "皇帝财富" }];

            $scope.winnersList = [];

            for (var i = 0; i < 50; i++) {
                var index = Math.floor((Math.random() * totalList.length));
                $scope.winnersList.push(totalList[index]);
                // 避免会出现重复名单, 选到该资料后就把它从原始清单中移除
                totalList.splice(index, 1);
            }
        }
    ]);

    $(document).ready(function () {
        // 垂直tab
        //$('.slot-tab').slide({
        //    mainCell: '.tab-list ul',
        //    autoPlay: false,
        //    effect: 'top',
        //    vis: 5,
        //    interTime: 20,
        //    trigger: 'click',
        //    pnLoop: false
        //});

        // 得奖名单
        $('.winner').slide({
            mainCell: '.winner-list ul',
            autoPlay: true,
            effect: 'topMarquee',
            vis: 8,
            interTime: 20,
            trigger: 'click'
        });
    });
</script>

<script src="{{ asset('/web/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('/web/js/index1.js') }}"></script>
<script src="{{ asset('/web/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/js/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('/web/js/jquery.fly.min.js') }}"></script>
<script src="{{ asset('/web/js/common.js') }}"></script>
@yield('after.js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	function AddFavorite(sURL, sTitle) {
		try {
			window.external.addFavorite(sURL, sTitle);
		} catch (e) {
			try {
				window.sidebar.addPanel(sTitle, sURL, "");
			} catch (e) {
				alert("加入收藏失败，请使用Ctrl+D进行添加");
			}
		}
	}	
	function Alert(){

	layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
};

</script>
<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0,.mar0').on('click', function () {
                var notice_index = layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['680px'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click', '.close', function () {
                    layer.close(notice_index)
                })
            })

        })
    })(jQuery)
</script>
</body>
</html>