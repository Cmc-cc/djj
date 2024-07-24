<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
use App\Services\DesService;
use App\Models\Member;
use App\Models\Transfer;
use Auth;
use App\Models\SystemConfig;
use DB;
class WgService{

    protected $url;
    protected $token;
    protected $desKey;
    protected $signKey;
    protected $platformCode;
    protected $encode_url;
    protected $password;

    public function __construct()
    {
        $mod = Api::where('api_name', 'SELF')->first();
		$this->url = $mod->api_domain;
        $this->token = $mod->api_token;
        $this->desKey = $mod->api_id;
        $this->signKey = $mod->api_key;
        $this->platformCode = $mod->api_name;
        $this->password = $mod->api_password;
        $this->encode_url= $mod->api_username;
		$this->sys = SystemConfig::findOrfail(1);

    }

    public function register($platformCode, $username)
    {
		$TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$platformCode.$username.$this->password.$TimeSapn.$this->signKey));
        $data = [
            'Token' => $this->token,
            'GameCode' => $platformCode,
			'PlayerName'=>$username,
			'PlayerPassword'=>$this->password,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign
        ];

		$url = 'http://'.$this->url.'/Api/Register';
        $res = $this->post_jsondata($url,json_encode($data));
		$res_arr =json_decode($res,1);
		if($res_arr['StatusCdoe']===1){
			$res_arr['retCode']=0;
			
		}else{
			$res_arr['retCode']=$res_arr['StatusCdoe'];
		}
        return json_encode($res_arr);
    }
	
	
	
	function create_uuid($prefix = ""){    //可以指定前缀
		$str = md5(uniqid(mt_rand(), true));   
		$uuid  = 'B'.substr($str,0,10) . 'AA';   
		$uuid .= substr($str,10,3) . 'F';   
		$uuid .= substr($str,13,5) . 'FF';   
		$uuid .= substr($str,18,2) . 'F';   
		$uuid .= substr($str,20,5);   
		return $prefix . $uuid;
	}
	public function mz_zzmoney($username,$type,$money,$orderNo)
    {
	    $TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$username.$this->password.$TimeSapn.$money.$orderNo.$type.$this->signKey));

        $data = [
            'Token' => $this->token,
            //'GameCode' => $game,
			'PlayerName'=>$username,
			'PlayerPassword'=>$this->password,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign,
			'TranType'=>$type,
			'Money'=>$money,
			'OrderNo'=>$orderNo
        ];

		$url = 'http://'.$this->url.'/Api/TransferWallet';
        $res = $this->post_jsondata($url,json_encode($data));
		$res_arr=json_decode($res,1);
		if($res_arr['StatusCdoe']===1){
			return true;
			//$res_arr['retMsg']=$res_arr['Balance'];
		}else{
			return false;

		}
		return false;
    }
    public function zzmoney($game,$username,$type,$money,$orderNo='')
    {
		$orderNo=$this->create_uuid();
		if($this->sys->mz_open){
			$res=$this->mz_zzmoney($username,$type,$money,$orderNo);
			$res_arr=array();
			if($res){
				$res_arr['retCode']=0;
				$res1=$this->mz_balances($username);
				$res1_arr=json_decode($res1,1);
				if(!$res1_arr['retCode']){
					$res_arr['retMsg']=$res1_arr['retMsg'];
				}else{
					$res_arr['retMsg']="0.00";
				}
				
			}else{
				$res_arr['retCode']=1;

			}
		}else{
			$TimeSapn=date('YmdHis');
			$Sign=strtoupper(md5($this->token.$game.$username.$this->password.$TimeSapn.$money.$orderNo.$type.$this->signKey));

			$data = [
				'Token' => $this->token,
				'GameCode' => $game,
				'PlayerName'=>$username,
				'PlayerPassword'=>$this->password,
				'TimeSapn'=>$TimeSapn,
				'Sign'=>$Sign,
				'TranType'=>$type,
				'Money'=>$money,
				'OrderNo'=>$this->create_uuid()
			];

			$url = 'http://'.$this->url.'/Api/Transfer';
			$res = $this->post_jsondata($url,json_encode($data));

			$res_arr=json_decode($res,1);
			
			if($res_arr['StatusCdoe']===1){
				$res_arr['retCode']=0;
				$res_arr['retMsg']=$res_arr['Balance'];
			}else{
				$res_arr['retCode']=1;

			}
		}
		return json_encode($res_arr);
    }
    //查询免转余额
    public function mz_balances($username)
    {
       
		$TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$username.$this->password.$TimeSapn.$this->signKey));
        $data = [
            'Token' => $this->token,
			'PlayerName'=>$username,
			'PlayerPassword'=>$this->password,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign,
        ];
		$url = 'http://'.$this->url.'/Api/QueryWalletBalance';
        $res = $this->post_jsondata($url,json_encode($data));
		$res_arr=json_decode($res,1);
		
		if($res_arr['StatusCdoe']===1){
			$res_arr['retCode']=0;
			$res_arr['retMsg']=$res_arr['Balance'];
		}else{
			$res_arr['retCode']=1;

		}
		return json_encode($res_arr);
    }
    //查询余额
    public function balances($game,$username)
    {
       
		$TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$game.$username.$this->password.$TimeSapn.$this->signKey));
        $data = [
            'Token' => $this->token,
            'GameCode' => $game,
			'PlayerName'=>$username,
			'PlayerPassword'=>$this->password,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign,
        ];
		$url = 'http://'.$this->url.'/Api/QueryBalance';
        $res = $this->post_jsondata($url,json_encode($data));
		$res_arr=json_decode($res,1);
		if($res_arr['StatusCdoe']===1){
			$res_arr['retCode']=0;
			$res_arr['retMsg']=$res_arr['Balance'];
		}else{
			$res_arr['retCode']=1;

		}
		return json_encode($res_arr);
    }

    //登录
    public function loginbi($game,$username,$gametype=null,$devices=null,$gameId = null, $gameName = null,$Additional=null)
    {
		if($this->sys->mz_open){
			//查询余额
			$member = auth('member')->user();
			if(intval($member->money)>0){
				$orderNo=$this->create_uuid();
				$mz_res=$this->mz_zzmoney($username,'IN',intval($member->money),$orderNo);
				if($mz_res){
					try{
						DB::transaction(function() use($member,$orderNo,$mz_res) {
							//平台账户
							//$member_api->increment('money', $amount);
							//个人账户
							//$member->decrement($amount_type , $amount);
							//额度转换记录
							Transfer::create([
								'bill_no' => $orderNo,
								'api_type' => 320,
								'member_id' => $member->id,
								'transfer_type' => 0,
								'money' => intval($member->money),
								'transfer_in_account' => 'WG免转账户',
								'transfer_out_account' => '中心账户',
								'result' => json_encode($mz_res)
							]);
							//修改api账号余额
							$member->decrement('money' , intval($member->money));
						});
					}catch(\Exception $e){
						DB::rollback();
						//退回用户
						$member->increment('money' , intval($member->money));
					}
					
				}
			}
		}
	   	$TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$game.$username.$this->password.$TimeSapn.$this->signKey));
        $data = [
            'Token' => $this->token,
            'GameCode' => $game,
			'PlayerName'=>$username,
			'PlayerPassword'=>$this->password,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign,
			'GameName'=>$gameName,
			'UserIP'=>$_SERVER['REMOTE_ADDR'],
			'DeviceType'=>$devices,
			'Additional'=>$Additional
        ];
    
		$url = 'http://'.$this->url.'/Api/Login';
        $res = $this->post_jsondata($url,json_encode($data));
		$res_arr=json_decode($res,1);
		if($res_arr['StatusCdoe']===1){
			return $res_arr['PayUrl'];
		}else{
			return $res;
		}
		
    }

    public function playGame($platformCode, $username, $GameType = null)
    {
        $t=time();
        $str = 'platformCode='.$platformCode.'&userName='.$username.'&userPassWord='.$this->password.'&TimeStamp='.$t.'&GameType='.$GameType;
        $data = [
            'str' => $str,
            'key' => $this->desKey
        ];

        $pp = $this->send_post($this->encode_url, $data);

        $url='http://'.$this->url.'/Api/PlayGame?parameter='.$pp.'&WebSiteCode='.$this->signKey;

        return $url;

    }

   //下注记录
    public function GetMerchantReport($platformCode, $StartTime, $EndTime, $PageIndex, $PageSize, $TimeStamp) {
		
		$TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$platformCode.$TimeSapn.$this->signKey));
        
        $data = [
            'Token' => $this->token,
            'GameCode' => $platformCode,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign,
			'StartTime'=>date('Y-m-d H:i:s',$StartTime),
			'EndTime'=>date('Y-m-d H:i:s',$EndTime),
			'PageIndex'=>$PageIndex,
			'PageSize'=>$PageSize
        ];
		
		
		$url = 'http://'.$this->url.'/Api/BetRecord'; 

        $res = $this->post_jsondata($url,json_encode($data),$platformCode);
	
		return $res;

    }

    // 商户余额
    public function BusinessBalance($game='AG'){
		

		$TimeSapn=date('YmdHis');
		$Sign=strtoupper(md5($this->token.$game.$TimeSapn.$this->signKey));

        $data = [
            'Token' => $this->token,
            'GameCode' => $game,
			'TimeSapn'=>$TimeSapn,
			'Sign'=>$Sign,
        ];
		$url = 'http://'.$this->url.'/Api/MerchantBlance';
        $res = $this->post_jsondata($url,json_encode($data));
		$res_arr=json_decode($res,1);
		//print_r($res_arr);exit;
		if($res_arr['StatusCdoe']===1){
			$res_arr['retCode']=0;
			$res_arr['retMsg']=$res_arr['Balance'];
		}else{
			$res_arr['retCode']=$res_arr['StatusCdoe'];

		}
		return json_encode($res_arr);
		
	
    }


    public function https_request($url,$data = null)
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
        //$output=json_decode($output,true);
        return $output;
    }

    //判断是否手机
    function isMobile()
    {
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        if (isset ($_SERVER['HTTP_VIA']))
        {
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }

 /*protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }*/


	/* protected function send_post($url,$post_data) {
        $result = (new DesService())->encode($post_data['str'],$post_data['key']);
		return $result;
    }
   */
	
	protected function send_post($url,$data) {
			 header("Content-type: text/html; charset=utf-8");
			 $str_check=$data['str']."&key=".$data['key'];
			 $url2=$url."/apiin/?".$str_check;
			 $result= $this->https_request($url2);
			 return $result;
			
	 }


    protected function post_jsondata($url, $data_string) {  
       //file_put_contents('wg_log.txt', date('Y-m-d H:i:s').'URL:'.$url.PHP_EOL, FILE_APPEND);
		//file_put_contents('wg_log.txt', date('Y-m-d H:i:s').'data_string:'.$data_string.PHP_EOL, FILE_APPEND);
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
            'Content-Type: application/json; charset=utf-8',  
            'Content-Length: ' . strlen($data_string))  
        );  
        ob_start();  
        curl_exec($ch);  
        $return_content = ob_get_contents();  

        ob_end_clean();  
  
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
  
	    return  $return_content;
    }  








}