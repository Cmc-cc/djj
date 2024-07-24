<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dividend;
use App\Models\Member;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recharge;
use App\Traits\ValidationTrait;
use DB;
use App\Models\MemberMlLog;
use App\Models\MemberMoneyLog;
class RechargeController extends Controller
{
    use ValidationTrait;
    public function index(Request $request)
    {
        $mod = new Recharge();

        $status = $payment_type = $name = $start_at = $end_at ='';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
            $mod = $mod->whereIn('member_id', $m_list);
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }

        if ($request->has('payment_type'))
        {
            $payment_type = $request->get('payment_type');
            $mod = $mod->where('payment_type', $payment_type);
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('created_at', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('created_at', '<=',$end_at);
        }

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        $total_recharge = $mod->sum('money');
        $total_diff_money = $mod->sum('diff_money');

        return view('admin.recharge.index', compact('data', 'status', 'payment_type', 'total_recharge', 'total_diff_money', 'name', 'start_at', 'end_at'));
    }

    public function show($id)
    {
        $data = Recharge::findOrFail($id);

        $mod = SystemConfig::where('id',1)->first();
        $cz_ration = $mod->cz_ration / 100;
        $data->diff_money = sprintf('%.2f',$data -> money * $cz_ration);
        $member = Db::table('members')->where('id',$data->member_id)->first();
        // if($member->is_new==1 && $data->money >= $mod->new_level){
        // if($member->is_new==1 && $mod->new_level >0 && $mod->new_point >0 && $data->money == $mod->new_level){
        //     $data->diff_money = $mod->new_point;
        // }
        $data->ml_money = $data->money * $mod->ml_percent;
        
        if($data->fanli == 1){
            $data->diff_money = sprintf('%.2f',$data -> money * $cz_ration);
            
            $data->ml_money = ($data->diff_money + $data->money) * $mod->rc_ml_percent ;
        }
        
        
        if($member->is_new==1 && $data->fanli == 2){
            // $data->ml_money = $data->money * $mod->ml_percent;
            $data->diff_money = round($data->money * $mod->sc_percent / 100 ,2);
            
            $data->ml_money = ($data->diff_money + $data->money) * $mod->hongli_ml_percent ;
        }
        if($member->is_new2==1 && $data->fanli == 3){
            // $data->ml_money = $data->money * $mod->ml_percent;
            $data->diff_money = round($data->money * $mod->new_sc_percent / 100 ,2);
            
            $data->ml_money = ($data->diff_money + $data->money) * $mod->hongli_new_percent ;
        }
        if($data->fanli==0){
            $data->ml_money = $data->money * $mod->ml_percent;
            $data->diff_money = 0;
        }
        $data->daili = round($mod->daili_report * $data -> money / 100 ,2);
        
        $data->ml_money = round($data->ml_money,2);
        
        //上次充值
        $last = Db::table('recharge')->where('status',2)->where('member_id',$data->member_id)->orderBy('created_at','desc')->first();
        return view('admin.recharge.show', compact('data','last'));
    }

    //转账成功
    public function confirm(Request $request, $id)
    {

        $validator = $this->verify($request, 'recharge.confirm');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        if ($request->get('money') < 1)
            return responseWrong('充值金额不达标');

        $mod = Recharge::findOrFail($id);
        $data = $request->all();
		$sys = SystemConfig::find(1);
        try{
            DB::transaction(function() use($mod, $data,$request,$sys) {

                $diff_money = $request->get('diff_money') > 0 ? $request->get('diff_money') : 0 ;

                $mod->update([
                    'status' => 2,
                    'confirm_at' => date('Y-m-d H:i:s'),
                    'diff_money' => $diff_money
                ]);

                //如果存在赠送金额 则添加进红利表
                if ($diff_money > 0)
                    Dividend::create([
                        'member_id' => $mod->member_id,
                        'type' => 1,
                        'money' => $request->get('diff_money'),
                        'describe' => '充值赠送金额',
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                        'status' => 1
                    ]);

                //用户中心账户加钱
                $m = $mod->money + $diff_money;
                
                $m = round($m/2 , 2);
                $data['ml_money'] = $data['ml_money']/2;
                $mod->member()->increment('money', $m);
                $member = Db::table('members')->where('id',$mod->member_id)->first();
                
                   //增加余额充值记录
                MemberMoneyLog::addLog($mod->member_id,$m,$member->money,1,$mod->bill_no);
                Db::table('members')->where('id',$mod->member_id)->update(['is_new'=> 0,'is_new2'=> 0]);
                Db::table('members')->where('id',$mod->member_id)->increment('ml_money',$data['ml_money']);
                MemberMlLog::addLog( $mod->member_id,$data['ml_money'],$member->ml_money,2,$mod->bill_no);

            });
        }catch(Exception $e){
            DB::rollback();
            return respF('创建失败');
        }

        return responseSuccess('确认汇款成功', '', route('recharge.index'));
    }

    public function create()
    {
        return view('admin.recharge.create');
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'recharge.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        Recharge::create($data);

        return responseSuccess('', '', route('recharge.index'));

    }

    public function edit($id)
    {
        $data = Recharge::findOrFail($id);

        return view('admin.recharge.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$request->has('fail_reason'))
            respF('请输入不通过原因');

        $mod = Recharge::findOrFail($id);

        $mod->update([
            'fail_reason' => $request->get('fail_reason'),
            'status' => 3
        ]);

        return respS();

    }

    public function destroy($id)
    {
        Recharge::destroy($id);

        return respS();
    }
	
	public function updatedama(Request $request, $id)
    {
        if (!$request->has('dml'))
            respF('请输入打码倍数');

        $mod = Recharge::findOrFail($id);

        $mod->update([
            'dml' => $request->get('dml')
        ]);

        return respS();

    }
}
