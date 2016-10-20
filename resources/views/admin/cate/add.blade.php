@extends('admin/template')


@section('content')

    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form_box" onsubmit="return form_submit();" >
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label class="layui-form-label">分类名称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" required lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">父级分类</label>
                    <div class="layui-input-inline">
                        <select name="pid" lay-verify="required">
                            <option value="0">顶级分类</option>
                            @if(isset($list_cate))
                                @foreach($list_cate as $k => $v)
                                    <option value="{{$v['cid']}}">{{$v['name']}}</option>
                                @endforeach
                            @endif
                        </select>
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

            var url = "{{url('admin/cate')}}";
            var data = $('#form_box').serialize();
            AjaxJson(url,data,function(data){
                if(data.staus*1 > 1){
                    layui.layer.confirm(data.msg+"是否返回分类管理页面？",{
                        btn: ['确定', '取消']
                    },function(){
                        window.location.href = data.data;
                    });
                }else{
                    layui.layer.msg(data.msg,{icon:5});
                }
            });
            return false;
        }
    </script>
@endsection
