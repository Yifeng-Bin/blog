@extends('admin/template')
@section('style')
    {{--<link rel="stylesheet" href="{{asset('resources/assets/jcrop/jquery.Jcrop.min.css')}}" type="text/css" />--}}
    {{--<script src="{{asset('resources/assets/jcrop/jquery.Jcrop.min.js')}}"></script>--}}
@endsection

@section('content')

    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form_box" onsubmit="return form_submit();" >
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put" >
                <div class="layui-form-item">
                    <label class="layui-form-label"> </label>
                    <div class="layui-input-block">
                        <div class="site-demo-upload">
                            <img lay-src="@if(!empty($info->fig)) {{$info->fig}} @else {{asset('resources/assets/favicon.png')}} @endif" >
                            <div class="site-demo-upbar" >
                                <div class="layui-box layui-upload-button">
                                    <input type="file" name="file" class="layui-upload-file" id="file_upload" onchange="show_upload_img(this);" >
                                    <span class="layui-upload-icon">
                                        <i class="layui-icon"></i>上传缩略图
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">文章标题</label>
                    <div class="layui-input-block w_500">
                        <input type="text" name="title" value="{{$info->title}}" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-inline">
                        <select name="cid" lay-verify="required">
                            <option value="0">顶级分类</option>
                            @if(isset($list_cate))
                                @foreach($list_cate as $v)
                                    <option value="{{$v['cid']}}" @if($v->cid == $info->cid) selected="" @endif >{{$v['name']}}</option>
                                    @if(isset($v->_childer))
                                        @foreach($v->_childer as $cv)
                                            <option value="∟{{$cv['cid']}}" @if($cv->cid == $info->cid) selected="" @endif >├──{{$cv['name']}}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-inline">
                        <input type="text" name="tag" value="{{$info->tag}}" placeholder="请输入关键词" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用英文逗号隔开（,）</div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block w_500">
                        <textarea name="desc" placeholder="请输入内容" class="layui-textarea">{{$info->desc}}</textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block">
                        <script id="editor" name="content" type="text/plain" style="width:860px;height:300px;">
                            {!! $info->content !!}
                        </script>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即添加</button>
                        <button type="reset" id="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>

    {{--<div id="show_upload_img" style="display: none;">--}}
    {{--<img id="preview" />--}}
    {{--</div>--}}
@endsection

@section('script')

    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
    <script>
        //提交post函数
        function form_submit(){

            var url = "{{url('admin/article')}}/"+"{{$info->aid}}}";
            var data = $('#form_box').serialize();
            AjaxJson(url,data,function(data){
                if(data.staus*1 > 1){
                    layui.layer.confirm(data.msg+"是否返回文章管理页面？",{
                        btn: ['确定', '取消']
                    },function(){
                        window.location.href = data.data;
                    },function(){
                        $('#form_box').find('input').val('');
                        $('#form_box').find('textarea').val('');
                        ue.selection.clearRange();
                    });
                }else{
                    layui.layer.msg(data.msg,{icon:5});
                }
            });
            return false;
        }
    </script>
@endsection
