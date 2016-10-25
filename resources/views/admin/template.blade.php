<!DOCTYPE html>
<html>
<head>
    @include('admin/style')
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
    <a href="{{url('admin')}}" class="bh_fl logo_text">冰痕博客</a>
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
    <li class="layui-nav-item">
        <a href="{{url('admin/article')}}">
            <i class="layui-icon">&#xe60a;</i>
            <cite>博客管理</cite>
        </a>
    </li>
    <li class="layui-nav-item layui-nav-title">
        <a>系统管理</a>
    </li>
    <li class="layui-nav-item">
        <a href="{{url('admin/links')}}">友情管理</a>
    </li>
    <li class="layui-nav-item">
        <a href="{{url('admin/navs')}}">导航管理</a>
    </li>
    <li class="layui-nav-item">
        <a href="{{url('admin/config')}}">网站配置</a>
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
