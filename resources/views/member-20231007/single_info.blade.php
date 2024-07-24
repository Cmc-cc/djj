@if($_system_config->is_new_center == 1)
    <?php
        $path = 'member.layouts.new_main';
    ?>
@else
    <?php
        $path = 'member.template.'.$mb_path.'.layouts.main';
    ?>
@endif

@extends($path)
@section('content')
    <div id="layout-main-area">
        <div id="main-menu">
            <div class="menu-area">
                <ul class="list-group">
                    <li class="list-group-item member-info active">
                        <a href="{{ route('member.userCenter') }}">会员资料</a>
                    </li>
                    <li class="list-group-item member-password">
                        <a href="{{ route('member.login_psw') }}">修改密码</a>
                    </li>
                    @if($_system_config->is_fs==1)
                    <li class="list-group-item member-info">
                        <a href="{{ route('member.user_fs') }}">实时返水</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div id="main-container">
            <div class="module-main" style="height: 630px; overflow: auto;">
                <div class="info-container">
                    <div class="heading">用户信息</div>
                    <div class="info">
                        <table>
                            <tbody>
                            <tr>
                                <td class="col-xs-6">
                                    <table style="width:auto;">
                                        <tbody>
                                        <tr>
                                            <td style="text-align:right">会员帐号：</td>
                                            <td><span>{{ $_member->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right">真实姓名：</td>
                                            <td><span>{{ $_member->real_name }}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="col-xs-6 item-info">
                                    <div>账户余额</div>
                                    <span class="member_money">{{ $_member->all_money }}</span> 元
                                </td>
                                <td class="col-xs-4 item-info">
                                    <div>剩余码量</div>
                                    <span>{{ $_member->ml_money }}</span> 元
                                </td>
                                <td class="col-xs-4 item-info"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="info-container">
                    <div class="heading">银行信息</div>
                    @if(!$_member->bank_name)
                        <div class="info">
                            您还没有绑定银行账号，<a href="{{ route('member.update_bank_info') }}"
                                          class="btn btn-primary">点击绑定</a>
                        </div>
                    @else
                        <div class="info">
                            <table>
                                <tbody>
                                <tr>
                                </tr>
                                <tr>
                                    <td style="text-align:right">收款银行：</td>
                                    <td><span>{{ $_member->bank_name }}</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right">开户地址：</td>
                                    <td><span>{{ $_member->bank_address }}</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right">开户网点：</td>
                                    <td><span>{{ $_member->bank_branch_name }}</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right">开户姓名：</td>
                                    <td><span>{{ $_member->bank_username }}</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right">收款银行：</td>
                                    <td><span>{{ $_member->bank_card }}</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right"><a href="{{ route('member.update_bank_info') }}"
                                                                    class="btn btn-sm btn-primary">点击修改</a></td>
                                    <td></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after.js')
    <script>
        $(function () {
            $.ajax({
                type:'post',
                url : "{{route('member.api.wallet_balance')}}",
                dataType : 'json',
                success : function (data) {
                    //console.log(data);
                    if(data.statusCode == '01'){
                        var all = Number($('.member_money').text()) + Number(data.data);
                        $('.member_money').text('');
                        $('.member_money').text(parseInt(all.toFixed(2)));
                    }
                }
            })
        })
    </script>
@endsection