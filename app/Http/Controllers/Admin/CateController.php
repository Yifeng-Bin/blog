<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    /**
     * 分类管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $data = array(
            'title' => '分类管理'
        );
        return view('admin/cate/index',$data);
    }

    /**
     * 添加分类
     * @Author wzb 2016-10-18
     **/
    public function create() {
        $data = array(
            'title' => '添加分类'
        );
        return view('admin/cate/add',$data);
    }

}
