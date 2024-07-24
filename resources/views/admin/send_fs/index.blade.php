@extends('admin.layouts.main')
@section('content')

    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">一键返水</h3>
            </div>
            <div class="panel-body">
                @include('admin.send_fs.filter')
                <form action="{{ route('send_fs.store') }}" method="post" id="fsform">
				    <input type="hidden" name="start_at" value="{{ Session::get('start_at') }}">
					<input type="hidden" name="gametype" value="{{ $gameType }}">
					<input type="hidden" name="api_type" value="{{ $api_type }}">
					<input type="hidden" name="end_at"  value="{{ Session::get('end_at') }}">
                    <div class="row text-center" style="margin-top: 5px;margin-bottom: 5px;">
                        <button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>
                        {{--<div class="col-lg-12">--}}
                        {{--<div class="input-group">--}}
                        {{--<button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 10%">会员</th>
                            <th style="width: 20%">游戏类型</th>
                            <th style="width: 5%">接口</th>
                            <th style="width: 5%">笔数</th>
                            <th>有效投注金额</th>
                            <th style="width: 20%">返水等级</th>
                            <th style="width: 10%">返水比例</th>
                            <th style="width: 15%">返水金额</th>
                        </tr>
                        <?php
                       
                        ?>
                        @foreach($data as $item)
                                <input type="hidden" name="gamebillno[{{$item->member_id}}]" checked value="{{ $item->gamebillno }}">
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="member_id[]" checked value="{{ $item->member_id }}">{{ $item->name }}
                                        </label>
                                    </td>
                                    <td>
                                        {{ config('platform.game_type')[$gameType] }}
                                    </td>
                                    <td>
                                        @if($api_type){{ $_api_list[$api_type] }} @else 全部  @endif
                                    </td>
                                    <td>
                                        {{ $item->num }}
                                    </td>
                                    <td>
                                        {{ $item->tz_amount }}
                                    </td>
                                    <td>
                                        {{ $item->level_name }}
                                    </td>
                                    <td>
                                        {{ $item->rate.'%' }}
                                    </td>
                                    <td>
                                        <input type="text" name="money[{{$item->member_id}}]" class="form-control"  style="max-width: 80px;" value="{{ sprintf("%.2f",  $item->tz_amount*$item->rate/100) }}">
                                    </td>
                                </tr>
                         
                        @endforeach
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red">{{ $total_num }}</strong></td>
                            <td><strong style="color: red">{{ $total_tz_amount }}</strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red">{{ $total_fs_money }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
				
                <div class="clearfix">
                <div class="pull-left" style="margin: 0;">
                <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                </div>
                <div class="pull-right" style="margin: 0;">
                 {!! $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type, 'gameType' => $gameType])->links() !!}
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