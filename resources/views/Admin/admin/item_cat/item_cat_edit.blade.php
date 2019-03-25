<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品分类管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
	<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-red sidebar-mini" >
    <!-- 编辑窗口 -->
    <div>
        <div>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel">商品分类编辑</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>上级商品分类</td>
                            <td>珠宝 >>  银饰</td>
                        </tr>
                        <tr>
                            <td>商品分类名称</td>
                            <td>
                                <input  class="form-control" placeholder="商品分类名称">
                            </td>
                        </tr>
                        <tr>
                            <td>类型模板</td>
                            <td>
                                <input select2 config="options['type_template']" placeholder="商品类型模板" class="form-control" type="text"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
                    <button onclick="window.location.href='/item_cat'" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>