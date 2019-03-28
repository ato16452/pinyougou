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