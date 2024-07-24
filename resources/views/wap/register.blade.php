@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_login m_register">
                <img src="{{ asset('/wap/images/bg_welcome.png') }}" alt="">
                <div class="m_login-form">
                    <form id="form1"  action="{{ route('wap.register.post') }}" method="post" name="form1">
                        <input type="hidden" name="i_code" value="{{ $i_code }}">
                        @if($_system_config->is_regtj_1 == 1)
                        <div class="m_login-field">
                            <label for="">
                                @if($_system_config->is_regtj_2 == 1)
                                    *
                                @endif
                                介绍人</label>
                            <input id="t_name" name="t_name" type="text">
                        </div>
                        @endif
                        <div class="m_login-field">
                            <label class="m_need" for="">*账号</label>
                            <input id="zcname" name="name" type="text" placeholder="用户名(4-8位字符)" minlength="4" maxlength="8">
                        </div>
                        <div class="m_login-field">
                            <label class="m_need" for="">*密码</label>
                            <input id="passwd" name="password" type="password" placeholder="密码" minlength="6" maxlength="12">
                        </div>
                        <div class="m_login-field">
                            <label class="m_need" for="">*再次输入密码</label>
                            <input id="passwdse" name="password_confirmation" type="password" placeholder="再次输入密码" minlength="6" maxlength="12">
                        </div>
                        @if($_system_config->is_real_name_1 == 1)
                        <div class="m_login-field">
                            <label class="m_need" for="">
                                @if($_system_config->is_real_name_2 == 1)
                                *
                                @endif
                                真实姓名</label>
                            <input id="realname" name="real_name" type="text" placeholder="真实姓名(与银行卡开户人相同)" maxlength="10">
                        </div>
                        @endif
                        @if($_system_config->is_phone_1 == 1)
                        <div class="m_login-field">
                            <label class="m_need" for="">
                                @if($_system_config->is_phone_2 == 1)
                                *
                                @endif
                                真实手机</label>
                            <input id="phone" name="phone" type="text" placeholder="真实手机号码" maxlength="11">
                        </div>
                        @endif
                        @if($_system_config->is_qq_1 == 1)
                            <div class="m_login-field">
                                <label class="m_need" for="">
                                    @if($_system_config->is_qq_2 == 1)
                                    *
                                    @endif
                                    QQ号码</label>
                                <input id="qq" name="qq" type="text" placeholder="QQ号码" >
                            </div>
                        @endif
                        @if($_system_config->is_email_1 == 1)

                            <div class="m_login-field">
                                <label class="m_need" for="">
                                    @if($_system_config->is_email_2 == 1)
                                    *
                                    @endif
                                    邮箱</label>
                                <input id="email" name="email" type="text" placeholder="邮箱" >
                            </div>
                        @endif
                        @if($_system_config->is_weixin_1 == 1)

                            <div class="m_login-field">
                                <label class="m_need" for="">
                                    @if($_system_config->is_weixin_2 == 1)
                                    *
                                    @endif
                                    微信号</label>
                                <input id="weixin" name="weixin" type="text" placeholder="微信号" >
                            </div>
                        @endif
                        <div class="m_login-field">
                            <label class="m_need" for="">*取款密码</label>
                            <input id="paypasswd" name="qk_pwd" type="password" placeholder="提款密码(6位纯数字)" maxlength="6">
                        </div>
                        <div class="m_login-field captcha">
                            <label class="m_need" for="">*验证码</label>
                            <input id="paypasswd" name="captcha" type="text" placeholder="">
                            <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6"></a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                                }
                            </script>
                        </div>
                        <div class="m_login-field textRight">
                            <a href="{{ route('wap.login') }}" class="m_forget-pwd">已有账号?立即登录</a>
                        </div>
                        <div class="m_login-field">
                            <button type="submit" class="m_login-submit ajax-submit-btn">立即注册</button>
                        </div>
                        <!--<div class="m_addUs">-->
                        <!--<a href="javascript:;" class="m_btn-join">免费加入</a>-->
                        <!--</div>-->

                        <div class="m_register-tips">
                            <h2>备注：</h2>
                            <p>1.标记有 * 者为必填项目。</p>
                            <p>2.提款密码必须为6位数的数字；</p>
                            <p>3.姓名必须与你用于提款的银行户口名字一致，否则无法提款。</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection