<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    /**
     * 后台首页
     * @Author wzb 2016-10-18
     **/
    public function index() {

        $data = array(
            'title'=>'系统基本信息'
        );
        return view('admin/index',$data);
    }

    /**
     * 修改密码
     * @Author wzb 2016-10-18
     **/
    public function change_pass() {
        $data = array(
            'title'=>'修改密码'
        );
        return view('admin/change_pass',$data);
    }
    /**
     * 修改密码(ajax)
     * @Author wzb 2016-10-18
     **/
    public function ajax_change_pass() {
        $post = Input::all();

        if(empty($post['password'])){
            return back_code(-102);
        }
        if( strlen($post['password']) > 20 || strlen($post['password']) < 5 ){
            return back_code(-105);
        }

        if( $post['password'] != $post['password_confirmed']){
            return back_code(-103);
        }

        $admin_user = session('admin_user');
        $uid = (int)$admin_user['uid'];
        $user = User::find($uid);

        if( $post['old'] != Crypt::decrypt($user['pass'])){
            return back_code(-104);
        }
        $new_user['pass'] = Crypt::encrypt($post['password']);
        $res = User::where('uid',$uid)->update($new_user);
        if($res){
            return back_code(100);
        }
        return back_code(-106);
    }


}
