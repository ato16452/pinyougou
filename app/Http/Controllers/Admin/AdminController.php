<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\tb_admin_user;
use Think\Cache\Driver\Redis;

class AdminController extends Controller
{
    //运营商后台首页
    public function index(Request $request){
        //处理

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

    //管理员管理(展示)
    public function admin_change_admin(){
        $data = \DB::table('tb_admin_user')->orderBy('id','desc')->paginate(5);
        $i = 1;
        return view('Admin.admin.admin.admin_change_admin')->with('data',$data)->with('i',$i);
    }
    //管理员修改
    public function admin_update(Request $request,$id){
        $data = \DB::table('tb_admin_user')->where('id','=',$id)->first();
        return view('Admin.admin.admin.admin_update')->with('data',$data);
    }
    //管理员校验姓名,不包括自己
    public function checkname(Request $request){
        $username = $request->input('username'); //接受返回的用户名
        $id = $request->input('id');  //接受ajax返回的用户id
        $user = \DB::table('tb_admin_user')->where('id','=',$id)->get(); //通过id查询
        $uname = $user[0]->username;  //得到数据库的用户名
        if($uname == $username){ //因为是修改,可以不改用户名,因为该用户名也在数据库
            return '';
        }else{
            $data = \DB::table('tb_admin_user')->where('username','=',$username)->first();
            if($data){ //如果存在
                return '用户名已存在';    //如果后台报 500错误,可能跟return 的参数不支持或有问题
            }else{

            }
        }
    }
    //管理员保存修改
    public function adminup(Request $request){
        $tb_admin_user = new tb_admin_user();
        $tb_admin_user->id =$request->input('id');
        $tb_admin_user->username= $request->input('username');
        $tb_admin_user->password= $request->input('password');
        $tb_admin_user->phone= $request->input('phone');
        $tb_admin_user->email= $request->input('email');
        $res = $tb_admin_user->save();

//        $id = $request->input('id');
//        $username = $request->input('username');
//        $password= $request->input('password');
//        $phone= $request->input('phone');
//        $email= $request->input('email');
//        $arr = [
//            'id' =>$id,
//            'username'=>$username,
//            'password'=>$password,
//            'phone'=>$phone,
//            'email'=>$email,
//        ];
//        $res = \DB::table('tb_admin_user')->insert($arr);

        if($res){
            return 0;
        }else{
            return 1;
        }

    }

    //添加管理员
    public function adminadd(Request $request){
        $username = $request->input('username');

      $data = \DB::table('tb_admin_user')->where('username','=',$username)->first();
      if($data){ //如果存在
          return '用户名已存在';    //如果后台报 500错误,可能跟return 的参数不支持或有问题
      }else{
      }
    }
    //添加管理员
    public function adminadds(Request $request){
        $tb_admin_user = new tb_admin_user();
        $username = $tb_admin_user->username= $request->input('username');
        $tb_admin_user->password= $request->input('password');
        $tb_admin_user->phone= $request->input('phone');
        $tb_admin_user->email= $request->input('email');
        $res = $tb_admin_user->save();

        if($res){
            return 0;
        }else{
            return 1;
        }
    }
    //更改管理员状态 正常改为禁用
    public function admin_change_status(Request $request){
         new tb_admin_user();
        $id = $request->input('id'); //接受ajax传递过来的id
        $data = tb_admin_user::find($id); //查找到这个数据
        $data->status = 0; //将状态值改为0
        $res = $data->save();
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    //更改管理员状态 禁用改为正常
    public function admin_change_status2(Request $request){
        new tb_admin_user();
        $id = $request->input('id'); //接受ajax传递过来的id
        $data = tb_admin_user::find($id); //查找到这个数据
        $data->status = 1; //将状态值改为1
        $res = $data->save();
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    //删除管理员
    public function del(Request $request){
        //获取删除的id
        $id = $request->input('id');
        $res = DB::table('tb_admin_user')->where('id','=',$id)->delete();
        if($res){
            return 1;
        }else{
            return 0;
        }

}


    //管理员修改
    public function admin_change(Request $request,$id){
        $value = DB::table('tb_admin_user')->where('id','=',$id)->first();
        return view('Admin.admin.admin.admin_change_message',['value'=>$value]);

    }




    public function message(Request $request,$id){

    }

    /*******SellerController*****/
    //商家审核 seller  0 未审核 1已审核 2审核未通过
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
    //友情管理->友情链接
    public function link(){
        return view('Admin.admin.admin.link');
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
