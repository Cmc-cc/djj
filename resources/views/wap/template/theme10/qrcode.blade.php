@extends('wap.template.theme10.layouts.main')
@section('content')
    <div class="layout-main">
        <div class="member-module member-module-index">
            <div class="module-main diy-scrollbar" style="height: 642px; overflow: hidden;padding-top: 40px;">
                <div style="transition-property: transform; transform-origin: 0px 0px 0px; transform: translate(0px, -38px) scale(1) translateZ(0px);">
                    <div class="pull-down">
                        <span class="glyphicon glyphicon-arrow-down pull-icon" aria-hidden="true"></span>
                        <span class="pull-down-label">下拉可刷新</span>
                    </div>
                    <div style="min-height: 642px;">
                        <div class="main-container">
                            <div class="panel panel-default">
                                <div class="panel-heading">用户信息</div>
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            会员帐号
                                            <span class="badge">{{ $_member -> name }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            手机号码
                                            <span class="badge" id="Phone">
                                                @if ($_member->phone)
                                                    {{ $_member -> phone }}
                                                @else
                                                    <a style="display: block;float: right;" href="{{ route('wap.set_phone') }}" class="c_blue">去设置</a>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            注册时间
                                            <span class="badge">{{ $_member -> created_at }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            最后登陆时间
                                            <span class="badge">{{ $_member -> last_login_at }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-area menu-area" style="padding:0;">
                                <a href="javascript:history.back(-1)" class="btn btn-warning">返回</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection