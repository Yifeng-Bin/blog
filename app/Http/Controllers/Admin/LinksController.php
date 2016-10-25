<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LinksController extends Controller
{
    /**
     * 管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $list = Links::orderBy('order','asc')->get();
        $data = array(
            'list' => $list,
            'title' => '友情链接管理'
        );
        return view('admin/links/index',$data);
    }


    /**
     * 添加友情链接
     * @Author wzb 2016-10-18
     **/
    public function create() {
        $data = array(
            'title' => '添加友情链接'
        );
        return view('admin/links/add',$data);
    }

    /**
     * 添加友情链接(post)
     * @Author wzb 2016-10-18
     **/
    public function store() {

        $post = Input::except('_token');
        if(empty($post['name'])){
            return back_code(-210);
        }
        if(empty($post['url'])){
            return back_code(-212);
        }
        $post['dat'] = time();
        $res = Links::create($post);
        if($res){
            return back_code(207,url('admin/links'));
        }
        return back_code(-213);
    }

    /**
     * 修改友情链接
     * @Author wzb 2016-10-18
     **/
    public function edit($id) {
        $info = Links::where('id',$id)->first();
        $data = array(
            'info' => $info,
            'title' => '修改友情链接'
        );
        return view('admin/links/edit',$data);
    }

    /**
     * 修改友情链接(post)
     * @Author wzb 2016-10-18
     **/
    public function update($id) {

        $post = Input::except('_token','_method');
        if(empty($post['name'])){
            return back_code(-210);
        }
        if(empty($post['url'])){
            return back_code(-212);
        }
        $post['dat'] = time();
        $res = Links::where('id',$id)->update($post);
        if($res){
            return back_code(208,url('admin/links'));
        }
        return back_code(-214);
    }

    /**
     * 更新友情链接排序(post)
     * @Author wzb 2016-10-18
     **/
    public function up_links_order(){
        $input = Input::all();
        $cate = Links::find($input['id']);
        $cate->order = $input['order'];
        $res = $cate->update();
        if($res){
            return back_code(210);
        }
        return back_code(-214);
    }

    /**
     * 删除友情链接(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($aid) {

        $res = Links::where('id',$aid)->delete();
        if($res){
            return back_code(209);
        }
        return back_code(-221);
    }
}
