@extends('admin/template')

@section('content')
    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">
            <a href="{{url('admin/article/create')}}" class="layui-btn">
                <i class="layui-icon">&#xe608;</i> 添加
            </a>
            <br/>
            <br/>
            <div class="bh_list bh_list_article">
                <div class="bh_list_item bh_list_title">
                    <div class="title" style="text-align: center;">文章标题</div>
                    <div class="">作者</div>
                    <div class="">查看次数</div>
                    <div class="date">更新时间</div>
                    <div class="operation">操作</div>
                </div>
                <div id="ajax_list">
                    @foreach($list as $v)
                        <div class="bh_list_item" id="{{$v->aid}}">
                            <div class="title layui-elip"> {{$v->title}}</div>
                            <div class=""> {{$v->author}}</div>
                            <div class=""> {{$v->view}}</div>
                            <div class="date">{{date('Y-m-d H:i:s',$v->dat)}}</div>
                            <div class="operation">
                                <a href="{{url('admin/article/'.$v->aid.'/edit')}}" class="layui-btn layui-btn-normal">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <button class="layui-btn layui-btn-danger" onclick="delete_article({{$v->aid}});">
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

        //删除文章
        function delete_article(aid){
            layer.confirm('您确定要删除这个文章吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                var url = "{{url('admin/article')}}/"+aid;
                var data = {_method:'delete',_token:"{{csrf_token()}}",aid:aid};
                AjaxJson(url,data,function(data){
                    if(data.staus*1 > 1){
                        $("#"+aid).remove();
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