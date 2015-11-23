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

//Home page
Route::get('/', [
    'as' => 'home',
    function () {
        //Redirect to fake login page
        return redirect()->route('demo.login-page');
    }
]);

//Fake login page
Route::get('coursequest', [
    'as' => 'demo.login-page',
    'uses' => 'DemoController@getLoginPage'
]);

//Undefined route
Route::get('{all}', array(
    'as' => 'not-found',
    function () {
        //Redirect to home page
        return redirect()->route('home');
    }
))->where('all', '.*');
