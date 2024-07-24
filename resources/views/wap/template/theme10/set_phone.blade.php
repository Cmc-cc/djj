@extends('wap.template.theme10.layouts.main')
@section('content')
    <div class="layout-main">
        <div class="member-module member-module-qkmm">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>

                    <div class="page-title">修改手机号码</div>
                </div>


            </div>
            <div class="module-main diy-scrollbar" style="padding-top: 40px;">
                <div>
                    <div>
                        <div class="main-container">
                            <form action="{{ route('wap.post_set_phone') }}" method="post" name="form1">
                                <div style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label for="mdl-20_oldpassword">账号</label>
                                        <input type="text" id="oldPwd" maxlength="12" class="form-control" value="{{ $_member -> name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="mdl-20_reqkmm">绑定手机</label>
                                        <input type="number" name="phone" id="confirmPwd" class="form-control" warning="请再次输入登录密码" placeholder="请填写手机号码">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection