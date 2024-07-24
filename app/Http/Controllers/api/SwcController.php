<?php

namespace App\Http\Controllers\Api;

use App\Models\Api;
use App\Models\MemberAPi;
use App\Services\WgService;
use Illuminate\Http\Request;
use App\Models\SystemConfig;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;

class SwcController  extends WebBaseController
{
    protected $service,$api;
    public function __construct()
    {
        $this->service = new WgService();
    }

    public function login(Request $request)
    {
        //检查账号是否注册
        $member = $this->getMember();
        $username = $member->name;
        $platformCode = $request->get('plat_type')?:'SWC';
		$platformCode=strtoupper($platformCode);
		if($platformCode=='SUNBET') $platformCode='Sunbet';
        $api = Api::where('api_name', $platformCode)->first();
        $member_api = $member->apis()->where('api_id', $api->id)->first();

        if (!$member_api)
        {
            $res = json_decode($this->service->register($platformCode, $username), TRUE);
            if ($res['retCode'] != 0)
            {
                echo '开通失败！错误代码 '.$res['retCode'].' 请联系客服';exit;
            }

            //创建api账号
            $member_api = MemberAPi::create([
                'member_id' => $member->id,
                'api_id' => $api->id,
                'username' => $api->prefix.$member->name,
                'password' => $member->original_password
            ]);
        }

        $gametype = $request->get('game_type')?:null;
	    $arr=['1'=>'live','6'=>'fish','4'=>'ball','3'=>'imlotto10059'];
        $devices = $request->get('devices')?:0;
        $gameId = $request->get('gameId')?:null;
        $gameName = $request->get('gamename')?:null;
        $sysconfig = SystemConfig::findOrFail(1);
		if($platformCode=='MX'){
            $additional=$sysconfig->mx_xh;
		}else if($platformCode=='Sunbet'){
			$additional=$sysconfig->sunbet_xh;
		}else if($platformCode=='VG'){
			$additional=$sysconfig->vg_xh;
		}else if($platformCode=='WG'){
            $additional=$sysconfig->wg_pl.",".$sysconfig->wg_wf;
		}
		else{
			$additional="";
		}
        $res = $this->service->loginbi($platformCode,$username,$gametype, $devices,$gameId, $gameName,$additional);

        return redirect()->to($res);
    }

    public function game_record()
    {
        return view('api.getRecord_swc');
    }

}
