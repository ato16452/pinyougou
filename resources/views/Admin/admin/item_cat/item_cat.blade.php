@include('Common.admin_header')
@if(!empty(session('success')))
    　　<div class="alert alert-success" role="alert">
        　　　　{{session('success')}}
        　　</div>
@endif
@if(!empty(session('error')))
    　　<div class="alert alert-danger" role="alert">
        　　　　{{session('error')}}
        　　</div>
@endif

<body class="hold-transition skin-red sidebar-mini" >
    <!-- .box-body -->
    <div class="box-header with-border">
        <h3 class="box-title">商品分类管理</h3>
    </div>
    <div class="box-body">
        <ol class="breadcrumb">
            <li>
                <a href="#" >顶级分类列表</a>
            </li>
            <li>
                <a href="#" >珠宝</a>
            </li>
            <li>
                <a href="#" >银饰</a>
            </li>
        </ol>
        <!-- 数据表格 -->
        <div class="table-box">
            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <a  href="/item_cat/create" class="btn btn-default" title="新建"   ><i class="fa fa-file-o"></i> 添加分类</a>
                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                        <button type="button" class="btn btn-default" title="刷新" ><i class="fa fa-check"></i> 刷新</button>
                    </div>
                </div>
            </div>
            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                    <tr>
                        <th class="" style="padding-right:0px">
                            <input type="checkbox" class="icheckbox_square-blue">
                        </th>
                        <th class="sorting_asc">分类ID</th>
                        <th class="sorting">分类名称</th>
                        <th class="sorting">父类ID</th>
                        <th class="sorting">分类路径</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr >
                        <td><input  type="checkbox" ></td>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->parent_id}}</td>
                        <td>{{$value->path}}</td>
                        <td class="text-center">
                            <a type="button" href="/item_cat/create" class="btn bg-olive btn-xs" data-toggle="modal">添加子分类</a>
                            <a href="/item_cat_edit" class="btn bg-olive btn-xs">修改</a>
                            <form action="/item_cat/{{$value->id}}" method="post" style="display: inline-block;">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit"  class="btn bg-olive btn-xs"  value="删除">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--<div>--}}
                {{--{{$data->links()}}--}}
            {{--</div>--}}
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->
    <!-- 编辑窗口 -->

@include('Common.admin_footer')