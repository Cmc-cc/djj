<?php

namespace App\Http\Controllers\Admin;

use App\Models\Api;
use App\Services\CurlService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends AdminBaseController
{
    //
    public function index()
    {
        $data = (new \App\Models\Version())->orderBy('id','desc')->first();
        $api = Api::where('api_name','SELF')->first();
        $this->getInfo($api);
        if($data){
            $updated_at = $data->last_time;
        }else{
            $updated_at = '2018-12-04 12:48:41';//默认功能时间
        }
        //$updated_at = '2018-12-04 12:48:41';//默认功能时间
        $api_url = "http://127.0.0.1";


        $post_data = [
            'created_at' => $updated_at,
            'api_account' => $api->api_id,
            'web_url' =>'www.'.$this->get_host(),
            'admin_url' => env('ADMIN_URL'),
            'sign_key'=>$api->api_key
        ];


        $res = (new CurlService())->get($api_url,$post_data);
        $res = json_decode($res,true);
        if(is_array($res) && $res['status'] == 1){
            $num = count($res['data']);
            return $num;
        }else{
            return 0;
        }
    }
    public function getInfo($api)
    {
        $url = 'http://update.wg-os.com/getInfo';
        $info = [
            'web_url' =>'www.'.$this->get_host(),
            'admin_url' => env('ADMIN_URL'),
            'api_account'=>$api->api_id,
            'sign_key'=>$api->api_key
        ];
        //print_r($info);
        (new CurlService())->get($url,$info);
    }
    function get_host($to_virify_url = ''){

        $url   = $to_virify_url ? $to_virify_url : $_SERVER['HTTP_HOST'];
        $data = explode('.', $url);
        $co_ta = count($data);

        //判断是否是双后缀
        $zi_tow = true;
        $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
        $host_cn = explode(',', $host_cn);
        foreach($host_cn as $host){
            if(strpos($url,$host)){
                $zi_tow = false;
            }
        }

        //如果是返回FALSE ，如果不是返回true
        if($zi_tow == true){

            // 是否为当前域名
            if($url == 'localhost'){
                $host = $data[$co_ta-1];
            }
            else{
                $host = $data[$co_ta-2].'.'.$data[$co_ta-1];
            }

        }
        else{
            $host = $data[$co_ta-3].'.'.$data[$co_ta-2].'.'.$data[$co_ta-1];
        }

        return $host;
    }
    public function show()
    {
        $data = (new \App\Models\Version())->orderBy('id','desc')->first();
        $api = Api::where('api_name','SELF')->first();
        if($data){
            $updated_at = $data->last_time;
        }else{
            $updated_at = '2018-12-04 12:48:41';//默认功能时间
        }
        //$updated_at = '2018-12-04 12:48:41';//默认功能时间
        $api_url = "http://127.0.0.1";


        $post_data = [
            'created_at' => $updated_at,
            'api_account' => $api->api_id,
            'web_url' =>'www.'.$this->get_host(),
            'admin_url' => env('ADMIN_URL'),
            'sign_key'=>$api->api_key
        ];


        $res = (new CurlService())->get($api_url,$post_data);
        $res = json_decode($res,true);

        $all = [];
        $total = 0;
        if(is_array($res) && $res['status'] == 1){
            $all = $res['data'];
            $total = count($res['data']);
        }
        return view('admin.web.show',compact('all','total'));
    }

}
