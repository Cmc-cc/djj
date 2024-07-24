<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
use Illuminate\Support\Facades\Log;
use DB;

class LEYUService{
    public $pre;   // 玩家前缀
    public  $domain;
    public  $comId;
    public $comKey;
    public $gamePlatform;
    public $debug;
    public $salt ;
    public $betLimitCode;
    public $currencyCode;
    public $isspeed;
    public $isdemo;
    public $api_code;

    public function __construct()
    {
        $setting = Db::table('system_config')->first();
        // $mod = Api::where('api_name', 'SELF')->first();
        $this->pre =$setting->leyu_pre_1;//"ng8h";// 玩家前缀
        $this->domain =$setting->leyu_domain;// "http://gsmd.336699bet.com";
        $this->api_key =$setting->leyu_api_key;// "ad316973edc620d198d57a1a6d6bb67d";
        $this->pre2 =$setting->leyu_pre_2; //"ng8c";// 玩家前缀
        $this->api_key2 = $setting->leyu_api_key2;//"049a3011522c2d198e6c7321270eaa10";
        
        
        
        
        $mod = Api::where('api_name', 'SELF')->first();
        $this->ly_pre = $mod->prefix;// 玩家前缀
        $this->ly_domain = $mod->api_domain;
        $this->ly_api_id = $mod->api_id;
        $this->ly_api_key = $mod->api_key;
        
    }


    public function register($api_code, $username,$password){
        // $api = Db::table('api')->where('api_name',$api_code)->first();
    //     if(@$api->qy == 0){
    //         $post_data = [
    //             'account' =>$this->ly_api_id,
    //             'api_key' =>$this->ly_api_key,			
    //             'api_code' =>$api_code,
    //             'username' => $username,
    // 			'password' => $password,			
    //         ];
    //         if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
    //             $url = $this->ly_domain.'/ley/register';
    //         }else{
    //             $url = 'http://'.$this->ly_domain.'/ley/register';
    //         }
    //         $receive = $this->send_post($url,$post_data);
    //         return $receive;
    //     }else{
    //         $api_code = $api->old_name;
    //     }



        $this->shanghu($api_code,'');
   

        $sign = md5($this->pre . $username . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "username" => $username,
            "signature" => strtoupper($sign)
        ];
        $result = $this->curl($this->domain . '/createMember.aspx',$data);
        
        return $result;
    }

    /**
     * @param $api_code 平台类型
     * @param $username 用户名
     * @param $password
     * @param $gameType 游戏代码
     * @param string $gameName
     * @param int $is_Mobile
     * @param string $gameId
     * @return int|string
     */
    public function login($api_code,$username,$password,$gameType,$gameName ,$is_Mobile = 1,$lott_type='',$demo='',$wallet_type=2){
        // $api = Db::table('api')->where('api_name',$api_code)->first();
        
        // if($api->on_line != 0){
        //     exit('遊戲維護中');
        // }
    //     if(@$api->qy == 0){
    //         $post_data = [
    //             'account' =>$this->ly_api_id,
    //             'api_key' =>$this->ly_api_key,			
    //             'api_code' =>$api_code,
    //             'username' => $username,
    // 			'gameType' => $gameType,
    // 			'gameCode' => $gameName,
    // 			'isMobile' => $is_Mobile,
    //         ];
    
    //         if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
    //             $url = $this->ly_domain.'/ley/login';
    //         }else{
    //             $url = 'http://'.$this->ly_domain.'/ley/login';
    //         }
    
    //         $receive = $this->send_post($url,$post_data);
    //         return $receive;
    //     }else{
            if(!$gameType || is_numeric($gameType)){
                $api = Api::where('api_name', $api_code)->first();
                $gameType = $api->game_type;
            }
            // $api_code = $api->old_name;
        // }
        $this->shanghu($api_code,$username);
        $password = "Qwe123aq";
        $lang = "zh-CN";
        
        
        $html5 = is_Mobile() == 1?1:0;
        $sign = md5( $this->pre . $password . $api_code . $gameType  . $username . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "providercode" => $api_code,
            "lang"=>$lang,
            "username" => $username,
            "password" => $password,
            "html5"=>$html5,
            "type" => $gameType,
            "signature" => strtoupper($sign)
        ];
        if($api_code == 'P3'){
            $data['game_id'] = '1_0';
        }
        
        // dump($this->domain . '/launchGames.aspx');
        // dump($data);
        $result = $this->curl($this->domain . '/launchGames.aspx',$data);
        $url = $this->domain . '/launchGames.aspx';
        foreach ($data as $k=>$v){
            if($k=='operatorcode'){
                $url .= '?'.$k.'='.$v;
            }else{
                $url .= '&'.$k.'='.$v;
            }
        }
        // dump($data);
        // dump($url);
        // dump($result);die;
        return $result;
    }



