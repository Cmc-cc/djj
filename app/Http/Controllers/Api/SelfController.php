<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberAPi;
use App\Models\Transfer;
use App\Services\AgService;
// use App\Services\SelfService;
use App\Services\LEYUService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Log;
use App\Services\CurlService;
use Mockery\Exception;
use App\Models\MemberMoneyLog;

class SelfController extends WebBaseController
{
    protected $service,$api;
    public function __construct()
    {
        $this->service = new LEYUService();
        $this->api = Api::where('api_name', 'SELF')->first();
    }

    public function register($username,$password)
    {
        // if(strtolower($api->api_name) == 'joker'){
        if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
            $joker_rate = 'JK'.str_replace('JK','',$api->api_name);
            $username .= $joker_rate;
        }
        $res = $this->service->register($username, $password);
    }

    public function credit($api_name)
    {

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        $rs = $this->service->credit($api_name);
        
        $res = json_decode($rs, TRUE);
        $error = json_last_error();
        if($error > 0){
            $return['Code']='03';
            $return['Message'] = $rs;
            return $return;
        }

    
        //print_r($res);
        if ($res['Code'] == 0)
        {
            
                $money = sprintf('%.2f',@$res['Data']['money']?$res['Data']['money']:$res['Data']['data']);
            // if($api_name=='PG'){
            //     $money -= 10000;
            // }
            
            // $money = (5000 + rand(100,499));
			if($api_name != 'CURRENCY' && $api_name != 'hk2' && $api_name != 'hk'){
    			$api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
                $api_mod->update([
                    'api_money' => $money
                ]);
			}
            $return['Data'] = $money;
        } else {
            $return['Code'] = $res['Code'];
            $return['Message'] = 'code:'.$res['Code'].':查询商户余额失败！'.$res['Message'].' 请联系客服';
        }

        return $return;
    }

    public function credit_all()
    {

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];

        $rs = $this->service->credit_all();
        $res = json_decode($rs, TRUE);
        return $res;
        $error = json_last_error();
        if($error > 0){
            //$msg = $this->service->credit_all();
            $return['Code']='03';
            $return['Message'] = $rs;
            return $return;
        }


        //print_r($res);
        if ($res['statusCode'] == 1)
        {
            /*$api_mod = Api::where('api_name', $api_name)->where('on_line', 0)->first();
            $money = sprintf('%.2f',$res['data']);
            $api_mod->update([
                'api_money' => $money
            ]);*/
            $money = sprintf('%.2f',$res['data']);
            $return['data'] = $money;
        } else {
            $return['Code'] = $res['statusCode'];
            $return['Message'] = 'code:'.$res['statusCode'].':查询商户余额失败！'.$res['message'].' 请联系客服';
        }

        return $return;
    }

    public function balance($api_name, $username, $password)
    {
        //检查账号是否注册
        $member = Member::where('name', $username)->first();
        $api = Api::where('api_name', $api_name)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
        
        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];
        if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
            $joker_rate = 'JK'.str_replace('JK','',$api->api_name);
            $username .= $joker_rate;
            $api_name = 'JK';
        }
        if (!$member_api)
        {
            /*if ($api_name == 'YC')
            {
                $return['Code'] = -22;
                $return['Message'] = '开通YC前请先进入YC彩票游戏激活';
                return $return;
            }*/
            //var_dump($this->service->register($api_name,$username,$password));exit;
            $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
            //print_r($res);
            if (!is_array($res))
            {
                $return['Code'] = -1;
                $return['Message'] = '网络错误请重试';
                return $return;
            }
            if ($res['Code'] != 0)
            {
                $return['Code'] = $res['Code'];
                $return['Message'] = $res['Message'];
                return $return;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $member->name,
                'password' => $member->original_password
            ]);
        }
        
        
        //转出乐语的接口
            // $mod = Api::where('api_name', 'SELF')->first();
            // $oldname = Db::table('api')->where('api_name',$api_name)->value('old_name');
            // if(@$oldname){
                
            //     $post_data = [
            //         'account' =>$mod->api_id,
            //         'api_key' =>$mod->api_key,			
            //         'api_code' =>$oldname,
            //         'username' => $username,
            //     ];
            //     if(preg_match('/^http(s)?:\\/\\/.+/',$mod->api_domain)){
            //         $url = $mod->api_domain.'/ley/balance';
            //     }else{
            //         $url = 'http://'.$mod->api_domain.'/ley/balance';
            //     }
            //     $receive = $this->send_post2($url,$post_data);
            //     if(@$receive['Code'] == 0 && @$receive['Data']['balance'] >0){
                    
            //         $amount = intval($receive['Data']['balance']);
            //         $transferno = date("YmdHms").rand(000000,999999);//交易编号
            //         $post_data = [
            //             'account' =>$mod->api_id,
            //             'api_key' =>$mod->api_key,			
            //             'api_code' =>$oldname,
            //             'username' => $member->name,
            // 			'amount' => $amount,
            // 			'transferno' => $transferno,
            
            //         ];
            //         if(preg_match('/^http(s)?:\\/\\/.+/',$mod->api_domain)){
            //             $url = $mod->api_domain.'/ley/withdrawal';
            //         }else{
            //             $url = 'http://'.$mod->api_domain.'/ley/withdrawal';
            //         }
            //         $receive = $this->send_post2($url,$post_data);
                    
            //         if (is_array($receive) && $receive['Code'] == '0'){
            //             $member = $this->getMember();
            //             $outmoney = intval($amount);
            //             $member->increment('money' , $outmoney);
            //             $api = Api::where('api_name', $oldname)->first();
            //             $member_api = $member->apis()->where('api_id', $api->id)->first();
            //             if($member_api->money >= intval($amount)){
            //                 $member_api->decrement('money' , intval($amount));
            //             }else{
            //                 $member_api->decrement('money' , $member_api->money);
            //             }
                        
            //             Transfer::create([
            //                 'bill_no' => getBillNo(),
            //                 'api_type' => $member_api->api_id,
            //                 'member_id' => $member->id,
            //                 'transfer_type' => 1,
            //                 'money' => intval($amount),
            //                 'transfer_in_account' => '中心账户',
            //                 'transfer_out_account' => $member_api->api->api_name.'账户',
            //                 'result' => json_encode($receive)
            //             ]);
            //             $api->increment('api_money' , intval($amount));
            //         }
            //     }
            // }
        
        
        
        
        
        //如果是joker
        // if(strpos($api->api_name,'JOKER') !== false){
        //     $joker_rate = '_'.str_replace('JOKER','',$api->api_name);
        //     //JOKER查余额
        //     require_once('./api/joker/jokeringration.php');
        //     $Joker = new Joker();
        //     //注册
        //     $result = $Joker->GetUserCredit($member->name.$joker_rate);
        //     $res = [
        //         'statusCode'=>01,
        //         'data'=>$result['Credit']
        //     ];
        // }else{
            if($api->qy == 2){
                require_once('./api/fast/fast.php');
                $Fast = new Fast();
                $res = $Fast->userstatic($api->api_name,$username);

                if($res['Code']==0){
                    $res['data'] = $res['data']['Data']['Balance'];
                }
            }else{
                $res = json_decode($this->service->balance($api_name,$username, $password), TRUE);
            }
        // }
        //var_dump($this->service->balance($api_name,$username, $password));exit;
        
