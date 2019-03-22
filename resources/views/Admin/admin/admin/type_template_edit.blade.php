<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>类型模板管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/admin/plugins/select2/select2.css" />
    <link rel="stylesheet" href="/admin/plugins/select2/select2-bootstrap.css" />
    <script src="/admin/plugins/select2/select2.min.js" type="text/javascript"></script>
</head>

<body class="hold-transition skin-red sidebar-mini" >
    <!-- 编辑窗口 -->
    <div>
        <div>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel">商品类型模板编辑</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>商品类型</td>
                            <td>
                                <input  class="form-control" placeholder="商品类型">
                            </td>
                        </tr>
                        <tr>
                            <td>扩展属性</td>
                            <td>
                                <table class="table table-bordered table-striped"  width="800px">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" class="icheckbox_square-blue"></td>
                                            <td>属性名称</td>
                                            <td>操作</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="icheckbox_square-blue" ></td>
                                            <td><input class="form-control" placeholder="属性名称" ></td>
                                            <td><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="icheckbox_square-blue" ></td>
                                            <td><input class="form-control" placeholder="属性名称" ></td>
                                            <td><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
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