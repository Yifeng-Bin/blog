@extends('admin/template')

@section('content')
    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <a href="{{url('admin/cate/create')}}" class="layui-btn">
                <i class="layui-icon">&#xe608;</i> 添加
            </a>
            <br/>
            <br/>
            <div class="bh_list bh_list_cate">
                <div class="bh_list_item bh_list_title">
                    <div class="bin_icon">折叠</div>
                    <div class="cate">分类名称</div>
                    <div class="">排序码</div>
                    <div class="date">更新时间</div>
                    <div class="operation">操作</div>
                </div>
                <div id="ajax_list">
                    @foreach($list as $v)
                        <div class="bh_list_item" id="{{$v->cid}}">
                            <div class="bin_icon" is_on="1" onclick="bh_toggle(this,'.show_{{$v->cid}}');">
                                <i class="layui-icon">&#xe619;</i>
                            </div>
                            <div class="cate">
                                <span>{{$v->name}}</span>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" onkeyup="number(this)" onchange="change_order(this,'{{$v->cid}}')" value="{{$v->order}}" autocomplete="off" class="layui-input">
                            </div>
                            <div class="date">{{date('Y-m-d H:i:s',$v->dat)}}</div>
                            <div class="operation">
                                <a href="{{url('admin/cate/'.$v->cid.'/edit')}}" class="layui-btn layui-btn-normal">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <button class="layui-btn layui-btn-danger" onclick="delete_cate({{$v->cid}});">
                                    <i class="layui-icon">&#xe640;</i>
                                </button>
                            </div>
                        </div>

                       @if(!empty($v->_childer))
                            @foreach($v->_childer as $cv)
                                <div class="bh_list_item show_{{$v->cid}}" id="{{$cv->cid}}">
                                    <div class="bin_icon"></div>
                                    <div class="cate">
                                        <span class="tab-sign"></span>
                                        <span>{{$cv->name}}</span>
                                    </div>
                                    <div class="layui-input-inline">
                                        <input type="text" value="{{$cv->order}}" autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="date">{{date('Y-m-d H:i:s',$cv->dat)}}</div>
                                    <div class="operation">
                                        <a href="{{url('admin/cate/'.$cv->cid.'/edit')}}" class="layui-btn layui-btn-normal">
                                            <i class="layui-icon">&#xe642;</i>
                                        </a>
                                        <button class="layui-btn layui-btn-danger" onclick="delete_cate({{$cv->cid}});" >
                                            <i class="layui-icon">&#xe640;</i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    @endforeach



                </div>
            </div>


        </div>
    </fieldset>

@endsection

@section('script')
    <script>
        //更新排序
        function change_order(obj,cid){
            var cate_order = $(obj).val();
            var url = "{{url('admin/change_order')}}";
            var data = {'_token':'{{csrf_token()}}','cid':cid,'order':cate_order};
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
        function delete_cate(cid){
            layer.confirm('您确定要删除这个分类吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                var url = "{{url('admin/cate')}}/"+cid;
                var data = {_method:'delete',_token:"{{csrf_token()}}",cid:cid};
                AjaxJson(url,data,function(data){
                    if(data.staus*1 > 1){
                        $("#"+cid).remove();
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