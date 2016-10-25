@extends('admin/template')

@section('content')
    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <a href="{{url('admin/links/create')}}" class="layui-btn">
                <i class="layui-icon">&#xe608;</i> 添加
            </a>
            <br/>
            <br/>
            <div class="bh_list bh_list_article">
                <div class="bh_list_item bh_list_title">
                    <div class="title layui-elip">链接名称</div>
                    <div class="">排序码</div>
                    <div class="date">更新时间</div>
                    <div class="operation">操作</div>
                </div>
                <div id="ajax_list">
                    @foreach($list as $v)
                        <div class="bh_list_item" id="{{$v->id}}">
                            <div class="title layui-elip">
                                <span>{{$v->name}}</span>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" onkeyup="number(this)" onchange="change_order(this,'{{$v->id}}')" value="{{$v->order}}" autocomplete="off" class="layui-input">
                            </div>
                            <div class="date">{{date('Y-m-d H:i:s',$v->dat)}}</div>
                            <div class="operation">
                                <a href="{{url('admin/links/'.$v->id.'/edit')}}" class="layui-btn layui-btn-normal">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <button class="layui-btn layui-btn-danger" onclick="delete_cate({{$v->id}});">
                                    <i class="layui-icon">&#xe640;</i>
                                </button>
                            </div>
                        </div>

                    @endforeach



                </div>
            </div>


        </div>
    </fieldset>

@endsection

@section('script')
    <script>
        //更新排序
        function change_order(obj,id){
            var order = $(obj).val();
            var url = "{{url('admin/up_links_order')}}";
            var data = {'_token':'{{csrf_token()}}','id':id,'order':order};
            AjaxJson(url,data,function(data){
                if(data.staus*1 > 1){
                    layui.layer.msg(data.msg,{icon:6});
                }else{
                    layui.layer.msg(data.msg,{icon:5});
                }
            });
            return false;
        }
        //删除分类
        function delete_cate(id){
            layer.confirm('您确定要删除这个友情链接吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                var url = "{{url('admin/links')}}/"+id;
                var data = {_method:'delete',_token:"{{csrf_token()}}",id:id};
                AjaxJson(url,data,function(data){
                    if(data.staus*1 > 1){
                        $("#"+id).remove();
                        layui.layer.msg(data.msg,{icon:6});
                    }else{
                        layui.layer.msg(data.msg,{icon:5});
                    }
                });
            });
            return false;
        }

    </script>
@endsection