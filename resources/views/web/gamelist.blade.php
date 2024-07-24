<!-- saved from url=(0239)https://game.teeskeji.com/game/index?plat_type=png&sign_key=6e3355ecc51f6a0efee18e15dacbcacf&is_mobile=1&tokenName=S3puQVVBOGJFVG9qYVpaYVhOeTlvWHZVenlRaUNldTdadFJqb1ZKb3pNWlpnVkhKNXhTSXJ5Zm5zR1VCNU8yWGIzS3NZenFkSHRJbld4dEcxYk5keEE9PQ%3D%3D
-->
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
      {{$api_code}}
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="shortcut icon" href="https://game.teeskeji.com/favicon.ico">
    <link href="/newpage/normalize.css" rel="stylesheet">
    <link href="/newpage/font-awesome.min.css" rel="stylesheet">
    <link href="/newpage/bootstrap.3.3.7.min.css" rel="stylesheet">
    <link href="/newpage/custom.css" rel="stylesheet">
    <link href="/newpage/body.css" rel="stylesheet">
    <link href="/newpage/lobbdy.css" rel="stylesheet">
    <link rel="stylesheet" href="/newpage/dropload.css">
    <link href="/newpage/site.css" rel="stylesheet">
    <link href="/newpage/layer.css" rel="stylesheet">
    <link href="/newpage/layer.css" type="text/css" rel="styleSheet"
    id="layermcss">
    <style>
      a{color: #ffffff;text-decoration: none;} a:link {color: #ffffff; text-decoration:
      none;} a:visited {color: #ffffff; text-decoration: none;} a:hover {color:
      #ffffff; text-decoration: none;} a:active {color: #ffffff; text-decoration:
      none;} .pic {position: relative;overflow: auto;} .pic img{width:92.5px;height:92.5px;}
      .btn-layer { display: none; position: absolute; z-index: 100; top: 0; left:-5%;
      height: 100%; width: 110%; background: rgba(0, 0, 0, 0.6); } .ng-scope:hover
      .btn-layer.one { display: block; } .ng-scope .game-btn { display: block;
      margin: 15px auto; width: 80px; height: 24px; line-height: 24px; text-align:
      center; border-radius: 4px; font-size: 14px; } .game-btn:hover { color:
      #4ba7dc; } .try-btn{ border: 1px solid rgb(238,119,52); background: rgb(238,119,52);
      top: 55%; color: #FFFFFF; } .play-btn { border: 1px solid rgb(202,2,50);
      background: rgb(202,43,57); top: 25%; color: #FFFFFF; }
    </style>
  </head>
  <body class="ng-scope">
    <section id="content">
      <section id="lobby">
        <div class="ng-scope">
          <div id="page-title" style="padding-top: 15px;">
            {{$api_code}}
          </div>
          <a id="banner" target="_blank" class="ng-hide">
            <!-- <img src="">-->
          </a>
          <div id="search" style="margin-bottom: 15px;">
            <form class="ng-pristine ng-valid" onsubmit="return false;">
              <div class="form-group">
                <input type="text" placeholder="请输入游戏名称..." id="search-name" class="ng-pristine ng-untouched ng-valid ng-empty">
                <button id="search-btn" type="button">
                  搜索
                </button>
              </div>
            </form>
            
          </div>
          
          
          <p class="list-title recommend" style="display: block;">
            <span class="ng-binding">
              全部游戏
            </span>
          </p>
          <div class="content game-list clearfix">
            <div class="lists">
              @foreach($gamelist as $item)
              <li class="ng-scope" @if($_member) onclick="location.href='{{ route('game.playGame') }}?plat_type={{$item['code']}}&game_type={{$item['gameType']}}&game_code={{$item['gameCode']}}&devices={{$devices}}'"@else onclick="return layer.msg('请先登录!',{icon:0})" @endif>
                <img class="icon icon01" src="/newpage/NewGame.gif">
                <img class="icon icon02" src="/newpage/IsHot.gif">
                <div class="pic">
                  <img src="https://nbgame.s3.ap-southeast-1.amazonaws.com/{{$item['gameCode']}}.png">
                </div>
                <div class="text ng-binding">
                  {{$item['name']}}
                </div>
              </li>
              @endforeach

            </div>
            <div class="dropload-down">
              <div class="dropload-refresh">
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    <input name="_csrf" type="hidden" id="_csrf" value="_4hJnfEdXbpRdtPbHvQH4Pt2w1grY4bVq1P7iTEper_HwQXPmiQc7QAiurBOu2iJth36MWwHq4zDEIu6fFhLig==">
  </body>

</html>
<script src="/web/js/jquery-2.1.3.min.js"></script>
<script>
  $(document).keyup(function(event){
  if(event.keyCode ==13){
    var keyword = $('#search-name').val();
    // if(!keyword){
    //   return;
    // }
    $('.ng-binding').each(function(){
      var text = $(this).html();
      // alert(text);
      // alert(keyword);
      if(text.indexOf(keyword) == -1){
        $(this).parent().hide();
      }else{
        $(this).parent().show();
      }
    })
  }
});
  $('#search-btn').click(function(){
    var keyword = $('#search-name').val();
    // if(!keyword){
    //   return;
    // }
    $('.ng-binding').each(function(){
      var text = $(this).text();
      if(text.indexOf(keyword) == -1){
        $(this).parent().hide();
      }else{
        $(this).parent().show();
      }
    })
  })
  $('.toplay').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            $('#plat_type').text(code);
            if(!url){
                alert('请先登录游戏！',1);
            }else{
              window.open(url);     
                // $.ajax({
                //     url:'/m/membermoney',
                //     success:function(res){
                //         $('#lesNum').text(res.money)
                //         $('.member_money').text(res.money)
                        
                //     }
                // })
                // $('#moneyInp').val('');
                // $('#cover,.noticeAltbox').fadeIn();
            }
    })
</script>