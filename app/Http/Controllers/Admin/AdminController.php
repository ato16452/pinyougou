<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //运营商后台首页
    public function index(){

        return view('Admin.admin.admin.index');
    }
    //首页
    public function home(){
        return view('Admin.admin.admin.home');
    }
    //商家审核 seller_1
    public function seller_1(){
        return view('Admin.admin.admin.seller_1');
    }
    //商家管理
    public function seller(){
        return view('Admin.admin.admin.seller');
    }
    //商品管理 ->品牌管理
    public function brand(){
        return view('Admin.admin.admin.brand');
    }
    //商品管理 ->规格管理
    public function specification(){
        return view('Admin.admin.admin.specification');
    }
    //商品管理 ->模板管理
    public function type_template(){
        return view('Admin.admin.admin.type_template');
    }
    //商品管理 ->分类管理
    public function item_cat(){
        return view('Admin.admin.admin.item_cat');
    }
    //商品管理 ->商品审核
    public function goods(){
        return view('Admin.admin.admin.goods');
    }
    //广告管理 ->广告类型管理
    public function content_category(){
        return view('Admin.admin.admin.content_category');
    }
    //广告管理 ->广告管理
    public function content(){
        return view('Admin.admin.admin.content');
    }
    //运营商登录
    public function login(){
        return view('Admin.admin.login');
    }

}
