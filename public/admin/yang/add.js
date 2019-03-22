//admin_change_admin.blade.php
$(function () {
    var a = false;
    var b =false;
    var c =false;
    var d =false;
    var e = false;
    // var check;
    $('#username').change(function () {
        //相当于js下的window.onload, DOM在页面加载完加载方法,不能放在第一行,需要事件触发
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var check = false;
        a = false;
        var username = document.getElementById("username").value;
        $.post('/admin/adminadd',{'async':false, 'username':username},function(data){
            if(data){
                document.getElementById("checktext1").innerHTML = ""+data;
                check = false;
                a = false;
            }else if(username.length > 10 || username.length < 5){
                document.getElementById("checktext1").innerHTML = "  × 不要多于10位,不能低于六位";
                check = false;
                a = false;
            }else if(!data && username.length <= 10 || username.length >= 5){
                document.getElementById("checktext1").innerHTML = "  √";
                check = true;
                a = true;
            }

        });
        return a;

    });

    $('#password').change(function () {
        var check = false;
        b = false;
        var password = document.getElementById("password").value;
        if (password.length < 6) {
            document.getElementById("checktext2").innerHTML = "  × 不要少于6位";
            check = false;
            b = false;
        } else {
            document.getElementById("checktext2").innerHTML = "  √";
            check = true;
            b =true ;
        }
        return b;
    })

    $('#repassword').change(function () {
        var check = false;
        c = false;
        var password = document.getElementById("password").value;
        var pwdc = document.getElementById("repassword").value;
        if (password != pwdc) {
            document.getElementById("checktext3").innerHTML = "  × 两次输入密码不一致";
            check = false;
            c = false;
        } else {
            document.getElementById("checktext3").innerHTML = "  √";
            check = true;
            c = true;
        }
        return c;
    })


    $('#phone').change(function () {
        var check = false;
        d =false
        var phone = document.getElementById("phone").value;
        if(!(/^1[34578]\d{9}$/.test(phone))){
            document.getElementById("checktext4").innerHTML = "手机号格式不正确";
            return false;
            d =false
        }else{
            document.getElementById("checktext4").innerHTML = "  √";
            check = true;
            d =true
        }
        return d;
    })

    $('#email').change(function () {
        var check = false;
        e = false
        var email = document.getElementById("email").value;
        var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
        if(!reg.test(email)){
            document.getElementById("checktext5").innerHTML = "邮箱格式不正确";
            return false;
            e = false
        }else{
            document.getElementById("checktext5").innerHTML = "  √";
            check = true;
            e = true
        }
        return e;
    })

    $('#btsubmit').click(function () {
        // console.log(a);
        if(a && b && c && d && e){

            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            if (username && password && phone && email) {
                $.ajax({
                    type: "post",
                    async: false,
                    cache: false,
                    url: "/admin/adminadds",
                    data: {'username': username, 'password': password, 'phone': phone, 'email': email},
                    success: function (data) {
                        if (data) {
                            //清空表单的值
                            $('#username').html();
                            $('#password').html();
                            $('#repassword').html();
                            $('#phone').html();
                            $('#email').html();

                            $('#closebutton').trigger('click');
                            $('#zhanshi').html('添加成功,刷新页面查看');

                        } else {
                            $('#closebutton').trigger('click');
                            $('#zhanshi').html('添加失败');
                        }
                    }
                });
            } else {

            }
        }

    })

});



// function check() {
//     if( check = checkusrn() && checkpwd() && checkpwdc() && checkphone() && checkemail()) {
//         return check;
//     }else {
//         // $('#btsubmit').click(function (event) {
//         //     event.preventDefault();
//         //     $('#btsubmit').attr('disabled','disabled');
//         // })
//     }
// }




    //
    // function add() {
    //
    //
    // };






    // //提交
    // function add() {
    //
    //
    //
    // }
// async:false,



