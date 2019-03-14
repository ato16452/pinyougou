<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Models\tb_user;
use Hash;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $users = DB::table('tb_user')->get();
        return view('Admin.admin.admin_user.edituser')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //接受文件上传对象
        $file = $request->file('img');
        //处理文件上传名称,后缀
        $temp_name = date('Y-m-d h:i:s',time())+time();
        $ext = $file->extension();//获取后缀
        $filename = $temp_name.'.'.$ext;
        //上传文件,并且自定义名称
        $name = $file ->storeAs('UsersImg',$filename);

//       dd($request->all());
        //2.添加到数据库
        $user = new tb_user();
        $user->username = $request->input('username','');
        $user->password = Hash::make($request->input('password',''));
        $user->phone = $request->input('phone','');
        $user->email = $request->input('email','');
        $user->img = $request->input('img',$name);
        $res = $user->save(); //存入到数据库,$res为布尔值
        if($res){
            return redirect('/user')->with('success','添加成功');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo '11';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //修改
        echo '11';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         //获取删除的id
        $id = $request->input('id');
        //查询图片
        $path = DB::table('tb_user')->where('id','=',$id)->get();
        $imgpath = $path[0]->img;
        //dump($imgpath);
       //删除操作
        $res = DB::table('tb_user')->where('id','=',$id)->delete();
        if($res){ //如果成功
            //删除图片
            unlink('./Uploads/'.$imgpath);

            echo 'aaa';
        }else{
            echo 'bbb';
        }
    }
    public function delAll(Request $request){
        $str = $request->input('str');

        //查询图片
       $data =  DB::select("select * from tb_user where id in ($str)");
//        echo $str; //返回的是 id,id这种形式
        if($a = DB::delete("delete from tb_user where id in ($str)")){
            //批量删除图片
            foreach ($data as $value){
                unlink("./Uploads/{$value->img}");
            }

            return  $a;
        }else{
            return '0';
        }

    }

}
