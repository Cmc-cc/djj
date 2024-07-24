<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\ApiClientController;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\GameRecord;
use App\Models\Recharge;
use App\Models\Transfer;
use App\Services\SelfService;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Member;
use Auth;
use App\Models\AdminActionMoneyLog;
use App\Models\MemberLoginLog;
use Illuminate\Support\Facades\DB;
use App\Services\LEYUService;
use App\Models\MemberMoneyLog;


class MemberController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Member();
        $name = $status = $register_ip = $on_line = $real_name = $last_login_ip = $phone= $register_url= $top_id = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        if ($request->has('real_name'))
        {
            $real_name = $request->get('real_name');
            $mod = $mod->where('real_name', 'like', "%$real_name%");
        }
        if ($request->has('register_ip'))
        {
            $register_ip = $request->get('register_ip');
            $mod = $mod->where('register_ip', 'like', "%$register_ip%");
        }
        if ($request->has('last_login_ip'))
        {
            $last_login_ip = $request->get('last_login_ip');
            $mod = $mod->where('last_login_ip', 'like', "%$last_login_ip%");
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        if ($request->has('on_line'))
        {
            $on_line = $request->get('on_line');
            if ($on_line == 1)
            {
                $_online_member_array = MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-3 hours')))->pluck('member_id')->toArray();
                $mod = $mod->whereIn('id', $_online_member_array);
            }

        }
        
        
        if ($request->has('phone'))
        {
            $phone = $request->get('phone');
            $mod = $mod->where('phone', $phone);
        }
        if ($request->has('register_url'))
        {
            $register_url = $request->get('register_url');
            $mod = $mod->where('register_url', $register_url);
        }
        if ($request->has('top_id'))
        {
            $top_id = $request->get('top_id');
            $daili = Db::table('members')->where('name',$top_id)->first();
            if($daili){
                $daili_id = $daili->id;
            }else{
                $daili_id = 999999999;
            }
            $mod = $mod->where('top_id', $daili_id);
        }
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));


        //dump($data->toArray());

        /*foreach($data as $item){
            $money_obj = (new SelfService())->wallet_balance($item->name);
            $money = json_decode($money_obj,true);
            //print_r($money);
            $item->money = $item->money + $money['data'];
        }*/
        return view('admin.member.index', compact('data', 'name','real_name', 'status', 'register_ip', 'on_line','last_login_ip','phone','register_url','top_id'));
    }

    public function assign($id)
    {
        
        $data = Member::findOrFail($id);
        $daili_list = Member::where('is_daili', 1)->pluck('name', 'id')->toArray();

        return view('admin.member.assign', compact('data', 'daili_list'));
    }

    public function post_assign(Request $request, $id)
    {
        if (!$request->has('top_id'))
            return responseWrong('请选择 代理');
        $admin = Auth::user();
        $member = Member::findOrFail($id);
        Db::table('daili_change_log')->insert([
            'name'=>$member->name,
            'old'=>Db::table('members')->where('id',$member->top_id)->value('name'),
            'new'=>Db::table('members')->where('id',$request->get('top_id'))->value('name'),
            'created_at'=>date('Y-m-d H:i:s'),
            'admin'=>$admin->name
        ]);
        $member->update([
            'top_id' => $request->get('top_id')
        ]);
        
        return responseSuccess('', '分配代理成功', route('member.index'));
    }

    public function showGameRecordInfo(Request $request, $id)
    {
        $mod = new GameRecord();
        $start_at = $end_at = $api_type ='';
        if ($request->has('api_type'))
        {
            $api_type = $request->get('api_type');
            $mod = $mod->where('api_type', $api_type);
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('betTime', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('betTime', '<=',$end_at);
        }

        $mod = $mod->where('member_id', $id);

        $data = $mod->orderBy('betTime', 'desc')->paginate(config('admin.page-size'));

        // $total_netAmount = $mod->sum('netAmount');
        // $total_betAmount = $mod->sum('betAmount');

        $total_netAmount = $mod->sum('netAmount');
        $total_betAmount = $mod->sum('betAmount');
       // $total_netAmount = $total_netAmount - $total_betAmount;
        $total_validBetAmount = $mod->sum('validBetAmount');

        return view('admin.member.showGameRecordInfo', compact('data','start_at', 'end_at', 'api_type', 'total_netAmount', 'total_betAmount', 'id', 'total_validBetAmount'));
    }

    public function showRechargeInfo(Request $request, $id)
    {
        $mod = new Recharge();

        $status = $payment_type = '';

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

        $mod = $mod->where('member_id', $id);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        $total_recharge = $mod->sum('money');
        $total_diff_money = $mod->sum('diff_money');

        return view('admin.member.showRechargeInfo', compact('data', 'status', 'payment_type', 'total_recharge', 'total_diff_money', 'id'));
    }

    public function showDrawingInfo(Request $request, $id)
    {
        $mod = new Drawing();

        $status = '';

        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        $mod = $mod->where('member_id', $id);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        $total_money = $mod->sum('money');
        $total_counter_fee = $mod->sum('counter_fee');

        return view('admin.member.showDrawingInfo', compact('data', 'status', 'total_money', 'total_counter_fee', 'id'));
    }

    public function showDividendInfo(Request $request, $id)
    {
        $mod = new Dividend();

        $type = '';

        if ($request->has('type'))
        {
            $type = $request->get('type');
            $mod = $mod->where('type', $type);
        }

        $mod = $mod->where('member_id', $id);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        $total_money = $mod->sum('money');

        return view('admin.member.showDividendInfo', compact('data','total_money', 'type','id'));
    }

    public function checkBalance(Request $request,$id)
    {
        
        $data = Member::FindOrFail($id);
        if ($request->has('ml_money'))
        {
            $ml_money = $request->get('ml_money');
            $m_list = Member::where('id', $id)->update(['ml_money'=>$ml_money]);
            $data = Member::FindOrFail($id);
        }
        $apis = [];
        $api_list = Db::table('member_api')->where('member_id',$data->id)->groupBy('api_id')->get();
        if($api_list){
            foreach ($api_list as $k=>$v){
                $api = Db::table('api')->where('id',$v->api_id)->where('on_line',0)->first();
                if($api){
                    $api->money = $v->money;
                    $apis[] = $api;
                }
            }
        }
        return view('admin.member.checkBalance', compact('data', 'id','apis'));
    }

    public function showTransfer(Request $request, $id)
    {
        $mod = new Transfer();
        $result = $name = $type = $transfer_type = $transfer_in_account = $transfer_out_account = $start_at = $end_at = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
            $mod = $mod->whereIn('member_id', $m_list);
        }
        if ($request->has('transfer_in_account'))
        {
            $transfer_in_account = $request->get('transfer_in_account');
            $mod = $mod->where('transfer_in_account', 'LIKE', "%$transfer_in_account%");
        }
        if ($request->has('transfer_out_account'))
        {
            $transfer_out_account = $request->get('transfer_out_account');
            $mod = $mod->where('transfer_out_account', 'LIKE', "%$transfer_out_account%");
        }
        if ($request->has('transfer_type'))
        {
            $transfer_type = $request->get('transfer_type');
            $mod = $mod->where('transfer_type', $transfer_type);
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
        if ($request->has('result'))
        {
            $result = $request->get('result');
            if($result==0){
                $mod = $mod->where('result',0);
            }else{
                $mod = $mod->where('result','<>' ,0);
            }
            
        }
        $mod = $mod->where('member_id', $id);
        $total_money = $mod->sum('money');
        $total_diff_money = $mod->sum('diff_money');

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));

        return view('admin.member.showTransfer', compact('data', 'name', 'transfer_in_account', 'transfer_out_account', 'transfer_type', 'start_at', 'end_at', 'total_money', 'total_diff_money', 'id','result'));
    }

    public function export(Request $request)
    {
        $map = [];
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $map['name'] = ['name', 'like', "%$name%"];
        }

        if ($request->has('realname'))
        {
            $realname = $request->get('realname');
            $map['realname'] = ['realname', 'like', "%$realname%"];
        }

        //默认不显示超级管理员
        $map['is_super_admin'] = 0;
        $data = MemberRepository::getByWhere($map)->toArray();

        Excel::create('测试', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->rows(
                    $data
                );
            });
        })->download('xls');
    }

    public function create()
    {
        $daili = Member::where('is_daili',1)->get();
        return view('admin.member.create',compact('daili'));
    }

    /**
     *
     * 创建
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = $this->verify($request, 'member.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        if(strlen((string)$request->get('qk_pwd')) != 6){
            return responseWrong('取款密码为6位纯数字');
        }



        $data = $request->all();

        Member::create([
            'name' => $data['name'],
            'is_daili' => $data['is_daili'],
            'top_id' =>$data['top_id'],
            'password' => bcrypt($data['password']),
            'original_password' => substr(md5(md5($data['name'])), 0,10),
            'o_password' => $data['password'],
            'invite_code' => getRandom(7),
            'real_name' => $data['real_name'],
            'qk_pwd' => $data['qk_pwd'],
            'register_ip' => $request->getClientIp(),
            'phone' => $data['phone'],
            'email' => $data['email'],
            'qq' => $data['qq'],
            'weixin' => $data['weixin'],
            'register_url'=>'后台管理添加',
        ]);
        //Member::create($data);

        return responseSuccess('','添加成功', route('member.index'));
    }

    /**
     *
     * 编辑
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data= Member::findOrFail($id);

        $banks = config('bank');
        return view('admin.member.edit', compact('data','banks'));
    }
    public function edit2($id)
    {
        $data= Member::findOrFail($id);
        $apis = [];
        $api_list = Db::table('member_api')->where('member_id',$data->id)->groupBy('api_id')->get();
        if($api_list){
            foreach ($api_list as $k=>$v){
                $api = Db::table('api')->where('id',$v->api_id)->where('on_line','<>','1')->first();
                if($api){
                    $apis[] = $api;
                }
            }
        }
        return view('admin.member.edit2', compact('data','apis'));
    }
    public function update2(Request $request, $id)
    {
        $member= Member::findOrFail($id);

        $money_type = $request->get('money_type');
        $type = $request->get('type');
        $my_money = trim($request->get('my_money'));
        $ml_money = trim($request->get('ml_money'));
        
        $remark = $request->get('remark');
        if(empty($money_type)){
            return responseWrong('请选择加款类型！');
        }
        if(empty($my_money)){
            return responseWrong('请输入金额！');
        }
        if($money_type=='in'){
            if(empty($type)){
                return responseWrong('请输入红利类型！');
            }
        }




        $types = config('platform.dividend_type');

        if($money_type == 'in'){

            if($type == 1) {
                DB::beginTransaction(); //开启事务
                try{
                    Recharge::create([
                        'bill_no' => getBillNo(),
                        'member_id' => $member->id,
                        'name' => $member->name,
                        'money' => $my_money,
                        'payment_type' => 7,
                        'account' => '系统充值',
                        'status' => 2,
                        'hk_at' => date('Y-m-d H:i:s'),
                        'confirm_at' =>date('Y-m-d H:i:s')
                    ]);
                    //用户中心账户加钱
                    MemberMoneyLog::addLog( $member->id,$my_money,$member->money,5,time());
                    $member->increment('money', $my_money);
                    
                    if($ml_money){
                        $member->increment('ml_money', $my_money*$ml_money);
                    }
                    DB::commit();
                }catch (\Exception $e){
                    DB::rollback();
                    return responseWrong('加款失败,请重试！！');
                }
                return responseSuccess('成功','', route('member.index'));

            }else{

                if($member->is_trans_on == 1) {
                    $result = (new SelfService())->wallet_balance($member->name);
                    $res = json_decode($result,true);
                    $center_money = $res['data'];
                    if(!$res){
                        return responseWrong('网络错误请稍后重试');
                    }
                    if($res['statusCode'] != 01){
                        return responseWrong('网络错误请稍后重试');
                    }
                    $all_money = $member->money + $center_money;
                    try{
                        DB::transaction(function() use($member, $type,$my_money,$remark,$types,$all_money) {
                            //如果存在赠送金额 则添加进红利表
                            Dividend::create([
                                'member_id' => $member->id,
                                'type' => $type,
                                'money' => $my_money,
                                'describe' => $remark ? $remark : $types[$type],
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                                'status' => 1
                            ]);
                            //用户本地账户加钱
                            $member->increment('money', $my_money);
                            $user = \Auth::user();
                            AdminActionMoneyLog::create([
                                'member_id' => $member->id,
                                'user_id' => $user->id,
                                'old_money' => $all_money,
                                'new_money' => $all_money + $my_money,
                                /*'old_fs_money' => $old_fs_money ? $old_fs_money : 0 ,
                                'new_fs_money' => $new_fs_money ? $new_fs_money : 0*/
                                'remark'=>$remark
                            ]);
                        });
                    }catch(Exception $e){
                        DB::rollback();
                        return responseWrong('加款失败,请重试！！');
                    }
                }else{
                    $all_money = $member->money;
                    try{
                        DB::transaction(function() use($member, $type,$my_money,$remark,$types,$all_money,$ml_money) {
                            //如果存在赠送金额 则添加进红利表
                            Dividend::create([
                                'member_id' => $member->id,
                                'type' => $type,
                                'money' => $my_money,
                                'describe' => $remark ? $remark : $types[$type],
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                                'status' => 1
                            ]);
                            //用户本地账户加钱
                            //用户中心账户加钱
                            MemberMoneyLog::addLog( $member->id,$my_money,$all_money,5,time());
                            $member->increment('money', $my_money);
                            if($ml_money){
                                $member->increment('ml_money', $my_money*$ml_money);
                            }
                            $user = \Auth::user();
                            AdminActionMoneyLog::create([
                                'member_id' => $member->id,
                                'user_id' => $user->id,
                                'old_money' => $all_money,
                                'new_money' => $all_money + $my_money,
                                /*'old_fs_money' => $old_fs_money ? $old_fs_money : 0 ,
                                'new_fs_money' => $new_fs_money ? $new_fs_money : 0*/
                                'remark'=>$remark
                            ]);
                        });
                    }catch(Exception $e){
                        DB::rollback();
                        return responseWrong('加款失败,请重试！！');
                    }
                }

                return responseSuccess('','', route('member.index'));
            }

        }elseif($money_type=='out'){

        if($member->is_trans_on == 1) {


            $result = (new SelfService())->wallet_balance($member->name);
            $res = json_decode($result,true);
            $center_money = $res['data'];
            if(!$res){
                return responseWrong('网络错误请稍后重试');
            }
            if($res['statusCode'] != 01){
                return responseWrong('网络错误请稍后重试');
            }
            $all_money = $member->money + $center_money;

            if($all_money < $my_money){
                return responseWrong('用户余额不足！！扣款失败！！');
            }else{

                DB::beginTransaction();
                try{
                    if($center_money > 0){
                        $result = (new SelfService())->trans($member->name,0-$center_money);

                        $res = json_decode($result,true);

                        if(!isset($res['statusCode'])){
                            DB::rollBack();
                            return responseWrong('网络错误请稍后重试');
                        }
                        if($res['statusCode'] != '01'){
                            DB::rollBack();
                            return responseWrong('网络错误请稍后重试');
                        }
                        $member->increment('money', $center_money);
                    }

                    $t = date('Y-m-d H:i:s');
                    $sql = "update `members` set `money` = `money` - ?, `updated_at` = ? where `id` = ? and `deleted_at` is null and money >= ? and money >0";
                    $rs = DB::update($sql,[$my_money,$t,$member->id,$all_money]);

                    if(!$rs){
                        DB::rollBack();
                        return responseWrong('内部错误！请联系管理员！');
                    }
                    //如果存在赠送金额 则添加进红利表
                    /*Dividend::create([
                        'member_id' => $member->id,
                        'type' => $type,
                        'money' => 0-$my_money,
                        'describe' => $remark ? $remark : $types[$type],
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                        'status' => 1
                    ]);*/
                    $user = \Auth::user();
                    AdminActionMoneyLog::create([
                        'member_id' => $member->id,
                        'user_id' => $user->id,
                        'old_money' => $all_money,
                        'new_money' => $all_money - $my_money,
                        /*'old_fs_money' => $old_fs_money ? $old_fs_money : 0 ,
                        'new_fs_money' => $new_fs_money ? $new_fs_money : 0*/
                        'remark'=>$remark
                    ]);
                    DB::commit();
                }catch(\Exception $e){
                    DB::rollback();
                    return responseWrong('内部错误！请联系管理员！');
                }
                /*try{
                    DB::transaction(function() use($member, $type,$my_money,$remark,$types,$center_money,$all_money) {
                        if($center_money > 0){
                            $result = (new SelfService())->trans($member->name,0-$center_money);

                            $res = json_decode($result,true);

                            if(!isset($res['statusCode'])){
                                DB::rollBack();
                                return responseWrong('网络错误请稍后重试');
                            }
                            if($res['statusCode'] != '01'){
                                DB::rollBack();
                                return responseWrong('网络错误请稍后重试');
                            }
                            $member->increment('money', $center_money);
                        }

                        $t = date('Y-m-d H:i:s');
                        $sql = "update `members` set `money` = `money` - ?, `updated_at` = ? where `id` = ? and `deleted_at` is null and money >= ? and money >0";
                        $rs = DB::update($sql,[$my_money,$t,$member->id,$all_money]);

                        if(!$rs){
                            DB::rollBack();
                            return responseWrong('内部错误！请联系管理员！');
                        }
                        //如果存在赠送金额 则添加进红利表
                        Dividend::create([
                            'member_id' => $member->id,
                            'type' => $type,
                            'money' => 0-$my_money,
                            'describe' => $remark ? $remark : $types[$type],
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                            'status' => 1
                        ]);
                    });
                }catch(Exception $e){
                    DB::rollback();
                    return responseWrong('扣款失败,请重试！！');
                }*/
            }
            }else {
            $all_money = $member->money;

            if ($all_money < $my_money) {
                return responseWrong('用户余额不足！！扣款失败！！');
            } else {

                DB::beginTransaction();
                try {
                    $t = date('Y-m-d H:i:s');
                    $sql = "update `members` set `money` = `money` - ?, `updated_at` = ? where `id` = ? and `deleted_at` is null and money >= ? and money >0";
                    $rs = DB::update($sql, [$my_money, $t, $member->id, $all_money]);

                    if (!$rs) {
                        DB::rollBack();
                        return responseWrong('内部错误！请联系管理员！');
                    }
                    MemberMoneyLog::addLog( $member->id,-$my_money,$all_money,6,time());
                    //如果存在赠送金额 则添加进红利表
                    /*Dividend::create([
                        'member_id' => $member->id,
                        'type' => $type,
                        'money' => 0-$my_money,
                        'describe' => $remark ? $remark : $types[$type],
//                        'before_money' => $mod->member->money,
//                        'after_money' => $mod->member->money + $data['money'],
                        'status' => 1
                    ]);*/
                    $user = \Auth::user();
                    AdminActionMoneyLog::create([
                        'member_id' => $member->id,
                        'user_id' => $user->id,
                        'old_money' => $all_money,
                        'new_money' => $all_money - $my_money,
                        /*'old_fs_money' => $old_fs_money ? $old_fs_money : 0 ,
                        'new_fs_money' => $new_fs_money ? $new_fs_money : 0*/
                        'remark' => $remark
                    ]);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                    return responseWrong('内部错误！请联系管理员！');
                }
            }
        }
            return responseSuccess('','', route('member.index'));
        }

    }

    public function update(Request $request, $id)
    {
//        $validator = $this->verify($request, 'member.update');
//
//        if ($validator->fails())
//        {
//            $messages = $validator->messages()->toArray();
//            return responseWrong($messages);
//        }

        if ($request->has('qk_pwd'))
        {
            $q = (string)$request->get('qk_pwd');
            // if (!is_numeric($request->get('qk_pwd')) || strlen($q) != 6)
            //     return responseWrong('取款密码为6位数字');
        }

        $member= Member::findOrFail($id);
        /*$old_money = $member->money;
        $old_fs_money = $member->fs_money;
        $new_money = $request->get('money');
        $new_fs_money = $request->get('fs_money');*/


        if (!$request->has('password'))
        {
            if ($request->has('qk_pwd'))
                $member->update([
                    'name'=>$request->get('name'),
                    //'money' => $money,
                    //'fs_money' => $request->get('fs_money',0),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'qk_pwd' => $request->get('qk_pwd'),
                   'username' => $request->get('username'),
                   'bank' => $request->get('bank'),
                  'card' => $request->get('card'),
                     'fps' => $request->get('fps'),
                     'erc20' => $request->get('erc20'),
                   'trc20' => $request->get('trc20'),
                    'real_name' => $request->get('real_name'),
                    'joker_top' => $request->get('joker_top'),
                    'zhuanpan'=>$request->get('zhuanpan'),
                ]);
            else
                $member->update([
                    'name'=>$request->get('name'),
                    //'money' => $money,
                    //'fs_money' => $request->get('fs_money'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                'username' => $request->get('username'),
                'bank' => $request->get('bank'),
                'card' => $request->get('card'),
                'fps' => $request->get('fps'),
                'erc20' => $request->get('erc20'),
                'trc20' => $request->get('trc20'),
                    'real_name' => $request->get('real_name'),
                    'joker_top' => $request->get('joker_top'),
                    'zhuanpan'=>$request->get('zhuanpan'),
                ]);
        }else{
            
            $data = $request->all();
            $data['o_password'] = $request->get('password');
            $member->update($data);
        }
        return responseSuccess('','', route('member.index'));
    }

    public function destroy($id)
    {
        Member::destroy($id);

        return respS();
    }

    public function check($id, $status)
    {
        $mod = Member::findOrFail($id);
        $mod->update([
            'status' => $status,
            'last_session'=>''
        ]);

        return respS();
    }
    public function set_ag($id,$is_ag,Request $request)
    {
        if($request->get('type') && $request->get('type') == 'is_sunbets') {
            $mod = Member::findOrFail($id);
            $mod->update([
                'is_sunbets'=>$is_ag,
                'last_session'=>''
            ]);
        }else{
            $mod = Member::findOrFail($id);
            $mod->update([
                'is_ag'=>$is_ag,
                'last_session'=>''
            ]);
        }
        return respS();
    }
    public function getMoney(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $user = $data['name'];
        $member= Member::findOrFail($id);
        $money = $member->money;

        if($member->is_trans_on == 1){
            $money_obj = (new SelfService())->wallet_balance($user);
            $res = json_decode($money_obj,true);
            $error = json_last_error();
            if($error > 0) {
                $msg = [
                    'Code' => '01',
                    'Message' =>$money_obj,
                ];
                return json_encode($msg);
            }
            if($res['statusCode'] == 01) {
                $money2 = $res['data'];
                $all_money = $money + $money2;
                $msg = [
                    'Code' => 0,
                    'Data' =>sprintf('%.2f',$all_money),
                ];
                return json_encode($msg);
            }else{
                $msg = [
                    'Code' => $res['statusCode'],
                    'Message' =>$res['message'],
                ];
                return json_encode($msg);
            }
        }else{
            $msg = [
                'Code' => 0,
                'Data' =>sprintf('%.2f',$member->money),
                'msg'=>'转账钱包'
            ];
            return json_encode($msg);
        }


    }
    
    public function transfer_all(Request $request){
        $data = $request->all();
        $user = $data['name'];
        $member= Db::table('members')->where('name',$user)->first();
        $money = $member->money;
        $api = Db::table('api')->where('on_line','<>','1')->where('api_name',$data['api_name'])->first();
        //转账类型
            $api_name = $api->api_name;
            $member_api = Db::table('member_api')->where('api_id', $api->id)->where('member_id',$member->id)->first();
            $amount = 0;
            if($member_api) {
                $result = (new LEYUService())->balance($api_name,$user,'123456');
                $res_b = json_decode($result,true);
                
                if(is_array($res_b) && @$res_b['Code'] == 0 && @$res_b['Data']['balance'] >= 1){
                $amount = intval($res_b['Data']['balance']);
                // if($amount>0) {
                    //zhuanchu
                    
                    $orderno = getBillNo();
                    $result = (new LEYUService())->withdrawal($api->api_name,$user,'123456',$amount,2,$orderno);
                    $res = json_decode($result,true);
                    if (is_array($res) && $res['Code'] == 0)
                    {
                        if($api->api_name=='KY_HK'){
                            Db::table('members')->where('name',$user)->increment('money' , $amount / 2);
                        }else{
                            Db::table('members')->where('name',$user)->increment('money' , $amount);
                        }
                               
                        Transfer::create([
                            'bill_no' => $orderno,
                            'api_type' => $member_api->api_id,
                            'member_id' => $member->id,
                            'transfer_type' => 1,
                            'money' => intval($amount),
                            'transfer_in_account' => '中心账户',
                            'transfer_out_account' => $api->api_name.'账户',
                            'result' => $result,
                            'status'=>$res['Code'],
                            'balance'=>$member->money + $amount
                        ]); 
                        Db::table('member_api')->where('api_id', $api->id)->where('member_id',$member->id)->decrement('money',$amount);
                    }
                }
                // }
            }
        
        $member= Db::table('members')->where('name',$user)->first();
        $money = $member->money;
        // echo $member_api->money - $amount;
        echo $money;
        
    }
    public function daochu3(Request $request){
        $mod = new Member();
        $name = $status = $register_ip = $on_line = $real_name = $last_login_ip = $phone= $register_url= $top_id = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        if ($request->has('real_name'))
        {
            $real_name = $request->get('real_name');
            $mod = $mod->where('real_name', 'like', "%$real_name%");
        }
        if ($request->has('register_ip'))
        {
            $register_ip = $request->get('register_ip');
            $mod = $mod->where('register_ip', 'like', "%$register_ip%");
        }
        if ($request->has('last_login_ip'))
        {
            $last_login_ip = $request->get('last_login_ip');
            $mod = $mod->where('last_login_ip', 'like', "%$last_login_ip%");
        }
        if ($request->has('status'))
        {
            $status = $request->get('status');
            $mod = $mod->where('status', $status);
        }
        if ($request->has('on_line'))
        {
            $on_line = $request->get('on_line');
            if ($on_line == 1)
            {
                $_online_member_array = MemberLoginLog::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-3 hours')))->pluck('member_id')->toArray();
                $mod = $mod->whereIn('id', $_online_member_array);
            }

        }
        
        
        if ($request->has('phone'))
        {
            $phone = $request->get('phone');
            $mod = $mod->where('phone', $phone);
        }
        if ($request->has('register_url'))
        {
            $register_url = $request->get('register_url');
            $mod = $mod->where('register_url', $register_url);
        }
        if ($request->has('top_id'))
        {
            $top_id = $request->get('top_id');
            $daili = Db::table('members')->where('name',$top_id)->first();
            if($daili){
                $daili_id = $daili->id;
            }else{
                $daili_id = 999999999;
            }
            $mod = $mod->where('top_id', $daili_id);
        }
        $data = $mod->orderBy('created_at', 'desc')->get();
        
        
        
        $html = '<table>
                    <tr>
                        <td>ID</td>
                        <td>用户名</td>
                        <td>中心账户</td>
                        <td>码量账户</td>
                        <td>来源地址</td>
                        <td>真实姓名</td>
                        <td>代理/上级</td>
                        <td>手机/邮箱</td>
                        <td>注册IP</td>
                        <td>注册时间</td>
                        <td>银行名称</td>
                        <td>银行卡号</td>
                        <td>转速快账号</td>
                        <td>USDT地址</td>
                        <td>状态</td>
                        <td>上次登陆IP</td>
                        <td>上次登陆时间</td>
                        
                    </tr>';
        if($data){
            foreach ($data as $k=>$v){
                $parent = Db::table('members')->where('id',$v->top_id)->first();
                $parent_name = $parent ? @$parent->name:'';
                $is_daili = $v->is_daili ? '是':'否';
                $html .= '<tr>';
                $html .= '<td>'.$v->id.'</td>';
                $html .= '<td>'.$v->name.'</td>';
                $html .= '<td>'.$v->money.'</td>';
                $html .= '<td>'.$v->ml_money.'</td>';
                $html .= '<td>'.$v->register_url.'</td>';
                $html .= '<td>'.$v->username.'</td>';
                $html .= '<td>'.$is_daili.'/'.$parent_name .'</td>';
                $html .= '<td>'.$v->phone .'/'.$v->email.'</td>';
                $html .= '<td>'.$v->register_ip.'</td>';
                $html .= '<td>'.$v->created_at.'</td>';
                
                $html .= '<td>'.$v->bank.'</td>';
                $html .= '<td>'.$v->card.'</td>';
                $html .= '<td>'.$v->fps.'</td>';
                $html .= '<td>'.$v->erc20.'</td>';
                
                $html .= '<td>'.\App\Models\Base::$MEMBER_STATUS_HTML[$v->status].'</td>';
                $html .= '<td>'.$v->last_login_ip.'</td>';
                $html .= '<td>'.$v->last_login_at.'</td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
        }
        header("Content-type:application/vnd.ms-excel");  //设置内容类型
        header("Content-Disposition:attachment;filename=用户列表.xlsx");  //文件下载
        echo $html;die;
    }
}
