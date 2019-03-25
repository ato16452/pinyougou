
<table id="dataList" class="table table-bordered table-striped table-hover dataTable">
    <thead>
    <tr>
        <th class="" style="padding-right:0px">
            <input id="selall" type="checkbox" class="icheckbox_square-blue">
        </th>
        <th class="sorting_asc">ID</th>
        <th class="sorting">姓名</th>
        <th class="sorting">手机号码</th>
        <th class="sorting">email</th>
        <th class="sorting">状态</th>
        <th class="text-center">操作</th>
    </tr>
    </thead>
        <tr>
            <td><input  type="checkbox"></td>
            <td>{{$data->id}}</td>
            <td>{{$data->username}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->email}}</td>
            <td>
                <div class="form-group">
                    <button  id="button1"    @if($data->status == 0)disabled="disabled" @endif onclick="change1(this,{{$data->id}})"    class="btn btn-success">正常</button>
                    <button  id="button2"   @if($data->status == 1)disabled="disabled" @endif onclick="change2(this,{{$data->id}})"   class="btn btn-danger">禁用</button>
                </div>
            </td>
            <td class="text-center">
                <a  href="/admin/admin_update/{{$data->id}}" type="button" class="btn bg-olive btn-xs" data-target="#sellerModal" >修改</a>
                <a  href="javascript:;" id="dell" type="button" onclick="del(this,{{$data->id}})" class="btn bg-olive btn-xs" data-target="#sellerModal" >删除</a>
            </td>
        </tr>

</table>