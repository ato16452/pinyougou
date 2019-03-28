<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){
        //注册成功后,跳转到这里处理数据

        $username = $request->input('username');
        if($username != ''){
            session(['username'=>$username]); //存入缓存
            return view('Home.index')->with('username',$username);
        }else{
            return view('Home.index');
        }

    }
    //注销
    public function loginout(){
        session()->forget('username');
        return view('Home.index');
    }
}
