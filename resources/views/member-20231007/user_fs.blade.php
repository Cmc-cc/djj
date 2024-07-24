@php($path = 'member.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <div id="layout-main-area">
        <div id="main-menu">
            <div class="menu-area">
                <ul class="list-group">
                    <li class="list-group-item member-info">
                        <a href="{{ route('member.userCenter') }}">会员资料</a>
                    </li>
                    <li class="list-group-item member-password">
                        <a href="{{ route('member.login_psw') }}">修改密码</a>
                    </li>
                    <li class="list-group-item member-info active">
                        <a href="{{ route('member.user_fs') }}">实时返水</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="main-container">
            <form action="{{route('member.send_fs')}}" method="post">
            <div class="form-group">
                <label class="col-xs-6">可换金额:<span style="color: red">{{$total['fs_money']}}元</span></label>
                <input type="hidden" name="gane_str" value="{{$total['game_str']}}">
                <div class="col-xs-6">
                    <button type="button" class="btn btn-primary form-control ajax-submit-btn">全部兑换</button>
                </div>
            </div>
            </form>
            <?php
                $i= 0;
            ?>
            @foreach($list as $k => $v)
                @if(count($v) > 0)
                    <?php $i++?>
                <div class="info-container">
                    <div class="info" style="color:#333;">
                        <span style="font-weight: bold">{{config('platform.game_type')[$k]}}类</span>
                        <span>最近{{date('Y-m-d H:i:s')}}</span>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
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
                <table class="table table-striped table-bordered">
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
    </div>
    <script>
        $(function () {
            var fs_money = "{{$total['fs_money']}}";
            if(fs_money <= 0) {
                $('.ajax-submit-btn').attr('disabled', true);
            }
        })
    </script>
@endsection
