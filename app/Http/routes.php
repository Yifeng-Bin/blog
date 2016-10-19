<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// 后台
Route::group(['prefix'=>'admin' , 'namespace'=>'Admin'],function(){

    Route::get('login','LoginController@login');
    Route::post('ajax_login','LoginController@ajax_login');
    Route::get('code','LoginController@code');

});

Route::group(['middleware'=>['admin.login'],'prefix'=>'admin' , 'namespace'=>'Admin'],function(){

    Route::get('quit','LoginController@quit');
    Route::get('/','IndexController@index');
    Route::get('index','IndexController@index');
    Route::get('change_pass','IndexController@change_pass');
    Route::post('ajax_change_pass','IndexController@ajax_change_pass');

    Route::resource('cate','CateController');

});

// 前台