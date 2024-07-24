<footer id="DesktopFooter" style="text-align: center;" cooperation="true" services="true" qrcodepic="true" class="v-footer v-sheet theme--dark transparent" data-v-00dd4a22="" data-booted="true">
    <div class="container" data-v-00dd4a22="">
        <div class="mx-auto v-sheet theme--dark transparent" style="min-height:30vh;max-width:1280px;" data-v-00dd4a22="">
            <div class="d-flex mb-5 flex-column" data-v-00dd4a22="">
                <div cols="12" data-v-00dd4a22=""><!----> <!----></div>
                <div class="text-center my-5" data-v-00dd4a22=""><!---->
 
                    <div class="pa-2 copyrignt" data-v-00dd4a22="">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">WG CLUB© ALL RIGHTS RESERVED</font>
                        </font>
                    </div>
                </div>
                <div data-v-00dd4a22=""><!---->
                    <div class="d-flex justify-center" data-v-00dd4a22=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-center flex-row animate__animated animate__bounceInDown floatBtnRight"
             style="bottom:20%;" data-v-2e6de083="">
    <div data-v-2e6de083="">
            @if($_member)
        <a href="/member/userCenter" small-sm="" class="my-1 saveBtn v-btn v-btn--contained v-btn--fab v-btn--round v-btn--router theme--dark v-size--default primary saveBtn hoverImg" style="" data-v-2e6de083="">
            <span class="v-btn__content">
                <img src="/resource/deposit.c910926.svg" alt="" style="width:35px;" data-v-2e6de083="">
                <div class="floatLogin rounded" data-v-2e6de083="">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{trans("lang.wode")}}</font>
                    </font>
                </div>
            </span>
        </a>
        @else
            <a href="/login" small-sm="" class="my-1 saveBtn v-btn v-btn--contained v-btn--fab v-btn--round v-btn--router theme--dark v-size--default primary saveBtn hoverImg" style="" data-v-2e6de083="">
                <span class="v-btn__content">
                    <img src="/resource/deposit.c910926.svg" alt="" style="width:35px;" data-v-2e6de083="">
                    <div class="floatLogin rounded" data-v-2e6de083="">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">{{trans("lang.qxdr")}}</font>
                        </font>
                    </div>
                </span>
            </a>
       @endif	
    </div> 
 </div>
        <div role="document" class="v-dialog__content" style="z-index: 202;">
                <div class="v-dialog v-dialog--persistent v-dialog--fullscreen"
                     style="transform-origin: center center; display: none;">
                    <div class="v-overlay text-center theme--dark" style="z-index: 5;">
                        <div class="v-overlay__scrim"
                             style="opacity: 0; background-color: rgb(33, 33, 33); border-color: rgb(33, 33, 33);"></div>
                    </div>
                </div>
                </div>
               <!-- <div role="document" id="detailV" style="display: none;" tabindex="0" class="v-dialog__content v-dialog__content--active" style="z-index: 202;">
                    <div class="v-dialog activityDialog v-dialog--active" style="transform-origin: center center; max-width: 960px;">
                        <div scrollable="" class="activity-dialog">
                            <div class="v-card v-sheet theme--dark secondary">
                        
                                 <iframe id="8888box11" width="100%" frameborder="0" resize(this)
                                                            style="height: 1677px;" scrolling="no"></iframe>
                                <div class="v-card__actions active-close" style=""> 
                                    <button type="button" class="v-btn v-btn--contained theme--dark v-size--default">
                                        <span class="v-btn__content"> {{trans("lang.guanbi")}} </span>
                                    </button>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>-->
                    <div role="document" id="active_" tabindex="0" class="v-dialog__content v-dialog__content--active" style="z-index: 202;display: none;">
                        <div class="v-dialog activityDialog v-dialog--active" style="transform-origin: center center; max-width: 960px;">
                            <div scrollable="" class="activity-dialog">
                                <div class="v-card v-sheet theme--dark secondary">
                                    <div class="v-card__subtitle info-region">
                                        <span class="activity-label ml-3 v-chip v-chip--label v-chip--no-color theme--dark v-size--small">
                                            <span class="v-chip__content" id="a_category"></span>
                                        </span>
                                    </div>
                                     <div class="v-card__title">
                                         <button type="button" onclick="hideTc();" class=" notice_close v-btn v-btn--absolute v-btn--fab v-btn--flat v-btn--icon v-btn--right v-btn--round theme--dark v-size--default primary--text">
                                        <span class="v-btn__content"><i aria-hidden="true" class="v-icon notranslate mdi mdi-close theme--dark"></i></span>
                                    </button>
                                        <div class="title mt-6"  id="a_title"></div>
                                    </div>
                                     <div class="v-image v-responsive img-region theme--dark" cover="">
                                        <div class="v-responsive__sizer" style="padding-bottom: 34.2188%;"></div>
                                        <div class="v-image__image v-image__image--cover" id="a_image" style=" background-position: center center;"></div>
                                        <div class="v-responsive__content" style="width: 1280px;"></div>
                                    </div> 
                                    <div class="ma-2">{{trans("lang.hdqj")}}：<span id="a_start"></span> ~<span id="a_end"></span> </div>
                                     <hr role="separator" aria-orientation="horizontal" class="v-divider theme--dark">
                                      <div class="v-card__text v-html pt-5" id="a_content" style="color: hsla(0,0%,100%,.7);">
                                            
                                      </div> 
                                      <div class="v-card__actions active-close">
                                             @if($_member)
											<button type="button" class="v-btn joinActive v-btn--contained theme--dark v-size--default" style=" background: linear-gradient(180deg, #d3aa74, #d5994b) !important;">
												<span class="v-btn__content"> {{trans("lang.sqhd")}} </span>
											</button>
                                            @endif
											<button type="button" class="notice_close v-btn v-btn--contained theme--dark v-size--default" style=" background: linear-gradient(180deg, #d3aa74, #d5994b) !important;">
												<span class="v-btn__content"> {{trans("lang.guanbi")}} </span>
											</button>
									 </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div role="menu" id="langList" class="v-menu__content theme--dark v-menu__content--fixed menuable__content__active" style="display:none;min-width: 134px; top: 43px; left: 13%; transform-origin: left top; z-index: 40;">
              <div class="v-list mt-5 v-sheet theme--dark">
                  <div class="v-list-item v-list-item--link theme--dark lang">
                      <div class="v-list-item__content">
                          <div class="v-list-item__title">
                              <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;">中文(繁体)</font>
                              </font>
                         </div>
                      </div>
                      
                </div>
                <div class="v-list-item v-list-item--link theme--dark lang">
                    <div class="v-list-item__content">
                        <div class="v-list-item__title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">中文(简体)</font>
                            </font>
                        </div>
                    </div> 
                </div>
               <div class="v-list-item v-list-item--link theme--dark lang">
                    <div class="v-list-item__content">
                        <div class="v-list-item__title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">English</font>
                            </font>
                        </div>
                    </div> 
                </div>

            </div>
 <script>
	$(function(){
		if(localStorage.lang){
		    var str = '<div class="v-list-item__icon"><i aria-hidden="true" class="v-icon notranslate mdi mdi-check theme--dark"></i></div>';
		    if(localStorage.lang=='ft'){
		        $("#langxxxx").text('中文(繁体)');
		        $('.lang').eq(0).append(str); 
		    }
		    if(localStorage.lang=='zh_cn'){
		        $("#langxxxx").text('中文(简体)');
		        $('.lang').eq(1).append(str); 
		    }
		    if(localStorage.lang=='en'){
		         $("#langxxxx").text('English');
		        $('.lang').eq(2).append(str); 
		    }
		}
		
		$('.v-menu__content').on('click', '.lang',function() {
             var i = $('.lang').index(this);
             var arr =['ft','zh_cn','en'];
            var lang =  arr[i];
            $.ajax({
                   url:'/m/changelang',
                    data:{lang:lang},
                    success:function(res){
                    	localStorage.lang = lang;
                        location.reload();
                    }
                })
                return false;
          });
    	$('#transfer').click(function(){
    	    var that = $(this);
    	    that.text('{{trans("lang.hsz")}}...');
    	    $.ajax({
    	        url:'/member/transfer_all',
    	        type:'post',
    	        success:function(res){
    	            that.text('{{trans("lang.zijinhuishou")}}');
    	        }
    	    })
    	})
    })
    	

    	
    function jine_input(){
       	xiaoshu  = Math.floor(Math.random()*90) + 10;
    	let val = $("#amount").val();
        val = val*1+xiaoshu/100;
        $("#amount").val(val)
    }
    function showLangList(){
        $("#langList").show();
    }
    function getNowMoney(){
        $("#shuaxin").addClass('Rotation');
        setTimeout(function(){
             $("#shuaxin").removeClass('Rotation');
             $.ajax({
    	        url:'/member/getNowMoney',
    	        type:'get',
    	        success:function(res){
    	             $("#money").text(res.data);
    	        }
    	    })
           
             
        },1500);
    }
</script>
