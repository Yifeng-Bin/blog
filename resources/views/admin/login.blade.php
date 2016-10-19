@extends('admin/template')

@section('style')
    <style>
        .bh_content{ left: 0;padding:0;}
    </style>
@endsection

@section('header')
@endsection

@section('side')
@endsection

@section('content')
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
@endsection

@section('script')
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
@endsection
