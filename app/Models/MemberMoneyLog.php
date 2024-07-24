<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberMoneyLog extends Model
{
    protected $table = 'member_money_log' ;

    protected $guarded = [];
    
    protected $append = ['type_str'];
    
    const TYPES =  [1=>'充值',2=>'提现',3=>'提现驳回',4=>'赠送',5=>'系统上分',6=>'系统下分',7=>'接口转入',8=>'接口转出',9=>'转盘',10=>'等级奖励',11=>'实时返水',12=>'亏损补助',20=>'借备用金',21=>'还备用金',22=>'活动赠送'];

    public function getTypeStrAttribute()
    {
        return self::TYPES[$this->getAttribute('type')] ?? '';
    }
    
    public function member()
    {
        return $this->hasOne('App\\Models\\Member', 'id', 'member_id');
    }
    
   public static function addLog($member_id, $amount,$before,$type,$orderSn)
    {
        $add = [];
        $add['member_id'] = $member_id;
        $add['money'] =  $amount;
        $add['before'] = $before;
        $add['after'] = $before + $amount;
        $add['type'] = $type;
        $add['memo'] = $orderSn;
        self::create($add);
        return $add['after'];
    }
    
    
            
    
}
