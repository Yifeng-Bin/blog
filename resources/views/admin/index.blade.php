@extends('admin/template')

@section('content')
    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">

            <ul class="bh_list_text">
                <li>
                    <label>操作系统</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>运行环境</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                </li>
                <li>
                    <label>上传附件限制</label><span><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></span>
                </li>
                <li>
                    <label>北京时间</label><span><?php echo date('Y年m月d日 H时i分s秒')?></span>
                </li>
                <li>
                    <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
                </li>
                <li>
                    <label>服务器域名/IP</label><span>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</span>
                </li>
            </ul>

        </div>
    </fieldset>
@endsection

