<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tb_item_cat;
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
        //查询一级分类
        $data = \DB::table('tb_item_cat')->where('parent_id','=',0)->get();
        //查询品牌列表
        $brand = \DB::table('tb_brand')->get();
        return view('Admin.seller.admin.goods_edit',['data'=>$data,'brand'=>$brand]);
    }
    //二级分类
    public function two(Request $request){
        //接受传过来的一级分类id
        new tb_item_cat();
        $id = $request->input('id');
        //二级分类的parent_id等于一级分类id
        $data  = \DB::table('tb_item_cat')->where('parent_id','=',$id)->get();
        return $data;

    }
    //三级分类
    public function three(Request $request){
        //接受传过来的二级级分类的parent_id
//        new tb_item_cat();
        $oneid = $request->input('id');
//        //三级分类的parent_id等于二级分类id
       $data  = \DB::select("SELECT * from tb_item_cat where parent_id = $oneid ");
        return $data;
    }

    //品牌下拉ajax
    public function brand(){
        $data = \DB::table('tb_brand')->get();
        return $data;
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
