(function(){
    var $userName = null;
    var $trueName = null
    var $email = null;
    var $phone = null;
    var $qq = null;
    var $birthday = null;
    var $sex =null;
    var $address= null;

    var app = {
        initial: function(){
            $userName = $('#userName');
            $trueName = $('#trueName');
            $email = $('#email');
            $phone = $('#phone');
            $line = $('#line');
            modifyInfo.initial();
            modifyPassword.initial();
            modifyPayPassword.initial();

            app.getValue();
            app.bindEvents();
        },
        bindEvents: function(){
        },
        getValue: function()
        {
            $userName.html(localStorage.username || '');
            $trueName.html(localStorage.truename || '');
            $email.html(localStorage.email || '');
            $phone.html(localStorage.phone || '');
            $line.html(localStorage.line || '');
        }
    };

    var modifyInfo = {
        ajaxing: false,
        $form: null,
        initial: function(){
            modifyInfo.$form = $('#modifyInfo');
            modifyInfo.bindEvents();
        },
        bindEvents: function(){
            modifyInfo.$form.bind('submit', modifyInfo.modify);
        },
        modify: function(){
            if (modifyInfo.ajaxing){
                return false;
            }
            var success = false;
            var $this = $(this);
            var data = {
                cmd: 105,
                sid: localStorage.sid || '',
                truename: $this.find('#trueName').html() || '',
                birthday: $this.find('#birthday').val() || '',
                sex: $this.find('input[name=sex]:checked').val() || 0,
                phone: $this.find('#phone').val() || '',
                email: $this.find('#email').val() || '',
                qq: $this.find('#qq').val() || '',
                address:$this.find('#address').val() || ''
            };
            modifyInfo.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(1)');
                    //alert('更改帐户讯息 请求失败 !');
                });
            modifyInfo.ajaxing = false;
            return success;
        },
    };

    var modifyPassword = {
        ajaxing: false,
        $form: null,
        initial: function(){
            modifyPassword.$form = $('#modifyPassword');
            modifyPassword.SetPlaceholder();
            modifyPassword.bindEvents();
        },
        bindEvents: function(){
            modifyPassword.$form.bind('submit', modifyPassword.modify);
        },
        modify: function(){
            if (modifyPassword.ajaxing){
                return false;
            }
            var success = false;
            var $this = $(this);
            var data = {
                cmd: 106,
                sid: localStorage.sid || '',
                oldpassword: $this.find('#oddPwd').val() || '',
                password: $this.find('#newPwd').val() || '',
                password2: $this.find('#newPwd2').val() || '',
            };
            modifyPassword.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(2)');
                    //alert('更改登陆密码 请求失败 !');
                });
            modifyPassword.ajaxing = false;
            return success;
        },
        SetPlaceholder: function()
        {
            modifyPassword.$form.find('#oddPwd').attr('placeholder',parent.Language.Get('请输入您当前的登入密码'));
            modifyPassword.$form.find('#newPwd').attr('placeholder',parent.Language.Get('请输入您新的登入密码'));
            modifyPassword.$form.find('#newPwd2').attr('placeholder',parent.Language.Get('请再次输入新的登入密码'));
        }
    };

    var modifyPayPassword = {
        ajaxing: false,
        $form: null,
        initial: function(){
            modifyPayPassword.$form = $('#modifyPayPassword');
            modifyPayPassword.SetPlaceholder();
            modifyPayPassword.bindEvents();
        },
        bindEvents: function(){
            modifyPayPassword.$form.bind('submit', modifyPayPassword.modify);
        },
        modify: function(){
            if (modifyPayPassword.ajaxing){
                return false;
            }
            var success = false;
            var $this = $(this);
            var data = {
                cmd: 107,
                sid: localStorage.sid || '',
                paypwd: $this.find('#oddPwdPay').val() || '',
                newpaypwd: $this.find('#newPwdPay').val() || '',
                newpaypwd2: $this.find('#newPwd2Pay').val() || '',
            };
            modifyPayPassword.ajaxing = true;
            window.parent.Public
                .post(data, {async: false})
                .done(function(response){
                    alert(response.msg);
                    success = response.status == 0 ? true : false;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(3)');
                    //alert('更改支付密码 请求失败 !');
                });
            modifyPayPassword.ajaxing = false;
            return success;
        },
        SetPlaceholder: function()
        {
            modifyPayPassword.$form.find('#oddPwdPay').attr('placeholder',parent.Language.Get('请输入您当前的支付密码'));
            modifyPayPassword.$form.find('#newPwdPay').attr('placeholder',parent.Language.Get('请输入您新的支付密码'));
            modifyPayPassword.$form.find('#newPwd2Pay').attr('placeholder',parent.Language.Get('请再次输入新的支付密码'));
        }
    };

    app.initial();
})();