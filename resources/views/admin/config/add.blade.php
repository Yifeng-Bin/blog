@extends('admin/template')


@section('content')
    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form_box" onsubmit="return form_submit();" >
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label class="layui-form-label">配置标题</label>
                    <div class="layui-input-inline">
                        <input type="text" name="title" required lay-verify="required" placeholder="请输入配置标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">配置变量名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" placeholder="请输入配置变量名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">菜单地址</label>
                    <div class="layui-input-inline">
                        <input type="text" name="url" required lay-verify="required" placeholder="请输入菜单地址" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序码</label>
                    <div class="layui-input-inline">
                        <input type="text" name="order" required lay-verify="required" value="0" onkeyup="number(this);" autocomplete="off" class="layui-input">
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
        //提交post函数
        function form_submit(){

            var url = "{{url('admin/navs')}}";
            var data = $('#form_box').serialize();
            AjaxJson(url,data,function(data){
                if(data.staus*1 > 1){
                    layui.layer.confirm(data.msg+"是否返回配置管理页面？",{
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
