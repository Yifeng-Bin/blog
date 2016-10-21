@extends('admin/template')


@section('content')

    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form_box" onsubmit="return form_submit();" >
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label class="layui-form-label"> </label>
                    <div class="layui-input-block">
                        <div class="site-demo-upload">
                            <img lay-src="{{asset('resources/assets/favicon.png')}}" >
                            <div class="site-demo-upbar">
                                <div class="layui-box layui-upload-button">
                                    <input type="file" name="file" class="layui-upload-file" id="test">
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
                        <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-inline">
                        <select name="pid" lay-verify="required">
                            <option value="0">顶级分类</option>
                            @if(isset($list_cate))
                                @foreach($list_cate as $v)
                                    <option value="{{$v['cid']}}">{{$v['name']}}</option>
                                    @if(isset($v->_childer))
                                        @foreach($v->_childer as $cv)
                                            <option value="∟{{$cv['cid']}}">├──{{$cv['name']}}</option>
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
                        <input type="text" name="title" required  lay-verify="required" placeholder="请输入关键词" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用英文逗号隔开（,）</div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block w_500">
                        <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
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

@endsection

@section('script')
    <script>
        layui.ready(function(){
            layui.layer.msg('很高兴一开场就见到你');
        });

        //页面层
//        layui.layer.open({
//            type: 1,
//            skin: 'layui-field-box', //加上边框
//            area: ['420px', '240px'], //宽高
//            content: 'html内容'
//        });
//        //自定页
//        layui.layer.open({
//            type: 1,
//            skin: 'layui-field-box', //样式类名
//            closeBtn: 0, //不显示关闭按钮
//            shift: 2,
//            shadeClose: true, //开启遮罩关闭
//            content: '内容'
//        });



        //提交post函数
        function form_submit(){

            var url = "{{url('admin/cate')}}";
            var data = $('#form_box').serialize();
            AjaxJson(url,data,function(data){
                if(data.staus*1 > 1){
                    layui.layer.confirm(data.msg+"是否返回分类管理页面？",{
                        btn: ['确定', '取消']
                    },function(){
                        window.location.href = data.data;
                    },function(){
                        $('#form_box').find('input').val('');
                        $('input[name=order]').val('0');
                    });
                }else{
                    layui.layer.msg(data.msg,{icon:5});
                }
            });
            return false;
        }
    </script>
@endsection
