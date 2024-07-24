@php($path = 'member.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <div id="layout-main-area">
        <div id="main-menu">
            <div class="menu-area">
                <ul class="list-group">
                    @if($_system_config->is_wechat_on == 0)
                        <li class="list-group-item payment weixin @if($web_route == 'member.finance_center') active @endif">
                            <a href="{{ route('member.finance_center') }}">微信支付</a>
                        </li>
                    @endif
                    @if($_system_config->is_alipay_on == 0)
                        <li class="list-group-item payment alipay @if($web_route == 'member.ali_pay') active @endif">
                            <a href="{{ route('member.ali_pay') }}">支付宝</a>
                        </li>
                    @endif
                    @if($_system_config->is_qq_on == 0)
                        <li class="list-group-item payment qqpay @if($web_route == 'member.qq_pay') active @endif">
                            <a href="{{ route('member.qq_pay') }}">QQ钱包</a>
                        </li>
                    @endif
                    @if($_system_config->is_bankpay_on == 0)
                        <li class="list-group-item payment epay @if($web_route == 'member.bank_pay') active @endif">
                            <a href="{{ route('member.bank_pay') }}">银联付款</a>
                        </li>
                    @endif
                    @if($_system_config->is_thirdpay_on == 0)
                        <li class="list-group-item payment epay @if($web_route == 'member.third_pay_scan') active @endif">
                            <a href="{{ route('member.third_pay_scan') }}">第三方支付</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div id="main-container">

            <div class="module-main" style="height: 630px; overflow: auto;margin-top:20px">
                <div class="info-container">
                    <div class="info" style="color:red;">
                        温馨提示: 如当前支付方式未能支付成功，请您尝试其他支付方式进行支付！


                    </div>
                </div>
                <form action="{{ route('pay') }}" method="post" class="form-horizontal" target="_blank">

                    <div class="form-group">
                        <label class="col-xs-2 control-label">用户账号：</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" value="{{ $_member->name }}" disabled="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">支付方式：</label>
                        <div class="col-xs-10">
                            <input name="paytype" value="bankcard" type="radio" checked/>银行卡

                            <input name="paytype" value="aliPay" type="radio"/>支付宝

                            <input name="paytype" value="weChatpay" type="radio"/>微信
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">支付姓名：</label>
                        <div class="col-xs-10">
                            <input value="{{old('pay_name')}}" type="text" class="form-control" name="pay_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-9 control-label"><span style="color: red;">支付姓名如果填写的名称与实际支付名称的对应不上，出现问题资金将无法追回</span></label>

                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">充值金额：</label>
                        <div class="col-xs-10">
                            <input type="number" min="120" placeholder="120" class="form-control" name="amount" required>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-xs-6 control-label"><span style="color: red;">支付时必须足元足角支付(最低支付金额120元)</span></label>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label"></label>
                        <div class="col-xs-10">
                            <button type="submit" class="btn btn-primary form-control">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after.js')
    <script>
        @if(count($errors)>0)

        @foreach($errors->all() as $error)

        layer.msg("{{$error}}",{icon:5});

        @break

        @endforeach

        @endif
    </script>
@endsection
