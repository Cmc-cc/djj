<div class="m_header">
    <div class="m_container">
        <div class="pullLeft" style="margin: 2px 0px 0;">
            <img class="logo" src="{{ $_system_config->m_site_logo }}" alt="">
        </div>
        <div class="pullRight m_header-info" style="line-height: 22px;font-size: 0.3rem;position: absolute;right: 0px;">
            @if (Auth::guard('member')->guest())
            @else
                
                <div>余额：<strong class="money">{{ $_member->all_money }}</strong>&nbsp;RMB&nbsp;&nbsp;码量：<strong class="mlmoney">{{ $_member->ml_money }}</strong></div>
            @endif
        </div>
    </div>
</div>
<script>
    @if (!Auth::guard('member')->guest())
	/*	
    $(function () {
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
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
	*/
    @endif
</script>