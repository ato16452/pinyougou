@include('Home.Common.header1')

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="/" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="/login" target="_blank">登陆</a></span></h3>
			<div class="info">
				<div class="sui-form form-horizontal" >
					{{ csrf_field() }}
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" name="username" id="username" placeholder="请输入你的用户名" class="input-xfat input-xlarge">
                            <span id="checktext1"></span>
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" name="password" id="password" placeholder="设置登录密码" class="input-xfat input-xlarge">
                            <span id="checktext2"></span>
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" name="repassword" id="repassword" placeholder="再次确认密码" class="input-xfat input-xlarge">
                            <span id="checktext3"></span>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" name="phone" id="phone1"  placeholder="请输入你的手机号" class="input-xfat input-xlarge">
							<span id="text1"></span>
						</div>
					</div>

					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls">
							<input type="text" id="code1" name="phonecheck" value=""  placeholder="短信验证码" class="c_code_msg input-xfat input-xlarge">  <input type="button" class="btn btn-danger" value="获取短信验证码" onClick="sendMessage1()" id="btnSendCode1">

						</div>
					</div>

					
					{{--<div>--}}
						{{--<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>--}}
						{{--<div class="controls">--}}
							{{--<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>--}}
						{{--</div>--}}
					{{--</div>--}}
					<div>
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<input type="button"   id="submit" class="sui-btn btn-block btn-xlarge btn-danger" value="完成注册">
						</div>
					</div>

				<div class="clearfix"></div>
			</div>
		</div>
    </div>
		<!--foot-->
		@include('Home.Common.footer')



