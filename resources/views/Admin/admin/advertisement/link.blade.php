<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <script src="/admin/plugins/jQuery/jquery-3.3.1.min.js"></script>
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
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit"  >添加</button>
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

        <table id="dataList" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="">ID</th>
                <th class="">名称</th>
                <th class="">链接</th>
                <th class="">图片</th>
                <th class="">有效期开始</th>
                <th class="">有效期结束</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key =>$value)
            <tr>
                <td class="">{{$value->id}}</td>
                <td>{{$value->link_name}}</td>
                <td><a href="https://www.baidu.com/">{{$value->link}}</a></td>
                <td><img src="/Uploads/{{$value->link_image}}" height="30px" width="60px"></td>
                <td>
                {{--<div class="layui-form">--}}
                    {{--<div class="layui-form-item">--}}
                        {{--<div class="layui-inline">--}}
                            {{--<div class="layui-input-inline">--}}
                                {{--<input class="layui-input" id="test6" value="{{$value->validtime}}"  type="text" placeholder=" {{$value->validtime}} ">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                    {{$value->startTime}}
                </td>
                <td>{{$value->endTime}}</td>

                <td class="text-center">
                    <input type="button" onclick="edit(this,{{$value->id}})" value="修改" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">
                    <a href="javascript:;"  onclick="del(this,{{$value->id}})" class="btn bg-olive btn-xs" title="删除"> 删除</a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td id="tianja">

                </td>
            </tr>
            </tbody>
        </table>
<div>
    {{$data->links()}}
</div>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->

</div>
<!-- /.box-body -->
{{--修改--}}
<script>
    function edit(obj,id) {

        $.ajaxSetup({  //csrf验证,在下面发送ajax请求时也写了,可以不用写
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //通过ajax将id传到控制器
        $.get('/link/'+id+'/edit',{'id':id,'_method':'edit','_token':'{{csrf_token()}}'},function (data) {
<<<<<<< HEAD
            // console.log(data); //data[0]表示数据的结果集
           var str= '';
        str += '<form action="/link/xiugai/'+data[0].id+'"  id="formupdate" method="post" onclick="return false" enctype="multipart/form-data" >'
            str += '{{csrf_field()}}';
            {{--str += '{{method_field('PUT')}}';--}}
           str += ' <div class="modal-body">';
          str += '<table class="table table-bordered table-striped" id="edittable"  width="800px">';
            str += ' <tr>';
            str += '  <td>名称</td>';
            str += '    <td><input type="text" id="lkname" value="'+data[0].link_name+'" name="link_name" class="form-control" placeholder="" >  </td>'
            str += '  </tr>';

=======
            console.log(data); //data[0]表示数据的结果集

           var str= '';
        str += '<form action="/link/xiugai/'+data[0].id+'"  id="formupdate" method="post" onclick="return false" enctype="multipart/form-data" >'
            str += '{{csrf_field()}}';
            {{--str += '{{method_field('PUT')}}';--}}
            str += ' <div class="modal-body">';
            str += '<table class="table table-bordered table-striped" id="edittable"  width="800px">';
            str += ' <tr>';
            str += '  <td>名称</td>';
            str += '    <td><input type="text" id="lkname" value="'+data[0].link_name+'" name="link_name" class="form-control" placeholder="" >  </td>'
            str += '  </tr>';

>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
            str += '  <tr>';
            str += '   <td>链接</td>';
            str += ' <td><input  type="text" name="link" id="lklk" value="'+data[0].link+'" class="form-control" placeholder="">  </td>';
            str += '    </tr>';
            //
            str += '     <tr>';
            str += '   <td>图片</td>';
<<<<<<< HEAD
            str += '<td><input id="pic"  onchange="preview1(this)"  type="file" value="选择图片" name="link_image" class="form-control" placeholder=""></td>';
            str +='<td><label><img id="imagehidden" src="/Uploads/'+data[0].link_image+'" width="50px" height="30px" ></label> <span id="preview1"></span></td>';
            // str += '<span id="prewiew1"></span>';
=======
            str += '<td><input id="picc"  onchange="preview1(this)"  type="file" value="选择图片" name="link_image" class="form-control" placeholder=""></td>';
            str +='<td><label><img id="imagehidden" src="/Uploads/'+data[0].link_image+'" width="50px" height="30px" ></label> <span id="preview1"></span></td>';
            str += '<span id="prewiew1"></span>';
>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
            str += '    </tr>';
            str += '    <tr>';
            str += '    <td><label for="timestart">有效期时间开始</label></td>';
            str += ' <td>';
            str += ' <input type="date" name="startTime" value="'+data[0].startTime+'" id="timestart"><span id="spanTime3"></span>';
            str += '     </td>';
            str += '    </tr>';
            str += '    <tr>';
            str += '    <td><label for="timeend">有效期时间结束</label></td>';
            str += ' <td>';
            str += ' <input type="date" name="endTime" value="'+data[0].endTime+'" id="timeend"><span id="spanTime4"></span>';
            str += ' </td>';
            str += '    </tr>';
            //
            str += '   </table>';
            str += '   </div>';
            str += '<div class="modal-footer">';
            str += '<a href="javascript:;" onclick="update(this,'+data[0].id+')" class="btn btn-success"  aria-hidden="true">保存</a>';
            str += '  <button class="btn btn-default" id="close" data-dismiss="modal" aria-hidden="true">关闭</button>';
            str += '  </div>';
       str += ' </form>';
            //将原表格替换成str
                $('#tihuan').html(str);
        });
    }
<<<<<<< HEAD
    //保存修改的数据
    function update(obj,id){
=======

    //保存修改的数据
    function update(obj,id){

>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
        //收集type=date的值
        $("#timestart").change(function(){
            $("#timestart").attr("value",$(this).val()); //赋值
        });
        var sT = $('#timestart').val();

        $("#timeend").change(function(){
            $("#timeend").attr("value",$(this).val()); //赋值
        });
        var eT = $('#timeend').val();
<<<<<<< HEAD

        var linkname = $('#lkname').val();
        var linklink = $('#lklk').val();
        var filedata = $('#pic')[0].files[0];
=======
   console.log($('#picc').val()); //图片磁盘路径
        var linkname = $('#lkname').val();
        var linklink = $('#lklk').val();
        var filedata = $('#picc')[0].files[0];
>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
        var fromData = new FormData($('#formupdate')[0]);
        fromData.append("id", id);
        fromData.append("linkname", linkname);
        fromData.append("linklink", linklink);
        fromData.append("sT", sT);
        fromData.append("eT", eT);
        fromData.append("file", filedata);
<<<<<<< HEAD
        console.log(linkname);
=======
        // console.log(linkname);
>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
        console.log(linklink);
        console.log(sT);
        console.log(eT);
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '/link/xiugai/'+id+'',
            type: 'post',
            processData: false,
            contentType: false,
            data: fromData,
            success: function(data) {
                alert(data);
                if(data){
                    $('#tishi').html('添加成功');
                    //执行关闭按钮
                    $('#close').trigger('click');
                    self.location.reload(); //刷新页面

                }else{
                    alert('添加失败');
                    $('#closebutton').trigger('click');
                }
            }
        });
        {{--'id':id,'linkname':linkname,'linklink':linklink,'sT':sT,'eT':eT,'_token':'{{csrf_token()}}'--}}
      {{--$.post('/link/xiugai/'+id,{'file':filedata,'id':id,'linkname':linkname,'linklink':linklink,'sT':sT,'eT':eT,'_token':'{{csrf_token()}}'},function (data) {--}}
          {{--if(data){--}}
             {{--console.log(data);--}}
          {{--}--}}
      {{--});--}}
}
    //显示图片
    function preview1(file){

        if (file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                $("#preview1").html('<img src="' + evt.target.result + '" width="95px" height="50px" />');
            }
            reader.readAsDataURL(file.files[0]);
        }else{
            $("#preview1").html('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>');
        }
        $('#imagehidden').hide();
    }
</script>


<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">链接编辑</h3>
            </div>
            <form action="/link/" method="post" id="tihuan" enctype="multipart/form-data" >
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="edittable"  width="800px">
                    <tr>
                        <td>名称</td>
                        <td><input type="text" name="link_name" class="form-control" placeholder="" >  </td>
                    </tr>

                    <tr>
                        <td>链接</td>
                        <td><input  type="text" name="link" class="form-control" placeholder="">  </td>
                    </tr>

                    <tr>
                        <td>图片</td>
                        <td><input  type="file" name="link_image" class="form-control" placeholder="">  </td>
<<<<<<< HEAD
                    </tr>
                    <tr>
                        <td><label for="startTime">有效期时间开始</label></td>
                        <td>
                            <input type="date" name="startTime" id=""><span id="spanTime3"></span>
                        </td>
                    </tr>
                    <tr>
=======
                    </tr>
                    <tr>
                        <td><label for="startTime">有效期时间开始</label></td>
                        <td>
                            <input type="date" name="startTime" id=""><span id="spanTime3"></span>
                        </td>
                    </tr>
                    <tr>
>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
                        <td><label for="endTime">有效期时间结束</label></td>
                        <td>
                            <input type="date" name="endTime" id=""><span id="spanTime4"></span>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-success"  aria-hidden="true">保存</a>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
            </form>
        </div>

    </div>
</div>
<span id="tishi"></span>
{{--添加--}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">添加链接</h3>
            </div>
            <form action="/link" method="post" id="linkform" enctype="multipart/form-data" onsubmit="return false">
                {{csrf_field()}}
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>链接名</td>
                            <td><input  type="text" name="link_name" id="link_name" class="form-control" placeholder="">  </td>
                        </tr>

                        <tr>
                            <td>链接地址</td>
                            <td><input  type="text" name="link" id="link_link" class="form-control" placeholder="">  </td>
                        </tr>
                        <tr>
                            <td>链接图片</td>
                            <td><input  type="file" name="link_image" id="image" onchange="preview(this)" class="form-control"   placeholder=""><span id="preview"></span> </td>
                            {{--<td id="linkimage"></td>--}}
                            {{--<img src="" id="img0" width="120" class="hide">--}}
                            <button type="button"></button>
                        </tr>

                        <tr>
                       <td><label for="startTime">有效期时间开始</label></td>
                            <td>
                                <input type="date" name="startTime" id="startTime"><span id="spanTime1"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="endTime">有效期时间结束</label></td>
                            <td>
                                <input type="date" name="endTime" id="endTime"><span id="spanTime2"></span>
                            </td>
                        </tr>
                        {{--<tr>--}}
                            {{--<td>有效期时间开始</td>--}}
                            {{--<td>--}}
                                {{--<div class="layui-form">--}}
                                    {{--<div class="layui-form-item">--}}
                                        {{--<div class="layui-inline">--}}
                                            {{--<label class="layui-form-label">请选择日期</label>--}}
                                            {{--<div class="layui-input-inline">--}}
                                                {{--<input class="layui-input" id="startTime" type="text" placeholder="yyyy-MM-dd"><span id="spanTime1">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>有效期时间结束</td>--}}
                            {{--<td>--}}
                                {{--<div class="layui-form">--}}
                                    {{--<div class="layui-form-item">--}}
                                        {{--<div class="layui-inline">--}}
                                            {{--<label class="layui-form-label">请选择日期</label>--}}
                                            {{--<div class="layui-input-inline">--}}
                                                {{--<input class="layui-input" id="endTime" type="text" placeholder="yyyy-MM-dd"><span id="spanTime2">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        {{--</tr>--}}

                    </table>

                </div>
                <div class="modal-footer">
                    <button type="submit"  id="btsubmit"  class="btn btn-success" >提交</button>
                    <button class="btn btn-default" id="closebutton" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--//时间范围选择--}}


<script>

    $(function(){
        $('#endTime').change(function () {
            var startTime = $('#startTime').val();
            if(startTime == ''){
                $('#spanTime1').html('<font color="red">请选择开始时间</font>');
            }else if(startTime != '') {
                $('#spanTime1').html(''); //将span标签内容清空

                var $startTime = $('#startTime').val();
                var $endTime = $('#endTime').val();
                var time = (Date.parse($endTime) - Date.parse($startTime)) / 3600 / 1000; //小时差
                //alert(time);
                if (time < 24) {
                    $('#spanTime2').html('<font color="red">结束时间不能小于开始时间</font>');
                    $('#endTime').val('').focus(); //值清空
                } else {
                    $('#spanTime2').html(''); //将span标签内容清空
                }
            }
        });
    });
<<<<<<< HEAD

    // 上传图片时,展示图片
    function preview(file){
        if (file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                $("#preview").html('<img src="' + evt.target.result + '" width="95px" height="50px" />');
            }
            reader.readAsDataURL(file.files[0]);
        }else{
            $("#preview").html('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>');
        }
    }

    // var form = document.querySelector('#linkform');
    // var Data = new FormData(form);
    // var formData = Data.get("link_image");
    // console.log(formData);
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    {{--$("#btsubmit").submit(function () {--}}

=======

    // 上传图片时,展示图片
    function preview(file){
        if (file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                $("#preview").html('<img src="' + evt.target.result + '" width="95px" height="50px" />');
            }
            reader.readAsDataURL(file.files[0]);
        }else{
            $("#preview").html('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>');
        }
    }

    // var form = document.querySelector('#linkform');
    // var Data = new FormData(form);
    // var formData = Data.get("link_image");
    // console.log(formData);
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    {{--$("#btsubmit").submit(function () {--}}

>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
        {{--//获取type="date"的值--}}
        {{--$("#startTime").change(function(){--}}
            {{--$("#startTime").attr("value",$(this).val()); //赋值--}}
        {{--});--}}
        {{--var sT = $('#startTime').val();--}}

        {{--$("#endTime").change(function(){--}}
            {{--$("#endTime").attr("value",$(this).val()); //赋值--}}
        {{--});--}}
        {{--var eT = $('#endTime').val();--}}

    {{--// function add(obj){--}}
        {{--var formData = new FormData($('#linkform')[0]);--}}
        {{--// var formData = Data.get("link_image");--}}
        {{--var link_name = $('#link_name').val();--}}
        {{--var link_link = $('#link_link').val();--}}

        {{--$.post(--}}
           {{--'/link',--}}
        {{--{--}}
            {{--'formData':formData,--}}
            {{--'linkname':link_name,--}}
            {{--'linklink':link_link,--}}
            {{--'sT':sT,--}}
            {{--'eT':eT,--}}
            {{--// 'dataType': 'json',--}}
            {{--'_method':'store',--}}
            {{--'_token':'{{csrf_token()}}',--}}
            {{--'async':true, //true异步发送--}}
            {{--'processData':false, //不限定数据类型,因为ajax默认接受三种数据类型--}}
            {{--'contentType':false, //不转化数据类型--}}
             {{--},function(data){ //成功返回数据--}}
             {{--console.log(data);--}}
            {{--}--}}
        {{--);--}}
       {{--return false;--}}
    {{--});--}}
</script>

</body>
<script>
    //ajax添加数据,包括图片
    $('#btsubmit').click(function(){
        //alert('1');
        //收集数据
        $("#startTime").change(function(){
            $("#startTime").attr("value",$(this).val()); //赋值
        });
        var sT = $('#startTime').val();

        $("#endTime").change(function(){
            $("#endTime").attr("value",$(this).val()); //赋值
        });
        var eT = $('#endTime').val();
        var linkname = $('#link_name').val();
        var linklink = $('#link_link').val();
        var filedata = $('#image')[0].files[0];
        var fromData = new FormData($('#linkform')[0]);
        fromData.append("linkname", linkname);
        fromData.append("linklink", linklink);
        fromData.append("sT", sT);
        fromData.append("eT", eT);
        fromData.append("file", filedata);
        console.log(linkname);
        console.log(linklink);
        console.log(sT);
        console.log(eT);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/link',
            type: 'post',
            processData: false,
            contentType: false,
            data: fromData,
            success: function(data) {
               if(data){
                 $('#tishi').html('添加成功');

                   //执行关闭按钮
                   $('#closebutton').trigger('click');
                   self.location.reload(); //刷新页面

               }else{
                   alert('添加失败');
                   $('#closebutton').trigger('click');
               }
            }
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $("#btsubmit").submit(function () {
        // //获取type="date"的值
        // $("#startTime").change(function(){
        //     $("#startTime").attr("value",$(this).val()); //赋值
        // });
        // var sT = $('#startTime').val();
        //
        // $("#endTime").change(function(){
        //     $("#endTime").attr("value",$(this).val()); //赋值
        // });
        // var eT = $('#endTime').val();
        //
        //
        // // function add(obj){
        // var formData = new FormData($('#linkform')[0]);//0
        // var linkname = $('#link_name').val();
        // var linklink = $('#link_link').val();
        // alert(linklink);
        // alert(linkname);
        // $.ajax({
        //     'url': '/link',
        //     'type': 'post',
        //     'data':{'linkname':linkname,'linklink':linklink,'sT':sT,'eT':eT},
        //     'dataType': 'json',
        //     'async': true, //true异步发送
        //     'processData': false, //不限定数据类型,因为ajax默认接受三种数据类型
        //     'contentType': false, //不转化数据类型
        //     success: function(data,TextStatus){
        //         if(data.result==true){
        //          console.log(data);
        //         }else{
        //             alert(data.errMsg);
        //         }
        //         // if(data == 0){
        //         //     $('#tishi').html('添加成功');
        //         // }else{
        //         //     $('#tishi').html('添加失败');
        //         // }
        //     },
        //     // error: function (data) {
        //     //     alert(data);
        //     // }
        // });
    //     return false;
    // });
</script>
<script>
    //删除数据
    function del(obj,id) { //代表onclick中的两个参数
        $.ajaxSetup({  //csrf验证,在下面发送ajax请求时也写了,可以不用写
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //发送ajax请求
        //$.post(请求地址,传递参数,响应请求)
        //data 随便命名,主要接受ajax返回的数据
        $.post('/link/'+id,{'id':id,'_method':'DELETE','_token':'{{csrf_token()}}'},function (data) {

            //判断接受数据
            //移除对应删除的数据
            if(data){  //如果删除成功
                console.log(data);
                $(obj).parent().parent().remove(); //移除删除的那个a标签 父亲的父亲是tr,代表那一行数据

                // //获取总数据条数
                // tot = Number($('#tot').html()); //Number将数字字符串转化为数字
                // //修改总数据条数
                // $('#tot').html(--tot);

            }else{

            }

        });
    }
</script>

</html>