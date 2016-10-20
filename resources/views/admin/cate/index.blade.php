@extends('admin/template')

@section('content')

    <fieldset class="layui-elem-field">
        <legend>{{$title or ''}}</legend>
        <div class="layui-field-box">

            <div class="bh_list_cate">
                <div class="bh_list_item bh_list_cate_title">
                    <div class="bin_icon">折叠</div>
                    <div class="cate">分类名称</div>
                    <div class="">排序码</div>
                    <div class="date">更新时间</div>
                    <div class="operation">操作</div>
                </div>
                <div id="ajax_list">
                    @foreach($list_cate as $v)
                        <div class="bh_list_item">
                            <div class="bin_icon" onclick="bh_toggle('.show_{{$v->cid}}');">
                                <i class="layui-icon">&#xe61a;</i>
                            </div>
                            <div class="cate">
                                <span>{{$v['name']}}</span>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" onkeyup="number(this)" value="{{$v['order']}}" autocomplete="off" class="layui-input">
                            </div>
                            <div class="date">{{date('Y-m-d H:i:s',$v['dat'])}}</div>
                            <div class="operation">
                                <a href="{{url('admin/cate/1/edit')}}" class="layui-btn layui-btn-normal">修改</a>
                                <button class="layui-btn layui-btn-danger">删除</button>
                            </div>
                        </div>

                       @if(!empty($v->_chiler))
                            @foreach($v->_chiler as $cv)
                                <div class="bh_list_item show_{{$v->cid}}">
                                    <div class="bin_icon"></div>
                                    <div class="cate">
                                        <span class="tab-sign"></span>
                                        <span>{{$cv['name']}}</span>
                                    </div>
                                    <div class="layui-input-inline">
                                        <input type="text" value="{{$cv['order']}}" autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="date">{{date('Y-m-d H:i:s',$cv['dat'])}}</div>
                                    <div class="operation">
                                        <a href="{{url('admin/cate/'.$cv['cid'].'/edit')}}" class="layui-btn layui-btn-normal">修改</a>
                                        <button class="layui-btn layui-btn-danger">删除</button>
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



    </script>
@endsection