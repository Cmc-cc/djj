@extends('wap.template.theme10.layouts.main')
@section('content')
<link type="text/css" rel="stylesheet" href="/new/css/style.css">
<style>
    /**{padding:0;}*/
    /*html{ font-size:52px;}*/
    /*.layout-bottom{ display:none;}*/
    /*body {*/
    /*    padding-bottom: 1.05rem;*/
    /*    background: #131313;*/
    /*    font-size: .25rem;*/
    /*    line-height: 1;*/
    /*}*/
    /*.nytop h1{ margin:0;}*/
    /*.module-main{background: transparent;}*/
    /*#newbtn{color: #fff;*/
    /*border: none;*/
    /*display: block;*/
    /*width: 100%;*/
    /*background: linear-gradient(to bottom, #eb5d4d 0%, #fb2464 100%) !important;*/
    /*line-height: 1.08rem;*/
    /*height: 1.08rem;*/
    /*font-size: .32rem;*/
    /*outline: none;*/
    /*border-radius: 0.16rem;*/
    /*margin: 1rem auto;*/
    /*padding:0;*/
    /*}*/
    /*#bankname{*/
    /*   background: #131313;*/
    /*    border: none;*/
    /*    color:#fff;*/
    /*    font-size: .28rem;*/
    /*}*/
    /*#bankname option{ color:#fff;}*/
       *{padding:0;}
    html{ font-size:52px;}
    .layout-bottom{ display:none;}
    body {
        padding-bottom: 1.05rem;
       background: #f8f8f8;
        font-size: .25rem;
        line-height: 1;
    }
    .nytop{
        background: linear-gradient(to right, #cead8b , #dec7a7)
    }
    .nytop h1{ margin:0;}
    .module-main{background: transparent;}
    #newbtn{color: #fff;
    border: none;
    display: block;
    width: 100%;
    /*background: linear-gradient(to bottom, #eb5d4d 0%, #fb2464 100%) !important;*/
    background: linear-gradient(90deg,#dccab8,#d2b496);
    line-height: 1.08rem;
    height: 1.08rem;
    font-size: .32rem;
    outline: none;
    border-radius: 0.16rem;
    margin: 1rem auto;
    padding:0;
    }
    #bankname{
       /*background: #131313;*/
        border: none;
        /*color:#fff;*/
        font-size: .28rem;
    }
    /*#bankname option{ color:#fff;}*/
    .drawInfor li span{
        color: #292d30!important;
    }
    input{
        color:#000 !important;
    }
</style>

<div class="nytop">
	<a href="javascript:history.go(-1);" class="fhbtn"></a>
    <h1>綁定銀行</h1>
	<!-- <h2><a href="">在線客服</a></h2> -->
</div>
<div class="drawInfor"> <form  method="post" id="form1">
		<ul>
		    <li ><span>賬號</span>{{ $_member -> name }}</li>
		    <li><span>持有人</span><input type="text" id="account" value="{{ $_member -> real_name }}" name="bank_username" placeholder="請輸入持有人姓名" ></li>
		    <li><span>銀行名稱</span>
		        <select id="bankname" name="bank_name" style="border:none;background:none;">
                                            <option value="">--請選擇--</option>
                                            @foreach(\App\Models\Base::$BANK_TYPE as $v)
                                                <option value="{{ $v }}"
                                                        @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select></li>
                                        
		    <li><span>銀行賬戶</span><input type="number" name="bank_card" id="card" maxlength="18" value="" placeholder="請輸入銀行卡號" warning="请输入开户账号"></li>
		    <!--<li><span>开户银行</span><input id="banknode" name="bank_branch_name" type="text" placeholder="示例：河南商丘工商银行五一路支行" warning="请输入开户行信息"></li>-->
	    </ul>
	    <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn" id="newbtn">提交</button>
	    </form>
</div>
    <div class="layout-main">
        <div class="member-module member-module-bank" id="wtdCardContent">

            <div class="module-main diy-scrollbar" style="padding-top: 50px;">
                <!--<form  method="post" action="{{ route('wap.post_bind_bank') }}">-->
                <!--    <div>-->
                <!--        <div>-->
                <!--            <div class="main-container">-->
                <!--                <div class="placeholder-fit">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="mdl-6_realname">登录账号</label>-->
                <!--                        <input type="text" id="mdl-6_realname" class="form-control" value="{{ $_member -> name }}" name="realname" readonly="readonly">-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="mdl-6_realname">开户姓名</label>-->
                <!--                        <input type="text" id="account" class="form-control" value="" name="bank_username" >-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="mdl-6_bank">银行名称</label>-->
                <!--                        <select id="bankname" class="form-control" name="bank_name">-->
                <!--                            <option value="">--请选择--</option>-->
                <!--                            @foreach(\App\Models\Base::$BANK_TYPE as $v)-->
                <!--                                <option value="{{ $v }}"-->
                <!--                                        @if($_member->bank_name == $v) selected @endif>{{ $v }}</option>-->
                <!--                            @endforeach-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="mdl-6_bank_account">银行账号</label>-->
                <!--                        <input type="number" name="bank_card" id="card" maxlength="18" class="form-control" value="" placeholder="如：123456***7890" warning="请输入开户账号">-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="mdl-6_bank">开户银行</label>-->
                <!--                        <input id="banknode" name="bank_branch_name" type="text" class="form-control" placeholder="示例：河南商丘工商银行五一路支行" warning="请输入开户行信息">-->
                <!--                    </div>-->
                <!--                    <div class="form-group">-->
                <!--                        <button type="button" class="btn btn-primary form-control submit-btn ajax-submit-btn" id="newbtn">提交</button>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->
            </div>
        </div>
    </div>
    <script>
        
        $('#newbtn').click(function(){
    	    $.ajax({
    				type:"post",
    				url:"{{ route('wap.post_bind_bank') }}",
    				data : $('#form1').serialize(),
    				success : function (data) {
    					if(data.status.errorCode == 0){
                            window.location.href = '/m/userinfo';
                        }else{
                            // alert(data.status.msg);
                        }
    
    				}
    			})
			return false;
    	})
    </script>
@endsection