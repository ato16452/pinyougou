<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>修改资料</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini"  >
<!-- .box-body -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">添加管理员</h3>
    </div>
    <div class="pull-left">
        <div class="form-group form-inline">
            <div class="btn-group">
                <button type="button" class="btn btn-default" onclick="delAll()" title="批量删除" ><i class="fa fa-trash-o"></i> 批量删除</button>
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
                    <th class="sorting">密码</th>

                    <th class="sorting">手机号码</th>
                    <th class="sorting">email</th>

                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>1</td>
                    <td>梦琪琪商贸有限公司</td>
                    <td>梦琪琪</td>

                    <td>13402312232</td>
                    <td>113132@qq.com</td>
                    <td class="text-center">
                        <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#sellerModal" >修改</button>
                    </td>
                </tr>

                </tbody>
            </table>
            <!--数据列表/-->


        </div>
        <!-- 数据表格 /-->




    </div>
    <!-- /.box-body -->




    <!-- 商家详情 -->
    <div class="modal fade" id="sellerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">修改</h3>
                </div>
                <div class="modal-body">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">基本信息</a></li>
                    </ul>
                </div>
                <!-- 选项卡开始 -->
                <form action="" method="post">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <br>
                            <table class="table table-bordered table-striped"  width="800px">
                                <tr>
                                    姓名:<input type="text" name="username" value=""><br/>
                                    密码:<input type="password" name="password" value=""><br/>
                                    手机号码:<input type="text" name="phone" value=""><br/>
                                    email:<input type="email" name="email" value=""><br/>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- 选项卡结束 -->
                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="return confirm('确定修改吗')" data-dismiss="modal" aria-hidden="true">提交修改</button>
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>