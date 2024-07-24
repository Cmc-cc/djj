<?php
//全套程序 请 联系 WG 万博 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Member;
use App\Models\Api;
use App\Services\CurlService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BiController;
class ApiClientController extends WebBaseController
{

    //查询余额
    public function check(Request $request)
    {
        $api_name = strtoupper($request->get('api_name'));
        $member = $this->getMember();
        $res = '';
        switch ($api_name){
            case 'AG':
                $mod = new BiController();
                $res =  $mod->balance($api_name,$member->name);
                break;
            case 'BBIN': 
                $mod = new BiController();
                $res =  $mod->balance($api_name,$member->name);
                break;
            case 'MG':
                $mod = new BiController();
                $res =  $mod->balance($api_name,$member->name);
                break;
            case 'PT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'HB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'SG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'QT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'IBC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'UG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'SA':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'PP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'CQ9':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
            case 'OG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			 case 'VR':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			 case 'NT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			 case 'SC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			 case 'GJ':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
		     case 'VR':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;				
            case 'BG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'EG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'JDB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'DG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'PG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;					
            case 'BOG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'KY':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'RT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'ESB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
            case 'SUNBET':
                $mod = new BiController();
                $res =  $mod->balance("Sunbet", $member->name);
                break;
            case 'AB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'MX':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
        	case 'EBET':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'VG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GD':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'AGS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case '761':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'WM':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'IG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'IM':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'MT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'JS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'VT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'BS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'PNG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'N2':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'PTS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'WG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'MW':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'HG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'FG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'NEWVG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'NW':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'WS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'SW':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'TH':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'WG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'IGZR':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'IBC2':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'AS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'AVIA':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'KG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'IG2':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'DS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'SS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'IMQP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'LEG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'SUNBETS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'BGC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'KA':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GBC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'YG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GGE':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'SWC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'WGQP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'DSQP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			
				
			

           
            
    ///        case 'EG':
     ///           $mod = new EgController();
     //           $res =  $mod->balance($member->name, $member->original_password);
     //           break;
        }

        return $res;
    }

    //转入游戏
    public function deposit($api_name,$username,$password,$amount,$amount_type)
    {
        $api_name = strtoupper($api_name);
        $res = '';
        switch ($api_name){
            case 'AG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'BBIN':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'MG':
                $mod = new BiController();
                $res = $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'PT':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'HB':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'SG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'QT':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'IBC':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'UG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'SA':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'PP':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'CQ9':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
            case 'OG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;			
            case 'BG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'EG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'JDB':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'DG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'PG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'NT':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'SC':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'GJ':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'VR':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;				
            case 'BOG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'KY':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'RT':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'ESB':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
            case 'SUNBET':
                $mod = new BiController();
                $res =  $mod->deposit("Sunbet",$username, $amount, $amount_type);
                break;
            case 'AB':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
            case 'MX':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
            case 'VG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
            case 'EBET':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
            case 'GD':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
            case 'AGS':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			 case '761':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'MT':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'IG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'IM':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'WM':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'JS':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'VT':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'BS':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'PNG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'N2':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'PTS':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'WG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'HG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'MW':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'FG':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'NEWVG':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'NW':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'TH':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'SW':
                $mod = new BiController();
                $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'WS':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;
			case 'WG':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;	
			case 'IGZR':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'IG2':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'IBC2':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'AVIA':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'KG':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'AS':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'DS':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'SS':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'LEG':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'SUNBETS':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'IMQP':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'BGC':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'KA':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'GB':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'GBC':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'YG':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'GG':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'GGE':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'GA':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'AE':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'DSQP':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'WGQP':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			case 'SWC':
                $mod = new BiController();
               $res =  $mod->deposit($api_name,$username, $amount, $amount_type);
                break;		
			


  ///          case 'EG':
  ///              $mod = new EgController();
   ///             $res =  $mod->deposit($username, $password, $amount, $amount_type);
    ///            break;
        }

        return $res;
    }

