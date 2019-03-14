<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">友情链接</h3>
</div>
 <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal"  >添加</button>
                </div>
            </div>
        </div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
      
        <div class="box-tools pull-right">
            <div class="has-feedback">

            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                
                <th class="">名称</th>
                <th class="">链接</th>
                <th class="">图片</th>
                <th class="text-center">操作</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                
                <td>百度</td>
                <td><a href="https://www.baidu.com/">https://www.baidu.com/</a></td>
                <td><img src=""></td>
                
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">修改</button>
                    <button type="button" class="btn bg-olive btn-xs" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                </td>
            </tr>
            
           
            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->




</div>
<!-- /.box-body -->

<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">友情编辑</h3>
            </div>
            <form action="/user" method="post">
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>名称</td>
                        <td><input type="text" name="username" class="form-control" placeholder="" >  </td>
                    </tr>

                    <tr>
                        <td>链接</td>
                        <td><input  type="" name="" class="form-control" placeholder="">  </td>
                    </tr>

                    <tr>
                        <td>图片</td>
                        <td><input  type="" name="" class="form-control" placeholder="">  </td>
                    </tr>
                     
                    
                    
                  
                </table>
            </div>
            <div class="modal-footer">
                <a href=""><button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button></a>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>