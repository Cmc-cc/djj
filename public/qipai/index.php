<?php
$json=file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/checkqipai');
$list=json_decode($json,1);

?>
<!DOCTYPE html>
<html>

<title>棋牌游戏</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
 
    <link rel="stylesheet" type="text/css" href="css/default.css-v=888.css" />
    <link rel="stylesheet" type="text/css" href="css/fishGameLobby.css-v=003.css"  />
    <script type="text/javascript" src="css/jquery18.js"></script>
  </head>




</script>

    <div class="banner pok-banner"><div class="chess-img"></div></div>
    <div class="pok-tab">
      <div class="pok-tab-in j-pok-tab">
          <?php if($list['KY']){ ?>
          <span class="on">开元棋牌</span>
		  <?php } ?>
		  <?php if($list['WGQP']){ ?>
          <span>WG棋牌</span>
		  <?php } ?>
		  <?php if($list['TH']){ ?>	
			 <span>天豪棋牌</span>
		  <?php } ?>
		  <?php if($list['761']){ ?>
          <span>761棋牌</span>
		  <?php } ?>
		  <?php if($list['MT']){ ?>
          <span>MT棋牌</span>
		  <?php } ?>
		  <?php if($list['JS']){ ?>
		   <span>金龙棋牌</span>
		   <?php } ?>
		  <?php if($list['SW']){ ?>
		    <span>双赢棋牌</span>
		  <?php } ?>
		  
		  <?php if($list['NW']){ ?>	 
			  <span>NW棋牌</span>
		  <?php } ?>
		  <?php if($list['NEWVG']){ ?>	  
			  <span>财神棋牌</span>
		  <?php } ?>
	      <?php if($list['AS']){ ?>	  
			  <span>天发棋牌</span>
		  <?php } ?>
	      <?php if($list['AS']){ ?>	  
			  <span>欢乐棋牌</span>
		  <?php } ?>
	      <?php if($list['IMQP']){ ?>	  
			  <span>IM棋牌</span>
		  <?php } ?>
	      <?php if($list['LEG']){ ?>	  
			  <span>乐游棋牌</span>
		  <?php } ?>
		   <?php if($list['DSQP']){ ?>	  
			  <span>DS棋牌</span>
		  <?php } ?>	
		   <?php if($list['FG']){ ?>	  
			  <span>FG棋牌</span>
		  <?php } ?>	
		  
	      <?php if($list['YG']){ ?>	  
			  <span>王者棋牌</span>
		  <?php } ?>
	      <?php if($list['GG']){ ?>	  
			  <span>GG棋牌</span>
		  <?php } ?>
	      
			  <!-- <span>无双棋牌</span>-->
			  
      </div>
    </div>
    <div class="pokGameList wrapper">
	  <?php if($list['KY']){ ?>
      <ul class="clearfix kaiyuan-chess">
        <li>
            <img src="ky/抢庄牛牛.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-抢庄牛牛</p>
              <a href="/ky/playGame?gamename=830" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/炸金花.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-炸金花</p>
            <a href="/ky/playGame?gamename=220" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/极速炸金花.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-极速炸金花</p>
               <a href="/ky/playGame?gamename=230" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/德州扑克.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-德州扑克</p>
               <a href="/ky/playGame?gamename=620" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/通比牛牛.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-通比牛牛</p>
               <a href="/ky/playGame?gamename=870" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/二八杠.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-二八杠</p>
               <a href="/ky/playGame?gamename=720" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/抢庄牌九.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-抢庄牌九</p>
               <a href="/ky/playGame?gamename=730" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/三公.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-三公</p>
               <a href="/ky/playGame?gamename=860" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>      
        
        <li>
            <img src="ky/十三水.jpg"   alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-十三水</p>
               <a href="/ky/playGame?gamename=630" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/斗地主.jpg"   alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-斗地主</p>
               <a href="/ky/playGame?gamename=610" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="ky/押庄龙虎.png"  alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-押庄龙虎</p>
               <a href="/ky/playGame?gamename=900" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>        
        <li>
            <img src="ky/21点.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>开元棋牌-二十一点</p>
               <a href="/ky/playGame?gamename=600" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
     <!--  761棋牌---->
      </ul>
	  <?php } ?>
	   <?php if($list['TH']){ ?>
	  <!---th天豪棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="wgqp/wgqplobby.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>WG棋牌-游戏大厅</p>
               <a href="/wgqp/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
    
          
    
     
      </ul>
	  <?php } ?>
	   <?php if($list['TH']){ ?>
	  <!---th天豪棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="th/抢庄牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-抢庄牛牛</p>
               <a href="/th/playGame?gamename=srnn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/炸金花.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-炸金花</p>
               <a href="/th/playGame?gamename=ysz" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/通比牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-通比牛牛</p>
               <a href="/th/playGame?gamename=tbnn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/对战牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-对战牛牛</p>
               <a href="/th/playGame?gamename=dznn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/运气牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-运气牛牛</p>
               <a href="/th/playGame?gamename=bbnn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/火拼牌九.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-火拼牌九</p>
               <a href="/th/playGame?gamename=two2p" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/看牌抢牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-看牌抢牛</p>
               <a href="/th/playGame?gamename=djnn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/通杀牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-通杀牛牛</p>
               <a href="/th/playGame?gamename=jqnn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/通比梭哈.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-通比梭哈</p>
               <a href="/th/playGame?gamename=tbwz" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/16人极速三张.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-16 人极速三张</p>
               <a href="/th/playGame?gamename=TBSZ16" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/十三张.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-十三张</p>
               <a href="/th/playGame?gamename=ssz" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/德州扑克.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-德州扑克</p>
               <a href="/th/playGame?gamename=holdem" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/斗地主.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-斗地主</p>
               <a href="/th/playGame?gamename=ddz" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/四人五张.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-四人五张</p>
               <a href="/th/playGame?gamename=gswz2sr" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/百人牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-百人牛牛</p>
               <a href="/th/playGame?gamename=brnn" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/百人牌九.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-百人牌九</p>
               <a href="/th/playGame?gamename=lz2" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
            <img src="th/百家乐.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天豪棋牌-百家乐</p>
               <a href="/th/playGame?gamename=bjl" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
    
     
      </ul>
	  <?php } ?>
	  <?php if($list['761']){ ?>
      <ul class="clearfix 761-chess" style="display:none;">
        <li>
            <img src="761/dzpk-1.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-德州扑克</p>
               <a href="/761/playGame?gamename=texas" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/jd_m.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-经典牛牛</p>
               <a href="/761/playGame?gamename=bull/rand" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/kp_m.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-牛牛看牌抢庄</p>
               <a href="/761/playGame?gamename=bull/rob" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/tb_m.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-通比牛牛</p>
               <a href="/761/playGame?gamename=bull/fair" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/qz_m.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-抢庄牛牛</p>
               <a href="/761/playGame?gamename=bull/mrob" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>

        <li>
            <img src="761/fqzs.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-飞禽走兽</p>
               <a href="/761/playGame?gamename=830" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/hlssm.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-欢乐三十秒</p>
               <a href="/761/playGame?gamename=830" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/brnn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-百人牛牛</p>
               <a href="/761/playGame?gamename=hundredbull" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/zjh-1.jpg"  alt="" />
            <div class="mask-title j-mask-title">
              <p>761-炸金花</p>
               <a href="/761/playGame?gamename=baccarat" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/lh.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-龙虎</p>
               <a href="/761/playGame?gamename=doratora" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="761/bcbm.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-奔驰宝马</p>
               <a href="/761/playGame?gamename=carbrand" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>		
		 <li>
            <img src="761/bcbm.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-28杠</p>
               <a href="/761/playGame?gamename=g28" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		 <li>
            <img src="761/bcbm.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>761-金蟾捕鱼</p>
               <a href="/761/playGame?gamename=jcby" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>

      </ul>
	  <?php } ?>
	  <?php if($list['MT']){ ?>
      <!--  MT棋牌---->
      <ul class="clearfix 761-chess" style="display:none;">
        <li>
            <img src="mt/2rnn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-二人牛牛</p>
               <a href="/mt/playGame?gamename=IMBG40003" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/2rsh.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-二人梭哈</p>
               <a href="/mt/playGame?gamename=IMBG40009" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="mt/5rnn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-五人牛牛</p>
               <a href="/mt/playGame?gamename=IMBG40001" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
         <li>
            <img src="mt/13s.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-13水</p>
               <a href="/mt/playGame?gamename=IMBG40004" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
         <li>
            <img src="mt/28g.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-28杠</p>
               <a href="/mt/playGame?gamename=IMBG40027" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
         <li>
            <img src="mt/attjhg.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-ATT金皇冠</p>
               <a href="/mt/playGame?gamename=IMBG40021" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="mt/bjl.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-百家乐</p>
               <a href="/mt/playGame?gamename=IMBG40012" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
       <li>
            <img src="mt/brnn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-百人牛牛</p>
               <a href="/mt/playGame?gamename=IMBG40011" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>        
		<li>
            <img src="mt/ddz.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-斗地主</p>
               <a href="/mt/playGame?gamename=IMBG40007" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/tbnn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-通比牛牛</p>
               <a href="/mt/playGame?gamename=IMBG40002" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
			<li>
            <img src="mt/ZJH.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-扎金花</p>
               <a href="/mt/playGame?gamename=IMBG40005" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/dmgsgj.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-大满贯水果机</p>
               <a href="/mt/playGame?gamename=IMBG40026" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/dzpk.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-德州扑克</p>
               <a href="/mt/playGame?gamename=IMBG40006" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/cjdh.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-超级大亨</p>
               <a href="/mt/playGame?gamename=IMBG40020" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/fqzs.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-飞禽走兽</p>
               <a href="/mt/playGame?gamename=IMBG40015" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
		<li>
            <img src="mt/gssm.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-港式赛马</p>
               <a href="/mt/playGame?gamename=IMBG40019" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
		<li>
            <img src="mt/hcpy.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-赛车飘移</p>
               <a href="/mt/playGame?gamename=IMBG40013" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
		<li>
            <img src="mt/dzpk.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-德州扑克</p>
               <a href="/mt/playGame?gamename=IMBG40006" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
		<li>
            <img src="mt/hhdz.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-红黑大战</p>
               <a href="/mt/playGame?gamename=IMBG40010" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/hjk.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-黑杰克</p>
               <a href="/mt/playGame?gamename=IMBG40008" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/hxth.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-五星同辉</p>
               <a href="/mt/playGame?gamename=IMBG40016" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/jcby.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-金蚕捕鱼</p>
               <a href="/mt/playGame?gamename=IMBG40025" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/jsys.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-金鲨银鲨</p>
               <a href="/mt/playGame?gamename=IMBG40017" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/hhdz.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-红黑大战</p>
               <a href="/mt/playGame?gamename=IMBG40010" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/lhd.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-龙虎斗</p>
               <a href="/mt/playGame?gamename=IMBG40014" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/lkby.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-李逵劈鱼</p>
               <a href="/mt/playGame?gamename=IMBG40024" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/sgj.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-水果机</p>
               <a href="/mt/playGame?gamename=IMBG40022" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/lkby.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-李逵劈鱼</p>
               <a href="/mt/playGame?gamename=IMBG40024" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/shz.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-水浒传</p>
               <a href="/mt/playGame?gamename=IMBG40023" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
		<li>
            <img src="mt/tsctg.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-泰山天关</p>
               <a href="/mt/playGame?gamename=IMBG40010" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="mt/xyzb.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>MT-西游争霸</p>
               <a href="/mt/playGame?gamename=IMBG40018" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <!--  金龙棋牌---->
      </ul>
	  <?php } ?>
	  <?php if($list['JS']){ ?>
      <ul class="clearfix 761-chess" style="display:none;">
        <li>
            <img src="jl/2rmj.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-二人麻将</p>
               <a href="/js/playGame?gamename=370" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/3dlp.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-3D轮盘</p>
               <a href="/js/playGame?gamename=369" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/28g.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-28杠</p>
               <a href="/js/playGame?gamename=351" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/bcbm.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-奔驰宝马</p>
               <a href="/js/playGame?gamename=321" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/bjl.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-百家乐</p>
               <a href="/js/playGame?gamename=368" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/dbdz.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-多宝德州</p>
               <a href="/js/playGame?gamename=354" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/dzpk.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-德州扑克</p>
               <a href="/js/playGame?gamename=345" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/hwby.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-海王捕鱼</p>
               <a href="/js/playGame?gamename=327" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/jjhl.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-红楼街机</p>
               <a href="/js/playGame?gamename=333" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/qznn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-抢庄牛牛</p>
               <a href="/js/playGame?gamename=371" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/sgj.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-水果机</p>
               <a href="/js/playGame?gamename=323" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/tbnn.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-通比牛牛</p>
               <a href="/js/playGame?gamename=346" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/wxth.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-五星同辉</p>
               <a href="/js/playGame?gamename=330" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/3dlp.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-3D轮盘</p>
               <a href="/js/playGame?gamename=369" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/xy6bjl.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-幸运6百家乐</p>
               <a href="/js/playGame?gamename=368" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="jl/xzmj.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-血战麻将</p>
               <a href="/js/playGame?gamename=366" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
       <li>
            <img src="jl/zjh.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>金龙棋牌-扎金花</p>
               <a href="/js/playGame?gamename=350" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		

      </ul>
	  <?php } ?>
	  <?php if($list['SW']){ ?>
	  <!---SW双赢--->
	   <ul class="clearfix sw-chess" style="display:none;">
        <li>
            <img src="sw/IMBG60001.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-炸金花</p>
               <a href="/sw/playGame?gamename=IMBG60001" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
        <li>
            <img src="sw/IMBG60002.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-极速炸金花</p>
               <a href="/sw/playGame?gamename=IMBG60002" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>-->
         <li>
            <img src="sw/IMBG60003.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-德州扑克</p>
               <a href="/sw/playGame?gamename=IMBG60003" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60006.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-百人德州</p>
               <a href="/sw/playGame?gamename=IMBG60006" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60004.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-看牌抢庄牛牛</p>
               <a href="/sw/playGame?gamename=IMBG60004" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60007.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-百人牛牛</p>
               <a href="/sw/playGame?gamename=IMBG60007" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60008.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-通比牛牛</p>
               <a href="/sw/playGame?gamename=IMBG60008" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60010.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-二人斗地主</p>
               <a href="/sw/playGame?gamename=IMBG60010" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60013.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-二人麻将</p>
               <a href="/sw/playGame?gamename=IMBG60013" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60014.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-三公</p>
               <a href="/sw/playGame?gamename=IMBG60014" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60015.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-百人龙虎</p>
               <a href="/sw/playGame?gamename=IMBG60015" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60016.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-百人炸金花</p>
               <a href="/sw/playGame?gamename=IMBG60016" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60017.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-百家乐</p>
               <a href="/sw/playGame?gamename=IMBG60017" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60018.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-十三水</p>
               <a href="/sw/playGame?gamename=IMBG60018" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		  <li>
            <img src="sw/IMBG60019.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-二八杠</p>
               <a href="/sw/playGame?gamename=IMBG60019" target="_blank"><em></em>进入游戏</a>
           </div>
        </li>
		  <li>
            <img src="sw/IMBG60020.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-港式五张</p>
               <a href="/sw/playGame?gamename=IMBG60020" target="_blank"><em></em>进入游戏</a>
          </div>
        </li>
		  <li>
		 <img src="sw/IMBG60021.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-二十一点</p>
               <a href="/sw/playGame?gamename=IMBG60021" target="_blank"><em></em>进入游戏</a>
           </div>
        </li>
		  <li>
		<img src="sw/IMBG60022.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>双赢棋牌-抢庄牌九</p>
               <a href="/sw/playGame?gamename=IMBG60022" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
      </ul>
	  <?php } ?>
	 
	  <?php if($list['NW']){ ?>
	   <!---NW新世界棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="nw/德州扑克.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-德州扑克</p>
               <a href="/nw/playGame?gamename=620" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
	  <img src="nw/28杠.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-二八杠</p>
               <a href="/nw/playGame?gamename=720" target="_blank"><em></em>进入游戏</a>
		     </div>
        </li>
      <li>
            <img src="nw/抢庄牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-抢庄牛牛</p>
               <a href="/nw/playGame?gamename=830" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
      <li>
            <img src="nw/炸金花.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-炸金花</p>
               <a href="/nw/playGame?gamename=220" target="_blank"><em></em>进入游戏</a>
            </div>
			
        </li>
      <li>
            <img src="nw/三公.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-三公</p>
               <a href="/nw/playGame?gamename=860" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/龙虎斗.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-龙虎斗</p>
               <a href="/nw/playGame?gamename=900" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/21点.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-21 点</p>
               <a href="/nw/playGame?gamename=600" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/通比牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-通比牛牛</p>
               <a href="/nw/playGame?gamename=870" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/牌九.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-抢庄牌九</p>
               <a href="/nw/playGame?gamename=730" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/斗地主.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-斗地主</p>
               <a href="/nw/playGame?gamename=610" target="_blank"><em></em>进入游戏</a>
            </div>
		 </li> 
		  <li>
            <img src="nw/极速炸金花.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-极速炸金花</p>
               <a href="/nw/playGame?gamename=230" target="_blank"><em></em>进入游戏</a>
            </div>
			
        </li> 
		  <li>
            <img src="nw/十三水.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-十三水</p>
               <a href="/nw/playGame?gamename=630" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/幸运五张.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-幸运五张</p>
               <a href="/nw/playGame?gamename=380" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/百家乐.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-百家乐</p>
               <a href="/nw/playGame?gamename=910" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/森林舞会.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-森林舞会</p>
               <a href="/nw/playGame?gamename=920" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/新斗地主.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-新斗地主</p>
               <a href="/nw/playGame?gamename=680" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="nw/抢庄骰宝.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>新世界棋牌-抢庄骰宝</p>
               <a href="/nw/playGame?gamename=550" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
    
     
      </ul>
	  <?php } ?>
	  <?php if($list['NEWVG']){ ?>
	   <!---VG棋牌棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="vg/斗地主.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-斗地主</p>
               <a href="/newvg/playGame?gamename=1" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
	  <img src="vg/抢庄牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-抢庄牛牛</p>
               <a href="/newvg/playGame?gamename=3" target="_blank"><em></em>进入游戏</a>
		     </div>
        </li>
      <li>
            <img src="vg/百人牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-百人牛牛</p>
               <a href="/newvg/playGame?gamename=4" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
      <li>
            <img src="vg/多财多福.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-多财多福</p>
               <a href="/newvg/playGame?gamename=6" target="_blank"><em></em>进入游戏</a>
            </div>
			
        </li>
      <li>
            <img src="vg/竞咪楚汉德州.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-竞咪楚汉德州</p>
               <a href="/newvg/playGame?gamename=7" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="vg/加倍斗地主.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-加倍斗地主</p>
               <a href="/newvg/playGame?gamename=9" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="vg/保险楚汉德州.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-保险楚汉德州</p>
               <a href="/newvg/playGame?gamename=10" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="vg/血战麻将.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-血战麻将</p>
               <a href="/newvg/playGame?gamename=11" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="vg/炸金花.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-炸金花</p>
               <a href="/newvg/playGame?gamename=12" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="vg/必下德州.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-必下德州</p>
               <a href="/newvg/playGame?gamename=13" target="_blank"><em></em>进入游戏</a>
            </div>
		 </li> 
		  <li>
            <img src="vg/十三水.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>VG财神棋牌-十三水</p>
               <a href="/newvg/playGame?gamename=15" target="_blank"><em></em>进入游戏</a>
            </div>
	    </li>  	
      </ul>
	  <?php } ?>
	   <?php if($list['AS']){ ?>
	   <!---天发棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="as/aslobby.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>天发棋牌-大厅</p>
               <a href="/as/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
      </ul>
	  <?php } ?>
	   <?php if($list['HG']){ ?>
	   <!---欢乐棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="hg/hglobby.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>欢乐棋牌-大厅</p>
               <a href="/hg/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
      </ul>
	  <?php } ?>
	   <?php if($list['IMQP']){ ?>
	   <!---IM棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="im/imlobby.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>IM棋牌-大厅</p>
               <a href="/imqp/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
      </ul>
	  <?php } ?>
	   <?php if($list['LEG']){ ?>
	   <!---乐游棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="leg/leglobby.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>乐游棋牌-大厅</p>
               <a href="/leg/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
      </ul>
	  <?php } ?>
	   <?php if($list['DSQP']){ ?>
	   <!---DS棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="ds/海霸王.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-大厅</p>
               <a href="/dsqp/playGame?gamename=1001" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/海霸王.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-吃我一炮</p>
               <a href="/dsqp/playGame?gamename=1002" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/金牌龙虎.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-金牌龙虎</p>
               <a href="/dsqp/playGame?gamename=2001" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/百人牛牛.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-百人牛牛</p>
               <a href="/dsqp/playGame?gamename=2002" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/炸金花.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-炸金花</p>
               <a href="/dsqp/playGame?gamename=2003" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/海霸王.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-大厅</p>
               <a href="/dsqp/playGame?gamename=1001" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/二八杠.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-二八杠</p>
               <a href="/dsqp/playGame?gamename=2004" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/三公.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-三公</p>
               <a href="/dsqp/playGame?gamename=2005" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/百家乐.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-百家乐</p>
               <a href="/dsqp/playGame?gamename=2006" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/十三水.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-十三水</p>
               <a href="/dsqp/playGame?gamename=2007" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
		<li>
            <img src="ds/二十一点.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-二十一点</p>
               <a href="/dsqp/playGame?gamename=2008" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/抢红包.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-抢红包</p>
               <a href="/dsqp/playGame?gamename=2010" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		<li>
            <img src="ds/抢庄牛牛.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>DS棋牌-抢庄牛牛</p>
               <a href="/dsqp/playGame?gamename=2011" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
		
      <li>
      </ul>
	  <?php } ?>
	  <?php if($list['FG']){ ?>
	   <!---FG棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
       
		 <li>
            <img src="fg/6703乐斗牛魔王.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-乐斗牛魔王3D</p>
               <a href="/fg/playGame?gamename=ldnmw3D" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6702欢乐麻将3D.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-欢乐麻将3D</p>
               <a href="/fg/playGame?gamename=hlmj3D" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6701抢庄牛牛3D.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-抢庄牛牛3D</p>
               <a href="/fg/playGame?gamename=qznn3d" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6508扫雷红包.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-扫雷红包</p>
               <a href="/fg/playGame?gamename=slhb" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6507五星宏辉.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-五星宏辉</p>
               <a href="/fg/playGame?gamename=wxhh" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/601021点.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-21点</p>
               <a href="/fg/playGame?gamename=bj" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6667欢乐麻将.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-欢乐麻将</p>
               <a href="/fg/playGame?gamename=xzdd" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6667欢乐麻将.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-欢乐麻将</p>
               <a href="/fg/playGame?gamename=ldnmw3D" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6505欢乐红包.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-欢乐红包</p>
               <a href="/fg/playGame?gamename=hlhb" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6666欢乐德州.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-欢乐德州</p>
               <a href="/fg/playGame?gamename=iPoker" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6014极速炸金花.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-极速炸金花</p>
               <a href="/fg/playGame?gamename=jszjh" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6013抢庄牌九.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-抢庄牌九</p>
               <a href="/fg/playGame?gamename=qzpj" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6012二八杠.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-二八杠</p>
               <a href="/fg/playGame?gamename=ebg" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6011十三水.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-十三水</p>
               <a href="/fg/playGame?gamename=sss" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6703乐斗牛魔王.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-乐斗牛魔王3D</p>
               <a href="/fg/playGame?gamename=ldnmw3D" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6504通比牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-通比牛牛</p>
               <a href="/fg/playGame?gamename=tbnn" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6303梭哈.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-梭哈</p>
               <a href="/fg/playGame?gamename=ShowHand" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6302经典炸金花.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-经典炸金花</p>
               <a href="/fg/playGame?gamename=zjhdr" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6301斗地主.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-斗地主</p>
               <a href="/fg/playGame?gamename=ddz" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6502三公.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-三公</p>
               <a href="/fg/playGame?gamename=csg" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6501抢庄牛牛.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-抢庄牛牛</p>
               <a href="/fg/playGame?gamename=cqznn" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6007二人麻将.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-二人麻将</p>
               <a href="/fg/playGame?gamename=mj" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		<li>
            <img src="fg/6009德州牛仔.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>FG棋牌-德州牛仔</p>
               <a href="/fg/playGame?gamename=TexasCb" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
		
		
      <li>
      </ul>
	  <?php } ?>
	  
	   <?php if($list['YG']){ ?>
	   <!---IM棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="yg/yglobby.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>王者棋牌-大厅</p>
               <a href="/yg/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
      </ul>
	  <?php } ?>
	   <?php if($list['GG']){ ?>
	   <!---IM棋牌--->
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="gg/gglobby.jpg" alt="" />
            <div class="mask-title j-mask-title">
              <p>GG棋牌-大厅</p>
               <a href="/gg/playGame" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
      </ul>
	  <?php } ?>
	  
	  
      </ul>
        
   <!--</ul>		
     <!---无双棋牌--
	   <ul class="clearfix th-chess" style="display:none;">
        <li>
            <img src="ws/5001.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-捕鱼一分场</p>
               <a href="/ws/playGame?gamename=5001" target="_blank"><em></em>进入游戏</a>
            </div>
        </li>
      <li>
	  <img src="ws/5002.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-捕鱼一角场</p>
               <a href="/ws/playGame?gamename=5002" target="_blank"><em></em>进入游戏</a>
		     </div>
        </li>
      <li>
            <img src="ws/5003.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-捕鱼一元场</p>
               <a href="/ws/playGame?gamename=5003" target="_blank"><em></em>进入游戏</a>
              </div>
        </li>
      <li>
            <img src="ws/5004.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-捕鱼试玩场</p>
               <a href="/ws/playGame?gamename=5004" target="_blank"><em></em>进入游戏</a>
            </div>
			
        </li>
      <li>
            <img src="ws/ws01.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-无双牛牛</p>
               <a href="/ws/playGame?gamename=ws01" target="_blank"><em></em>进入游戏</a>
            </div>        
		  <li>
            <img src="ws/ws02.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-通比牛牛</p>
               <a href="/ws/playGame?gamename=ws02" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="ws/ws04.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-金皇冠</p>
               <a href="/ws/playGame?gamename=ws04" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="ws/ws03.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-炸金花</p>
               <a href="/ws/playGame?gamename=ws03" target="_blank"><em></em>进入游戏</a>
            </div>
        </li> 
		  <li>
            <img src="ws/ws00.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-无双大厅</p>
               <a href="/ws/playGame?gamename=ws00" target="_blank"><em></em>进入游戏</a>
            </div>
		 </li> 
		  <li>
            <img src="ws/ws08.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-时时彩牛牛</p>
               <a href="/ws/playGame?gamename=ws08" target="_blank"><em></em>进入游戏</a>
            </div>
	    </li> 
		<li>
            <img src="ws/ws09.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-时时彩港五</p>
               <a href="/ws/playGame?gamename=ws09" target="_blank"><em></em>进入游戏</a>
            </div>
	    </li> 
		<li>
            <img src="ws/ws07.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-百家乐</p>
               <a href="/ws/playGame?gamename=ws07" target="_blank"><em></em>进入游戏</a>
            </div>
	    </li> 
		<li>
            <img src="ws/ws06.png" alt="" />
            <div class="mask-title j-mask-title">
              <p>无双棋牌-港式五张</p>
               <a href="/ws/playGame?gamename=ws06" target="_blank"><em></em>进入游戏</a>
            </div>
	    </li> -->
    </div>