    //转出游戏
    public function withdrawal($api_name,$username,$password,$amount,$amount_type)
    {
        $api_name = strtoupper($api_name);
        $res = '';
        switch ($api_name){
            case 'AG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//1
                break;
            case 'BBIN':
                $mod = new BiController();
                $res = $mod->withdrawal($api_name,$username, $amount, $amount_type);//2
                break;
            case 'MG':
                $mod = new BiController();
                $res = $mod->withdrawal($api_name,$username, $amount, $amount_type);//3
                break;
            case 'PT':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//4
                break;
            case 'HB':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//5
                break;
            case 'SG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//6
                break;
            case 'QT':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//7
                break;
			case 'IBC':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//8
                break;	
			case 'UG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//9
                break;
			case 'SA':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//10
                break;
			case 'PP':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//11
                break;	
			case 'CQ9':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//12
                break;	
            case 'OG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//13
                break;
            case 'BG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//14
                break;
            case 'NT':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//14
                break;
            case 'SC':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//14
                break;
            case 'GJ':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//14
                break;	
            case 'VR':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//14
                break;				
            case 'EG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//15
                break;
            case 'JDB':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//16
                break;
            case 'DG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//17
                break;
            case 'PG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//17
                break;	
            case 'BOG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//19
                break;
            case 'KY':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//20
                break;
            case 'RT':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//21
                break;
            case 'ESB':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//22
                break;
            case 'SUNBET':
                $mod = new BiController();
                $res =  $mod->withdrawal("Sunbet",$username, $amount, $amount_type);//23
                break;
			 case 'WG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//24
                break;	
            case 'AB':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//24
                break;	
            case 'MX':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//25
                break;	
            case 'VG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//26
                break;	
            case 'EBET':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//27
                break;	
            case 'GD':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//28
                break;	
            case 'AGS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//29
                break;	
			case '761':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//30
                break;	
			case 'WM':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//31
                break;	
			case 'IG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//32
                break;
			case 'MT':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//33
                break;
			case 'IM':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
			case 'JS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
			case 'VT':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
			case 'BS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
			case 'PNG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
			case 'N2':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
			
			case 'PTS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
			case 'MW':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
			case 'HG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
			case 'FG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
             case 'NEW':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
             case 'NW':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
             case 'TH':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
             case 'WS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
             case 'SW':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
			 case 'NEWVG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
			case 'WG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;	
            case 'IGZR':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'IG2':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'IBC2':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'AS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'KG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'AVIA':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'DS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'SS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'IMQP':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'SUNBETS':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'LEG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'BGC':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'KA':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'GB':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'GBC':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'YG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'GG':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'GGE':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'GA':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'AE':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'DSQP':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'WGQP':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            case 'SWC':
                $mod = new BiController();
                $res =  $mod->withdrawal($api_name,$username, $amount, $amount_type);//34
                break;
            
       ///     case 'EG':
       ///         $mod = new EgController();
       ///         $res =  $mod->withdrawal($username, $password, $amount, $amount_type);
       //         break;
        }

        return $res;
    }