    /*
     * 额度转换
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function deposit($api_code,$username,$password,$amount,$type = 1,$orderno=''){
        // $api = Db::table('api')->where('api_name',$api_code)->first();
        // if($api->on_line != 0){
        //     exit('遊戲維護中');
        // }
    //     if(@$api->qy == 0){
    //         $amount = intval($amount);
    //         // $transferno = date("YmdHms").rand(000000,999999);//交易编号
    //         $post_data = [
    //             'account' =>$this->ly_api_id,
    //             'api_key' =>$this->ly_api_key,			
    //             'api_code' =>$api_code,
    //             'username' => $username,
    // 			'amount' => $amount,
    // 			'transferno' => $orderno,
    //         ];
    
    //         if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
    //             $url = $this->ly_domain.'/ley/deposit';
    //         }else{
    //             $url = 'http://'.$this->ly_domain.'/ley/deposit';
    //         }
    
    //         $receive = $this->send_post($url,$post_data);
    //         return $receive;
    //     }else{
    //         $api_code = $api->old_name;
    //     }
        
        $this->shanghu($api_code,$username);
        $amount = intval($amount);
        // $transferno = date("YmdHms").rand(000000,999999);//交易编号
        $password = "Qwe123aq";
        if($type==1){
            $type = 0;
        }else{
            $type = 1;
        }
        $sign = md5($amount . $this->pre . $password . $api_code . $orderno . $type . $username . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "providercode" => $api_code,
            "username" => $username,
            "password" => $password,
            "referenceid" => $orderno,
            "type" => $type,
            "amount" => $amount,
            "signature" => strtoupper($sign)
        ];
            
        $result = $this->curl($this->domain . '/makeTransfer.aspx',$data);
        
        return $result;

    }


    /*
     * 额度转换
     * 取款 http://<domain>/api/ag/deposit.ashx
     */
    public function withdrawal($api_code,$username,$password,$amount,$type = 1,$orderno){
        
        // $api = Db::table('api')->where('api_name',$api_code)->first();
        // if($api->on_line==1){
        //     exit('遊戲維護中');
        // }
    //     if(@$api->qy == 0){
    //         // $transferno = date("YmdHms").rand(000000,999999);//交易编号
    //         $post_data = [
    //              'account' =>$this->ly_api_id,
    //              'api_key' =>$this->ly_api_key,			
    //              'api_code' =>$api_code,
    //              'username' => $username,
    // 			'amount' => intval($amount),
    // 			'transferno' => $orderno,
    //         ];
    //         if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
    //             $url = $this->ly_domain.'/ley/withdrawal';
    //         }else{
    //             $url = 'http://'.$this->ly_domain.'/ley/withdrawal';
    //         }
            
    //         $receive = $this->send_post($url,$post_data);
    //         return $receive;
    //     }else{
    //         $api_code = $api->old_name;
    //     }
   
        $this->shanghu($api_code,$username);
        $amount = intval($amount);
        // $transferno = date("YmdHms").rand(000000,999999);//交易编号
   
        if($type==1){
            $type = 0;
        }else{
            $type = 1;
        }
        $sign = md5($amount . $this->pre . $password . $api_code . $orderno . $type . $username . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "providercode" => $api_code,
            "username" => $username,
            "password" => $password,
            "referenceid" => $orderno,
            "type" => $type,
            "amount" => $amount,
            "signature" => strtoupper($sign)
        ];
        $result = $this->curl($this->domain . '/makeTransfer.aspx',$data);
        // dump($result);die;
        
        
        return $result;

    }	
	
	
    /*
     * 额度转换
     * 存款 http://<domain>/api/ag/deposit.ashx
     */
    public function transfer($api_code,$username,$password,$amount,$type = 1){

        $plat_type = strtolower($api_code);
        $transSN = date("YmdHms").mt_rand(100,999);//交易编号
        $code = md5($this->api_key.$this->api_id.$username.$plat_type.$amount.$transSN);
        $post_data = array(
            'username' => $username,
            'sign_key' => $this->api_key,
            'plat_type' => $plat_type,
            'money' => $amount,
            'client_transfer_id' => $transSN,
            'code' => $code,
            'wallet_type'=>1
        );

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/trans';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/trans';
        }

