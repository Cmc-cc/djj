<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\ActivityApply;
use App\Models\Dividend;
use App\Models\Member;
use App\Models\Recharge;
use App\Traits\ValidationTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityApplyController extends Controller
{
    //
    use ValidationTrait;
    public function index(Request $request)
    {
        $mod = new ActivityApply();

        $name = $title = '';

        if($request->has('name')){
            $name = $request->get('name');
            $m_list = Member::where('name','LIKE',"%$name%")->pluck('id');
            $mod = $mod->whereIn('member_id', $m_list);
        }
        if($request->has('title')) {
            $title = $request->get('title');
            $a_list = Activity::where('title', 'LIKE', "%$title%")->pluck('id');
            $mod = $mod->whereIn('activity_id', $a_list);
        }
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        return view('admin.activity_apply.index', compact('data', 'name', 'title'));
    }
    public function show($id)
    {
        $data = ActivityApply::findOrFail($id);
        $givemoney = '';
        //首存活动
        if($data->activity->type == 9){
            $first_recharge = Recharge::where('member_id', $data->member->id)->where('status', 2)->where('created_at', '>=', $data->activity->start_at)->where('created_at', '<=', $data->activity->end_at)->orderBy('created_at', 'asc')->first();

            $givemoney = $first_recharge->money * $data->activity->rate/100;
        }
        //充值活动
        if($data->activity->type == 3){
            $recharge_money = Recharge::where('member_id', $data->member->id)->where('status', 2)->where('created_at', '>=', $data->activity->start_at)->where('created_at', '<=', $data->activity->end_at)->sum('money');

            $givemoney = $recharge_money * $data->activity->rate/100;
        }
        if($givemoney > $data->activity->gift_limit_money) {
            $givemoney = $data->activity->gift_limit_money;
        }
        if($data->activity->type == 8) {
            //注册活动
            $givemoney = $data->activity->direct_money;
        }
        return view('admin.activity_apply.show', compact('data', 'givemoney'));

    }

    //转账成功
    public function confirm(Request $request, $id)
    {
        if ($request->get('givemoney') < 1)
            return responseWrong('赠送金额为0请选择不通过');

        $mod = ActivityApply::findOrFail($id);

        $mod->update([
            'status' => 2
        ]);

        //如果存在赠送金额 则添加进红利表

        Dividend::create([
            'member_id' => $mod->member_id,
            'type' => $mod->activity->type,
            'money' => $request->get('givemoney'),
            'describe' => '充值赠送金额',
            'status' => 1
        ]);

        //更新用户余额
        $money = $mod->member->money + $request->get('givemoney');
        $member_mod = Member::findOrFail($mod->member_id);
        $member_mod->update([
            'money' => $money
        ]);

        return responseSuccess('审核通过', '', route('activity_apply.index'));
    }

    public function update(Request $request, $id)
    {
        $mod = ActivityApply::findOrFail($id);

        $mod->update([
            'fail_reason' => $request->get('fail_reason'),
            'status' => 3
        ]);

        return respS();

    }
    public function destroy($id)
    {
        ActivityApply::destroy($id);

        return respS();
    }

    public function delall(Request $request)
    {
        $ids = $request->input('ids');

        $ids_a = explode(',', $ids);

        foreach($ids_a as $id)
        {
            $this->destroy($id);
        }

        return respS();
    }
}
