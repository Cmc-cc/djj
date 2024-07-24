<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\VarTest;
use DB;
use App\Models\MemberMoneyLog;
class PlayerController extends Controller
{
    public $API_URL = "http://gsmd.336699bet.com";
    public $LOG_URL = "http://gslog.336699bet.com";
    public $operatorcode;
    public $signature;
    
    public $operatorcode2;
    public $signature2;
    
    public function __construct()
    {
        $setting = Db::table('system_config')->first();
        $this->API_URL = $setting->leyu_domain;
        $this->operatorcode = $setting->leyu_pre_1;
        $this->signature = $setting->leyu_api_key;
        $this->operatorcode2 = $setting->leyu_pre_2;
        $this->signature2 = $setting->leyu_api_key2;
    }
    /*
     *创建玩家帐号接口
     * **/
    public function createMember(Request $request)
    {
        $username = strtolower('ceshi002');
        if(strlen($username) < 3 || strlen($username) > 12){
             return [
                'Code' => '-1',
                'Message' => '会员账号最小3位，最大12位',
                'url' => '',
                'Data' => '',
            ];
        }
        $sign = md5($this->operatorcode . $username . $this->signature);
        $data = [
            "operatorcode" => $this->operatorcode,
            "username" => $username,
            "signature" => strtoupper($sign)
        ];

        $result = $this->curl($this->API_URL . '/createMember.aspx',$data);
        return $result;
    }
    /*
     * 获取余额接口
     * */
    public function getBalance(Request $request){
        $username = strtolower('ceshi002');
        $password = "Qwe123aq";
        $providercode = "DG";   ///Provider code 供应商代号
        if(strlen($username) < 3 || strlen($username) > 12){
            return [
                'Code' => '-1',
                'Message' => '会员账号最小3位，最大12位',
                'url' => '',
                'Data' => '',
            ];
        }
        else if(strlen($password) > 12){
            return [
                'Code' => '-1',
                'Message' => '密码最大12位',
                'url' => '',
                'Data' => '',
            ];
        }

        $sign = md5($this->operatorcode . $password .$providercode  . $username . $this->signature);
        $data = [
            "operatorcode" => $this->operatorcode,
            "providercode" => $providercode,
            "username" => $username,
            "password"=> $password,
            "signature" => strtoupper($sign)
        ];
        $result = $this->curl($this->API_URL . '/getBalance.aspx',$data);
        return $result;
    }
    /*
     * 获取游戏列表
     * **/
    public function getGameList(Request $request){
        $providercode = "DG";  ///Provider code 供应商代号

        $sign = md5($this->operatorcode . $providercode . $this->signature);
        $data = [
            "operatorcode" => $this->operatorcode,
            "providercode" => $providercode,
            "signature" => strtoupper($sign)
        ];
        $result = $this->curl($this->API_URL . '/getGameList.aspx',$data);

        var_dump($result);
    }

    /*
     * 资金转账接口
     * **/
    public function makeTransfer(Request $request){
        $providercode = "DG";   ///Provider code 供应商号
        $username = strtolower("ceshi002");
        $password = "Qwe123aq";
        $referenceid = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);  ///Reference ID 转账单据号
        $type = "0";   ///1 提出   0  存入
        $amount = "1";

        $sign = md5($amount . $this->operatorcode . $password . $providercode . $referenceid . $type . $username . $this->signature);
        $data = [
            "operatorcode" => $this->operatorcode,
            "providercode" => $providercode,
            "username" => $username,
            "password" => $password,
            "referenceid" => $referenceid,
            "type" => $type,
            "amount" => $amount,
            "signature" => strtoupper($sign)
        ];

