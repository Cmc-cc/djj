(function($){
    var app = {
        hall: 'Playtech',
        $body: {},
        $button: {},
        initial: function(){
            app.$body = $('.gameplay-list#playtech');
            app.$button = $('#playtechBtn');
            app.bindEvents();
        },
        bindEvents: function(){
            app.$button.on('click', 'ul li', app.setTable);
            $('#game-list').on('click', '.searchbtn',  app.setTable);
        },
        setTable: function(){
            var name = $(this).attr('group') || $(this).attr('group') == ''
                ? ''
                : (app.$body.find('[name="search"]').val() || '');
            var $this = $(this).attr('group')
                ? $(this)
                : app.$button.find('li.active') || app.$button.find('li').first();
            var group = $this.attr('group');
            var list = app.getList(group, name) || {};
            app.setBody(list, name);
            $this.parent('li').addClass("active");
        },
        setBody: function(list, name){
            var search = '<div class="search-form fright">' +   
                            '<div class="searchItem">' +
                                '<span class="label text_716">：</span>' +
                                '<input name="search" type="text" value="'+ name +'">' +
                                '<button class="searchbtn text_717"></button>' +
                            '</div>' +
                         '</div>' ;
            var tags = '';
            for (var key in list)
            {
                var row = list[key] || {};
                var gamename = localStorage.language == 'cn' ? row.gamename : row.gameEnglishName;
                var imageStyle = 
                    'width: 180px;' +
                    'height: 120px;';
                tags +=
                    '<a groupid="' + row.groupid + '" class="game_item openGame" gamename="' + app.hall + '" gametype="' + row.gamecode + '" target="_blank">' +
                        '<div class="game_title">' +
                            '<div class="game_title_text">' + gamename + '</div>' +
                        '</div>' +
                        '<div data-toggle="game" data-game="1" data-flash="">' +
                            '<div class="pt_' + row.gamecode + '" style="' + imageStyle + '"></div>' +
                        '</div>' +
                    '</a>';
            }
            app.$body.html(search + tags);
        },
        getList: function(group, name){
            var i = 0;
            var list = parent.Public.getGameDataByHall(app.hall);
            var rows = [];
            for (var key in list)
            {
                var row = list[key];
                if (! group || row.group.split(',').indexOf(group) >= 0)
                {
                    if (row.status == 1 && row.groupid == 24 && (!name || row.gamename.indexOf(name) >= 0))
                    {
                        rows[i] = row;
                        i++;
                    }
                }
            }
            return rows.length > 0 ? rows : [];
        },
    };
    app.initial();
})(jQuery)