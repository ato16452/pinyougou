//admin_update.blade.php
function checkusrn() {
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //相当于js下的window.onload, DOM在页面加载完加载方法,不能放在第一行,需要事件触发
        var check = false;
        var username = document.getElementById("username").value;
        var id = document.getElementById('id').value;

        $.post('/admin/checkname',{'id':id, 'username':username},function(data){
            if(data){
              console.log(data);
                document.getElementById("checktext1").innerHTML = ""+data;
                check = false;
            }else {
                if (username.length > 10 || username.length < 5) {
                    document.getElementById("checktext1").innerHTML = "  × 不要多于10位,不能低于六位";
                    check = false;
                } else {
                    document.getElementById("checktext1").innerHTML = "  √";
                    check = true;
                }
            }
        });
        return check;
    });

    }

function checkpwd() {
    var check = false;
    var password = document.getElementById("password").value;
    if (password.length < 6) {
        document.getElementById("checktext2").innerHTML = "  × 不要少于6位";
        check = false;
    } else {
        document.getElementById("checktext2").innerHTML = "  √";
        check = true;
    }
    return check;
}
function checkpwdc() {
    var check = false;
    var password = document.getElementById("password").value;
    var pwdc = document.getElementById("repassword").value;
    if (password != pwdc) {
        document.getElementById("checktext3").innerHTML = "  × 两次输入密码不一致";
        check = false;
    } else {
        document.getElementById("checktext3").innerHTML = "  √";
        check = true;
    }
    return check;
}
//手机号
function checkphone() {
    var check = false;
    var phone = document.getElementById("phone").value;
    if(!(/^1[34578]\d{9}$/.test(phone))){
        document.getElementById("checktext4").innerHTML = "手机号格式不正确";
        return false;
    }else{
        document.getElementById("checktext4").innerHTML = "  √";
        check = true;
    }
    return check;
}
//邮箱
function checkemail() {
    var check = false;
    var email = document.getElementById("email").value;
    var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
    if(!reg.test(email)){
        document.getElementById("checktext5").innerHTML = "邮箱格式不正确";
        return false;
    }else{
        document.getElementById("checktext5").innerHTML = "  √";
        check = true;
    }
    return check;
}

function check() {
    var check = checkusrn() && checkpwd() && checkpwdc() && checkcb() && checkphone() && checkemail();
    return check;
}
//提交
function add() {
    $(function () {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;
        var id = document.getElementById('id').value;
        // alert(id);
        // alert(username);
        // alert(password);
        // alert(phone);
        // alert(email);
        if(username && password && phone && email && id){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            alert(id);
            $.ajax({
                type: "post",
                url: "/admin/adminup",
                data:{'id':id,'username':username,'password':password,'phone':phone,'email':email},
                success: function(data){
                    if(data){
                        //清空表单的值
                        $('#username').html();
                        $('#password').html();
                        $('#repassword').html();
                        $('#phone').html();
                        $('#email').html();

                        $('#closebutton').trigger('click');


                    }else{
                        $('#closebutton').trigger('click');
                        alert('添加失败');
                    }
                }
            });
        }else{

        }
    });
}

