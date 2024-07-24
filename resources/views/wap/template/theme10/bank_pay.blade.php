@extends('wap.template.theme10.layouts.main')
@section('content')
    <div class="member-module member-module-rechargeQqpay clearboth">
        <div class="module-top">

            <div class="top-container navbar-nav">

                <div class="left-menu">
                    <a href="javascript:;" onclick="window.history.back();">
                        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                </div>

                <div class="page-title">银行支付</div>
            </div>


        </div>
        <link href="{{asset('/wap/theme3/css/pay.css')}}" rel="stylesheet" />
        <main class="panel slideout-panel slideout-panel-left">
            <div data-v-5e9fb540="" class="addCard view">
                <div class="userInfo wrap" style="padding: 10px;">
                    @foreach($bank_card_list as $item)
                        <table class="text-center" width="100%" border="0" cellpadding="0" cellspacing="1">
                            <tbody>
                            <tr>
                                <td style="width: 35%">付款银行</td>
                                <td>
                                    <span class="" id="BankId{{$item->id}}">{{ \App\Models\Base::$BANK_TYPE[$item->bank_id] }}</span>
                                </td>
                                <td>
                                    <a href="javascript:(0)" onclick="tapCopy('BankId{{$item->id}}')" style="color:#f00;margin-left:10px">点我复制</a>
                                </td>
                            </tr>
                            <tr>
                                <td>银行账号</td>
                                <td>
                                    <span class="" id="bankName{{$item->id}}">{{ $item->card_no }}</span>
                                </td>
                                <td >
                                    <a href="javascript:(0)" onclick="tapCopy('bankName{{ $item->id }}')" style="color:#f00;margin-left:10px">点我复制</a>
                                </td>
                            </tr>
                            <tr>
                                <td>开户人姓名</td>
                                <td>
                                    <span class="" id="AccountHolders{{ $item->id }}">{{ $item->username }}</span>
                                </td>
                                <td>
                                    <a href="javascript:(0)" onclick="tapCopy('AccountHolders{{ $item->id }}')" style="color:#f00;margin-left:10px">点我复制</a>
                                </td>
                            </tr>
                            <tr>
                                <td>开户地</td>
                                <td>
                                    <span class="" id="BankAdd{{$item->id}}">{{ $item->bank_address }}</span>
                                </td>
                                <td>
                                    <a href="javascript:(0)" onclick="tapCopy('BankAdd{{$item->id}}')" style="color:#f00;margin-left:10px">点我复制</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br/>
                    @endforeach
                    <p style="margin: 10px 0">温馨提示</p>
                    <div style="border: 1px solid #ccc;padding: 10px;">
                        <p><strong>温馨提示：</strong></p>
                        <p>一、在金额转出之后请务必填写该页下方的汇款信息表格，以便财务系统能够及时的为您确认并添加金额到您的会员帐户中。</p>
                        <p>二、本公司最低存款金额为100元，公司财务系统将对银行存款的会员按实际存款金额实行返利派送。</p>
                        <p>三、跨行转帐请您使用跨行快汇。</p>
                    </div>
                    <p style="margin: 10px 0;">填写汇款单</p>
                    <form id="form1" name="form1" action="{{ route('wap.bank_pay') }}" method="post">
                        <table width="100%" border="0" cellpadding="0" cellspacing="1" class="mt10">
                            <tbody><tr>
                                <td align="right">用户账号：</td>
                                <td class="c_blue">{{ $_member->name }}</td>
                            </tr>
                            <tr>
                                <td align="right">存款金额：</td>
                                <td><input name="money" type="number" class="input_150" id="v_amount" maxlength="10"></td>
                            </tr>
                            <tr>
                                <td align="right">汇款银行：</td>
                                <td>
                                    <select id="IntoBank" name="payment_desc" >
                                        <option value="" selected="selected">==请选择汇款银行==</option>
                                        @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                            <option value="{{ $v }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">汇款日期：</td>
                                <td>
                                    <?php
                                    $h_now = date('H');
                                    $i_now = date('i');
                                    $s_now = date('s');
                                    ?>
                                    <input name="paytime" type="text" id="cn_date" class="input_150 laydate-icon" maxlength="10" readonly="readonly" value="<?=date("Y-m-d")?>" onclick="laydate({format: 'YYYY-MM-DD', isclear: false, max: laydate.now()});" style="margin-bottom: 5px">
                                    <div>
                                        <select name="date_h" id="s_h" style="width: 50px">
                                            <@foreach(range(00, 24) as $v)
                                                <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif @if($v == $h_now) selected @endif>@if($v < 10) 0{{ $v }} @else {{ $v }} @endif</option>
                                            @endforeach
                                        </select> 时
                                        <select name="date_i" id="s_i" style="width: 50px">
                                            @foreach(range(00, 59) as $v)
                                                <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif @if($v == $i_now) selected @endif>@if($v < 10) 0{{ $v }} @else {{ $v }} @endif</option>
                                            @endforeach
                                        </select> 分
                                        <select name="date_s" id="s_s" style="width: 50px">
                                            @foreach(range(00, 59) as $v)
                                                <option @if($v < 10) value="0{{ $v }}" @else value="{{ $v }}" @endif @if($v == $s_now) selected @endif>@if($v < 10) 0{{ $v }} @else {{ $v }} @endif</option>
                                            @endforeach
                                        </select> 秒
                                    </div>
                                </td>
                            </tr>
                            <tr id="tr_v">
                                <td align="right">汇款人：</td>
                                <td><input name="name" type="text" class="input_150" id="v_Name" maxlength="20"></td>
                            </tr>
                            <tr>
                                <td align="right">汇款账号：</td>
                                <td><input name="account" type="text" class="input_150" id="v_site" maxlength="50"></td>
                            </tr>
                            <tr>
                                <td>付款截图</td>
                                <td>
                                    <label style="display:block;flex:1;" >
                                        <input type="hidden" value="" class="img" name="img">
                                        <img src="/backstage/images/img.png" alt="" style="width:100px;height:100px;" class="image"/>
                                        <input type="file"  name=""  class="singleimg" accept="image/*" style="opacity:0;width:10px;position: absolute;">
                                    </label>
                                </td>
                            </tr>        
                            <script>
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
                            </tbody></table>
                        <button  type="button" class="submit_btn ajax-submit-btn" id="SubTran" style="width: 100%;background-color: rgb(66,96,132) !important;">提交信息</button>
                    </form>

                    <!--        </div>-->
                </div>
            </div>
            <!---->
        </main>
        <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    </div>
@endsection