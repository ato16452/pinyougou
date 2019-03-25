$(function () {
    var a = false;
    var b =false;
    var c =false;
    var d =false;
    var e = false;
    $('#username').change(function () {
        //相当于js下的window.onload, DOM在页面加载完加载方法,不能放在第一行,需要事件触发
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        a = false;
        var username = document.getElementById("username").value;
        var id = document.getElementById("id").value;
        $.post('/admin/checkname',{'id':id, 'username':username},function(data){
            if(data){
                document.getElementById("checktext1").innerHTML = ""+data;
                a = true;
            }else if(username.length > 10 || username.length < 5){
                document.getElementById("checktext1").innerHTML = "  × 不要多于10位,不能低于六位";
                a = false;
            }else if(!data && username.length <= 10 || username.length >= 5){
                document.getElementById("checktext1").innerHTML = "  √";
                a = true;
            }

        });
        return a;

    });

    $('#password').change(function () {
        b = false;
        var password = document.getElementById("password").value;
        if (password.length < 6) {
            document.getElementById("checktext2").innerHTML = "  × 不要少于6位";
            b = false;
        } else {
            document.getElementById("checktext2").innerHTML = "  √";
            b =true ;
        }
        return b;
    });

    $('#repassword').change(function () {
        c = false;
        var password = document.getElementById("password").value;
        var pwdc = document.getElementById("repassword").value;
        if (password != pwdc) {
            document.getElementById("checktext3").innerHTML = "  × 两次输入密码不一致";
            c = false;
        } else {
            document.getElementById("checktext3").innerHTML = "  √";
            c = true;
        }
        return c;
    });


    $('#phone').change(function () {
        d =false;
        var phone = document.getElementById("phone").value;
        if(!(/^1[34578]\d{9}$/.test(phone))){
            document.getElementById("checktext4").innerHTML = "手机号格式不正确";
            d =false;
        }else{
            document.getElementById("checktext4").innerHTML = "  √";
            d =true;
        }
        return d;
    });

    $('#email').change(function () {
        e = false;
        var email = document.getElementById("email").value;
        var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
        if(!reg.test(email)){
            document.getElementById("checktext5").innerHTML = "邮箱格式不正确";
            e = false;
        }else{
            document.getElementById("checktext5").innerHTML = "  √";
            e = true
        }
        return e;
    });
    $('#username').trigger('change');
    $('#password').trigger('change');
    $('#repassword').trigger('change');
    $('#phone').trigger('change');
    $('#email').trigger('change');

    $('#btsubmit').click(function () {

        if(a && b && c && d && e){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var id = document.getElementById("id").value;
            if (username && password && phone && email) {
                $.ajax({
                    type: "post",
                    async: true,
                    cache: false,
                    url: "/admin/adminup/"+id,
                    data: {'id':id,'username': username, 'password': password, 'phone': phone, 'email': email},
                    success: function (data) {
                        console.log(data);
                        if (data == 0) {
                            console.log(data);
                            //清空表单的值
                            $('#username').html();
                            $('#password').html();
                            $('#repassword').html();
                            $('#phone').html();
                            $('#email').html();

                            // $('#closebutton').trigger('click');
                            $('#zhanshi').html('<font color="green" style="text-align: center" size="5">修改成功</font>');

                        } else if(data == 1) {
                            // $('#closebutton').trigger('click');
                            $('#zhanshi').html('<font style="text-align: center;" color="red" size="5">修改失败</font>');
                        }
                    }
                });
            } else {

            }
        }

    })

});




