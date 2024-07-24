<?php

namespace App\Http\Controllers\Wap;

use App\Models\Member;
use App\Models\MemberLoginLog;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Traits\ValidationTrait;
use Session;
use DB;
use Illuminate\Support\Facades\App;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers,ValidationTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/member/dash';
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth.wap', ['except' => 'logout']);
//        //$this->username = config('admin.global.username');
//    }
    /**
     * 重写登录视图页面
     * @author 晚黎
     * @date   2016-09-05T23:06:16+0800
     * @return [type]                   [description]
     */
    public function showLoginForm(Request $request)
    {
        $preview = $request->get('preview');
        if($request->has('preview')){
            $data = Template::where('id',$preview)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }else{
            $data = Template::where('status',2)->where('client_type',2)->first();
            $mb_path = $data->template_name;
        }
        if(empty($mb_path)){
            $view = 'wap.login';
        }else{
            $view = 'wap.template.'.$mb_path.'.login';
        }
        $setting = Db::table('system_config')->first();
        
        return view($view, compact('setting'));
    }

    public function postLogin(Request $request)
    {
        $validator = $this->verify($request, 'member.login');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $member = Member::where('name', $request->name)->first();
        if ($member)
        {
            if ($member->status == 1)
                return responseWrong('该账号被禁用');
        }

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
                'ip' => getIp()
            ]);
            return responseSuccess('', '登录成功', route('wap.index'));
        }
        return responseWrong('用户名或密码错误');
    }
     public function rmsgcode(Request $request)
        {
            $phone = $request->get('phone');
            $code = rand(1000, 9999);
            //最近一条短信
            $msg = Db::table('sms')->where('phone', $phone)->orderBy('time', 'desc')->first();
            if (@$msg && @$msg->time >= time() - 120) {
                return responseWrong('2分钟内只可发送一条');
            }
            $total = Db::table('sms')->where('phone', $phone)->where('time', '>', strtotime(date('Y-m-d')))->count();
            if ($total >= 10) {
                return responseWrong('超过每日短信次数，请明日再试！');
            }
            $ip = Db::table('members')->where('register_ip', $request->getClientIp())->first();
            if ($ip) {
                // return responseWrong('此ip已注册过账户');
            }
            Db::table('sms')->insert([
                'member_id' => 0,
                'code' => $code,
                'status' => 0,
                'phone' => $phone,
                'time' => time()
            ]);
            $phone = '852' . $phone;
            $url = 'http://api.sms.cn/sms/?ac=sendint&uid=qq6562655&pwd=66d8e3cf0b66f5562eda07c28e4aa93e&template=6000002&mobile=' . $phone . '&content={"code":"' . $code . '"}';
            $res = file_get_contents($url);
            // dump($res);
            return responseSuccess('', trans("lang.fscg"), $phone);
        }
    public function changelang(){
        $lang = $_GET['lang'];
        App::setLocale($lang);
        Session::put('lang',$lang);  
        echo App::getLocale();
    }
    public function logout()
    {
        //$member = auth('member')->user();
//        $member->update([
//            'is_login' => 0
//        ]);
        Auth::guard('member')->logout();
        return redirect()->route('wap.index');
    }
}
