<?php
Route::group(['domain' => env('ADMIN_URL')],function ($router) {$router->get('/', 'Admin\AuthController@getLogin')->name('admin.init');});
Route::group(['domain' => env('AGENT_URL')],function ($router) {$router->get('/', 'Daili\AuthController@getLogin')->name('daili.init');});
Route::get('/maintain', 'Web\IndexController@maintain')->name('web.maintain');
Route::group(['prefix' => 'm','namespace' => 'Wap', 'middleware' => 'web.maintain'],function ($router)
{
    $router->get('membermoney', 'IndexController@membermoney')->name('wap.membermoney');
    $router->get('usdt', 'IndexController@usdt')->name('wap.usdt');
    $router->get('service', 'IndexController@service')->name('wap.service');
    $router->get('red','IndexController@red')->name('wap.red');
    $router->get('index_py', 'IndexController@index_py')->name('wap.index_py');
    $router->get('/', 'IndexController@index')->name('wap.index');
    $router->get('pt/live_game_list', 'IndexController@pt_live_game_list')->name('pt.live_game_list');
    $router->get('pt/rng_game_list', 'IndexController@pt_rng_game_list')->name('pt.rng_game_list');
    $router->get('png/rng_game_list', 'IndexController@png_rng_game_list')->name('png.rng_game_list');
    $router->get('ttg/rng_game_list', 'IndexController@ttg_rng_game_list')->name('ttg.rng_game_list');
    $router->get('gg/rng_game_list', 'IndexController@gg_rng_game_list')->name('gg.rng_game_list');
    $router->get('dt/rng_game_list', 'IndexController@dt_rng_game_list')->name('dt.rng_game_list');
    $router->get('cq9/rng_game_list', 'IndexController@cq9_rng_game_list')->name('cq9.rng_game_list');
    $router->get('login', 'LoginController@showLoginForm')->name('wap.login');
    $router->post('login', 'LoginController@postLogin')->name('wap.login.post');
    $router->get('msgcode', 'IndexController@msgcode')->name('wap.msgcode');
    $router->get('rmsgcode', 'LoginController@rmsgcode')->name('wap.rmsgcode');
    $router->any('logout', 'LoginController@logout')->name('wap.logout');
    $router->get('changelang', 'LoginController@changelang')->name('wap.changelang');
    $router->get('register', 'IndexController@register')->name('wap.register');
    $router->post('register', 'IndexController@postRegister')->name('wap.register.post');
    $router->get('ag/eGame_list', 'IndexController@ag_eGame_list')->name('wap.ag_eGame_list');
    $router->get('mg/eGame_list', 'IndexController@mg_eGame_list')->name('wap.mg_eGame_list');
    $router->get('nav', 'IndexController@nav')->name('wap.nav');
    $router->get('activity_list', 'IndexController@activity_list')->name('wap.activity_list');
    $router->get('activity_detail/{id}', 'IndexController@activity_detail')->name('wap.activity_detail');
    Route::group(['middleware' => 'auth.member:member'],function ($router){
        $router->get('userinfo', 'IndexController@userinfo')->name('wap.userinfo');
        $router->get('userinfo2', 'IndexController@userinfo2')->name('wap.userinfo2');
        $router->get('agent', 'IndexController@agent')->name('wap.agent');
        $router->get('agent_apply', 'IndexController@agent_apply')->name('wap.agent_apply');
        $router->post('agent_apply', 'IndexController@post_agent_apply')->name('wap.post_agent_apply');
        $router->get('set_phone', 'IndexController@set_phone')->name('wap.set_phone');
        $router->post('set_phone', 'IndexController@post_set_phone')->name('wap.post_set_phone');
        
        $router->get('bind_bank', 'IndexController@bind_bank')->name('wap.bind_bank');
        $router->post('bind_bank', 'IndexController@post_bind_bank')->name('wap.post_bind_bank');
        $router->get('drawing', 'IndexController@drawing')->name('wap.drawing');
        $router->post('drawing', 'IndexController@post_drawing')->name('wap.post_drawing');
		$router->get('fslog', 'IndexController@fslog')->name('wap.fslog');
        $router->get('drawing_record', 'IndexController@drawing_record')->name('wap.drawing_record');
        $router->get('game_record', 'IndexController@game_record')->name('wap.game_record');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
        $router->get('daili_money_log', 'IndexController@daili_money_log')->name('wap.daili_money_log');
        $router->get('member_offline', 'IndexController@member_offline')->name('wap.member_offline');
        $router->get('member_offline_recharge', 'IndexController@member_offline_recharge')->name('wap.member_offline_recharge');
        $router->get('member_offline_drawing', 'IndexController@member_offline_drawing')->name('wap.member_offline_drawing');
        $router->get('member_offline_sy', 'IndexController@member_offline_sy')->name('wap.member_offline_sy');
        $router->get('recharge', 'IndexController@recharge')->name('wap.recharge');
        $router->get('weixin_pay', 'IndexController@weixin_pay')->name('wap.weixin_pay');
        $router->post('weixin_pay', 'IndexController@post_weixin_pay')->name('wap.post_weixin_pay');
        $router->get('ali_pay', 'IndexController@ali_pay')->name('wap.ali_pay');
        $router->post('ali_pay', 'IndexController@post_ali_pay')->name('wap.post_ali_pay');
        $router->get('bank_pay', 'IndexController@bank_pay')->name('wap.bank_pay');
        $router->post('bank_pay', 'IndexController@post_bank_pay')->name('wap.post_bank_pay');
        $router->get('qq_pay', 'IndexController@qq_pay')->name('wap.qq_pay');
        $router->post('qq_pay', 'IndexController@post_qq_pay')->name('wap.post_qq_pay');
        $router->post('chongzhi', 'IndexController@chongzhi')->name('wap.chongzhi');
        $router->get('third_bank_pay', 'IndexController@third_bank_pay')->name('wap.third_bank_pay');
        $router->get('third_pay_scan', 'IndexController@third_pay_scan')->name('wap.third_pay_scan');
        $router->get('third_pay_app', 'IndexController@third_pay_app')->name('wap.third_pay_app');
        $router->get('recharge_record', 'IndexController@recharge_record')->name('wap.recharge_record');
        $router->get('recharge_record_api', 'IndexController@recharge_record_api')->name('wap.recharge_record_api');
        $router->get('reset_password', 'IndexController@reset_password')->name('wap.reset_password');
         $router->get('reset_password2', 'IndexController@reset_password2')->name('wap.reset_password2');
        $router->post('reset_login_password', 'IndexController@reset_login_password')->name('wap.reset_login_password');
        $router->post('reset_qk_password', 'IndexController@reset_qk_password')->name('wap.reset_qk_password');
        $router->get('transfer', 'IndexController@transfer')->name('wap.transfer');
        $router->post('transfer', 'IndexController@post_transfer')->name('wap.post_transfer');
        $router->get('transfer_record', 'IndexController@transfer_record')->name('wap.transfer_record');
        $router->get('msg', 'IndexController@msg')->name('wap.msg');
        $router->post('read', 'IndexController@readMessage')->name('wap.read');
        $router->post('del', 'IndexController@delMessage')->name('wap.del');
        $router->get('drawing_record_api', 'IndexController@drawing_record_api')->name('wap.drawing_record_api');
        $router->get('game_record_api', 'IndexController@game_record_api')->name('wap.game_record_api');
        
        
         $router->get('user_fsjl','IndexController@user_fsjl')->name('wap.user_fsjl');
         $router->get('user_fsjl_api','IndexController@user_fsjl_api')->name('wap.user_fsjl_api');
         $router->get('bindphone', 'IndexController@bindphone')->name('wap.bindphone');
    $router->post('bindphone', 'IndexController@postbindphone')->name('wap.bindphone.post');
    });
});
Route::group(['namespace' => 'Web', 'middleware' => 'web.maintain'],function ($router)
{
    Route::get('checkqipai', 'IndexController@checkqipai')->name('web.checkqipai');
    Route::get('upgrade','IndexController@upgrade')->name('web.upgrade');
    Route::get('/', 'IndexController@index')->name('web.index');
    Route::get('notice', 'IndexController@notice')->name('web.notice');
     Route::get('sport', 'IndexController@sport')->name('web.sport');
    Route::get('live', 'IndexController@live')->name('web.live');
    Route::get('e-battle', 'IndexController@ebattle')->name('web.e-battle');
    Route::get('keno', 'IndexController@keno')->name('web.keno');
    Route::get('e-game', 'IndexController@egame')->name('web.e-game');
    Route::get('fishing', 'IndexController@fishing')->name('web.fishing');
    
    Route::get('activities', 'IndexController@activityList')->name('web.activityList');
    Route::get('activity/{id}', 'IndexController@activityDetail')->name('web.activityDetail');
    Route::get('liveCasino', 'IndexController@liveCasino')->name('web.liveCasino');
    Route::get('poker', 'IndexController@poker')->name('web.poker');
    Route::get('hongbao', 'IndexController@hongbao')->name('web.hongbao');
    Route::get('eGame', 'IndexController@eGame')->name('web.eGame');
    Route::get('esports', 'IndexController@esports')->name('web.esports');
    Route::get('lottory', 'IndexController@lottory')->name('web.lottory');
    Route::get('catchFish', 'IndexController@catchFish')->name('web.catchFish');
    Route::get('pic', 'IndexController@pic')->name('web.pic');
    Route::get('red', 'IndexController@red_index')->name('web.red');
    Route::get('novice_guidance', 'IndexController@novice_guidance')->name('web.novice_guidance');
    $router->get('r', 'IndexController@register_one')->name('web.register_one');
    // $router->get('r', 'IndexController@register_one')->name('web.register_one');
	$router->get('l', 'IndexController@login2')->name('web.login2');
    $router->post('register_one', 'IndexController@post_register_one')->name('web.post_register_one');
    $router->get('login', 'IndexController@login')->name('web.login');
    $router->get('register_two', 'IndexController@register_two')->name('web.register_two');
    $router->post('register_two', 'IndexController@post_register_two')->name('web.post_register_two');
    $router->get('register_success', 'IndexController@register_success')->name('web.register_success');

});
Route::group(['prefix' => 'member','namespace' => 'Member'],function ($router)
{
    $router->post('login', 'LoginController@postLogin')->name('member.login.post');
    $router->any('logout', 'LoginController@logout')->name('member.logout');
    $router->get('password/request', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::group(['middleware' => 'auth.member:member'],function ($router){
        $router->post('/transfer_all', 'IndexController@post_transfer_all')->name('member.post_transfer_all');
        $router->get('/userCenter', 'IndexController@userCenter')->name('member.userCenter');
        $router->get('/new_bank_pay', 'IndexController@new_bank_pay')->name('member.new_bank_pay');
		$router->get('/ali_pay_xin', 'IndexController@ali_pay_xin')->name('member.ali_pay_xin');
		$router->get('/weixin_pay_xin', 'IndexController@weixin_pay_xin')->name('member.weixin_pay_xin');
		$router->get('/usdt_pay_xin', 'IndexController@usdt_pay_xin')->name('member.usdt_pay_xin');
		$router->get('/member_drawing_xin', 'IndexController@member_drawing_xin')->name('member.member_drawing_xin');
		$router->get('/indoor_transfer_xin', 'IndexController@indoor_transfer_xin')->name('member.indoor_transfer_xin');
		$router->get('/singlenote_report_xin', 'IndexController@singlenote_report_xin')->name('member.singlenote_report_xin');
		$router->get('/customer_report_xin', 'IndexController@customer_report_xin')->name('member.customer_report_xin');
		$router->get('/login_psw_xin', 'IndexController@login_psw_xin')->name('member.login_psw_xin');
		$router->get('/safe_psw_xin', 'IndexController@safe_psw_xin')->name('member.safe_psw_xin');
		$router->get('/getNowMoney', 'IndexController@getNowMoney')->name('member.getNowMoney');
		$router->get('/message_list_xin', 'IndexController@message_list_xin')->name('member.message_list_xin');
		$router->get('/my_activity_xin', 'IndexController@my_activity_xin')->name('member.my_activity_xin');
		$router->get('/complaint_proposal_xin', 'IndexController@complaint_proposal_xin')->name('member.complaint_proposal_xin');
		$router->get('/send_fs', 'IndexController@send_fs')->name('member.send_fs');
		
        $router->get('/bank_load', 'IndexController@bank_load')->name('member.bank_load');
        $router->get('/account_load', 'IndexController@account_load')->name('member.account_load');
        $router->get('/update_bank_info', 'IndexController@update_bank_info')->name('member.update_bank_info');
        $router->post('/update_bank_info', 'IndexController@post_update_bank_info')->name('member.post_update_bank_info');
        $router->get('/message_list', 'IndexController@message_list')->name('member.message_list');
        $router->get('/messageList', 'AsyncController@messageList')->name('member.messageList');
        $router->get('/safe_psw', 'IndexController@safe_psw')->name('member.safe_psw');
        $router->get('/login_psw', 'IndexController@login_psw')->name('member.login_psw');
        $router->post('update_qk_password', 'IndexController@update_qk_password')->name('member.update_qk_password');
        $router->post('update_login_password', 'IndexController@update_login_password')->name('member.update_login_password');
        $router->get('/finance_center', 'IndexController@finance_center')->name('member.finance_center');
        $router->get('/member_drawing', 'IndexController@member_drawing')->name('member.member_drawing');
        $router->get('/indoor_transfer', 'IndexController@indoor_transfer')->name('member.indoor_transfer');
        $router->get('recharge_type', 'IndexController@recharge_type')->name('member.recharge_type');
        $router->get('/weixin_pay', 'IndexController@weixin_pay')->name('member.weixin_pay');
        $router->post('/weixin_pay', 'IndexController@post_weixin_pay')->name('member.post_weixin_pay');
        $router->get('/ali_pay', 'IndexController@ali_pay')->name('member.ali_pay');
        $router->post('/ali_pay', 'IndexController@post_ali_pay')->name('member.post_ali_pay');
        $router->get('/qq_pay', 'IndexController@qq_pay')->name('member.qq_pay');
        $router->post('/qq_pay', 'IndexController@post_qq_pay')->name('member.post_qq_pay');
        $router->get('/bank_pay', 'IndexController@bank_pay')->name('member.bank_pay');
        $router->post('/bank_pay', 'IndexController@post_bank_pay')->name('member.post_bank_pay');
        $router->post('drawing', 'IndexController@post_drawing')->name('member.drawing');
        $router->post('/transfer', 'IndexController@post_transfer')->name('member.post_transfer');
        $router->get('/customer_report', 'IndexController@customer_report')->name('member.customer_report');
        $router->get('/rechargeList', 'AsyncController@rechargeList')->name('member.rechargeList');
        $router->get('/drawingList', 'AsyncController@drawingList')->name('member.drawingList');
        $router->get('/transferList', 'AsyncController@transferList')->name('member.transferList');
        $router->get('/gameRecordList', 'AsyncController@gameRecordList')->name('member.gameRecordList');
        $router->get('/dividendList', 'AsyncController@dividendList')->name('member.dividendList');
        $router->get('/service_center', 'IndexController@service_center')->name('member.service_center');
        $router->get('/complaint_proposal', 'IndexController@complaint_proposal')->name('member.complaint_proposal');
        $router->post('/feedback', 'IndexController@post_feedback')->name('member.post_feedback');
        $router->post('/post_agent_apply', 'IndexController@post_agent_apply')->name('member.post_agent_apply');
        $router->get('third_bank_pay', 'IndexController@third_bank_pay')->name('member.third_bank_pay');
        $router->get('third_pay_scan', 'IndexController@third_pay_scan')->name('member.third_pay_scan');
        //Route::post('pay', 'PayController@pay')->name('pay');
        Route::post('pay_scan', 'PayController@pay_scan')->name('pay_scan');
        Route::post('pay_app', 'PayController@pay_app')->name('pay_app');
        $router->get('third_quick_pay_apply', 'IndexController@third_quick_pay_apply')->name('member.third_quick_pay_apply');
        //
        $router->get('distillRed', 'IndexController@distillRed')->name('member.distillRed');
        //
        $router->post('one_transfer', 'IndexController@one_transfer')->name('member.one_transfer');
        $router->get('/api_qukuan', 'IndexController@api_qukuan')->name('member.api_qukuan');

    });
});
Route::group(['domain' => env('AGENT_URL'), 'prefix' => 'daili','namespace' => 'Daili'],function ($router){
    Route::get('/login', ['as' => 'daili.login','uses' => 'AuthController@getLogin']);
    Route::get('/login2', ['as' => 'daili.login2','uses' => 'AuthController@getLogin2']);
    Route::post('/login', ['as' => 'daili.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'daili.login.out','uses' => 'AuthController@getLoginOut']);
    Route::group(['middleware' => ['auth.daili']], function($router){
        $router->get('/', 'DailiController@index')->name('daili.index');
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
        Route::get('member_daili', 'MemberDailiController@index')->name('daili.member_daili');
        Route::get('member_daili/sy', 'MemberDailiController@member_offline_sy')->name('daili.member_offline_sy');
        Route::get('member_offline', 'MemberOfflineController@index')->name('daili.member_offline');
        Route::get('member_offline/create', 'MemberOfflineController@create')->name('daili.member_offline.create');
        Route::post('member_offline/store', 'MemberOfflineController@store')->name('daili.member_offline.store');
        Route::get('member_offline_recharge', 'MemberOfflineRechargeController@index')->name('daili.member_offline_recharge');
        Route::get('member_offline_drawing', 'MemberOfflineDrawingController@index')->name('daili.member_offline_drawing');
        Route::get('member_offline_dividend', 'MemberOfflineDividendController@index')->name('daili.member_offline_dividend');
        Route::get('member_offline_game_record', 'MemberOfflineGameRecordController@index')->name('daili.member_offline_game_record');
        Route::get('daili_money_log', 'DailiMoneyLogController@index')->name('daili.daili_money_log');
    });
});
Route::get('api/credit', 'Api\ApiClientController@credit')->name('api.credit');
Route::get('api/balance/{id}/{api_name}', 'Api\ApiClientController@balance')->name('api.balance');
Route::any('upload', 'UploadController@upload')->name('upload.post');
Route::any('pay/notify', 'Member\PayController@notify')->name('pay.notify');
Route::any('pay/return', 'Member\PayController@pay_return')->name('pay.return');
Route::get('pay/success', 'Member\PayController@success')->name('pay.success');
Route::get('kit/captcha/{tmp}', 'Web\WebBaseController@captcha');
Route::get('kit/mbk/{tmp}','Web\WebBaseController@mbk');
Route::get('v_sms', 'Web\WebBaseController@sendSms')->name('sendSms');
Route::any('pt_v', 'Api\PtController@vali')->name('pt.validate');
Route::any('ebet_v', 'Api\EbetController@verifya')->name('verifya');
Route::any('gd_v', 'Api\GdController@verify_gd')->name('gd.verify');
Route::post('pay', 'Member\PayController@pay')->name('pay');
Route::get('v', 'Web\WebBaseController@v')->name('v');
Route::group(['domain' => env('ADMIN_URL'), 'prefix' => 'admin','namespace' => 'Admin'],function ($router){
    Route::post('transfer_all', 'MemberController@transfer_all')->name('transfer_all');
    Route::get('/login', ['as' => 'admin.login','uses' => 'AuthController@getLogin']);
    Route::post('/login', ['as' => 'admin.login.post','uses' => 'AuthController@postLogin']);
    Route::get('/loginOut', ['as' => 'admin.login.out','uses' => 'AuthController@getLoginOut']);
    $router->get('jiaoban', 'AdminController@jiaoban')->name('admin.jiaoban');
    
    $router->get('jiaobanlist', 'AdminController@jiaobanlist')->name('admin.jiaobanlist');
    
    $router->get('hk_notice', 'AdminController@hk_notice')->name('admin.hk_notice');
    $router->get('tk_notice', 'AdminController@tk_notice')->name('admin.tk_notice');
    $router->get('tips_on', 'AdminController@tips_on')->name('admin.tips_on');
    $router->get('fs_notice', 'AdminController@fs_notice')->name('admin.fs_notice');
    $router->get('dl_notice', 'AdminController@dl_notice')->name('admin.dl_notice');
	$router->get('hd_notice', 'AdminController@hd_notice')->name('admin.hd_notice');
    Route::get('charts_data','AdminController@getChartsDataAjax')->name('admin.charts_data');

    Route::group(['middleware' => ['authorize']], function($router){
        $router->get('/', 'AdminController@index')->name('admin.index');
        Route::resource("user", 'UserController');
        Route::get('personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
        Route::post('personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
        Route::get('role/relation/{id}', ['as' => 'role.relation', 'uses' => 'RoleController@showRelation']);
        Route::post('role/relation/{id}', ['as' => 'role.relation.post', 'uses' => 'RoleController@relation']);
        Route::resource("role", 'RoleController');
        Route::get('bank_card/check/{id}/{status}', 'BankCardController@check')->name('bank_card.check');
        Route::resource("bank_card", 'BankCardController');
        Route::resource("system_config", 'SystemConfigController');
        Route::resource("black_list_ip", 'BlackListIpController');
        Route::resource("admin_action_money_log", 'AdminActionMoneyLogController');
        Route::resource("admin_login_log", 'AdminLoginLogController');
        Route::resource("ctr", 'CtrController');
        Route::resource("monitor", 'MonitorController');
        Route::get('about/check/{id}/{status}', 'AboutController@check')->name('about.check');
		Route::post('member/check_status', 'MemberController@check_status')->name('member.check_status');
        Route::resource("about", 'AboutController');
        Route::get('member/check/{id}/{status}', 'MemberController@check')->name('member.check');
        Route::get('member/getMoney', 'MemberController@getMoney')->name('member.get_money');
        Route::get('member/assign/{id}', 'MemberController@assign')->name('member.assign');
        Route::post('member/assign/{id}', 'MemberController@post_assign')->name('member.post_assign');
        Route::get('member/showGameRecordInfo/{id}', 'MemberController@showGameRecordInfo')->name('member.showGameRecordInfo');
        Route::get('member/showRechargeInfo/{id}', 'MemberController@showRechargeInfo')->name('member.showRechargeInfo');
        Route::get('member/showDrawingInfo/{id}', 'MemberController@showDrawingInfo')->name('member.showDrawingInfo');
        Route::get('member/showDividendInfo/{id}', 'MemberController@showDividendInfo')->name('member.showDividendInfo');
        Route::get('member/checkBalance/{id}', 'MemberController@checkBalance')->name('member.checkBalance');
        Route::get('member/showTransfer/{id}', 'MemberController@showTransfer')->name('member.showTransfer');
        Route::resource('member', 'MemberController');
        Route::post('dividend/del', 'DividendController@delete')->name('dividend.del');
        Route::resource('dividend', 'DividendController');
        Route::resource('member_login_log', 'MemberLoginLogController');
        Route::post('game_record/del', 'GameRecordController@delete')->name('game_record.del');
        Route::resource('game_record', 'GameRecordController');
        Route::post('transfer/del', 'TransferController@delete')->name('transfer.del');
        Route::resource('transfer', 'TransferController');
        Route::resource('fs_level', 'FsLevelController');
        Route::resource('send_fs', 'SendFsController');
        Route::resource('fs', 'FsController');
        Route::resource('member_daili_apply', 'MemberDailiApplyController');
        Route::resource('member_daili', 'MemberDailiController');
        Route::resource('member_offline', 'MemberOfflineController');
        Route::resource('member_offline_recharge', 'MemberOfflineRechargeController');
        Route::resource('member_offline_drawing', 'MemberOfflineDrawingController');
        Route::resource('member_offline_dividend', 'MemberOfflineDividendController');
        Route::resource('member_offline_game_record', 'MemberOfflineGameRecordController');
        Route::get('daili_money_log/show_by_id/{id}', 'DailiMoneyLogController@show_by_id')->name('daili_money_log.show_by_id');
        Route::resource('daili_money_log', 'DailiMoneyLogController');
        Route::resource('send_daili_money', 'SendDailiMoneyController');
        Route::resource('yj_level', 'YjLevelController');
        Route::put('recharge_weixin/confirm/{id}', 'RechargeWeixinController@confirm')->name('recharge_weixin.confirm');
        Route::resource('recharge_weixin', 'RechargeWeixinController');
        Route::put('recharge_ali/confirm/{id}', 'RechargeAliController@confirm')->name('recharge_ali.confirm');
        Route::resource('recharge_ali', 'RechargeAliController');
        Route::put('recharge_bank/confirm/{id}', 'RechargeBankController@confirm')->name('recharge_bank.confirm');
        Route::resource('recharge_bank', 'RechargeBankController');
        Route::resource('money_report', 'MoneyReportController');
        Route::put('recharge/confirm/{id}', 'RechargeController@confirm')->name('recharge.confirm');
        Route::resource('recharge', 'RechargeController');
        Route::put('drawing/confirm/{id}', 'DrawingController@confirm')->name('drawing.confirm');
        Route::resource('drawing', 'DrawingController');
        Route::get('activity/check/{id}/{status}', 'ActivityController@check')->name('activity.check');
        Route::resource('activity', 'ActivityController');
        Route::get('system_notice/check/{id}/{status}', 'SystemNoticeController@check')->name('system_notice.check');
        Route::resource('system_notice', 'SystemNoticeController');
        Route::resource('message', 'MessageController');
        Route::get('apple/check/{id}/{status}', 'AppleController@check')->name('apple.check');
        Route::resource('apple', 'AppleController');
        Route::get('tcg_game_list/check/{id}/{status}', 'TcgGameListController@check')->name('tcg_game_list.check');
        Route::get('tcg_game_list/pull', 'TcgGameListController@pull')->name('tcg_game_list.pull');
        Route::resource('tcg_game_list', 'TcgGameListController');
        Route::get('game_list/check/{id}/{status}', 'GameListController@check')->name('game_list.check');
        Route::get('game_list/pull', 'GameListController@pull')->name('game_list.pull');
        Route::resource('game_list', 'GameListController');
        Route::get('feedback/check/{id}/{status}', 'FeedbackController@check')->name('feedback.check');
        Route::resource('feedback', 'FeedbackController');
        Route::get('red/check/{id}/{status}', 'RedController@check')->name('red.check');
        Route::resource('red', 'RedController');
        Route::resource('banner', 'BannerController');
        Route::resource('template', 'TemplateController');
        Route::get('template/set/{id}/{client_type}','TemplateController@set')->name('template.set');
		//充值、存款列表
		Route::put('recharge/updatedama/{id}', 'RechargeController@updatedama')->name('recharge.updatedama');
		
		Route::get('member/checkdama/{id}', 'MemberController@checkdama')->name('member.checkdama');
		Route::post('member/returngamemoney', 'MemberController@returngamemoney')->name('member.returngamemoney');
		Route::get('money_report_export', 'MoneyReportController@money_report_export');
		
    });
});
Route::group(['namespace' => 'Api'],function ($router){
    $router->get('api/waterback','SelfController@waterback')->name('web.jokerorder');
	$router->get('api/daily','SelfController@daily')->name('web.daily');
 //拉取记录页面
	$router->get('api/caiji', 'IndexController@index')->name('api.game_record.index');
	$router->get('api/game_record', 'IndexController@index')->name('api.game_record.index');
    $router->get('ag/game_record', 'AgController@game_record')->name('ag.game_record');   
    $router->get('bbin/game_record', 'BbinController@game_record')->name('bbin.game_record');
    $router->get('ab/game_record', 'AbController@game_record')->name('ab.game_record');
	 $router->get('ig2/game_record', 'Ig2Controller@game_record')->name('ig2.game_record');
	$router->get('ibc2/game_record', 'Ibc2Controller@game_record')->name('ibc2.game_record');
	$router->get('as/game_record', 'AsController@game_record')->name('as.game_record');
	$router->get('avia/game_record', 'AviaController@game_record')->name('avia.game_record');
	$router->get('kg/game_record', 'KgController@game_record')->name('kg.game_record');
    $router->get('pt/game_record', 'PtController@game_record')->name('pt.game_record');
    $router->get('bog/game_record', 'BogController@game_record')->name('bog.game_record');
    $router->get('mg/game_record', 'MgController@game_record')->name('mg.game_record');
    $router->get('hb/game_record', 'HbController@game_record')->name('hb.game_record');
    $router->get('mw/game_record', 'MwController@game_record')->name('mw.game_record');
    $router->get('ibc/game_record', 'IbcController@game_record')->name('ibc.game_record');
    $router->get('png/game_record', 'PngController@game_record')->name('png.game_record');
    $router->get('ug/game_record', 'UgController@game_record')->name('ug.game_record');
    $router->get('rt/game_record', 'RtController@game_record')->name('rt.game_record');
    $router->get('ibs/game_record', 'IbsController@game_record')->name('ibs.game_record');
    $router->get('dg/game_record', 'DgController@game_record')->name('dg.game_record');
    $router->get('jdb/game_record', 'JdbController@game_record')->name('jdb.game_record');
    $router->get('pg/game_record', 'PgController@game_record')->name('pg.game_record');
    $router->get('ky/game_record', 'KyController@game_record')->name('ky.game_record');
    $router->get('og/game_record', 'OgController@game_record')->name('og.game_record');
    $router->get('cq9/game_record', 'Cq9Controller@game_record')->name('cq9.game_record');
	$router->get('nt/game_record', 'NtController@game_record')->name('nt.game_record');
	$router->get('gj/game_record', 'GjController@game_record')->name('gj.game_record');
    $router->get('sa/game_record', 'SaController@game_record')->name('sa.game_record');
	$router->get('vr/game_record', 'VrController@game_record')->name('vr.game_record');
	$router->get('sc/game_record', 'ScController@game_record')->name('sc.game_record');
    $router->get('bg/game_record', 'BgController@game_record')->name('bg.game_record');
    $router->get('sunbet/game_record', 'SunbetController@game_record')->name('sunbet.game_record');
    $router->get('sg/game_record', 'SgController@game_record')->name('sg.game_record');
    $router->get('qt/game_record', 'QtController@game_record')->name('qt.game_record');
    $router->get('pp/game_record', 'PpController@game_record')->name('pp.game_record');
    $router->get('esb/game_record', 'EsbController@game_record')->name('esb.game_record');   
    $router->get('ebet/game_record', 'EbetController@game_record')->name('ebet.game_record');
    $router->get('gg/game_record', 'GgController@game_record')->name('gg.game_record');
	$router->get('esb/game_record', 'EsbController@game_record')->name('esb.game_record');
    $router->get('eg/game_record', 'EgController@game_record')->name('eg.game_record');
	$router->get('ags/game_record', 'AgsController@game_record')->name('ags.game_record');
	$router->get('vg/game_record', 'VgController@game_record')->name('vg.game_record');
	$router->get('ebet/game_record', 'EbetController@game_record')->name('ebet.game_record');
	$router->get('mx/game_record', 'MxController@game_record')->name('mx.game_record');
	$router->get('gd/game_record', 'GdController@game_record')->name('gd.game_record');
	$router->get('761/game_record', 's761Controller@game_record')->name('761.game_record');
	$router->get('ig/game_record', 'IgController@game_record')->name('ig.game_record');
	$router->get('wm/game_record', 'WmController@game_record')->name('wm.game_record');
	$router->get('mt/game_record', 'MtController@game_record')->name('mt.game_record');
	$router->get('im/game_record', 'ImController@game_record')->name('im.game_record');
	$router->get('png/game_record', 'PngController@game_record')->name('png.game_record');
	$router->get('vt/game_record', 'VtController@game_record')->name('vt.game_record');
	$router->get('js/game_record', 'JsController@game_record')->name('js.game_record');	
	$router->get('bs/game_record', 'bsController@game_record')->name('bs.game_record');
	$router->get('hc/game_record', 'HcController@game_record')->name('hc.game_record');
	$router->get('wgqp/game_record', 'WgqpController@game_record')->name('wgqp.game_record');
	$router->get('swc/game_record', 'SwcController@game_record')->name('swc.game_record');
	
	
	
	$router->get('tt/game_record', 'TtController@game_record')->name('tt.game_record');
	$router->get('wg/game_record', 'WgController@game_record')->name('wg.game_record');
	$router->get('nt/game_record', 'NtController@game_record')->name('nt.game_record');
	$router->get('n2/game_record', 'N2Controller@game_record')->name('n2.game_record');
	$router->get('mw/game_record', 'MwController@game_record')->name('mw.game_record');
	$router->get('hg/game_record', 'HgController@game_record')->name('hg.game_record');
	$router->get('newvg/game_record', 'NewvgController@game_record')->name('newvg.game_record');
	$router->get('ws/game_record', 'WsController@game_record')->name('ws.game_record');
	$router->get('sw/game_record', 'SwController@game_record')->name('sw.game_record');
	$router->get('th/game_record', 'ThController@game_record')->name('th.game_record');
	$router->get('nw/game_record', 'NwController@game_record')->name('nw.game_record');
	$router->get('ds/game_record', 'DsController@game_record')->name('ds.game_record');
	$router->get('ss/game_record', 'SsController@game_record')->name('ss.game_record');
	$router->get('xhg/game_record', 'XhgController@game_record')->name('xhg.game_record');
	$router->get('igzr/game_record', 'IgzrController@game_record')->name('igzr.game_record');
	$router->get('pts/game_record', 'PtsController@game_record')->name('pts.game_record');
	$router->get('fg/game_record', 'FgController@game_record')->name('fg.game_record');
	$router->get('imqp/game_record', 'ImqpController@game_record')->name('imqp.game_record');
	$router->get('leg/game_record', 'LegController@game_record')->name('leg.game_record');
	$router->get('sunbets/game_record', 'SunbetsController@game_record')->name('sunbets.game_record');
	$router->get('bgc/game_record', 'BgcController@game_record')->name('bgc.game_record');
	$router->get('yg/game_record', 'YgController@game_record')->name('yg.game_record');
	$router->get('gg/game_record', 'GgController@game_record')->name('gg.game_record');
	$router->get('ka/game_record', 'KaController@game_record')->name('ka.game_record');
	$router->get('gb/game_record', 'GbController@game_record')->name('gb.game_record');
	$router->get('gbc/game_record', 'GbcController@game_record')->name('gbc.game_record');
    $router->get('gge/game_record', 'GgeController@game_record')->name('gge.game_record');

	$router->get('ga/game_record', 'GacController@game_record')->name('ga.game_record');
	$router->get('ae/game_record', 'AeController@game_record')->name('ae.game_record');
	$router->get('dsqp/game_record', 'DsqpController@game_record')->name('dsqp.game_record');	
	$router->get('isb/game_record', 'IsbController@game_record')->name('isb.game_record');
	
	



	
	$router->post('hg/game_record', 'HgController@game_record')->name('hg.game_record');
	$router->post('ag/game_record', 'AgController@game_record')->name('ag.game_record');   
	$router->post('ig2/game_record', 'Ig2Controller@game_record')->name('ig2.game_record');  
	$router->post('ibc2/game_record', 'Ibc2Controller@game_record')->name('ibc2.game_record'); 
	$router->post('avia/game_record', 'AviaController@game_record')->name('avia.game_record'); 
	$router->post('kg/game_record', 'KgController@game_record')->name('kg.game_record'); 
	$router->post('as/game_record', 'AsController@game_record')->name('as.game_record'); 	
	$router->post('pts/game_record', 'PtsController@game_record')->name('pts.game_record');
	$router->post('fg/game_record', 'FgController@game_record')->name('fg.game_record');
	$router->post('leg/game_record', 'LegController@game_record')->name('leg.game_record');
	$router->post('sunbets/game_record', 'SunbetsController@game_record')->name('sunbets.game_record');
	$router->post('bgc/game_record', 'BgcController@game_record')->name('bgc.game_record');
	$router->post('imqp/game_record', 'ImqpController@game_record')->name('imqp.game_record');
	$router->post('ka/game_record', 'KaController@game_record')->name('ka.game_record');
	$router->post('gb/game_record', 'GbController@game_record')->name('gb.game_record');
	$router->post('gbc/game_record', 'GbcController@game_record')->name('gbc.game_record');
	$router->post('yg/game_record', 'YgController@game_record')->name('yg.game_record');
	$router->post('gg/game_record', 'GgController@game_record')->name('gg.game_record');	
	$router->post('gge/game_record', 'GgeController@game_record')->name('gge.game_record');	
	$router->post('ga/game_record', 'GaController@game_record')->name('ga.game_record');	
	$router->post('ae/game_record', 'AeController@game_record')->name('ae.game_record');	
	$router->post('dsqp/game_record', 'DsqpController@game_record')->name('dsqp.game_record');	
	$router->post('wgqp/game_record', 'WgqpController@game_record')->name('wgqp.game_record');	
	$router->post('swc/game_record', 'SwcController@game_record')->name('swc.game_record');	
	
	
    $router->post('bbin/game_record', 'BbinController@game_record')->name('bbin.game_record');
    $router->post('ab/game_record', 'AbController@game_record')->name('ab.game_record');
    $router->post('pt/game_record', 'PtController@game_record')->name('pt.game_record');
    $router->post('bog/game_record', 'BogController@game_record')->name('bog.game_record');
    $router->post('mg/game_record', 'MgController@game_record')->name('mg.game_record');
    $router->post('hb/game_record', 'HbController@game_record')->name('hb.game_record');
    $router->post('mw/game_record', 'MwController@game_record')->name('mw.game_record');
    $router->post('ibc/game_record', 'IbcController@game_record')->name('ibc.game_record');
    $router->post('png/game_record', 'PngController@game_record')->name('png.game_record');
    $router->post('ug/game_record', 'UgController@game_record')->name('ug.game_record');
    $router->post('rt/game_record', 'RtController@game_record')->name('rt.game_record');
    $router->post('ibs/game_record', 'IbsController@game_record')->name('ibs.game_record');
    $router->post('dg/game_record', 'DgController@game_record')->name('dg.game_record');
    $router->post('jdb/game_record', 'JdbController@game_record')->name('jdb.game_record');
    $router->post('pg/game_record', 'PgController@game_record')->name('pg.game_record');
    $router->post('ky/game_record', 'KyController@game_record')->name('ky.game_record');
    $router->post('og/game_record', 'OgController@game_record')->name('og.game_record');
    $router->post('cq9/game_record', 'Cq9Controller@game_record')->name('cq9.game_record');
	$router->post('nt/game_record', 'NtController@game_record')->name('nt.game_record');
	$router->post('gj/game_record', 'GjController@game_record')->name('gj.game_record');
    $router->post('sa/game_record', 'SaController@game_record')->name('sa.game_record');
	$router->post('vr/game_record', 'VrController@game_record')->name('vr.game_record');
	$router->post('sc/game_record', 'ScController@game_record')->name('sc.game_record');
    $router->post('bg/game_record', 'BgController@game_record')->name('bg.game_record');
    $router->post('sunbet/game_record', 'SunbetController@game_record')->name('sunbet.game_record');
    $router->post('sg/game_record', 'SgController@game_record')->name('sg.game_record');
    $router->post('qt/game_record', 'QtController@game_record')->name('qt.game_record');
    $router->post('pp/game_record', 'PpController@game_record')->name('pp.game_record');
    $router->post('esb/game_record', 'EsbController@game_record')->name('esb.game_record');   
    $router->post('ebet/game_record', 'EbetController@game_record')->name('ebet.game_record');
    $router->post('gg/game_record', 'GgController@game_record')->name('gg.game_record');
	$router->post('esb/game_record', 'EsbController@game_record')->name('esb.game_record');
    $router->post('eg/game_record', 'EgController@game_record')->name('eg.game_record');
	$router->post('ags/game_record', 'AgsController@game_record')->name('ags.game_record');
	$router->post('vg/game_record', 'VgController@game_record')->name('vg.game_record');
	$router->post('ebet/game_record', 'EbetController@game_record')->name('ebet.game_record');
	$router->post('mx/game_record', 'MxController@game_record')->name('mx.game_record');
	$router->post('gd/game_record', 'GdController@game_record')->name('gd.game_record');
	$router->post('761/game_record', 's761Controller@game_record')->name('761.game_record');
	$router->post('ig/game_record', 'IgController@game_record')->name('ig.game_record');
	$router->post('wm/game_record', 'WmController@game_record')->name('wm.game_record');
	$router->post('mt/game_record', 'MtController@game_record')->name('mt.game_record');
	$router->post('im/game_record', 'ImController@game_record')->name('im.game_record');
	$router->post('png/game_record', 'PngController@game_record')->name('png.game_record');
	$router->post('vt/game_record', 'VtController@game_record')->name('vt.game_record');
	$router->post('js/game_record', 'JsController@game_record')->name('js.game_record');	
	$router->post('bs/game_record', 'bsController@game_record')->name('bs.game_record');
	$router->post('hc/game_record', 'HcController@game_record')->name('hc.game_record');
	$router->post('tt/game_record', 'TtController@game_record')->name('tt.game_record');
	$router->post('wg/game_record', 'WgController@game_record')->name('wg.game_record');
	$router->post('nt/game_record', 'NtController@game_record')->name('nt.game_record');
	$router->post('n2/game_record', 'N2Controller@game_record')->name('n2.game_record');	
	$router->post('mw/game_record', 'MwController@game_record')->name('mw.game_record');
	$router->post('hg/game_record', 'HgController@game_record')->name('hg.game_record');
	$router->post('newvg/game_record', 'NewvgController@game_record')->name('newvg.game_record');
	$router->post('ws/game_record', 'WsController@game_record')->name('ws.game_record');
	$router->post('sw/game_record', 'SwController@game_record')->name('sw.game_record');
	$router->post('th/game_record', 'ThController@game_record')->name('th.game_record');
	$router->post('ds/game_record', 'DsController@game_record')->name('ds.game_record');
	$router->post('xhg/game_record', 'XhgController@game_record')->name('xhg.game_record');
	$router->post('ss/game_record', 'SsController@game_record')->name('ss.game_record');
	$router->post('nw/game_record', 'NwController@game_record')->name('nw.game_record');
	$router->post('igzr/game_record', 'IgzrController@game_record')->name('igzr.game_record');
    $router->post('isb/game_record', 'IsbrController@game_record')->name('isb.game_record');
  
    
   
    $router->get('eg/game_record', 'EgController@game_record')->name('eg.game_record');
    $router->get('eg_3d/game_record', 'EgController@game_record_3d')->name('eg.game_record_3d');
    $router->get('eg_pl3/game_record', 'EgController@game_record_pl3')->name('eg.game_record_pl3');
    $router->get('eg_6hc/game_record', 'EgController@game_record_6hc')->name('eg.game_record_6hc');
//新加 试玩
    $router->get('agsw/playGame', 'AgController@loginsw')->name('agsw.playGame');
    $router->get('ppsw/playGame', 'PpController@loginsw')->name('ppsw.playGame');
    $router->get('bogsw/playGame', 'BogController@loginsw')->name('bogsw.playGame');
  
    //不需要登陆试玩地址



    $router->post('api/wallet_balance', 'ApiClientController@wallet_balance')->name('member.api.wallet_balance');
    $router->get('game/playGame', 'SelfController@login')->name('game.playGame');
    $router->get('wg/playGame', 'AgController@login')->name('wg.playGame');
    Route::group(['middleware' => 'auth.member:member'], function($router){
        $router->get('api/check', 'ApiClientController@check')->name('member.api.check');
        $router->post('transfer/all', 'ApiClientController@transfer_all')->name('transfer_all');

        //进游戏
        $router->get('ag/playGame', 'AgController@login')->name('ag.playGame');
		
		 
		$router->get('api/playGame', 'IndexController@index')->name('api.playGame.index');
        $router->get('bbin/playGame', 'BbinController@login')->name('bbin.playGame');
        $router->get('ab/playGame', 'AbController@login')->name('ab.playGame');
        $router->get('pt/playGame', 'PtController@login')->name('pt.playGame');
		$router->get('bog/playGame', 'BogController@login')->name('bog.playGame');
        $router->get('mg/playGame', 'MgController@login')->name('mg.playGame');
        $router->get('hb/playGame', 'HbController@login')->name('hb.playGame');
		$router->get('mw/playGame', 'MwController@login')->name('mw.playGame');
        $router->get('ibc/playGame', 'IbcController@login')->name('ibc.playGame');		
		$router->get('png/playGame', 'PngController@login')->name('png.playGame');
		$router->get('ug/playGame', 'UgController@login')->name('ug.playGame');
		$router->get('rt/playGame', 'RtController@login')->name('rt.playGame');
		$router->get('ibs/playGame', 'IbsController@login')->name('ibs.playGame');
		$router->get('dg/playGame', 'DgController@login')->name('dg.playGame');
		$router->get('gj/playGame', 'GjController@login')->name('gj.playGame');
		$router->get('sc/playGame', 'ScController@login')->name('sc.playGame');
		$router->get('vr/playGame', 'VrController@login')->name('vr.playGame');		
		$router->get('jdb/playGame', 'JdbController@login')->name('jdb.playGame');
        $router->get('pg/playGame', 'PgController@login')->name('pg.playGame');
        $router->get('og/playGame', 'OgController@login')->name('og.playGame');
		$router->get('cq9/playGame', 'Cq9Controller@login')->name('cq9.playGame');
        $router->get('sa/playGame', 'SaController@login')->name('sa.playGame');
        $router->get('bg/playGame', 'BgController@login')->name('bg.playGame');
		$router->get('sunbet/playGame', 'SunbetController@login')->name('sunbet.playGame');
        $router->get('sg/playGame', 'SgController@login')->name('sg.playGame');
		$router->get('esb/playGame', 'EsbController@login')->name('esb.playGame');
        $router->get('qt/playGame', 'QtController@login')->name('qt.playGame');
		$router->get('ky/playGame', 'KyController@login')->name('ky.playGame');
        $router->get('pp/playGame', 'PpController@login')->name('pp.playGame');
		$router->get('ags/playGame', 'AgsController@login')->name('ags.playGame');
		$router->get('ebet/playGame', 'EbetController@login')->name('ebet.playGame');
		$router->get('mx/playGame', 'MxController@login')->name('mx.playGame');
		$router->get('gd/playGame', 'GdController@login')->name('gd.playGame');
		$router->get('vg/playGame', 'VgController@login')->name('vg.playGame');
		$router->get('761/playGame', 's761Controller@login')->name('761.playGame');
		$router->get('mt/playGame', 'MtController@login')->name('mt.playGame');
		$router->get('im/playGame', 'imController@login')->name('im.playGame');
		$router->get('wm/playGame', 'WmController@login')->name('wm.playGame');
		$router->get('ig/playGame', 'IgController@login')->name('ig.playGame');
		$router->get('bs/playGame', 'BsController@login')->name('bs.playGame');
		$router->get('vt/playGame', 'VtController@login')->name('vt.playGame');
		$router->get('js/playGame', 'JsController@login')->name('js.playGame');
		$router->get('png/playGame', 'PngController@login')->name('png.playGame');
		$router->get('hc/playGame', 'HcController@login')->name('hc.playGame');		
		$router->get('tt/playGame', 'TtController@login')->name('tt.playGame');
		$router->get('wgs/playGame', 'WgsController@login')->name('wgs.playGame');	
		$router->get('nt/playGame', 'NtController@login')->name('nt.playGame');
		$router->get('n2/playGame', 'N2Controller@login')->name('n2.playGame');		
		$router->get('mw/playGame', 'MwController@login')->name('mw.playGame');
		$router->get('hg/playGame', 'HgController@login')->name('hg.playGame');
		$router->get('nw/playGame', 'NwController@login')->name('nw.playGame');
		$router->get('newvg/playGame', 'NewvgController@login')->name('newvg.playGame');
        $router->get('esb/playGame', 'EsbController@login')->name('esb.playGame');
        $router->get('th/playGame', 'ThController@login')->name('th.playGame');
		$router->get('sw/playGame', 'SwController@login')->name('sw.playGame');
		$router->get('ig2/playGame', 'Ig2Controller@login')->name('ig2.playGame');
		$router->get('ibc2/playGame', 'Ibc2Controller@login')->name('ibc2.playGame');
		$router->get('avia/playGame', 'AviaController@login')->name('avia.playGame');
		$router->get('kg/playGame', 'KgController@login')->name('kg.playGame');
		$router->get('as/playGame', 'AsController@login')->name('as.playGame');
		$router->get('pts/playGame', 'PtsController@login')->name('pts.playGame');
		$router->get('fg/playGame', 'FgController@login')->name('fg.playGame');
		$router->get('imqp/playGame', 'ImqpController@login')->name('imqp.playGame');
		$router->get('leg/playGame', 'LegController@login')->name('leg.playGame');
		$router->get('sunbets/playGame', 'SunbetsController@login')->name('pts.playGame');
		$router->get('bgc/playGame', 'BgcController@login')->name('bgc.playGame');
		$router->get('ka/playGame', 'KaController@login')->name('ka.playGame');
		$router->get('gb/playGame', 'GbcController@login')->name('gb.playGame');
		$router->get('gbc/playGame', 'GbcController@login')->name('gbc.playGame');
		$router->get('yg/playGame', 'YgController@login')->name('yg.playGame');
		$router->get('gg/playGame', 'GgController@login')->name('gg.playGame');
		$router->get('dsqp/playGame', 'DsqpController@login')->name('dsqp.playGame');
		$router->get('ga/playGame', 'GaController@login')->name('ga.playGame');
		$router->get('ae/playGame', 'AeController@login')->name('ae.playGame');
		$router->get('isb/playGame', 'IsbController@login')->name('isb.playGame');
		$router->get('swc/playGame', 'SwcController@login')->name('swc.playGame');
		
		$router->get('wgqp/playGame', 'WgqpController@login')->name('wgqp.playGame');
		
		
		
		
       // $router->get('png/playGame', 'PngController@login')->name('png.playGame');
        $router->get('ebet/playGame', 'EbetController@login')->name('ebet.playGame');
        $router->get('gg/playGame', 'GgController@login')->name('gg.playGame');
        $router->get('eg/playGame', 'EgController@login')->name('eg.playGame');

        $router->get('mg_mobile/playGame', 'MgController@login_mobile')->name('mg_mobile.playGame');

        //查询余额 统一接口
        $router->get('api/check', 'ApiClientController@check')->name('member.api.check');

    });
});
Route::get('repullBettingHistoryApiClient','PlayerController@repullBettingHistoryApiClient');  //获取投注历史记录接口