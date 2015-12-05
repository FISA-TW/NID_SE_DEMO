<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', [
            'only' => [
                'getIndex'
            ]
        ]);
        //限管理員
        $this->middleware('role:admin', [
            'except' => [
                'getIndex'
            ]
        ]);
    }

    public function getIndex()
    {
        return view('dashboard.index');
    }

    public function getRecord()
    {
        //Records
        $nid = Input::get('nid');
        if ($nid) {
            $records = Record::where('nid', '=', $nid)->paginate(50);
        } else {
            $records = Record::paginate(50);
        }
        //Stats
        $stats['total'] = [
            'count' => Record::count(),
            'https' => Record::where('https', '=', true)->count()
        ];
        if ($nid) {
            $stats['nid'] = [
                'count' => Record::where('nid', '=', $nid)->count(),
                'https' => Record::where('nid', '=', $nid)->where('https', '=', true)->count()
            ];
        }
        return view('dashboard.record')->with('records', $records)->with('stats', $stats);
    }
}
