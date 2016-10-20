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
                    <div class="bh_list_item">
                        <div class="bin_icon" onclick="bh_toggle('.show_1');">
                            <i class="layui-icon">&#xe61a;</i>
                        </div>
                        <div class="cate">
                            <span>视频</span>
                        </div>
                        <div class="layui-input-inline">
                            <input type="password" name="" autocomplete="off" class="layui-input">
                        </div>
                        <div class="date">2016-11-10 15:10:10</div>
                        <div class="operation">
                            <button class="layui-btn layui-btn-normal">修改</button>
                            <button class="layui-btn layui-btn-danger">删除</button>
                        </div>
                    </div>

                    <div class="bh_list_item show_1">
                        <div class="bin_icon"></div>
                        <div class="cate">
                            <span class="tab-sign"></span>
                            <span>视频</span>
                        </div>
                        <div class="layui-input-inline">
                            <input type="password" name="" autocomplete="off" class="layui-input">
                        </div>
                        <div class="date">2016-11-10 15:10:10</div>
                        <div class="operation">
                            <a href="{{url('admin/cate/1/edit')}}" class="layui-btn layui-btn-normal">修改</a>
                            <button class="layui-btn layui-btn-danger">删除</button>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </fieldset>

@endsection

@section('script')
    <script>



    </script>
@endsection