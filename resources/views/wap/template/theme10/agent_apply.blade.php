@extends('wap.template.theme10.layouts.main')
@section('content')
    <style>
        .do-recharge-info .partner-content {
            width: 70%;
            height: 200px;
            text-align: left;
            padding: 10px 0;
            margin: 0;
            line-height: 25px;
            overflow: auto;
            resize: none;
        }
    </style>
    <div class="layout-main">
        <div class="member-module member-module-doRechargeBank" style="padding-top: 40px;">
            <div class="module-top">

                <div class="top-container navbar-nav">

                    <div class="left-menu">
                        <a href="javascript:;" onclick="window.history.back();">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>

                    <div class="page-title">申请代理</div>
                </div>
            </div>
            <div class="module-main diy-scrollbar">
                <div>
                    <div>
                        <div class="main-container">
                            <form action="{{ route('wap.post_agent_apply') }}" method="post" name="form1">
                            <div class="do-recharge-info">
                                <span><span style="width:70px;display:inline-block;text-align:right;"> QQ：</span><textarea
                                            class="info_username form-control"
                                            placeholder="QQ"
                                            name="qq"
                                            style="height: 34px;"></textarea></span>
                            </div>
                            <div class="do-recharge-info">
                                <span><span style="width:70px;display:inline-block;text-align:right;">  联系电话：</span><textarea
                                            class="info_username form-control"
                                            placeholder="联系电话"
                                            name="phone"
                                            style="height: 34px;"></textarea></span>
                            </div>
                            <div class="do-recharge-info">
                            <span>
                                <span style="width:70px;display:inline-block;text-align:right;"> 申请理由：</span>
                                    <textarea class="info_username form-control partner-content" placeholder="请尽量注明您的优势"
                                              name="about"
                                              id="dailiContent"></textarea>
                            </span>
                            </div>
                            <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn">立即申请</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection