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
    'as' => 'root',
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
Route::post('coursequest', [
    'as' => 'demo.login-page',
    'uses' => 'DemoController@postLoginPage'
]);

//Fake condition page
Route::get('coursequest/condition.jsp', [
    'as' => 'demo.condition',
    'uses' => 'DemoController@getCondition'
]);

//Dashboard
Route::controller('dashboard', 'DashboardController', [
    'getIndex' => 'home',
    'getRecord' => 'dashboard.record'
]);

//Auth System
Route::controller('user', 'UserController', [
    'getIndex' => 'user.list',
    'getLogin' => 'user.login',
    'postLogin' => 'user.login',
    'getRegister' => 'user.register',
    'postRegister' => 'user.register',
    'getConfirm' => 'user.confirm',
    'getResend' => 'user.resend',
    'postResend' => 'user.resend',
    'getForgotPassword' => 'user.forgot-password',
    'postForgotPassword' => 'user.forgot-password',
    'getResetPassword' => 'user.reset-password',
    'postResetPassword' => 'user.reset-password',
    'getChangePassword' => 'user.change-password',
    'postChangePassword' => 'user.change-password',
    'getProfile' => 'user.profile',
    'getEditProfile' => 'user.edit-profile',
    'postEditProfile' => 'user.edit-profile',
    'getEditOtherProfile' => 'user.edit-other-profile',
    'postEditOtherProfile' => 'user.edit-other-profile',
    'getLogout' => 'user.logout'
]);

//Undefined route
Route::get('{all}', array(
    'as' => 'not-found',
    function () {
        //Redirect to root path
        return redirect()->route('root');
    }
))->where('all', '.*');
