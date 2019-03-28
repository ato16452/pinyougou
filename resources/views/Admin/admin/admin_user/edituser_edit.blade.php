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
{{--修改--}}
<div>
    <div>
        <div class="modal-content">
            <div class="modal-header">
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
</body>
</html>