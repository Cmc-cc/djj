//平台中英文键值对
var ZHandCH = [
    { "ch": "game", "zh": "電子" },
    { "ch": "live", "zh": "真人" },
    { "ch": "lottery", "zh": "彩票" },
    { "ch": "sport", "zh": "體育" },
    { "ch": "fish", "zh": "捕魚" },
    { "ch": "chess", "zh": "棋牌" },
    { "ch": "competition", "zh": "电竞" }
]
//左边的游戏分类列表
var gameClassify = [
    { "type": "game", "name": "電子游戏" },
    { "type": "live", "name": "真人視訊" },
    { "type": "fish", "name": "捕魚游戏" },
    { "type": "lottery", "name": "彩票游戏" },
    { "type": "sport", "name": "體育竞技" },
    { "type": "chess", "name": "棋牌游戏" },
    { "type": "youhui", "name": "优惠活动" }
]
//设置是否在首页显示平台子游戏(0：不显示；1：显示)
var plateFormGameChild = 0;
//设置首页显示哪些平台的子游戏
var ExclusivePlateForm = [
    { "plateform": "AG" },
    { "plateform": "KY" },
    { "plateform": "VR" }
]
//单独进入子游戏配置
var ExclusiveGame = [
    {
        "platformcode": "AG",
        "gametype": "3",
        "gameName": "多台 (自选多台)"
    },
    {
        "platformcode": "AG",
        "gametype": "6",
        "gameName": "捕魚王"
    },
    {
        "platformcode": "AG",
        "gametype": "12",
        "gameName": "旗舰厅 HTML5 百家乐"
    },
    {
        "platformcode": "AG",
        "gametype": "13",
        "gameName": "国际厅 HTML5 百家乐"
    },
    {
        "platformcode": "AG",
        "gametype": "15",
        "gameName": "国际厅 HTML5 龙虎"
    },
    {
        "platformcode": "AG",
        "gametype": "21",
        "gameName": "旗舰厅百家乐"
    },
    {
        "platformcode": "AG",
        "gametype": "22",
        "gameName": "国际厅百家乐"
    },
    {
        "platformcode": "AG",
        "gametype": "23",
        "gameName": "旗舰厅龙虎"
    },
    {
        "platformcode": "AG",
        "gametype": "24",
        "gameName": "国际厅龙虎"
    },
    {
        "platformcode": "AG",
        "gametype": "25",
        "gameName": "旗舰厅轮盘"
    },
    {
        "platformcode": "AG",
        "gametype": "26",
        "gameName": "国际厅轮盘 "
    },
    {
        "platformcode": "AG",
        "gametype": "27",
        "gameName": "旗舰厅骰宝"
    },
    {
        "platformcode": "AG",
        "gametype": "32",
        "gameName": "牛牛"
    },
    {
        "platformcode": "AG",
        "gametype": "34",
        "gameName": "直播厅"
    },
    {
        "platformcode": "AG",
        "gametype": "36",
        "gameName": "炸金花"
    },
    {
        "platformcode": "KY",
        "gametype": "610",
        "gameName": "斗地主"
    },
    {
        "platformcode": "KY",
        "gametype": "0",
        "gameName": "大厅"
    },
    {
        "platformcode": "KY",
        "gametype": "900",
        "gameName": "押庄龙虎"
    },
    {
        "platformcode": "KY",
        "gametype": "380",
        "gameName": "幸运五张"
    },
    {
        "platformcode": "KY",
        "gametype": "860",
        "gameName": "三公"
    },
    {
        "platformcode": "KY",
        "gametype": "630",
        "gameName": "十三水"
    },
    {
        "platformcode": "KY",
        "gametype": "930",
        "gameName": "百人牛牛"
    },
    {
        "platformcode": "KY",
        "gametype": "220",
        "gameName": "炸金花"
    },
    {
        "platformcode": "KY",
        "gametype": "730",
        "gameName": "抢庄牌九"
    },
    {
        "platformcode": "KY",
        "gametype": "920",
        "gameName": "森林舞会"
    },
    {
        "platformcode": "KY",
        "gametype": "830",
        "gameName": "抢庄牛牛"
    },
    {
        "platformcode": "KY",
        "gametype": "230",
        "gameName": "极速炸金花"
    },
    {
        "platformcode": "KY",
        "gametype": "910",
        "gameName": "百家乐"
    },
    {
        "platformcode": "KY",
        "gametype": "720",
        "gameName": "二八杠"
    },
    {
        "platformcode": "KY",
        "gametype": "870",
        "gameName": "通比牛牛"
    },
    {
        "platformcode": "KY",
        "gametype": "390",
        "gameName": "射龙门"
    },
    {
        "platformcode": "KY",
        "gametype": "620",
        "gameName": "德州扑克"
    },
    {
        "platformcode": "KY",
        "gametype": "600",
        "gameName": "21点"
    },
    {
        "platformcode": "VR",
        "gametype": "1",
        "gameName": "金星1.5分彩"
    },
    {
        "platformcode": "VR",
        "gametype": "2",
        "gameName": "赛车"
    },
    {
        "platformcode": "VR",
        "gametype": "11",
        "gameName": "3分彩"
    },
    {
        "platformcode": "VR",
        "gametype": "13",
        "gameName": "快艇"
    },
    {
        "platformcode": "VR",
        "gametype": "15",
        "gameName": "百家乐"
    },
    {
        "platformcode": "VR",
        "gametype": "16",
        "gameName": "六合彩"
    },
    {
        "platformcode": "VR",
        "gametype": "3",
        "gameName": "重庆时时彩"
    },
    {
        "platformcode": "VR",
        "gametype": "4",
        "gameName": "新疆时时彩"
    },
    {
        "platformcode": "VR",
        "gametype": "5",
        "gameName": "天津时时彩"
    },
    {
        "platformcode": "VR",
        "gametype": "6",
        "gameName": "广东11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "7",
        "gameName": "江西11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "8",
        "gameName": "北京赛车"
    },
    {
        "platformcode": "VR",
        "gametype": "9",
        "gameName": "江苏快三"
    },
    {
        "platformcode": "VR",
        "gametype": "10",
        "gameName": "幸运"
    },
    {
        "platformcode": "VR",
        "gametype": "14",
        "gameName": "香港六合彩"
    },
    {
        "platformcode": "VR",
        "gametype": "34",
        "gameName": "水星分分彩"
    },
    {
        "platformcode": "VR",
        "gametype": "35",
        "gameName": "木星赛车"
    },
    {
        "platformcode": "VR",
        "gametype": "39",
        "gameName": "11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "40",
        "gameName": "快三"
    },
    {
        "platformcode": "VR",
        "gametype": "41",
        "gameName": "幸运28"
    },
    {
        "platformcode": "VR",
        "gametype": "36",
        "gameName": "赛马"
    },
    {
        "platformcode": "VR",
        "gametype": "37",
        "gameName": "游泳"
    },
    {
        "platformcode": "VR",
        "gametype": "38",
        "gameName": "自行车"
    },
    {
        "platformcode": "VR",
        "gametype": "17",
        "gameName": "云南时时彩"
    },
    {
        "platformcode": "VR",
        "gametype": "18",
        "gameName": "上海11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "19",
        "gameName": "山东11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "20",
        "gameName": "新疆11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "21",
        "gameName": "江苏11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "22",
        "gameName": "辽宁11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "23",
        "gameName": "河北11选5"
    },
    {
        "platformcode": "VR",
        "gametype": "26",
        "gameName": "吉林快三"
    },
    {
        "platformcode": "VR",
        "gametype": "27",
        "gameName": "北京快三"
    },
    {
        "platformcode": "VR",
        "gametype": "29",
        "gameName": "广西快三"
    },
    {
        "platformcode": "VR",
        "gametype": "30",
        "gameName": "河南快三"
    },
    {
        "platformcode": "VR",
        "gametype": "31",
        "gameName": "湖北快三"
    },
    {
        "platformcode": "VR",
        "gametype": "32",
        "gameName": "河北快三"
    },
    {
        "platformcode": "VR",
        "gametype": "33",
        "gameName": "内蒙古快三"
    }
]
