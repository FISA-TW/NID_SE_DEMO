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

//首頁
Route::get('/', [
    'as' => 'home',
    function () {
        //跳轉至登入頁面
        return redirect()->route('demo.login-page');
    }
]);

//登入頁面
Route::get('coursequest', [
    'as' => 'demo.login-page',
    'uses' => 'DemoController@getLoginPage'
]);
