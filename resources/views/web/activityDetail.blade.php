<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $_system_config->keyword }}">
    <link rel="stylesheet" href="{{ asset('/web/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <script src="{{ asset('/web/js/jquery-2.1.3.min.js') }}"></script>
    <style>
        .btn4 {
  display: block;
    text-align: center;
    color: #fff;
    font-size: 16px;
    line-height: 40px;
    background: #d2b79c;
    border-radius: 10px;
    width: 200px;
    height: 40px;
    border: none;
    margin: 10px 300px;
    margin-bottom: 50px;
}
    </style>
</head>
<body>

<div class="body clear">
        <div class="pro-nr-bg">
            <div class="container">
                <div class="pro-xq">
                    <div>
                        <div class="pro-xq-bt">
                            <h2>{{ $data->title }}</h2>
                            <span>时间：{{ $data->date_desc }}</span>
                        </div>
                        <div class="pro-cont">
                            
                                    
                                    
                            <h3 class="title t_1">{{ $data->title }}</h3>
                            {!! $data->title_content !!}
                            <h3 class="title t_2">活动说明</h3>
                            {!! $data->content !!}
                            <h3 class="title t_3">活动规则</h3>
                            {!! $data->rule_content !!}
                        </div>
                        
                        @if($data->is_apply == 0)
                                        @if($_member)
                                                <input type="hidden" name="activity_id" value="{{ $data->id }}" id="activity_id">
                                                <button type="button" class="btn4 ajax-submit-btn" id="fanshuic" >
                                                    {{trans("lang.sqhd")}}
                                                </button>
                                        @else
                                            <button type="button" class="btn4 ajax-submit-btn"onclick="alert('{{trans("lang.qxdr")}}')">
                                                {{trans("lang.sqhd")}}
                                            </button>
                                        @endif
                                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $('#fanshuic').click(function(){
        $.ajax({
            url:"{{ route('member.apply_activity') }}",
            type:'post',
            data:{activity_id:$('#activity_id').val()},
            success:function(data){
                alert(data.status.msg);
            }
        })
    })
</script>
<script type="text/javascript" src="/new/css/layer.js"></script>
