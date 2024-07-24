//preload = function (list, callback) {
//    
//    var preload = function (list, callback) {
//        var i = 0,
//            counter = 0,
//            len = list.length;
//
//        var imgList = [];
//        for (; i < len; i++) {
//            imgList[i] = new Image();
//            imgList[i].src = list[i];
//            imgList[i].onload = function () {
//                counter++;
//                if (counter === len) {
//                    callback.call(null);
//                    imgList = null;
//                }
//            };
//        }
//    };
//    preload.call(null, list, callback);
//}
function imgPreload(imgList, callback) {
    var load, i, len, count;
    //List:  @array   ['src1','src2','src3',...]
    load = function (i) {
        var img;
        img = document.createElement('img');
        img.onload = function () {
            count++;
            if (count == len && callback) {
                callback();
            }
        };
        img.src = imgList[i];
    };
    len = imgList.length;
    count = i = 0;
    for (; i < imgList.length; i++) {
        load.call(this, i);
    }
}