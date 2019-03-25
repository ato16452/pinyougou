<?php

namespace App\Http\Controllers\Admin\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\tb_item_cat;
class Item_catController extends Controller
{
    public static function getCates(){
//        $data = \DB::select("select *,concat(path,',',id) as paths from tb_item_cat order by paths");
        //模型查询写法
       $data =  tb_item_cat::select('*',DB::raw('concat(path,",",id) as paths'))->orderBy('paths','asc')->get();
        foreach($data as $key=>$val){
            //统计某个字符串出现的次数
            //统计 , 出现的次数 顶级分类无 , 一级分类一个, 二级分类两个 ,
            $n = substr_count($val->path,',');
            $data[$key]->name = str_repeat('|--',$n).$val->name;
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
        return view('Admin.admin.item_cat.item_cat')->with('data',self::getCates());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tb_item_cats = tb_item_cat::all();
//        dump($tb_item_cats);
        return view('Admin.admin.item_cat.item_add',['tb_item_cats'=>$tb_item_cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $cat =  new tb_item_cat();
       $cat->name = $request->input('name');
       $cat->parent_id = $request->input('parent_id');
        //处理path
        if($request->input('parent_id') == 0){
            $cat->path = 0;
        }else{
            //获取父级分类的数据
            $parent_data = tb_item_cat::find($request->input('parent_id'));
            //父级分类的 path,id
            $cat->path = $parent_data->path.','.$parent_data->id;
        }
        //判断
        if($cat->save()){
            return redirect('/item_cat')->with('success','添加成功');
        }else{
            return back('/item_cat')->with('error','添加失败');
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
    public function edit()
    {
        return view('Admin.admin.item_cat.item_cat_edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //检查当前分类 是否有子分类
        $data = tb_item_cat::where('parent_id',$id)->first();
        if($data){
            return back()->with('error','当前分类有子分类,不允许删除');
            exit;
        }
        //删除
        if(tb_item_cat::destroy($id)){
            return redirect('/item_cat')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }

}
