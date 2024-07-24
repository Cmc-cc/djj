<?php
header('Content-Type:text/html; charset=utf-8');
if($_POST){
	$PageIndex=1;
	if(isset($_POST['page'])){
		$PageIndex=$_POST['page'];
	}

	ini_set('max_execution_time','1000');
	function SaveTime($jsonDate){
		preg_match('/\d{10}/',$jsonDate,$matches);
		return (date('Y-m-d H:i:s',$matches[0]));
	}

	$time=time();
	$S_time=$time-3*60*60;;
	$E_time=$time;
	$limit=200;
	$platformCode='SUNBETS';
	$api_mod = \App\Models\Api::where('api_name', 'SUNBET')->first();
	//print_r($api_mod);

	//$api_bi = \App\Models\Api::where('api_name', 'WG')->first();
	$api=new \App\Http\Controllers\Api\BiController();
	$datajson=$api->getGameRecord($platformCode,$S_time,$E_time,$PageIndex,$limit,$time);
	print_R($datajson);
	$count=0;
	if(!empty($datajson['Data'])){
		$data['Data']=json_decode($datajson['Data'],1);
		$data['TotalCount']=$datajson['TolalCount'];
		if(!empty($data['Data'])){
			$count=count($data['Data']);
			$data =$data['Data'];
			$data =array_reverse($data);
			//
			foreach($data as $k=>$v){

				$r_mod = \App\Models\GameRecord::where('fOrderID', $v['fOrderID'])->where('api_type', $api_mod->id)->first();

				if($r_mod){
					if($r_mod->netAmount != $v['WinLoss'] || $r_mod->round !=$v['StatusString'] || $r_mod->validBetAmount !=$v['fValBetAmount']){

						$r_mod->update([
							'netAmount' => $v['WinLoss'],
							'round' => $v['StatusString'],
							'validBetAmount' => $v['fValBetAmount']
						]);
					}
				}else{
					//
					//$l = strlen($api_bi->prefix);
					$ctime = $v['fCreateTime'];
					$l = 0;
					$name = $v["fMemberAccount"];
			   
					$m = \App\Models\Member::where('name', $name)->first();							
				switch ($v['GameTypeString']) {
						case '真人':
							$fGameType = 1;
							break;
						case '捕鱼':
							$fGameType = 2;
							break;
						case '电子':
							$fGameType = 3;
							break;
						case '彩票':
							$fGameType = 4;
							break;
						case '体育':
							$fGameType = 5;
							break;
						case '棋牌':
							$fGameType = 6;
							break;	
						default :
							$fGameType = 7;
					}
					switch ($v['fState']) {
						case '0':
							$rounds = "未结算";
							break;
						case '1':
							$rounds = "已结算";
							break;
						case '2':
							$rounds = "订单尚未接受";
							break;
						case '3':
							$rounds = "商家退钱";
							break;
						case '4':
							$rounds = "玩家取消";
							break;
						default :
							$rounds = "其他";	
					}
					


					\App\Models\GameRecord::create([
									'billNo' => $v['fID'],//ID
									'fOrderID' => $v['fOrderID'],//游戏ID
									'playerName' => $v['fMemberAccount'],//玩家帐号
									'betAmount' => $v['fBetAmount'],//下注金额
									'validBetAmount' => $v['fValBetAmount'],//实际下注金额
									'netAmount' => $v['WinLoss'],//输赢金额
									'gameCode' => $v['fGameCode'],//游戏代码
									'betTime' => $v['fOrderDate'],//游戏时间
									'gameType' => $fGameType,//类型
									'fResultContent' => $v['fResultContent'],//结果	
									'remark' => $v['fLeagueID'],//联赛ID
									'gamename' => $v['fGameName'],//游戏名称
									'stringex' => $v['fBetContent'],//下注内容	
									//'BetAlias' => $v['fBetAlias'],//下注玩法
									'fExpect' => $v['fExpect'],//下注期号							
									'round' => $rounds,//状态
									'api_type' => $api_mod->id,//接口ID
									'name' => $v['fMemberAccount'],//玩家帐号
									'member_id' => $m?$m->id:0,//游戏代码
									'result' => json_encode($v)
					]);

					$m->decrement('ml_money', floatval($v['fValBetAmount']));//增加码量
				}
				

			}

			if ($count > $limit)
			{
				for ($i=1;$i < ceil($count/$limit);$i++)
				{
					$p = $i*$limit;
					$time = time();
					$data=$api->getGameRecord($platformCode,$S_time,$E_time,$p,$limit,$time);
					if (!empty($data['Data']))
					{
						$data =$data['Data'];
						foreach($data as $k=>$v){

							$r_mod = \App\Models\GameRecord::where('fOrderID', $v['fOrderID'])->where('api_type', $api_mod->id)->first();

							if($r_mod){
								if($r_mod->netAmount != $v['WinLoss'] || $r_mod->round !=$v['StatusString']){

									$r_mod->update([
										'netAmount' => $v['WinLoss'],
										'round' => $v['StatusString']
									]);
								}
							}else{
								//
								//$l = strlen($api_bi->prefix);
								$ctime = $v['fCreateTime'];
								$l = 0;
							
								$name = $v["fMemberAccount"];
								$m = \App\Models\Member::where('name', $name)->first();

					 switch ($v['GameTypeString']) {
						case '真人':
							$fGameType = 1;
							break;
						case '捕鱼':
							$fGameType = 2;
							break;
						case '电子':
							$fGameType = 3;
							break;
						case '彩票':
							$fGameType = 4;
							break;
						case '体育':
							$fGameType = 5;
							break;
						case '棋牌':
							$fGameType = 6;
							break;	
						default :
							$fGameType = 7;
					}
					switch ($v['fState']) {
						case '0':
							$rounds = "未结算";
							break;
						case '1':
							$rounds = "已结算";
							break;
						case '2':
							$rounds = "订单尚未接受";
							break;
						case '3':
							$rounds = "商家退钱";
							break;
						case '4':
							$rounds = "玩家取消";
							break;
						default :
							$rounds = "其他";	
					}
					


					\App\Models\GameRecord::create([
									'billNo' => $v['fID'],//ID
									'fOrderID' => $v['fOrderID'],//游戏ID
									'playerName' => $v['fMemberAccount'],//玩家帐号
									'betAmount' => $v['fBetAmount'],//下注金额
									'validBetAmount' => $v['fValBetAmount'],//实际下注金额
									'netAmount' => $v['WinLoss'],//输赢金额
									'gameCode' => $v['fGameCode'],//游戏代码
									'betTime' => $v['fOrderDate'],//游戏时间
									'gameType' => $fGameType,//类型
									'fResultContent' => $v['fResultContent'],//结果	
									'remark' => $v['fLeagueID'],//联赛ID
									'gamename' => $v['fGameName'],//游戏名称
									'stringex' => $v['fBetContent'],//下注内容	
									//'BetAlias' => $v['fBetAlias'],//下注玩法
									'fExpect' => $v['fExpect'],//下注期号							
									'round' => $rounds,//状态
									'api_type' => $api_mod->id,//接口ID
									'name' => $v['fMemberAccount'],//玩家帐号
									'member_id' => $m?$m->id:0,//游戏代码
									'result' => json_encode($v)
					]);
								$m->decrement('ml_money', floatval($v['fValBetAmount']));//增加码量
							}

						}
					}
				}
			}
			exit(json_encode(array('count'=>$count)));
		}
	}
	exit(json_encode(array('count'=>0)));
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
	<script src="{{ asset('/node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <style type="text/css">
        body,td,th {
            font-size: 12px;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<script>

	
	var wait=25;
	function time() {
	  if (wait == 0) {
       reloadcj();
	   wait = 60;
	   time();
	  } else { 
	  
	   $('#timeinfo').text(wait + "秒后自动获取!");
	   wait--;
	   setTimeout(function() {
		time()
	   },
	   1000)
	  }
	 }
	
	
	
	var page=0;
    function reloadcj(){
		$.ajax({
             type: "POST",
             url: "",
             data: {page:page},
             dataType: "json",
             success: function(data){
                         if(data.count>=200){
							 page++;
						 }else{
							 page=0;
						 }
						 $('em:first').text(data.count);
                }
         });
	}
	time();

</script>
<table width="100%"border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <input type=button name=button value="刷新" onClick="reloadcj()">
            申博私网:成功采集到<em></em>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
