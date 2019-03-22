<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>规格管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->
    <!-- 编辑窗口 -->
    <div>
        <div>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel">新建规格</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>规格名称</td>
                            <td><input  class="form-control" placeholder="规格名称" >  </td>
                        </tr>
                      </table>
                     <!-- 规格选项 -->
                     <div class="btn-group">
                          <button type="button" class="btn btn-default" title="新建" ><i class="fa fa-file-o"></i> 新增规格选项</button>
                      </div>
                     <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th class="sorting">规格选项</th>
                                <th class="sorting">排序</th>
                                <th class="sorting">操作</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input  class="form-control" placeholder="规格选项">
                                </td>
                                <td>
                                    <input  class="form-control" placeholder="排序">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default" title="删除" >
                                        <i class="fa fa-trash-o"></i> 删除
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input  class="form-control" placeholder="规格选项">
                                </td>
                                <td>
                                    <input  class="form-control" placeholder="排序">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input  class="form-control" placeholder="规格选项">
                                </td>
                                <td>
                                    <input  class="form-control" placeholder="排序">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                </td>
                            </tr>
                        </tbody>
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