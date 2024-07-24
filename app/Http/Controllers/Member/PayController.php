<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Web\WebBaseController;
use App\Models\Member;
use App\Models\PayRecord;
use App\Models\Recharge;
use App\Models\SystemConfig;
use App\Services\MbPay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayService;
use Illuminate\Support\Facades\Log;
use DB;
class PayController extends WebBaseController
{
    public function pay(Request $request)
    {
        $config = config('pay');

        $pay_memberid = $config['id'];   //商户ID
        $pay_orderid = getBillNo();    //订单号
        $amount = $request->get('amount')?sprintf("%.2f", $request->get('amount')):0.01;
        $pay_amount = $amount;    //交易金额
        $pay_applydate = date("Y-m-d H:i:s");  //订单时间
        $pay_bankcode = $request->get('bankcode')?:'Hcfwxscan';   //银行编码
        $pay_notifyurl = route('pay.notify');   //服务端返回地址
        $pay_callbackurl = route('pay.return');  //页面跳转返回地址

        $Md5key = $config['key'];   //密钥

        $tjurl = $config['url'];   //提交地址

        $requestarray = array(
            "pay_memberid" => $pay_memberid,
            "pay_orderid" => $pay_orderid,
            "pay_amount" => $pay_amount,
            "pay_applydate" => $pay_applydate,
            "pay_bankcode" => $pay_bankcode,
            "pay_notifyurl" => $pay_notifyurl,
            "pay_callbackurl" => $pay_callbackurl
        );

        ksort($requestarray);
        $md5str = "";
        foreach ($requestarray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
        $sign = strtoupper(md5($md5str . "key=" . $Md5key));
        $requestarray["pay_md5sign"] = $sign;

        $native['pay_attach'] = "1234|456";
        $native['pay_productname'] ='AAAA';


        $member = $request->get('mid')?Member::findOrFail($request->get('mid')):$this->getMember();
        //产生支付记录
        PayRecord::create([
            'member_id' => $member->id,
            'order_no' => $pay_orderid,
            'money' => $amount,
            'pay_type' => 1,
            'bankId' => $pay_bankcode,
            'clientIp' => $request->getClientIp(),
            'before_request_result' => json_encode($requestarray)
        ]);
        //充值记录
        Recharge::create([
            'bill_no' => $pay_orderid,
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $amount,
            'payment_type' => 4,
            'account' => '第三方支付',
            'status' => 1,
            'hk_at' => date('Y-m-d H:i:s')
        ]);

        // 生成表单数据
        echo $this->buildForm($requestarray, $tjurl);

    }

    public function pay_scan(Request $request)
    {
        $config = config('pay');

        // 请求数据赋值
        $data = [];
        // 商户APINMAE，WEB渠道一般支付
        $data['service'] = is_Mobile()?'TRADE.H5PAY':'TRADE.SCANPAY';
        // 商户API版本
        $data['version'] = $config['mobaopay_api_version'];
        // 商户在支付系统的平台号
        $data['merId'] = $config['platform_id'];

        //商户订单号
        $tradeNo = getBillNo();
        $data['tradeNo'] = $tradeNo;
        // 商户订单日期
        $data['tradeDate'] = date('Ymd');
        // 商户交易金额
        $amount = $request->get('amount')?sprintf("%.2f", $request->get('amount')):0.01;
        $data['amount'] = $amount;

        // 商户通知地址
        $data['notifyUrl'] = route('pay.notify');

        $data['summary'] = 'abc';
        $data['extra'] = 'qwer';

        $clientIp = $request->getClientIp();
        $data['clientIp'] = $clientIp;
        $bankCode = $request->get('typeId')?:2;
        $data['typeId'] = $bankCode;
        $data['expireTime'] = 180;


        // 对含有中文的参数进行UTF-8编码
        // 将中文转换为UTF-8
        if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['notifyUrl']))
        {
            $data['notifyUrl'] = iconv("GBK","UTF-8", $data['notifyUrl']);
        }


