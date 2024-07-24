<!--登录模态框-->
<div id="login" class="modal modal-login">
    <div class="modal-content">
        <form method="POST" action="<?php echo e(route('member.login.post')); ?>">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>用户登录</h2>
                <div class="modal-login_line">
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                </div>
                <div class="modal-login_line">
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                </div>
                <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div>
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">登录</button>
                </div>
                <div class="modal-login_link clear">
                    <p class="pullRight">
                        还没有账号？
                        <a href="<?php echo e(route('web.register_one')); ?>">点击注册</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
<!--半透明遮罩层-->
<div class="backdrop"></div>


<div class="header">
    <div class="container">
        <div class="header_hd clear">
            <div class="pullLeft" style="padding-left: 50px;line-height: 22px;">
                <a href="javascript:;" class="lang"></a>
                <a href="javascript:;" class="lang" style="background-position: center -41px"></a>
                <a href="javascript:;" class="lang" style="background-position: center -81px"></a>
                <span style="margin-left: 10px;">美东时间: <em id="mdtime"></em></span>
                
                
                
                
                
            </div>
            <div class="pullRight">
                <a href="javascript:;" style="max-width: none">菲律宾国际热线 : <?php echo e($_system_config->phone1); ?></a>&nbsp;
                
                
            </div>
        </div>
        <div class="header_bd clear">
            <a href="" class="pullLeft header-logo">
                <img src="<?php echo e($_system_config->site_logo); ?>" alt="">
            </a>
            <div class="login-warp pullRight">
                <?php if(Auth::guard('member')->guest()): ?>
                    <form method="POST" action="<?php echo e(route('member.login.post')); ?>" class="clear">
                        <div class="pullLeft">
                        <a href="<?php echo e(route('web.register_one')); ?>" class="header-join"></a>
                        </div>
                        <div class="pullLeft login-area">
                            <div class="login-unit login-unit-user">
                                <input type="text" placeholder="用户名" name="name">
                            </div>
                            <div class="login-unit login-unit-psw">
                                <input type="password" placeholder="密码" name="password">
                            </div>
                            <div class="login-unit login-unit-chk">
                                <input type="text" placeholder="验证码" name="captcha">
                                <a class="vPic" onclick="javascript:re_captcha_re();" >
                                <img src="<?php echo e(URL('kit/captcha/1')); ?>" id="c2c98f0de5a04167a9e427d883690ff11"
                                     height="100%">
                                </a>
                                <script>
                                    function re_captcha_re() {
                                        $url = "<?php echo e(URL('kit/captcha')); ?>";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff11').src=$url;
                                    }
                                </script>
                            </div>
                            <!--<a href="javascript:window.open('<?php echo e($_system_config->service_link); ?>','','width=1024,height=768');" class="forget-pw">忘记密码</a>-->
  
                            <input type="button" value="" class="login-submit ajax-submit-btn">
                        </div>
                    </form>
                <?php else: ?>
                    <div class="isLogin clear">
                        <div class="mem-info">
                            账号：<?php echo e($_member->name); ?>&nbsp;&nbsp;&nbsp;余额：<strong class="money"><?php echo e($_member->money); ?></strong>元&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">登出</a>
                            <form id="logout-form" action="<?php echo e(route('member.logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </div>
                        <div class="SU-Menual-box">
                            <div class="SU-Menual">
                                <ul>
                                    <?php if($_system_config ->is_new_center == 1): ?>
                                        <li><a href="<?php echo e(route('member.userCenter')); ?>">会员中心</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo e(route('member.userCenter')); ?>">会员中心</a></li>
                                    <li><a href="<?php echo e(route('member.finance_center')); ?>">线上存款</a></li>
                                    <li><a href="<?php echo e(route('member.member_drawing')); ?>">线上取款</a></li>
                                    <li><a href="<?php echo e(route('member.indoor_transfer')); ?>">接口余额</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="header_ft">
            <div class="mainnav">
                <ul class="clear">
                    <li <?php if($web_route == 'web.index'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.index')); ?>">
                            首页
                            <span>Home</span>
                        </a>
                    </li>
                    <li <?php if($web_route == 'web.eGame'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.eGame')); ?>" class="header_slideDown">
                            電子游艺
                            <span>CASINO</span>
                        </a>
                        
                            
                            
                            
                            
                            
                            
                            
                        
                    </li>
                    <li <?php if($web_route == 'web.catchFish'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.catchFish')); ?>" class="header_slideDown">
                            捕魚游戏
                            <span>CASINO</span>
                        </a>
                        
                            
                               
                            
                               
                        
                    </li>
                    <li <?php if($web_route == 'web.liveCasino'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.liveCasino')); ?>" class="header_slideDown">
                            視訊直播
                            <span>LIVE CASINO</span>
                        </a>
                        
                            
                               
                            
                               
                            
                               
                            
                               
                            
                               
                            
                               
                            
                               
                            
                               
                        
                    </li>
                    <li <?php if($web_route == 'web.esports'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.esports')); ?>" class="header_slideDown">
                            體育赛事
                            <span>SPORTS</span>
                        </a>
                        
                            
                               
                            
                               
                        
                    </li>
                    <li <?php if($web_route == 'web.lottory'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.lottory')); ?>">
                            彩票游戏
                            <span>LOTTERY</span>
                        </a>
                        
                            
                               
                            
                               
                        
                    </li>
                    <li <?php if($web_route == 'web.poker'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.poker')); ?>">
                            棋牌游戏
                            <span>POKER</span>
                        </a>
                    </li>
                    <li <?php if($web_route == 'web.activityList'): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e(route('web.activityList')); ?>">
                            优惠活动
                            <span>LOTTERY</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="hb_in">
    <a href="<?php echo e(route('web.red')); ?>" target="_blank">
        <img src="<?php echo e(asset('/web/images/hb_in.png')); ?>" alt="">
    </a>
</div>
<script>
    <?php if(!Auth::guard('member')->guest()): ?>
    <?php if($_member->is_trans_on == 1): ?>
    $(function () {
        $.ajax({
            type:'post',
            url : "<?php echo e(route('member.api.wallet_balance')); ?>",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    <?php endif; ?>
    <?php endif; ?>
</script>