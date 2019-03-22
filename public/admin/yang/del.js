function del(obj,id) { //代表onclick中的两个参数
   $(function () {
       $.ajaxSetup({  //csrf验证,在下面发送ajax请求时也写了,可以不用写
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.get('/admin/del/' + id, {'id': id, '_method': 'del'}, function (data) {

           if (data) {  //如果删除成功
               if(confirm("确定删除数据")){
                   $(obj).parent().parent().remove(); //移除删除的那个a标签 父亲的父亲是tr,代表那一行数据
               }
           } else {
               alert('删除失败');
           }

       });
   })
}