<?php
namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Api;
use App\Models\SystemNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends WebBaseController
{
    public function getGongGao(Request $request)
    {
        $query = new SystemNotice();

        $pageSize = $request->get('pageSize','30');
        $pageIndex = $request->get('pageIndex','1');

        $columns = ['*'];
        $pageName = 'page';
        $res = $query->paginate($pageSize,$columns,$pageName,$pageIndex);

        if($res){
            $res = $res->toArray();

            $content = [];

            foreach ($res['data'] as $k => $v) {
                $content[]['ggcontent'] = $v['content'];
            }
            $arr = [
                'retTotal' => $res['total'],
                'retPage' => 0,
                'retData' => $content,
                'retCode' => 0,
                'retMsg' => '成功'
            ];
        }
        return response()->json($arr);
    }

    public function getGames($type='')
    {
        //$type = 'slot';
        $apis  = Api::where('type', 5)->orderBy('created_at', 'desc')->get()->toArray();
        $all = [];
        foreach ($apis as $k => $v) {
            $all[$v['api_name']] = $v;
        }
        $slot = [
            'JDB'=>[
                'name' => 'JDB電子',
                'plat_type' =>'JDB',
                'game_type' => '',
                'game_code' => '7'
            ],
            'PG'=>[
                'name' => 'PG電子',
                'plat_type' =>'PG',
                'game_type' => '',
                'game_code' => ''
            ],
            'CQ9'=>[
                'name' => 'CQ9電子',
                'plat_type' =>'CQ9',
                'game_type' => 'redirect',
                'game_code' => ''
            ],
            'ISB'=>[
                'name' => 'ISB電子',
                'plat_type' =>'ISB',
                'game_type' => 'redirect',
                'game_code' => ''
            ],
            
            // 'IMSLOT'=>[
            //     'name' => 'IM電子',
            //     'plat_type' =>'IMSLOT',
            //     'game_type' => 'redirect',
            //     'game_code' => ''
            // ],
            'HB'=>[
                'name' => 'HB電子',
                'plat_type' =>'HB',
                'game_type' => 'redirect',
                'game_code' => ''
            ],
            'BBIN'=>[
                'name' => 'BB電子',
                'plat_type' =>'BBIN',
                'game_type' => 'redirect',
                'game_code' => ''
            ],
            
            
            
            
            // 'JOKER2'=>[
            //     'name' => 'JOKER拉霸   2倍场',
            //     'plat_type' =>'JOKER2',
            //     'game_type' => 2
            // ],
            // 'JOKER5'=>[
            //     'name' => 'JOKER拉霸   5倍场',
            //     'plat_type' =>'JOKER5',
            //     'game_type' => 2
            // ],
            // 'JOKER10'=>[
            //     'name' => 'JOKER拉霸   10倍场',
            //     'plat_type' =>'JOKER10',
            //     'game_type' => 2
            // ],
            // 'PGS'=>[
            //     'name' => 'PGS電子',
            //     'plat_type' =>'PGS',
            //     'game_type' => 2
            // ],
            // 'PNG'=>[
            //     'name' => 'PNG電子',
            //     'plat_type' =>'PNG',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'GNS'=>[
            //     'name' => 'GNS電子',
            //     'plat_type' =>'GNS',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'PP'=>[
            //     'name' => 'PP電子',
            //     'plat_type' =>'PP',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'CQ9'=>[
            //     'name' => 'CQ9電子',
            //     'plat_type' =>'CQ9',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'MW'=>[
            //     'name' => 'MW電子',
            //     'plat_type' =>'MW',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'SG'=>[
            //     'name' => 'SG電子',
            //     'plat_type' =>'SG',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'JDB'=>[
            //     'name' => 'JDB電子',
            //     'plat_type' =>'JDB',
            //     'game_type' => '',
            //     'game_code'=>''
            // ],
            // 'FG'=>[
            //     'name' => 'FG電子',
            //     'plat_type' =>'FG',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'AGCNY'=>[
            //     'name' => 'AGCNY電子',
            //     'plat_type' =>'AGCNY',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'IMPT'=>[
            //     'name' => 'IMPT電子',
            //     'plat_type' =>'IMPT',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'IMSLOT'=>[
            //     'name' => 'IMSLOT電子',
            //     'plat_type' =>'IMSLOT',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'AG' => [
            //     'name' => 'AG電子',
            //     'plat_type' => 'AG',
            //     'game_type' => 2
            // ],
            // 'MG'=>[
            //     'name' => 'MG電子',
            //     'plat_type' =>'MG',
            //     'game_type' => 2
            // ],
            // 'GPI'=>[
            //     'name' => 'GPI電子',
            //     'plat_type' =>'GPI',
            //     'game_type' => 2
            // ],
            // 'BBIN'=>[
            //     'name' => 'BBIN電子',
            //     'plat_type' =>'BBIN',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'QT'=>[
            //     'name' => 'QT電子',
            //     'plat_type' =>'QT',
            //     'game_type' => 2
            // ],
            // 'SW'=>[
            //     'name' => 'SW電子',
            //     'plat_type' =>'SW',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'BNG'=>[
            //     'name' => 'BNG電子',
            //     'plat_type' =>'BNG',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'DT'=>[
            //     'name' => 'DT電子',
            //     'plat_type' =>'DT',
            //     'game_type' => 2
            // ],
            // 'PG'=>[
            //     'name' => 'PG電子',
            //     'plat_type' =>'PG',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'GTI'=>[
            //     'name' => 'GTI電子',
            //     'plat_type' =>'GTI',
            //     'game_type' => 2
            // ],
            // 'GA'=>[
            //     'name' => 'GA電子',
            //     'plat_type' =>'GA',
            //     'game_type' => 2
            // ],
            // 'HB'=>[
            //     'name' => 'HB電子',
            //     'plat_type' =>'HB',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'RT'=>[
            //     'name' => 'RT電子',
            //     'plat_type' =>'RT',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'ISB'=>[
            //     'name' => 'ISB電子',
            //     'plat_type' =>'ISB',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'GG'=>[
            //     'name' => 'GG電子',
            //     'plat_type' =>'GG',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
        ];

        $live = [
            // 'AGCNY'=>[
            //     'name' => 'AG視訊',
            //     'plat_type' =>'AGCNY',
            //     'game_type' => '',
            //     'game_code' => ''
            // ],
            // 'DG' => [
            //     'name' => 'DG視訊',
            //     'plat_type' => 'DG',
            //     'game_type' => 1,
            //     'is_demo' => 1
            // ],
            // 'AB' => [
            //     'name' => 'AB視訊',
            //     'plat_type' => 'AB',
            //     'game_type' => 1,
            //     'game_code' => '',
            //     'is_demo' => 0
            // ],
            // 'AG' => [
            //     'name' => 'AG視訊',
            //     'plat_type' => 'AG',
            //     'game_type' => 1,
            //     'is_demo' => 1
            // ],
            'BBIN' => [
                'name' => 'BBIN視訊',
                'plat_type' => 'BBIN',
                'game_type' => '',
                'game_code' => 'live',
                'is_demo' => 0
            ],
            
            // 'EVO' => [
            //     'name' => 'EVO視訊',
            //     'plat_type' => 'EVO',
            //     'game_type' => '',
            //     'game_code' => 'live',
            //     'is_demo' => 1
            // ],
            
            
            // 'EBET' => [
            //     'name' => 'EBET視訊',
            //     'plat_type' => 'EBET',
            //     'game_type' => '',
            //     'game_code' => '',
            //     'is_demo' => 0
            // ],
            
            
            // 'BG' => [
            //     'name' => 'BG視訊',
            //     'plat_type' => 'BG',
            //     'game_type' => 1,
            //     'game_code' => '',
            //     'is_demo' => 1
            // ],
            
            
            // 'SUNBET' => [
            //     'name' => '申博視訊',
            //     'plat_type' => 'SUNBET',
            //     'game_type' => 1,
            //     'is_demo' => 0
            // ],
            // 'ALLBET' => [
            //     'name' => '欧博視訊',
            //     'plat_type' => 'ALLBET',
            //     'game_type' => 1,
            //     'is_demo' => 1
            // ],
            // 'LEBO' => [
            //     'name' => 'LEBO視訊',
            //     'plat_type' => 'LEBO',
            //     'game_type' => 1,
            //     'game_code' => '',
            //     'is_demo' => 0
            // ],
            // 'SA' => [
            //     'name' => 'SA視訊',
            //     'plat_type' => 'SA',
            //     'game_type' => 1,
            //     'is_demo' => 1
            // ],
            // 'GD' => [
            //     'name' => 'GD視訊',
            //     'plat_type' => 'GD',
            //     'game_type' => 1,
            //     'is_demo' => 0,
            //     'game_code' => '',
            // ],
            'OG' => [
                'name' => 'OG視訊',
                'plat_type' => 'OG',
                'game_type' => 1,
                'game_code' => '',
                'is_demo' => 1
            ],
            
            // 'MG' => [
            //     'name' => 'MG視訊',
            //     'plat_type' => 'MG',
            //     'game_type' => 1,
            //     'is_demo' => 0
            // ],
            // 'PT' => [
            //     'name' => 'PT視訊',
            //     'plat_type' => 'PT',
            //     'game_type' => 1,
            //     'is_demo' => 0
            // ],
            // 'GPI' => [
            //     'name' => 'GPI視訊',
            //     'plat_type' => 'GPI',
            //     'game_type' => 1,
            //     'is_demo' => 0
            // ],
            
            // 'SEXY' => [
            //     'name' => 'SEXY視訊',
            //     'plat_type' => 'SEXY',
            //     'game_type' => 1,
            //     'is_demo' => 0
            // ],
            // 'CQ9' => [
            //     'name' => 'CQ9視訊',
            //     'plat_type' => 'CQ9',
            //     'game_type' => 1,
            //     'is_demo' => 0
            // ],
        ];
        $lottery = [
            'VR'=>[
                'name' => 'VR',
                'plat_type' =>'VR',
                'game_type' => '1',
                'game_code' => '',
            ],
            'IG' => [
                [
                    'name'  => 'IG',
                    'plat_type' => 'IG',
                    'game_type' => 3,
                    'game_code' => 'LOTTERY'
                ],
                // [
                //     'name'  => 'IG六合彩',
                //     'plat_type' => 'IG',
                //     'game_type' => 3,
                //     'game_code' => 'LOTTERY'
                // ],
                [
                    'name'  => 'IG',
                    'plat_type' => 'IG',
                    'game_type' => 3,
                    'game_code' => 'GFC'
                ]
            ],
            'SGWIN' => [
                'name'  => 'SGWIN',
                'plat_type' => 'SGWIN',
                'game_type' => '',
                'game_code' => ''
            ],
            'BBIN' => [
                'name'  => 'BBIN',
                'plat_type' => 'BBIN',
                'game_type' => '',
                'game_code' => 'Ltlottery'
            ],
            
            
            
            
            // 'EG' => [
            //     'name'  => 'EG彩票',
            //     'plat_type' => 'EG',
            //     'game_type' => 3,
            //     'game_code' => ''
            // ],
            
            // 'SGL' => [
            //     'name'  => 'SG双赢彩票',
            //     'plat_type' => 'SGL',
            //     'game_type' => 3,
            //     'game_code' => ''
            // ],
            // 'VR' => [
            //     'name'  => 'VR彩票',
            //     'plat_type' => 'VR',
            //     'game_type' => 3,
            //     'game_code' => ''
            // ],
            
            // 'BG' => [
            //     'name'  => 'BG彩票',
            //     'plat_type' => 'BG',
            //     'game_type' => 3,
            //     'game_code' => ''
            // ],
            // 'FH' => [
            //     'name'  => 'FH彩票',
            //     'plat_type' => 'FH',
            //     'game_type' => 3,
            //     'game_code' => ''
            // ],
            // 'TCG' => [
            //     'name'  => 'TCG彩票',
            //     'plat_type' => 'TCG',
            //     'game_type' => 3,
            //     'game_code' => ''
            // ],

        ];
        $sport = [
            'BBIN' => [
                'name'  => 'BBIN体育',
                'plat_type' => 'BBIN',
                'game_type' => '',
                'game_code' => 'ball'
            ],
            'AVIA' => [
                'name'  => 'AVIA泛亚电竞',
                'plat_type' => 'AVIA',
                'game_type' => '',
                'game_code' => ''
            ],
            'LH' => [
                'name'  => 'LH电竞',
                'plat_type' => 'LH',
                'game_type' => '',
                'game_code' => ''
            ],
            
            // 'SS' => [
            //     'name' => '三昇體育',
            //     'plat_type' => 'SS',
            //     'game_type' => '',
            //     'game_code' => '',
            // ],
            
            // 'SABA' => [
            //     'name' => 'SABA體育',
            //     'plat_type' => 'SABA',
            //     'game_type' => '',
            //     'game_code' => '',
            // ],
            // 'FASTBET' => [
            //     'name' => 'FT體育',
            //     'plat_type' => 'FASTBET',
            //     'game_type' => '',
            //     'game_code' => '',
            // ],
            
            
            
            
            // 'GJ' => [
            //     'name' => '皇冠體育',
            //     'plat_type' => 'GJ',
            //     'game_type' => 4,
            // ],
            // 'SS' => [
            //     'name' => '三昇體育',
            //     'plat_type' => 'SS',
            //     'game_type' => 4,
            // ],
            // 'IBC' => [
            //     'name' => '沙巴體育',
            //     'plat_type' => 'IBC',
            //     'game_type' => 4,
            // ],
            
            // 'NEWBB' => [
            //     'name' => 'NEWBB體育',
            //     'plat_type' => 'NEWBB',
            //     'game_type' => 4,
            // ],
            // 'AG' => [
            //     'name' => 'AG體育',
            //     'plat_type' => 'AG',
            //     'game_type' => 4,
            // ],
            // 'ESB' => [
            //     'name' => 'ESB电竞',
            //     'plat_type' => 'ESB',
            //     'game_type' => 5,
            // ],
            // 'AVIA' => [
            //     'name' => '泛亚电竞',
            //     'plat_type' => 'AVIA',
            //     'game_type' => 5,
            // ],
            // 'BL' => [
            //     'name' => '新皇冠體育',
            //     'plat_type' => 'BL',
            //     'game_type' => 4,
            // ],
            // 'IM' => [
            //     'name' => 'IM體育',
            //     'plat_type' => 'IM',
            //     'game_type' => 4,
            // ],
            // 'S128' => [
            //     'name' => 'S128體育',
            //     'plat_type' => 'S128',
            //     'game_type' => 4
            // ]
        ];
        $poker = [
            'KY' => [
                'name' => 'KY开元棋牌',
                'plat_type' => 'KY',
                'game_type' => '',
                'game_code' => '1',
            ],
            // 'LEYOU' => [
            //     'name' => '乐游棋牌',
            //     'plat_type' => 'LEYOU',
            //     'game_type' => '',
            //     'game_code' => '1',
            // ],
            // 'KAIXUAN' => [
            //     'name' => '凯旋棋牌',
            //     'plat_type' => 'KAIXUAN',
            //     'game_type' => '',
            //     'game_code' => '',
            // ],
            // 'KM' => [
            //     'name' => 'KM棋牌',
            //     'plat_type' => 'KM',
            //     'game_type' => '',
            //     'game_code' => '',
            // ],
            'TH' => [
                'name' => 'TH天豪棋牌',
                'plat_type' => 'TH',
                'game_type' => '',
                'game_code' => '',
            ],
            'NWG' => [
                'name' => 'NWG新世界棋牌',
                'plat_type' => 'NWG',
                'game_type' => '',
                'game_code' => '',
            ],
            'YS' => [
                'name' => 'YS永盛棋牌',
                'plat_type' => 'YS',
                'game_type' => '',
                'game_code' => '',
            ],
            'RMG' => [
                'name' => 'RMG大富翁棋牌',
                'plat_type' => 'RMG',
                'game_type' => '',
                'game_code' => '',
            ],
            'VG' => [
                'name' => 'VG棋牌',
                'plat_type' => 'VG',
                'game_type' => 'redirect',
                'game_code' => '',
            ],
            
            // 'AP' => [
            //     'name' => 'AP爱棋牌',
            //     'plat_type' => 'AP',
            //     'game_type' => 7
            // ],
            // 'VG' => [
            //     'name' => 'VG棋牌',
            //     'plat_type' => 'VG',
            //     'game_type' => 7
            // ],
            // 'SGP' => [
            //     'name' => 'SG棋牌',
            //     'plat_type' => 'SGP',
            //     'game_type' => 7
            // ],
            // 'LEG' => [
            //     'name' => 'LEG棋牌',
            //     'plat_type' => 'LEG',
            //     'game_type' => 7
            // ],
            'MT' => [
                'name' => '美天棋牌',
                'plat_type' => 'MT',
                'game_type' => 'redirect',
                'game_code' => '',
            ],
            // 'KY' => [
            //     'name' => '开元棋牌',
            //     'plat_type' => 'KY',
            //     'game_type' => 7
            // ],
            // 'FG' => [
            //     'name' => 'FG棋牌',
            //     'plat_type' => 'FG',
            //     'game_type' => 7
            // ],
            // 'NW' => [
            //     'name' => 'NW棋牌',
            //     'plat_type' => 'NW',
            //     'game_type' => 7
            // ],
            // 'RMG' => [
            //     'name' => 'RMG棋牌',
            //     'plat_type' => 'RMG',
            //     'game_type' => 7
            // ],
        ];
        $fish = [
            'MT' => [
                [
                    'name' => 'MT李逵捕魚',
                    'plat_type' => 'MT',
                    'game_type' => 'IMBG40024',
                    'game_code' => '',
                    'img' => '/web/images/catchFish/mtlk.png'
                ],
                [
                    'name' => 'MT金蟾捕魚',
                    'plat_type' => 'MT',
                    'game_type' => 'IMBG40025',
                    'game_code' => '',
                    'img' => '/web/images/catchFish/mtjc.png'
                ]
            ],
            'VG' => [
                'name' => 'VG捕魚王',
                'plat_type' => 'VG',
                'game_type' => 'IMBG30028',
                'game_code' => '',
                'img' => '/web/images/catchFish/ag.png'
            ],
            // 'BBIN' => [
            //     'name'  => 'BBIN捕鱼',
            //     'plat_type' => 'BBIN',
            //     'game_type' => '',
            //     'game_code' => 'Fishing',
            //     'img' => '/web/images/catchFish/bb.png'
            // ],
            // 'PLAYSTAR' => [
            //     [
            //         'name'  => 'PS海底捞',
            //         'plat_type' => 'PLAYSTAR',
            //         'game_type' => 'PSF-ON-00001',
            //         'game_code' => 'Fish',
            //         'img' => '/web/images/catchFish/bb.png'
            //     ],
            //     [
            //         'name'  => 'PS麻辣捕鱼',
            //         'plat_type' => 'PLAYSTAR',
            //         'game_type' => 'PSF-ON-00002',
            //         'game_code' => 'Fish',
            //         'img' => '/web/images/catchFish/bb2.png'
            //     ],
            // ],
            
            
            
            // 'JOKER2' => [
            //     'name' => 'JOKER捕魚王  2倍场',
            //     'plat_type' => 'JOKER2',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/joker.png'
            // ],
            // 'JOKER5' => [
            //     'name' => 'JOKER捕魚王 5倍场',
            //     'plat_type' => 'JOKER5',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/joker.png'
            // ],
            // 'JOKER10' => [
            //     'name' => 'JOKER捕魚王 10倍场',
            //     'plat_type' => 'JOKER10',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/joker.png'
            // ],
            // 'AG' => [
            //     'name' => 'AG捕魚王',
            //     'plat_type' => 'AG',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/ag.png'
            // ],
            // 'BBIN' => [
            //     [
            //         'name'  => 'BB捕魚达人',
            //         'plat_type' => 'BBIN',
            //         'game_type' => 6,
            //         'game_code' => '',
            //         'img' => '/web/images/catchFish/bb.png'
            //     ],
            //     [
            //         'name'  => 'BB捕魚大师',
            //         'plat_type' => 'BBIN',
            //         'game_type' => 6,
            //         'game_code' => '38001',
            //         'img' => '/web/images/catchFish/bb2.png'
            //     ],
            // ],
            // 'GG' => [
            //     'name' => 'GG捕魚2',
            //     'plat_type' => 'GG',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/cq9byql.png'
            // ],
            // 'MW' => [
            //     'name' => 'MW千炮捕魚',
            //     'plat_type' => 'MW',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/mw.png'
            // ],
            // 'SA' =>  [
            //     'name' => 'SA鱼乐无穷',
            //     'plat_type' => 'SA',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/sa.png'
            // ],
            // 'CQ9' =>  [
            //     'name' => 'CQ9皇金渔场',
            //     'plat_type' => 'CQ9',
            //     'game_type' => 6,
            //     'game_code' => '',
            //     'img' => '/web/images/catchFish/cq9.png'
            // ],
            // 'JDB' =>  [
            //     [
            //         'name' => 'JDB财神捕魚',
            //         'plat_type' => 'JDB',
            //         'game_type' => 6,
            //         'game_code' => '7_7003',
            //         'img' => '/web/images/catchFish/jdb.png'
            //     ],
            //     [
            //         'name' => 'JDB龙王捕魚',
            //         'plat_type' => 'JDB',
            //         'game_type' => 6,
            //         'game_code' => '7_7001',
            //         'img' => '/web/images/catchFish/jdblw.png'
            //     ],
            //     [
            //         'name' => 'JDB龙王捕魚2',
            //         'plat_type' => 'JDB',
            //         'game_type' => 6,
            //         'game_code' => '7_7002',
            //         'img' => '/web/images/catchFish/jdblw2.png'
            //     ]
            // ],
            // 'FG' => [
            //     [
            //         'name' => 'FG欢乐捕魚',
            //         'plat_type' => 'FG',
            //         'game_type' => 6,
            //         'game_code' => '',
            //         'img' => '/web/images/catchFish/fg.png'
            //     ],
            //     [
            //         'name' => 'FG美人捕魚',
            //         'plat_type' => 'FG',
            //         'game_type' => 6,
            //         'game_code' => 'fish_mm',
            //         'img' => '/web/images/catchFish/fgmr.png'
            //     ],
            //     [
            //         'name' => 'FG捕魚嘉年华',
            //         'plat_type' => 'FG',
            //         'game_type' => 6,
            //         'game_code' => 'ng_fg_10117',
            //         'img' => '/web/images/catchFish/fgjnh.png'
            //     ],
            //     [
            //         'name' => 'FG天天捕魚',
            //         'plat_type' => 'FG',
            //         'game_type' => 6,
            //         'game_code' => 'fish_tt',
            //         'img' => '/web/images/catchFish/fgtt.png'
            //     ],
            //     [
            //         'name' => 'FG捕鸟达人',
            //         'plat_type' => 'FG',
            //         'game_type' => 6,
            //         'game_code' => 'fish_bn',
            //         'img' => '/web/images/catchFish/fgbn.png'
            //     ],
            //     [
            //         'name' => 'FG雷霆战警',
            //         'plat_type' => 'FG',
            //         'game_type' => 6,
            //         'game_code' => 'fish_zj',
            //         'img' => '/web/images/catchFish/fglt.png'
            //     ],
            // ],
            
            
            
            // 'PT' => [
            //     'name' => 'PT深海大赢家',
            //     'plat_type' => 'PT',
            //     'game_type' => 6,
            //     'game_code' => 'cashfi',
            //     'img' => '/web/images/catchFish/ptdyj.png'
            // ],
            // 'SW' => [
            //     [
            //         'name' => 'SW捕魚多福',
            //         'plat_type' => 'SW',
            //         'game_type' => 6,
            //         'game_code' => '',
            //         'img' => '/web/images/catchFish/sw.png'
            //     ],
            //     [
            //         'name' => 'SW福气水果',
            //         'plat_type' => 'SW',
            //         'game_type' => 6,
            //         'game_code' => 'sw_fuqsg',
            //         'img' => '/web/images/catchFish/swfqsg.png'
            //     ]
            // ]
        ];
        //print_r($lottery);

        $member = $this->getMember();
        foreach ($apis as $k =>$v){
            if($type == 'slot') {
                if(in_array($v['api_name'],array_keys($slot))){
                    if ($v['on_line'] == 1) {
                        unset($slot[$v['api_name']]);
                    }
                    if($v['api_name'] == 'AG'){
                        if ($member && $member->is_ag == 2) {
                            unset($slot['AG']);
                        }
                    }
                    //return $slot;
                }
            }elseif ($type == 'live') {
                $is_sunbet = $is_sunbets = null;
                if($v['api_name'] == 'SUNBET') {
                    $is_sunbet = $v['on_line'];
                    $is_sunbets = isset($all['SUNBETS']) ? $all['SUNBETS']['on_line'] : null;
                    if(isset($all['SUNBETS'])) {//存在SUNBETS
                        $is_sunbets =  $all['SUNBETS']['on_line'] ;
                        if($is_sunbet == 1 && $is_sunbets == 1) {
                            unset($live['SUNBET']);
                        }
                    }else{
                        if ($is_sunbets == 1) {
                            unset($live['SUNBET']);
                        }
                    }
                }
                $is_ag = $is_ags = null;
                if($v['api_name'] == 'AG') {
                    $is_ag = $v['on_line'];
                    if(isset($all['AGS'])) {//存在AGS
                        $is_ags =  $all['AGS']['on_line'] ;
                        if($is_ag == 1 && $is_ags == 1) {
                            unset($live['AG']);
                        }
                    }else{
                        if ($is_ag == 1) {
                            unset($live['AG']);
                        }
                    }
                }
                if($v['api_name'] == 'SUNBET') continue;
                if($v['api_name'] == 'AG') continue;
                if(in_array($v['api_name'],array_keys($live))){
                    if ($v['on_line'] == 1) {
                        unset($live[$v['api_name']]);
                    }
                }
                //return $live;
            }elseif ($type == 'lottery'){
                if(in_array($v['api_name'],array_keys($lottery))){
                    if ($v['on_line'] == 1) {
                        unset($lottery[$v['api_name']]);
                    }
                    //$lottery = $this->arr($lottery);
                    //return $lottery;
                }
            }elseif ($type == 'sports'){
                if(in_array($v['api_name'],array_keys($sport))){
                    if ($v['on_line'] == 1) {
                        unset($sport[$v['api_name']]);
                    }
                    if($v['api_name'] == 'AG'){
                        if ($member && $member->is_ag == 2) {
                            unset($sport['AG']);
                        }
                    }
                    //return $sport;
                }
            }elseif ($type == 'poker') {
                if(in_array($v['api_name'],array_keys($poker))){
                    if ($v['on_line'] == 1) {
                        unset($poker[$v['api_name']]);
                    }
                    //return $poker;
                }
            }elseif ($type == 'fish'){
                if(in_array($v['api_name'],array_keys($fish))){
                    if ($v['on_line'] == 1) {
                        unset($fish[$v['api_name']]);
                    }
                    if($v['api_name'] == 'AG'){
                        if ($member && $member->is_ag == 2) {
                            unset($sport['AG']);
                        }
                    }
                    //$fish = $this->arr($fish);
                    //return $fish;
                }
            }
        }
        switch ($type){
            case 'slot':
                return $slot;
            case 'live':
                return $live;
            case 'lottery':
                $lottery = $this->arr($lottery);
                return $lottery;
            case 'sports':
                return $sport;
            case 'poker':
                return $poker;
            case 'fish':
                $fish = $this->arr($fish);
                return $fish;

        }

    }
    public function arr($arr)
    {
        $res = [];
        foreach ($arr as $k => $v) {
            if(count($v) == count($v,1)) {
                $res[] = $v;
            }else{
                foreach ($v as $kk => $vv){
                    $res[] = $vv;
                }
            }
        }
        return $res;
    }
}
