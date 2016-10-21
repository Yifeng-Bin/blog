<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CateController extends Controller
{
    /**
     * 分类管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $list = (new Cate)->tree();
        $data = array(
            'list' => $list,
            'title' => '分类管理'
        );
        return view('admin/cate/index',$data);
    }

    /**
     * 添加分类
     * @Author wzb 2016-10-18
     **/
    public function create() {
        $list_cate = Cate::where('pid',0)->get();
        $data = array(
            'list_cate' => $list_cate,
            'title' => '添加分类'
        );
        return view('admin/cate/add',$data);
    }

    /**
     * 添加分类(post)
     * @Author wzb 2016-10-18
     **/
    public function store() {

        $post = Input::except('_token');
        if(empty($post['name'])){
            return back_code(-200);
        }
        $post['dat'] = time();
        $res = Cate::create($post);
        if($res){
            return back_code(200,url('admin/cate'));
        }
        return back_code(-201);
    }

    /**
     * 修改分类
     * @Author wzb 2016-10-18
     **/
    public function edit($cid) {
        $list_cate = Cate::where('pid',0)->get();
        $info = Cate::where('cid',$cid)->first();
        $data = array(
            'list_cate' => $list_cate,
            'info' => $info,
            'title' => '修改分类'
        );
        return view('admin/cate/edit',$data);
    }

    /**
     * 修改分类(post)
     * @Author wzb 2016-10-18
     **/
    public function update($cid) {

        $post = Input::except('_token','_method');
        if(empty($post['name'])){
            return back_code(-200);
        }
        $post['dat'] = time();
        $res = Cate::where('cid',$cid)->update($post);
        if($res){
            return back_code(201,url('admin/cate'));
        }
        return back_code(-202);
    }

    /**
     * 更新分类排序(post)
     * @Author wzb 2016-10-18
     **/
    public function change_order(){
        $input = Input::all();
        $cate = Cate::find($input['cid']);
        $cate->order = $input['order'];
        $res = $cate->update();
        if($res){
            return back_code(202);
        }
        return back_code(-203);
    }

    /**
     * 删除分类(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($cid) {
        $cate = Cate::where('pid',$cid)->first();
        if($cate){
            return back_code(-205);
        }

        $res = Cate::where('cid',$cid)->delete();
        if($res){
            return back_code(203);
        }
        return back_code(-204);
    }

}
