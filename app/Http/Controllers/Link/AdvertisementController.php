<?php

namespace App\Http\Controllers\Link;

use App\Models\tb_links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
        $data = \DB::table('tb_links')->paginate(5);
        return view('Admin.admin.advertisement.link')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //接受文件上传对象
//        $file = $request->file('link_image');
////       $file_name = $file->store('link_image');
////       dd($file_name);  //"link_image/GS69kbEtrElg6AEZR7vZcETJzjmUm8ITiRfsUbDU.png"
////
////        if($file != ''){
////            $arr = [
////                'msg'=>'success',
////            ];
////        }else{
////            $arr = [
////                'msg'=>'error',
////            ];
////        }
////        //处理文件上传名称,后缀
//        $temp_name = date('Y-m-d h:i:s',time())+time();
//        $ext = $file->extension();//获取后缀
////        dd($ext);   //png
//        $filename =  $temp_name.'.'.$ext;
////        //上传文件,并且自定义名称
//        $link_image = $file ->storeAs('LinkImg',$filename); //$link_image为路径,LinkImg/xxxx.png
//
//
//        //接受其他数据
//        //创建模型,因为数据都是单数据,需要用一个空数组装起来,用模型添加方便
//        $tb_links = new tb_links();
//        $tb_links->link_image = $request->input('filename',$link_image); //单条数据
//        $tb_links-> link_name = $request->input('linkname','');
//
//        $tb_links->link = $request->input('linklink','');
//        $tb_links-> startTime = $request->input('sT','');
//        $tb_links-> endTime = $request->input('eT','');
//
//        $res = $tb_links->save(); //保存数据
//        if($res){
//          return  1;
//        }else{
//          return 0;
//        }
//       $a  = $request->input('linkname');
//       dd($a);
////
//
//        if ($request->method() == 'POST') {
//            $data = $request->all(); //保护文件对象
//            $file = $request->file('link_image');
//        };
//        if ($file->isValid()) {
//            $ext = $file->guessClientExtension(); //获取后缀
//            $type = $file->getClientMimeType(); //后去文件类型
//            if (in_array($ext, ['jpg', 'png', 'jpeg']) && in_array($type, ['image/jpeg', 'image/png'])) {
//                $filename = uniqid() . '.' . $ext;
//                if ($file->storeAs('LinkImg', $filename) == false) {
//                    return response()->json(['result' => false, 'errMsg' => '上传文件出错']);
//                }
//            }
//        }
//        $tb_links = new tb_links();
//        $tb_links-> link_name = $request->input('linkname');
//        $tb_links-> link = $request->input('linklink');
//        $tb_links->link_image = $request->input('link_image',$filename);
//        $tb_links-> startTime = $request->input('sT');
//        $tb_links-> endTime = $request->input('eT');
////
////        $tb_links->link = $request->input('linklink','');
////        $tb_links-> startTime = $request->input('sT','');
////        $tb_links-> endTime = $request->input('eT','');
////
//        $res = $tb_links->save(); //保存数据
//        if($res){
//            echo '0';
//        }else{
//            echo '1';
//        }

//        $data3 = $request->file('file');

        if ($request->method() == 'POST') {
            $file = $request->file('file');
        };
        if ($file->isValid()) {
            $ext = $file->guessClientExtension(); //获取后缀
            $type = $file->getClientMimeType(); //后去文件类型
            if (in_array($ext, ['jpg', 'png', 'jpeg']) && in_array($type, ['image/jpeg', 'image/png'])) {
                $filename =uniqid() . '.' . $ext;
                $name = $file->storeAs('LinkImg', $filename);
                if ($name == 'LinkImg/') {
                    return response()->json(['result' => false, 'errMsg' => '上传文件出错']);
                }
            }
        }
        $tb_links = new tb_links();
       $linkname =  $tb_links->link_name = $request->input('linkname');
       $linklink =  $tb_links->link = $request->input('linklink');
       $sT = $tb_links->startTime = $request->input('sT');
      $eT =  $tb_links->endTime = $request->input('eT');
       $path =  $tb_links->link_image = $request->input('file',$name);
        $res = $tb_links->save();

        if($res){
            return 0;
        }else{

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //接收ajax返回的id
        $id = $request->input('id');

            $data = DB::table('tb_links')->where('id','=',$id)->get();
            //返回到展示数据的页面,然后将该页面替换掉原页面
            return $data;

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

//        if ($request->method() == 'put') {
//            $file = $request->file('file');
//        };
//        if ($file->isValid()) {
//            $ext = $file->guessClientExtension(); //获取后缀
//            $type = $file->getClientMimeType(); //后去文件类型
//            if (in_array($ext, ['jpg', 'png', 'jpeg']) && in_array($type, ['image/jpeg', 'image/png'])) {
//                $filename =uniqid() . '.' . $ext;
//                $name = $file->storeAs('LinkImg', $filename);
//                if ($name == 'LinkImg/') {
//                    return response()->json(['result' => false, 'errMsg' => '上传文件出错']);
//                }
//            }
//        }
        $tb_links = new tb_links();

        //获取ajax返回的参数
        $id = $tb_links->id = $request->input('id');

        $linkname =  $tb_links->link_name = $request->input('linkname');
        $linklink =  $tb_links->link = $request->input('linklink');
        $sT = $tb_links->startTime = $request->input('sT');
        $eT =  $tb_links->endTime = $request->input('eT');
//        $path =  $tb_links->link_image = $request->input('file',$name);
        //修改数据
        $tb_links::find($id);
        $tb_links->link_name = $linkname;
        $tb_links->link = $linklink;
        $tb_links->startTime = $sT;
        $tb_links->endTime = $eT;
        $res = $tb_links->save();
        if($res){
            return 0;
        }else{

        }
    }
    public function xiugai(Request $request,$id){
        if ($request->method() == 'post') {
            $file = $request->file('link_image');
        };

        if ($file->isValid()) {
            $ext = $file->guessClientExtension(); //获取后缀
            $type = $file->getClientMimeType(); //后去文件类型
            if (in_array($ext, ['jpg', 'png', 'jpeg']) && in_array($type, ['image/jpeg', 'image/png'])) {
                $filename =uniqid() . '.' . $ext;
                $name = $file->storeAs('LinkImg', $filename);
                if ($name == 'LinkImg/') {
                    return response()->json(['result' => false, 'errMsg' => '上传文件出错']);
                }
            }
        }


        $tb_links = new tb_links();

        //获取ajax返回的参数
        $id =  $request->input('id');
        $linkname =  $request->input('linkname');
        $linklink =   $request->input('linklink');
        $sT =  $request->input('sT');
        $eT =   $request->input('eT');
        $path =  $tb_links->link_image = $request->input('link_image',$name);
        //修改数据
       $data =  $tb_links::find($id); //

        $oldimagepath = $data->link_image; //查询原图
        unlink('Uploads/'.$oldimagepath); //删除原图

        $data->link_name = $linkname;
        $data->link = $linklink;
        $data->startTime = $sT;
        $data->endTime = $eT;
//        $tb_links->link_image = $path;
        $res = $data->save();
//        return $res;
        if($res){
            return 0;
        }else{

        }
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
        $path = DB::table('tb_links')->where('id','=',$id)->get();

        $imgpath = $path[0]->link_image; //获取数据库存储的路径,link_image表示字段

        //删除操作
        $res = DB::table('tb_links')->where('id','=',$id)->delete();

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


    public function upload(){
        return view('Admin.admin.advertisement.l');
    }
    public function up(Request $request){
        $file = $request->file('profile');
        dump($file);
    }
}
