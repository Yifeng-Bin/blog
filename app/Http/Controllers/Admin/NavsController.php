<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NavsController extends Controller
{
    /**
     * 菜单管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $list = Navs::orderBy('id','desc')->get();
        $data = array(
            'list' => $list,
            'title' => '菜单管理'
        );
        return view('admin/navs/index',$data);
    }


    /**
     * 添加菜单
     * @Author wzb 2016-10-18
     **/
    public function create() {

        $data = array(
            'title' => '添加菜单'
        );
        return view('admin/navs/add',$data);
    }

    /**
     * 添加菜单(post)
     * @Author wzb 2016-10-18
     **/
    public function store() {

        $post = Input::except('_token');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['dat'] = time();
        $res = Navs::create($post);
        if($res){
            return back_code(204,url('admin/navs'));
        }
        return back_code(-208);
    }

    /**
     * 修改菜单
     * @Author wzb 2016-10-18
     **/
    public function edit($cid) {
        $info = Navs::where('aid',$cid)->first();
        $data = array(
            'info' => $info,
            'title' => '修改菜单'
        );
        return view('admin/navs/edit',$data);
    }

    /**
     * 修改菜单(post)
     * @Author wzb 2016-10-18
     **/
    public function update($aid) {

        $post = Input::except('_token','_method');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['dat'] = time();
        $res = Navs::where('id',$aid)->update($post);
        if($res){
            return back_code(205,url('admin/navs'));
        }
        return back_code(-209);
    }

    /**
     * 删除友情链接(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($aid) {

        $res = Navs::where('id',$aid)->delete();
        if($res){
            return back_code(206);
        }
        return back_code(-206);
    }
}
