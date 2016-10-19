<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

require_once 'resources/org/code/Code.class.php';
class LoginController extends Controller
{
    /**
     * 后台登录页面
     * @Author wzb 2016-10-18
     **/
    public function login() {
        return view('admin/login');
    }

    public function ajax_login() {
        $input = Input::all();
        $code = (new \Code)->get();
        if(strtoupper($input['code']) != $code){
            return back_code(-100);
        }

        $user = User::where('name',$input['username'])->first();
        if( empty($user) || Crypt::decrypt($user['pass']) != $input['password']){
            return back_code(-101);
        }
        session(['admin_user'=>$user]);
        return back_code(1,url('admin'));
    }

    /**
     * 管理员退出登录
     * @Author wzb 2016-10-18
     **/
    public function quit() {
        session(['admin_user'=>null]);
        return redirect('admin/login');
    }

    /**
     * 后台登录页面
     * @Author wzb 2016-10-18
     **/
    public function code() {
        $code = (new \Code)->make();
        return $code;
    }
}