        $receive = $this->send_post($url,$post_data);
        //dd($receive);
        return $receive;
        /*$transSN = date("YmdHms").mt_rand(100,999);//交易编号
        $post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'username' => $username,
            'password'=>$password,
            'amount' => $amount,
            'type' => $type,
            'billno' => $transSN,
            'method'=>'transfer');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;*/
    }

    /**
     * 中心钱包
     * @param $username
     * @param $money
     * @return int|string
     */
    public function trans($username,$money)
    {
        $debugInfo = debug_backtrace();
        Log::info('用户名:'.$username.'金额:'.$money.'文件:'.$debugInfo[0]['file'].'行数:'.$debugInfo[0]['line'].'方法:'.$debugInfo[0]['function']);
        $client_transfer_id = date("YmdHms").mt_rand(100,999);//交易编号
        $code = md5($this->api_key.$this->api_id.$username.$money.$client_transfer_id);
        $post_data = [
            'username'=> $username,
            'sign_key' => $this->api_key,
            'money' => $money,
            'client_transfer_id' => $client_transfer_id,
            'code' => $code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/wallet/trans';
        }else{
            $url = 'http://'.$this->domain.'/v1/wallet/trans';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    public function trans_all($username)
    {
        $code = md5($this->api_key.$this->api_id.$username);
        $post_data = [
            'username'=> $username,
            'sign_key' => $this->api_key,
            'code' => $code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/trans-all';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/trans-all';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    /**
     * 会员查询中心钱包余额
     * @param $username
     * @return int|string
     */
    public function wallet_balance($username)
    {

        $code = md5($this->api_key.$this->api_id.$username);
        $post_data = [
            'username'=> $username,
            'sign_key' => $this->api_key,
            'code' => $code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/wallet/balance';
        }else{
            $url = 'http://'.$this->domain.'/v1/wallet/balance';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    /*
     * 会员获取游戏频台余额
     */
    public function balance($api_code,$username,$password){
        // $api = Db::table('api')->where('api_name',$api_code)->first();
        // if(@$api->qy == 0){
        //     $post_data = [
        //         'account' =>$this->ly_api_id,
        //         'api_key' =>$this->ly_api_key,			
        //         'api_code' =>$api_code,
        //         'username' => $username,
        //     ];
        //     if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
        //         $url = $this->ly_domain.'/ley/balance';
        //     }else{
        //         $url = 'http://'.$this->ly_domain.'/ley/balance';
        //     }
        //     $receive = $this->send_post($url,$post_data);
        //     // dump($receive);die;
        //     return $receive;
        // }else{
        //     $api_code = $api->old_name;
        // }
        
        
        
        $this->shanghu($api_code,$username);
        $password = "Qwe123aq";
        $sign = md5($this->pre . $password .$api_code  . $username . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "providercode" => $api_code,
            "username" => $username,
            "password"=> $password,
            "signature" => strtoupper($sign)
        ];
        // dump($data);
        $result = $this->curl($this->domain . '/getBalance.aspx',$data);
        // dump($result);die;
        return $result;
    }
    /*
         * 会员获取游戏频台余额
         */
    public function balance_all($username){

        /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'username' => $username,
            'password'=>$password,
            'betLimitCode'=>$this->betLimitCode,
            'currencyCode'=>$this->currencyCode,
            'isSpeed'=>$this->isspeed,
            'isDemo'=>$this->isdemo,
            'method'=>'balance'
        );*/

        $code = md5($this->api_key.$this->api_id.$username);
        $post_data = [
            'username'=>$username,
            'sign_key' => $this->api_key,
            'code' => $code
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/all-balance';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/all-balance';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
     *新游戏记录api
     *获取全部游戏
    * 游戏记录 http://<domain>/api/ag/betrecord.ashx
    */
    public function betrecord($startDate,$endDate,$page,$limit){

        $post_data = [
            'account' =>$this->ly_api_id,
            'api_key' =>$this->ly_api_key,			
            'page' =>$page,
            'pageSize' => $limit,
			'start_at' => $startDate,
			'end_at' => $endDate,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
            $url = $this->ly_domain.'/ley/gamerecord';
        }else{
            $url = 'http://'.$this->ly_domain.'/ley/gamerecord';
        }

        $receive = $this->send_post($url,$post_data);
		
        return $receive;
    }


    public function betrecordbu($order){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'order' =>$order,
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/gamerecordbu';
        }else{
            $url = 'http://'.$this->domain.'/ley/gamerecordbu';
        }

        $receive = $this->send_post($url,$post_data);

        return $receive;
    }
	
    public function record($startTime,$endTime,$page=1,$limit=15,$username = '',$platformCode,$game_type_game){
        $url=$this->domain."/v1/user/record";
        $code = md5($this->ly_api_key.$this->ly_api_id.$platformCode.$startTime.$endTime);
        $data = [
            "plat_type"=>$platformCode,
            "page"=>$page,
            "limit"=>$limit,
            "startTime"=>$startTime,
            "endTime"=>$endTime,
            "username"=>$username,
            "game_type"=>$game_type_game,
            "sign_key"=>$this->ly_api_key,
            "code"=>$code
        ];

        $res = $this->send_post($url, $data);
        return $res;
    }
    public function game_list()
    {
        $post_data = array('api_id'=>$this->api_id,'api_key'=>$this->api_key,'api_code' => 'tcg','method'=>'gamelist');

        $receive = $this->send_post('http://'.$this->domain,$post_data);
        return $receive;
    }

    /*
    * 商户余额查询
    */
    public function credit($api_code){
        
        $api = Db::table('api')->where('api_name',$api_code)->first();
        // if(@$api->qy == 0){
        //     $post_data = [
        //         'account' =>$this->ly_api_id,
        //         'api_key' =>$this->ly_api_key,			
        //         'api_code' =>$api_code,
        //     ];
        //     if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
        //         $url = $this->ly_domain.'/ley/credit';
        //     }else{
        //         $url = 'http://'.$this->ly_domain.'/ley/credit';
        //     }
        //     $receive = $this->send_post($url,$post_data);
        //     return $receive;
        // }else{
        //     $api_code = $api->old_name;
        // }
        
        
        
        $this->shanghu($api_code);
        $sign = md5($this->pre . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            // "providercode" => $api_code,
            // "username" => $username,
            // "password"=> $password,
            "signature" => strtoupper($sign)
        ];
        // dump($data);die;
        $result = $this->curl($this->domain . '/checkAgentCredit.aspx',$data);
        // dump($result);die;
        return $result;
    }
    /*
    * 商户余额查询总额度
    */
    public function credit_all(){
      
       /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'method'=>'credit'
        );*/
        $code  = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/all-credit';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/all-credit';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
      
      
        /*$post_data = array(
            'api_id'=>$this->api_id,
            'api_key'=>$this->api_key,
            'api_code' => $api_code,
            'method'=>'credit'
        );*/
        $code  = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];

        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/all-credit';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/all-credit';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
	
    protected function send_post($url,$data = null)
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
 
        return $output;
    }	
	
	
    protected function send_posts($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

    protected function salt($length)
    {
        $key="";
        $pattern='1234567890abcdefghijklmnopqrstuvwxyz';
        for($i=0;$i<$length;$i++)
        {
            $key .= $pattern{mt_rand(0,35)};
        }
        return $key;
    }
    public function get_demo_url()
    {
        $code = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/very/gameurl';
        }else{
            $url = 'http://'.$this->domain.'/v1/very/gameurl';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }
    public function get_online_url()
    {
        $code = md5($this->api_key.$this->api_id);
        $post_data = [
            'sign_key' => $this->api_key,
            'code' =>$code
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/v1/user/getadminurl';
        }else{
            $url = 'http://'.$this->domain.'/v1/user/getadminurl';
        }
        $receive = $this->send_post($url,$post_data);
        return $receive;
    }

    /*
    * 获取游戏列表
    */
    public function gamelist($api_code){

        $post_data = [
            'account' =>$this->api_id,
            'api_key' =>$this->api_key,			
            'api_code' =>$api_code,
        ];
        if(preg_match('/^http(s)?:\\/\\/.+/',$this->domain)){
            $url = $this->domain.'/ley/gamelist';
        }else{
            $url = 'http://'.$this->domain.'/ley/gamelist';
        }
        $receive = $this->send_post($url,$post_data);

        return $receive;
    }
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
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
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
        // echo $url;die;
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        $response = json_decode($response);
        $errCode = $response->errCode;
        $msg = 'success';
        switch ($errCode){
            case '61':
                $msg = '货币不兼容';
                break;
            case '70':
                $msg = '集成系统余额不足';
                break;
            case '71':
                $msg = '单据号不正确';
                break;
            case '72':
                $msg = '余额不足';
                break;
            case '73':
                $msg = '转账金额不正确';
                break;
            case '81':
                $msg = '会员账号不存在';
                break;
            case '82':
                $msg = '会员账号已存在';
                break;
            case '83':
                $msg = '代理号已存在';
                break;
            case '90':
                $msg = '请求参数不正确';
                break;
            case '91':
                $msg = '代理号不正确';
                break;
            case '92':
                $msg = '供应商代号不正确';
                break;
            case '93':
                $msg = '请求参数类型不正确';
                break;
            case '94':
                $msg = '账号不正确';
                break;
            case '95':
                $msg = '密码不正确';
                break;
            case '96':
                $msg = '旧密码不正确';
                break;
            case '97':
                $msg = '请求链接/域名不正确';
                break;
            case '98':
                $msg = '账号/密码错误';
                break;
            case '99':
                $msg = '加密错误';
                break;
            case '600':
                $msg = '前期检验失败。 存款/取款 操作已被无视';
                break;
            case '601':
                $msg = '此产品的存款 功能暂时停用维修';
                break;
            case '602':
                $msg = '此产品的取款 功能暂时停用维修';
                break;
            case '603':
                $msg = '即将执行在线系统维护，为了避免维护时导致的系统不稳定，转账API暂时停止（暂停时间大约5～10分钟，若提早完毕会提早解放）';
                break;
            case '992':
                $msg = '平台不兼容请求的游戏类型';
                break;
            case '991':
                $msg = '代理号已冻结';
                break;
            case '994':
                $msg = '接口访问被禁止';
                break;
            case '995':
                $msg = '平台未开通';
                break;
            case '996':
                $msg = '平台不支持';
                break;
            case '998':
                $msg = '请联系客服';
                break;
            case '999':
                $msg = '系统维护中';
                break;
            case '9999':
                $msg = '未知错误';
                break;
            case '-987':
                $msg = '交易单号不存在；产品不支持';
                break;
            case '-997':
                $msg = '系统错误，请联络客服。';
                break;
            case '-998':
                $msg = '集成系统接口余额不足';
                break;
            case '-999':
                $msg = '接口错误';
                break;
        }
        if($errCode == 0){
            $arr = $response;
            unset($response->errCode);
            unset($response->errMsg);
            $return = [
                'Code' => $errCode,
                'Message' => $msg,
                'url' => '',
                'Data' => $arr,
            ];
        }
        else{
            $return = [
                'Code' => $errCode,
                'Message' => $msg . $response->errMsg,
                'url' => '',
                'Data' => '',
            ];
        }
        return json_encode($return);
    }
    public function shanghu($code,$username=''){
        
        $arr = ['PG','E2','TH','LG','KY'];
        if(in_array($code,$arr)){
            $this->pre = $this->pre2;// 玩家前缀
            $this->api_key = $this->api_key2;
        }else{
            $setting = Db::table('system_config')->first();
            $this->pre =$setting->leyu_pre_1;//"ng8h";// 玩家前缀
            $this->api_key =$setting->leyu_api_key;
        }
        if($username){
            //注册
            $this->register($code, $username,'Qwe123aq');
        }
        
    }
    public function username($api_code,$username){
        $this->shanghu($api_code);
        $sign = md5($this->pre . $api_code.$username. $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "providercode" => $api_code,
            "username" => $username,
            // "password"=> $password,
            "signature" => strtoupper($sign)
        ];
        // dump($data);die;
        $result = $this->curl($this->domain . '/checkMemberProductUsername.aspx',$data);
        return $result;
    }
    public function testlogin($api_code,$username,$gameType='',$gameName='',$is_Mobile=1){
        $api = Db::table('api')->where('api_name',$api_code)->first();
        
    //     if(@$api->qy == 0){
    //         $post_data = [
    //             'account' =>$this->ly_api_id,
    //             'api_key' =>$this->ly_api_key,			
    //             'api_code' =>$api_code,
    //             'username' => $username,
    // 			'gameType' => $gameType,
    // 			'gameCode' => $gameName,
    // 			'isMobile' => $is_Mobile,
    //         ];
    
    //         if(preg_match('/^http(s)?:\\/\\/.+/',$this->ly_domain)){
    //             $url = $this->ly_domain.'/ley/login';
    //         }else{
    //             $url = 'http://'.$this->ly_domain.'/ley/login';
    //         }
    //         $receive = $this->send_post($url,$post_data);
    //         echo '<pre/>';
    //         print_r(json_decode($receive,true));die;
    //     }else{
            if(!$gameType || is_numeric($gameType)){
                $api = Api::where('api_name', $api_code)->first();
                $gameType = $api->game_type;
            }
            // $api_code = $api->old_name;
        // }
        $this->shanghu($api_code,$username);
        $password = "Qwe123aq";
        $lang = "zh-CN";
        $html5 = is_Mobile() == 1?1:0;
        $sign = md5( $this->pre . $password . $api_code . $gameType  . $username . $this->api_key);
        $data = [
            "operatorcode" => $this->pre,
            "providercode" => $api_code,
            "lang"=>$lang,
            "username" => $username,
            "password" => $password,
            "html5"=>$html5,
            "type" => $gameType,
            "signature" => strtoupper($sign)
        ];
        if($api_code == 'P3'){
            $data['game_id'] = '1_0';
        }
        // $url = $this->domain . '/launchGames.aspx';
        // foreach ($data as $k=>$v){
        //     if($k=='operatorcode'){
        //         $url .= '?'.$k.'='.$v;
        //     }else{
        //         $url .= '&'.$k.'='.$v;
        //     }
        // }
        // echo $url;
        $result = $this->curl($this->domain . '/launchGames.aspx',$data);
        echo '<pre/>';
        print_r(json_decode($result,true));die;
    }
	
}