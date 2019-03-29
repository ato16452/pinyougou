@include('Common.admin_header')

<div>
    <div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">商品分类添加</h3>
            </div>
            <form action="/item_cat" method="post">
                {{csrf_field()}}
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">

                    <tr>
                        <td>商品分类名称</td>
                        <td>
                            <input type="text" name="name" class="form-control" placeholder="商品分类名称">
                        </td>
                    </tr>
                    <td>类型模板</td>
                    <td>
                        <select option="" name="parent_id">
                            <option value="0">--请选择--</option>
                           @foreach($tb_item_cats as $k=>$v)
<<<<<<< HEAD
                               <option value="{{$v->id}}">{{$v->name}}</option>
=======
                               <option @if($id == $v->id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
                            @endforeach
                        </select>

                    </td>
                </table>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success"  aria-hidden="true">
<<<<<<< HEAD
                <button onclick="window.location.href='/item_cat'" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
=======
                <a onclick="window.location.href='/item_cat'" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
>>>>>>> 123c4be758302e56c1178f254eea366b843761c8
            </div>
            </form>
        </div>
    </div>
</div>
@include('Common.admin_footer')