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
        return view('Home.register');
    }

    public function insert(Request $request)
    {
        // dump($request->all());
        if($request->password != $request->repassword){
            dd('两次密码不一致');
        }

        $users = new tb_user;
        $users->phone = $request->input('phone','');
        $users->password = Hash::make($request->input('password',''));
        $users->save();

    }
}
