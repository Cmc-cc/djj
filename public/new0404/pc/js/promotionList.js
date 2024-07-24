(function(){
    var app = {
        cmd: 111,
        promotion: {},
        promotionItem: {},
        promotionUpload: {},
        $nav: null,
        $list: null,
        Initial: function(){
            var data = this.getPromotionData();
            this.promotion = data.promotion;
            this.promotionItem = data.promotion_item;
            this.promotionUpload = data.promotion_upload;
            this.$nav = $('#nav');
            this.$list = $('#list');
            this.SetNav();
            this.SetContent();
            this.BindEvents();
        },
        BindEvents: function(){
            this.$nav.on('click', 'li a', this.SetContent);
        },
        SetNav: function(){
            var tags = '';
            for (var key in this.promotion)
            {
                var row = this.promotion[key];
                tags += '<li class=""><a href="javascript://" id="' + row['id'] + '">' + row['name'] + '</a></li>';
            }
            this.$nav.html(tags);
        },
        toggleNav: function(id){
            this.$nav
                .find('li').removeClass('active')
                .find('#' + (id || 1)).parent('li').addClass('active');
        },
        SetContent: function(){
            var $this = $(this);
            var id = $this.prop('id') || 1;
            var list = app.GetList(id);
            var tags = '';
            var url = window.top.Public.PROMOTIONURL();
            for (var key in list)
            {
                var row = list[key];
                tags += 
                    '<div class="activity-content">' +
                        '<div class="activity-box clear">' +
                            '<div class="infobox">' +
                                '<div class="info">' +
                                    '<div class="activity-box-header clear">' +
                                        '<div class="activityimg" style="background: url(' + (url + row['filename']) + ') no-repeat; background-size: contain; background-position: center;"></div>' +
                                    '</div>' +
                                    '<div class="activity-box-body">' +
                                        '<iframe id="'+ row['site'] + row['id'] + row['langx'] + '" width="100%" frameborder="0" scrolling="no"></iframe>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
            }
            tags = tags ? tags : '<h3 style="text-align: center;" class="text_435"></h3>';
            app.toggleNav(id);
            app.$list.html(tags);
            for (var key in list)
            {
                var row = list[key];
                var html = app.ToHtml(row['html']).toString();
                var iframeName = row['site'] + row['id'] + row['langx'];
                var iframe = $('#' + iframeName);
                iframe.contents().find('body').html(html);
            }
        },
        GetList: function(pId){
            var list = [];
            var pId = parseInt(pId);
            var i = 0;
            for (var itemKey in this.promotionItem)
            {
                var itemRow = this.promotionItem[itemKey];
                if (! itemRow['pId'] || itemRow['pId'] != pId)
                {
                    continue;
                }
                for (var uploadKey in this.promotionUpload)
                {
                    var uploadRow = this.promotionUpload[uploadKey];
                    if (! uploadRow['id'] || ! itemRow['uploadId'] || uploadRow['id'] != itemRow['uploadId'])
                    {
                        continue;
                    }
                    list[i] = uploadRow;
                    i++;
                }
            }
            return list;
        },
        getPromotionData: function(){
            var promotion = [];
            window.top.Public
                .post({cmd: app.cmd}, {async: false})
                .done(function(response){
                    promotion = response.msg;
                })
                .fail(function(){
                    alert(parent.Language.Get('亲，你的线路崩溃啦～请检查你的网路连线后再重新登入') + '！(23)');
                    //alert('取得优惠活动 请求失败 !');
                });
            return promotion;
        },
        ToHtml: function(ret){
            var ret = ret.replace(/&gt;/g, '>');
            ret = ret.replace(/&lt;/g, '<');
            ret = ret.replace(/&quot;/g, '"');
            ret = ret.replace(/&apos;/g, "'");
            ret = ret.replace(/&amp;/g, '&');
            // ret = ret.replace(/<br\s*[\/]?>/gi, '');
            return ret;
        },
    };
    app.Initial();
})()