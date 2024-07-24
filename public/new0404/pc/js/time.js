function curDateTime() {
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    var date = d.getDate();
    var day = d.getDay();
    var Hours=d.getHours(); //获取当前小时数(0-23)
    var Minutes=d.getMinutes(); //获取当前分钟数(0-59)
    var Seconds=d.getSeconds(); //获取当前秒数(0-59)
    var curDateTime = year+"-";
    if (month > 9)
        curDateTime = curDateTime + month+"-";
    else
        curDateTime = curDateTime + "0" + month+"-";
    if (date > 9)
        curDateTime = curDateTime + date+" ";
    else
        curDateTime = curDateTime + "0" + date+" ";
    if (Hours > 9)
        curDateTime = curDateTime + Hours+":";
    else
        curDateTime = curDateTime + "0" + Hours+":";
    if (Minutes > 9)
        curDateTime = curDateTime + Minutes+":";
    else
        curDateTime = curDateTime + "0" + Minutes+":";
    if (Seconds > 9)
        curDateTime = curDateTime + Seconds;
    else
        curDateTime = curDateTime + "0" + Seconds;
    $('.now-time').html( curDateTime );
    //document.getElementById('nowTime').innerHTML ="<font color='black'>"+curDateTime+"  (GMT+8)</font>";
    timerID = setTimeout("curDateTime()",1000);//设置超时,使时间动态显示
}
curDateTime();