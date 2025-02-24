@if($_system_config->is_new_center == 1)
    <?php
    $path = 'member.template.'.$mb_path.'.layouts.new_main';
    ?>
@else
    <?php
    $path = 'member.template.'.$mb_path.'.layouts.main';
    ?>
@endif
@extends($path)
@section('content')
    <style>
        .weihuan-user .box-item .addbankcard .ml_money {
            font-size: 16px;
            margin-top: 23px;
            margin-bottom: 25px;
            display: inline-block;
        }
    </style>
    
    <div class="weihuan-user">
        <div class="body clear" style="padding-top: 0px">
            <div class="bar">
                <li class="on"><i></i>存款专区</li>
                <li><i></i>取款专区</li>
                <li><i></i>额度转换</li>
                @if($_system_config->is_fs==1)
                    <li><i></i>实时返水</li>
                @endif
                <li><i></i>资金流水</li>
                {{-- <li><i></i>注单查询</li> --}}
                <li><i></i>站内消息<span class="news"></span></li>
                <li><i></i>个人资料</li>
                <li><i></i>修改密码</li>
            </div>
            <div class="box">
                <div class="box-item">
                    <ul class="box-nav clear">
                        @if($_system_config->is_thirdpay_on == 0)
                            <li class="on"><span></span>便利店增值</li>
                        @endif
                        @if($_system_config->is_bankpay_on == 0)
                            <li class="yl"><span></span>在线支付</li>
                        @endif
                        @if($_system_config->is_alipay_on == 0)
                            <li class="zfb"><span></span>支付宝支付</li>
                        @endif
                        @if($_system_config->is_wechat_on == 0)
                            <li class="wx"><span></span>微信支付</li>
                        @endif
                        @if($_system_config->is_qq_on == 0)
                            <li class="qq">
                                <img src="/zsk.png" style="    width: 85px;margin: 5px 0;"><br/>
                                轉數快
                            </li>
                        @endif

                    </ul>
                    <div class="box-content clear">
                        <div class="left">
                            @if($_system_config->is_bankpay_on == 0 || $_system_config->is_alipay_on == 0 || $_system_config->is_wechat_on == 0 || $_system_config->is_qq_on == 0 || $_system_config->is_thirdpay_on == 0)
                                <div class="pay-tips">请在上方选择对应付款方式，推荐使用微信或支付宝付款，审核快，秒到账！</div>
                            @else
                                <div class="pay-tips">未开通支付方式，请<span onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')" style="color:#0f78d6;cursor: pointer;">
								联系客服
							</span></div>
                            @endif
                            <div class="pay-boxs">
                                @if($_system_config->is_thirdpay_on == 0)
                                    <div class="pay-list">
                                        <form action="{{ route('ajax_pay') }}" method="post" id="post_pay">
                                            <div class="two">
                                                <div class="title">

                                                    <span>用户账号</span>
                                                </div>
                                                <div class="username">
                                                    <input type="text" value="{{ $_member->name }}" disabled style="cursor: not-allowed;">
                                                </div>
                                                <div class="title">

                                                    <span>收款二维码</span>
                                                </div>
                                                <div class="card-num">
                                                    <img src="{{$setting->bld_pic}}" style="width:200px;height:200px;">
                                                </div>
                                                {{--<div class="title">

                                                    <span>支付姓名</span>
                                                    <span style="font-size: 13px;color:red">支付姓名如果填写的名称与实际支付名称的对应不上，出现问题资金将无法追回</span>
                                                </div>
                                                <div class="card-num">
                                                    <input type="text" placeholder="请输入支付姓名" name="pay_name">
                                                </div>--}}
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <span>存款金额</span>
                                                    <span style="font-size: 14px;color: red;">支付时必须足元足角支付(最低支付金额100元)
