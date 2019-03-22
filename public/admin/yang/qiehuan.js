
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//点击正常变灰色,禁用显示
function change1(obj,id) {
    $(function () {
        $.get('/admin/admin_change_status',{'id':id},function (data) {
            if(data == 1){ //如果更改了值
                console.log($(obj).parents('tr').find('button').get(1).getAttribute('disabled'));
                $(obj).parents('tr').find('button').get(0).setAttribute("disabled",'disabled'); //将正常disabled
                $(obj).parents('tr').find('button').get(1).removeAttribute("disabled"); //将禁用按钮 去除 disabled
            }
        });
    })
}
//点击禁用变灰色,正常显示
function change2(obj,id) {
    $(function () {
    $.get('/admin/admin_change_status2',{'id':id},function (data) {
        if(data == 1){ //如果更改了值
            $(obj).parents('tr').find('button').get(0).removeAttribute("disabled");
            $(obj).parents('tr').find('button').get(1).setAttribute("disabled",'disabled');
        }
    })
    })
}