    //查询商户余额
    public function credit(Request $request)
    {
        $api_name = strtoupper($request->get('api_name'));
        $res = '';
        switch ($api_name){
            case 'AG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//1
                break;
            case 'BBIN':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//2
                break;
            case 'AB':
                $mod = new BiController();
                $res = $mod->credit($api_name);//3
                break;
            case 'PT':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//4
                break;
            case 'MG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//5
                break;
            case 'HB':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//6
                break;
			case 'SG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//7
                break;	
			 case 'QT':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//8
                break;	
			case 'IBC':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//9
                break;
			case 'UG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//10
                break;
			case 'SA':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//11
                break;
			case 'PP':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//12
                break;			
            case 'CQ9':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//13
                break;
            case 'OG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//14
                break;
            case 'BG':
                $mod = new BiController();
                $res = $mod->credit($api_name);//15
                break;
            case 'NT':
                $mod = new BiController();
                $res = $mod->credit($api_name);//15
                break;            
            case 'EG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//16
                break;
			case 'SUNBET':
                $mod = new BiController();
                $res =  $mod->credit("Sunbet");//16"Sunbet"
                break;	
            case 'VR':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//17
                break;
            case 'GJ':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//18
                break;
            case 'SC':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//19
                break;	
            case 'JDB':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//20
                break;
            case 'DG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//21
                break;
            case 'PG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//22
                break;
            case 'BOG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//23
                break;
			case 'KY':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//24
                break;	
			case 'RT':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//25
                break;	
			case 'ESB':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//26
                break;	
			case 'AB':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//27
                break;
			case 'MX':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//28
                break;
			case 'VG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//29
                break;
			case 'GD':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//30
                break;
			case 'AGS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//31
                break;
			case 'EBET':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case '761':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'WM':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'IG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'MT':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case 'IM':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case 'JS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case 'VT':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case 'BS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case 'PNG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;
			case 'N2':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'WG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'PTS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
		    case 'MW':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'HG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'FG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
             case 'NEWVG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
             case 'TH':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
             case 'NW':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
             case 'SW':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
             case 'WS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
			case 'WG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32
                break;	
             case 'IGZR':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'AVIA':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'IBC2':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'IG2':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'AS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'KG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'DS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'SS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'IMQP':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'LEG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'SUNBETS':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'BGC':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'KA':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'GB':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'GBC':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'YG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'GG':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'GGE':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'GA':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'AE':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'DSQP':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'SWC':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
			case 'WGQP':
                $mod = new BiController();
                $res =  $mod->credit($api_name);//32AVIA
                break;	
				
        }

        return $res;
    }

    //后台查询用户余额
    public function balance($id, $api_name)
    {
        $member = Member::findOrFail($id);
        $res = '';
        switch ($api_name){
            case 'AG':
                $mod = new BiController();
                $res =  $mod->balance($api_name,$member->name);
                break;
            case 'BBIN':
                $mod = new BiController();
                $res =  $mod->balance($api_name,$member->name);
                break;
            case 'MG':
                $mod = new BiController();
                $res =  $mod->balance($api_name,$member->name);
                break;
            case 'PT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'HB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'SG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'QT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			 case 'IBC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'UG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'SA':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'PP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'CQ9':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
            case 'OG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'BG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'EG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'JDB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'DG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'PG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'SC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GJ':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'VR':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;					
            case 'BOG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'KY':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;            
			case 'RT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			 case 'ESB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
            case 'SUNBET':
                $mod = new BiController();
                $res =  $mod->balance("Sunbet", $member->name);
                break;            
			case 'AB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'MX':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'GD':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'VG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'EBET':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;				
			case 'AGS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break; 
			case '761':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break; 	
			case 'WM':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break; 
			case 'IM':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break; 
			case 'MT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break; 
			case 'IG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break; 
			case 'JS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'VT':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'BS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'PNG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'N2':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'WG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'PTS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'MW':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'HG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'FG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'NW':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'NEWVG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'TH':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'SW':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'WS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;
			case 'WG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;	
			case 'IGZR':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'IG2':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'IBC2':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'AS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'KG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'AVIA':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'DS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'SS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'LEG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'IMQP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'SUNBETS':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'BGC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'GB':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'GBC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'YG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'GG':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'GGE':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'GA':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'AE':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'DSQP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'SWC':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
			case 'WGQP':
                $mod = new BiController();
                $res =  $mod->balance($api_name, $member->name);
                break;		
				
       ///     case 'EG':
      ///          $mod = new EgController();
      //          $res =  $mod->balance($member->name, $member->original_password);
      //          break;
        }

        return $res;
    }

}
