<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tb_chart;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $charts = tb_chart::where('name','like','%'.$search.'%')->paginate(10);

        return view('Admin.admin.admin.chart',['charts'=>$charts,'request'=>$request->all(),'search'=>$search]);
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
        // 编写数据验证
        $this->validate($request, [
            'name' => 'required',
            'imgpath' => 'required',
        ],[
            'name.required'=>'名称不能为空',
            'imgpath.required'=>'图片不能为空',
        ]);

        $chart = new tb_chart;
        $chart->name = $request->input('name','');
        $file = $request->file('imgpath');
        $temp_name = time()+rand(10000,99999);
        $ext = $file->extension();
        $filename = $temp_name.'.'.$ext;
        $chart->imgpath = $file->storeAs('/Chart_img',$filename);
        $res = $chart->save();
        if($res){
            return redirect('/chart')->with('success','添加成功');
        }else{
            return redirect('/chart')->with('error','添加失败');
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
    public function edit(Request $request)
    {
        $id = $_GET['id'];
        $chart = tb_chart::find($id);
        return view('Admin.admin.admin.chart_edit',['chart'=>$chart]);
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
        dump($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
