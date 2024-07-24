@extends('wap.template.theme2.layouts.main')
@section('content')
    <div class="container-fluid reg">
        <div class="head">
            <a class="f_l" href="javascript:history.back();" style="width: 30px;font-size: 30px"><i class="icon-angle-left"></i></a>
            <a>账号注册</a>
            <a class="f_r" href="{{route('wap.index')}}" style="width: 40px;font-size: 25px"><i class="icon-home"></i></a>
        </div>
        <div class="con">
            <form id="form1"  action="{{ route('wap.register.post') }}" method="post" name="form1">
                <input type="hidden" name="i_code" value="{{ $i_code }}">
                <ul>
                    @if($_system_config->is_regtj_1 == 1)
                    <li><input id="t_name" name="t_name" type="text" placeholder="@if($_system_config->is_regtj_2 == 1)*@endif介绍人" minlength="5" maxlength="8" class="form-control input-lg"></li>
                    @endif
                    <li><input id="zcname" name="name" type="text" placeholder="*用户名(4-8位字符)" minlength="4" maxlength="8" class="form-control input-lg"></li>
                    <li><input id="passwd" name="password" type="password" placeholder="*密码" minlength="6" maxlength="14" class="form-control input-lg"></li>
                    <li><input id="passwdse" name="password_confirmation" type="password" placeholder="*再次输入密码" maxlength="20" class="form-control input-lg"></li>
                        @if($_system_config->is_real_name_1 == 1)
                    <li><input id="realname" name="real_name" type="text" placeholder="@if($_system_config->is_real_name_2 == 1)*@endif真实姓名(与银行卡开户人相同)" maxlength="10" class="form-control input-lg"></li>
                        @endif
                        @if($_system_config->is_phone_1 == 1)
                        <li><input id="phone" name="phone" type="text" placeholder="@if($_system_config->is_phone_2 == 1)*@endif真实手机" maxlength="18" class="form-control input-lg"></li>
                        @endif
                        @if($_system_config->is_qq_1 == 1)
                     <li><input id="qq" name="qq" type="text" placeholder="@if($_system_config->is_qq_2 == 1)*@endif联系QQ" maxlength="11" class="form-control input-lg"></li>
                        @endif
                        @if($_system_config->is_email_1 == 1)
					<li><input id="email" name="email" type="text" placeholder="@if($_system_config->is_email_2 == 1)*@endif邮箱" maxlength="11" class="form-control input-lg"></li>
                        @endif
                        @if($_system_config->is_weixin_1 == 1)
                        <li><input id="weixin" name="weixin" type="text" placeholder="@if($_system_config->is_weixin_2 == 1)*@endif微信号" maxlength="11" class="form-control input-lg"></li>
                        @endif
                    <li><input id="paypasswd" name="qk_pwd" type="password" placeholder="提款密码(6位纯数字)" maxlength="6" class="form-control input-lg"></li>
                   
                   
                   
                    <li style="overflow:hidden;">
                      <input id="paypasswd" name="captcha" class="form-control input-lg" type="text" placeholder="验证码" onclick="javascript:re_captcha();"  style=" width:60%; float:left; margin-right:10px;">
                        <a onclick="javascript:re_captcha();" style="float:left;"><img src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6"></a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                                }
                            </script>
                      
                    </li>
                   
                   
                    <li><input name="regBtn" type="button" class="btn btn-danger btn-lg ajax-submit-btn" value="立即注册"></li>
                    <li><a href="{{ route('wap.login') }}" class="btn btn-danger btn-lg">已有账号，登陆！</a></li>
                    <li class="f_pwd">
                        <strong>注意：</strong>
                        <p>1、提款密码必须为6位数的数字；</p>
                        <p>2、标记有 * 者为必填项目。</p>
                        <p>3、姓名必须与你用于提款的银行户口名字一致，否则无法提款。</p>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection