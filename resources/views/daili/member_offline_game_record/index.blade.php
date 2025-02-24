@extends('daili.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">下线会员输赢记录</h3>
            </div>
            <div class="panel-body">
                @include('daili.member_offline_game_record.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>账号</th>
                        <th style="width: 8%">平台账号</th>
                        <th style="width: 5%">平台名称</th>
                        <th style="width: 8%">输赢情况</th>
                        <th style="width: 8%">下注金额</th>
                        <th style="width: 8%">有效下注</th>
                        <th style="width: 8%">游戏名称</th>
						<th style="width: 8%">玩法</th>
                        <th style="width: 10%">下注内容</th>
                        <th style="width: 20%">下注时间</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->member->name  or '已删除' }}
                            </td>
                            <td>
                                {{ $item->playerName }}
                            </td>
                            <td>
                                {{ $item->api->api_name or '已下线'}}
                            </td>
                            <td>
                                {{ $item->netAmount }}
                            </td>
                            <td>
                                {{ $item->betAmount }}
                            </td>
                            <td>
                                {{ $item->validBetAmount }}
                            </td>
                            <td>
                                {{--@if($item->gameType == 4)
                                    {{ $item->wfmz }}
                                @elseif($item->gameType == 5)
                                    {{ $item->odds }}({{ $item->oddsType }})
                                @else
                                    {{ $item->gameCode }}
                                @endif--}}
                                {{ $item->gamename }}
                            </td>
                            <td>
							{{ $item->BetAlias }}
                            </td>
							<td>
							{{ $item->stringex }}
                            </td>
                            <td>
                                {{ $item->betTime }}
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="3"></td>
                        <td><strong style="color: red">{{ $total_netAmount }}</strong></td>
                        <td><strong style="color: red">{{ $total_betAmount }}</strong></td>
                        <td><strong style="color: red">{{ $total_validBetAmount }}</strong></td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type])->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->


@endsection
@section("after.js")
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
@endsection