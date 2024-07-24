<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Api\ApiClientController;
use App\Http\Controllers\Member\PtController;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\ActivityApply;
use App\Models\Api;
use App\Models\BankCard;
use App\Models\Banners;
use App\Models\BlackListIp;
use App\Models\DailiMoneyLog;
use App\Models\Dividend;
use App\Models\Drawing;
use App\Models\GameList;
use App\Models\GameRecord;
use App\Models\Member;
use App\Models\MemberMessage;
use App\Models\MemberDailiApply;
use App\Models\MemberLoginLog;
use App\Models\Recharge;
use App\Models\Red;
use App\Models\SystemConfig;
use App\Models\SystemNotice;
use App\Models\TcgGameList;
use App\Models\Template;
use App\Models\Transfer;
use App\Services\SelfService;
use App\Services\WgService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;
use Auth;
use Hash;
use App\Models\Activity;
use Illuminate\Support\Facades\Cache;
use Session;
use DB;
use App\Models\FsLevel;

class IndexController extends WebBaseController
{
    use ValidationTrait;
    public $sys;
    public function __construct()
    {
        $this->sys = SystemConfig::findOrfail(1);
    }
    public function msgcode(Request $request){
        $member = $this->getMember();
        $phone = $request->get('phone');
        if(!$member->phone && !$phone){
            return responseWrong(trans("lang.qxbdsj"));
        }
        if($member->phone){
            $phone = $member->phone;
        }
        //最近一条短信
        $msg = Db::table('sms')->where('phone',$phone)->orderBy('time','desc')->first();
        if(@$msg && @$msg->time >= time()-120){
            // return responseWrong('2分钟内只可发送一条');
        }
        $total = Db::table('sms')->where('phone',$phone)->where('time','>',strtotime(date('Y-m-d')))->count();
        if($total >= 10){
            // return responseWrong('超过每日短信次数，请明日再试！');
        }
        // $ip = Db::table('members')->where('register_ip',$request->getClientIp())->first();
        // if($ip){
        //     return responseWrong('系统错误，发送失败');
        // }
        $code = rand(1000,9999);
        Db::table('sms')->insert([
            'member_id'=>$member->id,
            'code'=>$code,
            'status'=>0,
            'phone'=>$phone,
            'time'=>time()
        ]);
        $phone = '852'.$phone;
        $url = 'http://api.sms.cn/sms/?ac=sendint&uid=qq6562655&pwd=66d8e3cf0b66f5562eda07c28e4aa93e&template=6000002&mobile='.$phone.'&content={"code":"'.$code.'"}';
        $res = file_get_contents($url);
        // dump($res);die;
        return responseSuccess('',trans("lang.fscg"),$phone);
    }
    public function getPath($request)
    {
        $preview = $request->get('preview');
        if($request->has('preview')){
            $data = Template::where('id',$preview)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }else{
            $data = Template::where('status',2)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }
        return $mb_path;
    }
     public function usdt(){
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        $xiaoshu = rand(10,40);
        $view = 'wap.template.theme10.usdt';
        return view($view, compact('setting','xiaoshu','member'));
    }
    //首页
    public function index(Request $request)
    {
        $system_notices = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        
        $system_notices2 = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->first();
        
        $banners = Banners::where('type', 2)->orderBy('sort','asc')->get();
    
        $api_list = Api::where('on_line', '<>','1')->orderBy('created_at', 'desc')->get();
        $setting = Db::table('system_config')->first();
        $gonggao = $setting->is_alert_on;

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.index';
        }else{
            $view = 'wap.template.'.$mb_path.'.index';
        }
       
        return view($view, compact('system_notices', 'banners','system_notices2','api_list','setting','gonggao'));
    }
    //首页
    public function index_py()
    {
        $system_notices = SystemNotice::where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        $banners = Banners::where('type', 2)->get();
        return view('wap.index_py', compact('system_notices', 'banners'));
    }
    public function nav()
    {
        return view('wap.nav');
    }

    public function activity_list(Request $request)
    {
        $mod = new Activity();
        $type = $request->get('type');
        if($type){
            $mod = $mod -> where('type',$type);
        }
        $data = $mod -> where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.activity_list';
        }else{
            $view = 'wap.template.'.$mb_path.'.activity_list';
        }
        $setting = Db::table('system_config')->first();
        return view($view, compact('data','setting'));
    }

    public function activity_detail(Request $request,$id)
    {
        $data = Activity::findOrFail($id);
       
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.activity_detail';
        }else{
            $view = 'wap.template.'.$mb_path.'.activity_detail';
        }
        return view($view, compact('data'));
    }

    //pt 电子
    public function pt_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'PT')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.pt.rng_game_list', compact('data'));
    }

    //pt 真人游戏列表
    public function pt_live_game_list()
    {
        $data = TcgGameList::where('productCode', 'PT')->where('on_line', 0)->where('gameType', 'LIVE')->orderBy('sort', 'asc')->get();

        return view('wap.pt.live_game_list', compact('data'));
    }

    //png 电子
    public function png_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'PNG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.png.rng_game_list', compact('data'));
    }

    //ttg 电子
    public function ttg_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'TTG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.ttg.rng_game_list', compact('data'));
    }

    //GG 电子

    public function gg_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'GG')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.gg.rng_game_list', compact('data'));
    }

    //CQ9 电子

    public function cq9_rng_game_list()
    {
        $data = TcgGameList::where('productCode', 'CQ9')->where('client_type', 'html5')->where('on_line', 0)->where('gameType', 'RNG')->orderBy('sort', 'asc')->get();

        return view('wap.cq9.rng_game_list', compact('data'));
    }

