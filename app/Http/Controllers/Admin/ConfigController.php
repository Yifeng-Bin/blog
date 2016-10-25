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
        $data = Config::orderBy('order','asc')->get();
        foreach ($data as $k=>$v){
            switch ($v->field_type){
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea type="text" class="lg" name="conf_content[]">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    //1|开启,0|关闭
                    $arr = explode(',',$v->field_value);
                    $str = '';
                    foreach($arr as $m=>$n){
                        //1|开启
                        $r = explode('|',$n);
                        $c = $v->conf_content==$r[0]?' checked ':'';
                        $str .= '<input type="radio" name="conf_content[]" value="'.$r[0].'"'.$c.'>'.$r[1].'　';
                    }
                    $data[$k]->_html = $str;
                    break;
            }

        }
        $data = array(
            'list' => $data,
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
            return back_code(-222);
        }
        if(empty($post['name'])){
            return back_code(-223);
        }
        $post['dat'] = time();
        $res = Config::create($post);
        if($res){
            return back_code(215,url('admin/config'));
        }
        return back_code(-225);
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
     * 修改配置(post)
     * @Author wzb 2016-10-18
     **/
    public function update($id) {

        $post = Input::except('_token','_method');
        if(empty($post['title'])){
            return back_code(-222);
        }
        if(empty($post['name'])){
            return back_code(-223);
        }
        $post['dat'] = time();
        $res = Config::where('id',$id)->update($post);
        if($res){
            return back_code(216,url('admin/config'));
        }
        return back_code(-226);
    }

    /**
     * 删除配置链接(post DELETE)
     * @Author wzb 2016-10-18
     **/
    public function destroy($id) {

        $res = Config::where('id',$id)->delete();
        if($res){
            return back_code(217);
        }
        return back_code(-227);
    }
    /**
     * 更新配置排序(post)
     * @Author wzb 2016-10-18
     **/
    public function up_config_order(){
        $input = Input::all();
        $cate = Navs::find($input['id']);
        $cate->order = $input['order'];
        $res = $cate->update();
        if($res){
            return back_code(218);
        }
        return back_code(-228);
    }
}
