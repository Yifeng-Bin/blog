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

    Route::any('/','IndexController@index');
    Route::any('index','IndexController@index');
    Route::any('quit','LoginController@quit');

});

// 前台