        $result = $this->curl($this->API_URL . '/makeTransfer.aspx',$data);
        return $result;
    }

    /*
     * 启动游戏
     * **/
    public function launchGames(Request $request){
        $providercode = "DG";   ///Provider code 供应商号
        $username = strtolower("ceshi002");
        $password = "Qwe123aq";
        $type = "LC";   ///游戏类型
        $lang = "en-US";

        $sign = md5( $this->operatorcode . $password . $providercode . $type . $username . $this->signature);
        $data = [
            "operatorcode" => $this->operatorcode,
            "providercode" => $providercode,
            "username" => $username,
            "password" => $password,
            "type" => $type,
            "signature" => strtoupper($sign)
        ];

        $result = $this->curl($this->API_URL . '/launchGames.aspx',$data);
        return $result;

    }

    /*
     * 获取投注历史记录接口
     * **/
    public function repullBettingHistoryApiClient(Request $request){
        // $game = Db::table('api')->where('on_line',0)->where('api_name','JD')->get();
        // if($game){
        //     foreach ($game as $kk=>$vv){
        $setting = Db::table('system_config')->where('id',1)->first();
                $versionkey = 0;
                $sign = md5( $this->operatorcode. $this->signature);
                $data = [
                    "operatorcode" => $this->operatorcode,
                    "versionkey" => $setting->versionkey,
                    "signature" => strtoupper($sign)
                ];
                $result = $this->curl($this->LOG_URL . '/fetchbykey.aspx',$data);
                // dump($data);
                // dump($this->LOG_URL . '/fetchbykey.aspx');
                // dump($result);die;
                if($result->errCode != 0){
                    return;
                }
                $list = json_decode($result->result,true);
                $api_type = [
                    'LC'=>1,
                    'SL'=>2,
                    'LT'=>3,
                    'SB'=>4,
                    'OT'=>5,
                    'FH'=>6,
                    'CB'=>7,
                    'ES'=>5,
                    'LK'=>3,
                    'VS'=>4
                ];
                // dump($list);
                if($list){
                    $ids=[];
                    foreach ($list as $k=>$v){
                        
                        $data=[];
                                $username = $v['member'];
                                $houzhui = substr($username,-3);
                                $houzhui2 = substr($username,-4);
                                $rate = 1;
                                if($houzhui=='JK2' || $houzhui=='JK3' || $houzhui=='JK5' || $houzhui2=='JK10' || $houzhui2=='JK20'){
                                    if($houzhui=='JK2'){
                                        $rate = 2;
                                        $username = substr_replace($username,"",-3);
                                    }if($houzhui=='JK3'){
                                        $rate = 3;
                                        $username = substr_replace($username,"",-3);
                                    }elseif($houzhui=='JK5'){
                                        $rate = 5;
                                        $username = substr_replace($username,"",-3);
                                    }elseif($houzhui2=='JK10'){
                                        $rate = 10;
                                        $username = substr_replace($username,"",-4);
                                    }elseif($houzhui2=='JK20'){
                                        $rate = 20;
                                        $username = substr_replace($username,"",-4);
                                    }
                                }
                                $user = Db::table('members')->where('name',$username)->first();
                                $order = Db::table('game_record')->where('billNo',$v['ref_no'])->first();
                                if($user && !$order){
                                    
                                    $api_name = $v['site'];
                                    if($houzhui=='JK2' || $houzhui=='JK5' || $houzhui=='JK3'){
                                        $api_name = $houzhui;
                                    }elseif($houzhui2=='JK10' || $houzhui2=='JK20'){
                                        $api_name = $houzhui2;
                                    }
                                    // dump($api_name);die;
                                    // $api_name = $api_name.'_HK';
                                    $game = Db::table('api')->where('api_name',$api_name)->first();
                                    // Db::table('members')->where('name',$username)->increment('liushui',$v['bet']);
                                    // Db::table('members')->where('name',$username)->increment('liushui_total',$v['bet']);
                                    $data['billNo']=$v['ref_no'];
                                    $data['gameType']=$api_type[$v['product']];
                                    $data['api_type']=$game->id;
                                    $data['playerName']=$user->name;
                                    $data['name']=$user->name;
                                    $data['member_id']=$user->id;
                                    $data['gameCode']=0;
                                    $data['xzhm']=$v['bet_detail'];
                                    $data['betAmount']=$v['bet'] * $rate;
                                    
                                    $data['netAmount']=round($v['payout']-$v['bet'],2) * $rate;
                                    $data['isfs']=0;
                                    $data['flag']=$v['status'];
                                    $data['betTime']=date('Y-m-d H:i:s',strtotime($v['start_time']) + 8*3600);
                                    $data['result']='';
                                    $data['fs_money'] = $data['betAmount'];
                                    $data['status'] = $v['status'];
                                    $data['validBetAmount']=$data['betAmount'];
                                    if($v['status'] == 1){
                                        $data['settleTime'] = date('Y-m-d H:i:s',strtotime($v['end_time']) + 8*3600);
                                    }
                                    // if($v['product']=='SB'){
                                    //     $data['validBetAmount']= abs(round($v['payout']-$v['bet'],2) * $rate);
                                    // }
                                    if($user->ml_money > 0 && $v['status']==1){
                                        Db::table('members')->where('name',$username)->decrement('ml_money',$data['betAmount']);
                                        // MemberMoneyLog::addLog( $user->id,-$data['validBetAmount'],$user->ml_money,1);
                                    }
                                    Db::table('game_record')->insert($data);
                                    $ids[] = $v['id'];
                                }elseif($user && $order ){
                                    $data['betAmount']=$v['bet'] * $rate;
                                    // $data['validBetAmount']=$v['bet'];
                                    
                                    $data['netAmount']=round($v['payout']-$v['bet'],2) * $rate;
                                    
                                    // if($v['product']=='SB'){
                                    //     $data['validBetAmount']=abs($data['netAmount']);
                                    // }else{
                                        $data['validBetAmount']=$v['bet'] * $rate;
                                    // }
                                    
                                    if($user->ml_money > 0 && $v['status']==1){
                                        Db::table('members')->where('name',$username)->decrement('ml_money',$data['betAmount']);
                                        // MemberMoneyLog::addLog( $user->id,-$data['validBetAmount'],$user->ml_money,1);
                                    }
                                    $data['settleTime'] = date('Y-m-d H:i:s',strtotime($v['end_time']) + 8*3600);
                                    $data['result']='';
                                    $data['fs_money'] = $v['bet'];
                                    $data['flag'] = $v['status'];
                                    $data['status'] = $v['status'];
                                    Db::table('game_record')->where('billNo',$v['ref_no'])->update($data);
                                    $ids[] = $v['id'];
                                }
                    }
                    $ticket = implode(',',$ids);
                    $sign = md5( $this->operatorcode. $this->signature);
                    $data = [
                        "operatorcode" => $this->operatorcode,
                        "ticket" => $ticket,
                        "signature" => strtoupper($sign)
                    ];
                    $result = $this->curl($this->LOG_URL . '/markbyjson.aspx',json_encode($data),1);
                    if($result['errCode']==0){
                        Db::table('system_config')->where('id',1)->increment('versionkey',1);
                    }
                }
                $sign = md5( $this->operatorcode2. $this->signature2);
                $data = [
                    "operatorcode" => $this->operatorcode2,
                    "versionkey" => $setting->versionkey,
                    "signature" => strtoupper($sign)
                ];
                $result = $this->curl($this->LOG_URL . '/fetchbykey.aspx',$data);
                // dump($result);die;
                if($result->errCode != 0){
                    return;
                }
                $list = json_decode($result->result,true);
                
                if($list){
                    $ids=[];
                    foreach ($list as $k=>$v){
                        
                        $data=[];
                                $username = $v['member'];
                                $houzhui = substr($username,-3);
                                $houzhui2 = substr($username,-4);
                                $rate = 1;
                                if($houzhui=='JK2' || $houzhui=='JK3' || $houzhui=='JK5' || $houzhui2=='JK10' || $houzhui2=='JK20'){
                                    if($houzhui=='JK2'){
                                        $rate = 2;
                                        $username = substr_replace($username,"",-3);
                                    }if($houzhui=='JK3'){
                                        $rate = 3;
                                        $username = substr_replace($username,"",-3);
                                    }elseif($houzhui=='JK5'){
                                        $rate = 5;
                                        $username = substr_replace($username,"",-3);
                                    }elseif($houzhui2=='JK10'){
                                        $rate = 10;
                                        $username = substr_replace($username,"",-4);
                                    }elseif($houzhui2=='JK20'){
                                        $rate = 20;
                                        $username = substr_replace($username,"",-4);
                                    }
                                }
                                $user = Db::table('members')->where('name',$username)->first();
                                $order = Db::table('game_record')->where('billNo',$v['ref_no'])->first();
                                if($user && !$order){
                                    
                                    
                                    $api_name = $v['site'];
                                    if($houzhui=='JK2' || $houzhui=='JK5' || $houzhui=='JK3'){
                                        $api_name = $houzhui;
                                    }elseif($houzhui2=='JK10' || $houzhui2=='JK20'){
                                        $api_name = $houzhui2;
                                    }
                                    // $api_name = $api_name.'_HK';
                                    $game = Db::table('api')->where('api_name',$api_name)->first();
                                    // Db::table('members')->where('name',$username)->increment('liushui',$v['bet']);
                                    // Db::table('members')->where('name',$username)->increment('liushui_total',$v['bet']);
                                    $data['billNo']=$v['ref_no'];
                                    $data['gameType']=$api_type[$v['product']];
                                    $data['api_type']=$api_type[$v['product']];
                                    $data['playerName']=$user->name;
                                    $data['name']=$user->name;
                                    $data['member_id']=$user->id;
                                    $data['gameCode']=0;
                                    $data['betAmount']=$v['bet'] * $rate;
                                    $data['xzhm']=$v['bet_detail'];
                                    $data['netAmount']=round($v['payout']-$v['bet'],2) * $rate;
                                    $data['isfs']=0;
                                    $data['flag']=$v['status'];
                                    $data['betTime']=date('Y-m-d H:i:s',strtotime($v['start_time']) + 8*3600);
                                    $data['result']='';
                                    $data['fs_money'] = $v['bet'] * $rate;
                                    $data['status'] = $v['status'];
                                    if($v['status'] == 1){
                                        $data['settleTime'] = date('Y-m-d H:i:s',strtotime($v['end_time']) + 8*3600);
                                    }
                                    $data['validBetAmount']=$v['bet'] * $rate;
                                    // if($v['product']=='SB'){
                                    //     $data['validBetAmount']= abs(round($v['payout']-$v['bet'],2) * $rate);
                                    // }
                                    if($user->ml_money > 0 && $v['status']==1){
                                        Db::table('members')->where('name',$username)->decrement('ml_money',$data['betAmount']);
                                        // MemberMoneyLog::addLog( $user->id,-$data['validBetAmount'],$user->ml_money,1);
                                    }
                                    
                                    Db::table('game_record')->insert($data);
                                    $ids[] = $v['id'];
                                }elseif($user && $order){
                                    $data['betAmount']=$v['bet'] * $rate;
                                    // $data['validBetAmount']=$v['bet'];
                                    $data['netAmount']=round($v['payout']-$v['bet'],2) * $rate;
                                    
                                    // if($v['product']=='SB'){
                                    //     $data['validBetAmount']=abs($data['netAmount']);
                                    // }else{
                                        $data['validBetAmount']=$v['bet'] * $rate;
                                    // }
                                    
                                    if($user->ml_money > 0 && $v['status']==1){
                                        Db::table('members')->where('name',$username)->decrement('ml_money',$data['betAmount']);
                                        // MemberMoneyLog::addLog( $user->id,-$data['validBetAmount'],$user->ml_money,1);
                                    }
                                    // $data['result']=json_encode($v);
                                    $data['result']='';
                                    $data['fs_money'] = $v['bet'];
                                    $data['flag'] = $v['status'];
                                    $data['status'] = $v['status'];
                                    $data['settleTime'] = date('Y-m-d H:i:s',strtotime($v['end_time']) + 8*3600);
                                    Db::table('game_record')->where('billNo',$v['ref_no'])->update($data);
                                    $ids[] = $v['id'];
                                }
                    }
                    $ticket = implode(',',$ids);
                    $sign = md5( $this->operatorcode2. $this->signature2);
                    $data = [
                        "operatorcode" => $this->operatorcode2,
                        "ticket" => $ticket,
                        "signature" => strtoupper($sign)
                    ];
                    $result = $this->curl($this->LOG_URL . '/markbyjson.aspx',json_encode($data),1);
                    if($result['errCode']==0){
                        Db::table('system_config')->where('id',1)->increment('versionkey',1);
                    }
                }
        //     }
        // }
        
        // return $result;
    }
    /**
     * @param $url 请求网址
     * @param bool $params 请求参数
     * @param int $ispost 请求方式
     * @param int $https https协议
     * @return bool|mixed
     */
    public function curl($url, $params = false, $ispost = 0, $https = 0)
    {
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($https) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }
        if ($ispost) {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-AjaxPro-Method:ShowList',
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($params))
            );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            $data = curl_exec($ch);
            curl_close($ch);
            return json_decode($data,true);
        } else {
            if ($params) {
                if (is_array($params)) {
                    $params = http_build_query($params);
                }
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
                // echo $url . '?' . $params.'<br/>';
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        $response = json_decode($response);
        
        return $response;
    }

}
