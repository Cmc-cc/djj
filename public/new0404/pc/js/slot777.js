(function($){
    var app = {
        hall: 'slot777',
        $body: {},
        $button: {},
        initial: function(){
            app.$body = $('.gameplay-list#slot777');
            app.$button = $('#slot777Btn');

            app.bindEvents();
        },
        bindEvents: function(){
            app.$button.on('click', 'ul li', app.setTable);
        },
        setTable: function(){
            var $this = $(this).attr('group')
                ? $(this)
                : app.$button.find('li').first();
            var group = $this.attr('group');
            var list = app.getList(group);
            app.setBody(list || []);
            $this.parent('li').addClass("active");
        },
        setBody: function(list){
            var tags = '';
            for (var key in list)
            {
                var row = list[key] || {};
                tags += 
                    '<a groupid="' + row.groupid + '" class="game_item openGame" gamename="' + app.hall + '" gametype="' + row.gamecode + '" target="_blank">' +
                        '<div class="game_title">' +
                            '<div class="game_title_text">' + row.gamename + '</div>' +
                        '</div>' +
                        '<div data-toggle="game" data-game="1" data-flash="">' +
                            '<div class="slot777_' + row.gamecode + '"></div>' +
                        '</div>' +
                    '</a>';
            }
            app.$body.html(tags);
        },
        getList: function(group){
            var i = 0;
            var data = parent.Public.getGameDataByHall(app.hall);
            var list = data.list || [];
            var rows = [];
            for (var key in list)
            {
                var row = list[key];
                if (row['group'] == group)
                {
                    if(row.status == 1 && row.groupid == 28){
                        rows[i] = row;
                        i++;
                    }
                }
            }
            return rows.length > 0 ? rows : list;
        },
    };
    app.initial();
})(jQuery)