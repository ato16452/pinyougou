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
<script>
    function del(obj,id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //发送ajax请求
        //$.post(请求地址,传递参数,响应请求)
        //data 随便命名,主要接受ajax返回的数据
        $.post('/user/'+id,{'id':id,'_method':'DELETE','_token':'{{csrf_token()}}'},function (data) {

            //判断接受数据
            //移除对应删除的数据
           if(data){  //如果删除成功

               $(obj).parent().parent().remove(); //移除删除的那个a标签 父亲的父亲是tr,代表那一行数据

               //获取总数据条数,每分页的前提下
               tot = Number($('#tot').html()); //Number将数字字符串转化为数字
               //修改总数据条数
               $('#tot').html(--tot);
           }else{
                alert('删除失败');
           }

        });
    }
    function delAll() {
        //获取被选中数据的值
        var arr = [];
        //获取所有数据,并且是被选中的
       inputs = $('.inputs:checked')

       //获取选中数据的value值
        for(var i = inputs.length - 1;i>=0;i--){
           //把值压入到数组
            arr.push(inputs.eq(i).val());
        };
       //把arr转化成字符串
        str = arr.join(',');
       //发送ajax请求
        $.post('/user/delAll',{'str':str,'_token':'{{csrf_token()}}'},function(data){

            //判断数据
            if(data == arr.length){

                //移除对应的数据
                for(var i =arr.length -1;i>=0;i--){
                 //这里要在行集元素tr,
                    $('#tr'+arr[i]).remove();

                }
                //修改总数据个数
                tot= Number($('#tot').html()) - Number(data);
                $('#tot').html(tot);
            }else{
               alert('删除失败');
            }
        });

        // alert(arr);
    }

</script>
<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">用户管理</h3>
</div>

