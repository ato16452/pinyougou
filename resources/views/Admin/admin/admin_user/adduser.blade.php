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
{{--显示错误信息--}}

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <form action="/user" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>用户名</td>
                        <td><input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="请输入用户名" >  </td>
                    </tr>
                    <tr>
                        <td>登录密码</td>
                        <td><input  type="password" name="password"  class="form-control" placeholder="设置登录密码">  </td>
                    </tr>
                    <tr>
                        <td>确认密码</td>
                        <td><input  type="password" name="repassword" class="form-control" placeholder="再次确认密码">  </td>
                    </tr>
                    <tr>
                        <td>手机号</td>
                        <td><input type="text" name="phone" value="{{old('phone')}}"  class="form-control" placeholder="请输入用户手机号">  </td>
                    </tr>
                    <tr>
                        <td>邮箱</td>
                        <td><input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="请输入邮箱">  </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success"  aria-hidden="true">提交</button>
                <input type="reset" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
            </div>
        </form>

</body>
</html>