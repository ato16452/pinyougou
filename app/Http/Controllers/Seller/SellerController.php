<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    //首页
    public function index(){
        return view('Admin.seller.admin.index');
    }
    //品优购商家后台 home.blade.php
    public function home(){
        return view('Admin.seller.admin.home');
    }

    //修改资料 seller.blade.php
    public function seller(){
        return view('Admin.seller.admin.seller');
    }
    //修改密码 password.blade.php
    public function password(){
        return view('Admin.seller.admin.password');
    }
    //新增商品 goods_edit.blade.php
    public function goods_edit(){
        return view('Admin.seller.admin.goods_edit');
    }
    //商品管理 goods.blade.php
    public function goods(){
        return view('Admin.seller.admin.goods');
    }
    //登录注册 shoplogin.blade.php
    public function shoplogin(){
        return view('Admin.seller.shoplogin');
    }
    //商家入驻申请  register.blade.php
    public function register(){
        return view('Admin.seller.register');
    }

}
