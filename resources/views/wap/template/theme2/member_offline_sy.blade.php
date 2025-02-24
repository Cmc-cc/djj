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
            <a class="f_l" href="{{ route('wap.agent') }}"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
            <span>会员输赢报表</span>
            <a class="f_r" href="{{ route('wap.agent') }}" style="visibility: hidden"><img src="{{ asset('/wap/images/user_back.png') }}" alt=""></a>
        </div>

        <div class="wrap userInfo">
            <form id="form1" name="form1" action="" method="get">
                <input type="hidden" name="q" value="1">
                <table cellspacing="0" cellpadding="0" border="0" class="tab1">
                    <tr>
                        <td class="bg" align="right">开始日期：</td>
                        <td>
                            <input name="cn_begin" type="text" id="cn_begin" required class="input_150 laydate-icon"
                                   readonly="readonly" value="<?= $cn_begin ?>" onclick="laydate();"
                                   style="cursor: pointer; margin-bottom: 5px"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg" align="right">结束日期：</td>
                        <td>
                            <input name="cn_end" type="text" id="cn_end" required class="input_150 laydate-icon" readonly="readonly"
                                   value="<?= $cn_end ?>" onclick="laydate();" style="cursor: pointer; margin-bottom: 5px"/>
                        </td>
                    </tr>
                </table>
                <button type="submit"  class="submit_btn">查　询</button>
            </form>

            <dl>
                <dt>
                    存款报表
                </dt>
                <dd style="padding: 0;border: none">
                    <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                        <tr>
                            <td width=50%">存款总额</td>
                            <td width=50%">存款笔数</td>
                        </tr>

                        <tr>
                            <td>{{ $total_recharge }}</td>
                            <td>{{ $recharge_count }}</td>
                        </tr>
                    </table>
                </dd>
            </dl>
            <dl>
                <dt>
                    提款报表
                </dt>
                <dd style="padding: 0;border: none">
                    <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                        <tr>
                            <td width=50%">提款总额</td>
                            <td width=50%">提款笔数</td>
                        </tr>
                        <tr>
                            <td>{{ $total_drawing }}</td>
                            <td>{{ $drawing_count }}</td>
                        </tr>
                    </table>
                </dd>
            </dl>
            <dl>
                <dt>
                    红利报表
                </dt>
                <dd style="padding: 0;border: none">
                    <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                        <tr>
                            <td width=50%">红利总额</td>
                            <td width=50%">红利笔数</td>
                        </tr>
                        <tr>
                            <td>{{ $total_dividend }}</td>
                            <td>{{ $dividend_count }}</td>
                        </tr>
                    </table>
                </dd>
            </dl>
            <dl>
                <dt>
                    汇总报表
                </dt>
                <dd style="padding: 0;border: none">
                    <table cellspacing="0" cellpadding="0" border="0" class="tab1 text-center">
                        <tr>
                            <td width=50%">盈利</td>
                            <td width=50%">会员输赢</td>
                        </tr>
                        <tr>
                            <td>{{ $total_recharge - $total_drawing - $total_dividend }}</td>
                            <td>{{ $total_drawing -  $total_recharge }}</td>
                        </tr>
                    </table>
                </dd>
            </dl>
        </div>

    </div>
@endsection
@section('after.js')
    <script type="text/javascript" src="{{ asset('/wap/js/laydate.js') }}"></script>
    @endsection