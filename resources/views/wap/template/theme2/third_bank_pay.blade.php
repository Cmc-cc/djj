@extends('wap.template.theme2.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="javascript:history.go(-1)"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
            <span>网银支付</span>
            <a class="f_r" href="javascript:history.go(-1)" style="visibility: hidden"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
        </div>
        <div class="userInfo wrap" style="padding: 10px;">
            <form id="form1" name="form1" action="{{ route('pay') }}" method="post">
                {!! csrf_field() !!}
                <table width="100%" border="0" cellpadding="0" cellspacing="1" class="mt10">
                    <tr>
                        <td align="right">选择银行：</td>
                        <td class="c_blue">
                            <select name="paytype" onChange="changePay(this.options[this.selectedIndex].value)">
                                {{--<option value="1">微信直转</option>
							  <option value="3">支付宝直转</option>
							  <option value="3">云闪付直转</option>--}}
							  <option value="3" selected="">支付宝</option>
							  {{--<option value="5">支付宝中转</option>
							  <option value="6">云闪付中转</option>--}}
                            {{--<option value="alipaywap">支付宝wap</option>--}}
                            {{--<option value="gzhpay">微信公众号支付</option>--}}
                            </select>
                            <input type="hidden" name="get_code" value="0">
                        </td>
                    </tr>
                    {{--<tr id="bankcode">--}}
                    {{--<td align="right">选择银行：</td>--}}
                    {{--<td class="c_blue">--}}
                    {{--<select name="bankId" id="bankId">--}}
                    {{--<option value="ICBC">工商银行</option>--}}
                    {{--<option value="CMB">招商银行</option>--}}
                    {{--<option value="CCB">建设银行</option>--}}
                    {{--<option value="COMM">交通银行</option>--}}
                    {{--<option value="ABC">农业银行</option>--}}
                    {{--<option value="BOC">中国银行</option>--}}
                    {{--<option value="CIB">兴业银行</option>--}}
                    {{--<option value="SPDB">浦发银行</option>--}}
                    {{--<option value="CMBC">民生银行</option>--}}
                    {{--<option value="CNCB">中信银行</option>--}}
                    {{--<option value="CEB">光大银行</option>--}}
                    {{--<option value="HXB">华夏银行</option>--}}
                    {{--<option value="PSBC">邮政储蓄银行</option>--}}
                    {{--<option value="CGB">广发银行</option>--}}
                    {{--<option value="PAB">平安银行</option>--}}
                    {{--</select>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr id="weixin" style="display:none">--}}
                    {{--<td align="right">微信选项</td>--}}
                    {{--<td class="c_blue">--}}
                    {{--<select name="get_code">--}}
                    {{--<option value="0">默认</option>--}}
                    {{--<option value="1">仅获取二维码</option>--}}
                    {{--</select>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td align="right">存款金额：</td>
                        <td><input type="radio"  name="amount" value="100"> 100元 
						<input type="radio"  name="amount" value="300"> 300元
						<input type="radio"  name="amount" value="500"> 500元
						<input type="radio"  name="amount" value="1000"> 1000元
						<input type="radio"  name="amount" value="3000"> 3000元
						<input type="radio"  name="amount" value="5000"> 5000元
						<input type="radio"  name="amount" value="10000"> 10000元</td>
                    </tr>
                </table>
                <button type="submit" class="submit_btn" id="SubTran" style="width: 100%">提交信息</button>
            </form>

            <!--        </div>-->
        </div>
    </div>
    <script>
        //        function changePay(pname){
        //            //document.getElementById('bankcode').style.display='none';
        //            document.getElementById('weixin').style.display='none';
        ////            if(pname=='bank'){
        ////                document.getElementById('bankcode').style.display='';
        ////            }
        //            if(pname=='weixin'){
        //                document.getElementById('weixin').style.display='';
        //            }
        //        }
    </script>
@endsection