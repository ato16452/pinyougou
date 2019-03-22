
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-3.3.1.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini">
<div >
    <div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">管理员编辑</h3>
            </div>
            <input type="text" id="id" style="display: none" value="{{$data->id}}">
            <form action="/admin/adminup/{{$data->id}}" method="post" id="tihuan" enctype="multipart/form-data" onsubmit="return check()">
                {{csrf_field()}}
                <div class="modal-body">
                    <table class="table table-bordered table-striped" id="edittable"  width="800px">
                        <tr>
                            <td>姓名</td>
                            <td><input type="text"  onchange="checkusrn()"  id="username" name="username" value="{{$data->username}}" class="form-control" placeholder="" >  </td>
                            <td> <span id="checktext1"></span></td>
                        </tr>

                        <tr>
                            <td>手机号码</td>
                            <td><input  type="text"  onchange="checkphone()"  onchange="checkpwd()" id="phone" name="phone" value="{{$data->phone}}" class="form-control" placeholder="">  </td>
                            <td> <span id="checktext4"></span></td>
                        </tr>

                        <tr>
                            <td>email</td>
                            <td><input  type="text" onchange="checkemail()" id="email" name="email" value="{{$data->email}}" class="form-control" placeholder="">  </td>
                            <td> <span id="checktext5"></span></td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><input  type="password" onchange="checkpwd()"  id="password" name="password" value="{{$data->password}}" class="form-control" placeholder="">  </td>
                            <td> <span id="checktext2"></span></td>
                        </tr>
                        <tr>
                            <td>确认密码</td>
                            <td><input  type="password"  onchange="checkpwdc()" id="repassword" name="repassword" value="{{$data->password}}" class="form-control" placeholder="">  </td>
                            <td> <span id="checktext3"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <a  href="javascript:;" class="btn btn-success" onclick="add()"   aria-hidden="true">保存</a>
                    <a class="btn btn-default" id="closebutton" onclick="window.location.href='/admin/admin_change_admin'" aria-hidden="true">关闭</a>
                </div>
            </form>
        </div>

    </div>
</div>
<script src="/admin/yang/xiugai.js"></script>