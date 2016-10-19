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
    @yield('style')
</head>
<body>
<!--[if lte IE 9]>
<div class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请
    <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！
</div>
<![endif]-->

@section('header')
        <!--头部 开始-->
<header>
    <div class="bh_fl logo_text">冰痕博客</div>
    <ul class="layui-nav bh_fr">
        <li class="layui-nav-item">
            <a href="{{url('admin/change_pass')}}">
                <i class="layui-icon">&#xe620;</i> 修改密码
            </a>
        </li>
        <li class="layui-nav-item">
            <a href="{{url('admin/quit')}}">退出</a>
        </li>
    </ul>
</header>
<!--头部 结束-->
@show

@section('side')
<!-- sidebar start -->
<ul class="layui-nav layui-nav-tree layui-nav-side">
    <li class="layui-nav-item layui-nav-title">
        <a>内容管理</a>
    </li>
    <li class="layui-nav-item layui-this">
        <a href="{{url('admin/cate')}}">分类管理</a>
    </li>
    <li class="layui-nav-item  layui-this">
        <a href="{{url('admin/aricle')}}">
            <i class="layui-icon">&#xe60a;</i>
            <cite>博客管理</cite>
        </a>
    </li>
    <li class="layui-nav-item layui-nav-title">
        <a>系统管理</a>
    </li>
    <li class="layui-nav-item">
        <a href="">友情管理</a>
    </li>
    <li class="layui-nav-item">
        <a href="">导航管理</a>
    </li>
    <li class="layui-nav-item">
        <a href="">网站配置</a>
    </li>

</ul>
<!-- sidebar end -->
@show

<div class="bh_content">
@section('content')
@show
</div>


@yield('script')
</body>
</html>
