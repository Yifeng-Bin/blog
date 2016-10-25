<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    /**
     * 文章管理
     * @Author wzb 2016-10-18
     **/
    public function index() {
        $list = Article::orderBy('aid','desc')->get();
        $data = array(
            'list' => $list,
            'title' => '文章管理'
        );
        return view('admin/article/index',$data);
    }


    /**
     * 添加文章
     * @Author wzb 2016-10-18
     **/
    public function create() {
        $list_cate = (new Cate)->tree();
        $data = array(
            'list_cate' => $list_cate,
            'title' => '添加文章'
        );
        return view('admin/article/add',$data);
    }

    /**
     * 添加文章(post)
     * @Author wzb 2016-10-18
     **/
    public function store() {

        $post = Input::except('_token');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['view'] = 0;
        $post['dat'] = time();
        $res = Article::create($post);
        if($res){
            return back_code(204,url('admin/cate'));
        }
        return back_code(-208);
    }

    /**
     * 修改文章
     * @Author wzb 2016-10-18
     **/
    public function edit($cid) {
        $list_cate = (new Cate)->tree();
        $info = Article::where('aid',$cid)->first();
        $data = array(
            'list_cate' => $list_cate,
            'info' => $info,
            'title' => '修改文章'
        );
        return view('admin/article/edit',$data);
    }

    /**
     * 修改文章(post)
     * @Author wzb 2016-10-18
     **/
    public function update($aid) {

        $post = Input::except('_token','_method');
        if(empty($post['title'])){
            return back_code(-207);
        }
        $post['dat'] = time();
        $res = Article::where('aid',$aid)->update($post);
        if($res){
            return back_code(205,url('admin/article'));
        }
        return back_code(-209);
    }

    /**
     * 删除文章类(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($aid) {

        $res = Article::where('aid',$aid)->delete();
        if($res){
            return back_code(206);
        }
        return back_code(-206);
    }
}
