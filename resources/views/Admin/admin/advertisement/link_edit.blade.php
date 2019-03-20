<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">链接编辑</h3>
            </div>
            <form action="/link/{{$data->id}}" id="edittable" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>名称</td>
                            <td><input type="text" value="{{$data->link_name}}" name="link_name" class="form-control" placeholder="" >  </td>
                        </tr>

                        <tr>
                            <td>链接</td>
                            <td><input  type="text" name="link" value="{{$data->link}}" class="form-control" placeholder="">  </td>
                        </tr>

                        <tr>
                            <td>图片</td>
                            <td><input  type="file" name="link_image"  class="form-control" placeholder="">  </td>
                            <span><img src="/Uploads/{{$data->link_image}}"></span>
                        </tr>
                        <tr>
                            <td><label for="startTime">有效期时间开始</label></td>
                            <td>
                                <input type="date" name="startTime" value="{{$data->startTime}}" id="startTime"><span id="spanTime3"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="endTime">有效期时间结束</label></td>
                            <td>
                                <input type="date" name="endTime" value="{{$data->endTime}}" id="endTime"><span id="spanTime4"></span>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" onclick="update(this,{{$data->id}})" class="btn btn-success"  aria-hidden="true">保存</a>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </form>
        </div>

    </div>
</div>