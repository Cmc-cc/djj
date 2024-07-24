<style>
    .app{
        position: fixed;
        right: 0px;
        bottom: 0px;
        z-index: 99999;
    }
    a.floatapp {
        border-radius: 14px;
        display: block;
        width: 90px;
        height: 90px;
        background-image: url(/web/images/app.png);
        background-repeat: no-repeat;
        background-position: center top;
    }
</style>
<div class="app"><a title="APP下载" href="{{ $_system_config -> app_link }}" class="floatapp" target="_blank"></a></div>