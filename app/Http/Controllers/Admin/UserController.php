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
        /********1******/
        //无刷新分页
        //计算数据总条数
        $tot = \DB::table('tb_user')->count();
        $length = 2;
        //计算总页数
        $page = ceil($tot/$length);
        /********1******/

        /********3******/
        //判断地址栏参数是否存在  接受前端ajax发送的page
        if(isset($_GET['page'])){ //p代表第几页
            //计算分页
            $offset = ($_GET['page']-1)*$length; //偏移量
            //进行数据库查询
            $data = DB::select("select * from tb_user limit $offset ,$length");
            //返回JSON  传统方式的返回
//            return $data;

            //商业模式 直接返回一个页面,新建一个页面page.blade.php,把edituser页面中遍历数据的页面拷贝出来
            return view('Admin.admin.admin_user.page')->with('data',$data)->with('page',$page);


        }
        /********3******/

        /*******1.5总页数的分页*******/
       $data = DB::select("select * from tb_user limit 0,$length");
        return view('Admin.admin.admin_user.edituser')->with('data',$data)->with('page',$page);
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
    public function edit(Request $request,$id)
    {
        $data = DB::select("select * from tb_user where id = {$id}");
        var_dump($data);
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
            //如果文件夹下存在此文件
         if($imgpath == null){
             return '0';
         }else{
             //删除图片
             unlink('./Uploads/'.$imgpath);
             return '0';
         }
        }else{
            return '1';
        }
    }

    public function delAll(Request $request){
        $str = $request->input('str');

        //查询图片
       $data =  DB::select("select * from tb_user where id in ($str)");
//        echo $str; //返回的是 id,id这种形式
        if( $a = DB::delete("delete from tb_user where id in ($str)")){
            //批量删除图片

                foreach ($data as $value){
                        unlink("./Uploads/{$value->img}");
                        return  $a;
                    }
        }else{
            return '0';
        }

    }

    //无刷新分页测试
    public function page(Request $request)
    {
//1、查询数据库总条数
        $count = count(Db::table('tb_user')->get());
//2、设置每页显示条数
        $rev = '4';
//3、求总页数
        $sums = ceil($count/$rev);
//4、求单前页
        $page = $request->input('page'); //ajax传递过来的页数 isset($_GET['page'])
        if(empty($page)){
            $page = "1";
        }
//        if(isset($_GET['page'])){
//            $page = Input::get('page');
//        }
//5、设置上一页、下一页
        $prev = ($page-1)>0?$page-1:1;
        $next = ($page+1)<$sums?$page+1:$sums;
//6、求偏移量
        $offset = ($page-1)*$rev;
//7、sql查询数据库
        $data = DB::select("select * from tb_user limit $offset,$rev");
//8、数字分页(可有可无)
        $pp = array();
        for($i=1;$i<=$sums;$i++){
            $pp[$i]=$i;
        }
        return view('Admin.admin.admin_user.page',['data'=>$data,'prev'=>$prev,'next'=>$next,'sums'=>$sums,'pp'=>$pp,'page'=>$page]);
    }
    /*
    @需要替换的部分页面
    */
    public function page_pro(Request $request){
        //1、查询数据库总条数
        $count = count(Db::table('tb_user')->get());
//2、设置每页显示条数
        $rev = '4';
//3、求总页数
        $sums = ceil($count/$rev);
//4、求单前页
        $page = $request->input('page');
        if(empty($page)){
            $page = "1";
        }
//5、设置上一页、下一页
        $prev = ($page-1)>0?$page-1:1;
        $next = ($page+1)<$sums?$page+1:$sums;
//6、求偏移量
        $offset = ($page-1)*$rev;
//7、sql查询数据库
        $data = DB::select("select * from tb_user limit $offset,$rev");
//8、数字分页(可有可无)
        $pp = array();
        for($i=1;$i<=$sums;$i++){
            $pp[$i]=$i;
        }
        return view('Admin.admin.admin_user.page_pro', ['data'=>$data,'prev'=>$prev,'next'=>$next,'sums'=>$sums,'pp'=>$pp,'page'=>$page]);
}
}