<style type="text/css">
    * {
        margin: 0;
        padding: 0;

    }

    #phone-box {
        border-radius: 10px;
        overflow: hidden;
        height: 270px;
    }

    #phoneModel * {
        box-sizing: border-box;
        color: #333;
    }

    .phone-box-out .closebg {
        background: #3198f7;
    }

    #phoneModel .tc {
        text-align: center;
    }

    #phoneModel {
        position: relative;
        display: block;
        width: 540px;
    }

    #phoneDrag {
        background: #3198f7 url("/tel.png") no-repeat 195px center;
        height: 70px;
        line-height: 70px;
        color: #fff;
        text-align: center;
        font-size: 20px;
    }

    #phoneModel .phone-celle {
        width: 410px;
        margin: 50px auto 0;
        border: 1px solid #ffa60c;
        border-radius: 60px;
        position: relative;
    }

    #phoneModel .input_short {
        width: 310px;
        line-height: 47px;
        border: 0;
        text-indent: 14px;
        border-radius: 60px 0 0 60px;
        background: #ececec;
        color: #111;
        font-size: 16px;
    }

    #phoneModel .btn-number {
        position: absolute;
        top: 0;
        right: 0;
        display: inline-block;
        border-radius: 0 60px 60px 0;
        padding: 0 25px;
        font-size: 18px;
        font-weight: lighter;
        line-height: 47px;
        color: #fff;
        background: #ffa60c;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
    }

    #phoneModel .btn-number:hover {
        background: #df8e00;
    }

    #phoneModel .reg_tip {
        clear: both;
        position: relative;
        color: #8f816a;
        padding: 8px;
        font-size: 14px;
        margin: 0 56px;
    }

    #phoneModel .tishi_tip {
     padding: 0 8px;
        line-height: 27px;
        overflow: hidden;
        margin-right: 10px;
    }

    #phoneModel .reg_tip p {
        line-height: 1.6;
        color: #999;
    }

    #phoneModel .reg_tip .icon_tip {
        position: absolute;
        left: 8px;
        top: 8px;
        border: 4px solid #781803;
    }

    #phoneModel .reg_tip .icon_tip span {
        width: 44px;
        display: block;
        text-align: center;
        border: 1px solid #fff;
        background: #781803;
        color: #fff;
        padding: 5px 0;
        height: auto;
        line-height: 20px;
    }
</style>


<!--浮层-->
<div class="modal fade dialog_tip" id="j_pro_tip1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-logo"></div>
            <div class="modal-hd">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"></span>
                </button>
                <h4 class="modal-title text-center" id="promit-tit"></h4>
            </div>
            <div class="modal-bd">
                <div id="promit-mi" class="later"></div>
            </div>
        </div>

    </div>
</div>
  
    
    
</script>


<script async src="js-id=UA-89910754-1" ></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-89910754-1');
</script>
    <script>
    	
    function showLogo2(){
        $('.chess-img').toggleClass('on');
    }
    setInterval(showLogo2,1000);
    //j-pok-tab
    var $tab_li = $('.j-pok-tab span');
    $tab_li.click(function(){
    $(this).addClass('on').siblings().removeClass('on');
    var index = $tab_li.index(this);
    $('.pokGameList ul').eq(index).show().siblings().hide();
    });

    </script>
    

  </body>

</html>