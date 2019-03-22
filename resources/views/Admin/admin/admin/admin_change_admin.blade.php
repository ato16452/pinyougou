<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>修改资料</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>


</head>

<body class="hold-transition skin-red sidebar-mini"  >
<div style="display: none;">
    <tr>
        <td><input  type="checkbox"></td>
        <td>11111111111</td>
        <td>admin1135</td>


        <td>13298253572</td>
        <td>phpcms@qq.comm</td>
        <td>
            <div class="form-group">
                <button id="button3" type="radio"   disabled="disabled" name="status" checked value="0"  class="btn btn-success" id="">正常</button>
                <button  id="button4" type="radio" onclick="change2(this,11)"  name="status" checked value="1" class="btn btn-danger" id="">禁用</button>
            </div>
        </td>
        <td class="text-center">
            <a  href="/admin/admin_update" type="button" class="btn bg-olive btn-xs" data-target="#sellerModal" >修改</a>
            <a  href="javascript:;" type="button" class="btn bg-olive btn-xs" data-target="#sellerModal" >删除</a>
        </td>
    </tr>
</div>
<!-- .box-body -->
<span id="zhanshi" style="color: green; font-size: 3px"></span>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">添加管理员</h3>
    </div>
    <div class="pull-left">
        <div class="form-group form-inline">
            <div class="btn-group">
                {{--<button type="button" class="btn btn-default" onclick="delAll()" title="批量删除" ><i class="fa fa-trash-o"></i> 批量删除</button>--}}
                {{--<button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>--}}
                <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#edit" ><i class="fa fa-file-o"></i> 新建</button>

                <div class="box-tools pull-right">
                    <div class="has-feedback">
                        <input  >
                        <button class="btn btn-default" >查询</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="" style="padding-right:0px">
                        <input id="selall" type="checkbox" class="icheckbox_square-blue">
                    </th>
                    <th class="sorting_asc">ID</th>
                    <th class="sorting">姓名</th>
                    <th class="sorting">手机号码</th>
                    <th class="sorting">email</th>
                    <th class="sorting">状态</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k =>$v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->username}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->email}}</td>
                    <td>
                    <div class="form-group">
                        <button  id="button1"    @if($v->status == 0)disabled="disabled" @endif onclick="change1(this,{{$v->id}})"    class="btn btn-success">正常</button>
                        <button  id="button2"   @if($v->status == 1)disabled="disabled" @endif onclick="change2(this,{{$v->id}})"   class="btn btn-danger">禁用</button>
                    </div>
                    </td>
                    <td class="text-center">
                        <a  href="/admin/admin_update/{{$v->id}}" type="button" class="btn bg-olive btn-xs" data-target="#sellerModal" >修改</a>
                        <a  href="javascript:;" id="dell" type="button" onclick="del(this,{{$v->id}})" class="btn bg-olive btn-xs" data-target="#sellerModal" >删除</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <!--数据列表/-->
<div>
    {{$data->links()}}
</div>

        </div>
        <!-- 数据表格 /-->

    </div>
    <!-- /.box-body -->

    <!-- 添加管理员 -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">添加管理员</h3>
                </div>
                <form action="/admin/adminadds" method="post" id="linkform" enctype="multipart/form-data" onsubmit="return false">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <table class="table table-bordered table-striped"  width="800px">
                            <tr>
                                <td>姓名</td>
                                <td><input   type="text" name="username" id="username" class="form-control" placeholder="">  </td>
                               <td> <span id="checktext1"></span></td>
                            </tr>

                            <tr>
                                <td>密码</td>
                                <td><input    type="password" name="password" id="password" class="form-control" placeholder="">  </td>
                               <td> <span id="checktext2"></span></td>
                            </tr>
                            <tr>
                                <td>确认密码</td>
                                <td><input    type="password" name="repassword" id="repassword"  class="form-control"   placeholder=""><span id="preview"></span> </td>
                               <td> <span id="checktext3"></span></td>
                            </tr>

                            <tr>
                                <td>手机</td>
                                <td>
                                    <input  type="text"  name="phone" id="phone"><span id="spanTime1"></span>
                                </td>
                                <td> <span id="checktext4"></span></td>
                            </tr>
                            <tr>
                                <td>邮箱</td>
                                <td>
                                    <input  type="text"  name="email" id="email"><span id="spanTime2"></span>
                                </td>
                                <td> <span id="checktext5"></span></td>
                            </tr>

                        </table>

                    </div>
                    <div class="modal-footer">
                        {{--<label id="label"><a href="javascript:;" style="display: none;"  id="btn"  onclick="add()" class="btn btn-success" >提交</a></label>--}}
                        <a href="javascript:;"  id="btsubmit"    class="btn btn-success" >提交</a>
                        <button class="btn btn-default" id="closebutton" data-dismiss="modal" aria-hidden="true">关闭</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="/admin/yang/add.js"></script>
<script src="/admin/yang/qiehuan.js"></script>
<script src="/admin/yang/del.js"></script>