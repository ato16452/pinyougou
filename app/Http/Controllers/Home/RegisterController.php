<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tb_user;
use Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Home.register.register');
    }


    public function insert(Request $request)
    {
        $phone = $request->input('phone'); //接受手机号

        $rand = rand(1234,9999);
        //将验证码存入session或redis
        session(['rand'=>$rand]);
        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => '904160a66440b96c3baba809518c32cc', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '146180', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$rand //您设置的模板变量，根据实际情况修改
        );

        $paramstring = http_build_query($params);
        $content = self::juheCurl($url, $paramstring); //json格式
//        $result = json_decode($content, true);
//        if ($result) {
//            var_dump($result);
//        } else {
//            //请求异常
//        }
        if($content){
            echo $content;
        }else{
            echo $content;
        }
    }

    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
   public static function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }
    public function check(Request $request){
        $username = $request->input('username');

        $data = \DB::table('tb_user')->where('username','=',$username)->first();
        if($data){ //如果存在
            return '用户名已存在';    //如果后台报 500错误,可能跟return 的参数不支持或有问题
        }else{
        }
    }
    //执行添加
    public function add(Request $request){
        $msg  =  $request->input('msg'); //接受返回的只
        $password = $request->input('password');
        $username = $request->input('username');
        $phone = $request->input('phone');
        $user = new tb_user();

       if(session('rand') == $msg){ //如果验证码相同
           $user->username = $username;
           $user->password = $password;
           $user->phone = $phone;
           $user->save();
           return 0;
       }else{
           return 1;
       }


    }

}