</span>
                                                </div>
                                                <div class="steps">
                                                    {{--<label>快速选择：</label>
                                                    <div class="amount">
                                                        <span class="120" data-type="120"></span>
                                                        <span class="200" data-type="200"></span>
                                                        <span class="500" data-type="500"></span>
                                                        <span class="1000" data-type="1000"></span>
                                                        <span class="5000" data-type="5000"></span>
                                                    </div>--}}
                                                    <div class="num">
                                                        <label>手动输入：</label>
                                                        <input type="number" min="100" name="amount" value="100">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="three">
                                                <div class="title">
                                                    <span>付款截图</span>
                                                </div>
                                                <div class="steps">
                                                    <label style="display:block;flex:1;" >
                                                        <input type="hidden" value="" class="img" name="img">
                                                        <img src="/backstage/images/img.png" alt="" style="width:100px;height:100px;" class="image"/>
                                                        <input type="file"  name=""  class="singleimg" accept="image/*" style="opacity:0;width:10px;position: absolute;">
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <div class="active-btn" onclick="ajaxs_ubmit_without_confirm('#post_pay')"><span>立即存款</span></div>
                                    </div>
                                @endif
                                @if($_system_config->is_bankpay_on == 0)
                                    <div class="pay-list">
                                        <p class="receipt-card-title">收款银行卡</p>
                                        <table class="receipt-card-info">
                                            @foreach($bank_card_list as $item)
                                                <tbody>
                                                <tr>
                                                    <th>银行名称</th>
                                                    <th>{{ \App\Models\Base::$BANK_TYPE[$item->bank_id] }}</th>
                                                </tr>
                                                <tr>
                                                    <th>银行卡号</th>
                                                    <th>{{ $item->card_no }}</th>
                                                </tr>
                                                <tr>
                                                    <th>银行户名</th>
                                                    <th>{{ $item->username }}</th>
                                                </tr>
                                                <tr>
                                                    <th>开户地</th>
                                                    <th>{{ $item->bank_address }}</th>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                        <form action="{{ route('member.post_bank_pay') }}" method="post" id="ylzf_form">
                                            <div class="one">
                                                <li>
                                                    <div class="title">
                                                        <img src="{{ asset('/web/images/user/01.png') }}">
                                                        <span>请选择付款银行</span>
                                                    </div>
                                                    <select name="payment_desc">
                                                        <option value="中国工商银行">中国工商银行</option>
                                                        <option value="中国建设银行">中国建设银行</option>
                                                        <option value="中国农业银行">中国农业银行</option>
                                                        <option value="中国银行">中国银行</option>
                                                        <option value="中国交通银行">中国交通银行</option>
                                                        <option value="招商银行">招商银行</option>
                                                        <option value="广发银行">广发银行</option>
                                                        <option value="平安银行">平安银行</option>
                                                        <option value="浦发银行">浦发银行</option>
                                                        <option value="民生银行">民生银行</option>
                                                        <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
                                                        <option value="华夏银行">华夏银行</option>
                                                        <option value="深圳发展银行">深圳发展银行</option>
                                                        <option value="中信银行">中信银行</option>
                                                        <option value="兴业银行">兴业银行</option>
                                                        <option value="光大银行">光大银行</option>
                                                    </select>
                                                </li>
                                            </div>
                                            <div class="two">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/02.png') }}">
                                                    <span>请输入银行卡号</span>
                                                </div>
                                                <div class="card-num">
                                                    <input type="text" placeholder="请输入银行卡号" name="account">
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/03.png') }}">
                                                    <span>存款金额</span>
                                                </div>
                                                <div class="steps">
                                                    <label>快速选择：</label>
                                                    <div class="amount">
                                                        <span class="100" data-type="100"></span>
                                                        <span class="200" data-type="200"></span>
                                                        <span class="500" data-type="500"></span>
                                                        <span class="1000" data-type="1000"></span>
                                                        <span class="5000" data-type="5000"></span>
                                                    </div>
                                                    <div class="num">
                                                        <label>手动输入：</label>
                                                        <input type="number" min="1" name="money" value="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="four">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/04.png') }}">
                                                    <span>银行卡户名</span>
                                                </div>
                                                <div class="card-user">
                                                    <input type="text" placeholder="请输入姓名" name="name">
                                                </div>
                                            </div>
                                            <div class="five">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/05.png') }}">
                                                    <span>用户账号</span>
                                                </div>
                                                <div class="username">
                                                    <input type="text" value="{{ $_member->name }}" name="username" disabled style="cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="six">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/06.png') }}">
                                                    <span>存款时间</span>
                                                </div>
                                                <div class="card-time">
                                                    <input type="text" placeholder="请选择日期" name="paytime" id="pay1">
                                                    <select class="form-control" name="date_h" id="pay-h">
                                                        <option value="{{ date('H') }}">{{ date('H') }}时</option>
                                                        @foreach(range(00, 24) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}时 @else {{ $v }}时 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_i" id="pay-f">
                                                        <option value="{{ date('i') }}">{{ date('i') }}分</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}分 @else {{ $v }}分 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_s" id="pay-m">
                                                        <option value="{{ date('s') }}">{{ date('s') }}秒</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}秒 @else {{ $v }}秒 @endif</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <span>付款截图</span>
                                                </div>
                                                <div class="steps">
                                                    <label style="display:block;flex:1;" >
                                                        <input type="hidden" value="" class="img" name="img">
                                                        <img src="/backstage/images/img.png" alt="" style="width:100px;height:100px;" class="image"/>
                                                        <input type="file"  name=""  class="singleimg" accept="image/*" style="opacity:0;width:10px;position: absolute;">
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="active-btn" onclick="ajaxs_ubmit_without_confirm('#ylzf_form')"><span>立即存款</span></div>
                                    </div>
                                @endif
                                @if($_system_config->is_alipay_on == 0)
                                    <div class="pay-list">
                                        <div class="one">
                                            <li>
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/01.png') }}">
                                                    <span>支付宝二维码</span>
                                                </div>
                                                @php
                                                    $alipay_qrcode = explode(',',$_system_config->alipay_qrcode);
                                                @endphp
                                                @foreach($alipay_qrcode as $item)
                                                    <span class="alipay"><img src="{{$item}}"></span>
                                                @endforeach
                                            </li>
                                        </div>
                                        <form action="{{ route('member.post_ali_pay') }}" method="post" class="form-horizontal" id="post_ali_pay">
                                            <div class="two">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/02.png') }}">
                                                    <span>支付宝账号</span>
                                                </div>
                                                <div class="card-num">
                                                    <input type="text" placeholder="请输入支付宝账号" name="account">
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/03.png') }}">
                                                    <span>存款金额</span>
                                                </div>
                                                <div class="steps">
                                                    <label>快速选择：</label>
                                                    <div class="amount">
                                                        <span class="100" data-type="100"></span>
                                                        <span class="200" data-type="200"></span>
                                                        <span class="500" data-type="500"></span>
                                                        <span class="1000" data-type="1000"></span>
                                                        <span class="5000" data-type="5000"></span>
                                                    </div>
                                                    <div class="num">
                                                        <label>手动输入：</label>
                                                        <input type="number" min="1" value="100" name="money">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="four">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/05.png') }}">
                                                    <span>用户账号</span>
                                                </div>
                                                <div class="username">
                                                    <input type="text" value="{{ $_member->name }}" name="username" disabled style="cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="five">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/06.png') }}">
                                                    <span>存款时间</span>
                                                </div>
                                                <div class="card-time">
                                                    <input type="text" placeholder="请选择日期" name="paytime" id="pay2">
                                                    <select class="form-control" name="date_h" id="pay-h">
                                                        <option value="{{ date('H') }}">{{ date('H') }}时</option>
                                                        @foreach(range(00, 24) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}时 @else {{ $v }}时 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_i" id="pay-f">
                                                        <option value="{{ date('i') }}">{{ date('i') }}分</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}分 @else {{ $v }}分 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_s" id="pay-m">
                                                        <option value="{{ date('s') }}">{{ date('s') }}秒</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}秒 @else {{ $v }}秒 @endif</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <span>付款截图</span>
                                                </div>
                                                <div class="steps">
                                                    <label style="display:block;flex:1;" >
                                                        <input type="hidden" value="" class="img" name="img">
                                                        <img src="/backstage/images/img.png" alt="" style="width:100px;height:100px;" class="image"/>
                                                        <input type="file"  name=""  class="singleimg" accept="image/*" style="opacity:0;width:10px;position: absolute;">
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="active-btn" onclick="ajaxs_ubmit_without_confirm('#post_ali_pay')"><span>立即存款</span></div>
                                    </div>
                                @endif
                                @if($_system_config->is_wechat_on == 0)
                                    <div class="pay-list">
                                        <div class="one">
                                            <li>
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/01.png') }}">
                                                    <span>微信二维码</span>
                                                </div>
                                                @php
                                                    $wechat_qrcode = explode(',',$_system_config->wechat_qrcode)
                                                @endphp
                                                @foreach($wechat_qrcode as $item)
                                                    <span class="alipay"><img src="{{$item}}"></span>
                                                @endforeach
                                            </li>
                                        </div>
                                        <form action="{{ route('member.post_weixin_pay') }}" method="post" id="post_weixin_pay">
                                            <div class="two">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/02.png') }}">
                                                    <span>微信号</span>
                                                </div>
                                                <div class="card-num">
                                                    <input type="text" placeholder="请输入微信号" name="account">
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/03.png') }}">
                                                    <span>存款金额</span>
                                                </div>
                                                <div class="steps">
                                                    <label>快速选择：</label>
                                                    <div class="amount">
                                                        <span class="100" data-type="100"></span>
                                                        <span class="200" data-type="200"></span>
                                                        <span class="500" data-type="500"></span>
                                                        <span class="1000" data-type="1000"></span>
                                                        <span class="5000" data-type="5000"></span>
                                                    </div>
                                                    <div class="num">
                                                        <label>手动输入：</label>
                                                        <input type="number" min="1" name="money" value="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="four">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/05.png') }}">
                                                    <span>用户账号</span>
                                                </div>
                                                <div class="username">
                                                    <input type="text" value="{{ $_member->name }}" disabled style="cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="five">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/06.png') }}">
                                                    <span>存款时间</span>
                                                </div>
                                                <div class="card-time">
                                                    <input type="text" name="paytime" placeholder="请选择日期" name="wxpay_time1" id="pay3">
                                                    <select class="form-control" name="date_h" id="pay-h">
                                                        <option value="{{ date('H') }}">{{ date('H') }}时</option>
                                                        @foreach(range(00, 24) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}时 @else {{ $v }}时 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_i" id="pay-f">
                                                        <option value="{{ date('i') }}">{{ date('i') }}分</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}分 @else {{ $v }}分 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_s" id="pay-m">
                                                        <option value="{{ date('s') }}">{{ date('s') }}秒</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}秒 @else {{ $v }}秒 @endif</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <span>付款截图</span>
                                                </div>
                                                <div class="steps">
                                                    <label style="display:block;flex:1;" >
                                                        <input type="hidden" value="" class="img" name="img">
                                                        <img src="/backstage/images/img.png" alt="" style="width:100px;height:100px;" class="image"/>
                                                        <input type="file"  name=""  class="singleimg" accept="image/*" style="opacity:0;width:10px;position: absolute;">
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="active-btn" onclick="ajaxs_ubmit_without_confirm('#post_weixin_pay')"><span>立即存款</span></div>
                                    </div>
                                @endif
                                @if($_system_config->is_qq_on == 0)
                                    <div class="pay-list">
                                        <div class="one">
                                            <li>
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/01.png') }}">
                                                    <span>向以下账号汇款</span>
                                                </div>
                                                    <span class="alipay">
                                                        轉數快昵称:{{$_system_config->qq_account}}<br/>
                                                        轉數快账号:{{$_system_config->qq_nickname}}
                                                    </span>
                                            </li>
                                        </div>
                                        <form action="{{ route('member.post_qq_pay') }}" method="post" id="post_qq_pay">
                                            <div class="two">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/02.png') }}">
                                                    <span>轉數快账号</span>
                                                </div>
                                                <div class="card-num">
                                                    <input type="text" placeholder="请输入轉數快账号" name="account">
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/03.png') }}">
                                                    <span>存款金额</span>
                                                </div>
                                                <div class="steps">
                                                    <label>快速选择：</label>
                                                    <div class="amount">
                                                        <span class="100" data-type="100"></span>
                                                        <span class="200" data-type="200"></span>
                                                        <span class="500" data-type="500"></span>
                                                        <span class="1000" data-type="1000"></span>
                                                        <span class="5000" data-type="5000"></span>
                                                    </div>
                                                    <div class="num">
                                                        <label>手动输入：</label>
                                                        <input type="number" min="1" name="money" value="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="four">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/05.png') }}">
                                                    <span>用户账号</span>
                                                </div>
                                                <div class="username">
                                                    <input type="text" value="{{ $_member->name }}" disabled style="cursor: not-allowed;">
                                                </div>
                                            </div>
                                            <div class="five">
                                                <div class="title">
                                                    <img src="{{ asset('/web/images/user/06.png') }}">
                                                    <span>存款时间</span>
                                                </div>
                                                <div class="card-time">
                                                    <input type="text" name="paytime" placeholder="请选择日期" name="wxpay_time1" id="pay4">
                                                    <select class="form-control" name="date_h" id="pay-h">
                                                        <option value="{{ date('H') }}">{{ date('H') }}时</option>
                                                        @foreach(range(00, 24) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}时 @else {{ $v }}时 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_i" id="pay-f">
                                                        <option value="{{ date('i') }}">{{ date('i') }}分</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}分 @else {{ $v }}分 @endif</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="date_s" id="pay-m">
                                                        <option value="{{ date('s') }}">{{ date('s') }}秒</option>
                                                        @foreach(range(00, 59) as $v)
                                                            <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif>@if($v < 10) 0{{ $v }}秒 @else {{ $v }}秒 @endif</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="three">
                                                <div class="title">
                                                    <span>付款截图</span>
                                                </div>
                                                <div class="steps">
                                                    <label style="display:block;flex:1;" >
                                                        <input type="hidden" value="" class="img" name="img">
                                                        <img src="/backstage/images/img.png" alt="" style="width:100px;height:100px;" class="image"/>
                                                        <input type="file"  name=""  class="singleimg" accept="image/*" style="opacity:0;width:10px;position: absolute;">
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="active-btn" onclick="ajaxs_ubmit_without_confirm('#post_qq_pay')"><span>立即存款</span></div>
                                    </div>
                                @endif

                            </div>
                        </div>


                        <div class="right">
                            {{--<div class="body">
                                <div class="head">本月推荐游戏</div>
                                <img src="{{ asset('/web/images/user/right-bg.jpg') }}">
                                <div class="slider">
                                    <div class="head"><p>大奖玩家公示</p></div>
                                    <div class="swiper-container" style="background-image: url({{ asset('/web/images/user/right-bg2.jpg') }});">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide" data-swiper-slide-index="0">
                                                <img src="{{ asset('/web/images/user/slider.jpg') }}">
                                            </div>
                                            <div class="swiper-slide" data-swiper-slide-index="1">
                                                <img src="{{ asset('/web/images/user/slider.jpg') }}">
                                            </div>
                                            <div class="swiper-slide" data-swiper-slide-index="2">
                                                <img src="{{ asset('/web/images/user/slider.jpg') }}">
                                            </div>
                                            <div class="swiper-slide" data-swiper-slide-index="3">
                                                <img src="{{ asset('/web/images/user/slider.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="tips">
                                <p>温馨提示</p>
                                <li>单笔储值最低HKD10.00，最高为HKD45,000.00 并须视各家银行转款上限而定。</li>
                                <li>请保留好转账单据作为核对证明。</li>
                                <li>建议您使用Internet Explorer 9以上、360浏览器、 Firefox或Google Chrome等浏览器浏览。</li>
                                <li>如出现充值失败或充值后未到账等情况，请联系在线客服获取帮助。</li>
                                <a href="{{ $_system_config->service_link }}" target="_blank" class="service" style="padding-top: 0px">联系客服</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-item">
                    <div class="left">
                            <div class="b">
                                <form action="{{ route('member.drawing') }}" method="post" id="drawing_form">
                                    <div class="addbankcard">
                                        <label>收款银行：</label>
                                        <select id="bank" name="bank_name">
                                            <option>请选择银行</option>
                                            <option value="转速快">转速快</option>
                                            <option value="中国工商银行">中国工商银行</option>
                                            <option value="中国农业银行">中国农业银行</option>
                                            <option value="中国招商银行">中国招商银行</option>
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
                                        </select><br>
                                        <label>收款姓名：</label>
                                        <input class="acct-name" name="bank_username" type="text" placeholder="收款姓名"><br><br>
                                        <label>收款账号：</label>
                                        <input type="text" name="bank_card" placeholder="收款账号" id="card"><br><br>
                                        <div id="bank_branch_name">
                                            <label >开户网点：</label>
                                            <input type="text" name="bank_branch_name" placeholder="XX分行XX支行" id="BankAddress"><br>
                                        </div>
                                        <label>码量余额：</label>
                                        <input class="ml_money" name="ml_money" type="number" value="{{ $_member->ml_money }}" disabled><br>
                                        <label>取款金额：</label>
                                        <input class="acct-name" name="money" type="number" placeholder="*提款金额不能少于100元"><br>

                                        <label>取款密码：</label>
                                        <input type="password" name="qk_pwd" placeholder="*6位取款密码"><br>
                                    </div>
                                </form>
                                <div class="active-btn" onclick="ajaxs_ubmit_without_confirm('#drawing_form')"><span>立即取款</span></div>
                            </div>

                    </div>
                    <div class="right">
                        <div class="slider-body">
                            {{--<div class="head">今日取款列表</div>
                            <div class="subhead clear" style="background-image: url({{ asset('/web/images/user/subhead-bg.jpg') }});">
                                <div class="left">
                                    <div class="left">
                                        <p>我的级别</p>
                                        <p class="vip">青 铜</p>
                                    </div>
                                    <div class="left">
                                        <img src="{{ asset('/web/images/vip/logo1.png') }}" class="vip-logo">
                                    </div>
                                </div>
                                <span class="line"></span>
                                <div class="right">
                                    <p>到账时间</p>
                                    <div class="layui-carousel user-deposit">
                                        <div carousel-item>
                                            <div class="slide">
                                                <ul>
                                                    <li>王者</li>
                                                    <li>首选</li>
                                                </ul>
                                            </div>
                                            <div class="slide">
                                                <ul>
                                                    <li>钻石</li>
                                                    <li>第二</li>
                                                </ul>
                                            </div>
                                            <div class="slide">
                                                <ul>
                                                    <li>铂金</li>
                                                    <li>第三</li>
                                                </ul>
                                            </div>
                                            <div class="slide">
                                                <ul>
                                                    <li>黄金</li>
                                                    <li>第四</li>
                                                </ul>
                                            </div>
                                            <div class="slide">
                                                <ul>
                                                    <li>白银</li>
                                                    <li>第五</li>
                                                </ul>
                                            </div>
                                            <div class="slide">
                                                <ul>
                                                    <li>青铜</li>
                                                    <li>第六</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                            {{--<div class="user-deposit-body">
                                <div class="user-deposit-nav">
                                    <p>玩家账号</p>
                                    <p>取款时间</p>
                                    <p>取款金额</p>
                                    <p>取款状态</p>
                                </div>
                                <div class="user-deposit-news">
                                    <div class="news-box">
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                        <ul>
                                            <li>ja***ngsun</li>
                                            <li>2018-11-14</li>
                                            <li>3100</li>
                                            <li>支付中</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>--}}
                            {{--<div class="user-deposit-bottom">
                                <div class="left">
                                    <p>今日平均到账时间</p>
                                    <span>4分41秒</span>
                                </div>
                                <div class="left">
                                    <p>今日取款总笔数</p>
                                    <span>2945</span>
                                </div>
                            </div>--}}
                            <div class="tips">
                                <p>温馨提示</p>
                                <li>单笔储值最低HKD10.00，最高为HKD45,000.00 并须视各家银行转款上限而定。</li>
                                <li>请保留好转账单据作为核对证明。</li>
                                <li>建议您使用Internet Explorer 9以上、360浏览器、 Firefox或Google Chrome等浏览器浏览。</li>
                                <li>如出现充值失败或充值后未到账等情况，请联系在线客服获取帮助。</li>
                                <a href="{{ $_system_config->service_link }}" target="_blank" class="service" style="padding-top: 0px;">联系客服</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-item">
                    <div class="weihuan-conversion">
                        <div class="layui-row">
                            <div class="layui-col-xs12" style="text-align: center;margin: 5px;">
                                <button id="all" class="layui-btn layui-btn-normal" style="background: linear-gradient(#fd2525, #cd0303)">刷新全部</button>
                            </div>
                        </div>
                        <div class="layui-row">
                            <div class="layui-col-md8 exchange">
                                <?php
                                $own_api_list = $_member->apis()->pluck('api_id')->toArray();

                                $ag = \App\Models\Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
                                $ags =\App\Models\Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();
                                $is_ag = $_member->is_ag;

                                $sunbet = \App\Models\Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
                                $sunbets =\App\Models\Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
                                $is_sunbet = $_member->is_sunbets;
                                ?>
                                @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                                    <?php
                                    $mod = '';
                                    if (in_array($ags->id, $own_api_list)){
                                        $mod = $_member->apis()->where('api_id', $ags->id)->first();
                                    }
                                    ?>
                                    <div class="layui-col-xs4 game-api">
                                        <div style="overflow: hidden;">
                                            <p class="game-right">
                                                <span class="title">AG</span>
                                                <span class="primary">@if($mod) {{ $mod->money }}  @else N/A @endif</span>
                                                <a href="javascript:" class="refresh"
                                                   data-uri="{{ route('member.api.check') }}?api_name=AG"></a>
                                            </p>
                                        </div>

                                        <div class="clearfix">
                                            <form class="pull-left" action="{{ route('member.one_transfer') }}" method="post"
                                                  style="display: {{ $_member->is_trans_on == 0?'inline-block':'none' }}">
                                                <input type="hidden" name="api_name" value="AG">
                                                <input type="hidden" name="transfer_type" value="0">
                                                <a class="pull-left ajax-submit-without-confirm-btn"
                                                   href="javascript:;">一键转入</a>
                                            </form>

                                            <form class="pull-right" action="{{ route('member.one_transfer') }}" method="post"
                                                  style="display:inline-block">
                                                <input type="hidden" name="api_name" value="AG">
                                                <input type="hidden" name="transfer_type" value="1">
                                                <a class="pull-right ajax-submit-without-confirm-btn"
                                                   href="javascript:;">一键转出</a>
                                            </form>
                                        </div>
                                    </div>

                                @endif

                                @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                                    <?php
                                    $mod = '';
                                    if (in_array($ags->id, $own_api_list)){
                                        $mod = $_member->apis()->where('api_id', $sunbets->id)->first();
                                    }
                                    ?>
                                    <div class="layui-col-xs4 game-api">
                                        <div style="overflow: hidden;">
                                            <p class="game-right">
                                                <span class="title">申博視訊</span>
                                                <span class="primary">@if($mod) {{ $mod->money }}  @else N/A @endif</span>
                                                <a href="javascript:" class="refresh"
                                                   data-uri="{{ route('member.api.check') }}?api_name=SUNBET"></a>
                                            </p>
                                        </div>

                                        <div class="clearfix">
                                            <form class="pull-left" action="{{ route('member.one_transfer') }}" method="post"
                                                  style="display: {{ $_member->is_trans_on == 0?'inline-block':'none' }}">
                                                <input type="hidden" name="api_name" value="SUNBET">
                                                <input type="hidden" name="transfer_type" value="0">
                                                <a class="pull-left ajax-submit-without-confirm-btn"
                                                   href="javascript:;">一键转入</a>
                                            </form>

                                            <form class="pull-right" action="{{ route('member.one_transfer') }}" method="post"
                                                  style="display:inline-block">
                                                <input type="hidden" name="api_name" value="SUNBET">
                                                <input type="hidden" name="transfer_type" value="1">
                                                <a class="pull-right ajax-submit-without-confirm-btn"
                                                   href="javascript:;">一键转出</a>
                                            </form>
                                        </div>
                                    </div>

                                @endif
                                @foreach($api_mod as $item)
                                    @if($item->api_name=='AGS' || $item->api_name=='SUNBETS')@continue;
                                    @endif
                                    <?php

                                    $mod = '';
                                    if (in_array($item->id, $own_api_list)){
                                        $mod = $_member->apis()->where('api_id', $item->id)->first();
                                    }
                                    ?>
                                    <div class="layui-col-xs4 game-api">
                                        <div style="overflow: hidden;">
                                            {{--<p class="game-left">
                                                <i game-box="AG">
                                                    <img src="{{ asset('/web/images/center/').'/'.$item->api_name.'.jpg' }}"
                                                         width="53" height="53">
                                                </i>
                                            </p>--}}
                                            <p class="game-right">
                                                <span class="title">{{ $item->api_title }}</span>
                                                <span class="primary">@if($mod) {{ $mod->money }}  @else N/A @endif</span>
                                                <a href="javascript:" class="refresh"
                                                   data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"></a>
                                            </p>
                                        </div>

                                        <div class="clearfix">
                                            <form class="pull-left" action="{{ route('member.one_transfer') }}" method="post"
                                                  style="display: {{ $_member->is_trans_on == 0?'inline-block':'none' }}">
                                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                                <input type="hidden" name="transfer_type" value="0">
                                                <a class="pull-left ajax-submit-without-confirm-btn"
                                                   href="javascript:;">一键转入</a>
                                            </form>

                                            <form class="pull-right" action="{{ route('member.one_transfer') }}" method="post"
                                                  style="display:inline-block">
                                                <input type="hidden" name="api_name" value="{{ $item->api_name }}">
                                                <input type="hidden" name="transfer_type" value="1">
                                                <a class="pull-right ajax-submit-without-confirm-btn"
                                                   href="javascript:;">一键转出</a>
                                            </form>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <div class="layui-col-md4" style="float: left">
                                <div class="info-container">
                                    <div class="heading">钱包转换</div>
                                    <div class="info">
                                        <p class="item-info">是否开启免转钱包：
                                        <div class="checkbox">
                                            <label><input id="is_trans_on"
                                                          type="checkbox" {{ $_member->is_trans_on == 0?'':'checked' }} >开启</label>

                                        </div>
                                        </p>
                                    </div>
                                </div>
                                <div class="exchange-area" style="display: {{ $_member->is_trans_on == 0?'block':'none' }}">
                                    <div class="turn-action text-center">
                                        <a href="JavaScript:void(0)" class="turn-in-action active">转入</a>
                                        <a href="JavaScript:void(0)" class="turn-out-action">转出</a>
                                    </div>
                                    <div class="turn-area turn-in">
                                        <form action="{{ route('member.post_transfer') }}" method="post">
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label">从</label>
                                                <div class="layui-col-xs9">
                                                    <select class="form-control" name="account1">
                                                        <option value="1">主账户</option>
                                                        {{--<option value="0">红利账户</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label">到</label>
                                                <div class="layui-col-xs9">
                                                    <select class="form-control" name="account2">
                                                        @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                                                            <option value="{{ $ags->id }}">AG厅</option>
                                                        @endif
                                                        @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                                                            <option value="{{ $sunbets->id }}">申博視訊厅</option>
                                                        @endif
                                                        @foreach($api_mod as $item)
                                                            @if($item->api_name=='AGS' || $item->api_name == 'SUNBETS')@continue;
                                                            @endif
                                                            <?php
                                                            $mod = '';
                                                            if (in_array($item->id, $own_api_list))
                                                                $mod = $_member->apis()->where('api_id', $item->id)->first();
                                                            ?>

                                                            {{--<li>--}}
                                                            {{--<p class="name">{{ $item->api_name }}厅 <span class="pos">@if($mod) {{ $mod->money }}  @else N/A @endif</span><a class="refresh" href="javascript:;" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"></a></p>--}}
                                                            {{--<p class="account">游戏账号：<span class="viceColor" data-username="{{ $item->prefix.$_member->name }}">@if($mod) {{ $mod->username }}  @else 未开通 @endif</span></p>--}}
                                                            {{--</li>--}}

                                                            {{--<li class="hasnotinfo" data-id="{{ $item->id }}">--}}
                                                            {{--<p class="name">{{ $item->api_title }} <span class="pos">@if($mod) {{ $mod->money }}元  @else N/A @endif</span><a href="javascript:;" class="refresh" data-uri="{{ route('member.api.check') }}?api_name={{ $item->api_name }}"></a></p>--}}
                                                            {{--<em></em>--}}
                                                            {{--</li>--}}
                                                            <option value="{{ $item->id }}">{{ $item->api_title }}厅</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label">金额</label>
                                                <div class="layui-col-xs9">
                                                    <input type="number" class="form-control" name="money">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label"></label>
                                                <div class="layui-col-xs9">
                                                    <input type="hidden" name="transfer_type" value="0">
                                                    <button type="button"
                                                            class="btn btn-primary form-control ajax-submit-without-confirm-btn">
                                                        确定转入
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="turn-area turn-out" style="display:none;">
                                        <form action="{{ route('member.post_transfer') }}" method="post">
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label">从</label>
                                                <div class="layui-col-xs9">
                                                    <select class="form-control" name="account2">
                                                        @if($ag && $ag->on_line == 1 && $ags && $ags->on_line==0)
                                                            <option value="{{ $ags->id }}">AG厅</option>
                                                        @endif
                                                        @if($sunbet && $sunbet->on_line == 1 && $sunbets && $sunbets->on_line==0)
                                                            <option value="{{ $sunbets->id }}">申博視訊厅</option>
                                                        @endif
                                                        @foreach($api_mod as $item)
                                                            @if($item->api_name=='AGS' || $item->api_name == 'SUNBETS')@continue;
                                                            @endif
                                                            <?php
                                                            $mod = '';
                                                            if (in_array($item->id, $own_api_list))
                                                                $mod = $_member->apis()->where('api_id', $item->id)->first();
                                                            ?>
                                                            @if($item->api_title=='AGS')@continue;
                                                            @endif
                                                            <option value="{{ $item->id }}">{{ $item->api_title }}厅</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label">到</label>
                                                <div class="layui-col-xs9">
                                                    <select class="form-control" name="account1">
                                                        <option value="1">主账户</option>
                                                        {{--<option value="0">红利账户</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label">金额</label>
                                                <div class="layui-col-xs9">
                                                    <input type="number" class="form-control" name="money">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="layui-col-xs3 control-label"></label>
                                                <div class="layui-col-xs9">
                                                    <input type="hidden" name="transfer_type" value="1">
                                                    <button type="button"
                                                            class="btn btn-warning form-control ajax-submit-without-confirm-btn">
                                                        确定转出
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="info-container" style="padding:8px;">
                                    <div class="heading">我的额度</div>
                                    <div class="infozhuang't">
                                        <p class="item-info">账户余额：<span id="mymoney">{{ $_member->money }}</span> 元</p>
                                    </div>
                                </div>
                                <div class="info-container" style="padding:8px;">
                                    <div class="heading">友情提示</div>
                                    <div class="info">
                                        <p class="item-info" style="margin-bottom:10px"><font color="red">一键转入</font>将把账户余额一次性转入到对应游戏余额。
                                        </p>
                                        <p class="item-info"><font color="red">一键转出</font>将把对应游戏余额一次性转出到账户余额。</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @if($_system_config->is_fs==1)
                    <div class="box-item">
                        <div class="weihuan-rebate">
                            <div class="layui-form" style="margin: 20px;">
                                <form id="fs" action="{{route('member.send_fs')}}" method="post">
                                    <div class="form-group">
                                        <label class="col-xs-6">可换金额:<span style="color: red">{{$total['fs_money']}}元</span></label>
                                        <input type="hidden" name="gane_str" value="{{$total['game_str']}}">
                                        <div class="col-xs-6">
                                            <button style="background: linear-gradient(#fd2525, #cd0303)" type="button" id="fs_money" class="layui-btn" onclick="ajaxs_ubmit_without_confirm('#fs')" >全部兑换</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                $i= 0;
                                ?>
                                @foreach($list as $k => $v)
                                    @if(count($v) > 0)
                                        <?php $i++?>
                                        <div class="info-container" style="margin-top: 10px">
                                            <div class="info" style="color:#333;">
                                                <span style="font-weight: bold">{{config('platform.game_type')[$k]}}类</span>
                                                <span>最近{{date('Y-m-d H:i:s')}}</span>
                                            </div>
                                        </div>
                                        <table class="layui-table">
                                            <thead>
                                            <tr>
                                                <th>日期</th>
                                                <th>投注流水</th>
                                                <th>返水等级</th>
                                                <th>返水额度</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($v as $kk => $vv)
                                                <tr>
                                                    <td>{{$kk}}@if($kk == date('Y-m-d')) (今天) @endif</td>
                                                    <td>{{$vv['tz_amount']}}元</td>
                                                    <td>{{$vv['level_name'] ? $vv['level_name'] : '未满足条件'}}</td>
                                                    <td>{{$vv['fs_money']}}元</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                @endforeach
                                @if($i  <= 0)
                                    <table class="layui-table">
                                        <thead>
                                        <tr>
                                            <th>日期</th>
                                            <th>投注流水</th>
                                            <th>返水等级</th>
                                            <th>返水额度</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="4" style="text-align: center;">暂无记录</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            {{--<div class="content">
                                <div class="steps one">
                                    <div class="title">
                                        <span class="not-num">当前优惠等级</span>
                                    </div>
                                </div>
                                <div class="disc-level">
                                    <div class="disc-table clear">
                                        <div class="disc-tablemn ranks">
                                            <div class="disc-title">
                                                <p class="weihuan-rebate-vip">青 铜<span>BRONZE</span></p>
                                            </div>
                                            <img src="{{ asset('/web/images/vip/logo1.png') }}" class="weihuan-rebate-vip-logo">
                                        </div>
                                        <div class="disc-tablemn">
                                            <div class="disc-title">
                                                <p>老虎机日返水比例</p>
                                            </div>
                                            <p id="lh_water">0.8%</p>
                                        </div>
                                        <div class="disc-tablemn">
                                            <div class="disc-title">
                                                <p>真人視訊日返水比例</p>
                                            </div>
                                            <p id="zr_water">0.6%</p>
                                        </div>
                                        <div class="disc-tablemn">
                                            <div class="disc-title">
                                                <p>沙巴體育日返水比例</p>
                                            </div>
                                            <p id="sb_water">0.4%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="steps two">
                                    <div class="title">
                                        <span class="not-num">当前返水额度</span>
                                    </div>
                                </div>
                                <div class="recredit clear">
                                    <div class="credbox">
                                        <div class="cred-header">
                                            <img src="{{ asset('/web/images/user/icon15.png') }}">
                                            <p>老虎机</p>
                                            <span class="pull-right pt_time">最近 2018-11-15 03:37:14</span>
                                        </div>
                                        <div class="credbody clear">
                                            <div class="pull-left cdt">
                                                <p>当前投注流水</p>
                                                <span class="pt_TotalBet">0</span>
                                            </div>
                                            <div class="pull-right cdt">
                                                <p>可兑换额度</p>
                                                <span class="pt_RtnMoney">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="credbox">
                                        <div class="cred-header">
                                            <img src="{{ asset('/web/images/user/icon16.png') }}">
                                            <p>真人視訊</p>
                                            <span class="pull-right zr_time">最近 2018-11-15 03:37:14</span>
                                        </div>
                                        <div class="credbody clear">
                                            <div class="pull-left cdt">
                                                <p>当前投注流水</p>
                                                <span class="zr_TotalBet">0</span>
                                            </div>
                                            <div class="pull-right cdt">
                                                <p>可兑换额度</p>
                                                <span class="zr_RtnMoney">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="credbox">
                                        <div class="cred-header">
                                            <img src="{{ asset('/web/images/user/icon17.png') }}">
                                            <p>沙巴體育</p>
                                            <span class="pull-right sb_time">最近 2018-11-15 03:37:14</span>
                                        </div>
                                        <div class="credbody clear">
                                            <div class="pull-left cdt">
                                                <p>当前投注流水</p>
                                                <span class="sb_TotalBet">0</span>
                                            </div>
                                            <div class="pull-right cdt">
                                                <p>可兑换额度</p>
                                                <span class="sb_RtnMoney">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cred-submit">
                                    <p>可换金额：</p>
                                    <span>0.00</span>
                                    <div class="active-btn"><span>全部兑现</span></div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                @endif
                <div class="box-item">
                    <div class="weihuan-record one clear">
                        <div class="fundnavs layui-form">
                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">查询类型</label>
                                    <div class="layui-input-inline">
                                        <select name="search_type"  class="report_option" onchange="deposit(0,0)">
                                            <option value="0" selected>存款记录</option>
                                            <option value="1">提款记录</option>
                                            <option value="2">额度转换</option>
                                            <option value="3">游戏记录</option>
                                            <option value="4">红利记录</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label page">开始时间</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="star_time" class="layui-input" id="record1" placeholder="点击选择时间">
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label page">结束时间</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="end_time" class="layui-input" id="record2" placeholder="点击选择时间">
                                    </div>
                                </div>
                                <div class="layui-inline" style="width: 130px;">
                                    <div class="layui-input-inline">
                                        <input type="submit" onclick="deposit(0,0)" class="transacdate" value="查 询">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tablebox">
                            <table id="zjjlcx">
                                <thead id="zjjlcxbt">
                                <th>存款时间</th>
                                <th>存款金额</th>
                                <th>状态</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="pagetable">
                            <div class="tcdPageCode tcdPageCode0" style="display: none;"></div>
                            <div class="tcdPageCode tcdPageCode1" style="display: none;"></div>
                            <div class="tcdPageCode tcdPageCode2" style="display: none;"></div>
                            <div class="tcdPageCode tcdPageCode3" style="display: block;"><span class="disabled">上一页</span><span class="disabled">下一页</span></div>
                        </div>
                    </div>
                </div>
                <div class="box-item">
                    <div class="weihuan-user-news">
                        <div class="tabline">
                            <div class="news-tab">
                                <ul class="clear">
                                    <li class="on" data-type="tabmsg1">游戏公告</li>
                                    <li data-type="tabmsg3">站内信</li>
                                    <li data-type="tabmsg3">活动列表</li>
                                </ul>
                                <div class="backtoprev" style="display:none;">
                                    <p>返回上一级</p>
                                </div>
                            </div>
                        </div>
                        <div class="user-news">
                            <div class="list">
                                @foreach($system_notices as $k => $v)
                                    <li onclick="weihuan_notice_li(this)">
                                        {{ $v->title }}
                                        <h2><img src="{{ asset('/web/images/user/news.png') }}">{{$v->updated_at}}</h2>
                                        <p style="display: none;">✿{{ $v->content }}</p>
                                    </li>
                                @endforeach
                            </div>
                            <div class="list" >
                                <div id="messageList_form">

                                </div>
                                <div id="msg_page" class="msg-page">
                                    <span class="disabled">上一页</span>
                                    <span class="disabled">下一页</span>
                                </div>
                            </div>
                            <div class="list" >
                                @if(isset($data) && count($data) > 0)
                                    <ul class="list-group">
                                        @foreach($data as $item)
                                            @if($item->activity)
                                                <li class="list-group-item message-item">
                                                    <div class="message-title">{{ $item->activity->title }}</div>
                                                    <div class="message-content">
                                                        @if($item->status == 3)
                                                            <font color="red">你的活动申请未通过，原因：{{ $item->fail_reason }}</font>
                                                        @endif
                                                        @if($item->status == 2)
                                                            恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                                        @endif
                                                        @if($item->status == 1)
                                                            <font color="blue">你的活动申请正在审核，请耐心等耐！</font>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-center">暂无活动申请记录！</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-item">
                    <div class="weihuan-personal">
                        <div class="firstcontent tab clear">
                            <div class="pull-left">
                                <div class="profilepic"></div>
                            </div>
                            <div class="pull-left">
                                <p>欢迎游戏，<span style="color: #ff7c2d;" id="name">{{ $_member->name }}</span></p><br>
                                <p>主货币：</p>
                                <span>HKD港币</span><br>
                                <p>注册时间： </p>
                                <span>{{$_member->created_at}}</span>
                            </div>
                        </div>
                        <div class="alertperson">
                            <img src="{{ asset('/web/images/user/icon5.png') }}">
                            <span>
							完善个人资料能提升账户安全，设置后只能联系客服修改，请谨慎填写!
							<span onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')" style="color:#0f78d6;cursor: pointer;">
								联系客服
							</span>
						</span>
                        </div>
                        <div class="secondcontent tab">
                            <div class="sec choosebnk">
                                <div class="pull-left">
                                    <p>我的银行卡</p>
                                    <img src="{{ asset('/web/images/user/safety-b.png') }}">
                                </div>
                                <div class="pull-left">
                                    @if($_member->bank_name)
                                        <div class="crd1 lsts choose">
{{--                                            <img src="{{ asset('/web/images/user/bcard18.png') }}">--}}
                                            <p style="padding: 20px 0;font-size: 20px;" class="">{{ $_member->bank_name }}</p>
                                            <p class="actnumber">{{ $_member->bank_card }}</p>
                                            <p>{{ $_member->bank_username }}</p>
                                        </div>
                                    @else
                                        <div class="addcrd lsts">
                                            <p>添加银行卡</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="box-item">
                    <div class="weihuan-pass">
                        <div class="form-settings">
                            <form action="{{ route('member.update_login_password') }}" method="post" id="xg_pass">
                                <div class="wronged">
                                    <label for="ps">当前密码 :</label>
                                    <input name="old_password" type="password" id="ps"><br>
                                </div>
                                <div>
                                    <label for="new_ps">新密码 :</label>
                                    <input name="password" type="password" id="new_ps"><br>
                                </div>
                                <div>
                                    <label for="back_ps">确认密码 :</label>
                                    <input name="password_confirmation" type="password" id="back_ps"><br>
                                </div>
                                <a class="setbtn" onclick="ajaxs_ubmit_without_confirm('#xg_pass')">修改密码</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="addcrd-pop" id="addcrd-pop" style="display: none">
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
                        <option value="中国农业银行">中国农业银行</option>
                        {{--<option value="中国工商银行">中国工商银行</option>--}}
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
    </div>


    <script type="text/javascript">
        var Swiper = new Swiper ('.weihuan-user .box-content .swiper-container', {
            loop: true,
            speed:900,
            autoplay: {stopOnLastSlide: true,disableOnInteraction: 0},
            pagination: {el: '.weihuan-user .box-content .swiper-pagination',clickable: true},
        });

        layui.use('carousel', function(){
            var carousel = layui.carousel;
            carousel.render({
                elem: '.user-deposit'
                ,width: '100%'
                ,arrow: 'none'
                ,indicator: 'none'
            });
        });

        var fs_money = "{{$total['fs_money']}}";
        if(fs_money<=0){
            $('#fs_money').attr('disabled',true);
            $('#fs_money').css('background','#ccc')
        }
    </script>
    <script type="text/javascript">
        /*$('.refresh-2').on('click', function () {
            var _this = $(this);
            var pos = _this.parents('.converlist').find('.price');
            _this.css({
                'background': 'url({{ asset("/web/images/h-u-loading2.gif") }}) no-repeat center center'
            })
            $.ajax({
                type: 'GET',
                url: _this.attr('data-uri'),
                data: '',
                contentType: "application/json; charset=utf-8",
                success: function (data) {
                    _this.css({
                        'background': 'none',
                    })
                    if (data.Code != 0) {
                        alert(data.Message);
                        return;
                    }
                    pos.html(data.Data + '元');
                },
                error: function (err, status) {
                }
            })
        });*/
        @if (!Auth::guard('member')->guest())
        @if($_member->is_trans_on == 1)
        $(function () {
            $.ajax({
                type:'post',
                url : "{{route('member.api.wallet_balance')}}",
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if(data.statusCode == '01'){
                        var all = Number($('#mymoney').text()) + Number(data.data);
                        $('#mymoney').text('');
                        $('#mymoney').text(parseInt(all.toFixed(2)));
                    }
                }
            })
        })
        @endif
        @endif
        $('#all').click(function () {
            $('.refresh').trigger('click');
        })
        $("#is_trans_on").click(function () {
            //layer.alert("选择自动转入");
            var is_trans_on = $("#is_trans_on").is(":checked") ? 1 : 0;
            var msg = is_trans_on == 1 ? "确定【开启】免转钱包吗？" : "确认【关闭】免转钱包吗？";
            layer.confirm(msg, function () {
                var detailLoad = layer.load(2, {
                    shade: [0.2, '#ccc'],
                });
                $.post("{{route('member.post_change_trans')}}", {is_trans_on: is_trans_on}, function (res) {
                    layer.close(detailLoad);
                    if(is_trans_on ==1) {
                        $('.pull-left').hide();
                        $('.exchange-area').hide();
                    }else{
                        $('.pull-left').show();
                        $('.exchange-area').show();
                    }

                    if(res.code == 0) {
                        layer.alert(res.msg);
                        //window.location.href='{{route('member.userCenter',['type'=>3])}}';
                    }else{
                        $('.pull-left').show();
                        $('.exchange-area').show();
                        $("#is_trans_on").prop("checked",false);
                        layer.alert(res.msg);
                    }

                }, 'json');
            }, function () {
                //取消的时候
                if (is_trans_on == 1) $("#is_trans_on").prop("checked",false);
                else $("#is_trans_on").prop("checked", true);
            });

        });
        $('.refresh').on('click', function () {
            var _this = $(this);
            var pos = _this.parent('.game-right').find('span.primary');
            _this.css({
                'background': 'url({{ asset("/web/images/h-u-loading2.gif") }}) no-repeat center center'
            })
            $.ajax({
                type: 'GET',
                url: _this.attr('data-uri'),
                data: '',
                contentType: "application/json; charset=utf-8",
                success: function (data) {

                    _this.css({
                        'background': 'url({{ asset("/web/images/bg-ico.png") }}) no-repeat center center',
                        'background-position': '-80px -102px'
                    })
                    if (data.Code != 0) {
                        alert(data.Message);
                        return;
                    }
                    pos.html(data.Data + '元');
                },
                error: function (err, status) {
                    //console.log(err)
                }
            })
        });
        
        
        $(".singleimg").change(function(){
                      		var that = $(this);
                            if (this.files.length>1) {
                                layer.open({
                                    content: '最多只能选择1张图片'
                                    ,skin: 'msg'
                                    ,time: 1 //2秒后自动关闭
                                });
                                return false;
                            }
                            //创建FormData对象
                            var data = new FormData();
                            //为FormData对象添加数据
                            $.each(that[0].files, function(i, file) {
                                data.append('ruoshui'+i, file);
                            });
                            //追加其他数据
                            data.append('id',1);
                            //发送数据
                            $.ajax({
                                url:'/member/upload', 
                                type:'post',
                                data:data,
                                dataType:'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                // contentType: false 和processData: false，这两个参数是为了设置ajax对file文件对象进行序列化
                                success:function(data){  
                                    that.prev().attr('src','/uploads/'+data[0]);
                                    that.prev().prev().val('/uploads/'+data[0]);
                                    that.prev().css('width','200px');
                                    that.prev().css('height','200px');
                                },
                                error:function(){
                                    alert('上传出错');
                                    return false;
                                }
                            });
                        });
    </script>
    <script type="text/javascript">
        var init=false;  //初始状态
        var tbody='';  //tbody tag
        var get_msg = function(filter){
            $('.loading_shadow').show();
            $.ajax({
                type : 'GET',
                url : "{{ route('member.messageList') }}?page="+filter.page,
                success : function(data){
                    console.log(data);
                    $('.loading_shadow').hide();
                    var data=data;
                    var totalPage=Math.ceil(data.total/data.per_page);
                    var currentPage=data.current_page;

                    tbody='';

                    for(var i=0;i<data.data.length;i++){
                        href= data.data[i].url?data.data[i].url:'javascript:;';
                        tbody+='<li>';
                        tbody+='<h2><img src="{{ asset('/web/images/user/news.png') }}">'+data.data[i].created_at+'</h2>';
                        tbody+='   <h1><a href="'+href+'" target="_blank">'+data.data[i].title+'</a></h1>';
                        tbody+='<p>'+data.data[i].content+'</p>';
                        tbody+='</li>';
                    }

                    $('#messageList_form').html(tbody);
                    if (init == false) {

                        $("#msg_page").createPage({
                            pageCount: totalPage,
                            current: currentPage,
                            backFn: function (p) {
                                $('.loading_shadow').show();
                                sou(p);
                            }
                        });
                        $('.loading_shadow').hide();
                        init = true;
                    } else {

                        $("#msg_page").createPage({
                            pageCount: totalPage,
                            current: filter.page,
                            backFn:function(){
                                $('.loading_shadow').show();
                            }
                        });
                        $('.loading_shadow').hide();
                    }
                }
            })
        }
        var sou = function (p,type) {
            var filter = {
                page: p
            }

            get_msg(filter);

        };

        sou(1);
    </script>
    <script type="text/javascript">
    $('#bank').change(function(){
            if($(this).val() == '转速快'){
                $('#bank_branch_name').hide();
            }else{
                $('#bank_branch_name').show()
            }
        })
        function deposit(obj,type){
            var optionIndex= $('.report_option').val();
            var theadArr=[
                ['存款时间','存款金额','状态'],
                ['提款时间','提款金额','状态','失败原因'],
                ['转账时间','金额','转出/转入账户','状态'],
                ['平台','游戏名称','投注','输赢','时间'],
                ['红利类型','金额','发放时间']
            ];
            var defaultStartTime=$('#record1').val();
            var defaultEndTime=$('#record2').val();
            var getUrl=[
                "{{ route('member.rechargeList') }}",
                "{{ route('member.drawingList') }}",
                "{{ route('member.transferList') }}",
                "{{ route('member.gameRecordList') }}",
                "{{ route('member.dividendList') }}"];
            var initPage=false;
            var tbodyHtml='';
            var theadHtml='';
            layer.load();
            var getList = function (filter) {
                console.log(optionIndex);
                $.ajax({
                    type : 'GET',
                    url : getUrl[optionIndex]+"?page="+filter.page+"&start_at="+defaultStartTime+"&end_at="+defaultEndTime,
                    success : function(data){
                        layer.closeAll('loading');
                        var data=data;
                        var totalPage=Math.ceil(data.total/data.per_page);
                        var currentPage=data.current_page;
                        tbodyHtml='';
                        if(optionIndex==0){
                            var m =0;
                            for(var i=0;i<data.data.length;i++){
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].hk_at+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                var status = data.data[i].status;
                                if (status == 1)
                                    status = '<span class="status_confirming">待确认</span>';
                                else if(status == 2)
                                    status = '<span class="status_success">充值成功</span>';
                                else if(status ==3)
                                    status = '<span class="status_error">充值失败</span>'
                                tbodyHtml+='   <td>'+status+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';

                        }else if(optionIndex==1){  //提款记录
                            var m =0;
                            for(var i=0;i<data.data.length;i++){
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                var status = data.data[i].status;
                                if (status == 1)
                                    status = '<span class="status_confirming">待确认</span>';
                                else if(status == 2)
                                    status = '<span class="status_success">提款成功</span>';
                                else if(status ==3)
                                    status = '<span class="status_error">提款失败</span>'
                                tbodyHtml+='   <td>'+status+'</td>';
                                var fail_reason = data.data[i].fail_reason==null ? '' : data.data[i].fail_reason;
                                tbodyHtml+='   <td>'+fail_reason+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';

                        }else if(optionIndex==2){  //额度转换
                            var m =0;
                            for(var i=0;i<data.data.length;i++){
                                var transfer_out_account = data.data[i].transfer_out_account;
                                var transfer_in_account = data.data[i].transfer_in_account;

                                if(transfer_out_account == 'AGS账户'){
                                    transfer_out_account = 'AG账户';
                                }
                                if(transfer_in_account == 'AGS账户'){
                                    transfer_in_account = 'AG账户';
                                }
                                if(transfer_out_account == 'SUNBETS账户'){
                                    transfer_out_account = 'SUNBET账户';
                                }
                                if(transfer_in_account == 'SUNBETS账户'){
                                    transfer_in_account = 'SUNBET账户';
                                }
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                tbodyHtml+='   <td>'+transfer_out_account+'/'+transfer_in_account+'</td>';
                                status = '成功'
                                tbodyHtml+='   <td>'+status+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';
                        }else if(optionIndex==3){  //游戏记录
                            var m = n =0;
                            for(var i=0;i<data.data.length;i++){
                                var sy = data.data[i].netAmount;
                                tbodyHtml+='<tr>';
                                if(data.data[i].api.api_name == 'AGS'){
                                    tbodyHtml+='   <td>AG</td>';
                                }else if(data.data[i].api.api_name == 'SUNBETS'){
                                    tbodyHtml+='   <td>SUNBET</td>';
                                }else{
                                    tbodyHtml+='   <td>'+data.data[i].api.api_name+'</td>';
                                }

                                tbodyHtml+='   <td>'+data.data[i].gameCode+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].betAmount+'</td>';
                                tbodyHtml+='   <td>'+sy+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].betTime+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].betAmount);
                                n+=Number(sy);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td>'+n+'元</td>';
                            tbodyHtml+='<td></td>';

                            tbodyHtml+='</tr>';
                        }else if(optionIndex==4){  //红利记录
                            var m = n =0;
                            for(var i=0;i<data.data.length;i++){
                                var type = '';
                                var api_t = data.data[i].type;
                                if (api_t == 1)
                                    type = '充值红利';
                                else if(api_t == 2)
                                    type = '平台红利';
                                else if(api_t == 3)
                                    type = '返水';
                                else if(api_t == 4)
                                    type = '充值红包'
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].type+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';
                        }
                        $('#zjjlcx>tbody').html(tbodyHtml);
                        $('.tcdPageCode').hide().eq(optionIndex).show();
                        if (initPage == false) {
                            for(var m=0;m<theadArr[optionIndex].length;m++){
                                theadHtml+='<th>'+theadArr[optionIndex][m]+'</th>';
                            }
                            $('#zjjlcxbt').html(theadHtml);
                            $(".tcdPageCode"+optionIndex).createPage({
                                pageCount: totalPage,
                                current: currentPage,
                                backFn: function (p) {
                                    layer.load();
                                    search(p);
                                }
                            });
                            layer.closeAll('loading');
                            initPage = true;
                        } else {
                            $(".tcdPageCode"+optionIndex).createPage({
                                pageCount: totalPage,
                                current: filter.page,
                                backFn:function(){
                                    layer.load();
                                }
                            });
                            layer.closeAll('loading');
                        }
                    }
                })
            };

            var search = function (p,type) {
                var filter = {
                    page: p
                }
                getList(filter);
            };

            search(1);
        }

        deposit();


        /*function deposit1(obj,type){
            var optionIndex= $('.report_option1').val();
            var theadArr=[['存款时间','存款金额','状态'],['提款时间','提款金额','状态'],['转账时间','金额','转出/转入账户','状态'],['平台','投注','输赢','时间'],['红利类型','金额',  '发放时间']];
            var defaultStartTime=$('#record3').val();
            var defaultEndTime=$('#record4').val();
            var getUrl=["{{ route('member.rechargeList') }}","{{ route('member.drawingList') }}","{{ route('member.transferList') }}","{{ route('member.gameRecordList') }}","{{ route('member.dividendList') }}"];
            var initPage=false;
            var tbodyHtml='';
            var theadHtml='';
            layer.load();
            var getList1 = function (filter) {
                console.log(optionIndex);
                $.ajax({
                    type : 'GET',
                    url : getUrl[optionIndex]+"?page="+filter.page+"&start_at="+defaultStartTime+"&end_at="+defaultEndTime,
                    success : function(data){
                        layer.closeAll('loading');
                        var data=data;
                        var totalPage=Math.ceil(data.total/data.per_page);
                        var currentPage=data.current_page;
                        tbodyHtml='';
                        if(optionIndex==0){
                            var m =0;
                            for(var i=0;i<data.data.length;i++){
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].hk_at+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                var status = data.data[i].status;
                                if (status == 1)
                                    status = '<span class="status_confirming">待确认</span>';
                                else if(status == 2)
                                    status = '<span class="status_success">充值成功</span>';
                                else if(status ==3)
                                    status = '<span class="status_error">充值失败</span>'
                                tbodyHtml+='   <td>'+status+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';

                        }else if(optionIndex==1){  //提款记录
                            var m =0;
                            for(var i=0;i<data.data.length;i++){
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                var status = data.data[i].status;
                                if (status == 1)
                                    status = '<span class="status_confirming">待确认</span>';
                                else if(status == 2)
                                    status = '<span class="status_success">提款成功</span>';
                                else if(status ==3)
                                    status = '<span class="status_error">提款失败</span>'
                                tbodyHtml+='   <td>'+status+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';

                        }else if(optionIndex==2){  //额度转换
                            var m =0;
                            for(var i=0;i<data.data.length;i++){
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].transfer_out_account+'/'+data.data[i].transfer_in_account+'</td>';
                                status = '成功'
                                tbodyHtml+='   <td>'+status+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';
                        }else if(optionIndex==3){  //游戏记录
                            var m = n =0;
                            for(var i=0;i<data.data.length;i++){
                                var sy = data.data[i].netAmount;
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+data.data[i].api.api_title+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].betAmount+'</td>';
                                tbodyHtml+='   <td>'+sy+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].betTime+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].betAmount);
                                n+=Number(sy);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td>'+n+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';
                        }else if(optionIndex==4){  //红利记录
                            var m = n =0;
                            for(var i=0;i<data.data.length;i++){
                                var type = '';
                                var api_t = data.data[i].type;
                                if (api_t == 1)
                                    type = '充值红利';
                                else if(api_t == 2)
                                    type = '平台红利';
                                else if(api_t == 3)
                                    type = '返水';
                                else if(api_t == 4)
                                    type = '充值红包'
                                tbodyHtml+='<tr>';
                                tbodyHtml+='   <td>'+type+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].money+'</td>';
                                tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                                tbodyHtml+='</tr>';
                                m+=Number(data.data[i].money);
                            }
                            tbodyHtml+='<tr>';
                            tbodyHtml+='<td>总和</td>';
                            tbodyHtml+='<td>'+m+'元</td>';
                            tbodyHtml+='<td></td>';
                            tbodyHtml+='</tr>';
                        }
                        $('#zdcx>tbody').html(tbodyHtml);
                        $('.ttcdPageCode').hide().eq(optionIndex).show();
                        if (initPage == false) {
                            for(var m=0;m<theadArr[optionIndex].length;m++){
                                theadHtml+='<th>'+theadArr[optionIndex][m]+'</th>';
                            }
                            $('#zdcxbt').html(theadHtml);
                            $(".ttcdPageCode"+optionIndex).createPage({
                                pageCount: totalPage,
                                current: currentPage,
                                backFn: function (p) {
                                    layer.load();
                                    search(p);
                                }
                            });
                            layer.closeAll('loading');
                            initPage = true;
                        } else {
                            $(".ttcdPageCode"+optionIndex).createPage({
                                pageCount: totalPage,
                                current: filter.page,
                                backFn:function(){
                                    layer.load();
                                }
                            });
                            layer.closeAll('loading');
                        }
                    }
                })
            };

            var search1 = function (p,type) {
                var filter = {
                    page: p
                }
                getList1(filter);
            };

            search1(1);
        }

        deposit1();*/


        // 参数切换页面
        weihuan_author_type(getQueryVariable('type'));
    </script>
@endsection
