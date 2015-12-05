<?php

namespace App\Http\Controllers;

use App\Helper\JsonHelper;
use App\Record;
use Crypt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DemoController extends Controller
{
    public function getLoginPage()
    {
        return view('demo.login-page');
    }

    public function postLoginPage(Request $request)
    {
        //定義輸入格式
        $validator = Validator::make($request->all(), [
            'userID' => ['required', 'regex:/^(([depm]([0-9]){7})|(t[0-9]{5}))$/i'],
            'userPW' => 'required',
        ]);
        //檢查輸入
        if ($validator->fails()) {
            return Redirect::route('demo.login-page')
                ->withErrors($validator)
                ->withInput();
        }
        //記錄NID
        $nid = $request->get('userID');
        Session::put('nid', $nid);
        //新增紀錄
        $record = Record::create([
            'nid' => $nid,
            'password' => Crypt::encrypt($request->get('userPW')),
            'https' => $request->secure(),
            'ip' => $request->getClientIp()
        ]);

        //跳轉至檢索頁面
        return Redirect::route('demo.condition');
    }

    public function getCondition()
    {
        return view('demo.condition')->with('nid', Session::get('nid'));
    }
}
