<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Recharge;
use App\Models\Drawing;
use App\Models\Dividend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MoneyReportController extends Controller{
    
    public function index(Request $request){
        $mod = new Member();
        $recharge = new Recharge();
        $drawing = new Drawing();
        $dividend = new Dividend();
        $dividend_bak = new Dividend();
        $member_list =$name = $start_at = $end_at ='';

        if($request->has('type')){
            if($request->get('type') == 0){
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-3,date('Y')));
            }elseif ($request->get('type') == 1) {
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-7,date('Y')));
            }           
            elseif ($request->get('type') == 2) {
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-15,date('Y')));
            }
            elseif ($request->get('type') == 3) {
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-30,date('Y')));
            }
            $end_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d'),date('Y')));
            //$mod = $mod->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $recharge = $recharge->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $drawing = $drawing->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $dividend = $dividend->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $dividend_bak = $dividend_bak->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            //$a_list = $dividend->toSql();
            $member_list = $this->a_array_unique(array_merge($dividend->select(['member_id'])->get()->toArray(),$recharge->select(['member_id'])->get()->toArray(),$drawing->select(['member_id'])->get()->toArray()));
            
        }else{

            if ($request->has('name'))
            {
                $name = $request->get('name');
                //$mod = $mod->where('name', 'like', "%$name%");
                $recharge = $recharge->where('name', 'like', "%$name%");
                $drawing = $drawing->where('name', 'like', "%$name%");
                $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
                $dividend = $dividend->whereIn('member_id', $m_list);
                $dividend_bak = $dividend_bak->whereIn('member_id', $m_list);
            }
            if ($request->has('start_at'))
            {
                $start_at = $request->get('start_at');
                //$mod = $mod->where('created_at', '>=', $start_at);
                $recharge = $recharge->where('created_at', '>=', $start_at);
                $drawing = $drawing->where('created_at', '>=', $start_at);
                $dividend = $dividend->where('created_at', '>=', $start_at);
                $dividend_bak = $dividend_bak->where('created_at', '>=', $start_at);
            }
            if ($request->has('end_at'))
            {
                $end_at = $request->get('end_at');
                //$mod = $mod->where('created_at', '<=',$end_at);
                $recharge = $recharge->where('created_at', '<=',$end_at);
                $drawing = $drawing->where('created_at', '<=',$end_at);
                $dividend = $dividend->where('created_at', '<=',$end_at);
                $dividend_bak = $dividend_bak->where('created_at', '<=',$end_at);
            }
            $member_list = $this->a_array_unique(array_merge($dividend->select(['member_id'])->get()->toArray(),$recharge->select(['member_id'])->get()->toArray(),$drawing->select(['member_id'])->get()->toArray()));
        }
        $total_recharges = $recharge->where('status','=','2')->sum('money');
        $total_drawings = $drawing->where('status','=','2')->sum('money');
        // $total_fs = $dividend->where('type','=','3')->sum('money');
        $total_fs = $dividend->sum('money');
        $total_dividend = $dividend_bak->whereIn('type',array(1,2,4))->sum('money');

        //$a_list = $dividend_bak->toSql();
        //$a_list = $dividend->whereIn('type',array(1,2,4))->toSql();
        $total_yinli = $total_recharges - $total_drawings - $total_fs - $total_dividend;

        $data = $mod->whereIn('id',$member_list)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        
        return View("admin.money_report.index",compact('data','name', 'start_at', 'end_at','total_recharges','total_drawings','total_fs','total_dividend','total_yinli'));
    }
    
    public function money_report_export(Request $request){
        
        $mod = new Member();
        $recharge = new Recharge();
        $drawing = new Drawing();
        $dividend = new Dividend();
        $dividend_bak = new Dividend();
        $member_list =$name = $start_at = $end_at ='';

        if($request->has('type')){
            if($request->get('type') == 0){
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-3,date('Y')));
            }elseif ($request->get('type') == 1) {
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-7,date('Y')));
            }           
            elseif ($request->get('type') == 2) {
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-15,date('Y')));
            }
            elseif ($request->get('type') == 3) {
                $start_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d')-30,date('Y')));
            }
            $end_at = date('Y-m-d H:i:s',mktime(0,0,0,date('m'),date('d'),date('Y')));
            //$mod = $mod->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $recharge = $recharge->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $drawing = $drawing->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $dividend = $dividend->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            $dividend_bak = $dividend_bak->where('created_at', '>=', $start_at)->where('created_at', '<=',$end_at);
            //$a_list = $dividend->toSql();
            $member_list = $this->a_array_unique(array_merge($dividend->select(['member_id'])->get()->toArray(),$recharge->select(['member_id'])->get()->toArray(),$drawing->select(['member_id'])->get()->toArray()));
            
        }else{

            if ($request->has('name'))
            {
                $name = $request->get('name');
                //$mod = $mod->where('name', 'like', "%$name%");
                $recharge = $recharge->where('name', 'like', "%$name%");
                $drawing = $drawing->where('name', 'like', "%$name%");
                $m_list = Member::where('name', 'LIKE', "%$name%")->pluck('id');
                $dividend = $dividend->whereIn('member_id', $m_list);
                $dividend_bak = $dividend_bak->whereIn('member_id', $m_list);
            }
            if ($request->has('start_at'))
            {
                $start_at = $request->get('start_at');
                //$mod = $mod->where('created_at', '>=', $start_at);
                $recharge = $recharge->where('created_at', '>=', $start_at);
                $drawing = $drawing->where('created_at', '>=', $start_at);
                $dividend = $dividend->where('created_at', '>=', $start_at);
                $dividend_bak = $dividend_bak->where('created_at', '>=', $start_at);
            }
            if ($request->has('end_at'))
            {
                $end_at = $request->get('end_at');
                //$mod = $mod->where('created_at', '<=',$end_at);
                $recharge = $recharge->where('created_at', '<=',$end_at);
                $drawing = $drawing->where('created_at', '<=',$end_at);
                $dividend = $dividend->where('created_at', '<=',$end_at);
                $dividend_bak = $dividend_bak->where('created_at', '<=',$end_at);
            }
            $member_list = $this->a_array_unique(array_merge($dividend->select(['member_id'])->get()->toArray(),$recharge->select(['member_id'])->get()->toArray(),$drawing->select(['member_id'])->get()->toArray()));
        }
        $total_recharges = $recharge->where('status','=','2')->sum('money');
        $total_drawings = $drawing->where('status','=','2')->sum('money');
        $total_fs = $dividend->where('type','=','3')->sum('money');
        $total_dividend = $dividend_bak->whereIn('type',array(1,2,4))->sum('money');

      
        $total_yinli = $total_recharges - $total_drawings - $total_fs - $total_dividend;

        $data = $mod->whereIn('id',$member_list)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        $html = '<table>
                    <tr>
                        <td>用户名</td>
                        <td>真实姓名</td>
                        <td>手机号</td>
                        <td>代理/上级</td>
                        <td>存款次数</td>
                        <td>提款次数</td>
                        <td>存款总金额</td>
                        <td>提款总金额</td>
                        <td>总返水</td>
                        <td>总红利</td>
                        <td>盈亏总额</td>
                    </tr>';
       if($data){
            foreach ($data as $k=>$v){
                $u_recharges_mod = $v->recharges();
                $u_drawings_mod = $v->drawings();
                $u_dividends_fs_mod = $v->dividends();
                $u_dividends_other_mod = $v->dividends();
                if($start_at){
                    $u_recharges_mod = $u_recharges_mod->where('created_at','>=',$start_at);
                    $u_drawings_mod = $u_drawings_mod->where('created_at','>=',$start_at);
                    $u_dividends_fs_mod = $u_dividends_fs_mod->where('created_at','>=',$start_at);
                    $u_dividends_other_mod = $u_dividends_other_mod->where('created_at','>=',$start_at);
                }
                if($end_at){
                    $u_recharges = $u_recharges_mod->where('created_at','<=',$end_at);
                    $u_drawings_mod = $u_drawings_mod->where('created_at','<=',$end_at);
                    $u_dividends_fs_mod = $u_dividends_fs_mod->where('created_at','<=',$end_at);
                    $u_dividends_other_mod = $u_dividends_other_mod->where('created_at','<=',$end_at);
                }
                $u_recharges= $u_recharges_mod->count();
                $u_drawings = $u_drawings_mod->count();
                $u_recharges_money = $u_recharges_mod->where('status','=','2')->sum('money');
                $u_drawings_money = $u_drawings_mod->where('status','=','2')->sum('money');
                $u_dividends_fs_money = $u_dividends_fs_mod->where('type',3)->sum('money');
                $u_dividends_other_money = $u_dividends_other_mod->whereIn('type',[1,2,4,5,6,7,8,9,10])->sum('money');
                $parent = Db::table('members')->where('id',$v->top_id)->first();
                $parent_name = $parent ? @$parent->name:'';
                $is_daili = $v->is_daili ? '是':'否';
                $html .= '<tr>';
                $html .= '<td>'.$v->name.'</td>';
                $html .= '<td>'.$v->real_name.'</td>';
                $html .= '<td>'.$v->phone.'</td>';
                $html .= '<td>'.$is_daili.'/'.$parent_name .'</td>';
                $html .= '<td>'.$u_recharges.'</td>';
                $html .= '<td>'.$u_drawings.'</td>';
                $html .= '<td>'.$u_recharges_money.'</td>';
                
                $html .= '<td>'.$u_drawings_money.'</td>';
                $html .= '<td>'.$u_dividends_fs_money.'</td>';
                $html .= '<td>'.$u_dividends_other_money.'</td>';
                $html .= '<td>'.($u_recharges_money - $u_drawings_money).'</td>';
                $html .= '</tr>';
            }
            
                $html .= '<tr>';
                $html .= '<td colspan="6">'."合计".'</td>';
                $html .= '<td>'.$total_recharges.'</td>';
                $html .= '<td>'.$total_drawings.'</td>';
                $html .= '<td>'.$total_fs.'</td>';
                $html .= '<td>'.$total_dividend.'</td>';
                $html .= '<td>'.$total_yinli.'</td>';
                $html .= '</tr>';
       }
       $html .= '</table>';
       
        header("Content-type:application/vnd.ms-excel");  //设置内容类型
        header("Content-Disposition:attachment;filename=财务报表.xlsx");  //文件下载
        echo $html;die;
    }

    public function a_array_unique($array){
        $out = array();
        foreach ($array as $key=>$value) {
            if (!in_array($value, $out)){
                $out[$key] = $value;
            }
        }

        $out = array_values($out);
        return $out;
    }
}