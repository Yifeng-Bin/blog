<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="language" content="zh-CN" />
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="full-screen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no,address=no" />

    <title>{{$title or '冰痕博客'}}</title>

    <link rel="alternate icon" type="image/png" href="{{asset('resources/assets/admin/i/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('resources/assets/admin/css/amazeui.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('resources/assets/admin/css/admin.css')}}"/>
    <link rel="stylesheet" href="{{asset('resources/assets/admin/css/app.css')}}"/>
    <script src="{{asset('resources/assets/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('resources/assets/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('resources/assets/layer/layer.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="{{asset('resources/assets/admin/js/amazeui.ie8polyfill.min.js')}}"></script>
    <![endif]-->
    <script src="{{asset('resources/assets/admin/js/amazeui.min.js')}}"></script>
    <script src="{{asset('resources/assets/public.js')}}"></script>

    @yield('style')
</head>
<body>
<!--[if lte IE 9]>
<div class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请
    <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</div>
<![endif]-->

@section('header')
    <header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <strong>冰痕博客</strong>
        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="{{url('admin/change_pass')}}"><span class="am-icon-cog"></span>修改密码</a></li>
                        <li><a href="{{url('admin/quit')}}"><span class="am-icon-power-off"></span> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
@show

@section('side')
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas am-scrollable-vertical" id="admin-offcanvas">
        <ul class="am-list admin-sidebar-list">
            @if(isset($menu))
                @foreach($menu as $k => $vo)
                    @if(isset($vo['children']))
                        <li class="admin-parent">
                            <a class="am-cf" data-am-collapse="{target: '#collapse-nav{{$k}}'}"><span class="{{$vo['class']}}"></span> {{$vo['name']}} <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav{{$k}}">
                                @foreach($vo['children'] as $kc => $voc)
                                    <li><a href="{{url($kc)}}"><span class="{{$voc['class']}}"></span>{{$voc['name']}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{url($vo['url'])}}"><span class="{{$vo['class']}}"></span> {{$vo['name']}}</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
    <!-- sidebar end -->
@show

@section('content')
@show

@section('footer')
    <footer>Copyright © 2008-2015 www.gouso.com 版权所有</footer>
@show

<script>

</script>
@yield('script')
</body>
</html>
