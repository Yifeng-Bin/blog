@extends('admin/template')


@section('content')

    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <form class="layui-form layui-form-pane" id="form_box" onsubmit="return form_submit();" >
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label class="layui-form-label">分类名称</label>
                    <div class="layui-input-inline">
                        <input type="password" name="old" required lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">父级分类</label>
                    <div class="layui-input-block">
                        <select name="city" lay-verify="required">
                            <option value="">请选择一个城市</option>
                            <option value="010">北京</option>
                            <option value="021">上海</option>
                            <option value="0571">杭州</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="" required lay-verify="required" value="0" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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

            var url = "{{url('admin/ajax_change_pass')}}";
            var data = $('#form_box').serialize();
            AjaxJson(url,data,function(data){
                if(data.staus*1 > 1){
                    layui.layer.msg(data.msg,{icon:6});
                }else{
                    layui.layer.msg(data.msg,{icon:5});
                }
            });
            return false;
        }
    </script>
@endsection
