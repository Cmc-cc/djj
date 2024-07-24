<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $_system_config->site_title or 'motoo' }}</title>
	<link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
  <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
  <link rel="stylesheet" href="{{ asset('/web/mb21/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/web/mb16/css/index1.css') }}">
  <script src="{{ asset('/web/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('/web/js/one.js') }}"></script>
  <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
  <script src="{{ asset('/web/js/jq.page.js') }}"></script>
  <script src="{{ asset('/web/js/weihuan.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
  <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
  <script src="{{ asset('/web/mb16/js/ajax-submit-form.js') }}"></script>
  <script src="{{ asset('/web/js/index1.js') }}"></script>
</head>
<body>

  @section('nav')
  <div class="nav">
    <div class="container clear">
      <ul class="left">
        <li data-type="1" class="@if($web_route == 'web.index') on @endif">
          <a href="{{ route('web.index') }}" @if($web_route == 'web.index')  @endif>首页 </a>
        </li>
        <li data-type="4" class="@if($web_route == 'web.liveCasino') on @endif">
         <a href="{{ route('web.liveCasino') }}">真人视讯 </a>
       </li>
        <li data-type="2" class="@if($web_route == 'web.eGame') on @endif">
          <a href="{{ route('web.eGame') }}" >电子游艺 </a>
          </li>
       <li data-type="5" class="@if($web_route == 'web.lottory') on @endif">
         <a id="cashap-lottery-menu" title="幸运彩票" href="{{ route('web.lottory') }}"> 幸运彩票 </a>
        </li>
        <li data-type="3" class="@if($web_route == 'web.catchFish') on @endif">
         <a href="{{ route('web.catchFish') }}">捕鱼游戏 </a>
       </li>
       <li data-type="7" class="@if($web_route == 'web.poker') on @endif">
        <a href="{{ route('web.poker') }}">棋牌游戏  </a>
      </li>
        {{--<li data-type="8" class="@if($web_route == 'web.navEp') on @endif">
          <a href="{{ route('web.navEp') }}" >ESB牛电竞 </a>
        </li>--}}
       <li data-type="6" class="@if($web_route == 'web.esports') on @endif">
         <a href="{{ route('web.esports') }}">体育竞技 </a>
       </li>
    </ul>
    <ul class="right">
      <li data-type="1" class="@if($web_route == 'web.activityList') on @endif"><img src="{{ asset('/web/mb21/images/icon1.png') }}"><a href="{{ route('web.activityList') }}">最新优惠</a></li>
      {{--<li data-type="2" class="@if($web_route == 'web.navVip') on @endif"><img src="{{ asset('/web/images/home/icon2.png') }}"><a href="{{ route('web.navVip') }}">vip俱乐部</a></li>--}}
      {{--<li data-type="3" class="@if($web_route == 'web.navDownload') on @endif"><img src="{{ asset('/web/images/home/icon3.png') }}"><a href="{{ route('web.navDownload') }}">下载中心</a></li>--}}
    </ul>
  </div>

</div>
@endsection

@include('web.template.mb21.layouts.header')
@yield('content')
@include('web.template.mb21.layouts.aside')
@include('web.template.mb21.layouts.footer')
@yield('after.js')
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


