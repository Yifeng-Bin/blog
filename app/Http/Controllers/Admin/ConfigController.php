<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ConfigController extends Controller
{
    /**
     * 配置管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $list = Config::orderBy('id','desc')->get();
        $data = array(
            'list' => $list,
            'title' => '配置管理'
        );
        return view('admin/config/index',$data);
    }


    /**
     * 添加配置
     * @Author wzb 2016-10-18
     **/
    public function create() {

        $data = array(
            'title' => '添加配置'
        );
        return view('admin/config/add',$data);
    }

    /**
     * 添加配置(post)
     * @Author wzb 2016-10-18
     **/
    public function store() {

        $post = Input::except('_token');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['dat'] = time();
        $res = Config::create($post);
        if($res){
            return back_code(204,url('admin/config'));
        }
        return back_code(-208);
    }

    /**
     * 修改配置
     * @Author wzb 2016-10-18
     **/
    public function edit($id) {
        $info = Navs::where('id',$id)->first();
        $data = array(
            'info' => $info,
            'title' => '修改配置'
        );
        return view('admin/config/edit',$data);
    }

    /**
     * 修改菜单(post)
     * @Author wzb 2016-10-18
     **/
    public function update($id) {

        $post = Input::except('_token','_method');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['dat'] = time();
        $res = Config::where('id',$id)->update($post);
        if($res){
            return back_code(205,url('admin/config'));
        }
        return back_code(-209);
    }

    /**
     * 删除友情链接(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($id) {

        $res = Config::where('id',$id)->delete();
        if($res){
            return back_code(206);
        }
        return back_code(-206);
    }
}