<div class="box-body">
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
   <span id="tishi" ></span>
   <span id="tishi" ></span>

    <!-- 数据表格 -->
    <div class="table-box">
        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" onclick="delAll()"  title="批量删除" ><i class="fa fa-trash-o"></i> 批量删除</button>
                    {{--<button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>--}}
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                    <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#edit" ><i class="fa fa-file-o"></i> 新建</button>

                    {{--搜索--}}
                    {{--<form action="/user/search" method="get">--}}
                    {{--<div class="box-tools pull-right">--}}
                        {{--<div class="has-feedback">--}}
                            {{--<input type="text" name="search" >--}}
                            {{--<input type="submit" value="查询" class="btn btn-default" >--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                </div>
                共有 <span id="tot">{{count($data)}}</span>条数据
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
                <th class="sorting">图片</th>
                <th class="text-center">手机号</th>
                <th class="text-center">邮箱</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <form action="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <tbody>
            @foreach($data as $k =>$v)
            <tr id="tr{{$v->id}}">
                <td><input  type="checkbox" value="{{$v->id}}" class="inputs"></td>
                <td>{{$v->id}}</td>
                <td>{{$v->username}}</td>
                <td>{{$v->password}}</td>
                <td><img src="/Uploads/{{$v->img}}" width="40px" height="20px"></td>
                <td>{{$v->phone}}</td>
                <td>{{$v->email}}</td>
                <td class="text-center">
                    <a  href="/user/{{$v ->id}}/edit"  onclick="update(this,{{$v->id}})" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal"  >修改</a>
                   <a class="btn bg-olive btn-xs"    onclick="del(this,{{$v->id}})" href="javascript:;">删除</a>
                </td>
            </tr>
                @endforeach
            </tbody>
            </form>
        </table>
        {{--分页效果--}}
    <div class="panel-footer">
        <nav style="text-align:center;">
            <ul class="pagination">
                @for($i = 1 ;$i<=$page;$i++)
                    <li ><a href="javascript:;" onclick="page1(this,{{$i}})">{{$i}}</a> </li>
                @endfor
            </ul>
        </nav>
    </div>
        <script>
            /*******2*****/
            //无刷新分页 传统方式
            function page(obj,page){
                // alert(page);
                //发送ajax请求 ,资源控制器index方法
                var str = '<thead><tr> <th class="" style="padding-right:0px"><input id="selall" type="checkbox" class="icheckbox_square-blue"> </th>\n' +
                    '<th class="sorting_asc">ID</th><th class="sorting">用户名</th><th class="sorting">密码</th><th class="sorting">图片</th><th class="text-center">手机号</th>\n' +
                    '<th class="text-center">邮箱</th><th class="text-center">操作</th></tr></thead>';
                $.get('/user',{'page':page},function (data) {
               /*******2*****/

               /********4******/
                //处理数据
                //     alert(data);  //返回的是一个对象集合
                    for(var i = 0;i<data.length;i++){
                    str += '<tr id="tr'+data[i].id+'">';
                    str += '<td><input  type="checkbox" value="'+data[i].id+'" class="inputs"></td>';
                    str += '<td>'+data[i].id+'</td>';
                    str += '<td>'+data[i].username+'</td>';
                    str += '<td>'+data[i].password+'</td>';
                    str += '<td><img src="/Uploads/'+data[i].img+'" width="40px" height="20px"></td>';
                    str += '<td>'+data[i].phone+'</td>';
                    str += '<td>'+data[i].email+'</td>';
                    str += '<td class="text-center">';
                    str += '<a  href="/user/'+data[i].id+'/edit"  class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal"  >修改</a>';
                    str += '<a class="btn bg-olive btn-xs"    onclick="del(this,'+data[i].id+')" href="javascript:;">删除</a>';
                    str += '</td>';
                 str += '</tr>';
                    }
                /********4******/

                /*****5*****/
                //写入表格
                $('#dataList').html(str);
                    /*****5*****/
                });
            }

            //无刷新分页 商业方式
            function page1(obj,page){
                /*******2*****/
                $.get('/user',{'page':page},function (data) {
                    /*******2*****/

                    /********4******/
                    //处理数据
                    //  alert(data);
                    /********4******/


                    /*****5*****/
                    //写入表格
                    $('#dataList').html(data);
                    /*****5*****/
                });
            }




            //修改数据
            function update(obj,id){
                // alert(id);

            }


        </script>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->


{{--新建--}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">添加用户</h3>
            </div>
            <form action="/user" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>用户名</td>
                            <td><input type="text" name="username" class="form-control" placeholder="请输入用户名" >  </td>
                            <div id="userInfo">

                            </div>
                        </tr>
                        <tr>
                            <td>登录密码</td>
                            <td><input  type="password" name="password" class="form-control" placeholder="设置登录密码">  </td>
                        </tr>
                        <tr>
                            <td>确认密码</td>
                            <td><input  type="password" name="repassword" class="form-control" placeholder="确认密码">  </td>
                        </tr>
                        <tr>
                            <td>个人图像</td>
                            <td><input  onmouseover="img()" title="请上传低于2M的图片:jpeg,bmp,png,jpg" id="img" type="file" name="img" class="form-control" >  </td>
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
                    <input type="submit" class="btn btn-success"  aria-hidden="true">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </form>
        </div>
    </div>
</div>




{{--修改--}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">用户编辑</h3>
            </div>
            <form action="/user/update" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>用户名</td>
                        <td><input type="text" name="username" class="form-control" placeholder="请输入用户名" >  </td>
                        <div id="userInfo">

                        </div>
                    </tr>
                    <tr>
                        <td>登录密码</td>
                        <td><input  type="password" name="password" class="form-control" placeholder="设置登录密码">  </td>
                    </tr>
                    <tr>
                        <td>用户图片</td>
                        <img src="">
                        <td><input type="file" name="img"  class="form-control" placeholder="请输入用户手机号"></td>
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
                <input type="submit" class="btn btn-success"  aria-hidden="true">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{--添加--}}


</body>
</html>