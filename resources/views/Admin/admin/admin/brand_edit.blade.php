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
<!-- 编辑修改窗口 -->
<div>
    <div >
        <form action="/brand" method="post">
            {{ csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel">品牌编辑</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>品牌名称</td>
                            <td><input class="form-control" name="name" placeholder="品牌名称" value=""></td>
                        </tr>
                        <tr>
                            <td>首字母</td>
                            <td><input class="form-control" name="first_char" placeholder="首字母" value=""></td>
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
<!-- 编辑修改窗口结束 -->
</body>
</html>