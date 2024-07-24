var $menu = $('.slotgameMenu ul li');
var $gameList = $('#game-list').find('> div, > ul');
var $Menuchildren = $('.Menuchildren');
$menu.click(function()
{
    var $this = $(this);
    if ($this.find('ul').hasClass('Menuchildren'))
    {
        $this.find('ul').show();
    }
    else
    {
        $menu.removeClass('active');
        $this.find('ul').hide();
        $Menuchildren.hide();
        $this.addClass('active');
        $gameList.hide();
        var index = $this.parent().hasClass('Menuchildren')
            ? $this.parent('ul').parent('li').index()
            : $this.index();
        $gameList.eq(index).show();
    }
});

$menu.find('a').click(function(){
    $(this).next().find('li').eq(0).click();
});

// $menu.find('ul li').eq(0).click();
var fish = $menu.eq(0).attr('id');
if (fish == 'fishBtn')
{
    $menu.find('#fishBtn').click();
}
else
{
    var count = $menu.find('ul').size();
    var num = 0;
    for (var i = 0; i < count; i++)
    {
        var display = $menu.eq(i).css('display');
        if (display != 'none')
        {
            var num = i;
            $menu.find('ul').eq(num).find('li').eq(0).click();
            break;
        }
    }
}