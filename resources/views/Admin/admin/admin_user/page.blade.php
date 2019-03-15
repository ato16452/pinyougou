
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>
<body>
<div id="box">
    <!-- 第一部分 -->
    <a href="javascript:void(0)" onclick="page(1)">首页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $prev ?>)">上一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $next ?>)">下一页</a>
    <a href="javascript:void(0)" onclick="page(<?php echo $sums ?>)">尾页</a><br />
    <!-- 第二部分 -->
    @foreach($pp as $key=>$val)
        @if($val == $page)
            {{$val}}
        @else
            <a href="javascript:void(0)" onclick="page({{$val}})">{{$val}}</a>
    @endif
@endforeach
<!-- 表 -->
    <table border="1" id="">
        <tr>
            <td>序号</td>
            <td>名称</td>
            <td>时间</td>
        </tr>
        @foreach($data as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->username}}</td>
                <td>{{$val->password}}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
<script>
    /*
    @分页
    */
    function page(page){
        $.ajax({
            type:"get",
            url:"/fenye/page_pro",
            data:{
                page:page
            },
            success:function(msg){
                if(msg){
                    $("#box").html(msg)
                }
            }
        })
    }
</script><span id="transmark" style="display: none; width: 0px; height: 0px;"></span>

