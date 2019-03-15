

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