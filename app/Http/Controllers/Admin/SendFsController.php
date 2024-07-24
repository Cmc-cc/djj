<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Models\Dividend;
use App\Models\Member;
use App\Models\FsActionLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GameRecord;
class SendFsController extends AdminBaseController
{

  public function index(Request $request)
    {
        $mod = new GameRecord();
        $name = $api_type = '';
        $gameType = 1;//默认真人
        $start_at = date('Y-m-d', strtotime('-1 day'));
        $end_at = date('Y-m-d 23:59:59', strtotime('-1 day'));
        $total_tz_amount=$total_num=$total_fs_money=0;

        if ($request->has('api_type'))
        {
            $api_type = $request->get('api_type');
        }
        if ($request->has('gameType'))
        {
            $gameType = $request->get('gameType');
        }
        if ($request->has('name'))
        {
            $name = $request->get('name');
        }
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
			$end_at = date('Y-m-d 23:59:59',strtotime($start_at));
        }
        /*if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            //$mod = $mod->where('betAmount', '<=',$end_at);
        }*/
    
	    if ($start_at)
        {
            $mod = $mod->where('betTime', '>=', $start_at);
        }
        if ($end_at)
        {
            $mod = $mod->where('betTime', '<=', $end_at);
        }
        if ($api_type)
        {
            $mod = $mod->where('api_type', $api_type);
        }
	    if ($gameType)
        {
            $mod = $mod->where('gameType', $gameType);
        }
	    $mod = $mod->where('isfs', 0);
        //$data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
	
        $data = $mod->orderBy('created_at', 'desc')->groupBy('name')->paginate(config('admin.page-size'));
		foreach($data as &$v){
			
			$game_mod=new GameRecord();
			
			$member_id = $v->member_id;

            $gameType_str = '';
            $game_mod = new \App\Models\GameRecord();
            if ($start_at)
            {
                $game_mod = $game_mod->where('betTime', '>=', $start_at);
            }
            if ($end_at)
            {
                $game_mod = $game_mod->where('betTime', '<=', $end_at);
            }
            if ($api_type)
            {
                $game_mod = $game_mod->where('api_type', $api_type);
            }

            $game_mod = $game_mod->where('isfs', 0);
            $game_mod = $game_mod->where('gameType', $gameType);

            $game_mod = $game_mod->where('member_id', $member_id);
            $lists= $game_mod->get();
			$gids=[];
			foreach($lists as $vv){
				$gids[]=$vv->id;
			}
            $v->num = $game_mod->count();
            $v->tz_amount = $game_mod->sum('validBetAmount');//投注总额
			$v->gamebillno=implode(',',$gids);
            //返水等级
            $fs_level = \App\Models\FsLevel::orderBy('level', 'desc')->where('game_type', $gameType)->get();
            $v->rate = 0;$v->level_name = '';
            foreach ($fs_level as $k => $vv)
            {
                if ($v->tz_amount >= $vv->quota)
               {
                   $v->level_name = $vv->name;
                   $v->rate = $vv->rate;
                   break;
               }
            }

            $v->fs_money = sprintf("%.2f",  $v->tz_amount*$v->rate/100);

            $total_tz_amount +=$v->tz_amount;
            $total_num +=$v->num;
            $total_fs_money += $v->fs_money;

		}
		
		session(['start_at' => $start_at,'end_at'=>$end_at]); 
		
        return view('admin.send_fs.index', compact('data', 'name', 'start_at', 'end_at', 'api_type','gameType','total_tz_amount','total_num','total_fs_money'));
    }

    public function store(Request $request)
    {
	
        $validator = $this->verify($request, 'send_fs.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        //dd($data);
        foreach ($data['member_id'] as $k => $item)
        {
            $member = Member::find($item);

            if ($member){
                $money = $data['money'][$item] ;
                if($money <= 0) continue;

                $member->increment('money', $data['money'][$item]);
                $array_gamebill = explode(',', $data['gamebillno'][$item]);
                foreach($array_gamebill as $id)
                {
                    if($id)
                    {
                        $mod = GameRecord::findOrFail($id);
                        $mod->update([
                            'isfs' => 1
                        ]);
                    }
                }
				$gameType=config('platform.game_type')[$data['gametype']];
                Dividend::create([
                    'member_id' => $item,
                    'type' => 3,
                    'describe' => $gameType.'返水',
                    'money' => $data['money'][$item],
                    'user_id' => \Auth::user()->id
                    //'remark' => $data['remark'][$item],
                ]);
            }

        }

        return responseSuccess();
    }
}
