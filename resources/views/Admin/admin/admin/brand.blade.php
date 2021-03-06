<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
	<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini">
    <!-- 显示错误信息 开始 -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 显示错误信息 结束 -->

    <!-- 显示跳转信息 开始 -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <!-- 显示跳转信息 结束 -->
<!-- .box-body -->
    <div class="box-header with-border">
        <h3 class="box-title">品牌管理</h3>
    </div>

    <div class="box-body">
        <!-- 数据表格 -->
        <div class="table-box">
            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#addModal" ><i class="fa fa-file-o"></i> 新建</button>
                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                        <form class="btn btn-default" action="/brand" method="get" style="margin-left: 690px ">
                            <input type="text" name="search" value='{{ $search }}'>
                            <input type="submit" value="搜索">
                        </form>
                    </div>
                </div>
            </div>
            <div class="box-tools pull-right">
                <div class="has-feedback"></div>
            </div>
            <!--工具栏/-->

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                    <tr>
                        <th class="" style="padding-right:0px">
                            <input id="selall" type="checkbox" class="icheckbox_square-blue">
                        </th>
                        <th class="sorting_asc">品牌ID</th>
                        <th class="sorting">品牌logo</th>
                        <th class="sorting">品牌名称</th>
                        <th class="sorting">品牌首字母</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $k=>$v)
                    <tr>
                        <td>
                            <input type="checkbox" >
                        </td>
                        <td>{{ $v->id }}</td>
                        <td></td>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->first_char }}</td>
                        <td class="text-center" width="200px">
                            <a href="brand_edit?id=1" class="btn bg-olive btn-xs">修改</a>
                            <a type="button" class="btn bg-olive btn-xs" data-toggle="modal" style="background-color: #ff0000">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--数据列表/-->
            <!-- 分页 -->
            <center>
                <div>
                    {{ $brands->appends($request)->links() }}
                </div>
            </center>
        </div>
        <!-- 数据表格 /-->
    </div>
<!-- /.box-body -->

<!-- 编辑新建窗口 -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <form action="/brand" method="post">
            {{ csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">品牌添加</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>品牌名称</td>
                            <td><input class="form-control" name="name" placeholder="品牌名称" ></td>
                        </tr>
                        <tr>
                            <td>首字母</td>
                            <td><input class="form-control" name="first_char" placeholder="首字母"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success"  aria-hidden="true" type="submit" value="提交">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- 编辑新建窗口结束 -->
</body>
</html>