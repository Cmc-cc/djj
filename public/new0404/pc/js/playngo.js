(function($){
    var app = {
        hall: 'PlaynGO',
        $button: {},
        $body: {},
        rowNum: 5,
        Initial: function()
        {
            app.$body = $('.gameplay-list#' + this.hall);
            app.$button = $('#playngoBtn');
            app.SetTable();
            app.BindEvents();
        },
        BindEvents: function()
        {
            app.$button.on('click', 'ul li', app.SetTable); 
            $('#game-list').on('click', '.searchbtn',  app.SetTable); 
        },
        SetTable: function()
        {
            var name = $(this).attr('group') || $(this).attr('group') == ''
                ? ''
                : (app.$body.find('[name="search"]').val() || '');
            var $this = $(this).attr('group')
                ? $(this)
                : app.$button.find('li.active') || app.$button.find('li').first();
            var group = $this.attr('group');
            var list = app.GetList(group, name) || {};
            app.SetBody(list, name);
            $this.parent('li').addClass("active");
        },
        SetBody: function(list, name)
        {
            var search = '<div class="search-form fright">' +   
                            '<div class="searchItem">' +
                                '<span class="label text_716">：</span>' +
                                '<input name="search" type="text" value="'+ name +'">' +
                                '<button class="searchbtn text_717"></button>' +
                            '</div>' +
                         '</div>' ;
            var tags = [];
            var rowNum = parseInt(app.rowNum) || 0;
            var length = parseInt(list.length) - 1;
            var i = 0;
            for (var key in list)
            {
                var key = parseInt(key);
                var row = list[key] || {};
                var gamename = localStorage.language == 'cn' ? row.gamename : row.gameEnglishName;
                var width = row.gamecode === 'TA1K' ? 'width: 95%' : '';
                var image = 'webclipicon_100' + app.padLeft(row.gamecode,3);
                var imageStyle =
                    'width: 150px;' +
                    'height: 150px;' +
                    'margin: 0px auto;' +
                    'background-image: url(' + location.origin + '/images/game/playngo/' + image + '.png);' +
                    'background-size: cover;';
                tags[i] || (tags[i] = '');
                
                var gameHot = row.gamecode == '352' ? 'gameHot' : '';

                tags[i] +=
                '<a groupid="' + row.groupid + '" class="game_item openGame" gamename="' + app.hall + '" gametype="' + row.gamecode + '" target="_blank">' +
                    '<div class="game_title">' +
                        '<div class="game_title_text">' + gamename + '</div>' +
                    '</div>' +
                    '<div class="' + gameHot + '" data-toggle="game" data-game="1" data-flash="">' +
                        '<div class="game_img" style="' + imageStyle + '"></div>' +
                    '</div>' +
                '</a>';
            }
            app.$body.html(search + tags.join(''));
        },
        GetList: function(group, name)
        {
            var i = 0;
            var list = parent.Public.getGameDataByHall(app.hall);
            var rows = [];
            for (var key in list)
            {
                var row = list[key];
                if (! group || row.group.split(',').indexOf(group) >= 0)
                {
                    if(row.status == 1 && row.mobilestatus == 0 && (!name || row.gamename.indexOf(name) >= 0)){
                        //continue;
                        rows[i] = row;
                        i++;
                    }
                }
            }
            return rows.length > 0 ? rows : [];
        },
        padLeft: function(str,lenght){
            if(str.length >= lenght)
                return str;
            else
                return app.padLeft("0" +str,lenght);
        },
    };
    app.Initial();
})(jQuery)