{{--<div class="login-pop"  id="login-pop" style="display: none">
  <div class="pop-header">
    <img src="/web/images/pop-logo.png">
  </div>
  <div class="pop-body">
    <div class="login">
      <form class="login_form_two"  method="POST" action="{{ route('member.login.post') }}" >
        <div class="list">
          <div class="pull-left">
            <img src="/web/images/pop-login-user.png">
            <label for="login_name">用户名</label>
          </div>
          <input name="name" type="text" placeholder="6-12数字或字母组合" id="pop_login_name" maxlength="12">
        </div>
        <div class="list">
          <div class="pull-left">
            <img src="/web/images/pop-login-pass.png">
            <label for="login_ps">密码</label>
          </div>
          <input name="password" type="password" placeholder="6-12数字或字母组合" id="pop_login_ps" maxlength="12">
        </div>
        <div class="list">
          <div class="pull-left" onclick="re_captchat_two();">
            <img src="{{ URL('kit/captcha/1') }}" class="pop-login-code" title="点击刷新验证码" id="c2c98f0de5a04167a9e427d883690ff8">
          </div>
          <input name="captcha" type="number" placeholder="请填写验证码" id="pop_login_code">
        </div>
        <label class="switch">
          <input type="checkbox" class="toggle-checked" checked="">
          <span class="slider round"></span>
        </label>
        <p class="switch-text">记住密码</p>
        <span  class="jazzbtn" id="login_in" onclick="weihuan_login_func('.login_form_two')">立即登录</span>
        <a href="{{ route('web.register_one') }}" style="display: block;text-align: center;">没有账号，立即注册</a>
      </form>
    </div>
  </div>
</div>
 <script>
$(document).ready(function() {
	//回车提交事件
	$(".login_form_two").bind('keydown', function(event) { 
		if(event.keyCode==13){ 
			weihuan_login_func('.login_form_two');
		}   
	}); 
});
</script>--}}
{{--<div class="addcrd-pop" id="addcrd-pop" style="display: none">
 <div class="pop-header">
   添加银行卡
 </div>
 <div class="pop-body">
  <form method="post" action="{{ route('member.update_bank_info') }}" method="post" id="blank_card_form_pop">
   <div class="balamt">
     <span>开户银行</span>
     <select id="add_bank" name="bank_name">
       <option>请选择银行</option>\
       <option value="中国工商银行">中国工商银行</option>
       <option value="中国工商银行">中国工商银行</option>
       <option value="中国工商银行">中国工商银行</option>
       <option value="中国建设银行">中国建设银行</option>
       <option value="中国交通银行">中国交通银行</option>
       <option value="中国银行">中国银行</option>
       <option value="中国光大银行">中国光大银行</option>
       <option value="中国民生银行">中国民生银行</option>
       <option value="中信银行">中信银行</option>
       <option value="平安银行">平安银行</option>
       <option value="上海浦东发展银行">上海浦东发展银行</option>
       <option value="兴业银行">兴业银行</option>
       <option value="邮政银行">邮政银行</option>
       <option value="北京银行">北京银行</option>
       <option value="广东发展银行">广东发展银行</option>
       <option value="江苏银行">江苏银行</option>
       <option value="华夏银行">华夏银行</option>
       <option value="上海银行">上海银行</option>
       <option value="渤海银行">渤海银行</option>
       <option value="东亚银行">东亚银行</option>
       <option value="宁波银行">宁波银行</option>
       <option value="浙商银行">浙商银行</option>
       <option value="杭州银行">杭州银行</option>
       <option value="广州银行">广州银行</option>
       <option value="福建农商银行">福建农商银行</option>
       <option value="恒生银行">恒生银行</option>
       <option value="台州银行">台州银行</option>
     </select>
     <span>开户网点</span><input type="text" name="bank_branch_name" placeholder="请输入您的开户支行" id="add_address">
     <span>开户姓名</span><input type="" name="bank_username" placeholder="请输入您的开户姓名">
     <span>银行卡号</span><input type="text" placeholder="请输入您的银行卡号" name="bank_card" id="add_card">\
   </div>
 </form>
</div>
<div class="pop-foot active-btn" onclick="ajaxs_ubmit_without_confirm('#blank_card_form_pop')"><span>绑定银行卡</span>
</div>
</div>--}}
<script>
  function re_captcha() {
    $url = "{{ URL('kit/captcha') }}";
    $url = $url + "/" + Math.random();
    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
  }
  function re_captchat_two() {
    $url = "{{ URL('kit/captcha') }}";
    $url = $url + "/" + Math.random();
    document.getElementById('c2c98f0de5a04167a9e427d883690ff8').src = $url;
  }
</script>
  <script>


      (function ($) {
          $(function () {

              //公告
              $('#mar0').on('click', function () {
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
                      layer.close(notice_index);
                      $('.notice_layer').css('display','none')
                  })
              })

          })
      })(jQuery)
  </script>
</body>
</html>