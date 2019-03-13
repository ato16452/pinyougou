<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
 @extends('Common.link');
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">用户管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="批量删除" ><i class="fa fa-trash-o"></i> 批量删除</button>
                    <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                    <div class="box-tools pull-right" style="float: right;">
                        <div class="has-feedback">
                            <input  >
                            <button class="btn btn-default" >查询</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">

            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">ID</th>
                <th class="sorting">用户名</th>
                <th class="sorting">密码</th>
                <th class="text-center">手机号</th>
                <th class="text-center">邮箱</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $k =>$v)
            <tr>
                <td><input  type="checkbox" ></td>
                <td>{{$v->id}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->password}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->email}}</td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal"  >修改</button>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->




</div>
<!-- /.box-body -->
<script>
   $(function () {
       alert('11');
   });
</script>
<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">用户编辑</h3>
            </div>
            <form action="/user/" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>用户名</td>
                        <td><input type="text" name="username" class="form-control" placeholder="请输入用户名" >  </td>
                    </tr>
                    <tr>
                        <td>登录密码</td>
                        <td><input  type="password" name="password" class="form-control" placeholder="设置登录密码">  </td>
                    </tr>

                    <tr>
                        <td>手机号</td>
                        <td><input type="text" name="phone"  class="form-control" placeholder="请输入用户手机号">  </td>
                    </tr>
                    <tr>
                        <td>邮箱</td>
                        <td><input type="email" name="email" class="form-control" placeholder="请输入邮箱">  </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>