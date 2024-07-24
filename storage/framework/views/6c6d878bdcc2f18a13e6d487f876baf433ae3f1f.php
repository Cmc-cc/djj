<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">系统设置</h3>
            </div>
            <div class="panel-body">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">信息</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">佣金</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">交易账号</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">第三方支付</a></li>
                        
						<li role="presentation"><a href="#qita" aria-controls="qita" role="tab" data-toggle="tab">其他配置</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="site_name" class="col-sm-2 control-label">网站名称</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo e($data->site_name); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">网站logo</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload" type="file" name="file" multiple>
                                            <div id="progress" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files" class="files">
                                                <?php if($data->site_logo): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->site_logo); ?>" target="_blank"><img src="<?php echo e($data->site_logo); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="site_logo" value="<?php echo e($data->site_logo); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">手机站logo</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload4" type="file" name="file" multiple>
                                            <div id="progress4" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files4" class="files">
                                                <?php if($data->m_site_logo): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->m_site_logo); ?>" target="_blank"><img src="<?php echo e($data->m_site_logo); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="m_site_logo" value="<?php echo e($data->m_site_logo); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">客服微信二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_wx" type="file" name="file" multiple>
                                            <div id="progress_wx" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_wx" class="files">
                                                <?php if($data->wx_pic): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->wx_pic); ?>" target="_blank"><img src="<?php echo e($data->wx_pic); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="wx_pic" value="<?php echo e($data->wx_pic); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_alert_on" class="col-sm-2 control-label"><span style="color: red">是否开启弹框</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_alert_on"  value="0" <?php if($data->is_alert_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_alert_on"  value="1" <?php if($data->is_alert_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">弹框图片</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload9" type="file" name="file" multiple>
                                            <div id="progress9" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files9" class="files">
                                                <?php if($data->alert_img): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->alert_img); ?>" target="_blank"><img src="<?php echo e($data->alert_img); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="alert_img" value="<?php echo e($data->alert_img); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="site_title" class="col-sm-2 control-label">网站标题</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo e($data->site_title); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_domain" class="col-sm-2 control-label">网站主域名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="不需要填写http://" id="site_domain" name="site_domain" value="<?php echo e($data->site_domain); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">关键字</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="keyword" name="keyword"  value="<?php echo e($data->keyword); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone1" class="col-sm-2 control-label">客服电话1</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="phone1" name="phone1"  value="<?php echo e($data->phone1); ?>" />
                                        </div>
                                        <label for="phone2" class="col-sm-1 control-label">客服电话2</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="phone2" name="phone2"  value="<?php echo e($data->phone2); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq" class="col-sm-2 control-label">客服qq</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq" name="qq" placeholder="直接填写 qq号"  value="<?php echo e($data->qq); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq" class="col-sm-2 control-label">代理qq</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq" name="agent_qq" placeholder="直接填写 qq号"  value="<?php echo e($data->agent_qq); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_link" class="col-sm-2 control-label">客服链接</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="service_link" name="service_link"  value="<?php echo e($data->service_link); ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="app_link" class="col-sm-2 control-label">APP链接</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="app_link" name="app_link"  value="<?php echo e($data->app_link); ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">APP下载二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload20" type="file" name="file" multiple>
                                            <div id="progress20" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files20" class="files">
                                                <?php if($data->wap_qrcode): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->wap_qrcode); ?>" target="_blank"><img src="<?php echo e($data->wap_qrcode); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="wap_qrcode" value="<?php echo e($data->wap_qrcode); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">网站模式</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_maintain"  value="0" <?php if($data->is_maintain == 0): ?>checked <?php endif; ?> />正常</label>
                                            <label><input type="radio" name="is_maintain"  value="1" <?php if($data->is_maintain == 1): ?>checked <?php endif; ?> />维护</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="maintain_desc" class="col-sm-2 control-label">维护提示语</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="maintain_desc" name="maintain_desc"  value="<?php echo e($data->maintain_desc); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fs_time" class="col-sm-2 control-label">返水提示时间</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="fs_time" name="fs_time"  value="<?php echo e(isset($data->fs_time) ? $data->fs_time : "15:00"); ?>" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="auto_logout_time" class="col-sm-2 control-label">后台自动登出时间(小时)</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="auto_logout_time" name="auto_logout_time" placeholder="只填写数字"  value="<?php echo e($data->auto_logout_time); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站红包控制</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_hongbao"  value="1" <?php if($data->is_hongbao == 1): ?>checked <?php endif; ?> />开启</label>
                                            <label><input type="radio" name="is_hongbao"  value="2" <?php if($data->is_hongbao == 2): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站左侧悬浮图片</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="left_ad"  value="1" <?php if($data->left_ad == 1): ?>checked <?php endif; ?> />开启</label>
                                            <label><input type="radio" name="left_ad"  value="2" <?php if($data->left_ad == 2): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">网站右侧悬浮图片</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="right_ad"  value="1" <?php if($data->left_ad == 1): ?>checked <?php endif; ?> />开启</label>
                                            <label><input type="radio" name="right_ad"  value="2" <?php if($data->left_ad == 2): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">个人中心切换</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_new_center"  value="1" <?php if($data->is_new_center == 1): ?>checked <?php endif; ?> />新版</label>
                                            <label><input type="radio" name="is_new_center"  value="2" <?php if($data->is_new_center == 2): ?>checked <?php endif; ?> />旧版</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">实时返水</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_fs"  value="1" <?php if($data->is_fs == 1): ?>checked <?php endif; ?> />开启</label>
                                            <label><input type="radio" name="is_fs"  value="2" <?php if($data->is_fs == 2): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label for="ml_percent" class="col-sm-2 control-label">码量倍数</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="ml_percent" name="ml_percent" value="<?php echo e($data->ml_percent); ?>">
                                        </div>
                                        <div class="col-sm-4" style="color: red">如填写1则为1倍码量，如填写0.1则为0.1倍码量</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">注册页选项</label>
                                    </div>


                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">姓名</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_real_name_1"  value="1" <?php if($data->is_real_name_1 == 1): ?>checked <?php endif; ?> />显示</label>
                                            <label><input type="radio" name="is_real_name_1"  value="0" <?php if($data->is_real_name_1 == 0): ?>checked <?php endif; ?> />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_real_name_2"  value="1" <?php if($data->is_real_name_2 == 1): ?>checked <?php endif; ?> />必填</label>
                                            <label><input type="radio" name="is_real_name_2"  value="0" <?php if($data->is_real_name_2 == 0): ?>checked <?php endif; ?> />不必填</label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">手机</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_phone_1"  value="1" <?php if($data->is_phone_1 == 1): ?>checked <?php endif; ?> />显示</label>
                                            <label><input type="radio" name="is_phone_1"  value="0" <?php if($data->is_phone_1 == 0): ?>checked <?php endif; ?> />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_phone_2"  value="1" <?php if($data->is_phone_2 == 1): ?>checked <?php endif; ?> />必填</label>
                                            <label><input type="radio" name="is_phone_2"  value="0" <?php if($data->is_phone_2 == 0): ?>checked <?php endif; ?> />不必填</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">邮箱</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_email_1"  value="1" <?php if($data->is_email_1 == 1): ?>checked <?php endif; ?> />显示</label>
                                            <label><input type="radio" name="is_email_1"  value="0" <?php if($data->is_email_1 == 0): ?>checked <?php endif; ?> />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_email_2"  value="1" <?php if($data->is_email_2 == 1): ?>checked <?php endif; ?> />必填</label>
                                            <label><input type="radio" name="is_email_2"  value="0" <?php if($data->is_email_2 == 0): ?>checked <?php endif; ?> />不必填</label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">QQ</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_qq_1"  value="1" <?php if($data->is_qq_1 == 1): ?>checked <?php endif; ?> />显示</label>
                                            <label><input type="radio" name="is_qq_1"  value="0" <?php if($data->is_qq_1 == 0): ?>checked <?php endif; ?> />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_qq_2"  value="1" <?php if($data->is_qq_2 == 1): ?>checked <?php endif; ?> />必填</label>
                                            <label><input type="radio" name="is_qq_2"  value="0" <?php if($data->is_qq_2 == 0): ?>checked <?php endif; ?> />不必填</label>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">微信</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_weixin_1"  value="1" <?php if($data->is_weixin_1 == 1): ?>checked <?php endif; ?> />显示</label>
                                            <label><input type="radio" name="is_weixin_1"  value="0" <?php if($data->is_weixin_1 == 0): ?>checked <?php endif; ?> />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_weixin_2"  value="1" <?php if($data->is_weixin_2 == 1): ?>checked <?php endif; ?> />必填</label>
                                            <label><input type="radio" name="is_weixin_2"  value="0" <?php if($data->is_weixin_2 == 0): ?>checked <?php endif; ?> />不必填</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="keyword" class="col-sm-2 control-label">推荐人</label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_regtj_1"  value="1" <?php if($data->	is_regtj_1 == 1): ?>checked <?php endif; ?> />显示</label>
                                            <label><input type="radio" name="is_regtj_1"  value="0" <?php if($data->	is_regtj_1 == 0): ?>checked <?php endif; ?> />隐藏</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <label><input type="radio" name="is_regtj_2"  value="1" <?php if($data->	is_regtj_2 == 1): ?>checked <?php endif; ?> />必填</label>
                                            <label><input type="radio" name="is_regtj_2"  value="0" <?php if($data->is_regtj_2 == 0): ?>checked <?php endif; ?> />不必填</label>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">活跃用户月充值金额</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="active_member_money" name="active_member_money"  value="<?php echo e($data->active_member_money); ?>" />
                                        </div>
                                    </div><font color="red">此金额用来判断代理下线玩家是否为活跃用户,填写200元即为充值达到200元才为活跃用户。</font>
                                </div><!-- /.box-body -->
                                <div class="form-group">
                                        <label for="cz_ration" class="col-sm-2 control-label">日常送分金额百分比</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="cz_ration" name="cz_ration" placeholder="只填写数字"  value="<?php echo e($data->cz_ration); ?>" />
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">日常送分打码量倍数</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="rc_ml_percent" name="rc_ml_percent"  value="<?php echo e($data->rc_ml_percent); ?>" />
                                        </div>
                                    </div>
                                    
                                    
                                    <font color="red">如填写1则为1倍码量，如填写0.1则为0.1倍码量</font>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">首冲送分比例</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="sc_percent" name="sc_percent"  value="<?php echo e($data->sc_percent); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">首冲送分打码量倍数</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="hongli_ml_percent" name="hongli_ml_percent"  value="<?php echo e($data->hongli_ml_percent); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">新账号首冲送分比例</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="new_sc_percent" name="new_sc_percent"  value="<?php echo e($data->new_sc_percent); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">新账号首冲送分打码量倍数</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="hongli_new_percent" name="hongli_new_percent"  value="<?php echo e($data->hongli_new_percent); ?>" />
                                        </div>
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--    <label for="active_member_money" class="col-sm-2 control-label">流水返还</label>-->
                                    <!--    <div class="col-sm-7">-->
                                    <!--        <input type="number" id="water" name="water"  value="<?php echo e($data->water); ?>" style="width:100px;" />天内输的总额返还-->
                                    <!--        <input type="number"  name="water_percent"  value="<?php echo e($data->water_percent); ?>" style="width:100px;" />%-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                    <!--    <label for="active_member_money" class="col-sm-2 control-label">每日亏损打码量倍数</label>-->
                                    <!--    <div class="col-sm-7">-->
                                    <!--        <input type="number" class="form-control" id="ks_ml_percent" name="ks_ml_percent"  value="<?php echo e($data->ks_ml_percent); ?>" />-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                    <!--    <label for="active_member_money" class="col-sm-2 control-label">新老用户充值</label>-->
                                    <!--    <div class="col-sm-7">-->
                                    <!--        固定充值<input type="number" id="new_level" name="new_level"  value="<?php echo e($data->new_level); ?>" style="width:100px;"  placeholder="填0表示关闭"/>-->
                                    <!--        &nbsp;&nbsp;&nbsp;赠送<input type="number"  name="new_point"  value="<?php echo e($data->new_point); ?>" style="width:100px;" placeholder="填0表示关闭"/>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最低充值</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="recharge_min" name="recharge_min"  value="<?php echo e($data->recharge_min); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最高充值</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="recharge_max" name="recharge_max"  value="<?php echo e($data->recharge_max); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最低提现</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="withdraw_min" name="withdraw_min"  value="<?php echo e($data->withdraw_min); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">最高提现</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="withdraw_max" name="withdraw_max"  value="<?php echo e($data->withdraw_max); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="active_member_money" class="col-sm-2 control-label">返水比例</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="water_percent" name="water_percent"  value="<?php echo e($data->water_percent); ?>" />
                                        </div>
                                    </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="is_qq_on" class="col-sm-2 control-label"><span style="color: red">是否开放轉數快</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_qq_on"  value="0" <?php if($data->is_qq_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_qq_on"  value="1" <?php if($data->is_qq_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_alipay_on" class="col-sm-2 control-label"><span style="color: red">是否开放便利店转账</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_alipay_on"  value="0" <?php if($data->is_alipay_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_alipay_on"  value="1" <?php if($data->is_alipay_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq_nickname" class="col-sm-2 control-label">轉數快姓名</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq_nickname" name="qq_nickname"  value="<?php echo e($data->qq_nickname); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qq_account" class="col-sm-2 control-label">轉數快账号</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="qq_account" name="qq_account"  value="<?php echo e($data->qq_account); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">便利店二维码</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_bld" type="file" name="file" multiple>
                                            <div id="progress_bld" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_bld" class="files">
                                                <?php if($data->wx_pic): ?>
                                                    <div class="pull-left" style="position:relative;margin: 10px;">
                                                        <a href="<?php echo e($data->bld_pic); ?>" target="_blank"><img src="<?php echo e($data->bld_pic); ?>" alt="" style="width: 100px;"></a>
                                                        <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                        <input type="hidden" name="bld_pic" value="<?php echo e($data->bld_pic); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="is_thirdpay_on" class="col-sm-2 control-label"><span style="color: red">是否开放第三方支付</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="is_thirdpay_on"  value="0" <?php if($data->is_thirdpay_on == 0): ?>checked <?php endif; ?> />开放</label>
                                            <label><input type="radio" name="is_thirdpay_on"  value="1" <?php if($data->is_thirdpay_on == 1): ?>checked <?php endif; ?> />关闭</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_version" class="col-sm-2 control-label">第三方版本</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_version" name="third_version" value="<?php echo e($data->third_version); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userid" class="col-sm-2 control-label">第三方userid</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_userid" name="third_userid" placeholder="例：9999" value="<?php echo e($data->third_userid); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_userkey" class="col-sm-2 control-label">第三方userkey</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_userkey" name="third_userkey" placeholder="例：011d495aaaab9611cd7f1f31ccaaa9377c565aaa15" value="<?php echo e($data->third_userkey); ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="third_pay_url" class="col-sm-2 control-label">第三方 url</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="third_pay_url" name="third_pay_url" value="<?php echo e($data->third_pay_url); ?>"  />
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="banner">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('banner.store')); ?>" method="post">
                                <input type="hidden" name="type" value="1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">电脑端 首页banner图（可多张）</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_b" type="file" name="file" multiple>
                                            <div id="progress_b" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_b" class="files">
                                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->type == 1): ?>
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="<?php echo e($item->path); ?>" target="_blank"><img src="<?php echo e($item->path); ?>" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="banners[]" value="<?php echo e($item->path); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <form class="form-horizontal" id="form" action="<?php echo e(route('banner.store')); ?>" method="post">
                                <input type="hidden" name="type" value="2">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label">手机端 首页banner图（可多张）</label>
                                        <div class="col-sm-7">
                                            <input id="fileupload_m" type="file" name="file" multiple>
                                            <div id="progress_m" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <div id="files_m" class="files">
                                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->type == 2): ?>
                                                        <div class="pull-left" style="position:relative;margin: 10px;">
                                                            <a href="<?php echo e($item->path); ?>" target="_blank"><img src="<?php echo e($item->path); ?>" alt="" style="width: 100px;"></a>
                                                            <a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>
                                                            <input type="hidden" name="banners[]" value="<?php echo e($item->path); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
						
						<div role="tabpanel" class="tab-pane" id="qita">
                            <form class="form-horizontal" id="form" action="<?php echo e(route('system_config.update', ['id' => 1])); ?>" method="post">
                                <input type="hidden" name="_method" value="put">
                                <div class="box-body">
								    <div class="form-group">
                                        <label for="mz_open" class="col-sm-2 control-label"><span style="color: red">WG免转</span></label>
                                        <div class="col-sm-7">
                                            <label><input type="radio" name="mz_open"  value="0" <?php if($data->mz_open == 0): ?>checked <?php endif; ?> />关闭</label>
                                            <label><input type="radio" name="mz_open"  value="1" <?php if($data->mz_open == 1): ?>checked <?php endif; ?> />开启</label>
											<span style="color: red">网站选择免转,商户必须免转,---网站关闭免转.商户号也需要关闭免转</span></label>
                                        </div>
										
                                    </div>
								    <div class="form-group">
                                        <label for="wg_pl" class="col-sm-2 control-label"><span style="color: red">WG赔率</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="wg_pl" name="wg_pl" placeholder="例：1980" value="<?php echo e($data->wg_pl); ?>"  />(赔率格式 例如赔率为1.980就传入 1980-最高不能超过2000-最低不能低于1800)
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label for="sunbet_xh" class="col-sm-2 control-label">Sunbet申博厅玩家限红等级</label>
                                        <div class="col-sm-7">
										    <select name="sunbet_xh" class="form-control" id="sunbet_xh">
											    <option value="1" <?php if($data->sunbet_xh == 1): ?>selected <?php endif; ?> >青铜-基本额度</option>
												<option value="2" <?php if($data->sunbet_xh == 2): ?>selected <?php endif; ?> >白银-升级额度</option>
												<option value="3" <?php if($data->sunbet_xh == 3): ?>selected <?php endif; ?> >黄金-高级额度</option>
												<option value="4" <?php if($data->sunbet_xh == 4): ?>selected <?php endif; ?> >白金-贵宾额度</option>
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vg_xh" class="col-sm-2 control-label">VG金星厅玩家限红等级</label>
                                        <div class="col-sm-7">
                                            <select name="vg_xh" class="form-control" id="vg_xh">
											    <option value="1" <?php if($data->vg_xh == 1): ?>selected <?php endif; ?> >青铜-基本额度</option>
												<option value="2" <?php if($data->vg_xh == 2): ?>selected <?php endif; ?> >白银-升级额度</option>
												<option value="3" <?php if($data->vg_xh == 3): ?>selected <?php endif; ?> >黄金-高级额度</option>
												<option value="4" <?php if($data->vg_xh == 4): ?>selected <?php endif; ?> >白金-贵宾额度</option>
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mx_xh" class="col-sm-2 control-label">MX性感厅玩家限红等级</label>
                                        <div class="col-sm-7">
                                            <select name="mx_xh" class="form-control" id="mx_xh">
											    <option value="1" <?php if($data->mx_xh == 1): ?>selected <?php endif; ?> >青铜-基本额度</option>
												<option value="2" <?php if($data->mx_xh == 2): ?>selected <?php endif; ?> >白银-升级额度</option>
												<option value="3" <?php if($data->mx_xh == 3): ?>selected <?php endif; ?> >黄金-高级额度</option>
												<option value="4" <?php if($data->mx_xh == 4): ?>selected <?php endif; ?> >白金-贵宾额度</option>
											</select>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>		
                    </div>

                </div>
            </div>
        </div>

    </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after.js'); ?>
    <script src="<?php echo e(asset('/backstage/js/jquery.ui.widget.js')); ?>"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo e(asset('/backstage/js/jquery.iframe-transport.js')); ?>"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo e(asset('/backstage/js/jquery.fileupload.js')); ?>"></script>
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        var upload_url = "<?php echo e(route('upload.post')); ?>";
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = upload_url;
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="site_logo" value="'+img_path+'">' +
                        '</div>';
                    $('#files').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //手机站logo
            $('#fileupload4').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="m_site_logo" value="'+img_path+'">' +
                        '</div>';
                    $('#files4').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress4 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //弹框图片
            $('#fileupload9').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="alert_img" value="'+img_path+'">' +
                        '</div>';
                    $('#files9').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress9 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            /************************************/
            //客服微信二维码
            $('#fileupload_wx').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="wx_pic" value="'+img_path+'">' +
                        '</div>';
                    $('#files_wx').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_wx .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            /************************************/
            //左侧悬浮图片
            $('#fileupload10').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="left_img" value="'+img_path+'">' +
                        '</div>';
                    $('#files10').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress10 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //右侧悬浮图片
            $('#fileupload11').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="right_img" value="'+img_path+'">' +
                        '</div>';
                    $('#files11').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress11 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //支付宝
            $('#fileupload2').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="alipay_qrcode[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files2').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress2 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //微信
            $('#fileupload3').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="wechat_qrcode[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files3').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress3 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            $('#fileupload_bld').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="bld_pic" value="'+img_path+'">' +
                        '</div>';
                    $('#files_bld').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_bld .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            //便利店二维码
            $('#fileupload_trc').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="trc_pic" value="'+img_path+'">' +
                        '</div>';
                    $('#files_trc').append(html)
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_trc .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
            //QQ
            $('#fileupload77').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="qq_qrcode[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files77').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress77 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            //手机二维码
            $('#fileupload20').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="wap_qrcode" value="'+img_path+'">' +
                        '</div>';
                    $('#files20').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress20 .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');


            //电脑端banner
            $('#fileupload_b').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="banners[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files_b').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_b .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');


            //手机端端banner
            $('#fileupload_m').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {

                    var res = data.result;
                    //console.log(res)
                    if (res.status == 0)
                    {
                        alert(res.message);
                        return false;
                    }
                    var img_path = res.data.url;
                    var html = '<div class="pull-left" style="position:relative;margin: 10px;">' +
                        '<a href="'+img_path+'" target="_blank">' +
                        '<img src="'+img_path+'" style="width: 100px;" />' +
                        '</a>' +
                        '<a href="javascript:;" class="glyphicon glyphicon-remove" style="position: absolute;right: 0;top: 0;" onclick="removeDiv(this)"></a>'+
                        '<input type="hidden" name="banners[]" value="'+img_path+'">' +
                        '</div>';
                    $('#files_m').append(html)

                    //console.log(data)
//                    $.each(data.result.files, function (index, file) {
//                        console.log(file)
//                        $('<p/>').text(file.name).appendTo('#files');
//                        var img = '<img src="'+file.thumbnailUrl+'" style="width: 50px;" />';
//                        $('#imgs').append(img)
//                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress_m .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });

        function removeDiv(e)
        {
            $(e).closest('div').remove();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>