        if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['extra']))
        {
            $data['extra'] = iconv("GBK","UTF-8", $data['extra']);
        }

        if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['summary']))
        {
            $data['summary'] = iconv("GBK","UTF-8", $data['summary']);
        }

        // 初始化
        $cMbPay = new MbPay($config['mbp_key'], $config['mobaopay_gateway']);
        // 准备待签名数据
        $str_to_sign = $cMbPay->prepareSign($data);
        // 数据签名
        $sign = $cMbPay->sign($str_to_sign);
        $data['sign'] = $sign;


        $member = $request->get('mid')?Member::findOrFail($request->get('mid')):$this->getMember();
        //产生支付记录
        PayRecord::create([
            'member_id' => $member->id,
            'order_no' => $tradeNo,
            'money' => $amount,
            'pay_type' => 1,
            'bankId' => $bankCode,
            'clientIp' => $clientIp,
            'before_request_result' => json_encode($data)
        ]);
        //充值记录
        Recharge::create([
            'bill_no' => $tradeNo,
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $amount,
            'payment_type' => 4,
            'account' => '第三方支付',
            'status' => 1,
            'hk_at' => date('Y-m-d H:i:s')
        ]);

        //H5支付
        if ($data['service'] == 'TRADE.H5PAY')
        {
            echo $cMbPay->buildForm($data, $config['mobaopay_gateway']);
        }

        // 初始化
        $pPay = new MbPay($config['mbp_key'], $config['mobaopay_gateway']);
        // 准备请求数据
        $to_requset = $pPay->prepareRequest($str_to_sign, $sign);
        //请求数据
        $resultData = $pPay->request($to_requset);

        // 响应吗
        preg_match('{<code>(.*?)</code>}', $resultData, $match);
        $respCode = $match[1];

        // 响应信息
        preg_match('{<desc>(.*?)</desc>}', $resultData, $match);
        $respDesc = $match[1];


        preg_match('{<qrCode>(.*?)</qrCode>}', $resultData, $match);
        $respqrCode= $match[1];


        $base64 =$respqrCode;


        if (is_Mobile())
        {
            return view('wap.pay_scan', compact('base64'));
        }

        return view('member.pay_scan', compact('base64'));
    }

    public function quick_pay_apply(Request $request)
    {
        $config = config('pay');

        // 请求数据赋值
        $data = [];
        // 商户APINMAE，WEB渠道一般支付
        $data['service'] = 'TRADE.QUICKPAY.APPLY';
        // 商户API版本
        $data['version'] = $config['mobaopay_api_version'];
        // 商户在支付系统的平台号
        $data['merId'] = $config['platform_id'];

        //商户订单号
        $tradeNo = getBillNo();
        $data['tradeNo'] = $tradeNo;
        // 商户订单日期
        $opeDate =date('Ymd');
        $data['tradeDate'] = $opeDate;
        // 商户交易金额
        $amount = $request->get('amount')?sprintf("%.2f", $request->get('amount')):0.01;
        $data['amount'] = $amount;

        // 商户通知地址
        $data['notifyUrl'] = route('pay.notify');

        $data['summary'] = 'abc';
        $data['extra'] = 'qwer';

        $clientIp = $request->getClientIp();
        $data['clientIp'] = $clientIp;
        $bankCode = $request->get('bankcode')?:'ICBC';
        $data['bankId'] = $bankCode;
        $data['expireTime'] = 180;

        // 接收银行代码
        $data['cardType'] = $request->get("cardType");
        //银行卡号
        $data['cardNo'] = $request->get("cardNo");
        //开户姓名
        $data['cardName'] = $request->get("cardName");
        //身份证号
        $data['idCardNo'] = $request->get("idCardNo");
        //预留手机号
        $data['mobile'] = $request->get("mobile");
        //信用卡安全
        $data['cvn2'] = "";
        //签名
        $data['validDate'] = "";


        // 对含有中文的参数进行UTF-8编码
        // 将中文转换为UTF-8
        if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['notifyUrl']))
        {
            $data['notifyUrl'] = iconv("GBK","UTF-8", $data['notifyUrl']);
        }


        if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['extra']))
        {
            $data['extra'] = iconv("GBK","UTF-8", $data['extra']);
        }

        if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['summary']))
        {
            $data['summary'] = iconv("GBK","UTF-8", $data['summary']);
        }

        // 初始化
        $cMbPay = new MbPay($config['mbp_key'], $config['mobaopay_gateway']);
        // 准备待签名数据
        $str_to_sign = $cMbPay->prepareSign($data);
        // 数据签名
        $sign = $cMbPay->sign($str_to_sign);
        $data['sign'] = $sign;

        $member = $request->get('mid')?Member::findOrFail($request->get('mid')):$this->getMember();
        //产生支付记录
        PayRecord::create([
            'member_id' => $member->id,
            'order_no' => $tradeNo,
            'money' => $amount,
            'pay_type' => 1,
            'bankId' => $bankCode,
            'clientIp' => $clientIp,
            'before_request_result' => json_encode($data)
        ]);
        //充值记录
        Recharge::create([
            'bill_no' => $tradeNo,
            'member_id' => $member->id,
            'name' => $member->name,
            'money' => $amount,
            'payment_type' => 4,
            'account' => '第三方支付',
            'status' => 1,
            'hk_at' => date('Y-m-d H:i:s')
        ]);

        // 初始化
        $pPay = new MbPay($config['mbp_key'], $config['mobaopay_gateway']);
        // 准备请求数据
        $to_requset = $pPay->prepareRequest($str_to_sign, $sign);
        //请求数据
        $resultData = $pPay->request($to_requset);


        preg_match('{<code>(.*?)</code>}', $resultData, $match);

        $code = $match[1];

        if ($code == '00')
        {
            preg_match('{<sessionID>(.*?)</sessionID>}', $resultData, $match);

            $sessionID = $match[1];


            return view('member.third_quick_pay_confirm', compact('sessionID', 'tradeNo', 'opeDate'));
        } else {
            echo '错误代码 '.$code;exit;
        }

    }

    public function quick_pay_confirm(Request $request)
    {
        $config = config('pay');

        // 请求数据赋值
        $data = [];
        // 商户APINMAE，WEB渠道一般支付
        $data['service'] = 'TRADE.QUICKPAY.CONFIRM';
        // 商户API版本
        $data['version'] = $config['mobaopay_api_version'];
        // 商户在支付系统的平台号
        $data['merId'] = $config['platform_id'];

        //商户订单号
        $tradeNo = getBillNo();
        $data['opeNo'] = $request->get('tradeNo');
        // 商户订单日期
        $data['opeDate'] = $request->get('opeDate');

        // 商户通知地址
        $data['sessionID'] = $request->get('sessionID');

        $data['dymPwd'] = $request->get('dymPwd');


        $pPay = new MbPay($config['mbp_key'], $config['mobaopay_gateway']);
        // 准备待签名数据

        $str_to_sign = $pPay->prepareSign($data);
        // 数据签名
        $signMsg = $pPay->sign($str_to_sign);

        $data['sign'] = $signMsg;

        // 准备请求数据
        $to_requset = $pPay->prepareRequest($str_to_sign, $signMsg);
        //请求数据
        $resultData = $pPay->request($to_requset);

        preg_match('{<desc>(.*?)</desc>}', $resultData, $match);

        $desc = $match[1];

        echo $desc;
    }

    public function success()
    {
        $r = route('member.customer_report').'?type=0';
        if(is_Mobile())
        {
            $r = route('wap.recharge_record');
        }
        return view('member.pay_success', compact('r'));
    }

    public function notify(Request $request)
    {
        $res = $request->all();
        Log::info($res);

////        if ('0' == $res["notifyType"]) {
////            return redirect()->to(route('pay.success'));
//        }
        // 请求数据赋值
        $data = [];

        // 订单状态，0-未支付，1-支付成功，2-失败，4-部分退款，5-退款，9-退款处理中
        $data['status'] = $res["returncode"];
        $data['sdorderno'] = $res["orderid"];
        $data['total_fee'] = $res['amount'];

        //处理订单
//        if ('1' == $res["notifyType"])
//        {
            $mod = PayRecord::where('order_no', $data["sdorderno"])->first();
            if ($mod)
            {
                $member = Member::find($mod->member_id);
                $recharge = Recharge::where('bill_no', $data["sdorderno"])->first();

                $mod->update([
                    'status' => $data["status"],
                    'after_request_result' => json_encode($data)
                ]);


                //如果处理成功
                if ($recharge)
                {
                    if ($data['status'] == "00" && $recharge->status != 2)
                    {
                        //中心账户
                        $member->increment('money', $data["total_fee"]);
                        //支付记录
                        $recharge->update([
                            'status' =>2,
                            'confirm_at' => date('Y-m-d H:i:s'),
                        ]);
                    }
                }
            }


            echo  "ok";


        //}
    }
    public function ajax_pay(Request $request)
    {
        $rules = [
            'paytype' =>'required',
            //'pay_name' => 'required',
            'amount'=>'required'
        ];
        $msg = [
            'paytype.required' => '请选择支付方式',
            //'pay_name.required' => '支付姓名必须填写',
            'amount.required' => '金额必须填写'
        ];


        // $validator = Validator::make($request->all(),$rules,$msg);
        // if ($validator->fails())
        // {
        //     $messages = $validator->messages()->toArray();
        //     return responseWrong($messages);
        // }
        $data = $request->all();
        
        $member = $this->getMember();
        $system = Db::table('system_config')->select('recharge_min','recharge_max')->first();
        if($data['amount'] < $system->recharge_min) {
            return responseWrong(trans('lang.jebxdy').$system->recharge_min);
        }
        if($data['amount'] > $system->recharge_max) {
            return responseWrong(trans('lang.jebxxy').$system->recharge_max);
        }
        if (Db::table('recharge')->where('member_id', $member->id)->where('status', 1)->count()) {
            return responseWrong(trans('lang.qddpz'));
        }
        if($data['fanli']==2 && $data['amount'] < 200){
            return responseWrong('每日首充金額需大於200才能申請');
        }
        if($data['fanli']==3 && ($data['amount'] > 1000 || $data['amount'] < 100)){
            return responseWrong('新账号首充金額需在100-1000之間才能申請');
        }

        $reg="/^\d+(\.\d{0,2})?$/";
        if(!preg_match($reg,$data['amount'])){
            return responseWrong( trans('lang.qsrzqdsz'));
        }

        $config = SystemConfig::findOrFail(1);

        // if($config->is_thirdpay_on == 1 ) {
        //     return responseWrong('系统已关闭第三方支付');
        // }

        // if($request->get('xiaoshu') < 10){
        //     return responseWrong('禁止修改小数点');
        // }
        $amount = $request->get('amount');
        // $pay_amount = sprintf('%.2f',$amount);    //交易金额
        $pay_amount = $amount.'.'.$request->get('xiaoshu');    //交易金额
        $pay_name = $request->get('pay_name','');
        $pay_type = 'AliPay';
        $img = $request->get('img');
        if(!$img){
            // return responseWrong(trans('lang.qscjt'));
        }
        /*if ($pay_type == 'bankcard'){
            $pay_amount = $pay_amount / $this->getPrice($pay_type);
        }elseif ($pay_type == 'aliPay'){
            $pay_amount = $pay_amount / $this->getPrice($pay_type);
        }elseif ($pay_type == 'weChatpay'){
            $pay_amount = $pay_amount / $this->getPrice($pay_type);
        }*/
        $orderNum = 'buy'.getBillNo();
        
        if(Db::table('recharge')->where('member_id',$member->id)->where('status',1)->count()){
            return responseWrong('上个充值订单尚未处理， 请稍后再试');
        }
        $payment_type = 4;
        $account = '7-11便利店';
        if(@$data['paytype']=='usdt'){
            $payment_type = 6;
            $pay_amount = $pay_amount ;
            $account = round($pay_amount / $config->usdt_lv ,3);
        }
        PayRecord::create([
                'member_id' => $member->id,
                'order_no' => $orderNum,
                'opeNo' => '',
                'money' => $pay_amount,
                'pay_type' => 1,
                'typeId' => $pay_type,
                'clientIp' => $request->getClientIp(),
                'before_request_result' => '',
                'img'=>''
            ]);
            //充值记录
            Recharge::create([
                'bill_no' => $orderNum,
                'member_id' => $member->id,
                'name' => $member->name,
                'money' => $pay_amount,
                'payment_type' => $payment_type,
                'account' => $account,
                'status' => 1,
                'hk_at' => date('Y-m-d H:i:s'),
                'img'=>$img,
                'fanli'=>$data['fanli']
            ]);
            return responseSuccess('','', route('wap.recharge_record'));
        
        
        
        
        $orderNum = 'buy'.getBillNo();
        $jz = new JzService('primary');
        $member = $this->getMember();
        $array = [
            'jUserId'   => $member->id,
            'jUserIp'   => $request->getClientIp(),
            'jOrderId'  => $orderNum,
            'orderType' => 1,
            'payWay'    => $pay_type,
            'amount'    => $pay_amount,
            'currency'  => 'HKD',
            'jExtra'    => '充值',
            'notifyUrl' => route('pay.notify'),
        ];
        $res = $jz -> createOrder($array);

        if(is_array($res) && $res['code'] == 0) {
            PayRecord::create([
                'member_id' => $member->id,
                'order_no' => $orderNum,
                'opeNo' => $res['data']['orderId'],
                'money' => $pay_amount,
                'pay_type' => 1,
                'typeId' => $pay_type,
                'clientIp' => $request->getClientIp(),
                'before_request_result' => json_encode($res,JSON_UNESCAPED_UNICODE)
            ]);
            //充值记录
            Recharge::create([
                'bill_no' => $orderNum,
                'member_id' => $member->id,
                'name' => $member->name,
                'money' => $amount,
                'payment_type' => 4,
                'account' => '第三方支付',
                'status' => 1,
                'hk_at' => date('Y-m-d H:i:s')
            ]);
            return responseSuccess('','',$res['data']['paymentUrl']);
        }else{
            return responseWrong($res['message']);
        }
        /*$member = $this->getMember();
        $res = $this->login($this->merchant,$member->name,1,$orderNum,$pay_type,sprintf('%.2f',$pay_amount));
        if($res && $res['statusCode'] == 01) {
            //这个时候要产生支付记录

            $requestarray = [
                'member_id' => $member->id,
                'order_no' => $orderNum,
                'money' => $amount,
                'pay_name' => $pay_name,
                'name' => $member->name
            ];
            PayRecord::create([
                'member_id' => $member->id,
                'order_no' => $orderNum,
                'money' => $amount,
                'pay_type' => 1,
                'typeId' => $pay_type,
                'clientIp' => $request->getClientIp(),
                'before_request_result' => json_encode($requestarray,JSON_UNESCAPED_UNICODE)
            ]);
            $uri = $res['data']['url'];
            //$uri = 'http://192.168.1.3:8080/webpc/';
            $token = $res['data']['token'];
            $url = $uri .'?token='.$token;
            //echo $url;die;

            return responseSuccess('','',$url);
        }else{
            return responseWrong('网络错误！！');
        }*/
        /*if ($pay_type == 'bankcard'){
            $pay_amount = $pay_amount- $pay_amount*0.004;
        }elseif ($pay_type == 'aliPay'){
            $pay_amount = $pay_amount- $pay_amount*0.009;
        }elseif ($pay_type == 'weChatpay'){
            $pay_amount = $pay_amount- $pay_amount*0.009;
        }*/


        /*$arr = [
            'pay_name'=>$pay_name,
            'paytype' =>$pay_type,
            'amount' =>$pay_amount,
            't'=>date('YmdHis').getRandom()
        ];
        $url = route('ajax_post_pay').'?'.http_build_query($arr);*/




    }
    public function pay_return(Request $request)
    {
        return redirect()->to(route('pay.success'));
    }

    protected  function buildForm($data, $gateway) {
        $sHtml = "<form id='paysubmit' name='bankPaySubmit' action='".$gateway."' method='post'>";
        while (list ($key, $val) = each ($data)) {
            $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
        }
        $sHtml.= "</form>";
        $sHtml.= "<script>document.forms['bankPaySubmit'].submit();</script>";

        return $sHtml;
    }
}