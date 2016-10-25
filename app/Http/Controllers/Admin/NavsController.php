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
     * 导航管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $list = Navs::orderBy('order','asc')->get();
        $data = array(
            'list' => $list,
            'title' => '导航管理'
        );
        return view('admin/navs/index',$data);
    }


    /**
     * 添加导航
     * @Author wzb 2016-10-18
     **/
    public function create() {

        $data = array(
            'title' => '添加导航'
        );
        return view('admin/navs/add',$data);
    }

    /**
     * 添加导航(post)
     * @Author wzb 2016-10-18
     **/
    public function store() {

        $post = Input::except('_token');
        if(empty($post['name'])){
            return back_code(-216);
        }
        $post['dat'] = time();
        $res = Navs::create($post);
        if($res){
            return back_code(211,url('admin/navs'));
        }
        return back_code(-217);
    }

    /**
     * 修改导航
     * @Author wzb 2016-10-18
     **/
    public function edit($id) {
        $info = Navs::where('id',$id)->first();
        $data = array(
            'info' => $info,
            'title' => '修改导航'
        );
        return view('admin/navs/edit',$data);
    }

    /**
     * 修改导航(post)
     * @Author wzb 2016-10-18
     **/
    public function update($id) {

        $post = Input::except('_token','_method');
        if(empty($post['name'])){
            return back_code(-216);
        }
        $post['dat'] = time();
        $res = Navs::where('id',$id)->update($post);
        if($res){
            return back_code(212,url('admin/navs'));
        }
        return back_code(-218);
    }

    /**
     * 更新导航排序(post)
     * @Author wzb 2016-10-18
     **/
    public function up_navs_order(){
        $input = Input::all();
        $cate = Navs::find($input['id']);
        $cate->order = $input['order'];
        $res = $cate->update();
        if($res){
            return back_code(214);
        }
        return back_code(-219);
    }

    /**
     * 删除友情链接(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($aid) {

        $res = Navs::where('id',$aid)->delete();
        if($res){
            return back_code(213);
        }
        return back_code(-220);
    }
}
