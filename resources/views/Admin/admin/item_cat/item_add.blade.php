@include('Common.admin_header')

<div>
    <div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">商品分类添加</h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>上级商品分类</td>
                        <td>珠宝 >>  银饰</td>
                    </tr>
                    <tr>
                        <td>商品分类名称</td>
                        <td>
                            <input  class="form-control" placeholder="商品分类名称">
                        </td>
                    </tr>
                    <tr>
                        <td>类型模板</td>
                        <td>
                            <input select2 config="options['type_template']" placeholder="商品类型模板" class="form-control" type="text"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
                <button onclick="window.location.href='/item_cat'" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
@include('Common.admin_footer')