{{--<script type="text/javascript" src="/admin/js/plugins/jquery.easing/jquery.easing.min.js"></script>--}}
{{--<script type="text/javascript" src="/admin/js/plugins/sui/sui.min.js"></script>--}}
{{--<script type="text/javascript" src="/admin/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>--}}
{{--<script type="text/javascript" src="/admin/js/pages/register.js"></script>--}}
</body>

</html>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;//手机号正则
    var count = 60; //间隔函数，1秒执行
    var InterValObj1; //timer变量，控制时间
    var curCount1;//当前剩余秒数
    /*第一*/
    function sendMessage1() {
        curCount1 = count;
        var phone = $.trim($('#phone1').val());
        if (!phoneReg.test(phone)) {
            alert(" 请输入有效的手机号码");
            return false;
        }
        //设置button效果，开始计时
        $("#btnSendCode1").attr("disabled", "true");
        $("#btnSendCode1").val( + curCount1 + "秒再获取");
        InterValObj1 = window.setInterval(SetRemainTime1, 1000); //启动计时器，1秒执行一次
        //向后台发送处理数据,发送手机验证码
        // console.log(phone);
        $.post('/register/insert',{'phone':phone},function (data) {
          // console.log(phone);
            console.log(data);
            console.log(data.error_code);
            if(data.error_code == 0){ //转态码为0 表示发送成功

            }else{
                alert('发送失败');
            }
        },'json')

    }
    function SetRemainTime1() {
        if (curCount1 == 0) {
            window.clearInterval(InterValObj1);//停止计时器
            $("#btnSendCode1").removeAttr("disabled");//启用按钮
            $("#btnSendCode1").val("重新发送");
        }
        else {
            curCount1--;
            $("#btnSendCode1").val( + curCount1 + "秒再获取");
        }
    }

    var a = false;
    var b =false;
    var c =false;
    var d =false;
    // var check;
    $('#username').change(function () {  //通过id绑定一个change改变事件,获取填写用户表单值,并传输到后台,后台接受该用户名,通过查询数据库查询该用户名是否存在,如果存在,返回一个值,通过data接受,如果查询到,就给个提示,如’用户名已存在’
        //相当于js下的window.onload, DOM在页面加载完加载方法,不能放在第一行,需要事件触发
        a = false;
        var username = document.getElementById("username").value;
        $.post('/register/check',{'async':false, 'username':username},function(data){
            if(data){
                document.getElementById("checktext1").innerHTML = ""+data;
                a = false;
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
    })

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
    })
    //验证码不能为空,不管输入的内容是什么,不能为空即可,因为还要和后台存的验证码做对比
    // $('#code1').change(function () {
    //
    //     return d;
    // })

    //给提交按钮一个点击事件,尽量用jq写, 如果 a,b,c,d都满足,接受表单值,提交到后台,后台接受并储存
    $('#submit').click(function () {

        d = false;
        var code = document.getElementById("code1").value;
        if (code == '') {
            document.getElementById("code1").setAttribute('placeholder','请输入验证码');
            d = false;
        } else {
            d = true;
        }

        // console.log(a);
        if(a && b && c && d){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var phone = document.getElementById("phone1").value;
            var msg = document.getElementById("code1").value; //你短信验证码

            if (username && password ) {
                $.ajax({
                    type: "post",
                    async: false,
                    cache: false,
                    url: "/register/add",
                    data: {'username': username, 'password': password, 'phone': phone,'msg':msg},
                    success: function (data) {
                        console.log(data);
                        if (data == 0) { //如果验证码与填写的相同
                            //跳转
                            alert('注册成功');
                            window.location.href="/index?username="+username;
                        } else {
                              alert('验证码错误');
                        }
                    }
                });
            } else {

            }
        }else{

        }
    })




    // $(function  () {
    //
		// //获取短信验证码
    //     var validCode=true;
    //     $(".msgs").click (function  () {
    //         var time=30;
    //         var code=$(this);
    //         if (validCode) {
    //             validCode=false;
    //             code.addClass("msgs1");
    //             var t=setInterval(function  () {
    //                 time--;
    //                 code.html(time+"秒");
    //                 if (time==0) {
    //                     clearInterval(t);
    //                     code.html("重新获取");
    //                     validCode=true;
    //                     code.removeClass("msgs1");
    //                 }
    //             },1000)
    //         }
    //     })
    // })
    // function submit() {
    //     if (!(/^1[34578]\d{9}$/.test(phone))) {
    //         document.getElementById("text1").innerHTML = "手机号格式不正确";
    //         return;
    //     }
    // }


    //发送验证码时添加cookie
//     function addCookie(name,value,expiresHours){
// //判断是否设置过期时间,0代表关闭浏览器时失效
//         if(expiresHours>0){
//             var date=new Date();
//             date.setTime(date.getTime()+expiresHours*1000);
//             $.cookie(name, escape(value), {expires: date});
//         }else{
//             $.cookie(name, escape(value));
//         }
//     }
//     //修改cookie的值
//     function editCookie(name,value,expiresHours){
//         if(expiresHours>0){
//             var date=new Date();
//             date.setTime(date.getTime()+expiresHours*1000); //单位是毫秒
//             $.cookie(name, escape(value), {expires: date});
//         } else{
//             $.cookie(name, escape(value));
//         }
//     }
//     //根据名字获取cookie的值
//     function getCookieValue(name){
//         return $.cookie(name);
//     }
//     $(function(){
//         $("#second").click(function (){
//             sendCode($("#second"));
//         });
//         v = getCookieValue("secondsremained");//获取cookie值
//         if(v>0){
//             settime($("#second"));//开始倒计时
//         }
//     })
//
//     //将手机利用ajax提交到后台的发短信接口
//     function doPostBack(url,backFunc,queryParam) {
//         $.ajax({
//             async : false,
//             cache : false,
//             type : 'POST',
//             url : url,// 请求的action路径
//             data:queryParam,
//             error : function() {// 请求失败处理函数
//             },
//             success : backFunc
//         });
//     }
//     function backFunc1(data){
//         var d = $.parseJSON(data);
//         if(!d.success){
//             alert(d.msg);
//         }else{//返回验证码
//             alert("模拟验证码:"+d.msg);
//             $("#code").val(d.msg);
//         }
//     }
//
//
//     //发送验证码
//     function sendCode(obj){
//         var phonenum = $("#phonenum").val();
//         var result = isPhoneNum();
//         if(result){
// // doPostBack('${base}/login/getCode.htm',backFunc1,{"phonenum":phonenum});
//             addCookie("secondsremained",60,60);//添加cookie记录,有效时间60s
//             settime(obj);//开始倒计时
//         }
//     }
//     //开始倒计时
//     var countdown;
//     function settime(obj) {
//         countdown=getCookieValue("secondsremained");
//         if (countdown == 0) {
//             obj.removeAttr("disabled");
//             obj.val("免费获取验证码");
//             return;
//         } else {
//             obj.attr("disabled", true);
//             obj.val("重新发送(" + countdown + ")");
//             countdown--;
//             editCookie("secondsremained",countdown,countdown+1);
//         }
//         setTimeout(function() { settime(obj) },1000) //每1000毫秒执行一次
//     }
//     //校验手机号是否合法
//     function isPhoneNum(){
//         var phonenum = $("#phonenum").val();
//         var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
//         if(!myreg.test(phonenum)){
//             alert('请输入有效的手机号码！');
//             return false;
//         }else{
//             return true;
//         }
//     }
</script>