//    public function pt_rng_game_list()
//    {
//        return view('wap.pt.rng_game_list');
//    }

    public function dt_rng_game_list()
    {
        return view('wap.dt.rng_game_list');
    }

    //ag 电子游戏列表
    public function ag_eGame_list()
    {
        return view('wap.ag.eGame_list');
    }

    //mg 电子游戏列表
    public function mg_eGame_list()
    {
        return view('wap.mg.eGame_list');
    }

    public function login()
    {
        return view('wap.login');
    }

    public function register(Request $request)
    {
        $i_code = $request->get('i');

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.register';
        }else{
            $view = 'wap.template.'.$mb_path.'.register';
        }
        $setting = Db::table('system_config')->first();

        return view($view, compact('i_code','setting'));
    }

    public function postRegister(Request $request)
    {
        // if(!session('milkcaptcha')||session('milkcaptcha') != $request->get('captcha'))
        //     return responseWrong('验证码错误');

        $my_system_config = SystemConfig::findOrFail(1);
        // $validator = $this->verify($request, 'wap.register');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }

        //验证ip
        if (in_array($request->getClientIp(), BlackListIp::pluck('ip')->toArray()))
            return responseWrong('该ip限制，请联系客服');

        //必须以字母开头
        if (!preg_match('/^[a-z]+$/', substr((string)$request->get('name'),0,1)) || !preg_match('/^[0-9a-z]+$/', $request->get('name')))
            return responseWrong('用户名只能以小写字母开头且字母数字组合');

        if(strlen((string)$request->get('qk_pwd')) != 6){
            return responseWrong('取款密码为6位纯数字');
        }


        $data = $request->all();
        //判断是否必须

        $real_name='';
        $phone='';
        $email='';
        $qq='';
        $weixin ='';

        if($my_system_config->is_regtj_1==1){
            $t_name=$request->get('t_name');
            if($my_system_config->is_regtj_2==1){
                if(empty($t_name)){
                    return responseWrong('推荐人必填');
                }
            }
            if(!empty($t_name)){
                if(!Member::where('is_daili', 1)->where('name', $t_name)->first()){
                    return responseWrong('不存在此推荐人');
                }
            }
        }
        if(Member::where('name', $request->get('name'))->first()){
                    return responseWrong('账号已存在');
                }
        $dali_mod = '';//判断域名
        $do_main = $_SERVER['HTTP_HOST'];
        $m = Member::where('is_daili', 1)->where('agent_uri', $do_main)->first();
        if ($m)
        {
            $dali_mod = $m;
        } elseif ($request->has('u'))
        {
            $dali_mod = Member::where('is_daili', 1)->where('agent_uri', $request->get('u'))->first();
        } elseif ($request->has('i_code'))
        {
            $dali_mod = Member::where('is_daili', 1)->where('invite_code', $request->get('i_code'))->first();
        }elseif (Cache::has(sha1(getIp()))){
            $dali_mod = Member::where('is_daili', 1)->where('invite_code', Cache::get(sha1(getIp())))->first();
        } elseif ($request->has('t_name')) {
            $dali_mod = Member::where('is_daili', 1)->where('name', $request->get('t_name'))->first();
        }
        if($my_system_config->is_real_name_1==1){
            $real_name=$data['real_name'];
            if($my_system_config->is_real_name_2==1){
                if(empty($real_name)){
                    return responseWrong('姓名必填');
                }

            }
            if(!empty($real_name)){


                if(!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$real_name)){
                    return responseWrong('姓名只能输入中文');
                }

                if (Member::where('real_name', $real_name)->first()){
                    return responseWrong('该姓名已存在！');

                }

            }
        }
        if($my_system_config->is_phone_1==1){
            $phone=$data['phone'];
            if($my_system_config->is_phone_2==1){
                if(empty($phone)){
                    return responseWrong('手机必填');
                }
                if(!preg_match("/^1[345678]\d{9}$/", $phone)){

                    // return responseWrong('手机号码格式不正确！');

                }
            }

            if(!empty($phone)){
                if (Member::where('phone', $phone)->first()){
                    return responseWrong('该手机号已存在！');
                }

            }
        }
        if($my_system_config->is_qq_1==1){
            $qq=$data['qq'];
            if($my_system_config->is_qq_2==1){
                if(empty($qq)){
                    return responseWrong('QQ必填');
                }
                if (!preg_match( "/^[1-9][0-9]{4,14}$/", $data['qq'] ) )
                {

                    return responseWrong('您输入的QQ不合法');
                }
            }
            if(!empty($qq)){
                if (Member::where('qq', $qq)->first()){
                    return responseWrong('该QQ已存在！');
                }

            }
        }

        if($my_system_config->is_email_1==1){
            $email=$data['email'];
            if($my_system_config->is_email_2==1){
                if(empty($email)){
                    return responseWrong('邮箱必填');
                }
                if (!preg_match( "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $data['email'] ) )
                {

                    return responseWrong('您输入的电子邮件地址不合法');
                }
            }
            if(!empty($email)){
                if (Member::where('email', $email)->first()){
                    return responseWrong('该邮箱已存在！');
                }

            }
        }
        if($my_system_config->is_weixin_1==1){
            $weixin=$data['weixin'];
            if($my_system_config->is_weixin_2==1){
                if(empty($weixin)){
                    return responseWrong('微信必填');
                }
                if (!preg_match( "/^[a-zA-Z\d_]{5,}$/", $data['weixin'] ) )
                {

                    return responseWrong('您输入的微信不合法');
                }
            }
            if(!empty($weixin)){
                if (Member::where('weixin', $weixin)->first()){
                    return responseWrong('该微信已存在！');
                }

            }
        }
        if($request->session()->get('daili_id')){
            $top_id = $request->session()->get('daili_id');
        }else{
            $top_id = $dali_mod?$dali_mod->id:0;
        }
        Member::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'original_password' => substr(md5(md5($data['name'])), 0,10),
            'o_password' => $data['password'],
            'invite_code' => getRandom(7),
            'real_name' => $real_name,
            'qk_pwd' => $data['qk_pwd'],
            'top_id' => $top_id,
            'register_ip' => $request->getClientIp(),
            'phone' => $phone,
            'email' => $email,
            'qq' => $qq,
            'weixin' => $weixin,
            'register_url'=>$_SERVER['HTTP_HOST'],
        ]);

        if (Auth::guard('member')->attempt(['name' => $request->name, 'password' => $request->password]))
        {
            $member = auth('member')->user();
            $member->last_session = Session::getId();
            $member->save();
            $member->update([
                'last_login_ip'=>$request->getClientIp(),
                'last_login_at' => date('Y-m-d H:i:s')
            ]);
            MemberLoginLog::create([
                'member_id' => $member->id,
                'ip' => $request->getClientIp()
            ]);
            return responseSuccess('', '登录成功', route('wap.index'));
        }

        return responseSuccess('','注册成功', route('wap.login'));
    }
    
    //个人中心
    public function userinfo(Request $request)
    {
  
        $setting = Db::table('system_config')->first();
        $api_mod= Api::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.userinfo';
        }else{
            $view = 'wap.template.'.$mb_path.'.userinfo';
        }
         $member = $this -> getMember();
        $mod = new Activity();
        $data = $mod -> where('on_line', 0)->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->get();
        // $msg = SystemNotice::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->first();
        
        $member = $this->getMember();
        $msg = $member->messages()->orderBy('created_at', 'desc')->first();
        
        
        $recharge = Db::table('recharge')->where('member_id',$member['id'])->orderBy('id','desc')->first();
        $drawing = Db::table('drawing')->where('member_id',$member['id'])->orderBy('id',' desc')->first();
        
        $total = [
            'game_str' => '',
            'fs_money' => 0
        ];
        $user = $this->getMember();
        $game_types = config('platform.game_type');
        foreach ($game_types as $k=>$v ){
            //if($k != 6) continue;
            $rows = GameRecord::where('gameType',$k)
                ->where('member_id',$user->id)
                ->where('isfs','=',0)
                ->where('flag',1)
                ->get()
                ->toArray();

            //print_r($rows);
            $res = [];
            foreach ($rows as $key => $row){
                $date = substr($row['betTime'],'0',10);
                $res[$date][] = $row;
            }
            $all = [];
            $fs_level = FsLevel::orderBy('level','desc')->where('game_type',$k)->get();
        
            foreach ($res as $d => $v){
                $game_str = '';
                $tz_amount = 0;
                $rate = 0;
                $level_name = '';
                foreach ($v as $kk => $info){
                    $game_str .= $info['id'].',';
                    $tz_amount += $info['validBetAmount'];
                }
                foreach ($fs_level as $l =>$value){
                    if($tz_amount >= $value->quota){
                        $level_name = $value->name;
                        $rate = $value->rate;
                        break;
                    }
                }
                $fs_money = sprintf("%.2f",  $tz_amount*$rate/100);
                if($fs_money  <= 0) {
                    /*if($d != date('Y-m-d')) {
                        continue;
                    }*/
                }
                $all[$d]['game_str'] = $game_str;
                $all[$d]['tz_amount'] = $tz_amount;
                $all[$d]['level_name'] = $level_name;
                $all[$d]['rate'] = $rate;
                $all[$d]['fs_money'] = $fs_money;
                if($d == date('Y-m-d') && $fs_money > 0) {
                    $total['game_str'] .= $game_str;
                    $total['fs_money'] += $fs_money;
                }elseif($d != date('Y-m-d')){
                    $total['game_str'] .= $game_str;
                    $total['fs_money'] += $fs_money;
                }


            }
        }
        
        $AGENT_URL = env('AGENT_URL');
        
       
        return view($view, compact('api_mod','setting','msg','data','recharge','drawing','member','total','game_types','AGENT_URL'));
    }
    
    //绑定银行卡相关
    public function userinfo2(Request $request)
    {
         $setting = Db::table('system_config')->first();
         
         $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.userinfo2';
        }else{
            $view = 'wap.template.'.$mb_path.'.userinfo2';
        }
         
         return view($view, compact('setting'));
    }

    //代理
    public function agent(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.agent';
        }else{
            $view = 'wap.template.'.$mb_path.'.agent';
        }
        return view($view);
    }

    //代理申请页面
    public function agent_apply(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.agent_apply';
        }else{
            $view = 'wap.template.'.$mb_path.'.agent_apply';
        }
        return view($view);
    }

    public function post_agent_apply(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_agent_apply');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();
        MemberDailiApply::create([
            'member_id' => $member->id,
            'phone' => $data['phone'],
            'msn_qq' => $data['qq'],
            'about' => $data['about']
        ]);

        return responseSuccess('','提交成功', route('wap.agent'));
    }

    public function bind_bank(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.bind_bank';
        }else{
            $view = 'wap.template.'.$mb_path.'.bind_bank';
        }
    
        return view($view);
    }

    public function post_bind_bank(Request $request)
    {
        $sys = SystemConfig::find(1);
        if ($sys->is_sms_on == 0)
        {
            if (!$request->has('v_code'))
                return responseWrong('请输入 手机验证码');

            if (session('phone_v_code') != $request->get('v_code'))
                return responseWrong('验证码错误 '.session('phone_v_code'));
        }

        // $validator = $this->verify($request, 'wap.update_bank_info');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        $data = $request->all();
        $member = $this->getMember();

        $member->update($data);

        return responseSuccess('', '绑定成功', route('wap.drawing'));
    }
    
    

    public function set_phone(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.set_phone';
        }else{
            $view = 'wap.template.'.$mb_path.'.set_phone';
        }
        return view($view);
    }

    public function post_set_phone(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_set_phone');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $member = $this->getMember();

        $member->update([
            'phone' => $data['phone']
        ]);

        return responseSuccess('', '设置成功', route('wap.index'));
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
    public function drawing(Request $request)
    {
		if($this->sys->mz_open){
			$member = $this->getMember();
			$WgService=new WgService();
			$ret=$WgService->mz_balances($member->name);
			$mz_money=json_decode($ret,1);
			if(!$mz_money['retCode']){
				$orderNo=$this->create_uuid();
				$res=$WgService->mz_zzmoney($member->name,'OUT',$mz_money['retMsg'],$orderNo);
				if($res){
					try{
						DB::transaction(function() use($member,$mz_money,$orderNo,$res) {
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
								'money' => $mz_money['retMsg'],
								'transfer_in_account' => '中心账户',
								'transfer_out_account' => 'WG免转账户',
								'result' => json_encode($res)
							]);
							//修改api账号余额
							$member->increment('money' , $mz_money['retMsg']);
						});
					}catch(\Exception $e){
						DB::rollback();
						//退回用户
						$member->decrement('money' , $mz_money['retMsg']);
					}
					//$member->increment('money',$mz_money['retMsg']);
				}
			}
        }
        if (!$this->getMember()->bank_card){
            return redirect()->to(route('wap.bind_bank'));
        }

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.drawing';
        }else{
            $view = 'wap.template.'.$mb_path.'.drawing';
        }
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        return view($view,compact('member','setting'));
    }

    public function post_drawing(Request $request)
    {
        $member = $this->getMember();
		$username=$member->name;
        $lock_file = "./tmp/process_{$username}_tk.lock";
		$lock_file_handle = fopen($lock_file, 'w');
		if ($lock_file_handle === false)
		 die("Can not create lock file {$lock_file}\n");
		if (!flock($lock_file_handle, LOCK_EX + LOCK_NB)) {
		 die(date("Y-m-d H:i:s") . " Process already exists.\n");
		}
        if (!$member->bank_card)
            return responseWrong('请先设置银行卡信息','', route('wap.update_bank_info'));

        $validator = $this->verify($request, 'wap.post_drawing');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
		
        $data = $request->all();
        if($data['money'] <= 0){
            return responseWrong('请输入正整数字');
        }

       
        $all_money = $member->money;

        if ($data['money'] > $all_money)
            return responseWrong('提款金额大于余额(或等待余额刷新后尝试)');
        if ($data['qk_pwd'] != $member->qk_pwd)
            return responseWrong('取款密码不正确');
        //将中心钱包余额转入网站用户余额
        //$amount = $data['money'] > 0 ? -$data['money']:$data['money'];
		
		if($member->open_dml){
		     if($member->ml_money>0){
				return responseWrong('您的打码量不足，无法提现'); 
			 }
		   /*	 
			   $last_pay=Recharge::where('member_id',$member->id)->orderBy('created_at', 'desc')->first();
			   if($last_pay && ($last_pay->money>0 || $last_pay->diff_money>0)){
					if($last_pay->money>0){
						$dml_money=$last_pay->money*$last_pay->dml;
					}else if($last_pay->diff_money>0){
						$dml_money=$last_pay->diff_money*$last_pay->dml;
					}
					$gamerecord_money=GameRecord::where('member_id',$member->id)->where('betTime','>=',$last_pay->created_at)->sum('betAmount');
					if($gamerecord_money<$dml_money){
					 return responseWrong('您的打码量不足，无法提现(打码量：'.$gamerecord_money.'，需要到：'.$dml_money.')');
					}
			   }else{
				   return responseWrong('您的打码量不足，无法提现');
			   }
		   */
		}
		
		
       

        /*--------------end---------------------*/
        try{
            DB::transaction(function() use($data, $member) {

                Drawing::create([
                    'bill_no' => getBillNo(),
                    'member_id' => $member->id,
                    'name' => $member->bank_username,
                    'money' => $data['money'] * 2,
                    'account' => $member->bank_card,
                    'bank_name' => $member->bank_name,
                    'bank_card' => $member->bank_card,
                    'bank_address' => $member->bank_branch_name
                ]);

                $member->decrement('money', $data['money']);

            });
        }catch(\Exception $e){
            DB::rollback();
            return responseWrong('失败');
        }

        return responseSuccess('','提交成功', route('wap.drawing_record'));
    }



    public function recharge(Request $request)
    {
        
        $setting = Db::table('system_config')->first();
        // $this->refresh_ml();
        // $mb_path = $this->getPath($request);
        // $bank_card_list = BankCard::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        // if(empty($mb_path)){
        //     $view = 'wap.recharge';
        // }else{
        //     $view = 'wap.template.'.$mb_path.'.recharge';
        // }
        // return view($view,compact('bank_card_list','setting'));
        
        
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.recharge';
        }else{
            $view = 'wap.template.'.$mb_path.'.recharge';
        }
        return view($view,compact('setting'));
    }
    
 
    public function weixin_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.weixin_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.weixin_pay';
        }
        return view($view);
    }

    public function post_weixin_pay(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_weixin_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 2,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function ali_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.ali_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.ali_pay';
        }
        return view($view);
    }
    public function sf_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.sf_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.sf_pay';
        }
        return view($view);
    }
    public function post_sf_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.sf_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.sf_pay';
        }
        return view($view);
    }
 public function my_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.my_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.my_pay';
        }
        return view($view);
    }
    public function post_my_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.my_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.my_pay';
        }
        return view($view);
    }
    
    public function third_bank_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        $setting = Db::table('system_config')->first();
        $xiaoshu = rand(10,40);
        if(empty($mb_path)){
            $view = 'wap.third_bank_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.third_bank_pay';
        }
        return view($view,compact('setting','xiaoshu'));
    }

    public function third_pay_app()
    {
        return view('wap.third_pay_app');
    }

    public function qq_pay(Request $request)
    {
        $mb_path = $this->getPath($request);
        $setting = Db::table('system_config')->first();
        $xiaoshu = rand(10,40);
        if(empty($mb_path)){
            $view = 'wap.qq_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.qq_pay';
        }
        return view($view,compact('setting','xiaoshu'));
    }

    public function third_pay_scan()
    {
        return view('wap.third_pay_scan');
    }
    public function fslog(Request $request)
    {
        $data = Dividend::where('member_id', $this->getMember()->id)->where('describe','返水')->where('money', '>', 0)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        return view('wap.fslog', compact('data'));
    }
    public function post_ali_pay(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_ali_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'],
            'payment_type' => 1,
            'account' => $data['account'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }
    
    public function chongzhi(Request $request)
    {

        $data = $request->all();
        $member = $this->getMember();
        $system = Db::table('system_config')->select('recharge_min','recharge_max')->first();
        if($data['money'] < $system->recharge_min) {
            return responseWrong(trans('lang.jebxdy').$system->recharge_min);
        }
        if($data['money'] > $system->recharge_max) {
            return responseWrong('金額必須小於等於' . $system->recharge_max);
        }
        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function post_qq_pay(Request $request)
    {
        // $validator = $this->verify($request, 'wap.post_qq_pay');

        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
    
        $data = $request->all();
        $member = $this->getMember();
        $system = Db::table('system_config')->select('recharge_min','recharge_max')->first();
        if($data['money'] < $system->recharge_min) {
            return responseWrong(trans('lang.jebxdy').$system->recharge_min);
        }
        if($data['money'] > $system->recharge_max) {
            return responseWrong(trans('lang.jebxxy').$system->recharge_max);
        }
        if (Db::table('recharge')->where('member_id', $member->id)->where('status', 1)->count()) {
            return responseWrong(trans('lang.qddpz'));
        }
        if($data['fanli']==2 && $data['money'] < 200){
            return responseWrong('每日首充金額需大於200才能申請');
        }
        if($data['fanli']==3 && ($data['money'] > 1000 || $data['money'] < 100)){
            return responseWrong('新账号首充金額需在100-1000之間才能申請');
        }
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $data['money'].'.'.$data['xiaoshu'],
            'payment_type' => 5,
            'account' => @$data['account'],
            'status' => 1,
            'hk_at' => date('Y-m-d H:i:s'),
            'fanli' => $data['fanli']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function bank_pay(Request $request)
    {
        $bank_card_list = BankCard::where('on_line', 0)->orderBy('created_at', 'desc')->get();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.bank_pay';
        }else{
            $view = 'wap.template.'.$mb_path.'.bank_pay';
        }
        return view($view, compact('bank_card_list'));
    }

    public function post_bank_pay(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_bank_pay');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();
        
        Recharge::create([
            'bill_no' => getBillNo(),
            'member_id' => $member->id,
            'name' => $data['name'],
            'money' => $data['money'],
            'payment_type' => 3,
            'account' => $data['account'],
            'payment_desc' => $data['payment_desc'],
            'status' => 1,
            'hk_at' => $data['paytime'].' '.$data['date_h'].':'.$data['date_i'].':'.$data['date_s']
        ]);

        return responseSuccess('', '', route('wap.recharge_record'));
    }

    public function reset_password(Request $request)
    {
        // $mb_path = $this->getPath($request);
        // if(empty($mb_path)){
        //     $view = 'wap.reset_password';
        // }else{
        //     $view = 'wap.template.'.$mb_path.'.reset_password';
        // }
        // return view($view);
         $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.reset_password';
        }else{
            $view = 'wap.template.'.$mb_path.'.reset_password';
        }
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        return view($view, compact('setting','member'));
    }
    
    public function reset_password2(Request $request)
    {
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.reset_password2';
        }else{
            $view = 'wap.template.'.$mb_path.'.reset_password2';
        }
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
        return view($view, compact('setting','member'));
    }

    public function reset_login_password(Request $request)
    {
        $validator = $this->verify($request, 'wap.update_login_password');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();
        if (!Hash::check($data['old_password'], $member->password))
        {
            return responseWrong('原密码错误');
        }

        $member->update([
            'password' => bcrypt($data['password']),
            //'original_password' => $data['password']
        ]);

        return responseSuccess('', '修改成功');
    }

    public function reset_qk_password(Request $request)
    {
        $validator = $this->verify($request, 'wap.update_qk_password');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();
        $member = $this->getMember();

        if ($member->qk_pwd != $data['old_password'])
        {
            return responseWrong('原密码错误');
        }

        $member->update([
            'qk_pwd' => $data['password']
        ]);

        return responseSuccess('', '修改成功');
    }
    public function membermoney(){
        $member = $this->getMember();
        if(!@$member->money){
            die;
        }
        $member->api_money = 0;
        $api_list = Api::where('on_line', '<>','1')->orderBy('created_at', 'desc')->get();
        if($api_list){
            foreach ($api_list as $k=>$v){
                $member_api = Db::table('member_api')->where('member_id',$member->id)->where('api_id', $v->id)->first();
                if($member_api){
                    // $member->money += $member_api->money;
                    if($v->api_name=="KY_HK"){
                        $member->api_money += $member_api->money / 2;
                    }else{
                        $member->api_money += $member_api->money;
                    }
                }
            }
        }
        $member->api_money = round($member->api_money,2);
        return $member;
    }
    public function transfer(Request $request)
    {
        $api_list = Api::where('on_line', 0)->orderBy('sort', 'asc')->get();

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.transfer';
        }else{
            $view = 'wap.template.'.$mb_path.'.transfer';
        }
        $member = $this->getMember();
        $setting = Db::table('system_config')->first();
         return view($view, compact('api_list','member','setting'));
    }

    public function post_transfer(Request $request)
    {
        $validator = $this->verify($request, 'wap.post_transfer');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $member = $this->getMember();
        $in_account = $request->get('in_account');
        $out_account = $request->get('out_account');
        $money = $request->get('money');

        $o = new ApiClientController();

        if ($in_account == $out_account || ($in_account> 2 && $out_account > 2))
        {
            return responseWrong('不支持该种类型转换，请重新选择');
        }

        //
        if ($out_account == 1)//从中心账户转出
        {
            if ($member->money < $money)
                return responseWrong('账户余额不足');

            $api = Api::findOrFail($in_account);

            $res = $o->deposit($api->api_name, $member->name, $member->original_password, $money, 'money');
            if ($res['Code'] != 0)
                return responseWrong('失败！错误'.$res['Message'].' 请联系客服解决');
        } elseif ($out_account == 2){//从返水账户转出

            if ($member->fs_money < $money)
                return responseWrong('账户余额不足');

            $api = Api::findOrFail($in_account);

            $res = $o->deposit($api->api_name, $member->name, $member->original_password, $money, 'fs_money');
            if ($res['Code'] != 0)
                return responseWrong($res['Message']);
        } elseif ($in_account == 1){// 转入中心账户

            $api = Api::findOrFail($out_account);
            $res = $o->withdrawal($api->api_name, $member->name, $member->original_password, $money, 'money');
            if ($res['Code'] != 0)
                return responseWrong($res['Message']);
        }

        return responseSuccess('', '转换成功', route('wap.transfer'));
    }

    public function drawing_record(Request $request)
    {
        // $data = Drawing::where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        // $mb_path = $this->getPath($request);
        // if(empty($mb_path)){
        //     $view = 'wap.drawing_record';
        // }else{
        //     $view = 'wap.template.'.$mb_path.'.drawing_record';
        // }
        // return view($view, compact('data'));
        
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        $data = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $setting = Db::table('system_config')->first();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.drawing_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.drawing_record';
        }
        $total = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->where('status','=',2)->sum('money');
        return view($view, compact('data','setting','day','total'));
    }
    
    public function user_fsjl(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $data = Dividend::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.user_fsjl';
        }else{
            $view = 'wap.template.'.$mb_path.'.user_fsjl';
        }
        return view($view, compact('data','day'));
    }
    
     public function user_fsjl_api(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $data = Dividend::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        if($data){
            foreach ($data as $k=>&$v){
                $v->describe = config('platform.dividend_type')[$v->type];
            }
        }
       $total = Dividend::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->sum('money');
         return responseSuccess(['data'=>$data,'day'=>$day,'total'=>$total]);
    }
    
    public function drawing_record_api(Request $request)
    {
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        
        $data = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        if($data){
            foreach ($data as &$v){
                if($v->bank_name==1){
                    $v->bank_name = trans('lang.zsk');
                }elseif($v->bank_name==2){
                    $v->bank_name = trans('lang.ykh');
                }elseif($v->bank_name==3){
                    $v->bank_name = 'ERC20';
                }elseif($v->bank_name==4){
                    $v->bank_name = 'TRC20';
                }
            }
        }
        $setting = Db::table('system_config')->first();
        $total = Drawing::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->where('status','=',2)->sum('money');
        return responseSuccess(['data'=>$data,'setting'=>$setting,'total'=>$total,'day'=>$day]);

    }
    
     public function game_record_api(Request $request)
    {
        $api_type = '';
        $mod = new GameRecord();
        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $day -= 1;
        
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $mod = $mod -> where('betTime','>=',$time);
        

        if($_GET['gameCode']){
            $mod->where('api_type',$request->get('gameCode'));
        }
        $total = $mod->where('member_id', $this->getMember()->id)->sum('betAmount');
        $total = abs($total);
        $sunyi = $mod->where('member_id', $this->getMember()->id)->sum('netAmount');
        $sunyi = round($sunyi,2);
        
        
        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('betTime', 'desc')->paginate(config('web.page-size'));
        
        if($data){
            foreach ($data as &$v){
                $apiname = Db::table('api')->where('id',$v->api_type)->first();
                // dump($apiname);die;
                $v->api_type = @$apiname->api_title;
            }
        }
        return responseSuccess(['data'=>$data,'api_type'=>$api_type,'day'=>$day,'total'=>$total,'income'=>$sunyi]);
    }
    

    public function game_record(Request $request)
    {

        $start_at = $end_at = $api_type = $gameType = $flag ='';
        $mod = new GameRecord();
        if ($request->has('api_type'))
        {
            $api_type = $request->get('api_type');
            $api_name = Api::where('id',$api_type)->first();

            if($api_name->api_title=='AG'){
                $ags = Api::where('api_name','AGS')->first();

                $mod = $mod->whereIn('api_type', [$ags->id,$api_type]);
            }else{
                $mod = $mod->where('api_type', $api_type);
            }

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
		if($start_at=="" && $end_at==""){
			$mod = $mod->where('betTime', '>=', date('Y-m-d 00:00:00'));
			$mod = $mod->where('betTime', '<=', date('Y-m-d 23:59:59'));
		}
        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $all_validBetAmount=$mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->sum('validBetAmount');
        $all_BetAmount=$mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->sum('BetAmount');
        $all_netAmount=$mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->sum('netAmount');
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.game_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.game_record';
        }
		
		$_api_list_arr = Api::where('on_line', 0)->orderBy('created_at', 'desc')->pluck('api_title', 'id')->toArray();
		
        return view($view, compact('data', 'api_type','_api_list_arr','start_at','end_at','all_validBetAmount','all_BetAmount','all_netAmount'));
    }

    public function recharge_record(Request $request)
    {

        $day = @$_GET['day'];
        if(!@$day){
            $day = 1;
        }
        $time = date('Y-m-d',strtotime(date('Y-m-d'))- $day*86400);
        $data = Recharge::where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $setting = Db::table('system_config')->first();
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.recharge_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.recharge_record';
        }
         $total = Recharge::where('member_id', $this->getMember()->id)->where('created_at','>=',$time)->where('status','=',2)->sum('money');
         return view($view, compact('data','setting','day','total'));
    }

    public function recharge_record_api(Request $request)
    {
		 $day = @$_GET['day'];
        if (!@$day) {
            $day = 1;
        }
        $day -= 1;
        $time = date('Y-m-d', strtotime(date('Y-m-d')) - $day * 86400);
        // echo $time;die;
        $data = Recharge::where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->orderBy('created_at', 'desc')->paginate(10);
        if($data){
            foreach ($data as $k=>$v){
                // if($v->payment_type==2){
                    $v->account = config('platform.recharge_type')[$v->payment_type];
                // }
            }
        }
        $total = Recharge::where('member_id', $this->getMember()->id)->where('created_at', '>=', $time)->where('status', '=', 2)->sum('money');
        return responseSuccess(['data'=>$data,'day'=>$day,'total'=>$total]);
    }
    public function transfer_record(Request $request)
    {
        $cn_begin = $cn_end = date('Y-m-d');

        $s_begin_h = $request->get('s_begin_h')?:'00';
        $s_begin_i = $request->get('s_begin_i')?:'00';

        $s_end_h  = $request->get('s_end_h')?:'23';

        $s_end_i = $request->get('s_end_i')?:'59';

        $mod = new Transfer();
        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', $cn_begin." ".$s_begin_h.":".$s_begin_i.":00");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', $cn_end." ".$s_end_h.":".$s_end_i.":00");
        }


        $data = $mod->where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.transfer_record';
        }else{
            $view = 'wap.template.'.$mb_path.'.transfer_record';
        }

        return view($view, compact('data', 'cn_begin', 'cn_end', 's_begin_h', 's_begin_i', 's_end_h', 's_end_i'));
    }

    public function daili_money_log(Request $request)
    {
        $data = DailiMoneyLog::where('member_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.daili_money_log';
        }else{
            $view = 'wap.template.'.$mb_path.'.daili_money_log';
        }
        return view($view, compact('data'));
    }

    public function member_offline(Request $request)
    {
        $data = Member::where('top_id', $this->getMember()->id)->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline';
        }
        return view($view, compact('data'));
    }

    public function member_offline_recharge(Request $request)
    {
        $mod = new Recharge();
        $name = '';
        $cn_begin =  date('Y-m-d');

        $cn_end = date('Y-m-d');

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', "$cn_begin");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }

        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('top_id', $this->getMember()->id)->where('name', 'LIKE', "%$name%")->pluck('id');
        } else {
            $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        }

        $mod = $mod->whereIn('member_id', $m_list);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline_recharge';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline_recharge';
        }

        return view($view ,compact('data', 'name', 'cn_begin', 'cn_end'));
    }

    public function member_offline_drawing(Request $request)
    {
        $mod = new Drawing();
        $name = '';
        $cn_begin =  date('Y-m-d');

        $cn_end = date('Y-m-d');

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $mod = $mod->where('created_at', '>=', "$cn_begin");
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $mod = $mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }

        if ($request->has('name'))
        {
            $name = $request->get('name');
            $m_list = Member::where('top_id', $this->getMember()->id)->where('name', 'LIKE', "%$name%")->pluck('id');
        } else {
            $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        }

        $mod = $mod->whereIn('member_id', $m_list);

        $data = $mod->orderBy('created_at', 'desc')->paginate(config('web.page-size'));

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline_drawing';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline_drawing';
        }

        return view($view ,compact('data', 'name', 'cn_begin', 'cn_end'));
    }


    public function member_offline_sy(Request $request)
    {
        $cn_begin =  '';

        $cn_end = '';

        $m_list = Member::where('top_id', $this->getMember()->id)->pluck('id');
        $recharge_mod = new Recharge();
        $drawing_mod = new Drawing();
        $dividend_mod = new Dividend();

        if ($request->has('cn_begin'))
        {
            $cn_begin = $request->get('cn_begin');
            $recharge_mod = $recharge_mod->where('created_at', '>=', $cn_begin);
            $drawing_mod = $drawing_mod->where('created_at', '>=', $cn_begin);
            $dividend_mod = $dividend_mod->where('created_at', '>=', $cn_begin);
        }

        if ($request->has('cn_end'))
        {
            $cn_end = $request->get('cn_end');
            $recharge_mod = $recharge_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
            $drawing_mod = $drawing_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
            $dividend_mod = $dividend_mod->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($cn_end)));
        }

        $total_recharge = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        $recharge_count = $recharge_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        $total_drawing = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->sum('money');
        $drawing_count = $drawing_mod->where('status', 2)->whereIn('member_id', $m_list)->count();

        $total_dividend = $dividend_mod->whereIn('member_id', $m_list)->sum('money');
        $dividend_count = $dividend_mod->whereIn('member_id', $m_list)->count();


        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.member_offline_sy';
        }else{
            $view = 'wap.template.'.$mb_path.'.member_offline_sy';
        }

        return view($view, compact('cn_begin', 'cn_end', 'total_recharge', 'recharge_count', 'total_drawing', 'drawing_count', 'total_dividend', 'dividend_count'));
    }


    /**
     * 增加我的消息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function msg(Request $request)
    {
        $member = $this->getMember();
      
        $data = $member->messages()->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
       
       
        // $data = SystemNotice::orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate(config('web.page-size'));
        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.msg';
        }else{
            $view = 'wap.template.'.$mb_path.'.msg';
        }
        return view($view,compact('data'));
    }
    
    public function readMessage(Request $request){
        
        $data = $request->all();
        if(empty($data['id'])){
            return responseSuccess('','非法操作');
        }
        $id = $data['id'] ??0;
        $member = $this->getMember();
        MemberMessage::where(['member_id'=>$member->id,"message_id"=>$id])->update([
            "is_read"=>1,    
        ]);
      
        return responseSuccess('','读取消息成功');
    }
    
    public function delMessage(Request $request){
        $data = $request->all();
        if(empty($data['id'])){
            return responseSuccess('','非法操作');
        }
        $id = $data['id'] ??0;
        $member = $this->getMember();
        MemberMessage::where(['member_id'=>$member->id,"message_id"=>$id])->delete();
        return responseSuccess('','删除消息成功');
    }
    
    
    public function red()
    {
        $res = SystemConfig::findOrfail(1);
        if($res->is_hongbao == 1) {
            $red = Red::where('on_line',0)->orderBy('sort','asc')->get();
            return view('wap.red',compact('red'));
        }
    }
    
    public function service(){
        $member = $this->getMember();
        return view('wap.template.theme10.service', compact('member'));
    }

    public function my_activity(Request $request)
    {
        $member = $this->getMember();
        $data = ActivityApply::where('member_id', $member->id)->orderBy('status', 'asc')->get();

        $mb_path = $this->getPath($request);
        if(empty($mb_path)){
            $view = 'wap.my_activity';
        }else{
            $view = 'wap.template.'.$mb_path.'.my_activity';
        }
        return view($view, compact('data'));
    }
    
    public function bindphone(){
        $member = $this->getMember();
        return view('wap.template.theme10.bindphone', compact('member'));
    }
    public function postbindphone(Request $request){
        $member = $this->getMember();
        $oldPhone = $member->phone;
        $phone = $request->get('phone');
        $code = $request->get('code');
        if($oldPhone){
            $data = Db::table('sms')->where('status',0)->where('member_id',$member->id)->where('phone',$oldPhone)->where('code',$code)->orderBy('time','desc')->first();
        }else{
            $data = Db::table('sms')->where('status',0)->where('member_id',$member->id)->where('phone',$phone)->where('code',$code)->orderBy('time','desc')->first();
        }
        
        if(!$data){
            return responseWrong(trans("lang.yzmcw"));
        }elseif($data->time <= time()-600){
            return responseWrong(trans("lang.yzmygq"));
        }
        if(Db::table('members')->where('phone',$phone)->first()){
            return responseWrong('手机号已存在');
        }
        //修改手机号
        Db::table('members')->where('id',$member->id)->update(['phone'=>$phone]);
        Db::table('sms')->where('id',$data->id)->update(['status'=>1]);
        return responseSuccess('',trans("lang.tjcg"));
    }

}
