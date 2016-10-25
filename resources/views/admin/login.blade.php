<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="language" content="zh-CN"/>
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="full-screen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no,address=no"/>

    <title>{{$title or '冰痕博客'}}</title>

    <link rel="alternate icon" type="image/png" href="{{asset('resources/assets/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('resources/assets/layui/css/layui.css')}}"/>
    <link rel="stylesheet" href="{{asset('resources/assets/admin/css/admin.css')}}"/>
    <script src="{{asset('resources/assets/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('resources/assets/layui/layui.js')}}"></script>
    <script src="{{asset('resources/assets/public.js')}}"></script>

</head>
<body>
<!--[if lte IE 9]>
<div class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请
    <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！
</div>
<![endif]-->

<div class="am-g top_div"></div>
<div class="am-g login">
    <div class="logo">
        <div class="tou"></div>
        <div class="initial_left_hand" id="left_hand"></div>
        <div class="initial_right_hand" id="right_hand"></div>
    </div>
    <form name="login" id="login" onsubmit="return CheckLogin(document.login);">
        {{csrf_field()}}
        <div class="log">
            <label>管理员</label>
            <input class="ipt" name="username" type="text" id="username">
        </div>
        <div class="other">
            <label>密　码</label>
            <input class="ipt" name="password" type="password" id="password">
        </div>
        <div class="other">
            <label>验证码</label>
            <input class="ipt w120" name="code" type="text" id="code">
            <img src="{{url('admin/code')}}" id="code_img" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
        </div>
        <div class="bottom">
            <button type="submit" class="bh_btn" >登录</button>
        </div>
    </form>
</div>

<script>

    $(function(){
        $("#username").focus();
        $("#password").focus(function(){
            animate_start();
        });
        $("#password").blur(function(){
            animate_end();
        });
    });

    function animate_start(){
        $("#left_hand").animate({
            left: "150",
            top: " -38"
        },{step: function(){
            if(parseInt($("#left_hand").css("left"))>140){
                $("#left_hand").attr("class","left_hand");
            }
        }}, 2000);
        $("#right_hand").animate({
            right: "-64",
            top: "-38px"
        },{step: function(){
            if(parseInt($("#right_hand").css("right"))> -70){
                $("#right_hand").attr("class","right_hand");
            }
        }}, 2000);
    };

    function animate_end(){
        $("#left_hand").attr("class","initial_left_hand");
        $("#left_hand").attr("style","left:100px;top:-12px;");
        $("#right_hand").attr("class","initial_right_hand");
        $("#right_hand").attr("style","right:-112px;top:-12px");
    };

    function CheckLogin(obj){
        if(obj.username.value==''){
            layer.msg("请输入用户名",{icon:5});
            obj.username.focus();
            return false;
        }
        if(obj.password.value==''){
            layer.msg("请输入登录密码",{icon:5});
            obj.password.focus();
            return false;
        }
        if(obj.key!=null){
            if(obj.key.value==''){
                layer.msg("请输入验证码",{icon:5});
                obj.key.focus();
                return false;
            }
        }

        url = "{{url('admin/ajax_login')}}";
        data = $('#login').serialize();
        AjaxJson(url,data,function(data){
            if(data.staus*1 == 1){
                window.location.href = data.data;
            }else{
                layer.msg(data.msg,{icon:5});
            }
        });
        return false;
    };
</script>
</body>
</html>
