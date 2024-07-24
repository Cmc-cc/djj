<div class="fixBottom">
    <a href="/m/activity_list" id="footer1">{{trans("lang.hdzx")}}</a>
    <a href="{{$setting->service_link}}" class="contact" id="footer2">{{trans("lang.zxkf")}}<p></p></a>
    <a href="/m" id="footer3">{{trans("lang.shouye")}}</a>
    <a href="/m/transfer" class="gdbtn" id="footer4">{{trans("lang.edzh")}}</a>
	<a href="/m/userinfo" id="footer5">{{trans("lang.wode")}}</a>
</div>

<script type="text/javascript">
    $('body').on('click','.kefu_box',function(){
        layer.open({
            content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">招募代理Whats: 67604785</span></div>  {{-- <div class="layui-m-layerbtn"><span yes="" type="1" onclick="wechat()">{{trans("lang.weixin")}}</span></div>--}}  <div class="layui-m-layerbtn"><a href="{{$setting->service_link}}" target="_blank"><span yes="" type="1">{{trans("lang.zxkf")}}</span></a></div>'
            ,skin: 'footer'
        });
    })
    function wechat(){
        layer.open({
            content: '<img src="{{$setting->wx_pic}}" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
</script>