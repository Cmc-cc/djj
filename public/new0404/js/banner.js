//banner
$(function () {
    //knob
    (function () {
        var time = 6000;
        var ticktime = 16;
        var ticks = 0;
        var maxTick = (time / ticktime) | 0;
        var tickTimeout;
        var index;
        var banner, items, len, order, outer;
        var knobList = [];


        function init() {
            index = 0;

            banner = $('.banner');
            items = banner.find('.banner-item');
            len = items.length;

            if (!len) return;
            items.hide();
            items.each(function(i) {
                order = i + 1;
                outer = $('<div class="knob">');
                outer.appendTo(banner.find('.knobbox'));
                outer.on('click', function() {
                    run(i);
                });
            });

            run(index);
        }
        function run(n) {
            ticks = 0;
            items.eq(n).css('position', 'relative').fadeIn()
                .siblings().css('position', 'absolute').fadeOut();
            index = n;
            $('.knob').eq(n).addClass('active').siblings().removeClass('active');
            tick();
        }
        function tick() {
            var input = knobList[index] && knobList[index].input;
            ticks++;
            if (ticks == maxTick) {
                next();
            } else {
                input && input.val(ticks).trigger('change');
                if (tickTimeout) clearTimeout(tickTimeout);
                tickTimeout = setTimeout(tick, ticktime);
            }
        }
        function next() {
            run(index + 1 < len ? index + 1 : 0);
        }

        $(init);
    })();


});
