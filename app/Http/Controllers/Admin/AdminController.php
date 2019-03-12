<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    //运营商后台首页
    public function index(Request $request){
        //获取session
        $val = $request->session()->get('data');
        if($val){
            return view('Admin.admin.admin.index',['val'=>$val]);
        }else{
            return redirect('/admin/login');
        }

    }
    //首页
    public function home(){
        return view('Admin.admin.admin.home');
    }
    //管理员管理
    public function admin_change_message(){
        $data =  DB::table('tb_admin_user')->get();
        $val = json_decode($data,true);
        return view('Admin.admin.admin.admin_change_message',['val'=>$val]);
    }
    //管理员修改
    public function admin_change(Request $request,$id){
        $val = DB::table('tb_admin_user')->get();
        dump($val);
    }

    public function message(Request $request,$id){
      dump($id);
    }
    //管理员管理
    public function admin_change_admin(){
        return view('Admin.admin.admin.admin_change_admin');
    }

    /*******SellerController*****/
    //商家审核 seller
    public function seller_1(){
        return view('Admin.admin.admin.seller_1');
    }
    //商家管理 seller
    public function seller(){
        return view('Admin.admin.admin.seller');
    }
    /*******SellerController*****/

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
    public function login(Request $request){
        return view('Admin.admin.login');
    }
    public function login_in(Request $request){
        //接受数据
        $data = $request->except('_token');
        //加密
        $data['password'] = md5($data['password']);
        //1.判断用户名和密码是否正确
        //1.1查询数据 tb_admin_user,对比提交的数据
        $ad = DB::table('tb_admin_user')->get(); //二维,Collection对象
        $admin =json_decode($ad,true); //转json,
        //1.2判断
        if($admin[0]['username'] == $data['username'] && $admin[0]['password'] == $data['password']){
            //如果正确
            //1.存入session
           $request->session()->put('data',$data);
           //2.获取session,传到页面
            $val = $request->session()->get('data');
            return view('Admin.admin.admin.index',['val'=>$val]);
        }else{
            //返回登录失败信息
            return redirect('/admin/login');
        }
    }

}
