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
        $list = Links::orderBy('id','desc')->get();
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
        $list_cate = (new Cate)->tree();
        $data = array(
            'list_cate' => $list_cate,
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
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['view'] = 0;
        $post['dat'] = time();
        $res = Links::create($post);
        if($res){
            return back_code(204,url('admin/links'));
        }
        return back_code(-208);
    }

    /**
     * 修改友情链接
     * @Author wzb 2016-10-18
     **/
    public function edit($cid) {
        $info = Links::where('aid',$cid)->first();
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
    public function update($aid) {

        $post = Input::except('_token','_method');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['dat'] = time();
        $res = Links::where('aid',$aid)->update($post);
        if($res){
            return back_code(205,url('admin/links'));
        }
        return back_code(-209);
    }

    /**
     * 删除友情链接(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($aid) {

        $res = Links::where('id',$aid)->delete();
        if($res){
            return back_code(206);
        }
        return back_code(-206);
    }
}