// dump($res);die;
        //print_r($res);
        if ($res['Code'] == 0)
        {
            $m = $res['Data']['balance'];
            
            $member_api->update([
                'money' => $m
            ]);
            $return['Data'] = $m;
        } else {
            $return['Code'] = $res['Code'];
            $return['Message'] = $res['Message'];
        }

        return $return;
    }

    public function deposit($api_name,$username, $password, $amount, $amount_type = 'money')
    {
        //检查账号是否注册
        $member = $this->getMember();
        
        $api = Api::where('api_name', $api_name)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];
        $membermoney = intval($amount);
        if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
            
            if($api_name == 'JK5' && $amount < 100){
                $return['Code'] = -1;
                $return['Message'] = '5倍场最低转入100';
                return $return;
            }
            if($api_name == 'JK10' && $amount < 250){
                $return['Code'] = -1;
                $return['Message'] = '10倍场最低转入250';
                return $return;
            }
            if($api_name == 'JK20' && $amount < 500){
                $return['Code'] = -1;
                $return['Message'] = '20倍场最低转入500';
                return $return;
            }
            
            $joker_rate = 'JK'.str_replace('JK','',$api->api_name);
            $username .= $joker_rate;
            $amount = intval($amount / str_replace('JK','',$api->api_name));
            $api_name = 'JK';
            
            $amount = $amount * 2;
        }
        
        if (!$member_api)
        {
                if($api->qy == 2){
                    require_once('./api/fast/fast.php');
                    $Fast = new Fast();
                    $res = $Fast->register($api->api_name,$username);
                        //注册账号
                        Db::table('member_api')->insert([
                            'member_id'=>$member->id,
                            'api_id'=>$api->id,
                            'username'=>$username,
                            'password'=>'cfff62ab95',
                            'money'=>'0',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        ]);
                }else{
                    $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
                   
                        //创建api账号
                        $member_api = MemberAPi::create([
                            'member_id' => $member->id,
                            'api_id' => $api->id,
                            'username' => $member->name,
                            'password' => $member->original_password
                        ]);
                 
                }
        }
        //判断余额
        if ($amount_type == 'money')
        {

            if ($member->money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        } else {
            if ($member->fs_money < $amount)
            {
                $return['Code'] = -1;
                $return['Message'] = '账户余额不足';
                return $return;
            }
        }
        $s_d = [
            'name' => $username,
            'amount' => $amount,
            'api_id' => $member_api->api_id,
            'time' => date('YmdHis'),
            'type' => 1,
            'before_amount' =>  $api->api_money,
            'api_name'=>$api_name,
            'date'=>date('Y-m-d H:i:s')
        ];
        
        Log::info(json_encode($s_d));
        $fp = fopen(base_path()."/public/lock/lock.txt", "w+");
        if(!flock($fp,LOCK_EX|LOCK_NB)){
            $return['Code'] = -1;
            $return['Message'] = '请勿频繁提交';
            return $return;
        }
        DB::beginTransaction();
        $orderno = getBillNo();
        try{
            $t = date('Y-m-d H:i:s');
            $sql = "update `members` set `money` = `money` - ?, `updated_at` = ? where `id` = ? and `deleted_at` is null and money >= ? and money >0";
            $rs = DB::update($sql,[$membermoney,$t,$member->id,$membermoney]);
            if(!$rs){
                // DB::rollBack();
                $return['Code'] = -1;
                $return['Message'] = '余额扣除失败';
                flock($fp,LOCK_UN);//解锁
                fclose($fp); 
                return $return;
            }
            
            //转入余额记录
            if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
                $joker_rate = str_replace('JK','',$api->api_name);
                $oamount = intval($amount * $joker_rate);
                MemberMoneyLog::addLog( $member->id,-$oamount,$member->money,7,$api->api_name);
            }else{
                
                MemberMoneyLog::addLog( $member->id,-$amount,$member->money,7,$api->api_name);
            }
            
                if($api->qy == 2){
                    require_once('./api/fast/fast.php');
                    $Fast = new Fast();
                    $res = $Fast->membermoney($api->api_name,$username,$amount,1);
                }else{
                    if($api_name=='KY'){
                        $amount = $membermoney * 2;
                    }
                    $res = $this->service->deposit($api_name,$username, $password,$amount,1,$orderno);
                    $res = json_decode($res,true);
                    //查接口余额
                    
                    // $game_balance = $this->balance($api_name, $member->name, $password);
                    
                    Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $membermoney,
                        'transfer_in_account' => $member_api->api->api_name.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => json_encode($res),
                        'status'=>$res['Code'],
                        // 'balance'=>@$game_balance['Data']?$game_balance['Data']:'接口失败'
                    ]);
                }
            if(!isset($res['Code']) || $res['Code'] != 0){
                DB::rollBack();
                $return['Code'] = -1;
                $return['Message'] = $res['Message'];
                Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $membermoney,
                        'transfer_in_account' => $member_api->api->api_name.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => json_encode($res),
                        'status'=>$res['Code']
                    ]);
                flock($fp,LOCK_UN);//解锁
                fclose($fp);     
                    
                return $return;
            }
            DB::commit();
        }catch (\Exception $e){
            // DB::rollBack();
            $return['Code'] = -1;
            $return['Message'] = $e;
            Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $membermoney,
                        'transfer_in_account' => $member_api->api->api_name.'账户',
                        'transfer_out_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'result' => json_encode($s_d),
                        'status'=>1
                    ]);
            DB::commit();
            flock($fp,LOCK_UN);//解锁
            fclose($fp); 
                    
            return $return;
        }
        
        if (!is_array($res))
        {
            $return['Code'] = -99;
            $return['Message'] = '网络错误，请重试';
            //退回用户
            //$member->increment($amount_type , $amount);
            flock($fp,LOCK_UN);//解锁
            fclose($fp); 
            return $return;
        }

        if (is_array($res) && $res['Code'] == 0)
        {
            
            // try{
            //     DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$api) {
                    //平台账户
                    // $member_api->increment('money', $amount);
                    //个人账户
                    //修改api账号余额
                    $api->decrement('api_money' , $amount);
                // });
            // }catch(\Exception $e){
            //     DB::rollback();
            // }
        } else {
            //退回用户
            //$member->increment($amount_type , $amount);

            $return['Code'] = $res['Code'];
            $return['Message'] = $res['Message'];
        }
        flock($fp,LOCK_UN);//解锁
        fclose($fp); 
        return $return;
    }

   
    public function withdrawal($api_name,$username, $password, $amount, $amount_type = 'money')
    {
        
        //检查账号是否注册
        $member = $this->getMember();
        $api = Api::where('api_name', $api_name)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        $return = [
            'Code' => 0,
            'Message' => 'success',
            'url' => '',
            'Data' => '',
        ];
        $amount = intval($amount);
        $outmoney = intval($amount);
        if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
            $joker_rate = 'JK'.str_replace('JK','',$api->api_name);
            $username .= $joker_rate;
            $api_name = 'JK';
            // $amount = $amount / 2;
        }
        if (!$member_api)
        {   
                $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
                if ($res['statusCode'] == 0)
                {
                    //创建api账号
                    $member_api = MemberAPi::create([
                        'member_id' => $member->id,
                        'api_id' => $api->id,
                        'username' => $member->name,
                        'password' => $member->original_password
                    ]);
                }
        }

        if ($member_api->money < $amount)
        {
            $return['Code'] = -1;
            $return['Message'] = '余额不足';
            return $return;
        }

        $s_d = [
            'name' => $username,
            'amount' => $amount,
            'api_id' => $member_api->api_id,
            'time' => date('YmdHis'),
            'type' => 2,
            'after_money' => $api->api_money,
            'api_name'=>$api_name,
            'date'=>date('Y-m-d H:i:s')
        ];

        Log::info(json_encode($s_d));

        $money = intval($amount);
        //加锁
        $fp = fopen(base_path()."/public/lock/lock.txt", "w+");
        if(!flock($fp,LOCK_EX|LOCK_NB)){
            $return['Code'] = -1;
            $return['Message'] = '请勿频繁提交';
            return $return;
        }
        DB::beginTransaction();
        $orderno = getBillNo();
        try{
            $outmsg = '';
            $outmoney = intval($amount);
            
                    $result = $this->service->withdrawal($api_name,$username, $password,$money,2,$orderno);
                    // dump($result);die;
                    $res = json_decode($result,true);
                    if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
                        $joker_rate = str_replace('JK','',$api->api_name);
                        $money = intval($money * $joker_rate);
                        $outmoney = $money;
                        $outmoney = $outmoney/2;
                    }
                    
                    Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => $money,
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => @$result,
                        'status'=>@$res['Code']?$res['Code']:'',
                        'balance'=>$member->money + $money
                    ]);
                // }
                
            // }
            // dump($res);die;
            // $outmoney = $amount;
            if($api_name=='KY'){
                $outmoney = $outmoney/2;
            }
            
            if(!isset($res['Code']) || $res['Code'] != 0){
                DB::rollBack();
                $return['Code'] = -1;
                $return['Message'] = $res['Message'];
                
                Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => intval($amount),
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => $result,
                        'status'=>$res['Code']
                    ]);
                flock($fp,LOCK_UN);//解锁
                fclose($fp);        
                    
                return $return;
            }
            if($outmoney>0){
                MemberMoneyLog::addLog( $member->id,$outmoney,$member->money,8,$api->api_name);
            }
            
            $count = $member->increment($amount_type , $outmoney);

            if(!$count){
                DB::rollBack();
                $return['Code'] = -1;
                $return['Message'] = '请求过于频繁，请一分钟后再试#4';
                
                Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => intval($outmoney),
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => $result,
                        'status'=>$res['Code']
                    ]);
                flock($fp,LOCK_UN);//解锁
                fclose($fp);    
                return $return;
            }
            
            
            DB::commit();
        }catch (\Exception $e){
            // DB::rollBack();
            $return['Code'] = -1;
            $return['Message'] = '请求过于频繁，请一分钟后再试';
            Transfer::create([
                        'bill_no' => $orderno,
                        'api_type' => $member_api->api_id,
                        'member_id' => $member->id,
                        'transfer_type' => 1,
                        'money' => intval($amount),
                        'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                        'transfer_out_account' => $member_api->api->api_name.'账户',
                        'result' => json_encode($s_d),
                        'status'=>1
                    ]);
            DB::commit();
            flock($fp,LOCK_UN);//解锁
            fclose($fp);    
            return $return;
        }
        if (is_array($res) && $res['Code'] == '0')
        {
            // try{
            //     DB::transaction(function() use($member_api, $res,$amount_type,$amount,$member,$result,$api) {
                    //平台账户
                    $member_api->decrement('money' , $outmoney);
                    //个人账户 上面已经加了后面不用加
                    //$member->increment($amount_type , intval($amount));
                    //额度转换记录
                    // Transfer::create([
                    //     'bill_no' => getBillNo(),
                    //     'api_type' => $member_api->api_id,
                    //     'member_id' => $member->id,
                    //     'transfer_type' => 1,
                    //     'money' => intval($amount),
                    //     'transfer_in_account' => $amount_type == 'money'?'中心账户':'返水账户',
                    //     'transfer_out_account' => $member_api->api->api_name.'账户',
                    //     'result' => $result
                    // ]);
                    $api->increment('api_money' , intval($amount));
        } else {
            $return['Code'] = $res['Code'];
            $return['Message'] = $res['Message'];
        }
        
        if($outmsg){
            $return['Message'] = $outmsg;
        }
        flock($fp,LOCK_UN);//解锁
        fclose($fp);    
        return $return;
    }

    public function login(Request $request)
    {
        
        $member = $this->getMember();
        
        if($member) {
            $username = $member->name;
            $password = $member->original_password;
            //$api_code = strtolower($request->get('api_code'));
            $api_code = $plat_type = strtolower($request->get('plat_type'));
            //$id = $request->get('gametype');
            $game_type = $request->get('game_type');
            $isMobile = is_Mobile() == 1?1:0;
            
            $api = Api::where('api_name', $plat_type)->first();
            $api_name = $api->api_name;
            if(strpos($api->api_name,'JK') !== false && $api->api_name != 'JK'){
                $joker_rate = 'JK'.str_replace('JK','',$api->api_name);
                $username .= $joker_rate;
                $api_name = 'JK';
            }
            $game_code = $request->get('game_code');
            $lott_type = $request->get('lott_type');
            if($api_code=='fish'){
                $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
                return view('api.fish',compact('api_list','member'));
            }
            //检查账号是否注册
            $member_api = $member->apis()->where('api_id', $api->id)->first();
            
            //如果是joker选游戏页面
            
            if (!$member_api)
            {
                
                    $res = json_decode($this->service->register($api_name,$username,$password), TRUE);
                        //创建api账号
                        $member_api = MemberAPi::create([
                            'member_id' => $member->id,
                            'api_id' => $api->id,
                            'username' => $api->prefix.$member->name,
                            'password' => $member->original_password
                        ]);
            }
            // $fp = fopen(base_path()."/lock.txt", "w+");
            //     if(flock($fp,LOCK_EX|LOCK_NB)){
            //         $this->trans_leyu($api->api_name);  
            //         flock($fp,LOCK_UN);//解锁
            //     }else{
            //         exit('请勿频繁提交');
            //     }
            //     fclose($fp); 
            if($member->is_trans_on == '1'){
                
                //开启免转
                //先转换钱包
                // if($member -> money > 0) {
                //     $fp = fopen(base_path()."/lock.txt", "w+");
                //     if(flock($fp,LOCK_EX|LOCK_NB)) {
                //         $this->trans();
                //         flock($fp,LOCK_UN);//解锁
                //     }else{
                //         exit('系统繁忙！！请稍后再试！');
                //     }
                //     fclose($fp);
                // }
                    $is_ag = $member->is_ag;
                    $gametypes = config('platform.game_type');

                    $ag = Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
                    $ags =Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();
                    //增加sunbets
                    $is_sunbets = $member -> is_sunbets;
                    $sunbet =  Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
                    $sunbets = Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();
                        //如果是joker
                        // if(strpos($api->api_name,'JOKER') !== false && $game_code){
                        //     $joker_rate = '_'.str_replace('JOKER','',$api->api_name);
                        //     //JOKER进入游戏
                        //     require_once('./api/joker/jokeringration.php');
                        //     $Joker = new Joker();
                        //     //注册
                        //     if($game_code=='JL'){
                        //         $result = $Joker->GetPlayGameUrlForLive($username.$joker_rate,$game_code);
                        //     }else{
                        //         $result = $Joker->GetPlayGameUrl($username.$joker_rate,$game_code);
                        //     }
                            
                        //     if($result['Success']){
                        //         //注册账号
                        //         Db::table('member_api')->insert([
                        //             'member_id'=>$member->id,
                        //             'api_id'=>$api->id,
                        //             'username'=>$username,
                        //             'password'=>'cfff62ab95',
                        //             'money'=>'0',
                        //             'created_at'=>date('Y-m-d H:i:s'),
                        //             'updated_at'=>date('Y-m-d H:i:s')
                        //         ]);
                        //         // header('Location:'.$res['ForwardUrl']);die;
                        //     }
                        //     $res = [];
                        //     $res=['statusCode'=>1,'data'=>$result['ForwardUrl']];
                        // }else{
                            $res = json_decode($this->service->login($api_name,$username, $password, $game_type,$game_code,$isMobile,$lott_type), TRUE);
                            Db::table('transfers_log')->insert([
                                'api_name'=>$api_name,
                                'member_id'=>$member->id,
                                'transfer_type'=>2,
                                'money'=>0,
                                'result'=>json_encode($res),
                                'created_at'=>date('Y-m-d H:i:s'),
                            ]);
                
                if ($res['statusCode'] == 01) {
                    $url = $res['data'];
                    return redirect()->to($url);
                } else {
                    echo $res['statusCode'].' 请联系客服'.$res['message'];exit;
                }
            }else{
                
                $str = route('web.index').$request->getRequestUri();
                $is_ag = $member->is_ag;
                $ag = Api::where('api_name', 'AG')->orderBy('created_at', 'desc')->first();
                $ags =Api::where('api_name', 'AGS')->orderBy('created_at', 'desc')->first();
                //增加sunbets
                $is_sunbets = $member -> is_sunbets;
                $sunbet =  Api::where('api_name', 'SUNBET')->orderBy('created_at', 'desc')->first();
                $sunbets = Api::where('api_name', 'SUNBETS')->orderBy('created_at', 'desc')->first();

                // }else{
                    //如果是joker
                        
                            if($game_type=='redirect'){
                                $self = Db::table('api')->where('api_name','SELF')->first();
                                $post_data = array(
                                    'api_id' => $self->api_id,
                                    'api_key' => $self->api_key,
                                    'api_code'=>$api_name,
                                    'method'=>'gamelist',
                                );
                                $url = $api->domain;
                                $res = json_decode($this->send_post($url,$post_data),true);
                                // dump($post_data);
                                // dump($url);die;
                                $gameList = [];
                                if($res['data']){
                                    foreach ($res['data'] as $k=>$v){
                                        $gameDetail['GameCode'] = $v['game_code'];
                                        $gameDetail['Image2'] = $v['img_url']?$v['img_url']:$v['remote_url'];
                                        $gameDetail['GameName'] = $v['cn_name'];
                                        $gameList[] = $gameDetail;
                                    }
                                }
                                $member_api = Db::table('member_api')->where('member_id',$member->id)->where('api_id',$api->id)->orderBy('id','desc')->first();
                                    $game_type = '';
                                    //跳转选择游戏页面
                                    return view('api.joker',compact('gameList','game_type','api_code','api','member','member_api'));
                            }
                            
                            $res = json_decode($this->service->login($api_name,$username, $password, $game_type,$game_code,$isMobile,$lott_type,'',1), TRUE);
                            // dd($res);die;
                            Db::table('transfers_log')->insert([
                                'api_name'=>$api_name,
                                'member_id'=>$member->id,
                                'transfer_type'=>2,
                                'money'=>0,
                                'result'=>json_encode($res),
                                'created_at'=>date('Y-m-d H:i:s'),
                            ]);
                    
                    
                // }
// dump($res);die;
                if ($res['Code'] == 0) {
                    
                    $url = @$res['Data']['gameUrl']?@$res['Data']['gameUrl']:@$res['Data']['url'];
                    if(isset($_SERVER["HTTP_X_CLIENT_SCHEME"]) || isset($_SERVER["REQUEST_SCHEME"])){
                        if (strpos($url, 'http://') !== false) {
                    		$url = str_replace('http://', 'https://', $url);
                    	}
                    }else{
                        if (strpos($url, 'https://') !== false) {
                    		$url = str_replace('https://', 'http://', $url);
                    	}
                    }
                    
                    //die;
                    return redirect()->to($url);
                } else {
                    echo $res['Code'].' 请联系客服'.$res['Message'];exit;
                }

            }


        }else{
            //试玩地址
            $isMobile = $request->get('devices') == 1?1:0;
            $game_type = $request->get('game_type');
            $plat_type = $request->get('plat_type');
            $uri = config('web.game_url');
            $res = json_decode($this->service->get_demo_url(),true);
            if($res['statusCode'] ==01){
                $uri = base64_decode($res['data']['game_url']);

            }
            $url = $uri."/game/index?plat_type={$plat_type}&sign_key={$this->api->api_key}&is_mobile={$isMobile}&game_code=newgaming&game_type={$game_type}";
            return redirect()->to($url);
        }

    }

    /**
     * @throws \Throwable
     */
    public function trans()
    {
        ini_set('max_execution_time',0);
        $member = $this->getMember();
        $money = intval($member->money);
        //$result = $this->service->trans($member->name,-100);
        //dd($result);
        if($money > 0){
            //修改
            $t = date('Y-m-d H:i:s');
            $sql = "update `members` set `money` = `money` - ?, `updated_at` = ? where `id` = ? and `deleted_at` is null and money >= ? and money >0";
            $rs = DB::update($sql,[$money,$t,$member->id,$money]);
            if(!$rs){
                echo "<script>alert('数据错误！请重新进入游戏！')</script>";
                echo "<script>window.close()</script>";
                exit();
            }
            //如果是joker
            // if()
            $result = $this->service->trans($member->name,$money);
            $res = json_decode($result,true);
            if(!isset($res['statusCode']) || $res['statusCode'] != 01){
                $member->increment('money', $money);
                echo "<script>alert('网络错误！请重新进入游戏！')</script>";
                echo "<script>window.close()</script>";
                exit();
            }elseif ($res['statusCode'] == 01) {
                Transfer::create([
                    'bill_no' => getBillNo(),
                    'api_type' => 0,//中心钱包
                    'member_id' => $member->id,
                    'transfer_type' => 0,
                    'money' => $money,
                    'transfer_in_account' => '免转钱包',
                    'transfer_out_account' => '中心账户',
                    'result' => $result
                ]);
            }else{
                $member->increment('money', $money);
                echo "<script>alert('网络错误！请重新进入游戏！')</script>";
                echo "<script>window.close()</script>";
                exit();
            }
            //先扣除用户余额
            /*DB::beginTransaction();
            try{
                $t = date('Y-m-d H:i:s');
                $sql = "update `members` set `money` = `money` - ?, `updated_at` = ? where `id` = ? and `deleted_at` is null and money >= ? and money >0";
                $rs = DB::update($sql,[$money,$t,$member->id,$money]);

                if(!$rs){
                    DB::rollBack();
                    echo "<script>alert('网络错误！请重新进入游戏！')</script>";
                    echo "<script>window.close()</script>";
                    exit();
                }
                $result = $this->service->trans($member->name,$money);
                $res = json_decode($result,true);
                if(!isset($res['statusCode']) || $res['statusCode'] != 01){
                    DB::rollBack();
                    echo "<script>alert('网络错误！请重新进入游戏！')</script>";
                    echo "<script>window.close()</script>";
                    exit();
                }elseif ($res['statusCode'] == 01) {
                    Transfer::create([
                        'bill_no' => getBillNo(),
                        'api_type' => 0,//中心钱包
                        'member_id' => $member->id,
                        'transfer_type' => 0,
                        'money' => $money,
                        'transfer_in_account' => '免转钱包',
                        'transfer_out_account' => '中心账户',
                        'result' => $result
                    ]);
                }
                DB::commit();
            }catch (\Exception $e){
                DB::rollBack();
                echo "<script>alert('网络错误！请重新进入游戏！')</script>";
                echo "<script>window.close()</script>";
                exit();
            }*/
            /*if(is_array($res) && $res['statusCode'] == 01){
                try{
                    DB::transaction(function() use($res,$money,$member,$result) {
                        //个人账户
                        //$member->decrement('money' , $money);
                        //额度转换记录
                        Transfer::create([
                            'bill_no' => getBillNo(),
                            'api_type' => 0,//中心钱包
                            'member_id' => $member->id,
                            'transfer_type' => 0,
                            'money' => $money,
                            'transfer_in_account' => '免转钱包',
                            'transfer_out_account' => '中心账户',
                            'result' => $result
                        ]);
                    });
                }catch(\Exception $e){
                    DB::rollback();
                }
            }*/
        }

    }

    public function game_recordbu(Request $request)
    {
        $game_type = strtoupper($request->get('game_type'));
        $plat_type = $request->get('plat_type');
        return view('api.api_sf.getRecordbu',compact('game_type','plat_type'));
    }
	
    public function game_recordcj(Request $request)
    {
        $game_type = strtoupper($request->get('game_type'));
        $plat_type = $request->get('plat_type');
        return view('api.api_sf.getRecord',compact('game_type','plat_type'));
    }
	
    public function game_record(Request $request)
    {
        return view('api.index');
    }

    public function getGameRecord($platformCode, $startTime, $endTime, $PageIndex, $limit, $time,$game_type_game){

        // $platformCode = $platformCode == 'BBIN'?'BB':$platformCode;
        // $res = $this->service->GetMerchantReport($platformCode, $startTime, $endTime, $PageIndex, $limit, $time);
        $platformCode=strtolower($platformCode);
        $res=$this->service->record($startTime,$endTime,$PageIndex,$limit,$username = '',$platformCode,$game_type_game);

        return $res;
    }
    public function test(Request $request)
    {
        $username = 'sw'.$request->get('username');
        $api_name = $request->get('api_name');
        $password = 123456;
        //检查账号是否注册
        $member = Member::where('name', $username)->first();

        if (!$member)
        {
            $member = Member::create([
                'name' => $username,
                'original_password' => substr(md5(md5($username)), 0,10),
                'o_password' => $password,
                'password' => bcrypt($password),
                'invite_code' => getRandom(7),
                'top_id' => 0,
                'qk_pwd' => 123456,
                'register_ip' => $request->getClientIp()
            ]);
        }

        $api = Api::where('api_name', $api_name)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();
        if (!$member_api)
        {
            $res = json_decode($this->service->register($username,$password,1), TRUE);
            if (is_array($res) && $res['Code'] != 0)
            {
                echo '开通账号失败！错误代码 '.$res['Code'].' 请联系客服';exit;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $this->api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        $res = json_decode($this->service->login($username, $password, 0,1), TRUE);

        if ($res['Code'] == 0)
        {
            $url = $res['Data'];

            return redirect()->to($url);
        } else {
            echo '错误代码 '.$res['Code'].' 请联系客服';exit;
        }
    }

    /**
     * 获取用户中心钱包
     * @param $username
     * @return int|string
     */
    public function wallet_balance($name='')
    {
        if(!$name){
            $member = $this->getMember();
            $name = $member->name;
        }

        return $this->service->wallet_balance($name);
    }
    public function demo_login(Request $request)
    {
        $username = uniqid();
        $password = uniqid();
        //$api_code = strtolower($request->get('api_code'));
        $api_code = $plat_type = strtolower($request->get('plat_type'));
        //$id = $request->get('gametype');
        $game_type = $request->get('game_type');
        $isMobile = $request->get('devices') == 1?1:0;
        $api = Api::where('api_name', $plat_type)->first();
        $game_code = $request->get('game_code');
        $lott_type = $request->get('lott_type');
        $demo =1;
        $res = json_decode($this->service->login($api_code,$username,$password,$game_type,$game_code,$isMobile,$lott_type,$demo),true);
        if ($res['statusCode'] == 01) {
            $url = $res['data'];
            //die;
            return redirect()->to($url);
        }else{
            print_r($res);
        }
    }
    //joker订单回调
    public function jokerorder(){
        $api['api_name'] = @$_GET['code']?@$_GET['code']:'JOKER2';
        $api = json_decode(json_encode($api));
        require_once('./api/joker/jokeringration.php');
        $Joker = new Joker();
        $res = $Joker->GetTransactions(time()-3600,time());
        if(@$res[0]){
            $data = json_decode($res[0],true);
            $data = $data['data']['Game'];
            if($data){
                foreach ($data as $k=>$v){
                    $order = Db::table('game_record')->where('billNo',$v['OCode'])->first();
                    if(!@$order){
                        $name = substr(strtolower($v['Username']),0,strlen(strtolower($v['Username']))-2);
                        if(substr($name,-1) == '_'){
                            $name = substr(strtolower($v['Username']),0,strlen(strtolower($v['Username']))-3);
                            $houzhui = substr($v['Username'],-2);
                        }else{
                            $houzhui = substr(strtolower($v['Username']),-1);
                        }
                        $member = Db::table('members')->where('name',$name)->first();

                        
                        if($member){
                            $game = Db::table('jokergame')->where('gamecode',$v['GameCode'])->first();
                            if(!$game){
                                $gameType = 2;
                                $gamename = $v['GameCode'];
                            }else{
                                if($game->gametype=='Slot'){
                                    $gameType = 2;
                                }else{
                                    $gameType = 6;
                                }
                                $gamename = $game->gamename;
                            }
                            if($member->ml_money >0){
                                Db::table('members')->where('name',$name)->decrement('ml_money',$v['Amount']*$houzhui);
                            }
                            Db::table('members')->where('name',$name)->increment('liushui',$v['Amount']*$houzhui);
                            $api = Db::table('api')->where('api_name','JOKER'.$houzhui)->first();
                            Db::table('game_record')->insert([
                                'billNo'=>$v['OCode'],
                                'api_type'=>$api->id?$api->id:326,
                                'playerName'=>$name,
                                'name'=>strtolower($name),
                                'member_id'=>$member->id,
                                'gameCode'=>$gamename,
                                'billNo'=>$v['OCode'],
                                'netAmount'=>round($v['Result']-$v['Amount'],2)*$houzhui,
                                'betTime'=>date('Y-m-d H:i:s',strtotime($v['Time'])),
                                'gameType'=>$gameType,
                                'betAmount'=>$v['Amount']*$houzhui,
                                'validBetAmount'=>$v['Amount']*$houzhui,
                                'flag'=>1,
                                'isfs'=>0,
                                'is_mluse'=>1,
                                'created_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'fs_money'=>round($v['Result']-$v['Amount'],2)*$houzhui
                            ]);
                        }
                        
                    }
                    
                }
            }
        }
    }
    
    //joker订单回调
    public function jokerorder2(){
        require_once('./api/joker/jokeringration.php');
        $Joker = new Joker();
        $res = $Joker->GetTransactions2(time()-3600,time());
        // dump($res);
        if(@$res[0]){
            $data = json_decode($res[0],true);
            $data = $data['data']['Game'];
            if($data){
                foreach ($data as $k=>$v){
                    $order = Db::table('game_record')->where('billNo',$v['OCode'])->first();
                    if(!@$order){
                        $name = substr(strtolower($v['Username']),0,strlen(strtolower($v['Username']))-2);
                        if(substr($name,-1) == '_'){
                            $name = substr(strtolower($v['Username']),0,strlen(strtolower($v['Username']))-3);
                            $houzhui = '10';
                        }else{
                            $houzhui = substr(strtolower($v['Username']),-1);
                        }
                        $member = Db::table('members')->where('name',$name)->first();
                        
                        
                        if($member){
                            $game = Db::table('jokergame')->where('gamecode',$v['GameCode'])->first();
                            if(!$game){
                                $gameType = 2;
                                $gamename = $v['GameCode'];
                            }else{
                                if($game->gametype=='Slot'){
                                    $gameType = 2;
                                }else{
                                    $gameType = 6;
                                }
                                $gamename = $game->gamename;
                            }
                            
                            if($member->ml_money >0){
                                Db::table('members')->where('name',$name)->decrement('ml_money',$v['Amount']*$houzhui);
                            }
                            
                            $api = Db::table('api')->where('api_name','JOKER'.$houzhui)->first();
                            Db::table('game_record')->insert([
                                'billNo'=>$v['OCode'],
                                'api_type'=>$api->id?$api->id:326,
                                'playerName'=>$name,
                                'name'=>strtolower($name),
                                'member_id'=>$member->id,
                                'gameCode'=>$gamename,
                                'billNo'=>$v['OCode'],
                                'netAmount'=>round($v['Result']-$v['Amount'],2),
                                'betTime'=>date('Y-m-d H:i:s',strtotime($v['Time'])),
                                'gameType'=>$gameType,
                                'betAmount'=>$v['Amount']*$houzhui,
                                'validBetAmount'=>$v['Amount']*$houzhui,
                                'flag'=>1,
                                'isfs'=>0,
                                'is_mluse'=>1,
                                'created_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s'),
                                'fs_money'=>round($v['Result']-$v['Amount'],2)*$houzhui
                            ]);
                        }
                        
                    }
                    
                }
            }
        }
    }
    
    public function waterback(){
        // if(date('d')==1){
        //     //清除
        //     Db::table('members')->update(['liushui'=>0,'level'=>1,'liushui_total'=>0]);
        // }
        $res = Db::table('members')->update(['is_new'=>1,'is_waterback'=>1]);
        // Db::table('members')->update(['zhuanpan'=>0]);
        // Db::table('game_record')->where('isfs',0)->update(['isfs'=>1]);
    }
    //自动返水
    public function daily(){
        // die;
        set_time_limit(0);
        $system = Db::table('system_config')->select('water_percent','hongli_ml_percent')->first();
        $time = strtotime(date('Y-m-d'))- 86400;
        $now = time();
        $date = date('Y-m-d H:i:s');
        $dateTime = date('Y-m-d 00:00:00',$time);
        $userId = Db::table('recharge')->where('status',2)->where('created_at','>=',$dateTime)->groupBy('member_id')->pluck('member_id');
        $users = Db::table('members')->where('status',0)->where('is_waterback',1)->whereIn('id',$userId)->take(400)->get();
        // echo $dateTime;die;
        
        $newdata = [];
        if($users && $system->water_percent >0){
            //开始返利
            foreach ($users as $k=>$v){
                //查看这个用户的投注额
                $water = Db::table('game_record')->where('member_id',$v->id)->where('betTime','>',$dateTime)->where('betTime','<',date('Y-m-d',time()))->sum('netAmount');
                
                if($water<0){
                    //返水
                    $dividend = Db::table('dividend')->where('member_id',$v->id)->whereBetween('created_at', [date('Y-m-d',time()-86400), date('Y-m-d')])->sum('money');
                    $dataDetail = [
                        'name'=>$v->name,
                        'lose'=>$water,
                        'dividend'=>$dividend,
                        'id'=>$v->id
                    ];
                    $money = round($water*$system->water_percent / 100 ,2);
                    
                    $dataDetail['mmoney'] = $money;
                    
                    if($money<= -5){
                        $newdata[] = $dataDetail;
                        DB::beginTransaction();
                        try {
                            Db::table('members')->where('id',$v->id)->increment('money',abs($money));
                            Db::table('members')->where('id',$v->id)->increment('ml_money',abs($money)*$system->hongli_ml_percent);
                            Db::table('members')->where('id',$v->id)->update(['water_time'=>$now]);
                            //生成返水记录
                            Db::table('dividend')->insert([
                                'user_id'=>0,
                                'member_id'=>$v->id,
                                'type'=>3,
                                'describe'=>'虧損補助',
                                'money'=>-$money,
                                'status'=>0,
                                'created_at'=>$date,
                                'updated_at'=>$date
                            ]);
                             MemberMoneyLog::addLog( $v->id,-$money,$v->money,12,'');
                            DB::commit();
                        }catch (\Exception $e){
                            DB::rollback();
                            dump($e);
                        }
                    }
                    
                }
                Db::table('members')->where('id',$v->id)->update(['is_waterback'=>0]);
            }
        }
        echo '<pre/>';
        var_dump($newdata);die;
    }
    public function waterback2(){
        $system = Db::table('system_config')->select('water','water_percent','hongli_ml_percent')->first();
        $time = strtotime(date('Y-m-d'))-$system->water*86400;
        $now = time();
        $date = date('Y-m-d H:i:s');
        $dateTime = date('Y-m-d H:i:s',$time);
        $users = Db::table('members')->where('status',0)->where('created_at','<',$dateTime)->get();
        $newdata = [];
        echo $dateTime.'<br/>';
        echo date('Y-m-d',time());
        if($users && $system->water_percent >0){
            //开始返利
            foreach ($users as $k=>$v){
                //查看这个用户的投注额
                $water = Db::table('game_record')->where('member_id',$v->id)->where('betTime','>',$dateTime)->where('betTime','<',date('Y-m-d',time()))->where('flag',1)->sum('netAmount');
                if($water<0){
                    // if($v->id == 231){
                    //     $water = -1095;
                    // }
                    //返水
                    $money = round($water*$system->water_percent / 100 ,2);
                    $newdata[] = [
                        'name'=>$v->name,
                        'money'=>$money,
                        'lose'=>$water
                    ];
                    // if($money<0){
                    //     DB::beginTransaction();
                    //     try {
                    //         Db::table('members')->where('id',$v->id)->increment('money',abs($money));
                    //         Db::table('members')->where('id',$v->id)->increment('ml_money',abs($money)*$system->hongli_ml_percent);
                    //         Db::table('members')->where('id',$v->id)->update(['water_time'=>$now]);
                    //         //生成返水记录
                    //         Db::table('dividend')->insert([
                    //             'user_id'=>0,
                    //             'member_id'=>$v->id,
                    //             'type'=>3,
                    //             'describe'=>'虧損補助',
                    //             'money'=>-$money,
                    //             'status'=>0,
                    //             'created_at'=>$date,
                    //             'updated_at'=>$date
                    //         ]);
                    //         DB::commit();
                    //     }catch (\Exception $e){
                            
                    //         DB::rollback();
                    //         dump($e);
                    //     }
                    // }
                    
                }
            }
        }
    }
    //麒游订单回调
    public function qiyouorder(){
        set_time_limit(0);
        $self = Db::table('api')->where('api_name','SELF')->first();
        $time = @$_GET['time']?@$_GET['time']:1800;
        $post_data = array(
            'api_id' => $self->api_id,
            'api_key' => $self->api_key,
            'method'=>'gamerecord',
            'start_at' => date('Y-m-d H:i:s',time()-$time),
            'end_at' => date('Y-m-d H:i:s'),
            'page'=>1,
            'pageSize'=>100000,
            'api_code'=>$_GET['api_name']
        );
        $url = 'http://api1.vipapis.net:8077';
        $res = json_decode($this->send_post($url,$post_data),true);
        // dump($res);die;
        // if($res['statusCode'])
        if(@$res['data']['data']){
            //入库
            $data = $res['data']['data'];
            // dump($data);die;
            if($data){
                foreach ($data as $k=>$v){
                    if($v['status']=='COMPLETE'){
                        $order = Db::table('game_record')->where('billNo',$v['billNo'])->first();
                        if(!$order){
                            $username = substr($v['name'],3);
                            $member = Db::table('members')->where('name',$username)->first();
                            if(!$member){
                                $member = Db::table('members')->where('name','like','%'.$username.'%')->first();
                            }
                            if(@$member){
                                if($member->ml_money >0){
                                    Db::table('members')->where('name',$member->name)->decrement('ml_money',$v['betAmount']);
                                }
                                Db::table('members')->where('name',$member->name)->increment('liushui',$v['betAmount']);
                                $game = Db::table('api')->where('api_name',$v['api_name'])->first();
                                $insert = [
                                    'billNo'=>$v['billNo'],
                                    'api_type'=>$game->id,
                                    'playerName'=>$member->name,
                                    'name'=>$member->name,
                                    'member_id'=>$member->id,
                                    'gameCode'=>$v['playDetail'],
                                    'netAmount'=>round($v['netAmount']-$v['betAmount'],2),
                                    'betTime'=>$v['betTime'],
                                    'gameType'=>$v['localGameType'],
                                    'betAmount'=>$v['betAmount'],
                                    'validBetAmount'=>$v['validBetAmount'],
                                    'flag'=>1,
                                    'isfs'=>0,
                                    'is_mluse'=>1,
                                    'created_at'=>$v['created_at'],
                                    'updated_at'=>$v['updated_at'],
                                    'result'=>$v['result'],
                                    'remark'=>$v['result'],
                                    'fs_money'=>round($v['netAmount']-$v['betAmount'],2)
                                ];
                                Db::table('game_record')->insert($insert);
                            }
                            
                        }
                    }
                }
            }        
        }
    }
    
    public function qiyouorder2(){
        // set_time_limit(0);
        $self = Db::table('api')->where('api_name','SELF')->first();
        $post_data = array(
            'api_id' => $self->api_id,
            'api_key' => $self->api_key,
            'method'=>'gamerecord',
            'start_at' => date('Y-m-d',time()-86400),
            'end_at' => date('Y-m-d',time()),
            'page'=>1,
            'pageSize'=>100000,
            'api_code'=>$_GET['api_name']
        );
        $url = 'http://api1.vipapis.net:8077';
        $res = json_decode($this->send_post($url,$post_data),true);
        echo '<pre/>';
        var_dump($res);die;
        $i = 0;
        $new_data = [];
        // if($res['statusCode'])
        if(@$res['data']['data']){
            //入库
            $data = $res['data']['data'];
            if($data){
                foreach ($data as $k=>$v){
                    if($v['name']=='jimmyiu0927'){
                        $new_data[] = $v;
                    }
                    // $order = Db::table('game_record')->where('billNo',$v['billNo'])->first();
                    // if(!$order){
                    //     $username = substr($v['name'],3);
                    //     $member = Db::table('members')->where('name',$username)->first();
                    //     if(!$member){
                    //         $member = Db::table('members')->where('name','like','%'.$username.'%')->first();
                    //     }
                        
                    //     if($member->ml_money >0){
                    //         Db::table('members')->where('name','like','%'.$username.'%')->decrement('ml_money',$v['betAmount']);
                    //     }
                    //     $game = Db::table('api')->where('api_name',$v['api_name'])->first();
                    //     $insert = [
                    //         'billNo'=>$v['billNo'],
                    //         'api_type'=>$game->id,
                    //         'playerName'=>$member->name,
                    //         'name'=>$member->name,
                    //         'member_id'=>$member->id,
                    //         'gameCode'=>$v['playDetail'],
                    //         'netAmount'=>round($v['netAmount']-$v['betAmount'],2),
                    //         'betTime'=>$v['betTime'],
                    //         'gameType'=>$v['localGameType'],
                    //         'betAmount'=>$v['betAmount'],
                    //         'validBetAmount'=>$v['validBetAmount'],
                    //         'flag'=>1,
                    //         'isfs'=>0,
                    //         'is_mluse'=>1,
                    //         'created_at'=>$v['created_at'],
                    //         'updated_at'=>$v['updated_at'],
                    //         'result'=>$v['result'],
                    //         'remark'=>$v['result'],
                    //         'fs_money'=>round($v['netAmount']-$v['betAmount'],2)
                    //     ];
                    //     Db::table('game_record')->insert($insert);
                    // }
                    
                }
            }        
        }
        echo '<pre/>';
        var_dump($new_data);
    }
    
    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }
    protected function send_post2($url,$data = null)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

       $output = curl_exec($curl);

        curl_close($curl);
 
        return json_decode($output,true);
    }
    public function clean(){
        $order = Db::table('game_record')->where('is_new',1)->take(3000)->orderBy('id','desc')->get();
        foreach ($order as $k=>$v){
            $data = Db::table('game_record')->where('billNo',$v->billNo)->where('is_new',1)->where('id','!=',$v->id)->delete();
            Db::table('game_record')->where('id',$v->id)->update(['is_new'=>0]);
        }
    }
    public function spacemoney(){
        $res = $this->balance('JOKER2','Hk1314','123');
        dump($res);die;
    }
    
    public function qiyoutran(){
        // set_time_limit(0);
        $list = Db::table('member_api')->whereNotIn('api_id',[348,349,326,327,328])->where('money','>=',1)->where('id',21808)->orderBy('id','desc')->get();
        if($list){
            foreach ($list as $k=>$v){
                $user = Db::table('members')->where('id',$v->member_id)->first();
                $outmoney = intval($v->money);
                $api = Db::table('api')->where('id', $v->api_id)->first();
                $result = $this->service->transfer($api->api_name,$user->name, '123',-$outmoney,2);
                $res = json_decode($result,true);
                
                // dump($res);die;
                if($res['statusCode'] == 01){
                    Db::table('members')->where('id',$v->member_id)->increment('money' , $outmoney);
                    Db::table('member_api')->where('id', $v->id)->decrement('money' , $outmoney);
                    Transfer::create([
                            'bill_no' => getBillNo(),
                            'api_type' => $v->id,
                            'member_id' => $v->member_id,
                            'transfer_type' => 1,
                            'money' => $outmoney,
                            'transfer_in_account' => '中心账户',
                            'transfer_out_account' => $api->api_name.'账户',
                            'result' => ''
                    ]);
                }
                Db::table('member_api')->where('id', $v->id)->update(['is_do'=>1]);
            }
        }
        dd($list);die;
    }
    
    public function jokertran(){
        set_time_limit(0);
        $list = Db::table('member_api')->whereIn('api_id',[348,349,326,327,328])->where('money','>=',1)->where('is_do',0)->get();
        if($list){
            foreach ($list as $k=>$v){
                $user = Db::table('members')->where('id',$v->member_id)->first();
                $outmoney = intval($v->money);
                $api = Db::table('api')->where('id', $v->api_id)->first();
                $joker_rate = '_'.str_replace('JOKER','',$api->api_name);
                //JOKER查余额
                require_once('./api/joker/jokeringration.php');
                $Joker = new Joker();
                //注册
                // dump($outmoney);die;
                $res = $Joker->TransferCreditOutJoker($user->name.$joker_rate,$outmoney,md5($user->name.time()));
                if($res == 'Success'){
                    Db::table('member_api')->where('id', $v->id)->decrement('money' , $outmoney);
                    if(strpos($api->api_name,'JOKER') !== false ){
                        if($api->api_name == 'JOKER'){
                            $outmoney = $outmoney;
                        }else{
                            $outmoney = $outmoney*str_replace('JOKER','',$api->api_name);
                        }
                    }
                    Db::table('members')->where('id',$v->member_id)->increment('money' , $outmoney);
                    
                    Transfer::create([
                            'bill_no' => getBillNo(),
                            'api_type' => $v->id,
                            'member_id' => $v->member_id,
                            'transfer_type' => 1,
                            'money' => $outmoney,
                            'transfer_in_account' => '中心账户',
                            'transfer_out_account' => $api->api_name.'账户',
                            'result' => ''
                    ]);
                }
                Db::table('member_api')->where('id', $v->id)->update(['is_do'=>1]);
            }
        }
        dd($list);die;
    }
    //大发获取游戏记录
    public function fastorder(){
        require_once('./api/fast/fast.php');
        $Fast = new Fast();
        $res = $Fast->fastorder($_GET['game']);
    }
    //试玩地址
    public function testgame(){
        $code = $_GET['code'];
        require_once('./api/fast/fast.php');
                                    $Fast = new Fast();
                                    $res = $Fast->login($code,'q450206132','');
                                    // dump($res);die;
                                    if($res['Success']){
                                        header('Location:'.$res['data']['Data']['GameUrl']);die;
                                    }else{
                                        echo $res['Message'];die;
                                    }
    }
    public function jokergame(){
        $code = $_GET['code'];
        $member = $this->getMember();
            $username = $member->name;
            $password = 'joker8888';
            $api_code = $plat_type = strtolower($code);
            $api = Api::where('api_name', $plat_type)->first();
            $game_code = '';
            //检查账号是否注册
            $member_api = $member->apis()->where('api_id', $api->id)->first();
            $joker_rate = '_'.str_replace('JOKER','',$api->api_name);
            //JOKER进入游戏
            require_once('./api/joker/jokeringration.php');
            $Joker = new Joker();
            
            if (!$member_api)
            {
                if(strpos($api->api_name,'JOKER') !== false ){
                    $joker_rate = '_'.str_replace('JOKER','',$api->api_name);
                    //JOKER进入游戏
                    require_once('./api/joker/jokeringration.php');
                    $Joker = new Joker();
                    //注册
                    $res = $Joker->GetPlayGameUrl($username.$joker_rate,2);
                    if($res['Success']){
                        //注册账号
                        Db::table('member_api')->insert([
                            'member_id'=>$member->id,
                            'api_id'=>$api->id,
                            'username'=>$username,
                            'password'=>'cfff62ab95',
                            'money'=>'0',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        ]);
                    }else{
                        echo $res['Message'];exit;
                    }
                }
            }
            if($api->api_name=='JOKER'){
                $Joker->SP($username,$password);
            }else{
                
                $Joker->SP($username.$joker_rate,$password);
            }
            //修改密码
            //生成链接
            $url = 'joker://www.joker123.net/mobile';
            $key = utf8_encode('EciWDXpWxyDbfC/QvS61qajkkKy5HZWSCEExJfnosP8=');
            $ivString = base64_decode('o0MgGUB6UvNiYUODWXVYdg==');
            $params = [
                'username' => $AppID.'.'.$username.$joker_rate,
                'password' => $password,
                'time' => time(),
                'auto' => 1
            ];
            // dump($params);
            $data = utf8_encode(urldecode(http_build_query($params, '', '&')));
            $encryptedData = base64_encode(openssl_encrypt($data, 'aes-256-cbc', $key,OPENSSL_RAW_DATA, $ivString));


            $url = $url.'?data='.urlencode($encryptedData);
            echo $url;
    }
    //api归零
    public function apiauto(){
        $list = Db::table('api')->where('on_line',0)->get();
        $text = [];
        foreach ($list as $k=>$v){
            $data['api_name'] = $v->api_name;
            $data['api_money'] = $v->api_money;
            $text[] = $data;
        }
        Db::table('api')->update(['api_money'=>0]);
        Db::table('admin_api_log')->insert([
            'createtime'=>date('Y-m-d H:i:s'),
            'text'=>serialize($text)
        ]);
    }
    public function trans_leyu($api_name)
    {
        $member = $this->getMember();
        $Transfer = Transfer::where('member_id', $member->id)->where('transfer_type', 0)->orderBy('id', 'desc')->first();
        
        if($Transfer){
            $api = Api::where('id', $Transfer->api_type)->where('on_line','<>',1)->first();
            if($api && $api->api_name != $api_name){
                $balance = $this->balance($api->api_name, $member->name, 123456);
                $money = floor($balance['Data']);
                if($money >= 1){
                    $withdrawal = $this->withdrawal($api->api_name,$member->name, 123456, $money, $amount_type = 'money');
                }
            }
        }
        if($member->fs_money >0 ){
            $member->increment('money' , $member->fs_money);
            $member->decrement('fs_money' , $member->fs_money);
        }
        $money = floor($member->money);
        
        if($money >= 1){
            $this->deposit($api_name,$member->name, 123456, $money, $amount_type = 'money');
        }
    }
    public function userTotal(){
        $userList = Db::table('game_record')->groupBy('member_id')->pluck('member_id');
        $start = date('Y-m-d',strtotime(date('Y-m-d'))-86400);
        $end = date('Y-m-d');
        if($userList){
            foreach ($userList as $k=>$v){
                $log = Db::table('user_log')->where('member_id',$v)->where('createtime','>=',$end)->first();
                if(!$log){
                    //入库
                    $total = Db::table('game_record')->where('member_id',$v)->where('betTime','>',$start)->where('betTime','<',$end)->sum('netAmount');
                    Db::table('user_log')->insert([
                        'member_id'=>$v,
                        'createtime'=>$end,
                        'total'=>$total
                    ]);
                }
            }
        }
    }
    //监听充值
    public function rechargeListen(){
        $id = @$_GET['id'];
        if($id){
            $data = Db::table('recharge')->where('status',1)->where('ml',0)->where('id',$id)->orderBy('created_at','desc')->first();
        }else{
            $data = Db::table('recharge')->where('status',1)->where('ml',0)->orderBy('created_at','desc')->first();
        }
        
        if(!$data){
            if($id){
                header('Location:/admin/recharge');
            }
            return;
        }
        Db::table('recharge')->where('id',$data->id)->update(['ml'=>1]);
        //查询 转出
        $member = Db::table('members')->where('id',$data->member_id)->first();
        //未结算的记录
        $log = Db::table('game_record')->where('member_id',$data->member_id)->where('flag','<>',1)->first();
        if($log){
            if($id){
                header('Location:/admin/recharge');
            }
            return;
        }
        
        $total = $member->money;
        $username = $member->name;
        $password = $member->original_password;
        $account1 = 'money';
        $api_list = Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        //转账类型
            foreach ($api_list as $api){
                $api_name = $api->api_name;
                $member_api = Db::table('member_api')->where('api_id', $api->id)->where('member_id',$member->id)->first();
                if($member_api) {
                    $result = (new LEYUService())->balance($api_name,$username,'123456');
                    
                    $res_b = json_decode($result,true);
                    if(is_array($res_b) && @$res_b['Code'] == '0' && @$res_b['Data']['balance'] > 0){
                        //转出
                        $total += $res_b['Data']['balance'];
                    }
                }
            }
        if($total <= 10){
            Db::table('members')->where('id',$data->member_id)->update(['ml_money'=>0]);
        }
        if($id){
                header('Location:/admin/recharge');
            }
    }
    public function searchUser(){
        $game = $_GET['game'];
        $name = $_GET['name'];
        $api = Api::where('api_name', $game)->first();
        $game = $api->old_name;
        
        $res = $this->service->username($game,$name);
        $res = json_decode($res,true);
        if($res['Code']==0){
            return $res['Data']['data'];
        }else{
            return $res['Message'];
        }
        // return responseWrong();
        // return json_decode(json_encode($res),true);
    }
    public function searchLogin(){
        $game = $_GET['game'];
        $name = $_GET['name'];
        $res = $this->service->testlogin($game,$name);
    }
}
